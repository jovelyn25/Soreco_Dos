<h5>Notice of Power Service Interruption</h5>

Date :{{ $notice_date }}<br>
Time :{{ $notice_time }}<br>
Affected Areas : {{ $notice_areas }} <br>
Reasons :{{ $notice_reasons }} <br><br>

{{-- **We'll wait for your approval, Thank You!**<br> --}}
{{-- <button>
    <a href="mailto:honeylynestadola@gmail.com">Forward to General Manager<a />
</button> --}}

@component('mail::button', ['mailto:honeylynestadola@gmail.com', 'color' => 'primary'])
@endcomponent
