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

if(LANGUAGE_ID=="en"){
	function GetDifferenceDateString($sec){
		$years   = intdiv($sec, 60*60*24*365);
		$months  = intdiv($sec, 60*60*24*30);
		$weeks   = intdiv($sec, 60*60*24*7);
		$days    = intdiv($sec, 60*60*24);
		$hours   = intdiv($sec, 60*60);
		$minutes = intdiv($sec, 60);

		if($years) 	 return $years   . " " . GetDifferenceForYears($years)     . " ago";
		if($months)  return $months  . " " . GetDifferenceForMonths($months)   . " ago";
		if($weeks) 	 return $weeks   . " " . GetDifferenceForWeeks($weeks)     . " ago";
		if($days) 	 return $days    . " " . GetDifferenceForDays($days)       . " ago";
		if($hours) 	 return $hours   . " " . GetDifferenceForHours($hours)     . " ago";
		if($minutes) return $minutes . " " . GetDifferenceForMinutes($minutes) . " ago";
		if($sec) 	 return $sec     . " " . GetDifferenceForYears($sec)       . " ago";
	}

	function GetDifferenceForYears($years){
		if($years == 1)
			$stringYears = "year";
		else
			$stringYears = "years";
		return $stringYears;
	}

	function GetDifferenceForMonths($months){
		if($months == 1)
			$stringMonths = "month";
		else
			$stringMonths = "months";
		return $stringMonths;
	}

	function GetDifferenceForWeeks($weeks){
		if($weeks == 1)
			$stringWeeks = "week";
		else
			$stringWeeks = "weeks";
		return $stringWeeks;
	}

	function GetDifferenceForDays($days){
		if($days)
			$stringDays = "day";
		else
			$stringDays = "days";
		return $stringDays;
	}

	function GetDifferenceForHours($hours){
		if($hours == 1)
			$stringHours = "hour";
		else
			$stringHours = "hours";
		return $stringHours;
	}

	function GetDifferenceForMinutes($minutes){
		if($minutes == 1)
			$stringMinutes = "minute";
		else
			$stringMinutes = "minutes";
		return $stringMinutes;
	}

	function GetDifferenceForSeconds($seconds){
		if($seconds == 1)
			$stringSeconds = "second";
		else
			$stringSeconds = "seconds";
		return $stringSeconds;
	}
}
else if(LANGUAGE_ID=="ru"){
	function GetDifferenceDateString($sec){
		$years   = intdiv($sec, 60*60*24*365);
		$months  = intdiv($sec, 60*60*24*30);
		$weeks   = intdiv($sec, 60*60*24*7);
		$days    = intdiv($sec, 60*60*24);
		$hours   = intdiv($sec, 60*60);
		$minutes = intdiv($sec, 60);

		if($years) 	 return $years   . " " . GetDifferenceForYears($years)     . " назад";
		if($months)  return $months  . " " . GetDifferenceForMonths($months)   . " назад";
		if($weeks) 	 return $weeks   . " " . GetDifferenceForWeeks($weeks)     . " назад";
		if($days) 	 return $days    . " " . GetDifferenceForDays($days)       . " назад";
		if($hours) 	 return $hours   . " " . GetDifferenceForHours($hours)     . " назад";
		if($minutes) return $minutes . " " . GetDifferenceForMinutes($minutes) . " назад";
		if($sec) 	 return $sec     . " " . GetDifferenceForYears($sec)       . " назад";
	}

	function GetDifferenceForYears($years){
		switch($years){
			case 1:
				$stringYears = "год";
				break;
			case 2:case 3:case 4:
				$stringYears = "года";
				break;
			default:
				$stringYears = "лет";
				break;
		}
		return $stringYears;
	}

	function GetDifferenceForMonths($months){
		switch($months){
			case 1:
				$stringMonths = "месяц";
				break;
			case 2:case 3:case 4:
				$stringMonths = "месяца";
				break;
			default:
				$stringMonths = "месяцев";
				break;
		}
		return $stringMonths;
	}

	function GetDifferenceForWeeks($weeks){
		if($weeks == 1)
			$stringWeeks = "неделя";
		else
			$stringWeeks = "недели";
		return $stringWeeks;
	}

	function GetDifferenceForDays($days){
		switch($days){
			case 1:case 21:
				$stringDays = "день";
				break;
			case 2:case 3:case 4:case 22:case 23:case 24:
				$stringDays = "дня";
				break;
			default:
				$stringDays = "дней";
				break;
		}
		return $stringDays;
	}

	function GetDifferenceForHours($hours){
		switch($hours){
			case 1:case 21:
				$stringHours = "час";
				break;
			case 2:case 3:case 4:case 22:case 23:
				$stringHours = "часа";
				break;
			default:
				$stringHours = "часов";
				break;
		}
		return $stringHours;
	}

	function GetDifferenceForMinutes($minutes){
		switch($minutes){
			case 1:case 21:case 31:case 41:case 51:
				$stringMinutes = "минуту";
				break;
			case 2:case 3:case 4:case 22:case 23:case 24:case 32:case 33:case 34:case 42:case 43:case 44:case 52:case 53:case 54:
				$stringMinutes = "минуты";
				break;
			default:
				$stringMinutes = "минут";
				break;
		}
		return $stringMinutes;
	}

	function GetDifferenceForSeconds($seconds){
		switch($seconds){
			case 1:case 21:case 31:case 41:case 51:
				$stringSeconds = "секунду";
				break;
			case 2:case 3:case 4:case 22:case 23:case 24:case 32:case 33:case 34:case 42:case 43:case 44:case 52:case 53:case 54:
				$stringSeconds = "секунды";
				break;
			default:
				$stringSeconds = "секунд";
				break;
		}
		return $stringSeconds;
	}	
}
/*---------------------------------------------*/

//GET IDs OF VIDEO
foreach($arResult["ITEMS"] as $arItem):
	if(
		preg_match("/(?:https?:\/\/)?(?:www\.)?youtu(?:be\.com\/watch\?(?:.*?&(?:amp;)?)?v=|\.be\/)([\w\-]+)(?:&(?:amp;)?[\w\?=]*)?/", 
		$arItem["PROPERTIES"]["SSYLKA_NA_YOUTUBE"]["VALUE"],
		$matches
	)):
	$ids[] = $matches[1];
	endif;
endforeach;

//GET API KEY
$apiKey = CIBlockElement::GetList(
	array(),
	array("ID"=>35, "ACTIVE"=>"Y"),
	false,
	false,
	array("ID", "IBLOCK_ID", "PROPERTY_API_KEY")
)->GetNext()["PROPERTY_API_KEY_VALUE"];

//GET VIDEO INFO
foreach($ids as $id){
	$json_result = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id={$id}&key={$apiKey}&part=snippet,contentDetails");
	$item        = json_decode($json_result, true);

	//publishedAt 
	$deltaSeconds = strtotime('now') - strtotime($item['items'][0]['snippet']['publishedAt']);
	$publishedAt  = GetDifferenceDateString($deltaSeconds);

	//duration
	$durationObj   = new DateInterval($item["items"][0]["contentDetails"]["duration"]);
	$durationInSec = $durationObj->days*86400+$durationObj->h*3600+$durationObj->i*60+$durationObj->s;
	$duration      = new DateTime('@'.$durationInSec);
	$format        = intdiv($durationInSec,3600) ? 'H:i:s' : 'i:s';
	
	$videos[] = array(
		"id"          =>$id,
		"deltaSeconds"=>$deltaSeconds,
		"title"       =>$item['items'][0]['snippet']['title'],
		"publishedAt" =>$publishedAt,
		"icon-URL"    =>$item['items'][0]['snippet']['thumbnails']['high']['url'],
		"duration"    =>$duration->format($format)
	);
}
usort($videos, function($a, $b){return $a["deltaSeconds"]<=>$b["deltaSeconds"];});?>
<div class="video-decor">YOUTUBE</div>
<div class="container">
	<div class="video-content">
		<div class="video-text">
			<div class="video-title title"><?=GetMessage('TITLE')?></div>
			<div class="video-description"><?=GetMessage('SUBTITLE')?></div>

			<div class="slider-kit">
				<div class="swiper-button-prev slider-button-prev video-button-prev"></div>
				<div class="swiper-button-next slider-button-next video-button-next"></div>
			</div>
		</div>

		<div class="swiper video-slider" id="video-slider">
			<div class="swiper-wrapper video-slider-wrapper">

				<?foreach($videos as $video):?>

					<div class="swiper-slide video-slider__item">
						<div class="video-slider__img-wrap">
							<div class="video-slider__img">
								<iframe
								    src="https://www.youtube.com/embed/<?=$video['id']?>"
								    srcdoc="<style>*{padding:0;margin:0;overflow:hidden}
								    html,body{height:100%}
								    img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}
								    span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}
								    </style>
								    <a href=https://www.youtube.com/embed/<?=$video['id']?>?autoplay=1>
								    <img src=<?=$video['icon-URL']?> alt='Demo video'>
								    <span>▶</span>
								    </a>"
								    frameborder="0"
								    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
								    allowfullscreen
								    title="Demo video">
								</iframe>
							</div>
						</div>
						<div class="video-slider__info">
							<div class="video-slider__length">
								<?=$video['duration']?>
							</div>
							<div class="video-slider__text">
								<div class="video-slider__title"><?=$video['title']?></div>
								<div class="video-slider__subtitle"><?=$video['publishedAt']?></div>
							</div>
						</div>
					</div>

				<?endforeach;?>

			</div>
			<div class="swiper-pagination slider-pagination video-pagination"></div>
		</div>
	</div>
</div>