<?php

//错误信息
function output_error($message, $extend_data = array()) {

    $extend_data['code'] = 400;

    $datas = array('error' => $message);

    output_data($datas, $extend_data);

}
//成功信息
function output_data($datas, $extend_data = array()) {

    $data = array();

    $data['code'] = 200;



    if(!empty($extend_data)) {

        $data = array_merge($data, $extend_data);

    }
	
	if(is_array($datas)){
		
		$data['datas'] = $datas;
		
	}else{
		
		$data['datas'] = array("success"=>$datas);
		
	}
	
	//jsonp 请求数据
	if(!empty($_REQUEST['callback'])) {

        echo $_REQUEST['callback'].'('.json_encode($data).')';die;

    } else {

        echo json_encode($data);die;

    }

    
    echo json_encode($data);die;

}



//echo output_error("错误信息");
echo output_data("成功信息");















?>