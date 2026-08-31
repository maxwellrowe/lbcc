import $ from "jquery";
import "jquery-match-height";
import Collapse from "bootstrap/js/dist/collapse";
import Dropdown from "bootstrap/js/dist/dropdown";
import Modal from "bootstrap/js/dist/modal";
import Offcanvas from "bootstrap/js/dist/offcanvas";
import Tab from "bootstrap/js/dist/tab";
import Tooltip from "bootstrap/js/dist/tooltip";
import { animate } from "motion";
import Swiper from "swiper/bundle";

import { Animation } from "./animation";

const LBCC = window.LBCC || {};

window.LBCC = LBCC;
window.$ = $;
window.jQuery = $;
window.Swiper = Swiper;

LBCC.Swiper = Swiper;
LBCC.Animation = Animation;

const markInitialized = (element) => {
  element.dataset.lbccInitialized = "true";
};

const isInitialized = (element) => element.dataset.lbccInitialized === "true";

const initBootstrapSet = (selector, Constructor) => {
  document.querySelectorAll(selector).forEach((element) => {
    if (isInitialized(element)) {
      return;
    }

    Constructor.getOrCreateInstance(element);
    markInitialized(element);
  });
};

const moveModalsToBody = () => {
  document.querySelectorAll(".modal").forEach((modal) => {
    if (modal.parentElement !== document.body) {
      document.body.append(modal);
    }
  });
};

const initStickyHeader = () => {
  const header = document.querySelector(".site-header");

  if (!(header instanceof HTMLElement)) {
    return;
  }

  const desktopQuery = window.matchMedia("(min-width: 992px)");
  let lastScrollY = window.scrollY;
  let ticking = false;

  const resetHeaderState = () => {
    header.classList.remove("site-header-sticky-ready", "site-header-sticky-hidden", "site-header-sticky-visible");
  };

  const updateHeaderState = () => {
    ticking = false;

    if (!desktopQuery.matches) {
      resetHeaderState();
      lastScrollY = window.scrollY;
      return;
    }

    const currentScrollY = window.scrollY;
    const scrollDelta = currentScrollY - lastScrollY;
    const threshold = 120;
    const directionThreshold = 8;

    if (currentScrollY <= threshold) {
      resetHeaderState();
      lastScrollY = currentScrollY;
      return;
    }

    header.classList.add("site-header-sticky-ready");

    if (scrollDelta > directionThreshold) {
      header.classList.add("site-header-sticky-hidden");
      header.classList.remove("site-header-sticky-visible");
    } else if (scrollDelta < -directionThreshold) {
      header.classList.add("site-header-sticky-visible");
      header.classList.remove("site-header-sticky-hidden");
    }

    lastScrollY = currentScrollY;
  };

  const queueHeaderUpdate = () => {
    if (ticking) {
      return;
    }

    ticking = true;
    window.requestAnimationFrame(updateHeaderState);
  };

  updateHeaderState();
  window.addEventListener("scroll", queueHeaderUpdate, { passive: true });
  window.addEventListener("resize", queueHeaderUpdate);
  desktopQuery.addEventListener("change", queueHeaderUpdate);
};

const initGoogleTranslateModal = () => {
  const defaultLanguage = window.gtranslateSettings?.default_language || "en";
  const returnOriginalElement = document.getElementById("gtranslate-return-og");

  const enhanceTranslateSelects = (root = document) => {
    root.querySelectorAll(".gtranslate_wrapper select").forEach((select) => {
      if (!(select instanceof HTMLSelectElement) || select.dataset.lbccEnhanced === "true") {
        return;
      }

      select.classList.add("form-select");
      select.setAttribute("aria-label", "Select page language");
      select.dataset.lbccEnhanced = "true";
    });
  };

  const getGoogleTranslateLanguage = () => {
    const cookieMatch = document.cookie.match(/(?:^|;\s*)googtrans=([^;]+)/);

    if (!cookieMatch) {
      return defaultLanguage;
    }

    const cookieValue = decodeURIComponent(cookieMatch[1]);
    const languageCode = cookieValue.split("/").filter(Boolean).pop();

    if (!languageCode || languageCode === defaultLanguage) {
      return defaultLanguage;
    }

    return languageCode;
  };

  const hideTranslateToast = () => {
    if (!(returnOriginalElement instanceof HTMLElement)) {
      return;
    }

    returnOriginalElement.classList.add("d-none");
  };

  const showTranslateToast = (languageCode) => {
    if (!(returnOriginalElement instanceof HTMLElement) || !languageCode || languageCode === defaultLanguage) {
      return;
    }

    returnOriginalElement.classList.remove("d-none");
  };

  const syncTranslateToast = (languageCode = getGoogleTranslateLanguage()) => {
    if (!languageCode || languageCode === defaultLanguage) {
      hideTranslateToast();
      return;
    }

    showTranslateToast(languageCode);
  };

  const clearGoogleTranslateCookie = () => {
    const expireCookie = (cookieDomain) => {
      const domainSegment = cookieDomain ? `;domain=${cookieDomain}` : "";
      document.cookie = `googtrans=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/${domainSegment}`;
    };

    expireCookie("");

    const hostnameParts = window.location.hostname.split(".");

    if (hostnameParts.length > 1) {
      expireCookie(`.${hostnameParts.slice(-2).join(".")}`);
    }
  };

  enhanceTranslateSelects();
  syncTranslateToast();

  const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
      mutation.addedNodes.forEach((node) => {
        if (!(node instanceof HTMLElement)) {
          return;
        }

        if (node.matches(".gtranslate_wrapper") || node.querySelector(".gtranslate_wrapper")) {
          enhanceTranslateSelects(node);
          window.setTimeout(() => {
            syncTranslateToast();
          }, 50);
        }
      });
    });
  });

  observer.observe(document.body, { childList: true, subtree: true });

  document.addEventListener("change", (event) => {
    const target = event.target;

    if (!(target instanceof HTMLSelectElement)) {
      return;
    }

    if (!target.closest(".gtranslate_wrapper")) {
      return;
    }

    syncTranslateToast(target.value);

    const modalElement = target.closest(".modal");

    if (!(modalElement instanceof HTMLElement)) {
      return;
    }

    window.setTimeout(() => {
      Modal.getOrCreateInstance(modalElement).hide();
    }, 150);
  });

  document.addEventListener("click", (event) => {
    const target = event.target;

    if (!(target instanceof HTMLElement)) {
      return;
    }

    if (!target.closest("[data-lbcc-translate-reset]")) {
      return;
    }

    event.preventDefault();
    clearGoogleTranslateCookie();
    window.location.reload();
  });
};

const syncOffcanvasTriggers = () => {
  document.querySelectorAll(".offcanvas").forEach((panel) => {
    const trigger = document.querySelector(`[data-bs-target="#${panel.id}"]`);
    const animatedSections = [panel.querySelector(".offcanvas-body")].filter((element) => element instanceof HTMLElement);

    if (!trigger) {
      return;
    }

    const setExpandedState = (expanded) => {
      trigger.classList.toggle("is-open", expanded);
      trigger.setAttribute("aria-expanded", expanded ? "true" : "false");
    };

    setExpandedState(panel.classList.contains("show"));
    panel.addEventListener("show.bs.offcanvas", () => {
      LBCC.Animation.prepareFadeRightSequence(animatedSections);
      panel.classList.add("is-animating-open");
    });
    panel.addEventListener("shown.bs.offcanvas", () => {
      const animationDuration = LBCC.Animation.playFadeRightSequence(animatedSections, { itemDelay: 0 });

      if (animationDuration === 0) {
        panel.classList.remove("is-animating-open");
        return;
      }

      window.setTimeout(() => {
        panel.classList.remove("is-animating-open");
      }, animationDuration * 1000);
    });
    panel.addEventListener("show.bs.offcanvas", () => setExpandedState(true));
    panel.addEventListener("hidden.bs.offcanvas", () => {
      setExpandedState(false);
      panel.classList.remove("is-animating-open");
      animatedSections.forEach((element) => {
        LBCC.Animation.clearInlineAnimationStyles(element);
      });
    });
  });
};

const initDesktopMainNavCollapses = () => {
  const nav = document.querySelector('[data-lbcc-nav-context="desktop"]');
  const searchCollapse = document.getElementById("site-desktop-search");

  if (!(nav instanceof HTMLElement)) {
    return;
  }

  const desktopQuery = window.matchMedia("(min-width: 1200px)");
  const desktopActionScope = nav.closest(".site-desktop-actions");
  const collapseElements = Array.from(nav.querySelectorAll(".lbcc-main-nav__item"));

  if (searchCollapse instanceof HTMLElement) {
    collapseElements.push(searchCollapse);
  }

  if (!collapseElements.length) {
    return;
  }

  const getCollapseInstance = (element) => Collapse.getOrCreateInstance(element, { toggle: false });
  const getTriggersForElement = (element) => Array.from(
    (desktopActionScope || nav).querySelectorAll(`[data-bs-target="#${element.id}"]`)
  );

  const setExpandedState = (element, expanded) => {
    getTriggersForElement(element).forEach((trigger) => {
      trigger.setAttribute("aria-expanded", expanded ? "true" : "false");
    });
  };

  const hideAll = (activeElement = null) => {
    collapseElements.forEach((element) => {
      if (element === activeElement || !element.classList.contains("show")) {
        return;
      }

      getCollapseInstance(element).hide();
    });
  };

  collapseElements.forEach((element) => {
    element.addEventListener("show.bs.collapse", () => {
      if (!desktopQuery.matches) {
        return;
      }

      setExpandedState(element, true);
      hideAll(element);
    });

    element.addEventListener("hidden.bs.collapse", () => {
      setExpandedState(element, false);
    });
  });

  document.addEventListener("click", (event) => {
    if (!desktopQuery.matches) {
      return;
    }

    const target = event.target;

    if (!(target instanceof Node)) {
      return;
    }

    const isWithinDesktopControls = (desktopActionScope || nav).contains(target);
    const isWithinOpenPanel = collapseElements.some((element) => element.contains(target));

    if (isWithinDesktopControls || isWithinOpenPanel) {
      return;
    }

    hideAll();
  });

  document.addEventListener("keydown", (event) => {
    if (!desktopQuery.matches || event.key !== "Escape") {
      return;
    }

    hideAll();
  });

  desktopQuery.addEventListener("change", () => {
    hideAll();
  });
};

const initDesktopSearchCollapseFocus = () => {
  const searchCollapse = document.getElementById("site-desktop-search");

  if (!(searchCollapse instanceof HTMLElement)) {
    return;
  }

  searchCollapse.addEventListener("shown.bs.collapse", () => {
    const searchInput = searchCollapse.querySelector('input[type="search"]');

    if (!(searchInput instanceof HTMLInputElement)) {
      return;
    }

    window.requestAnimationFrame(() => {
      searchInput.focus({ preventScroll: true });
    });
  });
};

const syncCollapseMenuTriggers = () => {
  const triggers = Array.from(document.querySelectorAll('.collapse-menu-trigger[data-bs-toggle="collapse"]'));

  triggers.forEach((trigger) => {
    if (!(trigger instanceof HTMLElement)) {
      return;
    }

    const targetSelector = trigger.getAttribute("data-bs-target");

    if (!targetSelector || !targetSelector.startsWith("#")) {
      return;
    }

    const collapseElement = document.querySelector(targetSelector);

    if (!(collapseElement instanceof HTMLElement)) {
      return;
    }

    const sectionNav = collapseElement.id === "section-nav__menu"
      ? collapseElement.closest(".section-nav")
      : null;

    const setExpandedState = (expanded) => {
      trigger.classList.toggle("is-open", expanded);
      trigger.setAttribute("aria-expanded", expanded ? "true" : "false");

      if (sectionNav instanceof HTMLElement) {
        sectionNav.classList.toggle("section-nav__active", expanded);
      }
    };

    setExpandedState(collapseElement.classList.contains("show"));
    collapseElement.addEventListener("show.bs.collapse", () => {
      setExpandedState(true);
    });
    collapseElement.addEventListener("hidden.bs.collapse", () => {
      setExpandedState(false);
    });
  });
};

const initSectionNavMenu = () => {
  const sectionNavMenu = document.getElementById("section-nav__menu");

  if (!(sectionNavMenu instanceof HTMLElement)) {
    return;
  }

  const topLevelList = sectionNavMenu.querySelector(":scope > ul");

  sectionNavMenu.querySelectorAll("li").forEach((item) => {
    if (!(item instanceof HTMLLIElement)) {
      return;
    }

    const hasChildList = Array.from(item.children).some(
      (child) => child instanceof HTMLUListElement
    );

    item.classList.toggle("section-nav__menu__has-children", hasChildList);

    if (hasChildList) {
      const directLink = Array.from(item.children).find((child) => child instanceof HTMLAnchorElement);

      if (directLink instanceof HTMLAnchorElement) {
        directLink.setAttribute("aria-expanded", item.classList.contains("section-nav__menu__has-children-open") ? "true" : "false");
      }
    }
  });

  sectionNavMenu.addEventListener("click", (event) => {
    const target = event.target;

    if (!(target instanceof HTMLElement)) {
      return;
    }

    const link = target.closest("a");

    if (!(link instanceof HTMLAnchorElement)) {
      return;
    }

    const item = link.parentElement;

    if (!(item instanceof HTMLLIElement) || !item.classList.contains("section-nav__menu__has-children")) {
      return;
    }

    const isDirectChildLink = Array.from(item.children).includes(link);

    if (!isDirectChildLink) {
      return;
    }

    event.preventDefault();

    const willOpen = !item.classList.contains("section-nav__menu__has-children-open");

    if (topLevelList instanceof HTMLUListElement && item.parentElement === topLevelList && willOpen) {
      Array.from(topLevelList.children).forEach((sibling) => {
        if (!(sibling instanceof HTMLLIElement) || sibling === item) {
          return;
        }

        sibling.classList.remove("section-nav__menu__has-children-open");

        const siblingLink = Array.from(sibling.children).find((child) => child instanceof HTMLAnchorElement);

        if (siblingLink instanceof HTMLAnchorElement) {
          siblingLink.setAttribute("aria-expanded", "false");
        }
      });
    }

    item.classList.toggle("section-nav__menu__has-children-open", willOpen);
    link.setAttribute("aria-expanded", willOpen ? "true" : "false");
  });
};

const syncReducedMotionPreference = () => {
  const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)");
  const update = () => {
    document.documentElement.dataset.reducedMotion = reducedMotion.matches ? "true" : "false";
  };

  update();
  reducedMotion.addEventListener("change", update);
};

const initCarouselAnything = () => {
  document.querySelectorAll("[data-lbcc-carousel-anything]").forEach((component) => {
    if (!(component instanceof HTMLElement) || isInitialized(component)) {
      return;
    }

    const swiperElement = component.querySelector("[data-lbcc-carousel-swiper]");
    const scrollbarElement = component.querySelector("[data-lbcc-carousel-scrollbar]");
    const prevButton = component.querySelector("[data-lbcc-carousel-prev]");
    const nextButton = component.querySelector("[data-lbcc-carousel-next]");
    const toggleButton = component.querySelector("[data-lbcc-carousel-toggle]");
    const pauseIcon = component.querySelector('[data-lbcc-carousel-icon="pause"]');
    const playIcon = component.querySelector('[data-lbcc-carousel-icon="play"]');

    if (
      !(swiperElement instanceof HTMLElement) ||
      !(scrollbarElement instanceof HTMLElement) ||
      !(prevButton instanceof HTMLButtonElement) ||
      !(nextButton instanceof HTMLButtonElement) ||
      !(toggleButton instanceof HTMLButtonElement)
    ) {
      return;
    }

    const mobileItems = Number.parseInt(component.dataset.mobileItems || "1", 10) || 1;
    const tabletItems = Number.parseInt(component.dataset.tabletItems || String(mobileItems), 10) || mobileItems;
    const desktopItems = Number.parseInt(component.dataset.desktopItems || String(tabletItems), 10) || tabletItems;
    const autoplayRequested = component.dataset.autoplay === "true";
    const reducedMotionEnabled = document.documentElement.dataset.reducedMotion === "true";

    const swiper = new Swiper(swiperElement, {
      loop: false,
      speed: 500,
      slidesPerView: mobileItems,
      spaceBetween: 24,
      watchOverflow: true,
      autoplay: autoplayRequested ? {
        delay: 4000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
      } : false,
      scrollbar: {
        el: scrollbarElement,
        draggable: true
      },
      navigation: {
        nextEl: nextButton,
        prevEl: prevButton
      },
      breakpoints: {
        768: {
          slidesPerView: tabletItems
        },
        1200: {
          slidesPerView: desktopItems
        }
      }
    });

    let isPaused = !autoplayRequested || reducedMotionEnabled;

    const setToggleState = (paused) => {
      toggleButton.setAttribute("aria-pressed", paused ? "true" : "false");
      toggleButton.setAttribute("aria-label", paused ? "Play carousel autoplay" : "Pause carousel autoplay");

      if (pauseIcon instanceof HTMLElement) {
        pauseIcon.classList.toggle("d-none", paused);
      }

      if (playIcon instanceof HTMLElement) {
        playIcon.classList.toggle("d-none", !paused);
      }
    };

    const syncControlState = () => {
      const locked = swiper.isLocked;

      prevButton.disabled = locked;
      nextButton.disabled = locked;
      scrollbarElement.classList.toggle("opacity-50", locked);

      if (!autoplayRequested || locked) {
        toggleButton.classList.add("d-none");
      } else {
        toggleButton.classList.remove("d-none");
      }
    };

    if (reducedMotionEnabled && swiper.autoplay) {
      swiper.autoplay.stop();
    }

    setToggleState(isPaused);
    syncControlState();

    swiper.on("lock", syncControlState);
    swiper.on("unlock", syncControlState);
    swiper.on("breakpoint", syncControlState);
    swiper.on("resize", syncControlState);

    toggleButton.addEventListener("click", () => {
      if (!autoplayRequested || !swiper.autoplay) {
        return;
      }

      if (isPaused) {
        swiper.autoplay.start();
      } else {
        swiper.autoplay.stop();
      }

      isPaused = !isPaused;
      setToggleState(isPaused);
    });

    markInitialized(component);
  });
};

const initFooterIHeartLb = () => {
  document.querySelectorAll("[data-lbcc-i-heart-lb]").forEach((component) => {
    if (!(component instanceof HTMLElement) || isInitialized(component)) {
      return;
    }

    const swiperElement = component.querySelector("[data-lbcc-i-heart-lb-swiper]");
    const toggleButton = component.querySelector("[data-lbcc-i-heart-lb-toggle]");
    const pauseIcon = component.querySelector('[data-lbcc-i-heart-lb-icon="pause"]');
    const playIcon = component.querySelector('[data-lbcc-i-heart-lb-icon="play"]');

    if (!(swiperElement instanceof HTMLElement) || !(toggleButton instanceof HTMLButtonElement)) {
      return;
    }

    const slides = Array.from(swiperElement.querySelectorAll(".swiper-slide")).filter(
      (slide) => slide instanceof HTMLElement
    );

    if (!slides.length) {
      return;
    }

    const reducedMotionEnabled = document.documentElement.dataset.reducedMotion === "true";
    const transitionPresets = [
      {
        enter: { opacity: [0, 1] },
        exit: { opacity: [1, 0] },
        duration: 0.4
      },
      {
        enter: { opacity: [0, 1], rotateY: [-24, 0], scale: [0.985, 1] },
        exit: { opacity: [1, 0], rotateY: [0, 24], scale: [1, 0.985] },
        duration: 0.46
      },
      {
        enter: { opacity: [0, 1], rotate: [-8, 0], scale: [0.975, 1] },
        exit: { opacity: [1, 0], rotate: [0, 8], scale: [1, 0.975] },
        duration: 0.44
      }
    ];
    const transitionEase = [0.16, 1, 0.3, 1];
    const autoplayDelay = 675;
    let currentIndex = 0;
    let currentTransitionIndex = 0;
    let timeoutId = null;
    let isTransitioning = false;
    let isPaused = reducedMotionEnabled || slides.length < 2;

    const resetSlideStyles = (slide, active = false) => {
      slide.classList.toggle("is-active", active);
      slide.style.opacity = active ? "1" : "0";
      slide.style.transform = "none";
      slide.style.clipPath = "";
      slide.style.filter = "";
      slide.style.zIndex = active ? "2" : "1";
    };

    slides.forEach((slide, index) => {
      resetSlideStyles(slide, index === 0);
    });

    const setToggleState = (paused) => {
      toggleButton.setAttribute("aria-pressed", paused ? "true" : "false");
      toggleButton.setAttribute("aria-label", paused ? "Play heart animation" : "Pause heart animation");

      if (pauseIcon instanceof HTMLElement) {
        pauseIcon.classList.toggle("d-none", paused);
      }

      if (playIcon instanceof HTMLElement) {
        playIcon.classList.toggle("d-none", !paused);
      }
    };

    const queueNextTransition = () => {
      if (isPaused || slides.length < 2) {
        return;
      }

      window.clearTimeout(timeoutId);
      timeoutId = window.setTimeout(() => {
        if (isTransitioning) {
          return;
        }

        const currentSlide = slides[currentIndex];
        const nextIndex = (currentIndex + 1) % slides.length;
        const nextSlide = slides[nextIndex];
        const preset = transitionPresets[currentTransitionIndex % transitionPresets.length];

        currentTransitionIndex += 1;
        isTransitioning = true;

        nextSlide.classList.add("is-active");
        nextSlide.style.opacity = "0";
        nextSlide.style.transform = "none";
        nextSlide.style.clipPath = "";
        nextSlide.style.zIndex = "3";
        currentSlide.style.zIndex = "2";

        const exitAnimation = animate(currentSlide, preset.exit, {
          duration: preset.duration,
          easing: transitionEase,
          fill: "forwards"
        });
        const enterAnimation = animate(nextSlide, preset.enter, {
          duration: preset.duration,
          easing: transitionEase,
          fill: "forwards"
        });

        Promise.all([exitAnimation.finished, enterAnimation.finished]).finally(() => {
          resetSlideStyles(currentSlide, false);
          resetSlideStyles(nextSlide, true);
          currentIndex = nextIndex;
          isTransitioning = false;
          queueNextTransition();
        });
      }, autoplayDelay);
    };

    setToggleState(isPaused);
    queueNextTransition();

    toggleButton.addEventListener("click", () => {
      if (slides.length < 2) {
        return;
      }

      if (isPaused) {
        isPaused = false;
        setToggleState(isPaused);
        queueNextTransition();
      } else {
        isPaused = true;
        window.clearTimeout(timeoutId);
        setToggleState(isPaused);
      }
    });

    markInitialized(component);
  });
};

const initTestimonialCarousel = () => {
  document.querySelectorAll("[data-lbcc-testimonial-carousel]").forEach((component) => {
    if (!(component instanceof HTMLElement) || isInitialized(component)) {
      return;
    }

    const swiperElement = component.querySelector("[data-lbcc-testimonial-swiper]");
    const thumbButtons = Array.from(component.querySelectorAll("[data-lbcc-testimonial-thumb]")).filter(
      (button) => button instanceof HTMLButtonElement
    );
    const toggleButton = component.querySelector("[data-lbcc-testimonial-toggle]");
    const pauseIcon = component.querySelector('[data-lbcc-testimonial-icon="pause"]');
    const playIcon = component.querySelector('[data-lbcc-testimonial-icon="play"]');

    if (!(swiperElement instanceof HTMLElement) || !(toggleButton instanceof HTMLButtonElement)) {
      return;
    }

    const autoplayRequested = component.dataset.autoplay === "true";
    const reducedMotionEnabled = document.documentElement.dataset.reducedMotion === "true";
    const swiper = new Swiper(swiperElement, {
      effect: "fade",
      fadeEffect: {
        crossFade: true
      },
      loop: true,
      speed: 600,
      slidesPerView: 1,
      allowTouchMove: true,
      autoplay: autoplayRequested && !reducedMotionEnabled ? {
        delay: 4500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
      } : false
    });

    let isPaused = reducedMotionEnabled || !swiper.autoplay;

    const setActiveThumb = (realIndex) => {
      thumbButtons.forEach((button, index) => {
        const isActive = index === realIndex;
        button.classList.toggle("is-active", isActive);
        button.setAttribute("aria-pressed", isActive ? "true" : "false");
      });
    };

    const setToggleState = (paused) => {
      toggleButton.setAttribute("aria-pressed", paused ? "true" : "false");
      toggleButton.setAttribute("aria-label", paused ? "Play testimonial autoplay" : "Pause testimonial autoplay");

      if (pauseIcon instanceof HTMLElement) {
        pauseIcon.classList.toggle("d-none", paused);
      }

      if (playIcon instanceof HTMLElement) {
        playIcon.classList.toggle("d-none", !paused);
      }
    };

    setActiveThumb(swiper.realIndex);
    setToggleState(isPaused);

    swiper.on("slideChange", () => {
      setActiveThumb(swiper.realIndex);
    });

    thumbButtons.forEach((button, index) => {
      button.addEventListener("click", () => {
        swiper.slideToLoop(index);
      });
    });

    toggleButton.addEventListener("click", () => {
      if (!swiper.autoplay) {
        return;
      }

      if (isPaused) {
        swiper.autoplay.start();
      } else {
        swiper.autoplay.stop();
      }

      isPaused = !isPaused;
      setToggleState(isPaused);
    });

    markInitialized(component);
  });
};

const initVerticalSlider = () => {
  document.querySelectorAll("[data-lbcc-vertical-slider]").forEach((component) => {
    if (!(component instanceof HTMLElement) || isInitialized(component)) {
      return;
    }

    const swiperElement = component.querySelector("[data-lbcc-vertical-slider-swiper]");
    const prevButton = component.querySelector("[data-lbcc-vertical-slider-prev]");
    const nextButton = component.querySelector("[data-lbcc-vertical-slider-next]");
    const toggleButton = component.querySelector("[data-lbcc-vertical-slider-toggle]");
    const pauseIcon = component.querySelector('[data-lbcc-vertical-slider-icon="pause"]');
    const playIcon = component.querySelector('[data-lbcc-vertical-slider-icon="play"]');

    if (
      !(swiperElement instanceof HTMLElement) ||
      !(prevButton instanceof HTMLButtonElement) ||
      !(nextButton instanceof HTMLButtonElement)
    ) {
      return;
    }

    const slideCount = swiperElement.querySelectorAll(".swiper-slide").length;
    const canRotate = slideCount > 1;
    const reducedMotionEnabled = document.documentElement.dataset.reducedMotion === "true";
    const autoplayRequested = component.dataset.autoplay === "true" && canRotate && !reducedMotionEnabled;

    const swiper = new Swiper(swiperElement, {
      direction: "vertical",
      centeredSlides: true,
      slidesPerView: 1.6,
      spaceBetween: 16,
      speed: 650,
      loop: canRotate,
      watchSlidesProgress: true,
      allowTouchMove: canRotate,
      autoplay: autoplayRequested ? {
        delay: 2800,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
      } : false,
      navigation: {
        prevEl: prevButton,
        nextEl: nextButton
      }
    });

    let isPaused = !autoplayRequested;

    const setToggleState = (paused) => {
      if (!(toggleButton instanceof HTMLButtonElement)) {
        return;
      }

      toggleButton.setAttribute("aria-pressed", paused ? "true" : "false");
      toggleButton.setAttribute("aria-label", paused ? "Play vertical slider autoplay" : "Pause vertical slider autoplay");

      if (pauseIcon instanceof HTMLElement) {
        pauseIcon.classList.toggle("d-none", paused);
      }

      if (playIcon instanceof HTMLElement) {
        playIcon.classList.toggle("d-none", !paused);
      }
    };

    prevButton.disabled = !canRotate;
    nextButton.disabled = !canRotate;

    if (toggleButton instanceof HTMLButtonElement) {
      if (!canRotate) {
        toggleButton.classList.add("d-none");
      }

      setToggleState(isPaused);

      toggleButton.addEventListener("click", () => {
        if (!swiper.autoplay) {
          return;
        }

        if (isPaused) {
          swiper.autoplay.start();
        } else {
          swiper.autoplay.stop();
        }

        isPaused = !isPaused;
        setToggleState(isPaused);
      });
    }

    markInitialized(component);
  });
};

const initFadeSlider = () => {
  document.querySelectorAll("[data-lbcc-fade-slider]").forEach((component) => {
    if (!(component instanceof HTMLElement) || isInitialized(component)) {
      return;
    }

    const swiperElement = component.querySelector("[data-lbcc-fade-slider-swiper]");
    const toggleButton = component.querySelector("[data-lbcc-fade-slider-toggle]");
    const pauseIcon = component.querySelector('[data-lbcc-fade-slider-icon="pause"]');
    const playIcon = component.querySelector('[data-lbcc-fade-slider-icon="play"]');

    if (!(swiperElement instanceof HTMLElement)) {
      return;
    }

    const slideCount = swiperElement.querySelectorAll(".swiper-slide").length;
    const canRotate = slideCount > 1;
    const reducedMotionEnabled = document.documentElement.dataset.reducedMotion === "true";
    const autoplayRequested = component.dataset.autoplay === "true" && canRotate && !reducedMotionEnabled;

    const swiper = new Swiper(swiperElement, {
      effect: "fade",
      fadeEffect: {
        crossFade: true
      },
      slidesPerView: 1,
      speed: 800,
      loop: canRotate,
      allowTouchMove: canRotate,
      autoplay: autoplayRequested ? {
        delay: 3000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
      } : false
    });

    let isPaused = !autoplayRequested;

    const setToggleState = (paused) => {
      if (!(toggleButton instanceof HTMLButtonElement)) {
        return;
      }

      toggleButton.setAttribute("aria-pressed", paused ? "true" : "false");
      toggleButton.setAttribute("aria-label", paused ? "Play slideshow autoplay" : "Pause slideshow autoplay");

      if (pauseIcon instanceof HTMLElement) {
        pauseIcon.classList.toggle("d-none", paused);
      }

      if (playIcon instanceof HTMLElement) {
        playIcon.classList.toggle("d-none", !paused);
      }
    };

    if (toggleButton instanceof HTMLButtonElement) {
      setToggleState(isPaused);

      toggleButton.addEventListener("click", () => {
        if (!swiper.autoplay) {
          return;
        }

        if (isPaused) {
          swiper.autoplay.start();
        } else {
          swiper.autoplay.stop();
        }

        isPaused = !isPaused;
        setToggleState(isPaused);
      });
    }

    markInitialized(component);
  });
};

const initQuietVideo = () => {
  document.querySelectorAll("[data-lbcc-quiet-video]").forEach((component) => {
    if (!(component instanceof HTMLElement) || isInitialized(component)) {
      return;
    }

    const video = component.querySelector("[data-lbcc-quiet-video-element]");
    const toggleButton = component.querySelector("[data-lbcc-quiet-video-toggle]");
    const pauseIcon = component.querySelector('[data-lbcc-quiet-video-icon="pause"]');
    const playIcon = component.querySelector('[data-lbcc-quiet-video-icon="play"]');

    if (!(video instanceof HTMLVideoElement) || !(toggleButton instanceof HTMLButtonElement)) {
      return;
    }

    const reducedMotionEnabled = document.documentElement.dataset.reducedMotion === "true";
    const autoplayRequested = component.dataset.autoplay === "true";
    let isPaused = !autoplayRequested || reducedMotionEnabled;

    const setToggleState = (paused) => {
      toggleButton.setAttribute("aria-pressed", paused ? "true" : "false");
      toggleButton.setAttribute("aria-label", paused ? "Play video playback" : "Pause video playback");

      if (pauseIcon instanceof HTMLElement) {
        pauseIcon.classList.toggle("d-none", paused);
      }

      if (playIcon instanceof HTMLElement) {
        playIcon.classList.toggle("d-none", !paused);
      }
    };

    const syncPausedState = (paused) => {
      isPaused = paused;
      setToggleState(paused);
    };

    const playVideo = () => {
      const playPromise = video.play();

      if (playPromise && typeof playPromise.catch === "function") {
        playPromise.then(() => {
          syncPausedState(false);
        }).catch(() => {
          syncPausedState(true);
        });
      } else {
        syncPausedState(false);
      }
    };

    const pauseVideo = () => {
      video.pause();
      syncPausedState(true);
    };

    video.addEventListener("play", () => {
      syncPausedState(false);
    });

    video.addEventListener("pause", () => {
      if (!video.ended) {
        syncPausedState(true);
      }
    });

    if (isPaused) {
      pauseVideo();
    } else {
      playVideo();
    }

    toggleButton.addEventListener("click", () => {
      if (isPaused) {
        playVideo();
      } else {
        pauseVideo();
      }
    });

    markInitialized(component);
  });
};

const initTicker = () => {
  document.querySelectorAll("[data-lbcc-ticker]").forEach((component) => {
    if (!(component instanceof HTMLElement) || isInitialized(component)) {
      return;
    }

    const swiperElement = component.querySelector("[data-lbcc-ticker-swiper]");
    const toggleButtons = Array.from(component.querySelectorAll("[data-lbcc-ticker-toggle]")).filter(
      (button) => button instanceof HTMLButtonElement
    );
    const pauseIcons = Array.from(component.querySelectorAll('[data-lbcc-ticker-icon="pause"]')).filter(
      (icon) => icon instanceof HTMLElement
    );
    const playIcons = Array.from(component.querySelectorAll('[data-lbcc-ticker-icon="play"]')).filter(
      (icon) => icon instanceof HTMLElement
    );

    if (!(swiperElement instanceof HTMLElement)) {
      return;
    }

    const slideCount = swiperElement.querySelectorAll(".swiper-slide").length;
    const canRotate = slideCount > 1;
    const reducedMotionEnabled = document.documentElement.dataset.reducedMotion === "true";
    const autoplayRequested = component.dataset.autoplay === "true" && canRotate && !reducedMotionEnabled;

    const swiper = new Swiper(swiperElement, {
      slidesPerView: 1,
      spaceBetween: 16,
      speed: 975,
      loop: canRotate,
      watchOverflow: true,
      allowTouchMove: canRotate,
      autoplay: autoplayRequested ? {
        delay: 3900,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
      } : false,
      breakpoints: {
        768: {
          slidesPerView: "auto",
          spaceBetween: 24
        }
      }
    });

    let isPaused = !autoplayRequested;

    const setToggleState = (paused) => {
      toggleButtons.forEach((button) => {
        button.setAttribute("aria-pressed", paused ? "true" : "false");
        button.setAttribute("aria-label", paused ? "Play ticker autoplay" : "Pause ticker autoplay");
      });

      pauseIcons.forEach((icon) => {
        icon.classList.toggle("d-none", paused);
      });

      playIcons.forEach((icon) => {
        icon.classList.toggle("d-none", !paused);
      });
    };

    if (!canRotate) {
      toggleButtons.forEach((button) => {
        button.classList.add("d-none");
      });
    } else {
      setToggleState(isPaused);

      toggleButtons.forEach((button) => {
        button.addEventListener("click", () => {
          if (!swiper.autoplay) {
            return;
          }

          if (isPaused) {
            swiper.autoplay.start();
          } else {
            swiper.autoplay.stop();
          }

          isPaused = !isPaused;
          setToggleState(isPaused);
        });
      });
    }

    markInitialized(component);
  });
};

const initHeroMediaSwipers = () => {
  document.querySelectorAll("[data-lbcc-hero-media-swiper]").forEach((swiperElement) => {
    if (!(swiperElement instanceof HTMLElement) || isInitialized(swiperElement)) {
      return;
    }

    const reducedMotionEnabled = document.documentElement.dataset.reducedMotion === "true";

    const swiper = new Swiper(swiperElement, {
      effect: "fade",
      fadeEffect: {
        crossFade: true
      },
      loop: true,
      speed: 700,
      slidesPerView: 1,
      allowTouchMove: true,
      autoHeight: false,
      autoplay: reducedMotionEnabled ? false : {
        delay: 4000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
      }
    });

    if (reducedMotionEnabled && swiper.autoplay) {
      swiper.autoplay.stop();
    }

    markInitialized(swiperElement);
  });
};

const initHeroMediaControls = () => {
  document.querySelectorAll("[data-lbcc-hero-media-control]").forEach((control) => {
    if (!(control instanceof HTMLButtonElement) || isInitialized(control)) {
      return;
    }

    const hero = control.closest(".component-hero");

    if (!(hero instanceof HTMLElement)) {
      return;
    }

    const pauseIcon = control.querySelector('[data-lbcc-hero-media-icon="pause"]');
    const playIcon = control.querySelector('[data-lbcc-hero-media-icon="play"]');
    const videoElements = Array.from(hero.querySelectorAll(".component-hero__media video")).filter(
      (video) => video instanceof HTMLVideoElement
    );
    const swiperElements = Array.from(hero.querySelectorAll("[data-lbcc-hero-media-swiper]")).filter(
      (swiperElement) => swiperElement instanceof HTMLElement
    );

    const getSwiperInstances = () => swiperElements
      .map((swiperElement) => swiperElement.swiper)
      .filter((swiperInstance) => swiperInstance && swiperInstance.autoplay);

    let isPaused = document.documentElement.dataset.reducedMotion === "true";

    const setToggleState = (paused) => {
      control.setAttribute("aria-pressed", paused ? "true" : "false");
      control.setAttribute("aria-label", paused ? "Play hero media" : "Pause hero media");

      if (pauseIcon instanceof HTMLElement) {
        pauseIcon.classList.toggle("d-none", paused);
      }

      if (playIcon instanceof HTMLElement) {
        playIcon.classList.toggle("d-none", !paused);
      }
    };

    const pauseMedia = () => {
      getSwiperInstances().forEach((swiperInstance) => {
        swiperInstance.autoplay.stop();
      });

      videoElements.forEach((videoElement) => {
        videoElement.pause();
      });
    };

    const playMedia = () => {
      getSwiperInstances().forEach((swiperInstance) => {
        swiperInstance.autoplay.start();
      });

      videoElements.forEach((videoElement) => {
        videoElement.play().catch(() => {});
      });
    };

    if (isPaused) {
      pauseMedia();
    }

    setToggleState(isPaused);

    control.addEventListener("click", () => {
      if (isPaused) {
        playMedia();
      } else {
        pauseMedia();
      }

      isPaused = !isPaused;
      setToggleState(isPaused);
    });

    markInitialized(control);
  });
};

const initHeroBackgroundParallax = () => {
  const mediaLayers = Array.from(document.querySelectorAll(
    ".component-hero__media-slot--background-media-right .component-hero__image, " +
    ".component-hero__media-slot--background-media-right .component-hero__video, " +
    ".component-hero__media-slot--background-media-left .component-hero__image, " +
    ".component-hero__media-slot--background-media-left .component-hero__video"
  )).filter((element) => element instanceof HTMLElement);

  if (!mediaLayers.length) {
    return;
  }

  const desktopQuery = window.matchMedia("(min-width: 992px)");
  const baseScale = 1.08;
  const maxOffset = 36;
  let ticking = false;

  const resetTransforms = () => {
    mediaLayers.forEach((layer) => {
      layer.style.transform = `translate3d(0, 0, 0) scale(${baseScale})`;
    });
  };

  const updateParallax = () => {
    ticking = false;

    if (document.documentElement.dataset.reducedMotion === "true" || !desktopQuery.matches) {
      resetTransforms();
      return;
    }

    const viewportHeight = window.innerHeight || document.documentElement.clientHeight;
    const viewportCenter = viewportHeight / 2;

    mediaLayers.forEach((layer) => {
      const rect = layer.getBoundingClientRect();

      if (rect.bottom < 0 || rect.top > viewportHeight) {
        layer.style.transform = `translate3d(0, 0, 0) scale(${baseScale})`;
        return;
      }

      const elementCenter = rect.top + (rect.height / 2);
      const progress = (viewportCenter - elementCenter) / (viewportHeight / 2);
      const clampedProgress = Math.max(-1, Math.min(1, progress));
      const offset = clampedProgress * maxOffset;

      layer.style.transform = `translate3d(0, ${offset}px, 0) scale(${baseScale})`;
    });
  };

  const queueParallaxUpdate = () => {
    if (ticking) {
      return;
    }

    ticking = true;
    window.requestAnimationFrame(updateParallax);
  };

  resetTransforms();
  updateParallax();
  window.addEventListener("scroll", queueParallaxUpdate, { passive: true });
  window.addEventListener("resize", queueParallaxUpdate);
  window.addEventListener("load", queueParallaxUpdate);
  desktopQuery.addEventListener("change", queueParallaxUpdate);
};

const initDirectoryFilters = () => {
  document.querySelectorAll("[data-lbcc-directory]").forEach((directory) => {
    if (!(directory instanceof HTMLElement) || isInitialized(directory)) {
      return;
    }

    const searchInput = directory.querySelector("[data-lbcc-directory-search]");
    const departmentSelect = directory.querySelector("[data-lbcc-directory-department]");
    const entries = Array.from(directory.querySelectorAll("[data-lbcc-directory-entry]")).filter(
      (entry) => entry instanceof HTMLElement
    );
    const sections = Array.from(directory.querySelectorAll("[data-lbcc-directory-section]")).filter(
      (section) => section instanceof HTMLElement
    );
    const emptyState = directory.querySelector("[data-lbcc-directory-empty]");

    if (!(searchInput instanceof HTMLInputElement) || !(departmentSelect instanceof HTMLSelectElement) || !entries.length) {
      return;
    }

    const normalizeValue = (value) => value.trim().toLowerCase();

    const applyFilters = () => {
      const searchQuery = normalizeValue(searchInput.value);
      const selectedDepartment = departmentSelect.value;
      let visibleEntries = 0;

      entries.forEach((entry) => {
        const searchIndex = entry.dataset.searchIndex || "";
        const department = entry.dataset.department || "";
        const matchesSearch = searchQuery === "" || searchIndex.includes(searchQuery);
        const matchesDepartment = selectedDepartment === "" || department === selectedDepartment;
        const isVisible = matchesSearch && matchesDepartment;

        entry.classList.toggle("d-none", !isVisible);

        if (isVisible) {
          visibleEntries += 1;
        }
      });

      sections.forEach((section) => {
        const hasVisibleEntries = Array.from(section.querySelectorAll("[data-lbcc-directory-entry]")).some(
          (entry) => entry instanceof HTMLElement && !entry.classList.contains("d-none")
        );

        section.classList.toggle("d-none", !hasVisibleEntries);
      });

      if (emptyState instanceof HTMLElement) {
        emptyState.classList.toggle("d-none", visibleEntries !== 0);
      }
    };

    searchInput.addEventListener("input", applyFilters);
    departmentSelect.addEventListener("change", applyFilters);

    applyFilters();
    markInitialized(directory);
  });
};

const initProgramsFilters = () => {
  document.querySelectorAll("[data-lbcc-programs]").forEach((programsPage) => {
    if (!(programsPage instanceof HTMLElement) || isInitialized(programsPage)) {
      return;
    }

    const searchInput = programsPage.querySelector("[data-lbcc-programs-search] [data-lbcc-search-programs-input]") ||
      programsPage.querySelector("[data-lbcc-programs-search]");
    const departmentToggle = programsPage.querySelector("[data-lbcc-programs-department-toggle]");
    const departmentLabel = programsPage.querySelector("[data-lbcc-programs-department-label]");
    const sortSelect = programsPage.querySelector("[data-lbcc-programs-sort]");
    const grid = programsPage.querySelector("[data-lbcc-programs-grid]");
    const entries = Array.from(programsPage.querySelectorAll("[data-lbcc-program-card]")).filter(
      (entry) => entry instanceof HTMLElement
    );
    const pathwayInputs = Array.from(programsPage.querySelectorAll("[data-lbcc-programs-pathway]")).filter(
      (input) => input instanceof HTMLInputElement
    );
    const optionInputs = Array.from(programsPage.querySelectorAll("[data-lbcc-programs-option]")).filter(
      (input) => input instanceof HTMLInputElement
    );
    const departmentOptions = Array.from(programsPage.querySelectorAll("[data-lbcc-programs-department-option]")).filter(
      (option) => option instanceof HTMLButtonElement
    );
    const activeFilters = programsPage.querySelector("[data-lbcc-programs-active-filters]");
    const countElement = programsPage.querySelector("[data-lbcc-programs-count]");
    const emptyState = programsPage.querySelector("[data-lbcc-programs-empty]");
    const filterCountBadges = Array.from(programsPage.querySelectorAll("[data-lbcc-programs-filter-count]")).filter(
      (badge) => badge instanceof HTMLElement
    );

    if (
      !(searchInput instanceof HTMLInputElement) ||
      !(departmentToggle instanceof HTMLElement) ||
      !(departmentLabel instanceof HTMLElement) ||
      !(sortSelect instanceof HTMLSelectElement) ||
      !(grid instanceof HTMLElement) ||
      !entries.length
    ) {
      return;
    }

    const normalizeValue = (value) => value.trim().toLowerCase();
    const getSelectedValues = (inputs) => inputs
      .filter((input) => input.checked)
      .map((input) => normalizeValue(input.value))
      .filter(Boolean);
    const getSelectedDepartmentValues = () => departmentOptions
      .filter((option) => option.classList.contains("is-active"))
      .map((option) => normalizeValue(option.dataset.value || ""))
      .filter(Boolean);
    const getEntryColumn = (entry) => entry.closest(".col");
    const getEntryOptions = (entry) => {
      const programOptions = entry.dataset.programOptions || "";

      if (programOptions === "") {
        return [];
      }

      return programOptions.split("|").map((value) => value.trim()).filter(Boolean);
    };

    const updateDepartmentLabel = () => {
      const selectedLabels = departmentOptions
        .filter((option) => option.classList.contains("is-active"))
        .map((option) => option.dataset.label || "")
        .filter(Boolean);
      const placeholder = departmentToggle.dataset.placeholder || "Select departments...";

      if (!selectedLabels.length) {
        departmentLabel.textContent = placeholder;
        return;
      }

      if (selectedLabels.length <= 2) {
        departmentLabel.textContent = selectedLabels.join(", ");
        return;
      }

      departmentLabel.textContent = `${selectedLabels.length} departments selected`;
    };

    const updateSelectedFilterCount = () => {
      const totalSelected = getSelectedValues(pathwayInputs).length +
        getSelectedValues(optionInputs).length +
        getSelectedDepartmentValues().length;

      filterCountBadges.forEach((badge) => {
        badge.textContent = String(totalSelected);
      });
    };

    const renderActiveFilters = () => {
      if (!(activeFilters instanceof HTMLElement)) {
        return;
      }

      const items = [];

      pathwayInputs.forEach((input) => {
        if (!input.checked) {
          return;
        }

        const label = programsPage.querySelector(`label[for="${input.id}"] .programs-filter-option__label`);

        items.push({
          group: "pathway",
          value: input.value,
          label: label instanceof HTMLElement ? label.textContent.trim() : input.value
        });
      });

      optionInputs.forEach((input) => {
        if (!input.checked) {
          return;
        }

        const label = programsPage.querySelector(`label[for="${input.id}"] .programs-filter-check__label`);

        items.push({
          group: "option",
          value: input.value,
          label: label instanceof HTMLElement ? label.textContent.trim() : input.value
        });
      });

      departmentOptions.forEach((option) => {
        if (!option.classList.contains("is-active")) {
          return;
        }

        items.push({
          group: "department",
          value: option.dataset.value || "",
          label: option.dataset.label || option.dataset.value || ""
        });
      });

      activeFilters.innerHTML = "";
      activeFilters.classList.toggle("d-none", items.length === 0);

      items.forEach((item) => {
        const chip = document.createElement("button");
        chip.type = "button";
        chip.className = "programs-active-filter btn btn-sm btn-outline-secondary rounded-pill d-inline-flex align-items-center gap-2";
        chip.dataset.lbccProgramsActiveFilter = "true";
        chip.dataset.filterGroup = item.group;
        chip.dataset.filterValue = item.value;
        chip.innerHTML = `<span>${item.label}</span><span class="fa-sharp fa-regular fa-xmark" aria-hidden="true"></span>`;
        activeFilters.appendChild(chip);
      });
    };

    const setDepartmentOptionState = (option, active) => {
      option.classList.toggle("is-active", active);
      option.setAttribute("aria-pressed", active ? "true" : "false");
    };

    const sortEntries = () => {
      const sortValue = sortSelect.value;
      const sortedEntries = [...entries].sort((left, right) => {
        const leftTitle = left.dataset.title || "";
        const rightTitle = right.dataset.title || "";

        return sortValue === "za"
          ? rightTitle.localeCompare(leftTitle)
          : leftTitle.localeCompare(rightTitle);
      });

      sortedEntries.forEach((entry) => {
        const column = getEntryColumn(entry);

        if (!(column instanceof HTMLElement)) {
          return;
        }

        grid.appendChild(column);
      });
    };

    const applyFilters = () => {
      const searchQuery = normalizeValue(searchInput.value);
      const selectedDepartments = getSelectedDepartmentValues();
      const selectedPathways = getSelectedValues(pathwayInputs);
      const selectedOptions = getSelectedValues(optionInputs);
      let visibleEntries = 0;

      entries.forEach((entry) => {
        const column = getEntryColumn(entry);

        if (!(column instanceof HTMLElement)) {
          return;
        }

        const searchIndex = entry.dataset.searchIndex || "";
        const departmentValue = (entry.dataset.department || "").trim();
        const entryPathway = (entry.dataset.pathway || "").trim();
        const entryOptions = getEntryOptions(entry);
        const matchesSearch = searchQuery === "" || searchIndex.includes(searchQuery);
        const matchesDepartment = selectedDepartments.length === 0 || selectedDepartments.includes(departmentValue);
        const matchesPathway = selectedPathways.length === 0 || selectedPathways.includes(entryPathway);
        const matchesProgramOption = selectedOptions.length === 0 || selectedOptions.some((option) => entryOptions.includes(option));
        const isVisible = matchesSearch && matchesDepartment && matchesPathway && matchesProgramOption;

        column.classList.toggle("d-none", !isVisible);

        if (isVisible) {
          visibleEntries += 1;
        }
      });

      if (countElement instanceof HTMLElement) {
        countElement.textContent = `Showing ${visibleEntries} program${visibleEntries === 1 ? "" : "s"}`;
      }

      if (emptyState instanceof HTMLElement) {
        emptyState.classList.toggle("d-none", visibleEntries !== 0);
      }

      updateDepartmentLabel();
      updateSelectedFilterCount();
      renderActiveFilters();
      sortEntries();
    };

    searchInput.addEventListener("input", applyFilters);
    sortSelect.addEventListener("change", applyFilters);

    pathwayInputs.forEach((input) => {
      input.addEventListener("change", applyFilters);
    });

    optionInputs.forEach((input) => {
      input.addEventListener("change", applyFilters);
    });

    departmentOptions.forEach((option) => {
      option.addEventListener("click", () => {
        setDepartmentOptionState(option, !option.classList.contains("is-active"));
        applyFilters();
      });
    });

    if (activeFilters instanceof HTMLElement) {
      activeFilters.addEventListener("click", (event) => {
        const target = event.target;

        if (!(target instanceof HTMLElement)) {
          return;
        }

        const chip = target.closest("[data-lbcc-programs-active-filter]");

        if (!(chip instanceof HTMLButtonElement)) {
          return;
        }

        const filterGroup = chip.dataset.filterGroup || "";
        const filterValue = chip.dataset.filterValue || "";

        if (filterGroup === "pathway") {
          const input = pathwayInputs.find((item) => normalizeValue(item.value) === normalizeValue(filterValue));

          if (input) {
            input.checked = false;
          }
        } else if (filterGroup === "option") {
          const input = optionInputs.find((item) => normalizeValue(item.value) === normalizeValue(filterValue));

          if (input) {
            input.checked = false;
          }
        } else if (filterGroup === "department") {
          const option = departmentOptions.find((item) => normalizeValue(item.dataset.value || "") === normalizeValue(filterValue));

          if (option) {
            setDepartmentOptionState(option, false);
          }
        }

        applyFilters();
      });
    }

    applyFilters();
    markInitialized(programsPage);
  });
};

const initSearchPrograms = () => {
  document.querySelectorAll("[data-lbcc-search-programs]").forEach((searchPrograms) => {
    if (!(searchPrograms instanceof HTMLElement) || isInitialized(searchPrograms)) {
      return;
    }

    const input = searchPrograms.querySelector("[data-lbcc-search-programs-input]");
    const menu = searchPrograms.querySelector("[data-lbcc-search-programs-menu]");
    const emptyState = searchPrograms.querySelector("[data-lbcc-search-programs-empty]");
    const options = Array.from(searchPrograms.querySelectorAll("[data-lbcc-search-programs-option]")).filter(
      (option) => option instanceof HTMLButtonElement
    );

    if (!(input instanceof HTMLInputElement) || !(menu instanceof HTMLElement) || !options.length) {
      return;
    }

    let activeOptionIndex = -1;
    const closeMenu = () => {
      menu.classList.remove("show");
      input.setAttribute("aria-expanded", "false");
      activeOptionIndex = -1;
    };
    const visibleOptions = () => options.filter((option) => !option.classList.contains("d-none"));
    const updateResults = () => {
      const query = input.value.trim().toLowerCase();
      let count = 0;

      options.forEach((option) => {
        const matches = query === "" || (option.dataset.title || "").includes(query);
        option.classList.toggle("d-none", !matches);
        count += matches ? 1 : 0;
      });

      if (emptyState instanceof HTMLElement) {
        emptyState.classList.toggle("d-none", count !== 0);
      }

      menu.classList.add("show");
      input.setAttribute("aria-expanded", "true");
      activeOptionIndex = -1;
    };
    const selectOption = (option) => {
      input.value = option.textContent.trim();
      input.dispatchEvent(new Event("input", { bubbles: true }));
      closeMenu();

      const url = option.dataset.url || "#";
      if (url !== "" && url !== "#") {
        window.location.assign(url);
      }
    };

    input.addEventListener("input", updateResults);
    input.addEventListener("focus", updateResults);
    input.addEventListener("keydown", (event) => {
      const visible = visibleOptions();

      if (event.key === "Escape") {
        closeMenu();
      } else if (event.key === "ArrowDown" && visible.length) {
        event.preventDefault();
        activeOptionIndex = Math.min(activeOptionIndex + 1, visible.length - 1);
        visible[activeOptionIndex].focus();
      } else if (event.key === "Enter" && activeOptionIndex >= 0 && visible[activeOptionIndex]) {
        event.preventDefault();
        selectOption(visible[activeOptionIndex]);
      }
    });
    options.forEach((option) => option.addEventListener("click", () => selectOption(option)));
    document.addEventListener("click", (event) => {
      if (event.target instanceof Node && !searchPrograms.contains(event.target)) {
        closeMenu();
      }
    });

    markInitialized(searchPrograms);
  });
};

const initSupportMatrixFilters = () => {
  document.querySelectorAll("[data-lbcc-support-matrix]").forEach((matrix) => {
    if (!(matrix instanceof HTMLElement) || isInitialized(matrix)) {
      return;
    }

    const needTrigger = matrix.querySelector("[data-lbcc-support-need]");
    const needValueInput = matrix.querySelector("[data-lbcc-support-need-value]");
    const needLabel = matrix.querySelector("[data-lbcc-support-need-label]");
    const needOptions = Array.from(matrix.querySelectorAll("[data-lbcc-support-need-option]")).filter(
      (option) => option instanceof HTMLButtonElement
    );
    const audienceSelect = matrix.querySelector("[data-lbcc-support-audience]");
    const cards = Array.from(matrix.querySelectorAll("[data-lbcc-support-card]")).filter(
      (card) => card instanceof HTMLElement
    );
    const emptyState = matrix.querySelector("[data-lbcc-support-empty]");
    const countElement = matrix.querySelector("[data-lbcc-support-count]");

    if (!cards.length) {
      return;
    }

    const getSelectedValue = (element) => {
      if (element instanceof HTMLSelectElement || element instanceof HTMLInputElement) {
        return element.value.trim();
      }

      if (element instanceof HTMLElement) {
        return (element.dataset.selectedValue || "").trim();
      }

      return "";
    };

    const getCardValues = (element, key) => {
      const rawValue = element.dataset[key] || "";

      if (rawValue === "") {
        return [];
      }

      return rawValue.split("|").map((value) => value.trim()).filter(Boolean);
    };

    const updateCount = (count) => {
      if (!(countElement instanceof HTMLElement)) {
        return;
      }

      countElement.textContent = `Showing ${count} resource${count === 1 ? "" : "s"}`;
    };

    const syncNeedOptions = (selectedValue) => {
      needOptions.forEach((option) => {
        const isActive = option.dataset.value === selectedValue && selectedValue !== "";

        option.classList.toggle("is-active", isActive);
        option.setAttribute("aria-pressed", isActive ? "true" : "false");
      });
    };

    const setNeedValue = (value, labelText) => {
      const normalizedValue = value.trim();

      if (needValueInput instanceof HTMLInputElement) {
        needValueInput.value = normalizedValue;
      }

      if (needTrigger instanceof HTMLElement) {
        needTrigger.dataset.selectedValue = normalizedValue;
      }

      if (needLabel instanceof HTMLElement) {
        const placeholder = needTrigger instanceof HTMLElement ? (needTrigger.dataset.placeholder || "") : "";
        needLabel.textContent = normalizedValue === "" ? placeholder : labelText;
      }

      syncNeedOptions(normalizedValue);
    };

    const applyFilters = () => {
      const selectedNeed = getSelectedValue(needValueInput);
      const selectedAudience = getSelectedValue(audienceSelect);
      let visibleCards = 0;

      cards.forEach((card) => {
        const needs = getCardValues(card, "needs");
        const audiences = getCardValues(card, "audiences");
        const matchesNeed = selectedNeed === "" || needs.includes(selectedNeed);
        const matchesAudience = selectedAudience === "" || audiences.includes(selectedAudience);
        const isVisible = matchesNeed && matchesAudience;

        card.classList.toggle("d-none", !isVisible);

        if (isVisible) {
          visibleCards += 1;
        }
      });

      if (emptyState instanceof HTMLElement) {
        emptyState.classList.toggle("d-none", visibleCards !== 0);
      }

      updateCount(visibleCards);
    };

    if (audienceSelect instanceof HTMLSelectElement) {
      audienceSelect.addEventListener("change", applyFilters);
    }

    needOptions.forEach((option) => {
      option.addEventListener("click", () => {
        const optionValue = (option.dataset.value || "").trim();
        const optionLabel = option.dataset.label || "";
        const currentValue = getSelectedValue(needValueInput);
        const nextValue = optionValue === currentValue ? "" : optionValue;
        const nextLabel = optionValue === currentValue ? "" : optionLabel;

        setNeedValue(nextValue, nextLabel);
        applyFilters();

        if (needTrigger instanceof HTMLElement) {
          Dropdown.getOrCreateInstance(needTrigger).hide();
        }
      });
    });

    setNeedValue(getSelectedValue(needValueInput), needLabel instanceof HTMLElement ? needLabel.textContent || "" : "");
    applyFilters();
    markInitialized(matrix);
  });
};

const initAzIndexSpy = () => {
  document.querySelectorAll("[data-lbcc-az-index]").forEach((index) => {
    if (!(index instanceof HTMLElement) || isInitialized(index)) {
      return;
    }

    const links = Array.from(document.querySelectorAll("[data-lbcc-az-link]")).filter(
      (link) => link instanceof HTMLAnchorElement
    );
    const sectionMap = new Map();
    let ticking = false;

    links.forEach((link) => {
      const href = link.getAttribute("href");

      if (!href || !href.startsWith("#")) {
        return;
      }

      const target = document.querySelector(href);

      if (target instanceof HTMLElement) {
        sectionMap.set(link, target);
      }
    });

    if (!sectionMap.size) {
      return;
    }

    const setActiveLink = (activeLink) => {
      links.forEach((link) => {
        link.classList.toggle("is-active", link === activeLink);
      });
    };

    const updateActiveLink = () => {
      ticking = false;

      const offset = 160;
      let activeLink = null;

      sectionMap.forEach((section, link) => {
        const sectionTop = section.getBoundingClientRect().top;

        if (sectionTop <= offset) {
          activeLink = link;
        }
      });

      if (!activeLink) {
        const firstLink = sectionMap.keys().next();
        activeLink = firstLink.done ? null : firstLink.value;
      }

      setActiveLink(activeLink);
    };

    const queueActiveUpdate = () => {
      if (ticking) {
        return;
      }

      ticking = true;
      window.requestAnimationFrame(updateActiveLink);
    };

    updateActiveLink();
    window.addEventListener("scroll", queueActiveUpdate, { passive: true });
    window.addEventListener("resize", queueActiveUpdate);

    markInitialized(index);
  });
};

const initMatchHeightUtilities = () => {
  if (typeof $.fn.matchHeight !== "function") {
    return;
  }

  const allElements = $(".match-height-all");
  const rowElements = $(".match-height-row");
  const noneElements = $(".match-height-none");

  if (allElements.length) {
    allElements.matchHeight({ remove: true });
    allElements.matchHeight({ byRow: false });
  }

  if (rowElements.length) {
    rowElements.matchHeight({ remove: true });
    rowElements.matchHeight();
  }

  if (noneElements.length) {
    noneElements.matchHeight({ remove: true });
  }
};

LBCC.MatchHeight = {
  init: initMatchHeightUtilities,
  update: initMatchHeightUtilities
};

document.addEventListener("DOMContentLoaded", () => {
  syncReducedMotionPreference();
  moveModalsToBody();
  initBootstrapSet(".accordion .accordion-collapse", Collapse);
  initBootstrapSet("[data-bs-toggle=\"tab\"]", Tab);
  initBootstrapSet("[data-bs-toggle=\"dropdown\"]", Dropdown);
  initBootstrapSet("[data-bs-toggle=\"tooltip\"]", Tooltip);
  initBootstrapSet(".modal", Modal);
  initBootstrapSet(".offcanvas", Offcanvas);
  initGoogleTranslateModal();
  initStickyHeader();
  syncOffcanvasTriggers();
  initDesktopMainNavCollapses();
  initDesktopSearchCollapseFocus();
  syncCollapseMenuTriggers();
  initSectionNavMenu();
  initCarouselAnything();
  initFooterIHeartLb();
  initTestimonialCarousel();
  initVerticalSlider();
  initFadeSlider();
  initQuietVideo();
  initTicker();
  initHeroMediaSwipers();
  initHeroMediaControls();
  initHeroBackgroundParallax();
  initDirectoryFilters();
  initProgramsFilters();
  initSearchPrograms();
  initSupportMatrixFilters();
  initAzIndexSpy();
  initMatchHeightUtilities();
  LBCC.Animation.init();
});

window.addEventListener("load", () => {
  initMatchHeightUtilities();
});
