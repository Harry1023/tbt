
/* const dropdowns = document.querySelectorAll(".dropdown");

dropdowns.forEach(dropdown => {
  const trigger = dropdown.querySelector(".dropdown-trigger");

  trigger.addEventListener("click", e => {
    e.stopPropagation();

    // Close all other dropdowns
    dropdowns.forEach(d => {
      if (d !== dropdown) d.classList.remove("is-active");
    });

    // Toggle this one
    dropdown.classList.toggle("is-active");
  });
});

// Close any open dropdown when clicking outside
document.addEventListener("click", () => {
  dropdowns.forEach(dropdown => {
    dropdown.classList.remove("is-active");
  });
});
*/

document.addEventListener("click", e => {
  const trigger = e.target.closest(".dropdown-trigger");

  if (trigger) {
    e.stopPropagation();

    const dropdown = trigger.closest(".dropdown");

    // Close all other dropdowns
    document.querySelectorAll(".dropdown").forEach(d => {
      if (d !== dropdown) {
        d.classList.remove("is-active");
      }
    });

    // Toggle this dropdown
    dropdown.classList.toggle("is-active");

    return;
  }

  // Clicked outside a dropdown
  if (!e.target.closest(".dropdown")) {
    document.querySelectorAll(".dropdown").forEach(dropdown => {
      dropdown.classList.remove("is-active");
    });
  }
});