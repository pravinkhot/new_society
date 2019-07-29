<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Society As SocietyModel;
use App\User As UserModel;

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
        $societyList = UserModel::leftjoin('user_society', 'user_society.user_id', '=', 'users.id')
                ->leftjoin('societies', 'societies.id', '=', 'user_society.society_id')
                ->leftjoin('roles', 'roles.id', '=', 'user_society.role_id')
                ->select([
                    'roles.name as role_name',
                    'user_society.society_id',
                    'user_society.role_id',
                    'societies.name as society_name',
                ])
                ->where([
                    'user_society.user_id' => \Auth::id()
                ])
                ->get();

        return view('society_list', [
            'societyList' => $societyList
        ]);
    }

    public function setSociety(Request $request)
    {
        $request->session()->put('user', [
            'society_id' => $request->input('societyId'),
            'role_id' => $request->input('roleId')
        ]);
        return redirect('home');
    }

    public function setupNewSociety()
    {
        $setupNewSociety = new SetupNewSocietyHelper();
        $setupNewSociety->setupNewSociety();
    }
}
