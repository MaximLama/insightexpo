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
require($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/.config.php');
?>
<div class="portfolio-heading">
	<div class="portfolio-heading__left">
		<div class="swiper-pagination slider-pagination portfolio-pagination"></div>
		<div class="portfolio-title title ml"><?=GetMessage("SEO_PORTFOLIO")?></div>
	</div>
</div>
<div class="portfolio-content">
	<div class="swiper portfolio-slider seo-portfolio-slider">
		<div class="swiper-wrapper portfolio-slider-wrapper">

			<?foreach($arResult["ITEMS"] as $arItem):?>
				
				<div class="swiper-slide portfolio-slider__item">
					<div class="portfolio-slider__img">
						<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
						<div class="portfolio-slider__area"><span><?=$arItem["PROPERTIES"]["PLOSHCHAD"]["VALUE"]?></span> <?=GetMessage("SEO_UNIT")?><sup>2</sup></div>
						<div class="portfolio-slider__description"><?=GetMessage("SEO_OUR_PORTFOLIO")?></div>
					</div>
					<div class="portfolio-slider__text">
						<div class="portfolio-slider__title"><?=$arItem["NAME"]?></div>
						<div class="portfolio-slider__address"><?=$arItem["PROPERTIES"]["STRANA"]["VALUE"]?></div>
						<div class="portfolio-slider__name"><?=$arItem["PROPERTIES"]["ORGANIZACIYA"]["VALUE"]?></div>
						<div class="portfolio-slider__year"><?=$arItem["PROPERTIES"]["GOD"]["VALUE"]?></div>
						<a href='<?=$arItem["DETAIL_PAGE_URL"]?>' class="portfolio-slider__btn btn"><?=GetMessage("SEO_MORE")?></a>
					</div>
				</div>

			<?endforeach;?>

		</div>
		<div class="slider-kit">
			<div class="swiper-button-prev slider-button-prev portfolio-button-prev"></div>
			<div class="swiper-button-next slider-button-next portfolio-button-next"></div>
		</div>
		<div class="portfolio-slider-title mobile"><?=GetMessage("SEO_OUR_PORTFOLIO")?></div>
		<div class="portfolio-slider-year"><?=$arResult["ITEMS"][0]["PROPERTIES"]["GOD"]["VALUE"]?></div>
	</div>
</div>