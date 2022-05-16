<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PsiSchedule;
use Carbon\Carbon;

class GenerateNoticeController extends Controller
{
    // public function index()
    // {
    //     $todayTime = Carbon::now()->format('H:i:m', 'Philippines');
    //     $psischedule = PsiSchedule::get();
    //     $todayMonth = Carbon::now()->format('F, Y', 'Philippines');
    //     return view('navigation_links.generatenotice', compact('todayMonth', 'psischedule', 'todayTime'));
    // }
    // public function generatenotice($id)
    // {

    //     $psischedule = PsiSchedule::find($id);
    //     return view('navigation_links.generatenotice')->with($psischedule, $id);
    // }
}
