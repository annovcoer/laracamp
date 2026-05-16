<x-mail::message>
# Your transaction Has Been confirmed

Hi {{$checkout->User->name}}
<br>
Your transaction Has Been confirmed, now you can enjoy the benefit of <b>{{$checkout->Camp->title}} camp.</b>

<x-mail::button :url="route('user.dashboard')">
My Dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
