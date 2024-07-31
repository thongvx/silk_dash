@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}

    <h1 style="color: #009FB2"><b><i>Dear member,</i></b></h1>
    <p style="color: #009FB2">I’m <b>Richard</b>, manager of <a href="https://streamsilk.com/" style="color: #009FB2">StreamSilk.com</a>.</p>
    <p>I’m very happy to give you our <b style="color: #009FB2">Gift program</b> for new members. On your first withdrawal, you will receive an
        additional <b style="color: #009FB2">10% to 30%</b>.</p>
    <p>The bigger the amount, the bigger the gift. The program is valid for <b  style="color: #009FB2">1 month</b> from the time you register
        your account.</p>
    <p>Please access the Report page To see your balance and make payout.
    @component('mail::button', ['url' => 'https://streamsilk.com/report?tab=date'])
        Report page
    @endcomponent
    <p>Let’s start uploading your videos and sharing them to make lots of money now!</p>
    <p>If you need any further support, please don’t hesitate to contact me!</p>
    <p style="color: #009FB2">Telegram: <a href="https://t.me/RichardSSilk" style="color: #009FB2">https://t.me/RichardSSilk</a><br>
        Skype: <a href="skype:live:.cid.62ed279799bfed31" style="color: #009FB2">live:.cid.62ed279799bfed31</a></p>
    <p  style="color: #009FB2"><i>Regards,<br><b>Richard - StreamSilk</b></i></p>

    {{-- Subcopy --}}
    @slot('subcopy')
        <div class="subcopy">
            {!! $subcopy !!}
            <p>If you’re having trouble clicking the "Report page" button, copy and paste the URL below into your web browser: <a href="https://streamsilk.com/report?tab=date">https://streamsilk.com/report</a></p>
        </div>
    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
