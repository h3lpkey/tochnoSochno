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
    currentAddress: "ленина, 40",
    menu: menu,
    selectedType: "шашлык",
    types: [],
    menus: [],
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
    console.log("get data");
    axios.post("http://tochnosochno/getAddresses").then((response) => {
      // console.log(response.data)
    });
    axios.post("http://tochnosochno/getProducts").then((response) => {
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
      this.currentAddress = address;
      this.showAddressBox = false;
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
