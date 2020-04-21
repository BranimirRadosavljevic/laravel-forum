@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-2">
                <div class="card-header">
                    <a href="{{route('profile', $thread->creator)}}">{{$thread->creator->name}}</a> posted:
                    {{$thread->title}}
                </div>

                <div class="card-body">
                    {{$thread->body}}
                </div>
            </div>
            
            @foreach ($replies as $reply)
                @include('threads._reply')
            @endforeach

            {{$replies->links()}}

            @if (auth()->check())

            <form action="{{$thread->path() . '/replies'}}" method="POST">
                @csrf
                <textarea name="body" id="body" class="form-control" placeholder="Have something to say?"
                    rows="5"></textarea>
                <button type="submit" class="btn btn-primary mt-2">Post</button>
            </form>

            @else
            <p class="text-center">Please <a href="{{route('login')}}">sign in</a> to participate in this discussion.
            </p>
            @endif
        </div>
        <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-body">
                    <p>
                        This thread was published {{$thread->created_at->diffForHumans()}} by
                        <a href="#">{{$thread->creator->name}}</a>, and currently has {{$thread->replies_count}}
                        {{Str::plural('comment', $thread->replies_count)}}.
                    </p>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection