
@extends('layouts.main')
@section('container')

<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-10 mb-4" style="opacity: 90%;">
                <div class="card">
                    <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="max-width: 1200px;min-height:350px;max-height:350px;">
                    <div class="card-body">
                        <h2 class="card-title mb-3">{{ $post->title }}</h2>
                        
                        @if ((auth()->user()->name != $post->user->name || $post->status->id != 1) && !auth()->user()->is_admin)    
                        <form action="/klaim/{{ $post->slug }}" method="post">
                            @csrf
                            <div class="actions mb-2" >
                                @if ($post->status_id == 1)
                                <button type="submit" class="btn btn-warning"><i class="fa-solid fa-hand fa-md"></i> Klaim</button>
                                @elseif($post->status_id == 2)
                                <button disabled class="btn btn-outline-warning"><i class="fa-solid fa-clock fa-md"></i> Diproses</button>
                                @else
                                <button disabled class="btn btn-outline-success"><i class="fa-solid fa-check fa-md"></i> Dikembalikan</button>
                                @endif
                            </div>
                        </form>
                        @endif 
                        
                        <p class="card-text">
                            <small class="text-muted">
                                <strong>{{ $post->condition->name }}</strong> Oleh <a
                                href="/posts?user={{ $post->user->nim }}"
                                class="text-decoration-none">{{ $post->user->name }}</a> : <a
                                    href="/posts?category={{ $post->category->slug }}"
                                    class="text-decoration-none">{{ $post->category->name }}</a>
                                {{ $post->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <article class="my-3 fs-6">
                            {!! $post->body !!}
                        </article>
                    </div>
                    <div class="mx-3">
                        <footer class="footer mb-4">
                            <a href="/posts" class=" mt-2 btn btn-primary">Kembali ke Home</a>
                        </footer>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection