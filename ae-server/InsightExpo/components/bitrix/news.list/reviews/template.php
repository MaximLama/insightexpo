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
<div class="reviews-title title"><?= $arResult["SECTION"]["PATH"][0]["NAME"] ?></div>
<div class="reviews-content">
	<div class="swiper reviews-slider" id="reviews-slider">
		<div class="swiper-wrapper reviews-slider-wrapper">

			<? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
				
				<div class="swiper-slide reviews-slider__item">
					<div class="reviews-slider__img">
						<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="">
					</div>

					<div class="reviews-slider__text">
						<div class="reviews-slider__quotes">
							<img src="<?= SITE_TEMPLATE_PATH ?>/img/quotes.svg" alt="">
						</div>
						
						<?= $arItem["PROPERTIES"]["SODERZHANIE"]["~VALUE"]["TEXT"] ?>

						<div class="reviews-slider__title"><?= $arItem["PROPERTIES"]["AVTOR_OTZYVA"]["VALUE"] ?></div>

					</div>
				</div>

			<? endforeach; ?>

		</div>
		
		<div class="slider-kit">
			<div class="swiper-button-prev slider-button-prev reviews-button-prev"></div>
			<div class="swiper-button-next slider-button-next reviews-button-next"></div>
		</div>
	</div>

</div>
<div class="swiper-pagination slider-pagination reviews-pagination"></div>