<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::User();
        return view('navigation_links.users_profile')->with('user', $user);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get the userinfo
        $user = User::find($id);
        return view('navigation_links.users_profile')->with($user, $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('navigation_links.users_profile')->with($user, $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'fname' => 'required', 'string', 'max:255',
        //     'lname' => 'required', 'string', 'max:255',
        //     'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
        //     'age' => 'required', 'integer',
        //     'address' => 'required', 'string', 'max:255',
        //     'bdate' => 'required', 'date',
        //     'contact' => 'required', 'string', 'max:11',
        // ]);

        // $user = array (
        //     'fname' => $request->fname,
        //     'mname' => $request->mname,
        //     'email' => $request->email,
        //     'age' => $request->age,
        //     'address' => $request->address,
        //     'bdate' => $request->bdate,
        //     'contact' => $request->contact,
        // );
        // User::findOrFail($request->user_id)->update($user);
        // return redirect()->route('RegisteredUsers.index')->with('success', 'Updated Successfully.');

        $validator = Validator::make($request->all(), [
            'fname' => 'required', 'string', 'max:255',
            'lname' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'age' => 'required', 'integer',
            'address' => 'required', 'string', 'max:255',
            'bdate' => 'required', 'date',
            'contact' => 'required', 'string', 'max:11',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $query = User::find(Auth::user()->id)->update([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'age' => $request->age,
                'address' => $request->address,
                'bdate' => $request->bdate,
                'contact' => $request->contact,
            ]);

            if (!$query) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong.']);
            } else {
                return redirect()->route('myprofile.index')->with('success', 'Updated Successfully.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function changePassword(Request $request)
    {
        //Validate form
        $validator = Validator::make($request->all(), [
            'oldpassword' => [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:6',
                'max:12'
            ],
            'newpassword' => 'required|min:6|max:12',
            'password_confirmation' => 'required|same:newpassword',
        ], [
            'oldpassword.required' => 'Enter your current password',
            'oldpassword.min' => 'Old password must have atleast 6 characters',
            'oldpassword.max' => 'Old password must not be greater than 12 characters',
            'newpassword.required' => 'Enter new password',
            'newpassword.min' => 'New password must have atleast 6 characters',
            'newpassword.max' => 'New password must not be greater than 12 characters',
            'password_confirmation.required' => 'ReEnter your new password',
            'password_confirmation.same' => 'New password and Confirm new password must match'
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $update = User::find(Auth::user()->id)->update(['password' => Hash::make($request->newpassword)]);

            if (!$update) {
                return redirect()->route('myprofile.index')->with('error', 'Something went wrong, Failed to update password in db.');
            } else {
                return redirect()->route('myprofile.index')->with('success', 'Your password has been changed successfully.');
            }
        }
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('profile_image')) {
            $filename = $request->profile_image->getClientOriginalName();
            $request->profile_image->storeAs('profile_image', $filename, 'public');
            Auth()->user()->update(['profile_image' => $filename]);
        }
        return redirect()->back();
    }
}
