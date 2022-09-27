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
CComponentUtil::__IncludeLang(dirname($_SERVER["SCRIPT_NAME"]), "/template.php");
$this->setFrameMode(true);
function handleSections($id, &$sections, &$sections_id){
	$res = CIBlockSection::GetList(
		array("SORT"=>"ASC"),
		array("IBLOCK_ID"=>8, "SECTION_ID"=>$id),
		false,
		array("ID", "IBLOCK_ID", "NAME"),
		false
	);
	while ($section = $res->GetNext()){
		$sections[] = $section["NAME"];
		if($_REQUEST['SECTION_NAME']===""){
			$sections_id[] = $section["ID"];
			continue;
		}
		if($section["NAME"]==$_REQUEST['SECTION_NAME']){
			$sections_id[] = $section["ID"];
		}
	} 
}
$sections = array();
$_REQUEST['SECTION_NAME'] = isset($_REQUEST['SECTION_NAME'])?htmlspecialchars($_REQUEST['SECTION_NAME']): "";
$sections_id = array();
if($arResult["SECTION"]["ID"]===(string)getID(17, 18, 54)){
	foreach ($arResult["SECTIONS"] as $arSection) {
		handleSections($arSection["ID"], $sections, $sections_id);
	}
	$sections = array_unique($sections);
}
else{
	handleSections($arResult["SECTION"]["ID"], $sections, $sections_id);
}

//Массив фильтрации
$GLOBALS['PROJECTS_FILTER'] = count($sections_id) ?array("SECTION_ID"=>$sections_id) :"";


?>
<div class="banner-portfolio__filter filter" id="filter-year">
	<?if(count($sections_id)):?>
		<?if($_REQUEST["SECTION_NAME"]===""):?>
			<input type="hidden" name="type" class="filter__select" value="<?=GetMessage("ALL_YEARS")?>">
		<?else:?>
			<input type="hidden" name="type" class="filter__select" value="<?=$_REQUEST["SECTION_NAME"]?>">
		<?endif;?>
	<?else:?>
		<input type="hidden" name="type" class="filter__select" value="<?=GetMessage("ALL_YEARS")?>">
	<?endif;?>
	<div class="select">
		<div class="filter_checked select_checked">
			<?if($_REQUEST["SECTION_NAME"]):?>
				<span class="select-text"><span><?=$_REQUEST['SECTION_NAME']?></span></span>
			<?else:?>
				<span class="select-text"><span><?=GetMessage("ALL_YEARS")?></span></span>
			<?endif;?>
		</div>
		<ul class="select-dropdown">
			<?if($_REQUEST['SECTION_NAME']):?>
				<li class="select-dropdown__option filter-dropdown__option" data-value="<?=GetMessage("ALL_YEARS")?>" section-name="">
					<?=GetMessage("ALL_YEARS")?>
				</li>
			<?else:?>
				<li class="select-dropdown__option filter-dropdown__option active" data-value="<?=GetMessage("ALL_YEARS")?>" section-name="">
					<?=GetMessage("ALL_YEARS")?>
				</li>
			<?endif;?>
			<? foreach($sections as $sect): ?>
				<?if($_REQUEST['SECTION_NAME'] === $sect):?>
					<li class="select-dropdown__option filter-dropdown__option active" data-value="<?= $sect ?>" section-name="<?=$sect?>">
						<?= $sect ?>
					</li>
				<?else:?>
					<li class="select-dropdown__option filter-dropdown__option" data-value="<?= $sect ?>" section-name="<?=$sect?>">
						<?= $sect ?>
					</li>
				<?endif;?>
			<?endforeach;?>
		</ul>
	</div>
</div>