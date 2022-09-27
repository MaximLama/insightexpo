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
<img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" alt="" class="banner-bg desktop">
<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="" class="banner-bg mobile">
<div class="project-decor"><?=GetMessage("PORTFOLIO_BACK");?></div>