<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\modules\graduation\assets\AppAsset;
use common\models\Subdomen;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" prefix="og: http://ogp.me/ns#">

<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" type="image/x-icon" href="/favicon.ico">

	<link rel="apple-touch-icon" sizes="180x180" href="/image/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/image/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/image/favicons/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/image/favicons/safari-pinned-tab.svg" color="#004171">
	<meta name="theme-color" content="#ffffff">
	<meta name="msapplication-config" content="/browserconfig.xml" />

	<title><?php echo $this->title ?></title>

	<?php if (Yii::$app->params['noindex_global'] === true) {
		echo '<meta name="robots" content="noindex" />';
	} ?>
	<?php if (!empty($this->params['desc'])) echo "<meta name='description' content='" . $this->params['desc'] . "'>"; ?>
	<?php if (!empty($this->params['kw'])) echo "<meta name='keywords' content='" . $this->params['kw'] . "'>"; ?>
	<?php // if (isset($this->params['robots']) and $this->params['robots']) echo '<meta name="robots" content="noindex, nofollow"/>'; 
	?>

	<meta property="og:title" content="<?php echo $this->title ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="<?php if (!empty($this->params['desc'])) echo $this->params['desc']; ?>" />
	<meta property="og:url" content="<?php
												$link = explode('?', Yii::$app->request->absoluteUrl);
												$link = count($link) > 0 ? $link[0] : Yii::$app->request->absoluteUrl;
												echo $link;
												?>" />
	<meta property="og:site_name" content="???????????? ???????????????? ?????? ???????????????????? ????????????" />
	<?php $this->head() ?>

	<?= Html::csrfMetaTags() ?>

	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-MZXPPH3');
	</script>
	<!-- End Google Tag Manager -->

</head>

<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MZXPPH3" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function(m, e, t, r, i, k, a) {
			m[i] = m[i] || function() {
				(m[i].a = m[i].a || []).push(arguments)
			};
			m[i].l = 1 * new Date();
			k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
		})
		(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

		ym(86538649, "init", {
			clickmap: true,
			trackLinks: true,
			accurateTrackBounce: true,
			webvisor: true
		});
	</script>
	<noscript>
		<div><img src="https://mc.yandex.ru/watch/86538649" style="position:absolute; left:-9999px;" alt="" /></div>
	</noscript>
	<!-- /Yandex.Metrika counter -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-213343974-1');
	</script>
	<!-- /Global site tag (gtag.js) - Google Analytics -->
	<?php $this->beginBody() ?>

	<div class="main_wrap" data-city-id="<?= Yii::$app->params['subdomen_id'] ?>">

		<header>
			<div class="header_wrap">

				<div class="header_menu">

					<a href="/" class="header_logo">

						<div class="header_logo_img"></div>
						<div class="header_logo_text">

							<div>?????????????????? <?= Yii::$app->params['cur_year'] ?></div>
							<div>???????????? ???????????????? ?????? ???????????????????? ????????????</div>

						</div>

					</a>

					<div class="city_select_search_wrapper _hide">

						<!-- <p class="back_to_header_menu">?????????? ?? ????????</p>

						<h4>???????????????? ??????????</h4> -->

						<p class="back_to_header_menu">
							<span>?????????? ?? ????????</span>
						</p>

						<p class="city_select_title">???????????????? ??????????</p>

						<?php /*<div class="input_search_wrapper">

                            <input type="search" placeholder="???????????????? ????????????">

                        </div> */ ?>

						<div class="city_name_input">
							<input type="text" placeholder="???????????????? ????????????">
						</div>

						<div class="city_select_list">

							<?php
							$subdomen_list = Subdomen::find()
								->where(['active' => 1])
								->orderBy(['name' => SORT_ASC])
								->all();

							function createCityNameLine($city)
							{
								if ($city->alias) {
									if (
										$city->alias == 'krasnodar' ||
										$city->alias == 'speterburg' ||
										$city->alias == 'samara' ||
										$city->alias == 'kazan' ||
										$city->alias == 'ekaterinburg' ||
										$city->alias == 'ufa' ||
										$city->alias == 'rostovnadonu' ||
										$city->alias == 'nnovgorod'
									) {
										$newLine = "<p><a class='city_name _bold' href='https://$city->alias.vypusknoy-vecher.ru'>$city->name</a></p>";
									} else {
										$newLine = "<p><a class='city_name' href='https://$city->alias.vypusknoy-vecher.ru'>$city->name</a></p>";
									}
								} else {
									$newLine = "<p><a class='city_name _bold' href='https://vypusknoy-vecher.ru'>$city->name</a></p>";
								}
								return $newLine;
							}

							function createLetterBlock($letter)
							{
								$newBlock = "<div class='city_select_letter_block' data-first-letter=$letter><span class='capital_letter'>$letter</span>";
								return $newBlock;
							}

							function createCityList($subdomen_list)
							{
								$citiesListResult = "";
								$currentLetterBlock = "";

								foreach ($subdomen_list as $key => $subdomen) {
									$currentFirstLetter = substr($subdomen->name, 0, 2);
									if ($currentFirstLetter !== $currentLetterBlock) {
										$currentLetterBlock = $currentFirstLetter;
										$citiesListResult .= "</div>";
										$citiesListResult .= createLetterBlock($currentLetterBlock);
										$citiesListResult .= createCityNameLine($subdomen);
									} else {
										$citiesListResult .= createCityNameLine($subdomen);
									}
								}

								$citiesListResult .= "</div>";
								echo substr($citiesListResult, 6);
							}

							createCityList($subdomen_list);
							?>

						</div>
					</div>

					<div class="header_menu_wrapper">
						<a class="header_menu_item <? if (!empty($this->params['menu']) and $this->params['menu'] == 'banquet-hall') echo '_active'; ?>" href="/catalog/banquet-hall/">??????????????????&ensp; ????????</a>
						<a class="header_menu_item <? if (!empty($this->params['menu']) and $this->params['menu'] == 'restaurant') echo '_active'; ?>" href="/catalog/restaurant/">??????????????????</a>
						<a class="header_menu_item <? if (!empty($this->params['menu']) and $this->params['menu'] == '11-grade') echo '_active'; ?>" href="/catalog/11-grade/">11 ??????????</a>
						<a class="header_menu_item <? if (!empty($this->params['menu']) and $this->params['menu'] == '9-grade') echo '_active'; ?>" href="/catalog/9-grade/">9 ??????????</a>
						<a class="header_menu_item <? if (!empty($this->params['menu']) and $this->params['menu'] == 'blog') echo '_active'; ?>" href="https://vypusknoy-vecher.ru/ideas/">???????? ?????? ????????????????????</a>
					</div>

					<div class="header_callback_button">
						<p>?????????????????? ??????</p>
					</div>

					<div class="header_phone">
						<?php if (!isset(Yii::$app->params['premium_rest'])) : ?>
							<a href="tel:<?= Yii::$app->params['subdomen_phone'] ?>" data-action="click_number"><?= Yii::$app->params['subdomen_phone_pretty'] ?></a>
						<?php endif; ?>

						<div class="header_city_select _grey_link">
							<span><?= Yii::$app->params['subdomen_name'] ?></span>
						</div>
					</div>

					<div class="header_burger">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</div>

				<div class="comments" style="display: none;"></div>

				<div class="header_form_popup _hide">
					<div class="content_block form_booking_wrapper">

						{{ this.render('//components/generic/form_booking1.twig', {'items':other_rooms}) | raw }}

					</div>
				</div>

			</div>
		</header>

		<div class="content_wrap">
			<?= $content ?>
		</div>

		<footer>
			<div class="footer_container">
				<div class="footer_wrap">
					<div class="footer_row">
						<div class="footer_block _left">
							<?php if (!isset(Yii::$app->params['premium_rest'])) : ?>
								<div class="footer_phone">
									<a href="tel:<?= Yii::$app->params['subdomen_phone'] ?>" data-action="click_number"><?= Yii::$app->params['subdomen_phone_pretty'] ?></a>
								</div>
							<?php endif; ?>
							<div class="footer_callback_button">
								<p>?????????????????? ?????? ?? <?= Yii::$app->params['subdomen_dec'] ?></p>
							</div>
						</div>
						<div class="footer_block _right">
							<div class="footer_logo"></div>
							<div class="footer_block_logo_text">
								<div>?????????????????? <?= Yii::$app->params['cur_year'] ?></div>
								<div>???????????? ???????????????? ?????? ???????????????????? ????????????</div>
							</div>
							<div class="footer_block_copyright">
								<span>?? ?????????????????? <?= Yii::$app->params['cur_year_real'] ?></span>
								<a href="/privacy-policy/" class="footer_pc _link">
									<p>???????????????? ????????????????????????????????????</p>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<div class="nav_arrows">
			<div id="go_top" class="nav_arrow nav_arrow_up">
				<img src="/image/arrow_up.svg">
			</div>
			<div id="go_down" class="nav_arrow nav_arrow_down">
				<img src="/image/arrow_up.svg">
			</div>
		</div>

	</div>

	<?php $this->endBody() ?>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&amp;display=swap&amp;subset=cyrillic" rel="stylesheet">
</body>

</html>
<?php $this->endPage() ?>