(function(a){setTimeout(function(){window.___browserSync___===void 0&&Number(localStorage.getItem("AdminLTE:Demo:MessageShowed"))<Date.now()&&localStorage.setItem("AdminLTE:Demo:MessageShowed",Date.now()+15*60*1e3)},1e3);function S(s){return s.charAt(0).toUpperCase()+s.slice(1)}function c(s,i,n){var d=a("<select />",{class:n?"custom-select mb-3 border-0":"custom-select mb-3 text-light border-0 "+s[0].replace(/accent-|navbar-/,"bg-")});if(n){var ga=a("<option />",{text:"None Selected"});d.append(ga)}return s.forEach(function(r){var xa=a("<option />",{class:(typeof r=="object"?r.join(" "):r).replace("navbar-","bg-").replace("accent-","bg-"),text:S((typeof r=="object"?r.join(" "):r).replace(/navbar-|accent-|bg-/,"").replace("-"," "))});d.append(xa)}),i&&d.on("change",i),d}var E=a(".control-sidebar"),e=a("<div />",{class:"p-3 control-sidebar-content"});E.append(e),e.append('<h5>Customize AdminLTE</h5><hr class="mb-2"/>');var L=a("<input />",{type:"checkbox",value:1,checked:a("body").hasClass("dark-mode"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a("body").addClass("dark-mode"):a("body").removeClass("dark-mode")}),O=a("<div />",{class:"mb-4"}).append(L).append("<span>Dark Mode</span>");e.append(O),e.append("<h6>Header Options</h6>");var D=a("<input />",{type:"checkbox",value:1,checked:a("body").hasClass("layout-navbar-fixed"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a("body").addClass("layout-navbar-fixed"):a("body").removeClass("layout-navbar-fixed")}),F=a("<div />",{class:"mb-1"}).append(D).append("<span>Fixed</span>");e.append(F);var N=a("<input />",{type:"checkbox",value:1,checked:a(".main-header").hasClass("dropdown-legacy"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a(".main-header").addClass("dropdown-legacy"):a(".main-header").removeClass("dropdown-legacy")}),M=a("<div />",{class:"mb-1"}).append(N).append("<span>Dropdown Legacy Offset</span>");e.append(M);var z=a("<input />",{type:"checkbox",value:1,checked:a(".main-header").hasClass("border-bottom-0"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a(".main-header").addClass("border-bottom-0"):a(".main-header").removeClass("border-bottom-0")}),A=a("<div />",{class:"mb-4"}).append(z).append("<span>No border</span>");e.append(A),e.append("<h6>Sidebar Options</h6>");var u=a("<input />",{type:"checkbox",value:1,checked:a("body").hasClass("sidebar-collapse"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?(a("body").addClass("sidebar-collapse"),a(window).trigger("resize")):(a("body").removeClass("sidebar-collapse"),a(window).trigger("resize"))}),j=a("<div />",{class:"mb-1"}).append(u).append("<span>Collapsed</span>");e.append(j),a(document).on("collapsed.lte.pushmenu",'[data-widget="pushmenu"]',function(){u.prop("checked",!0)}),a(document).on("shown.lte.pushmenu",'[data-widget="pushmenu"]',function(){u.prop("checked",!1)});var T=a("<input />",{type:"checkbox",value:1,checked:a("body").hasClass("layout-fixed"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?(a("body").addClass("layout-fixed"),a(window).trigger("resize")):(a("body").removeClass("layout-fixed"),a(window).trigger("resize"))}),V=a("<div />",{class:"mb-1"}).append(T).append("<span>Fixed</span>");e.append(V);var B=a("<input />",{type:"checkbox",value:1,checked:a("body").hasClass("sidebar-mini"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a("body").addClass("sidebar-mini"):a("body").removeClass("sidebar-mini")}),H=a("<div />",{class:"mb-1"}).append(B).append("<span>Sidebar Mini</span>");e.append(H);var I=a("<input />",{type:"checkbox",value:1,checked:a("body").hasClass("sidebar-mini-md"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a("body").addClass("sidebar-mini-md"):a("body").removeClass("sidebar-mini-md")}),Q=a("<div />",{class:"mb-1"}).append(I).append("<span>Sidebar Mini MD</span>");e.append(Q);var U=a("<input />",{type:"checkbox",value:1,checked:a("body").hasClass("sidebar-mini-xs"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a("body").addClass("sidebar-mini-xs"):a("body").removeClass("sidebar-mini-xs")}),X=a("<div />",{class:"mb-1"}).append(U).append("<span>Sidebar Mini XS</span>");e.append(X);var q=a("<input />",{type:"checkbox",value:1,checked:a(".nav-sidebar").hasClass("nav-flat"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a(".nav-sidebar").addClass("nav-flat"):a(".nav-sidebar").removeClass("nav-flat")}),G=a("<div />",{class:"mb-1"}).append(q).append("<span>Nav Flat Style</span>");e.append(G);var J=a("<input />",{type:"checkbox",value:1,checked:a(".nav-sidebar").hasClass("nav-legacy"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a(".nav-sidebar").addClass("nav-legacy"):a(".nav-sidebar").removeClass("nav-legacy")}),K=a("<div />",{class:"mb-1"}).append(J).append("<span>Nav Legacy Style</span>");e.append(K);var P=a("<input />",{type:"checkbox",value:1,checked:a(".nav-sidebar").hasClass("nav-compact"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a(".nav-sidebar").addClass("nav-compact"):a(".nav-sidebar").removeClass("nav-compact")}),R=a("<div />",{class:"mb-1"}).append(P).append("<span>Nav Compact</span>");e.append(R);var W=a("<input />",{type:"checkbox",value:1,checked:a(".nav-sidebar").hasClass("nav-child-indent"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a(".nav-sidebar").addClass("nav-child-indent"):a(".nav-sidebar").removeClass("nav-child-indent")}),Y=a("<div />",{class:"mb-1"}).append(W).append("<span>Nav Child Indent</span>");e.append(Y);var Z=a("<input />",{type:"checkbox",value:1,checked:a(".nav-sidebar").hasClass("nav-collapse-hide-child"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a(".nav-sidebar").addClass("nav-collapse-hide-child"):a(".nav-sidebar").removeClass("nav-collapse-hide-child")}),$=a("<div />",{class:"mb-1"}).append(Z).append("<span>Nav Child Hide on Collapse</span>");e.append($);var aa=a("<input />",{type:"checkbox",value:1,checked:a(".main-sidebar").hasClass("sidebar-no-expand"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a(".main-sidebar").addClass("sidebar-no-expand"):a(".main-sidebar").removeClass("sidebar-no-expand")}),ea=a("<div />",{class:"mb-4"}).append(aa).append("<span>Disable Hover/Focus Auto-Expand</span>");e.append(ea),e.append("<h6>Footer Options</h6>");var sa=a("<input />",{type:"checkbox",value:1,checked:a("body").hasClass("layout-footer-fixed"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a("body").addClass("layout-footer-fixed"):a("body").removeClass("layout-footer-fixed")}),ia=a("<div />",{class:"mb-4"}).append(sa).append("<span>Fixed</span>");e.append(ia),e.append("<h6>Small Text Options</h6>");var na=a("<input />",{type:"checkbox",value:1,checked:a("body").hasClass("text-sm"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a("body").addClass("text-sm"):a("body").removeClass("text-sm")}),da=a("<div />",{class:"mb-1"}).append(na).append("<span>Body</span>");e.append(da);var ra=a("<input />",{type:"checkbox",value:1,checked:a(".main-header").hasClass("text-sm"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a(".main-header").addClass("text-sm"):a(".main-header").removeClass("text-sm")}),ca=a("<div />",{class:"mb-1"}).append(ra).append("<span>Navbar</span>");e.append(ca);var ta=a("<input />",{type:"checkbox",value:1,checked:a(".brand-link").hasClass("text-sm"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a(".brand-link").addClass("text-sm"):a(".brand-link").removeClass("text-sm")}),la=a("<div />",{class:"mb-1"}).append(ta).append("<span>Brand</span>");e.append(la);var oa=a("<input />",{type:"checkbox",value:1,checked:a(".nav-sidebar").hasClass("text-sm"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a(".nav-sidebar").addClass("text-sm"):a(".nav-sidebar").removeClass("text-sm")}),pa=a("<div />",{class:"mb-1"}).append(oa).append("<span>Sidebar Nav</span>");e.append(pa);var ba=a("<input />",{type:"checkbox",value:1,checked:a(".main-footer").hasClass("text-sm"),class:"mr-1"}).on("click",function(){a(this).is(":checked")?a(".main-footer").addClass("text-sm"):a(".main-footer").removeClass("text-sm")}),va=a("<div />",{class:"mb-4"}).append(ba).append("<span>Footer</span>");e.append(va);var x=["navbar-primary","navbar-secondary","navbar-info","navbar-success","navbar-danger","navbar-indigo","navbar-purple","navbar-pink","navbar-navy","navbar-lightblue","navbar-teal","navbar-cyan","navbar-dark","navbar-gray-dark","navbar-gray"],ha=["navbar-light","navbar-warning","navbar-white","navbar-orange"],b=["bg-primary","bg-warning","bg-info","bg-danger","bg-success","bg-indigo","bg-lightblue","bg-navy","bg-purple","bg-fuchsia","bg-pink","bg-maroon","bg-orange","bg-lime","bg-teal","bg-olive"],k=["accent-primary","accent-warning","accent-info","accent-danger","accent-success","accent-indigo","accent-lightblue","accent-navy","accent-purple","accent-fuchsia","accent-pink","accent-maroon","accent-orange","accent-lime","accent-teal","accent-olive"],C=["sidebar-dark-primary","sidebar-dark-warning","sidebar-dark-info","sidebar-dark-danger","sidebar-dark-success","sidebar-dark-indigo","sidebar-dark-lightblue","sidebar-dark-navy","sidebar-dark-purple","sidebar-dark-fuchsia","sidebar-dark-pink","sidebar-dark-maroon","sidebar-dark-orange","sidebar-dark-lime","sidebar-dark-teal","sidebar-dark-olive","sidebar-light-primary","sidebar-light-warning","sidebar-light-info","sidebar-light-danger","sidebar-light-success","sidebar-light-indigo","sidebar-light-lightblue","sidebar-light-navy","sidebar-light-purple","sidebar-light-fuchsia","sidebar-light-pink","sidebar-light-maroon","sidebar-light-orange","sidebar-light-lime","sidebar-light-teal","sidebar-light-olive"];e.append("<h6>Navbar Variants</h6>");var y=a("<div />",{class:"d-flex"}),v=x.concat(ha),_=c(v,function(){var s=a(this).find("option:selected").attr("class"),i=a(".main-header");i.removeClass("navbar-dark").removeClass("navbar-light"),v.forEach(function(n){i.removeClass(n)}),a(this).removeClass().addClass("custom-select mb-3 text-light border-0 "),x.indexOf(s)>-1?(i.addClass("navbar-dark"),a(this).addClass(s).addClass("text-light")):(i.addClass("navbar-light"),a(this).addClass(s)),i.addClass(s)}),h=null;a(".main-header")[0].classList.forEach(function(s){v.indexOf(s)>-1&&h===null&&(h=s.replace("navbar-","bg-"))}),_.find("option."+h).prop("selected",!0),_.removeClass().addClass("custom-select mb-3 text-light border-0 ").addClass(h),y.append(_),e.append(y),e.append("<h6>Accent Color Variants</h6>");var ma=a("<div />",{class:"d-flex"});e.append(ma),e.append(c(k,function(){var s=a(this).find("option:selected").attr("class"),i=a("body");k.forEach(function(d){i.removeClass(d)});var n=s.replace("bg-","accent-");i.addClass(n)},!0));var w=null;a("body")[0].classList.forEach(function(s){k.indexOf(s)>-1&&w===null&&(w=s.replace("navbar-","bg-"))}),e.append("<h6>Dark Sidebar Variants</h6>");var fa=a("<div />",{class:"d-flex"});e.append(fa);var t=c(b,function(){var s=a(this).find("option:selected").attr("class"),i="sidebar-dark-"+s.replace("bg-",""),n=a(".main-sidebar");C.forEach(function(d){n.removeClass(d),l.removeClass(d.replace("sidebar-dark-","bg-")).removeClass("text-light")}),a(this).removeClass().addClass("custom-select mb-3 text-light border-0").addClass(s),l.find("option").prop("selected",!1),n.addClass(i),a(".sidebar").removeClass("os-theme-dark").addClass("os-theme-light")},!0);e.append(t);var m=null;a(".main-sidebar")[0].classList.forEach(function(s){var i=s.replace("sidebar-dark-","bg-");b.indexOf(i)>-1&&m===null&&(m=i)}),t.find("option."+m).prop("selected",!0),t.removeClass().addClass("custom-select mb-3 text-light border-0 ").addClass(m),e.append("<h6>Light Sidebar Variants</h6>");var ua=a("<div />",{class:"d-flex"});e.append(ua);var l=c(b,function(){var s=a(this).find("option:selected").attr("class"),i="sidebar-light-"+s.replace("bg-",""),n=a(".main-sidebar");C.forEach(function(d){n.removeClass(d),t.removeClass(d.replace("sidebar-light-","bg-")).removeClass("text-light")}),a(this).removeClass().addClass("custom-select mb-3 text-light border-0").addClass(s),t.find("option").prop("selected",!1),n.addClass(i),a(".sidebar").removeClass("os-theme-light").addClass("os-theme-dark")},!0);e.append(l);var o=null;a(".main-sidebar")[0].classList.forEach(function(s){var i=s.replace("sidebar-light-","bg-");b.indexOf(i)>-1&&o===null&&(o=i)}),o!==null&&(l.find("option."+o).prop("selected",!0),l.removeClass().addClass("custom-select mb-3 text-light border-0 ").addClass(o));var f=v;e.append("<h6>Brand Logo Variants</h6>");var ka=a("<div />",{class:"d-flex"});e.append(ka);var _a=a("<a />",{href:"#"}).text("clear").on("click",function(s){s.preventDefault();var i=a(".brand-link");f.forEach(function(n){i.removeClass(n)})}),g=c(f,function(){var s=a(this).find("option:selected").attr("class"),i=a(".brand-link");s==="navbar-light"||s==="navbar-white"?i.addClass("text-black"):i.removeClass("text-black"),f.forEach(function(n){i.removeClass(n)}),s?a(this).removeClass().addClass("custom-select mb-3 border-0").addClass(s).addClass(s!=="navbar-light"&&s!=="navbar-white"?"text-light":""):a(this).removeClass().addClass("custom-select mb-3 border-0"),i.addClass(s)},!0).append(_a);e.append(g);var p=null;a(".brand-link")[0].classList.forEach(function(s){f.indexOf(s)>-1&&p===null&&(p=s.replace("navbar-","bg-"))}),p&&(g.find("option."+p).prop("selected",!0),g.removeClass().addClass("custom-select mb-3 text-light border-0 ").addClass(p))})(jQuery);
