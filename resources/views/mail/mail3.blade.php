@component('mail::message')
# Hello

Kindly review the requistion

@component('mail::button', ['url' => $url])
View Requistion
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
