@component('mail::message')
Register Camp: {{ $checkout->camp->title }}

Hi {{ $checkout->user->name }} 
<br>
Thank You for register on {{ $checkout->camp->title }}, Please see payment instruction by click the button bellow.

@component('mail::button', ['url' => route('dashboard')])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
