@component('mail::message')

Dear {{$data->name}}, Your account deleted successfully.


Thanks,<br>
{{ config('app.name') }}
@endcomponent