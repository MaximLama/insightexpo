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
CComponentUtil::__IncludeLang(dirname($_SERVER["SCRIPT_NAME"]), "/template.php");

?>
<?foreach ($arResult["SECTIONS"] as $arSection){?>
	<div class="swiper portfolio-slider">
		<div class="swiper-wrapper portfolio-slider-wrapper">
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"projects",
				Array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"CACHE_FILTER" => "N",
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
					"FIELD_CODE" => array("", ""),
					"FILTER_NAME" => "",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"IBLOCK_ID" => "8",
					"IBLOCK_TYPE" => "osnovnye_dannye",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"INCLUDE_SUBSECTIONS" => "Y",
					"MESSAGE_404" => "",
					"NEWS_COUNT" => 1000,
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Новости",
					"PARENT_SECTION" => $arSection["ID"],
					"PARENT_SECTION_CODE" => "",
					"PREVIEW_TRUNCATE_LEN" => "",
					"PROPERTY_CODE" => array("ORGANIZACIYA", "PLOSHCHAD", "STRANA", "GOD", ""),
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "Y",
					"SET_TITLE" => "N",
					"SHOW_404" => "Y",
					"SORT_BY1" => "SORT",
					"SORT_BY2" => "ID",
					"SORT_ORDER1" => "ASC",
					"SORT_ORDER2" => "ASC",
					"STRICT_SECTION_CHECK" => "N"
				)
			);?>

		</div>
		<div class="swiper-pagination slider-pagination portfolio-pagination"></div>
		<div class="slider-kit">
			<div class="swiper-button-prev slider-button-prev portfolio-button-prev"></div>
			<div class="swiper-button-next slider-button-next portfolio-button-next"></div>
		</div>
		<div class="portfolio-slider-title mobile"><?=GetMessage('OUR_PORTFOLIO')?></div>
		<div class="portfolio-slider-year"><?=$arSection["NAME"]?></div>
	</div>
<?}?>
