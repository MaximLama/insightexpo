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
//DEFINE CURRENT SECTION ID AND SECTION NAME
$GLOBALS["SECTION_ID"] = isset($_REQUEST["SECTION_ID"]) ?htmlspecialchars($_REQUEST['SECTION_ID']): $arResult["SECTION"]["ID"];
$curSectionName = '';
foreach($arResult["SECTIONS"] as $arSection){
	if($GLOBALS["SECTION_ID"]==$arSection["ID"]){
		$curSectionName = $arSection["NAME"];
	}
}
?>
<div class="banner-portfolio__filter filter" id="filter-categories">
	<?if($curSectionName===""):?>
		<input type="hidden" name="type" class="filter__select" value="<?=GetMessage("ALL_CATEGORIES")?>">
	<?else:?>
		<input type="hidden" name="type" class="filter__select" value="<?= $curSectionName ?>">
	<?endif;?>
	<div class="select">
		<div class="filter_checked select_checked">
			<?if($curSectionName===""):?>
				<span class="select-text"><span><?=GetMessage("ALL_CATEGORIES")?></span></span>
			<?else:?>
				<span class="select-text"><?= $curSectionName ?></span>
			<?endif;?>
		</div>
		<ul class="select-dropdown">
			<?if($curSectionName===""):?>
				<li class="select-dropdown__option filter-dropdown__option active" data-value="<?=GetMessage("ALL_CATEGORIES")?>" section-id=<?=$arResult["SECTION"]["ID"]?>>
					<?=GetMessage("ALL_CATEGORIES")?>
				</li>
			<?else:?>
				<li class="select-dropdown__option filter-dropdown__option" data-value="<?=GetMessage("ALL_CATEGORIES")?>" section-id=<?=$arResult["SECTION"]["ID"]?>>
					<?=GetMessage("ALL_CATEGORIES")?>
				</li>
			<?endif;?>
			<? foreach($arResult["SECTIONS"] as $key => $arSection): ?>
				<?if($GLOBALS["SECTION_ID"]==$arSection["ID"]):?>
					<li class="select-dropdown__option filter-dropdown__option active" data-value="<?= $arSection["NAME"] ?>" section-id=<?=$arSection["ID"]?>>
						<?= $arSection["NAME"] ?>
					</li>
				<?else:?>
					<li class="select-dropdown__option filter-dropdown__option" data-value="<?= $arSection["NAME"] ?>" section-id=<?=$arSection["ID"]?>>
						<?= $arSection["NAME"] ?>
					</li>
				<?endif;?>
			<?endforeach;?>

		</ul>
	</div>
</div>