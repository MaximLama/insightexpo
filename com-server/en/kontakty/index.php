<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$banner = CIBlockElement::GetList(
	array("SORT"=>"ASC"),
	array("ID"=>254, "ACTIVE"=>"Y"),
	false,
	false,
	array(
		"ID",
		"IBLOCK_ID",
		"NAME",
		"PREVIEW_PICTURE",
		"DETAIL_PICTURE"
	)
)->GetNext();
?>
<section class="banner-template banner-contacts">
	<img src="<?=CFile::GetPath($banner["PREVIEW_PICTURE"])?>" alt="" class="banner-bg desktop">
	<img src="<?=CFile::GetPath($banner["DETAIL_PICTURE"])?>" alt="" class="banner-bg mobile">
	<div class="container">
		<div class="section-grid">
			<span class="section-grid__item"></span>
			<span class="section-grid__item"></span>
			<span class="section-grid__item mobile"></span>
		</div>
		<div class="banner-template__content">
			<div class="banner-template__text">
				<div class="banner-template__title"><h1><? $APPLICATION->ShowTitle()?><h1></div>
			</div>
		</div>
		<div class="banner-contacts__bottom">
			
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"contacts",
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
					"IBLOCK_ID" => "1",
					"IBLOCK_TYPE" => "osnovnye_dannye",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"INCLUDE_SUBSECTIONS" => "Y",
					"MESSAGE_404" => "",
					"NEWS_COUNT" => "20",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Новости",
					"PARENT_SECTION" => 14,
					"PARENT_SECTION_CODE" => "",
					"PREVIEW_TRUNCATE_LEN" => "",
					"PROPERTY_CODE" => array("ADRES", "POCHTA", "TELEFON", ""),
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "Y",
					"SET_TITLE" => "N",
					"SHOW_404" => "Y",
					"SORT_BY1" => "ACTIVE_FROM",
					"SORT_BY2" => "SORT",
					"SORT_ORDER1" => "DESC",
					"SORT_ORDER2" => "ASC",
					"STRICT_SECTION_CHECK" => "N"
				)
			);?>
			
		</div>
	</div>
</section>

<section class="feedback">
	<div class="container">

		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"form",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "standard.php",
				"PATH" => "/bitrix/templates/InsightExpo/includes/form.inc.php"
			)
		);?> 

	</div>
</section>

<section class="map">
	<div class="map-content" id="map">
	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>