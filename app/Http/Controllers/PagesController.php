<?php

namespace App\Http\Controllers;

use Auth;
use App\Store;
use App\Product;
use DB;
use Session;
use App\Search;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct(Request $request = null) {
        parent::__construct();
        if(!is_null($request) && $request->ost == 1){
            Session::put("showConnectButton", true);
        }
    }
    
    public function redirect(){
        Session::pull("showConnectButton");
        return redirect()->to("http://192.168.20.1:8080");
    }
    
    //
    public function getIndex(Request $request = null){
        
        //mostrar o botão caso tenha sido redirecionado pela OSTECH

        
        $top5 = DB::table('searches')
            ->join('tags', 'name', 'like', DB::raw("concat('%', searches.term, '%')"))
            ->selectRaw("distinct(tags.name), count(searches.id) as n")
            ->groupBy(['tags.name'])
            ->orderBy('n', 'desc')
            ->limit(5)
            ->get();
        
        return view('pages.index')->with('top5', $top5);
    }
    
    public function getSearch(Request $request = null){
        if(is_null($request->termo)){
            return redirect()->route('home');
        }
        $search = new Search;
        $search->term = $request->termo;
        $search->save();
        
        $t = "%{$request->termo}%";
        $r = Product::select('products.*')
            ->where('products.name', 'LIKE', $t)
            ->orWhere('products.description', 'LIKE', $t)
            ->orWhere('tags.name', 'LIKE', $t)
            ->leftJoin('product_tag', 'product_tag.product_id', '=', 'products.id')
            ->leftJoin('tags', 'tags.id', '=', 'product_tag.tag_id')
            ->groupBy(
                'products.id', 'products.name', 'products.slug',
                'products.description', 'products.price', 'products.created_at',
                'products.updated_at', 'products.deleted_at', 'products.store_id')
            ->paginate(8);
        
        return view('pages.search')
            ->withResultset($r)
            ->with('searchTerm', $request->termo);
        
        
    }
    
    public function getLojista(){
        $sc = Store::where('user_id', '=', Auth::user()->id)->count();

        $pc = Product::with(['store' => function($s){
            $s->where('user_id', Auth::user()->id);
        }])
        ->get()
        ->count();
        
        return view('pages.lojista')
            ->with('stores_count', $sc)
            ->with('products_count', $pc);
    }
    
    public function getAnuncio(){
        return view('anuncios.index');
    }
    
    public function showAnuncio($slug){

        $p = Product::where('slug', $slug)->first();
        
        $el = implode('',[
            'https://www.google.com/maps/embed/v1/place',
            '?key=', env('GOOGLE_MAPS_API_KEY'),
            '&q=', urlencode($p->store->address)
        ]);
        
        return view('anuncios.show')->with('product', $p)->with('embed_link', $el);
    }
    
    public function showLoja($id){
        $s = Store::find($id);
        
        $el = implode('',[
            'https://www.google.com/maps/embed/v1/place',
            '?key=', env('GOOGLE_MAPS_API_KEY'),
            '&q=', urlencode($s->address)
        ]);
        
        return view('lojas.show')->with('store', $s)->with('embed_link', $el);
    }
}
