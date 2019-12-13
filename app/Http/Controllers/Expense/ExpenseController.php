<?php

namespace App\Http\Controllers\Expense;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use App\Models\Expense as ExpenseModel;
use App\Models\Society as SocietyModel;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenseList = ExpenseModel::orderBy('expenses.created_at', 'DESC')
                    ->paginate(config('custom.defaultPaginationCount'));
        return view('expenses.index', [
            'expenseList' => $expenseList
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
    public function store(Request $request)
    {
        $inputs = $request->all();
        return $this->doDbAction($inputs, new ExpenseModel());
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
        $expenseDetail = ExpenseModel::findOrfail($id);
        return view('expenses.edit', [
            'expenseDetail' => $expenseDetail
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expenceModel = ExpenseModel::find($id);
        $inputs = $request->except('_method');
        return $this->doDbAction($inputs, $expenceModel);
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
     * Perform validation and database action
     *
     * @param  array  $inputs
     * @param  \App\Models\Expense  $dbModelObject
     * @return void
     */
    protected function doDbAction(array $inputs, ExpenseModel $dbModelObject)
    {
        $validator = $this->validator($inputs, $dbModelObject->id ?? null);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        } else {
            $expenseTableColumns = [
                'authorised_by', 'expense_category_id', 'amount', 'vendor_name', 'bill_date', 'payment_date', 'payment_mode_id', 'cheque_no', 'description'
            ];

            foreach ($expenseTableColumns as $expenseTableColumn) {
                $dbModelObject->$expenseTableColumn = $inputs[$expenseTableColumn] ?? null;
            }
            $dbModelObject->society_id = \Session::get('user.society_id');

            if (empty($dbModelObject->id)) {
                $dbModelObject->created_by = \Auth::user()->id;
                $successMsg = 'Expense added successfully.';
            } else {
                $dbModelObject->updated_by = \Auth::user()->id;
                $successMsg = 'Expense updated successfully.';
            }
            $dbModelObject->save();

            return response()->json([
                'success' => true,
                'message' => $successMsg
            ], 200);
        }
    }

    /**
     * Get a validator for an incoming expense request.
     *
     * @param  array  $data
     * @param  mix  $expenseId
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $expenseId = null)
    {
        $rules = [
            'expense_category_id' => [
                'required'
            ],
            'vendor_name' => [
                'required',
                'max:50'
            ],
            'bill_date' => [
                'required',
                'date_format:"d-m-Y"'
            ],
            'payment_date' => [
                'required',
                'date_format:"d-m-Y"'
            ],
            'amount' => [
                'required',
                'regex: /^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'
            ],
            'authorised_by' => [
                'required'
            ],
            'payment_mode_id' => [
                'required'
            ],
            'cheque_no' => Rule::requiredIf(function () use ($data) {
                if ($data['payment_mode_id'] == 2) {
                    return true;
                }
            }),
        ];
        $messages = [
            'type.required' => 'Please enter expense type.',
            'type.max' => 'Expense type should not be greater than 50 character.',
            'vendor_name.required' => 'Please enter vendor name.',
            'vendor_name.max' => 'Vendor name should not be greater than 50 character.',
            'bill_date.required' => 'Please select bill date.',
            'bill_date.date_format' => 'Please enter valid bill date.',
            'payment_date.required' => 'Please select payment date.',
            'payment_date.date_format' => 'Please enter valid payment date.',
            'amount.required' => 'Please enter amount.',
            'amount.regex' => 'Please enter valid amount.',
            'payment_mode_id.required' => 'Please select payment mode.',
            'cheque_no.required' => 'Please enter cheque no.'
        ];
        return \Validator::make($data, $rules, $messages);
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
