const ratio = 0.1;
const options = {
  root: null,
  rootMargin: "0px",
  threshold: ratio,
};

const handleIntersect = function (entries, observer) {
  entries.forEach(function (entry) {
    if (entry.intersectionRatio > ratio) {
      entry.target.classList.add("reveal-visible");
    }
  });
};

const observer = new IntersectionObserver(handleIntersect, options);
document.querySelectorAll('[class*="reveal-"]').forEach(function (r) {
  observer.observe(r);
});

const menu_toggle = document.querySelector(".menu-toggle");
const nav_link = document.querySelector(".nav-link");
menu_toggle.addEventListener("click", () => {
  nav_link.classList.toggle("mobile-menu");
});
