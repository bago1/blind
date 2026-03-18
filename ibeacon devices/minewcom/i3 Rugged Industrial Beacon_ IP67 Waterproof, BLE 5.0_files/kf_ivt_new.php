	// var hz6d_guest_id = $53.getCookie('53gid2');
	document.cookie = "guest_id=" + "14860342724005" + ";path=/;domain=." + "53kf.com";

	var hz6d_cus_web_msg_gids = "";

	function hz6d_cus_web_msg_open(){
		var openurl = "https://www30.53kf.com/webCompany.php?kf_sign=zgyMzMTc3McxNzE0ODYwMzQyNzI0MDA1NzIyNDM0NjI=&arg=10243462&style=1&kflist=off&kf=info%40minew.com&zdkf_type=1&lnk_overflow=0&language=en&charset=GBK&username=&userinfo=&introurl=&lyurl=&lytype=0&copartner=&referer=https%3A%2F%2Fwww.minew.com%2Fproduct%2Fi3-robust-beacon%2F&keyword=&brief=&logo=&question=&uid=37b112595b36ac4dcb2bebb55cbb27e9&guest_id=14860342724005&uuid_53kf=ef78cd34f0fd7c1c79697c28059e9be5&u_cust_id=&u_cust_name=&u_custom_info=";
		var itop = 200;
		var ileft = 200;
		try{
			itop = (window.screen.height - 473)/2;
			ileft = (window.screen.width - 703)/2;
		}catch(e){}
		try{
			window.open(openurl,"_blank","height=473,width=703,top="+itop+",left="+ileft+",status=yes,toolbar=no,menubar=no,resizable=yes,scrollbars=no,location=no,titlebar=no");
		}catch(e){}
	}

//	hz6d_get_guest_id_timer = setTimeout("hz6d_get_guest_id()", 500);

	var create_flp_jquery_timer = window.setInterval(function(){
		if (!document.getElementById('hz6d_flp_jquery')) {
			$53.creElm({
				id: 'hz6d_flp_jquery',
				src: 'https://www30.53kf.com/minkh/js/jquery-1.4.2.flp.js?20121127002',
				charset: "utf-8",
				type: 'text/javascript'
			},'script', document.body, 1);
			clearInterval(create_flp_jquery_timer);
		}
	},500);	var new_fk_count=0; //访客消息条数
	var is_close = 0;//对话是否结束
	var firefox_onOff = 0;
	var HZ6D_CONFIGSNEW = {
		'com_id': "72243462",
		'flashingInterval' : {},
		'newMsgInterval' : 0
	};

	//取代原跨域方式
	try{
		window.addEventListener("message",function(event){
			if (typeof(event.data) != 'string') return;
			if(event.data.indexOf('53kf_new_msg') != -1){
				if (!zdfq_switch_flag) return; // 浮窗iframe的url未完成加载时return
				hz6d_flashing();
				hz6d_showIvt4("msg");
			}
			if(event.data.indexOf('53kf_fk_new_msg') != -1){
				try{
					$53.fkCallMsg(event.data.substring(16));//回调访客发送消息方法
				}catch(e){}
				return
			}
			if(event.data.indexOf('53kf_new_colse') != -1){
				is_close = 1;
			}
			if(event.data.indexOf('53kf_min_window') != -1){
				is_close = 1;
				firefox_onOff = 1;
				hide_floatWindow();
			}
			if (event.data.indexOf('53kf_show_window') != -1) {
				show_floatWindow();
			}
			if (event.data == "get_force"){
				var open_mini_windown = $53("iframe_company_mini").getAttribute("open_mini_windown");
				if (open_mini_windown == '1' && "hz1" == 'www111'){//品房阁需求 处理
					$53.createScript("hz6d_send_lnk_debug0", hz6d_alias_host+"/wnn_debug.php?cmd=senlnk0&hz6d_guest_ip="+hz6d_guest_ip+"&hz6d_guest_id="+hz6d_guest_id+"&force_kf="+last_invite_kf);
					if (last_invite_kf != '') {
						var lnk_msg = 'sendLNK{#53#}'+last_invite_kf;
						try{
							$53.createScript("hz6d_send_lnk_debug1", hz6d_alias_host+"/wnn_debug.php?cmd=senlnk1&hz6d_guest_ip="+hz6d_guest_ip+"&hz6d_guest_id="+hz6d_guest_id);
							document.getElementById('iframe_company_mini').contentWindow.postMessage(lnk_msg,"https://www30.53kf.com/webCompany.php?kf_sign=zgyMzMTc3McxNzE0ODYwMzQyNzI0MDA1NzIyNDM0NjI=&arg=10243462&style=1&kflist=off&kf=info%40minew.com&zdkf_type=1&lnk_overflow=0&language=en&charset=GBK&username=&userinfo=&introurl=&lyurl=&lytype=0&copartner=&referer=https%3A%2F%2Fwww.minew.com%2Fproduct%2Fi3-robust-beacon%2F&keyword=&brief=&logo=&question=&uid=37b112595b36ac4dcb2bebb55cbb27e9&guest_id=14860342724005&uuid_53kf=ef78cd34f0fd7c1c79697c28059e9be5&u_cust_id=&u_cust_name=&u_custom_info=");
						}catch(e){}
				}
					return;
				}
			}
		});
	}catch(e){
		window.attachEvent("onmessage",function(event){
			if (typeof(event.data) != 'string') return;
			if(event.data.indexOf('53kf_new_msg') != -1){
				if (!zdfq_switch_flag) return; // 浮窗iframe的url未完成加载时return
				hz6d_flashing();
				hz6d_showIvt4("msg");
			}
			if(event.data.indexOf('53kf_fk_new_msg') != -1){
				try{
					$53.fkCallMsg(event.data.substring(16));//回调访客发送消息方法
				}catch(e){}
				return
			}
			if(event.data.indexOf('53kf_new_colse') != -1){
				is_close = 1;
			}
			if(event.data.indexOf('53kf_min_window') != -1){
				is_close = 1;
				firefox_onOff = 1;
				hide_floatWindow();
			}
			if (event.data.indexOf('53kf_show_window') != -1) {
				show_floatWindow();
			}
			if (event.data == "get_force"){
				var open_mini_windown = $53("iframe_company_mini").getAttribute("open_mini_windown");
				if (open_mini_windown == '1' && "hz1" == 'www111'){//品房阁需求 处理
					$53.createScript("hz6d_send_lnk_debug0", hz6d_alias_host+"/wnn_debug.php?cmd=senlnk0&hz6d_guest_ip="+hz6d_guest_ip+"&hz6d_guest_id="+hz6d_guest_id+"&force_kf="+last_invite_kf);
					if (last_invite_kf != '') {
						var lnk_msg = 'sendLNK{#53#}'+last_invite_kf;
						try{
							$53.createScript("hz6d_send_lnk_debug1", hz6d_alias_host+"/wnn_debug.php?cmd=senlnk1&hz6d_guest_ip="+hz6d_guest_ip+"&hz6d_guest_id="+hz6d_guest_id);
							document.getElementById('iframe_company_mini').contentWindow.postMessage(lnk_msg,"https://www30.53kf.com/webCompany.php?kf_sign=zgyMzMTc3McxNzE0ODYwMzQyNzI0MDA1NzIyNDM0NjI=&arg=10243462&style=1&kflist=off&kf=info%40minew.com&zdkf_type=1&lnk_overflow=0&language=en&charset=GBK&username=&userinfo=&introurl=&lyurl=&lytype=0&copartner=&referer=https%3A%2F%2Fwww.minew.com%2Fproduct%2Fi3-robust-beacon%2F&keyword=&brief=&logo=&question=&uid=37b112595b36ac4dcb2bebb55cbb27e9&guest_id=14860342724005&uuid_53kf=ef78cd34f0fd7c1c79697c28059e9be5&u_cust_id=&u_cust_name=&u_custom_info=");
						}catch(e){}
					}
					return;
				}
			}
		});
	}

	function hz6d_flashing() {
		if (1 == 1 || 1 > 20) {
			if (document.getElementById('mini-btn').style.display=='block') {
				if (0 == 1) {//强制展开是否开启
					show_floatWindow('qzzk');
				}else{
					var info_num = document.getElementById("info-num");
					if(info_num.innerHTML =='0'){
						info_num.style.display = "block";
					};
					info_num.innerHTML = parseInt(info_num.innerHTML)+1;
				}
			}
		}else{
			if(parseInt(flp("#div_company_mini").css("height")) <= 36) {//对话框缩小时
				if(0 == 1) {//强制展开是否开启
					max_min_company_mini(document.getElementById("hz6d_cname_mini_div").nextSibling);
				}else{
					if(!HZ6D_CONFIGSNEW.newMsgInterval) {
						flp('#hz6d_cname_mini_div').html("您有新消息");
						HZ6D_CONFIGSNEW.newMsgInterval = setInterval("flp('#hz6d_cname_mini_div').fadeOut(150).fadeIn(150)",400);
					}
				}
			}
		}
	}

	function hz6d_re_flashing(cid) {
		clearInterval(HZ6D_CONFIGSNEW.newMsgInterval);
		HZ6D_CONFIGSNEW.newMsgInterval = 0;
		if(1 == 17)
			flp('#hz6d_cname_mini_div').html("Anything Stusio");
		else
			flp('#hz6d_cname_mini_div').html(hz6d_cname);
	}		// 发送acc
		var hz6d_filter_time = "";
		var is_right="r";
		var is_top="b";

		var height_new = 0;
		// 邀请框处理
		var acc_pop_page		 = "0";
		var acc_pop_pagenum	= 1;
		var acc_pop_total		= "0";
		var acc_pop_totalnum = 1;

		var nowpage					= window.location.href;
		nowpage = nowpage.replace('http://','').replace('https://','');
		nowpage = nowpage.split('?');
		nowpage = nowpage[0].replace(/\./g,'_').replace(/\//g,'_');

		var acc_lr					= "1";
		var acc_tb					= "1";
		var acc_middle				= "0";
		var how_float				= "0";
		var acc_left				= 280;
		var acc_top					= 230;
		var acc_autotype			= "0"; // 点击接受或拒绝不再弹出
		var ivt_autotype			= "0";
		var zdyivt					= "0";
		var ivtstr					= "<div id=\"inv_box_53kf\" style=\"width: 380px; padding-top: 10px; padding-left: 10px; box-sizing: border-box; position: fixed; left:412px; top:22px;display: block;z-index:999998;\"><div style=\"position:absolute;left:0;top:0;width:20px;height:20px;cursor:pointer;z-index:5;\" onclick = \"inv.clos()\"><img style=\"width:100%;height:100%;\" src=\"https://www30.53kf.com/style/setting/ver07/img/style_mobile_invite/close_2x.png\"></div><div class=\"inv_bg_color\" style=\"width:100%;box-sizing: border-box;overflow:hidden;background:#FFFFFF; border:1px solid #eee; box-shadow:rgba(74, 144, 226, 0.4) 0px 0px 10px 0px;border-radius: 2px;\"><div class=\"img_bg\" style=\"background:url(https://www30.53kf.com/style/setting/ver07/img/style_setting_ivt/kf-tb-01.png?1);background-size: 100% 100%; width: 100%;height: 140px;\"></div><div style=\"padding:16px 16px 24px 16px;overflow: hidden\"><div class=\"inv_title\" style=\"font-size:22px;text-align:center;float:left;width:100%;line-height:32px;margin-bottom:8px;letter-spacing:1px;box-sizing:border-box;color:#3A3C4C;\"></div><div class=\"inv_content\" style=\"font-size: 14px; line-height: 20px;  text-align: left; max-height: 60px; overflow: auto; float: left; width: 100%; margin-bottom: 16px; word-wrap: break-word; color: #3A3C4C;\">Got&nbspany&nbspquestions?&nbspI'&nbspm&nbsphappy&nbspto&nbsphelp.<br></div><div class=\"talk_btn\" style=\"float:left;width:100%;border-radius:2px;height:44px;line-height:44px;letter-spacing: 0.83px;font-size:16px;text-align:center;cursor:pointer;color:#FFFFFF;background:#1F8CEB;\" onclick=\"inv.talk()\">Click for inquiries</div></div></div></div>";
		var is_autoyqk				= "0";
		var once_autoyqk			= 0;//邀请语开关
		var zdyivt_width			= "0px";
		var zdyivt_height			= "0px";
		var acc_reinvite			= "1";
		var acc_reauto				= "1";
		var acc_reauto_time			= 0;
		var acc_poptime				= 30000;
	//	var acc_poptype				= -1;
		var acc_zdfq				= "yes";
		var acc_freeze				= "off";
		var acc_chattype			= 3;
		var acc_pop_type			= 2;
		var miniToOpenTime			= "0";
		var miniToOpenTimer			= 0;

		var ivt_zdfq				= "no";
		var ivt_poptime				= 10000;//邀请框延迟弹出
		var ivt_reauto				= "1";
		var ivt_reauto_time			= 60000;
		var ivt_pop_page			= "0";
		var ivt_pop_pagenum			= 1;
		var ivt_pop_total			= "0";
		var ivt_pop_totalnum		= 1;

		var acc_from_kf				= false;
		var hz6d_ivt_effect			= "0";
		var hz6d_cname				= "Minew";
		var font_color;
		hz6d_cname = hz6d_cname.replace(/\"/g, '&quot;').replace(/\'/g, '&#039;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
		var hz6d_ivt_tpl			= "";

		var acc_content  			= "May&nbsp;I&nbsp;help&nbsp;you!";
		var chatWindow;			//弹出新窗口
		var deteTime;
		if(1==0)
		{
			acc_content = "You can leave a message!";
		}

		var ivt_timer = 0;
		//var force_kf = ""; //防止强制时该页面未加载完成，放到acc.js定义
		var last_invite_kf = "";//上次邀请信息，防止webCompany.php页面未加载完成
		var man_content = "";

		var zdfq_switch = "no";
		var zdfq_switch_flag = false; // 是否初始化iframe url
		var zdfq_type = "3";
		var first_ivt_type = "1";
		var mini_style_type = "3";
		var mini_online_text = "Talk to us online!";
		mini_online_text = mini_online_text.replace(/\"/g, '&quot;').replace(/\'/g, '&#039;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
		var mini_off_text = "Leave us a message!";
		mini_off_text = mini_off_text.replace(/\"/g, '&quot;').replace(/\'/g, '&#039;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
		var minicolor_tbbj = "rgb(31, 140, 235)";
		var jtfq_type = 1;//交替发起时用于判断弹出浮动窗口还是邀请框
		var mini_size = "1";//浮动窗口尺寸
		var mini_custom_size = "";//浮动窗口自定义尺寸
		var mini_autograph_sw = "0";//浮动窗口签名开关
		var mini_autograph = "For your online answer pre-sale (5 x 8), after sale consulting (7 x 24) service";//浮动窗口签名
		var pc_ivt_type = "1";
		var pc_ivt_top = "40";
		var pc_ivt_left = "50";
		var callback_id6ds = "10434837";
		var lang_arr_ivt = ["phone number","Call back!","Free telephone consultation service","number error","Send success!","go back","WeChat","free phone","Send success!","Please pay attention to answering","Online consulting","On","Off","The number can not be empty",""];
		var auth_info = {"ip_area":"\u6df1\u5733","auth_type":0,"name":"","card":"","about":{}};

		if ((pc_ivt_type == '2' || pc_ivt_type == '-1') && 0 == '0') {
			$53.creElm({
				'id':'kfiframe',
				'src':'',
				'style':'display:none;overflow:hidden;',
				'frameBorder':0,
				'scrolling': 'no'
			},'iframe');
			$53.creElm({
				'id':'kfivteffect',
				'style':'display:none;position:absolute;width:0px;height:0px;overflow:hidden;border:1px solid #1B88D0;background:#D6EEFD;z-index:10087;'
			},'div');
			$53.creElm({
				'id':'kfivtwin',
				'style': (is_autoyqk == 1) ? 'display:none;overflow:visible;' : 'display:none;overflow:hidden;',
				'innerHTML': (is_autoyqk == 1) ? ivt_seturl(ivtstr) : ivtstr
			},'div');
		}else{
			$53.creElm({
				'id':'kfivtwin',
				'style':'display:none;overflow:visible;',
				'innerHTML':ivtstr
			},'div');			function Inv(){
				try{
					this.box = document.getElementById("inv_box_53kf");
					this.inp = document.getElementById("phoneNum_53kf");
					this.wro = document.getElementById("wrong_form_53kf");
					this.rig = document.getElementById("right_form_53kf");
					this.border_color = this.inp.getAttribute("data-color");
					this.opa = document.getElementById("alpha20_53kf");
					this.btn = document.getElementById("inv_btn_53kf");
					this.mobil = /^((0\d{2,3}-?\d{7,8})|(1[3-9]\d{9}))$/;
					this.positionInv(pc_ivt_left,pc_ivt_top);
					this.init();
				}catch(e){}
    		};
			Inv.prototype = {
				init : function(){
					var _this = this;
					document.onclick = function(){
						_this.focu();
					};
					this.box.onclick = function(e){
						var e=e||window.event;

						// 兼容处理
						if (e.stopPropagation) {
							e.stopPropagation();
						}else{
							// IE浏览器
							e.cancelBubble=true;
						}
					};
				},
				// 邀请框定位
				positionInv : function(left,top){
					var _this = this;
					var wid = $53.getWH().W;
					var hei = $53.getWH().H;
					$53("inv_box_53kf").style.left =( wid-parseInt(_this.box.style.width))*(left/100) + 'px';
					$53("inv_box_53kf").style.top = (hei-parseInt(_this.box.offsetHeight))*(top/100) + 'px';
				},
				// 邀请框关闭
				clos : function(){
					onliner_zdfq=3;
					jtfq_type=1;
					hidden_ivt();
				},
				// 表单验证
				makePhone : function(){
					var _this = this;
					if(_this.inp.value == ""){
						_this.wro.innerHTML = lang_arr_ivt[13];//号码不能为空
						_this.wro.style.display = "block";
						_this.rig.style.display = "none";
						_this.inp.style.borderColor = "#F44024";
					}else if(!_this.mobil.test(_this.inp.value)){
						_this.wro.innerHTML = lang_arr_ivt[3];//请输入正确的号码
						_this.wro.style.display = "block";
						_this.rig.style.display = "none";
						_this.inp.style.borderColor = "#F44024";
					}else{
						// 发送请求判断成功还是失败
						_this.opa.style.display = "block";
						_this.btn.innerHTML = lang_arr_ivt[8];//发送成功
						_this.inp.style.borderColor = _this.border_color;
						_this.wro.style.display = "none";
						_this.rig.style.display = "block";
						$53.callPhone(_this.inp.value,callback_id6ds,'');
					}
				},
				// 表单验证消失
				focu : function(){
					var _this = this; 
					try{
						_this.opa.style.display = "none";
						_this.btn.innerHTML = lang_arr_ivt[7];//点击免费通话
						_this.inp.style.borderColor = _this.border_color;
						_this.wro.style.display = "none";
						_this.rig.style.display = "none";
					}catch(e){}
				},
				// 限制输入数字
				justNum : function(){
					var _this = this; 
					_this.inp.value = _this.inp.value.replace(/[^\d]/g,'');
				},
				// 建立对话
				talk : function(){
					var _this = this;
					_this.focu();
					if (zdfq_type == 3) {
						onliner_zdfq=2;jtfq_type=2;show_floatWindow2();hidden_ivt();
					}else{
						var openurl = "https://www30.53kf.com/webCompany.php?kf_sign=zgyMzMTc3McxNzE0ODYwMzQyNzI0MDA1NzIyNDM0NjI=&arg=10243462&style=1&kflist=off&kf=info%40minew.com&zdkf_type=1&lnk_overflow=0&language=en&charset=GBK&username=&userinfo=&introurl=&lyurl=&lytype=0&copartner=&referer=https%3A%2F%2Fwww.minew.com%2Fproduct%2Fi3-robust-beacon%2F&keyword=&brief=&logo=&question=&uid=37b112595b36ac4dcb2bebb55cbb27e9&guest_id=14860342724005&uuid_53kf=ef78cd34f0fd7c1c79697c28059e9be5&u_cust_id=&u_cust_name=&u_custom_info=&tfrom=2" + force_kf;
						onliner_zdfq=2;
						var itop = 200;
						var ileft = 200;
						try{
							itop = (window.screen.height - 600)/2;
							ileft = (window.screen.width - 800)/2;
						}catch(e){}
						window.open(openurl,"_blank","height=600,width=800,top="+itop+",left="+ileft+",status=yes,toolbar=no,menubar=no,resizable=yes,scrollbars=no,location=no,titlebar=no");
						hidden_ivt();
					}
				}
			};			var inv = new Inv();
			window.inv = inv;
	}			// 强制对话小窗口HTML
			mini_button_position = 'right:0; bottom:0;';
			if(is_right=='l' && is_top=="b"){
				mini_button_position = 'left:0; bottom:0;';
			}else if(is_right=='l' && is_top=="t"){
				mini_button_position = 'left:0; top:0;';
			}else if(is_right=='r' && is_top=="t"){
				mini_button_position = 'right:0; top:0;';
			}
			var bubble_html = '';
			var btn_style1 = '';
			var btn_style2 = '';
			if (1 == 1) {
				var minichat_text = mini_online_text;
			}else{
				var minichat_text = mini_off_text;
			}

			var mini_size_height=460;
			var mini_size_width = 360;
			if(mini_size==2){
				mini_size_height = 400;
			}else if(mini_size==3){
				mini_size_width = mini_custom_size==''?360:mini_custom_size.split(',')[0]
				mini_size_height = mini_custom_size==''?500:mini_custom_size.split(',')[1]
			}
			//用于浮动窗口初始状态变量
			var div_company_mini_height = mini_size_height;
			var mini_btn_display = 'display:none;';
			var mini_div_display = '';
			if (acc_pop_type == 2) {
				mini_btn_display = 'display:block;';
				mini_div_display = 'display:none;';
				div_company_mini_height = 0;
			}

			if(1 == 1){
				btn_style1 = 'background: center center no-repeat;background-image: url(https://www30.53kf.com/style/chat/new2017/image/png/img-info24.png);background-image: url(https://www30.53kf.com/style/chat/new2017/image/svg/img-info24.svg), none;'
				btn_style2 = 'position: relative;height: 100%;width: 100%;background: center center no-repeat;background-color: '+minicolor_tbbj+';background-image: url(https://www30.53kf.com/style/chat/new2017/image/png/img-info36.png);background-image: url(https://www30.53kf.com/style/chat/new2017/image/svg/img-info36.svg), none;'
			}else {
				btn_style1 = 'background: center center no-repeat;background-image: url(https://www30.53kf.com/style/chat/new2017/image/png/img-email24.png);background-image: url(https://www30.53kf.com/style/chat/new2017/image/svg/img-email24.svg), none;'
				btn_style2 = 'position: relative;height: 100%;width: 100%;background: center center no-repeat;background-color: '+minicolor_tbbj+';background-image: url(https://www30.53kf.com/style/chat/new2017/image/png/img-email36.png);background-image: url(https://www30.53kf.com/style/chat/new2017/image/svg/img-email36.svg), none;'
			}

			if(mini_style_type==1){
				bubble_html = '<div class="mini-btn mini-btn1" id="mini-btn" onclick="show_floatWindow();" style="width:auto;white-space:nowrap;cursor:pointer;'+mini_btn_display+'position:absolute;'+mini_button_position+'z-index:-1;height: 42px;border-radius:4px; overflow: hidden; background: '+minicolor_tbbj+';-webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16)!important;box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16)!important;">'+
									'<div class="mini-btn-info" style="position: relative;width: 42px;height: 42px;display:inline-block;"><span style="width:100%;height:100%;position:absolute;left:0;top:0;z-index:1;'+btn_style1+'"></span><span style="width:100%;height:100%;position:absolute;left:0;top:0;background:#000;opacity:0.2;filter:alpha(opacity=20);"></span><span id="info-num" style="display:none;position: absolute;top: 5px;right: 5px;z-index:10;height: 14px;min-width: 14px;line-height: 14px;border-radius: 7px;background: red;font-size: 12px;color: #FFFFFF;letter-spacing: 0.47px;text-align: center;">0</span></div>'+
									'<div class="mini-btn-middle" style="width:auto;font-weight:normal;display:inline-block;vertical-align:top;line-height: 42px;padding: 0 8px;font-size: 16px;color: #FFFFFF;letter-spacing: 0.83px;word-break: break-all;text-align: center;">'+minichat_text+'</div>'+
									'<div class="mini-btn-window" style="display:inline-block;width: 42px;height: 42px;background: center center no-repeat;background-image: url(https://www30.53kf.com/style/chat/new2017/image/png/to-maxWindow.png);background-image: url(https://www30.53kf.com/style/chat/new2017/image/svg/to-maxWindow.svg), none;"></div>'+
								'</div>';
			}else if(mini_style_type==2){
				bubble_html = '<div class="mini-btn mini-btn2" id="mini-btn" onclick="show_floatWindow();" style="cursor:pointer;'+mini_btn_display+'position:absolute;'+mini_button_position+'z-index:-1;width: 42px;border-radius:4px; overflow: hidden; background: '+minicolor_tbbj+';-webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16)!important;box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16)!important;">'+
									'<div class="mini-btn-info" style="position: relative;width: 42px;height: 42px;"><span style="width:100%;height:100%;position:absolute;left:0;top:0;z-index:1;'+btn_style1+'"></span><span style="width:100%;height:100%;position:absolute;left:0;top:0;background:#000;opacity:0.2;filter:alpha(opacity=20);"></span><span id="info-num" style="display:none;position: absolute;top: 5px;right: 5px;z-index:10;height: 14px;min-width: 14px;line-height: 14px;border-radius: 7px;background: red;font-size: 12px;color: #FFFFFF;letter-spacing: 0.47px;text-align: center;">0</span></div>'+
									'<div class="mini-btn-middle" style="font-weight:normal;line-height: 20px;padding: 8px 13px 16px;font-size: 16px;color: #FFFFFF;letter-spacing: 3.83px;word-wrap: break-word;text-align: center;">'+minichat_text+'</div>'+
								'</div>';
			}else if(mini_style_type==3){
				bubble_html = '<div class="mini-btn mini-btn3" id="mini-btn" onclick="show_floatWindow();" style="cursor:pointer;'+mini_btn_display+'position:absolute;'+mini_button_position+'z-index:-1;width: 64px;height: 64px;border-radius: 32px; overflow: hidden; background: '+minicolor_tbbj+';-webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16)!important;box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16)!important;">'+
									'<div style="'+btn_style2+'"><span id="info-num" style="display:none;position: absolute;top: 12px;right: 12px;z-index:10;height: 14px;min-width: 14px;line-height: 14px;border-radius: 7px;background: red;font-size: 12px;color: #FFFFFF;letter-spacing: 0.47px;text-align: center;">0</span></div>'+
								'</div>';
			}

			var auth_info_html = '';
			if(auth_info.about&&auth_info.about.hide=='1'){
				var position_top = mini_autograph_sw==1?'56px;':'32px;';
				var accout_main = auth_info.auth_type=='0'?'未认证':auth_info.auth_type=='1'?'账号主体： <span style="color: #62778C;">个人</span>':auth_info.auth_type=='2'?'认证类型： <span style="color: #62778C;">企业</span>':auth_info.auth_type=='3'?'认证类型： <span style="color: #62778C;">政府</span>':'未认证';
				var auth_name = auth_info.name?('<div class="accout_name" style="margin-top: 8px;text-align: left;color: #62778C;"><p style="margin-bottom: 4px">认证主体：</p><div>'+auth_info.name+'</div></div>'):'';
				var auth_code = auth_info.card?('<div class="accout_code" style="margin-top: 8px;text-align: left;color: #62778C;"><p style="margin-bottom: 4px">统一社会信用代码/组织机构代码：</p><div>'+auth_info.card+'</div></div>'):'';
				var warnning = (auth_info.auth_type=='0'||auth_info.auth_type=='1')?'<div style="margin-top: 8px; color: #8DA2B5; text-align: left;">五三快服不对聊天行为及结果承担任何责任，请谨慎使用并自行辨别风险;涉及转账交易时务必核实，谨防诈骗导致钱款损失。</div>':'';
				auth_info_html = '<div class="about_box" id="about_box" style="display: none;top:'+position_top+'left: 10px;font-size: 12px;position: absolute;width: 216px;padding: 8px;background: #FFFFFF;box-shadow: 0px 9px 28px 8px rgba(0,0,0,0.05), 0px 6px 16px 0px rgba(0,0,0,0.08), 0px 3px 6px -4px rgba(0,0,0,0.12);border-radius: 4px;z-index: 99999;line-height:1.5">'+
                '<svg class="about_box_close" onclick="close_about_box()" style="position: absolute;right: 4px;top: 4px;width: 20px;height: 20px;cursor: pointer;" t="1661840056446" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="26167" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="200"><path d="M811.946667 212.053333a32 32 0 0 1 2.858666 41.984l-2.858666 3.242667L557.269333 512l254.72 254.72a32 32 0 0 1-42.026666 48.085333l-3.242667-2.858666L512 557.269333l-254.72 254.72a32 32 0 0 1-48.085333-42.026666l2.858666-3.242667L466.730667 512l-254.72-254.72a32 32 0 0 1 42.026666-48.085333l3.242667 2.858666L512 466.730667l254.72-254.72a32 32 0 0 1 45.226667 0z" fill="#869AB3" p-id="26168"></path></svg>'+
                '<div class="about_box_head" style="display: flex;">'+
                    '<span class="accout_type" style="margin-right: 16px;color: #8DA2B5;">'+accout_main+'</span>'+
                    '<div class="accout_ip" style="display: flex;color: #62778C;">'+
                        '<span>IP： <span style="color: #62778C;" id="accout_ip_words3">'+auth_info.ip_area+'</span></span>'+
                        '<div class="accout_ip_tips" onclick="show_tips()" style="position: relative;"><svg t="1661829375359" class="icon" style="margin-left: 2px;display: inline-block;width: 19px;height: 18px;cursor: pointer;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="25869" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="200"><path d="M512 128a384 384 0 1 1 0 768 384 384 0 0 1 0-768z m0 64a320 320 0 1 0 0 640 320 320 0 0 0 0-640z m42.666667 234.666667v213.333333h64a21.333333 21.333333 0 1 1 0 42.666667h-213.333334a21.333333 21.333333 0 1 1 0-42.666667H469.333333v-170.666667H405.333333a21.333333 21.333333 0 1 1 0-42.666666H554.666667z m-42.666667-128a42.666667 42.666667 0 1 1 0 85.333333 42.666667 42.666667 0 0 1 0-85.333333z" fill="#466080" p-id="25870"></path></svg><div class="accout_icon_tips" id="accout_icon_tips" style="display: none;padding: 2px 4px;width: 122px;height: 22px;background: #39414D;border-radius: 2px;opacity: 0.9;color: #fff;position: absolute;left: -60px;bottom: 22px;">当前账号最近登录地</div></div>'+
                    '</div></div>'+auth_name+auth_code+warnning+
				'<div class="complaint_box" style="text-align: left;margin-top: 8px;"><a class="complaint" style="text-decoration: underline !important;color: #218BFC !important;cursor: pointer;" href="https://www.53kf.com/ComplaintPage?complaint_url=&admini_account=&respondent_com_id=72243462&guest_id=14860342724005" target="_blank">投诉</a></div></div>'
			}

			var tmp_innerHTML = bubble_html;
			tmp_innerHTML += '<div id="iframe_company_mini_div" style="'+mini_div_display+'font-size: 0;background-color:#fff;border-radius:6px;overflow:hidden;width:100%;height:'+mini_size_height+'px;box-shadow:0 5px 40px rgba(0,0,0,.16)!important;-webkit-box-shadow:0 5px 40px rgba(0,0,0,.16)!important;">'+
								'<h6 class="pc-visitor-header" style="width:100%;box-sizing:border-box;background: '+minicolor_tbbj+' no-repeat 10px;margin:0;padding:0;padding-left: 10px;font-size: 14px;color: #fff;line-height: 36px;position: relative;font-weight: normal;padding-right: 72px;'+(mini_autograph_sw==1?'height:60px;':'height:36px;')+'">'+
								auth_info_html+
									'<div style="float: left;height: 100%;box-sizing: border-box;'+(mini_autograph_sw==1?'padding:8px 0':'padding: 6px 0;')+'"><img onclick="show_about_box()" style="max-width: 80px;width:auto;height:100%;border-radius:2px;vertical-align:baseline;cursor:pointer" src="https://s3v2.53kf.com/kfxt/2024/01/image/72243462_setting_1705974066_65af1932cde35.jpg"/></div>'+
									'<div style="float: left;max-width: 78%;overflow: hidden;'+(mini_autograph_sw==1?'margin-left:10px':'margin-left: 5px;')+'">'+
									'<label style="width:100%;background: none; padding: 0; margin: 0; border: 0; line-height:36px;cursor:move;font-weight:normal;cursor:move;color: #fff;display: block;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-size: 14px;" class="header-company">' + hz6d_cname + '</label>'+
									(mini_autograph_sw==1?'<span style="display: block;font-size: 12px;line-height: 20px;margin-top: -4px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;" title="'+mini_autograph+'">'+mini_autograph+'</span>':'')+
									'</div>'+
									'<span onclick="max_from_company_mini(this);" title="maximize"  class="pc-new pc-title-btn" style="background: url(https://www30.53kf.com/style/chat/new2017/image/png/newWindow.png) center no-repeat;background-image: url(https://www30.53kf.com/style/chat/new2017/image/svg/newWindow.svg),none;position: absolute;width: 36px;height: 36px;cursor: pointer;right: 40px;top: 0;fill: #F08000;"></span>'+
									'<span onclick="hide_floatWindow();" title="minimize" class="kf-pc-hide pc-title-btn" style="background: url(https://www30.53kf.com/style/chat/new2017/image/png/close2020.png) center no-repeat;background-image: url(https://www30.53kf.com/style/chat/new2017/image/svg/close2020.svg),none;position: absolute;width: 36px;height: 36px;cursor: pointer;right: 0px;top: 0;"></span>'+
								'</h6>'+
								'<iframe id="iframe_company_mini" frameborder="0"  style="height:'+(mini_size_height-(mini_autograph_sw==1?60:36))+'px;width:100%;margin:0;padding:0;visibility: inherit;opacity:1;position:inherit;">'+
								'</iframe>'+
							'</div>';
			$53.creElm({
				'id':'div_company_mini',
				'style':'line-height:0;font-size:0;display:none;position:fixed;right:0;bottom:0;width:'+mini_size_width+'px;height:'+div_company_mini_height+'px;overflow:hidden;z-index:1000000;cursor:move;overflow: visible;',
				'innerHTML': tmp_innerHTML
			},'div');
			floatWindowBindEvent();//绑定事件
			function show_tips(){
				document.getElementById('accout_icon_tips').style.display = 'block'
			}
			function close_about_box(){
				document.getElementById('about_box').style.display = 'none';
				document.getElementById('accout_icon_tips').style.display = 'none'
			}
			function show_about_box(){
				if(auth_info.about&&auth_info.about.hide=='1'){
					document.getElementById('about_box').style.display = 'block'
				}
			}//  ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓  2017版访客端新增 ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓


	// 隐藏浮动窗口
	function hide_floatWindow(event){
		document.querySelector('#div_company_mini').style.height="0";
		document.querySelector('#iframe_company_mini_div').style.display="none";
		document.querySelector('.mini-btn').style.display="block";
		//调整窗口位置
		var wid = $53.getWH().W;
		var hei = $53.getWH().H;
		if(0 == 0){
			if(is_right=='l'){
				var right=parseInt(30);
				right=wid-right-parseInt($53("div_company_mini").style.width);
				$53("div_company_mini").style.right = right + 'px';
			}else{
				$53("div_company_mini").style.right = "30" + 'px';
			}
			if(is_top=='t') {
				var bottom=parseInt(30);
				bottom=hei-bottom-parseInt($53("div_company_mini").style.height);
				$53("div_company_mini").style.bottom = bottom + 'px';
			}else{
				$53("div_company_mini").style.bottom = "30"+ 'px';
			}
		}else{
			logoPosition();
			var right_per = parseInt(0)/100;
			var bottom_per = parseInt(0)/100;
			$53("div_company_mini").style.left = (wid-parseInt($53("div_company_mini").style.width))*(1-right_per) + 'px';
			$53("div_company_mini").style.top = (hei-parseInt($53("div_company_mini").style.height))*(1-bottom_per) + 'px';
		}
		$53.callBackFun("miniHide");

		if (is_close == 1) return false;//如果对话结束 则不再执行规则

		if(zdfq_switch=='yes'){
			if (acc_reauto == 1 && zdfq_type == 1) {//浮动窗口 开启反复发起
				setTimeout(function () {
					show_floatWindow('zdfq');
				},acc_reauto_time);
			}else if (zdfq_type == 3) {//交替发起
				if (jtfq_type==1) {
					jtfq_type = 2;
					setTimeout(function () {
						hz6d_checkIvt();
					},acc_reauto_time);
				}else{
					jtfq_type = 1;
					setTimeout(function () {
						show_floatWindow('zdfq');
					},acc_reauto_time);
				}
			}
			//添加cookie 实现整个域读取
			if(acc_reauto == 1) {
				document.cookie = "my_acc_reauto_time=" + new Date().getTime() + ";path=/";
			} else { //没有反复开启弹出窗口  删除cookie
				document.cookie = "my_acc_reauto_time=null;path=/";
			}
		}
	}
	// 显示浮动窗口
	var mini_btn_flag;
	var show_floatWindow_firefoxRefresh = 1;
	function show_floatWindow(type){//type:  zdfq:主动发起规则打开  qzzk:强制展开打开   不传:用户点击展开
		try{clearTimeout(miniToOpenTimer)}catch(e){}
		// 火狐缓存刷新问题
		if (navigator.userAgent.indexOf("Firefox") > -1 && firefox_onOff == 1) {
			var iframe = document.getElementById("iframe_company_mini");
			var iframe_src = iframe.getAttribute("src");
			iframe.setAttribute("src",iframe_src+"&huancun="+Math.random());
			firefox_onOff = 0;
		}

		// 防止拖动的时候触发点击事件
		if(mini_btn_flag){
			mini_btn_flag = false;
			return false;
		}
		if (type == 'zdfq') {
			if (!hz6d_isShowIvt('chat')){
				return false;
			}else{
				hz6d_setTotalNum('chat');
			}
		}
		var mini_size_height;
		if(1==1){
			if (0 == '1') {
				mini_size_height=480;
			}else{
				mini_size_height=460;
			}
			if(mini_size==2){
				mini_size_height = 400;
			}else if(mini_size==3){
				mini_size_height = mini_custom_size==''?460:mini_custom_size.split(',')[1]
			}
		}else {
			mini_size_height = parseInt($53("iframe_company_mini_div").style.height);
		}

		try{
			document.querySelector('#div_company_mini').style.height=mini_size_height+"px";
			document.querySelector('#iframe_company_mini_div').style.display="block";

			// 火狐浏览器展开浮动窗口消息滚动至顶部修复
			// if (navigator.userAgent.indexOf("Firefox") > -1){
				document.getElementById('iframe_company_mini').contentWindow.postMessage('openMini',"https://www30.53kf.com/webCompany.php?kf_sign=zgyMzMTc3McxNzE0ODYwMzQyNzI0MDA1NzIyNDM0NjI=&arg=10243462&style=1&kflist=off&kf=info%40minew.com&zdkf_type=1&lnk_overflow=0&language=en&charset=GBK&username=&userinfo=&introurl=&lyurl=&lytype=0&copartner=&referer=https%3A%2F%2Fwww.minew.com%2Fproduct%2Fi3-robust-beacon%2F&keyword=&brief=&logo=&question=&uid=37b112595b36ac4dcb2bebb55cbb27e9&guest_id=14860342724005&uuid_53kf=ef78cd34f0fd7c1c79697c28059e9be5&u_cust_id=&u_cust_name=&u_custom_info=&tfrom=2");
			// }

			document.querySelector('.mini-btn').style.display="none";
			document.getElementById("info-num").style.display="none";
			document.getElementById("info-num").innerHTML = "0";
		}catch(e){}

		//调整窗口位置
		var wid = $53.getWH().W;
		var hei = $53.getWH().H;
		if(0 == 0){
			if(is_right=='l'){
				var right=parseInt(30);
				right=wid-right-parseInt($53("div_company_mini").style.width);
				$53("div_company_mini").style.right = right + 'px';
			}else{
				$53("div_company_mini").style.right = "30" + 'px';
			}
			if(is_top=='t') {
				var bottom=parseInt(30);
				bottom=hei-bottom-parseInt($53("div_company_mini").style.height);
				$53("div_company_mini").style.bottom = bottom + 'px';
			}else{
				$53("div_company_mini").style.bottom = "30"+ 'px';
			}
		}else{
			logoPosition();
			var right_per = parseInt(0)/100;
			var bottom_per = parseInt(0)/100;
			$53("div_company_mini").style.left = (wid-parseInt($53("div_company_mini").style.width))*(1-right_per) + 'px';
			$53("div_company_mini").style.top = (hei-parseInt($53("div_company_mini").style.height))*(1-bottom_per) + 'px';
		}
		$53.callBackFun("miniShow");
	};
	//为新版浮动窗口绑定事件
	function floatWindowBindEvent(){
		document.querySelector('.mini-btn').onmouseenter = function(){
			this.style.boxShadow = '0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)';
		}
		document.querySelector('.mini-btn').onmouseleave = function(){
			this.style.boxShadow = ' 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16)';
		}
		try{
			document.querySelector('.pc-new').onmouseenter = function(){
				this.style.backgroundColor = 'rgba(255, 255, 255, .1)';
				//this.style.filter = 'progid:DXImageTransform.Microsoft.gradient(startcolorstr=#19FFFFFF,endcolorstr=#19FFFFFF)';
			}
			document.querySelector('.pc-new').onmouseleave = function(){
				this.style.backgroundColor = '';
			}
		}catch(e){}
		document.querySelector('.kf-pc-hide').onmouseenter = function(){
			this.style.backgroundColor = 'rgba(255, 255, 255, .1)';
			//this.style.filter = 'progid:DXImageTransform.Microsoft.gradient(startcolorstr=#19FFFFFF,endcolorstr=#19FFFFFF)';
		}
		document.querySelector('.kf-pc-hide').onmouseleave = function(){
			this.style.backgroundColor = '';
		}
		if (1 == '24') {
			document.querySelector('.pc-close').onmouseenter = function(){
				this.style.backgroundColor = 'rgba(255, 255, 255, .1)';
				//this.style.filter = 'progid:DXImageTransform.Microsoft.gradient(startcolorstr=#19FFFFFF,endcolorstr=#19FFFFFF)';
			}
			document.querySelector('.pc-close').onmouseleave = function(){
				this.style.backgroundColor = '';
			}
		}
	}

	//百分比模式下图标定位
	function logoPosition(){
		if(parseInt(0) < 51 && parseInt(0) < 51) {
			$53('mini-btn').style.right = 0;
			$53('mini-btn').style.bottom = 0;
			$53('mini-btn').style.left = 'auto';
			$53('mini-btn').style.top = 'auto';
		}
		if(parseInt(0) < 51 && parseInt(0) > 50) {
			$53('mini-btn').style.right = 0;
			$53('mini-btn').style.bottom = 'auto';
			$53('mini-btn').style.left = 'auto';
			$53('mini-btn').style.top = 0;
		}
		if(parseInt(0) > 50 && parseInt(0) < 51) {
			$53('mini-btn').style.right = 'auto';
			$53('mini-btn').style.bottom = 0;
			$53('mini-btn').style.left = 0;
			$53('mini-btn').style.top = 'auto';
		}
		if(parseInt(0) > 50 && parseInt(0) > 50) {
			$53('mini-btn').style.right = 'auto';
			$53('mini-btn').style.bottom = 'auto';
			$53('mini-btn').style.left = 0;
			$53('mini-btn').style.top = 0;
		}
	}
	// 百分比模式下监听尺寸变化
	try{
		window.addEventListener("resize",function(){positionIvt()},false);
	}catch(e){
		window.attachEvent("onresize",function(){positionIvt()});
	}
	function positionIvt(){
		if(0 == 1){
			var wid = $53.getWH().W;
			var hei = $53.getWH().H;
			logoPosition();
			var right_per = parseInt(0)/100;
			var bottom_per = parseInt(0)/100;
			$53("div_company_mini").style.left = (wid-parseInt($53("div_company_mini").style.width))*(1-right_per) + 'px';
			$53("div_company_mini").style.top = (hei-parseInt($53("div_company_mini").style.height))*(1-bottom_per) + 'px';
		}		
	}

	//↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑  2017版访客端新增 ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑


	//	mini悬浮对话窗口 转到正常聊天窗口
	function max_from_company_mini(t)
	{
		var openurl = "https://www30.53kf.com/webCompany.php?kf_sign=zgyMzMTc3McxNzE0ODYwMzQyNzI0MDA1NzIyNDM0NjI=&arg=10243462&style=1&kflist=off&kf=info%40minew.com&zdkf_type=1&lnk_overflow=0&language=en&charset=GBK&username=&userinfo=&introurl=&lyurl=&lytype=0&copartner=&referer=https%3A%2F%2Fwww.minew.com%2Fproduct%2Fi3-robust-beacon%2F&keyword=&brief=&logo=&question=&uid=37b112595b36ac4dcb2bebb55cbb27e9&guest_id=14860342724005&uuid_53kf=ef78cd34f0fd7c1c79697c28059e9be5&u_cust_id=&u_cust_name=&u_custom_info=&tfrom=2"+force_kf;
		var top = 50;
		var left = 200;
		try{
			left = (window.screen.width - 800)/2;
			top = (window.screen.height - 600)/2;
		}catch(e){}
		try{
			chatWindow = window.open(openurl,"_blank","height=600,width=800,top="+top+",left="+left+",status=yes,toolbar=no,menubar=no,resizable=yes,scrollbars=no,location=no,titlebar=no");
			if(chatWindow==null){
				location.href = openurl;
			}else{
				chatWindow.focus();
				chatWindow.opener = window;
			}
		}catch(e){
			location.href = openurl;	// 傲游
		}
		if (1 == 1 || 1 > 20) {
			hide_floatWindow();
		}else{
			close_company_mini();
			t.parentNode.parentNode.removeChild(t.parentNode);
		}
	}

	function cgpic(t){
		if( $53("div_company_mini").style.width =="400px"){
			document.querySelector('.mini_narrow').style.background="url('https://www30.53kf.com/style/chat/minichat2/img/minx1.png') no-repeat";
		}

	}
	function cgpic2(t){
		if( $53("div_company_mini").style.width =="400px"){
			document.querySelector('.mini_narrow').style.background="url('https://www30.53kf.com/style/chat/minichat2/img/minx2.png') no-repeat";
		}
	}
	function cgpic3(t){
		document.querySelector('.mini_maxto').style.background="url('https://www30.53kf.com/style/chat/minichat2/img/double1.png') no-repeat";
	}
	function cgpic4(t){
		document.querySelector('.mini_maxto').style.background="url('https://www30.53kf.com/style/chat/minichat2/img/double2.png') no-repeat";
	}
	function cgpic5(t){
		document.querySelector('.mini_close').style.background="url('https://www30.53kf.com/style/chat/minichat2/img/close1.png') no-repeat 50% 50%";
	}
	function cgpic6(t){
		document.querySelector('.mini_close').style.background="url('https://www30.53kf.com/style/chat/minichat2/img/close2.png') no-repeat 50% 50%";
	}



	//	mini悬浮对话窗口 缩小、放大
	function max_min_company_mini(t)
	{
		if (t.getAttribute('max_min') == 'max')
		{
			$53("div_company_mini").style.height = "36px";
			$53("hz6d_cname_mini_div").style.width = "130px";
			$53("div_company_mini").style.width = "203px";
			$53("iframe_company_mini_div").style.display = "none";
			t.style.backgroundImage = "url('https://www30.53kf.com/style/chat/minichat2/img/max.png')";
			t.setAttribute('max_min','min');
			t.title = t.getAttribute('mini_recover');
			$53("div_company_mini").style.right = '0px';
			$53("div_company_mini").style.bottom = '0px';			$53("mini_header_bg_div").style.backgroundImage = "url('https://www30.53kf.com/style/chat/minichat2/img/header_bg2_1.png')";
		}
		else
		{
			hz6d_re_flashing(HZ6D_CONFIGSNEW.com_id);
			$53("iframe_company_mini_div").style.display = "";
			$53("div_company_mini").style.height = "378px";
			$53("div_company_mini").style.width = "403px";
			$53("hz6d_cname_mini_div").style.width = "330px";
			t.style.backgroundImage = "url('https://www30.53kf.com/style/chat/minichat2/img/min.png')";
			t.setAttribute('max_min','max');
			t.title = t.getAttribute('mini_narrow');
			var wid = $53.getWH().W;
			var hei = $53.getWH().H;
			if(0 == 0){
				if(is_right=='l'){
					var right=parseInt(30);
					right=wid-right-403;
					$53("div_company_mini").style.right = right + 'px';
				}else{
					$53("div_company_mini").style.right = "30" + 'px';
				}
				if(is_top=='t') {
					var bottom=parseInt(30);
					bottom=hei-bottom-378;
					$53("div_company_mini").style.bottom = bottom + 'px';
				}else{
					$53("div_company_mini").style.bottom = "30"+ 'px';
				}
			}else{
				logoPosition();
				var right_per = parseInt(0)/100;
				var bottom_per = parseInt(0)/100;
				$53("div_company_mini").style.left = (wid-parseInt($53("div_company_mini").style.width))*(1-right_per) + 'px';
				$53("div_company_mini").style.top = (hei-parseInt($53("div_company_mini").style.height))*(1-bottom_per) + 'px';
			}
		}		$53("mini_header_bg_div").style.backgroundImage = "url('https://www30.53kf.com/style/chat/minichat2/img/header_bg_1.png')";
	}
	// 定时调用判断是否显示邀请框
	function hz6d_checkIvt() { hz6d_showIvt(); }

	// 显示冻结层
	function hz6d_showFreeze(){
		if(acc_freeze=="on"){
			var div = $53("hz6d_freeze_div");
			if(div==null){
				hz6d_createFreezeDiv();
			}else{
				div.style.display = "block";
			}
		}
	}

	// 创建冻结层
	function hz6d_createFreezeDiv(){
		var div = document.createElement('DIV');
		div.id = 'hz6d_freeze_div';
		with(div.style){
			zIndex=6998;
			top='0px';
			left='0px';
			width='100%';
			height='100%';
			border='none';
			margin=padding=0;
			position='absolute';
			backgroundColor='#000';
			opacity='0.2';
			filter='alpha(opacity=20)';
			duration=1000;
		}
		document.body.insertBefore(div,document.body.firstChild);
		setInterval("hz6d_checkFreezeStyle()", 1);
	}

	var hz6d_maxPageWidth = 0;
	var hz6d_maxPageHeight = 0;
	// 定时调整冻结层大小
	function hz6d_checkFreezeStyle(){
		try{
			var freeze = $53("hz6d_freeze_div");
			if(freeze!=null){
				var scroll = hz6d_getScrollPosition();
				var client = hz6d_getClientWindow();
				var w = client.width+scroll.sLeft;
				var h = client.height+scroll.sTop;
				if(w > hz6d_maxPageWidth){
					hz6d_maxPageWidth = w;
					freeze.style.width = hz6d_maxPageWidth+"px";
				}
				if(h > hz6d_maxPageHeight){
					hz6d_maxPageHeight = h;
					freeze.style.height = hz6d_maxPageHeight+"px";
				}
			}
		}catch(e){}
	}

	// 删除冻结层
	function hz6d_destroyFreezeDiv(){
		try{
			var div = $53("hz6d_freeze_div");
			if(div!=null) { div.style.display = "none"; }
		}catch(e){}
	}

	// 显示邀请框
	function hz6d_showIvt(){
		if(hz6d_isShowIvt('ivt')) {
			if($53("kfivtwin").style.display=="none" && (onliner_zdfq!=2 || zdfq_type==3) || acc_from_kf==true){
				acc_from_kf = false;
				if ((pc_ivt_type == '2' || pc_ivt_type == '-1') && 0 == '0') {
					get_ACCWindow();
				}else{
					get_ACCWindow2();
				}
				hz6d_setTotalNum('ivt');
				// hz6d_setPageNum('ivt');
			}
		}
	}

	// 判断是否显示邀请框 强制
	function hz6d_isShowIvt(type){
		if(acc_reinvite==1 && acc_from_kf==true) { return true; }

		if(type == 'ivt') {
			//点击接受或拒绝后不再弹出
			if(ivt_autotype==3 && zdfq_type==3){
				if(onliner_zdfq==3){
					return false;
				}
			}
		}

		// if(type == 'chat') {
		// 	if(acc_autotype==3){
		// 		点击接受或拒绝后不再弹出
		// 		if(onliner_zdfq!=0){
		// 			return false;
		// 		}
		// 	}
		// }
		if(!hz6d_overTotalNum(type)) {
			// if(hz6d_overPageNum(type)) {
			// 	return false;
			// }
		}else{
			return false;
		}
		return true;
	}

	// 判断是否超过所有页面次数
	function hz6d_overTotalNum(type) {
		if($53("kfivtwin").style.display!="none") return;
		var total_invite = $53.getCookie("invite_53kf_totalnum_1");
		if(total_invite=="") { total_invite = 0; }
		if(total_invite>=acc_pop_totalnum) {return true; }
		return false;
	}

	// 判断是否超过每个页面次数
	function hz6d_overPageNum(type){
		if($53("kfivtwin").style.display!="none") return;
		if(type == 'chat') {
			if(acc_pop_page==1){
				var page_invite = kf_getCookie(nowpage);
				if(page_invite=="") { page_invite = 0; }
				if(page_invite>=acc_pop_pagenum) { return true; }
			}
		}
		if(type == 'ivt') {
			if(ivt_pop_page==1){
				var page_invite = $53.getCookie(nowpage+'ivt');
				if(!page_invite) { page_invite = 0; }
				if(page_invite>=ivt_pop_pagenum) { return true; }
			}
		}
		return false;
	}

	// 设置所有页面弹出次数
	function hz6d_setTotalNum(type){//如果主动发起方式为交替发起，则一个循环为一次
		if (type == 'ivt') {
			if (zdfq_type == 2 || (zdfq_type == 3 && first_ivt_type == 2)) {
				hz6d_setTotalNum2();
			}
		}
		if (type == 'chat') {
			if (zdfq_type == 1 || (zdfq_type == 3 && first_ivt_type == 1) || (zdfq_type == 3 && first_ivt_type == 2 && ivt_autotype==3 && onliner_zdfq==3)) {
				hz6d_setTotalNum2();
			}
		}
	}

	// 设置所有页面弹出次数
	function hz6d_setTotalNum2()
	{
		var total_cookie_name = 'invite_53kf_totalnum_1';
		var total_invite = kf_getCookie(total_cookie_name);
		if(total_invite=="") { total_invite = 0; }
		total_invite++;
		document.cookie = total_cookie_name+"="+total_invite+";path=/";
	}

	// 设置每个页面弹出次数
	function hz6d_setPageNum(type)
	{
		var pagenum_cookie_name = nowpage;
		if(type == 'ivt'){
			pagenum_cookie_name = nowpage + 'ivt';
		}
		var page_invite = kf_getCookie(pagenum_cookie_name);
		if(page_invite=="") { page_invite = 0; }
		page_invite++;
		document.cookie = pagenum_cookie_name+"="+page_invite;
	}

	function kf_getCookie(objName) {
		var arrStr = document.cookie.split("; ");

		for(var i = 0;i < arrStr.length;i ++) {

			var temp = arrStr[i].split("=");

			if(temp[0] == objName) return unescape(temp[1]);
		}
		return '';
	}

	// 隐藏邀请框
	function hidden_ivt()
	{
		if(zdfq_switch == 'yes') {
			//document.cookie = "onliner_zdfq72243462="+onliner_zdfq;
			document.cookie = "my_acc_reauto_time=" + new Date().getTime() + ";path=/";
		} else {
			document.cookie = "my_acc_reauto_time=null;path=/";
		}
		try{
			if ((pc_ivt_type == '2' || pc_ivt_type == '-1') && 0 == '0') {
				$53("kfiframe").style.display = "none";
				hidden_ACCWindow();
				hz6d_destroyFreezeDiv();
			}else{
				hidden_ACCWindow2();
			}
		}catch(e){}
		try{ force_kf = ""; }catch(e){}
	}

	function hz6d_haveMIn(){
		try{
		if('1' == 0 && $53("hz6d_mnkh_content").style.display=="none" ){//&& onliner_zdfq!=2
				acc_from_kf=false;
				hz6d_showContent();
				force_kf = "";
				onliner_zdfq = 2;
				hidden_ivt();
				hz6d_setTotalNum('chat');
				// hz6d_setPageNum('chat');
		}else if($53("div_company_mini").style.display=="none" ){//onliner_zdfq!=2
				acc_from_kf=false;
				get_location(acc_chattype);
				if (first_ivt_type == 1) {
					if (!(zdfq_type==3 && jtfq_type==2)) {
						hz6d_setTotalNum('chat');
					}
				}else{
					if (!(zdfq_type==3 && jtfq_type==1)) {
						hz6d_setTotalNum('chat');
					}
				}

				// hz6d_setPageNum('chat');
		}else{
			try{
				if (1 == 1 || 1 > 20) {
					show_floatWindow('qzzk');
				}else{
					hz6d_showIvt4();
				}
			}catch(e){}
		}
		}catch(e){}
	}

	function open_floatWindow(){
		try{
			if($53("div_company_mini").style.display=="none" ){
				acc_from_kf=false;
				get_location(3);
			}else{
				if (1 == 1 || 1 > 20) {
					show_floatWindow('qzzk');
				}else{
					hz6d_showIvt4();
				}
			}
		}catch(e){}
	}

	function hz6d_showIvt3() {
		if(hz6d_isShowIvt('chat')) {
			var time=setInterval(function () {
				if('1' == 0 && $53("hz6d_mnkh_content")){
					hz6d_haveMIn();
					clearInterval(time);
				}else if($53("div_company_mini")){
					hz6d_haveMIn();
					clearInterval(time);
				}
			},1);
		}
	}

	function hz6d_showIvt4(type) {
		if(hz6d_isShowIvt('chat') || type) {
			var time=setInterval(function () {
				if('1' == 0 && $53("hz6d_mnkh_content")){
					if($53("hz6d_mnkh_content").style.display=="none" ){
						$53("hz6d_mnkh_content").style.display = "block";
						hz6d_setTotalNum('chat');
						// hz6d_setPageNum('chat');
					}
					clearInterval(time);
				}else if($53("div_company_mini")){
					if($53("div_company_mini").style.display=="none" ){
						$53("div_company_mini").style.display = "block";
						hz6d_setTotalNum('chat');
						// hz6d_setPageNum('chat');
					}
					clearInterval(time);
				}
			},1000);
		}
	}

	function hz6d_deteWindow(){
		if(hz6d_isShowIvt('chat')){
			if(chatWindow==null || chatWindow.closed==true){
				acc_from_kf=false;
				get_location(acc_chattype);
				hz6d_setTotalNum('chat');
				// hz6d_setPageNum('chat');
			}
		}else{
			clearInterval(deteTime);
		}
	}

	function hz6d_showIvt2 () {
		deteTime = setInterval(function () {hz6d_deteWindow();},acc_reauto_time);
	}

	function hz6d_startReautoTimer2(acc_chattype) {
		if(acc_chattype==3) {
			hz6d_showIvt3();
		}
		if(acc_chattype==2){
			hz6d_showIvt2();
		}
		if(acc_chattype==1){
			if(hz6d_isShowIvt('chat')){
				get_location(acc_chattype);
				hz6d_setTotalNum('chat');
				// hz6d_setPageNum('chat');
			}
		}
	}

	// 加载后是否显示邀请框 对话框
	function hz6d_LoadToShowIvt()
	{
		if (zdfq_switch == 'yes' && (1==1 || "off"=="on")) {
			if(zdfq_type==1){//强制对话
				setTimeout(function () {hz6d_showIvt3();}, acc_poptime);
			}else if (zdfq_type==2) {//邀请框
				setTimeout("hz6d_checkIvt()", acc_poptime);
			}else if (zdfq_type==3) {//交替发起
				if (first_ivt_type == 1) {//首次邀请方式 1:邀请框 2:浮动窗口
					setTimeout("hz6d_checkIvt()", acc_poptime);
				}else{
					setTimeout(function () {hz6d_showIvt3();}, acc_poptime);
				}
			}
		}
	}
	//同一个域下处理cookie 改变延迟时间
	var my_acc_reauto_time_cookie = $53.getCookie('my_acc_reauto_time');

	if(my_acc_reauto_time_cookie && 1 && miniToOpenTime=='0') {
		acc_poptime = acc_reauto_time - (new Date().getTime() - my_acc_reauto_time_cookie);
	}
	//查询link表，判断是否已有客服在线，建立对话

	// if(1==1 || "off"=="on" || "off"=="on") {
		hz6d_LoadToShowIvt();
	// }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	var hz6d_company_mini = null;
	// 强制对话
	function get_location(type,invite_kf){
		zdfq_switch_flag = true; // 初始化iframe url完成
		// type:1 覆盖本窗口 2 新窗口 如果被拦截，则本窗口刷新 3 悬浮对话窗口
		try{
			var openurl = "https://www30.53kf.com/webCompany.php?kf_sign=zgyMzMTc3McxNzE0ODYwMzQyNzI0MDA1NzIyNDM0NjI=&arg=10243462&style=1&kflist=off&kf=info%40minew.com&zdkf_type=1&lnk_overflow=0&language=en&charset=GBK&username=&userinfo=&introurl=&lyurl=&lytype=0&copartner=&referer=https%3A%2F%2Fwww.minew.com%2Fproduct%2Fi3-robust-beacon%2F&keyword=&brief=&logo=&question=&uid=37b112595b36ac4dcb2bebb55cbb27e9&guest_id=14860342724005&uuid_53kf=ef78cd34f0fd7c1c79697c28059e9be5&u_cust_id=&u_cust_name=&u_custom_info=&tfrom=2"+force_kf;
			var popParam = $53.getPopParam();
			if(popParam != ''){   //判断是否是调JS-SDK弹出强制对话框
				openurl += popParam;
			}
			if (invite_kf != undefined && invite_kf != '') {
				last_invite_kf = invite_kf;
			}
			if(type==1){
				location.href = openurl;
			}else if(type==2){
				var itop = 200;
				var ileft = 200;
				try{
					itop = (window.screen.height - 600)/2;
					ileft = (window.screen.width - 800)/2;
				}catch(e){}
				try{
					chatWindow = window.open(openurl,"","height=600,width=800,top="+itop+",left="+ileft+",status=yes,toolbar=no,menubar=no,resizable=yes,scrollbars=no,location=no,titlebar=no");
					if(chatWindow==null){
						location.href = openurl + '&timeStamp=' + new Date().getTime();
					}else{
						chatWindow.focus();
						chatWindow.opener = window;
					}
				}catch(e){
					location.href = openurl + '&timeStamp=' + new Date().getTime();	// 傲游
				}
			}else{
				var open_mini_windown = $53("iframe_company_mini").getAttribute("open_mini_windown");
				if (open_mini_windown == '1' && "hz1" == 'www111'){//品房阁需求 处理
					if (last_invite_kf != '') {
						acc_get_force = true;
						var lnk_msg = 'sendLNK{#53#}'+last_invite_kf;
						try{
							document.getElementById('iframe_company_mini').contentWindow.postMessage(lnk_msg,"https://www30.53kf.com/webCompany.php?kf_sign=zgyMzMTc3McxNzE0ODYwMzQyNzI0MDA1NzIyNDM0NjI=&arg=10243462&style=1&kflist=off&kf=info%40minew.com&zdkf_type=1&lnk_overflow=0&language=en&charset=GBK&username=&userinfo=&introurl=&lyurl=&lytype=0&copartner=&referer=https%3A%2F%2Fwww.minew.com%2Fproduct%2Fi3-robust-beacon%2F&keyword=&brief=&logo=&question=&uid=37b112595b36ac4dcb2bebb55cbb27e9&guest_id=14860342724005&uuid_53kf=ef78cd34f0fd7c1c79697c28059e9be5&u_cust_id=&u_cust_name=&u_custom_info=&tfrom=2");
						}catch(e){}
					}
					return;
				} 
				$53("iframe_company_mini").setAttribute("open_mini_windown",'1');

				if('1' == 0){
					acpt_force_kf(force_kf);
					var timer=setInterval(function () {
						if($53("hz6d_mnkh_content")){
							hz6d_showContent();
							clearInterval(timer);
						}
					},100);
				}else{
					var openurl_mini = openurl;
					var tpl = "";
					if(openurl_mini.match(/&tpl=[^&]*/gim)!=null){
						openurl_mini = openurl_mini.replace(/&tpl=[^&]*/gim, "&tpl=minichat2");
					}else{
						tpl = "&tpl=minichat2";
					}
					$53("iframe_company_mini").src = openurl_mini + tpl + '&timeStamp=' + new Date().getTime()+'&interface_color=1&interface_theme=1&minchat_style=1';
					var div = $53("div_company_mini");
					hz6d_company_mini = new hz6d_div_scroll(div);
					hz6d_company_mini.start();
					div.style.display = "";
					if (miniToOpenTime > 0) {
						miniToOpenTimer = setTimeout(function () {
							show_floatWindow('zdfq');
						},miniToOpenTime);
					}
				}
				is_close = 0;
				$53.callBackFun("miniShow");
			}
			force_kf = "";
			// onliner_zdfq = 2;
			// hidden_ivt();
		}catch(e){}
	}
			
	// mini窗口点击阻止冒泡
	document.getElementById("div_company_mini").onclick = function(e){
		window.event? window.event.cancelBubble = true : e.stopPropagation();
	}
	// 悬浮邀请框滚动
	function hz6d_div_scroll(d){
		var self = this;
		this.div = d;
		this.right = 0;
		this.bottom = 0;
		this.timer = 0;
		this.posX=this.posY=this.posR=this.posB=0;
		this.scrollX=this.scrollY=false;

		this.start = function(){
			this.goPosition();
			this.timer = setInterval(this.scroll, 10);
			this.move();
		}
		this.stop = function(){
			if(this.timer!=0){ clearInterval(this.timer); }
		}
		this.goPosition = function(){
			this.right = 30;
			this.bottom = 30;
			this.right_per = parseInt(0)/100;
			this.bottom_per = parseInt(0)/100;
			var wid = $53.getWH().W;
			var hei = $53.getWH().H;
			if(0 == 0){
				if(is_right=='l'){
					var right=parseInt(this.right);
					right=wid-right-parseInt($53("div_company_mini").style.width);
					this.div.style.right = right + "px";
				}
				else{
					this.div.style.right = this.right + "px";
				}
				if(is_top=='t'){
					var bottom=parseInt(this.bottom);
					bottom=hei-bottom-parseInt($53("div_company_mini").style.height);
					this.div.style.bottom = bottom + "px";
				}else{
					this.div.style.bottom = this.bottom + "px";
				}
			}else{
				logoPosition();
				this.div.style.left = (wid-parseInt(this.div.style.width))*(1-this.right_per) + 'px';
				this.div.style.top = (hei-parseInt(this.div.style.height))*(1-this.bottom_per) + 'px';
			}
		}
		this.scroll = function(){
			var scroll = hz6d_getScrollPosition();
			var cur_right = -scroll.sLeft;
			var cur_bottom = -scroll.sTop;
		}
		this.move = function(){
			this.div.onmousedown = function(e){
				window.event? window.event.cancelBubble = true : e.stopPropagation();


				if(!e) e = window.event; //如果是IE

				mini_btn_flag = false;
				self.posX = e.clientX;
				self.posY = e.clientY;
				self.posR = parseInt(self.div.style.right);
				self.posB = parseInt(self.div.style.bottom);
				self.posL = parseInt(self.div.style.left);
				self.posT = parseInt(self.div.style.top);
				if(self.div.setCapture){
					self.div.setCapture();
				}else if(window.captureEvents){
					window.captureEvents(Event.MOUSEMOVE|Event.MOUSEUP);
				}
				var d = document;
				d.onmousemove = function(ev){
					if(!ev) ev = window.event; //如果是IE
					if(Math.abs(ev.clientX - self.posX)>5 || Math.abs(ev.clientY - self.posY)>5) mini_btn_flag = true;

					if(0 == 0){
						self.div.style.right = (self.posR - (ev.clientX - self.posX)) + "px";
						self.div.style.bottom = (self.posB - (ev.clientY - self.posY)) + "px";
					}else{
						self.div.style.left = (self.posL + (ev.clientX - self.posX)) + "px";
						self.div.style.top = (self.posT + (ev.clientY - self.posY)) + "px";
					}

				}
				d.onmouseup = function(){
					//var self_height = 460;
					//if(mini_size==2){
						//self_height = 400;
					//}
					var self_height = parseInt(self.div.style.height);
					var self_width = parseInt(self.div.style.width);

					// 限制拖出区域
					if(parseInt(self.div.style.right)<0){
						self.div.style.right=0;
					};
					if(parseInt(self.div.style.bottom)<0){
						self.div.style.bottom=0;
					};
					if(parseInt(self.div.style.left)<0){
						self.div.style.left=0;
					};
					if(parseInt(self.div.style.top)<0){
						self.div.style.top=0;
					};
					if(parseInt(self.div.style.bottom)+self_height>parseInt(document.documentElement.clientHeight)){
						self.div.style.bottom = parseInt(document.documentElement.clientHeight)-self_height+"px";
					}
					if(parseInt(self.div.style.right)+self_width>parseInt(document.documentElement.clientWidth)){
						self.div.style.right = parseInt(document.documentElement.clientWidth)-self_width+"px";
					}

					if(self.div.releaseCapture){
						self.div.releaseCapture();
					}else if(window.captureEvents){
						window.captureEvents(Event.MOUSEMOVE|Event.MOUSEUP);
					};
					d.onmousemove = null;
					d.onmouseup = null;
				}
			}
		}
	}

	//隐藏悬浮框
	function close_company_mini(){
		$53("div_company_mini").style.display = "none";
		if(zdfq_switch=='yes'){
			if (acc_reauto == 1 && zdfq_type == 1) {//浮动窗口  开启反复发起
				setTimeout(function () {
					if(is_close == 1) hz6d_showIvt3();
					else hz6d_showIvt4();
				},acc_reauto_time);
				onliner_zdfq = 0;
			}else if (zdfq_type == 3) {//交替发起
				if (first_ivt_type == 1) {
					setTimeout("hz6d_checkIvt()", acc_reauto_time);
				}else if (first_ivt_type == 2) {
					hz6d_checkIvt();
				}
			}
		}
		// if(acc_autotype == 3) {onliner_zdfq = 3;document.cookie = "onliner_zdfq72243462="+onliner_zdfq;}
		hz6d_startReautoTimer();//邀请框反复发起
		//添加cookie 实现整个域读取
		if(acc_reauto == 1) {
			document.cookie = "my_acc_reauto_time=" + new Date().getTime() + ";path=/";
		} else { //没有反复开启弹出窗口  删除cookie
			document.cookie = "my_acc_reauto_time=null;path=/";
		}
	}

	var ivt_top = 0;
	var ivt_left = 0;

	var ivt_width="402";
	var ivt_height="180";

	var hz6d_effect_time = 200;
	var hz6d_effect_timer = 10;
    	//获取邀请框的宽高
	function get_wh(){
		var ivt_obj=document.getElementById("acc_title").getElementsByTagName("div");
		var ivt_width=0;
		var ivt_height=0;
		for(var i=0;i<ivt_obj.length;i++){
			var width=parseInt((ivt_obj[i].style.width).replace(/px/ig,""));
			var height=parseInt((ivt_obj[i].style.height).replace(/px/ig,""));
			if(width>ivt_width) ivt_width=width;
			if(height>ivt_height) ivt_height=height;
		}
		return {"width":ivt_width,"height":ivt_height};
	}

	// 显示邀请框
	function get_ACCWindow(){
		var ivtPosition = hz6d_getIvtPosition();

		if(zdyivt==1){
			ivt_height_init = zdyivt_height;
			ivt_width_init = zdyivt_width;
		}else{
			ivt_height_init = "180px";
			ivt_width_init = "402px";
		}
		$53("kfivtwin").style.height = ivt_height_init;
		$53("kfivtwin").style.width = ivt_width_init;

		try{
			$53("kfivtwin").style.zIndex = "10088";
			$53("kfivtwin").style.fontSize = "12px";
			$53("kfivtwin").style.position = "absolute";
			if(how_float==1 && hasdoctype) $53("kfivtwin").style.position = "fixed";

			$53("kfiframe").style.width = $53("kfivtwin").clientWidth + 0 + "px";
			$53("kfiframe").style.height = $53("kfivtwin").clientHeight + 0 + "px";
			$53("kfiframe").style.position = "absolute";
			if(how_float==1 && hasdoctype) $53("kfiframe").style.position = "fixed";
			$53("kfiframe").style.filter = "alpha(opacity=1)";
			$53("kfiframe").style.display = "";
		}catch(e){}

		var openurl = "https://www30.53kf.com/webCompany.php?kf_sign=zgyMzMTc3McxNzE0ODYwMzQyNzI0MDA1NzIyNDM0NjI=&arg=10243462&style=1&kflist=off&kf=info%40minew.com&zdkf_type=1&lnk_overflow=0&language=en&charset=GBK&username=&userinfo=&introurl=&lyurl=&lytype=0&copartner=&referer=https%3A%2F%2Fwww.minew.com%2Fproduct%2Fi3-robust-beacon%2F&keyword=&brief=&logo=&question=&uid=37b112595b36ac4dcb2bebb55cbb27e9&guest_id=14860342724005&uuid_53kf=ef78cd34f0fd7c1c79697c28059e9be5&u_cust_id=&u_cust_name=&u_custom_info=&tfrom=2" + force_kf;
		if(is_autoyqk == 1){
			once_autoyqk = Number(once_autoyqk) + 1;
			if(once_autoyqk == 1){
				try{
					acc_content = $53("hz6d_acc_content").innerHTML;
				}catch(e){}
			}
			if(man_content!=""){
				try{
					$53("hz6d_acc_content").innerHTML = man_content.replace(/\"/g, '&quot;').replace(/\'/g, '&#039;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
				}catch(e){}
				man_content = "";
			}
			else{
				try{
					$53("hz6d_acc_content").innerHTML = acc_content;
				}catch(e){}
			}
		}
		else{
			if(man_content!=""){
				try{
					$53("hz6d_acc_content").innerHTML = man_content.replace(/\"/g, '&quot;').replace(/\'/g, '&#039;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
				}catch(e){}
				man_content = "";
			}else{
				try{
					$53("hz6d_acc_content").innerHTML = acc_content;
				}catch(e){}
			}
		}
		
		try{
			var isNew = hz6d_ivt_tpl.indexOf("new2011");
			var itop = 200;
			var ileft = 200;
			try{
				itop = (window.screen.height - 473)/2;
				ileft = (window.screen.width - 703)/2;
			}catch(e){}
			if(zdyivt==1 || isNew>0){
				var zdyIds = document.getElementsByTagName("div");
				for(var i=0; i<zdyIds.length; i++){
					if(zdyIds[i].id=="hz6d_53kf_invite_acc"){
						zdyIds[i].onclick = function(){onliner_zdfq=2;window.open(openurl,"_blank","height=473,width=703,top="+itop+",left="+ileft+",status=yes,toolbar=no,menubar=no,resizable=yes,scrollbars=no,location=no,titlebar=no");hidden_ivt();}
					}
				}
			}else{
				$53("hz6d_53kf_invite_acc").onclick = function(){onliner_zdfq=2;window.open(openurl,"_blank","height=473,width=703,top="+itop+",left="+ileft+",status=yes,toolbar=no,menubar=no,resizable=yes,scrollbars=no,location=no,titlebar=no");hidden_ivt();}
			}
		}catch(e){}

		if (pc_ivt_type == '2') {//新版自定义 定位百分比计算
			$53("kfivtwin").style.height = ivt_height_init;
			$53("kfivtwin").style.width = ivt_width_init;
			$53("kfivtwin").style.display = "block";
			$53("kfivtwin").style.position = 'fixed';
			$53("kfivtwin").style.top = 0;
			$53("kfivtwin").style.left = 0;
			var wid=$53.getWH().W;
			var hei=$53.getWH().H;
			var ivt_wh = get_wh();
			$53("kfivtwin").firstChild.style.left =(wid-ivt_wh.width)*(50/100) + 'px';
			$53("kfivtwin").firstChild.style.top = (hei-ivt_wh.height)*(40/100) + 'px';
			return;
		}
		

		function hz6d_open_move(iconDivMain){
			var obj = $53("kfivtwin");
			obj.style.display = "block";
			var obj_height = obj.offsetHeight;
			var obj_width = obj.offsetWidth;
			obj.style.display = "none";

			var tb_top = parseInt(iconDivMain.style.top.replace("px",""));
			var tb_left = parseInt(iconDivMain.style.left.replace("px",""));
			var tb_width = parseInt(iconDivMain.style.width.replace("px",""));
			var tb_height = parseInt(iconDivMain.style.height.replace("px",""));

			obj = $53("kfivteffect");
			obj.style.top = tb_top + "px";
			obj.style.left = tb_left + "px";
			obj.style.height = tb_height + "px";
			obj.style.width = tb_width + "px";
			obj.style.display = "block";

			var moveHeight = tb_height;
			var moveWidth	= tb_width;
			var moveTop		= tb_top;
			var moveLeft	 = tb_left;

			var offTop		 = Math.abs(tb_top-ivtPosition.top);
			var offLeft		= Math.abs(tb_left-ivtPosition.left);

			var topStep		= offTop/(hz6d_effect_time/hz6d_effect_timer);
			var leftStep	 = offLeft/(hz6d_effect_time/hz6d_effect_timer);

			var heightStep = (obj_height-tb_height)/(hz6d_effect_time/hz6d_effect_timer);
			var widthStep	= (obj_width-tb_width)/(hz6d_effect_time/hz6d_effect_timer);

			var topD = 1;
			if(tb_top-ivtPosition.top>0) { topD=-1; }
			var leftD = 1;
			if(tb_left-ivtPosition.left>0) { leftD=-1; }

			function dmove(){
				moveHeight += heightStep;
				moveWidth	+= widthStep;
				moveTop		+= topD*topStep;
				moveLeft	 += leftD*leftStep;

				if(moveWidth>obj_width){
					obj.style.display = "none";
					clearInterval(iIntervalId);
					hz6d_showIvtWindow();
				}else{
					var ivtPosition_t = hz6d_getIvtPosition();
					obj.style.height = moveHeight + 'px';
					obj.style.width = moveWidth + 'px';
					obj.style.top = moveTop + (ivtPosition_t.top-ivtPosition.top) + 'px';
					obj.style.left = moveLeft + (ivtPosition_t.left-ivtPosition.left) + 'px';
				}
			}
			var iIntervalId = setInterval(dmove, hz6d_effect_timer);
			try{iconDivMain.style.display = "none";}catch(e){}
		}

		if(hz6d_ivt_effect==1 && hz6d_kf_type==2 && hz6d_pos_model==1 && hz6d_hidden==0 && (hz6d_icon_type==3 || hz6d_icon_type==-1)){
			hz6d_checkIconDivMain();
		}else{
			hz6d_showIvtWindow();
		}

		function hz6d_showIvtWindow(){
			var ivtPosition_t = hz6d_getIvtPosition();
			if(how_float==1) var ivtPosition_t = hz6d_getIvtFixedPosition();
			hz6d_setIvtTop(ivtPosition_t.top);
			hz6d_setIvtLeft(ivtPosition_t.left);
			$53("kfivtwin").style.display = "block";
			hz6d_initScrollPosition();
			hz6d_showFreeze();
			hz6d_startScrollTimer();
		}
		function hz6d_setIvtTop(top){
			$53("kfivtwin").style.top = top + "px";
			$53("kfiframe").style.top = top + "px";
		}
		function hz6d_setIvtLeft(left){
			$53("kfivtwin").style.left = left + "px";
			$53("kfiframe").style.left = left + "px";
		}
		function hz6d_initScrollPosition(){
			var scrollPosition = hz6d_getScrollPosition();
			ivt_top = scrollPosition.sTop;
			ivt_left = scrollPosition.sLeft;
		}
		function hz6d_checkIconDivMain(){
			var iconDivMain = $53("iconDivMain"+kf_icon_id);
			if(iconDivMain!=null){
				if(hz6d_close_icon==0){
					hz6d_open_move(iconDivMain);
				}else{
					hz6d_showIvtWindow();
				}
			}else{
				setTimeout(hz6d_checkIconDivMain, 100);
			}
		}
		function hz6d_startScrollTimer(){
			if(ivt_timer==0 && how_float!=1){
				if(browser=="360" || browser=="TheWorld"){
					ivt_timer = window.setInterval("ivt_autoScroll()", 500);
				}else{
					ivt_timer = window.setInterval("ivt_autoScroll()", 10);
				}
			}
		}

		var posX;
		var posY;
		fdiv = $53("kfivtwin");
		$53("acc_title").onmousedown=function(e){
			if(!e) e = window.event;	 //如果是IE
			posX = e.clientX - parseInt(fdiv.style.left);
			posY = e.clientY - parseInt(fdiv.style.top);
			fdiv.style.zIndex=999999999999;
			this.style.zIndex=999999999999;
			try{
				var bdElm = document.querySelector('#LXB_CONTAINER .lxb-container');
				if(bdElm !== null){
					bdElm.style.zIndex = 9999
				}
			}catch(e){}
			document.onmousemove = mousemove;
			document.onmouseup = function(n){document.onmousemove = null;}
		}
		// document.onmouseup = function(){
		// 	document.onmousemove = null;
		// }
		function mousemove(ev){
			if(ev==null) ev = window.event;//如果是IE
			fdiv.style.left = (ev.clientX - posX) + "px";
			fdiv.style.top = (ev.clientY - posY) + "px";
			ivt_top = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
			ivt_left = Math.max(document.body.scrollLeft,document.documentElement.scrollLeft);

			// if(ivt_top==0) { ivt_top = document.documentElement.scrollTop; }
			// if(ivt_left==0) { ivt_left = document.documentElement.scrollLeft; }
		}
	}

	function get_ACCWindow2(){
		try{
			$53("kfivtwin").style.display = "block";
			inv.positionInv(pc_ivt_left,pc_ivt_top);
			document.getElementById("lr_con_53kf").style.marginTop =  - (document.getElementById("lr_con_53kf").offsetHeight/2) + "px";
		}catch(e){}
	}

	function hidden_ACCWindow(){
		function hz6d_close_move(iconDivMain){
			var obj = $53("kfivtwin");
			var obj_height = obj.offsetHeight;
			var obj_width = obj.offsetWidth;
			var ivtPosition = {top:obj.offsetTop,left:obj.offsetLeft};
			if(how_float==1) var ivtPosition = hz6d_getIvtPosition();
			obj.style.display = "none";

			var tb_top = parseInt(iconDivMain.style.top.replace("px",""));
			var tb_left = parseInt(iconDivMain.style.left.replace("px",""));
			var tb_width = parseInt(iconDivMain.style.width.replace("px",""));
			var tb_height = parseInt(iconDivMain.style.height.replace("px",""));

			obj = $53("kfivteffect");
			obj.style.top = ivtPosition.top + "px";
			obj.style.left = ivtPosition.left + "px";
			obj.style.height = obj_height + "px";
			obj.style.width = obj_width + "px";
			obj.style.display = "block";

			var moveHeight = obj_height;
			var moveWidth	= obj_width;
			var moveTop		= ivtPosition.top;
			var moveLeft	 = ivtPosition.left;

			var offTop		 = Math.abs(tb_top-ivtPosition.top);
			var offLeft		= Math.abs(tb_left-ivtPosition.left);

			var topStep		= offTop/(hz6d_effect_time/hz6d_effect_timer);
			var leftStep	 = offLeft/(hz6d_effect_time/hz6d_effect_timer);

			var heightStep = (obj_height-tb_height)/(hz6d_effect_time/hz6d_effect_timer);
			var widthStep	= (obj_width-tb_width)/(hz6d_effect_time/hz6d_effect_timer);

			var topD = 1;
			if(tb_top-ivtPosition.top>0) { topD=-1; }
			var leftD = 1;
			if(tb_left-ivtPosition.left>0) { leftD=-1; }

			ivtPosition = hz6d_getIvtPosition();
			function dmove()
			{
				moveHeight -= heightStep;
				moveWidth	-= widthStep;
				moveTop		-= topD*topStep;
				moveLeft	 -= leftD*leftStep;

				if(moveWidth<tb_width){
					obj.style.display = "none";
					try{iconDivMain.style.display = "block";}catch(e){}
					clearInterval(iIntervalId);
					hz6d_startReautoTimer();
				}else{
					var ivtPosition_t = hz6d_getIvtPosition();
					obj.style.height = moveHeight + 'px';
					obj.style.width = moveWidth + 'px';
					obj.style.top = moveTop + (ivtPosition_t.top-ivtPosition.top) + 'px';
					obj.style.left = moveLeft + (ivtPosition_t.left-ivtPosition.left) + 'px';
				}
			}
			var iIntervalId = setInterval(dmove, hz6d_effect_timer);
		}
		if(hz6d_ivt_effect==1 && hz6d_kf_type==2 && hz6d_pos_model==1 && hz6d_hidden==0 && (hz6d_icon_type==3 || hz6d_icon_type==-1)){
			var iconDivMain = $53("iconDivMain"+kf_icon_id);
			if(hz6d_close_icon==0){
				hz6d_close_move(iconDivMain);
			}else{
				$53("kfivtwin").style.display = "none";
				hz6d_startReautoTimer();
			}
		}else{
			$53("kfivtwin").style.display = "none";
			hz6d_startReautoTimer();
		}
	}

	//隐藏邀请框
	function hidden_ACCWindow2(){
		$53("kfivtwin").style.display = "none";
		hz6d_startReautoTimer();
	}

	function hz6d_startReautoTimer(){//邀请框反复发起
		// if(acc_reauto==1 && zdfq_switch == 'yes') { setTimeout("hz6d_checkIvt()", acc_reauto_time); }
		if(is_close == 1) return false;//如果已经结束对话  则不再执行规则
		if (acc_reauto==1 && zdfq_type==2 && zdfq_switch == 'yes') {//主动发起方式为邀请框且开启反复发起
			setTimeout("hz6d_checkIvt()", acc_reauto_time);
		}else if (zdfq_type==3 && zdfq_switch == 'yes') {//主动发起方式为交替发起
			if (onliner_zdfq == 3) {
				setTimeout(function(){
					if (document.getElementById("div_company_mini") && document.getElementById("div_company_mini").style.display!='none') {
						if (1 == 1 || 1 > 20) {
							show_floatWindow('zdfq');
						}else{
							hz6d_showIvt4();
						}
					}else{
						hz6d_showIvt3();
					}
				}, acc_reauto_time);
			}
		}
	}

	// get ivt fixed position
	function hz6d_getIvtFixedPosition(){
		var clientRect = hz6d_getClientWindow();

		if(ivt_height=="auto") { ivt_height="200"; }
		if(zdyivt==1){
			ivt_width = zdyivt_width.replace("px","");
			ivt_height = zdyivt_height.replace("px","");
		}
		if(acc_middle==1){
			acc_lr = 1;
			acc_tb = 1;
			var ivt_wh=get_wh();
			acc_left = (clientRect.width-ivt_wh.width)/2;
			acc_top = (clientRect.height-ivt_wh.height)/2-40;
		}

		if(acc_lr==2){
			var ivt_left_init = clientRect.width - acc_left - ivt_width;
		}else{
			var ivt_left_init = acc_left;
		}
		if(acc_tb==2){
			var ivt_top_init = clientRect.height - acc_top - ivt_height;
		}else{
			var ivt_top_init = acc_top;
		}
		return {top:ivt_top_init, left:ivt_left_init};
	}

	// get ivt position
	function hz6d_getIvtPosition(){
		var clientRect = hz6d_getClientWindow();

		if(ivt_height=="auto") {
			if(height_new == 0 || height_new == ''){
				ivt_height="200";
			}else{
				ivt_height=height_new;
			}
		}
		if(zdyivt==1){
			ivt_width = zdyivt_width.replace("px","");
			ivt_height = zdyivt_height.replace("px","");
		}
		if(acc_middle==1){
			acc_lr = 1;
			acc_tb = 1;
			var ivt_wh=get_wh();
			acc_left = (clientRect.width-ivt_wh.width)/2;
			acc_top = (clientRect.height-ivt_wh.height)/2-40;
		}

		var scrollPosition = hz6d_getScrollPosition();
		if(acc_lr==2){
			var ivt_left_init = scrollPosition.sLeft + clientRect.width - acc_left - ivt_width;
		}else{
			var ivt_left_init = acc_left + scrollPosition.sLeft;
		}
		if(acc_tb==2){
			var ivt_top_init = clientRect.height + scrollPosition.sTop - acc_top - ivt_height;
		}else{
			var ivt_top_init = acc_top + scrollPosition.sTop;
		}
		return {top:ivt_top_init, left:ivt_left_init};
	}

	// get scroll position
	function hz6d_getScrollPosition(){
		var s_top = document.body.scrollTop;
		var s_left = document.body.scrollLeft;
		if(s_left==0) { s_left=document.documentElement.scrollLeft; }
		if(s_top==0) { s_top=document.documentElement.scrollTop; }
		return {sTop:s_top, sLeft:s_left};
	}

	// get client width height
	function hz6d_getClientWindow(){
		var clientWidth = 0;
		var clientHeight = 0;
		if(document.documentElement && document.documentElement.scrollTop){
			clientWidth = document.documentElement.clientWidth;
			clientHeight = document.documentElement.clientHeight;
		}else if(document.body){
			clientWidth = document.body.clientWidth;
			clientHeight = document.body.clientHeight;
		}
		if(hasdoctype){
			clientHeight = document.documentElement.clientHeight;
			clientWidth = document.documentElement.clientWidth;
		}
		return {width:clientWidth, height:clientHeight};
	}

	// old client height width
	var hz6d_oldClient = hz6d_getClientWindow();
	function ivt_autoScroll(){
		var scrollPosition = hz6d_getScrollPosition();
		// new client height width
		var hz6d_newClient = hz6d_getClientWindow();

		var hz6d_kfivtwin = $53("kfivtwin");
		var hz6d_kfiframe = $53("kfiframe");

		// top change
		if(scrollPosition.sTop!=ivt_top || hz6d_oldClient.height!=hz6d_newClient.height){
			if(scrollPosition.sTop!=ivt_top){
				if(browser=="360" || browser=="TheWorld"){
					ivt_top = scrollPosition.sTop;
				}else{
					ivt_top = smoothMove(ivt_top, scrollPosition.sTop);
				}
			}
			if(hz6d_oldClient.height!=hz6d_newClient.height){
				if(browser=="360" || browser=="TheWorld"){
					hz6d_oldClient.height = hz6d_newClient.height;
				}else{
					hz6d_oldClient.height = smoothMove(hz6d_oldClient.height, hz6d_newClient.height);
				}
			}
			var hz6d_ivt_top = 0;
			if(acc_tb==2){
				hz6d_ivt_top = hz6d_oldClient.height - acc_top - ivt_height + ivt_top;
			}else{
				hz6d_ivt_top = acc_top + ivt_top;
			}

			if(browser=="360" || browser=="TheWorld"){
				if(hz6d_kfivtwin.style.display=="none"){
					hz6d_recover = false;
				}else{
					hz6d_recover = true;
					hz6d_kfivtwin.style.display = "none";
					try{
						hz6d_kfiframe.style.display = "none";
					}catch(e){}
				}
				hz6d_kfivtwin.style.top = hz6d_ivt_top+"px";
				try{
					hz6d_kfiframe.style.top = hz6d_ivt_top+"px";
				}catch(e){}
				if(hz6d_recover==true){
					hz6d_kfivtwin.style.display = "block";
					try{
						hz6d_kfiframe.style.display = "block";
					}catch(e){}
				}
			}else{
				hz6d_kfivtwin.style.top = hz6d_ivt_top+"px";
				try{
					hz6d_kfiframe.style.top = hz6d_ivt_top+"px";
				}catch(e){}
			}
		}

		// left change
		if(scrollPosition.sLeft!=ivt_left || hz6d_oldClient.width!=hz6d_newClient.width){
			if(scrollPosition.sLeft!=ivt_left){
				if(browser=="360" || browser=="TheWorld"){
					ivt_left = scrollPosition.sLeft;
				}else{
					ivt_left = smoothMove(ivt_left, scrollPosition.sLeft);
				}
			}
			if(hz6d_oldClient.width!=hz6d_newClient.width){
				if(browser=="360" || browser=="TheWorld"){
					hz6d_oldClient.width = hz6d_newClient.width;
				}else{
					hz6d_oldClient.width = smoothMove(hz6d_oldClient.width, hz6d_newClient.width);
				}
			}
			var hz6d_ivt_left = 0;
			if(acc_lr==2){
				hz6d_ivt_left = ivt_left + hz6d_oldClient.width - acc_left - ivt_width;
			}else{
				hz6d_ivt_left = acc_left + ivt_left;
			}

			if(browser=="360" || browser=="TheWorld"){
				if(hz6d_kfivtwin.style.display=="none"){
					hz6d_recover = false;
				}else{
					hz6d_recover = true;
					hz6d_kfivtwin.style.display = "none";
					try{
						hz6d_kfiframe.style.display = "none";
					}catch(e){}
				}
				hz6d_kfivtwin.style.left = hz6d_ivt_left+"px";
				try{
					hz6d_kfiframe.style.left = hz6d_ivt_left+"px";
				}catch(e){}
				if(hz6d_recover==true){
					hz6d_kfivtwin.style.display = "block";
					try{
						hz6d_kfiframe.style.display = "block";
					}catch(e){}
				}
			}else{
				hz6d_kfivtwin.style.left = hz6d_ivt_left+"px";
				try{
					hz6d_kfiframe.style.left = hz6d_ivt_left+"px";
				}catch(e){}
			}
		}
	}
	function show_floatWindow2(){
		if (document.getElementById("div_company_mini") && document.getElementById("div_company_mini").style.display!='none') {
			if (1 == 1 || 1 > 20) {
				show_floatWindow();
			}else{
				hz6d_showIvt4();
			}
		}else{
			hz6d_showIvt3();
		}
	}
	//替换连接 new
	function ivt_seturl(zdy_yqk)
	{
		var divs_str = zdy_yqk.replace(/operating="([^"]*)"/g,function(str){
			var vals = str.split('"');
			if(vals[1])
			{
				var click_str = '';
				var link_str ='';
				var target_str = '_blank';
				var hrs = '';
				var valst = vals[1].split("|");
				switch(valst[0])
				{
					case 'KF':
						var itop = 200;
						var ileft = 200;
						try{
							itop = (window.screen.height - 600)/2;
							ileft = (window.screen.width - 800)/2;
						}catch(e){}
						var click_open_url = 'window.open(\"https://www30.53kf.com/webCompany.php?kf_sign=zgyMzMTc3McxNzE0ODYwMzQyNzI0MDA1NzIyNDM0NjI=&arg=10243462&style=1&kflist=off&kf=info%40minew.com&zdkf_type=1&lnk_overflow=0&language=en&charset=GBK&username=&userinfo=&introurl=&lyurl=&lytype=0&copartner=&referer=https%3A%2F%2Fwww.minew.com%2Fproduct%2Fi3-robust-beacon%2F&keyword=&brief=&logo=&question=&uid=37b112595b36ac4dcb2bebb55cbb27e9&guest_id=14860342724005&uuid_53kf=ef78cd34f0fd7c1c79697c28059e9be5&u_cust_id=&u_cust_name=&u_custom_info=&tfrom=2\",\"_blank\",\"height=600,width=800,top='+itop+',left='+ileft+',status=yes,toolbar=no,menubar=no,resizable=yes,scrollbars=no,location=no,titlebar=no\")';
						click_open_url = encodeURIComponent(click_open_url);
						click_str ='onliner_zdfq=2;hz6d_is_exist(\"'+click_open_url+'\");hidden_ivt();';
						if (zdfq_type == 3) {

							click_str = 'onliner_zdfq=2;jtfq_type=2;show_floatWindow2();hidden_ivt();';

						}
						break;
						//click_str ='onliner_zdfq=2;get_open_start();window.open(\"https://www30.53kf.com/webCompany.php?kf_sign=zgyMzMTc3McxNzE0ODYwMzQyNzI0MDA1NzIyNDM0NjI=&arg=10243462&style=1&kflist=off&kf=info%40minew.com&zdkf_type=1&lnk_overflow=0&language=en&charset=GBK&username=&userinfo=&introurl=&lyurl=&lytype=0&copartner=&referer=https%3A%2F%2Fwww.minew.com%2Fproduct%2Fi3-robust-beacon%2F&keyword=&brief=&logo=&question=&uid=37b112595b36ac4dcb2bebb55cbb27e9&guest_id=14860342724005&uuid_53kf=ef78cd34f0fd7c1c79697c28059e9be5&u_cust_id=&u_cust_name=&u_custom_info=&tfrom=2\",\"_blank\",\"height=473,width=703,top=200,left=200,status=yes,toolbar=no,menubar=no,resizable=yes,scrollbars=no,location=no,titlebar=no\");hidden_ivt();';break;
					case 'CLOSE':
						click_str = 'onliner_zdfq=3;jtfq_type=1;hidden_ivt();'; break;
					case 'ETEL':
						click_str = 'window.open(\'https://tb.53kf.com/eht.php?company_id=72243462&style_id=106826751\',\'_blank\',\'height=400,width=300,top=200,left=500,status=yes,toolbar=no,menubar=no,resizable=no,scrollbars=no,location=no,titlebar=no\')';break;
					case 'QQ':
						if(valst[1]){
							if(valst[1].toLowerCase().indexOf('biz') > -1){
								var qq = valst[1].replace('biz','');
								link_str = 'https://www30.53kf.com/bizqq.php?qq=' + qq + '&from=' + window.encodeURIComponent(window.location.href);
							}else{
								link_str = 'tencent://message/?uin=' + valst[1];
							}
							if(valst[1] == '97559766')
								link_str="http://www.53kf.com/?www.53rj.com";
						};
						break;
					case 'MSN': if (valst[1]) {link_str = 'msnim:chat?contact=' + valst[1]; if(valst[1].indexOf('fonlue') > -1) link_str='http://www.53kf.com/?www.53rj.com';} break;
					case 'WW': if (valst[1]) link_str = 'aliim://sendmsg?touid=cntaobao' + valst[1]; if(valst[1] == 'fonlue') link_str='http://www.53kf.com/?www.53rj.com'; break;
					case 'HYLINK': if (valst[1]) link_str = valst[1]; if(valst[2]) target_str = valst[2]; hrs = 1;break;
					default: click_str = '';link_str = '';
				}
				var onclick_str = '';
				if (link_str == '' && click_str != '') onclick_str = "onclick='" + click_str + ";'";
				else if (link_str != ''&& click_str != '') onclick_str = ' onclick="' + click_str + ';window.open(\'' + link_str +'\',\'' + target_str + '\');" ';
				else if (link_str != ''&& click_str == '' && !hrs) onclick_str = ' onclick="window.open(\'' + link_str +'\');" ';
				else if (link_str != ''&& click_str == '' && hrs) onclick_str = 'href="'+ link_str+'" target="'+ target_str +'"';
				return onclick_str;
			}
		});
		return divs_str;
	}
	// if(1==0 && "off"=="on"){
	// 	if(acc_poptype==1){
	// 		setTimeout("hz6d_checkIvt()", 500);
	// 	}else if(acc_poptype==2){
	// 		setTimeout(function () {hz6d_startReautoTimer2(acc_chattype);}, 500);
	// 	}
	// }
	setTimeout(function(){
		var imgdragstart = function(){return false;};
		try {
			var hid_img = $53('kfivtwin').getElementsByTagName('img');
			for(i in hid_img)hid_img[i].ondragstart=imgdragstart;
			$53('acc_title').style.overflow = 'visible'; // 修正bug
		} catch(e){}
	},2000);

	//pc邀请框代码加载完成回调
	try{
		$53.apiOnload("pc");
	}catch(e){}