@component('mail::message')
# Your post was liked 

{{$liker->name}} liked one of your post 

@component('mail::button', ['url' => route("post.show",$post)])
        View post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
