<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Society As SocietyModel;
use App\Models\User As UserModel;
use App\Helpers\SetupNewSociety As SetupNewSocietyHelper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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

    public function societyList()
    {
        $societyList = \Auth::user()->getUserSocieties;
        return view('society_list', [
            'societyList' => $societyList
        ]);
    }

    public function setSociety(Request $request, $societyId)
    {
        $request->session()->put('user', [
            'society_id' => $societyId
        ]);
        return redirect('home');
    }

    public function setupNewSociety()
    {
        $setupNewSociety = new SetupNewSocietyHelper();
        $setupNewSociety->setupNewSociety();
    }
}
