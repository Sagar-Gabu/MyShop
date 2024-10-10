<x-mail::message>

# Introduction

The body of your message.

Name : {{$data['name'] }}

Email: {{ $data['email'] }}

message: {{ $data['message'] }}


<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
