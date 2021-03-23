window.addEventListener('DOMContentLoaded', function () {
    /* Slide */
    slideIndex = 1;
    slideImage = document.querySelector('.slide__image')
    slideButtonLeft = document.querySelector('.slide__button-left')
    slideButtonRight = document.querySelector('.slide__button-right');
    switchButton = document.querySelectorAll(".slide__channel-switch")
    let tp = 0;
    slideButtonLeft.onclick = function () {
        (slideIndex - 1) >= 1 ? slideIndex -= 1 : slideIndex = 5;
        (tp - 1200) >= 0 ? tp -= 1200 : tp = 4800;
        textBold(slideIndex);
        slideImage.style.transform = "translateX(" + (-tp) + "px)";
    }
    slideButtonRight.onclick = function () {
        (slideIndex + 1) <= 5 ? slideIndex += 1 : slideIndex = 1;
        (tp + 1200) <= 4800 ? tp += 1200 : tp = 0;
        textBold(slideIndex);
        slideImage.style.transform = "translateX(" + (-tp) + "px)";
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
                    tp = 1200;
                    slideImage.style.transform = "translateX(-1200px)";
                    break;
                }
            case 3:
                {
                    tp = 2400;
                    slideImage.style.transform = "translateX(-2400px)";
                    break;
                }
            case 4:
                {
                    tp = 3600;
                    slideImage.style.transform = "translateX(-3600px)";
                    break;
                }
            case 5:
                {
                    tp = 4800;
                    slideImage.style.transform = "translateX(-4800px)";
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
    for (let i=0;i<switchButton.length;i++){
        switchButton[i].onclick=()=>{
            slideIndex=i+1;
            slideTo(i+1)
            textBold(i+1)
        }
    }
    /* End code for slide */
    
});
