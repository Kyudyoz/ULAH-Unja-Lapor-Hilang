<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Klaim;

class AdminKlaimController extends Controller
{
    public function index()
    {
        
        return view('admin.index',[
            "title" => "Pengajuan Klaim",
            'klaims' => Klaim::latest()->get()
        ]);
    }

    public function selesai($id)
    {
        
        $klaim = Klaim::where('id',$id)->first();

        
        $klaim->status_id = 3;
        $klaim->post->status_id = 3;
        
        $klaim->save();
        $klaim->post->save();
        return redirect('/klaims')->with('success', 'Pengajuan klaim sudah terupdate');
    }
    public function proses($id)
    {
        
        $klaim = Klaim::where('id',$id)->first();

        
        $klaim->status_id = 2;
        $klaim->post->status_id = 2;
        
        $klaim->save();
        $klaim->post->save();

        return redirect('/klaims')->with('success', 'Pengajuan klaim sudah terupdate');
    }
    public function gagal($id)
    {
        
        $klaim = Klaim::where('id',$id)->first();

        
        $klaim->status_id = 1;
        $klaim->post->status_id = 1;
        
        $klaim->save();
        $klaim->post->save();

        return redirect('/klaims')->with('success', 'Pengajuan klaim sudah terupdate');
    }
}
