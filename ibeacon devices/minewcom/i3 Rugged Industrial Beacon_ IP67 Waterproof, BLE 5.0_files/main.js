console.log("%c疑问联系：nero.zhang@minew.com","color:red")
function isMobile(){if((navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i))){return!0}else{return!1}}
function isBot(){const botAgents=['Googlebot','Bingbot','Slurp','DuckDuckBot','Baiduspider','YandexBot','Sogou','Exabot','facebot','ia_archiver'];const userAgent=navigator.userAgent;for(let i=0;i<botAgents.length;i++){if(userAgent.indexOf(botAgents[i])!==-1){return!0}}
return!1}
function isPcScreen(){let screenWidth=viewWidth;if(screenWidth>=1360){return!0}else{return!1}}
var isMobile=isMobile()
jQuery(function($){$('.ga-change-url').on('click',function(e){e.preventDefault();let _thisurl=$(this).data('url');window.open(_thisurl,'_blank')})
AOS.init({disable:'mobile',});$("img.lazy").lazyload({effect:"fadeIn",threshold:600});if(!isBot()){const trademarks=['Bluetooth','LoRaWAN'];$('.addCopyright').each(function(){function replaceInTextNodes(node){Array.from(node.childNodes).forEach(child=>{if(child.nodeType===3){let updatedText=child.textContent;trademarks.forEach(term=>{const regex=new RegExp(`\\b${term}(?!®)\\b`,'g');updatedText=updatedText.replace(regex,`${term}<sup>®</sup>`)});if(updatedText!==child.textContent){const tempDiv=document.createElement('div');tempDiv.innerHTML=updatedText;child.replaceWith(...Array.from(tempDiv.childNodes))}}else if(child.nodeType===1&&!['SCRIPT','STYLE'].includes(child.nodeName)){replaceInTextNodes(child)}})}
replaceInTextNodes(this)})}
$('.nav-menu-items>li').hover(function(e){$(this).find('i').removeClass('angle-down').addClass('angle-up')
$(this).siblings().find('i').removeClass('angle-up').addClass('angle-down')
$('.customer-btton').addClass('hidden')
let navName=$(this).data('nav')
$('.nav-content').addClass('active')
$('.nav-content-item').removeClass('active')
$(`.nav-content-item[data-nav="${navName}"]`).addClass('active')
let techName=getcookie('techName')||'bluetooth';$(`.nav-content .nav-content-item-left li[data-tech="${techName}"]`).addClass('hover').siblings().removeClass('hover');$(`.nav-content-item-right>div[data-tech="${techName}"]`).addClass('active').siblings().removeClass('active');let windowW=$(window).width();let pushContW=$(`.nav-content-item[data-nav="${navName}"]`).children('.sub-nav-content').outerWidth();let thisLiW=$(this).outerWidth();let offsetLeft=$(this).offset().left;let offsetRight=windowW-offsetLeft;offsetRight=offsetRight-thisLiW/2;let positionLeft=0;let positionCenter=(windowW-pushContW)/2;if(pushContW<windowW){positionLeft=pushContW/2>offsetRight?(windowW-pushContW):(offsetLeft-pushContW/2+thisLiW/2)}
if(positionLeft<0){positionLeft=positionCenter}
$(`.nav-content-item[data-nav="${navName}"]`).children('.sub-nav-content').css('left',positionLeft)})
$('.nav-menu-items').hover(function(){},function(){$('.nav-content').removeClass('active')
$('.nav-content-item').removeClass('active')
$('.nav-menu-items li').find('i').removeClass('angle-up').addClass('angle-down')
$('.customer-btton').removeClass('hidden')});$('.nav-content-item').hover(function(){$('.nav-content').addClass('active')
$(this).addClass('active')
$('.nav-menu-items li').find('a').removeClass('active')
$('.customer-btton').addClass('hidden')},function(){$('.nav-content').removeClass('active')
$(this).removeClass('active');let navName=$(this).data('nav');$(`.nav-menu-items li[data-nav="${navName}"]`).find('i').removeClass('angle-up').addClass('angle-down');$(`.nav-menu-items li[data-nav="${navName}"]`).find('a').removeClass('active');$('.customer-btton').removeClass('hidden')});$('.nav-content .nav-content-item-left li').mouseover(function(){$(this).addClass('hover').siblings().removeClass('hover');let techName=$(this).data('tech');$(`.nav-content-item-right>div[data-tech="${techName}"]`).addClass('active').siblings().removeClass('active');setcookie('techName',techName,1);if(techName=='bluetooth'){$('.navSmallbanner').show()}else{$('.navSmallbanner').hide()}});$('.index-part01 .product-new .product-new-item').hover(function(){$(this).addClass('active').siblings().removeClass('active')});$('.index-part02 .lot-kit .lot-kit-wrapper .lot-kit-nav-list li').hover(function(){$(this).addClass('active').siblings().removeClass('active');let _index=$(this).index()
$('.index-part02 .lot-kit .lot-kit-wrapper .lot-kit-images-list li').eq(_index).addClass('active').siblings().removeClass('active')});document.addEventListener('wpcf7mailfailed',function(event){$('#formMask').addClass('avtive');if($(".wpcf7-form form").length>0){$(".wpcf7-form form").get(0).reset()}},!1);document.addEventListener('wpcf7mailsent',function(event){$('#formMask').addClass('avtive');if($(".wpcf7-form form").length>0){$(".wpcf7-form form").get(0).reset()}},!1);$('#formMask .closed').on('click',function(){$('#formMask').removeClass('avtive')
$('#whitepaperMask').removeClass('active')
$('#contactUsForms').removeClass('active')})
$('#sendEmail').on('click',function(e){e.preventDefault();const subject=encodeURIComponent('');const mailtoLink='mailto:info@minew.com?subject='+subject;window.location.href=mailtoLink})
let scroll=isMobile?'touchmove':'scroll'
let navHeight=$('header').outerHeight();$(window).on(scroll,function(){let scrollTop=$(window).scrollTop()||$('body').scrollTop()||$('html').scrollTop()
if(scrollTop>=$(window).height()){$('#goTop').addClass('show')}else{$('#goTop').removeClass('show')}
if(scrollTop>=navHeight){$('header').addClass('scrolled')}else{$('header').removeClass('scrolled')}});$('#goTop').on('click',function(){$('html, body').animate({scrollTop:0},'slow')});$('.launch-button').click(function(e){e.preventDefault();if(!getcookie('slideFormSubmited')){$('.launch-form').toggleClass('showed')}else{open53chat()}});$('.launch-form-closeed').click(function(e){e.preventDefault();$('.launch-form').removeClass('showed');$('.launch-button').removeClass('closeed')})
$('#startChat').on('click',function(e){e.preventDefault();let _form=$(this).closest('form');let _name=_form.find("input[name='launchName']").val();let _email=_form.find("input[name='launchEmail']").val();let isValid=!0;let noticeMsg=''
_form.find('input[required]').each(function(){let _label=$(this).closest('label');if($(this).val()===''){isValid=!1;noticeMsg='Please complete this field';_label.find('.notice').text(noticeMsg);_label.find('.notice').show()}else{_label.find('.notice').hide()}});_form.find('input[type=email]').each(function(){let _label=$(this).closest('label');let email=$(this).val();let emailPattern=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;if(!emailPattern.test(email)){isValid=!1;noticeMsg='Invalid email format. ';_label.find('.notice').text(noticeMsg);_label.find('.notice').show()}else{_label.find('.notice').hide()}});if(isValid){open53chat(_name,_email);setcookie('slideFormSubmited',!0,1)}})
$('.blcok-mask .colsed').click(function(e){e.preventDefault();$('.blcok-mask').removeClass('show');$('#followLinkedIn').removeClass('hidden')});$('#selectByCatagory li').click(function(e){e.stopPropagation()
e.stopImmediatePropagation()
let cateBg=$(this).data('catebg')
$('.cates-info-image').css('background-image',`url(${cateBg})`);let input=$(this).find('input')
let cateName=input.val().replace(/ /g,'_').toLowerCase();let productItems=$('.products-list ul li');if(cateName=='all'){$.each(productItems,function(i,productLi){$(productLi).removeClass('cate-hidden')})}else{$.each(productItems,function(i,productLi){let liCates=$(productLi).data('cate').toLowerCase().split(",")
if($.inArray(cateName,liCates)<0){$(productLi).addClass('cate-hidden')}else{$(productLi).removeClass('cate-hidden')}})}
$(window).scrollTop(0)});$('#goByCatagory li').click(function(e){e.preventDefault()
e.stopPropagation()
e.stopImmediatePropagation()
let url=$(this).data('url')
$(window).attr('location',url)});$('#selectByTechnology li').click(function(e){let input=$(this).find('input')
let technology=input.val().toLowerCase()
let productItems=$('.products-list ul li')
if(technology=='all'){$.each(productItems,function(i,productLi){$(productLi).removeClass('tech-hidden')})}else{$.each(productItems,function(i,productLi){let liTechs=$(productLi).data('techs').toLowerCase().split(",")
if($.inArray(technology,liTechs)<0){$(productLi).addClass('tech-hidden')}else{$(productLi).removeClass('tech-hidden')}})}
$(window).scrollTop(0)});$('#goByTechnology li').click(function(e){e.preventDefault()
e.stopPropagation()
e.stopImmediatePropagation()
let url=$(this).data('url')
$(window).attr('location',url)});$('.products-left-nav-item a').click(function(e){e.preventDefault();$(this).find('i').toggleClass('clicked');$(this).next('ul').toggleClass('hide')});$('.products-tech-nav ul li').click(function(e){e.preventDefault();$(this).addClass('active').siblings().removeClass('active')});$('.nav-bar .search').click(function(){$('#searchBox').addClass('show')})
$('#searchBox .pulldown-list li').click(function(){$(this).addClass('selected').siblings().removeClass('selected')
let selectType=$(this).data('type')
let selectName=$(this).text()
$('#search-type').val(selectType)
$('#searchBox .pulldown-list>span').text(selectName)})
$('#searchBox .pulldown-list').click(function(){$('#searchBox .pulldown-list ul').toggleClass('show')})
$('#searchBox .search-warp').mouseleave(function(){$('#searchBox .pulldown-list ul').removeClass('show')})
$('#searchBox .pulldown-list ul').mouseleave(function(){$('#searchBox .pulldown-list ul').removeClass('show')})
$('#searchBox .closed').click(function(){$('#searchBox').removeClass('show')})
let mobile_nav_btn=$('.mobile-nav-btn')
let mobile_nav=$('.mobile-nav')
let mobile_nav_container=$('.mobile-nav-container')
mobile_nav_btn.on('click',function(){mobile_nav_btn.toggleClass('open')
mobile_nav.toggleClass('active')})
let fist_menu_li=$('.fist-menu>li')
let sub_menu_li=$('.sub-menu>li')
fist_menu_li.on('click',function(e){$(this).toggleClass('active')})
sub_menu_li.on('click',function(e){e.stopPropagation()});$.each(fist_menu_li,function(key,value){if($(value).children('.sub-menu').length>0){$(value).children('a').attr("href","javascript:;")}});$('.page-faqs-container .faqs-list .faqs-item').on('click','.question',function(e){let thisLi=$(this).closest('li');thisLi.toggleClass('active');thisLi.find('.answer').slideToggle()})
$('.product-faqs-details .faqs-list .faqs-item').on('click','.question',function(e){let thisLi=$(this).closest('li');thisLi.toggleClass('active');thisLi.find('.answer').slideToggle()})
if($('.product-faqs-details .faqs-list .faqs-item').length==1){$('.product-faqs-details .faqs-list .faqs-item .question').trigger('click')}
$('.chat-now').on('click',function(e){e.preventDefault();contactUs()})})
function contactUs(){let url="https://tb.53kf.com/code/client/bf39f6648193113efc7ac0811596eeb14/1";let name="Minew";let iWidth=712;let iHeight=499;let iTop=(window.screen.height-30-iHeight)/2;let iLeft=(window.screen.width-10-iWidth)/2;window.open(url,name,'height='+iHeight+',width='+iWidth+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=yes,scrollbars=yes,resizable=yes,location=no,status=no')}
function open53chat(name='',email=''){name=name||'';email=email||'';let _53api=$53.createApi();_53api.push('cmd','member');_53api.push('name',name);_53api.push('email',email);_53api.query();_53api.push('cmd','kfclient');_53api.push('type','new');_53api.query()}
let phpcms_path='/';let cookie_pre='sYQDUGqqzH';let cookie_domain='';let cookie_path='/';function getcookie(name){name=cookie_pre+name;let arg=name+"=";let alen=arg.length;let clen=document.cookie.length;let i=0;while(i<clen){let j=i+alen;if(document.cookie.substring(i,j)==arg)return getcookieval(j);i=document.cookie.indexOf(" ",i)+1;if(i==0)break}
return null}
function setcookie(name,value,days){name=cookie_pre+name;let argc=setcookie.arguments.length;let argv=setcookie.arguments;let secure=(argc>5)?argv[5]:!1;let expire=new Date();if(days==null||days==0)days=1;expire.setTime(expire.getTime()+3600000*24*days);document.cookie=name+"="+escape(value)+("; path="+cookie_path)+((cookie_domain=='')?"":("; domain="+cookie_domain))+((secure==!0)?"; secure":"")+";expires="+expire.toGMTString()}
function delcookie(name){let exp=new Date();exp.setTime(exp.getTime()-1);let cval=getcookie(name);name=cookie_pre+name;document.cookie=name+"="+cval+";expires="+exp.toGMTString()}
function getcookieval(offset){let endstr=document.cookie.indexOf(";",offset);if(endstr==-1)
endstr=document.cookie.length;return unescape(document.cookie.substring(offset,endstr))}