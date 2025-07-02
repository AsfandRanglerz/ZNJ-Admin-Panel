@component('mail::message')

Dear {{$data->name}}, Your account deletion request send successfully.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
