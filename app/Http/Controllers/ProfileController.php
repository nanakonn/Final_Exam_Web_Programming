<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index() {
        $user_data = User::all()->where('id', Auth::user()->id)->first();

        return view('profile.profile', compact('user_data'),);
    }

    public function update(Request $request) {
        $user = User::all()->where('id', Auth::user()->id)->first();

        $validatedData = $request->validate([
            'first_name' => 'required|max:25|regex:/^[\pL\s]+$/u',
            'last_name' => 'required|max:25|regex:/^[\pL\s]+$/u',
            'email' => 'required|email:dns',
            'role' => 'required',
            'gender' => 'required',
            'picture' => 'required|mimes:png,jpg,jpeg',
            'password' => 'required|min:8|regex:/^(?=.*[0-9]).+$/',
            'confirm_password' => 'required|same:password'
        ],[
            'first_name.regex' => 'Symbols are not allowed.',
            'last_name.regex' => 'Symbols are not allowed.',
            'password.regex' => 'Password must contain at least 1 number.'
        ]);

        try {
            if ($request->file('picture')) {
                if ($request->oldImage) {
                    Storage::delete('public/profile-picture/'.$request->oldImage);
                }
                $file = $request->file('picture');
                $filename = $file->getClientOriginalName();
                $file->storeAs('public/profile-picture', $filename);

                $user->first_name = $validatedData['first_name'];
                $user->last_name = $validatedData['last_name'];
                $user->email = $validatedData['email'];
                $user->role_id = $validatedData['role'];
                $user->gender_id = $validatedData['gender'];
                $user->display_picture_link = $filename;
                $user->password = Hash::make($validatedData['password']);
                $user->save();

                return redirect('/profile/saved');
            }
        } catch (\Throwable $th) {
            return redirect('/profile');
        }
    }

    public function saved() {
        return view('profile.saved',);
    }
}
