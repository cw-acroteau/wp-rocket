<?php

$html = '<html>
<head><title>Sample Page</title></head>
<body></body>
</html>';

$ie_compat = '<script>if(navigator.userAgent.match(/MSIE|Internet Explorer/i)||navigator.userAgent.match(/Trident\/7\..*?rv:11/i)){var href=document.location.href;if(!href.match(/[?&]nowprocket/)){if(href.indexOf("?")==-1){if(href.indexOf("#")==-1){document.location.href=href+"?nowprocket=1"}else{document.location.href=href.replace("#","?nowprocket=1#")}}else{if(href.indexOf("#")==-1){document.location.href=href+"&nowprocket=1"}else{document.location.href=href.replace("#","&nowprocket=1#")}}}}</script>';

$delay_js = '<script>class RocketLazyLoadScripts{constructor(){this.triggerEvents=["keydown","mousedown","mousemove","touchmove","touchstart","touchend","wheel"],this.userEventHandler=this._triggerListener.bind(this),this.touchStartHandler=this._onTouchStart.bind(this),this.touchMoveHandler=this._onTouchMove.bind(this),this.touchEndHandler=this._onTouchEnd.bind(this),this.clickHandler=this._onClick.bind(this),this.interceptedClicks=[],window.addEventListener("pageshow",e=>{this.persisted=e.persisted}),window.addEventListener("DOMContentLoaded",()=>{this._preconnect3rdParties()}),this.delayedScripts={normal:[],async:[],defer:[]},this.allJQueries=[]}_addUserInteractionListener(e){if(document.hidden){e._triggerListener();return}this.triggerEvents.forEach(t=>window.addEventListener(t,e.userEventHandler,{passive:!0})),window.addEventListener("touchstart",e.touchStartHandler,{passive:!0}),window.addEventListener("mousedown",e.touchStartHandler),document.addEventListener("visibilitychange",e.userEventHandler)}_removeUserInteractionListener(){this.triggerEvents.forEach(e=>window.removeEventListener(e,this.userEventHandler,{passive:!0})),document.removeEventListener("visibilitychange",this.userEventHandler)}_onTouchStart(e){"HTML"!==e.target.tagName&&(window.addEventListener("touchend",this.touchEndHandler),window.addEventListener("mouseup",this.touchEndHandler),window.addEventListener("touchmove",this.touchMoveHandler,{passive:!0}),window.addEventListener("mousemove",this.touchMoveHandler),e.target.addEventListener("click",this.clickHandler),this._renameDOMAttribute(e.target,"onclick","rocket-onclick"))}_onTouchMove(e){window.removeEventListener("touchend",this.touchEndHandler),window.removeEventListener("mouseup",this.touchEndHandler),window.removeEventListener("touchmove",this.touchMoveHandler,{passive:!0}),window.removeEventListener("mousemove",this.touchMoveHandler),e.target.removeEventListener("click",this.clickHandler),this._renameDOMAttribute(e.target,"rocket-onclick","onclick")}_onTouchEnd(e){window.removeEventListener("touchend",this.touchEndHandler),window.removeEventListener("mouseup",this.touchEndHandler),window.removeEventListener("touchmove",this.touchMoveHandler,{passive:!0}),window.removeEventListener("mousemove",this.touchMoveHandler)}_onClick(e){e.target.removeEventListener("click",this.clickHandler),this._renameDOMAttribute(e.target,"rocket-onclick","onclick"),this.interceptedClicks.push(e),e.preventDefault(),e.stopPropagation(),e.stopImmediatePropagation()}_replayClicks(){window.removeEventListener("touchstart",this.touchStartHandler,{passive:!0}),window.removeEventListener("mousedown",this.touchStartHandler),this.interceptedClicks.forEach(e=>{e.target.dispatchEvent(new MouseEvent("click",{view:e.view,bubbles:!0,cancelable:!0}))})}_renameDOMAttribute(e,t,r){e.hasAttribute&&e.hasAttribute(t)&&(event.target.setAttribute(r,event.target.getAttribute(t)),event.target.removeAttribute(t))}_triggerListener(){this._removeUserInteractionListener(this),"loading"===document.readyState?document.addEventListener("DOMContentLoaded",this._loadEverythingNow.bind(this)):this._loadEverythingNow()}_preconnect3rdParties(){let e=[];document.querySelectorAll("script[type=rocketlazyloadscript]").forEach(t=>{if(t.hasAttribute("src")){let r=new URL(t.src).origin;r!==location.origin&&e.push({src:r,crossOrigin:t.crossOrigin||"module"===t.getAttribute("data-rocket-type")})}}),e=[...new Map(e.map(e=>[JSON.stringify(e),e])).values()],this._batchInjectResourceHints(e,"preconnect")}async _loadEverythingNow(){this.lastBreath=Date.now(),this._delayEventListeners(this),this._delayJQueryReady(this),this._handleDocumentWrite(),this._registerAllDelayedScripts(),this._preloadAllScripts(),await this._loadScriptsFromList(this.delayedScripts.normal),await this._loadScriptsFromList(this.delayedScripts.defer),await this._loadScriptsFromList(this.delayedScripts.async);try{await this._triggerDOMContentLoaded(),await this._triggerWindowLoad()}catch(e){console.error(e)}window.dispatchEvent(new Event("rocket-allScriptsLoaded")),this._replayClicks()}_registerAllDelayedScripts(){document.querySelectorAll("script[type=rocketlazyloadscript]").forEach(e=>{e.hasAttribute("src")?e.hasAttribute("async")&&!1!==e.async?this.delayedScripts.async.push(e):e.hasAttribute("defer")&&!1!==e.defer||"module"===e.getAttribute("data-rocket-type")?this.delayedScripts.defer.push(e):this.delayedScripts.normal.push(e):this.delayedScripts.normal.push(e)})}async _transformScript(e){return await this._littleBreath(),new Promise(t=>{let r=document.createElement("script");[...e.attributes].forEach(e=>{let t=e.nodeName;"type"!==t&&("data-rocket-type"===t&&(t="type"),r.setAttribute(t,e.nodeValue))}),e.hasAttribute("src")?(r.addEventListener("load",t),r.addEventListener("error",t)):(r.text=e.text,t());try{e.parentNode.replaceChild(r,e)}catch(i){t()}})}async _loadScriptsFromList(e){let t=e.shift();return t?(await this._transformScript(t),this._loadScriptsFromList(e)):Promise.resolve()}_preloadAllScripts(){this._batchInjectResourceHints([...this.delayedScripts.normal,...this.delayedScripts.defer,...this.delayedScripts.async],"preload")}_batchInjectResourceHints(e,t){var r=document.createDocumentFragment();e.forEach(e=>{if(e.src){let i=document.createElement("link");i.href=e.src,i.rel=t,"preconnect"!==t&&(i.as="script"),e.getAttribute&&"module"===e.getAttribute("data-rocket-type")&&(i.crossOrigin=!0),e.crossOrigin&&(i.crossOrigin=e.crossOrigin),r.appendChild(i)}}),document.head.appendChild(r)}_delayEventListeners(e){let t={};function r(e,r){!function e(r){!t[r]&&(t[r]={originalFunctions:{add:r.addEventListener,remove:r.removeEventListener},eventsToRewrite:[]},r.addEventListener=function(){arguments[0]=i(arguments[0]),t[r].originalFunctions.add.apply(r,arguments)},r.removeEventListener=function(){arguments[0]=i(arguments[0]),t[r].originalFunctions.remove.apply(r,arguments)});function i(e){return t[r].eventsToRewrite.indexOf(e)>=0?"rocket-"+e:e}}(e),t[e].eventsToRewrite.push(r)}function i(e,t){let r=e[t];Object.defineProperty(e,t,{get:()=>r||function(){},set(i){e["rocket"+t]=r=i}})}r(document,"DOMContentLoaded"),r(window,"DOMContentLoaded"),r(window,"load"),r(window,"pageshow"),r(document,"readystatechange"),i(document,"onreadystatechange"),i(window,"onload"),i(window,"onpageshow");try{Object.defineProperty(document,"readyState",{get:()=>e.rocketReadyState,set(t){e.rocketReadyState=t},configurable:!0}),document.readyState="loading"}catch(n){console.log("WPRocket DJE readyState conflict, bypassing")}}_delayJQueryReady(e){let t=window.jQuery;Object.defineProperty(window,"jQuery",{get:()=>t,set(r){if(r&&r.fn&&!e.allJQueries.includes(r)){r.fn.ready=r.fn.init.prototype.ready=function(t){e.domReadyFired?t.bind(document)(r):document.addEventListener("rocket-DOMContentLoaded",()=>t.bind(document)(r))};let i=r.fn.on;r.fn.on=r.fn.init.prototype.on=function(){if(this[0]===window){function e(e){return e.split(" ").map(e=>"load"===e||0===e.indexOf("load.")?"rocket-jquery-load":e).join(" ")}"string"==typeof arguments[0]||arguments[0]instanceof String?arguments[0]=e(arguments[0]):"object"==typeof arguments[0]&&Object.keys(arguments[0]).forEach(t=>{delete Object.assign(arguments[0],{[e(t)]:arguments[0][t]})[t]})}return i.apply(this,arguments),this},e.allJQueries.push(r)}t=r}})}async _triggerDOMContentLoaded(){this.domReadyFired=!0;try{document.readyState="interactive"}catch(e){}await this._littleBreath(),document.dispatchEvent(new Event("rocket-DOMContentLoaded")),await this._littleBreath(),window.dispatchEvent(new Event("rocket-DOMContentLoaded")),await this._littleBreath(),document.dispatchEvent(new Event("rocket-readystatechange")),await this._littleBreath(),document.rocketonreadystatechange&&document.rocketonreadystatechange()}async _triggerWindowLoad(){try{document.readyState="complete"}catch(e){}await this._littleBreath(),window.dispatchEvent(new Event("rocket-load")),await this._littleBreath(),window.rocketonload&&window.rocketonload(),await this._littleBreath(),this.allJQueries.forEach(e=>e(window).trigger("rocket-jquery-load")),await this._littleBreath();let t=new Event("rocket-pageshow");t.persisted=this.persisted,window.dispatchEvent(t),await this._littleBreath(),window.rocketonpageshow&&window.rocketonpageshow({persisted:this.persisted})}_handleDocumentWrite(){let e=new Map;document.write=document.writeln=function(t){let r=document.currentScript;r||console.error("WPRocket unable to document.write this: "+t);let i=document.createRange(),n=r.parentElement,a=e.get(r);void 0===a&&(a=r.nextSibling,e.set(r,a));let s=document.createDocumentFragment();i.setStart(s,0),s.appendChild(i.createContextualFragment(t)),n.insertBefore(s,a)}}async _littleBreath(){Date.now()-this.lastBreath>45&&(await this._requestAnimFrame(),this.lastBreath=Date.now())}async _requestAnimFrame(){return document.hidden?new Promise(e=>setTimeout(e)):new Promise(e=>requestAnimationFrame(e))}static run(){let e=new RocketLazyLoadScripts;e._addUserInteractionListener(e)}}RocketLazyLoadScripts.run();</script>';

$expected = '<html>
<head>' . $ie_compat . $delay_js . '<title>Sample Page</title></head>
<body></body>
</html>';

$charset = '<meta charset="UTF-8">';
$charset_http_equiv = "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>";

$html_charset = "<html>
<head>
{$charset}
<title>Sample Page</title></head>
<body></body>
</html>";

$expected_charset = "<html>
<head>{$charset}{$ie_compat}{$delay_js}

<title>Sample Page</title></head>
<body></body>
</html>";

$html_http_equiv_charset = "<html>
<head>
{$charset_http_equiv}
<title>Sample Page</title></head>
<body></body>
</html>";

$expected_http_equiv_charset = "<html>
<head>{$charset_http_equiv}{$ie_compat}{$delay_js}

<title>Sample Page</title></head>
<body></body>
</html>";


$html_invalid_charset_head = "<html>
<head>
<meta name=\"keywords\" charset=\"UTF-8\" content=\"Hello!\" />
<title>Sample Page</title></head>
<body></body>
</html>";

$expected_invalid_charset_head = "<html>
<head><meta name=\"keywords\" charset=\"UTF-8\" content=\"Hello!\" />{$ie_compat}{$delay_js}

<title>Sample Page</title></head>
<body></body>
</html>";


$html_invalid_charset_body = "<html>
<head>
<title>Sample Page</title></head>
<body><meta charset=\"UTF-8\"></body>
</html>";

$expected_invalid_charset_body = "<html>
<head>{$ie_compat}{$delay_js}
<title>Sample Page</title></head>
<body><meta charset=\"UTF-8\"></body>
</html>";

return [
	'testShouldNotAddScriptsWhenBypass' => [
		'config'   => [
			'delay_js'      => 1,
			'donotoptimize' => false,
			'bypass'        => true,
		],
		'html'     => $html,
		'expected' => $html,
	],

	'testShouldNotAddScriptsWhenDONOTOPTIMIZE' => [
		'config'   => [
			'delay_js'      => 0,
			'donotoptimize' => true,
			'bypass'        => false,
		],
		'html'     => $html,
		'expected' => $html,
	],

	'testShouldNotAddScriptsWhenDelaySettingDisabled' => [
		'config'   => [
			'delay_js'      => 0,
			'donotoptimize' => false,
			'bypass'        => false,
		],
		'html'     => $html,
		'expected' => $html,
	],

	'testShouldAddScripts' => [
		'config'   => [
			'delay_js' => 1,
			'donotoptimize' => false,
			'bypass'        => false,
		],
		'html'     => $html,
		'expected' => $expected,
	],
	'testShouldAddScriptsAfterMetaCharset' => [
		'config'   => [
			'delay_js' => 1,
			'donotoptimize' => false,
			'bypass'        => false,
		],
		'html'     => $html_charset,
		'expected' => $expected_charset,
	],
	'testShouldAddScriptsAfterMEtaHttpEquivCharset' => [
		'config'   => [
			'delay_js' => 1,
			'donotoptimize' => false,
			'bypass'        => false,
		],
		'html'     => $html_http_equiv_charset,
		'expected' => $expected_http_equiv_charset,
	],
	'testShouldAddScriptsAfterHeadInvalidCharsetHead' => [
		'config'   => [
			'delay_js' => 1,
			'donotoptimize' => false,
			'bypass'        => false,
		],
		'html'     => $html_invalid_charset_head,
		'expected' => $expected_invalid_charset_head,
	],
	'testShouldAddScriptsAfterHeadCharsetBody' => [
		'config'   => [
			'delay_js' => 1,
			'donotoptimize' => false,
			'bypass'        => false,
		],
		'html'     => $html_invalid_charset_body,
		'expected' => $expected_invalid_charset_body,
	],
];
