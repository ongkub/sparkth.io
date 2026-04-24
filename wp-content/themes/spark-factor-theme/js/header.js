document.getElementById("navigation-menu").addEventListener("click", () => {
  const modal = document.getElementById("navigation-modal");
  if (modal) {
    if (modal.classList.contains("open")) {
      modal.classList.remove("open");
    } else {
      modal.classList.add("open");
    }
  }
});

document.getElementById("navigation-close").addEventListener("click", () => {
  const modal = document.getElementById("navigation-modal");
  if (modal) {
    if (modal.classList.contains("open")) {
      modal.classList.remove("open");
    } else {
      modal.classList.add("open");
    }
  }
});

const items = document.getElementsByClassName("navigation-item");

for (let i = 0; i < items.length; i++) {
  items[i].addEventListener("click", () => {
    const modal = document.getElementById("navigation-modal");
    if (modal) {
      if (modal.classList.contains("open")) {
        modal.classList.remove("open");
      }
    }
  });
}
