<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Klaim;
use Illuminate\Http\Request;

class KlaimController extends Controller
{
    public function index()
    {
        
        return view('klaim.index',[
            "title" => "Klaim Saya",
            'klaims' => Klaim::where('user_id', auth()->user()->id)->latest()->get()
        ]);
    }
    public function addToKlaim(Request $request, $slug)
    {
        $user = $request->user(); // Mendapatkan data pengguna yang sedang terautentikasi
        $post = Post::where('slug',$slug)->first();
 
        // Cek apakah barang sudah ada di klaim pengguna
        $existingKlaim = Klaim::where('post_id', $post->id)
            ->where('user_id', $user->id)
            ->first();

        if ($existingKlaim) {
            return redirect('/')->with('gagal', 'Klaim sudah pernah diajukan');
        }

        // Tambahkan klaim ke klaim pengguna
        
        $post->status_id = 2;

        $post->save();
        Klaim::create([
            'post_id' => $post->id,
            'user_id' => $user->id,
            'status_id'=> 2,
        ]);

        return redirect('/')->with('success', 'Postingan berhasil ditambahkan ke klaim anda');
    }
}
