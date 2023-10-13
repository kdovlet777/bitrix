<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?$APPLICATION->ShowHead()?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.cdnfonts.com/css/segoe-ui-4" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH ?>/assets/img/Vector.png">
	<title><?$APPLICATION->ShowTitle()?></title>
	<script src="https://api-maps.yandex.ru/2.1/?apikey=605716b2-2e61-4c89-9df2-18faf2753cca&lang=ru_RU" type="text/javascript">
    </script>
	<? \TAO::frontendCss('index'); \TAO::frontendJs('index');?>
	<? \TAO::frontendCss('forms'); \TAO::frontendJs('forms');?>
	<script src="https://kit.fontawesome.com/34525fb119.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<?$APPLICATION->ShowMeta("description")?>
	<?$APPLICATION->ShowCSS();?>
	<?$APPLICATION->ShowPanel();?>
	<?$APPLICATION->ShowHeadStrings();?>
	<?$APPLICATION->ShowHeadScripts();?>

<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH ?>/assets/css/styles.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
		<? ob_start(); $APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_menu", 
	array(
		"COMPONENT_TEMPLATE" => "top_menu",
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "top",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);
$top_menu = ob_get_contents();
ob_end_clean();?>
<? ob_start(); $APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"pod_menu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "pod_menu",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "pod_menu",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "pod_menu"
	),
	false
);
$pod_menu = ob_get_contents();
ob_end_clean();
?><?ob_start();$APPLICATION->IncludeComponent(
	"bitrix:search.title", 
	"search", 
	array(
		"CATEGORY_0" => array(
			0 => "iblock_rest_entity",
		),
		"CATEGORY_0_TITLE" => "",
		"CATEGORY_0_iblock_rest_entity" => array(
			0 => "all",
		),
		"CHECK_DATES" => "N",
		"COMPONENT_TEMPLATE" => "search",
		"CONTAINER_ID" => "title-search",
		"INPUT_ID" => "title-search-input",
		"NUM_CATEGORIES" => "1",
		"ORDER" => "date",
		"PAGE" => "#SITE_DIR#search/",
		"SHOW_INPUT" => "Y",
		"SHOW_OTHERS" => "N",
		"TOP_COUNT" => "5",
		"USE_LANGUAGE_GUESS" => "Y"
	),
	false
);$search=ob_get_contents();ob_end_clean();?>
	<?
	$isAuthorized = $USER->IsAuthorized();
	?>
<?= \TAO::frontend()->renderBlock(
    'common/header',
    ['top_menu' => $top_menu,
     'pod_menu' => $pod_menu,
     'search' => $search,
     'isAuthorized' => $IsAuthorized
	]
)?>