<x-mail::message>
    # Good Day

    Name: {{ $firstname . '  ' . $lastname }},
    Email Address: {{ $email }}
    Phone: {{ $phone }}
    Details: {{ $details }}



    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
