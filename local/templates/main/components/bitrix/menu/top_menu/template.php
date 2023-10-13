<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?= \TAO::frontend()->renderBlock(
    'common/top_menu',[
        "items" => $arResult,
    ]);