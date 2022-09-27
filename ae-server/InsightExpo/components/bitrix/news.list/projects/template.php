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

$arSection = $arResult["SECTION"]["PATH"][count($arResult["SECTION"]["PATH"])-1];
$GLOBALS['NAV_RESULT'] = $arResult["NAV_RESULT"];
?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="portfolio-slider__item swiper-slide-active">
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="portfolio-slider__img">
			<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
			<div class="portfolio-slider__area"><span><?=$arItem["PROPERTIES"]["PLOSHCHAD"]["VALUE"]?></span> <?=GetMessage("PORTFOLIO_UNIT")?><sup>2</sup></div>
			<span></span>
		</a>
		<div class="portfolio-slider__text">
			<div class="portfolio-slider__title"><?=$arItem["NAME"]?></div>
			<div class="portfolio-slider__address"><?=$arItem["PROPERTIES"]["STRANA"]["VALUE"]?></div>
			<div class="portfolio-slider__name"><?=$arItem["PROPERTIES"]["ORGANIZACIYA"]["VALUE"]?></div>
			<div class="portfolio-slider__year"><?=$arItem["PROPERTIES"]["GOD"]["VALUE"]?></div>
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="portfolio-slider__btn btn"><?=GetMessage('MORE')?></a>
		</div>
	</div>
<?endforeach;?>