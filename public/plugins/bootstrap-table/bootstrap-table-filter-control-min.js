/**
 * bootstrap-table - An extended table to integration with some of the most widely used CSS frameworks. (Supports Bootstrap, Semantic UI, Bulma, Material Design, Foundation)
 *
 * @version v1.15.4
 * @homepage https://bootstrap-table.com
 * @author wenzhixin <wenzhixin2010@gmail.com> (http://wenzhixin.net.cn/)
 * @license MIT
 */

(function(e,t){"object"==typeof exports&&"undefined"!=typeof module?t(require("jquery")):"function"==typeof define&&define.amd?define(["jquery"],t):(e=e||self,t(e.jQuery))})(this,function(e){'use strict';var h=Math.max,g=Math.min,C=Math.floor;function t(e,t){return t={exports:{}},e(t,t.exports),t.exports}function o(e){return o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},o(e)}function l(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function n(e,t){for(var o,l=0;l<t.length;l++)o=t[l],o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}function r(e,t,o){return t&&n(e.prototype,t),o&&n(e,o),e}function a(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&s(e,t)}function i(e){return i=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)},i(e)}function s(e,t){return s=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e},s(e,t)}function c(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function d(e,t){return t&&("object"==typeof t||"function"==typeof t)?t:c(e)}function u(e,t){for(;!Object.prototype.hasOwnProperty.call(e,t)&&(e=i(e),null!==e););return e}function p(e,t,o){return p="undefined"!=typeof Reflect&&Reflect.get?Reflect.get:function(e,t,o){var l=u(e,t);if(l){var n=Object.getOwnPropertyDescriptor(l,t);return n.get?n.get.call(o):n.value}},p(e,t,o||e)}e=e&&e.hasOwnProperty("default")?e["default"]:e;var y,m,b,S="undefined"==typeof globalThis?"undefined"==typeof window?"undefined"==typeof global?"undefined"==typeof self?{}:self:global:window:globalThis,T="object",O=function(e){return e&&e.Math==Math&&e},v=O(typeof globalThis==T&&globalThis)||O(typeof window==T&&window)||O(typeof self==T&&self)||O(typeof S==T&&S)||Function("return this")(),x=function(e){try{return!!e()}catch(e){return!0}},k=!x(function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a}),E={}.propertyIsEnumerable,P=Object.getOwnPropertyDescriptor,D=P&&!E.call({1:2},1),L=D?function(e){var t=P(this,e);return!!t&&t.enumerable}:E,f={f:L},I=function(e,t){return{enumerable:!(1&e),configurable:!(2&e),writable:!(4&e),value:t}},A={}.toString,w=function(e){return A.call(e).slice(8,-1)},j="".split,M=x(function(){return!Object("z").propertyIsEnumerable(0)})?function(e){return"String"==w(e)?j.call(e,""):Object(e)}:Object,_=function(e){if(e==null)throw TypeError("Can't call method on "+e);return e},N=function(e){return M(_(e))},H=function(e){return"object"==typeof e?null!==e:"function"==typeof e},F=function(e,t){if(!H(e))return e;var o,l;if(t&&"function"==typeof(o=e.toString)&&!H(l=o.call(e)))return l;if("function"==typeof(o=e.valueOf)&&!H(l=o.call(e)))return l;if(!t&&"function"==typeof(o=e.toString)&&!H(l=o.call(e)))return l;throw TypeError("Can't convert object to primitive value")},R={}.hasOwnProperty,B=function(e,t){return R.call(e,t)},V=v.document,G=H(V)&&H(V.createElement),Y=function(e){return G?V.createElement(e):{}},U=!k&&!x(function(){return 7!=Object.defineProperty(Y("div"),"a",{get:function(){return 7}}).a}),W=Object.getOwnPropertyDescriptor,K=k?W:function(e,t){if(e=N(e),t=F(t,!0),U)try{return W(e,t)}catch(e){}return B(e,t)?I(!f.f.call(e,t),e[t]):void 0},z={f:K},Q=function(e){if(!H(e))throw TypeError(e+" is not an object");return e},J=Object.defineProperty,X=k?J:function(e,t,o){if(Q(e),t=F(t,!0),Q(o),U)try{return J(e,t,o)}catch(e){}if("get"in o||"set"in o)throw TypeError("Accessors not supported");return"value"in o&&(e[t]=o.value),e},Z={f:X},ee=k?function(e,t,o){return Z.f(e,t,I(1,o))}:function(e,t,o){return e[t]=o,e},te=function(e,t){try{ee(v,e,t)}catch(o){v[e]=t}return t},oe=t(function(e){var t=v["__core-js_shared__"]||te("__core-js_shared__",{});(e.exports=function(e,o){return t[e]||(t[e]=o===void 0?{}:o)})("versions",[]).push({version:"3.1.3",mode:"global",copyright:"\xA9 2019 Denis Pushkarev (zloirock.ru)"})}),le=oe("native-function-to-string",Function.toString),ne=v.WeakMap,re="function"==typeof ne&&/native code/.test(le.call(ne)),ae=0,q=Math.random(),ie=function(e){return"Symbol("+((e===void 0?"":e)+"")+")_"+(++ae+q).toString(36)},se=oe("keys"),ce=function(e){return se[e]||(se[e]=ie(e))},de={},ue=v.WeakMap,pe=function(e){return b(e)?m(e):y(e,{})};if(re){var fe=new ue,he=fe.get,ge=fe.has,Ce=fe.set;y=function(e,t){return Ce.call(fe,e,t),t},m=function(e){return he.call(fe,e)||{}},b=function(e){return ge.call(fe,e)}}else{var ye=ce("state");de[ye]=!0,y=function(e,t){return ee(e,ye,t),t},m=function(e){return B(e,ye)?e[ye]:{}},b=function(e){return B(e,ye)}}var me={set:y,get:m,has:b,enforce:pe,getterFor:function(e){return function(t){var o;if(!H(t)||(o=m(t)).type!==e)throw TypeError("Incompatible receiver, "+e+" required");return o}}},be=t(function(e){var t=me.get,o=me.enforce,l=(le+"").split("toString");oe("inspectSource",function(e){return le.call(e)}),(e.exports=function(e,t,n,r){var a=!!r&&!!r.unsafe,i=!!r&&!!r.enumerable,s=!!r&&!!r.noTargetGet;return("function"==typeof n&&("string"==typeof t&&!B(n,"name")&&ee(n,"name",t),o(n).source=l.join("string"==typeof t?t:"")),e===v)?void(i?e[t]=n:te(t,n)):void(a?!s&&e[t]&&(i=!0):delete e[t],i?e[t]=n:ee(e,t,n))})(Function.prototype,"toString",function(){return"function"==typeof this&&t(this).source||le.call(this)})}),Se=v,Oe=function(e){return"function"==typeof e?e:void 0},Te=function(e,t){return 2>arguments.length?Oe(Se[e])||Oe(v[e]):Se[e]&&Se[e][t]||v[e]&&v[e][t]},ve=Math.ceil,xe=function(e){return isNaN(e=+e)?0:(0<e?C:ve)(e)},ke=function(e){return 0<e?g(xe(e),9007199254740991):0},Ee=function(e,t){var o=xe(e);return 0>o?h(o+t,0):g(o,t)},Pe=function(e){return function(t,o,l){var n,r=N(t),a=ke(r.length),i=Ee(l,a);if(e&&o!=o){for(;a>i;)if(n=r[i++],n!=n)return!0;}else for(;a>i;i++)if((e||i in r)&&r[i]===o)return e||i||0;return!e&&-1}},De={includes:Pe(!0),indexOf:Pe(!1)},Le=De.indexOf,Ie=function(e,t){var o,l=N(e),n=0,r=[];for(o in l)!B(de,o)&&B(l,o)&&r.push(o);for(;t.length>n;)B(l,o=t[n++])&&(~Le(r,o)||r.push(o));return r},Ae=["constructor","hasOwnProperty","isPrototypeOf","propertyIsEnumerable","toLocaleString","toString","valueOf"],we=Ae.concat("length","prototype"),je=Object.getOwnPropertyNames||function(e){return Ie(e,we)},Me={f:je},_e=Object.getOwnPropertySymbols,Ne={f:_e},He=Te("Reflect","ownKeys")||function(e){var t=Me.f(Q(e)),o=Ne.f;return o?t.concat(o(e)):t},Fe=function(e,t){for(var o,l=He(t),n=Z.f,r=z.f,a=0;a<l.length;a++)o=l[a],B(e,o)||n(e,o,r(t,o))},$e=/#|\.prototype\./,Re=function(e,t){var o=Ve[Be(e)];return!(o!=Ye)||o!=Ge&&("function"==typeof t?x(t):!!t)},Be=Re.normalize=function(e){return(e+"").replace($e,".").toLowerCase()},Ve=Re.data={},Ge=Re.NATIVE="N",Ye=Re.POLYFILL="P",Ue=z.f,We=function(e,t){var o,l,n,r,a,i,s=e.target,c=e.global,d=e.stat;if(l=c?v:d?v[s]||te(s,{}):(v[s]||{}).prototype,l)for(n in t){if(a=t[n],e.noTargetGet?(i=Ue(l,n),r=i&&i.value):r=l[n],o=Re(c?n:s+(d?".":"#")+n,e.forced),!o&&void 0!==r){if(typeof a==typeof r)continue;Fe(a,r)}(e.sham||r&&r.sham)&&ee(a,"sham",!0),be(l,n,a,e)}},Ke=function(e){if("function"!=typeof e)throw TypeError(e+" is not a function");return e},ze=function(e,t,o){return(Ke(e),void 0===t)?e:0===o?function(){return e.call(t)}:1===o?function(o){return e.call(t,o)}:2===o?function(o,l){return e.call(t,o,l)}:3===o?function(o,l,n){return e.call(t,o,l,n)}:function(){return e.apply(t,arguments)}},qe=function(e){return Object(_(e))},Qe=Array.isArray||function(e){return"Array"==w(e)},Je=!!Object.getOwnPropertySymbols&&!x(function(){return!(Symbol()+"")}),Xe=v.Symbol,Ze=oe("wks"),et=function(e){return Ze[e]||(Ze[e]=Je&&Xe[e]||(Je?Xe:ie)("Symbol."+e))},tt=et("species"),ot=function(e,t){var o;return Qe(e)&&(o=e.constructor,"function"==typeof o&&(o===Array||Qe(o.prototype))?o=void 0:H(o)&&(o=o[tt],null===o&&(o=void 0))),new(void 0===o?Array:o)(0===t?0:t)},lt=[].push,nt=function(e){var t=1==e,o=4==e,l=6==e;return function(n,r,a,i){for(var s,c,d=qe(n),u=M(d),p=ze(r,a,3),f=ke(u.length),h=0,g=i||ot,C=t?g(n,f):2==e?g(n,0):void 0;f>h;h++)if((5==e||l||h in u)&&(s=u[h],c=p(s,h,d),e))if(t)C[h]=c;else if(c)switch(e){case 3:return!0;case 5:return s;case 6:return h;case 2:lt.call(C,s);}else if(o)return!1;return l?-1:3==e||o?o:C}},rt={forEach:nt(0),map:nt(1),filter:nt(2),some:nt(3),every:nt(4),find:nt(5),findIndex:nt(6)},at=et("species"),it=rt.filter;We({target:"Array",proto:!0,forced:!function(e){return!x(function(){var t=[],o=t.constructor={};return o[at]=function(){return{foo:1}},1!==t[e](Boolean).foo})}("filter")},{filter:function(e){return it(this,e,1<arguments.length?arguments[1]:void 0)}});var st=Object.keys||function(e){return Ie(e,Ae)},ct=k?Object.defineProperties:function(e,t){Q(e);for(var o,l=st(t),n=l.length,r=0;n>r;)Z.f(e,o=l[r++],t[o]);return e},dt=Te("document","documentElement"),ut=ce("IE_PROTO"),pt="prototype",ft=function(){},ht=function(){var e,t=Y("iframe"),o=Ae.length,l="<",n="script",r=">";for(t.style.display="none",dt.appendChild(t),t.src="java"+n+":"+"",e=t.contentWindow.document,e.open(),e.write(l+n+r+"document.F=Object"+l+"/"+n+r),e.close(),ht=e.F;o--;)delete ht[pt][Ae[o]];return ht()},gt=Object.create||function(e,t){var o;return null===e?o=ht():(ft[pt]=Q(e),o=new ft,ft[pt]=null,o[ut]=e),void 0===t?o:ct(o,t)};de[ut]=!0;var Ct=et("unscopables"),yt=Array.prototype;yt[Ct]==null&&ee(yt,Ct,gt(null));var mt=function(e){yt[Ct][e]=!0},bt=rt.find,St="find",Ot=!0;St in[]&&[,][St](function(){Ot=!1}),We({target:"Array",proto:!0,forced:Ot},{find:function(e){return bt(this,e,1<arguments.length?arguments[1]:void 0)}}),mt(St);var Tt=De.includes;We({target:"Array",proto:!0},{includes:function(e){return Tt(this,e,1<arguments.length?arguments[1]:void 0)}}),mt("includes");var vt=function(e,t){var o=[][e];return!o||!x(function(){o.call(null,t||function(){throw 1},1)})},xt=De.indexOf,kt=[].indexOf,Et=!!kt&&0>1/[1].indexOf(1,-0),Pt=vt("indexOf");We({target:"Array",proto:!0,forced:Et||Pt},{indexOf:function(e){return Et?kt.apply(this,arguments)||0:xt(this,e,1<arguments.length?arguments[1]:void 0)}});var Dt=[].join,Lt=M!=Object,It=vt("join",",");We({target:"Array",proto:!0,forced:Lt||It},{join:function(e){return Dt.call(N(this),e===void 0?",":e)}});var At=[].sort,wt=[1,2,3],jt=x(function(){wt.sort(void 0)}),Mt=x(function(){wt.sort(null)}),_t=vt("sort");We({target:"Array",proto:!0,forced:jt||!Mt||_t},{sort:function(e){return e===void 0?At.call(qe(this)):At.call(qe(this),Ke(e))}});var Nt=x(function(){st(1)});We({target:"Object",stat:!0,forced:Nt},{keys:function(e){return st(qe(e))}});var Ht=et("toStringTag"),Ft="Arguments"==w(function(){return arguments}()),$t=function(e,t){try{return e[t]}catch(e){}},Rt=function(e){var t,o,l;return e===void 0?"Undefined":null===e?"Null":"string"==typeof(o=$t(t=Object(e),Ht))?o:Ft?w(t):"Object"==(l=w(t))&&"function"==typeof t.callee?"Arguments":l},Bt=et("toStringTag"),Vt={};Vt[Bt]="z";var Gt=function(){return"[object "+Rt(this)+"]"},Yt=Object.prototype;Gt!==Yt.toString&&be(Yt,"toString",Gt,{unsafe:!0});var Ut=function(){var e=Q(this),t="";return e.global&&(t+="g"),e.ignoreCase&&(t+="i"),e.multiline&&(t+="m"),e.dotAll&&(t+="s"),e.unicode&&(t+="u"),e.sticky&&(t+="y"),t},Wt="toString",Kt=RegExp.prototype,zt=Kt[Wt],qt=x(function(){return"/a/b"!=zt.call({source:"a",flags:"b"})}),Qt=zt.name!=Wt;(qt||Qt)&&be(RegExp.prototype,Wt,function(){var e=Q(this),t=e.source+"",o=e.flags,l=(o===void 0&&e instanceof RegExp&&!("flags"in Kt)?Ut.call(e):o)+"";return"/"+t+"/"+l},{unsafe:!0});var Jt=et("match"),Xt=function(e){var t;return H(e)&&((t=e[Jt])===void 0?"RegExp"==w(e):!!t)},Zt=function(e){if(Xt(e))throw TypeError("The method doesn't accept regular expressions");return e},eo=et("match");We({target:"String",proto:!0,forced:!function(e){var t=/./;try{"/./"[e](t)}catch(o){try{return t[eo]=!1,"/./"[e](t)}catch(e){}}return!1}("includes")},{includes:function(e){return!!~(_(this)+"").indexOf(Zt(e),1<arguments.length?arguments[1]:void 0)}});var to=RegExp.prototype.exec,oo=String.prototype.replace,lo=to,no=function(){var e=/a/,t=/b*/g;return to.call(e,"a"),to.call(t,"a"),0!==e.lastIndex||0!==t.lastIndex}(),ro=/()??/.exec("")[1]!==void 0;(no||ro)&&(lo=function(e){var t,o,l,n,r=this;return ro&&(o=new RegExp("^"+r.source+"$(?!\\s)",Ut.call(r))),no&&(t=r.lastIndex),l=to.call(r,e),no&&l&&(r.lastIndex=r.global?l.index+l[0].length:t),ro&&l&&1<l.length&&oo.call(l[0],o,function(){for(n=1;n<arguments.length-2;n++)void 0===arguments[n]&&(l[n]=void 0)}),l});var ao=lo,io=et("species"),so=!x(function(){var e=/./;return e.exec=function(){var e=[];return e.groups={a:"7"},e},"7"!=="".replace(e,"$<a>")}),co=!x(function(){var e=/(?:)/,t=e.exec;e.exec=function(){return t.apply(this,arguments)};var o="ab".split(e);return 2!==o.length||"a"!==o[0]||"b"!==o[1]}),uo=function(e,t,o,l){var n=et(e),r=!x(function(){var t={};return t[n]=function(){return 7},7!=""[e](t)}),a=r&&!x(function(){var t=!1,o=/a/;return o.exec=function(){return t=!0,null},"split"===e&&(o.constructor={},o.constructor[io]=function(){return o}),o[n](""),!t});if(!r||!a||"replace"===e&&!so||"split"===e&&!co){var i=/./[n],s=o(n,""[e],function(e,t,o,l,n){return t.exec===ao?r&&!n?{done:!0,value:i.call(t,o,l)}:{done:!0,value:e.call(o,t,l)}:{done:!1}}),c=s[0],d=s[1];be(String.prototype,e,c),be(RegExp.prototype,n,2==t?function(e,t){return d.call(e,this,t)}:function(e){return d.call(e,this)}),l&&ee(RegExp.prototype[n],"sham",!0)}},po=function(e){return function(t,o){var l,n,r=_(t)+"",a=xe(o),i=r.length;return 0>a||a>=i?e?"":void 0:(l=r.charCodeAt(a),55296>l||56319<l||a+1===i||56320>(n=r.charCodeAt(a+1))||57343<n?e?r.charAt(a):l:e?r.slice(a,a+2):(l-55296<<10)+(n-56320)+65536)}},fo={codeAt:po(!1),charAt:po(!0)},ho=fo.charAt,go=function(e,t,o){return t+(o?ho(e,t).length:1)},Co=function(e,t){var o=e.exec;if("function"==typeof o){var l=o.call(e,t);if("object"!=typeof l)throw TypeError("RegExp exec method returned something other than an Object or null");return l}if("RegExp"!==w(e))throw TypeError("RegExp#exec called on incompatible receiver");return ao.call(e,t)};uo("match",1,function(e,t,o){return[function(t){var o=_(this),l=t==null?void 0:t[e];return l===void 0?new RegExp(t)[e](o+""):l.call(t,o)},function(e){var l=o(t,e,this);if(l.done)return l.value;var r=Q(e),a=this+"";if(!r.global)return Co(r,a);var i=r.unicode;r.lastIndex=0;for(var s,c=[],d=0;null!==(s=Co(r,a));){var u=s[0]+"";c[d]=u,""==u&&(r.lastIndex=go(a,ke(r.lastIndex),i)),d++}return 0===d?null:c}]});var yo=/\$([$&'`]|\d\d?|<[^>]*>)/g,mo=/\$([$&'`]|\d\d?)/g,bo=function(e){return e===void 0?e:e+""};uo("replace",2,function(e,t,o){function l(e,o,l,r,a,i){var s=l+e.length,c=r.length,n=mo;return void 0!==a&&(a=qe(a),n=yo),t.call(i,n,function(t,i){var d;switch(i.charAt(0)){case"$":return"$";case"&":return e;case"`":return o.slice(0,l);case"'":return o.slice(s);case"<":d=a[i.slice(1,-1)];break;default:var u=+i;if(0==u)return t;if(u>c){var n=C(u/10);return 0===n?t:n<=c?void 0===r[n-1]?i.charAt(1):r[n-1]+i.charAt(1):t}d=r[u-1];}return void 0===d?"":d})}return[function(o,l){var n=_(this),r=o==null?void 0:o[e];return r===void 0?t.call(n+"",o,l):r.call(o,n,l)},function(e,n){var r=o(t,e,this,n);if(r.done)return r.value;var a=Q(e),s=this+"",c="function"==typeof n;c||(n=n+"");var d=a.global;if(d){var u=a.unicode;a.lastIndex=0}for(var p,f=[];(p=Co(a,s),null!==p)&&!(f.push(p),!d);){var C=p[0]+"";""==C&&(a.lastIndex=go(s,ke(a.lastIndex),u))}for(var y="",m=0,b=0;b<f.length;b++){p=f[b];for(var S=p[0]+"",O=h(g(xe(p.index),s.length),0),T=[],v=1;v<p.length;v++)T.push(bo(p[v]));var x=p.groups;if(c){var k=[S].concat(T,O,s);x!==void 0&&k.push(x);var E=n.apply(void 0,k)+""}else E=l(S,s,O,T,x,n);O>=m&&(y+=s.slice(m,O)+E,m=O+S.length)}return y+s.slice(m)}]});var So=et("species"),Oo=function(e,t){var o,l=Q(e).constructor;return l===void 0||(o=Q(l)[So])==null?t:Ke(o)},To=[].push,vo=4294967295,xo=!x(function(){return!RegExp(vo,"y")});uo("split",2,function(e,t,o){var l;return l="c"=="abbc".split(/(b)*/)[1]||4!="test".split(/(?:)/,-1).length||2!="ab".split(/(?:ab)*/).length||4!=".".split(/(.?)(.?)/).length||1<".".split(/()()/).length||"".split(/.?/).length?function(e,o){var l=_(this)+"",n=void 0===o?vo:o>>>0;if(0===n)return[];if(void 0===e)return[l];if(!Xt(e))return t.call(l,e,n);for(var r,a,i,s=[],c=(e.ignoreCase?"i":"")+(e.multiline?"m":"")+(e.unicode?"u":"")+(e.sticky?"y":""),d=0,u=new RegExp(e.source,c+"g");(r=ao.call(u,l))&&(a=u.lastIndex,!(a>d&&(s.push(l.slice(d,r.index)),1<r.length&&r.index<l.length&&To.apply(s,r.slice(1)),i=r[0].length,d=a,s.length>=n)));)u.lastIndex===r.index&&u.lastIndex++;return d===l.length?(i||!u.test(""))&&s.push(""):s.push(l.slice(d)),s.length>n?s.slice(0,n):s}:function(e,o){return void 0===e&&0===o?[]:t.call(this,e,o)},[function(t,o){var n=_(this),r=null==t?void 0:t[e];return void 0===r?l.call(n+"",t,o):r.call(t,n,o)},function(n,r){var a=o(l,n,this,r,l!==t);if(a.done)return a.value;var s=Q(n),c=this+"",d=Oo(s,RegExp),u=s.unicode,f=(s.ignoreCase?"i":"")+(s.multiline?"m":"")+(s.unicode?"u":"")+(xo?"y":"g"),h=new d(xo?s:"^(?:"+s.source+")",f),C=void 0===r?vo:r>>>0;if(0===C)return[];if(0===c.length)return null===Co(h,c)?[c]:[];for(var y=0,m=0,b=[];m<c.length;){h.lastIndex=xo?m:0;var S,O=Co(h,xo?c:c.slice(m));if(null===O||(S=g(ke(h.lastIndex+(xo?0:m)),c.length))===y)m=go(c,m,u);else{if(b.push(c.slice(y,m)),b.length===C)return b;for(var T=1;T<=O.length-1;T++)if(b.push(O[T]),b.length===C)return b;m=y=S}}return b.push(c.slice(y)),b}]},!xo);var ko="[\t\n\x0B\f\r \xA0\u1680\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200A\u202F\u205F\u3000\u2028\u2029\uFEFF]",Eo=RegExp("^"+ko+ko+"*"),Po=RegExp(ko+ko+"*$"),Do=function(e){return function(t){var o=_(t)+"";return 1&e&&(o=o.replace(Eo,"")),2&e&&(o=o.replace(Po,"")),o}},Lo={start:Do(1),end:Do(2),trim:Do(3)},Io="\u200B\x85\u180E",Ao=Lo.trim;We({target:"String",proto:!0,forced:function(e){return x(function(){return!!"\t\n\x0B\f\r \xA0\u1680\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200A\u202F\u205F\u3000\u2028\u2029\uFEFF"[e]()||Io[e]()!=Io||"\t\n\x0B\f\r \xA0\u1680\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200A\u202F\u205F\u3000\u2028\u2029\uFEFF"[e].name!==e})}("trim")},{trim:function(){return Ao(this)}});var wo={CSSRuleList:0,CSSStyleDeclaration:0,CSSValueList:0,ClientRectList:0,DOMRectList:0,DOMStringList:0,DOMTokenList:1,DataTransferItemList:0,FileList:0,HTMLAllCollection:0,HTMLCollection:0,HTMLFormElement:0,HTMLSelectElement:0,MediaList:0,MimeTypeArray:0,NamedNodeMap:0,NodeList:1,PaintRequestList:0,Plugin:0,PluginArray:0,SVGLengthList:0,SVGNumberList:0,SVGPathSegList:0,SVGPointList:0,SVGStringList:0,SVGTransformList:0,SourceBufferList:0,StyleSheetList:0,TextTrackCueList:0,TextTrackList:0,TouchList:0},jo=rt.forEach,Mo=vt("forEach")?function(e){return jo(this,e,1<arguments.length?arguments[1]:void 0)}:[].forEach;for(var _o in wo){var No=v[_o],Ho=No&&No.prototype;if(Ho&&Ho.forEach!==Mo)try{ee(Ho,"forEach",Mo)}catch(e){Ho.forEach=Mo}}var Fo=e.fn.bootstrapTable.utils,$o={getOptionsFromSelectControl:function(e){return e.get(e.length-1).options},hideUnusedSelectOptions:function(e,t){for(var o=$o.getOptionsFromSelectControl(e),l=0;l<o.length;l++)""!==o[l].value&&(t.hasOwnProperty(o[l].value)?e.find(Fo.sprintf("option[value='%s']",o[l].value)).show():e.find(Fo.sprintf("option[value='%s']",o[l].value)).hide())},addOptionToSelectControl:function(t,o,l,n){var r=e.trim(o),a=e(t.get(t.length-1));if(!$o.existOptionInSelectControl(t,r)){var i=e(e("<option></option>").attr("value",r).text(e("<div />").html(l).text()));r===n&&i.attr("selected",!0),a.append(i)}},sortSelectControl:function(t,o){var l=e(t.get(t.length-1)),n=l.find("option:gt(0)");n.sort(function(e,t){return Fo.sort(e.textContent,t.textContent,"desc"===o?-1:1)}),l.find("option:gt(0)").remove(),l.append(n)},existOptionInSelectControl:function(e,t){for(var o=$o.getOptionsFromSelectControl(e),l=0;l<o.length;l++)if(o[l].value===t.toString())return!0;return!1},fixHeaderCSS:function(e){var t=e.$tableHeader;t.css("height","77px")},getCurrentHeader:function(e){var t=e.$header,o=e.options,l=e.$tableHeader,n=t;return o.height&&(n=l),n},getCurrentSearchControls:function(e){var t=e.options,o="select, input";return t.height&&(o="table select, table input"),o},getCursorPosition:function(t){if(Fo.isIEBrowser()){if(e(t).is("input[type=text]")){var o=0;if("selectionStart"in t)o=t.selectionStart;else if("selection"in document){t.focus();var l=document.selection.createRange(),n=document.selection.createRange().text.length;l.moveStart("character",-t.value.length),o=l.text.length-n}return o}return-1}return-1},setCursorPosition:function(t){e(t).val(t.value)},copyValues:function(t){var o=$o.getCurrentHeader(t),l=$o.getCurrentSearchControls(t);t.options.valuesFilterControl=[],o.find(l).each(function(){t.options.valuesFilterControl.push({field:e(this).closest("[data-field]").data("field"),value:e(this).val(),position:$o.getCursorPosition(e(this).get(0)),hasFocus:e(this).is(":focus")})})},setValues:function(t){var o=null,l=[],n=$o.getCurrentHeader(t),r=$o.getCurrentSearchControls(t);if(0<t.options.valuesFilterControl.length){var a=null;n.find(r).each(function(){o=e(this).closest("[data-field]").data("field"),l=t.options.valuesFilterControl.filter(function(e){return e.field===o}),0<l.length&&(e(this).val(l[0].value),l[0].hasFocus&&(a=function(e,t){return function(){e.focus(),$o.setCursorPosition(e,t)}}(e(this).get(0),l[0].position)))}),null!==a&&a()}},collectBootstrapCookies:function(){var t=[],o=document.cookie.match(/(?:bs.table.)(\w*)/g);if(o)return e.each(o,function(o,l){var n=l;/./.test(n)&&(n=n.split(".").pop()),-1===e.inArray(n,t)&&t.push(n)}),t},escapeID:function(e){return(e+"").replace(/(:|\.|\[|\]|,)/g,"\\$1")},isColumnSearchableViaSelect:function(e){var t=e.filterControl,o=e.searchable;return t&&"select"===t.toLowerCase()&&o},isFilterDataNotGiven:function(e){var t=e.filterData;return t===void 0||"column"===t.toLowerCase()},hasSelectControlElement:function(e){return e&&0<e.length},initFilterSelectControls:function(t){var l=t.data,n=t.pageTo<t.options.data.length?t.options.data.length:t.pageTo,r=t.options.pagination?"server"===t.options.sidePagination?t.pageTo:t.options.totalRows:t.pageTo;e.each(t.header.fields,function(n,a){var s=t.columns[t.fieldsColumnsIndex[a]],c=e(".bootstrap-table-filter-control-".concat($o.escapeID(s.field)));if($o.isColumnSearchableViaSelect(s)&&$o.isFilterDataNotGiven(s)&&$o.hasSelectControlElement(c)){0===c.get(c.length-1).options.length&&$o.addOptionToSelectControl(c,"",s.filterControlPlaceholder,s.filterDefault);for(var d={},u=0;u<r;u++){var p=l[u][a],f=Fo.calculateObjectValue(t.header,t.header.formatters[n],[p,l[u],u],p);if(s.filterDataCollector&&(f=Fo.calculateObjectValue(t.header,s.filterDataCollector,[p,l[u],f],f)),"object"===o(f)&&null!==f){f.forEach(function(e){$o.addOptionToSelectControl(c,e,e,s.filterDefault)});continue}$o.addOptionToSelectControl(c,f,f,s.filterDefault)}$o.sortSelectControl(c,s.filterOrderBy),t.options.hideUnusedSelectOptions&&$o.hideUnusedSelectOptions(c,d)}}),t.trigger("created-controls")},getFilterDataMethod:function(e,t){for(var o=Object.keys(e),l=0;l<o.length;l++)if(o[l]===t)return e[t];return null},createControls:function(t,o){var l,n,r=!1;e.each(t.columns,function(a,s){if(l="hidden",n=[],!!s.visible){if(!s.filterControl)n.push("<div class=\"no-filter-control\"></div>");else{n.push("<div class=\"filter-control\">");var c=s.filterControl.toLowerCase();s.searchable&&t.options.filterTemplate[c]&&(r=!0,l="visible",n.push(t.options.filterTemplate[c](t,s.field,l,s.filterControlPlaceholder?s.filterControlPlaceholder:"",s.filterDefault)),""!==s.filterDefault&&"undefined"!=typeof s.filterDefault&&(e.isEmptyObject(t.filterColumnsPartial)&&(t.filterColumnsPartial={}),t.filterColumnsPartial[s.field]=s.filterDefault))}if(e.each(o.children().children(),function(t,o){var l=e(o);if(l.data("field")===s.field)return l.find(".fht-cell").append(n.join("")),!1}),void 0!==s.filterData&&"column"!==s.filterData.toLowerCase()){var d,u,p=$o.getFilterDataMethod(Ro,s.filterData.substring(0,s.filterData.indexOf(":")));if(null!==p)d=s.filterData.substring(s.filterData.indexOf(":")+1,s.filterData.length),u=e(".bootstrap-table-filter-control-".concat($o.escapeID(s.field))),$o.addOptionToSelectControl(u,"",s.filterControlPlaceholder,s.filterDefault),p(d,u,s.filterDefault);else throw new SyntaxError("Error. You should use any of these allowed filter data methods: var, json, url. Use like this: var: {key: \"value\"}");var f,h;switch(p){case"url":e.ajax({url:d,dataType:"json",success:function(e){for(var t in e)$o.addOptionToSelectControl(u,t,e[t],s.filterDefault);$o.sortSelectControl(u,s.filterOrderBy)}});break;case"var":for(h in f=window[d],f)$o.addOptionToSelectControl(u,h,f[h],s.filterDefault);$o.sortSelectControl(u,s.filterOrderBy);break;case"jso":for(h in f=JSON.parse(d),f)$o.addOptionToSelectControl(u,h,f[h],s.filterDefault);$o.sortSelectControl(u,s.filterOrderBy);}}}}),r?(o.off("keyup","input").on("keyup","input",function(o,l){if((o.keyCode=l?l.keyCode:o.keyCode,!(t.options.searchOnEnterKey&&13!==o.keyCode))&&!(-1<e.inArray(o.keyCode,[37,38,39,40]))){var n=e(o.currentTarget);n.is(":checkbox")||n.is(":radio")||(clearTimeout(o.currentTarget.timeoutId||0),o.currentTarget.timeoutId=setTimeout(function(){t.onColumnSearch(o)},t.options.searchTimeOut))}}),o.off("change","select").on("change","select",function(o){t.options.searchOnEnterKey&&13!==o.keyCode||-1<e.inArray(o.keyCode,[37,38,39,40])||(clearTimeout(o.currentTarget.timeoutId||0),o.currentTarget.timeoutId=setTimeout(function(){t.onColumnSearch(o)},t.options.searchTimeOut))}),o.off("mouseup","input").on("mouseup","input",function(o){var l=e(this),n=l.val();""===n||setTimeout(function(){var e=l.val();""===e&&(clearTimeout(o.currentTarget.timeoutId||0),o.currentTarget.timeoutId=setTimeout(function(){t.onColumnSearch(o)},t.options.searchTimeOut))},1)}),0<o.find(".date-filter-control").length&&e.each(t.columns,function(e,l){var n=l.filterControl,r=l.field,a=l.filterDatepickerOptions;n!==void 0&&"datepicker"===n.toLowerCase()&&o.find(".date-filter-control.bootstrap-table-filter-control-".concat(r)).datepicker(a).on("changeDate",function(e){clearTimeout(e.currentTarget.timeoutId||0),e.currentTarget.timeoutId=setTimeout(function(){t.onColumnSearch(e)},t.options.searchTimeOut)})}),"server"!==t.options.sidePagination&&o.find("[class*='bootstrap-table-filter-control']").each(function(t,o){e(o).trigger("change")})):o.find(".filterControl").hide()},getDirectionOfSelectOptions:function(e){var t=e===void 0?"left":e.toLowerCase();return"left"===t?"ltr":"right"===t?"rtl":"auto"===t?"auto":"ltr"}},Ro={var:function(e,t,o,l){var n=window[e];for(var r in n)$o.addOptionToSelectControl(t,r,n[r],l);$o.sortSelectControl(t,o)},url:function(t,o,l,n){e.ajax({url:t,dataType:"json",success:function(e){for(var t in e)$o.addOptionToSelectControl(o,t,e[t],n);$o.sortSelectControl(o,l)}})},json:function(e,t,o,l){var n=JSON.parse(e);for(var r in n)$o.addOptionToSelectControl(t,r,n[r],l);$o.sortSelectControl(t,o)}};e.extend(e.fn.bootstrapTable.defaults,{filterControl:!1,onColumnSearch:function(){return!1},onCreatedControls:function(){return!0},alignmentSelectControlOptions:void 0,filterTemplate:{input:function(e,t,o,l,n){return Fo.sprintf("<input type=\"text\" class=\"form-control bootstrap-table-filter-control-%s\" style=\"width: 100%; visibility: %s\" placeholder=\"%s\" value=\"%s\">",t,o,"undefined"==typeof l?"":l,"undefined"==typeof n?"":n)},select:function(e,t,o){var l=e.options;return Fo.sprintf("<select class=\"form-control bootstrap-table-filter-control-%s\" style=\"width: 100%; visibility: %s\" dir=\"%s\"></select>",t,o,$o.getDirectionOfSelectOptions(l.alignmentSelectControlOptions))},datepicker:function(e,t,o,l){return Fo.sprintf("<input type=\"text\" class=\"form-control date-filter-control bootstrap-table-filter-control-%s\" style=\"width: 100%; visibility: %s\" value=\"%s\">",t,o,"undefined"==typeof l?"":l)}},disableControlWhenSearch:!1,searchOnEnterKey:!1,valuesFilterControl:[]}),e.extend(e.fn.bootstrapTable.columnDefaults,{filterControl:void 0,filterDataCollector:void 0,filterData:void 0,filterDatepickerOptions:void 0,filterStrictSearch:!1,filterStartsWithSearch:!1,filterControlPlaceholder:"",filterDefault:"",filterOrderBy:"asc"}),e.extend(e.fn.bootstrapTable.Constructor.EVENTS,{"column-search.bs.table":"onColumnSearch","created-controls.bs.table":"onCreatedControls"}),e.extend(e.fn.bootstrapTable.defaults.icons,{clear:{bootstrap3:"glyphicon-trash icon-clear"}[e.fn.bootstrapTable.theme]||"fa-trash"}),e.extend(e.fn.bootstrapTable.defaults,e.fn.bootstrapTable.locales),e.extend(e.fn.bootstrapTable.defaults,{formatClearSearch:function(){return"Clear filters"}}),e.fn.bootstrapTable.methods.push("triggerSearch"),e.fn.bootstrapTable.methods.push("clearFilterControl"),e.BootstrapTable=function(t){function o(){return l(this,o),d(this,i(o).apply(this,arguments))}return a(o,t),r(o,[{key:"init",value:function(){var e=this;if(this.options.filterControl){var t=this;this.options.valuesFilterControl=[],this.$el.on("reset-view.bs.table",function(){!t.options.height||0<t.$tableHeader.find("select").length||0<t.$tableHeader.find("input").length||$o.createControls(t,t.$tableHeader)}).on("post-header.bs.table",function(){$o.setValues(t)}).on("post-body.bs.table",function(){t.options.height&&$o.fixHeaderCSS(t),e.$tableLoading.css("top",e.$header.outerHeight()+1)}).on("column-switch.bs.table",function(){$o.setValues(t)}).on("load-success.bs.table",function(){t.EnableControls(!0)}).on("load-error.bs.table",function(){t.EnableControls(!0)})}p(i(o.prototype),"init",this).call(this)}},{key:"initHeader",value:function(){p(i(o.prototype),"initHeader",this).call(this),this.options.filterControl&&$o.createControls(this,this.$header)}},{key:"initBody",value:function(){p(i(o.prototype),"initBody",this).call(this),$o.initFilterSelectControls(this)}},{key:"initSearch",value:function(){var t=this,l=e.isEmptyObject(t.filterColumnsPartial)?null:t.filterColumnsPartial;(null===l||1>=Object.keys(l).length)&&p(i(o.prototype),"initSearch",this).call(this),"server"===this.options.sidePagination||null===l||(t.data=l?t.options.data.filter(function(o,n){var r=[];return Object.keys(o).forEach(function(a,i){var s=t.header.fields[i],c=t.columns[t.fieldsColumnsIndex[s]],d=(l[s]||"").toLowerCase(),u=Fo.getItemField(o,s,!1);""===d?r.push(!0):(c&&c.searchFormatter&&(u=e.fn.bootstrapTable.utils.calculateObjectValue(t.header,t.header.formatters[e.inArray(s,t.header.fields)],[u,o,n],u)),-1!==e.inArray(s,t.header.fields)&&(void 0===u||null===u?r.push(!1):("string"==typeof u||"number"==typeof u||"boolean"==typeof u)&&(c.filterStrictSearch?r.push(u.toString().toLowerCase()===d.toString().toLowerCase()):c.filterStartsWithSearch?r.push(0==="".concat(u).toLowerCase().indexOf(d)):r.push("".concat(u).toLowerCase().includes(d)))))}),!r.includes(!1)}):t.data)}},{key:"initColumnSearch",value:function(e){if($o.copyValues(this),e)for(var t in this.filterColumnsPartial=e,this.updatePagination(),e)this.trigger("column-search",t,e[t])}},{key:"onColumnSearch",value:function(t){if(!(-1<e.inArray(t.keyCode,[37,38,39,40]))){$o.copyValues(this);var o=e.trim(e(t.currentTarget).val()),l=e(t.currentTarget).closest("[data-field]").data("field");e.isEmptyObject(this.filterColumnsPartial)&&(this.filterColumnsPartial={}),o?this.filterColumnsPartial[l]=o:delete this.filterColumnsPartial[l],this.options.pageNumber=1,this.EnableControls(!1),this.onSearch(t,!1),this.trigger("column-search",l,o)}}},{key:"initToolbar",value:function(){this.showSearchClearButton=this.options.filterControl&&this.options.showSearchClearButton,p(i(o.prototype),"initToolbar",this).call(this)}},{key:"resetSearch",value:function(){this.options.filterControl&&this.options.showSearchClearButton&&this.clearFilterControl(),p(i(o.prototype),"resetSearch",this).call(this)}},{key:"clearFilterControl",value:function(){if(this.options.filterControl){var t=this,o=$o.collectBootstrapCookies(),l=$o.getCurrentHeader(t),n=l.closest("table"),r=l.find($o.getCurrentSearchControls(t)),a=t.$toolbar.find(".search input"),s=!1,c=0;if(e.each(t.options.valuesFilterControl,function(e,t){s=!!s||""!==t.value,t.value=""}),e.each(t.options.filterControls,function(e,t){t.text=""}),$o.setValues(t),clearTimeout(c),c=setTimeout(function(){o&&0<o.length&&e.each(o,function(e,o){void 0!==t.deleteCookie&&t.deleteCookie(o)})},t.options.searchTimeOut),!s)return;if(0<r.length)this.filterColumnsPartial={},e(r[0]).trigger("INPUT"===r[0].tagName?"keyup":"change",{keyCode:13});else return;if(0<a.length&&t.resetSearch(),t.options.sortName!==n.data("sortName")||t.options.sortOrder!==n.data("sortOrder")){var d=l.find(Fo.sprintf("[data-field=\"%s\"]",e(r[0]).closest("table").data("sortName")));0<d.length&&(t.onSort({type:"keypress",currentTarget:d}),e(d).find(".sortable").trigger("click"))}}}},{key:"triggerSearch",value:function(){var t=$o.getCurrentHeader(this),o=$o.getCurrentSearchControls(this);t.find(o).each(function(){var t=e(this);t.is("select")?t.change():t.keyup()})}},{key:"EnableControls",value:function(e){if(this.options.disableControlWhenSearch&&"server"===this.options.sidePagination){var t=$o.getCurrentHeader(this),o=$o.getCurrentSearchControls(this);e?t.find(o).removeProp("disabled"):t.find(o).prop("disabled","disabled")}}}]),o}(e.BootstrapTable)});
