<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index');
    }

    public function tentang()
    {
        return view('blog.tentang');
    }

    public function kontak()
    {
        return view('blog.kontak');
    }

    public function barang_index()
    {
        $barang = Barang::all();
        return view('blog.barang.index', compact('barang'));
    }

    public function barang_create()
    {
        return view('blog.barang.create');
    }

    public function barang_store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
        ]);

        Barang::create($request->all());

        return redirect()->to('/blog/barang')
            ->with('success', 'barang created successfully.');
    }

    public function barang_show(Barang $barang)
    {
        return view('blog.barang.show', compact('barang'));
    }

    public function barang_edit(Barang $barang)
    {
        return view('blog.barang.edit', compact('barang'));
    }

    public function barang_update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')
            ->with('success', 'barang updated successfully.');
    }

    public function barang_destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->to('/blog/barang')
            ->with('success', 'barang deleted successfully.');
    }
}
