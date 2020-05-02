@component('mail::message')
# Introduction

Reservation for {{ $name }} at {{ config('app.name') }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent