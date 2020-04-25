<div id="reply-{{ $reply->id }}" class="card mb-2">
    <div class="card-header">
        <div class="level">
            <h6 class="flex">
                <a href="{{route('profile', $reply->owner)}}">{{$reply->owner->name}}</a> said
                {{$reply->created_at->diffForHumans()}}
            </h6>

            <div>
                <form action="/replies/{{$reply->id}}/favorites" method="POST">
                    @csrf
                    <button class="btn btn-outline-primary" type="submit" {{$reply->isFavorited() ? 'disabled' : ''}}>
                        {{ $reply->favorites_count }} {{ Str::plural('Favorite', $reply->favorites_count )}}
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        {{$reply->body}}
    </div>
</div>