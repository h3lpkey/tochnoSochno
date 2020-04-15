<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/app.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=121cc8e0-79c6-4386-bf51-3c1b78a1e585" type="text/javascript"></script>
  <title>Laravel</title>
</head>

<body>
  <div id="app">
    <section class="section section-head" id="section-head">
      <div class="wrapper">
        <div class="header-reaplcer" v-show="replacer || showMenu"></div>
        <div class="header" v-bind:class="{ 'header-fixed': replacer || showMenu, 'header-opened': showMenu }" v-scroll="handleScroll">
          <div class="menu-btn" @click="showMenu = !showMenu">
            <img src="images/menu.svg" alt="">
          </div>
          <div class="logo">
            <img src="images/logo-cirlce.svg" alt="logo" />
          </div>
          <nav class="menu" v-bind:class="{ 'menu-mobile': showMenu }">
            <a href="#section-menu">меню</a>
            <a href="#section-deliver">доставка</a>
            <a href="#section-foodtrack">фудтрак</a>
            <a href="#section-cashback">кэшбек</a>
            <a href="#section-contacts">контакты</a>
          </nav>
          <a href="#" class="instagram">
            <img src="images/instagram.svg" alt="" />
            <p>instagram</p>
          </a>
          <div class="phone phone-mobile">
            <a href="tel:+73432195888">+7 (343) 219-58-88</a>
          </div>
        </div>
        <div class="big-logo"><img src="images/logo.svg" alt="" /></div>
        <div class="header-btn">
          <p>Заказать</p>
        </div>
        <div class="bottom-buttons">
          <div class="city">
            <img src="images/point.svg" alt="" />
            <p>екатеринбург</p>
          </div>
          <a href="#section-menu"><img src="images/bottom_btn.svg" alt="" /></a>
          <a href="#" class="instagram">
            <p>instagram</p>
            <img src="images/instagram.svg" alt="" />
          </a>
        </div>
      </div>
    </section>
    <section class="section section-highlight" id="section-highlight">
      <div class="wrapper">
        <ul class="list">
          <li class="list-item">
            <img class="list-item_img" src="images/01.png" alt="всегда свежее мясо" />
            <p class="list-item_text">всегда свежее мясо</p>
          </li>
          <li class="list-item">
            <img class="list-item_img" src="images/02.png" alt="готовим на углях" />
            <p class="list-item_text">готовим на углях</p>
          </li>
          <li class="list-item">
            <img class="list-item_img" src="images/03.png" alt="удобство заказа" />
            <p class="list-item_text">удобство заказа</p>
          </li>
          <li class="list-item">
            <img class="list-item_img" src="images/04.png" alt="выездное обслуживание" />
            <p class="list-item_text">выездное обслуживание</p>
          </li>
          <li class="list-item">
            <img class="list-item_img" src="images/05.png" alt="привелегии для гостей" />
            <p class="list-item_text">привелегии для гостей</p>
          </li>
        </ul>
      </div>
    </section>
    <section class="section section-menu" id="section-menu">
      <div class="wrapper">
        <h1 class="title">меню</h1>
        <p class="text">
          Основа нашего меню — это блюда, приготовленные на угле Попробуй наши
          блюда, приготовленные мастерами своего дела
        </p>
        <div class="menu-select">
          <div class="item" v-for="type in types" @click="selectedType = type" :class="{ 'item-active': selectedType == type }">@{{type}}</div>
        </div>
        <p class="menu-text">
          Подается в лаваше, в пшеничной лепешке или в открытом виде
        </p>
        <div class="menu-wrapper owl-carousel owl-theme" :dots="false" v-for="(menu, index) in menus" v-show="menu.name === selectedType">
          <div class="menu-background" v-for="(item, index) in menu.recipies" :key="item.name">
            <div class="menu-item">
              <img class="menu-item-img" :src="item.image" :alt="item.title" />
              <p class="menu-item-title">@{{item.title}}</p>
              <p class="menu-item-text">@{{item.text}}</p>
              <p class="menu-item-weight">@{{item.weight}}</p>
              <p class="menu-item-price">@{{item.price}}</p>
            </div>
          </div>
        </div>
        <div class="btn-wrapper btn-wrapper__alw">
          <button>перейти к заказу</button>
        </div>
      </div>
    </section>
    <section class="section section-deliver" id="section-deliver">
      <div class="wrapper">
        <div class="deliver-wrapper">
          <h1 class="title">Доставка</h1>
          <p class="text">
            Быстрые ребята из «Яндекс.Еды» и «DeliveryClub» доставят наши вкусные блюда и освежающие напитки к тебе домой или на работу
          </p>
          <div class="deliver-buttons">
            <div class="btn-wrapper btn-wrapper__out">
              <button>яндекс еда</button>
            </div>
            <div class="btn-wrapper btn-wrapper__out">
              <button>delivery club</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section section-foodtrack" id="section-foodtrack">
      <div class="wrapper">
        <div class="foodtrack-wrapper">
          <h1 class="title">фудтрак</h1>
          <p class="text">
            Намечается вечеринка, массовый досуг или шабаш на берегу озера?
            Кухня на колесах способна готовить любые блюда из нашего меню, в
            любом месте и в любое время
          </p>
          <div class="foodtrack-inputs">
            <input class="input" type="text" v-model="emailName" placeholder="Ваше имя" />
            <input class="input" type="text" v-model="emailSubject" placeholder="Тема мероприятия" />
            <input class="input" type="text" v-model="emailEmail" placeholder="Email" />
            <input class="input" type="text" v-model="emailPhone" placeholder="Телефон" />
            <div class="btn-wrapper btn-wrapper__alw" @click="sendEmail">
              <button>отправить заявку</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section section-cashback" id="section-cashback">
      <div class="wrapper">
        <h1 class="title">кэшбек</h1>
        <div class="cashback-wrapper-list">
          <ul class="list-first">
            <li class="list-item">
              <span class="list-item_number">1.</span>
              <div class="list-item_shadow"></div>
              заполни анкету
              <div class="arrow_orange"></div>
            </li>
            <li class="list-item">
              <span class="list-item_number">2.</span>
              <div class="list-item_shadow"></div>
              подтверди свой номер телефона
              <div class="arrow_orange"></div>
            </li>
            <li class="list-item">
              <span class="list-item_number">3.</span>
              <div class="list-item_shadow"></div>
              Подпишись на наш инстаграм
              <div class="arrow_orange"></div>
            </li>
            <li class="list-item">
              <span class="list-item_number">4.</span>
              <div class="list-item_shadow"></div>
              Получи карту
            </li>
          </ul>
          <ul class="list-second">
            <div class="wrapper-background">
              <li class="list-item">
                <div class="icon"></div>
                <div class="list-item_shadow"></div>
                7% кэшбек на первую покупку
              </li>
              <li class="list-item">
                <div class="icon"></div>
                <div class="list-item_shadow"></div>
                3% кэшбек на все покупки
              </li>
              <li class="list-item">
                <div class="icon"></div>
                <div class="list-item_shadow"></div>
                300 баллов в день рождения
              </li>
            </div>
          </ul>
        </div>
        <div class="btn-wrapper btn-wrapper__alw">
          <button>отправить заявку</button>
        </div>
        <div class="img-wrapper"><img src="images/cash-card.png" alt="" /></div>
      </div>
    </section>
    <section class="section section-contacts" id="section-contacts">
      <div class="wrapper">
        <h1 class="title">контакты</h1>
        <div class="contact-wrapper">
          <div class="contacts">
            <h3 class="title-contact">наши адреса:</h3>
            <div class="select-wrapper" @click="showAddressBox = !showAddressBox">
              <div class="select">
                <p class="text">@{{currentAddress}}</p>
                <img src="images/arrow__down.svg" alt="" />
              </div>
              <div class="select-drop" v-show="showAddressBox" v-for="address in addresses">
                <p class="select-drop_item" @click="setAddress(address)">
                  @{{address.short}}
                </p>
              </div>
            </div>
            <p class="address">
              г. Екатеринбург @{{address_short}}
            </p>
            <p class="time-title">Часы работы:</p>
            <p class="time-text">
              @{{address_time}}
            </p>
          </div>
          <div class="map-wrapper">
            <div id="map"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="section section-footer">
      <div class="wrapper">
        <div class="footer-wrapper">
          <img class="logo-footer" src="images/logo-cirlce.svg" alt="logo" />
          <nav class="footer-menu">
            <a href="#section-menu">меню</a>
            <a href="#section-deliver">доставка</a>
            <a href="#section-foodtrack">фудтрак</a>
            <a href="#section-cashback">кэшбек</a>
            <a href="#section-contacts">контакты</a>
          </nav>
          <nav class="footer-links">
            <a href="#">пользовательское соглашение</a>
            <a href="#">сотрудничество</a>
            <a href="#">обратная связь</a>
          </nav>
          <div class="footer-btns">
            <div class="scroll-top">
              <a href="#section-head"><img src="images/bottom_btn.svg" alt="" /></a>
            </div>
            <a class="footer-phone" href="tel:+73432195888">+7 (343) 219-58-88</a>
            <a href="#" class="instagram">
              <p>instagram</p>
              <img src="images/instagram__red.svg" alt="" />
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="/js/app.js"></script>
</body>

</html>