<div class="{{ $block->elem("section") }}" id={{ $itemIds['ID'] }} itemscope="" itemtype="http://schema.org/Product">
	<div class="{{ $block->elem("container-picture") }}" data-entity="images-container">
		<h2 class="{{ $block->elem("title") }}">{{ $item['NAME'] }}</h2>
		<img style="cursor: zoom-in;" class="{{ $block->elem("imag") }}"  itemprop="image" src="{{ $item['DETAIL_PICTURE']['SRC'] }}">
		@foreach ($item['DISPLAY_PROPERTIES'] as $value)
			<div class="{{ $block->elem("property-text") }}">
			@if (isset($value['LINK_ELEMENT_VALUE'][$value['VALUE'][0]]['NAME']))
				 <div class="{{ $block->elem("text-left") }}">{{ $value['NAME'] }}</div>
				 <div class="{{ $block->elem("text-right") }}">{{ $value['LINK_ELEMENT_VALUE'][$value['VALUE'][0]]['NAME'];}}
				 </div>
			@else
				<div class="{{ $block->elem("text-left") }}"> {{ $value['NAME'] }}</div>
				<div class="{{ $block->elem("text-right") }}"> {{ $value['VALUE'] }}</div>
			@endif
			</div>
		@endforeach
		<a href="/books/" class="{{ $block->elem("lists-btn") }}">
			Назад к списку
		</a>
	</div>
	<div class="{{ $block->elem("container-price") }}">
		<div class="{{ $block->elem("price-box") }}">
			<div class="{{ $block->elem("price") }}">
				@if ($item['ITEM_PRICES'][0]['DISCOUNT'] > 0)
					<div class="{{ $block->elem("price")->mod("old") }}" id={{ $itemIds['OLD_PRICE_ID'] }}>{!! $item['ITEM_PRICES'][0]['PRINT_BASE_PRICE'] !!}</div>
					<div class="{{ $block->elem("price")->mod("new") }}" id={{ $itemIds['PRICE_ID'] }}>{!! $item['ITEM_PRICES'][0]['PRINT_RATIO_PRICE'] !!}</div>
				@else
					<div class="{{ $block->elem("price") }}">{!! $item['ITEM_PRICES'][0]['PRINT_BASE_PRICE'] !!}</div>
				@endif
			</div>
			<div data-entity="main-button-container">
				<div id="{{ $itemIds['BASKET_ACTIONS_ID'] }}">
					<div>
						<a class="{{ $block->elem("buy-btn") }}" id="{{ $itemIds['BUY_LINK'] }}" href="javascript:void(0);">
							<span style="color: white;">В корзину</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>