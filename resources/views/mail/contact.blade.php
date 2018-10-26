<p>
    {!! trans('emails.contact.intro') !!}
</p>
<hr>
<h4>
    {!! trans('emails.contact.details') !!}
</h4>
<ul>
    @if($firstname)
        <li>
            {!! trans('emails.contact.labels.firstname') !!} <strong>{{ $firstname }}</strong>
        </li>
    @endif
    @if($lastname)
        <li>
            {!! trans('emails.contact.labels.lastname') !!} <strong>{{ $lastname }}</strong>
        </li>
    @endif
    @if($phone)
        <li>
            {!! trans('emails.contact.labels.phone') !!} <strong>{{ $phone }}</strong>
        </li>
    @endif
    @if($email)
        <li>
            {!! trans('emails.contact.labels.email') !!} <strong>{{ $email }}</strong>
        </li>
    @endif
</ul>
<hr>
@if($messageLines)
    <h4>
        {!! trans('emails.contact.labels.message') !!}
    </h4>
    <p>
        @foreach ($messageLines as $messageLine)
            {{ $messageLine }}<br>
        @endforeach
    </p>
    <hr>
@endif
