@component('mail::message')
    {{$data[0]['subject']}}
@component('mail::subcopy')
    {{$data[0]['content']}}
@endcomponent

@endcomponent