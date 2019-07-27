<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Helpers\CommonFunction;

use App\User as UserModel;
use App\Models\UserSociety as UserSocietyModel;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberList = UserModel::orderBy('users.created_at', 'DESC')
                    ->paginate(config('custom.defaultPaginationCount'));
        return view('members.index', [
            'memberList' => $memberList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
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
        return $this->doDbAction($inputs, new UserModel());
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
        if (\Auth::id() == $id) {
            abort(403);
        }
        $memberDetail = UserModel::findOrfail($id);
        return view('members.edit', [
            'memberDetail' => $memberDetail
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
        $memberModel = UserModel::find($id);
        $inputs = $request->except('_method');
        return $this->doDbAction($inputs, $memberModel);
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
    private function doDbAction(array $inputs, UserModel $dbModelObject)
    {
        $validator = $this->validator($inputs, $dbModelObject->id ?? null);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        } else {
            $userTableColumns = [
                'first_name', 'last_name', 'gender', 'email', 'mobile_no', 'dob'
            ];
            $result = [];
            foreach ($userTableColumns as $userTableColumn) {
                $dbModelObject->$userTableColumn = $inputs[$userTableColumn] ?? null;
            }

            if (empty($dbModelObject->id)) {
                $dbModelObject->created_by = \Auth::user()->id;
                $rawPassword = CommonFunction::randomPasswordGenerator();
                $dbModelObject->password = $rawPassword;

                $dbModelObject->save();
                $dbMethod = 'create';
                $successMsg = 'Member added successfully.';
            } else {
                $dbModelObject->updated_by = \Auth::user()->id;
                $dbMethod = 'create';
                $successMsg = 'Member added successfully.';
            }
            $dbModelObject->save();

            UserSocietyModel::where([
                'user_id' => $dbModelObject->id,
                'society_id' => \Session::get('user.society_id')
            ])
            ->delete();
           
            $userSocietyModel = new UserSocietyModel();
            $userSocietyModel->society_id = \Session::get('user.society_id');
            $userSocietyModel->user_id = $dbModelObject->id;
            $userSocietyModel->role_id = $input['role_id'] ?? null;
            $userSocietyModel->save();

            if ($dbMethod == 'create') {
                // $dbModelObject->setAttribute('rawPassword', $rawPassword);
                // $dbModelObject->sendEmailVerificationNotification();
                // $dbModelObject->offsetUnset('rawPassword');
            }
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
     * @param  mix  $memberId
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validator(array $data, $memberId = null)
    {
        $rules = [
            'first_name' => ['required','max:50'],
            'middle_name' => ['max:50'],
            'last_name' => ['required','max:50'],
            'gender' => 'required',
            'dob' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($memberId)
            ],
            'mobile_no' => [
                'required',
                'integer',
                'digits:10'
            ],
            'role_id' => 'required'
        ];
        $messages = [
            'mobile_no.integer' => 'The mobile no must be a number.'
        ];
        return \Validator::make($data, $rules, $messages);
    }
}
