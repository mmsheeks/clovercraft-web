@extends('layouts.page')

@section( 'page' )
    <div class="row">
        <div class="col">
            <h1 class="page-title">Server Shops</h1>
            <p class="lead">Our server supports both player and admin run villager shops! Listings here may or may not be up to date, and are maintained by our players. If you would like to list your shop, you can log in and add the required information!</p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <h3>Filters</h3>
            <label>City</label>
            <select id="filter__city" class="form-select">
                <option value="capitol">The Capitol</option>
                <option value="aescland">Aescland / The Skyless City</option>
                <option value="arcadia">Arcadia</option>
                <option value="eldershire">Eldershire</option>
                <option value="noden">Noden</option>
            </select>
            <label>Item</label>
            <select id="filter__item" class="form-select">
                @foreach( $items as $item )
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-9">
            @foreach( $shops as $shop ) 
                <x-shop-card :shop="$shop" />
            @endforeach
        </div>
    </div>
@endsection