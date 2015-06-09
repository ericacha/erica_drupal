(function (jQuery, $) {
/* global define */
/* exported productsGridEqualHeight, initSlider */

(function ($) {
    'use strict';

    $.fn.equalImageHeight = function () {
        return this.each(function() {
            var maxHeight = 0;

            $(this).children('a').children('img').each(function(index, child) {
                var h = $(child).height();
                maxHeight = h > maxHeight ? h : maxHeight;
                $(child).css('height', ''); // clears previous value
            });

            $(this).children('a').each(function(index, child) {
                $(child).height(maxHeight);
            });

        });
    };

    $.fn.equalColumnsHeight = function () {
        function off() {
            /* jshint validthis: true */
            this.onload = null;
            this.onerror = null;
            this.onabort = null;
        }

        function on(dfd) {
            /* jshint validthis: true */
            off.bind(this)();
            dfd.resolve();
        }

        return this.each(function() {
            var loadPromises = [];

            $(this).find('img').each(function () {
                if (this.complete) return;
                var deferred = $.Deferred();
                this.onload = on.bind(this, deferred);
                this.onerror = on.bind(this, deferred);
                this.onabort = on.bind(this, deferred);
                loadPromises.push(deferred.promise());
            });

            $.when.apply($, loadPromises).done((function () {
                var cols =  $(this).children('[class*="col-"]').children('[class*="bd-layoutcolumn-"]').css('height', '');
                var indexesForEqual = [];
                var colsWidth = 0;
                var containerWidth = parseInt($(this).css('width'), 10);
                $(cols).each((function (key, column) {
                    colsWidth += parseInt($(column).parent().css('width'), 10);
                    if ((containerWidth + cols.length) >= colsWidth) { // col.length fixes width round in FF
                        indexesForEqual.push(key);
                    }
                }).bind(this));

                var maxHeight = 0;
                indexesForEqual.forEach(function (index) {
                    if (maxHeight < parseInt($(cols[index]).parent().css('height'), 10)) {
                        maxHeight = parseInt($(cols[index]).parent().css('height'), 10);
                    }
                });

                indexesForEqual.forEach(function (index) {
                    $(cols[index]).css('height', maxHeight);
                });
            }).bind(this));
        });
    };

    $(function(){
        $('.bd-row-auto-height').equalColumnsHeight();
        $(window).resize(function(){
            $('.bd-row-auto-height').equalColumnsHeight();
        });
    });
})(jQuery);

// IE10+ flex fix
if (1-'\0') {
    jQuery(function () {
        'use strict';

        var fixHeight = function fixHeight() {
            jQuery('[class*=" bd-layoutitemsbox"].bd-flex-wide, [class^="bd-layoutitemsbox"].bd-flex-wide').each(function () {
                var content = jQuery(this);
                content.wrapInner('<div class="bd-fix-flex-height"></div>');
                var wrapper = content.children('.bd-fix-flex-height');
                var height = wrapper.outerHeight(true);
                wrapper.children(':first').unwrap();
                content.css({
                    '-ms-flex-preferred-size': height + 'px',
                    'flex-basis': height + 'px'
                });
            });
        };

        var resizeTimeout = 0;
        $(window).on('resize', function () {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(fixHeight, 25);
        });
        setTimeout(fixHeight, 25);
    });
}

/*!
 * jQuery Cookie Plugin v1.4.0
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
    'use strict';
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else {
        factory(jQuery);
    }
}(function ($) {
    'use strict';
    var pluses = /\+/g;

    function encode(s) {
        return config.raw ? s : encodeURIComponent(s);
    }

    function decode(s) {
        return config.raw ? s : decodeURIComponent(s);
    }

    function stringifyCookieValue(value) {
        return encode(config.json ? JSON.stringify(value) : String(value));
    }

    function parseCookieValue(s) {
        if (s.indexOf('"') === 0) {
            s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
        }

        try {
            s = decodeURIComponent(s.replace(pluses, ' '));
        } catch(e) {
            return;
        }

        try {
            return config.json ? JSON.parse(s) : s;
        } catch(e) {}
    }

    function read(s, converter) {
        var value = config.raw ? s : parseCookieValue(s);
        return $.isFunction(converter) ? converter(value) : value;
    }

    var config = $.cookie = function (key, value, options) {

        // Write
        if (value !== undefined && !$.isFunction(value)) {
            options = $.extend({}, config.defaults, options);

            if (typeof options.expires === 'number') {
                var days = options.expires, t = options.expires = new Date();
                t.setDate(t.getDate() + days);
            }

            return (document.cookie = [
                encode(key), '=', stringifyCookieValue(value),
                options.expires ? '; expires=' + options.expires.toUTCString() : '',
                options.path    ? '; path=' + options.path : '',
                options.domain  ? '; domain=' + options.domain : '',
                options.secure  ? '; secure' : ''
            ].join(''));
        }

        var result = key ? undefined : {};
        var cookies = document.cookie ? document.cookie.split('; ') : [];

        for (var i = 0, l = cookies.length; i < l; i++) {
            var parts = cookies[i].split('=');
            var name = decode(parts.shift());
            var cookie = parts.join('=');

            if (key && key === name) {
                result = read(cookie, value);
                break;
            }

            if (!key && (cookie = read(cookie)) !== undefined) {
                result[name] = cookie;
            }
        }

        return result;
    };

    config.defaults = {};

    $.removeCookie = function (key, options) {
        if ($.cookie(key) !== undefined) {
            $.cookie(key, '', $.extend({}, options, { expires: -1 }));
            return true;
        }
        return false;
    };

}));

window.initSlider = function initSlider(selector, leftButtonSelector, rightButtonSelector, navigatorSelector, indicatorsSelector, carouselInterval, carouselPause, carouselWrap, carouselRideOnStart) {
    'use strict';
    jQuery(selector + '.carousel.slide .carousel-inner > .item:first-child').addClass('active');

    function setSliderInterval() {
        jQuery(selector + '.carousel.slide').carousel({interval: carouselInterval, pause: carouselPause, wrap: carouselWrap});
        if (!carouselRideOnStart) {
            jQuery(selector + '.carousel.slide').carousel('pause');
    }
    }

    /* 'active' must be always specified, otherwise slider would not be visible */
    jQuery(selector + '.carousel.slide .' + leftButtonSelector + ' a' + navigatorSelector).attr('href', '#');
    jQuery(selector + '.carousel.slide .' + leftButtonSelector + ' a' + navigatorSelector).click(function() {
        setSliderInterval();
        jQuery(selector + '.carousel.slide').carousel('prev');
        return false;
    });

    jQuery(selector + '.carousel.slide .' + rightButtonSelector + ' a' + navigatorSelector).attr('href', '#');
    jQuery(selector + '.carousel.slide .' + rightButtonSelector + ' a' + navigatorSelector).click(function() {
        setSliderInterval();
        jQuery(selector + '.carousel.slide').carousel('next');
        return false;
    });

    jQuery(selector + '.carousel.slide').on('slid.bs.carousel', function () {
        var indicators = jQuery(indicatorsSelector, this);
        indicators.find('.active').removeClass('active');
        var activeSlide = jQuery(this).find('.item.active');
        var activeIndex = activeSlide.parent().children().index(activeSlide);
        var activeItem = indicators.children()[activeIndex];
        jQuery(activeItem).children('a').addClass('active');
    });

    setSliderInterval();
};

jQuery(function ($) {
    'use strict';

    $('.collapse-button').each(function () {
        var button = $(this);
        var collapse = button.siblings('.collapse');

        collapse.on('show.bs.collapse', function () {
            if (button.parent().css('position') === 'absolute') {
                var right = collapse.width() - button.width();
                if (button.hasClass('bd-collapse-right')) {
                    $(this).css({
                        'position': 'relative',
                        'right': right
                    });
                } else {
                    $(this).css({
                        'position': '',
                        'right': ''
                    });
                }
            }
        });
    });
});

window.separatedGridResize = (function ($) {
    'use strict';
    var timeoutId, row = [];
    var getOffset = function(el) {
        var isInline = false;
        el.css('position','relative');
        if(el.css('display') === 'inline') {
            el.css('display','inline-block');
            isInline = true;
        }
        var offset = el.position().top;
        if(isInline) {
            el.css('display','inline');
        }
        return offset;
    };
    var getCollapsedMargin = function(el){
        if(el.css('display') === 'block') {
            var m0 = parseFloat(el.css('margin-top'));
            if (m0 > 0) {
                var p = el.prev();
                var prop = 'margin-bottom';
                if (p.length < 1) {
                    p = el.parent();
                    prop = 'margin-top';
                }
                if (p.length > 0 && p.css('display') === 'block') {
                    var m = parseFloat(p.css(prop));
                    if (m > 0){
                        return Math.min(m0, m);
                    }
                }
            }
        }
        return 0;
    };
    var classRE = new RegExp('.*(bd-\\S+[-\\d]*).*');
    var childFilter = function(){
        return classRE.test(this.className);
    };
    var calcOrder = function(items){
        var roots = items;
        while(roots.eq(0).children().length === 1){
            roots = roots.children();
        }
        var childrenClasses = [];
        var childrenWeights = {};
        var getNextWeight = function(children, i, l){
            for (var j = i + 1; j < l; j++){
                var cls = children[j].className.replace(classRE,'$1');
                if (childrenClasses.indexOf(cls) !== -1){
                    return childrenWeights[cls];
                }
            }
            return 100; //%
        };
        roots.each(function(i, root){
            var children  = $(root).children().filter(childFilter);
            var previousWeight = 0;
            for (var c = 0, l = children.length; c < l; c++){
                var cls = children[c].className.replace(classRE,'$1');
                if (childrenClasses.indexOf(cls) === -1){
                    var nextWeight = getNextWeight(children, c, l);
                    childrenWeights[cls] = previousWeight + (nextWeight - previousWeight) / 10; //~max unique child
                    childrenClasses.push(cls);
                }
                previousWeight = childrenWeights[cls];
            }
        });
        childrenClasses.sort(function(a, b){ return childrenWeights[a] > childrenWeights[b];});
        return childrenClasses;
    };
    var calcRow = function (last, order) {
        $.each(row, function (i, e) {
            $(e).css({'overflow':'visible', 'height':'auto'})
                .toggleClass('last-row', last);
        });
        if (row.length > 0) {
            var roots = $(row);
            roots.removeClass('last-col').last().addClass('last-col');
            while(roots.eq(0).children().length === 1){
                roots = roots.children();
            }
            var cls = '';
            var maxOffset = 0;
            var calcMaxOffsets = function(i, root){
                var el = $(root).children().filter('.'+cls+':visible:first');
                if (el.length < 1 || el.css('position') === 'absolute') {
                    return;
                }
                var offset = getOffset(el);
                if (offset > maxOffset) {
                    maxOffset = offset;
                }
            };
            var setMaxOffsets = function(i, root){
                var el =  $(root).children().filter('.'+cls+':visible:first');
                if (el.length < 1 || el.css('position') === 'absolute') {
                    return;
                }
                var offset =  getOffset(el);
                var fix = maxOffset - offset - getCollapsedMargin(el);
                if (fix > 0) {
                    el.before('<div class="bd-empty-grid-item" style="height:'+ fix +'px"></div>');
                }
            };
            for (var c = 0; c < order.length; c++){
                maxOffset = 0;
                cls = order[c];
                roots.each(calcMaxOffsets).each(setMaxOffsets);
            }
            var hMax = 0;
            $.each(roots, function (i, e) {
                var h = $(e).outerHeight();
                if (hMax < h) {
                    hMax = h;
                }
            });
            $.each(roots, function (i, e) {
                var el = $(e);
                var fix = hMax - el.outerHeight();
                if (fix > 0) {
                    el.append('<div class="bd-empty-grid-item" style="height:'+ fix +'px"></div>');
                }
            });
        }
        row = [];
    };
    var itemsRE = new RegExp('.*(separated-item[^\\s]+).*');
    return function () {
        clearTimeout(timeoutId);
        var grid = $('.separated-grid');
        grid.each(function (i, gridElement) {
            var g = $(gridElement);
            if (!g.is(':visible')) {
                return;
            }
            if (g.innerHeight() === gridElement._height && g.innerWidth() === gridElement._width) {
                return;
            }
            var item = g.find('div[class*=separated-item]:visible:first');
            if (0 === item.length){
                return;
            }
            var items = g.find('div.'+item.attr('class').replace(itemsRE, '$1'));
            if (items.length < 1) {
                return;
            }
            var windowScrollTop = $(window).scrollTop();
            items.css({'overflow': 'hidden', 'height': '10px'}).removeClass('last-row');
            g.find('div.bd-empty-grid-item').remove();
            var firstLeft = items.position().left;
            var order = calcOrder(items);
            var notDisplayed = [];
            var lastItem = null;
            items.each(function (i, gridItem) {
                var item = $(gridItem);
                var p = item;
                do {
                    if (p.css('display') === 'none'){
                        p.data('style', p.attr('style')).css('display', 'block');
                        notDisplayed.push(p[0]);
                    }
                    p = p.parent();

                } while (p.length > 0 && p[0] !== gridElement && !item.is(':visible'));
                var first = firstLeft >= item.position().left;
                if (first && row.length > 0) {
                    calcRow(lastItem && lastItem.parentNode !== gridItem.parentNode, order);
                }
                row.push(gridItem);
                item.toggleClass('first-col', first);
                if (i === items.length - 1) {
                    calcRow(true, order);
                }
                lastItem = gridItem;
            });
            $(notDisplayed).each(function(i, e){
                var el = $(e);
                var css = el.data('style');
                el.removeData('style');
                if ('undefined' !== typeof css) {
                    el.attr('style', css);
                } else {
                    el.removeAttr('style');
                }
            });
            gridElement._width =  g.innerWidth();
            gridElement._height = g.innerHeight();
            $(window).scrollTop(windowScrollTop);
        });
        timeoutId = setTimeout(window.separatedGridResize, 250);
    };
})(jQuery);
jQuery(window.separatedGridResize);

(function ($) {
    'use strict';
    $(document).ready(function () {
        if ("undefined" !== typeof parent.AppController) return;
        var controls = $('[data-autoplay=true]');
        $(controls).each(function (index, item) {
            item.src = item.src + "&autoplay=1";
        });
    });

})(jQuery);

jQuery(function ($) {
    'use strict';

    $(document).on('click.themler', '[data-responsive-menu] li > a:not([data-toggle="collapse"])', function responsiveClick() {
        var itemLink = $(this);
        var menu = itemLink.closest('[data-responsive-menu]');
        var responsiveBtn = menu.find('.collapse-button');
        var responsiveLevels = menu.data('responsiveLevels');

        if (responsiveBtn.length &&
                !responsiveBtn.is(':visible') ||
                $('body').width() >= 768 ||
                (responsiveLevels !== 'expand on click' && responsiveLevels !== '') ||
                !menu.data('responsiveMenu')) {
            return true;
        }

        var submenu = itemLink.siblings();
        if (!submenu.length) return true;
        if (submenu.is(':visible')) {
            submenu.removeClass('show');
            itemLink.removeClass('active');
        } else {
            itemLink
                .closest('li')
                .siblings('li')
                .find('ul').parent()
                .removeClass('show');
            submenu.addClass('show');
            itemLink.addClass('active');
        }
        return false;
    });
});

jQuery(function ($) {
    'use strict';

    $('body')
        .on('click.themler', '[data-url] a', function (e) {
            e.stopPropagation();
        })
        .on('click.themler', '[data-url]', function () {
            var elem = $(this),
                url = elem.data('url'),
                target = elem.data('target');
            window.open(url, target);
        });
});

jQuery(function ($) {
    'use strict';
    var leftClass = 'bd-popup-left';
    var rightClass = 'bd-popup-right';

    $(document).on('mouseenter', 'ul.nav > li, .nav ul > li', function calcSubmenuDirection() {
        var popup = $(this).children('[class$="-popup"], [class*="-popup "]');
        if (popup.length && popup.is(':visible')) {
            popup.removeClass(leftClass + ' ' + rightClass);
            var dir = '';
            if (popup.parents('.' + leftClass).length) {
                dir = leftClass;
            } else if (popup.parents('.' + rightClass).length) {
                dir = rightClass;
            }
            if (dir) {
                popup.addClass(dir);
            } else {
                var left = popup.offset().left;
                var width = popup.outerWidth();
                if (left < 0) {
                    popup.addClass(rightClass);
                } else if (left + width > $(window).width()) {
                    popup.addClass(leftClass);
                }
            }
        }
    });
});

jQuery(function ($) {
    'use strict';

    window.tabCollapseResize = function () {
        $('.tabbable').each(function () {
            var tabbable = $(this);
            var tabMenu = tabbable.children('.nav-tabs');
            var tabs = tabMenu.children('li');
            var tabContent = tabbable.children('.tab-content');
            var panels = tabContent.find('.tab-pane');

            if (!tabs.filter('.active').length) {
                tabs.first().addClass('active');
                panels.removeClass('active').first().addClass('active');
            }

            if (!tabbable.data('responsive')) {
                if (tabContent.children('.accordion').length) {
                    tabContent.children('.accordion').children().first().unwrap();
                }
                tabContent.find('.accordion-item').remove();
                panels.each(function () {
                    var wrapper = $(this).children('.accordion-wrap');
                    if (wrapper.children().length) {
                        wrapper.children().first().unwrap();
                    } else {
                        wrapper.remove();
                    }
                });
                return;
            }

            var cls = tabMenu.siblings('.accordion').children('.accordion-content').attr('class');
            var wrapper = tabContent.find('.accordion-wrap');
            if (wrapper.length) {
                tabContent.find('.accordion-wrap').toggleClass(cls, tabContent.find('.accordion-item:visible').length > 0);
                return;
            }

            var accordion = tabbable.children('.accordion');

            accordion.show();
            var accordionTpl = accordion.clone();
            accordion.hide();

            var itemTpl = accordion.find('.accordion-item').clone();
            var contentTpl = accordion.find('.accordion-content').clone();
            accordionTpl.empty();

            tabs.each(function () {
                var tab = $(this);
                var tablink = tab.find('[data-toggle="tab"]');
                var currentId = tablink.attr('href');
                var panel = panels.filter(currentId);

                var collapseLink = $('<a></a>');
                collapseLink.html(tablink.html());
                collapseLink.attr('data-toggle', 'collapse');
                collapseLink.attr('data-target', currentId);

                panel.before(itemTpl.clone().append(collapseLink));
                panel.wrapInner(contentTpl.clone().addClass('accordion-wrap').toggleClass(cls, collapseLink.is(':visible')));

                panel.addClass('collapse');
                if (panel.is('.active')) {
                    panel.addClass('in');
                    collapseLink.addClass('active');
                }

                /* Collapse */

                panel.on('show.bs.collapse', function () {
                    var actives = panels.filter('.in');
                    panels.filter('.collapsing:not(.active)').addClass('bd-collapsing');
                    if (actives && actives.length) {
                        var activesData = actives.data('bs.collapse');
                        if (!activesData || !activesData.transitioning) {
                            actives.collapse('hide');
                            if (!activesData) actives.data('bs.collapse', null);
                        }
                    }
                    panel.css('display', 'block');

                    collapseLink.addClass('active');
                });

                panel.on('shown.bs.collapse', function () {
                    tab.addClass('active');
                    panel.addClass('active');

                    panel.css('display', '');
                    panel.filter('.bd-collapsing').removeClass('bd-collapsing').collapse('hide');
                });

                panel.on('hide.bs.collapse', function () {
                    collapseLink.removeClass('active');
                });

                panel.on('hidden.bs.collapse', function () {
                    tab.removeClass('active');
                    panel.removeClass('active');
                    panel.css('height', '');
                });

                /* Tabs */

                tablink.on('show.bs.tab', function () {
                    panels.removeClass('in');
                    tabContent.find('.accordion > .accordion-item > a').removeClass('active');

                    panel.css('height', '');
                    panel.addClass('in');
                    collapseLink.addClass('active');
                });
            });

            tabContent.wrapInner(accordionTpl);
        });
    };

    var resizeTimeout = 0;
    $(window).on('resize', function () {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(window.tabCollapseResize, 25);
    });

    window.tabCollapseResize();
});

})(window._$, window._$);
(function (jQuery, $) {
(function($){
    'use strict';
    /*jshint -W004 */
    /**
     * Copyright 2012, Digital Fusion
     * Licensed under the MIT license.
     * http://teamdf.com/jquery-plugins/license/
     *
     * @author Sam Sehnert
     * @desc A small plugin that checks whether elements are within
     *       the user visible viewport of a web browser.
     *       only accounts for vertical position, not horizontal.
     */
    var $w = $(window);
    $.fn.visible = function(partial,hidden,direction){

        if (this.length < 1)
            return;

        var $t        = this.length > 1 ? this.eq(0) : this,
            t         = $t.get(0),
            vpWidth   = $w.width(),
            vpHeight  = $w.height(),
            direction = (direction) ? direction : 'both',
            clientSize = hidden === true ? t.offsetWidth * t.offsetHeight : true;

        if (typeof t.getBoundingClientRect === 'function'){

            // Use this native browser method, if available.
            var rec = t.getBoundingClientRect(),
                tViz = rec.top    >= 0 && rec.top    <  vpHeight,
                bViz = rec.bottom >  0 && rec.bottom <= vpHeight,
                lViz = rec.left   >= 0 && rec.left   <  vpWidth,
                rViz = rec.right  >  0 && rec.right  <= vpWidth,
                vVisible   = partial ? tViz || bViz : tViz && bViz,
                hVisible   = partial ? lViz || rViz : lViz && rViz;

            if(direction === 'both')
                return clientSize && vVisible && hVisible;
            else if(direction === 'vertical')
                return clientSize && vVisible;
            else if(direction === 'horizontal')
                return clientSize && hVisible;
        } else {

            var viewTop         = $w.scrollTop(),
                viewBottom      = viewTop + vpHeight,
                viewLeft        = $w.scrollLeft(),
                viewRight       = viewLeft + vpWidth,
                offset          = $t.offset(),
                _top            = offset.top,
                _bottom         = _top + $t.height(),
                _left           = offset.left,
                _right          = _left + $t.width(),
                compareTop      = partial === true ? _bottom : _top,
                compareBottom   = partial === true ? _top : _bottom,
                compareLeft     = partial === true ? _right : _left,
                compareRight    = partial === true ? _left : _right;

            if(direction === 'both')
                return !!clientSize && ((compareBottom <= viewBottom) && (compareTop >= viewTop)) && ((compareRight <= viewRight) && (compareLeft >= viewLeft));
            else if(direction === 'vertical')
                return !!clientSize && ((compareBottom <= viewBottom) && (compareTop >= viewTop));
            else if(direction === 'horizontal')
                return !!clientSize && ((compareRight <= viewRight) && (compareLeft >= viewLeft));
        }
    };

    $(onLoad);
    $(window).on('scroll', animateOnScroll);

    function onLoad() {
        var hoverEffects = $('.animated[data-animation-event="hover"]');
        if (hoverEffects.length) {
            hoverEffects.each(function () {
                var effect = $(this);
                effect.on('mouseover', animateOnHover(effect));
            });
        }

        subscribeOnSlideEvents('slideout');
        subscribeOnSlideEvents('slidein');

        var slideInEffects = $('.animated[data-animation-event="slidein"]');
        if (slideInEffects.length) {
            var carousels = getCarousels(slideInEffects);

            if (carousels.length) {
                carousels.forEach(function (_class) {
                    var _carousel = $('.' + _class.trim().replace(/\s{2,}/g, ' ').replace(/\s/g, '.'));
                    _carousel.trigger('slid.bs.carousel');
                });
            }
        }

        var onLoadEffects = $('.animated[data-animation-event="onload"]');
        if (onLoadEffects.length) {
            onLoadEffects.each(function () {
                applyAnimation($(this));
            });
        }
        var onLoadIntervalEffects = $('.animated[data-animation-event="onloadinterval"]');
        if (onLoadIntervalEffects.length) {
            onLoadIntervalEffects.each(function () {
                var effect = $(this);
                if (effect.visible(true)) {
                    var animationClass = effect.data('animation-name');
                    if (animationClass) {
                        effect.addClass(animationClass);
                    }
                }

                var duration = isNaN(parseFloat(effect.attr('data-animation-duration'))) ? 0 : parseFloat(effect.attr('data-animation-duration'));
                var delay = isNaN(parseFloat(effect.attr('data-animation-delay'))) ? 0 : parseFloat(effect.attr('data-animation-delay'));
                setInterval(function () {
                    effect.removeClass(animationClass);
                    setTimeout(function (){
                        effect.addClass(animationClass);
                    }, 50);
                }, duration + delay);
            });
        }

    }
    function applyAnimation(effect) {
        if (effect.visible(true)) {
            var animationClass = effect.data('animation-name');
            if (animationClass) {
                effect.addClass(animationClass);
            }

            if (effect.attr('data-animation-infinited') === 'true') {
                effect.addClass('infinite');
            }
        }
    }

    function animateOnScroll() {
        var scrollEffects = $('.animated[data-animation-event="scroll"]');

        if (scrollEffects) {
            scrollEffects.each(function () {
                applyAnimation($(this));
            });
        }
        var scrollLoopEffects = $('.animated[data-animation-event="scrollloop"]');
        if (scrollLoopEffects) {
            scrollLoopEffects.each(function () {
                var effect = $(this);
                if (effect.visible(false)) {
                    effect.removeClass(effect.data('animation-name'));
                }
                applyAnimation(effect);
            });
        }
    }

    function animateOnHover(dom) {
        return (function() {
            var animationClass = dom.attr('data-animation-name');
            if (animationClass && !dom.is('.' + animationClass)) {
                if (dom.attr('data-animation-infinited') === 'false') {
                    var duration = dom.attr('data-animation-duration');
                    setTimeout(function () {
                        dom.removeClass(animationClass);
                    }, isNaN(parseFloat(duration)) ? 1000 : parseFloat(duration));
                } else {
                    dom.addClass('infinite');
                }
                dom.addClass(animationClass);
            }
        });
    }

    function subscribeOnSlideEvents(eventName) {
        var slideEffects = $('.animated[data-animation-event="' + eventName + '"]');
        var carouselEvent = eventName === 'slideout' ? 'slide' : 'slid';
        if (slideEffects.length) {
            var carousels = getCarousels(slideEffects);

            if (carousels.length) {
                carousels.forEach(function (_class) {
                    var _carousel = $('.' + _class.trim().replace(/\s{2,}/g, ' ').replace(/\s/g, '.'));
                    _carousel.on(carouselEvent + '.bs.carousel', eventName === 'slidein' ? animateOnSlideIn(_carousel) : animateOnSlideOut(_carousel));

                    _carousel.on('slide.bs.carousel', function (event) {
                        var target = $(event.relatedTarget);
                        var effectsInSlider = target.find('.animated[data-animation-event="' + eventName + '"]');
                        if (effectsInSlider.length) {
                            var maxDuration = eventName === 'slideout' ? getMaxDuration(effectsInSlider) : 0;
                            effectsInSlider.each(function () {
                                var effect = $(this);
                                if (needToHide(effect)) {
                                    if (eventName === 'slideout') {
                                        setTimeout(function () {
                                            effect.css('display', '');
                                        }, maxDuration);
                                    }
                                    if (eventName === 'slidein') {
                                        effect.css('display', 'none');
                                    }
                                }
                            });
                        }
                    });
                });
            }
        }
    }



    function animateOnSlideOut(carousel) {
        return (function() {
            var moveSlide = false;
            return function (event) {
                var effects = getActiveSlideEffects(carousel, 'slideout');
                if (effects.length) {
                    if (!moveSlide) {
                        event.isDefaultPrevented = function () {
                            return true;
                        };

                        animateFunc(carousel, 'slideout');

                        var eventDirection = event.direction === 'left' ? 'next' : 'prev';
                        var maxDuration = getMaxDuration(effects);
                        setTimeout(function () {
                            moveSlide = true;
                            carousel.carousel(eventDirection);
                        }, maxDuration);
                    } else {
                        moveSlide = false;
                    }
                }
            };
        })();
    }

    function animateOnSlideIn(carousel) {
        return (function () {
            animateFunc(carousel, 'slidein');
        });
    }

    function animateFunc(carousel, eventName){
        var effects = getActiveSlideEffects(carousel, eventName);
        var maxDuration = getMaxDuration(effects);
        effects.each(function () {
            var effect = $(this);
            var animationClass = effect.attr('data-animation-name');
            if (animationClass) {
                if (effect.attr('data-animation-infinited') === 'false') {
                    if (!effect.is('.' + animationClass)) {
                        setTimeout(function () {
                            effect.removeClass(animationClass);
                        }, maxDuration + 100);
                    }
                } else {
                    effect.addClass('infinite');
                }
                if (needToHide(effect)) {
                    if (eventName === 'slideout') {
                        setTimeout(function () {
                            effect.css('display', 'none');
                        }, maxDuration);
                    }
                    if (eventName === 'slidein') {
                        effect.css('display', '').find('.animated[data-animation-event="slideout"]').css('display','');
                    }
                }
                effect.addClass(animationClass);
            }
        });
    }

    function needToHide(effect) {
        var hide = true;
        var animationName = effect.attr('data-animation-name');
        var visibleAnimations = ['bounce', 'flash', 'pulse', 'rubber', 'band','snake','swing','tada','wobble', 'slideindown' , 'slideinleft' , 'slideinright', 'slideinup',
            'slideoutdown', 'slideoutleft', 'slideoutright', 'slideoutup'];
        hide = visibleAnimations.indexOf(animationName.toLowerCase()) === -1;
        return hide;
    }

    function getCarousels(effects) {
        var carousels = [];
        effects.each(function () {
            var effect = $(this);
            var carousel = $('.carousel').has(effect);
            if (carousel.length && carousels.indexOf(carousel.attr('class')) === -1) {
                carousels.push(carousel.attr('class'));
            }
        });
        return carousels;
    }

    function getMaxDuration(effects) {
        var maxDuration = 0;
        effects.each(function () {
            var effect = $(this);
            var duration = isNaN(parseFloat(effect.attr('data-animation-duration'))) ? 0 : parseFloat(effect.attr('data-animation-duration')),
                delay = isNaN(parseFloat(effect.attr('data-animation-delay'))) ? 0 : parseFloat(effect.attr('data-animation-delay'));
            var animationTime = duration + delay;

            maxDuration = maxDuration < animationTime ? animationTime : maxDuration;
        });
        return maxDuration;
    }

    function getActiveSlideEffects(carousel, event) {
        var activeSlide = carousel.find('.carousel-inner > .active');
        var effects = activeSlide.find('.animated[data-animation-event="' + event + '"]');
        return effects;
    }

})(jQuery);
})(window._$, window._$);
(function (jQuery, $) {

    
jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-8 img:not(.no-lightbox), .bd-lightbox, .lightbox').init();
});
})(window._$, window._$);
(function (jQuery, $) {

window.ThemeLightbox = (function ($) {
    'use strict';
    return (function ThemeLightbox(selectors) {
        var selector = selectors;
        var images = $(selector);
        var current;
        var close = function () {
            $(".bd-lightbox").remove();
        };
        this.init = function () {

            $(selector).mouseup(function (e) {
                if (e.which && e.which !== 1) {
                    return;
                }
                current = images.index(this);
                var imgContainer = $('.bd-lightbox');
                if (imgContainer.length === 0) {
                    imgContainer = $('<div class="bd-lightbox">').css('line-height', $(window).height() + "px")
                        .appendTo($("body"));
                    var closeBtn = $('<div class="close"><div class="cw"> </div><div class="ccw"> </div><div class="close-alt">&#10007;</div></div>');
                    closeBtn.appendTo(imgContainer);
                    closeBtn.click(close);
                    showArrows();
                    var scrollDelay = 100;
                    var lastScroll = 0;
                    imgContainer.bind('mousewheel DOMMouseScroll', function (e) {
                        var date  =  new Date();
                        if (date.getTime() > lastScroll + scrollDelay) {
                            lastScroll = date.getTime();
                            var orgEvent = window.event || e.originalEvent;
                            var delta = (orgEvent.wheelDelta ? orgEvent.wheelDelta : orgEvent.detail * -1) > 0 ? 1 : -1;
                            move(current + delta);
                        }
                        e.preventDefault();
                    }).mousedown(function (e) {
                            // close on middle button click
                            if (e.which === 2) {
                                close();
                            }
                            e.preventDefault();
                     });
                }
                move(current);
            });
        };

        function move(index) {

            if (index < 0 || index >= images.length) {
                return;
            }

            showError(false);

            current = index;

            $(".bd-lightbox .lightbox-image:not(.active)").remove();

            var active = $(".bd-lightbox .active");
            var target = $('<img class="lightbox-image" alt="" src="' + getFullImgSrc($(images[current])) + '" />').click(function () {
                if ($(this).hasClass("active")) {
                    move(current + 1);
                }
            });

            if (active.length > 0) {
                active.after(target);
            } else {
                $(".bd-lightbox").append(target);
            }

            showArrows();
            showLoader(true);

            $(".bd-lightbox").add(target);

            target.load(function () {
                showLoader(false);
                active.removeClass("active");
                target.addClass("active");
            });

            target.error(function () {
                showLoader(false);
                active.removeClass("active");
                target.addClass("active");
                target.attr("src", $(images[current]).attr("src"));
                target.unbind('error');
            });
        }

        function showArrows() {
            if ($(".bd-lightbox .arrow").length === 0) {
                var topOffset = $(window).height() / 2 - 40;
                $(".bd-lightbox")
                    .append(
                        $('<div class="arrow left"><div class="arrow-t ccw"> </div><div class="arrow-b cw"> </div><div class="arrow-left-alt">&#8592;</div></div>')
                            .css("top", topOffset)
                            .click(function () {
                                move(current - 1);
                            })
                    )
                    .append(
                        $('<div class="arrow right"><div class="arrow-t cw"> </div><div class="arrow-b ccw"> </div><div class="arrow-right-alt">&#8594;</div></div>')
                            .css("top", topOffset)
                            .click(function () {
                                move(current + 1);
                            })
                    );
            }

            if (current === 0) {
                $(".bd-lightbox .arrow.left").addClass("disabled");
            } else {
                $(".bd-lightbox .arrow.left").removeClass("disabled");
            }

            if (current === images.length - 1) {
                $(".bd-lightbox .arrow.right").addClass("disabled");
            } else {
                $(".bd-lightbox .arrow.right").removeClass("disabled");
            }
        }

        function showError(enable) {
            if (enable) {
                $(".bd-lightbox").append($('<div class="lightbox-error">The requested content cannot be loaded.<br/>Please try again later.</div>')
                    .css({ "top": $(window).height() / 2 - 60, "left": $(window).width() / 2 - 170 }));
            } else {
                $(".bd-lightbox .lightbox-error").remove();
            }
        }

        function showLoader(enable) {
            if (!enable) {
                $(".bd-lightbox .loading").remove();
            }
            else {
                $('<div class="loading"> </div>').css({ "top": $(window).height() / 2 - 16, "left": $(window).width() / 2 - 16 }).appendTo($(".bd-lightbox"));
            }
        }

        function getFullImgSrc(image) {
            var largeImage = '';
            var parentLink = image.parent('a');
            if (parentLink.length) {
                parentLink.click(function (e) {
                    e.preventDefault();
                    });
                largeImage = parentLink.attr('href');
            } else {
                var src = image.attr("src");
                var fileName = src.substring(0, src.lastIndexOf('.'));
                var ext = src.substring(src.lastIndexOf('.'));
                largeImage = fileName + "-large" + ext;
            }
            return largeImage;
        }
    });
})(jQuery);
})(window._$, window._$);
window.ProductOverview_Class = "bd-productoverview";
(function (jQuery, $) {
jQuery(function($) {
    'use strict';

    var activeLayoutType = $.cookie('layoutType') || 'grid',
        activeLayoutTypeSelector = $.cookie('layoutSelector') || '.separated-item-4.grid';

    var layoutTypes = [];
    
        layoutTypes.push({
            name:'bd-griditemgrid',
            iconUrl: '',
            iconDataId: '3441',
            iconClassNames: 'bd-icon-16'
        });
        layoutTypes.push({
            name:'bd-griditemlist',
            iconUrl: '',
            iconDataId: '3456',
            iconClassNames: 'bd-icon-17'
        });
    if (typeof window.buildTypeSelector === 'function') {
        window.buildTypeSelector(layoutTypes, $('.bd-productsgridbar-1'));
    }

    
        $(document).on('click', '.bd-products i[data-layout-name="bd-griditemgrid"]', function (e) {
            if (activeLayoutType !== 'grid') {
                var grid = $('.bd-grid-44');
                grid.find('.separated-item-4.grid').css('display', 'block');
                grid.find(activeLayoutTypeSelector).css('display', 'none');
                activeLayoutType = 'grid';
                activeLayoutTypeSelector = '.separated-item-4.grid';

                $.cookie('layoutType', activeLayoutType, { path: '/' });
                $.cookie('layoutSelector', activeLayoutTypeSelector, { path: '/' });
            }
            e.preventDefault();
            e.stopPropagation();
            return false;
        });
        $(document).on('click', '.bd-products i[data-layout-name="bd-griditemlist"]', function (e) {
            if (activeLayoutType !== 'list') {
                var grid = $('.bd-grid-44');
                grid.find('.separated-item-5.list').css('display', 'block');
                grid.find(activeLayoutTypeSelector).css('display', 'none');
                activeLayoutType = 'list';
                activeLayoutTypeSelector = '.separated-item-5.list';

                $.cookie('layoutType', activeLayoutType, { path: '/' });
                $.cookie('layoutSelector', activeLayoutTypeSelector, { path: '/' });
            }
            e.preventDefault();
            e.stopPropagation();
            return false;
        });

});
})(window._$, window._$);
(function (jQuery, $) {
jQuery(function ($) {
    'use strict';

    function getFloat(value){
        return parseFloat(value.replace('px', ''))  ;
    }

    $('.bd-productsslider-1').each(function () {
        var slider = $(this).find('.carousel.slide');

        var items = slider.find('.carousel-inner > .item').addClass('clearfix').css('width', '100%');

        var resizeHandler = function () {
            var maxH = 0;
            if(items.length > 1) {
                var windowScrollTop = $(window).scrollTop();
                items.css('min-height', '0').each(function(){
                    maxH = Math.max(maxH, parseFloat(getComputedStyle(this).height));
                }).css('min-height', maxH);
                if($(window).scrollTop() !== windowScrollTop){
                    $(window).scrollTop(windowScrollTop);
                }
            }
            setTimeout(resizeHandler, 100);
        };
        resizeHandler();



        slider.carousel({ interval: 3000, pause: "hover", wrap: true});

        var leftButton = $('.left-button', slider);
        var rightButton = $('.right-button', slider);

        

        leftButton.find('.bd-carousel-1').click(function() {
            slider.carousel('prev');
            return false;
        }).attr('href', '#');

        rightButton.find('.bd-carousel-1').click(function() {
            slider.carousel('next');
            return false;
        }).attr('href', '#');

        
    });
});
})(window._$, window._$);
(function (jQuery, $) {
(function ($) {
    'use strict';

    $(stretchToBottom);
    $(window).on('resize', stretchToBottom);

    function stretchToBottom() {
        var bh, mh = 0;
        var parent;

        var c = $('.bd-stretch-to-bottom');
        if (c.length === 0) {
            return;
        }

        c.removeAttr('style');
        bh = $('body').height();

        $('body').children().each(function() {
            var $node = $(this);
            if ($node.css('position') !== 'absolute' && $node.css('position') !== 'fixed') {
                mh += $node.outerHeight(true);
                if ($.contains(this, c[0]) || this === c[0]) {
                    parent = $node;
                }
            }
        });

        if (mh < bh && parent) {
            var r = bh - mh;
            c.css('min-height', (c.outerHeight(true) + r) + 'px');
        }
    }

})(jQuery);
})(window._$, window._$);
(function (jQuery, $) {

    
jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-12 img:not(.no-lightbox), .bd-lightbox, .lightbox').init();
});
})(window._$, window._$);
(function (jQuery, $) {

jQuery(function ($) {
    'use strict';
    // hide #back-top first
    $(".bd-backtotop-1").hide();
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.bd-backtotop-1').fadeIn().css('display', 'block');
            } else {
                $('.bd-backtotop-1').fadeOut();
            }
        });
    });
});

})(window._$, window._$);
(function (jQuery, $) {
jQuery(function ($) {
    'use strict';

    $('.bd-smoothscroll-3 a[href*="#"]:not([data-toggle="collapse"])').on('click', function(e) {
        var animationTime = parseInt($('.bd-smoothscroll-3').data('animationTime'), 10) || 0;
        var target = this.hash;
        var link = $(this);
        e.preventDefault();

        $('body').data('scroll-animating', true);
        var targetElement = $(target || 'body');

        link.trigger($.Event('theme.smooth-scroll.before'));

        if (!targetElement || !targetElement.length)
            return;

        $('html, body').animate({
            scrollTop: targetElement.offset().top
        }, animationTime, function() {
            $('body').data('scroll-animating', false);
            window.location.hash = target;
            if (targetElement.is(':not(body)') && $('body').data('bs.scrollspy')) {
                link.parent('li').siblings('li').children('a').removeClass('active');
                link.addClass('active');
            }
            link.trigger($.Event('theme.smooth-scroll.after'));
        });
    });
});

jQuery(function ($) {
    'use strict';

    $('.bd-smoothscroll-3 a[href^="#"]:not([data-toggle="collapse"])').on('click', function(e) {
        var animationTime = parseInt($('.bd-smoothscroll-3').data('animationTime'), 10) || 0;
        var target = this.hash;
        var link = $(this);
        e.preventDefault();

        $('body').data('scroll-animating', true);
        var targetElement = $(target || 'body');

        link.trigger($.Event('theme.smooth-scroll.before'));

        $('html, body').animate({
            scrollTop: targetElement.offset().top
        }, animationTime, function() {
            $('body').data('scroll-animating', false);
            window.location.hash = target;
            if (targetElement.is(':not(body)') && $('body').data('bs.scrollspy')) {
                link.parent('li').siblings('li').children('a').removeClass('active');
                link.addClass('active');
            }
            link.trigger($.Event('theme.smooth-scroll.after'));
        });
    });
});
})(window._$, window._$);
(function (jQuery, $) {

    
jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-7 img:not(.no-lightbox), .bd-lightbox, .lightbox').init();
});
})(window._$, window._$);
(function (jQuery, $) {

    
jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-13 img:not(.no-lightbox), .bd-lightbox, .lightbox').init();
});
})(window._$, window._$);
(function (jQuery, $) {

    
jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-10 img:not(.no-lightbox), .bd-lightbox, .lightbox').init();
});
})(window._$, window._$);
(function (jQuery, $) {

    
jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-1 img:not(.no-lightbox), .bd-lightbox, .lightbox').init();
});
})(window._$, window._$);
(function (jQuery, $) {

    
jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-3 img:not(.no-lightbox), .bd-lightbox, .lightbox').init();
});
})(window._$, window._$);
(function (jQuery, $) {

    
jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-4 img:not(.no-lightbox), .bd-lightbox, .lightbox').init();
});
})(window._$, window._$);
(function (jQuery, $) {

    
jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-5 img:not(.no-lightbox), .bd-lightbox, .lightbox').init();
});
})(window._$, window._$);
(function (jQuery, $) {

    
jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-6 img:not(.no-lightbox), .bd-lightbox, .lightbox').init();
});
})(window._$, window._$);
(function (jQuery, $) {

    
jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-9 img:not(.no-lightbox), .bd-lightbox, .lightbox').init();
});
})(window._$, window._$);
(function (jQuery, $) {

    
jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-11 img:not(.no-lightbox), .bd-lightbox, .lightbox').init();
});
})(window._$, window._$);
(function (jQuery, $) {

    
jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-2 img:not(.no-lightbox), .bd-lightbox, .lightbox').init();
});
})(window._$, window._$);