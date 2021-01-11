@extends('layouts.main')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-2 nopadding">
                    
                </div><!-- /.col-md-2 -->

                <div class="col-md-10 nopadding-right">



<div class="modal-dialog modal-sm" role="document">
    <div class="modal-content flat">
        <div class="modal-header">
            <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
            {{ $address->address_type .' '. trans('theme.address') }}
        </div>
        <div class="modal-body">
            {!! Form::model($address, ['route' => ['my.address.update', $address], 'method' => 'PUT', 'data-toggle' => 'validator']) !!}
                @if(isset($address_types))
                    <div class="form-group">
                      {!! Form::select('address_type', $address_types, null, ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.address_type'), 'required']) !!}
                      <div class="help-block with-errors"></div>
                    </div>
                @endif

                @include('forms.address')

                <button type="submit" class='btn btn-default btn-sm flat pull-right'><i class="fa fa-save"></i> {{ trans('theme.button.save') }}</button>
            {!! Form::close() !!}
            <small class="help-block text-muted">* {{ trans('theme.help.required_fields') }}</small>
        </div><!-- /.modal-body -->
        <div class="modal-footer">
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
                  
                      <!-- BROWSING ITEMS -->
    @include('sliders.browsing_items')
@endsection
