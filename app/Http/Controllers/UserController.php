<?php

namespace App\Http\Controllers;

use App\Models\Merchants;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;

class UserController extends Controller
{


     // Menyimpan produk baru
     public function storeMerchant(Request $request, User $user, Merchants $merchants)
     {

         $request->validate([
             'username' => 'required|unique:users,name',
             'email' => 'required|email|unique:users,email',
             'password' => 'required',
             'address' => 'required',
             'contact_number' => 'required',
             'companyname' => 'required',
             'companycontact' => 'required',
             'companydescription' => 'required',
             'companyaddress' => 'required',
         ]);

         $user->name = $request->input("username");
         $user->email = $request->input("email");
         $user->password = Hash::make( $request->input("password"));
         $user->role = "merchant";
         $user->address = $request->input("address");
         $user->contact_number = $request->input("contact_number");
         $user->save();

         $merchants->user_id = $user->id;
         $merchants->company_name = $request->input("companyname");
         $merchants->contacts =  $request->input("companycontact");
         $merchants->description =  $request->input("companydescription");
         $merchants->address =  $request->input("companyaddress");
         $merchants->save();

         return redirect()->route('admin.loginPage')->with('success', 'Berhasil Registrasi !');
     }

     public function loginMerchant(Request $request, User $user, Merchants $merchants)
     {

        $username = $request->post("username");

        $pw = $request->post("password");
        $isAuthorised = Auth::attempt([
            "name" => $username,
            "password" =>  $pw
        ], true);



        if ($isAuthorised) {
            FacadesSession::regenerate();
            return redirect()->route('admin.index')->with('success', 'Berhasil Registrasi !');
        } else {
            return redirect()->back()->withErrors(['msg' => 'Invalid Username/Password'])->withInput();
        }


     }

     public function logoutMerchant(Request $request, User $user, Merchants $merchants)
     {

        Auth::logout();
        FacadesSession::flush();
        return redirect()->to("/admin/login");

     }


}
