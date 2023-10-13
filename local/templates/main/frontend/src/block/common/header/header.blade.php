<div class="{{ $block }}">
	<div class="{{ $block->elem('logo') }}">
		<img src="{{ $assets->url('img/Vector.png') }}">
		<p class="{{ $block->elem('navbar-text') }}">ГАЛАКТИЧЕСКИЙ<br>ВЕСТНИК</p>
	</div>
	<div class="{{ $block->elem('head') }}">
		{!! $top_menu !!}
		{!! $pod_menu !!}
		{!! $search !!}
		<a href="/?logout=yes&<?=bitrix_sessid_get()?>">Выйти</a>
	</div>
</div>