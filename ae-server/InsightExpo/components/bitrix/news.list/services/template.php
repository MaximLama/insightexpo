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
<div class="services-decor"><?=$arResult["SECTION"]["PATH"][0]["NAME"]?></div>
	<div class="container">
		<div class="services-content">
			<div class="swiper services-slider" id="services-slider">
				<div class="swiper-wrapper services-slider-wrapper">

					<?foreach($arResult["ITEMS"] as $arItem):?>
						<div class="swiper-slide services-slider__item" data-hash="<?=$arItem['ID']?>">
							<div class="services-slider__item-img">
								<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
								<div class="img-decor img-decor-1 img-decor_red"></div>
								<div class="img-decor img-decor-2"></div>
								<div class="img-decor img-decor-3 img-decor_red"></div>
								<div class="img-decor img-decor-4"></div>
							</div>
							<div class="services-slider__item-text">
								<?if(LANGUAGE_ID === "ru"):?>
									<div class="services-slider__item-title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["PROPERTIES"]["NAZVANIE_SERVISA"]["~VALUE"]["TEXT"]?></a></div>
								<?else:?>
									<div class="services-slider__item-title"><?=$arItem["PROPERTIES"]["NAZVANIE_SERVISA"]["~VALUE"]["TEXT"]?></div>
								<?endif;?>
								<div class="services-slider__item-description">
									<?=$arItem["~DETAIL_TEXT"]?>
								</div>
							</div>
						</div>

					<?endforeach;?>

				</div>
				<div class="slider-kit">
					<div class="swiper-button-prev slider-button-prev services-button-prev"></div>
					<div class="swiper-button-next slider-button-next services-button-next"></div>
				</div>
				<div class="swiper-pagination slider-pagination services-pagination"></div>
			</div>
		</div>
	</div>

	<div thumbsSlider="" class="swiper services-thumbs" id="services-thumbs">
		<div class="swiper-wrapper services-thumbs-wrapper">

			<?foreach ($arResult["ITEMS"] as $arItem):?>
				
				<div class="swiper-slide services-thumbs__item">
					<div class="services-thumbs__item-img">
						<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
					</div>
					<?if(LANGUAGE_ID === "ru"):?>
						<div class="services-thumbs__item-title">
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["PROPERTIES"]["NAZVANIE_SERVISA"]["~VALUE"]["TEXT"]?></a>
						</div>
					<?else:?>
						<div class="services-thumbs__item-title"><?=$arItem["PROPERTIES"]["NAZVANIE_SERVISA"]["~VALUE"]["TEXT"]?></div>
					<?endif;?>
				</div>

			<?endforeach;?>

		</div>
	</div>