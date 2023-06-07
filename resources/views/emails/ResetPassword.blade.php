@component('mail::message')

Reset Password Link
We have received reset password request, please click below button to reset password.
@component('mail::button', ['url' => $data['url']])
Reset Password Link
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
