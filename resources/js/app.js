import 'bootstrap';
// Logic for hiding navbar on scroll
let lastScrollTop = 0;
const navbar = document.querySelector('.navbar.sticky-top');

// Check if a navbar element actually exists on the page
if (navbar) {
  window.addEventListener("scroll", function() {
      let currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;

      // Check if scrolling down and we're past the navbar height
      if (currentScrollTop > lastScrollTop && currentScrollTop > navbar.offsetHeight){
          // Scroll Down
          navbar.style.top = `-${navbar.offsetHeight}px`;
      } else {
          // Scroll Up
          navbar.style.top = "0";
      }
      lastScrollTop = currentScrollTop <= 0 ? 0 : currentScrollTop;
  }, false);
}
