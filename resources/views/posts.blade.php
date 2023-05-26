@extends('layouts.main')
@section('container')
<div class="container d-flex justify-content-center">
    <div class="container text-center">
        <div class="jdl">
            <h1>UNJA</h1>
            <h3>Lapor Hilang</h3>
            <div class="wrapper">
                <form action="/posts">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('user'))
                        <input type="hidden" name="user" value="{{ request('user') }}">
                    @endif
                        <button type="reset" class="btn-reset">
                            <img src="/img/x.svg" alt="">
                        </button>
                        <input type="text" class="inp" name="search">
                        <button type="submit" class="btn-submit">
                            <img src="/img/search.svg" alt="">
                        </button>
                </form>
                
                <button class="mt-3 btn btn-primary" onclick="playAudioAndGif()">Kuru-Kuru Button
                </button>
                <button id="playButton" class="mt-3 btn btn-primary" onclick="toggleAudioLoop()">Kururin Theme Music <i class="fa-solid fa-play"></i></button>
                <button id="stopButton" class="mt-3 btn btn-primary" onclick="toggleAudioLoop()" style="display: none;">Kururin Theme Music <i class="fa-sharp fa-solid fa-stop"></i></button>


                <audio id="kururin" loop>
                    <source src="/img/kururin.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
                


            </div>
        </div>
        @if ($posts->count())
        <div class="container mt-3 mb-2">

            <div class="containerk" id="containerk">
                <audio id="myAudio">
                  <source src="/img/kuru1.mp3" type="audio/mpeg">
                  Your browser does not support the audio element.
                </audio>
                <img id="myGif" src="/img/kuru1.gif" width="320" height="240" alt="GIF">
              </div>

            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4 mb-2" style="opacity: 85%;">
                        <div class="card" style="min-height: 600px; max-height :700px;overflow:hidden;">
                            <div class="position-absolute bg-dark px-3 py-2 text-white rounded">{{ $post->condition->name }}</div>
                            <img src="https://source.unsplash.com/500x400?web" class="card-img-top" alt="">
                            <div class="card-body">
                                <div class="judul" style="min-height: 70px; max-height: 50px; overflow:hidden;display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical; text-overflow:ellipsis;">
                                <h4 class="card-title">
                                    <a href="/posts/{{ $post->slug }}"
                                        class="text-decoration-none text-dark">{{ $post->title }}
                                    </a>
                                </h4>
                                </div>
                                <p class="card-text" style="min-height: 65px; max-height: 50px; overflow:hidden;display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical; text-overflow:ellipsis;">
                                    <small class="text-muted">
                                        <strong>{{ $post->condition->name }}</strong> Oleh <a
                                            href="/posts?user={{ $post->user->nim }}"
                                            class="text-decoration-none">{{ $post->user->name }}</a> : <a
                                            href="/posts?category={{ $post->category->slug }}"
                                            class="text-decoration-none">{{ $post->category->name }}</a>
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text" style="max-height: 50px; overflow:hidden;display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical; text-overflow:ellipsis; ">{{ $post->body }}</p>
                            </div>
                            <footer class="footer text-end mb-4 mx-3">
                                <a href="/posts/{{$post->slug}}" class="btn btn-primary">Lihat Selengkapnya</a>
                                </footer>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
            
        @else
          <p class="text-center mt-4 fs-4">Postingan Tidak Ditemukan</p>  
          <div class="containerk" id="containerk">
            <audio id="myAudio">
              <source src="/img/kuru1.mp3" type="audio/mpeg">
              Your browser does not support the audio element.
            </audio>
            <img id="myGif" src="/img/kuru1.gif" width="320" height="240" alt="GIF">
          </div>
        @endif
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>

@endsection