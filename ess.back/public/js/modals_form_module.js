!function(e){var t={};function r(n){if(t[n])return t[n].exports;var o=t[n]={i:n,l:!1,exports:{}};return e[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=e,r.c=t,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)r.d(n,o,function(t){return e[t]}.bind(null,o));return n},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="/",r(r.s=53)}({53:function(e,t,r){e.exports=r(54)},54:function(e,t){function r(e,t){var r;if("undefined"==typeof Symbol||null==e[Symbol.iterator]){if(Array.isArray(e)||(r=function(e,t){if(!e)return;if("string"==typeof e)return n(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);"Object"===r&&e.constructor&&(r=e.constructor.name);if("Map"===r||"Set"===r)return Array.from(e);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return n(e,t)}(e))||t&&e&&"number"==typeof e.length){r&&(e=r);var o=0,a=function(){};return{s:a,n:function(){return o>=e.length?{done:!0}:{done:!1,value:e[o++]}},e:function(e){throw e},f:a}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var l,i=!0,u=!1;return{s:function(){r=e[Symbol.iterator]()},n:function(){var e=r.next();return i=e.done,e},e:function(e){u=!0,l=e},f:function(){try{i||null==r.return||r.return()}finally{if(u)throw l}}}}function n(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}glob.ModalsFormModule=function(){var e=glob.helpers.findItemBy,t=glob.axios,n=[{id:1,label:"Вопрос"},{id:2,label:"Запрос"},{id:3,label:"Партнерство"},{id:4,label:"Расчет частному лицу"},{id:5,label:"Расчет предприятию"},{id:6,label:"Кредитирование"},{id:7,label:"Страхование"},{id:8,label:"Sunport расчет"}];function o(e){var t,n=e.form,o=e.formType,a=e.slidersDataBlock,l={type:o},i="",u=r(n);try{for(u.s();!(t=u.n()).done;){var c=t.value;if(!c.hasAttribute("not-send"))if(c.classList.contains("for_message_field")){if(c.value||"boolean"==typeof c.value){var f=c.dataset.labelName,s=c.value;i+="".concat(f,"-").concat(s,";")}}else(c.value||"boolean"==typeof c.value)&&(l[c.name]=c.value)}}catch(e){u.e(e)}finally{u.f()}if(a){var d,y=r(a.querySelectorAll(".sliders-data .slider-data-item"));try{for(y.s();!(d=y.n()).done;){var m=d.value,v=m.querySelector(".label-name").textContent,b=m.querySelector(".mark-active").textContent;i+="".concat(v,"-").concat(b,";")}}catch(e){y.e(e)}finally{y.f()}}return i&&(l.message?l.message+=";"+i:l.message=";"+i),l}return{initForm:function(a){var l,i=a.formElement,u=a.form_type,c=a.slidersDataBlock,f=a.btn,s=i instanceof jQuery?i[0]:i,d=u||s.dataset.formType,y=e("id",d,n),m=(y&&y.label,f?f.parentElement.querySelector(".spinner"):s.querySelector(".spinner")),v=r(s);try{for(v.s();!(l=v.n()).done;){var b=l.value;b.oninvalid=function(e){var t=e.target,r=t.dataset.errorText;t.setCustomValidity(""),t.validity.valid||t.setCustomValidity(r||"обязательное поле")},b.oninput=function(e){var t=e.target;t.setCustomValidity("");var r=t.dataset.replaceRequiredFor;if(r){var n=s.querySelectorAll('[name="'.concat(r,'"]'))[0];t.validity.valid?n.removeAttribute("required"):n.setAttribute("required","")}}}}catch(e){v.e(e)}finally{v.f()}s.onsubmit=function(e){e.preventDefault(),m&&m.classList.add("loading");var r={method:"POST",url:"/callbacks",data:o({form:s,formType:d,slidersDataBlock:c})},n=window.location.origin,a=window.location.pathname.split("/")[1],l=n+"/"+(a="ru"===a?a+="/":a="")+"statistic";t(r).then((function(e){e.status&&200==e.status&&($(".modal-block").fadeOut(),window.location.href=l),m&&m.classList.remove("loading")})).catch((function(e){console.warn(e),m&&m.classList.remove("loading")}))}}}}()}});