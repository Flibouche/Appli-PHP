function fadeOutEffect() {
  const alert = document.querySelector(".alert");
  if (alert != null) {
    var fadeEffect = setInterval(function () {
      if (!alert.style.opacity) {
        alert.style.opacity = 2.5;
      }
      if (alert.style.opacity > 0) {
        alert.style.opacity -= 0.1;
      } else {
        clearInterval(fadeEffect);
      }
    }, 200);
  }
}

fadeOutEffect();