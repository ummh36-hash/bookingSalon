<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Booking;

class AdminController extends Controller

{
    public function index()
    {
        return view('admin.index');
    } 

    public function dashboardPesan()
{
    $pesans = Pesan::latest()->get();

    return view('admin.dashboardPesan', compact('pesans'));
}
  



public function balasPesan(Pesan $pesan)
{
    $pesan->load('user');

    return view('admin.balasPesan', compact('pesan'));
}


public function kirimBalasan(Request $request, Pesan $pesan)
{
    $request->validate([
        'balasan' => 'required|string',
    ]);

    // Mengambil email pelanggan yang mengirim pesan
    $emailPelanggan = $pesan->user?->email;

    if (!$emailPelanggan) {
        return back()->withErrors([
            'balasan' => 'Email pelanggan tidak ditemukan.',
        ]);
    }

    // Mengirim email balasan
    Mail::raw($request->balasan, function ($message) use ($emailPelanggan) {
        $message->to($emailPelanggan)
                ->subject('Balasan Pesan dari Studio Flawless');
    });

    // Menyimpan balasan admin ke database
    $pesan->update([
        'balasan' => $request->balasan,
    ]);

    return redirect()
        ->route('admin.dashboardPesan')
        ->with('success', 'Balasan berhasil dikirim ke email pelanggan!');
}
    

    public function tambahLayanan() {

        return view('admin.tambahLayanan');
    }



    
    public function dashboardJadwal()
{
    $bookings = Booking::with(['user', 'items'])
        ->latest()
        ->get();

    return view('admin.dashboardJadwal', compact('bookings'));
}

public function dashboardPengingat()
{
    $bookings = Booking::with(['user', 'items'])
        ->whereDate('tanggal_kunjungan', today())
        ->orderBy('jam_kunjungan')
        ->get();

    return view('admin.dashboardPengingat', compact('bookings'));
}

    

    

     
    
}
