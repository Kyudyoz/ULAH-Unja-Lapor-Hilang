@extends('layouts.main')
@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-dark">
     <h1 class="text-center">Pengajuan Klaim</h1>
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
          <th scope="col">Aksi</th>  
        </tr>
      </thead>
      <tbody class="text-center">
        @foreach ($klaims as $klaim)    
        <tr>
          <td class="text-white" style="vertical-align: middle">{{ $loop->iteration }}</td>
          <td class="text-white" style="vertical-align: middle"><a href="/posts/{{ $klaim->post->slug }}" class="text-white">{{ $klaim->post->title }}</a></td>
          <td class="text-white" style="vertical-align: middle">{{ $klaim->post->category->name }}</td>
          <td class="text-white" style="vertical-align: middle">{{ $klaim->post->condition->name }}</td>
          <td class="text-white" style="vertical-align: middle">{{ $klaim->post->user->name }} <a href="https://wa.me/{{ $klaim->post->user->no_hp }}" class="text-decoration-none text-white btn btn-success"><i class="fa-brands fa-whatsapp" style="color: #1ae817;"></i></td>
          <td class="text-white" style="vertical-align: middle">{{ $klaim->user->name }} <a href="https://wa.me/{{ $klaim->user->no_hp }}" class="text-decoration-none text-white btn btn-success"><i class="fa-brands fa-whatsapp" style="color: #1ae817;"></i></td>
          @if ($klaim->status_id == 2)
          <td class="text-white" style="vertical-align: middle;"><button class="btn btn-outline-warning" disabled>{{ $klaim->status->name }}</button></td>
          @elseif($klaim->status_id == 3)
          <td style="vertical-align: middle;"><button class="btn btn-outline-success" disabled>{{ $klaim->status->name }}</button></td>
          @else
          <td style="vertical-align: middle;"><button class="btn btn-outline-danger" disabled><strong>{{ $klaim->status->name }}</strong></button></td>
          @endif
          @if ($klaim->status_id == 2)    
          <td style="vertical-align: middle; width:max-content ">
            <form action="klaims/selesai/{{ $klaim->id }}" method="post" class="d-inline">
              @method('put')
              @csrf
              <button type="submit" class="btn btn-info"><i class="fa-solid fa-check"></i></button>
            </form>
            {{-- <form action="klaims/proses/{{ $klaim->id }}" method="post" class="d-inline">
              @method('put')
              @csrf
            <button type="submit" class="btn btn-warning"><i class="fa-solid fa-clock"></i></button>
            </form> --}}
            <form action="klaims/gagal/{{ $klaim->id }}" method="post" class="d-inline">
              @method('put')
              @csrf
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-xmark" style="color: #000000;"></i></button>
            </form>
          </td>
          @else
          <td style="vertical-align: middle; width:max-content "></td>
          @endif  
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  @else
  <p class="text-center mt-4 fs-4">Belum Ada Klaim yang Diajukan</p>  
@endif        

@endsection