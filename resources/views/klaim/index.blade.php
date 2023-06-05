@extends('layouts.main')
@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-dark">
     <h1 class="text-center">Klaim Saya</h1>
</div>
        @if (session()->has('success'))
          
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
@if ($klaims->count())    
<div class="table-responsive mb-3">
    <table class="table table-striped-columns table-sm table-dark">
      <thead class="text-center">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Kategori</th>
          <th scope="col">Kondisi</th>
          <th scope="col">Pemilik Postingan</th>   
          <th scope="col">Pengaju Klaim</th>  
          <th scope="col">Status</th>   
        </tr>
      </thead>
      <tbody class="text-center">
        @foreach ($klaims as $klaim)    
        <tr>
          <td class="text-white" style="vertical-align: middle">{{ $loop->iteration }}</td>
          <td class="text-white" style="vertical-align: middle"><a href="/posts/{{ $klaim->post->slug }}" class="text-white">{{ $klaim->post->title }}</a></td>
          <td class="text-white" style="vertical-align: middle">{{ $klaim->post->category->name }}</td>
          <td class="text-white" style="vertical-align: middle">{{ $klaim->post->condition->name }}</td>
          <td class="text-white" style="vertical-align: middle">{{ $klaim->post->user->name }}</td>
          <td class="text-white" style="vertical-align: middle">{{ $klaim->user->name }}</td>
          @if ($klaim->status_id == 2)
          <td class="text-white" style="vertical-align: middle;"><button class="btn btn-outline-warning" disabled>{{ $klaim->status->name }}</button></td>
          @elseif($klaim->status_id == 3)
          <td style="vertical-align: middle;"><button class="btn btn-outline-success" disabled>{{ $klaim->status->name }}</button></td>
          @else
          <td style="vertical-align: middle;"><button class="btn btn-outline-danger" disabled><strong>{{ $klaim->status->name }}</strong></button></td>
          @endif  

        </tr>
        @endforeach
      </tbody>
    </table>
</div>

@else
<p class="text-center mt-4 fs-4">Belum Ada Pengajuan Klaim</p>
@endif        

@endsection