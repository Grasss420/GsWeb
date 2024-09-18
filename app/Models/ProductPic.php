<?php

namespace Grassstation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @author  MoNolidThZ - SPKZ Design Co. <admin@monolidthz.com>
 * @version 1.0.0
 * @since 1.0.0 (Creation Time Unknown)
 * 
 * Picjer of a product image
 */
class ProductPic extends Model
{
    use HasFactory;
    protected $fillable = ["url","description"];
    public static function getVProductx()
    {
        $mq = static::query();
        if(!$mq->count()){
            return [];
        }
    }

    /**
     * Return a public URL of image link
     */
    public function getURL()
    {
        if(str_starts_with($this->url, "public/gsi/")){
            return asset(str_replace("public/gsi/","storage/gsi/",$this->url));
        }else{
            return $this->url;
        }
    }

    public function __tostring()
    {
        return '<img src="'.$this->getURL().'">';
    }

    /**
     * Internal function to store files
     */
    public static function storeFile($path)
    {
        $isf = new self(["url"=>$path]);
        $isf->save();
        return $isf;
    }

    /**
     * Query Default Sorting
     */
    public static function qdfs(){
        return static::query()->orderByDesc('id');
    }
}
