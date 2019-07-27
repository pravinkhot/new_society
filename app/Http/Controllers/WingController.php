<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Wing as WingModel;

class WingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wingList = WingModel::orderBy('wings.created_at', 'DESC')
                    ->paginate(config('custom.defaultPaginationCount'));
        return view('wings.index', [
            'wingList' => $wingList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return $this->doDbAction($inputs, new WingModel());
    }

    /**
     * Get a validator for an incoming wing request.
     *
     * @param  array  $data
     * @param  mix  $wingId
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $wingId = null)
    {
        $rules = [
            'name' => [
                'required',
                'max:50',
                'email' => Rule::unique('wings')->ignore($wingId)
                        ->where(function ($query) {
                            return $query->whereNull('deleted_at');
                        })
            ],
        ];
        $messages = [
            'name.required' => 'Please enter wing name.',
            'name.max' => 'Wing name should not be greater than 50 character.'
        ];
        return \Validator::make($data, $rules, $messages);
    }

    /**
     * Perform validation and database action
     *
     * @param  array  $inputs
     * @param  \App\Models\Wing  $dbModelObject
     * @return void
     */
    protected function doDbAction(array $inputs, WingModel $dbModelObject)
    {
        $validator = $this->validator($inputs, $dbModelObject->id ?? null);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        } else {
            if (empty($dbModelObject->id)) {
                $inputs['created_by'] = \Auth::user()->id;
                $successMsg = 'Wing added successfully.';
            } else {
                $inputs['updated_by'] = \Auth::user()->id;
                $successMsg = 'Wing edited successfully.';
            }
            $dbModelObject->name = $inputs['name'] ?? null;
            $dbModelObject->description = $inputs['description'] ?? null;
            $dbModelObject->society_id = \Session::get('user.society_id');
            $dbModelObject->fill($inputs);
            $dbModelObject->save();

            return response()->json([
                'success' => true,
                'message' => $successMsg
            ], 200);
        }
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
        $wingDetail = WingModel::findOrFail($id);
        return view('wings.edit', [
            'wingDetail' => $wingDetail
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
        $wingDetail = WingModel::find($id);
        $inputs = $request->except('_method');
        return $this->doDbAction($inputs, $wingDetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wing = WingModel::find($id);
        $wing->delete();
        return response()->json([
            'success' => true,
            'deletedRecordDetail' => $wing,
            'message' => 'Wing deleted successfully.'
        ], 200);
    }
}
