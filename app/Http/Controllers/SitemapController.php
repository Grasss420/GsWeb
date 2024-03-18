<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\SitemapIndex;

class SitemapController extends Controller
{
    public function index()
    {//SitemapGenerator $sg
        //$sg = SitemapGenerator::create('https://grassstation.xyz');
        //Sitemap $sitemap
        $sitemap = Sitemap::create();
        $sitemap->add(Url::create('/')->setChangeFrequency("weekly")->setPriority(0.4));
        $sitemap->add(Url::create(route('menu'))->setChangeFrequency("daily")->setPriority(0.95));
        //$sitemap->add('/contact');

        // Dynamically add routes from a database (example):
        $products = Product::all();
        foreach ($products as $product) {
            if($product->status =="hidden"){ continue; }
            $sitemap->add($product); // Set last modified and priority
        }
        //return $sitemap->toResponse(request());
        $sitemap->writeToFile("sitemap.xml");
        
        return "Generated sitemap   grassstation.xyz/sitemap.xml".Carbon::now();
    }
}
