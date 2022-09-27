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
?>
<div class="clients-title title"><?= GetMessage("CLIENTS_TITLE") ?></div>
<div class="clients-content">
	<div class="swiper clients-slider" id="clients-slider">
		<div class="swiper-wrapper clients-slider-wrapper">

			<? foreach ($arResult["ITEMS"] as $arItem): ?>

				<div class="swiper-slide clients-slider__item">
					<img src="<?= CFile::GetPath($arItem["PROPERTIES"]["LOGO"]["VALUE"]) ?>" alt="">
				</div>

			<? endforeach; ?>
			
		</div>
	</div>
	<div class="swiper-pagination slider-pagination clients-pagination"></div>
</div>