@component('mail::message')

    Your Account Email: {{ $data['email'] }}
    Your Account Password: {{ $data['password'] }}

    Thanks,
    
    {{ config('app.name') }}
@endcomponent
