import $ from "jquery";
import "jquery-match-height";
import Collapse from "bootstrap/js/dist/collapse";
import Dropdown from "bootstrap/js/dist/dropdown";
import Modal from "bootstrap/js/dist/modal";
import Offcanvas from "bootstrap/js/dist/offcanvas";
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

    const reducedMotionEnabled = document.documentElement.dataset.reducedMotion === "true";
    const swiper = new Swiper(swiperElement, {
      effect: "fade",
      fadeEffect: {
        crossFade: true
      },
      loop: true,
      speed: 600,
      allowTouchMove: false,
      autoplay: reducedMotionEnabled ? false : {
        delay: 1350,
        disableOnInteraction: false,
        pauseOnMouseEnter: false
      }
    });

    let isPaused = reducedMotionEnabled || !swiper.autoplay;

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

    markInitialized(component);
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
  initBootstrapSet(".accordion .accordion-collapse", Collapse);
  initBootstrapSet("[data-bs-toggle=\"dropdown\"]", Dropdown);
  initBootstrapSet(".modal", Modal);
  initBootstrapSet(".offcanvas", Offcanvas);
  initGoogleTranslateModal();
  initStickyHeader();
  syncOffcanvasTriggers();
  initDesktopMainNavCollapses();
  initDesktopSearchCollapseFocus();
  syncCollapseMenuTriggers();
  initSectionNavMenu();
  initFooterIHeartLb();
  initMatchHeightUtilities();
  LBCC.Animation.init();
});

window.addEventListener("load", () => {
  initMatchHeightUtilities();
});
