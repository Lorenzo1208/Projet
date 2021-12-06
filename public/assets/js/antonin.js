window.onload = function () {
    document.onkeypress = function (e) {
      console.log(e);
      e = e || window.event;
      if (e.keyCode === 13) {
        document.documentElement.classList.toggle("dark-mode");
        document.querySelectorAll(".inverted").forEach((result) => {
          result.classList.toggle("invert");
        });
      }
    };
  };