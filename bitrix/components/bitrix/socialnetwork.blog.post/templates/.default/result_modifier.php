<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

use Bitrix\Main\UI\EntitySelector;

if (!empty($arResult["Post"]))
{
	$arResult["Post"]["SPERM_SHOW"] = $arResult["Post"]["SPERM"];
}

if (
	isset($arResult["Post"]["SPERM"]["CRMCONTACT"], $arResult["Post"]["SPERM"]["U"])
	&& is_array($arResult["Post"]["SPERM"]["CRMCONTACT"])
	&& !empty($arResult["Post"]["SPERM"]["CRMCONTACT"])
	&& is_array($arResult["Post"]["SPERM"]["U"])
	&& !empty($arResult["Post"]["SPERM"]["U"])
)
{
	$arDestinationList = $arResult["Post"]["SPERM"];

	foreach($arDestinationList["CRMCONTACT"] as $key => $arDestination)
	{
		foreach($arDestinationList["U"] as $key2 => $arDestination2)
		{
			if (
				isset($arDestination2["CRM_ENTITY"])
				&& $arDestination2["CRM_ENTITY"] === 'C_'.$arDestination["ID"]
			)
			{
				$arDestinationList["CRMCONTACT"][$key]["CRM_USER_ID"] = $arDestinationList["U"][$key2]["ID"];
				unset($arDestinationList["U"][$key2]);
			}
		}
	}

	$arResult["Post"]["SPERM_SHOW"] = $arDestinationList;
}

if (empty($arResult["urlToEdit"]))
{
	$arResult["urlToEdit"] = CComponentEngine::makePathFromTemplate($arParams["PATH_TO_POST_EDIT"], array(
		"post_id" => $arResult["Post"]["ID"],
		"user_id" => $arResult["Post"]["AUTHOR_ID"]
	));
}

if (empty($arResult["urlToHide"]))
{
	$arResult["urlToHide"] = CHTTP::urlAddParams(
		CHTTP::urlDeleteParams(
			$arResult["urlToPost"],
			array("sessid", "success", "hide", "delete")
		),
		array(
			"hide" => "Y",
			"SONET_GROUP_ID" => (isset($arParams["SONET_GROUP_ID"]) && (int)$arParams["SONET_GROUP_ID"] > 0 ? (int)$arParams["SONET_GROUP_ID"] : false),
			"sessid" => bitrix_sessid()
		)
	);
}

$parser = new CTextParser();
$hashTags = $parser->detectTags(htmlspecialcharsBack($arResult["Post"]["DETAIL_TEXT"]));

if (
	!empty($arResult["Category"])
	&& !empty($hashTags)
)
{
	foreach($arResult["Category"] as $key => $category)
	{
		if (in_array($category['~NAME'], $hashTags, true))
		{
			unset($arResult["Category"][$key]);
		}
	}
}

if (is_array($arParams['TOP_RATING_DATA'] ?? null))
{
	$arResult['TOP_RATING_DATA'] = $arParams['TOP_RATING_DATA'];
}
elseif (
	$arResult["bIntranetInstalled"]
	&& !empty($arParams["LOG_ID"])
)
{
	$ratingData = \Bitrix\Socialnetwork\ComponentHelper::getLivefeedRatingData(array(
		'logId' => array($arParams["LOG_ID"]),
	));

	if (
		!empty($ratingData)
		&& !empty($ratingData[$arParams["LOG_ID"]])
	)
	{
		$arResult['TOP_RATING_DATA'] = $ratingData[$arParams["LOG_ID"]];
	}
}

if (!empty($arResult['Post']['BACKGROUND_CODE']))
{
	$arResult['Post']['IS_IMPORTANT'] = false;
	$arResult['GRATITUDE'] = [];
}

if (
	!$arResult['bPublicPage']
	&& (!isset($arParams["MOBILE"]) || $arParams["MOBILE"] !== "Y")
	&& !empty($arResult['Post'])
	&& is_set($arResult['Post']['SPERM'])
	&& is_array($arResult['Post']['SPERM'])
)
{
	$postDestList = [];

	foreach($arResult['Post']['SPERM'] as $type => $itemsList)
	{
		if (!in_array($type, [ 'U', 'SG', 'DR', 'G' ]))
		{
			continue;
		}

		switch($type)
		{
			case 'SG':
				$typeText = 'sonetgroups';
				break;
			case 'DR':
				$typeText = 'department';
				break;
			default:
				$typeText = 'users';
		}

		foreach($itemsList as $id => $item)
		{
			$postDest = (
			$type === 'U'
			&& (int)$item['ID'] <= 0
				? [
				'id' => 'UA',
				'type' => 'groups'
			]
				: [
				'id' => $type.$id,
				'type' => $typeText,
			]
			);
			$postDestList[$postDest['id']] = $postDest['type'];
		}
	}

	$postDestListCodes = array_keys($postDestList);

	if (isset($arResult['PostSrc']['SPERM_HIDDEN']))
	{
		$postDestListCodes = array_merge($postDestListCodes, $arResult['PostSrc']['SPERM_HIDDEN']);
	}
	$arResult['postDestEntities'] = EntitySelector\Converter::sortEntities(EntitySelector\Converter::convertFromFinderCodes($postDestListCodes));
}
