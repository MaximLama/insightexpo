<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");

function handle($data){
	return htmlspecialcharsbx(stripslashes(trim($data)));
}

$arResult["ERROR_MESSAGE"] = array();
$arParams["EVENT_NAME"] = "FEEDBACK_FORM_INSIGHT_EXPO";
$headers=getallheaders();
if($_SERVER["REQUEST_METHOD"] == "POST" && (preg_match("/^https:\/\/insightexpo\.ae/", $headers["Referer"])||preg_match("/^https:\/\/insightexpo\.com/", $headers["Referer"]))){

	if(mb_strlen($_POST["NAME"]) <= 1)
		$arResult["ERROR_MESSAGE"]["NAME"] = "NAME IS NOT VALID";		
	if(mb_strlen($_POST["COMPANY"]) <= 1)
		$arResult["ERROR_MESSAGE"]["COMPANY"] = "COMPANY IS NOT VALID";
	if(mb_strlen($_POST["EMAIL"]) <= 1 || !check_email($_POST["EMAIL"]))
		$arResult["ERROR_MESSAGE"]["EMAIL"] = "EMAIL IS NOT VALID";
	if(mb_strlen($_POST["PHONE_NUMBER"]) <= 1)
		$arResult["ERROR_MESSAGE"]["PHONE_NUMBER"] = "PHONE NUMBER IS NOT VALID";
	if(mb_strlen($_POST["MESSAGE"]) <= 1)
		$arResult["ERROR_MESSAGE"]["MESSAGE"] = "MESSAGE IS NOT VALID";
	
	if(empty($arResult["ERROR_MESSAGE"]))
	{
		$arFields = Array(
			"NAME" => handle($_POST["NAME"]),
			"COMPANY" => handle($_POST["COMPANY"]),
			"EMAIL" => handle($_POST["EMAIL"]),
			"PHONE_NUMBER" => handle($_POST["PHONE_NUMBER"]),
			"MESSAGE" => handle($_POST['MESSAGE'])
		);
		$arResult["arFields"]=$arFields;
		$arResult["EVENT_NAME"]=$arParams["EVENT_NAME"];
		$arResult["SITE_ID"]=SITE_ID;
		CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields);
		$arResult["success"]="OK";
		if(CModule::IncludeModule("iblock")){

		   	$el = new CIBlockElement;

		   	$PROP = array();
		   	$PROP["FIO"]          = handle($_POST["NAME"]);
		   	$PROP["KOMPANIYA"]    = handle($_POST["COMPANY"]);
		   	$PROP["EMAIL"]        = handle($_POST["EMAIL"]);
		   	$PROP["TELEFON"]      = handle($_POST["PHONE_NUMBER"]);
		   	$PROP["SOOBSHCHENIE"] = handle($_POST["MESSAGE"]);

		    $arLoadProductArray = Array(
		         "IBLOCK_ID"      => 18,
		         "PROPERTY_VALUES"=> $PROP,
		         "NAME"           => bitrix_sessid().time(),
		         "ACTIVE"         => "Y"
		    );
		    $el->Add($arLoadProductArray);
		}
	}
}
echo json_encode($arResult);