<div class="{{ $block }}">
	{!! $title !!}
	<div class="{{ $block->elem("buttons") }}">
		<button class="{{ $block->elem('selectorbtn') }}" id="tulabtn">Офис в Туле</button>
		<button class="{{ $block->elem('selectorbtn') }}" id="moscowbtn">Офис в Москве</button>
	</div>
	<div id="tulaMap" class="{{ $block->elem("content") }}">
		<div id="officeTulaYandexMap" style="height: 60vh;"></div>
		<p>г. Тула, ул. Ф. Смирнова ул., д. 28<br>Тел. / Факс: (4872) 250-450, 57-05-01</p>
	</div>
	<div id="moscowMap" class="{{ $block->elem("content") }}">
		<div id="officeMoscowYandexMap" style="height: 60vh;"></div>
		<p>г. Москва, Варшавское шоссе, д. 47, к. 4, оф. 1224 (12 этаж). <br> Тел. / Факс: (495) 933-62-10</p>
	</div>
</div>