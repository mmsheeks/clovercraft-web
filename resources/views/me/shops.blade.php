@extends( 'layouts.profile' )

@section( 'page' )
<div class="page-header d-flex justify-between">
    <h1>My Shops</h1>
    <a href="{{ route( 'me.shops_new' ) }}" class="ms-auto btn btn-outline">New Shop</a>
</div>
<div class="row">
    <div class="col shop-grid">
    </div>
</div>
@endsection