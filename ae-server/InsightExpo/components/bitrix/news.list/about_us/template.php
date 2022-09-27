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
<div class="advantages-heading">
	<div class="advantages-heading__left">
		<div class="swiper-pagination slider-pagination advantages-pagination"></div>
		<div class="advantages-title title ml"><?= $arResult["SECTION"]["PATH"][0]["NAME"] ?></div>
	</div>
	
	<div class="slider-kit">
		<div class="swiper-button-prev slider-button-prev advantages-button-prev"></div>
		<div class="swiper-button-next slider-button-next advantages-button-next"></div>
	</div>
</div>

<div class="advantages-content">
	<div class="swiper advantages-slider" id="advantages-slider">
		<div class="swiper-wrapper advantages-slider-wrapper">

			<? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
				<div class="swiper-slide advantages-slider__item">
					<div class="advantages-slider__number"># 0<?= $key+1 ?></div>
					<div class="advantages-slider__title"><?= $arItem["PROPERTIES"]["ZAGOLOVOK"]["~VALUE"]["TEXT"] ?></div>
					<div class="advantages-slider__img">
						<img src="<?= CFile::GetPath($arItem["PROPERTIES"]["NEAKTIVNAYA_IKONKA"]["VALUE"]) ?>" alt="">
						<img src="<?= CFile::GetPath($arItem["PROPERTIES"]["AKTIVNAYA_IKONKA"]["VALUE"]) ?>" alt="" class="advantages-hover">
					</div>
				</div>

			<? endforeach; ?>

		</div>
	</div>
</div>