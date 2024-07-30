@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'StreamSilk')
    <div style="display: flex;">
        <img src="https://streamsilk.com/image/logo/logo4.webp" style="width: 70px;height:auto;" class="logo" alt="StreamSilk">
        <img src="https://streamsilk.com/image/logo/name.webp" style="height: 50px; margin: 15px 0;">
    </div>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
