<x-mail::message>
# Greetings!

Hi {{ $user->name }}, we are glad to send you this message to remind you that you should drink enough water and rest well.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
