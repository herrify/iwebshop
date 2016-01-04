<?php
	class tool{
		//上报加解密工具
    public function uptoolAc(){
    	//获取三个选择的操作
    	$act = array();
    	$act['act1'] = trim(cmi::args('act1'));
    	$act['act2'] = cmi::args('act2');
    	$act['act3'] = cmi::args('act3');

    	$input = cmi::args('input');


		if ((($act['act2']=='urlencode')&&($act['act3']=='decode')) || (($act['act2']=='urldecode')&& ($act['act3']=='encode'))) {
		    		$output = $input;
		}
		if ($act['act1']=="updat" && !empty($input)) {//设备上报
			//上报之加密
			if ($act['act2']=='urlencode' && $act['act3']=='encode') {//urlencode加密上报
				$input = urlencode($input);
				$output = cmi::mod('dash')->update_encode($input);


			}elseif (empty($act['act2'])&&$act['act3']=='encode') {//加密上报
				$output = cmi::mod('dash')->update_encode($input);
			}

			//上报之解密
			if ($act['act2']=='urldecode' && $act['act3']=='decode') {
				//$input = cmi::mod('dash')->update_decode($input);
				//$input = urldecode($input);
				$aescrypt = cmi::m('mcrypt');
        		$output=$aescrypt->update_decode($input);
        		$output = urldecode($output);
			}elseif (empty($act['act2'])&&$act['act3']=='decode') {
				//$output = cmi::mod('dash')->update_decode($input);
				$aescrypt = cmi::m('mcrypt');
        		$output=$aescrypt->update_decode($input);
			}

		}

		if ($act['act1']=='backstr' && !empty($input)) {//设备下发
			//下发之加密
			if ($act['act2']=='urlencode' && $act['act3']=='encode') {

				$output = cmi::m('mcrypt')->backstr_encode($input);
				$output = urlencode($output);
			}elseif (empty($act['act2'])&&$act['act3']=='encode') {
				$output = cmi::m('mcrypt')->backstr_encode($input);
			}

			
			if ($act['act2']=='urldecode' && $act['act3']=='decode') {
				//$input = cmi::mod('dash')->backstr_decode($input);
				$input = urldecode($input);
				$aescrypt = cmi::m('mcrypt');
        		$output=$aescrypt->backstr_decode($input);
        		$output = strip_tags($output);
				//$output = urldecode(urldecode($output));
			}elseif (empty($act['act2'])&&$act['act3']=='decode') {
				//$output = cmi::mod('dash')->backstr_decode($input);
				$aescrypt = cmi::m('mcrypt');
				$output=$aescrypt->backstr_decode($input);
				$output = strip_tags($output);
			}

		}
		if (empty($output)) {
			$output = '';
		}
//var_dump($output);die;

		$this->view->output=$output;    	

    }
	}