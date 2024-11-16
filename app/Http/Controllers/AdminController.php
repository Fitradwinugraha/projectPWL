<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;

class AdminController extends Controller
{
    public function dashboardAdmin()
    {
        $title = 'Dashboard Admin';
        return view('admin.dashboardadmin', compact('title'));
    }

    public function tambahMotor()
    {
        $title = 'Tambah Motor';
        return view('admin.tambahmotor', compact('title'));
    }

    public function storeMotor(Request $request)
    {
        $request->validate([
            'nama_motor' => 'required|string|max:255',
            'merek_motor' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|integer',
            'foto_motor' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'harga_sewa' => 'required|numeric',
            'transmisi' => 'required|in:manual,matic',
            'jumlah' => 'required|integer',
        ]);

        // Simpan foto motor
        $filename = null;
        if ($request->hasFile('foto_motor')) {
            $filename = time() . '.' . $request->foto_motor->extension();
            $request->foto_motor->move(public_path('uploads'), $filename);
        }

        Motor::create([
            'nama_motor' => $request->nama_motor,
            'merek_motor' => $request->merek_motor,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'foto_motor' => $filename,
            'harga_sewa' => $request->harga_sewa,
            'transmisi' => $request->transmisi,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('admin.motor')->with('success', 'Motor berhasil ditambahkan.');
    }

    public function showMotor()
    {
        $title = 'Daftar Motor';
        $motors = Motor::all();
        return view('admin.motor', compact('title', 'motors'));
    }

    public function editMotor($id)
    {
        $motor = Motor::findOrFail($id);
        $title = 'Edit Motor';
        return view('admin.edit_motor', compact('motor', 'title'));
    }

    public function updateMotor(Request $request, $id)
    {
        $motor = Motor::findOrFail($id);

        $request->validate([
            'nama_motor' => 'required|string|max:255',
            'merek_motor' => 'required|string|max:255',
            'foto_motor' => 'image|mimes:jpeg,png,jpg|max:2048',
            'harga_sewa' => 'required|numeric',
            'transmisi' => 'required|in:manual,matic',
            'jumlah' => 'required|integer',
        ]);

        if ($request->hasFile('foto_motor')) {
            $filename = time() . '.' . $request->foto_motor->extension();
            $request->foto_motor->move(public_path('uploads'), $filename);
            $motor->foto_motor = $filename;
        }

        $motor->update([
            'nama_motor' => $request->nama_motor,
            'merek_motor' => $request->merek_motor,
            'harga_sewa' => $request->harga_sewa,
            'transmisi' => $request->transmisi,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('admin.motor')->with('success', 'Motor berhasil diperbarui.');
    }

    public function deleteMotor($id)
    {
        $motor = Motor::findOrFail($id);
        $motor->delete();

        return redirect()->route('admin.motor')->with('success', 'Motor berhasil dihapus.');
    }
}
