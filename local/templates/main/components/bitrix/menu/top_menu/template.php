<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

	
<div class="main_menu">
<?php 	$arr = $arResult;
        foreach ($arr as $key => $value) {
                $pageName = $value["TEXT"];
                if ($value['SELECTED']){ ?>
                        <div class="rectangle-active">
                                <?=$pageName ?> 
                                </div>
                <?php } else { ?>
                        <div class="rectangle">
                        <a class="btn" href="<?=$value["LINK"]?>">
                                <?=$pageName ?>
                                </a>
                                </div>
                <?php }
        } ?>
</div>