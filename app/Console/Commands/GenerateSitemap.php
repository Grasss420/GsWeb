<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a Sitemap to Sitemap.xml File';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $sitemap = Sitemap::create();
        $sitemap->add(Url::create('/')->setChangeFrequency("monthly")->setPriority(0.4));
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
        
        //return "Generated sitemap   grassstation.xyz/sitemap.xml".Carbon::now();
        return 0;
    }
}
