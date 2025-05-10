<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Karyawan::all();
        return view('karyawan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'tgl_lahir' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto_karyawan', 'public');
            $nama_foto = basename($fotoPath);
        } else {
            $nama_foto = null;
        }

        Karyawan::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'foto' => $nama_foto,
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'tgl_lahir' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            if ($karyawan->foto && Storage::disk('public')->exists('foto_karyawan/' . $karyawan->foto)) {
                Storage::disk('public')->delete('foto_karyawan/' . $karyawan->foto);
            }

            $fotoPath = $request->file('foto')->store('foto_karyawan', 'public');
            $fotoName = basename($fotoPath);
        } else {
            $fotoName = $karyawan->foto;
        }

        $karyawan->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'foto' => $fotoName,
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Karyawan $karyawan)
    {
        if ($karyawan->foto && Storage::disk('public')->exists('foto_karyawan/' . $karyawan->foto)) {
            Storage::disk('public')->delete('foto_karyawan/' . $karyawan->foto);
        }

        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan deleted successfully.');
    }
}
