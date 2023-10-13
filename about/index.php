<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О компании");
?><br>
<? $title = \TAO::frontend()->renderBlock(
    'forms/title',[
        "text" => "О нас"
    ]
);
?>
<?= \TAO::frontend()->renderBlock(
    'common/map',[
        "title" => $title
    ]
);
?>
 <br>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>