// (c) Yuoa
// Fucking IE does not support ES6. Fucking IE, Dirty Scum.

"use strict";

// Global Sy storage
var Rm = new (function () {

    // Is window loaded
    var wLoaded = false;
    var dHidden = 'hidden';
    var dVisibilityChange = 'visibilityChange';

    // Setup Objects
    var o = [];

    // Focus
    var f = [];

    // Blur
    var b = [];

    // Events
    this.e = {};

    // Storage
    this.s = {};

    // Dictionary
    this.d = {};

    var execute = function (s) {

        Object.keys(s.node).map(function(key, i) {

            s.node[key] = document.querySelectorAll(s.node[key]);

            if (s.node[key].length == 1)
                s.node[key] = s.node[key][0];

        });

        Rm.e = Object.assign(Rm.e, s.events(s.node));
        s.setup(s.node);
        f = f.concat(s.focus);
        b = b.concat(s.blur);

    };

    this.add = function (s) {

        if (wLoaded)
            execute(s);
        else
            o.push(s);

    };

    window.onload = function () {

        // Set onload event
        wLoaded = true;

        console.log("%cDeveloper Console", "background-size: contain;background-image: url('https://cite.dev.yuoa.pm/wp-content/themes/lighthalzen/image/identity@bottom.png');color: rgb(0, 7, 55);font-family: monospace;font-size: 1.3rem;line-height: 3rem;background-repeat: no-repeat;font-weight: 900;padding-left:12.3rem;margin-top:.5rem;margin-bottom:.5rem");

        while (o.length > 0)
            execute(o.pop());

        // Set focus event
        // Refer: https://developer.mozilla.org/ko/docs/Web/API/Page_Visibility_API
        if (typeof document.webkitHidden !== "undefined")
            dHidden = "webkitHidden", dVisibilityChange = "webkitvisibilitychange";
        else if (typeof document.msHidden !== "undefined")
            dHidden = "msHidden", dVisibilityChange = "msvisibilitychange";

        document.addEventListener(dVisibilityChange, function() {

            if (document[dHidden])
                b.forEach(function(i) { if (typeof i === "function") i(); else Rm.e[i]() });
            else
                f.forEach(function(i) { if (typeof i === "function") i(); else Rm.e[i]() });

        }, false);

    };

});

// General lighthalzen object
var Sy = function (node, setup, events, focus, blur) {

    "use strict";

    if (typeof node === "undefined" || node == null)
        node = {};

    if (typeof events !== "function" || events == null)
        events = function () {return {}};

    if (typeof setup !== "function" || setup == null)
        setup = function () {};

    if (typeof focus === "function")
        focus = [focus];
    else if (!(focus instanceof Array) || blur == null)
        focus = [];

    if (typeof blur === "function")
        blur = [blur];
    else if (!(blur instanceof Array) || blur == null)
        blur = [];

    return {
        setup: setup,
        node: node,
        events: events,
        focus: focus,
        blur: blur
    };

};
