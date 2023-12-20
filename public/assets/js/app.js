// console.log("hello world");

// event.preventDefault();

const addEventonElen = function(element, type, callback) {
  if (element.length > 1) {
    for (let i = 0; i < element.length; i++) {
      element[i].addEventListener(type, callback); // Use [i] to access the elements in the NodeList
    }
  } else {
    element.addEventListener(type, callback);
  }
};

const navbarToggler = document.querySelector("[data-nav-toggler]");
const navLinks = document.querySelectorAll("[data-nav-link]");
const navbar = document.querySelector("[data-navbar]");
const navToggleBtn = document.querySelector(".nav-toggle-btn"); // Define the toggle button element

const toggleNavbar = () => {
  const isNavbarOpen = navbar.classList.contains("active");
  navbar.style.height = isNavbarOpen ? "0" : "auto";
  navbar.classList.toggle("active");
  navToggleBtn.classList.toggle("active"); // Toggle the active class on the toggle button
};

addEventonElen(navbarToggler, "click", toggleNavbar);

const closeNavbar = () => {
  const isNavbarOpen = navbar.classList.contains("active");
  // navbar.style.height = isNavbarOpen ? "0" : "auto";
  navbar.classList.toggle("active");
  navToggleBtn.classList.toggle("active"); // Toggle the active class on the toggle button
};

addEventonElen(navLinks, "click", closeNavbar);

// Get the back-to-top button element
const backToTopButton = document.querySelector("[data-back-top-btn]");

// Add a scroll event listener
window.addEventListener("scroll", () => {
  // Check the user's scroll position
  if (window.scrollY > 200) {
    // You can adjust this value
    // Show the button when the user has scrolled down a certain amount
    backToTopButton.classList.add("active");
  } else {
    // Hide the button when the user is near the top
    backToTopButton.classList.remove("active");
  }
});

// header active

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

window.addEventListener("scroll", function() {
  if (window.scrollY > 100) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
});
