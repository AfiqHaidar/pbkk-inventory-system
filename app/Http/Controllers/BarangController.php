<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Kondisi;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.dashboard', ['barangs' => $barangs]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'kecacatan' => 'string|max:255',
            'jumlah' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
            'jenis_id' => 'required',
            'kondisi_id' => 'required',
        ]);

        $imagePath = $request->file('gambar')->store('barang', 'public');
        $validatedData['gambar'] = $imagePath;

        $validatedData['user_id'] = auth()->user()->id;

        Barang::create($validatedData);

        return redirect(route('barang.dashboard'))->with('sukses', 'barang ditambahkan');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
        }

        $barang->delete();
        return redirect(route('barang.dashboard'))->with('sukses', 'barang dihapus');
    }

    public function add()
    {
        $jenis = Jenis::all();
        $kondisi = Kondisi::all();

        return view('barang.add', ['jenis' => $jenis],  ['kondisi' => $kondisi]);
    }

    public function edit($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->route('barang.dashboard')->with('error', 'Barang not found');
        }

        return view('barang.edit', ['barang' => $barang]);
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->route('barang.dashboard')->with('error', 'barang not found');
        }

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'kecacatan' => 'string|max:255',
            'jumlah' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
            'jenis_id' => 'required',
            'kondisi_id' => 'required',
        ]);


        $imagePath = $request->file('gambar')->store('barang', 'public');
        $barang->gambar = $imagePath;


        // Update other fields
        $barang->nama = $validatedData['nama'];
        $barang->keterangan = $validatedData['keterangan'];
        $barang->kecacatan = $validatedData['kecacatan'];
        $barang->jumlah = $validatedData['jumlah'];
        $barang->jenis_id = $validatedData['jenis_id'];
        $barang->kondisi_id = $validatedData['kondisi_id'];

        $barang->save();

        return redirect()->route('barang.dashboard')->with('sukses', 'Barang Diupdate');
    }
}
