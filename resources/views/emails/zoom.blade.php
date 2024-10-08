@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot
    {{-- Body --}}
    <h1><b><i>Dear member,</i></b></h1>
    <p>
        How are you doing?<br>
        I’m Richard, manager of <a href="https://streamsilk.com/" style="color: #009FB2">StreamSilk</a>.<br>
    </p>
    <p>
        <span style="color: #009FB2">We are excited to announce that we have partnered with Zoom to increase video upload speeds to the highest possible level.</span><br>
        Please use newest version of Z-o-o-m app to continue uploading your videos.<br>
        <span style="color: #009FB2; font-style: italic;">And the streamsilk[api] has best speed for upload videos</span>
    </p>
    <p>
        Let’s upload your videos and experience our “silky” uploading and playing service 😊
    </p>
    <p>
        If you need any further support, please don’t hesitate to contact me!<br>
        Telegram: <a href="https://t.me/RichardSSilk" style="color: #009FB2">https://t.me/RichardSSilk</a><br>
        Skype: <a href="skype:live:.cid.62ed279799bfed31" style="color: #009FB2">live:.cid.62ed279799bfed31</a>
    </p>
    <p  style="color: #009FB2"><i>Regards,<br><b>Richard - StreamSilk</b></i></p>
{{-- Footer --}}
@slot('footer')
    @component('mail::footer')
        © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
    @endcomponent
@endslot
@endcomponent
