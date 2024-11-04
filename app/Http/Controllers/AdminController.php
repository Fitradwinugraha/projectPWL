<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\Merek;

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
        $mereks = Merek::all();
        return view('admin.tambahmotor', compact('title', 'mereks'));
    }

    public function storeMotor(Request $request)
    {
        $request->validate([
            'nama_motor' => 'required|string|max:255',
            'merek_id' => 'required|exists:merek,id',
            'nomor_polisi' => 'required|string|unique:motor,nomor_polisi',
            'foto_motor' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'harga_sewa' => 'required|numeric',
            'transmisi' => 'required|in:manual,matic',
        ]);

        // Simpan foto motor
        if ($request->hasFile('foto_motor')) {
            $filename = time() . '.' . $request->foto_motor->extension();
            $request->foto_motor->move(public_path('uploads'), $filename);
        }

        Motor::create([
            'nama_motor' => $request->nama_motor,
            'merek_id' => $request->merek_id,
            'nomor_polisi' => $request->nomor_polisi,
            'foto_motor' => $filename,
            'harga_sewa' => $request->harga_sewa,
            'transmisi' => $request->transmisi,
        ]);

        return redirect()->route('admin.motor')->with('success', 'Motor berhasil ditambahkan.');
    }

 
    public function showMotor()
    {
        $title = 'Daftar Motor';
        $motors = Motor::with('merek')->get();
        return view('admin.motor', compact('title', 'motors'));
    }

  
    public function editMotor($id)
    {
        $motor = Motor::findOrFail($id);
        $mereks = Merek::all();
        return view('admin.edit_motor', compact('motor', 'mereks'));
    }

    public function updateMotor(Request $request, $id)
    {
        $motor = Motor::findOrFail($id);

        $request->validate([
            'nama_motor' => 'required|string|max:255',
            'merek_id' => 'required|exists:merek,id',
            'nomor_polisi' => 'required|string|unique:motor,nomor_polisi,' . $id,
            'foto_motor' => 'image|mimes:jpeg,png,jpg|max:2048',
            'harga_sewa' => 'required|numeric',
            'transmisi' => 'required|in:manual,matic',
        ]);

        if ($request->hasFile('foto_motor')) {
            $filename = time() . '.' . $request->foto_motor->extension();
            $request->foto_motor->move(public_path('uploads'), $filename);
            $motor->foto_motor = $filename;
        }

   
        $motor->update([
            'nama_motor' => $request->nama_motor,
            'merek_id' => $request->merek_id,
            'nomor_polisi' => $request->nomor_polisi,
            'harga_sewa' => $request->harga_sewa,
            'transmisi' => $request->transmisi,
        ]);

        return redirect()->route('admin.motor')->with('success', 'Motor berhasil diperbarui.');
    }


    public function deleteMotor($id)
    {
        $motor = Motor::findOrFail($id);
        $motor->delete();

        return redirect()->route('admin.motor')->with('success', 'Motor berhasil dihapus.');
    }

    public function showBrand()
    {
        $title = 'Daftar Brand Motor';
        $mereks = Merek::all();
        return view('admin.brand', compact('title', 'mereks'));
    }

    public function tambahMerek()
    {
        $title = 'Tambah Brand Motor';
        return view('admin.tambah_merek', compact('title'));
    }

    public function storeMerek(Request $request)
    {
        $request->validate([
            'merek_motor' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|integer',
            'jenis_motor' => 'required|string|max:255',
        ]);

        Merek::create([
            'merek_motor' => $request->merek_motor,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'jenis_motor' => $request->jenis_motor,
        ]);

        return redirect()->route('admin.brand')->with('success', 'Brand motor berhasil ditambahkan.');
    }
}
