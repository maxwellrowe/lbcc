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

const syncReducedMotionPreference = () => {
  const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)");
  const update = () => {
    document.documentElement.dataset.reducedMotion = reducedMotion.matches ? "true" : "false";
  };

  update();
  reducedMotion.addEventListener("change", update);
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
  initMatchHeightUtilities();
  LBCC.Animation.init();
});

window.addEventListener("load", () => {
  initMatchHeightUtilities();
});
