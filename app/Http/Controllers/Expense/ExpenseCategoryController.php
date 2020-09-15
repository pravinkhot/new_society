<?php

namespace App\Http\Controllers\Expense;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expenses\Category\CategoryModel as ExpenseCategoryModel;
use App\Http\Requests\Expenses\Category\ExpenseCategory as ExpenseCategoryRequest;

class ExpenseCategoryController extends Controller
{
    /** @var ExpenseCategoryModel $expenseCategoryModel */
    private $expenseCategoryModel;

    /**
     * ExpenseCategoryController constructor.
     * @param ExpenseCategoryModel $expenseCategoryModel
     */
    public function __construct(ExpenseCategoryModel $expenseCategoryModel)
    {
        $this->expenseCategoryModel = $expenseCategoryModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('expenses.category.index', [
            'expenseCategoryList' => $this->expenseCategoryModel->getExpenseCategoryListWithPaginate($request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ExpenseCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ExpenseCategoryRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Expense category added successfully.',
            'data' => $this->expenseCategoryModel->saveExpenseCategory($request, $id = 0)
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('expenses.category.edit', [
            'expenseCategoryDetail' => $this->expenseCategoryModel->getExpenseCategoryDetail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ExpenseCategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseCategoryRequest $request, int $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Expense category updated successfully.',
            'data' => $this->expenseCategoryModel->saveExpenseCategory($request, $id)
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
