<?

$banner = CIBlockElement::GetList(
	array("SORT"=>"ASC"),
	array("ID"=>getID(13, 250, 267), "ACTIVE"=>"Y"),
	false,
	false,
	array(
		"ID", 
		"IBLOCK_ID",
		"PROPERTY_LOGO",
		"PROPERTY_KONTAKTY",
		"PROPERTY_SSYLKA_NA_YOUTUBE",
		"PROPERTY_YOUTUBE_IKONKA",
		"PROPERTY_SSYLKA_NA_INSTAGRAM",
		"PROPERTY_INSTAGRAM_IKONKA",
		"PROPERTY_SSYLKA_NA_LINKEDIN",
		"PROPERTY_LINKEDIN_IKONKA",
		"PROPERTY_NAZVANIE_KOMPANII"
	)
)->GetNext();

$contact = CIBlockElement::GetList(
	array("SORT"=>"ASC"),
	array("ID"=>$banner["PROPERTY_KONTAKTY_VALUE"], "ACTIVE"=>"Y"),
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

</main>

	<footer class="footer">
		<div class="container">
			<div class="footer-content">
				<a href="<?=LANGUAGE_DIR?>/" class="footer-logo">
					<img src="<?=CFile::GetPath($banner["PROPERTY_LOGO_VALUE"])?>" alt="Изготовление и застройка выставочных стендов">
				</a>

				<?$APPLICATION->IncludeComponent(
					"bitrix:menu",
					"footer",
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

				<a href="<?=LANGUAGE_DIR?>/kontakty/#feedback-form" class="footer-btn btn"><?=GetMessage("SEND_REQUEST")?></a>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom__content">
					<div class="footer-social">
						<a href="<?=$banner["PROPERTY_SSYLKA_NA_YOUTUBE_VALUE"]?>" class="footer-social__item" target="_blank">
							<img src="<?=CFile::GetPath($banner["PROPERTY_YOUTUBE_IKONKA_VALUE"])?>" alt="">
						</a>
						<a href="<?=$banner["PROPERTY_SSYLKA_NA_INSTAGRAM_VALUE"]?>" class="footer-social__item" target="_blank">
							<img src="<?=CFile::GetPath($banner["PROPERTY_INSTAGRAM_IKONKA_VALUE"])?>" alt="">
						</a>

						<?if($banner["PROPERTY_SSYLKA_NA_LINKEDIN_VALUE"]):?>

							<a href="<?= $banner["PROPERTY_SSYLKA_NA_LINKEDIN_VALUE"]?>" class="footer-social__item" target="_blank">
								<img src="<?= CFile::GetPath($banner["PROPERTY_LINKEDIN_IKONKA_VALUE"]) ?>" alt="">
							</a>

						<?endif;?>
					</div>

					<div class="footer-info">
						<ul class="footer-info__block">
							<li class="footer-info__item"><?=$banner["PROPERTY_NAZVANIE_KOMPANII_VALUE"]?></li>
							<li class="footer-info__item"><?=$contact["~PROPERTY_ADRES_VALUE"]["TEXT"]?></li>
						</ul>

						<ul class="footer-info__block">
							<li class="footer-info__item">
								<a href="tel:<?= preg_replace('/[\D]/', "", $contact["PROPERTY_TELEFON_VALUE"])?>" class="footer-phone"><?=$contact["PROPERTY_TELEFON_VALUE"]?></a>
							</li>
							
							<li class="footer-info__item">
								<a href="mailto:<?=$contact["PROPERTY_POCHTA_VALUE"]?>" class="footer-email"><?=$contact["PROPERTY_POCHTA_VALUE"]?></a>
								<?if(LANGUAGE_ID==="ru"):?>
									<br>Эксклюзивные выставочные стенды - дизайн и производство
								<?endif;?>
							</li>

						</ul>
					</div>

					<a href="https://requestdesign.ru/" class="footer-copy">
						<div class="footer-copy__text">
							<div class="footer-copy__suptitle">Design & Dev by</div>
							<div class="footer-copy__title"><span>Request</span> Design</div>
						</div>
						<div class="footer-copy__img">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/copy.svg" alt="">
						</div>
					</a>
				</div>
			</div>
		</div>
	</footer>
	
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-3.5.1.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/swiper-bundle.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.maskedinput.js"></script> 
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.fancybox.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/main.js?<?=time()?>"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/ajax.js?<?=time()?>"></script>
	<?if(($APPLICATION->GetCurDir()==="/en/kontakty/" || $APPLICATION->GetCurDir()==="/kontakty/")&&(SITE_DOMAIN!=="insightexpo.ae")):
		$key = CIBlockElement::GetList(
			array("SORT"=>"ASC"),
			array("ID"=>265, "ACTIVE"=>"Y"),
			false,
			false,
			array("ID", "IBLOCK_ID", "PROPERTY_API_KEY")
		)->GetNext();
		switch(LANGUAGE_ID){
			case "en":
				$idCoords=257;
				break;
			case "ru":
				$idCoords=27;
				break;
			default:
				die();
		}
		$coords = CIBlockElement::GetList(
			array("SORT"=>"ASC"),
			array("ID"=>$idCoords, "ACTIVE"=>"Y"),
			false,
			false,
			array("ID", "IBLOCK_ID", "PROPERTY_ADRES", "PROPERTY_ADRES_TEKST")
		)->GetNext();

	?>
	<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<?=$key["PROPERTY_API_KEY_VALUE"]?>" type="text/javascript"></script>
	<script>
		ymaps.ready(function () {
			var myMap = new ymaps.Map('map', {
					center: [<?=$coords["PROPERTY_ADRES_VALUE"]["TEXT"]?>],
					zoom: 17,
					controls: []
				}, {
					searchControlProvider: 'yandex#search'
				}),

				MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
					'<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
				),

				myPlacemark = new ymaps.Placemark([<?=$coords["PROPERTY_ADRES_VALUE"]["TEXT"]?>], {
					hintContent: '<?=$coords["PROPERTY_ADRES_TEKST_VALUE"]?>',
					balloonContent: 'Это красивая метка'
				}, {
					iconLayout: 'default#image',
					iconImageHref: '<?=SITE_TEMPLATE_PATH?>/img/mark.png',
					iconImageSize: [128, 128],
					// Смещение левого верхнего угла иконки относительно
					// её "ножки" (точки привязки).
					iconImageOffset: [-64, -128]
				});

			myMap.geoObjects
				.add(myPlacemark),
				myMap.behaviors.disable('scrollZoom');
		});
	</script>
	<?endif;?>
	<?if(SITE_DOMAIN==="insightexpo.com"):?>
		<!-- Yandex.Metrika counter -->
		<script type="text/javascript" >
		   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
		   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
		   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

		   ym(88942341, "init", {
		        clickmap:true,
		        trackLinks:true,
		        accurateTrackBounce:true,
		        webvisor:true
		   });
		</script>
		<noscript><div><img src="https://mc.yandex.ru/watch/88942341" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
		<!-- /Yandex.Metrika counter -->
<!-- Yandex.Metrika counter -->
<script>
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(87749423, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>

<!-- /Yandex.Metrika counter -->
	<?endif;?>

</body>
</html>