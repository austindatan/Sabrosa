import './bootstrap';

if (typeof window !== 'undefined') {
    window.leftArrow = function () {
      const slider = document.getElementById('slider');
      if (slider) {
        slider.scrollBy({
          left: -300,
          behavior: 'smooth'
        });
      }
    }
  
    window.rightArrow = function () {
      const slider = document.getElementById('slider');
      if (slider) {
        slider.scrollBy({
          left: 300,
          behavior: 'smooth'
        });
      }
    }
  }
  