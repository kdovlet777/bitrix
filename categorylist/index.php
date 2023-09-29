<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("CATEGORY_LIST");
?>
<? $APPLICATION->IncludeComponent(
	"dv:category.list", 
	".default", 
	array(
		
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
); ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>