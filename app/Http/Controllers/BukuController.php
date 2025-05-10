<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'foto_cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto_cover')) {
            $fotoPath = $request->file('foto_cover')->store('foto_cover', 'public');
            $nama_foto = basename($fotoPath);
        } else {
            $nama_foto = null;
        }

        Buku::create([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun' => $request->tahun,
            'foto_cover' => $nama_foto,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'foto_cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto_cover')) {
            if ($buku->foto_cover && Storage::disk('public')->exists('foto_cover/' . $buku->foto_cover)) {
                Storage::disk('public')->delete('foto_cover/' . $buku->foto_cover);
            }

            $fotoPath = $request->file('foto_cover')->store('foto_cover', 'public');
            $nama_foto = basename($fotoPath);
        } else {
            $nama_foto = $buku->foto_cover;
        }

        $buku->update([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun' => $request->tahun,
            'foto_cover' => $nama_foto,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        if ($buku->foto_cover && Storage::disk('public')->exists('foto_cover/' . $buku->foto_cover)) {
            Storage::disk('public')->delete('foto_cover/' . $buku->foto_cover);
        }

        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku deleted successfully.');
    }
}
