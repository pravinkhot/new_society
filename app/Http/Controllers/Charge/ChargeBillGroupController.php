<?php

namespace App\Http\Controllers\Charge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Charges\BillGroup\BillGroupModel as ChargeBillGroupModel;
use App\Http\Requests\Charges\BillGroup\ChargeBillGroup as ChargeBillGroupRequest;

class ChargeBillGroupController extends Controller
{
    /** @var ChargeBillGroupModel $chargeBillGroupModel */
    private $chargeBillGroupModel;

    function __construct(ChargeBillGroupModel $chargeBillGroupModel)
    {
        $this->chargeBillGroupModel = $chargeBillGroupModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return view('charges.bill_group.index', [
            'billGroupList' => $this->chargeBillGroupModel->getChargeBillGroupWithPaginate($request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('charges.bill_group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChargeBillGroupRequest $request
     * @return Response
     */
    public function store(ChargeBillGroupRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Bill group is added successfully.',
            'data' => $this->chargeBillGroupModel->saveBillGroup($request, $id = 0)
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('charges.bill_group.edit', [
            'billGroupDetail' => $this->chargeBillGroupModel->getBillGroupDetail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ChargeBillGroupRequest $request
     * @param int $id
     * @return Response
     */
    public function update(ChargeBillGroupRequest $request, $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Bill group is updated successfully.',
            'data' => $this->chargeBillGroupModel->saveBillGroup($request, $id)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
