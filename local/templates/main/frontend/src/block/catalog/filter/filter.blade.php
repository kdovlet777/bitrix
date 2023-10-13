<div class="bx-filter {{$templateData["TEMPLATE_CLASS"]}} @if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL") {{"bx-filter-horizontal"}} @endif">
	<div class="{{$block}} container-fluid">
		<div class="row">
			<div class="{{$block->elem('filter_title')}} @if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL") col-sm-6 col-md-4 @else col-lg-12 @endif">
				{!!GetMessage("CT_BCSF_FILTER_TITLE")!!}
			</div>
			</div>
			<form name="{!!$arResult["FILTER_NAME"]."_form"!!}" action="{!!$arResult["FORM_ACTION"]!!}" method="get" class="smartfilter">
				@foreach($arResult["HIDDEN"] as $arItem)
				<input type="hidden" name="{!!$arItem["CONTROL_NAME"]!!}" id="{!!$arItem["CONTROL_ID"]!!}" value="{!!$arItem["HTML_VALUE"]!!}" />
				@endforeach
				<div class="row">
				@foreach($arResult["ITEMS"] as $key=>$arItem)
					@php $key = $arItem["ENCODED_ID"]; @endphp
					@if(isset($arItem["PRICE"]))
                        @php
						if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
							continue;
						$precision = 0;
						$step_num = 4;
						$step = ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"]) / $step_num;
						$prices = array();
						if (Bitrix\Main\Loader::includeModule("currency"))
						{
							for ($i = 0; $i < $step_num; $i++)
							{
								$prices[$i] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MIN"]["VALUE"] + $step*$i, $arItem["VALUES"]["MIN"]["CURRENCY"], false);
							}
							$prices[$step_num] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MAX"]["VALUE"], $arItem["VALUES"]["MAX"]["CURRENCY"], false);
						}
						else
						{
							$precision = $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0;
							for ($i = 0; $i < $step_num; $i++)
							{
								$prices[$i] = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step*$i, $precision, ".", "");
							}
							$prices[$step_num] = number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
						}
						$arJsParams = array(
							"leftSlider" => 'left_slider_'.$key,
							"rightSlider" => 'right_slider_'.$key,
							"tracker" => "drag_tracker_".$key,
							"trackerWrap" => "drag_track_".$key,
							"minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
							"maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
							"minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
							"maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
							"curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
							"curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
							"fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MIN"]["FILTERED_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"] ,
							"fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MAX"]["FILTERED_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"],
							"precision" => $precision,
							"colorUnavailableActive" => 'colorUnavailableActive_'.$key,
							"colorAvailableActive" => 'colorAvailableActive_'.$key,
							"colorAvailableInactive" => 'colorAvailableInactive_'.$key,
						);
                        @endphp
						<div class="@if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL") col-sm-6 col-md-4 @else col-lg-12 @endif bx-filter-parameters-box bx-active">
							<span class="bx-filter-container-modef"></span>
							<div class="{{$block->elem('box_title')}}" onclick="smartFilter.hideFilterProps(this)"><span>{!!$arItem["NAME"]!!} <i data-role="prop_angle" class="fa fa-angle-@if ($arItem["DISPLAY_EXPANDED"]== "Y") up @else down @endif"></i></span></div>
							<div class="bx-filter-block" data-role="bx_filter_block">
								<div class="row bx-filter-parameters-box-container">
									<div class="col-xs-6 {{$block->elem('container_block')}} bx-left">
										<i class="bx-ft-sub">{!!GetMessage("CT_BCSF_FILTER_FROM")!!}</i>
										<div class="{{$block->elem('input_container')}}">
											<input
												class="min-price"
												type="text"
												name="{!!$arItem["VALUES"]["MIN"]["CONTROL_NAME"]!!}"
												id="{!!$arItem["VALUES"]["MIN"]["CONTROL_ID"]!!}"
												value="{!!$arItem["VALUES"]["MIN"]["HTML_VALUE"]!!}"
												size="5"
												onkeyup="smartFilter.keyup(this)"
											/>
										</div>
									</div>
									<div class="col-xs-6 {{$block->elem('container_block')}} bx-right">
										<i class="bx-ft-sub">{!!GetMessage("CT_BCSF_FILTER_TO")!!}</i>
										<div class="{{$block->elem('input_container')}}">
											<input
												class="max-price"
												type="text"
												name="{!!$arItem["VALUES"]["MAX"]["CONTROL_NAME"]!!}"
												id="{!!$arItem["VALUES"]["MAX"]["CONTROL_ID"]!!}"
												value="{!!$arItem["VALUES"]["MAX"]["HTML_VALUE"]!!}"
												size="5"
												onkeyup="smartFilter.keyup(this)"
											/>
										</div>
									</div>
									<div class="col-xs-10 col-xs-offset-1 bx-ui-slider-track-container">
										<div class="bx-ui-slider-track" id="drag_track_{!!$key!!}">
											@for($i = 0; $i <= $step_num; $i++)
											<div class="bx-ui-slider-part p{{$i+1}}"><span>{!!$prices[$i]!!}</span></div>
											@endfor

											<div class="bx-ui-slider-pricebar-vd" style="left: 0;right: 0;" id="colorUnavailableActive_{{$key}}"></div>
											<div class="{{$block->elem('pricebar_vn')}}" style="left: 0;right: 0;" id="colorAvailableInactive_{{$key}}"></div>
											<div class="{{$block->elem('pricebar_v')}}"  style="left: 0;right: 0;" id="colorAvailableActive_{{$key}}"></div>
											<div class="bx-ui-slider-range" id="drag_tracker_{{$key}}"  style="left: 0%; right: 0%;">
												<a class="bx-ui-slider-handle left"  style="left:0;" href="javascript:void(0)" id="left_slider_{{$key}}"></a>
												<a class="bx-ui-slider-handle right" style="right:0;" href="javascript:void(0)" id="right_slider_{{$key}}"></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endif
                    @endforeach
                    @foreach($arResult["ITEMS"] as $key=>$arItem)
                        @if (empty($arItem["VALUES"]) || isset($arItem["PRICE"]))
                            @php continue; @endphp
                        @endif
                        @if ($arItem["DISPLAY_TYPE"] === $PropertyTable["Section"] && ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0))
                            @php continue; @endphp
                        @endif
                        <div class="@if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL") col-sm-6 col-md-4 @else col-lg-12 @endif bx-filter-parameters-box @if ($arItem["DISPLAY_EXPANDED"]== "Y") bx-active @endif">
                            <span class="bx-filter-container-modef"></span>
                            <div class="{{$block->elem('box_title')}}" onclick="smartFilter.hideFilterProps(this)">
                                <span class="bx-filter-parameters-box-hint">{!!$arItem["NAME"]!!}
                                    @if ($arItem["FILTER_HINT"] <> "")
                                        <i id="item_title_hint_{!!$arItem["ID"]!!}" class="fa fa-question-circle"></i>
                                    @endif
                                    <i data-role="prop_angle" class="fa fa-angle-@if ($arItem["DISPLAY_EXPANDED"]== "Y") up @else down @endif"></i>
                                </span>
                            </div>

                            <div class="bx-filter-block" data-role="bx_filter_block">
                                <div class="row bx-filter-parameters-box-container">
                                    <div class="col-xs-12">
                                        @foreach($arItem["VALUES"] as $val => $ar)
                                            <div class="checkbox">
                                                <label data-role="label_{!!$ar["CONTROL_ID"]!!}" class="bx-filter-param-label {!!$ar["DISABLED"] ? 'disabled': '' !!}" for="{!!$ar["CONTROL_ID"]!!}">
                                                    <span class="bx-filter-input-checkbox">
                                                        <input
                                                            type="checkbox"
                                                            value="{!!$ar["HTML_VALUE"]!!}"
                                                            name="{!!$ar["CONTROL_NAME"]!!}"
                                                            id="{!!$ar["CONTROL_ID"]!!}"
                                                            {!!$ar["CHECKED"]? 'checked="checked"': ''!!}
                                                            onclick="smartFilter.click(this)"
                                                        />
                                                        <span class="{{$block->elem('param_text')}}" title="{{$ar["VALUE"]}}">{!!$ar["VALUE"]!!}
                                                        @if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"]))
                                                            &nbsp;(<span data-role="count_{!!$ar["CONTROL_ID"]!!}">{!!$ar["ELEMENT_COUNT"]!!}</span>)
                                                        @endif
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                        </div>
                    @endforeach
				</div>
				<div class="row">
				<div class="col-xs-12 bx-filter-button-box">
					<div class="bx-filter-block">
						<div class="bx-filter-parameters-box-container">
							<input
								class="btn {{$block->elem('btn_themes')}}"
								type="submit"
								id="set_filter"
								name="set_filter"
								value="{!!GetMessage("CT_BCSF_SET_FILTER")!!}"
							/>
							<input
								class="btn {{$block->elem('btn_link')}}"
								type="submit"
								id="del_filter"
								name="del_filter"
								value="{!!GetMessage("CT_BCSF_DEL_FILTER")!!}"
							/>
							<div class="{{$block->elem('popup_result')}} @if ($arParams["FILTER_VIEW_MODE"] == "VERTICAL") {!!$arParams["POPUP_POSITION"]!!} @endif" id="modef" @if(!isset($arResult["ELEMENT_COUNT"])) {!!'style="display:none"'!!} @endif style="display: inline-block;">
								{!!GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.(int)($arResult["ELEMENT_COUNT"] ?? 0).'</span>'))!!}
								<span class="arrow"></span>
								<br/>
								<a href="{!!$arResult["FILTER_URL"]!!}" target="">{!!GetMessage("CT_BCSF_FILTER_SHOW")!!}</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
	</div>
</div>
<script type="text/javascript">
    BX.ready(function(){
        window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilter({!! CUtil::PhpToJSObject($arJsParams) !!});
    });
</script>