<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
<ul class="header-list">

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
	else:
		if($arItem["SELECTED"]):?>
			<li class="mobile"><a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a></li>
		<?else:?>
			<li class="mobile"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?endif;
	endif;?>
	
<?endforeach?>

</ul>
<?endif?>
<?$GLOBALS["CACHE_MANAGER"]->CleanDir("menu");
CBitrixComponent::clearComponentCache("bitrix:menu");?>