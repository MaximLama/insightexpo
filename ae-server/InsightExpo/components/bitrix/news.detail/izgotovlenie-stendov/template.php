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
<div class="other-stages__title title"><h1><?=$arResult["NAME"]?></h1></div>
<div class="other-stages__content">
	<div class="other-stages__img">
		<img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" alt="Эксклюзивные стенды для выставок - дизайн и прозводство">
	</div>
	<div class="other-stages__text">
		<?=$arResult["~PREVIEW_TEXT"]?>
	</div>
</div>