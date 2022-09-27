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

<div class="banner-sidebar">
	<ul class="banner-sidebar__links">
		<? foreach ($arItem["NAPRAVLENIYA"]["VALUE"] as $value):?>
			<li><div class="banner-sidebar__link link"><?= $value ?></div></li>
		<? endforeach; ?>
	</ul>
	
	<a href='<?=LANGUAGE_DIR?>/kontakty/#feedback-form' class="banner-sidebar__btn btn"><?=GetMessage('SEND_REQUEST')?></a>
	<div class="banner-sidebar__text">
		<div class="banner-sidebar__title"><?= $arItem["ZAGOLOVOK"]["VALUE"] ?></div>
		<div class="banner-sidebar__subtitle"><?= $arItem["PODZAGOLOVOK"]["VALUE"] ?></div>
	</div>

	<div class="banner-sidebar__social mobile">
		<a href="<?= $arItem["SSYLKA_NA_YOUTUBE"]["VALUE"] ?>" class="banner-sidebar__social-item">
			<img src="<?= CFile::GetPath($arItem["YOUTUBE_IKONKA"]["VALUE"]) ?>" alt="">
		</a>
		<a href="<?= $arItem["SSYLKA_NA_INSTAGRAM"]["VALUE"] ?>" class="banner-sidebar__social-item">
			<img src="<?= CFile::GetPath($arItem["INSTAGRAM_IKONKA"]["VALUE"]) ?>" alt="">
		</a>

		<?if($arItem["SSYLKA_NA_LINKEDIN"]["VALUE"]):?>

			<a href="<?= $arItem["SSYLKA_NA_LINKEDIN"]["VALUE"] ?>" class="banner-sidebar__social-item">
				<img src="<?= CFile::GetPath($arItem["LINKEDIN_IKONKA"]["VALUE"]) ?>" alt="">
			</a>

		<?endif;?>

	</div>
</div>