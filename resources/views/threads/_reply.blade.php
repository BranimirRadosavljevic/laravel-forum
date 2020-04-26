<reply :attributes="{{ $reply }}" inline-template v-cloak>
    <div id="reply-{{ $reply->id }}" class="card mb-2">
        <div class="card-header">
            <div class="level">
                <h6 class="flex">
                    <a href="{{route('profile', $reply->owner)}}">{{$reply->owner->name}}</a> said
                    {{$reply->created_at->diffForHumans()}}
                </h6>

                @if (Auth::check())
                    
                <div>
                    <favorite :reply="{{ $reply }}" ></favorite>
                    {{-- <form action="/replies/{{$reply->id}}/favorites" method="POST">
                            @csrf
                            <button class="btn btn-primary btn-sm" type="submit"
                            {{$reply->isFavorited() ? 'disabled' : ''}}>
                            {{ $reply->favorites_count }} {{ Str::plural('Favorite', $reply->favorites_count )}}
                        </button>
                    </form> --}}
                </div>
            @endif
            </div>
        </div>
        <div class="card-body">
            <div v-if="editing">
                <form action="" class="form-group">
                    <textarea class="form-control" v-model='body'></textarea>
                </form>

                <button class="btn btn-sm btn-primary" @click="update">Update</button>
                <button class="btn btn-sm btn-link" @click="editing = false">Cancel</button>
            </div>
            <div v-else v-text="body">
                {{-- {{$reply->body}} --}}
            </div>
        </div>
        @can('update', $reply)
        <div class="card-footer level">
            <button class="btn btn-sm btn-dark mr-2" @click="editing = true">Edit</button>
            <button class="btn btn-sm btn-danger" @click="destroy">Delete</button>
        </div>
        @endcan
    </div>
</reply>