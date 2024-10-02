<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use App\Models\Merchants;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginPage(Request $request){
        $supplyData = [
            'title' => 'Welcome To Dashboard',
            'sessionRoute' =>  $request->route()->getName(),

            ];

        return response()->view("admin.loginPage",$supplyData);

    }

    public function register(Request $request)
    {
        $supplyData = [
            'title' => 'Register',
            'sessionRoute' =>  $request->route()->getName(),

            ];

        return response()->view("admin.register",$supplyData);

    }

    public function index(Request $request)
    {
        $merchants = Merchants::where("user_id", Auth::user()->id)->first();

        $supplyData = [
            'title' => 'Profile Merchant',
            'users' => Auth::user(),
            'sessionRoute' =>  $request->route()->getName(),
            'data' => $merchants

            ];

        return response()->view("admin.profile",$supplyData);
    }

    public function mastermenu(Request $request, $id = null )


    {

        if ($id == null ){
            $merchants = Merchants::where("user_id", Auth::user()->id)->first();
            $menus =  Menus::where("merchant_id", $merchants->id)->get();

            $supplyData = [
                'title' => 'Menu Master',
                'users' => Auth::user(),
                'state' => 'New',
                'sessionRoute' =>  $request->route()->getName(),
                'data' => $menus,

                ];

            return response()->view("admin.mastermenu",$supplyData);
        } else {

            $merchants = Merchants::where("user_id", Auth::user()->id)->first();
            $menus =  Menus::where("merchant_id", $merchants->id)->get();
            $menusUpdate =  Menus::where("merchant_id", $merchants->id)->where('id', $id)->first();
            $supplyData = [
                'title' => 'Menu Master',
                'users' => Auth::user(),
                'state' => 'Update',
                'sessionRoute' =>  $request->route()->getName(),
                'data' => $menus,
                'menusUpdate' => $menusUpdate,

                ];

            return response()->view("admin.mastermenu",$supplyData);

        }

    }


    public function orders(Request $request)


    {
        $merchants = Merchants::where("user_id", Auth::user()->id)->first();
        $orders =  Orders::where("merchant_id", $merchants->id)->get();

        $supplyData = [
            'title' => 'List Orders',
            'users' => Auth::user(),
            'sessionRoute' =>  $request->route()->getName(),
            'data' => $orders

            ];

        return response()->view("admin.orders",$supplyData);
    }
}
