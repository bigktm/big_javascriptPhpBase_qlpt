// JavaScript Document
function obj(){
	td = navigator.appName;
	if(td == "Microsoft Internet Explorer"){
		dd = new ActiveXObject("Microsoft.XMLHTTP");	
	}else{
		dd = new XMLHttpRequest();	
	}
	return dd;
}

	//hàm xử lý phân trang ds chùa
		http_pg = obj();
		function loadXMLDoc(page){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "listHouse.php?page_ds="+page;
			http_pg.open("get",url,true);
			http_pg.onreadystatechange=process;
			http_pg.send(null);	
		}


		function process(){
			if(http_pg.readyState == 4 && http_pg.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_pg.responseText;	
			}
		}
		
		//hàm xử lý phân trang ảnh
		http_ipg = obj();
		function loadImage(page){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "cont_index.php?page_ds="+page;
			http_ipg.open("get",url,true);
			http_ipg.onreadystatechange=process_ipg;
			http_ipg.send(null);	
		}


		function process_ipg(){
			if(http_ipg.readyState == 4 && http_ipg.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_ipg.responseText;	
			}
		}
		//chi tiết chùa
		http_dpg = obj();
		function detailPago(page,nit){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "detailHouse.php?page="+page+"&nit="+nit;
			http_dpg.open("get",url,true);
			http_dpg.onreadystatechange=process_dpg;
			http_dpg.send(null);	
		}


		function process_dpg(){
			if(http_dpg.readyState == 4 && http_dpg.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_dpg.responseText;	
			}
		}
		
	//hàm xử lý trang giới thiệu
	http_in = obj();
		function loadGT(){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			http_in.open("get","introduce.php",true);
			http_in.onreadystatechange=processs;
			http_in.send(null);	
		}

		function processs(){
			if(http_in.readyState == 4 && http_in.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_in.responseText;	
			}
		}
		
		//hàm xử lý reload content_ri_top
		http_rlcrt = obj();
		function reloadcont_ri_top(){
			document.getElementById("content_ri_top").innerHTML = "Đang xử lý...";
			url = "menu_cont.php";
			http_rlcrt.open("get",url,true);
			http_rlcrt.onreadystatechange=process_rlcrt;
			http_rlcrt.send(null);	
		}

		function process_rlcrt(){
			if(http_rlcrt.readyState == 4 && http_rlcrt.status == 200){
				document.getElementById("content_ri_top").innerHTML = http_rlcrt.responseText;	
			}
		}
		//hàm xử lý reload content_ri_bot
		http_rlcrb = obj();
		function reloadcont_ri_bot(){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "cont_index.php";
			http_rlcrb.open("get",url,true);
			http_rlcrb.onreadystatechange=process_rlcrb;
			http_rlcrb.send(null);	
		}

		function process_rlcrb(){
			if(http_rlcrb.readyState == 4 && http_rlcrb.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_rlcrb.responseText;	
			}
		}
	//hàm xử lý login
		http_li = obj();
		function login(){
			var user = encodeURI(document.getElementById('user').value);
			var pass = encodeURI(document.getElementById('pass').value);
			document.getElementById("banner").innerHTML = "Đang xử lý...";
			url = "login.php?user="+user+"&pass="+pass;
			http_li.open("get",url,true);
			http_li.onreadystatechange=process_li;
			http_li.send(null);	
		}

		function process_li(){
			if(http_li.readyState == 4 && http_li.status == 200){
				document.getElementById("banner").innerHTML = http_li.responseText;	
			}
		}
	//hàm xử lý logout
		http_lo = obj();
		function logout(){
			document.getElementById("banner").innerHTML = "Đang xử lý...";
			url = "logout.php";
			http_lo.open("get",url,true);
			http_lo.onreadystatechange=process_lo;
			http_lo.send(null);	
		}

		function process_lo(){
			if(http_lo.readyState == 4 && http_lo.status == 200){
				document.getElementById("banner").innerHTML = http_lo.responseText;	
			}
		}
	//hàm xử lý đăng ký
		http_rg = obj();
		function register(){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "register.php";
			http_rg.open("get",url,true);
			http_rg.onreadystatechange=process_rg;
			http_rg.send(null);	
		}

		function process_rg(){
			if(http_rg.readyState == 4 && http_rg.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_rg.responseText;	
			}
		}
	//hàm xử lý reload banner
		http_rlbn = obj();
		function reloadbanner(){
			document.getElementById("banner").innerHTML = "Đang xử lý...";
			url = "formLogin.php";
			http_rlbn.open("get",url,true);
			http_rlbn.onreadystatechange=process_rlbn;
			http_rlbn.send(null);	
		}

		function process_rlbn(){
			if(http_rlbn.readyState == 4 && http_rlbn.status == 200){
				document.getElementById("banner").innerHTML = http_rlbn.responseText;	
			}
		}
		//hàm xử lý reload banner user
		http_rlbnu = obj();
		function reloadbanner_user(user_log){
			document.getElementById("banner").innerHTML = "Đang xử lý...";
			url = "formLogin.php?user_log="+user_log;
			http_rlbnu.open("get",url,true);
			http_rlbnu.onreadystatechange=process_rlbu;
			http_rlbnu.send(null);	
		}

		function process_rlbnu(){
			if(http_rlbnu.readyState == 4 && http_rlbnu.status == 200){
				document.getElementById("banner").innerHTML = http_rlbnu.responseText;	
			}
		}
		
	//hàm xử lý kiểm tra thông tin đăng ký gồm 3 hàm
	var nams;
	var machua;
		//hàm 1
		function listnams(namsinh){
			nams = namsinh;
		}
		//hàm 2
		function listchua(mac){
			 machua = mac;
		}
		//hàm 3
		http_crg = obj();
		function checkrg(namsinh,machuar){
			var hoten = encodeURI(document.getElementById('ht').value);
			var tennd = encodeURI(document.getElementById('tennd').value);
			var email = encodeURI(document.getElementById('email').value);
			var cmnd = encodeURI(document.getElementById('cmnd').value);
			var mk = encodeURI(document.getElementById('mk').value);
			var mkk = encodeURI(document.getElementById('mkk').value);
			var sdt = encodeURI(document.getElementById('sdt').value);
			var namsi;
			var mach;
			if(! nams){
				namsi = namsinh;
			}else{namsi = nams;}
			
			if(! machua){
				mach = machuar;
			}else{mach = machua;}
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "checkRegister.php?tennd="+tennd+"&email="+email+"&hoten="+hoten+"&cmnd="+cmnd+"&mk="+mk+"&mkk="+mkk+"&sdt="+sdt+"&nams="+namsi+"&machua="+mach;
			http_crg.open("get",url,true);
			http_crg.onreadystatechange=process_crg;
			http_crg.send(null);	
		}

		function process_crg(){
			if(http_crg.readyState == 4 && http_crg.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_crg.responseText;	
			}
		}
		
		
	



