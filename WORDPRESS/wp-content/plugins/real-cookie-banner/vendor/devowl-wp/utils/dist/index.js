var devowlWp_utils;(()=>{"use strict";var t,e={550:(t,e,o)=>{o.r(e),o.d(e,{AbstractCategory:()=>at,AbstractCategoryCollection:()=>it,AbstractPost:()=>st,AbstractPostCollection:()=>rt,BaseOptions:()=>n,ClientCollection:()=>Y,ClientModel:()=>nt,RouteHttpVerb:()=>i,SuspenseChunkTranslation:()=>lt,addCorruptRestApi:()=>R,addCorruptRestApiLog:()=>O,applyQueryString:()=>y,commonRequest:()=>A,commonUrlBuilder:()=>v,createContextFactory:()=>l,createLocalizationFactory:()=>Z,createRequestFactory:()=>F,getWebpackPublicPath:()=>a,handleCorrupRestApi:()=>S,handleCorruptRestApi:()=>x,locationRestPluginGet:()=>G,nonceDeprecationPool:()=>P,parseResult:()=>_,qs:()=>u,removeCorruptRestApi:()=>C,sprintf:()=>z,trailingslashit:()=>r,untrailingslashit:()=>s,useChunkTranslation:()=>ct});class n{constructor(){this.slug=void 0,this.textDomain=void 0,this.version=void 0,this.restUrl=void 0,this.restNamespace=void 0,this.restRoot=void 0,this.restQuery=void 0,this.restNonce=void 0,this.restRecreateNonceEndpoint=void 0,this.publicUrl=void 0,this.chunkFolder=void 0,this.chunks=void 0}static slugCamelCase(t){return t.replace(/-([a-z])/g,(t=>t[1].toUpperCase()))}static getPureSlug(t,e=!1){return e?n.slugCamelCase(t):t}}const s=t=>t.endsWith("/")||t.endsWith("\\")?s(t.slice(0,-1)):t,r=t=>"".concat(s(t),"/"),a=t=>{const e=window[t.replace(/-([a-z])/g,(t=>t[1].toUpperCase()))];return"".concat(e.publicUrl).concat(e.chunkFolder,"/")};var i,c=o(363);function l(t){const e=(0,c.createContext)(t);return{StoreContext:e,StoreProvider:({children:o})=>React.createElement(e.Provider,{value:t},o),useStores:()=>(0,c.useContext)(e)}}!function(t){t.GET="GET",t.POST="POST",t.PUT="PUT",t.DELETE="DELETE",t.PATCH="PATCH"}(i||(i={}));var d=o(11),h=o.n(d),u=o(282),p=o(840),f=o.n(p),m=o(25),w=o.n(m);function y(t,e,o){return t.search=u.stringify(o?h().all([u.parse(t.search),...e]):e,!0),t}function v({location:t,params:e={},nonce:o=!0,options:n,cookieValueAsParam:a}){const{href:c}=window.location,l=new URL(n.restRoot,c),d=u.parse(l.search),h=d.rest_route||l.pathname,p=[];let m=t.path.replace(/:([A-Za-z0-9-_]+)/g,((t,o)=>(p.push(o),e[o])));const v={};for(const t of Object.keys(e))-1===p.indexOf(t)&&(v[t]=e[t]);a&&(v._httpCookieInvalidate=w()(JSON.stringify(a.map(f().get))));const{search:b,pathname:g}=new URL(t.path,c);if(b){const t=u.parse(b);for(const e in t)v[e]=t[e];m=g}l.protocol=window.location.protocol;const P=r(h)+s(t.namespace||n.restNamespace)+m;return d.rest_route?d.rest_route=P:l.pathname=P,o&&n.restNonce&&(d._wpnonce=n.restNonce),y(l,d),["wp-json/","rest_route="].filter((t=>l.toString().indexOf(t)>-1)).length>0&&t.method&&t.method!==i.GET&&y(l,[{_method:t.method}],!0),y(l,[n.restQuery,v],!0),l.toString()}const b={},g={};async function P(t,e){if(void 0!==e){const o=g[t]||new Promise((async(o,n)=>{try{const s=await window.fetch(e,{method:"POST"});if(s.ok){const e=await s.text();t===e?n():(b[t]=e,o(e))}else n()}catch(t){n()}}));return g[t]=o,o}{if(void 0===t)return;await Promise.all(Object.values(g));let e=t;for(;b[e]&&(e=b[e],b[e]!==t););return Promise.resolve(e)}}const E="notice-corrupt-rest-api",k="data-namespace";async function T(t,e=(async()=>{})){const o=document.getElementById(E);if(o&&window.navigator.onLine){if(o.querySelector("li[".concat(k,'="').concat(t,'"]')))return;try{await e()}catch(e){o.style.display="block";const n=document.createElement("li");n.setAttribute(k,t),n.innerHTML="<code>".concat(t,"</code>"),o.childNodes[1].appendChild(n),o.scrollIntoView({behavior:"smooth",block:"end",inline:"nearest"})}}}async function C(t){const e=document.getElementById(E);if(e){const o=e.querySelector("li[".concat(k,'="').concat(t,'"]'));if(null==o||o.remove(),!e.childNodes[1].childNodes.length){e.style.display="none";const t=e.querySelector("textarea");t&&(t.value="")}}}function R({method:t},e){t===i.GET&&(e?T(e,(()=>{throw new Error})):(window.detectCorruptRestApiFailed=(window.detectCorruptRestApiFailed||0)+1,window.dispatchEvent(new CustomEvent(E))))}function O({route:t,method:e,ms:o,response:n}){const s=document.querySelector("#".concat(E," textarea"));if(s){const r=s.value.split("\n").slice(0,9);r.unshift("[".concat((new Date).toLocaleTimeString(),"] [").concat(e||"GET","] [").concat(o,"ms] ").concat(t,"; ").concat(null==n?void 0:n.substr(0,999))),s.value=r.join("\n")}}function x(t){window.detectCorruptRestApiFailed=window.detectCorruptRestApiFailed||0,window.addEventListener("pageshow",(({persisted:t})=>{const e=document.getElementById(E);e&&t&&0===window.detectCorruptRestApiFailed&&(e.style.display="none")}));const e=async()=>{if(window.detectCorruptRestApiFailed>0)for(const e of Object.keys(t))T(e,t[e])};let o;const n=()=>{clearTimeout(o),o=setTimeout(e,1e3)};n(),window.addEventListener(E,n)}const S=x;async function _(t,e,o){if(204===e.status)return{};const n=e.clone();try{return await e.json()}catch(e){const s=await n.text();if(""===s&&[i.DELETE,i.PUT].indexOf(o)>-1)return;let r;console.warn("The response of ".concat(t," contains unexpected JSON, try to resolve the JSON line by line..."),{body:s});for(const t of s.split("\n"))if(t.startsWith("[")||t.startsWith("{"))try{return JSON.parse(t)}catch(t){r=t}throw r}}var N=o(916),D=o.n(N);async function A({location:t,options:e,request:o,params:n,settings:s={},cookieValueAsParam:r,multipart:a=!1,sendRestNonce:c=!0}){const l=t.namespace||e.restNamespace,d=v({location:t,params:n,nonce:!1,options:e,cookieValueAsParam:r});["wp-json/","rest_route="].filter((t=>d.indexOf(t)>-1)).length>0&&t.method&&t.method!==i.GET?s.method=i.POST:s.method=t.method||i.GET;const u=new URL(d,window.location.href),p=-1===["HEAD","GET"].indexOf(s.method);!p&&o&&y(u,[o],!0);const f=u.toString();let m;p&&(m=a?D()(o,"boolean"==typeof a?{}:a):JSON.stringify(o));const w=await P(e.restNonce),b=void 0!==w,g=h().all([s,{headers:{..."string"==typeof m?{"Content-Type":"application/json;charset=utf-8"}:{},...b&&c?{"X-WP-Nonce":w}:{},Accept:"application/json, */*;q=0.1"}}]);let E;g.body=m;let k=!1;const T=()=>{k=!0};window.addEventListener("pagehide",T),window.addEventListener("beforeunload",T);const x=(new Date).getTime();let S;try{E=await window.fetch(f,g),S=(new Date).getTime()-x,C(l)}catch(e){throw S=(new Date).getTime()-x,k||(O({method:t.method,route:u.pathname,ms:S,response:"".concat(e)}),R(s,l)),console.error(e),e}finally{window.removeEventListener("pagehide",T),window.removeEventListener("beforeunload",T)}if(!E.ok){let r,i=!1;try{if(r=await _(f,E,t.method),"private_site"===r.code&&403===E.status&&b&&!c&&(i=!0),"rest_cookie_invalid_nonce"===r.code&&b){const{restRecreateNonceEndpoint:t}=e;try{await P(w,t),i=!0}catch(t){}}}catch(t){}if(i)return await A({location:t,options:e,multipart:a,params:n,request:o,sendRestNonce:!0,settings:s});O({method:t.method,route:u.pathname,ms:S,response:JSON.stringify(r)}),R(s);const l=E;throw l.responseJSON=r,l}return _(f,E,t.method)}function F(t){return{urlBuilder:e=>v({...e,options:{restNamespace:t.restNamespace,restNonce:t.restNonce,restQuery:t.restQuery,restRoot:t.restRoot}}),request:e=>A({...e,options:{restNamespace:t.restNamespace,restNonce:t.restNonce,restQuery:t.restQuery,restRoot:t.restRoot,restRecreateNonceEndpoint:t.restRecreateNonceEndpoint}})}}var L=o(449);const q=wp.i18n,j=wp;var U=o.n(j);function z(t,...e){return q.sprintf(t,...e)}function Z(t){const{wpi18nLazy:e}=window;if(e&&e[t]&&U()&&U().i18n)for(const o of e[t])U().i18n.setLocaleData(o,t);return{_n:function(e,o,n,...s){return z(q._n(e,o,n,t),...s)},_nx:function(e,o,n,s,...r){return z(q._nx(e,o,s,n,t),...r)},_x:function(e,o,...n){return z(q._x(e,o,t),...n)},__:function(e,...o){return z(q.__(e,t),...o)},_i:function(t,e){return(0,L.Z)({mixedString:t,components:e})}}}const G={path:"/plugin",method:i.GET};var I=o(921),W=o(888);const J=mobx;var M,Q,B,H,V;let Y=(V=H=class{constructor(){(0,I.Z)(this,"entries",Q,this),(0,I.Z)(this,"busy",B,this),this.annotated=void 0,this.get=(0,J.flow)((function*(t){const{request:e,params:o,clear:n=!1}=t||{};this.busy=!0;try{const{path:t,namespace:s}=this.annotated,r=yield this.annotated.request({location:{path:t,method:i.GET,namespace:s},request:e,params:o});n&&this.entries.clear();for(const t of r){const e=this.instance(t),o=this.entries.get(e.key);o?o.data=e.data:this.entries.set(e.key,e)}}catch(t){throw console.log(t),t}finally{this.busy=!1}})),this.getSingle=(0,J.flow)((function*(t){if(!this.annotated.singlePath)throw new Error("There is no getSingle method allowed");const{request:e,params:o}=t||{};this.busy=!0;try{const{singlePath:t,namespace:n}=this.annotated,s=yield this.annotated.request({location:{path:t,method:i.GET,namespace:n},request:e,params:o}),r=this.instance(s);this.entries.set(r.key,r)}catch(t){throw console.log(t),t}finally{this.busy=!1}})),setTimeout((()=>{this.annotated||console.error("You have not used the @ClientCollection.annotate annoation together with this class!")}),0)}},H.annotate=t=>e=>class extends e{constructor(...e){super(...e),this.annotated=t}},M=V,Q=(0,W.Z)(M.prototype,"entries",[J.observable],{configurable:!0,enumerable:!0,writable:!0,initializer:function(){return new Map}}),B=(0,W.Z)(M.prototype,"busy",[J.observable],{configurable:!0,enumerable:!0,writable:!0,initializer:function(){return!1}}),M);var X,K,$,tt,et,ot;let nt=(ot=et=class{get key(){var t;return null===(t=this.data)||void 0===t?void 0:t[this.annotated.keyId]}constructor(t,e={}){(0,I.Z)(this,"data",K,this),(0,I.Z)(this,"collection",$,this),(0,I.Z)(this,"busy",tt,this),this.annotated=void 0,this.persist=(0,J.flow)((function*(t){if(!this.annotated.create)throw new Error("There is no persist method allowed");this.busy=!0;try{const{create:{path:e,method:o},namespace:n}=this.annotated,s=yield this.annotated.request({location:{path:e,method:o||i.POST,namespace:n},request:this.transformDataForPersist(),params:t||{}});this.fromResponse(s),this.collection.entries.set(this.key,this),this.afterPersist()}catch(t){throw console.log(t),t}finally{this.busy=!1}})),this.patch=(0,J.flow)((function*(t){if(!this.annotated.patch)throw new Error("There is no patch method allowed");this.busy=!0;try{const{patch:{path:e,method:o},namespace:n}=this.annotated,s=yield this.annotated.request({location:{path:e,method:o||i.PATCH,namespace:n},request:this.transformDataForPatch(),params:{[this.annotated.keyId]:this.key,...t||{}}});this.fromResponse(s),this.afterPatch()}catch(t){throw console.log(t),t}finally{this.busy=!1}})),this.delete=(0,J.flow)((function*(t){if(!this.annotated.delete)throw new Error("There is no delete method allowed");this.busy=!0;try{const{delete:{path:e,method:o},namespace:n}=this.annotated,s=yield this.annotated.request({location:{path:e,method:o||i.DELETE,namespace:n},params:{[this.annotated.keyId]:this.key,...t||{}}});return this.collection.entries.delete(this.key),this.afterDelete(),s}catch(t){throw console.log(t),t}finally{this.busy=!1}})),setTimeout((()=>{this.annotated||console.error("You have not used the @ClientModel.annotate annoation together with this class!")}),0),(0,J.runInAction)((()=>{this.collection=t,this.data=e}))}fromResponse(t){return(0,J.set)(this.data,t),this}transformDataForPersist(){return this.data}transformDataForPatch(){throw new Error("If you want to use patch method, you need to implement transformDataForPatch!")}afterPersist(){}afterPatch(){}afterDelete(){}},et.annotate=t=>e=>class extends e{constructor(...e){super(...e),this.annotated=t}},X=ot,K=(0,W.Z)(X.prototype,"data",[J.observable],{configurable:!0,enumerable:!0,writable:!0,initializer:function(){return{}}}),$=(0,W.Z)(X.prototype,"collection",[J.observable],{configurable:!0,enumerable:!0,writable:!0,initializer:null}),tt=(0,W.Z)(X.prototype,"busy",[J.observable],{configurable:!0,enumerable:!0,writable:!0,initializer:function(){return!1}}),(0,W.Z)(X.prototype,"key",[J.computed],Object.getOwnPropertyDescriptor(X.prototype,"key"),X.prototype),X);class st extends nt{transformDataForPersist(){var t,e;const o={...super.transformDataForPersist()};return o.title=null===(t=o.title)||void 0===t?void 0:t.rendered,o.content=null===(e=o.content)||void 0===e?void 0:e.rendered,delete o._links,delete o.link,o}transformDataForPatch(){return this.transformDataForPersist()}}class rt extends Y{}class at extends nt{transformDataForPersist(){const t={...super.transformDataForPersist()};return delete t._links,delete t.link,t}transformDataForPatch(){return this.transformDataForPersist()}}class it extends Y{}function ct(t,{chunks:e,publicUrl:o,textDomain:n,version:s}){const r=e[t.split("?")[0]],a=!!r,[i,l]=(0,c.useState)(!1),d=(0,c.useCallback)((async t=>{const e=window;e.wpi18nLazy=e.wpi18nLazy||{},e.wpi18nLazy.chunkUrls=e.wpi18nLazy.chunkUrls||[];const{chunkUrls:r}=e.wpi18nLazy,i="".concat(o,"languages/json/").concat(n,"-").concat(t,".json");if(a&&-1===r.indexOf(i)){r.push(i);try{const t=await window.fetch("".concat(i,"?ver=").concat(s)),{locale_data:{messages:e}}=await t.json();U().i18n.setLocaleData(e,n)}catch{}}}),[o,n]);return(0,c.useEffect)((()=>{a?Promise.all(r.map(d)).then((()=>{l(!0)})):l(!0)}),[a,d]),i}const lt=({children:t,chunkFile:e,fallback:o,options:n})=>{const s=ct(e,n());return React.createElement(React.Fragment,null,s?t:o)}},363:t=>{t.exports=React}},o={};function n(t){var s=o[t];if(void 0!==s)return s.exports;var r=o[t]={exports:{}};return e[t].call(r.exports,r,r.exports,n),r.exports}n.m=e,t=[],n.O=(e,o,s,r)=>{if(!o){var a=1/0;for(d=0;d<t.length;d++){for(var[o,s,r]=t[d],i=!0,c=0;c<o.length;c++)(!1&r||a>=r)&&Object.keys(n.O).every((t=>n.O[t](o[c])))?o.splice(c--,1):(i=!1,r<a&&(a=r));if(i){t.splice(d--,1);var l=s();void 0!==l&&(e=l)}}return e}r=r||0;for(var d=t.length;d>0&&t[d-1][2]>r;d--)t[d]=t[d-1];t[d]=[o,s,r]},n.n=t=>{var e=t&&t.__esModule?()=>t.default:()=>t;return n.d(e,{a:e}),e},n.d=(t,e)=>{for(var o in e)n.o(e,o)&&!n.o(t,o)&&Object.defineProperty(t,o,{enumerable:!0,get:e[o]})},n.o=(t,e)=>Object.prototype.hasOwnProperty.call(t,e),n.r=t=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},(()=>{var t={826:0};n.O.j=e=>0===t[e];var e=(e,o)=>{var s,r,[a,i,c]=o,l=0;if(a.some((e=>0!==t[e]))){for(s in i)n.o(i,s)&&(n.m[s]=i[s]);if(c)var d=c(n)}for(e&&e(o);l<a.length;l++)r=a[l],n.o(t,r)&&t[r]&&t[r][0](),t[r]=0;return n.O(d)},o=self.webpackChunkdevowlWp_utils=self.webpackChunkdevowlWp_utils||[];o.forEach(e.bind(null,0)),o.push=e.bind(null,o.push.bind(o))})();var s=n.O(void 0,[764],(()=>n(550)));s=n.O(s),devowlWp_utils=s})();
//# sourceMappingURL=index.js.map