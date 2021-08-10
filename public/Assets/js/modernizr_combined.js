/*! v6.35.0-SNAPSHOT - 2021-05-17 17:05:17 */
!function(s,c,p){var a=[],e={_version:"3.9.1",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){a.push({name:e,fn:n,options:t})},addAsyncTest:function(e){a.push({name:null,fn:e})}},u=function(){};u.prototype=e,u=new u;var l=[];function m(e,n){return typeof e===n}var i,t,h=c.documentElement,v="svg"===h.nodeName.toLowerCase();function f(e){var n=h.className,t=u._config.classPrefix||"";if(v&&(n=n.baseVal),u._config.enableJSClass){var r=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(r,"$1"+t+"js$2")}u._config.enableClasses&&(0<e.length&&(n+=" "+t+e.join(" "+t)),v?h.className.baseVal=n:h.className=n)}function d(e,n){if("object"==typeof e)for(var t in e)i(e,t)&&d(t,e[t]);else{var r=(e=e.toLowerCase()).split("."),o=u[r[0]];if(2===r.length&&(o=o[r[1]]),void 0!==o)return u;n="function"==typeof n?n():n,1===r.length?u[r[0]]=n:(!u[r[0]]||u[r[0]]instanceof Boolean||(u[r[0]]=new Boolean(u[r[0]])),u[r[0]][r[1]]=n),f([(n&&!1!==n?"":"no-")+r.join("-")]),u._trigger(e,n)}return u}i=m(t={}.hasOwnProperty,"undefined")||m(t.call,"undefined")?function(e,n){return n in e&&m(e.constructor.prototype[n],"undefined")}:function(e,n){return t.call(e,n)},e._l={},e.on=function(e,n){this._l[e]||(this._l[e]=[]),this._l[e].push(n),u.hasOwnProperty(e)&&setTimeout(function(){u._trigger(e,u[e])},0)},e._trigger=function(e,n){if(this._l[e]){var t=this._l[e];setTimeout(function(){var e;for(e=0;e<t.length;e++)(0,t[e])(n)},0),delete this._l[e]}},u._q.push(function(){e.addTest=d});var g=e._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];e._prefixes=g;var n="Moz O ms Webkit",y=e._config.usePrefixes?n.split(" "):[];function w(){return"function"!=typeof c.createElement?c.createElement(arguments[0]):v?c.createElementNS.call(c,"http://www.w3.org/2000/svg",arguments[0]):c.createElement.apply(c,arguments)}e._cssomPrefixes=y;var r={elem:w("modernizr")};u._q.push(function(){delete r.elem});var S={style:r.elem.style};function o(e,n,t,r){var o,i,s,a,u,l="modernizr",f=w("div"),d=((u=c.body)||((u=w(v?"svg":"body")).fake=!0),u);if(parseInt(t,10))for(;t--;)(s=w("div")).id=r?r[t]:l+(t+1),f.appendChild(s);return(o=w("style")).type="text/css",o.id="s"+l,(d.fake?d:f).appendChild(o),d.appendChild(f),o.styleSheet?o.styleSheet.cssText=e:o.appendChild(c.createTextNode(e)),f.id=l,d.fake&&(d.style.background="",d.style.overflow="hidden",a=h.style.overflow,h.style.overflow="hidden",h.appendChild(d)),i=n(f,e),d.fake?(d.parentNode.removeChild(d),h.style.overflow=a,h.offsetHeight):f.parentNode.removeChild(f),!!i}function C(e){return e.replace(/([A-Z])/g,function(e,n){return"-"+n.toLowerCase()}).replace(/^ms-/,"-ms-")}function _(e,n){var t=e.length;if("CSS"in s&&"supports"in s.CSS){for(;t--;)if(s.CSS.supports(C(e[t]),n))return!0;return!1}if("CSSSupportsRule"in s){for(var r=[];t--;)r.push("("+C(e[t])+":"+n+")");return o("@supports ("+(r=r.join(" or "))+") { #modernizr { position: absolute; } }",function(e){return"absolute"===function(e,n,t){var r;if("getComputedStyle"in s){r=getComputedStyle.call(s,e,n);var o=s.console;null!==r?t&&(r=r.getPropertyValue(t)):o&&o[o.error?"error":"log"].call(o,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}else r=!n&&e.currentStyle&&e.currentStyle[t];return r}(e,null,"position")})}return p}function x(e){return e.replace(/([a-z])-([a-z])/g,function(e,n,t){return n+t.toUpperCase()}).replace(/^-/,"")}u._q.unshift(function(){delete S.style});var P=e._config.usePrefixes?n.toLowerCase().split(" "):[];function T(e,n){return function(){return e.apply(n,arguments)}}function b(e,n,t,r,o){var i=e.charAt(0).toUpperCase()+e.slice(1),s=(e+" "+y.join(i+" ")+i).split(" ");return m(n,"string")||m(n,"undefined")?function(e,n,t,r){if(r=!m(r,"undefined")&&r,!m(t,"undefined")){var o=_(e,t);if(!m(o,"undefined"))return o}for(var i,s,a,u,l,f=["modernizr","tspan","samp"];!S.style&&f.length;)i=!0,S.modElem=w(f.shift()),S.style=S.modElem.style;function d(){i&&(delete S.style,delete S.modElem)}for(a=e.length,s=0;s<a;s++)if(u=e[s],l=S.style[u],~(""+u).indexOf("-")&&(u=x(u)),S.style[u]!==p){if(r||m(t,"undefined"))return d(),"pfx"!==n||u;try{S.style[u]=t}catch(e){}if(S.style[u]!==l)return d(),"pfx"!==n||u}return d(),!1}(s,n,r,o):function(e,n,t){var r;for(var o in e)if(e[o]in n)return!1===t?e[o]:m(r=n[e[o]],"function")?T(r,t||n):r;return!1}(s=(e+" "+P.join(i+" ")+i).split(" "),n,t)}e._domPrefixes=P,e.testAllProps=b;var A=function(e){var n,t=g.length,r=s.CSSRule;if(void 0===r)return p;if(!e)return!1;if((n=(e=e.replace(/^@/,"")).replace(/-/g,"_").toUpperCase()+"_RULE")in r)return"@"+e;for(var o=0;o<t;o++){var i=g[o];if(i.toUpperCase()+"_"+n in r)return"@-"+i.toLowerCase()+"-"+e}return!1};e.atRule=A;e.prefixed=function(e,n,t){return 0===e.indexOf("@")?A(e):(-1!==e.indexOf("-")&&(e=x(e)),n?b(e,n,t):b(e,"pfx"))};function z(e,n,t){return b(e,p,p,n,t)}u.addTest("history",function(){var e=navigator.userAgent;return!!e&&((-1===e.indexOf("Android 2.")&&-1===e.indexOf("Android 4.0")||-1===e.indexOf("Mobile Safari")||-1!==e.indexOf("Chrome")||-1!==e.indexOf("Windows Phone")||"file:"===location.protocol)&&(s.history&&"pushState"in s.history))}),u.addTest("fileinput",function(){var e=navigator.userAgent;if(e.match(/(Android (1.0|1.1|1.5|1.6|2.0|2.1))|(Windows Phone (OS 7|8.0))|(XBLWP)|(ZuneWP)|(w(eb)?OSBrowser)|(webOS)|(Kindle\/(1.0|2.0|2.5|3.0))/)||e.match(/\swv\).+(chrome)\/([\w\.]+)/i))return!1;var n=w("input");return n.type="file",!n.disabled}),u.addTest("webanimations","animate"in w("div")),e.testAllProps=z;var O="CSS"in s&&"supports"in s.CSS,E="supportsCSS"in s;u.addTest("supports",O||E),u.addTest("csstransforms3d",function(){return!!z("perspective","1px",!0)}),u.addTest("promises",function(){return"Promise"in s&&"resolve"in s.Promise&&"reject"in s.Promise&&"all"in s.Promise&&"race"in s.Promise&&(new s.Promise(function(e){n=e}),"function"==typeof n);var n}),u.addTest("localstorage",function(){var e="modernizr";try{return localStorage.setItem(e,e),localStorage.removeItem(e),!0}catch(e){return!1}}),function(){var e,n,t,r,o,i;for(var s in a)if(a.hasOwnProperty(s)){if(e=[],(n=a[s]).name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(r=m(n.fn,"function")?n.fn():n.fn,o=0;o<e.length;o++)1===(i=e[o].split(".")).length?u[i[0]]=r:(u[i[0]]&&(!u[i[0]]||u[i[0]]instanceof Boolean)||(u[i[0]]=new Boolean(u[i[0]])),u[i[0]][i[1]]=r),l.push((r?"":"no-")+i.join("-"))}}(),f(l),delete e.addTest,delete e.addAsyncTest;for(var M=0;M<u._q.length;M++)u._q[M]();s.Modernizr=u}(window,document),Modernizr.addTest("ie9",function(){return-1!==navigator.userAgent.indexOf("MSIE 9.0")}),Modernizr.addTest("ie",function(){return-1!==navigator.userAgent.indexOf("MSIE")||navigator.userAgent.match(/Trident.*rv\:11\./)}),Modernizr.addTest("ios",function(){return/iPad|iPhone|iPod/.test(navigator.userAgent)}),Modernizr.addTest("android",function(){return/Android/.test(navigator.userAgent)}),Modernizr.addTest("phantomjs",function(){return/PhantomJS/.test(navigator.userAgent)}),Modernizr.addTest("edge",function(){return navigator.userAgent.match(/Edge/i)}),Modernizr.addTest("touchevents",function(){return"ontouchstart"in window||window.DocumentTouch&&document instanceof DocumentTouch});