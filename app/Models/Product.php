<?php

namespace Grassstation\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Product extends Model implements Sitemapable
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'kind',
        'grade',
        'price_per_gram',
        'status',
        'feature_flag',
        'internal_sku',
        'description',
        'wiki_link',
        'product_images',
    ];
    protected $casts = [
        'product_images' => 'json',
    ];

    public function getGrade()
    {
        return(str_repeat("★",$this->grade) ?? "✰");
    }
    public function firstImage(){
        if(empty($this->product_images)){
            return asset("img/gs_defaultimg.png");
        }else{
            $pid =  $this->product_images[0];
            $p = ProductPic::find($pid);
            return $p->getURL();
        }
    }
    public function hasImage($imgid = NULL) {
        if(empty($this->product_images)) return false;
        return $imgid ? in_array($imgid,$this->product_images) : true;
    }
    public function imagesCount(){
        return empty($this->product_images) ? 0 : count($this->product_images);
    }
    public function toggleImage($picid){
        $images = collect($this->product_images);

        if ($images->contains($picid)) {
            // If the image exists in the array, remove it
            $images = $images->reject(function ($image) use ($picid) {
                return $image === $picid;
            });
        } else {
            // If the image doesn't exist, add it
            $images->push($picid);
        }

        // Update the model with the updated array
        $this->product_images = array_values($images->toArray());

        return $this->save();
    }
    public function setFeaturedPic($picid)
    {
        // Convert product_images to a collection
        $images = collect($this->product_images);

        // Remove the featured image from the array if it exists
        $images = $images->reject(function ($image) use ($picid) {
            return $image === $picid;
        });

        // Add the featured image to the beginning of the array
        $images->prepend($picid);

        // Update the model with the updated array
        $this->product_images = array_values($images->toArray());

        // Save the model
        return $this->save();
    }

    public function getKind()
    {
        return empty($this->kind) ? "Accessories" : ucfirst($this->kind);
    }

    public function dispKind($short = false)
    {
        if ($this->kind=="sativa"){
            return '<span class="badge badge-primary">'.($short ? 'S' : 'Sativa').'</span>';
        }elseif ($this->kind=="indica"){
            return '<span class="badge badge-info">'.($short ? 'I' : 'Indica').'</span>';
        }elseif ($this->kind=="hybrid"){
            return '<span class="badge badge-success">'.($short ? 'H' : 'Hybrid').'</span>';
        }else{
            return'<span class="badge badge-secondary">'.($short ? 'A' : 'Accessories').'</span>';
        }
    }
    /**
     * Scope a query to only include featured products that are in stock.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured($query)
    {
        return $query->where('feature_flag', true)->where('status', 'in stock');
    }
    public function scopeHasImage($query)
    {
        return $query->whereNotNull('product_images')->where('product_images', '!=', '[]');
    }
    public function scopeInStock($query)
    {
        return $query->where("status","in stock");
    }

    public function toArray()
    {
        return [
            'name'=>$this->name,
            'kind'=>$this->kind,
            'grade'=>$this->grade,
            'price_per_gram'=>$this->price_per_gram,
            'status'=>$this->status,
            'feature_flag'=>$this->feature_flag,
            'internal_sku'=>$this->internal_sku,
            'description'=>$this->description,
            'wiki_link'=>$this->wiki_link,
            'product_images'=>$this->product_images,
        ];
    }

    public function displayPrice($short = false){
        switch(true){
            case $this->status == "in stock":
                return $this->kind == "" ? ($short ? "" : "ราคา ").$this->price_per_gram." บาท": ($short ? "": "ราคาเริ่มต้นที่ ").$this->price_per_gram." บาท/กรัม";
            case $this->status == "out of stock":
                return "สินค้าหมด";
            case $this->status == "hidden":
                return "สอบถามร้านค้า";
        }
    }

    public function stockStatus($short = false){
        switch(true){
            case $this->status == "in stock":
                return 'มีสินค้า';
            case $this->status == "out of stock":
                return "สินค้าหมด";
            case $this->status == "hidden":
                return "ซ่อน";
        }
    }
    public function stockStatusClass(){
        switch(true){
            case $this->status == "in stock":
                return "success";
            case $this->status == "out of stock":
                return "secondary";
            case $this->status == "hidden":
                return "light";
        }
    }
    public function wikiLink(){
        return url($this->wiki_link);
    }
    public function getURL(){
        return route("products.show",$this);
    }

    public static function allVisibleJ(){
        $p = static::query()->where("status","in stock")->get();
        $pa = [];
        foreach ($p as $product) {
            $pa[] = $product->toArray();
        }
        return $pa;
    }
    public function toggleStockStatus() {
        switch ($this->status) {
            case 'in stock':
                $this->status = 'out of stock';
                break;
            case 'out of stock':
                $this->status = 'in stock';
                break;
        }
        $this->save();
    }
    

    public static function getU1()
    {
        return Cache::remember('productU1', now()->addHour(), function () {
            return static::query()
                ->where("status", "in stock")
                ->where("price_per_gram", "<=", 100)
                ->orderByDesc("price_per_gram")
                ->get();
        });
    }

    public static function getU2()
    {
        return Cache::remember('productU2', now()->addHour(), function () {
            return static::query()
                ->where("status", "in stock")
                ->where("price_per_gram", "<=", 200)
                ->orderByDesc("price_per_gram")
                ->get();
        });
    }

    public static function qHomeP()
    {
        return Cache::remember('qHomeP', now()->addHour(), function () {
            $pu = static::featured()->hasImage()->orderByDesc("id");
            $qr = $pu->get();
            if ($qr->count() < 10) {
                // Execute the second query
                $pu2 = static::inStock()->hasImage()->orderByDesc("id")->take(10 - $qr->count());
                $qr2 = $pu2->get();
                // Merge the results from both queries and remove duplicates
                $mergedResults = $qr->merge($qr2)->unique('id');
        
                return $mergedResults;
            }
            return $qr;
        });
    }

    
    public function toSitemapTag(): Url | string | array
    {
        // Return with fine-grained control:
        return Url::create(route('products.show', $this->id))->
        setChangeFrequency("weekly")->setLastModificationDate($this->updated_at)->setPriority(0.6);
    }
}
