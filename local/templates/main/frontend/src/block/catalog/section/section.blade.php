<div class="{{ $block->elem("content") }}">
		@foreach ($arResult['ITEM_ROWS'] as $rowData)
		@php
			$rowItems = array_splice($arResult['ITEMS'], 0, $rowData['COUNT']);
		@endphp
			<div class="{{ $block->elem("section") }}">
					@foreach ($rowItems as $item)
						<div class="{{ $block->elem("kart") }}">
							<a style="text-decoration:none; color: inherit;" href="{{ $item['DETAIL_PAGE_URL'] }}">
							<span class="{{ $block->elem("product-item-image-wrapper") }}">
								<span class="{{ $block->elem("product-item-image-original") }}"
									style="background-image: url('{{ $item['PREVIEW_PICTURE']['SRC'] }}');">
								</span>
							</span>
							
							<div class="{{ $block->elem("kart-title") }}">{{ $item['NAME'] }}</div>
							
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
								<div class="{{ $block->elem("price") }}">
									@if ($item['ITEM_PRICES'][0]['DISCOUNT'] > 0)
										<div class="{{ $block->elem("price")->mod("old") }}">{!! $item['ITEM_PRICES'][0]['PRINT_BASE_PRICE'] !!}</div>
										<div class="{{ $block->elem("price")->mod("new") }}">{!! $item['ITEM_PRICES'][0]['PRINT_RATIO_PRICE'] !!}</div>
									@else
										<div class="{{ $block->elem("price") }}">{!! $item['ITEM_PRICES'][0]['PRINT_BASE_PRICE'] !!}</div>
									@endif
								</div>
							</a>
						</div>
					@endforeach
			</div>
		@endforeach
</div>