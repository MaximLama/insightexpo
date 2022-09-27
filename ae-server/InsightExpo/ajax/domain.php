<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");

$rsSites = CSite::GetByID(SITE_ID);
$arSite = $rsSites->Fetch();
$domainArray = explode('.', $arSite["DOMAINS"]);
$currentDomainZone = $domainArray[count($domainArray)-1];
echo json_encode(array('domain'=>$currentDomainZone));
?>