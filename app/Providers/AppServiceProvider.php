<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Store;
use App\Product;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
	public function boot()
	{
		
            	Validator::extend('cnpj', 'App\Http\CnpjValidator@validateCnpj');
        
                  if(empty(\Cloudinary::config())){
                    \Cloudinary::config([
                        "cloud_name" => env('CLOURINARY_NAME', 'none'), 
                        "api_key"    => env('CLOUDINARY_KEY', 'none'), 
                        "api_secret" => env('CLOUDINARY_SECRET', 'none') 
                    ]);
                  }

		Product::paginate()->setPageName('pagina');
		Store::paginate()->setPageName('pagina');

		Store::deleting(function($s){
			$products = Product::where('store_id', $s->id)->get();
			foreach($products as $product){
				$product->photos()->delete();
			}
			$s->products()->delete();
		});

		Product::deleting(function($p){
			$p->photos()->delete();
		});
	}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
