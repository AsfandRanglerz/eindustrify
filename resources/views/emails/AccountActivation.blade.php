@component('mail::message')
Dear {{$data['name']}},

@if($data['status']==0)
Unfortunately ! Your account has been deactivated.
@else
Congratulation ! Your account has been activated successfully.
@endif


Thanks,

{{ config('app.name') }}
@endcomponent
