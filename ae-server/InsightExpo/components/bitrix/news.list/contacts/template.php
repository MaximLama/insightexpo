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
if(SITE_DOMAIN==="insightexpo.ae"){
	foreach($arResult["ITEMS"] as $arItem){
		if($arItem["NAME"]!=="Russia")
			$temp["ITEMS"][] = $arItem;
	}
	$arResult = $temp;
}
?>
<?foreach ($arResult["ITEMS"] as $arItem):?>
	<div class="banner-contacts__group">
		<div class="banner-contacts__title"><?=$arItem["NAME"]?></div>
		<div class="banner-contacts__items">
			<div class="banner-contacts__item">
				<div class="banner-contacts__item-img">
					<img src="<?= SITE_TEMPLATE_PATH ?>/img/contacts-icon-1.svg" alt="">
				</div>
				<div class="banner-contacts__item-text">
					<div class="banner-contacts__item-name"><?=GetMessage('ADDRESS')?></div>
					<div class="banner-contacts__item-value"><?=$arItem["PROPERTIES"]["ADRES"]["~VALUE"]["TEXT"]?></div>
				</div>
			</div>

			<div class="banner-contacts__item">
				<div class="banner-contacts__item-img">
					<img src="<?= SITE_TEMPLATE_PATH ?>/img/contacts-icon-2.svg" alt="">
				</div>
				<div class="banner-contacts__item-text">
					<div class="banner-contacts__item-name"><?=GetMessage('EMAIL')?></div>
					<a href="mailto:<?=$arItem["PROPERTIES"]["POCHTA"]["VALUE"]?>" class="banner-contacts__item-value"><?=$arItem["PROPERTIES"]["POCHTA"]["VALUE"]?></a>
				</div>
			</div>

			<div class="banner-contacts__item">
				<div class="banner-contacts__item-img">
					<img src="<?= SITE_TEMPLATE_PATH ?>/img/contacts-icon-3.svg" alt="">
				</div>
				<div class="banner-contacts__item-text">
					<div class="banner-contacts__item-name"><?=GetMessage('PHONE_FAX')?></div>
					<a href="tel:<?= preg_replace('/[\D]/', "", $arItem["PROPERTIES"]["TELEFON"]["VALUE"])?>" class="banner-contacts__item-value"><?=$arItem["PROPERTIES"]["TELEFON"]["VALUE"]?></a>
				</div>
			</div>
		</div>
	</div>
<?endforeach;?>