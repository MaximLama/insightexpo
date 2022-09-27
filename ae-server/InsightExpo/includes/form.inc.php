<?
switch(LANGUAGE_ID){
	case "ru":
		$idForm=26;
		break;
	case "en":
		$idForm=256;
		break;
	default:
		die();
}
?>
<div class="feedback-content">
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.detail",
		"feedback-form",
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
			"ELEMENT_ID" => $idForm,
			"FIELD_CODE" => array("", ""),
			"IBLOCK_ID" => "12",
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
			"PROPERTY_CODE" => array("EMAIL_PLEJSKHOLDER", "KOMPANIYA_PLEJSKHOLDER", "OTPRAVIT_KNOPKA", "SOOBSHCHENIE_PLEJSKHOLDER", "TELEFON_PLEJSKHOLDER", "FIO_PLEJSKHOLDER", ""),
			"SET_BROWSER_TITLE" => "N",
			"SET_CANONICAL_URL" => "N",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_STATUS_404" => "Y",
			"SET_TITLE" => "N",
			"SHOW_404" => "N",
			"STRICT_SECTION_CHECK" => "N",
			"USE_PERMISSIONS" => "N",
			"USE_SHARE" => "N"
		)
	);?>
	<div class="feedback-img">
		<img src="<?= SITE_TEMPLATE_PATH ?>/img/feedback-img.png" alt="">
		<div class="square"></div>
		<div class="square square-2"></div>
		<div class="square square-3"></div>
		<div class="feedback-img__decor decor-w"></div>
		<div class="feedback-img__decor feedback-img__decor-2"></div>
		<div class="feedback-img__decor feedback-img__decor-3"></div>
	</div>
</div>