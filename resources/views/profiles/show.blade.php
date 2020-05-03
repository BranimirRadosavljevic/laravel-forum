@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="pb-2 mt-4 mb-4 border-bottom">
                <avatar-form :user="{{ $profileUser }}"></avatar-form>
            </div>

            @forelse ($activities as $date => $activity)
                <h3 class="pb-1 mt-4 mb-4 border-bottom">{{ $date }}</h3>

            @foreach ($activity as $record)
                @include("profiles.activities.{$record->type}", ['activity' => $record])
            @endforeach

            @empty
            <p>There is no activities for this user yet.</p>
            @endforelse
        </div>
    </div>
</div>

@endsection