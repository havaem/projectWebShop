window.addEventListener('DOMContentLoaded', function () {
    /* Slide 1 */
    slideIndex = 1;
    slideImage = document.querySelector('.slide__image')
    slideButtonLeft = document.querySelector('.slide__button-left')
    slideButtonRight = document.querySelector('.slide__button-right');
    switchButton = document.querySelectorAll(".slide__channel-switch")
    let tp = 0;
    slideButtonLeft.onclick = function () {
        (slideIndex - 1) >= 1
            ? slideIndex -= 1
            : slideIndex = 5;
        (tp - 100) >= 0
            ? tp -= 100
            : tp = 400;
        textBold(slideIndex);
        slideImage.style.transform = "translateX(" + (-tp) + "%)";
    }
    slideButtonRight.onclick = function () {
        (slideIndex + 1) <= 5
            ? slideIndex += 1
            : slideIndex = 1;
        (tp + 100) <= 400
            ? tp += 100
            : tp = 0;
        textBold(slideIndex);
        slideImage.style.transform = "translateX(" + (-tp) + "%)";
    }
    // Move to slide {number}
    slideTo = (index) => {
        switch (index) {
            case 1:
                {
                    tp = 0;
                    slideImage.style.transform = "translateX(0px)";
                    break;
                }
            case 2:
                {
                    tp = 100;
                    slideImage.style.transform = "translateX(-100%)";
                    break;
                }
            case 3:
                {
                    tp = 2;
                    slideImage.style.transform = "translateX(-200%)";
                    break;
                }
            case 4:
                {
                    tp = 3;
                    slideImage.style.transform = "translateX(-300%)";
                    break;
                }
            case 5:
                {
                    tp = 4;
                    slideImage.style.transform = "translateX(-400%)";
                    break;
                }
        }
    }
    textBold = (slideIndex) => {
        for (var x of switchButton) {
            x.style.fontWeight = "100";
        }
        switchButton[slideIndex - 1].style.fontWeight = "bold";
    }
    for (let i = 0; i < switchButton.length; i++) {
        switchButton[i].onclick = () => {
            slideIndex = i + 1;
            slideTo(i + 1)
            textBold(i + 1)
        }
    }
    /* Slide 2 */
    indexslidePr = 0;
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
    }
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
        console.log('sss');
        window.scrollTo(0,0);
    }
});
