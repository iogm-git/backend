let slideIndex = 1;

function move(e) {
    show(slideIndex += e)
}

function current(e) {
    show(slideIndex = e)
}

function show(e) {
    let l = document.querySelector(".logo__main-img"),
        n = document.querySelector(".logo__prev"),
        a = document.querySelector(".logo__next"),
        t = document.getElementsByClassName("logo__order");
    e > t.length && (slideIndex = 1), e < 1 && (slideIndex = t.length);
    for (let o = 0; o < t.length; o++) t[o].className = t[o].className.replace(" order--active", "");
    slideIndex - 2 < 0 ? n.style.backgroundImage = getComputedStyle(t[t.length - 1]).backgroundImage : n.style.backgroundImage = getComputedStyle(t[slideIndex - 2]).backgroundImage, l.classList.add("fade"), setTimeout(function () {
        l.classList.remove("fade")
    }, 500), l.style.backgroundImage = getComputedStyle(t[slideIndex - 1]).backgroundImage, slideIndex > t.length - 1 ? a.style.backgroundImage = getComputedStyle(t[0]).backgroundImage : a.style.backgroundImage = getComputedStyle(t[slideIndex]).backgroundImage, t[slideIndex - 1].className += " order--active"
}

function openContent(e, l) {
    var n, a, t;
    for (n = 0, a = document.querySelectorAll(".icon__tabcontainer"), t = document.querySelectorAll(".icon__tablink"); n < a.length; n++) a[n].style.display = "none", t[n].classList.remove("tablink--active");
    document.getElementById(e).style.display = "grid", t[l].classList.add("tablink--active")
}
show(slideIndex + 1), document.querySelectorAll(".icon__tablink")[1].click();