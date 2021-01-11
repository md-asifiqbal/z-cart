<div class="product-info-rating">
	@if($ratings)
		@for($i = 0; $i < 5; $i++)
			@if( ($ratings - $i) >= 1 )
				<span class="rated"><i class="fa fa-star fa-fw"></i></span>
			@elseif( ($ratings - $i) < 1 && ($ratings - $i) > 0 )
				<span class="rated"><i class="fa fa-star-half-o fa-fw"></i></span>
			@else
				<span><i class="fa fa-star-o fa-fw"></i></span>
			@endif
		@endfor
	@endif

	@if(isset($count) && $count)
		@if(isset($shop) && $shop)
	        <a href="javascript:void(0)" data-toggle="modal" data-target="#shopReviewsModal" data-tab="#shop_reviews_tab" class="rating-count shop-rating-count">
	        	({{ get_formated_decimal($ratings,true,1) }}) {{ trans_choice('theme.reviews', $count, ['count' => $count]) }}
			</a>
		@elseif(isset($item))
			<a href="{{ route('show.product', $item->slug) . '#reviews_tab' }}" class="rating-count product-rating-count">
				({{ get_formated_decimal($ratings,true,1) }}) {{ trans_choice('theme.reviews', $count, ['count' => $count]) }}
			</a>
		@endif
	@endif
</div>