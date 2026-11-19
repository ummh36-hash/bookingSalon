<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;

class BookingController extends Controller
{
    public function checkout(Request $request)
    {
        // 1. Validasi data dari keranjang
        $request->validate([
            'tanggal_kunjungan' => 'required|date|after_or_equal:today',
            'jam_kunjungan' => 'required',
            'metode_pembayaran' => 'required|in:qris,bank',
        ]);

        // 2. Ambil data keranjang dari session
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('user.keranjang')
                ->with('error', 'Keranjang masih kosong.');
        }

        // 3. Hitung total harga
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['harga'];
        }

        // 4. Simpan booking dan detail layanan
        $booking = DB::transaction(function () use ($request, $cart, $total) {

            $booking = Booking::create([
                'user_id' => auth()->id(),
                'tanggal_kunjungan' => $request->tanggal_kunjungan,
                'jam_kunjungan' => $request->jam_kunjungan,
                'metode_pembayaran' => $request->metode_pembayaran,
                'total' => $total,
                'status' => 'Menunggu Pembayaran',
            ]);

            foreach ($cart as $item) {
                $booking->items()->create([
                    'layanan_id' => $item['id'],
                    'nama_layanan' => $item['nama_layanan'],
                    'harga' => $item['harga'],
                ]);
            }

            return $booking;
        });

        // 5. Simpan ID booking yang sedang diproses
        session()->put('active_booking_id', $booking->id);

        // 6. Kosongkan keranjang
        session()->forget('cart');

        // 7. Arahkan user ke halaman pembayaran
        if ($request->metode_pembayaran === 'qris') {
            return redirect()->route('user.qris');
        }

        return redirect()->route('user.bank');
    }
}