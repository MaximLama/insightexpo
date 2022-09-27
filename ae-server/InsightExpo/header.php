<?

define("LANGUAGE_ID", \Bitrix\Main\Context::getCurrent()->GetLanguage());
//ЯЗЫК
CComponentUtil::__IncludeLang(dirname($_SERVER["SCRIPT_NAME"]), "/header.php");

$siteObj = CSite::GetList();
while($site = $siteObj->GetNext()){
	if($site["ID"]==SITE_ID) break;
}
define("SITE_DOMAIN", $site["DOMAINS"]);
if(SITE_DOMAIN==="insightexpo.com" && LANGUAGE_ID==="en"){
	define('LANGUAGE_DIR', "/".LANGUAGE_ID);
}
else{
	define('LANGUAGE_DIR', "");
}
function getID($IDru, $IDen, $IDae){
	switch(SITE_DOMAIN){
		case "insightexpo.com":
		{
			switch(LANGUAGE_ID){
				case "en":
					return $IDen;
					break;
				case "ru":
					return $IDru;
					break;
				default:
					die();
			}
			break;
		}
		case "insightexpo.ae":
			return $IDae;
			break;
		default:
			die();
	}
}
//ХЭДЕР
if(!CModule::IncludeModule("iblock")) die();

$header = CIBlockElement::GetList(
	array("SORT"=>"ASC"),
	array("ID"=>getID(15, 251, 266), "ACTIVE"=>"Y"),
	false,
	false,
	array(
		"ID", 
		"IBLOCK_ID", 
		"PROPERTY_GLAVNOE_LOGO", 
		"PROPERTY_VTOROE_LOGO",
		"PROPERTY_KONTAKTY",
		"PROPERTY_SSYLKA_NA_YOUTUBE",
		"PROPERTY_YOUTUBE_IKONKA_DESK",
		"PROPERTY_YOUTUBE_IKONKA_MOB",
		"PROPERTY_SSYLKA_NA_INSTAGRAM",
		"PROPERTY_INSTAGRAM_IKONKA_DESK",
		"PROPERTY_INSTAGRAM_IKONKA_MOB",
		"PROPERTY_SSYLKA_NA_LINKEDIN",
		"PROPERTY_LINKEDIN_IKONKA_DESK",
		"PROPERTY_LINKEDIN_IKONKA_MOB"
	)
)->GetNext();

//КОНТАКТЫ
$contact = CIBlockElement::GetList(
	array("SORT"=>"ASC"),
	array("ID"=>$header["PROPERTY_KONTAKTY_VALUE"], "ACTIVE"=>"Y"),
	false,
	false,
	array(
		"ID", 
		"IBLOCK_ID", 
		"PROPERTY_ADRES", 
		"PROPERTY_POCHTA",
		"PROPERTY_TELEFON"
	)
)->GetNext();

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title><?= $APPLICATION->ShowTitle() ?></title>
	<link rel="icon" href="<?=SITE_TEMPLATE_PATH?>/img/favicon.png"> 
	<?$APPLICATION->ShowHead(); 

	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/normalize.css");
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/swiper-bundle.min.css");
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/jquery.fancybox.min.css");
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/style.css");

	?>
</head>
<body>
<div id="panel"><?= $APPLICATION->ShowPanel() ?></div>

	<header class="header">
		<div class="container">
			<div class="header-content">
				<a href="<?=LANGUAGE_DIR?>/" class="header-logo">
					<img src="<?= CFile::GetPath($header["PROPERTY_GLAVNOE_LOGO_VALUE"]) ?>" alt="Производство выставочных стендов">
				</a>

				<div class="header-img">
					<img src="<?= CFile::GetPath($header["PROPERTY_VTOROE_LOGO_VALUE"]) ?>" alt="Эксклюзивные выставочные стенды">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/logo-2-b.svg" alt="" class="header-img__black">
				</div>

				<nav class="header-nav">
					<div class="header-nav__left">

						<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"header",
							Array(
								"ALLOW_MULTI_SELECT" => "N",
								"CHILD_MENU_TYPE" => "left",
								"CACHE_SELECTED_ITEMS" => "N",
								"DELAY" => "N",
								"MAX_LEVEL" => "1",
								"MENU_CACHE_GET_VARS" => array(""),
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_TYPE" => "N",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"ROOT_MENU_TYPE" => "top",
								"USE_EXT" => "N"
							)
						);?>

						<a href="<?=LANGUAGE_DIR?>/kontakty/#feedback-form" class="header-btn btn mobile"><?=GetMessage('SEND_REQUEST')?></a>

						<div class="header-info mobile">
							<div class="header-info__item">
								<div class="header-info__img">
									<img src="<?= SITE_TEMPLATE_PATH ?>/img/info-icon-1.svg" alt="">
								</div>
								<div class="header-info__text"><?= $contact["~PROPERTY_ADRES_VALUE"]["TEXT"] ?></div>
							</div>

							<a href="tel:<?= preg_replace('/[\D]/', "", $contact["PROPERTY_TELEFON_VALUE"])?>" class="header-info__item">
								<div class="header-info__img">
									<img src="<?= SITE_TEMPLATE_PATH ?>/img/info-icon-2.svg" alt="">
								</div>
								<div class="header-info__text"><?= $contact["PROPERTY_TELEFON_VALUE"] ?></div>
							</a>

							<a href="mailto:<?= $contact["PROPERTY_POCHTA_VALUE"]?>" class="header-info__item">
								<div class="header-info__img">
									<img src="<?= SITE_TEMPLATE_PATH ?>/img/info-icon-3.svg" alt="">
								</div>
								<div class="header-info__text"><?= $contact["PROPERTY_POCHTA_VALUE"]?></div>
							</a>
						</div>
					</div>

					<div class="header-social mobile">
						<a href="<?= $header["PROPERTY_SSYLKA_NA_YOUTUBE_VALUE"]?>" class="header-social__item" target="_blank">
							<img src="<?= CFile::GetPath($header["PROPERTY_YOUTUBE_IKONKA_MOB_VALUE"]) ?>" alt="">
						</a>
						<a href="<?= $header["PROPERTY_SSYLKA_NA_INSTAGRAM_VALUE"]?>" class="header-social__item" target="_blank">
							<img src="<?= CFile::GetPath($header["PROPERTY_INSTAGRAM_IKONKA_MOB_VALUE"]) ?>" alt="">
						</a>

						<?if($header["PROPERTY_SSYLKA_NA_LINKEDIN_VALUE"]):?>

							<a href="<?= $header["PROPERTY_SSYLKA_NA_LINKEDIN_VALUE"]?>" class="header-social__item" target="_blank">
								<img src="<?= CFile::GetPath($header["PROPERTY_LINKEDIN_IKONKA_MOB_VALUE"]) ?>" alt="">
							</a>

						<?endif;?>

					</div>
				</nav>

				<div class="header-right mobile">
					<?if(!preg_match('/\/servisy\/([\w,-]+)\/([^\/]*)/', $_SERVER['REQUEST_URI'])){
						$APPLICATION->IncludeComponent(
							"bitrix:main.site.selector",
							"sites",
							Array(
								"CACHE_TIME" => "3600",
								"CACHE_TYPE" => "A",
								"SITE_LIST" => array("*all*")
							)
						);
					}?>
					
					<div class="header-burger">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
			</div>
		</div>

		<div class="header-side">
			<?if(!preg_match('/\/servisy\/([\w,-]+)\/([^\/]*)/', $_SERVER['REQUEST_URI'])){
				$APPLICATION->IncludeComponent(
					"bitrix:main.site.selector",
					"sites",
					Array(
						"CACHE_TIME" => "3600",
						"CACHE_TYPE" => "A",
						"SITE_LIST" => array("*all*")
					)
				);
			}?>

			<div class="header-social">
				<a href="<?= $header["PROPERTY_SSYLKA_NA_YOUTUBE_VALUE"]?>" class="header-social__item" target="_blank">
					<img src="<?= CFile::GetPath($header["PROPERTY_YOUTUBE_IKONKA_DESK_VALUE"]) ?>" alt="">
				</a>
				<a href="<?= $header["PROPERTY_SSYLKA_NA_INSTAGRAM_VALUE"]?>" class="header-social__item" target="_blank">
					<img src="<?= CFile::GetPath($header["PROPERTY_INSTAGRAM_IKONKA_DESK_VALUE"]) ?>" alt="">
				</a>
				
				<?if($header["PROPERTY_SSYLKA_NA_LINKEDIN_VALUE"]):?>

					<a href="<?= $header["PROPERTY_SSYLKA_NA_LINKEDIN_VALUE"]?>" class="header-social__item" target="_blank">
						<img src="<?= CFile::GetPath($header["PROPERTY_LINKEDIN_IKONKA_DESK_VALUE"]) ?>" alt="">
					</a>

				<?endif;?>
				
			</div>
		</div>
	</header>
	<?if(!preg_match('/\/servisy\/([\w,-]+)\/([^\/]*)/', $_SERVER['REQUEST_URI'])){?>
		<main>
	<?}else{?>
		<main class="main-seo">
	<?}?>