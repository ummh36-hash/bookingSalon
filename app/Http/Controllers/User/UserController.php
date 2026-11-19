<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
{
    $layanans = Layanan::all();

    return view('user.index', compact('layanans'));
} 

    public function layananUser()
    {
        $layanans = Layanan::all();

        return view('user.layananUser', compact('layanans'));
    }



public function tambahKeranjang(Request $request)
{
    $request->validate([
        'layanan_id' => 'required|exists:layanans,id',
    ]);

    $layanan = Layanan::findOrFail($request->layanan_id);

    $cart = session()->get('cart', []);

    // Cek apakah layanan sudah ada di keranjang
    if (!isset($cart[$layanan->id])) {

        $cart[$layanan->id] = [
            'id' => $layanan->id,
            'nama_layanan' => $layanan->nama_layanan,
            'harga' => $layanan->harga,
            'gambar' => $layanan->gambar,
            'qty' => 1,
        ];

    }

    session()->put('cart', $cart);

    return back()->with('success', 'Layanan berhasil ditambahkan ke keranjang!');
}



// Menampilkan halaman keranjang
public function keranjang()
{
    $cart = session()->get('cart', []);

    $total = 0;

    foreach ($cart as $item) {
        $total += $item['harga'] * $item['qty'];
    }

    return view('user.keranjang', compact('cart', 'total'));
}


// Menghapus layanan dari keranjang
public function hapusKeranjang($id)
{
    $cart = session()->get('cart', []);

    unset($cart[$id]);

    session()->put('cart', $cart);

    return back()->with('success', 'Layanan berhasil dihapus dari keranjang.');
}
    
    
   
public function qris()
{
    return view('user.qris');
}


public function bank()
{
    return view('user.bank');
}


public function pesanan()
{
    return view('user.pesanan');
}







    

}
