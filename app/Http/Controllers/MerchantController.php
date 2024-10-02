<?php

namespace App\Http\Controllers;

use App\Models\Merchants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantController extends AdminController
{
    public function index(Request $request)
    {

    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        return view('produk.create');
    }

    // Menyimpan produk baru
    public function store(Request $request, Merchants $merchants)
    {
        $request->validate([
            'company_name' => 'required',
            'contacts' => 'required',
            'address' => 'required',
            'description' => 'required',
        ]);

        $dataUpdate  = $merchants->where('user_id' , Auth::user()->id)->first();

        $dataUpdate->company_name = $request->input('company_name');
        $dataUpdate->contacts = $request->input('contacts');
        $dataUpdate->address = $request->input('address');
        $dataUpdate->description = $request->input('description');

        $dataUpdate->update();

        return redirect()->route('admin.index')->with('success',  'berhasil ditambahkan');

    }

    // Menampilkan detail produk
    public function show($id)
    {
        return view('produk.show', compact('produk'));
    }

    // Menampilkan form untuk mengedit produk
    public function edit($id)
    {
        return view('produk.edit', compact('produk'));
    }

    // Mengupdate data produk
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
        ]);



        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate');
    }

    // Menghapus produk
    public function destroy($id)
    {

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }
}
