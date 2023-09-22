<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

if (empty($arResult["ALL_ITEMS"]))
	return;

if (file_exists($_SERVER["DOCUMENT_ROOT"].$this->GetFolder().'/themes/'.$arParams["MENU_THEME"].'/colors.css'))
	$APPLICATION->SetAdditionalCSS($this->GetFolder().'/themes/'.$arParams["MENU_THEME"].'/colors.css');

$menuBlockId = "catalog_menu_".$this->randString();
?>

<div class="head">
        <?php
    		$arr = $arResult['ALL_ITEMS'];
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


<script>
	BX.ready(function () {
		window.obj_<?=$menuBlockId?> = new BX.Main.Menu.CatalogHorizontal('<?=CUtil::JSEscape($menuBlockId)?>');
	});
</script>