document.addEventListener("DOMContentLoaded", function () {
    let slideIndex = [1, 1];
    let slideId = ["mySlides1", "mySlides2"];
    showSlides(1, 0);
    showSlides(1, 1);

    function plusSlides(n, no) {
        showSlides((slideIndex[no] += n), no);
    }

    function showSlides(n, no) {
        let i;
        let x = document.getElementsByClassName(slideId[no]);
        if (n > x.length) {
            slideIndex[no] = 1;
        }
        if (n < 1) {
            slideIndex[no] = x.length;
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex[no] - 1].style.display = "block";
    }

    let prevBtn = document.querySelector(".prev");
    let nextBtn = document.querySelector(".next");
    prevBtn.addEventListener("click", function () {
        plusSlides(-1, 0);
    });
    nextBtn.addEventListener("click", function () {
        plusSlides(1, 0);
    });
    let prevBtn2 = document.querySelector(".prev2");
    let nextBtn2 = document.querySelector(".next2");
    prevBtn2.addEventListener("click", function () {
        plusSlides(-1, 1);
    });
    nextBtn2.addEventListener("click", function () {
        plusSlides(1, 1);
    });
});
