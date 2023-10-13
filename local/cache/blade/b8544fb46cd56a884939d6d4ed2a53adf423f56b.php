<div class="bx-filter <?php echo e($templateData["TEMPLATE_CLASS"]); ?> <?php if($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL"): ?> <?php echo e("bx-filter-horizontal"); ?> <?php endif; ?>">
	<div class="<?php echo e($block); ?> container-fluid">
		<div class="row">
			<div class="<?php echo e($block->elem('filter_title')); ?> <?php if($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL"): ?> col-sm-6 col-md-4 <?php else: ?> col-lg-12 <?php endif; ?>">
				<?php echo GetMessage("CT_BCSF_FILTER_TITLE"); ?>

			</div>
			</div>
			<form name="<?php echo $arResult["FILTER_NAME"]."_form"; ?>" action="<?php echo $arResult["FORM_ACTION"]; ?>" method="get" class="smartfilter">
				<?php $__currentLoopData = $arResult["HIDDEN"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<input type="hidden" name="<?php echo $arItem["CONTROL_NAME"]; ?>" id="<?php echo $arItem["CONTROL_ID"]; ?>" value="<?php echo $arItem["HTML_VALUE"]; ?>" />
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<div class="row">
				<?php $__currentLoopData = $arResult["ITEMS"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$arItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php $key = $arItem["ENCODED_ID"]; ?>
					<?php if(isset($arItem["PRICE"])): ?>
                        <?php
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
                        ?>
						<div class="<?php if($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL"): ?> col-sm-6 col-md-4 <?php else: ?> col-lg-12 <?php endif; ?> bx-filter-parameters-box bx-active">
							<span class="bx-filter-container-modef"></span>
							<div class="<?php echo e($block->elem('box_title')); ?>" onclick="smartFilter.hideFilterProps(this)"><span><?php echo $arItem["NAME"]; ?> <i data-role="prop_angle" class="fa fa-angle-<?php if($arItem["DISPLAY_EXPANDED"]== "Y"): ?> up <?php else: ?> down <?php endif; ?>"></i></span></div>
							<div class="bx-filter-block" data-role="bx_filter_block">
								<div class="row bx-filter-parameters-box-container">
									<div class="col-xs-6 <?php echo e($block->elem('container_block')); ?> bx-left">
										<i class="bx-ft-sub"><?php echo GetMessage("CT_BCSF_FILTER_FROM"); ?></i>
										<div class="<?php echo e($block->elem('input_container')); ?>">
											<input
												class="min-price"
												type="text"
												name="<?php echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]; ?>"
												id="<?php echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]; ?>"
												value="<?php echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]; ?>"
												size="5"
												onkeyup="smartFilter.keyup(this)"
											/>
										</div>
									</div>
									<div class="col-xs-6 <?php echo e($block->elem('container_block')); ?> bx-right">
										<i class="bx-ft-sub"><?php echo GetMessage("CT_BCSF_FILTER_TO"); ?></i>
										<div class="<?php echo e($block->elem('input_container')); ?>">
											<input
												class="max-price"
												type="text"
												name="<?php echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]; ?>"
												id="<?php echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]; ?>"
												value="<?php echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]; ?>"
												size="5"
												onkeyup="smartFilter.keyup(this)"
											/>
										</div>
									</div>
									<div class="col-xs-10 col-xs-offset-1 bx-ui-slider-track-container">
										<div class="bx-ui-slider-track" id="drag_track_<?php echo $key; ?>">
											<?php for($i = 0; $i <= $step_num; $i++): ?>
											<div class="bx-ui-slider-part p<?php echo e($i+1); ?>"><span><?php echo $prices[$i]; ?></span></div>
											<?php endfor; ?>

											<div class="bx-ui-slider-pricebar-vd" style="left: 0;right: 0;" id="colorUnavailableActive_<?php echo e($key); ?>"></div>
											<div class="<?php echo e($block->elem('pricebar_vn')); ?>" style="left: 0;right: 0;" id="colorAvailableInactive_<?php echo e($key); ?>"></div>
											<div class="<?php echo e($block->elem('pricebar_v')); ?>"  style="left: 0;right: 0;" id="colorAvailableActive_<?php echo e($key); ?>"></div>
											<div class="bx-ui-slider-range" id="drag_tracker_<?php echo e($key); ?>"  style="left: 0%; right: 0%;">
												<a class="bx-ui-slider-handle left"  style="left:0;" href="javascript:void(0)" id="left_slider_<?php echo e($key); ?>"></a>
												<a class="bx-ui-slider-handle right" style="right:0;" href="javascript:void(0)" id="right_slider_<?php echo e($key); ?>"></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $arResult["ITEMS"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$arItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(empty($arItem["VALUES"]) || isset($arItem["PRICE"])): ?>
                            <?php continue; ?>
                        <?php endif; ?>
                        <?php if($arItem["DISPLAY_TYPE"] === $PropertyTable["Section"] && ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)): ?>
                            <?php continue; ?>
                        <?php endif; ?>
                        <div class="<?php if($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL"): ?> col-sm-6 col-md-4 <?php else: ?> col-lg-12 <?php endif; ?> bx-filter-parameters-box <?php if($arItem["DISPLAY_EXPANDED"]== "Y"): ?> bx-active <?php endif; ?>">
                            <span class="bx-filter-container-modef"></span>
                            <div class="<?php echo e($block->elem('box_title')); ?>" onclick="smartFilter.hideFilterProps(this)">
                                <span class="bx-filter-parameters-box-hint"><?php echo $arItem["NAME"]; ?>

                                    <?php if($arItem["FILTER_HINT"] <> ""): ?>
                                        <i id="item_title_hint_<?php echo $arItem["ID"]; ?>" class="fa fa-question-circle"></i>
                                    <?php endif; ?>
                                    <i data-role="prop_angle" class="fa fa-angle-<?php if($arItem["DISPLAY_EXPANDED"]== "Y"): ?> up <?php else: ?> down <?php endif; ?>"></i>
                                </span>
                            </div>

                            <div class="bx-filter-block" data-role="bx_filter_block">
                                <div class="row bx-filter-parameters-box-container">
                                    <div class="col-xs-12">
                                        <?php $__currentLoopData = $arItem["VALUES"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="checkbox">
                                                <label data-role="label_<?php echo $ar["CONTROL_ID"]; ?>" class="bx-filter-param-label <?php echo $ar["DISABLED"] ? 'disabled': ''; ?>" for="<?php echo $ar["CONTROL_ID"]; ?>">
                                                    <span class="bx-filter-input-checkbox">
                                                        <input
                                                            type="checkbox"
                                                            value="<?php echo $ar["HTML_VALUE"]; ?>"
                                                            name="<?php echo $ar["CONTROL_NAME"]; ?>"
                                                            id="<?php echo $ar["CONTROL_ID"]; ?>"
                                                            <?php echo $ar["CHECKED"]? 'checked="checked"': ''; ?>

                                                            onclick="smartFilter.click(this)"
                                                        />
                                                        <span class="<?php echo e($block->elem('param_text')); ?>" title="<?php echo e($ar["VALUE"]); ?>"><?php echo $ar["VALUE"]; ?>

                                                        <?php if($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])): ?>
                                                            &nbsp;(<span data-role="count_<?php echo $ar["CONTROL_ID"]; ?>"><?php echo $ar["ELEMENT_COUNT"]; ?></span>)
                                                        <?php endif; ?>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<div class="row">
				<div class="col-xs-12 bx-filter-button-box">
					<div class="bx-filter-block">
						<div class="bx-filter-parameters-box-container">
							<input
								class="btn <?php echo e($block->elem('btn_themes')); ?>"
								type="submit"
								id="set_filter"
								name="set_filter"
								value="<?php echo GetMessage("CT_BCSF_SET_FILTER"); ?>"
							/>
							<input
								class="btn <?php echo e($block->elem('btn_link')); ?>"
								type="submit"
								id="del_filter"
								name="del_filter"
								value="<?php echo GetMessage("CT_BCSF_DEL_FILTER"); ?>"
							/>
							<div class="<?php echo e($block->elem('popup_result')); ?> <?php if($arParams["FILTER_VIEW_MODE"] == "VERTICAL"): ?> <?php echo $arParams["POPUP_POSITION"]; ?> <?php endif; ?>" id="modef" <?php if(!isset($arResult["ELEMENT_COUNT"])): ?> <?php echo 'style="display:none"'; ?> <?php endif; ?> style="display: inline-block;">
								<?php echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.(int)($arResult["ELEMENT_COUNT"] ?? 0).'</span>')); ?>

								<span class="arrow"></span>
								<br/>
								<a href="<?php echo $arResult["FILTER_URL"]; ?>" target=""><?php echo GetMessage("CT_BCSF_FILTER_SHOW"); ?></a>
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
        window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilter(<?php echo CUtil::PhpToJSObject($arJsParams); ?>);
    });
</script><?php /**PATH /var/www/workspace/btx/www/local/templates/main/frontend/src/block/catalog/filter/filter.blade.php ENDPATH**/ ?>