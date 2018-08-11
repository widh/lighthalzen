// (c) Yuoa

// On-scroll event
Rm.add(new Sy(
    function ($) {

        var floatThreshold = $.header.scrollHeight - 270;
        var checkThreshold = function () {

            if (window.scrollY > floatThreshold) {
                $.header.classList.add("float");
                $.goTop.classList.remove("hide");
            } else {
                $.header.classList.remove("float");
                $.goTop.classList.add("hide");
            }

        };

        checkThreshold();
        window.addEventListener('scroll', checkThreshold);

    },
    {
        header: "#top",
        goTop: "#go-top"
    }
));

// Global menu open/close event
Rm.add(new Sy(
    function ($) {

        // Block default anchor action
        $.bboxMenu.children[0].onclick = function () { return false; }

        // Menu open/close actions
        $.bboxMenu.onclick = function () {

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

    },
    {
        nav: "#nav",
        bboxHb: ".button-box svg.hamburger",
        bboxMenu: "#bbox-menu"
    }
));
