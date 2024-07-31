@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}

    <h1><b><i>Dear member,</i></b></h1>
    <p class="color: #009FB2">I’m <b>Richard</b>, manager of <a href="https://streamsilk.com/">StreamSilk.com</a>.</p>
    <p>I’m very happy to give you our <b>Gift program</b> for new members. On your first withdrawal, you will receive an
        additional <b>10% to 30%</b>.</p>
    <p>The bigger the amount, the bigger the gift. The program is valid for <b>1 month</b> from the time you register
        your account.</p>
    <p>Please access the <b>Report page</b> to get details.</p>
    @component('mail::button', ['url' => 'https://streamsilk.com/report?tab=date'])
        Report page
    @endcomponent
    <p>Let’s start uploading your videos and sharing them to make lots of money now!</p>
    <p>If you need any further support, please don’t hesitate to contact me!</p>
    <p>Telegram: <a href="https://t.me/RichardSSilk">https://t.me/RichardSSilk</a><br>
        Skype: <a href="skype:live:.cid.62ed279799bfed31">live:.cid.62ed279799bfed31</a></p>
    <p>Regards,<br><b><i>Richard - StreamSilk</i></b></p>

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
