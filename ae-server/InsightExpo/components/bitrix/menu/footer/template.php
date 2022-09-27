<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="footer-list">

<?
foreach($arResult as $key=>$arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($key):
		if($arItem["SELECTED"]):?>
			<li><a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a></li>
		<?else:?>
			<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?endif;
	endif;?>
<?endforeach?>
	<?if(LANGUAGE_ID==="ru"):?>
		<li><a href="/servisy/zastrojka-vystavochnyh-stendov/">Застройка выставочных стендов</a></li>
	<?endif;?>
</ul>
<?endif?>
<?$GLOBALS["CACHE_MANAGER"]->CleanDir("menu");
CBitrixComponent::clearComponentCache("bitrix:menu");?>