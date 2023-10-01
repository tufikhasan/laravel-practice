<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller {
    /**
     * Display the user's profile form.
     */
    public function edit( Request $request ): View {
        return view( 'pages.dashboard.profile.edit_profile', [
            'user' => $request->user(),
        ] );
    }

    /**
     * Update the user's profile information.
     */
    public function update( Request $request ) {
        $user = User::find( Auth::user()->id );
        $request->validate( [
            'username' => 'required|unique:users,username,' . $user->id . ',id',
            'image'    => ['image', 'max:1024', 'mimes:png,jpg,svg,webp', 'dimensions:between=100,150,100,150'],
        ] );
        $profile_pic_url = $user->image;
        if ( $request->file( 'image' ) ) {
            if ( file_exists( public_path( 'upload/profile/' . $profile_pic_url ) ) && $profile_pic_url ) {
                File::delete( public_path( 'upload/profile/' . $profile_pic_url ) );
            }
            $image = $request->file( 'image' );
            $profile_pic_url = $user->username . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move( public_path( 'upload/profile' ), $profile_pic_url );
        }
        $user->update( array_merge( $request->only( 'username', 'first_name', 'last_name' ), ['image' => $profile_pic_url] ) );
        session()->flash( 'success', 'Profile Successfully Updated' );
        return redirect()->back();

    }

    /**
     * Display the change password form.
     */
    public function changePassword( Request $request ): View {
        return view( 'pages.dashboard.profile.change_password' );
    }

    /**
     * Update the password.
     */
    public function updatePassword( Request $request ) {
        $request->validate( [
            'old_password'     => 'required',
            'new_password'     => 'required',
            'confirm_password' => 'required|same:new_password',
        ] );
        $hashPassword = Auth::user()->password;
        if ( Hash::check( $request->old_password, $hashPassword ) ) {
            $users = User::find( Auth::id() );
            $users->password = bcrypt( $request->new_password );
            $users->save();
            session()->flash( 'success', 'Password Updated Successfully' );
            return redirect()->back();
        } else {
            session()->flash( 'info', 'Old Password Not Match' );
            return redirect()->back();
        }
    }
}
