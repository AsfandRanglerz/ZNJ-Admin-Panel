@component('mail::message')

Dear {{$sender->name}},
Your payment has been receieved successfully.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
