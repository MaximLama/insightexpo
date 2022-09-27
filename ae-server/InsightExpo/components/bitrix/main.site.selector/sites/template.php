<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?

$sites = array(
	"com"=>array("ru", "en", "ae"),
	"ae"=>array("ru", "ae")
);

foreach($arResult["SITES"] as $arSite){
	if($arSite["CURRENT"] == "Y")
		$currentSite = $arSite;
}

$domainArray = explode('.', $currentSite["DOMAINS"][0]);
$domainZone = $domainArray[count($domainArray)-1];
$currentLang = $domainZone==="ae"?"ae":LANGUAGE_ID;
?>

<div class="header-language">
	<input type="hidden" class="header-language__select" value="<?=$currentLang?>">
	<div class="select">
		<div class="select_checked language-select_checked">
			<span class="select-text header-language__item"><?=strtoupper($currentLang)?></span>
		</div>
		<div class="select-dropdown">

			<?foreach($sites[$domainZone] as $arLanguage):
				if($arLanguage!=$currentLang):?>
					<div class="header-language__dropdown-item" data-language="<?=strtoupper($arLanguage)?>"><?=strtoupper($arLanguage)?></div>
				<?else:?>
					<div class="header-language__dropdown-item d-none" data-language="<?=strtoupper($arLanguage)?>"><?=strtoupper($arLanguage)?></div>
				<?endif;
			endforeach;?>

		</div>
	</div>
</div>