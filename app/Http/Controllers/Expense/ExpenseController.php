<?php

namespace App\Http\Controllers\Expense;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Expenses\ExpenseModel;
use App\Http\Requests\Expenses\Expense as ExpenseRequest;

class ExpenseController extends Controller
{
    private $expenseModel;

    function __construct(ExpenseModel $expenseModel)
    {
        $this->expenseModel = $expenseModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('expenses.index', [
            'expenseList' => $this->expenseModel->getExpenseListWithPaginate($request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Expense added successfully.',
            'data' => $this->expenseModel->saveExpense($request, $id = 0)
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
        return view('expenses.edit', [
            'expenseDetail' => $this->expenseModel->getExpenseDetail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseRequest $request, $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Expense updated successfully.',
            'data' => $this->expenseModel->saveExpense($request, $id)
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

    /**
     * This function is used to view invoice of expense
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Int $expenseId
     * @return \Illuminate\Http\Response
     */
    public function viewInvoice(Request $request, int $expenseId)
    {
        $societyDetail = SocietyModel::where([
            'societies.id' => \Session::get('user.society_id')
        ])->first();
        $expenseDetail = ExpenseModel::findOrfail($expenseId);

        return view('expenses.invoice', [
            'societyDetail' => $societyDetail,
            'expenseDetail' => $expenseDetail
        ]);
    }
}
