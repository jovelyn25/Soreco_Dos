<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin_admin')) {
            $member = User::whereRoleIs('member')->count();
            $PsiSchedule = DB::table('psi_schedules')->count();
            return view('navigation_links/dashboard', compact(
                'member',
                'PsiSchedule',
            ));
        } elseif (Auth::user()->hasRole('member')) {
            $member = User::whereRoleIs('member')->count();
            $PsiSchedule = DB::table('psi_schedules')->count();
            return view('navigation_links/memberdashboard', compact(
                'member',
                'PsiSchedule',

            ));
        }
    }
    /**  public function index()
{
    $user =User::whereRoleIs('admin')->orWhereRoleIs('member')->get();

} */



    public function users_profile()
    {
        $user = Auth::User();
        return view('navigation_links.users_profile')->with('user', $user);
    }

    public function PsiSchedule()
    {
        return view('navigation_links.PsiSchedule');
    }
}
