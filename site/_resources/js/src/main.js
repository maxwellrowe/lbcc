import Collapse from "bootstrap/js/dist/collapse";
import Dropdown from "bootstrap/js/dist/dropdown";
import Modal from "bootstrap/js/dist/modal";

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

const syncMobileNavIcons = () => {
  document.querySelectorAll(".site-mobile-section-body").forEach((panel) => {
    const toggle = document.querySelector(`[data-bs-target="#${panel.id}"]`);
    const icon = toggle?.querySelector(".fa-sharp");

    if (!toggle || !icon) {
      return;
    }

    const setExpandedState = (expanded) => {
      icon.classList.toggle("fa-plus", !expanded);
      icon.classList.toggle("fa-xmark", expanded);
    };

    setExpandedState(panel.classList.contains("show"));
    panel.addEventListener("show.bs.collapse", () => setExpandedState(true));
    panel.addEventListener("hide.bs.collapse", () => setExpandedState(false));
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

document.addEventListener("DOMContentLoaded", () => {
  syncReducedMotionPreference();
  initBootstrapSet(".accordion .accordion-collapse", Collapse);
  initBootstrapSet("[data-bs-toggle=\"dropdown\"]", Dropdown);
  initBootstrapSet(".modal", Modal);
  syncMobileNavIcons();
});
