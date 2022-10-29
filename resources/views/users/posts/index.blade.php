@extends("layouts.app")

@section("content")
        <div class="flex justify-center mt-5">
                <div class="w-8/12 bg-white p-6  rounded-md ">
                        <div class="p-6">
                                <h1 class="mb-1 text-2xl font-medium"> {{$user->name}} </h1>
                                <p>Posted {{ $posts->count()}} {{Str::plural("post",$posts->count())}}</p>
                        </div>
                        <div class="my-4">
                                @if ($posts->count())
                                        @foreach ($posts as $item)
                                            <x-Post :item="$item"/>
                                        @endforeach

                                        <div class="mt-6 p-4">
                                                {{$posts->links()}}    <!--Pagination links-->
                                        </div>
                                @else
                                        <p> {{$user->name}} has no posts</p>
                                @endif
                        </div>
                       
                </div>
        </div>
@endsection