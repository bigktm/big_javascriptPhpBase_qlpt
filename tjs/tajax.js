function object(){
	td = navigator.appName;
	if(td == "Microsoft Internet Explorer"){
		dd = new ActiveXObject("Microsoft.XMLHTTP");	
	}else{
		dd = new XMLHttpRequest();	
	}
	return dd;
}

	
	//hàm xử lý hồ sơ cá nhân
		http_hs = object();
		function loadhs(){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tuser/tProfile/profile.php";
			http_hs.open("get",url,true);
			http_hs.onreadystatechange=process_hs;
			http_hs.send(null);	
		}
		
		function process_hs(){
			if(http_hs.readyState == 4 && http_hs.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_hs.responseText;	
			}
		}
	//hàm xử lý cập nhập thông tin user
		//hàm xử lý kiểm tra thông tin đăng ký gồm 3 hàm
			var namst;
			var maphuongt;
			var maduongt;
			var maquant;
			var mathanhphot;
				//hàm lấy năm sinh
				function listnamst(namsinh){
					namst = namsinh;
				}
				//hàm lấy mã phường
				function listphuongt(maphuong){
					maphuongt = maphuong;
				}
				//hàm lấy mã đường
				function listduongt(maduong){
					maduongt = maduong;
				}
				//hàm lấy mã quận
				function listquant(maquan){
					maquant = maquan;
				}
				//hàm lấy mã tp
				function listthanhphot(mathanhpho){
					mathanhphot = mathanhpho;
				}
		//hàm update thong tin user	
		http_uppr = object();
		function updatePr(idnt,namstt,maphuongtt,maduongtt,maqhtt,matptt){
				var namsi = 'null';
				var maph = 'null';
				var mad = 'null';
				var maqh = 'null';
				var matp = 'null';
			var hs_ten = encodeURI(document.getElementById('hs_ten').value);
			var hs_nit = encodeURI(document.getElementById('hs_nit').value);
			var hs_pass = encodeURI(document.getElementById('hs_pass').value);
			var hs_trt = encodeURI(document.getElementById('hs_trt').value);
			var hs_sdt = encodeURI(document.getElementById('hs_sdt').value);
			var hs_email = encodeURI(document.getElementById('hs_email').value);
			var hs_cmnd = encodeURI(document.getElementById('hs_cmnd').value);
			var hs_idnt = idnt;
			var hs_tdk = encodeURI(document.getElementById('hs_tdk').value);
			var hs_tdv = encodeURI(document.getElementById('hs_tdv').value);
			var hs_mtdc = encodeURI(document.getElementById('hs_mtdc').value);
			if(! namst){
				namsi = namstt;
			}else{namsi = namst;}	
			
			if(! maphuongt){
				maph = maphuongtt;
			}else{maph = maphuongt;}
			
			if(! maduongt){
				mad = maduongtt;
			}else{mad = maduongt;}
			if(! maquant){
				maqh = maqhtt;
			}else{maqh = maquant;}
			if(! mathanhphot){
				matp = matptt;
			}else{matp = mathanhphot;}
			
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tuser/tProfile/updatePro.php?up_ten="+hs_ten+"&up_email="+hs_email+"&up_pass="+hs_pass+"&up_trt="+hs_trt+
			"&up_sdt="+hs_sdt+"&up_cmnd="+hs_cmnd+"&up_nit="+hs_nit+"&up_idnt="+hs_idnt+
			"&up_tdk="+hs_tdk+"&up_tdv="+hs_tdv+"&up_mtdc="+hs_mtdc+"&up_mad="+mad+
			"&up_maqh="+maqh+"&up_tuoi="+namsi+"&up_mapx="+maph+"&up_matp="+matp;
			http_uppr.open("get",url,true);
			http_uppr.onreadystatechange=process_uppr;
			http_uppr.send(null);	
		}
		
		function process_uppr(){
			if(http_uppr.readyState == 4 && http_uppr.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_uppr.responseText;	
			}
		}
		//hàm danh sach phong tro
		http_dsp = object();
		function dsPhong(idnt){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tuser/tProfile/listBoard.php?lb_idnt="+idnt;
			http_dsp.open("get",url,true);
			http_dsp.onreadystatechange=process_dsp;
			http_dsp.send(null);	
		}
		
		function process_dsp(){
			if(http_dsp.readyState == 4 && http_dsp.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_dsp.responseText;	
			}
		}
		//hàm load phan trang danh sach phong tro
		http_dspre = object();
		function loadListBoard(idnt,page){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tuser/tProfile/listBoard.php?lb_idnt="+idnt+"&page_ds="+page;
			http_dspre.open("get",url,true);
			http_dspre.onreadystatechange=process_dspre;
			http_dspre.send(null);	
		}
		
		function process_dspre(){
			if(http_dspre.readyState == 4 && http_dspre.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_dspre.responseText;	
			}
		}
		
		//hàm lấy tinh trang
		var ttrt='null';
				function listttr(ttrd){
				ttrt=ttrd;
				}
		//hàm xử lý cập nhật phòng trọ
		http_upp = object();
		function upHBoard(idpt,idnt,tinhtrangl,dem){
			var dientich = encodeURI(document.getElementById('dientich'+dem).value);
			var loai = encodeURI(document.getElementById('loai'+dem).value);
			var gia = encodeURI(document.getElementById('gia'+dem).value);
			var chuthich = encodeURI(document.getElementById('chuthich'+dem).value);
			var tinhtrang = 'null';
			if(! ttrt){
				tinhtrang = tinhtrangl;
			}else{tinhtrang = ttrt;}	
			url = "tuser/tProfile/upBoard.php?ub_idnt="+idnt+"&ub_idpt="+idpt+"&ub_dientich="+dientich+"&ub_loai="+loai+"&ub_gia="+gia+"&ub_tinhtrang="+tinhtrang+"&ub_chuthich="+chuthich;
			http_upp.open("get",url,true);
			http_upp.onreadystatechange=process_upp;
			http_upp.send(null);	
		}
		
		function process_upp(){
			if(http_upp.readyState == 4 && http_upp.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_upp.responseText;	
			}
		}
		//xóa phòng trọ
				http_ptde = object();
				function deB(idnt,mab){
					document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
					url = "tuser/tProfile/deHBoard.php?mabo="+mab+"&mant="+idnt;
					http_ptde.open("get",url,true);
					http_ptde.onreadystatechange=process_ptde;
					http_ptde.send(null);	
				}
				
				function process_ptde(){
					if(http_ptde.readyState == 4 && http_ptde.status == 200){
						document.getElementById("content_ri_bot").innerHTML = http_ptde.responseText;	
					}
				}
		//thêm phòng trọ
				http_ptadd = object();
				function addB(mant){
					document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
					url = "tuser/tProfile/addHBoard.php?mantr="+mant;
					http_ptadd.open("get",url,true);
					http_ptadd.onreadystatechange=process_ptadd;
					http_ptadd.send(null);	
				}
				
				function process_ptadd(){
					if(http_ptadd.readyState == 4 && http_ptadd.status == 200){
						document.getElementById("content_ri_bot").innerHTML = http_ptadd.responseText;	
					}
				}
				//hàm lấy tinh trang
				var ttrtt='null';
				function listttrt(ttrd){
				ttrtt=ttrd;
				}
				//hàm lấy loai phong
				var lptr='null';
				function listlptr(tthd){
				lptr=tthd;
				}
		//xư ly thêm phòng trọ
				http_ptaddck = object();
				function ckAddB(mant,mapt,tinhtrangl,lpl){
					var dientich = encodeURI(document.getElementById('dientichck').value);
					var loai ='null';
					var gia = encodeURI(document.getElementById('giack').value);
					var chuthich = encodeURI(document.getElementById('chuthichck').value);
					var tinhtrang = 'null';
					if(! ttrtt){
						tinhtrang = tinhtrangl;
					}else{tinhtrang = ttrtt;}
					if(! lptr){
						loai = lpl;
					}else{loai = lptr;}
					document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
					url = "tuser/tProfile/ckAddBoard.php?ck_idnt="+mant+"&ck_idpt="+mapt+"&ck_dientich="+dientich+"&ck_loai="+loai+"&ck_gia="+gia+"&ck_tinhtrang="+tinhtrang+"&ck_chuthich="+chuthich;
			http_ptaddck.open("get",url,true);
					http_ptaddck.onreadystatechange=process_ptaddck;
					http_ptaddck.send(null);	
				}
				
				function process_ptaddck(){
					if(http_ptaddck.readyState == 4 && http_ptaddck.status == 200){
						document.getElementById("content_ri_bot").innerHTML = http_ptaddck.responseText;	
					}
				}
		//hàm xử lý tìm kiếm
		//hàm xử lý kiểm tra thông tin gồm 7 hàm
			var tpl;
			var qhl;
			var pxl;
			var dul;
			var trl;
			var gil;
			var lpl;
				//hàm lấy tpho
				function listtp(tpl){
					 tpl = document.getElementById("chontp").value;
				}
				//hàm lấy mã phường
				function listqh(qhl){
					 qhl = document.getElementById("chonqh").value;
				}
				//hàm lấy mã đường
				function listpx(pxl){
					 pxl = document.getElementById("chonpx").value;
				}
				//hàm lấy tpho
				function listdu(dul){
					 dul = document.getElementById("chondp").value;
				}
				//hàm lấy mã phường
				function listtr(trl){
					 trl = document.getElementById("chontr").value;
				}
				//hàm lấy mã đường
				function listgi(gil){
					 gil = document.getElementById("chongi").value;
				}
				//hàm lấy mã đường
				function listlp(lpl){
					 lpl = document.getElementById("chonlp").value;
				}
		//hàm update thong tin user	
		http_sea = object();
		function SearchT(tpb,qhb,pxb,dub,trb,gib,lpb){
				var tpt='null';
				var qht='null';
				var pxt='null';
				var dut='null';
				var trt='null';
				var git='null';
				var lpt='null';
			if(! tpl){
				tpt = tpb;
			}else{tpt = tpl;}	
			
			if(! qhl){
				qht = qhb;
			}else{qht = qhl;}
			
			if(! pxl){
				pxt = pxb;
			}else{pxt = pxl;}
			if(! dul){
				dut = dub;
			}else{dut = dul;}	
			
			if(! trl){
				trt = trb;
			}else{trt = trl;}
			
			if(! gil){
				git = gib;
			}else{git = gil;}
			if(! lpl){
				lpt = lpb;
			}else{lpt = lpl;}
			
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "Search.php?stp="+tpt+"&sqh="+qht+"&spx="+pxt+"&sdu="+dut+"&str="+trt+"&sgi="+git+"&slp="+lpt;
			http_sea.open("get",url,true);
			http_sea.onreadystatechange=process_sea;
			http_sea.send(null);	
		}
		
		function process_sea(){
			if(http_sea.readyState == 4 && http_sea.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_sea.responseText;	
			}
		}
		
		//load phân trang search
		http_pgs = obj();
		function loadSearch(page,tpt,qht,pxt,dut,trt,git,lpt){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "Search.php?page_ds="+page+"&stp="+tpt+"&sqh="+qht+"&spx="+pxt+"&sdu="+dut+"&str="+trt+"&sgi="+git+"&slp="+lpt;
			http_pgs.open("get",url,true);
			http_pgs.onreadystatechange=process_ps;
			http_pgs.send(null);	
		}


		function process_ps(){
			if(http_pgs.readyState == 4 && http_pgs.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_pgs.responseText;	
			}
		}
		//load phân trang map
		http_pgm = obj();
		function loadMap(tdkl,tdvl){
			document.getElementById("maps").innerHTML = "Đang xử lý...";
			initialize(tdkl,tdvl);
			}
//ql chùa	
		//hàm xử lý quản lý chùa
		http_qlchua = object();
		function manaPago(pages){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tadmin/tmanaPagoda/manaPagoda.php?page_ds="+pages;
			http_qlchua.open("get",url,true);
			http_qlchua.onreadystatechange=process_qlc;
			http_qlchua.send(null);	
		}
		
		function process_qlc(){
			if(http_qlchua.readyState == 4 && http_qlchua.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_qlchua.responseText;	
			}
		}
		//hàm xử lý cật nhật
		http_qlcup = object();
		function upPago(machua){
			
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tadmin/tmanaPagoda/updatePago.php?ql_machua="+machua;
			http_qlcup.open("get",url,true);
			http_qlcup.onreadystatechange=process_cup;
			http_qlcup.send(null);	
		}
		
		function process_cup(){
			if(http_qlcup.readyState == 4 && http_qlcup.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_qlcup.responseText;	
			}
		}
		//hàm upload file
		http_up = object();
		function upLoad(){
			
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "upload.php";
			http_up.open("get",url,true);
			http_up.onreadystatechange=process_up;
			http_up.send(null);	
		}
		
		function process_up(){
			if(http_up.readyState == 4 && http_up.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_up.responseText;	
			}
		}
		//hàm xử lý upload
		http_tbup = object();
		function tbupload(){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tupload.php";
			http_tbup.open("get",url,true);
			http_tbup.onreadystatechange=process_tbup;
			http_tbup.send(null);	
		}
		
		function process_tbup(){
			if(http_tbup.readyState == 4 && http_tbup.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_tbup.responseText;	
			}
		}
		//hàm kiểm tra và cật nhật thông tin chùa
		//hàm lấy mã phường
		var maphuong_pago;
		var maduong_pago;
				function listphuong_pago(maphuong){
					maphuong_pago = maphuong;
				}
				//hàm lấy mã đường
				function listduong_pago(maduong){
					maduong_pago = maduong;
				}
		http_qlcckup = object();
		function ckUpPago(machua,maph,mad){
			var maph_p;
			var mad_p;
			if(! maphuong_pago){
				maph_p = maph;
			}else{maph_p = maphuong_pago;}
			
			if(! maduong_pago){
				mad_p = mad;
			}else{mad_p = maduong_pago;}
			var hs_chua = encodeURI(document.getElementById('hs_chua').value);
			var hs_trutri = encodeURI(document.getElementById('hs_trutri').value);
			var hs_sophattu = encodeURI(document.getElementById('hs_sophattu').value);
			var hs_sdtchua = encodeURI(document.getElementById('hs_sdtchua').value);
			var hs_diachi = encodeURI(document.getElementById('hs_diachi').value);
			var hs_tieusu = encodeURI(document.getElementById('hs_tieusu').value);
			
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tadmin/tmanaPagoda/checkUpPago.php?up_machua="+machua+"&up_chua="+hs_chua+"&up_trutri="+hs_trutri+"&up_sophattu="+hs_sophattu+"&up_sdtchua="+hs_sdtchua+"&up_diachi="+hs_diachi+"&up_mad="+mad_p+"&up_tieusu="+hs_tieusu+"&up_mapx="+maph_p;
			http_qlcckup.open("get",url,true);
			http_qlcckup.onreadystatechange=process_cckup;
			http_qlcckup.send(null);	
		}
		
		function process_cckup(){
			if(http_qlcckup.readyState == 4 && http_qlcckup.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_qlcckup.responseText;	
			}
		}
		//hàm xử lý xóa chùa
		http_qlcde = object();
		function dePago(machua){
			
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tadmin/tmanaPagoda/deletePago.php?ql_machua="+machua;
			http_qlcde.open("get",url,true);
			http_qlcde.onreadystatechange=process_cde;
			http_qlcde.send(null);	
		}
		
		function process_cde(){
			if(http_qlcde.readyState == 4 && http_qlcde.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_qlcde.responseText;	
			}
		}
		//hàm xử lý thêm mới chùa
		http_qlcadd = object();
		function addPago(){
			
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tadmin/tmanaPagoda/addPago.php";
			http_qlcadd.open("get",url,true);
			http_qlcadd.onreadystatechange=process_cadd;
			http_qlcadd.send(null);	
		}
		
		function process_cadd(){
			if(http_qlcadd.readyState == 4 && http_qlcadd.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_qlcadd.responseText;	
			}
		}
		//thực hiện lấy thông tin và kiểm tra
		var maphuong_apago;
		var maduong_apago;
				function listphuong_apago(maphuong){
					maphuong_apago = maphuong;
				}
				//hàm lấy mã đường
				function listduong_apago(maduong){
					maduong_apago = maduong;
				}
		http_qlcckadd = object();
		function ckAddPago(machua,maph,mad){
			var maph_p;
			var mad_p;
			if(! maphuong_apago){
				maph_p = maph;
			}else{maph_p = maphuong_apago;}
			
			if(! maduong_apago){
				mad_p = mad;
			}else{mad_p = maduong_apago;}
			var hs_chua = encodeURI(document.getElementById('hs_chua').value);
			var hs_trutri = encodeURI(document.getElementById('hs_trutri').value);
			var hs_sophattu = encodeURI(document.getElementById('hs_sophattu').value);
			var hs_sdtchua = encodeURI(document.getElementById('hs_sdtchua').value);
			var hs_diachi = encodeURI(document.getElementById('hs_diachi').value);
			var hs_tdvy = encodeURI(document.getElementById('hs_tdvy').value);
			var hs_tdki = encodeURI(document.getElementById('hs_tdki').value);
			var hs_tieusu = encodeURI(document.getElementById('hs_tieusu').value);
			
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tadmin/tmanaPagoda/checkAddPago.php?up_machua="+machua+"&up_chua="+hs_chua+"&up_trutri="+hs_trutri+"&up_sophattu="+hs_sophattu+"&up_sdtchua="+hs_sdtchua+"&up_diachi="+hs_diachi+"&up_tdvy="+hs_tdvy+"&up_tdki="+hs_tdki+"&up_mad="+mad_p+"&up_tieusu="+hs_tieusu+"&up_mapx="+maph_p;
			http_qlcckadd.open("get",url,true);
			http_qlcckadd.onreadystatechange=process_cckadd;
			http_qlcckadd.send(null);	
		}
		
		function process_cckadd(){
			if(http_qlcckadd.readyState == 4 && http_qlcckadd.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_qlcckadd.responseText;	
			}
		}
		
//quản lý người dùng	
		//hàm xử lý quản lý người dùng
		http_qluser = object();
		function manaUser(pages){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tadmin/tmanaUser/manaUser.php?page_ds="+pages;
			http_qluser.open("get",url,true);
			http_qluser.onreadystatechange=process_qlu;
			http_qluser.send(null);	
		}
		
		function process_qlu(){
			if(http_qluser.readyState == 4 && http_qluser.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_qluser.responseText;	
			}
		}
		//hàm xử lý xóa người dùng
		http_qlude = object();
		function deUser(matk){
			
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tadmin/tmanaUser/deleteUser.php?ql_user="+matk;
			http_qlude.open("get",url,true);
			http_qlude.onreadystatechange=process_ude;
			http_qlude.send(null);	
		}
		
		function process_ude(){
			if(http_qlude.readyState == 4 && http_qlude.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_qlude.responseText;	
			}
		}
		//hàm xử lý cật nhật
		http_qluup = object();
		function upUser(matk){
			
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tadmin/tmanaUser/updateUser.php?ql_user="+matk;
			http_qluup.open("get",url,true);
			http_qluup.onreadystatechange=process_uup;
			http_qluup.send(null);	
		}
		
		function process_uup(){
			if(http_qluup.readyState == 4 && http_qluup.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_qluup.responseText;	
			}
		}
		
		//hàm kiểm tra và cật nhật thông tin người dùng
		//hàm lấy năm sinh
		var nams_user;
		var machua_user;
				function listnams_upUser(nams){
					nams_user = nams;
				}
				//hàm lấy mã chùa
				function listchua_upUser(machua){
					machua_user = machua;
				}
		http_qluckup = object();
		function ckUpUser(matk,namsi,mach){
			var nams_u;
			var mach_u;
			if(! nams_user){
				nams_u = namsi;
			}else{nams_u = nams_user;}
			
			if(! machua_user){
				mach_u = mach;
			}else{mach_u = machua_user;}
			var hs_tennd = encodeURI(document.getElementById('hs_tennd').value);
			var hs_email = encodeURI(document.getElementById('hs_email').value);
			var hs_mk = encodeURI(document.getElementById('hs_mk').value);
			var hs_sdtnd = encodeURI(document.getElementById('hs_sdtnd').value);
			
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tadmin/tmanaUser/checkUpUser.php?up_matk="+matk+"&up_tennd="+hs_tennd+"&up_email="+hs_email+"&up_mk="+hs_mk+"&up_sdtnd="+hs_sdtnd+"&up_nams="+nams_u+"&up_machua="+mach_u;
			http_qluckup.open("get",url,true);
			http_qluckup.onreadystatechange=process_uckup;
			http_qluckup.send(null);	
		}
		
		function process_uckup(){
			if(http_qluckup.readyState == 4 && http_qluckup.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_qluckup.responseText;	
			}
		}
		//hàm xử lý thêm mới người dùng
		http_qluadd = object();
		function addUser(){
			
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tadmin/tmanaUser/addUser.php";
			http_qluadd.open("get",url,true);
			http_qluadd.onreadystatechange=process_uadd;
			http_qluadd.send(null);	
		}
		
		function process_uadd(){
			if(http_qluadd.readyState == 4 && http_qluadd.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_qluadd.responseText;	
			}
		}
		//thực hiện lấy thông tin và kiểm tra
		//hàm lấy năm sinh
		var nams_adduser;
		var machua_adduser;
				function listnams_addUser(nams){
					nams_adduser = nams;
				}
				//hàm lấy mã chùa
				function listchua_addUser(machua){
					machua_adduser = machua;
				}
		http_qluckadd = object();
		function ckAddUser(matk,namsi,mach){
			var nams_u;
			var mach_u;
			if(! nams_adduser){
				nams_u = namsi;
			}else{nams_u = nams_adduser;}
			
			if(! machua_adduser){
				mach_u = mach;
			}else{mach_u = machua_adduser;}
			var hs_tennd = encodeURI(document.getElementById('hs_tennd').value);
			var hs_email = encodeURI(document.getElementById('hs_email').value);
			var hs_mk = encodeURI(document.getElementById('hs_mk').value);
			var hs_sdtnd = encodeURI(document.getElementById('hs_sdtnd').value);
			
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tadmin/tmanaUser/checkAddUser.php?up_matk="+matk+"&up_tennd="+hs_tennd+"&up_email="+hs_email+"&up_mk="+hs_mk+"&up_sdtnd="+hs_sdtnd+"&up_nams="+nams_u+"&up_machua="+mach_u;
			http_qluckadd.open("get",url,true);
			http_qluckadd.onreadystatechange=process_uckadd;
			http_qluckadd.send(null);	
		}
		
		function process_uckadd(){
			if(http_qluckadd.readyState == 4 && http_qluckadd.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_qluckadd.responseText;	
			}
		}
		
//quản lý khu vực
		//hàm xử lý quản lý khu vực
		http_qlpl = object();
		function manaPlace(){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tadmin/tmanaPlace/manaPlace.php";
			http_qlpl.open("get",url,true);
			http_qlpl.onreadystatechange=process_pl;
			http_qlpl.send(null);	
		}
		
		function process_pl(){
			if(http_qlpl.readyState == 4 && http_qlpl.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_qlpl.responseText;	
			}
		}
	
	//quản lý phường xã
		http_qlplp = object();
		function qlPx(pages){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tadmin/tmanaPlace/tmanaPx/manaPx.php?page_ds="+pages;
			http_qlplp.open("get",url,true);
			http_qlplp.onreadystatechange=process_plp;
			http_qlplp.send(null);	
		}
		
		function process_plp(){
			if(http_qlplp.readyState == 4 && http_qlplp.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_qlplp.responseText;	
			}
		}
			//xử lý cập nhật
				http_qlplpup = object();
				function upPx(mapx){
					document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
					url = "tadmin/tmanaPlace/tmanaPx/upPx.php?ql_px="+mapx;
					http_qlplpup.open("get",url,true);
					http_qlplpup.onreadystatechange=process_plpup;
					http_qlplpup.send(null);	
				}
				
				function process_plpup(){
					if(http_qlplpup.readyState == 4 && http_qlplpup.status == 200){
						document.getElementById("content_ri_bot").innerHTML = http_qlplpup.responseText;	
					}
				}
			//kiểm tra thông tin cập nhật
				http_qlplpckup = object();
				function ckUpPx(mapx){
					var hs_tenpx = encodeURI(document.getElementById('hs_tenpx').value);
					document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
					url = "tadmin/tmanaPlace/tmanaPx/checkUpPx.php?up_mapx="+mapx+"&up_tenpx="+hs_tenpx;
					http_qlplpckup.open("get",url,true);
					http_qlplpckup.onreadystatechange=process_plpckup;
					http_qlplpckup.send(null);	
				}
				
				function process_plpckup(){
					if(http_qlplpckup.readyState == 4 && http_qlplpckup.status == 200){
						document.getElementById("content_ri_bot").innerHTML = http_qlplpckup.responseText;	
					}
				}
			//xóa phường xã
				http_qlplpde = object();
				function dePx(mapx){
					document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
					url = "tadmin/tmanaPlace/tmanaPx/dePx.php?ql_px="+mapx;
					http_qlplpde.open("get",url,true);
					http_qlplpde.onreadystatechange=process_plpde;
					http_qlplpde.send(null);	
				}
				
				function process_plpde(){
					if(http_qlplpde.readyState == 4 && http_qlplpde.status == 200){
						document.getElementById("content_ri_bot").innerHTML = http_qlplpde.responseText;	
					}
				}
			//Thêm phường xã
				http_qlplpadd = object();
				function addPx(){
					document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
					url = "tadmin/tmanaPlace/tmanaPx/addPx.php";
					http_qlplpadd.open("get",url,true);
					http_qlplpadd.onreadystatechange=process_plpadd;
					http_qlplpadd.send(null);	
				}
				
				function process_plpadd(){
					if(http_qlplpadd.readyState == 4 && http_qlplpadd.status == 200){
						document.getElementById("content_ri_bot").innerHTML = http_qlplpadd.responseText;	
					}
				}
			//kiểm tra thông tin cập nhật
				http_qlplpckadd = object();
				function ckAddPx(mapx){
					var hs_tenpx = encodeURI(document.getElementById('hs_tenpx').value);
					document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
					url = "tadmin/tmanaPlace/tmanaPx/checkAddPx.php?up_mapx="+mapx+"&up_tenpx="+hs_tenpx;
					http_qlplpckadd.open("get",url,true);
					http_qlplpckadd.onreadystatechange=process_plpckadd;
					http_qlplpckadd.send(null);	
				}
				
				function process_plpckadd(){
					if(http_qlplpckadd.readyState == 4 && http_qlplpckadd.status == 200){
						document.getElementById("content_ri_bot").innerHTML = http_qlplpckadd.responseText;	
					}
				}
		//quản lý đường
		http_qlpd = object();
		function qlDg(pages){
			document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
			url = "tadmin/tmanaPlace/tmanaDg/manaDuong.php?page_ds="+pages;
			http_qlpd.open("get",url,true);
			http_qlpd.onreadystatechange=process_pld;
			http_qlpd.send(null);	
		}
		
		function process_pld(){
			if(http_qlpd.readyState == 4 && http_qlpd.status == 200){
				document.getElementById("content_ri_bot").innerHTML = http_qlpd.responseText;	
			}
		}
		//Thêm đường
				http_qlpldadd = object();
				function addDg(){
					document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
					url = "tadmin/tmanaPlace/tmanaDg/addDg.php";
					http_qlpldadd.open("get",url,true);
					http_qlpldadd.onreadystatechange=process_pldadd;
					http_qlpldadd.send(null);	
				}
				
				function process_pldadd(){
					if(http_qlpldadd.readyState == 4 && http_qlpldadd.status == 200){
						document.getElementById("content_ri_bot").innerHTML = http_qlpldadd.responseText;	
					}
				}
			//kiểm tra thông tin tạo 
				http_qlpldckadd = object();
				function ckAddDg(mad){
					var hs_tend = encodeURI(document.getElementById('hs_tend').value);
					document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
					url = "tadmin/tmanaPlace/tmanaDg/checkAddDg.php?up_mad="+mad+"&up_tend="+hs_tend;
					http_qlpldckadd.open("get",url,true);
					http_qlpldckadd.onreadystatechange=process_pldckadd;
					http_qlpldckadd.send(null);	
				}
				
				function process_pldckadd(){
					if(http_qlpldckadd.readyState == 4 && http_qlpldckadd.status == 200){
						document.getElementById("content_ri_bot").innerHTML = http_qlpldckadd.responseText;	
					}
				}
			//xử lý cập nhật
				http_qlpldup = object();
				function upDg(mad){
					document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
					url = "tadmin/tmanaPlace/tmanaDg/upDg.php?ql_d="+mad;
					http_qlpldup.open("get",url,true);
					http_qlpldup.onreadystatechange=process_pldup;
					http_qlpldup.send(null);	
				}
				
				function process_pldup(){
					if(http_qlpldup.readyState == 4 && http_qlpldup.status == 200){
						document.getElementById("content_ri_bot").innerHTML = http_qlpldup.responseText;	
					}
				}
			//kiểm tra thông tin cập nhật
				http_qlpldckup = object();
				function ckUpDg(mad){
					var hs_tend = encodeURI(document.getElementById('hs_tend').value);
					document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
					url = "tadmin/tmanaPlace/tmanaDg/checkUpDg.php?up_mad="+mad+"&up_tend="+hs_tend;
					http_qlpldckup.open("get",url,true);
					http_qlpldckup.onreadystatechange=process_pldckup;
					http_qlpldckup.send(null);	
				}
				
				function process_pldckup(){
					if(http_qlpldckup.readyState == 4 && http_qlpldckup.status == 200){
						document.getElementById("content_ri_bot").innerHTML = http_qlpldckup.responseText;	
					}
				}
			//xóa đường
				http_qlpldde = object();
				function deDg(mad){
					document.getElementById("content_ri_bot").innerHTML = "Đang xử lý...";
					url = "tadmin/tmanaPlace/tmanaDg/deDg.php?ql_d="+mad;
					http_qlpldde.open("get",url,true);
					http_qlpldde.onreadystatechange=process_pldde;
					http_qlpldde.send(null);	
				}
				
				function process_pldde(){
					if(http_qlpldde.readyState == 4 && http_qlpldde.status == 200){
						document.getElementById("content_ri_bot").innerHTML = http_qlpldde.responseText;	
					}
				}	
				