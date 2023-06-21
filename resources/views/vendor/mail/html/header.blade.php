@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            @else
                <div style="display: flex;justify-content: center;align-items: center;">
                    <img src="{{asset('img/pls.png')}}" style="width: 30px"/>
                    <span class="text">&nbsp;{{ $slot }}</span>
                </div>
            @endif
        </a>
    </td>
</tr>
