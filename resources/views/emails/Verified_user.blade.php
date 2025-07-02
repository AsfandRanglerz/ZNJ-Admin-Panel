@component('mail::message')

Dear {{$message['name']}},
@if($message['is_verify'] == '0')
Your account has been Un-verified
@else
Congratulation Your account has been verified
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
