{{ $product->name }}

@unless($product->active)
    <span class="label label-default indent10">{{ trans('app.inactive') }}</span>
@endunless