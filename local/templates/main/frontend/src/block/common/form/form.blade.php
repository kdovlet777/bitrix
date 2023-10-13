<div class="{{ $block->elem("content") }}">
    {!! $title !!}
    <div class="{{ $block->elem("info") }}">
        Вы зашли на страницу обратной связи, задайте нам вопрос!
    </div>
     
    <div id="msg">
        @if(!empty($item["ERROR_MESSAGE"]))
        <ul class="{{ $block->elem("message") }}">
            @foreach($item["ERROR_MESSAGE"] as $v)
                {{ ShowError($v) }}
            @endforeach
        </ul>
        @elseif(!empty($_GET['success']))
        <div class="{{ $block->elem("ok") }}">
            Ваше обращение получено
        </div>
        @endif
    </div>
    
    <form class="{{ $block->elem("send") }}" id="{{ $id }}" method="{{ $method }}" action="{{ $action }}">
        {!! bitrix_sessid_post() !!}
            @foreach ($arr as $elem)
                {!! $elem !!}
            @endforeach
    </form>

</div>
