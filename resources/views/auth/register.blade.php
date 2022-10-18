@extends("layouts.app")

@section("content")
        <div class="flex justify-center mt-5">
                <div class=" bg-white p-6  rounded-md  w-4/12">
                        <form action={{ route('register') }} method="POST">
                                @csrf
                                <div class="mb-4">
                                        <label for="name" class="sr-only">Name</label>
                                        <input name="name" id="name" placeholder="Your name" type="text" class="bg-grey-100 border-2 w-full p-4 rounded-lg" value={{old("name")}}>
                                        @error('name')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{$message}}
                                            </div>
                                        @enderror
                                </div>
                                <div class="mb-4">
                                        <label for="username" class="sr-only">Username</label>
                                        <input name="username" id="username" placeholder="Your username" type="text" class="bg-grey-100 border-2 w-full p-4 rounded-lg" value={{old("username")}}>
                                        @error('username')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{$message}}
                                            </div>
                                        @enderror
                                </div>
                                <div class="mb-4">
                                        <label for="email" class="sr-only">Email</label>
                                        <input name="email" id="email" placeholder="Your email" type="email" class="bg-grey-100 border-2 w-full p-4 rounded-lg" value={{old("email")}}>
                                        @error('email')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{$message}}
                                            </div>
                                        @enderror
                                </div>
                                <div class="mb-4">
                                        <label for="password" class="sr-only">Password</label>
                                        <input name="password" id="password" placeholder="Your password" type="password" class="bg-grey-100 border-2 w-full p-4 rounded-lg" value="">
                                        @error('password')
                                                @if($message!=="The password confirmation does not match.")
                                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p> 
                                                @endif
                                        @enderror
                                </div>
                                <div class="mb-4">
                                        <label for="password_confirmation" class="sr-only">Password again</label>
                                        <input name="password_confirmation" id="password" placeholder="Repeat password" type="password" class="bg-grey-100 border-2 w-full p-4 rounded-lg" value="">
                                        @error('password')
                                                @if($message==="The password confirmation does not match.")
                                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p> 
                                                @endif
                                        @enderror
                                </div>

                                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                        </form>
                </div>
        </div>
@endsection