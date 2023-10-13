<div class="{{ $block->elem('sub-menu') }}">
@foreach ($items as $item)
	<a
	@if ($item['SELECTED'])
	class="{{ $block->elem('pod_menu')->mod('active') }}"
    @else
	class="{{ $block->elem('pod_menu') }}"
	@endif
	style="text-decoration: none;" href="{{ $item['LINK'] }}">{{ $item['TEXT'] }}</a>
@endforeach
</div>