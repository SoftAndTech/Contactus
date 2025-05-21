<x-mail::message>
# Introduction

This is a test mail from {{$name}}
{{ $message }}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
