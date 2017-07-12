<?php

namespace App\Http\Controllers;

use App\Store;
use Auth;
use Session;
use Purifier;
use Illuminate\Http\Request;
use Cloudinary\Uploader;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $s = Store::where('user_id', '=', Auth::user()->id)->paginate(5);
        return view('lojas.index')->with('stores', $s);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lojas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->set('phone', str_replace([' ', '-', '+'], '', $request->phone));
        $this->validate($request, [
            'name' => 'required|min:5|max:255',
            'address' => 'required|min:5|max:255',
	   'logo_file' => 'required|image',
            'phone' =>'numeric',
            'cnpj' => 'required|numeric|digits:14|cnpj|unique:stores,deleted_at,NULL'
        ]);
        
        $store = new Store;
        foreach($request->except(['_token', 'logo_file']) as $key => $value){
            if($key === 'description'){$value = Purifier::clean($value);}
            $store->$key = $value;
        }
            
        $status = Uploader::upload($request->file()['logo_file']->path(), ['folder' => 'stores', 'format' => 'jpg', 'quality' => 90]);
        $store->logo_id = str_replace('stores/', '', $status['public_id']);
        $store->user_id = Auth::user()->id;
        
        $store->save();
        
        Session::flash('success', "Loja '{$store->name}' cadastrada com sucesso!");
        
        return redirect()->route('lojas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $s = Store::find($id);
        return view('lojas.edit')->with('store', $s);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->request->set('phone', str_replace([' ', '-', '+'], '', $request->phone));
        $this->validate($request, [
            'name' => 'required|min:5|max:255',
            'address' => 'required|min:5|max:255',
            'phone' => 'numeric',
            'cnpj' => "required|numeric|digits:14|cnpj|unique:stores,cnpj,$id"
        ]);
        
        $s = Store::find($id);
        foreach($request->except(['_token', '_method', 'current_cnpj']) as $key => $value){
            if($key === 'description'){$value = Purifier::clean($value);}
            $s->$key = $value;
        }
        
        $s->save();
        
        Session::flash('success', "Loja '{$s->name}' editada com sucesso!");
        
        return redirect()->route('lojas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store = Store::find($id);
        $name = $store->name;
        $store-> delete();
        
        Session::flash('success', "Loja '{$name}' excluída com sucesso");
        
        return redirect()->route('lojas.index');
    }
}
