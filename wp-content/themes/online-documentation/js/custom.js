// Testimonial Section
jQuery(document).ready(function() {
  jQuery('.testimonial-section .owl-carousel').owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    navText: ["<span class='left-btn p-3'></span>", "<span class='right-btn p-3'></span>"], 
    dots: false,
    rtl: false,
    responsive: {
    0: { 
      items: 1 
    },
    768: { 
      items: 2 
    },
    992: { 
      items: 2 
    },
    1200: { 
      items: 3 
    }
  },
  autoplay: true,
  });
});

// News Section
jQuery(document).ready(function() {
  jQuery('.news-section .owl-carousel').owlCarousel({
    loop: true,
    margin: 15,
    nav: false, 
    dots: false,
    rtl: false,
    responsive: {
    0: { 
      items: 1 
    },
    768: { 
      items: 2 
    },
    992: { 
      items: 2 
    },
    1200: { 
      items: 3 
    }
  },
  autoplay: true,
  });
});

// Scroll to Top
window.onscroll = function() {
  const online_documentation_button = document.querySelector('.scroll-top-box');
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    online_documentation_button.style.display = "block";
  } else {
    online_documentation_button.style.display = "none";
  }
};

document.querySelector('.scroll-top-box a').onclick = function(event) {
  event.preventDefault();
  window.scrollTo({top: 0, behavior: 'smooth'});
};

// Dark Mode
const online_documentation_themeToggleButton = document.getElementById("theme-toggle");
const online_documentation_imgs = online_documentation_themeToggleButton.querySelectorAll("img");

if (online_documentation_imgs.length >= 2) {
  online_documentation_imgs[0].classList.add("light-icon"); // first img = light
  online_documentation_imgs[1].classList.add("dark-icon");  // second img = dark
}

function online_documentation_toggleDarkMode() {
  const body = document.body;
  body.classList.toggle("dark-mode");

  // Save preference
  if (body.classList.contains("dark-mode")) {
    localStorage.setItem("theme", "dark");
  } else {
    localStorage.setItem("theme", "light");
  }
}

online_documentation_themeToggleButton.addEventListener("click", online_documentation_toggleDarkMode);

const online_documentation_savedTheme = localStorage.getItem("theme");
if (online_documentation_savedTheme === "dark") {
  document.body.classList.add("dark-mode");
}

// Banner Bottom Cards
document.addEventListener("DOMContentLoaded", function () {
  const online_documentation_downBtn = document.querySelector("#toggleSecondRow .show-btn img");
  const online_documentation_upBtn   = document.querySelector("#toggleSecondRow .hide-btn img");
  const online_documentation_secondRow = document.querySelector(".secondRow");

  if (!online_documentation_downBtn || !online_documentation_upBtn || !online_documentation_secondRow) {
    console.warn("Toggle elements not found");
    return;
  }

  online_documentation_secondRow.style.display = "none";
  online_documentation_upBtn.closest(".wp-block-button").style.display = "none";

  online_documentation_downBtn.addEventListener("click", function (e) {
    e.preventDefault();
    online_documentation_secondRow.style.display = "flex";
    online_documentation_downBtn.closest(".wp-block-button").style.display = "none";
    online_documentation_upBtn.closest(".wp-block-button").style.display = "inline-flex";
  });

  online_documentation_upBtn.addEventListener("click", function (e) {
    e.preventDefault();
    online_documentation_secondRow.style.display = "none";
    online_documentation_upBtn.closest(".wp-block-button").style.display = "none";
    online_documentation_downBtn.closest(".wp-block-button").style.display = "inline-flex";
  });
});

// Search Voice
document.addEventListener("DOMContentLoaded", () => {
  const online_documentation_wrapper = document.querySelector(".banner-main-sec .banner-content .banner-search-box .wp-block-search__inside-wrapper");
  if (!online_documentation_wrapper) return;

  const input = online_documentation_wrapper.querySelector("#wp-block-search__input-2");

  const online_documentation_hidden = Object.assign(document.createElement("input"), {
    type: "hidden", id: "hiddenKeyword", name: "voice"
  });
  online_documentation_wrapper.appendChild(online_documentation_hidden);

  const online_documentation_btn = Object.assign(document.createElement("button"), {
    type: "button", id: "voiceButton"
  });
  online_documentation_wrapper.insertBefore(online_documentation_btn, online_documentation_wrapper.querySelector("button[type='submit']"));

  online_documentation_btn.addEventListener("click", () => {
    if (!("webkitSpeechRecognition" in window)) {
      alert("Speech recognition not supported");
      return;
    }
    const online_documentation_rec = new webkitSpeechRecognition();
    online_documentation_rec.lang = "en-US";
    online_documentation_rec.onstart = () => online_documentation_btn.classList.add("listening");
    online_documentation_rec.onend = () => online_documentation_btn.classList.remove("listening");
    online_documentation_rec.onresult = e => {
      const text = e.results[0][0].transcript;
      input.value = online_documentation_hidden.value = text;
      input.closest("form").submit();
    };
    online_documentation_rec.start();
  });
});