(() => {
  const toggle = document.querySelector(".js-nav-toggle");
  const menu = document.getElementById("primary-menu");

  if (toggle && menu) {
    toggle.addEventListener("click", () => {
      const isExpanded = toggle.getAttribute("aria-expanded") === "true";
      toggle.setAttribute("aria-expanded", String(!isExpanded));
      menu.classList.toggle("is-open", !isExpanded);
    });
  }

  const topbarClose = document.querySelector(".topbar__close");
  const topbar = document.querySelector(".topbar");
  if (topbarClose && topbar) {
    topbarClose.addEventListener("click", () => {
      topbar.classList.add("is-hidden");
    });
  }

  document.querySelectorAll(".js-accordion-toggle").forEach((button) => {
    button.addEventListener("click", () => {
      const item = button.closest(".accordion__item");
      if (!item) return;
      item.classList.toggle("is-open");
    });
  });
})();
