import "./bootstrap";
import "owl.carousel";

window.Vue = require("vue");

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

new Vue({
  el: "#app-tochno",
  data: {
    showAddressBox: false,
    currentAddress: "",
    selectedType: "шашлык",
    types: [],
    menus: [],
    address_short: "",
    address_long: "",
    address_time: "",
    map: {},
    addresses: [],
    showMenu: false,
    showMap: false,
    replacer: false,
    emailName: "",
    emailSubject: "",
    emailEmail: "",
    emailPhone: "",
    emailFile: "",
    errorPhone: false,
    typeDescription: "",
    emailSendStatus: false,
    emailButton: "отправить заявку",
    emailTextFile: "Прикрепить документ (.pdf, .doc)",
  },
  mounted() {
    let thisScope = this;
    axios.post("http://91.143.171.231/getAddresses").then((response) => {
      this.addresses = response.data;
      this.currentAddress = response.data[0].address_short;
      this.address_long = response.data[0].address_long;
      this.address_short = response.data[0].address_short;
      this.address_time = response.data[0].time_work;

      ymaps.ready(() => {
        yamap = new ymaps.Map("map", {
          center: [response.data[0].address_x, response.data[0].address_y],
          zoom: 17,
          controls: [],
        });
        this.addresses.forEach((address) => {
          const placemark = new ymaps.Placemark(
            [address.address_x, address.address_y],
            { balloonContent: address.address_short },
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
      thisScope.showMap = true;
    });
    axios.post("http://91.143.171.231/getProducts").then((response) => {
      // get types menu
      let type = new Set();
      for (let [key, value] of Object.entries(response.data)) {
        type.add(value.type.toLowerCase());
      }
      this.types = type;

      // replace item for menus
      this.types.forEach((type, index) => {
        let menu = {
          name: type.toLowerCase(),
          recipies: [],
        };
        for (let [key, value] of Object.entries(response.data)) {
          if (value.type.toLowerCase() === type) {
            menu.recipies.push(value);
          }
        }
        this.menus.push(menu);
      });
      this.setDescriptionType(this.selectedType);
      setTimeout(() => {
        $(".owl-carousel").owlCarousel({
          items: 4,
          margin: 10,
          dots: false,
          nav: false,
          autoplayHoverPause: true,
          responsiveClass: true,
          stagePadding: 50,
          responsive: {
            0: {
              items: 1,
            },
            600: {
              items: 2,
            },
            1000: {
              items: 3,
            },
          },
        });
      });
    });
  },
  methods: {
    setAddress(address) {
      this.currentAddress = address.address_short;
      this.address_long = address.address_long;
      this.address_short = address.address_long;
      this.address_time = address.time_work;
      yamap.setCenter([address.address_x, address.address_y], 17, {
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
    setFile(event) {
      this.emailFile = event.target.value;
      this.emailTextFile = event.target.files[0].name;
    },
    sendEmail() {
      this.emailButton = "Секундочку...";
      if (this.emailPhone.length <= 0) {
        this.errorPhone = true;
      } else {
        this.errorPhone = false;
        const formData = new FormData();
        formData.append("name", this.emailName);
        formData.append("subject", this.emailSubject);
        formData.append("email", this.emailEmail);
        formData.append("phone", this.emailPhone);
        formData.append("file", this.emailFile);

        if (!this.emailSendStatus) {
          axios({
            method: "post",
            url: "callback",
            data: formData,
            headers: { "Content-Type": "multipart/form-data" },
          })
            .then((response) => {
              if (response.status == 200) {
                this.emailSendStatus = true;
              }
            })
            .catch(function (response) {});
        }
      }
    },
    setDescriptionType(type) {
      this.menus.forEach((item) => {
        if (item.recipies[0].type === type) {
          this.typeDescription = item.recipies[0].description_type;
        }
      });
    },
  },
});
