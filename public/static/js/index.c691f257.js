(function(n){function e(e){for(var o,u,i=e[0],c=e[1],s=e[2],l=0,f=[];l<i.length;l++)u=i[l],Object.prototype.hasOwnProperty.call(r,u)&&r[u]&&f.push(r[u][0]),r[u]=0;for(o in c)Object.prototype.hasOwnProperty.call(c,o)&&(n[o]=c[o]);p&&p(e);while(f.length)f.shift()();return a.push.apply(a,s||[]),t()}function t(){for(var n,e=0;e<a.length;e++){for(var t=a[e],o=!0,u=1;u<t.length;u++){var c=t[u];0!==r[c]&&(o=!1)}o&&(a.splice(e--,1),n=i(i.s=t[0]))}return n}var o={},r={index:0},a=[];function u(n){return i.p+"static/js/"+({"pages-buy-buy1":"pages-buy-buy1","pages-buy-buy2":"pages-buy-buy2"}[n]||n)+"."+{"pages-buy-buy1":"2290e9f0","pages-buy-buy2":"1d693042"}[n]+".js"}function i(e){if(o[e])return o[e].exports;var t=o[e]={i:e,l:!1,exports:{}};return n[e].call(t.exports,t,t.exports,i),t.l=!0,t.exports}i.e=function(n){var e=[],t=r[n];if(0!==t)if(t)e.push(t[2]);else{var o=new Promise((function(e,o){t=r[n]=[e,o]}));e.push(t[2]=o);var a,c=document.createElement("script");c.charset="utf-8",c.timeout=120,i.nc&&c.setAttribute("nonce",i.nc),c.src=u(n);var s=new Error;a=function(e){c.onerror=c.onload=null,clearTimeout(l);var t=r[n];if(0!==t){if(t){var o=e&&("load"===e.type?"missing":e.type),a=e&&e.target&&e.target.src;s.message="Loading chunk "+n+" failed.\n("+o+": "+a+")",s.name="ChunkLoadError",s.type=o,s.request=a,t[1](s)}r[n]=void 0}};var l=setTimeout((function(){a({type:"timeout",target:c})}),12e4);c.onerror=c.onload=a,document.head.appendChild(c)}return Promise.all(e)},i.m=n,i.c=o,i.d=function(n,e,t){i.o(n,e)||Object.defineProperty(n,e,{enumerable:!0,get:t})},i.r=function(n){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(n,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(n,"__esModule",{value:!0})},i.t=function(n,e){if(1&e&&(n=i(n)),8&e)return n;if(4&e&&"object"===typeof n&&n&&n.__esModule)return n;var t=Object.create(null);if(i.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:n}),2&e&&"string"!=typeof n)for(var o in n)i.d(t,o,function(e){return n[e]}.bind(null,o));return t},i.n=function(n){var e=n&&n.__esModule?function(){return n["default"]}:function(){return n};return i.d(e,"a",e),e},i.o=function(n,e){return Object.prototype.hasOwnProperty.call(n,e)},i.p="./",i.oe=function(n){throw console.error(n),n};var c=window["webpackJsonp"]=window["webpackJsonp"]||[],s=c.push.bind(c);c.push=e,c=c.slice();for(var l=0;l<c.length;l++)e(c[l]);var p=s;a.push([0,"chunk-vendors"]),t()})({0:function(n,e,t){n.exports=t("b691")},"0a0e":function(n,e,t){"use strict";(function(n){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var t={onLaunch:function(){n("log","App Launch"," at App.vue:4")},onShow:function(){n("log","App Show"," at App.vue:7")},onHide:function(){n("log","App Hide"," at App.vue:10")}};e.default=t}).call(this,t("0de9")["log"])},"47bb":function(n,e,t){"use strict";t.r(e);var o=t("0a0e"),r=t.n(o);for(var a in o)"default"!==a&&function(n){t.d(e,n,(function(){return o[n]}))}(a);e["default"]=r.a},"51d5":function(n,e,t){"use strict";var o;t.d(e,"b",(function(){return r})),t.d(e,"c",(function(){return a})),t.d(e,"a",(function(){return o}));var r=function(){var n=this,e=n.$createElement,t=n._self._c||e;return t("App",{attrs:{keepAliveInclude:n.keepAliveInclude}})},a=[]},"78e2":function(n,e,t){"use strict";t.r(e);var o=t("51d5"),r=t("47bb");for(var a in r)"default"!==a&&function(n){t.d(e,n,(function(){return r[n]}))}(a);t("8daf");var u,i=t("f0c5"),c=Object(i["a"])(r["default"],o["b"],o["c"],!1,null,null,null,!1,o["a"],u);e["default"]=c.exports},"8daf":function(n,e,t){"use strict";var o=t("d773"),r=t.n(o);r.a},ab7a:function(n,e,t){var o=t("24fb");e=o(!1),e.push([n.i,"\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n/*每个页面公共css */",""]),n.exports=e},b691:function(n,e,t){"use strict";var o=t("4ea4"),r=o(t("5530"));t("e260"),t("e6cf"),t("cca6"),t("a79d"),t("f77e"),t("1c31");var a=o(t("e143")),u=o(t("78e2"));a.default.config.productionTip=!1,u.default.mpType="app";var i=new a.default((0,r.default)({},u.default));i.$mount()},d773:function(n,e,t){var o=t("ab7a");"string"===typeof o&&(o=[[n.i,o,""]]),o.locals&&(n.exports=o.locals);var r=t("4f06").default;r("c334731e",o,!0,{sourceMap:!1,shadowMode:!1})},f77e:function(n,e,t){"use strict";(function(n){var e=t("4ea4"),o=e(t("e143"));n["____121B12C____"]=!0,delete n["____121B12C____"],n.__uniConfig={globalStyle:{navigationBarTextStyle:"white",navigationBarTitleText:"uni-app",navigationBarBackgroundColor:"#0a58ac",backgroundColor:"#F8F8F8"}},n.__uniConfig.compilerVersion="2.9.8",n.__uniConfig.router={mode:"hash",base:"./"},n.__uniConfig.publicPath="./",n.__uniConfig["async"]={loading:"AsyncLoading",error:"AsyncError",delay:200,timeout:6e4},n.__uniConfig.debug=!1,n.__uniConfig.networkTimeout={request:6e4,connectSocket:6e4,uploadFile:6e4,downloadFile:6e4},n.__uniConfig.sdkConfigs={},n.__uniConfig.qqMapKey="XVXBZ-NDMC4-JOGUS-XGIEE-QVHDZ-AMFV2",n.__uniConfig.nvue={"flex-direction":"column"},n.__uniConfig.__webpack_chunk_load__=t.e,o.default.component("pages-buy-buy2",(function(n){var e={component:t.e("pages-buy-buy2").then(function(){return n(t("28c4"))}.bind(null,t)).catch(t.oe),delay:__uniConfig["async"].delay,timeout:__uniConfig["async"].timeout};return __uniConfig["async"]["loading"]&&(e.loading={name:"SystemAsyncLoading",render:function(n){return n(__uniConfig["async"]["loading"])}}),__uniConfig["async"]["error"]&&(e.error={name:"SystemAsyncError",render:function(n){return n(__uniConfig["async"]["error"])}}),e})),o.default.component("pages-buy-buy1",(function(n){var e={component:t.e("pages-buy-buy1").then(function(){return n(t("0db1"))}.bind(null,t)).catch(t.oe),delay:__uniConfig["async"].delay,timeout:__uniConfig["async"].timeout};return __uniConfig["async"]["loading"]&&(e.loading={name:"SystemAsyncLoading",render:function(n){return n(__uniConfig["async"]["loading"])}}),__uniConfig["async"]["error"]&&(e.error={name:"SystemAsyncError",render:function(n){return n(__uniConfig["async"]["error"])}}),e})),n.__uniRoutes=[{path:"/",alias:"/pages/buy/buy2",component:{render:function(n){return n("Page",{props:Object.assign({isQuit:!0,isEntry:!0},__uniConfig.globalStyle,{navigationStyle:"custom"})},[n("pages-buy-buy2",{slot:"page"})])}},meta:{id:1,name:"pages-buy-buy2",isNVue:!1,pagePath:"pages/buy/buy2",isQuit:!0,isEntry:!0,windowTop:0}},{path:"/pages/buy/buy1",component:{render:function(n){return n("Page",{props:Object.assign({},__uniConfig.globalStyle,{navigationStyle:"custom"})},[n("pages-buy-buy1",{slot:"page"})])}},meta:{name:"pages-buy-buy1",isNVue:!1,pagePath:"pages/buy/buy1",windowTop:0}},{path:"/preview-image",component:{render:function(n){return n("Page",{props:{navigationStyle:"custom"}},[n("system-preview-image",{slot:"page"})])}},meta:{name:"preview-image",pagePath:"/preview-image"}},{path:"/choose-location",component:{render:function(n){return n("Page",{props:{navigationStyle:"custom"}},[n("system-choose-location",{slot:"page"})])}},meta:{name:"choose-location",pagePath:"/choose-location"}},{path:"/open-location",component:{render:function(n){return n("Page",{props:{navigationStyle:"custom"}},[n("system-open-location",{slot:"page"})])}},meta:{name:"open-location",pagePath:"/open-location"}}],n.UniApp&&new n.UniApp}).call(this,t("c8ba"))}});