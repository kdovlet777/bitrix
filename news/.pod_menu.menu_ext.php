<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

if(CModule::IncludeModule("iblock"))
{

    $IBLOCK_SECTION_ID = 2;

    $arOrder = Array("SORT"=>"ASC");   
    $arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID", "DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_SECTION_ID" => $IBLOCK_SECTION_ID, "ACTIVE" => "Y");
    $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);

    while($ob = $res->GetNextElement())
    {
    $arFields = $ob->GetFields();       

    // echo "<pre>";
    // var_dump($arFields);
    // echo "</pre>";

    $aMenuLinksExt[] = Array(
                $arFields['NAME'],
                $arFields['DETAIL_PAGE_URL'],
                Array(),
                Array(),
                ""
                );
    }        
}   

$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);