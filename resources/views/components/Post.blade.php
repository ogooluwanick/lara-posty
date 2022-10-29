@props(['item'])

<div class="mb-4">
        <a href="{{route("user.post",$item->user)}}" class="font-bold">{{explode(" ",$item->user->name)[0]}}</a>
        <span class="text-gray-600">{{$item->created_at->diffForHumans()}}</span>
        <p class="mb-2">{{$item->body}}</p>
        <div class="flex items-center ">
                @auth
                        @if(!$item->likedBy(auth()->user()))
                                <form action="like/{{$item->id}}" class="mr-1" method="POST">
                                        @csrf
                                        <button type="submit" class="text-blue-500">Like</button>
                                </form>
                        @else
                                <form action="unlike/{{$item->id}}" class="mr-1" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="text-red-500">Unlike</button>
                                </form>
                        @endif
                        @if($item->ownedBy(auth()->user()))
                                <form action="delete/{{$item->id}}" class="mr-1  ml-1" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="text-red-500">Delete</button>
                                </form>
                        @endif
                @endauth
                <span class="ml-2">    {{$item->likes->count()}} {{Str::plural("like",$item->likes->count())}} </span>
        </div>
    </div>