@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-2">
                <div class="card-header">
                    <a href="#">{{$thread->creator->name}}</a> posted:
                        {{$thread->title}}
                </div>

                <div class="card-body">
                    {{$thread->body}}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($thread->replies as $reply)
                @include('threads._reply')
            @endforeach
        </div>
    </div>

    @if (auth()->check())
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{$thread->path() . '/replies'}}" method="POST">
                @csrf
                <textarea name="body" id="body" class="form-control" placeholder="Have something to say?" rows="5"></textarea>
                <button type="submit" class="btn btn-primary mt-2">Post</button>
            </form>
        </div>
    </div>
    @else
        <p class="text-center">Please <a href="{{route('login')}}">sign in</a> to participate in this discussion.</p>
    @endif
</div>
@endsection