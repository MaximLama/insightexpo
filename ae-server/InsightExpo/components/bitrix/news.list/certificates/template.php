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
<div class="certificates-heading">
	<div class="certificates-heading__left">
		<div class="swiper-pagination slider-pagination certificates-pagination"></div>
		<div class="certificates-title title ml"><?= $arResult["SECTION"]["PATH"][0]["NAME"] ?></div>
	</div>
	
	<div class="slider-kit">
		<div class="swiper-button-prev slider-button-prev certificates-button-prev"></div>
		<div class="swiper-button-next slider-button-next certificates-button-next"></div>
	</div>
</div>
<div class="certificates-content">
	<div class="swiper certificates-slider" id="certificates-slider">
		<div class="swiper-wrapper certificates-slider-wrapper">

			<? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
				<div class="swiper-slide certificates-slider__item">
					<div class="certificates-slider__box">
						<div class="certificates-slider__img">
							<img src="<?= SITE_TEMPLATE_PATH ?>/img/certificate.png" alt="">
						</div>
						<div class="certificates-slider__text">
							<div class="certificates-slider__title"><?= $arItem["PROPERTIES"]["NAZVANIE_SERTIFIKATA"]["~VALUE"]["TEXT"] ?></div>
						</div>
					</div>

					<div class="certificates-slider__number"><span>#</span> 0<?= $key+1 ?></div>

					<a href="<?= CFile::GetPath($arItem["PROPERTIES"]["PDF"]["VALUE"]) ?>" class="certificates-slider__link" target="_blank">
						<img src="<?= SITE_TEMPLATE_PATH ?>/img/link-w.svg" alt="">
					</a>
				</div>

			<? endforeach; ?>

		</div>
	</div>
</div>