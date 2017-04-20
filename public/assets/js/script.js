$(function() {
    setNavigation();
});

function setNavigation() {
    var path = window.location.pathname;
    path = path.replace(/\/$/, "");
    path = decodeURIComponent(path);
    if (!path) {
        $('a[href="/"').closest('li').addClass('current');
    } else {
        $('a[href="' + path).closest('li').addClass('current');
    }
}