<?php

namespace App\Http\Controllers;

use App\Models\CrudExample;
use Illuminate\Http\Request;

class CrudExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crudData = CrudExample::all();
        return response()->json($crudData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crudData = CrudExample::create($request->post());
        return response()->json([
            'crudData' => $crudData
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CrudExample  $crudExample
     * @return \Illuminate\Http\Response
     */
    public function show(CrudExample $crud)
    {
        return response()->json($crud);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CrudExample  $crudExample
     * @return \Illuminate\Http\Response
     */
    public function edit(CrudExample $crudData)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CrudExample  $crudExample
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CrudExample $crud)
    {
        $crud->fill($request->post())->save();
        return response()->json([
            'crudData' => $crud
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CrudExample  $crudExample
     * @return \Illuminate\Http\Response
     */
    public function destroy(CrudExample $crud)
    {
        $crud->delete();
        return response()->json([
            'mesaje' => "Delete row"
        ]);
    }
}
