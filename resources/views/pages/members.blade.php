@extends( 'layouts.page' )

@section('page')
    <h1>Members</h1>
    <p class="fs-4">Clovercraft is proud of the community we foster. Our server wouldn't be possible without the presence of everyone in our community. The members below have opted to have their profile shared publicly.</h2>
    <div class="row" id="member-cards">
        @foreach( $members as $member )
            <article class="member-card" id="member-{{ $member->name }}">
                <img alt="{{ $member->name }}" src="{{ $member->avatar }}" class="avatar">
                <div class="member-details">
                    <p class="member-title">{{ $member->name }}</p>
                    <p class="member-meta">Member since<br/>{{ date( 'M d, Y', strtotime( $member->joined_on ) ) }}</p>
                    
                </div>
            </article>
        @endforeach
    </div>
@endsection