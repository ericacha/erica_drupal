function parseUrl(url) {
    if (typeof url === 'undefined' || url.indexOf(themeParam) !== -1 || url.indexOf('javascript:') != -1 || (url.indexOf('#') != -1 && url.indexOf('/') < 0))
        return url;

    var anchor = '',
        anchorPosition = url.indexOf('#');
    if (anchorPosition !== -1) {
        anchor = url.substring(anchorPosition);
        url = url.substring(0, anchorPosition);
    }

    url = url.replace("#038;","&");
    url += (url.indexOf('?') === -1 ? '?' : '&') + themeParam + anchor;
    return url;
}

jQuery(function ($) {
    $('a').each(function(){
       var href = $(this).attr('href');
       $(this).attr("href", parseUrl(href));
    });

    $('form').each(function() {
        var action = $(this).attr('action');
        if (typeof action === 'undefined')
            return;

        this.action = parseUrl(action);
    });

    $(".carousel .left-button, .carousel .right-button").attr("href", "#");
});