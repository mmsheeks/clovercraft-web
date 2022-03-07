@extends( 'layouts.full-width' )

@section( 'page' )
<section class="cover">
    <div class="cover-backdrop">
        <video autoplay muted loop playsinline poster="{{ asset( 'img/cover.png' ) }}">
            <source src="{{ asset( 'video/cover-video.mp4' ) }}" type="video/mp4">
        </video>
        <img class="cover-backdrop__nomotion" src="{{ asset( 'img/cover.png' ) }}">
    </div>
    <div class="cover-foreground">
        <div class="cover-foreground__inner">
            <h1>Clovercraft</h1>
            <h3>Running 1.18 Vanilla</h3>
            <a href="" class="btn btn-outline">Join</a>
        </div>
    </div>
</section>
@endsection