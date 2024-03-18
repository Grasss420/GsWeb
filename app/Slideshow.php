<?php
namespace App;
use Illuminate\Support\Facades\Storage;

Class Slideshow{
    public $SS_EXTS = [".jpg",".png",".webp",".jpeg"];
    private static function getImages()
    {
        $files = Storage::files(env("GS_STORAGE"));
        return static::filterExt($files,static::$SS_EXTS);
    }
    public static function filterExt($files = []){
        foreach ($files as $n => $bss) {
            dd($bss);
        }
    }

    private static function fna($e){
        return '<div class="carousel-item">
        <img src="'.$e.'" class="d-block w-100" alt="">
    </div>';
    }

    private static function bnt(){
        
    }

    public static function createInstance()
    {
        return <<<EOT
        <div class="carousel-inner">
        
      </div>
EOT;
    }
}