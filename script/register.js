// (c) Yuoa

// On-scroll event
Rm.add(new Sy(
    {
        header: "#top",
        goTop: "#go-top"
    },
    function ($) {

        Rm.s.floatThreshold = $.header.scrollHeight - 270;
        Rm.e.checkThreshold();
        window.addEventListener('scroll', Rm.e.checkThreshold);

    },
    function ($) {
        return {

            checkThreshold: function () {

                if (window.scrollY > Rm.s.floatThreshold) {

                    $.header.classList.add("float");
                    $.goTop.classList.remove("hide");

                    return true;

                } else {

                    $.header.classList.remove("float");
                    $.goTop.classList.add("hide");

                    return false;

                }

            }

        };
    }
));

// Global menu open/close event
Rm.add(new Sy(
    {
        nav: "#nav",
        bboxHb: "#bbox-menu svg",
        bboxMenu: "#bbox-menu"
    },
    function ($) {

        // Block default anchor action
        $.bboxMenu.children[0].onclick = function () { return false; }

        // Menu open/close actions
        $.bboxMenu.onclick = Rm.e.toggleBboxMenu;

    },
    function ($) {
        return {

            toggleBboxMenu: function () {

                if ($.nav.classList.contains("open")) {

                    $.nav.classList.remove("open");
                    $.bboxMenu.classList.remove("active");
                    $.bboxHb.classList.remove("hamburger2x");

                } else {

                    $.nav.classList.add("open");
                    $.bboxMenu.classList.add("active");
                    $.bboxHb.classList.add("hamburger2x");

                }

                $.bboxMenu.blur();
                $.bboxMenu.children[0].blur();

                return true;

            }

        };
    }
));

// Global javascript animation
Rm.add(new Sy(
    null,
    function () { Rm.s.spf = 0.04; },
    function () {
        return {

            ease: BezierEasing(0.25, 1, 0.25, 1),

            aFade: function (n, sO, eO, t) {

                var ivID = false;

                new (function () {

                    var time = 0;
                    var dO = (eO - sO) / (t / Rm.s.spf);
                    var lO = function (time) { return sO + dO * time; };

                    n.style.opacity = sO;
                    if (sO == 0 && eO != 0 && n.style.visibility == "hidden")
                        n.style.visibility = "visible";

                    ivID = setInterval(function () {

                        var nO = lO(time);

                        if ((sO >= eO && nO <= eO) || (sO < eO && nO >= eO)) {

                            n.style.opacity = eO;
                            clearInterval(ivID);

                            if (sO != 0 && eO == 0)
                                n.style.visibility = "hidden";
                            else
                                n.style.visibility = "visible";

                        } else {

                            if (n.style.visibility == "hidden")
                                n.style.visibility = "visible";

                            n.style.opacity = lO(time++);
                        }

                    }, Rm.s.spf);

                })();

                return ivID;

            },

            aMove: function (n, sO, eO, t, u) {

                if (typeof u !== "string")
                    u = "px";

                var ivID = false;

                new (function () {

                    var time = 0;
                    var dO = eO - sO;
                    var pO = Rm.s.spf / t;
                    var lO = function (time) { return sO + dO * Rm.e.ease(time * pO); };

                    n.style.marginLeft = sO + u;

                    ivID = setInterval(function () {

                        var nO = lO(time);

                        if ((sO >= eO && nO <= eO) || (sO < eO && nO >= eO)) {

                            n.style.marginLeft = eO + u;
                            clearInterval(ivID);

                        } else
                            n.style.marginLeft = lO(++time) + u;

                    }, Rm.s.spf);

                })();

                return ivID;

            }

        };
    }
));

// Top search bar
Rm.add(new Sy(
    { search: "#search", button: "#bbox-search" },
    function ($) {

        $.button.onclick = Rm.e.toggleSearchForm;

    },
    function ($) {
        return {

            toggleSearchForm: function () {

                //if (typeof Rm.s.)

            }

        };
    }
));
