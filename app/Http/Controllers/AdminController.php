<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class AdminController extends Controller
{
    public function updatePicture(Request $request)
    {
        $path = 'uploads/avatars/';
        $file = $request->file('admin_image');
        $new_name = 'UIMG_' . date('Ymd') . uniqid() . '.jpg';

        //Upload new image
        $upload = $file->move(public_path($path), $new_name);

        if (!$upload) {
            return response()->json(['status' => 0, 'msg' => 'Something went wrong, upload new picture failed.']);
        } else {
            //Get Old picture
            // $oldPicture = User::find(Auth::User()->id)->getAttributes()['profile_image'];

            // if( $oldPicture != '' ){
            //     if( \File::exists(public_path($path.$oldPicture))){
            //         \File::delete(public_path($path.$oldPicture));
            //     }
            // }

            //Update DB
            $update = User::find(Auth::User()->id)->update(['profile_image' => $new_name]);

            if (!$upload) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong, updating picture in db failed.']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'Your profile picture has been updated successfully']);
            }
        }
    }
}
