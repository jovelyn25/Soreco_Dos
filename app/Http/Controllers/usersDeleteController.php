<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class usersDeleteController extends Controller
{
    public function __invoke(Request $member)
    {
        $deleteuser = User::withTrashed()->findOrFail($member->user_id);
        $deleteuser->forceDelete();
        return back()->with('success', 'Removed Permanently.');
    }

    public function delete(Request $member)
    {
        $deleteuser = User::withTrashed()->findOrFail($member->user_id);
        $deleteuser->forceDelete();
        return back()->with('success', 'Removed Permanently.');
    }
}
