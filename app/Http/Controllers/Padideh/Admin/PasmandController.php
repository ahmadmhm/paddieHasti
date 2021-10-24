<?php

namespace App\Http\Controllers\Padideh\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasmand;
use App\Repositories\Admin\pasmandRepo;
use Illuminate\Http\Request;

class PasmandController extends Controller
{
    public $pasmandRepo;
    public function __construct(PasmandRepo $pasmandRepo)
    {
        $this->pasmandRepo = $pasmandRepo;
    }

    public function index()
    {
        return $this->pasmandRepo->all();
    }


    public function create()
    {
        return $this->pasmandRepo->create();

    }


    public function store(Request $request)
    {
        return $this->pasmandRepo->store($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pasmand $pasmand)
    {
        return $this->pasmandRepo->show($pasmand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasmand $pasmand)
    {
        return $this->pasmandRepo->edit($pasmand);

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
        return $this->pasmandRepo->update($request,$pasmand);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasmand $pasmand)
    {
        return $this->pasmandRepo->destroy($pasmand);
    }
}
