<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\ServiceModel;
use App\Http\Requests\Services\Service as ServiceRequest;

class ServiceController extends Controller
{
    private $serviceModel;

    function __construct(ServiceModel $serviceModel)
    {
        $this->serviceModel = $serviceModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('services.index', [
            'serviceList' => $this->serviceModel->getServiceListWithPaginate($request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Services\Service  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Service added successfully.',
            'data' => $this->serviceModel->saveService($request, $id = 0)
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
        return view('services.edit', [
            'serviceDetail' => $this->serviceModel->getServiceDetail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Services\Service  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully.',
            'data' => $this->serviceModel->saveService($request, $id)
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
