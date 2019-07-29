<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use App\Models\Flat as FlatModel;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flatList = FlatModel::orderBy('flats.created_at', 'DESC')
                    ->paginate(config('custom.defaultPaginationCount'));
        return view('flats.index', [
            'flatList' => $flatList
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->except('_method');
        return $this->doDbAction($inputs, new FlatModel());
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
        $flatDetail = FlatModel::findOrfail($id);
        return view('flats.edit', [
            'flatDetail' => $flatDetail
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
        $flatModel = FlatModel::find($id);
        $inputs = $request->except('_method');
        return $this->doDbAction($inputs, $flatModel);
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
     * @param  array  $data
     * @param  \App\User  $user
     * @return void
     */
    private function doDbAction(array $inputs, FlatModel $dbModelObject)
    {
        $validator = $this->validator($inputs, $dbModelObject->id ?? null);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        } else {
            $flatTableColumns = [
                'wing_id', 'flat_status_id', 'flat_no', 'sq_foot', 'intercom', 'owner_fn', 'owner_ln', 'owner_number'
            ];

            foreach ($flatTableColumns as $flatTableColumn) {
                $dbModelObject->$flatTableColumn = $inputs[$flatTableColumn] ?? null;
            }
            $dbModelObject->society_id = \Session::get('user.society_id');

            if (empty($dbModelObject->id)) {
                $dbModelObject->created_by = \Auth::user()->id;
                $dbModelObject->save();
                $dbMethod = 'create';
                $successMsg = 'Flat added successfully.';
            } else {
                $dbModelObject->updated_by = \Auth::user()->id;
                $dbMethod = 'update';
                $successMsg = 'Flat updated successfully.';
            }
            $dbModelObject->save();

            return response()->json([
                'success' => true,
                'message' => $successMsg
            ], 200);
        }
    }

    /**
     * Get a validator for an incoming event request.
     *
     * @param  array  $data
     * @param  mix  $flatId
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validator(array $data, $flatId = null)
    {
        $rules = [
            'flat_no' => [
                'required',
                'max:50',
                Rule::unique('flats')->ignore($flatId)->where(function ($query) use ($data) {
                    return $query->where('wing_id', $data['wing_id']);
                })
            ],
            'wing_id' => ['required'],
            'sq_foot' => ['regex:/^\d*(\.\d{2})?$/'],
            'flat_status_id' => 'required',
            'owner_fn' => 'required',
            'owner_ln' => 'required',
            'owner_number' => [
                'required',
                'integer',
                'digits:10'
            ]
        ];
        $messages = [
            'owner_fn.required' => 'The owner first name field is required.',
            'owner_ln.required' => 'The owner last name field is required.',
            'owner_number.integer' => 'The mobile no must be a number.',
            'sq_foot.regex' => 'Please enter valid number like XXXXX.XX'
        ];
        return \Validator::make($data, $rules, $messages);
    }
}
