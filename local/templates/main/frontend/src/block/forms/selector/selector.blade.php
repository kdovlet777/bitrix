<div class="{{ $block }}">
    <select name="CATEGORY" class="{{ $block->elem("input") }}">
        @foreach($items as $value)
            <option value="{{ $value }}">{{ $value }}</option>
        @endforeach
    </select>
</div>