<?php

namespace Grassstation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public static function storeFile($path)
    {
        $isf = new self(["url"=>$path]);
        $isf->save();
        return $isf;
    }
    public static function qdfs(){
        return static::query()->orderByDesc('id');
    }
}
