@extends( 'layouts.profile' )

@section( 'page' )
<div class="page-header">
    <h1>New Shop</h1>
</div>
<form class="form" method="POST" action="">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label for="name" class="mb-2">Shop Name*</label>
                <input type="text" class="form-control" name="name" id="name" required />
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="city" class="mb-2">City</label>
                <select class="form-select" name="city" id="city">
                    <option value="" selected disabled>Select a City</option>
                    @foreach( $cities as $city )
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-1">
            <div class="mb-3">
                <label for="location_x" class="mb-2">X*</label>
                <input class="form-control" type="text" name="location_x" id="location_x" required />
            </div>
        </div>
        <div class="col-1">
            <div class="mb-3">
                <label for="location_y" class="mb-2">Y*</label>
                <input class="form-control" type="text" name="location_y" id="location_y" required />
            </div>
        </div>
        <div class="col-1">
            <div class="mb-3">
                <label for="location_z" class="mb-2">Z*</label>
                <input class="form-control" type="text" name="location_z" id="location_z" required />
            </div>
        </div>
        <div class="col-8">
            <div class="mb-3">
                <label for="description" class="mb-2">Short Description</label>
                <input type="text" class="form-control" name="description" id="description"/>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="details" class="mb-2">Details</label>
                <textarea class="form-control" name="details" id="details" rows="4"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <h2>Shop Items</h2>
        <div class="col-12">
            <x-shop.items-selector/>
        </div>
    </div>
</form>
@endsection