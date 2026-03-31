(function () {
  var reducedMotionQuery = window.matchMedia("(prefers-reduced-motion: reduce)");

  function clamp(value, min, max) {
    return Math.min(max, Math.max(min, value));
  }

  function lerp(start, end, progress) {
    return start + (end - start) * progress;
  }

  function getNumber(el, key, fallback) {
    var value = parseFloat(el.dataset[key]);
    return Number.isFinite(value) ? value : fallback;
  }

  function updateStickyHeader() {
    var header = document.querySelector("[data-lh-sticky-header]");

    if (!header) {
      return;
    }

    header.classList.toggle("is-scrolled", window.scrollY > 20);
  }

  function updateScrollMotion() {
    var motionElements = document.querySelectorAll("[data-scroll-motion]");
    var parallaxElements = document.querySelectorAll("[data-lh-parallax]");
    var viewportHeight = window.innerHeight || document.documentElement.clientHeight;
    var reduceMotion = reducedMotionQuery.matches;

    motionElements.forEach(function (el) {
      var disableBelow = getNumber(el, "disableBelow", 800);
      var animateOpacity = getNumber(el, "animateOpacity", 1) === 1;
      var motionOff = reduceMotion || window.innerWidth < disableBelow;

      if (motionOff) {
        el.style.transform = "translate3d(0, 0, 0)";
        el.style.opacity = "1";
        return;
      }

      var rect = el.getBoundingClientRect();
      var startVh = getNumber(el, "startVh", 0.85);
      var endVh = getNumber(el, "endVh", 0.35);
      var startPx = viewportHeight * startVh;
      var endPx = viewportHeight * endVh;
      var total = Math.max(rect.height + startPx - endPx, 1);
      var progress = clamp((startPx - rect.top) / total, 0, 1);
      var x = lerp(getNumber(el, "xStart", 0), getNumber(el, "xEnd", 0), progress);
      var y = lerp(getNumber(el, "yStart", 0), getNumber(el, "yEnd", 0), progress);

      el.style.transform = "translate3d(" + x + "px, " + y + "px, 0)";

      if (!animateOpacity) {
        el.style.opacity = "1";
        return;
      }

      var appearAt = getNumber(el, "appearAt", 0);
      var appearBy = Math.max(getNumber(el, "appearBy", 0.3), 0.001);
      var opacity = clamp((progress - appearAt) / appearBy, 0, 1);

      el.style.opacity = String(opacity);
    });

    parallaxElements.forEach(function (el) {
      var section = el.closest("[data-lh-hero-section]");
      var rect = section ? section.getBoundingClientRect() : el.getBoundingClientRect();
      var movePx = getNumber(el, "movePx", -220);
      var motionOff = reduceMotion;

      if (motionOff) {
        el.style.transform = "translate3d(0, 0, 0)";
        return;
      }

      var progress = clamp((-rect.top) / Math.max(rect.height, 1), 0, 1);
      var y = movePx * progress;
      el.style.transform = "translate3d(0, " + y + "px, 0)";
    });
  }

  function initHeroSliders() {
    var heroes = document.querySelectorAll("[data-lh-hero]");

    heroes.forEach(function (hero) {
      var slides = Array.prototype.slice.call(hero.querySelectorAll("[data-lh-slide]"));
      var delay = parseInt(hero.dataset.slideMs, 10) || 10000;
      var index = 0;
      var previousIndex = null;

      if (slides.length < 2) {
        return;
      }

      function render() {
        slides.forEach(function (slide, slideIndex) {
          slide.classList.remove("is-active", "is-prev", "is-next");

          if (slideIndex === index) {
            slide.classList.add("is-active");
            return;
          }

          if (previousIndex !== null && slideIndex === previousIndex) {
            slide.classList.add("is-prev");
            return;
          }

          slide.classList.add("is-next");
        });
      }

      render();

      window.setInterval(function () {
        previousIndex = index;
        index = (index + 1) % slides.length;
        render();
      }, delay);
    });
  }

  var ticking = false;

  function requestUpdate() {
    if (ticking) {
      return;
    }

    ticking = true;

    window.requestAnimationFrame(function () {
      updateStickyHeader();
      updateScrollMotion();
      ticking = false;
    });
  }

  window.addEventListener("scroll", requestUpdate, { passive: true });
  window.addEventListener("resize", requestUpdate, { passive: true });

  if (reducedMotionQuery.addEventListener) {
    reducedMotionQuery.addEventListener("change", requestUpdate);
  } else if (reducedMotionQuery.addListener) {
    reducedMotionQuery.addListener(requestUpdate);
  }

  document.addEventListener("DOMContentLoaded", function () {
    initHeroSliders();
    requestUpdate();
  });
})();
