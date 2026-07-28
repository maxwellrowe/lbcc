import { animate, inView, stagger } from "motion";

const DEFAULT_DURATION = 0.5;
const DEFAULT_DELAY = 0;
const DEFAULT_EASE = [0.16, 1, 0.3, 1];
const IN_VIEW_OPTIONS = {
  amount: 0.2,
  margin: "0px 0px -10% 0px"
};

const DELAY_CLASS_PATTERN = /^lbcc-delay-(\d+)$/;
const DURATION_CLASS_PATTERN = /^lbcc-duration-(\d+)$/;

const getClassValue = (element, pattern) => {
  const matchedClass = Array.from(element.classList).find((className) => pattern.test(className));

  if (!matchedClass) {
    return null;
  }

  const match = matchedClass.match(pattern);
  return match ? Number.parseInt(match[1], 10) : null;
};

const getDelaySeconds = (element) => {
  const delay = getClassValue(element, DELAY_CLASS_PATTERN);
  return delay === null ? DEFAULT_DELAY : delay / 1000;
};

const getDurationSeconds = (element) => {
  const duration = getClassValue(element, DURATION_CLASS_PATTERN);
  return duration === null ? DEFAULT_DURATION : duration / 1000;
};

const getAnimationPreset = (element) => {
  if (element.classList.contains("lbcc-fade-left")) {
    return { opacity: [0, 1], x: [-24, 0] };
  }

  if (element.classList.contains("lbcc-fade-right")) {
    return { opacity: [0, 1], x: [24, 0] };
  }

  if (element.classList.contains("lbcc-scale")) {
    return { opacity: [0, 1], scale: [0.96, 1] };
  }

  return { opacity: [0, 1], y: [24, 0] };
};

const revealWithoutMotion = (element) => {
  element.classList.add("lbcc-revealed");
};

const prefersReducedMotion = () => window.matchMedia("(prefers-reduced-motion: reduce)").matches;

const clearInlineAnimationStyles = (element) => {
  element.style.opacity = "";
  element.style.transform = "";
  element.style.transformOrigin = "";
  element.style.willChange = "";
};

const setFadeRightAnimationStartState = (element) => {
  element.style.opacity = "0";
  element.style.transform = "translate3d(24px, 0, 0)";
  element.style.willChange = "opacity, transform";
};

const prepareFadeRightSequence = (elements) => {
  const sequence = elements.filter((element) => element instanceof HTMLElement);

  if (!sequence.length || prefersReducedMotion()) {
    return;
  }

  sequence.forEach((element) => {
    setFadeRightAnimationStartState(element);
  });
};

const playFadeRightSequence = (elements, options = {}) => {
  const sequence = elements.filter((element) => element instanceof HTMLElement);

  if (!sequence.length) {
    return 0;
  }

  if (prefersReducedMotion()) {
    sequence.forEach((element) => {
      clearInlineAnimationStyles(element);
      element.style.opacity = "1";
      element.style.transform = "none";
    });
    return 0;
  }

  const startDelay = options.startDelay ?? 0;
  const itemDelay = options.itemDelay ?? 0.08;
  const duration = options.duration ?? DEFAULT_DURATION;

  prepareFadeRightSequence(sequence);

  requestAnimationFrame(() => {
    animate(sequence, { opacity: [0, 1], x: [24, 0] }, {
      delay: stagger(itemDelay, { startDelay }),
      duration,
      easing: DEFAULT_EASE,
      fill: "forwards"
    });
  });

  return startDelay + duration + (sequence.length > 1 ? itemDelay * (sequence.length - 1) : 0);
};

const initSingleAnimation = (element) => {
  inView(
    element,
    () => {
      element.classList.add("lbcc-revealed");

      animate(element, getAnimationPreset(element), {
        delay: getDelaySeconds(element),
        duration: getDurationSeconds(element),
        easing: DEFAULT_EASE,
        fill: "forwards"
      });
    },
    IN_VIEW_OPTIONS
  );
};

const initStaggerAnimation = (element) => {
  const children = Array.from(element.children).filter((child) => child instanceof HTMLElement);

  if (!children.length) {
    initSingleAnimation(element);
    return;
  }

  inView(
    element,
    () => {
      element.classList.add("lbcc-revealed");

      animate(children, { opacity: [0, 1], y: [16, 0] }, {
        delay: stagger(0.08, { startDelay: getDelaySeconds(element) }),
        duration: getDurationSeconds(element),
        easing: DEFAULT_EASE,
        fill: "forwards"
      });
    },
    IN_VIEW_OPTIONS
  );
};

const init = (root = document) => {
  const elements = root.querySelectorAll(".lbcc-animate");
  const reducedMotion = prefersReducedMotion();

  elements.forEach((element) => {
    if (element.dataset.lbccAnimationInitialized === "true") {
      return;
    }

    element.dataset.lbccAnimationInitialized = "true";

    if (reducedMotion) {
      revealWithoutMotion(element);
      return;
    }

    if (element.classList.contains("lbcc-stagger")) {
      initStaggerAnimation(element);
      return;
    }

    initSingleAnimation(element);
  });
};

export const Animation = {
  clearInlineAnimationStyles,
  init,
  prepareFadeRightSequence,
  playFadeRightSequence
};
