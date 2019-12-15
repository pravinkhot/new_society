<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flats\FlatModel;
use App\Http\Requests\Flats\Flat as FlatRequest;

class FlatController extends Controller
{
    private $flatModel;

    function __construct(FlatModel $flatModel)
    {
        $this->flatModel = $flatModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('flats.index', [
            'flatList' => $this->flatModel->getFlatListWithPaginate($request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Flats\Flat  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlatRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Flat added successfully.',
            'data' => $this->flatModel->saveFlat($request, $id = 0)
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('flats.edit', [
            'flatDetail' => $this->flatModel->getFlatDetail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Flats\Flat  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FlatRequest $request, $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Flat updated successfully.',
            'data' => $this->flatModel->saveFlat($request, $id)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
