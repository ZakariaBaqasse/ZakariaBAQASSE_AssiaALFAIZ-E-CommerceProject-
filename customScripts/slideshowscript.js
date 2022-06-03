function changeSlide(evt, Product_tumbnailName) {
    var i, x, slide_options;
    x = document.getElementsByClassName("Product_tumbnail");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    slide_options = document.getElementsByClassName("slide_option");
    for (i = 0; i < x.length; i++) {
        slide_options[i].className = slide_options[i].className.replace(
            " slide_image_color",
            ""
        );
    }
    document.getElementById(Product_tumbnailName).style.display = "block";
    evt.currentTarget.className += " slide_image_color";
}

function opentab_type(evt, tab_typeName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("tab_type");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("active_button", "");
    }
    document.getElementById(tab_typeName).style.display = "block";
    evt.currentTarget.className += " active_button";
}

//SCROLL ANIMATE
var scroll =
    window.requestAnimationFrame ||
    function(callback) {
        window.setTimeout(callback, 1000 / 60);
    };
var elementsToShow = document.querySelectorAll(".show-on-scroll");

function loop() {
    Array.prototype.forEach.call(elementsToShow, function(element) {
        if (isElementInViewport(element)) {
            element.classList.add("is-visible");
        } else {
            element.classList.remove("is-visible");
        }
    });

    scroll(loop);
}
loop();

function isElementInViewport(el) {
    // special bonus for those using jQuery
    if (typeof jQuery === "function" && el instanceof jQuery) {
        el = el[0];
    }
    var rect = el.getBoundingClientRect();
    return (
        (rect.top <= 0 && rect.bottom >= 0) ||
        (rect.bottom >=
            (window.innerHeight || document.documentElement.clientHeight) &&
            rect.top <=
            (window.innerHeight || document.documentElement.clientHeight)) ||
        (rect.top >= 0 &&
            rect.bottom <=
            (window.innerHeight || document.documentElement.clientHeight))
    );
}

//SCROLL ANIMATE
var scroll2 =
    window.requestAnimationFrame ||
    function(callback2) {
        window.setTimeout(callback2, 1000 / 60);
    };
var elementsToShow2 = document.querySelectorAll(".show-on-scroll2");

function loop2() {
    Array.prototype.forEach.call(elementsToShow2, function(element) {
        if (isElementInViewport(element)) {
            element.classList.add("is-visible2");
        } else {
            element.classList.remove("is-visible2");
        }
    });

    scroll2(loop2);
}
loop2();

function isElementInViewport(el) {
    // special bonus for those using jQuery
    if (typeof jQuery === "function" && el instanceof jQuery) {
        el = el[0];
    }
    var rect2 = el.getBoundingClientRect();
    return (
        (rect2.top <= 0 && rect2.bottom >= 0) ||
        (rect2.bottom >=
            (window.innerHeight || document.documentElement.clientHeight) &&
            rect2.top <=
            (window.innerHeight || document.documentElement.clientHeight)) ||
        (rect2.top >= 0 &&
            rect2.bottom <=
            (window.innerHeight || document.documentElement.clientHeight))
    );
}