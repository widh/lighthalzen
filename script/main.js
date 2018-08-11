// (c) Yuoa

// Main top slider controller
// TODO Change this to Web Animations API (one of these days)
Rm.add(new Sy(
    { slide: "header section.slide" },
    function ($) {

        for (var i = 0; i < $.slide.length; i++) {

            // Block default css-processing animation
            if (i)
                $.slide[i].style.visibility = "hidden";
            else
                $.slide[i].classList.add("show");

            $.slide[i].style.animation = "none";

            // Run js-processing animation
            Rm.e.tsStartAuto();

            // Add HTML controller


        }

    },
    function ($) {
        return {

            tsStartNext: function () {
                Rm.e.tsNext();
                Rm.e.tsStartAuto();
            },

            tsStartPrev: function () {
                Rm.e.tsPrev();
                Rm.e.tsStartAuto();
            },

            tsStartAuto: function () {

                if (typeof Rm.s.tsIvID !== "undefined")
                    clearInterval(Rm.s.tsIvID);

                Rm.s.tsIvID = setInterval(function () { Rm.e.tsNext() }, 9000);

            },

            tsChange: function (o, n) {

                var fade = 1.0, move = 1.7, moveD = 30;

                Rm.e.aFade($.slide[o], 1, 0, fade);
                for (var i = 0; i < $.slide[o].children.length; i++)
                    if (o < n)
                        Rm.e.aMove($.slide[o].children[i], 0, -1 * moveD, move);
                    else
                        Rm.e.aMove($.slide[o].children[i], 0, moveD, move);

                Rm.e.aFade($.slide[n], 0, 1, fade);
                for (var i = 0; i < $.slide[n].children.length; i++)
                    if (o < n)
                        Rm.e.aMove($.slide[n].children[i], moveD, 0, move);
                    else
                        Rm.e.aMove($.slide[n].children[i], -1 * moveD, 0, move);

                $.slide[o].classList.remove("show");
                $.slide[n].classList.add("show");

            },

            tsPrev: function () {
                var info = Rm.e.tsInfo();
                return Rm.e.tsChange(info.now, info.prev);
            },

            tsNext: function () {
                var info = Rm.e.tsInfo();
                return Rm.e.tsChange(info.now, info.next);
            },

            tsInfo: function () {

                var now = null;

                for (var i = 0; i < $.slide.length; i++)
                    if ($.slide[i].classList.contains("show")) {
                        now = i;
                        break;
                    }

                return {
                    count: $.slide.length,
                    now: now,
                    next: (now == $.slide.length - 1) ? 0 : now + 1,
                    prev: (now == 0) ? $.slide.length - 1 : now - 1
                }

            }

        };
    }
));

// Main top slider swipe event
Rm.add(new Sy(
    { slider: "header article.slider" },
    function ($) {

        Rm.s.topSwipe = {
            minX: 30, maxY: 50,
            spX: 0, spY: 0, epX: 0, epY: 0
        };

        // Add event listener
        $.slider.addEventListener('mousedown', Rm.e.setTopSwipeStartPoint, false);
        $.slider.addEventListener('mousemove', Rm.e.setTopSwipeEndPoint, false);
        $.slider.addEventListener('mouseup', Rm.e.checkTopSwiped);
        $.slider.addEventListener('touchstart', Rm.e.setTopSwipeStartPoint, false);
        $.slider.addEventListener('touchmove', Rm.e.setTopSwipeEndPoint, false);
        $.slider.addEventListener('touchend', Rm.e.checkTopSwiped);

    },
    function ($) {
        return {

            setTopSwipeStartPoint: function (e) {

                Rm.s.topSwipe.spX = e.clientX || e.touches[0].screenX;
                Rm.s.topSwipe.spY = e.clientY || e.touches[0].screenY;

            },

            setTopSwipeEndPoint: function (e) {

                Rm.s.topSwipe.epX = e.clientX || e.touches[0].screenX;
                Rm.s.topSwipe.epY = e.clientY || e.touches[0].screenY;

            },

            checkTopSwiped: function () {

                var dX = Rm.s.topSwipe.epX - Rm.s.topSwipe.spX;

                if (
                    Math.abs(dX) >= Rm.s.topSwipe.minX &&
                    Math.abs(Rm.s.topSwipe.epY - Rm.s.topSwipe.spY) <= Rm.s.topSwipe.maxY
                )
                    if (dX > 0)
                        Rm.e.tsStartPrev();
                    else
                        Rm.e.tsStartNext();

                Rm.e.clearTopSwipePoints();

            },

            clearTopSwipePoints: function () {

                Rm.s.topSwipe.spX = 0;
                Rm.s.topSwipe.spY = 0;
                Rm.s.topSwipe.epX = 0;
                Rm.s.topSwipe.epY = 0;

            }

        };
    }
));
