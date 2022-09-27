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

$arItem = $arResult["PROPERTIES"];

?>
	<a href='#feedback-form' class="banner-sidebar__btn btn"><?=GetMessage("SEO_SEND_REQUEST")?></a>
	<div class="banner-sidebar__text">
		<div class="banner-sidebar__title"><?= $arItem["ZAGOLOVOK"]["VALUE"] ?></div>
		<div class="banner-sidebar__subtitle"><?= $arItem["PODZAGOLOVOK"]["VALUE"] ?></div>
	</div>