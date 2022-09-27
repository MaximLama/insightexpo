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
?>
<img src="<?= $arResult["PREVIEW_PICTURE"]["SRC"]?>" alt="" class="banner-bg desktop">
<img src="<?= $arResult["DETAIL_PICTURE"]["SRC"]?>" alt="" class="banner-bg mobile">
<div class="container">
	<div class="section-grid">
		<span class="section-grid__item"></span>
		<span class="section-grid__item"></span>
		<span class="section-grid__item mobile"></span>
	</div>
	<div class="banner-portfolio__content">
		<div class="banner-portfolio__text">
			<div class="banner-portfolio__suptitle"><?= $arResult["~PREVIEW_TEXT"]?></div>
			<div class="banner-portfolio__title"><h1><?=$APPLICATION->ShowTitle()?><h1></div>
		</div>
		<div class="banner-portfolio__filters">
			<?
			$APPLICATION->IncludeComponent(
				"bitrix:catalog.section.list",
				"projects-categories",
				Array(
					"ADD_SECTIONS_CHAIN" => "N",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"COUNT_ELEMENTS" => "N",
					"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
					"FILTER_NAME" => "sectionsFilter",
					"IBLOCK_ID" => "8",
					"IBLOCK_TYPE" => "osnovnye_dannye",
					"SECTION_CODE" => "",
					"SECTION_FIELDS" => array("", ""),
					"SECTION_ID" => getID(17, 18, 54),
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array("", ""),
					"SHOW_PARENT_NAME" => "Y",
					"TOP_DEPTH" => "3",
					"VIEW_MODE" => "LINE"
				)
			);

			$APPLICATION->IncludeComponent(
				"bitrix:catalog.section.list",
				"projects-years",
				Array(
					"ADD_SECTIONS_CHAIN" => "N",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"COUNT_ELEMENTS" => "N",
					"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
					"FILTER_NAME" => "sectionsFilter",
					"IBLOCK_ID" => "8",
					"IBLOCK_TYPE" => "osnovnye_dannye",
					"SECTION_CODE" => "",
					"SECTION_FIELDS" => array("", ""),
					"SECTION_ID" => $GLOBALS["SECTION_ID"],
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array("", ""),
					"SHOW_PARENT_NAME" => "Y",
					"TOP_DEPTH" => "3",
					"VIEW_MODE" => "LINE"
				)
			);

			?>

		</div>
	</div>
</div>