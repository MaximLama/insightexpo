<?

//ПОЛУЧАЕМ СПИСОК САЙТОВ

require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");

$rsSite = CSite::GetList("sort", "asc", $arFilter=array("ACTIVE" => "Y"));
$sites = array();
while ($arSite = $rsSite->GetNext())
{
	if ($arSite['DOMAINS'] <> '')
	{
		$arSite['DOMAINS'] = explode("\n", $arSite['DOMAINS']);
		foreach ($arSite['DOMAINS'] as $key => $domain)
		{
			$arSite['DOMAINS'][$key] = trim($domain);
		}
	}
	$sites[]=$arSite;
}

//ПОЛУЧАЕМ ТЕКУЩУЮ ДОМЕННУЮ ЗОНУ
foreach($sites as $site){
	if($site["LID"]==SITE_ID){
		$domainArray = explode('.', $site["DOMAINS"][0]);
		$currentDomainZone = $domainArray[count($domainArray)-1];
		break;
	}
}

//ИЩЕМ ДРУГУЮ ДОМЕННУЮ ЗОНУ
foreach($sites as $site){
	$domainArray = explode('.', $site["DOMAINS"][0]);
	if($domainArray[count($domainArray)-1]!=$currentDomainZone){
		$anotherDomain = $site["DOMAINS"][0];
	}
}

echo json_encode(array(
	"currentHost"=>$_SERVER['HTTP_HOST'],
	"anotherHost"=>$anotherDomain
));