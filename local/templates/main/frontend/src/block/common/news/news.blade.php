<div class="{{ $block->elem("content") }}">
	@if ($items['CATEGORY_NAME'])
		{!! $title !!}
	@endif
	<div class="{{ $block->elem("blocks") }}">
		@foreach ($items['ITEMS'] as $item)
			<div class="{{ $block->elem("card") }}">
			 <div class="{{ $block->elem("card-date") }}">
			 	<p class="{{ $block->elem("card-date-text") }}"> 
			 		{{ $item['DISPLAY_ACTIVE_FROM'] }}
                </p>
             </div>
             <div class="{{ $block->elem("card-title") }}">{{ $item['NAME'] }}</div>
             <div class="{{ $block->elem("card-text") }}">{{ $item['PREVIEW_TEXT'] }}</div>
             <a class="{{ $block->elem("btn") }}" href="{{ $item['DETAIL_PAGE_URL'] }}"><button class="{{ $block->elem("card-button") }}"><p class="{{ $block->elem("card-button-text") }}"> ПОДРОБНЕЕ </p><i class="fa-solid fa-arrow-right-long fa-2xl"></i></button></a>
			</div>
		@endforeach
	</div>
</div>