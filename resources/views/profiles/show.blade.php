@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="pb-2 mt-4 mb-4 border-bottom">
                <h1>
                    {{$profileUser->name}}
                </h1>

                @can('update', $profileUser)
                <form method="POST" action="{{ route('avatar', $profileUser) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="avatar">

                    <button type="submit" class="btn btn-primary d-flex mt-2">Add Avatar</button>
                </form>
                @endcan

                <img src="{{ asset('/storage/' . $profileUser->avatar_path)}}" width="100" height="100">
            </div>

            @forelse ($activities as $date => $activity)
            <h3 class="pb-1 mt-4 mb-4 border-bottom">{{ $date }}</h3>

            @foreach ($activity as $record)
            @include("profiles.activities.{$record->type}", ['activity' => $record])
            @endforeach

            @empty
            <p>There is no activities for this user yet.</p>
            @endforelse

            {{-- {{ $threads->links() }} --}}
        </div>
    </div>
</div>

@endsection