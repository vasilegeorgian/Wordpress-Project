"use strict";(self.webpackChunkrealCookieBanner_=self.webpackChunkrealCookieBanner_||[]).push([[184],{4488:(e,t,a)=>{a.r(t),a.d(t,{TcfRouter:()=>ee});var n=a(8208),r=a(7363),o=a(3867),c=a(6711),l=a(5945),i=a(9743),s=a(5793),d=a(8988),u=a(5217),m=a(1839);const p=({count:e})=>{const t=(0,r.useMemo)((()=>{const t=[];for(let a=0;a<e;a++)t.push({key:a});return t}),[e]);return React.createElement(s.ZP,{dataSource:t,renderItem:()=>React.createElement(s.ZP.Item,null,React.createElement(m.Z,{loading:!0,active:!0,paragraph:{rows:1}}))})};var f=a(301),h=a(9511),v=a(8936),E=a(3642),R=a(1487);const _=(0,o.Pi)((({item:e})=>{const{editLink:t}=(0,d.g)(),{addLink:a,editLink:o}=(0,R.w)(),{key:c,busy:l,data:m,stats:{activeFeatures:p,activePurposes:_},hasVendor:g}=e;let b,y;if(g){const t=e.vendorModel.data;b=t.name,y=t.policyUrl}const{status:k,meta:{ePrivacyUSA:C,vendorId:w},blocker:S}=m,{optionStore:{ePrivacyUSA:Z}}=(0,i.m)(),P=(0,r.useMemo)((()=>S?o(new E.p(void 0,{id:S})):"".concat(a,"?force=scratch&attributes=").concat(JSON.stringify({name:b,tcfVendors:[c],criteria:"tcfVendors"}))),[S,b,c]);return React.createElement(s.ZP.Item,{itemID:c.toString(),actions:[g&&React.createElement("a",{key:"contentBlocker",href:P,style:{textDecoration:"none"}},S?(0,u.__)("Edit Content Blocker"):(0,u.__)("Create Content Blocker")),g&&React.createElement("a",{key:"edit",href:t(e),style:{textDecoration:"none"}},(0,u.__)("Edit")),React.createElement(v.Z,{key:"delete",title:(0,u.__)("Are you sure you want to delete this vendor?"),placement:"bottomRight",onConfirm:()=>e.delete({force:!0}),okText:(0,u.__)("Delete"),cancelText:(0,u.__)("Cancel"),overlayStyle:{maxWidth:350}},React.createElement("a",{style:{cursor:"pointer"}},(0,u.__)("Delete")))].filter(Boolean)},React.createElement(n.Z,{spinning:l},React.createElement(s.ZP.Item.Meta,{title:React.createElement("span",null,b," ",React.createElement(h.Z,null,(0,u.__)("Vendor ID: %d",w)),"draft"===k?React.createElement(h.Z,{color:"orange"},(0,u.__)("Draft")):"private"===k?React.createElement(h.Z,{color:"red"},(0,u.__)("Disabled")):null,!!C&&Z&&React.createElement(h.Z,null,(0,u.__)("US data processing")),!g&&React.createElement(f.Z,{title:(0,u.__)("This vendor is no longer available and/or has been removed from the list of available vendors by the GVL. For this vendor, you can no longer request a consent from your visitors.")},React.createElement(h.Z,{color:"error"},(0,u.__)("Abandoned")))),description:React.createElement("div",null,React.createElement("div",null,(0,u.__)("Privacy policy"),":"," ",React.createElement("a",{href:y,target:"_blank",rel:"noreferrer"},y)),React.createElement("div",{style:{paddingTop:5}},React.createElement(h.Z,null,(0,u._n)("%d purpose enabled","%d purposes enabled",_,_)),p>0&&React.createElement(h.Z,null,(0,u._n)("%d feature enabled","%d features enabled",p,p))))})))}));var g=a(4944);const b=(0,o.Pi)((()=>{const{addLink:e}=(0,d.g)();return React.createElement(g.Z,{description:(0,u.__)("You have not yet created a TCF vendor configuration.")},React.createElement("a",{className:"button button-primary",href:e},(0,u.__)("Create TCF vendor configuration")))})),y=(0,o.Pi)((()=>{const[e,t]=(0,r.useState)(!1),{addLink:a}=(0,d.g)(),{tcfStore:n}=(0,i.m)(),{vendorConfigurations:o,vendorConfigurationCount:c}=n,{busy:l,entries:m}=o;return(0,r.useEffect)((()=>{c>0&&!e&&(n.fetchVendorConfigurations(),t(!0))}),[c,e]),c?React.createElement(React.Fragment,null,React.createElement("div",{className:"wp-clearfix"},React.createElement("a",{href:a,className:"button button-primary right",style:{marginBottom:10}},(0,u.__)("Add TCF vendor"))),l?React.createElement(p,{count:c}):React.createElement("div",null,React.createElement(s.ZP,null,Array.from(m.values()).sort(((e,t)=>{if(!e.hasVendor||!t.hasVendor)return 1;const a=e.vendorModel.data.name,n=t.vendorModel.data.name;return a<n?-1:a>n?1:0})).map((e=>React.createElement(_,{item:e,key:e.key})))))):React.createElement(b,null)}));var k=a(3625),C=a(2065);const w=(0,o.Pi)((({item:e,onSelect:t})=>{const{vendorConfiguration:a,data:{id:n,name:r,policyUrl:o}}=e;return React.createElement(s.ZP.Item,{itemID:n.toString(),actions:[t&&!a&&React.createElement("a",{className:"button",key:"select",style:{textDecoration:"none",cursor:"pointer"},onClick:()=>t(e)},(0,u.__)("Add vendor"))].filter(Boolean),style:a?{opacity:.7}:{}},React.createElement(s.ZP.Item.Meta,{title:React.createElement("span",null,r," ",!!a&&React.createElement(h.Z,null,(0,u.__)("Already created")),React.createElement(h.Z,null,(0,u.__)("Vendor ID: %d",n))),description:React.createElement("div",null,React.createElement("div",null,(0,u.__)("Privacy policy"),":"," ",React.createElement("a",{href:o,target:"_blank",rel:"noreferrer"},o)))}))}));var S=a(5573);const Z=(0,o.Pi)((({onSelect:e})=>{const{tcfStore:t}=(0,i.m)(),{busyVendors:a,vendors:n}=t,[o,c]=(0,r.useState)(""),[l,d]=(0,r.useState)([]),m=(0,r.useCallback)((e=>Array.from(n.values()).filter((({data:{id:t,name:a,policyUrl:n}})=>!e.trim().length||e.split(" ").filter(Boolean).filter((e=>"".concat(a," ").concat(n," ").concat(t).toLowerCase().indexOf(e.trim().toLowerCase())>-1)).length>0)).sort((({data:{name:e}},{data:{name:t}})=>e<t?-1:e>t?1:0))),[]);return(0,r.useEffect)((()=>{t.fetchedAllVendorConfigurations||t.fetchVendorConfigurations(),t.fetchVendors().then((()=>{d(m(""))}))}),[]),(0,S.N)(o,""===o?0:800,(e=>{d(m(e))})),React.createElement("div",null,React.createElement("div",{className:"wp-clearfix",style:{marginBottom:15}},React.createElement(C.Z.Search,{autoFocus:!0,style:{maxWidth:400,float:"right"},placeholder:(0,u.__)("Search vendor by name or ID..."),onChange:e=>c(e.target.value)})),a?React.createElement(p,{count:10}):React.createElement(s.ZP,null,l.map((t=>React.createElement(w,{item:t,key:"".concat(t.data.id),onSelect:e})))))}));var P=a(7465),T=a(4217),I=a(1246),D=a(3307),F=a(1712),x=a(9894),N=a(1088),A=a(3115);const V=(0,o.Pi)((({vendor:{data:{id:e,name:t,policyUrl:a,additionalInformation:{legalAddress:n,territorialScope:r}}}})=>{const{optionStore:{ePrivacyUSA:o,others:{iso3166OneAlpha2:c}}}=(0,i.m)();return React.createElement(React.Fragment,null,React.createElement(A.C,{offset:K.labelCol.span},(0,u.__)("General vendor configuration")),React.createElement(D.Z.Item,{label:(0,u.__)("Provider")},React.createElement(C.Z,{value:t,readOnly:!0,addonAfter:(0,u.__)("Vendor ID: %d",e)})),React.createElement(D.Z.Item,{label:(0,u.__)("Status"),required:!0},React.createElement(D.Z.Item,{name:"status",noStyle:!0,rules:[{required:!0,message:(0,u.__)("Please choose a status!")}]},React.createElement(N.ZP.Group,null,React.createElement(N.ZP.Button,{value:"publish"},(0,u.__)("Enabled")),React.createElement(N.ZP.Button,{value:"private"},(0,u.__)("Disabled")),React.createElement(N.ZP.Button,{value:"draft"},(0,u.__)("Draft")))),React.createElement("p",{className:"description"},(0,u.__)('Vendor configurations with the status "Draft" or "Disabled" are not visible to the public. In addition, a draft is highlighted in the table of vendor configurations so that you do not forget to complete it.'))),React.createElement(D.Z.Item,{label:(0,u.__)("Legal address")},React.createElement(C.Z.TextArea,{value:n.split(";").join("\n"),readOnly:!0,autoSize:!0})),React.createElement(D.Z.Item,{label:(0,u.__)("Privacy policy of the provider")},React.createElement(C.Z,{value:a,readOnly:!0})),React.createElement(D.Z.Item,{label:(0,u.__)("US data processing"),style:{display:o?void 0:"none"}},React.createElement(D.Z.Item,{name:"ePrivacyUSA",noStyle:!0},React.createElement(N.ZP.Group,null,React.createElement(N.ZP.Button,{value:2},(0,u.__)("Unknown")),React.createElement(N.ZP.Button,{value:1},(0,u.__)("Yes")),React.createElement(N.ZP.Button,{value:0},(0,u.__)("No")))),React.createElement("p",{className:"description"},(0,u.__)("This vendor processes data in the USA or transfers data to US companies or servers."))),React.createElement(D.Z.Item,{label:(0,u.__)("Territorial scope")},r.map((e=>React.createElement(h.Z,{key:e},c[e])))))})),B={icon:{tag:"svg",attrs:{viewBox:"64 64 896 896",focusable:"false"},children:[{tag:"path",attrs:{d:"M909.1 209.3l-56.4 44.1C775.8 155.1 656.2 92 521.9 92 290 92 102.3 279.5 102 511.5 101.7 743.7 289.8 932 521.9 932c181.3 0 335.8-115 394.6-276.1 1.5-4.2-.7-8.9-4.9-10.3l-56.7-19.5a8 8 0 00-10.1 4.8c-1.8 5-3.8 10-5.9 14.9-17.3 41-42.1 77.8-73.7 109.4A344.77 344.77 0 01655.9 829c-42.3 17.9-87.4 27-133.8 27-46.5 0-91.5-9.1-133.8-27A341.5 341.5 0 01279 755.2a342.16 342.16 0 01-73.7-109.4c-17.9-42.4-27-87.4-27-133.9s9.1-91.5 27-133.9c17.3-41 42.1-77.8 73.7-109.4 31.6-31.6 68.4-56.4 109.3-73.8 42.3-17.9 87.4-27 133.8-27 46.5 0 91.5 9.1 133.8 27a341.5 341.5 0 01109.3 73.8c9.9 9.9 19.2 20.4 27.8 31.4l-60.2 47a8 8 0 003 14.1l175.6 43c5 1.2 9.9-2.6 9.9-7.7l.8-180.9c-.1-6.6-7.8-10.3-13-6.2z"}}]},name:"reload",theme:"outlined"};var L=a(7334),U=function(e,t){return r.createElement(L.Z,Object.assign({},e,{ref:t,icon:B}))};U.displayName="ReloadOutlined";const O=r.forwardRef(U);const M=(0,o.Pi)((({vendor:{deviceStorageDisclosure:e,data:{deviceStorageDisclosureViolation:t,deviceStorageDisclosureUrl:a}}})=>{const{tcfStore:{purposes:n}}=(0,i.m)();return React.createElement(React.Fragment,null,React.createElement(A.C,{offset:K.labelCol.span,description:(0,u._i)((0,u.__)("It should be specified all cookies, which are used by using a service of a TCF vendor. There are several types of cookies and that the {{aEprivacy}}ePrivacy Directive (Directive 2009/136/EC) Art. 66{{/aEprivacy}} requires that you inform your visitors not only about (HTTP) cookies, but also about cookie-like information. This data, if specified, is given by the TCF Vendor and is not mutable. If the information is incomplete, you will need to contact the TCF vendor to request the information be completed."),{aEprivacy:React.createElement("a",{href:(0,u.__)("https://devowl.io/go/eu-directive-2009-136-ec"),target:"_blank",rel:"noreferrer"})})},(0,u.__)("Device Storage Disclosure")," (",(0,u.__)("Technical cookie information"),")"),t?React.createElement("div",{className:"notice notice-error inline below-h2 notice-alt",style:{margin:"10px 0"}},React.createElement("p",null,(0,u._i)((0,u.__)('TCF vendors must disclose their cookies, among other things, in accordance with the {{a}}"Vendor Device Storage & Operational Disclosures"{{/a}} specification. However, this vendor fails to comply with the specification, so that the mandatory information for obtaining informed consent as defined by the GDPR cannot be read. You as a website operator can therefore not obtain valid consent for this vendor.'),{a:React.createElement("a",{href:"https://github.com/InteractiveAdvertisingBureau/GDPR-Transparency-and-Consent-Framework/blob/7c79f48b033f783d98da922152430657097f5ab2/TCFv2/Vendor%20Device%20Storage%20&%20Operational%20Disclosures.md",target:"_blank",rel:"noreferrer"})})),React.createElement("p",null,(0,u._i)((0,u.__)("You can find the vendor's faulty device storage disclosure at {{a}}%s{{/a}}. Please contact the vendor and ask for a standard compliant device disclosures!",a),{a:React.createElement("a",{href:a,target:"_blank",rel:"noreferrer"})})),React.createElement("p",null,React.createElement("strong",null,(0,u.__)("Problem:"))," ","no-disclosures"===t?(0,u.__)("The vendor does not provide any disclosures."):"disclosure-no-domains"===t?(0,u.__)("The vendor does not specify for one or multiple cookies for which domains they are valid."):"disclosure-no-purposes"===t?(0,u.__)("The vendor does not specify the purpose for one or multiple cookies."):"disclosure-no-cookie-refresh"===t?(0,u.__)("The vendor does not specify for one or multiple cookies if the cookie does refresh."):"disclosure-no-max-age-seconds"===t?(0,u.__)("The vendor does not specify the age in seconds for one or multiple cookies."):(0,u.__)("The vendor provides a technically non-machine-readable variant of the data, which differs significantly from the defined standard."))):React.createElement("table",{className:"wp-list-table widefat fixed striped table-view-list",style:{marginBottom:25}},React.createElement("thead",null,React.createElement("tr",null,React.createElement("td",null,(0,u.__)("Cookie type")),React.createElement("td",null,(0,u.__)("Identifier")),React.createElement("td",null,(0,u.__)("Domain")),React.createElement("td",null,(0,u.__)("Duration")),React.createElement("td",null,(0,u.__)("Purposes")))),React.createElement("tbody",null,e.length?e.map((({type:e,identifier:t,domain:a,domains:r,maxAgeSeconds:o,cookieRefresh:c,purposes:l})=>React.createElement("tr",{key:"".concat(e).concat(t)},React.createElement("td",null,function(e){switch(e){case"cookie":return"HTTP Cookie";case"web":return"LocalStorage, Session Storage, IndexDB";case"app":return"App";default:return e}}(e)),React.createElement("td",null,t?React.createElement("code",null,t):(0,u.__)("Not defined")),React.createElement("td",null,r?React.createElement("code",null,r.join(",")):a?React.createElement("code",null,a):(0,u.__)("Not defined")),React.createElement("td",null,null!==o?React.createElement(React.Fragment,null,o<=0?React.createElement(f.Z,{title:(0,u.__)("This cookie is active as long as the session is active")},React.createElement("span",null,(0,u.__)("Session"))):React.createElement("span",null,o," ",(0,u.__)("second(s)")),c&&React.createElement(h.Z,{icon:React.createElement(O,null)},(0,u.__)("Refresh"))):(0,u.__)("Not defined")),React.createElement("td",null,l?l.length?React.createElement(f.Z,{title:React.createElement("ul",{style:{margin:0,padding:0}},l.map((e=>{var t;return React.createElement("li",{key:e},null===(t=n.get("".concat(e)))||void 0===t?void 0:t.data.name)})))},React.createElement(h.Z,null,(0,u._n)("%d purpose","%d purposes",l.length,l.length))):(0,u.__)("None"):(0,u.__)("Unknown"))))):React.createElement("tr",null,React.createElement("td",{colSpan:5},(0,u.__)("This vendor does not provide any device storage disclosure."))))))}));var G=a(9172),q=a(7818),j=a(8057);const Y={labelCol:{span:0},wrapperCol:{span:24},style:{margin:0}},W=(0,o.Pi)((({vendor:{allPurposes:e,flexiblePurposes:t}})=>{const{optionStore:{tcfScopeOfConsent:a}}=(0,i.m)(),n="global"===a;return React.createElement(React.Fragment,null,React.createElement(A.C,{offset:K.labelCol.span,description:(0,u._i)((0,u.__)('The vendor specifies for which defined purposes he wants to process (personal) data of your visitors and use cookies. These can be deselected if consent should not be obtained for certain purposes. The vendor specifies the legal basis for data processing in according to  {{aGdpr}}Art. 6 GDPR{{/aGdpr}} and whether you as the website operator can change this. "Legitimate Interest" means that this purpose is pre-selected on the basis of a legally designated legitimate interest, and the visitor to your website must actively object to it, if an objection is possible. "Consent" means that your visitors must explicitly agree to this purpose. The default settings are provided by the vendor, but do not have to match how you use the vendor on your website. In particular, you may need to make adjustments, if possible, in the "Legal basis" column. {{strong}}A legitimate interest exists only in a very few cases. If you are not sure, it is better to obtain consent.{{/strong}}'),{strong:React.createElement("strong",null),aGdpr:React.createElement("a",{href:(0,u.__)("https://gdpr-info.eu/art-6-gdpr/"),target:"_blank",rel:"noreferrer"})})},(0,u.__)("Purposes and special purposes")),n&&React.createElement("div",{className:"notice notice-info inline below-h2 notice-alt",style:{margin:"0 0 10px 0"}},React.createElement("p",null,(0,u.__)('You are using the TCF integration in the "Global Scope". Therefore, according to the TCF specification, it is not possible to deselect purposes.'))),React.createElement("table",{className:"wp-list-table widefat fixed striped table-view-list",style:{marginBottom:25}},React.createElement("thead",null,React.createElement("tr",null,React.createElement("td",{width:100},(0,u.__)("Enabled")),React.createElement("td",null,(0,u.__)("Description")),React.createElement("td",{width:210,align:"right"},(0,u.__)("Legal basis")))),React.createElement("tbody",null,e.map((e=>{const{data:{id:a,description:r,descriptionLegal:o},special:c}=e,l=t.indexOf(e)>-1,i=c?"special":"normal",s=a.toString(),d=["restrictivePurposes",i,s],m=d.join(".");return React.createElement("tr",{key:m,"data-key":m},React.createElement("td",null,React.createElement(D.Z.Item,(0,P.Z)({},Y,{name:"special"===i?void 0:[...d,"enabled"],valuePropName:"checked"}),React.createElement(q.Z,{disabled:n||"normal"!==i,defaultChecked:"special"===i||void 0}))),React.createElement("td",null,React.createElement("strong",null,r," ",c&&React.createElement(h.Z,{color:"warning"},(0,u.__)("Special purpose"))),React.createElement("br",null),(0,j.E)(o)),React.createElement("td",null,React.createElement(D.Z.Item,{noStyle:!0,shouldUpdate:(e,t)=>{var a,n;return(null===(a=e.restrictivePurposes[i])||void 0===a?void 0:a[+s].enabled)!==(null===(n=t.restrictivePurposes[i])||void 0===n?void 0:n[+s].enabled)}},(({getFieldValue:e})=>React.createElement(D.Z.Item,(0,P.Z)({},Y,{name:"special"===i?void 0:[...d,"legInt"]}),React.createElement(G.Z,{disabled:!l||n||!e([...d,"enabled"]),defaultValue:"special"===i?"no":void 0},React.createElement(G.Z.Option,{value:"yes"},(0,u.__)("Legitimate interest")),React.createElement(G.Z.Option,{value:"no"},(0,u.__)("Consent"))))))))})))))})),H={labelCol:{span:0},wrapperCol:{span:24},style:{margin:0}},z=(0,o.Pi)((({vendor:{allFeatures:e}})=>React.createElement(React.Fragment,null,React.createElement(A.C,{offset:K.labelCol.span,description:(0,u.__)("Features are specified by the vendor and are immutable. They describe the characteristics of how personal data is processed in order to achieve one or more purposes.")},(0,u.__)("Features and special features")),React.createElement("table",{className:"wp-list-table widefat fixed striped table-view-list",style:{marginBottom:25}},React.createElement("thead",null,React.createElement("tr",null,React.createElement("td",{width:100},(0,u.__)("Enabled")),React.createElement("td",null,(0,u.__)("Description")))),React.createElement("tbody",null,e.map((e=>{const{data:{id:t,description:a,descriptionLegal:n},special:r}=e;return React.createElement("tr",{key:"".concat(r?"special":"normal","-").concat(t)},React.createElement("td",null,React.createElement(D.Z.Item,H,React.createElement(q.Z,{disabled:!0,defaultChecked:!0}))),React.createElement("td",null,React.createElement("strong",null,a," ",r&&React.createElement(h.Z,{color:"warning"},(0,u.__)("Special feature"))),React.createElement("br",null),(0,j.E)(n)))})),0===e.length&&React.createElement("tr",null,React.createElement("td",{colSpan:2,style:{textAlign:"center"}},(0,u.__)("This vendor has not listed any used features."))))))));var J=a(7421);const K={labelCol:{span:6},wrapperCol:{span:16}},X=(0,o.Pi)((({vendor:e,navigateAfterCreation:t=!0})=>{const{vendorConfiguration:a,id:o,queried:l,fetched:s,link:p}=(0,d.g)(),f=(0,c.useHistory)(),[h]=D.Z.useForm(),[v,E]=(0,r.useState)(!1),[R,_]=(0,r.useState)(!1),{tcfStore:g,optionStore:{tcfScopeOfConsent:b}}=(0,i.m)(),{vendorConfigurations:y}=g,[k,C]=(0,r.useState)(e),w=s?{status:a.data.status,restrictivePurposes:a.restrictivePurposes,ePrivacyUSA:a.data.meta.ePrivacyUSA,presetCheck:!0}:{status:"publish",restrictivePurposes:null==k?void 0:k.restrictivePurposes,ePrivacyUSA:2,presetCheck:!1};(0,r.useEffect)((()=>{a.vendorModel&&C(a.vendorModel)}),[a]),(0,r.useEffect)((()=>{l&&!s&&y.getSingle({params:{id:o,context:"edit"}})}),[l,s]),(0,r.useEffect)((()=>{(0,F.X)(0)}),[]);const S=(0,r.useCallback)((async e=>{const{status:n,restrictivePurposes:r,...o}=e;if(0===Object.values(r.normal).filter((({enabled:e})=>e)).length+k.specialPurposes.length)throw I.ZP.error("You need to enable at least one purpose!"),new Error;try{const e={...o,vendorId:k.data.id,restrictivePurposes:JSON.stringify(r)};if(delete e.presetCheck,l)"global"===b&&(e.restrictivePurposes=a.data.meta.restrictivePurposes),a.setStatus(n),a.setMeta(e),await a.patch();else{const t=new x.S(y,{status:n,meta:{...e}});await t.persist()}_(!1),I.ZP.success((0,u.__)("You successfully saved the TCF vendor configuration.")),t&&setTimeout((()=>f.push(p.slice(1))),0)}catch(e){throw I.ZP.error(e.responseJSON.message),e}}),[l,a,g,k,b]),Z=(0,r.useCallback)((async e=>{E(!0);try{await S(e)}catch(e){}finally{E(!1)}}),[h,S]),N=(0,r.useCallback)((e=>{I.ZP.error((0,u.__)("The TCF vendor configuration could not be saved due to missing/invalid form values.")),e.errorFields.length&&h.getFieldInstance(e.errorFields[0].name).parentElement.scrollIntoView({behavior:"smooth",block:"center"})}),[]),A=(0,r.useCallback)((()=>!R||(0,u.__)('You have unsaved changes. If you click on "confirm", your changes will be discarded.')),[h,w]);return l&&!s||!k?React.createElement(m.Z,{active:!0,paragraph:{rows:8}}):React.createElement(n.Z,{spinning:v},React.createElement(c.Prompt,{message:A}),React.createElement(D.Z,(0,P.Z)({name:"blocker-".concat(o),form:h},K,{initialValues:w,onFinish:Z,onFinishFailed:N,onValuesChange:()=>_(!0)}),React.createElement(V,{vendor:k}),React.createElement(M,{vendor:k}),React.createElement(W,{vendor:k}),React.createElement(z,{vendor:k}),!l&&React.createElement(D.Z.Item,{name:"presetCheck",valuePropName:"checked",required:!0,rules:[{type:"boolean",required:!0,transform:e=>e||void 0,message:(0,u.__)("Please confirm that you have checked the information.")}],wrapperCol:{offset:K.labelCol.span}},React.createElement(T.Z,null,(0,u.__)("I have checked the information in the TCF vendor configuration myself and corrected any information that does not fit to my use case.")," ",React.createElement(J.r,{url:(0,u.__)("https://devowl.io/knowledge-base/is-real-cookie-banner-legally-compliant/")}))),React.createElement(D.Z.Item,{className:"rcb-form-sticky-submit"},React.createElement("span",null,React.createElement("input",{type:"submit",className:"button button-primary right",value:(0,u.__)("Save")})))))})),Q=(0,o.Pi)((()=>{const[e,t]=(0,r.useState)();return void 0===e?React.createElement(k.f,null,React.createElement(Z,{onSelect:t})):React.createElement(k.f,{maxWidth:"fixed"},React.createElement(X,{vendor:e}))}));var $=a(5470);const ee=(0,o.Pi)((()=>{const{path:e}=(0,c.useRouteMatch)(),{tcfStore:t}=(0,i.m)(),{purposes:a}=t;(0,r.useEffect)((()=>{t.fetchDeclarations()}),[]);const o=(0,l.v)("tcf-vendor");return 0===a.size?React.createElement(n.Z,{style:{margin:"auto",marginTop:15}}):React.createElement(React.Fragment,null,React.createElement($.K,{identifier:"tcf-vendor"}),React.createElement(c.Switch,null,React.createElement(c.Route,{path:e,exact:!0},React.createElement(y,null),React.createElement("p",{className:"description",style:{maxWidth:800,margin:"30px auto 0",textAlign:"center"}},o)),React.createElement(c.Route,{path:"".concat(e,"/new")},React.createElement(Q,null)),React.createElement(c.Route,{path:"".concat(e,"/edit/:vendorConfiguration")},React.createElement(k.f,{maxWidth:"fixed"},React.createElement(X,null)))))}))},5573:(e,t,a)=>{a.d(t,{N:()=>r});var n=a(7363);function r(e,t,a,r){const[o,c]=(0,n.useState)(e);return(0,n.useEffect)((()=>{const a=setTimeout((()=>{c(e)}),t);return null==r||r(e),()=>{clearTimeout(a)}}),[e]),(0,n.useEffect)((()=>{a(o)}),[o]),o}},1487:(e,t,a)=>{a.d(t,{w:()=>l});var n=a(6711),r=a(9743),o=a(7363),c=a(3642);const l=()=>{const{params:e}=(0,n.useRouteMatch)(),{cookieStore:t}=(0,r.m)(),a=+e.blocker,l=isNaN(+a)?0:+a,i=!!a,s=t.blockers.entries.get(l)||new c.p(t.blockers,{id:0}),d=(0,o.useCallback)((({key:e})=>"#/blocker/edit/".concat(e)),[s]);return{blocker:s,id:l,queried:i,fetched:0!==s.key,link:"#/blocker",editLink:d,addLink:"#/blocker/new"}}},8988:(e,t,a)=>{a.d(t,{g:()=>l});var n=a(6711),r=a(9743),o=a(7363),c=a(9894);const l=()=>{const{params:e}=(0,n.useRouteMatch)(),{tcfStore:t}=(0,r.m)(),a=+e.vendorConfiguration,l=isNaN(+a)?0:+a,i=!!a,s=t.vendorConfigurations.entries.get(l)||new c.S(t.vendorConfigurations,{id:0}),d=(0,o.useCallback)((({key:e})=>"#/cookies/tcf-vendors/edit/".concat(e)),[s]);return{vendorConfiguration:s,id:l,queried:i,fetched:0!==s.key,link:"#/cookies/tcf-vendors",editLink:d,addLink:"#/cookies/tcf-vendors/new"}}}}]);
//# sourceMappingURL=chunk-config-tab-tcf.lite.js.map?ver=13f276f70480c125856b