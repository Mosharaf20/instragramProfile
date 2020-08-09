@component('mail::message')


@component('mail::button', ['url' => '/'])
    Just Click
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
