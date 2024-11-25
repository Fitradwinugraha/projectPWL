<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Motor;
use App\Models\User;
use App\Models\Transaksi;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data motor dengan status 'tersedia'
        // $motors = Motor::where('status', 'tersedia')->get();
        $motors = Motor::all();
        
        // Kirim data motor ke view home
        return view('user.home', compact('motors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function transaksi($id)
    {   
        // Ambil detail motor berdasarkan ID
        $motor = Motor::findOrFail($id);
        
        // Kirim data motor ke view transaksi
        return view('user.transaksi', compact('motor'));
    }

    public function profile()
    {
        return view('user.profile');
    }

    public $user;

    public function __construct()
    {
        $this->user = new User();
    }
    
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'username' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $filename = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $filename);
            $user->foto = $filename;
        }

        $user = User::find(auth()->id());
        $user->fill([
            'username' => $request->username,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
        ]);
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function updateFoto(Request $request)
    {
        $request->validate(['foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);

        if ($request->file('foto')) {
            $path = $request->file('foto')->store('user-profile', 'public');

            // $user = auth()->user();
            $user = User::find(auth()->id());
            $user->foto = $path;
            $user->save();
        }

        return redirect()->back()->with('success', 'Foto berhasil diperbarui!');
    }

    public function storeTransaksi(Request $request)
    {
        $request->validate([
            'motor_id' => 'required|exists:motor,id',
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email',
            'ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal_sewa' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_sewa',
            'total_harga' => 'required|numeric',
            'metode_pembayaran' => 'required|in:bri,bni,bca,mandiri,dana',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Simpan KTP
        $ktpFilename = time() . '_ktp.' . $request->ktp->extension();
        $request->ktp->move(public_path('uploads'), $ktpFilename);
    
        // Simpan bukti pembayaran 
        $buktiPembayaranFilename = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPembayaranFilename = time() . '_bukti.' . $request->bukti_pembayaran->extension();
            $request->bukti_pembayaran->move(public_path('uploads'), $buktiPembayaranFilename);
        }
    
        // Buat transaksi baru
        Transaksi::create([
            'users_id' => auth()->id(), // ID user yang sedang login
            'motor_id' => $request->motor_id,
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
            'jumlah' => 1, // Misalkan kita hanya sewa 1 motor
            'total_harga' => $request->total_harga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'foto_bukti_pembayaran' => $buktiPembayaranFilename,
            'status' => 'pending', // Status awal
            'foto_ktp' => $ktpFilename, // Simpan foto KTP
            'no_telepon' => $request->telepon, // Simpan nomor telepon
        ]);
    
        // Kurangi jumlah motor yang tersedia
        $motor = Motor::findOrFail($request->motor_id);
        $motor->decrement('jumlah');
    
        return redirect()->route('user.riwayat_transaksi')->with('success', 'Transaksi berhasil dibuat.');
    }
  
    public function riwayatTransaksi()
    {
        $transaksi = Transaksi::where('users_id', auth()->id())->with('motor')->get();
        return view('user.riwayat_transaksi', compact('transaksi'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}