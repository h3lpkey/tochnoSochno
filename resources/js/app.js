import "./bootstrap";
import carousel from "vue-owl-carousel2";

window.Vue = require("vue");

const menu = [
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

const app = new Vue({
  el: "#app",
  components: { carousel },
  data: {
    showAddressBox: false,
    currentAddress: "ленина, 40",
    menu: menu,
    selectedType: "шашлык",
    types: [],
    menus: [],
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
  methods: {
    setAddress(address) {
      this.currentAddress = address;
      this.showAddressBox = false;
    },
    filterMenu() {
      return this.menu.filter((item) => item.type === this.selectedType);
    },
  },
});
