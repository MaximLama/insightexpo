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
<div class="stages-title title"><?= $arResult["SECTION"]["PATH"][0]["NAME"] ?></div>
<div class="stages-content">

	<? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
		
		<?if($arItem["PROPERTIES"]["SSYLKA"]["VALUE"]):?>
		
			<a href="<?=$arItem["PROPERTIES"]["SSYLKA"]["VALUE"]?>" class="stages-item">
				<div class="stages-item__circle">
					<div class="stages-item__number">
						<span>#</span> 0<?= $key+1 ?>
					</div>
				</div>
				<div class="stages-item__title"><?= $arItem["PROPERTIES"]["NAZVANIE_ETAPA"]["~VALUE"]["TEXT"] ?></div>
			</a>

		<?else:?>
	
			<div class="stages-item">
				<div class="stages-item__circle">
					<div class="stages-item__number">
						<span>#</span> 0<?= $key+1 ?>
					</div>
				</div>
				<div class="stages-item__title"><?= $arItem["PROPERTIES"]["NAZVANIE_ETAPA"]["~VALUE"]["TEXT"] ?></div>
			</div>
			
		<?endif;?>

	<? endforeach; ?>

</div>