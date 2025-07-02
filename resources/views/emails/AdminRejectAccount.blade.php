@component('mail::message')

Dear {{$data->name}}, Your account did not delete.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
