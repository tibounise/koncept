function includeCSS(cssPath) {
	var cssTag = document.createElement("link");
	cssTag.setAttribute("rel","stylesheet");
	cssTag.setAttribute("type","text/css");
	cssTag.setAttribute("href",cssPath);
	document.getElementsByTagName("head")[0].appendChild(cssTag);
}

includeCSS('assets/css/codemirror/codemirror.css');
includeCSS('assets/css/codemirror/koncept.css');
var editor = CodeMirror.fromTextArea(document.getElementById("content"),{
	theme:"koncept"
})