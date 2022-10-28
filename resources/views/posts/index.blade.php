@extends("layouts.app")

@section("content")
        <div class="flex justify-center mt-5">
                <div class="w-8/12 bg-white px-6 pt-6   rounded-md ">
                        <form action={{route("posts")}} method="POST">
                                @csrf
                                <div class="mb-2">
                                        <label for="body" class="sr-only">Body</label>
                                        <textarea name="body" id="body" cols="30" rows="4" 
                                                         class="bg-gray-100 border-2 w-full p-4 rounded-lg @error("body") border-red-500  @enderror"
                                                         placeholder="Make a post?"></textarea>
                                        @error("body") 
                                                <div class="text-red-500 mt-2 text-sm">
                                                        {{$message}}
                                                </div>
                                        @enderror
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium mt-2">Post</button>
                                </div>
                        </form>

                        <div class="my-4">
                                @if ($posts->count())
                                        @foreach ($posts as $item)
                                            <div class="mb-4">
                                               {{-- @php
                                                   dd(explode($item->user->name))
                                               @endphp  --}}
                                                <a href="" class="font-bold">{{explode(" ",$item->user->name)[0]}}</a>
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
                                        @endforeach

                                        <div class="mt-6 p-4">
                                                {{$posts->links()}}    <!--Pagination links-->
                                        </div>
                                @else
                                        <p>There are no posts</p>
                                @endif
                        </div>
                </div>
        </div>
@endsection