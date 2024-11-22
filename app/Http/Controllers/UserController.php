<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Motor;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motors = Motor::where('status', 'tersedia')->get();
        
        return view('user.home', compact('motors'));
    }

    public function transaksi()
    {   
        return view('user.transaksi');
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



    /**
     * Show the form for creating a new resource.
     */
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


