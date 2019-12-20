<?php

namespace App\Http\Controllers\Incomes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incomes\IncomeModel;
use App\Http\Requests\Incomes\Income as IncomeRequest;

class IncomeController extends Controller
{
    private $incomeModel;

    function __construct(IncomeModel $incomeModel)
    {
        $this->incomeModel = $incomeModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('incomes.index', [
            'incomeList' => $this->incomeModel->getIncomeListWithPaginate($request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incomes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Incomes\Income  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncomeRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Income added successfully.',
            'data' => $this->incomeModel->saveIncome($request, $id = 0)
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
        return view('incomes.edit', [
            'incomeDetail' => $this->incomeModel->getIncomeDetail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Incomes\Income  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IncomeRequest $request, $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Income updated successfully.',
            'data' => $this->incomeModel->saveIncome($request, $id)
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
