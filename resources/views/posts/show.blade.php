@extends("layouts.app")

@section("content")
        <div class="flex justify-center mt-5">
                <div class="w-8/12 bg-white p-6  rounded-md ">
                        <x-Post :item="$post"/>
                </div>
        </div>
@endsection