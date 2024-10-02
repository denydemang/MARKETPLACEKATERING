<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use App\Models\Merchants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterMenuController extends Controller
{
    public function store(Request $request, Menus $menus, Merchants $merchants){

        $fileName = "";

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png|max:1048',
        ]);



        if ($request->file('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);

        }


        $menus->name = $request->input('name');
        $menus->merchant_id = $merchants->where('user_id' , Auth::user()->id)->first()->id;
        $menus->description = $request->input('description');
        $menus->price = $request->input('price');
        $menus->photo =  $fileName;
        $menus->save();

        return redirect()->route('admin.mastermenu')->with('success', 'berhasil ditambahkan');
    }
    public function edit(Request $request, Menus $menuss, Merchants $merchants){

        $fileName = "";

        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'mimes:jpg,jpeg,png|max:1048',
        ]);


        $menus = $menuss->where("id", $request->input("id"))->first();
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $menus->photo =  $fileName;
        }


        $menus->name = $request->input('name');
        $menus->description = $request->input('description');
        $menus->price = $request->input('price');
        $menus->update();

        return redirect()->route('admin.mastermenu')->with('success', 'berhasil diupdate!');
    }
    public function delete($id, Menus $menuss){


        $menuss->where("id", $id)->delete();


        return redirect()->route('admin.mastermenu')->with('success', 'berhasil didelete!');
    }
}
