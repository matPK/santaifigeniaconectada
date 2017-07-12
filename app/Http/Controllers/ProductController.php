<?php

namespace App\Http\Controllers;

use App\Product;
use App\Photo;
use App\Tag;
use App\User;
use App\Store;
use Session;
use Auth;
use Purifier;
use Illuminate\Http\Request;
use Cloudinary\Uploader;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p = Product::with(['store' => function($s){
            $s->where('user_id', Auth::user()->id);
        }])
        ->paginate(8);

        return view('produtos.index')->with('products', $p);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all()->sortBy('name');
        $stores = Store::where('user_id', '=', Auth::user()->id)->get();
        $t = [];
        $s = [];
        foreach($stores as $store){
            $s[$store->id] = $store->name;
        }
        foreach($tags as $tag){
            $t[$tag->id] = $tag->name;
        }
        return view('produtos.create')
            ->with('stores', $s)
            ->with('tags', $t);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create slug from product name and insert it on request
        $request->request->add(['slug' => gen_slug($request->name, $request->store_id)]);
        //validate fields, create new product and fill it's fields
        $this->validate($request, [
            'name' => 'required|between:10,255',
            'price' => 'required|numeric',
            'slug' => 'required|between:10,255|alpha_dash|unique:products',
            'store_id' => 'required|numeric',
            'product_photos' => 'array',
            'product_photos.*' => 'image|mimes:jpg,jpeg,png,gif'		
        ]);
        $product = new Product;
        foreach($request->except(['_token', 'product_photos', 'tags']) as $field => $value){
            if($field === 'description'){ $value = Purifier::clean($value); }
            $product->$field = $value;
        }
        //store, associate and sync
        $product->save();
        
        $product->tags()->sync($request->tags, false);
        //create photos
        foreach($request->allFiles()['product_photos'] as $file){
            $photo = new Photo;
            $status = Uploader::upload($file->path(), ['folder' => 'products', 'format' => 'jpg', 'quality' => 90]);
            $photo->public_id = str_replace('products/', '', $status['public_id']);
            $photo->product_id = $product->id;
            $photo->save();
        }
        //success message and redirect
        Session::flash('success', "Produto '{$product->name}' cadastrado com sucesso!");
        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('veio parar aqui');
        //return view('produtos.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all()->sortBy('name');
        $stores = Store::where('user_id', '=', Auth::user()->id)->get();
        $t = [];
        $s = [];
        foreach($stores as $store){
            $s[$store->id] = $store->name;
        }
        foreach($tags as $tag){
            $t[$tag->id] = $tag->name;
        }
        $p = Product::find($id);
        return view('produtos.edit')
            ->with('product', $p)
            ->with('tags', $t)
            ->with('stores', $s);                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->request->set('price', str_replace(",", ".", str_replace(".", "", $request->price)));
        $request->request->add(['slug' => gen_slug($request->name, $request->store_id)]);
        //validate the data
        $this->validate($request, [
            'name' => 'required|between:10,255',
            'price' => 'required|numeric',
	   'store_id' => 'required|numeric',
            'slug'  => "required|alpha_dash|min:5|max:255|unique:products,slug,$id",
        ]);

        //update it in the db
        $product = Product::find($id);
        foreach($request->except(['_token', '_method', 'current_slug', 'tags']) as $field => $value){
            if($field === 'description'){ $value = Purifier::clean($value); }
            $product->$field = $value;
        }

        $product->save();
        
        if(isset($request->tags)){
            $product->tags()->sync($request->tags);
        }else{
            $product->tags()->sync([]);
        }
        
        //set flash
        Session::flash('success', "Produto '{$product->name}' editado com sucesso!");
        
        //redirect to another page
        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Product::find($id);
        $name = $prod->name;
        $prod->delete();
        
        Session::flash('success', "Produto '{$name}' excluído com sucesso");
        
        return redirect()->route('produtos.index');
    }
}
