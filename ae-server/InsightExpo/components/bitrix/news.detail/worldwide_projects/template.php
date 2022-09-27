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
$arItem = $arResult["PROPERTIES"];
?>
<div class="construction-content">
	<div class="construction-blocks">
		<div class="construction-block">
			<div class="construction-block__number"><?= $arItem["PROEKTOV_CHISLO"]["VALUE"] ?></div>
			<div class="construction-block__title"><?= $arItem["PROEKTOV_ZAGOLOVOK"]["VALUE"] ?></div>
		</div>
		<div class="construction-block">
			<div class="construction-block__number"><?= $arItem["STRAN_CHISLO"]["VALUE"] ?></div>
			<div class="construction-block__title"><?= $arItem["STRAN_ZAGOLOVOK"]["VALUE"] ?></div>
		</div>
	</div>
	<div class="construction-text">
		<div class="construction-title title"><?= $arResult["NAME"] ?></div>
		<div class="construction-description">
			<div class="construction-description__item">
				<?= $arItem["OPISANIE1"]["~VALUE"]["TEXT"] ?>
			</div>
			<div class="construction-description__item">
				<?= $arItem["OPISANIE2"]["~VALUE"]["TEXT"] ?>
			</div>
		</div>
	</div>
</div>