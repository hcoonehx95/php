window.addEventListener("load", function () {
  const menuLinks = this.document.querySelectorAll(".menu-link");
  [...menuLinks].forEach((item) =>
    item.addEventListener("mouseenter", handleHoverLink)
  );
  const line = document.createElement("div");
  line.classList.add("line-effect");
  document.body.appendChild(line);

  function handleHoverLink(e) {
    const { left, top, width, height } = e.target.getBoundingClientRect();
    line.style.width = `${width}px`;
    line.style.left = `${left}px`;
    line.style.top = `${top + height + 34}px`;
  }
  const menu = document.querySelector(".menu");
  menu.addEventListener("mouseleave", function () {
    line.style.width = 0;
  });

  //search

  const searchIcon = document.querySelector(".search-icon");
  searchIcon.addEventListener("click", function (e) {
    const searchForm = e.target.nextElementSibling;
    searchForm.style = "width: 100%; overflow: unset";
    searchIcon.classList.toggle("fa-search");
    searchIcon.classList.toggle("fa-times");
    if (searchIcon.classList.contains("fa-search")) {
      searchForm.style = "width: 0; overflow: hidden";
    }
  });

  // progress scroll
  const progress = document.querySelector(".progress");
  window.addEventListener("scroll", function () {
    const scrollTop = window.pageYOffset;
    const height =
      document.documentElement.scrollHeight -
      document.documentElement.clientHeight;
    const widthNew = (scrollTop / height) * 100;
    progress.style.width = `${widthNew}%`;
  });

  // product-detail
  const Images = document.querySelectorAll(".image-item");
  const image = document.querySelector(".image-show");
  [...Images].forEach((item) =>
    item.addEventListener("mousemove", function (e) {
      [...Images].forEach((item) => item.classList.remove("active"));
      e.target.classList.add("active");
      const imgSrc = e.target.getAttribute("src");
      image.setAttribute("src", imgSrc);
    })
  );
  const menuBtn = document.getElementById("menuBtn");
  const menuMb = document.querySelector(".menu-mb");
  const closeMenu = document.getElementById("close-menu");
  menuBtn &&
    menuBtn.addEventListener("click", function (e) {
      menuMb.style = "transform: translateY(0)";
      menuBtn.style = "display: none";
      closeMenu.style = "display: block";
    });
  closeMenu &&
    closeMenu.addEventListener("click", function (e) {
      menuMb.style = "transform: translateY(-100%)";
      menuBtn.style = "display: block";
      closeMenu.style = "display: none";
    });

  const categoryBtn = document.querySelector(".loc");
  const category = document.querySelector(".category");
  const closeCategory = document.getElementById("close-sidebar");
  categoryBtn &&
    categoryBtn.addEventListener("click", function (e) {
      category.style = "transform: translateX(0)";
    });
  closeCategory &&
    closeCategory.addEventListener("click", function (e) {
      category.style = "transform: translateX(-110%)";
    });
// password


const password = document.querySelector(".password");
const eye = document.querySelector(".eye");

eye.addEventListener("click", function (e) {
  if (password.getAttribute("type") === "password") {
    password.setAttribute("type", "text");
    eye.classList.toggle("fa-eye");
    eye.classList.toggle("fa-eye-slash");
  } else {
    password.setAttribute("type", "password");
    eye.classList.toggle("fa-eye");
    eye.classList.toggle("fa-eye-slash");
  }
});

});
