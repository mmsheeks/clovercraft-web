@extends( 'layouts.app' )

@section( 'layout' )
<div class="container pt-3 profile">
    <aside role="navigation" class="profile-links">
        <a href="{{ route('me.profile') }}" @activepage( 'me.profile' ) class="active" @endactivepage>Profile</a>
        <a href="{{ route('me.shops') }}" @activepage( 'me.shops' ) class="active" @endactivepage>My Shops</a>
        <a href="">My Lore</a>
    </aside>
    <main>
        @yield( 'page' )
    </main>
</div>
@endsection