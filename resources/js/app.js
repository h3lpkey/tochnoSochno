import "./bootstrap";
import "owl.carousel";

window.Vue = require("vue");

const menu = [
  {
    image: "images/menu1.jpg",
    title: "кукаб",
    type: "кукаб",
    text:
      "Куриное филе жарим на углях, добавляем маринованный лук с пряной морковкой, перцем халапеньо, картофелем барбекю и томатным соусом.",
    weight: "130/100/100/80 гр",
    price: "210 РУБ",
  },
  {
    image: "images/menu1.jpg",
    title: "шашлык",
    type: "шашлык",
    text:
      "Куриное филе жарим на углях, добавляем маринованный лук с пряной морковкой, перцем халапеньо, картофелем барбекю и томатным соусом.",
    weight: "130/100/100/80 гр",
    price: "210 РУБ",
  },
  {
    image: "images/menu1.jpg",
    title: "шашлык",
    type: "шашлык",
    text:
      "Куриное филе жарим на углях, добавляем маринованный лук с пряной морковкой, перцем халапеньо, картофелем барбекю и томатным соусом.",
    weight: "130/100/100/80 гр",
    price: "210 РУБ",
  },
  {
    image: "images/menu1.jpg",
    title: "шашлык",
    type: "шашлык",
    text:
      "Куриное филе жарим на углях, добавляем маринованный лук с пряной морковкой, перцем халапеньо, картофелем барбекю и томатным соусом.",
    weight: "130/100/100/80 гр",
    price: "210 РУБ",
  },
  {
    image: "images/menu1.jpg",
    title: "шашлык",
    type: "шашлык",
    text:
      "Куриное филе жарим на углях, добавляем маринованный лук с пряной морковкой, перцем халапеньо, картофелем барбекю и томатным соусом.",
    weight: "130/100/100/80 гр",
    price: "210 РУБ",
  },
  {
    image: "images/menu1.jpg",
    title: "bbq",
    type: "bbq",
    text:
      "Куриное филе жарим на углях, добавляем маринованный лук с пряной морковкой, перцем халапеньо, картофелем барбекю и томатным соусом.",
    weight: "130/100/100/80 гр",
    price: "210 РУБ",
  },
  {
    image: "images/menu1.jpg",
    title: "bbq",
    type: "bbq",
    text:
      "Куриное филе жарим на углях, добавляем маринованный лук с пряной морковкой, перцем халапеньо, картофелем барбекю и томатным соусом.",
    weight: "130/100/100/80 гр",
    price: "210 РУБ",
  },
  {
    image: "images/menu1.jpg",
    title: "бургеры",
    type: "бургеры",
    text:
      "Куриное филе жарим на углях, добавляем маринованный лук с пряной морковкой, перцем халапеньо, картофелем барбекю и томатным соусом.",
    weight: "130/100/100/80 гр",
    price: "210 РУБ",
  },
  {
    image: "images/menu1.jpg",
    title: "бургеры",
    type: "бургеры",
    text:
      "Куриное филе жарим на углях, добавляем маринованный лук с пряной морковкой, перцем халапеньо, картофелем барбекю и томатным соусом.",
    weight: "130/100/100/80 гр",
    price: "210 РУБ",
  },
  {
    image: "images/menu1.jpg",
    title: "бургеры",
    type: "бургеры",
    text:
      "Куриное филе жарим на углях, добавляем маринованный лук с пряной морковкой, перцем халапеньо, картофелем барбекю и томатным соусом.",
    weight: "130/100/100/80 гр",
    price: "210 РУБ",
  },
];

let yamap;

Vue.directive("scroll", {
  inserted: function (el, binding) {
    let f = function (evt) {
      if (binding.value(evt, el)) {
        window.removeEventListener("scroll", f);
      }
    };
    window.addEventListener("scroll", f);
  },
});

const app = new Vue({
  el: "#app",
  data: {
    showAddressBox: false,
    currentAddress: "",
    menu: menu,
    selectedType: "шашлык",
    types: [],
    menus: [],
    address_short: "",
    address_long: "",
    address_time: "",
    map: {},
    addresses: [
      {
        center: [56.84295, 60.698256],
        short: "ТЦ КОР",
        long: "ТЦ КОР",
        time: "ПН-ВС 9:00 - 22:00",
      },
      {
        center: [56.816341, 60.585913],
        short: "Ул. Ясная 2",
        long: "Ул. Ясная 2",
        time: "ПН-ВС 9:00 - 22:00",
      },
      {
        center: [56.807782, 60.611209],
        short: "Южный автовокзал",
        long: "Южный автовокзал",
        time: "ПН-ВС 9:00 - 22:00",
      },
    ],
    showMenu: false,
    replacer: false,
    emailName: "",
    emailSubject: "",
    emailEmail: "",
    emailPhone: "",
  },
  created: function () {
    // get types menuF
    let type = new Set();
    for (let [key, value] of Object.entries(this.menu)) {
      type.add(value.type);
    }
    this.types = type;

    // replace item for menus
    this.types.forEach((type, index) => {
      let menu = {
        name: type,
        recipies: [],
      };
      for (let [key, value] of Object.entries(this.menu)) {
        if (value.type === type) {
          menu.recipies.push(value);
        }
      }
      this.menus.push(menu);
    });
  },
  mounted() {
    ymaps.ready(() => {
      yamap = new ymaps.Map("map", {
        center: this.addresses[0].center,
        zoom: 17,
        controls: [],
      });
      this.addresses.forEach((address) => {
        const placemark = new ymaps.Placemark(
          address.center,
          { balloonContent: address.name },
          {
            iconLayout: "default#image",
            iconImageHref: "images/map-marker.svg",
            iconImageSize: [30, 42],
            iconImageOffset: [0, 0],
          }
        );
        yamap.geoObjects.add(placemark);
      });
    });

    this.currentAddress = this.addresses[0].long;
    this.address_long = this.addresses[0].long;
    this.address_short = this.addresses[0].short;
    this.address_time = this.addresses[0].time;

    axios.post("http://91.143.171.231/getAddresses").then((response) => {
      // console.log(response.data)
    });
    axios.post("http://91.143.171.231/getProducts").then((response) => {
      // console.log(response.data)
    });
    setTimeout(() => {
      $(".owl-carousel").owlCarousel({
        items: 4,
        margin: 10,
        dots: false,
        autoplayHoverPause: true,
        responsiveClass: true,
        stagePadding: 50,
        responsive: {
          0: {
            items: 1,
            nav: false,
          },
          600: {
            items: 2,
            nav: true,
          },
          800: {
            items: 3,
            nav: true,
          },
        },
      });
    });
  },
  methods: {
    setAddress(address) {
      this.currentAddress = address.short;
      this.address_long = address.long;
      this.address_short = address.short;
      this.address_time = address.time;
      yamap.setCenter(address.center, 17, {
        checkZoomRange: true,
      });
    },
    filterMenu() {
      return this.menu.filter((item) => item.type === this.selectedType);
    },
    handleScroll: function (evt, el) {
      if (window.scrollY > 500) {
        this.replacer = true;
      } else {
        this.replacer = false;
      }
      return false;
    },
    sendEmail() {
      const formData = new FormData();
      formData.append("name", this.emailName);
      formData.append("subject", this.emailSubject);
      formData.append("email", this.emailEmail);
      formData.append("phone", this.emailPhone);
      axios({
        method: "post",
        url: "myurl",
        data: formData,
        headers: { "Content-Type": "multipart/form-data" },
      })
        .then(function (response) {
          //handle success
          console.log(response);
        })
        .catch(function (response) {
          //handle error
          console.log(response);
        });
    },
  },
});
