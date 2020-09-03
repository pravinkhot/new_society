<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notices\NoticeModel;
use App\Http\Requests\Notices\Notice as NoticeRequest;

class NoticeController extends Controller
{
    private $noticeModel;

    function __construct(NoticeModel $noticeModel)
    {
        $this->noticeModel = $noticeModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('notices.index', [
            'noticeList' => $this->noticeModel->getNoticeListWithPaginate($request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NoticeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(NoticeRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Notice added successfully.',
            'data' => $this->noticeModel->saveNotice($request, $id = 0)
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
        return view('notices.edit', [
            'noticeDetail' => $this->noticeModel->getNoticeDetail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NoticeRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(NoticeRequest $request, $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Notice updated successfully.',
            'data' => $this->noticeModel->saveNotice($request, $id)
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
