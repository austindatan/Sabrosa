import './bootstrap';

if (typeof window !== 'undefined') {
    window.cookiesleftArrow = function () {
      const cookiesslider = document.getElementById('cookiesslider');
      if (cookiesslider) {
        cookiesslider.scrollBy({
          left: -300,
          behavior: 'smooth'
        });
      }
    }
  
    window.cookiesrightArrow = function () {
      const cookiesslider = document.getElementById('cookiesslider');
      if (cookiesslider) {
        cookiesslider.scrollBy({
          left: 300,
          behavior: 'smooth'
        });
      }
    }

    window.donutsleftArrow = function () {
      const donutsslider = document.getElementById('donutsslider');
      if (donutsslider) {
        donutsslider.scrollBy({
          left: -300,
          behavior: 'smooth'
        });
      }
    }
  
    window.donutsrightArrow = function () {
      const donutsslider = document.getElementById('donutsslider');
      if (donutsslider) {
        donutsslider.scrollBy({
          left: 300,
          behavior: 'smooth'
        });
      }
    }

    window.cakesleftArrow = function () {
      const cakesslider = document.getElementById('cakesslider');
      if (cakesslider) {
        cakesslider.scrollBy({
          left: -300,
          behavior: 'smooth'
        });
      }
    }
  
    window.cakesrightArrow = function () {
      const cakesslider = document.getElementById('cakesslider');
      if (cakesslider) {
        cakesslider.scrollBy({
          left: 300,
          behavior: 'smooth'
        });
      }
    }

    window.drinksAndTealeftArrow = function () {
      const drinksAndTeaslider = document.getElementById('drinksAndTeaslider');
      if (drinksAndTeaslider) {
      drinksAndTeaslider.scrollBy({
        left: -300,
        behavior: 'smooth'
      });
      }
    }
    
    window.drinksAndTearightArrow = function () {
      const drinksAndTeaslider = document.getElementById('drinksAndTeaslider');
      if (drinksAndTeaslider) {
      drinksAndTeaslider.scrollBy({
        left: 300,
        behavior: 'smooth'
      });
      }
    }

    window.mealsleftArrow = function () {
      const mealsslider = document.getElementById('mealsslider');
      if (mealsslider) {
      mealsslider.scrollBy({
      left: -300,
      behavior: 'smooth'
      });
      }
    }
    
    window.mealsrightArrow = function () {
      const mealsslider = document.getElementById('mealsslider');
      if (mealsslider) {
      mealsslider.scrollBy({
      left: 300,
      behavior: 'smooth'
      });
      }
    }

    window.MICleftArrow = function () {
      const MICslider = document.getElementById('MICslider');
      if (MICslider) {
      MICslider.scrollBy({
        left: -300,
        behavior: 'smooth'
      });
      }
    }
    
    window.MICrightArrow = function () {
      const MICslider = document.getElementById('MICslider');
      if (MICslider) {
      MICslider.scrollBy({
        left: 300,
        behavior: 'smooth'
      });
      }
    }
  }

  document.addEventListener('DOMContentLoaded', () => {
    const openBtn = document.getElementById('open-menu');
    const closeBtn = document.getElementById('close-menu');
    const menu = document.getElementById('mobile-slide-menu');
    const overlay = document.getElementById('overlay');
  
    // Open menu
    openBtn.addEventListener('click', () => {
      menu.classList.remove('-translate-x-full');
      menu.classList.add('translate-x-0');
      overlay.classList.remove('hidden');
    });
  
    // Close menu
    const closeMenu = () => {
      menu.classList.add('-translate-x-full');
      menu.classList.remove('translate-x-0');
      overlay.classList.add('hidden');
    };
  
    closeBtn.addEventListener('click', closeMenu);
  
    // Close when clicking outside (on overlay)
    overlay.addEventListener('click', closeMenu);
  
    // Optional: Close with Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        closeMenu();
      }
    });
  });
  
    document.addEventListener("DOMContentLoaded", function () {
      const toggleBtn = document.getElementById("toggle-search");
      const searchBox = document.getElementById("search-box");
      const searchLogo = document.getElementById("search-logo");

      toggleBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        // Toggle the search bar visibility
        searchBox.classList.toggle("show");
        // Move the search logo to the left
        searchLogo.classList.toggle("move");
        if (searchBox.classList.contains("show")) {
          searchBox.querySelector("input").focus();
        }
      });

      document.addEventListener("click", function (e) {
        if (!searchBox.contains(e.target) && !toggleBtn.contains(e.target)) {
          searchBox.classList.remove("show");
          searchLogo.classList.remove("move");
        }
      });
    });