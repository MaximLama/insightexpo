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
$servicyObj = CIBlockElement::GetList(
	array("SORT"=>"ASC"),
	array("ID"=>$arResult["PROPERTIES"]["DRUGIE_SERVISY"]["VALUE"], "ACTIVE"=>"Y"),
	false,
	false,
	array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT", "DETAIL_PAGE_URL")
);
while($service = $servicyObj->GetNext()){
	$services[] = $service;
}

?>
<div class="other-stages__content">
	<div class="other-stages__text">
		<div class="other-stages__title title"><?=$arResult["NAME"]?></div>

		<?=$arResult["PROPERTIES"]["POLNOE_OPISANIE"]["~VALUE"]["TEXT"]?>

	</div>
</div>

<div class="other-stages__side">

	<?foreach($services as $service):?>

		<div class="other-stages__item">
			<div class="other-stages__item-img">
				<img src="<?=CFile::GetPath($service["PREVIEW_PICTURE"])?>" alt="дизайн и застройка выставочных стендов">
			</div>
			<div class="other-stages__item-text">
				<div class="other-stages__item-title"><?=$service["NAME"]?></div>
				<div class="other-stages__item-description">
					<?=$service["PREVIEW_TEXT"]?>
				</div>
				<a href='<?=$service["DETAIL_PAGE_URL"]?>' class="other-stages__item-link link link-other">Подробнее</a>
			</div>
		</div>

	<?endforeach;?>

</div>