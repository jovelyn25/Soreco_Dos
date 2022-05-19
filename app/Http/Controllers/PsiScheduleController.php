<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PsiSchedule;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Alert;

class PsiScheduleController extends Controller
{
    public function index()
    {
        //show content
        $psi_schedules = PsiSchedule::all();
        return view('navigation_links.PsiSchedule')->with('psi_schedules', $psi_schedules);
    }

    public function store(Request $request)
    {
        //add
        $request->validate([
            'notice_date' => 'required', 'date', 'max:255',
            'notice_time' => 'string', 'max:255',
            'notice_areas' => 'string', 'max:255',
            'notice_reasons' => 'string', 'max:255',
        ]);

        $psischedule = PsiSchedule::create([
            'notice_date' => $request['notice_date'],
            'notice_time' => $request['notice_time'],
            'notice_areas' => $request['notice_areas'],
            'notice_reasons' => $request['notice_reasons'],
        ]);

        $emails = ['eto_soreco2@yahoo.com', 'soreco2.cpd@gmail.com'];
        Mail::send(
            'navigation_links.psiMail',
            array(
                'notice_date' => $request['notice_date'],
                'notice_time' => $request['notice_time'],
                'notice_areas' => $request['notice_areas'],
                'notice_reasons' => $request['notice_reasons'],
            ),
            function ($messages) use ($emails) {
                // Mail::send('modals.PsiSchedule.Add', $psischedule, function ($messages) use ($emails) {
                // Mail::send('Psichedule.store', $data, function ($messages) use ($emails) {
                // $messages->to('jovelynestadola@gmail.com', 'honeylynestadola@gmail.com', 'rubenestadola@gmail.com');
                $messages->to($emails);
                $messages->from('sorecoiims@gmail.com');
                $messages->subject('Notice of Power Service Interruption');
            }
        );

        $psischedule->save();
        return redirect()->route('PsiSchedule.index')->with('success', 'Your request has been sent Successfully.');
    }
    // public function send()
    // {
    //     $data = array(
    //         'notice_date' => ['notice_date'],
    //         'notice_time' => ['notice_time'], 'notice_areas' => ['notice_areas'], 'notice_reasons' => ['notice_reasons']

    //     );
    //     Mail::send('mail', $data, function ($message) {
    //         $message->to('jovelynestadola@gmail.com', 'Jovelyn Estadola')->subject('NOTICE OF POWER SERVICE INTERRUPTION');
    //         $message->from('jovelynestadola@gmail.com');
    //     });

    //     return redirect()->route('PsiSchedule.index')->with('success', 'Added Successfully.');
    // }

    public function create()
    {
        //show added data
        return view('navigation_links.PsiSchedule');
    }

    public function generatenotice()
    {
        $todayTime = Carbon::now()->format('H:i:m', 'Philippines');
        $psischedule = PsiSchedule::get();
        // $pdf = PDF::loadView('navigation_links.generatenotice', $psischedule);
        $todayMonth = Carbon::now()->format('F, Y', 'Philippines');
        return view('navigation_links.generatenotice', compact('todayMonth', 'psischedule', 'todayTime'));
        // return view('navigation_links.generatenotice'); $pdf->download('PSI.pdf'),

    }

    public function show($id)
    {
        $psischedule = PsiSchedule::find($id);
        return view('navigation_links.generatenotice')->with($psischedule, $id);
    }

    // public function edit(Request $id)
    // {
    //     $psischedule = PsiSchedule::find($id);
    //     return redirect()->route('PsiSchedule.index')->with('success', 'Sent Successfully.');
    // }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'notice_date' => 'required', 'string', 'max:255',
    //         'notice_time' => 'string', 'max:255',
    //         'notice_areas' => 'string', 'max:255',
    //         'notice_reasons' => 'string', 'max:255',

    //     ]);
    //     $psischedule = array(
    //         'notice_date' => $request['notice_date'],
    //         'notice_time' => $request['notice_time'],
    //         'notice_areas' => $request['notice_areas'],
    //         'notice_reasons' => $request['notice_reasons'],
    //     );
    //     $emails = ['jovelynestadola@gmail.com'];
    //     Mail::send(
    //         'navigation_links.psiMail',
    //         array(
    //             'notice_date' => $request['notice_date'],
    //             'notice_time' => $request['notice_time'],
    //             'notice_areas' => $request['notice_areas'],
    //             'notice_reasons' => $request['notice_reasons'],
    //         ),
    //         function ($messages) use ($emails) {
    //             $messages->to($emails);
    //             $messages->from('sorecoiims@gmail.com');
    //             $messages->subject('Notice of Power Service Interruption');
    //         }
    //     );
    //     // PsiSchedule::findOrFail($request->id)->update($psischedule);
    //     $psischedule = PsiSchedule::find($request->id);
    //     return redirect()->route('PsiSchedule.index')->with('success', 'Updated Successfully.');

    public function destroy($id)
    {
        //  $delete = $id->all();
        //     echo "<pre>";
        //     print_r($delete);
        //     die;
        $psischedule =  PsiSchedule::findOrFail($id);
        $psischedule->delete();
        return redirect()->route('PsiSchedule.index')->with('success', 'Deleted Successfully.');
    }
}
