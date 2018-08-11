// (c) Yuoa

var setupTopSliderSwipeEvent = function () {

    var ltzTopSlider = document.getElementById("top-slider");
    var minX = 30, maxY = 50;
    var spX = 0, spY = 0, epX = 0, epY = 0;

    // Add event listener
    ltzTopSlider.addEventListener('touchstart', function (e) {

        spX = e.touches[0].screenX;
        spY = e.touches[0].screenY;

    }, false);
    ltzTopSlider.addEventListener('touchmove', function (e) {

        epX = e.touches[0].screenX;
        epY = e.touches[0].screenY;

    }, false);
    ltzTopSlider.addEventListener('touchend', function (e) {

        var dX = epX - spX;

        if (Math.abs(dX) >= minX && Math.abs(epY - spY) <= maxY)
            if (dX > 0) {
                //Right Swipe
            } else {
                //Left Swipe
            }

        spX = 0;
        spY = 0;
        epX = 0;
        epY = 0;

    });

};

var setupTopSliderController = function () {

    var ltzTopSlides = document.getElementById("top-slider").children;
}
