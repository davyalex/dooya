<?php

namespace App\Http\Controllers;

use App\Models\CodePromo;
use App\Http\Requests\StoreCodePromoRequest;
use App\Http\Requests\UpdateCodePromoRequest;

class CodePromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCodePromoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCodePromoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CodePromo  $codePromo
     * @return \Illuminate\Http\Response
     */
    public function show(CodePromo $codePromo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CodePromo  $codePromo
     * @return \Illuminate\Http\Response
     */
    public function edit(CodePromo $codePromo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCodePromoRequest  $request
     * @param  \App\Models\CodePromo  $codePromo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCodePromoRequest $request, CodePromo $codePromo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CodePromo  $codePromo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CodePromo $codePromo)
    {
        //
    }
}
