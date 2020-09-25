<?php

namespace App\Http\Controllers\Wings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Models\Wings\WingModel;
use App\Http\Requests\Wings\Wing as WingRequest;

class WingController extends Controller
{
    /** @var WingModel $wingModel */
    private $wingModel;

    /**
     * WingController constructor.
     * @param WingModel $wingModel
     */
    public function __construct(WingModel $wingModel)
    {
        $this->wingModel = $wingModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('wings.index', [
            'wingList' => $this->wingModel->getWingListWithPaginate($request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('wings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param WingRequest $request
     * @return JsonResponse
     */
    public function store(WingRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Wing added successfully.',
            'data' => $this->wingModel->saveWing($request, $id = 0)
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id)
    {
        return view('wings.edit', [
            'wingDetail' => $this->wingModel->getWingDetail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WingRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update(WingRequest $request, int $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Wing updated successfully.',
            'data' => $this->wingModel->saveWing($request, $id)
        ], 200);
    }
}
