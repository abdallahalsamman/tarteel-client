var de=(f,F)=>()=>(F||f((F={exports:{}}).exports,F),F.exports);var ie=de((oe,re)=>{/*!
 * HTML5 export buttons for Buttons and DataTables.
 * 2016 SpryMedia Ltd - datatables.net/license
 *
 * FileSaver.js (1.3.3) - MIT license
 * Copyright © 2016 Eli Grey - http://eligrey.com
 */(function(f){typeof define=="function"&&define.amd?define(["jquery","datatables.net","datatables.net-buttons"],function(F){return f(F,window,document)}):typeof oe=="object"?re.exports=function(F,v,U,P){return F||(F=window),(!v||!v.fn.dataTable)&&(v=require("datatables.net")(F,v).$),v.fn.dataTable.Buttons||require("datatables.net-buttons")(F,v),f(v,F,F.document,U,P)}:f(jQuery,window,document)})(function(f,F,v,U,P,k){var _=f.fn.dataTable;function W(){return U||F.JSZip}function q(){return P||F.pdfMake}_.Buttons.pdfMake=function(e){if(!e)return q();P=e},_.Buttons.jszip=function(e){if(!e)return W();U=e};var M=function(e){if(!(typeof e>"u"||typeof navigator<"u"&&/MSIE [1-9]\./.test(navigator.userAgent))){var l=e.document,d=function(){return e.URL||e.webkitURL||e},t=l.createElementNS("http://www.w3.org/1999/xhtml","a"),p="download"in t,n=function(a){var x=new MouseEvent("click");a.dispatchEvent(x)},o=/constructor/i.test(e.HTMLElement)||e.safari,I=/CriOS\/[\d]+/.test(navigator.userAgent),i=function(a){(e.setImmediate||e.setTimeout)(function(){throw a},0)},r="application/octet-stream",h=1e3*40,m=function(a){var x=function(){typeof a=="string"?d().revokeObjectURL(a):a.remove()};setTimeout(x,h)},s=function(a,x,N){x=[].concat(x);for(var b=x.length;b--;){var w=a["on"+x[b]];if(typeof w=="function")try{w.call(a,N||a)}catch(z){i(z)}}},S=function(a){return/^\s*(?:text\/\S*|application\/xml|\S*\/\S*\+xml)\s*;.*charset\s*=\s*utf-8/i.test(a.type)?new Blob(["\uFEFF",a],{type:a.type}):a},g=function(a,x,N){N||(a=S(a));var b=this,w=a.type,z=w===r,C,R=function(){s(b,"writestart progress write writeend".split(" "))},A=function(){if((I||z&&o)&&e.FileReader){var D=new FileReader;D.onloadend=function(){var y=I?D.result:D.result.replace(/^data:[^;]*;/,"data:attachment/file;"),O=e.open(y,"_blank");O||(e.location.href=y),y=k,b.readyState=b.DONE,R()},D.readAsDataURL(a),b.readyState=b.INIT;return}if(C||(C=d().createObjectURL(a)),z)e.location.href=C;else{var u=e.open(C,"_blank");u||(e.location.href=C)}b.readyState=b.DONE,R(),m(C)};if(b.readyState=b.INIT,p){C=d().createObjectURL(a),setTimeout(function(){t.href=C,t.download=x,n(t),R(),m(C),b.readyState=b.DONE});return}A()},c=g.prototype,T=function(a,x,N){return new g(a,x||a.name||"download",N)};return typeof navigator<"u"&&navigator.msSaveOrOpenBlob?function(a,x,N){return x=x||a.name||"download",N||(a=S(a)),navigator.msSaveOrOpenBlob(a,x)}:(c.abort=function(){},c.readyState=c.INIT=0,c.WRITING=1,c.DONE=2,c.error=c.onwritestart=c.onprogress=c.onwrite=c.onabort=c.onerror=c.onwriteend=null,T)}}(typeof self<"u"&&self||typeof F<"u"&&F||this.content);_.fileSave=M;var J=function(e){var l="Sheet1";return e.sheetName&&(l=e.sheetName.replace(/[\[\]\*\/\\\?\:]/g,"")),l},Q=function(e){return e.newline?e.newline:navigator.userAgent.match(/Windows/)?`\r
`:`
`},Y=function(e,l){for(var d=Q(l),t=e.buttons.exportData(l.exportOptions),p=l.fieldBoundary,n=l.fieldSeparator,o=new RegExp(p,"g"),I=l.escapeChar!==k?l.escapeChar:"\\",i=function(g){for(var c="",T=0,a=g.length;T<a;T++)T>0&&(c+=n),c+=p?p+(""+g[T]).replace(o,I+p)+p:g[T];return c},r=l.header?i(t.header)+d:"",h=l.footer&&t.footer?d+i(t.footer):"",m=[],s=0,S=t.body.length;s<S;s++)m.push(i(t.body[s]));return{str:r+m.join(d)+h,rows:m.length}},$=function(){var e=navigator.userAgent.indexOf("Safari")!==-1&&navigator.userAgent.indexOf("Chrome")===-1&&navigator.userAgent.indexOf("Opera")===-1;if(!e)return!1;var l=navigator.userAgent.match(/AppleWebKit\/(\d+\.\d+)/);return!!(l&&l.length>1&&l[1]*1<603.1)};function j(e){for(var l=65,d=90,t=d-l+1,p="";e>=0;)p=String.fromCharCode(e%t+l)+p,e=Math.floor(e/t)-1;return p}try{var X=new XMLSerializer,L}catch{}function ee(e,l){L===k&&(L=X.serializeToString(new F.DOMParser().parseFromString(te["xl/worksheets/sheet1.xml"],"text/xml")).indexOf("xmlns:r")===-1),f.each(l,function(d,t){if(f.isPlainObject(t)){var p=e.folder(d);ee(p,t)}else{if(L){var n=t.childNodes[0],o,I,i=[];for(o=n.attributes.length-1;o>=0;o--){var r=n.attributes[o].nodeName,h=n.attributes[o].nodeValue;r.indexOf(":")!==-1&&(i.push({name:r,value:h}),n.removeAttribute(r))}for(o=0,I=i.length;o<I;o++){var m=t.createAttribute(i[o].name.replace(":","_dt_b_namespace_token_"));m.value=i[o].value,n.setAttributeNode(m)}}var s=X.serializeToString(t);L&&(s.indexOf("<?xml")===-1&&(s='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'+s),s=s.replace(/_dt_b_namespace_token_/g,":"),s=s.replace(/xmlns:NS[\d]+="" NS[\d]+:/g,"")),s=s.replace(/<([^<>]*?) xmlns=""([^<>]*?)>/g,"<$1 $2>"),e.file(d,s)}})}function B(e,l,d){var t=e.createElement(l);return d&&(d.attr&&f(t).attr(d.attr),d.children&&f.each(d.children,function(p,n){t.appendChild(n)}),d.text!==null&&d.text!==k&&t.appendChild(e.createTextNode(d.text))),t}function ae(e,l){var d=e.header[l].length,t,p,n;e.footer&&e.footer[l].length>d&&(d=e.footer[l].length);for(var o=0,I=e.body.length;o<I;o++){var i=e.body[o][l];if(n=i!==null&&i!==k?i.toString():"",n.indexOf(`
`)!==-1?(p=n.split(`
`),p.sort(function(r,h){return h.length-r.length}),t=p[0].length):t=n.length,t>d&&(d=t),d>40)return 54}return d*=1.35,d>6?d:6}var te={"_rels/.rels":'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/></Relationships>',"xl/_rels/workbook.xml.rels":'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/><Relationship Id="rId2" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles" Target="styles.xml"/></Relationships>',"[Content_Types].xml":'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types"><Default Extension="xml" ContentType="application/xml" /><Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml" /><Default Extension="jpeg" ContentType="image/jpeg" /><Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml" /><Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml" /><Override PartName="/xl/styles.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml" /></Types>',"xl/workbook.xml":'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships"><fileVersion appName="xl" lastEdited="5" lowestEdited="5" rupBuild="24816"/><workbookPr showInkAnnotation="0" autoCompressPictures="0"/><bookViews><workbookView xWindow="0" yWindow="0" windowWidth="25600" windowHeight="19020" tabRatio="500"/></bookViews><sheets><sheet name="Sheet1" sheetId="1" r:id="rId1"/></sheets><definedNames/></workbook>',"xl/worksheets/sheet1.xml":'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" mc:Ignorable="x14ac" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac"><sheetData/><mergeCells count="0"/></worksheet>',"xl/styles.xml":'<?xml version="1.0" encoding="UTF-8"?><styleSheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" mc:Ignorable="x14ac" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac"><numFmts count="6"><numFmt numFmtId="164" formatCode="#,##0.00_- [$$-45C]"/><numFmt numFmtId="165" formatCode="&quot;£&quot;#,##0.00"/><numFmt numFmtId="166" formatCode="[$€-2] #,##0.00"/><numFmt numFmtId="167" formatCode="0.0%"/><numFmt numFmtId="168" formatCode="#,##0;(#,##0)"/><numFmt numFmtId="169" formatCode="#,##0.00;(#,##0.00)"/></numFmts><fonts count="5" x14ac:knownFonts="1"><font><sz val="11" /><name val="Calibri" /></font><font><sz val="11" /><name val="Calibri" /><color rgb="FFFFFFFF" /></font><font><sz val="11" /><name val="Calibri" /><b /></font><font><sz val="11" /><name val="Calibri" /><i /></font><font><sz val="11" /><name val="Calibri" /><u /></font></fonts><fills count="6"><fill><patternFill patternType="none" /></fill><fill><patternFill patternType="none" /></fill><fill><patternFill patternType="solid"><fgColor rgb="FFD9D9D9" /><bgColor indexed="64" /></patternFill></fill><fill><patternFill patternType="solid"><fgColor rgb="FFD99795" /><bgColor indexed="64" /></patternFill></fill><fill><patternFill patternType="solid"><fgColor rgb="ffc6efce" /><bgColor indexed="64" /></patternFill></fill><fill><patternFill patternType="solid"><fgColor rgb="ffc6cfef" /><bgColor indexed="64" /></patternFill></fill></fills><borders count="2"><border><left /><right /><top /><bottom /><diagonal /></border><border diagonalUp="false" diagonalDown="false"><left style="thin"><color auto="1" /></left><right style="thin"><color auto="1" /></right><top style="thin"><color auto="1" /></top><bottom style="thin"><color auto="1" /></bottom><diagonal /></border></borders><cellStyleXfs count="1"><xf numFmtId="0" fontId="0" fillId="0" borderId="0" /></cellStyleXfs><cellXfs count="68"><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="left"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="center"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="right"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="fill"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment textRotation="90"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment wrapText="1"/></xf><xf numFmtId="9"   fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="164" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="165" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="166" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="167" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="168" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="169" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="3" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="4" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="1" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="2" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="14" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/></cellXfs><cellStyles count="1"><cellStyle name="Normal" xfId="0" builtinId="0" /></cellStyles><dxfs count="0" /><tableStyles count="0" defaultTableStyle="TableStyleMedium9" defaultPivotStyle="PivotStyleMedium4" /></styleSheet>'},le=[{match:/^\-?\d+\.\d%$/,style:60,fmt:function(e){return e/100}},{match:/^\-?\d+\.?\d*%$/,style:56,fmt:function(e){return e/100}},{match:/^\-?\$[\d,]+.?\d*$/,style:57},{match:/^\-?£[\d,]+.?\d*$/,style:58},{match:/^\-?€[\d,]+.?\d*$/,style:59},{match:/^\-?\d+$/,style:65},{match:/^\-?\d+\.\d{2}$/,style:66},{match:/^\([\d,]+\)$/,style:61,fmt:function(e){return-1*e.replace(/[\(\)]/g,"")}},{match:/^\([\d,]+\.\d{2}\)$/,style:62,fmt:function(e){return-1*e.replace(/[\(\)]/g,"")}},{match:/^\-?[\d,]+$/,style:63},{match:/^\-?[\d,]+\.\d{2}$/,style:64},{match:/^[\d]{4}\-[\d]{2}\-[\d]{2}$/,style:67,fmt:function(e){return Math.round(25569+Date.parse(e)/(86400*1e3))}}];return _.ext.buttons.copyHtml5={className:"buttons-copy buttons-html5",text:function(e){return e.i18n("buttons.copy","Copy")},action:function(e,l,d,t){this.processing(!0);var p=this,n=Y(l,t),o=l.buttons.exportInfo(t),I=Q(t),i=n.str,r=f("<div/>").css({height:1,width:1,overflow:"hidden",position:"fixed",top:0,left:0});o.title&&(i=o.title+I+I+i),o.messageTop&&(i=o.messageTop+I+I+i),o.messageBottom&&(i=i+I+I+o.messageBottom),t.customize&&(i=t.customize(i,t,l));var h=f("<textarea readonly/>").val(i).appendTo(r);if(v.queryCommandSupported("copy")){r.appendTo(l.table().container()),h[0].focus(),h[0].select();try{var m=v.execCommand("copy");if(r.remove(),m){l.buttons.info(l.i18n("buttons.copyTitle","Copy to clipboard"),l.i18n("buttons.copySuccess",{1:"Copied one row to clipboard",_:"Copied %d rows to clipboard"},n.rows),2e3),this.processing(!1);return}}catch{}}var s=f("<span>"+l.i18n("buttons.copyKeys","Press <i>ctrl</i> or <i>⌘</i> + <i>C</i> to copy the table data<br>to your system clipboard.<br><br>To cancel, click this message or press escape.")+"</span>").append(r);l.buttons.info(l.i18n("buttons.copyTitle","Copy to clipboard"),s,0),h[0].focus(),h[0].select();var S=f(s).closest(".dt-button-info"),g=function(){S.off("click.buttons-copy"),f(v).off(".buttons-copy"),l.buttons.info(!1)};S.on("click.buttons-copy",g),f(v).on("keydown.buttons-copy",function(c){c.keyCode===27&&(g(),p.processing(!1))}).on("copy.buttons-copy cut.buttons-copy",function(){g(),p.processing(!1)})},exportOptions:{},fieldSeparator:"	",fieldBoundary:"",header:!0,footer:!1,title:"*",messageTop:"*",messageBottom:"*"},_.ext.buttons.csvHtml5={bom:!1,className:"buttons-csv buttons-html5",available:function(){return F.FileReader!==k&&F.Blob},text:function(e){return e.i18n("buttons.csv","CSV")},action:function(e,l,d,t){this.processing(!0);var p=Y(l,t).str,n=l.buttons.exportInfo(t),o=t.charset;t.customize&&(p=t.customize(p,t,l)),o!==!1?(o||(o=v.characterSet||v.charset),o&&(o=";charset="+o)):o="",t.bom&&(p="\uFEFF"+p),M(new Blob([p],{type:"text/csv"+o}),n.filename,!0),this.processing(!1)},filename:"*",extension:".csv",exportOptions:{},fieldSeparator:",",fieldBoundary:'"',escapeChar:'"',charset:null,header:!0,footer:!1},_.ext.buttons.excelHtml5={className:"buttons-excel buttons-html5",available:function(){return F.FileReader!==k&&W()!==k&&!$()&&X},text:function(e){return e.i18n("buttons.excel","Excel")},action:function(e,l,d,t){this.processing(!0);var p=this,n=0,o,I,i=function(u){var y=te[u];return f.parseXML(y)},r=i("xl/worksheets/sheet1.xml"),h=r.getElementsByTagName("sheetData")[0],m={_rels:{".rels":i("_rels/.rels")},xl:{_rels:{"workbook.xml.rels":i("xl/_rels/workbook.xml.rels")},"workbook.xml":i("xl/workbook.xml"),"styles.xml":i("xl/styles.xml"),worksheets:{"sheet1.xml":r}},"[Content_Types].xml":i("[Content_Types].xml")},s=l.buttons.exportData(t.exportOptions),S,g,c=function(u){S=n+1,g=B(r,"row",{attr:{r:S}});for(var y=0,O=u.length;y<O;y++){var V=j(y)+""+S,E=null;if(u[y]===null||u[y]===k||u[y]==="")if(t.createEmptyCells===!0)u[y]="";else continue;var Z=u[y];u[y]=typeof u[y].trim=="function"?u[y].trim():u[y];for(var G=0,ne=le.length;G<ne;G++){var H=le[G];if(u[y].match&&!u[y].match(/^0\d+/)&&u[y].match(H.match)){var K=u[y].replace(/[^\d\.\-]/g,"");H.fmt&&(K=H.fmt(K)),E=B(r,"c",{attr:{r:V,s:H.style},children:[B(r,"v",{text:K})]});break}}if(!E)if(typeof u[y]=="number"||u[y].match&&u[y].match(/^-?\d+(\.\d+)?([eE]\-?\d+)?$/)&&!u[y].match(/^0\d+/))E=B(r,"c",{attr:{t:"n",r:V},children:[B(r,"v",{text:u[y]})]});else{var pe=Z.replace?Z.replace(/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F-\x9F]/g,""):Z;E=B(r,"c",{attr:{t:"inlineStr",r:V},children:{row:B(r,"is",{children:{row:B(r,"t",{text:pe,attr:{"xml:space":"preserve"}})}})}})}g.appendChild(E)}h.appendChild(g),n++};t.customizeData&&t.customizeData(s);var T=function(u,y){var O=f("mergeCells",r);O[0].appendChild(B(r,"mergeCell",{attr:{ref:"A"+u+":"+j(y)+u}})),O.attr("count",parseFloat(O.attr("count"))+1),f("row:eq("+(u-1)+") c",r).attr("s","51")},a=l.buttons.exportInfo(t);a.title&&(c([a.title]),T(n,s.header.length-1)),a.messageTop&&(c([a.messageTop]),T(n,s.header.length-1)),t.header&&(c(s.header),f("row:last c",r).attr("s","2")),o=n;for(var x=0,N=s.body.length;x<N;x++)c(s.body[x]);I=n,t.footer&&s.footer&&(c(s.footer),f("row:last c",r).attr("s","2")),a.messageBottom&&(c([a.messageBottom]),T(n,s.header.length-1));var b=B(r,"cols");f("worksheet",r).prepend(b);for(var w=0,z=s.header.length;w<z;w++)b.appendChild(B(r,"col",{attr:{min:w+1,max:w+1,width:ae(s,w),customWidth:1}}));var C=m.xl["workbook.xml"];f("sheets sheet",C).attr("name",J(t)),t.autoFilter&&(f("mergeCells",r).before(B(r,"autoFilter",{attr:{ref:"A"+o+":"+j(s.header.length-1)+I}})),f("definedNames",C).append(B(C,"definedName",{attr:{name:"_xlnm._FilterDatabase",localSheetId:"0",hidden:1},text:J(t)+"!$A$"+o+":"+j(s.header.length-1)+I}))),t.customize&&t.customize(m,t,l),f("mergeCells",r).children().length===0&&f("mergeCells",r).remove();var R=W(),A=new R,D={type:"blob",mimeType:"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"};ee(A,m),A.generateAsync?A.generateAsync(D).then(function(u){M(u,a.filename),p.processing(!1)}):(M(A.generate(D),a.filename),this.processing(!1))},filename:"*",extension:".xlsx",exportOptions:{},header:!0,footer:!1,title:"*",messageTop:"*",messageBottom:"*",createEmptyCells:!1,autoFilter:!1,sheetName:""},_.ext.buttons.pdfHtml5={className:"buttons-pdf buttons-html5",available:function(){return F.FileReader!==k&&q()},text:function(e){return e.i18n("buttons.pdf","PDF")},action:function(e,l,d,t){this.processing(!0);var p=l.buttons.exportData(t.exportOptions),n=l.buttons.exportInfo(t),o=[];t.header&&o.push(f.map(p.header,function(m){return{text:typeof m=="string"?m:m+"",style:"tableHeader"}}));for(var I=0,i=p.body.length;I<i;I++)o.push(f.map(p.body[I],function(m){return(m===null||m===k)&&(m=""),{text:typeof m=="string"?m:m+"",style:I%2?"tableBodyEven":"tableBodyOdd"}}));t.footer&&p.footer&&o.push(f.map(p.footer,function(m){return{text:typeof m=="string"?m:m+"",style:"tableFooter"}}));var r={pageSize:t.pageSize,pageOrientation:t.orientation,content:[{table:{headerRows:1,body:o},layout:"noBorders"}],styles:{tableHeader:{bold:!0,fontSize:11,color:"white",fillColor:"#2d4154",alignment:"center"},tableBodyEven:{},tableBodyOdd:{fillColor:"#f3f3f3"},tableFooter:{bold:!0,fontSize:11,color:"white",fillColor:"#2d4154"},title:{alignment:"center",fontSize:15},message:{}},defaultStyle:{fontSize:10}};n.messageTop&&r.content.unshift({text:n.messageTop,style:"message",margin:[0,0,0,12]}),n.messageBottom&&r.content.push({text:n.messageBottom,style:"message",margin:[0,0,0,12]}),n.title&&r.content.unshift({text:n.title,style:"title",margin:[0,0,0,12]}),t.customize&&t.customize(r,t,l);var h=q().createPdf(r);t.download==="open"&&!$()?h.open():h.download(n.filename),this.processing(!1)},title:"*",filename:"*",extension:".pdf",exportOptions:{},orientation:"portrait",pageSize:"A4",header:!0,footer:!1,messageTop:"*",messageBottom:"*",customize:null,download:"download"},_.Buttons})});export default ie();
