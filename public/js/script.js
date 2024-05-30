'use strict';



/**
 * add event on element
 */

const addEventOnElement = function (element, type, listener) {
  if (element.length > 1) {
    for (let i = 0; i < element.length; i++) {
      element[i].addEventListener(type, listener);
    }
  } else {
    element.addEventListener(type, listener);
  }
}



/**
 * navbar toggle
 */

const navbar = document.querySelector("[data-navbar]");
const navLinks = document.querySelectorAll("[data-nav-link]");
const navToggler = document.querySelector("[data-nav-toggler]");

const toggleNav = function () {
  navbar.classList.toggle("active");
  this.classList.toggle("active");
}

addEventOnElement(navToggler, "click", toggleNav);


const closeNav = function () {
  navbar.classList.remove("active");
  navToggler.classList.remove("active");
}

addEventOnElement(navLinks, "click", closeNav);



/**
 * add active class on header & back to top button
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

window.addEventListener("scroll", function () {
  if (window.scrollY >= 50) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
});



/**
 * hero tab button
 */

const tabBtns = document.querySelectorAll("[data-tab-btn]");

let lastClickedTabBtn = tabBtns[0];

const changeTab = function () {
  lastClickedTabBtn.classList.remove("active");
  this.classList.add("active");
  lastClickedTabBtn = this;
}

addEventOnElement(tabBtns, "click", changeTab);
document.addEventListener("DOMContentLoaded", function () {
    let carousel = document.querySelector(".carousel");
    let items = carousel.querySelectorAll(".item");
    let dotsContainer = document.querySelector(".dots");
  
    // Insert dots into the DOM
    items.forEach((_, index) => {
      let dot = document.createElement("span");
      dot.classList.add("dot");
      if (index === 0) dot.classList.add("active");
      dot.dataset.index = index;
      dotsContainer.appendChild(dot);
    });
  
    let dots = document.querySelectorAll(".dot");
  
    // Function to show a specific item
    function showItem(index) {
      items.forEach((item, idx) => {
        item.classList.remove("active");
        dots[idx].classList.remove("active");
        if (idx === index) {
          item.classList.add("active");
          dots[idx].classList.add("active");
        }
      });
    }
  
    // Event listeners for buttons
    document.querySelector(".prev").addEventListener("click", () => {
      let index = [...items].findIndex((item) =>
        item.classList.contains("active")
      );
      showItem((index - 1 + items.length) % items.length);
    });
  
    document.querySelector(".next").addEventListener("click", () => {
      let index = [...items].findIndex((item) =>
        item.classList.contains("active")
      );
      showItem((index + 1) % items.length);
    });
  
    // Event listeners for dots
    dots.forEach((dot) => {
      dot.addEventListener("click", () => {
        let index = parseInt(dot.dataset.index);
        showItem(index);
      });
    });
  });
  
