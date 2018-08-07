// (c) Yuoa

var ltzHeader = undefined;
var ltzGotoTop = undefined;
var floatThreshold = undefined;

var checkThreshold = function () {

    if (window.scrollY > floatThreshold) {
        ltzHeader.classList.add("float");
        ltzGotoTop.classList.remove("hide");
    } else {
        ltzHeader.classList.remove("float");
        ltzGotoTop.classList.add("hide");
    }

};

var setupOnScrollEvent = function () {

    ltzHeader = document.getElementById("top");
    ltzGotoTop = document.getElementById("go-top");
    floatThreshold = ltzHeader.scrollHeight - 270;

    checkThreshold();
    window.addEventListener('scroll', checkThreshold);

};
