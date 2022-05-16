<?php

namespace App\Http\Controllers;

use App\Mail\sendNotice;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    //         $to_email = "ricamendoza@thelewiscollege.edu.ph";
    //         $name = "Rica Mendoza";
    //         $psischedule = PsiSchedule::sendEmail;
    //         $psischedule->notice_date = $request['notice_date'];
    //         $psischedule->notice_time = $request['notice_time'];
    //         $psischedule->notice_areas = $request['notice_areas'];
    //         $psischedule->notice_reasons = $request['notice_reasons'];

    //          Mail::send('navigation_links.generatenotice' $data function ($m) use ($to_email, $name)){
    //             $m->to($to_email, $name)->subject('Rica Mendoza');
    //              $m->from('noreply@jovelynestadola.gmail.com', 'Rica Mendoza');
    //          });

    //          return response()->json(['success' => 'Emailed Successfully.']);
    //  }
    // public function sendNotice(Request $request)
    // {
    //     $request->validate([
    //         'notice_date' => 'required', 'date', 'max:255',
    //         'notice_time' => 'string', 'max:255',
    //         'notice_areas' => 'string', 'max:255',
    //         'notice_reasons' => 'string', 'max:255',
    //     ]);

    //     $psischedule = PsiSchedule::create([
    //         'notice_date' => $request['notice_date'],
    //         'notice_time' => $request['notice_time'],
    //         'notice_areas' => $request['notice_areas'],
    //         'notice_reasons' => $request['notice_reasons'],
    //     ]);

    //     Mail::send(
    //         'modals.PsiSchedule.Add',
    //         array(
    //             'notice_date' => $request['notice_date'],
    //             'notice_time' => $request['notice_time'],
    //             'notice_areas' => $request['notice_areas'],
    //             'notice_reasons' => $request['notice_reasons'],

    //             function ($message) use ($request) {
    //                 $message->to('jovelynestadola@gmail.com', 'Jovelyn Estadola')->subject($request->get('subject'));
    //                 $message->from('jovelynestadola@gmail.com', 'Jovelyn Estadola');
    //             }
    //         )
    //     );

    //     $psischedule->save();
    //     return redirect()->route('PsiSchedule.index')->with('success', 'Added Successfully.');
    // }


}
