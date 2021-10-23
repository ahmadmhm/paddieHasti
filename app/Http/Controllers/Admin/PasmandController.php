<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasmand;
use App\Repositories\Admin\PasmandRepo;
use Illuminate\Http\Request;

class PasmandController extends Controller
{
    public $pasmandRepo;
    public function __construct(PasmandRepo $pasmandRepo)
    {
        $this->PasmandRepo = $pasmandRepo;
    }
    
    public function index()
    {
        return $this->PasmandRepo->all();
    }

    
    public function create()
    {
        return $this->PasmandRepo->create();

    }


    public function store(Request $request)
    {
        return $this->PasmandRepo->store($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pasmand $pasmand)
    {
        return $this->PasmandRepo->show($pasmand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasmand $pasmand)
    {
        return $this->PasmandRepo->edit($pasmand);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pasmand $pasmand)
    {
        return $this->PasmandRepo->update($request,$pasmand);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasmand $pasmand)
    {
        return $this->PasmandRepo->destroy($pasmand);
    }
}
