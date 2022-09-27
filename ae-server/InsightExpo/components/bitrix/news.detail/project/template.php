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
$projectsObj = CIBlockElement::GetList(
	array("SORT"=>"DESC", "ID"=>"DESC"),
	array("IBLOCK_ID"=>8, "SECTION_ID"=>$arResult["IBLOCK_SECTION_ID"], "ACTIVE"=>"Y"),
	false,
	false,
	array(
		"ID",
		"IBLOCK_ID",
		"DETAIL_PAGE_URL"
	)
);
while($project = $projectsObj->GetNext()){
	$projects[] = $project;
}
foreach($projects as $key => $project){
	if($project["CODE"]==$_REQUEST['ELEMENT_CODE']){
		$prevProject = $key ? $projects[$key-1]["DETAIL_PAGE_URL"] : "";
		$nextProject = ($key!=count($projects)) ? $projects[$key+1]["DETAIL_PAGE_URL"] : "";
		break; 
	}
}
if(!($prevProject&&$nextProject)){
	$sections = array();
	$sectObj = CIBlockSection::GetNavChain(8, $arResult["IBLOCK_SECTION_ID"]);
	while($section = $sectObj->GetNext()){
		$sections[] = $section;
	}
	$parentSection = $sections[count($sections)-2];
	$childrenSectObj = CIBlockSection::GetList(
		array("SORT"=>"ASC"),
		array("IBLOCK_ID"=>8, "SECTION_ID"=>$parentSection["ID"], "ACTIVE"=>"Y"),
		false,
		array("ID", "IBLOCK_ID", "NAME"),
		false
	);
	$childrenSections = array();
	while($childrenSection = $childrenSectObj->GetNext()){
		$childrenSections[] = $childrenSection;
	}
	for($i = 0; $i<count($childrenSections);$i++){
		if($childrenSections[$i]["ID"]==$arResult["IBLOCK_SECTION_ID"]){
			if(!$prevProject){
				if($i>0){
					$projectsObj = CIBlockElement::GetList(
						array("SORT"=>"DESC", "ID"=>"DESC"),
						array("IBLOCK_ID"=>8, "SECTION_ID"=>$childrenSections[$i-1]["ID"], "ACTIVE"=>"Y"),
						false,
						false,
						array(
							"ID",
							"IBLOCK_ID",
							"DETAIL_PAGE_URL"
						)
					);
					$projects = array();
					while($project = $projectsObj->GetNext()){
						$projects[] = $project;
					}
					if(count($projects)){
						$prevProject = $projects[count($projects)-1]["DETAIL_PAGE_URL"];
					}
				}
			}
			if(!$nextProject){
				if($i<count($childrenSections)-1){
					$projectsObj = CIBlockElement::GetList(
						array("SORT"=>"DESC", "ID"=>"DESC"),
						array("IBLOCK_ID"=>8, "SECTION_ID"=>$childrenSections[$i+1]["ID"], "ACTIVE"=>"Y"),
						false,
						false,
						array(
							"ID",
							"IBLOCK_ID",
							"DETAIL_PAGE_URL"
						)
					);
					$projects = array();
					while($project = $projectsObj->GetNext()){
						$projects[] = $project;
					}
					if(count($projects)){
						$nextProject = $projects[0]["DETAIL_PAGE_URL"];
					}
				}
			}
		}
	}
	if(!($prevProject&&$nextProject)){
		$top2Section = $sections[count($sections)-3];
		$top1SectionsObj = CIBlockSection::GetList(
			array("SORT"=>"ASC"),
			array("IBLOCK_ID"=>8, "SECTION_ID"=>$top2Section["ID"], "ACTIVE"=>"Y"),
			false,
			array("ID", "IBLOCK_ID", "NAME"),
			false
		);
		$top1Sections = array();
		while($top1Section = $top1SectionsObj->GetNext()){
			$top1Sections[] = $top1Section;
		}
		if(!$prevProject){
			$top1Section = null;
			for ($i = 0; $i<count($top1Sections);$i++){
				if($top1Sections[$i]["ID"] == $sections[count($sections)-2]["ID"]){
					if($i==0){
						$top1Section = $top1Sections[count($top1Sections)-1];
						break;
					}
					else{
						$top1Section = $top1Sections[$i-1];
						break;
					}
				}
			}
			$childrenSectionObj = CIBlockSection::GetList(
				array("SORT"=>"ASC"),
				array("IBLOCK_ID"=>8, "SECTION_ID"=>$top1Section["ID"], "ACTIVE"=>"Y"),
				false,
				array("ID", "IBLOCK_ID", "NAME"),
				false
			);
			$childrenSections = array();
			while($childrenSection = $childrenSectionObj->GetNext()){
				$childrenSections[] = $childrenSection;
			}
			$projectsObj = CIBlockElement::GetList(
				array("SORT"=>"DESC", "ID"=>"DESC"),
				array("IBLOCK_ID"=>8, "SECTION_ID"=>$childrenSections[count($childrenSections)-1]["ID"], "ACTIVE"=>"Y"),
				false,
				false,
				array(
					"ID",
					"IBLOCK_ID",
					"DETAIL_PAGE_URL"
				)
			);
			$projects = array();
			while($project = $projectsObj->GetNext()){
				$projects[] = $project;
			}
			if(count($projects)){
				$prevProject = $projects[count($projects)-1]["DETAIL_PAGE_URL"];
			}
		}
		if(!$nextProject){
			$top1Section = null;
			for ($i = 0; $i<count($top1Sections);$i++){
				if($top1Sections[$i]["ID"] == $sections[count($sections)-2]["ID"]){
					if($i==count($top1Sections)-1){
						$top1Section = $top1Sections[0];
						break;
					}
					else{
						$top1Section = $top1Sections[$i+1];
						break;
					}
				}
			}
			$childrenSectionObj = CIBlockSection::GetList(
				array("SORT"=>"ASC"),
				array("IBLOCK_ID"=>8, "SECTION_ID"=>$top1Section["ID"], "ACTIVE"=>"Y"),
				false,
				array("ID", "IBLOCK_ID", "NAME"),
				false
			);
			$childrenSections = array();
			while($childrenSection = $childrenSectionObj->GetNext()){
				$childrenSections[] = $childrenSection;
			}
			$projectsObj = CIBlockElement::GetList(
				array("SORT"=>"DESC", "ID"=>"DESC"),
				array("IBLOCK_ID"=>8, "SECTION_ID"=>$childrenSections[0]["ID"], "ACTIVE"=>"Y"),
				false,
				false,
				array(
					"ID",
					"IBLOCK_ID",
					"DETAIL_PAGE_URL"
				)
			);
			$projects = array();
			while($project = $projectsObj->GetNext()){
				$projects[] = $project;
			}
			if(count($projects)){
				$nextProject = $projects[0]["DETAIL_PAGE_URL"];
			}
		}
	}
}

?>
<div class="project-img">
	<a href="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" class="project-img__block" data-fancybox="gallery">
        <img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" alt="">
    </a>
	<div class="img-decor img-decor-1"></div>
	<div class="img-decor img-decor-2 img-decor_red"></div>
	<div class="img-decor img-decor-3"></div>
	<div class="img-decor img-decor-4 img-decor_red"></div>
</div>

<div class="project-text">
	<div class="project-title"><h1><?=$arResult["NAME"]?></h1></div>

	<div class="project-info">
		<div class="project-info__item">
			<div class="project-info__img">
				<img src="<?= SITE_TEMPLATE_PATH ?>/img/contacts-icon-1.svg" alt="">
			</div>
			<div class="project-info__text">
				<?=$arResult["PROPERTIES"]["ORGANIZACIYA"]["VALUE"]?>
			</div>
		</div>

		<div class="project-info__item">
			<div class="project-info__img">
				<img src="<?= SITE_TEMPLATE_PATH ?>/img/contacts-icon-1.svg" alt="">
			</div>
			<div class="project-info__text">
				<?=$arResult["PROPERTIES"]["STRANA"]["VALUE"]?>
			</div>
		</div>

		<div class="project-info__item">
			<div class="project-info__img">
				<img src="<?= SITE_TEMPLATE_PATH ?>/img/contacts-icon-4.svg" alt="">
			</div>
			<div class="project-info__text">
				<?=GetMessage('AREA')?>
				<div class="project-info__square">
					<?=$arResult["PROPERTIES"]["PLOSHCHAD"]["VALUE"]?> <span><?=GetMessage('UNITS')?><sup>2</sup></span>
				</div>
			</div>
		</div>
	</div>

	<div class="project-gallery">
		<div class="swiper gallery-slider mobile" id="gallery-slider">
			<div class="swiper-wrapper gallery-slider-wrapper">
				
				<? foreach($arResult["PROPERTIES"]["FOTO"]["VALUE"] as $foto): ?>
					
					<a href="<?=CFile::GetPath($foto)?>" class="swiper-slide gallery-slider__item" data-fancybox="gallery1">
						<img src="<?=CFile::GetPath($foto)?>" alt="">
					</a>

				<? endforeach;?>
				
			</div>
		</div>

		<div thumbsSlider="" class="swiper gallery-thumbs" id="gallery-thumbs">
			<div class="swiper-wrapper gallery-thumbs-wrapper">

				<? foreach($arResult["PROPERTIES"]["FOTO"]["VALUE"] as $foto): ?>

					<a href="<?=CFile::GetPath($foto)?>" class="swiper-slide gallery-thumbs__item project-gallery__item"
						data-fancybox="gallery">
						<img src="<?=CFile::GetPath($foto)?>" alt="">
					</a>

				<? endforeach;?>
				
			</div>
		</div>

		<div class="slider-kit">
			<div class="swiper-button-prev slider-button-prev gallery-button-prev"></div>
			<div class="swiper-button-next slider-button-next gallery-button-next"></div>
		</div>
		<div class="swiper-pagination slider-pagination gallery-pagination"></div>
	</div>

	<div class="project-btns">
		<? if($prevProject): ?>
			<a href="<?=$prevProject?>" class="project-btn project-btn-prev">
				<div class="project-btn__img"></div>
				<?=GetMessage('BUTTON_LEFT')?>
			</a>
		<? endif; ?>

		<? if($nextProject): ?>
			<a href="<?=$nextProject?>" class="project-btn project-btn-next">
				<?=GetMessage('BUTTON_RIGHT')?>
				<div class="project-btn__img"></div>
			</a>
		<? endif; ?>
	</div>
</div>