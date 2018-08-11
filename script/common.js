// (c) Yuoa
// Fucking IE does not support ES6. Fucking IE, Dirty Scum.

// Global Sy storage
var Rm = new (function () {

    "use strict";

    var wLoaded = false;
    var o = [];

    var execute = function (s) {

        Object.keys(s.node).map(function(key, i) {

            s.node[key] = document.querySelectorAll(s.node[key]);

            if (s.node[key].length == 1)
                s.node[key] = s.node[key][0];

        });

        s.setup(s.node);

    };

    this.add = function (s) {

        if (wLoaded)
            execute(s);
        else
            o.push(s);

    };

    // Set onload event
    window.onload = function () {

        wLoaded = true;

        console.log("%cDeveloper Console", "background-size: contain;background-image: url('https://cite.dev.yuoa.pm/wp-content/themes/lighthalzen/image/identity@bottom.png');color: rgb(0, 7, 55);font-family: monospace;font-size: 1.3rem;line-height: 3rem;background-repeat: no-repeat;font-weight: 900;padding-left:12.3rem;margin-top:.5rem;margin-bottom:.5rem");

        while (o.length > 0)
            execute(o.pop());

    };

});

// General lighthalzen object
var Sy = function (setup, node) {

    "use strict";

    if (typeof node === "undefined")
        node = {};

    return {
        setup: setup,
        node: node
    };

};
