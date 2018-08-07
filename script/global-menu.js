// (c) Yuoa

var ltzBboxMenu = undefined;
var ltzNavigator = undefined;
var ltzBboxMenuH = undefined;

var setupBBoxMenuEvent = function () {

    // Save shortcut
    ltzNavigator = document.getElementById("nav");
    ltzBboxMenuH = document.querySelector(".button-box svg.hamburger");
    ltzBboxMenu = document.getElementById("bbox-menu");

    // Block default anchor action
    ltzBboxMenu.children[0].onclick = function () { return false; }

    // Menu open/close actions
    ltzBboxMenu.onclick = function () {

        if (ltzNavigator.classList.contains("open")) {

            ltzNavigator.classList.remove("open");
            ltzBboxMenu.classList.remove("active");
            ltzBboxMenuH.classList.remove("hamburger2x");

        } else {

            ltzNavigator.classList.add("open");
            ltzBboxMenu.classList.add("active");
            ltzBboxMenuH.classList.add("hamburger2x");

        }

        ltzBboxMenu.blur();
        ltzBboxMenu.children[0].blur();

        return true;

    }

};
