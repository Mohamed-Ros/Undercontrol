function navbar() {
  const checkbox = document.querySelector("#checkbox");
  const navLinks = document.querySelector(".nav-links");
  const toggle = document.querySelector(".toggle");

  // فتح وقفل بالـ checkbox
  checkbox.addEventListener("change", (e) => {
    if (e.target.checked) {
      navLinks.classList.add("active");
    } else {
      navLinks.classList.remove("active");
    }
  });

  // اخفاء عند الـ scroll
  window.addEventListener("scroll", () => {
    navLinks.classList.remove("active");
    checkbox.checked = false; // يلغي التعليم من الـ checkbox
  });

  // اخفاء عند الضغط بره القائمة
  document.addEventListener("click", (e) => {
    if (
      !navLinks.contains(e.target) &&
      !checkbox.contains(e.target) &&
      !toggle.contains(e.target)
    ) {
      navLinks.classList.remove("active");
      checkbox.checked = false;
    }
  });
}

navbar();

// Start swiper

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 4, // الافتراضي: 4 كروت
  spaceBetween: 20,
  slidesPerGroup: 1,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-prev", // خلي بالك هنا كنت كاتبهم بالعكس
    prevEl: ".swiper-button-next",
  },
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },

  // الريسبونسف
  breakpoints: {
    320: {
      // موبايل صغير
      slidesPerView: 1,
    },
    576: {
      // موبايل كبير
      slidesPerView: 2,
    },
    768: {
      // تابلت
      slidesPerView: 3,
    },
    992: {
      // لابتوب
      slidesPerView: 4,
    },
  },
});

// End swiper

document.addEventListener("DOMContentLoaded", function () {
  const accordionButtons = document.querySelectorAll(".accordion-button");
  accordionButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const content = button.nextElementSibling;
      const icon = button.querySelector(".material-symbols-outlined");
      button.parentElement.classList.toggle("open");
      if (content.style.maxHeight) {
        content.style.maxHeight = null;
        icon.style.transform = "rotate(0deg)";
      } else {
        // Close other accordions
        document.querySelectorAll(".accordion-content").forEach((item) => {
          if (item !== content) {
            item.style.maxHeight = null;
            item.previousElementSibling.querySelector(
              ".material-symbols-outlined"
            ).style.transform = "rotate(0deg)";
          }
        });
        content.style.maxHeight = content.scrollHeight + "px";
        icon.style.transform = "rotate(180deg)";
      }
    });
  });
});

// Start preloader

function preloader(){
  window.addEventListener("load", function () {
    document.getElementById("preloader").style.display = "none";
  });

}

preloader();

// End preloader
