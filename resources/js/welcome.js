var swiper = new Swiper(".mySwiper", {});
    document.addEventListener("DOMContentLoaded", function () {
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            on: {
                slideChange: function () {
                    updateActiveCard(this.realIndex);
                }
            }
        });

        function updateActiveCard(activeIndex) {
            let cards = document.querySelectorAll(".cards");
            cards.forEach((card, index) => {
                if (index === activeIndex) {
                    card.classList.add("activesCard");
                } else {
                    card.classList.remove("activesCard");
                }
            });
        }

        document.querySelectorAll(".cards").forEach((card, index) => {
            card.addEventListener("click", function () {
                swiper.slideToLoop(index); 
            });
        });

        updateActiveCard(0);
    });

    var swiper = new Swiper(".cardSwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        freeMode: true,
        navigation: {
            nextEl: '.swiper-button-nexts',
            prevEl: '.swiper-button-prevs',
          },
      });
