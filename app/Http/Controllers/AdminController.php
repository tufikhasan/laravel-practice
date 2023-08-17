<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {
    /**
     * Destroy an authenticated session.
     */
    public function destroy( Request $request ): RedirectResponse{
        Auth::guard( 'web' )->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = [
            'message'    => 'User Logout Successful',
            'alert-type' => 'success',
        ];

        return redirect( '/login' )->with( $notification );
    }

    //Profile method
    public function Profile() {
        $id = Auth::user()->id;
        $adminData = User::find( $id );
        return view( 'admin.admin_profile_view', compact( 'adminData' ) );
    }
    //Edit profile method
    public function editProfile() {
        $id = Auth::user()->id;
        $editData = User::find( $id );
        return view( 'admin.admin_profile_edit', compact( 'editData' ) );
    }
    //Update profile method
    public function updateProfile( Request $request ) {
        $id = Auth::user()->id;
        $data = User::find( $id );

        $data->name = $request->name;
        $data->email = $request->email;

        if ( $request->file( 'profile_image' ) ) {
            //delete old image from folder
            if ( $data->profile_image ) {
                unlink( str_replace( '\\', '/', public_path( 'upload/admin_images/' . $data->profile_image ) ) );
            }

            //get request image
            $file = $request->file( 'profile_image' );
            //image unique name
            $fileName = date( 'YmdHi' ) . "_" . $file->getClientOriginalName();
            //upload image
            $file->move( public_path( 'upload/admin_images' ), $fileName );
            //image name save database
            $data['profile_image'] = $fileName;
        }
        //save data
        $data->save();

        $notification = [
            'message'    => "Admin Profile Updated Successfully",
            'alert-type' => 'success',
        ];

        return redirect()->route( 'admin.profile' )->with( $notification );
    }

    //change password
    public function changePassword() {
        return view( 'admin.change_password' );
    }

    //update password
    function updatePassword( Request $request ) {
        $validateData = $request->validate( [
            'old_password'     => 'required',
            'new_password'     => 'required',
            'confirm_password' => 'required|same:new_password',
        ] );

        $hashPassword = Auth::user()->password;
        if ( Hash::check( $request->old_password, $hashPassword ) ) {
            $users = User::find( Auth::id() );
            $users->password = bcrypt( $request->new_password );
            $users->save();

            session()->flash( 'message', 'Password Updated Successfully' );
            return redirect()->back();
        } else {
            session()->flash( 'message', 'Old Password Not Match' );
            return redirect()->back();
        }
    }
}
