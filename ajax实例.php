<?php
$.ajax({
        url:WST.U('mobile/grade/upgrade'),
        type:'POST',
        async:true,    //或false,是否异步
        data:{grade:num},
        timeout:5000,
        dataType:'json',
        beforeSend:function(xhr){
             $(".grade-btn").attr({ disabled: "disabled" });
        },
        success:function(data){
            console.log(data);
            obj = JSON.parse(data);

			if(obj.code == 200){
				location.href = WST.U('mobile/grade/upgradeSuccess','grade='+num);
			}else if(obj.code == 401){
				$("#dialog2").addClass("show");
			}else if(obj.code == 402){
				$("#dialog1").addClass("show");
			}else {
				//提示
				layer.open({
						 content: obj.datas.error
						,btn: '我知道了'
				 });
            }
        },
        error:function(err){
            alert("请求错误！");
        },
        complete:function(){
            $(".grade-btn").removeAttr("disabled");
        }
    })




