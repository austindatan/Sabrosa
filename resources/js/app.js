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
  }
  