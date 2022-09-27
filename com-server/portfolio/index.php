<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Портфолио");
$GLOBALS["SECTION_ID"] = "";
$GLOBALS['NAV_RESULT'] = 0;
?>

<section class="banner-portfolio">
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.detail",
		"portfolio",
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
			"COMPONENT_TEMPLATE" => "portfolio",
			"DETAIL_URL" => "",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"DISPLAY_DATE" => "N",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"ELEMENT_CODE" => "",
			"ELEMENT_ID" => 18,
			"FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_TEXT",2=>"PREVIEW_PICTURE",3=>"DETAIL_TEXT",4=>"",),
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
			"PROPERTY_CODE" => array(0=>"",1=>"",),
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

</section>
<section class="portfolio page-portfolio">
	<div class="container">
		<div class="section-grid">
			<span class="section-grid__item"></span>
			<span class="section-grid__item"></span>
			<span class="section-grid__item mobile"></span>
		</div>
		<div class="portfolio-content">
			<?
			$arFilter=$GLOBALS["PROJECTS_FILTER"];
			$APPLICATION->IncludeComponent(
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
					"FILTER_NAME" => "arFilter",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"IBLOCK_ID" => "8",
					"IBLOCK_TYPE" => "osnovnye_dannye",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"INCLUDE_SUBSECTIONS" => "Y",
					"MESSAGE_404" => "",
					"NEWS_COUNT" => 9,
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Новости",
					"PARENT_SECTION" => "",
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
					"SORT_BY1" => "PROPERTY_GOD",
					"SORT_BY2" => "SORT",
					"SORT_ORDER1" => "DESC",
					"SORT_ORDER2" => "DESC",
					"STRICT_SECTION_CHECK" => "N"
				)
			);?>
			
		</div>
		<div class="portfolio-pagination">
			<? 

              $NavPageNomer = $GLOBALS["NAV_RESULT"]->NavPageNomer;
              $NavPageCount = $GLOBALS["NAV_RESULT"]->NavPageCount;
              $link         = $APPLICATION->GetCurPage() . "?PAGEN_" . $GLOBALS["NAV_RESULT"]->NavNum . "=";

           	?>

           	<? if($NavPageNomer!=1): ?>
              	<a href="<?=$link . ($NavPageNomer-1)?>" class="portfolio-pagination__btn portfolio-pagination__btn-prev">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/portfolio-pagination-arrow.svg" alt="">
				</a>
           	<? else: ?>
           		<a href="javascript:void(0)" class="portfolio-pagination__btn portfolio-pagination__btn-prev">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/portfolio-pagination-arrow.svg" alt="">
				</a>
           	<? endif; ?>

           	<div class="portfolio-pagination__list">

           		<? if($NavPageNomer > 2): ?>
                 	<a href="<?=$link . "1"?>" class="portfolio-pagination__item">1</a>
              	<? endif; ?>

              	<? if($NavPageNomer != 1): ?>

                 	<? if( ($NavPageNomer-1) - 1 > 1): ?>
                    	<a href="javascript:void(0)" class="portfolio-pagination__item empty">...</a>
                 	<? endif; ?>

                 	<a href="<?=$link . ($NavPageNomer-1)?>" class="portfolio-pagination__item"><?= $NavPageNomer-1 ?></a>
              	<? endif; ?>

              	<a class="portfolio-pagination__item active"><?= $NavPageNomer ?></a>

              	<? if($NavPageNomer != $NavPageCount): ?>
              		<a href="<?=$link . ($NavPageNomer+1)?>" class="portfolio-pagination__item"><?= $NavPageNomer+1 ?></a>

                 	<? if($NavPageCount - ($NavPageNomer+1) > 1): ?>
                    	<a href="javascript:void(0)" class="portfolio-pagination__item empty">...</a>
                 	<? endif; ?>   
              	<? endif; ?>

              	<? if($NavPageNomer < $NavPageCount-1): ?>
              		<a href="<?=$link . $NavPageCount?>" class="portfolio-pagination__item"><?= $NavPageCount ?></a>
              	<? endif; ?>

            </div>

            <? if($NavPageNomer!=$NavPageCount): ?>
            	<a href="<?=$link . ($NavPageNomer+1)?>" class="portfolio-pagination__btn portfolio-pagination__btn-next">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/portfolio-pagination-arrow.svg" alt="">
				</a>
           	<? else: ?>
              	<a href="javascript:void(0)" class="portfolio-pagination__btn portfolio-pagination__btn-next">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/portfolio-pagination-arrow.svg" alt="">
				</a>
           	<? endif; ?>
		</div>
	</div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>