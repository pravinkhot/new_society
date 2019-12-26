<?php

namespace App\Http\Controllers\Incomes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incomes\IncomeCategoryModel;
use App\Http\Requests\Incomes\IncomeCategory as IncomeCategoryRequest;

class IncomeCategoryController extends Controller
{
    private $incomeCategoryModel;

    function __construct(IncomeCategoryModel $incomeCategoryModel)
    {
        $this->incomeCategoryModel = $incomeCategoryModel;
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
}
