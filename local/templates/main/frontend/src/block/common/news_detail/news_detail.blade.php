<div class="{{ $block->elem("long-line") }}"></div>
<div class="{{ $block->elem("content") }}" id="{!!$itemIds['ID']!!}" itemscope itemtype="http://schema.org/Product">
	<div class="{{ $block->elem("path") }}">Главная  /  <p class="{{ $block->elem("grey") }}">{{ $item['NAME'] }}</p></div>
	<div class="{{ $block->elem("title") }}">
		{{ $item['NAME'] }}
	</div>
	<div class="{{ $block->elem("card-date") }}">{{ $item['DISPLAY_ACTIVE_FROM'] }}</div>
	<div class="{{ $block->elem("content-box") }}">
		<div class="{{ $block->elem("non-image") }}">
			<div class="{{ $block->elem("content-htext") }}">{{ $item['PREVIEW_TEXT'] }}</div>
			<div class="{{ $block->elem("content-text") }}">
				{!! $item['DETAIL_TEXT'] !!}
			</div>
			<div class="{{ $block->elem("topic-text") }}">
				Тема: 
				@foreach($item['CATEGORIES'] as $value)
				<a class="{{ $block->elem("category-link") }}" href="{{ $value['DETAIL_PAGE_URL'] }}">{{ $value['NAME']; }}</a>
				@endforeach
			</div>
			<a class="{{ $block->elem("btn") }}" href="/news/"> <button class="{{ $block->elem("card-button-detail") }}"><i class="fa-solid fa-arrow-left-long fa-2xl"></i><p class="{{ $block->elem("card-button-text-detail") }}"> НАЗАД К НОВОСТЯМ </p> </button> </a>
		</div>
		<div class="{{ $block->elem("image") }}"> 
		<img src="{{ $item['DETAIL_PICTURE']['SRC'] }}">
		</div>
	</div>
</div>