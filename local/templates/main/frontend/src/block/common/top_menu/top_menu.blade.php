<div class="{{ $block->elem('main-menu') }}">
	@foreach ($items as $item)
		@if ($item['SELECTED'])
			<div class="{{ $block->elem('rectangle')->mod('active') }}">
				{{ $item['TEXT'] }}
			</div>
		@else
			<div class="{{ $block->elem('rectangle') }}">
				<a class="{{ $block->elem('btn') }}" href="{{ $item["LINK"] }}">
				{{ $item['TEXT'] }}
				</a>
			</div>
		@endif
	@endforeach
</div>