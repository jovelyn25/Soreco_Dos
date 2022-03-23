<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserRestoreController extends Controller
{
    public function __invoke($id)
    {
        User::withTrashed()->find($id)->restore();
        return back()->with('success', 'Restored Successfully.');
    }

    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
        return back()->with('success', 'Restored Successfully.');
    }
}
