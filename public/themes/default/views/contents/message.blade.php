<style type="text/css">
</style>
<div class="row message-list-item {{ $message->user_id ? 'message-seller' : 'message-buyer message-me' }}">
    <div class="col-xs-2 nopadding-right">
      @if($message->user_id)
          <div class="message-user-info">
              <div class="message-user-name" title="seller">{{ $message->shop ? $message->shop->name : trans('theme.store') }}</div>
            <div class="message-date">{{ $message->created_at->toDayDateTimeString() }}</div>
        </div>
      @endif
    </div> <!-- .col-xs-2 -->
    <div class="col-xs-8">
        <div class="message-content-wrapper">
          <div class="message-content">
            <h4>{!! $message->subject !!}</h4>
            {!! $message->message !!}
          </div>
          @if($attachment = optional($message->attachments)->first())
            <a href="{{ get_storage_file_url($attachment->path, 'original') }}" class="pull-right message-attachment" target="_blank">
              <img src="{{ get_storage_file_url($attachment->path, 'tiny') }}" class="img-sm thumbnail">
            </a>
          @endif
        </div>
    </div> <!-- .col-xs-8 -->
    <div class="col-xs-2 nopadding-left">
      @unless($message->user_id)
        <div class="message-user-info">
            <div class="message-user-name" title="me">@lang('theme.me')</div>
            <div class="message-date">{{ $message->created_at->toDayDateTimeString() }}</div>
        </div>
      @endunless
    </div> <!-- .col-xs-2 -->
</div>

@foreach($message->replies->sortBy('created_at') as $msg)
  <div class="row message-list-item {{ $msg->customer_id ? 'message-buyer message-me' : 'message-seller' }}">
    <div class="col-xs-2 nopadding-right">
      @unless($msg->customer_id)
          <div class="message-user-info">
            <div class="message-user-name" title="seller">{{ $message->shop ? $message->shop->name : trans('theme.store') }}</div>
            <div class="message-date">{{ $msg->created_at->toDayDateTimeString() }}</div>
        </div>
      @endunless
    </div> <!-- .col-xs-2 -->
    <div class="col-xs-8">
        <div class="message-content-wrapper">
            <div class="message-content">{!! $msg->reply !!}</div>
          @if($attachment = optional($msg->attachments)->first())
          <a href="{{ get_storage_file_url($attachment->path, 'original') }}" class="pull-right message-attachment" target="_blank">
            <img src="{{ get_storage_file_url($attachment->path, 'tiny') }}" class="img-sm thumbnail">
          </a>
          @endif
        </div>
    </div> <!-- .col-xs-8 -->
    <div class="col-xs-2 nopadding-left">
        @if($msg->customer_id)
            <div class="message-user-info">
                <div class="message-user-name" title="me">@lang('theme.me')</div>
              <div class="message-date">{{ $msg->created_at->toDayDateTimeString() }}</div>
          </div>
        @endif
    </div> <!-- .col-xs-2 -->
  </div> <!-- .row .message-list-item -->
@endforeach

<!-- Reply the conversation -->
<div class="clearfix space20"></div>
<div class="row message-list-item">
  <div class="col-xs-2 nopadding-right">
  </div> <!-- .col-xs-2 -->
  <div class="col-xs-8">
    {!! Form::open(['route' => ['message.reply', $message], 'files' => true, 'id' => 'conversation-form', 'data-toggle' => 'validator']) !!}
        <div class="form-group">
          {!! Form::textarea('reply', null, ['class' => 'form-control form-control flat', 'placeholder' => trans('theme.placeholder.message'), 'rows' => '3', 'maxlength' => 500, 'required']) !!}
            <div class="help-block with-errors"></div>
        </div>
        {!! Form::button(trans('theme.button.send_message'), ['type' => 'submit', 'class' => 'btn btn-info flat pull-right']) !!}
    {!! Form::close() !!}
  </div> <!-- .col-xs-8 -->
  <div class="col-xs-2 nopadding-left">
  </div> <!-- .col-xs-2 -->
</div> <!-- .row .message-list-item -->

<div class="clearfix space50"></div>