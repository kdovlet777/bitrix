<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<div class="content">
<?  foreach ($arResult['CATEGORIES'] as $arItem) { 
     echo $arItem['NAME']."<br>";
      } ?>
</div>