// (c) Yuoa

var ltzHeader = undefined;
var floatThreshold = undefined;
var checkThreshold = function () {

    if (window.scrollY > floatThreshold)
        ltzHeader.classList.add("float");
    else
        ltzHeader.classList.remove("float");

};

var setupFloatBar = function () {

    ltzHeader = document.getElementById("top");
    floatThreshold = ltzHeader.scrollHeight - 50;

    checkThreshold();
    window.addEventListener('scroll', checkThreshold);

}
