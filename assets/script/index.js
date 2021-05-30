window.addEventListener('DOMContentLoaded', function () {
    /* Slide 1 */
    slideIndex = 1;
    slideImage = document.querySelector('.slide__image')
    prevBtn = document.querySelector('.slide__button-left')
    nextBtn = document.querySelector('.slide__button-right');
    switchButton = document.querySelectorAll(".slide__channel-switch")
    slides = document.querySelectorAll('.slide__image-item');
    const firstClone = slides[0].cloneNode(true);
    const lastClone = slides[slides.length - 1].cloneNode(true);
    //tạo img trước và sau
    firstClone.id = 'first-clone';
    lastClone.id = 'last-clone';
    //gán vào slideImg
    slideImage.append(firstClone);
    slideImage.prepend(lastClone);
    // Nhảy tới slide 2
    const slideWidth = slides[slideIndex].clientWidth;
    slideImage.style.transform = `translateX(${- slideWidth * slideIndex}px)`;
    const getSlides = () => document.querySelectorAll('.slide__image-item');
    const moveToNextSlide = () => {
        slides = getSlides();
        if (slideIndex >= slides.length - 1)
            return;
        slideIndex++;
        if(slideIndex > 0 && slideIndex < 6){
            textBold(slideIndex)
        }
        if(slideIndex == 6){
            textBold(1)
        }
        slideImage.style.transition = '.7s ease-out';
        slideImage.style.transform = `translateX(${- slideWidth * slideIndex}px)`;
    };
    const moveToPreviousSlide = () => {
        if (slideIndex <= 0)
            return;
        slideIndex--;
        if(slideIndex > 0 && slideIndex < 6){
            textBold(slideIndex)
        }
        if(slideIndex == 0){
            textBold(5)
        }
        slideImage.style.transition = '.7s ease-out';
        slideImage.style.transform = `translateX(${- slideWidth * slideIndex}px)`;
    };
    const moveToSlide = (slideMove) => {
        slideImage.style.transition = '.7s ease-out';
        if (slideMove !== slideIndex) {
            slideID = slideIndex;
            needMove = slideWidth*slideMove;
            if (slideImage.style.transform = `translateX(-${needMove}px)`) {
                slideIndex = slideMove;
            }
        }
    }
    nextBtn.addEventListener('click', moveToNextSlide);
    prevBtn.addEventListener('click', moveToPreviousSlide);
    slideImage.addEventListener('transitionend', () => {
        slides = getSlides();
        if (slides[slideIndex].id === firstClone.id) {
            slideIndex = 1;
            slideImage.style.transition = 'none';
            slideImage.style.transform = `translateX(${- slideWidth * slideIndex}px)`;
        }
        else if (slides[slideIndex].id === lastClone.id) {
            slideIndex = slides.length - 2;
            slideImage.style.transition = 'none';
            slideImage.style.transform = `translateX(${- slideWidth * slideIndex}px)`;
        }
        
    });
    textBold = (slideIndex) => {
        for (var x of switchButton) {
            x.style.fontWeight = "100";
        }
        switchButton[slideIndex - 1].style.fontWeight = "bold";
    }
    for (let i = 0; i < switchButton.length; i++) {
        switchButton[i].onclick = () => {
            moveToSlide(i + 1)
            textBold(i + 1)
        }
    }
    // Bắt sự kiện blur của slide và tự động chạy
    const slideContainer = document.querySelector('.container');
    const startSlide = () => {
        slideId = setInterval(() => {
            moveToNextSlide();
        }, 10000);
    };
    slideContainer.addEventListener('mouseenter', () => {
        clearInterval(slideId);
    });
    startSlide();
    /* Slide 2 */
    /* indexslidePr = 0;
    slidePr = document.querySelector('.hotdeal__items')
    console.log(slidePr);
    slidePrLeft = document.querySelector('.button__left')
    console.log(slidePrLeft);
    slidePrRight = document.querySelector('.button__right')
    slidePrLeft.onclick = () => {
        indexslidePr - 100 >= 0
            ? indexslidePr -= 100
            : indexslidePr = 300;
        let scrollTo = (-indexslidePr) + '%'
        console.log(scrollTo);
        slidePr.style.transform = 'translateX(' + scrollTo + ')';
    }
    slidePrRight.onclick = () => {
        indexslidePr + 100 < 400
            ? indexslidePr += 100
            : indexslidePr = 0;
        let scrollTo = (-indexslidePr) + '%'
        console.log(scrollTo);
        slidePr.style.transform = 'translateX(' + scrollTo + ')';
    } */
    /* Scroll button */
    scrollbtn = document.querySelector('.scrollbutton')
    window.addEventListener('scroll', () => {
       if(window.pageYOffset > 100){
        scrollbtn.classList.add('show');
       }
       else{
        scrollbtn.classList.remove('show');
       }
    })
    scrollbtn.onclick = () => {
        window.scrollTo(0,0);
    }
});
