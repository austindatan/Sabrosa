document.addEventListener("DOMContentLoaded", function () {
    const projectImages = document.querySelectorAll(".project-grid img");

    projectImages.forEach(img => {
        const overlay = document.createElement("div");
        overlay.classList.add("image-overlay");
        overlay.textContent = img.alt;

        overlay.style.position = "absolute";
        overlay.style.top = "0";
        overlay.style.left = "0";
        overlay.style.width = "100%";
        overlay.style.height = "100%";
        overlay.style.background = "rgba(97, 100, 105, 0.8)";
        overlay.style.color = "white";
        overlay.style.fontSize = "0.9rem";
        overlay.style.fontFamily = "Courier Prime, sans-serif";
        overlay.style.display = "flex";
        overlay.style.alignItems = "center";
        overlay.style.justifyContent = "center";
        overlay.style.opacity = "0";
        overlay.style.transition = "opacity 0.3s ease, transform 0.3s ease";

        const wrapper = document.createElement("div");
        wrapper.style.position = "relative";
        wrapper.style.display = "inline-block";
        wrapper.style.overflow = "hidden";

        img.parentNode.insertBefore(wrapper, img);
        wrapper.appendChild(img);
        wrapper.appendChild(overlay);

        wrapper.addEventListener("mouseover", () => {
            overlay.style.opacity = "1";
            img.style.transform = "scale(1.1)";
        });

        wrapper.addEventListener("mouseout", () => {
            overlay.style.opacity = "0";
            img.style.transform = "scale(1)";
        });
    });

    document.querySelectorAll('.nav-links a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');

            if (targetId.startsWith("#")) {
                e.preventDefault();
                const targetElement = document.getElementById(targetId.substring(1));

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 70,
                        behavior: "smooth"
                    });
                }
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
        document.body.classList.add("loaded");
    }, 100);

    const links = document.querySelectorAll("a");

    links.forEach(link => {
        link.addEventListener("click", function (e) {
            if (
                this.href && 
                !this.href.startsWith("#") &&
                this.target !== "_blank"
            ) {
                e.preventDefault();
                document.body.classList.add("fade-out");

                setTimeout(() => {
                    window.location.href = this.href;
                }, 500);
            }
        });
    });
});


document.querySelectorAll('a[target="_blank"]').forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault();
        const newTab = window.open(this.href, '_blank');

        if (!newTab || newTab.closed || typeof newTab.closed === 'undefined') {
            alert("Pop-up blocked! Please allow pop-ups for this site.");
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.nav-links');

    toggle.addEventListener('click', () => {
        nav.classList.toggle('show');
    });
});

window.leftArrow = function () {
    document.getElementById('slider').scrollBy({
      left: -300,
      behavior: 'smooth'
    });
  }
  
window.rightArrow = function () {
    document.getElementById('slider').scrollBy({
      left: 300,
      behavior: 'smooth'
    });
}
  