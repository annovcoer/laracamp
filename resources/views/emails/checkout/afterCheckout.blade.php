<x-mail::message>
# Register Camp: {{$checkout->Camp->title}}

Hi {{$checkout->User->name}}
<br>
Thank you for Register on  <b>{{$checkout->Camp->title}}</b>, Please see Payment instruction by clicking the button below.

<x-mail::button :url="route('user.checkout.invoice', $checkout->id)">
Get Invoice
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
