<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$sections = array(
	"en"=>array(28, 29),
	"ru"=>array(24, 25)
);

$elsObj = CIBlockElement::GetList(
	array("SORT"=>"ASC"),
	array("IBLOCK_ID"=>8, "CODE"=>$_REQUEST["ELEMENT_CODE"]),
	false,
	false,
	array("ID", "IBLOCK_ID", "IBLOCK_SECTION")
);
while($el = $elsObj->GetNext()){
	$sect = CIBlockElement::GetElementGroups(
		$el["ID"]
	)->GetNext();
	if(in_array($sect["IBLOCK_SECTION_ID"], $sections[LANGUAGE_ID])){
		$curId=$el["ID"];
	}
}
?>

<section class="project">
	
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.detail",
		"project-banner",
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
			"ELEMENT_ID" => 18,
			"FIELD_CODE" => array("NAME", "PREVIEW_PICTURE", "DETAIL_PICTURE", ""),
			"IBLOCK_ID" => "15",
			"IBLOCK_TYPE" => "chasto_ispolzuemye_bloki",
			"IBLOCK_URL" => "",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"MESSAGE_404" => "",
			"META_DESCRIPTION" => "-",
			"META_KEYWORDS" => "-",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Страница",
			"PROPERTY_CODE" => array("", ""),
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
	
	<div class="container">
		<div class="section-grid">
			<span class="section-grid__item"></span>
			<span class="section-grid__item"></span>
			<span class="section-grid__item mobile"></span>
		</div>
		<div class="project-content">
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.detail", 
				"project", 
				array(
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
					"ELEMENT_ID" => $curId,
					"FIELD_CODE" => array(
						0 => "NAME",
						1 => "PREVIEW_PICTURE",
						2 => "",
					),
					"IBLOCK_ID" => "8",
					"IBLOCK_TYPE" => "osnovnye_dannye",
					"IBLOCK_URL" => "",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"MESSAGE_404" => "",
					"META_DESCRIPTION" => "-",
					"META_KEYWORDS" => "-",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Страница",
					"PROPERTY_CODE" => array(
						0 => "ORGANIZACIYA",
						1 => "PLOSHCHAD",
						2 => "STRANA",
						3 => "",
					),
					"SET_BROWSER_TITLE" => "Y",
					"SET_CANONICAL_URL" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "Y",
					"SET_META_KEYWORDS" => "Y",
					"SET_STATUS_404" => "Y",
					"SET_TITLE" => "Y",
					"SHOW_404" => "Y",
					"STRICT_SECTION_CHECK" => "N",
					"USE_PERMISSIONS" => "N",
					"USE_SHARE" => "N",
					"COMPONENT_TEMPLATE" => "project"
				),
				false
			);?>

		</div>
	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>