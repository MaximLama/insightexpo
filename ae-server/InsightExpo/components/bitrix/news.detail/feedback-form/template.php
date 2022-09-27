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
<form action="javascript:void(0)" id="feedback-form" class="feedback-form form">
	<div class="form-title"><?=$arResult["NAME"]?></div>
	<div class="form-status"><?=GetMessage("SUCCESS")?></div>
	<div class="form-content">
		<label>
			<input type="text" name="NAME" required class="form-input">
			<span><?=$arResult["PROPERTIES"]["FIO_PLEJSKHOLDER"]["VALUE"]?></span>
		</label>

		<label>
			<input type="text" name="COMPANY" required class="form-input">
			<span><?=$arResult["PROPERTIES"]["KOMPANIYA_PLEJSKHOLDER"]["VALUE"]?></span>
		</label>

		<label>
			<input type="email" name="EMAIL" required class="form-input">
			<span><?=$arResult["PROPERTIES"]["EMAIL_PLEJSKHOLDER"]["VALUE"]?></span>
		</label>

		<label>
			<input type="text" name="PHONE_NUMBER" required class="form-input form-phone">
			<span><?=$arResult["PROPERTIES"]["TELEFON_PLEJSKHOLDER"]["VALUE"]?></span>
		</label>

		<label>
			<input type="text" name="MESSAGE" required class="form-input">
			<span><?=$arResult["PROPERTIES"]["SOOBSHCHENIE_PLEJSKHOLDER"]["VALUE"]?></span>
		</label>

		<button class="feedback-form__btn form-btn btn" name="submit" value="submit"><?=$arResult["PROPERTIES"]["OTPRAVIT_KNOPKA"]["VALUE"]?></button>
	</div>
</form>