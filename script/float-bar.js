// (c) Yuoa

var ltzHeader = undefined;
var floatThreshold = undefined;
var checkThreshold = function (isInit) {

    if (window.scrollY > floatThreshold)
        ltzHeader.classList.add("float");
    else
        ltzHeader.classList.remove("float");

};

var setupFloatBar = function () {

    ltzHeader = document.getElementById("top");
    floatThreshold = ltzHeader.scrollHeight - 270;

    checkThreshold(true);
    window.addEventListener('scroll', checkThreshold);

}
