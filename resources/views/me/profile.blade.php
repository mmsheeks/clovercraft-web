@extends( 'layouts.profile' )

@section( 'page' )

<div class="row">
    <div class="col-3" id="discord-facts">
        <img alt="{{ $user->name }}" src="{{ $user->avatar }}" class="avatar">
        <div class="profile-title">
            <h1>{{ $user->name }}<br/>
                <small>{{ $user->nickname }}</small>
            </h1>
            <p>Member since {{ date( 'M d, Y', strtotime( $user->joined_on ) ) }}</p>
        </div>
    </div>
    <div class="col-9"  id="options">
        <h2>Profile</h2>
        <form class="form" method="POST" action="{{ route( 'me.profile_update' ) }}">
            <div class="mb-3">
                <label for="pronouns">Pronouns</label>
                <input type="text" class="form-control" id="pronouns" name="pronouns" value="{{ $user->pronouns }}">
            </div>
            <div class="mb-3">
                <label for="birthday">Birthday</label>
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}">
            </div>
            <div class="mb-3">
                <label for="timezone">Timezone</label>
                <select id="timezone" name="timezone" class="form-select">
                    @foreach( $timezones as $zone )
                        <option value="{{ $zone->value }}" @if( $user->timezone === $zone->value ) selected @endif>{{ $zone->text }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <h4 class="lead">Citizen Of</h4>
                @foreach( $cities as $slug => $city )
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="member-{{ $slug }}" value="{{ $slug }}" name="citizenship" @if( in_array( $slug, explode(",", $user->citizenship ) ) ) checked @endif>
                        <label class="form-check-label" for="member-{{ $slug }}">{{ $city }}</label>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="bio">Biography</label>
                <textarea name="bio" id="bio" rows="4" class="form-control">{{ $user->bio }}</textarea>
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" value="1" id="listed" name="listed" @if( $user->listed ) checked @endif>
                <label class="form-check-label" for="listed">Publicly list my member profile</label>
            </div>
            <div class="mb-3">
                @csrf()
                <button type="submit" class="btn btn-outline">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection