<div class="{{ $block->elem("banner") }}">
    <div class="swiper" style="height: 100%;">
        <div class="swiper-wrapper">
            @foreach ($items as $item)
            <div class="swiper-slide">
                <img class="{{ $block->elem("ban-image") }}" src="{{ $item['PREVIEW_PICTURE']['SRC'] }}">
                <div class="{{ $block->elem("ban-text") }}">
                        <a href="{{ $item['DETAIL_PAGE_URL'] }}" style="text-decoration: none;"><div class="{{ $block->elem("ban-text-title") }}">{{ $item['NAME'] }}</div>
                        <div class="{{ $block->elem("ban-text-body") }}">{{ $item['PREVIEW_TEXT'] }}</div></a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>

        <div class="swiper-button-next {{ $block->elem("swiper-button-next") }}"></div>
        <div class="swiper-button-prev {{ $block->elem("swiper-button-prev") }}"></div>
    </div>
</div> 