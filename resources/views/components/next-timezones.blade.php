<div class="max-w-[1000px] p-2">
    <h2 class="font-bold">Next timezones to receive email:</h2>
    <p>
        @foreach ($timezones as $tz)
            @if ($loop->last)
                {{$tz}}.
            @else
                {{$tz}}, &nbsp;
            @endif
        @endforeach
    </p>
</div>