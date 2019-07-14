<?php
//Массив для заполнение ассортимента
//image - путь картинки (Пример: /img/название картинки.расширение картинки)
//name - название коровы
//description - описание коровы

$cows = array(
    array(
    'image' => '/img/2.webp',
    'name' => 'Симментальская',
    'description' => 'Отличная порода двойного назначения с высокой продуктивностью молока и говядины у одного животного. Легко адаптируется к различным условиям кормления и управления. Производство молока от 7500 кг - 11 000 кг на лактацию;
низкое содержание соматических клеток;
высокое содержание полезных веществ в молоке (4,2% жира, 3,46% белка);
надёжная, плодовитая, с хорошей долговечностью;
короткий межотёльный период;
тепло- и холодоустойчива;
высокий убойный вес: до 500 кг у быков и до 400кг у коров.
высокие привесы у бычков на откорме около 1300 гр. в день.
убойный вес около 58%;
лёгкость отёлов и исключительно хороший материнский инстинкт.',
  ),
    array(
    'image' => '/img/4.webp',
    'name' => 'Бурая Швицкая',
    'description' => 'Крепкая молочная порода двойного назначения. Высокая молочная продуктивность и высокая содержание Каппа-Казеина Б, что является хорошей основой для производства сыров.

Среди отличительных функций телосложения: плодовитость, лёгкость отела (95% нормальных отёлов), здоровье вымени в сочетании с отличными оценками ног и конечностей.. Генетически обоснованная долговечность и высокая доля молодых животных, которые проводят свою молодость в Альпах, приводят к наибольшему проценту долголетия у коров.

Легко адаптируется к различным условиям кормления и управления.

Высокая молочная продуктивность от 7.500 кг до 11.000 кг. молока за лактацию;
Низкое содержание соматических клеток и хорошее здоровье вымени;
высокое содержание полезных веществ в молоке (4,15% Жир, 3,47% Белок);
высокая долговечность;
крепкие ноги и конечности;
устойчивость у тепловому стрессу.',
  ),
  );


//Массив для заполнение слайдера
//image - путь картинки (Пример: /img/название картинки.расширение картинки)
//name - название слайда
//description - описание слайда

$slides = array(
  array(
    'image' => '/img/shema1.png',
    'name' => '1. Оформление заявки',
    'description' => 'Вы можете позвонить нам по телефонам<br>+7 (499) 134-00-41, +7 (499) 134-00-51,<br>написать на otecgroup@gmail.com или оставить заявку на сайте, и мы оперативно ответим',
  ),
  array(
    'image' => '/img/shema2.png',
    'name' => '2. Подписание контракта и подготовка к отбору животных в Австрии',
    'description' => 'Мы поможем с получением шенгенских виз для Ваших отборщиков. Животные могут отбираться как непосредственно на австрийских фермах, так и на карантинных площадках, где уже собрано достаточное количество высококачественного скота для быстрого отбора',
  ),
  array(
    'image' => '/img/shema3.png',
    'name' => '3. Карантин',
    'description' => 'Отобранные Вами в Австрии животные ставятся на ветеринарный карантин под контролем ветслужб Австрии и России. В Австрию от российской стороны направляется: зоотехник для отбора животных (от фирмы-покупателя) и контроля племенных и ветеринарных документов, государственный ветеринарный врач на весь период прохождения карантина на австрийской территории. Затраты на пребывание российских специалистов (зоотехник и ветеринарный врач) входят в цену животных',
  ),
  array(
    'image' => '/img/shema4.png',
    'name' => '4. Доставка животных',
    'description' => 'После окончания карантина мы привозим животных непосредственно к Вам на ферму. Поголовье застраховано от гибели и от потери плода как в пути, так и в течение месяца после прибытия к Вам в хозяйство. <u>Стоимость страховки и доставки животных до карантинной фермы российского покупателя входит в цену животных</u>',
  ),
);



$msg_box = "";

if( isset( $_POST ) && !empty ( $_POST ) ){
  $errors = array();
  if($_POST['user_name'] == "")    $errors[] = "Поле 'Имя' не заполнено!";
  if($_POST['user_phone'] == "")   $errors[] = "Поле 'Телефон' не заполнено!";
  if($_POST['user_email'] == "")   $errors[] = "Поле 'E-mail' не заполнено!";
  if(empty($errors)){
    $message = "";
    $message .= "Имя: " . $_POST['user_name'] . "<br/>";
    $message .= "E-mail: " . $_POST['user_email'] . "<br/>";
    $message .= "Телефон: " . $_POST['user_phone'];
    send_mail($_POST['mailFrom'], $_POST['user_email'], $_POST['user_name'], 'Новый клиент', $message);
    $msg_box = "<span style='color: green;'>Сообщение успешно отправлено!</span>";
    $_POST['user_name'] = "";
    $_POST['user_phone'] = "";
    $_POST['user_email'] = "";
  }
  else{
    $msg_box = "<span style='color: red;'>$errors[0]</span><br/>";
  }
}

function send_mail($mail_to, $mail_from, $user_name, $subject, $message){
  $headers= "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=utf-8\r\n";
  $headers .= "From: ".$user_name." <".$mail_from.">\r\n";

  mail($mail_to, $subject, $message, $headers);
}







?>
<!DOCTYPE html>
	<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>ОТЭК</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="/fonts/stylesheet.css">
		<link rel="stylesheet" href="/libs/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="/libs/css/bootstrap.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="/libs/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="/libs/scrollbar/jquery.mCustomScrollbar.css" />
    <link rel="stylesheet" href="/css/main.css">
  </head>
  <body id="top">
    <style>
      .scroll-top {
        width: 70px;
        height: 70px;
        border-radius: 70px;
        position: fixed;
        right: 20px;
        bottom: 20px;
        z-index: 999;
        background: #ff9900;
        color: #FFFFFF;
        display: block;
        box-shadow: 0px 2px 10px rgba(34, 34, 34, 0.4);
      }
      .scroll-top:hover {
        color: #fff;
      }
    </style>
    <a href="#top" class="scroll-top">
			<div class="row justify-content-center" style="height: 100%">
				<div class="align-self-center">
					<i class="far fa-chevron-up"></i>
				</div>
			</div>
		</a>
    <!-- меню -->

    <div class="top_header">
      <div class="container">
          <div class="row">
            <nav class="col-6 col-lg-9 nav">
              <img src="/img/logo.png" alt="logo" style="margin-right: 40px;">
              <a href="#next" class="none_link">Главная</a>
              <a href="#cows" class="none_link">Ассортимент</a>
              <a href="#shema" class="none_link ">Схема работы</a>
              <a href="#about" class="none_link">О нас</a>
              <a href="#contact" class="none_link ">Контакты</a>
            </nav>
            <div class="col-6 col-lg-3 top_header_communication">
              <a href="tel:+74991340041" class="none_link"><h5>+7 (499) 134 00 41</h5></a>
<a href="tel:+74991340051" class="none_link"><h5>+7 (499) 134 00 51</h5></a>
              <a href="mailto:otecgroup@gmail.com"  class="none_link">otecgroup@gmail.com</a>
            </div>
        </div>
      </div>
    </div>

    <!-- шапка -->
    <div class="banner">
      <div class="container"style="height:100%">
        <div class="row"style="height:100%">
          <div class="col-xl-8 col-lg-10 align-self-center">
            <h1>Прямые поставки нетелей, телок, молодых бычков, бычков-производителей</h1>
            <p>Трехлетки и старше. Породы Симментальская и Бурая Швицкая из Австрии. Продажа от 30 голов&nbsp;</p>
            <a href="#contact" class="button_left">Оставить заявку</a>
          </div>
        </div>
      </div>
    </div>

    <div class="agilecountdown-timerwthree">
		<div class="countdown-timer-w3laits">
			<div class="container">

        <div class="row">
						<div class="mb-5 col-lg-4 mb-lg-0 col-sm-12 mb-sm-5 underhead">
							<h2>4</h2>
							<p>поколения<br>скотоводцев-поставщиков</p>
						</div>
						<div class="mb-5 col-lg-4 mb-lg-0 col-sm-12 mb-sm-5 underhead">
							<h2>25 000+</h2>
							<p>голов поставлено<br>клиентам</p>
						</div>
						<div class="mb-5 col-lg-4 mb-lg-0 col-sm-12 mb-sm-5 underhead" style="padding-left: 3em;">
							<h2>30+</h2>
							<p>стран мира с нашими<br>довольными покупателями</p>
						</div>
					</div>

			</div>
		</div>
	</div>

    <!-- преимущества -->
    <div class="advantage" id="next">
      <div class="container">
          <div class="cards">
							<div class="card">
								<img src="img/cow.svg" alt="">
								  <div class="info">
                    <h5>Прямые поставки от европейского поставщика</h5>
                    <p>Гарантия низкой цены и быстрой доставки</p>
								  </div>
							</div>

							<div class="card">
                <img src="img/doctor.svg" alt="">
                  <div class="info">
                    <h5>Строжайший контроль</h5>
                    <p>Все животные проходят необходимые карантинные мероприятия и обработки, свободны от опасных вирусов</p>
                  </div>
							</div>

							<div class="card">
                <img src="img/dna.svg" alt="">
                  <div class="info">
                    <h5>Лидирующая европейская генетика</h5>
                    <p>Для высокой молочной продуктивности и эффективного производства сыров</p>
                  </div>
							</div>

              <div class="card">
                <img src="img/cup.svg" alt="">
                  <div class="info">
                    <h5>Победитель породы в России</h5>
                    <p>Потомство Симменталов, поставленных ОТЭК из Австрии в адрес одного российского сельхозпредприятия, было признано самым продуктивным по молоку по породе в России</p>
                  </div>
							</div>
            </div>
          </div>
        </div>
    </div>

    <!-- ассортимент -->
    <div class="assortiment" id="cows">
      <div class="container">
        <h2 class="text-center" style="margin: 1rem;">Породы КРС</h2>
        <p class="text-center">Поставки из-за рубежа нетелей и телок.Симментальская и Бурая<br>Швицкая из Австрии. По вашему запросу можем привезти другие<br>породы КРС</p>
        <div class="cards_cow">
          <?php foreach( $cows as $cow ): ?>
          <div class="item_cow">
            <div class="img_text">
              <img src="<?= $cow['image'] ?>" alt="">
            </div>
            <div class="popup_msg" data-mcs-theme="minimal-dark">
              <h5><?= $cow['name'] ?></h5>
              <p><?= $cow['description'] ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Слайдер -->
    <div class="slider_section" id="shema">
      <div class="container">
          <h2 class="text-center" style="margin: 1rem;">Схема работы</h2>
        <p class="text-center" style="margin-bottom: 3em;">Этапы оформления заказа</p>
        <!-- Swiper -->
        <div class="shema">
            <?php for($i =0; $i<count($slides);$i++){ ?>
              <div class="row" style="border: solid #ff9900 1px;margin:0;">
                  <div  style="display:flex;width:100%;">
                    <div style="display:flex;">
                      <img src="<?= $slides[$i]['image'] ?>" alt="">
                    </div>
                    <div class="slide_text">
                      <h5><?= $slides[$i]['name'] ?></h5>
                      <p><?= $slides[$i]['description'] ?></p>
                      <?php if($i == 0){ ?>
                      <a href="#contact" class="button_left" style="width:100%;text-align:center;margin-top:1em;">Оставить заявку</a>
                    <?php } ?>
                    </div>
                  </div>
                  </div>
            <?php } ?>
          </div>
        </div>
        </div>

      </div>
    </div>

    <!--О нас -->
    <div class="info_about">
      <div class="container"style="height:100%">
        <div class="info_text">
          <h2>О нас</h2>
          <p>Компания "ОТЭК" занимается поставками<br>высококачественного племенного скота с 2006 г. За это время<br>нашими усилиями были поставлены в РФ тысячи<br>высокопродуктивных животных, обеспечивших своим новым<br>владельцам статус племенных хозяйств, высокие надои<br>и прибыль, а также основу для создания и дальнейшего<br>увеличения своего племенного стада.</p>
        </div>
      </div>
    </div>

    <!--Контактная информация -->

    <div class="contact" id="contact">
      <div class="container">
					<div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-6 col-sm-12 mt-5 mt-lg-0">
							<h2>Контакты</h2>
							<p>Если у вас возникли вопросы, вы можете написать нам сообщение на почту и мы обязательно на него ответим, а также можете позвонить по телефону с 12:00 по 21:00.</p>
							<p style="font-weight:600"><i class="far fa-envelope"></i>otecgroup@gmail.com</p>
							<p style="font-weight:600"><i class="far fa-phone"></i>+7 (499) 134 00 41</p>
<p style="font-weight:600"><i class="far fa-phone"></i>+7 (499) 134 00 51</p>
						</div>
            <div class="col-lg-6 col-sm-12">
							<form action="/" method="POST">
                <input type="hidden" name="mailFrom" value="suvorix@yandex.ru">
                <h2 style="font-weight:400;">Оформление заявки</h2>
                <label class="input_box">
                  <i class="far fa-user accent-color input_item_image"></i>
                  <input type="text" name="user_name" requred value="<?= $_POST['user_name'] ?>" class="input" placeholder="Имя">
                </label>
                <label class="input_box">
                  <i class="far fa-phone accent-color input_item_image"></i>
                  <input type="text" name="user_phone" requred value="<?= $_POST['user_phone'] ?>" class="input" placeholder="Телефон">
                </label>
                <label class="input_box">
                  <i class="far fa-at accent-color input_item_image"></i>
                  <input type="email" name="user_email" requred value="<?= $_POST['user_email'] ?>" class="input" placeholder="E-mail">
                </label>
                <button class="button_about" style="border: none;">Отправить</button>
                <?= $msg_box; ?>
              </form>
						</div>
          </div>
      </div>
    </div>

    <!--подвал -->
    <div class="footer">
      <div class="container">
          <div class="row">
            <nav class="col-9 nav">
              <img src="img/logo.png" alt="logo" style="margin-right: 40px;">
              <a href="#" class="footer_none_link">Главная</a>
              <a href="#" class="footer_none_link">Ассортимент</a>
              <a href="#" class="footer_none_link">Схема работы</a>
              <a href="#" class="footer_none_link ">О нас</a>
              <a href="#" class="footer_none_link ">Контакты</a>
            </nav>
            <div class="col-3 footer_communication">
              <a href="tel:+74991340041" class="footer_none_link"><h5>+7 (499) 134 00 41</h5></a>
<a href="tel:+74991340051" class="footer_none_link"><h5>+7 (499) 134 00 51</h5></a>
              <a href="mailto:otecgroup@gmail.com"  class="footer_none_link">otecgroup@gmail.com</a>
            </div>
        </div>
      </div>
    </div>

    <script src="/libs/jquery.min.js"></script>
    <script src="/libs/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
      (function($){
          $(window).on("load",function(){
              $(".popup_msg").mCustomScrollbar();
              $(".popup_msg").mouseleave(function(){
                $(this).mCustomScrollbar("scrollTo",0);
              });
          });
      })(jQuery);
      $(function(){
        $('a[href*=#]').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var $target = $(this.hash);
            $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
            if ($target.length) {
              var targetOffset = $target.offset().top;
              $('html,body').animate({scrollTop: targetOffset}, 500);//скорость прокрутки
              return false;
            }
          }
        });
      });
    </script>
    <script src="/libs/swiper/js/swiper.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper('.swiper-container', {
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    </script>
  </body>
<html>
