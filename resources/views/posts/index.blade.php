@extends("layouts.app")

@section("content")
        <div class="flex justify-center mt-5">
                <div class="w-8/12 bg-white px-6 pt-6   rounded-md ">
                        @auth
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
                        @endAuth

                        <div class="my-4">
                                @if ($posts->count())
                                        @foreach ($posts as $item)
                                            <x-Post :item="$item"/>
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