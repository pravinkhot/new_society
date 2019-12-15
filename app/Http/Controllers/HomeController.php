<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberSociety\MemberSocietyModel;

class HomeController extends Controller
{
    private $memberSocietyModel;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MemberSocietyModel $memberSocietyModel)
    {
        $this->middleware('auth');
        $this->memberSocietyModel = $memberSocietyModel;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function societyList(Request $request)
    {
        $societyList = $this->memberSocietyModel->getMemberAssociatedSocieties($request);
        if ($societyList->count() > 1) {
            return view('society_list', [
                'societyList' => $this->memberSocietyModel->getMemberAssociatedSocieties($request)
            ]);
        } else {
            $request->merge([
                'societyId' => $societyList[0]->society_id ?? null,
                'roleId' => $societyList[0]->role_id ?? null,
            ]);
            return $this->setSociety($request);
        }
    }

    public function setSociety(Request $request)
    {
        $request->session()->put('user', [
            'society_id' => $request->input('societyId'),
            'role_id' => $request->input('roleId')
        ]);
        return redirect('home');
    }
}
