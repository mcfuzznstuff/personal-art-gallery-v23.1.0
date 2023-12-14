(
/******THIS IS CUSTOM CODE START ***********/


/******THIS IS CUSTOM CODE END ***********/


function(d){var h=[];d.loadImages=function(a,e){"string"==typeof a&&(a=[a]);for(var f=a.length,g=0,b=0;b<f;b++){var c=document.createElement("img");c.onload=function(){g++;g==f&&d.isFunction(e)&&e()};c.src=a[b];h.push(c)}}})(window.jQuery);
var wl;

var lwi=-1;function thresholdPassed(){var w=$(window).width();var p=false;var cw=0;if(w>=768){cw++;}if(w>=960){cw++;}if(lwi!=cw){p=true;}lwi=cw;return p;}
ldsrcset=function(t){var e,r=document.querySelectorAll(t);for(e=0;e<r.length;e++){var c=r[e].getAttribute("data-srcset");r[e].setAttribute("srcset",c)}},ldsrc=function(t){var e=document.querySelector(t),r=e.getAttribute("data-src");e.setAttribute("src",r)};!function(){if("Promise"in window){var e,t,r=document,n=function(){return r.createElement("link")},o=new Set,a=n(),i=a.relList&&a.relList.supports&&a.relList.supports("prefetch"),s=location.href.replace(/#[^#]+$/,"");o.add(s);var c=function(e){var t=location,r="http:",n="https:";if(e&&e.href&&e.origin==t.origin&&[r,n].includes(e.protocol)&&(e.protocol!=r||t.protocol!=n)){var o=e.pathname;if(!(e.hash&&o+e.search==t.pathname+t.search||".html"!=o.substr(-5)&&".html"!=o.substr(-5)&&"/"!=o.substr(-1)))return!0}},u=function(e){var t=e.replace(/#[^#]+$/,"");if(!o.has(t)){if(i){var a=n();a.rel="prefetch",a.href=t,r.head.appendChild(a)}else{var s=new XMLHttpRequest;s.open("GET",t,s.withCredentials=!0),s.send()}o.add(t)}},f=function(e){return e.target.closest("a")},p=function(t){var r=t.relatedTarget;r&&f(t)==r.closest("a")||e&&(clearTimeout(e),e=void 0)},l={capture:!0,passive:!0};r.addEventListener("touchstart",function(e){t=performance.now();var r=f(e);c(r)&&u(r.href)},l),r.addEventListener("mouseover",function(r){if(!(performance.now()-t<1200)){var n=f(r);c(n)&&(n.addEventListener("mouseout",p,{passive:!0}),e=setTimeout(function(){u(n.href),e=void 0},80))}},l)}}();

$(function(){
r=function(){if(thresholdPassed()){dpi=window.devicePixelRatio;if($(window).width()>=960){var a='data-src';var e=document.querySelector('.js27');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/art_digitalpicstile_twinlakes_4-23-1074.jpeg':'images/art_digitalpicstile_twinlakes_4-23-716.jpeg'):'images/art_digitalpicstile_twinlakes_4-23-358.jpeg');
var a='data-src';var e=document.querySelector('.js28');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/badoonpup_5-23-828-1.jpeg':'images/badoonpup_5-23-552-1.jpeg'):'images/badoonpup_5-23-276-1.jpeg');
var a='data-src';var e=document.querySelector('.js29');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/giraffecontemplation_5-23-900.jpeg':'images/giraffecontemplation_5-23-600.jpeg'):'images/giraffecontemplation_5-23-300.jpeg');
var a='data-src';var e=document.querySelector('.js25 .slide0');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/1-1500.png':'images/1-1000.png'):'images/1-500.png');
var a='data-src';var e=document.querySelector('.js25 .slide1');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/2-1500.png':'images/2-1000.png'):'images/2-500.png');
var a='data-src';var e=document.querySelector('.js25 .slide2');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/3-1500.png':'images/3-1000.png'):'images/3-500.png');
var a='data-src';var e=document.querySelector('.js25 .slide3');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/4-1500.png':'images/4-1000.png'):'images/4-500.png');
var a='data-src';var e=document.querySelector('.js25 .slide4');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/5-1500.png':'images/5-1000.png'):'images/5-500.png');
var e=document.querySelector('.js26');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/goldstarforeffort_4-23-984.jpeg':'images/goldstarforeffort_4-23-656.jpeg'):'images/goldstarforeffort_4-23-328.jpeg');}else if($(window).width()>=768){var a='data-src';var e=document.querySelector('.js27');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/art_digitalpicstile_twinlakes_4-23-783.jpeg':'images/art_digitalpicstile_twinlakes_4-23-522.jpeg'):'images/art_digitalpicstile_twinlakes_4-23-261.jpeg');
var a='data-src';var e=document.querySelector('.js28');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/badoonpup_5-23-651.jpeg':'images/badoonpup_5-23-434.jpeg'):'images/badoonpup_5-23-217.jpeg');
var a='data-src';var e=document.querySelector('.js29');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/giraffecontemplation_5-23-618.jpeg':'images/giraffecontemplation_5-23-412.jpeg'):'images/giraffecontemplation_5-23-206.jpeg');
var a='data-src';var e=document.querySelector('.js25 .slide0');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/1-1200.png':'images/1-800.png'):'images/1-400.png');
var a='data-src';var e=document.querySelector('.js25 .slide1');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/2-1200.png':'images/2-800.png'):'images/2-400.png');
var a='data-src';var e=document.querySelector('.js25 .slide2');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/3-1200.png':'images/3-800.png'):'images/3-400.png');
var a='data-src';var e=document.querySelector('.js25 .slide3');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/4-1200.png':'images/4-800.png'):'images/4-400.png');
var a='data-src';var e=document.querySelector('.js25 .slide4');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/5-1200.png':'images/5-800.png'):'images/5-400.png');
var e=document.querySelector('.js26');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/goldstarforeffort_4-23-771.jpeg':'images/goldstarforeffort_4-23-514.jpeg'):'images/goldstarforeffort_4-23-257.jpeg');}else{var a='data-src';var e=document.querySelector('.js27');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/art_digitalpicstile_twinlakes_4-23-423.jpeg':'images/art_digitalpicstile_twinlakes_4-23-282.jpeg'):'images/art_digitalpicstile_twinlakes_4-23-141.jpeg');
var a='data-src';var e=document.querySelector('.js28');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/badoonpup_5-23-432.jpeg':'images/badoonpup_5-23-288.jpeg'):'images/badoonpup_5-23-144.jpeg');
var a='data-src';var e=document.querySelector('.js29');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/giraffecontemplation_5-23-372.jpeg':'images/giraffecontemplation_5-23-248.jpeg'):'images/giraffecontemplation_5-23-124.jpeg');
var a='data-src';var e=document.querySelector('.js25 .slide0');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/1-501.png':'images/1-334.png'):'images/1-167.png');
var a='data-src';var e=document.querySelector('.js25 .slide1');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/2-501.png':'images/2-334.png'):'images/2-167.png');
var a='data-src';var e=document.querySelector('.js25 .slide2');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/3-501.png':'images/3-334.png'):'images/3-167.png');
var a='data-src';var e=document.querySelector('.js25 .slide3');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/4-501.png':'images/4-334.png'):'images/4-167.png');
var a='data-src';var e=document.querySelector('.js25 .slide4');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/5-501.png':'images/5-334.png'):'images/5-167.png');
var e=document.querySelector('.js26');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/goldstarforeffort_4-23-486.jpeg':'images/goldstarforeffort_4-23-324.jpeg'):'images/goldstarforeffort_4-23-162.jpeg');}}};
if(!window.HTMLPictureElement){$(window).resize(r);r();}
(function(){$('a[href^="#"]:not(.allowConsent,.noConsent,.denyConsent,.removeConsent)').each(function(i,e){$(e).click(function(){var t=e.hash.length>1?$('[name="'+e.hash.slice(1)+'"]').offset().top:0;return $("html, body").animate({scrollTop:t},400),!1})})})();
initMenu($('#m5')[0]);
initMenu($('#m2')[0]);
initMenu($('#m6')[0]);
ldsrc('.js27');ldsrcset('.js40 source');ldsrc('.js28');ldsrcset('.js41 source');ldsrc('.js29');ldsrcset('.js42 source');$('.js25 .slider').slick({lazyLoad: 'ondemand',slidesToShow: 1,slidesToScroll: 1,overflow: 'hidden',fade: true,slide: 'div',cssEase: 'linear',speed: 300,dots: false,arrows: true,infinite: true});var cs=new ConsentBanner('privacy-policy.html', undefined, 0);cs.start(1);
});