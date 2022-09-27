<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$service = CIBlockElement::GetList(
	array("SORT"=>"ASC"),
	array("IBLOCK_ID"=>9, "CODE"=>$_REQUEST['ELEMENT_CODE']),
	false,
	false,
	array("ID", "IBLOCK_ID", "PROPERTY_ZAGOLOVOK", "PROPERTY_POLNOE_OPISANIE")
)->GetNext();
$h1 = $service["PROPERTY_ZAGOLOVOK_VALUE"];
?>
<img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" alt="" class="banner-bg desktop">
<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="" class="banner-bg mobile">
<div class="container">
	<div class="section-grid">
		<span class="section-grid__item"></span>
		<span class="section-grid__item"></span>
		<span class="section-grid__item mobile"></span>
	</div>
	<div class="banner-template__content">
		<div class="banner-template__text">
			<div class="banner-template__title"><h1><?=$h1?></h1></div>
			
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.detail",
				"side-banner-seo",
				Array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"ADD_ELEMENT_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "N",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BROWSER_TITLE" => "-",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_DATE" => "N",
					"DISPLAY_NAME" => "Y",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"ELEMENT_CODE" => "",
					"ELEMENT_ID" => 16,
					"FIELD_CODE" => array("", ""),
					"IBLOCK_ID" => "10",
					"IBLOCK_TYPE" => "odinochnye_bloki",
					"IBLOCK_URL" => "",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"MESSAGE_404" => "",
					"META_DESCRIPTION" => "-",
					"META_KEYWORDS" => "-",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Страница",
					"PROPERTY_CODE" => array("ZAGOLOVOK", "PODZAGOLOVOK", ""),
					"SET_BROWSER_TITLE" => "N",
					"SET_CANONICAL_URL" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "Y",
					"SET_TITLE" => "N",
					"SHOW_404" => "Y",
					"STRICT_SECTION_CHECK" => "N",
					"USE_PERMISSIONS" => "N",
					"USE_SHARE" => "N"
				)
			);?>

		</div>
	</div>
</div>