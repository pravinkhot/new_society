<?php

namespace App\Http\Controllers\Incomes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incomes\Category\CategoryModel as IncomeCategoryModel;
use App\Http\Requests\Incomes\Category\IncomeCategory as IncomeCategoryRequest;

class IncomeCategoryController extends Controller
{
    /** @var IncomeCategoryModel $incomeCategoryModel */
    private $incomeCategoryModel;

    /**
     * IncomeCategoryController constructor.
     * @param IncomeCategoryModel $incomeCategoryModel
     */
    public function __construct(IncomeCategoryModel $incomeCategoryModel)
    {
        $this->incomeCategoryModel = $incomeCategoryModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('incomes.category.index', [
            'incomeCategoryList' => $this->incomeCategoryModel->getIncomeCategoryListWithPaginate($request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incomes.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IncomeCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(IncomeCategoryRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Income category added successfully.',
            'data' => $this->incomeCategoryModel->saveIncomeCategory($request, $id = 0)
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        return view('incomes.category.edit', [
            'incomeCategoryDetail' => $this->incomeCategoryModel->getIncomeCategoryDetail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param IncomeCategoryRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(IncomeCategoryRequest $request, int $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Income category updated successfully.',
            'data' => $this->incomeCategoryModel->saveIncomeCategory($request, $id)
        ], 200);
    }
}
