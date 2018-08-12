// (c) Yuoa

// Main top slider controller
// TODO Change this to Web Animations API (one of these days)
Rm.add(new Sy(
    {
        slide: "header section.slide",
        slider: "header article.slider",
        bbox: "#func",
        search: "#bbox-search"
    },
    function ($) {

        for (var i = 0; i < $.slide.length; i++) {

            // Block default css-processing animation
            if (i)
                $.slide[i].style.visibility = "hidden";
            else
                $.slide[i].classList.add("show");

            $.slide[i].style.animation = "none";

        }

        // Run js-processing animation
        Rm.e.tsStartAuto();

        // Add HTML controller
        var prev = document.createElement('button');
        prev.innerHTML = ['<a><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><path d="M 98.919796,128.00057 195.11048,224.517 c 7.18581,7.20269 7.18581,18.87988 0,26.08166 -7.18489,7.20179 -18.83559,7.20179 -26.0223,0 L 60.824496,141.96757 c -3.82919,-3.83769 -5.55235,-8.94257 -5.30043,-13.967 -0.25192,-5.02534 1.47124,-10.12977 5.30043,-13.96791 L 169.08818,5.4020175 c 7.18625,-7.20269 18.83605,-7.20269 26.0223,0 7.18626,7.2026995 7.18581,18.8794305 0,26.0803005 z"/></svg><span>', Rm.d.prevSlide, '</span></a>'].join('');
        prev.onclick = Rm.e.tsStartPrev;
        prev.tabIndex = -1;
        prev.title = Rm.d.prevSlide;
        prev.className = "prev no-label quiet ts-control";
        prev.id = "bbox-prev";

        var next = document.createElement('button');
        next.innerHTML = ['<a><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><path d="M 157.08021,128.00057 60.889521,224.517 c -7.185801,7.20269 -7.185801,18.87988 0,26.08166 7.184894,7.20179 18.835598,7.20179 26.022305,0 L 195.17551,141.96757 c 3.82919,-3.83769 5.55235,-8.94257 5.30043,-13.967 0.25192,-5.02534 -1.47124,-10.12977 -5.30043,-13.96791 L 86.911826,5.4020175 c -7.186254,-7.20269 -18.836052,-7.20269 -26.022305,0 -7.186254,7.2026995 -7.185801,18.8794305 0,26.0803005 z"/></svg><span>', Rm.d.nextSlide, '</span></a>'].join('');
        next.onclick = Rm.e.tsStartNext;
        next.tabIndex = -1;
        next.title = Rm.d.nextSlide;
        next.className = "next no-label quiet ts-control";
        next.id = "bbox-next";

        $.bbox.insertBefore(prev, $.search);
        $.bbox.insertBefore(next, $.search);

    },
    function ($) {
        return {

            tsStop: function () {

                if (typeof Rm.s.tsIvID !== "undefined")
                    clearInterval(Rm.s.tsIvID);

                delete Rm.s.tsIvID;

            },

            tsStartNext: function (e) {

                Rm.e.tsNext();
                Rm.e.tsStartAuto(14000);

                if (e && e.type == "click")
                    document.activeElement.blur();

            },

            tsStartPrev: function (e) {

                Rm.e.tsPrev();
                Rm.e.tsStartAuto(14000);

                if (e && e.type == "click")
                    document.activeElement.blur();

            },

            tsStartAuto: function (iv) {

                iv = Number(iv);

                if (Number.isNaN(iv)) iv = 9000;

                if (typeof Rm.s.tsIvID !== "undefined")
                    clearInterval(Rm.s.tsIvID);

                Rm.s.tsIvID = setInterval(function () { Rm.e.tsNext() }, iv);

            },

            tsChange: function (o, n) {

                var fade = 1.0, move = 2.4, moveD = 30;

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
    },
    ['tsStartAuto'],
    ['tsStop']
));

// Main top slider swipe event
Rm.add(new Sy(
    { slider: "header article.slider" },
    function ($) {

        Rm.s.topSwipe = {
            minX: 50, maxY: 80,
            spX: 0, spY: 0, epX: 0, epY: 0,
            spRecorded: false, epRecorded: false
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

                Rm.s.topSwipe.spRecorded = true;

                if (typeof e.clientX === "undefined") {

                    if (e.touches && e.touches[0]) {

                        Rm.s.topSwipe.spX = e.touches[0].screenX;
                        Rm.s.topSwipe.spY = e.touches[0].screenY;

                    } else {

                        Rm.s.topSwipe.spX = -200;
                        Rm.s.topSwipe.spY = -200;

                    }

                } else {

                    Rm.s.topSwipe.spX = e.clientX;
                    Rm.s.topSwipe.spY = e.clientY;

                }

            },

            setTopSwipeEndPoint: function (e) {

                if (Rm.s.topSwipe.spRecorded) {

                    Rm.s.topSwipe.epRecorded = true;

                    if (typeof e.clientX === "undefined") {

                        if (e.touches && e.touches[0]) {

                            Rm.s.topSwipe.epX = e.touches[0].screenX;
                            Rm.s.topSwipe.epY = e.touches[0].screenY;

                        } else {

                            Rm.s.topSwipe.epX = -100;
                            Rm.s.topSwipe.epY = -100;

                        }

                    } else {

                        Rm.s.topSwipe.epX = e.clientX;
                        Rm.s.topSwipe.epY = e.clientY;

                    }

                }

            },

            checkTopSwiped: function () {

                if (Rm.s.topSwipe.spRecorded && Rm.s.topSwipe.epRecorded) {

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

                }

                Rm.s.topSwipe.spRecorded = false;
                Rm.s.topSwipe.epRecorded = false;

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
