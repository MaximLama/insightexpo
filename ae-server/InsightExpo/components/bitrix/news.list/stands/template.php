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
<div class="stands-heading">
	<div class="stands-heading__left">
		<div class="swiper-pagination slider-pagination stands-pagination"></div>
		<div class="stands-title title ml"><?=$arResult["SECTION"]["PATH"][0]["NAME"]?></div>
	</div>

	<div class="slider-kit">
		<div class="swiper-button-prev slider-button-prev stands-button-prev"></div>
		<div class="swiper-button-next slider-button-next stands-button-next"></div>
	</div>
</div>
<div class="stands-content">
	<div class="swiper stands-slider" id="stands-slider">
		<div class="swiper-wrapper stands-slider-wrapper">

			<?foreach($arResult["ITEMS"] as $arItem):?>
				
				<div class="swiper-slide stands-slider__item">
					<div class="stands-slider__img">
						<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
					</div>
					<div class="stands-slider__text">
						<div class="stands-slider__title"><?=$arItem["NAME"]?></div>
						<div class="stands-slider__description"><?=$arItem["PREVIEW_TEXT"]?></div>
					</div>
				</div>

			<?endforeach;?>

		</div>
	</div>
</div>