@component('mail::message')
#{{ trans('notifications.new_message.greeting', ['receiver' => $receiver]) }}

{!! trans('notifications.new_message.message', ['message' => $message->message]) !!}
<br/>

@component('mail::button', ['url' => $url, 'color' => 'blue'])
{{ trans('notifications.new_message.button_text') }}
@endcomponent

{{ trans('messages.thanks') }},<br>
{{ get_platform_title() }}
@endcomponent
