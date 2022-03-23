<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PsiSchedule;

class PsiScheduleController extends Controller
{
    public function index()
    {
        //show content
        $psi_schedules = PsiSchedule::all();
        return view('navigation_links.PsiSchedule')->with('PsiSchedule', $psi_schedules);
    }

    public function store(Request $request)
    {
        //add
        $request->validate([
            'notice_date' => 'required', 'date', 'max:255',
            'notice_time' => 'time', 'max:255',
            'notice_areas' => 'string', 'max:255',
            'notice_reasons' => 'string', 'max:255',
        ]);

        $psi_schedules = PsiSchedule::create([
            'notice-date' => $request['notice_date'],
            'notice_time' => $request['notice_time'],
            'notice_areas' => $request['notice_areas'],
            'notice_reasons' => $request['notice_reasons'],

        ]);
        $psi_schedules->save();
        return redirect()->route('PsiSchedule.index')->with('success', 'Added Successfully.');
    }

    public function create()
    {
        //show added data
        return view('navigation_links.PsiSchedule');
    }

    public function show($id)
    {
        $psi_schedules = PsiSchedule::find($id);
        return view('navigation_links.PsiSchedule')->with($psi_schedules, $id);
    }

    public function edit($id)
    {
        $psi_schedules = PsiSchedule::find($id);
        return view('navigation_links.PsiSchedule')->with($psi_schedules, $id);
    }

    public function update(Request $request)
    {
        $request->validate([
            'notice_date' => 'required', 'date', 'max:255',
            'notice_time' => 'time', 'max:255',
            'notice_areas' => 'string', 'max:255',
            'notice_reasons' => 'string', 'max:255',
        ]);

        $PsiSchedule = array(
            'notice-date' => $request['notice_date'],
            'notice_time' => $request['notice_time'],
            'notice_areas' => $request['notice_areas'],
            'notice_reasons' => $request['notice_reasons'],
        );

        PsiSchedule::findOrFail($request->id)->update($PsiSchedule);
        return redirect()->route('PsiSchedule.index')->with('success', 'Updated Successfully.');
    }

    public function destroy(Request $PsiSchedule)
    {
        $delete = $PsiSchedule->all();

        /* echo "<pre>"; print_r($delete); die; */
        $deleteMed =  PsiSchedule::findOrFail($PsiSchedule->id);
        $deleteMed->delete();
        return redirect()->route(' PsiSchedule.index')->with('success', 'Deleted Successfully.');
    }
}
