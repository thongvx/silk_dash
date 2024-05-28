@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'StreamSilk')
    <div style="display: flex;">
        <img src="https://user.streamsilk.com/assets/img/logo3.png" style="width: 70px;height:auto;" class="logo" alt="Laravel Logo">
        <img src="https://user.streamsilk.com/assets/img/name-web3.png" style="height: 40px; margin: 15px 0;" alt="main_logo">
    </div>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
