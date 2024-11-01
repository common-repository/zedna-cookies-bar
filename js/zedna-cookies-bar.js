window.addEventListener('DOMContentLoaded', () => {
	if (zednaReadCookies("cookiesAggreement") != 'true') {
		document.getElementById('zedna-cookies-bar').style.display = 'block';
	}
});
function zednaSetCookie(cookieName, cookieValue, nDays) {
	var today = new Date();
	var expire = new Date();
	if (nDays == null || nDays == 0) { nDays = 1; }
	expire.setTime(today.getTime() + 3600000 * 24 * nDays);
	document.cookie = cookieName + "=" + escape(cookieValue) + ";expires=" + expire.toUTCString() + "; path=/";
}
function zednaReadCookies(cookieName) {
	var theCookie = " " + document.cookie;
	var ind = theCookie.indexOf(" " + cookieName + "=");
	if (ind == -1) ind = theCookie.indexOf(";" + cookieName + "=");
	if (ind == -1 || cookieName == "") return "";
	var ind1 = theCookie.indexOf(";", ind + 1);
	if (ind1 == -1) ind1 = theCookie.length;
	return unescape(theCookie.substring(ind + cookieName.length + 2, ind1));
}
function zednaDeleteCookies(cookieName) {
	var today = new Date();
	var expire = new Date() - 30;
	expire.setTime(today.getTime() - 3600000 * 24 * 90);
	document.cookie = cookieName + "=" + escape(cookieValue) + ";expires=" + expire.toUTCString();
}
function zednaAcceptCookies() {
	zednaSetCookie('cookiesAggreement', true, 365);
	document.getElementById('zedna-cookies-bar').style.display = 'none';
	zednaAcceptCookiesCallback();
}
