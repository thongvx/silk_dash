
@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    <h1 style="color: #009FB2"><b><i>Dear member,</i></b></h1>
    <p>Your ticket with subject "{{ $ticketData['subject'] }}" has been replied to.</p>
    <p>Message: </p>
    <p>{!! nl2br(html_entity_decode($ticketData['message'])) !!}</p>
    <p>Click the button below to view the ticket.</p>
    @component('mail::button', ['url' => 'https://streamsilk.com/support/'.$ticketData['ticket_id']])
        View Ticket
    @endcomponent
    <p>Thank you for using our application!</p>

    {{-- Subcopy --}}
    @slot('subcopy')
        <div class="subcopy">
            {!! $subcopy !!}
            <p>If you’re having trouble clicking the "View Ticket" button, copy and paste the URL below into your web browser: <a href="{{ url(route('support.show', ['support' => $ticketData['ticket_id']])) }}">{{ url(route('support.show', ['support' => $ticketData['ticket_id']])) }}</a></p>
        </div>
    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
