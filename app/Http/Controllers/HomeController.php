<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Module;
use App\Chapter;
use App\User;
use App\Invite;
use App\Transaction;
use App\Activity;


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
        $user = Auth::user();
        if ($user->pancard === '') {
            return redirect('/register/information');
        }
        $chapter_id = $user->chapter_id;
        $chapter_index = Chapter::findOrFail($chapter_id)->chap_index;
        $module_id = Chapter::where('id', $chapter_id)->first()->module_id;
        $allModules = Module::orderBy('mod_index')->get();
        $result = array();
        foreach ($allModules as $module) {
            $temp = array();
            $temp['module_name'] = $module['name'];
            $temp['chap_count'] = Chapter::where('module_id', $module['id'])->count();
            if (intval($module_id) === intval($module['id'])) {
                $temp['state'] = 'ongoing';
                $chapters = Chapter::where('module_id', $module['id'])
                ->where('chap_index', '<=', $chapter_index)->orderBy('chap_index')->limit(3)->get()->toArray();
                $temp['chapters'] = array();
                foreach ($chapters as $chapter) {
                    $chap['name'] = $chapter['name'];
                    $chap['chap_index'] = $chapter['chap_index'];
                    array_push($temp['chapters'], $chap);
                }
                $temp['completed'] = Chapter::where('module_id', $module['id'])
                    ->where('chap_index', '<', $chapter_index)
                    ->count();
            } else if (intval($module_id) > intval($module['id'])) {
                $temp['state'] = 'finished';
                $temp['completed'] = $temp['chap_count'];
            } else {
                $temp['state'] = 'lock';
                $temp['completed'] = 0;
            }
            array_push($result, $temp);
        }
        $progress = $result;
        $result = array();
        $result['earning'] = number_format(Transaction::where(
            [
                'user_id' => $user->id,
                'type' => 'earning',
            ]
        )->sum('amount'), 2);
        $result['invites'] = Invite::where('invited_by', $user->id)->count();
        $profile = $result;
        return view('home')->with([
            'user' => Auth::user(),
            'progress' => $progress,
            'profile' => $profile
        ]);
    }

    public function information(Request $request)
    {
        if (Auth::user()->pancard !== '') {
            if ($request->session()->has('code')) {
                $request->session()->forget('code');
            }
            return redirect('/profile');
        }
        $code = null;
        if ($request->session()->has('code')) {
            $code  = $request->session()->get('code');
        }
        return view('register')->with([
            'code' => $code,
        ]);
    }

    public function showActivities(Request $request)
    {
        $activities = Activity::where('user_id', Auth::user()->id)->latest()->paginate(15);
        return view('activities')->with([
            'activities' => $activities,
        ]);
    }
}
