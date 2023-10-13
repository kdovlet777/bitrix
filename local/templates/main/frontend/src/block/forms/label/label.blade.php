<label class="{{ $block }}" >
    {{ $label }}
    @if(!empty($params["REQUIRED_FIELDS"]) && in_array($req_name, $params["REQUIRED_FIELDS"]))
    	<span>*</span>
    @endif
</label>