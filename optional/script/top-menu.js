//(c) Yuoa

// Global Scope Variable
var moveDepth = 0;

// jQuery
jQuery(document).ready(function ($) {

    var lastSearch = '';
    var prevSearchTO = 0;
    var dndList = $("#menu-dnd-list");
    var isHoverOnExpandAnchor = false;
    var lang = document.documentElement.lang.indexOf("ko") === 0 ? "ko" : "en";

    // Remove it
    $("#ignore-intro").click(function () {

        $("#intro").remove();

        $.cookie('ltz-tmii', 'true', {expires: 6805, path: '/'});

    });

    // Meta Bar Tab
    $(".nav-tab-link").click(function (e) {

        if ($("#posttype-page").has(e.target).length) {

            $("#posttype-page .tabs-panel-active").removeClass("tabs-panel-active").addClass("tabs-panel-inactive");
            $("#posttype-page li.tabs").removeClass("tabs");

        } else if ($("#taxonomy-category").has(e.target).length) {

            $("#taxonomy-category .tabs-panel-active").removeClass("tabs-panel-active").addClass("tabs-panel-inactive");
            $("#taxonomy-category li.tabs").removeClass("tabs");

        } else if ($("#posttype-post").has(e.target).length) {

            $("#posttype-post .tabs-panel-active").removeClass("tabs-panel-active").addClass("tabs-panel-inactive");
            $("#posttype-post li.tabs").removeClass("tabs");

        }

        $("#" + e.target.dataset.type).addClass("tabs-panel-active").removeClass("tabs-panel-inactive");
        $(e.target.parentNode).addClass("tabs");

    });

    // Initializing Menu List
    $("#ltz-menu-init").click(function () {
        $("#menu-dnd-list")[0].innerHTML = "";
    });

    // Meta Bar Select All
    $("#nav-menu-meta .list-controls a").click(function (e) {

        var chBox;

        if ($("#posttype-page").has(e.target).length)
            chBox = $("#posttype-page .tabs-panel-active input[type=checkbox]");
        else if ($("#taxonomy-category").has(e.target).length)
            chBox = $("#taxonomy-category .tabs-panel-active input[type=checkbox]");
        else if ($("#posttype-post").has(e.target).length)
            chBox = $("#posttype-post .tabs-panel-active input[type=checkbox]");

        if (chBox.is(":checked"))
            chBox.prop("checked", false);
        else
            chBox.prop("checked", true);

        return false;

    });

    // Meta Bar Search Input Event
    $("#nav-menu-meta input[type=search]").on("change paste keyup", function (e) {

        clearTimeout(prevSearchTO);

        $this = $(this);

        $this.prop('autocomplete', 'off');

        prevSearchTO = setTimeout(function () {
            updateQuickSearchResults($this);
        }, 500);

    }).on('blur', '.quick-search', function () { lastSearch = ''; });

    // Meta Bar Search Query
    var updateQuickSearchResults = function(input) {
        var panel, params,
            minSearchLength = 1,
            q = input.val();

        /*
         * Minimum characters for a search. Also avoid a new AJAX search when
         * the pressed key (e.g. arrows) doesn't change the searched term.
         */
        if ( q.length < minSearchLength || lastSearch == q ) {
            return;
        }

        lastSearch = q;

        panel = input.parents('.tabs-panel');
        params = {
            'action': 'menu-quick-search',
            'response-format': 'markup',
            'menu': $('#menu').val(),
            'menu-settings-column-nonce': $('#menu-settings-column-nonce').val(),
            'q': q,
            'type': input.attr('name')
        };

        $('.spinner', panel).addClass('is-active');

        $.post(ajaxurl, params, function(menuMarkup) {
            processQuickSearchQueryResponse(menuMarkup, params, panel);
        });
    };

    // Quick Search
    var processQuickSearchQueryResponse = function(resp, req, panel) {
        var matched, newID,
        takenIDs = {},
        form = document.getElementById('nav-menu-meta'),
        pattern = /menu-item[(\[^]\]*/,
        $items = $('<div>').html(resp).find('li'),
        wrapper = panel.closest( '.accordion-section-content' ),
        $item;

        if( ! $items.length ) {
            $('.categorychecklist', panel).html( '<li><p>' + ltzTranslation.itemNotFound + '</p></li>' );
            $( '.spinner', panel ).removeClass( 'is-active' );
            wrapper.addClass( 'has-no-menu-item' );
            return;
        }

        $items.each(function(){
            $item = $(this);

            // make a unique DB ID number
            matched = pattern.exec($item.html());

            if ( matched && matched[1] ) {
                newID = matched[1];
                while( form.elements['menu-item[' + newID + '][menu-item-type]'] || takenIDs[ newID ] ) {
                    newID--;
                }

                takenIDs[newID] = true;
                if ( newID != matched[1] ) {
                    $item.html( $item.html().replace(new RegExp(
                        'menu-item\\[' + matched[1] + '\\]', 'g'),
                        'menu-item[' + newID + ']'
                    ) );
                }
            }
        });

        $('.categorychecklist', panel).html( $items );
        $( '.spinner', panel ).removeClass( 'is-active' );
        wrapper.removeClass( 'has-no-menu-item' );
    };

    // URL Checker by https://stackoverflow.com/a/5717133/9471289
    var isGoodURL = function (s) {
        try {
            new URL(s);
            return true;
        } catch (e) {
            return false;
        }
    }

    // Add to menu list
    $(".add-to-menu input[type=submit]").click(function (e) {

        var chBox, chType, cType = true;
        var code = Math.floor(Math.random() * 100000000).toString(16);

        if ($("#posttype-page").has(e.target).length) {

            chType = 'page';
            chBox = $("#posttype-page .tabs-panel-active input[type=checkbox]:checked");

        } else if ($("#taxonomy-category").has(e.target).length) {

            chBox = $("#taxonomy-category .tabs-panel-active input[type=checkbox]:checked");
            chType = 'category';

        } else if ($("#posttype-post").has(e.target).length) {

            chType = "post";
            chBox = $("#posttype-post .tabs-panel-active input[type=checkbox]:checked");

        } else if ($("#customlinkdiv").has(e.target).length) {

            chType = "customLink";
            cType = false;

        } else if ($("#labeldiv").has(e.target).length) {

            chType = "label";
            cType = false;

        }

        if (cType)
            chBox.each(function() {

                $this = $(this);
                var text = $($this[0].parentNode.parentNode.children).filter("input.menu-item-title").val();

                ltzAddMenu(
                    code,
                    {ko: text, en: text},
                    chType,
                    {
                        url: $($this[0].parentNode.parentNode.children).filter("input.menu-item-url").val(),
                        title: text,
                        depth: 0
                    }
                );

                $this.prop("checked", false);

            });
        else if (chType == "customLink") {

            $("#customlinkdiv .invalid").removeClass("invalid");

            var willReturn = false;

            if ($("#custom-menu-item-name-ko").val() == "") {
                $("#custom-menu-item-name-ko").addClass("invalid");
                willReturn = true;
            }
            if ($("#custom-menu-item-name-en").val() == "") {
                $("#custom-menu-item-name-en").addClass("invalid");
                willReturn = true;
            }
            if (!isGoodURL($("#custom-menu-item-url").val())) {
                $("#custom-menu-item-url").addClass("invalid");
                willReturn = true;
            };

            if (willReturn)
                return false;

            ltzAddMenu(
                code,
                {
                    ko: $("#custom-menu-item-name-ko").val(),
                    en: $("#custom-menu-item-name-en").val()
                },
                chType,
                {
                    url: $("#custom-menu-item-url").val(),
                    title: ltzTranslation.customLink,
                    depth: 0
                }
            );

            $("#custom-menu-item-name-ko").val("");
            $("#custom-menu-item-name-en").val("");
            $("#custom-menu-item-url").val("http://");

        } else if (chType == "label") {

            $("#labeldiv .invalid").removeClass("invalid");

            var willReturn = false;

            if ($("#menu-label-name-ko").val() == "") {
                $("#menu-label-name-ko").addClass("invalid");
                willReturn = true;
            }
            if ($("#menu-label-name-en").val() == "") {
                $("#menu-label-name-en").addClass("invalid");
                willReturn = true;
            };

            if (willReturn)
                return false;

            ltzAddMenu(
                code,
                {
                    ko: $("#menu-label-name-ko").val(),
                    en: $("#menu-label-name-en").val()
                },
                chType,
                {
                    url: "#",
                    title: ltzTranslation.noOriginal,
                    depth: 0
                }
            );

            $("#menu-label-name-ko").val("");
            $("#menu-label-name-en").val("");

        }

        setDetailboxClickEvent();

        return false;

    });

    // Add to Menu List (Raw)
    var ltzAddMenu = function (id, val, type, data) {

        if (typeof val === "string")
            val = {ko: val, en: val};

        if (typeof data === "undefined")
            data = {};

        dndList.append(
            "<li data-ltz='" + JSON.stringify([type, val, data, id]) + "' class='menu-item menu-item-depth-" + data.depth + " menu-item-post menu-item-edit-inactive' id='" + id + "'>"
                + "<div class='menu-item-bar'>"
                    + "<div class='menu-item-handle'>"
                        + "<span class='item-title'>"
                            + "<span class='menu-item-title'>" + val[lang] + "</span>"
                            + "<span class='is-submenu'>" + ltzTranslation.subitem + "</span>"
                        + "</span>"
                        + "<span class='item-controls'>"
                            + "<span class='item-type'>" + ltzTranslation[type] + "</span>"
                        + "</span>"
                        + "<a class='item-edit'>"
                            + "<span class='screen-reader-text'>" + ltzTranslation.edit + "</span>"
                        + "</a>"
                    + "</div>"
                + "</div>"
                + "<div class='menu-item-settings wp-clearfix'>"
                    + "<p class='description description-wide'>"
				        + "<label for='" + id + "-title-ko'>"
						    + ltzTranslation.koreanLabel + "<br>"
						    + "<input type='text' id='" + id + "-title-ko' class='widefat edit-menu-item-title' value='" + val["ko"] + "'>"
					    + "</label>"
				    + "</p>"
                    + "<p class='description description-wide'>"
				        + "<label for='" + id + "-title-en'>"
						    + ltzTranslation.englishLabel + "<br>"
						    + "<input type='text' id='" + id + "-title-en' class='widefat edit-menu-item-title' value='" + val["en"] + "'>"
					    + "</label>"
				    + "</p>"
                    + (type == "customLink" ?
                        "<p class='description description-wide'>"
				            + "<label for='" + id + "-url'>"
						        + "URL<br>"
						        + "<input type='text' id='" + id + "-url' class='widefat edit-menu-item-title' value='" + data.url + "'>"
					        + "</label>"
				        + "</p>" : "")
				    + "<div class='menu-item-actions description-wide submitbox'>"
						+ "<p class='link-to-original'>"
							+ ltzTranslation.original + ": <a href='" + data.url + "'>" + data.title + "</a>"
                        + "</p>"
					    + "<a class='item-delete submitdelete deletion' href='#'>" + ltzTranslation.delete + "</a>"
				    + "</div>"
			    + "</div>"
            + "</li>"
        );

    }

    // Sorting Menu
    $("ul#menu-dnd-list").sortable({
        items: 'li.menu-item',
        handle: '.menu-item-handle'
    }).on('sortable:start', function (e, ui) {

        if (isHoverOnExpandAnchor) {;

            toggleDetailBox(ui.item[0]);

            return false;

        } else {

            if ($(ui.item[0]).hasClass("menu-item-edit-active")) {
                $("head").append("<style id='ltzMenuSorting'>.placeholder{height:" + ui.item[0].offsetHeight + "px !important}</style>");
            }

            $("head").append("<style id='ltzMenuNope'>#" + ui.item[0].id + "{position:absolute;z-index:1}</style>");

            moveDepth = 0;
            ltz_move_action(ui.item[0], 0, 0);

        }

    }).on('sortable:stop', function (e, ui) {

        $("style#ltzMenuSorting").remove();
        $("style#ltzMenuNope").remove();
        $("style#ltzMenuDepth").remove();

        var prev = ui.item[0].previousElementSibling;

        if (prev) {
            var prevDepth = JSON.parse(prev.dataset.ltz)[2].depth;

            if (typeof prevDepth !== "undefined") {
                if (moveDepth > prevDepth + 1)
                    moveDepth = prevDepth + 1;
            } else {
                moveDepth = 0;
            }
        } else {
            moveDepth = 0;
        }

        if (moveDepth == 0) {

            ui.item
                .removeClass("menu-item-depth-1")
                .removeClass("menu-item-depth-2")
                .addClass("menu-item-depth-0");

            var ltzData = JSON.parse(ui.item[0].dataset.ltz);
            ltzData[2].depth = 0;

            ui.item[0].dataset.ltz = JSON.stringify(ltzData);

        } else if (moveDepth == 1){

            ui.item
                .removeClass("menu-item-depth-0")
                .removeClass("menu-item-depth-2")
                .addClass("menu-item-depth-1");

            var ltzData = JSON.parse(ui.item[0].dataset.ltz);
            ltzData[2].depth = 1;

            ui.item[0].dataset.ltz = JSON.stringify(ltzData);

        } else if (moveDepth == 2) {

            ui.item
                .removeClass("menu-item-depth-1")
                .removeClass("menu-item-depth-0")
                .addClass("menu-item-depth-2");

            var ltzData = JSON.parse(ui.item[0].dataset.ltz);
            ltzData[2].depth = 2;

            ui.item[0].dataset.ltz = JSON.stringify(ltzData);

        }

    });

    // Save Menu
    $("#menu-management input[type=submit]").click(function () {

        var data = [];

        $("ul#menu-dnd-list li").each(function (i, e) {

            data.push(e.dataset.ltz);

        });

        $("#menu-management input#ltz-menu-data").val(JSON.stringify(data));

    });

    // Open and Close the detail box
    var toggleDetailBox = function(e) {

        if (e instanceof HTMLLIElement) {

            e = $(e);

            if (e.hasClass('menu-item-edit-active'))
                e.addClass("menu-item-edit-inactive").removeClass("menu-item-edit-active");
            else if (e.hasClass('menu-item-edit-inactive'))
                e.addClass("menu-item-edit-active").removeClass("menu-item-edit-inactive");

        } else {

            var $parentActive = $(e.target).parents('.menu-item-edit-active');
            var $parentInactive = $(e.target).parents('.menu-item-edit-inactive');

            if ($parentActive.length)
                $parentActive
                    .addClass("menu-item-edit-inactive")
                    .removeClass("menu-item-edit-active");

            if ($parentInactive.length)
                $parentInactive
                    .addClass("menu-item-edit-active")
                    .removeClass("menu-item-edit-inactive");

        }

    };
    var setDetailboxClickEvent = function () {

        $("a.item-edit")
            .unbind("click mouseenter mouseleave")
            .click(toggleDetailBox)
            .mouseenter(function () {
                $("#menu-dnd-list").sortable('disable');
                isHoverOnExpandAnchor = true;
            })
            .mouseleave(function () {
                $("#menu-dnd-list").sortable('enable');
                isHoverOnExpandAnchor = false;
            });

        $("#menu-management a.item-delete").click(function (e) {

            $(e.target).parents("li.menu-item").remove();

        });

        $(".nav-menus-php .edit-menu-item-title").on("change paste keyup", function (e) {

            $this = $(this);
            $parent = $this.parents(".menu-item");

            var ltzData = JSON.parse($parent[0].dataset.ltz);

            if (this.id.indexOf("-ko") != -1) {
                ltzData[1].ko = $this.val();
                if (lang == "ko")
                    $("span.menu-item-title", $parent).text($this.val());
            } else if (this.id.indexOf("-en") != -1) {
                ltzData[1].en = $this.val();
                if (lang == "en")
                    $("span.menu-item-title", $parent).text($this.val());
            } else if (this.id.indexOf("-url") != -1)
                ltzData[2].url = $this.val();

            $parent[0].dataset.ltz = JSON.stringify(ltzData);

        });

    };

    // Display Saved Menu
    var ltzParsedMenu = JSON.parse(ltzMenuStr);
    if (ltzParsedMenu instanceof Array) {

        ltzParsedMenu.forEach(function (v) {

            var parsedEach = JSON.parse(v);

            ltzAddMenu(parsedEach[3], parsedEach[1], parsedEach[0], parsedEach[2])

        });

        setDetailboxClickEvent();

    }

});

// Depth Action - Global Scope
var ltz_move_action = function (e, x, y) {

    var el = jQuery(e);

    if (el.hasClass("menu-item-depth-0")) {

        if (x > 60) {
            jQuery("style#ltzMenuDepth").remove();
            jQuery("head").append("<style id='ltzMenuDepth'>.placeholder{margin-left:60px !important}</style>");
            moveDepth = 2;
        } else if (x > 30) {
            jQuery("style#ltzMenuDepth").remove();
            jQuery("head").append("<style id='ltzMenuDepth'>.placeholder{margin-left:30px !important}</style>");
            moveDepth = 1;
        } else {
            jQuery("style#ltzMenuDepth").remove();
            moveDepth = 0;
        }

    } else if (el.hasClass("menu-item-depth-1")) {

        if (x > 30) {
            jQuery("style#ltzMenuDepth").remove();
            jQuery("head").append("<style id='ltzMenuDepth'>.placeholder{margin-left:60px !important}</style>");
            moveDepth = 2;
        } else if (x < -10) {
            jQuery("style#ltzMenuDepth").remove();
            moveDepth = 0;
        } else {
            jQuery("style#ltzMenuDepth").remove();
            jQuery("head").append("<style id='ltzMenuDepth'>.placeholder{margin-left:30px !important}</style>");
            moveDepth = 1;
        }

    } else if (el.hasClass("menu-item-depth-2")) {

        if (x > 30) {
            jQuery("style#ltzMenuDepth").remove();
            jQuery("head").append("<style id='ltzMenuDepth'>.placeholder{margin-left:60px !important}</style>");
            moveDepth = 2;
        } else if (x >= -20) {
            jQuery("style#ltzMenuDepth").remove();
            jQuery("head").append("<style id='ltzMenuDepth'>.placeholder{margin-left:30px !important}</style>");
            moveDepth = 1;
        } else {
            jQuery("style#ltzMenuDepth").remove();
            moveDepth = 0;
        }

    }

};
