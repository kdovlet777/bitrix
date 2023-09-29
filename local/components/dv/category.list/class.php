<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class CategoryList extends CBitrixComponent
{
    public function executeComponent()
    {
        $this->fetchData();
        $this->includeComponentTemplate();
    }
    
    public function fetchData()
    {
    	$arrFilter = array(
            'IBLOCK_ID' => 5,
        );
    
        $arSelect = array("ID", "NAME", "IBLOCK_ID", "DETAIL_PAGE_URL");
        if (CModule::IncludeModule("iblock")) {
            $res = CIBlockElement::GetList($arSelect, $arrFilter, false, false);
            while ($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();
                $this->arResult['CATEGORIES'][] = $arFields;
            }
        }
    }
}