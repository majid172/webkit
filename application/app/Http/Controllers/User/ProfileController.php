<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function profile()
    {
        $pageTitle = "Profile Setting";
        $user = auth()->user();
        return view($this->activeTemplate. 'user.profile_setting', compact('pageTitle','user'));
    }

    public function submitProfile(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
        ],[
            'firstname.required'=>'First name field is required',
            'lastname.required'=>'Last name field is required'
        ]);

        $user = auth()->user();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->designation = $request->designation;
        $user->address = [
            'address' => $request->address,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => @$user->address->country,
            'city' => $request->city,
        ];
        $user->social_link = [
            'fb' => $request->fb,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
        ];

        if($request->hasFile('profile_img')){
            try {
                $directory = date("Y")."/".date("m");
                if ($user->user_type == 1)
                {
                    $instructor_path = getFilePath('instructor').'/'.$directory;
                    $instructor_size = getFileSize('instructor');
                    $instructor_file = fileUploader($request->profile_img,$instructor_path,$instructor_size);
                    $user->instructor_img = $instructor_file;
                }

                $profile_path = getFilePath('userProfile').'/'.$directory;
                $profile_size = getFileSize('userProfile');
                $profile_file = fileUploader($request->profile_img, $profile_path,$profile_size);

                $user->image = $profile_file;
                $user->img_path = $directory;
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your profile image'];
                return back()->withNotify($notify);
            }
        }
        $user->save();
        $notify[] = ['success', 'Profile has been updated successfully'];
        return back()->withNotify($notify);
    }

    public function changePassword()
    {
        $pageTitle = 'Change Password';
        return view($this->activeTemplate . 'user.password', compact('pageTitle'));
    }

    public function submitPassword(Request $request)
    {

        $passwordValidation = Password::min(6);
        $general = gs();
        if ($general->secure_password) {
            $passwordValidation = $passwordValidation->mixedCase()->numbers()->symbols()->uncompromised();
        }

        $this->validate($request, [
            'current_password' => 'required',
            'password' => ['required','confirmed',$passwordValidation]
        ]);
        $user = auth()->user();
        if (Hash::check($request->current_password, $user->password)) {
            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();
            $notify[] = ['success', 'Password changes successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'The password doesn\'t match!'];
            return back()->withNotify($notify);
        }
    }
}
