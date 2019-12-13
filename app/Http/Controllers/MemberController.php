<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Members\MemberModel;
use App\Http\Requests\Members\Member as MemberRequest;

class MemberController extends Controller
{
    private $memberModel;

    function __construct(MemberModel $memberModel)
    {
        $this->memberModel = $memberModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('members.index', [
            'memberList' => $this->memberModel->getMemberListWithPaginate($request)
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
     * @param  \Illuminate\Http\Requests\Members\Member  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Member added successfully.',
            'data' => $this->memberModel->saveMember($request, $id = 0)
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
        if (\Auth::id() == $id) {
            abort(403);
        }
        return view('members.edit', [
            'memberDetail' => $this->memberModel->getMemberDetail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\Members\Member  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Member updated successfully.',
            'data' => $this->memberModel->saveMember($request, $id)
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
