<?php
namespace App\Repositories\Admin;

use App\Models\Padideh\Pasmand;
use App\Models\Padideh\Product;
use App\Models\Padideh\ProductCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class PasmandRepo {

    public function all(){
        $pasmands = Pasmand::latest()->paginate(15);
        return view('Padideh.pasmands.index')->with([
            'pasmands' => $pasmands,
        ]);
    }

    public function create()
    {
        return view('Padideh.pasmands.create');
    }

    public function store($request)
    {
        $image = null;
        if(!empty($request->file('icon'))){
            $image =$request->file('icon')->store('images/pasmands/icon','local');
        }
        $pasmands = Pasmand::create([
            'name' => $request->input('name'),
            'vahed' => $request->input('vahed'),
            'buy_price' => $request->input('buy_price'),
            'sale_price' => $request->input('sale_price'),
            'description' => $request->input('description'),
            'icon' => $image,
            'is_active' => $request->input('is_active') ? true : false,
        ]);


        return \redirect()->route('panel.pasmands.index')->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }
    public function show($pasmand)
    {
        return view('Padideh.pasmands.show')->with([
            'pasmand' => $pasmand
        ]);
    }
    public function edit($pasmand)
    {
        return view('Padideh.pasmands.edit')->with([
            'pasmand' => $pasmand,
        ]);
    }

    public function update($request,$pasmand){
        if(!empty($request->file('icon'))){
            $image =$request->file('icon')->store('images/pasmands/icon','local');
        }else{
            $image = $pasmand->image;
        }
        $pasmand->update([
            'name' => $request->input('name'),
            'vahed' => $request->input('vahed'),
            'buy_price' => $request->input('buy_price'),
            'sale_price' => $request->input('sale_price'),
            'description' => $request->input('description'),
            'icon' =>  $image,
            'is_active' => $request->input('is_active') ? true : false,
        ]);
        return \redirect()->route('panel.pasmands.index')->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }


    public function destroy($pasmand)
    {
        File::delete($pasmand->image);
        $pasmand->delete();
        return \redirect()->back()->with([
            'success' => 'با موفقیت ثبت شد'
        ]);
    }


}
