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
	<script src="https://kit.fontawesome.com/34525fb119.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<?$APPLICATION->ShowMeta("keywords")?>
	<?$APPLICATION->ShowCSS();?>
	<?$APPLICATION->ShowPanel();?>
	<?$APPLICATION->ShowHeadStrings();?>
	<?$APPLICATION->ShowHeadScripts();?>
<script src="/builds/assets_css_tyles_scss.index.js"></script>
<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH ?>/assets/css/styles.css">

<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
<script type="module" src="assets/js/script.js"></script>
<script type="text/javascript" src="assets/js/promise.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
	<nav class="navbar">
		<div class="logo">
			<img src="<?=SITE_TEMPLATE_PATH ?>/assets/img/Vector.png">
			<p class="navbar-text">ГАЛАКТИЧЕСКИЙ<br>ВЕСТНИК</p>
		</div>
		<div class="head">
		<?$APPLICATION->IncludeComponent(
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
);?>
</div>
	</nav>

		
	