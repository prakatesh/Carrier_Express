// Loading
(function() {
    window.onload = function() {
      var preloader = document.querySelector('.cs-page-loading');
      preloader.classList.remove('active');
      setTimeout(function() {
          preloader.remove();
      }, 2000);
    };
})();

// Animated Count
function Animated_Count(){
  const counters = document.querySelectorAll(".count");
  const speed = 200;
  counters.forEach((counter) => {
    const updateCount = () => {
        const target = parseInt(+counter.getAttribute("data-target"));
        const count = parseInt(+counter.innerText);
        const increment = Math.trunc(target / speed);
        console.log(increment);

        if (count < target) {
        counter.innerText = count + increment;
        setTimeout(updateCount, 1);
        } else {
        count.innerText = target;
        }
    };
    updateCount();
  });
}
