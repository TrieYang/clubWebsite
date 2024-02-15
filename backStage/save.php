<?php

$wjsc = json_decode($_REQUEST['wjsc'],0);

for($n=0;$n<count($wjsc);$n++) {

    if(strlen($wjsc[$n])<50){//如果内容小于50肯定是原来上传的图片
        $tpwj=check_input_zf($pmt1);
    }else{
        $path1=dirname(__FILE__)."/file/";
        $tpwj=base64_image_content($wjsc[$n],$path1);

    }
    //echo $path1;
    echo $tpwj."<br>";

}



//将base64保存好图片，并返回文件名
function base64_image_content($base64_image_content,$path){
    //匹配出图片的格式
    if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
        $type = $result[2];
        $wjm1=date('Ymd',time())."/";
        $new_file = $path."/".$wjm1;
        if(!file_exists($new_file)){
            //检查是否有该文件夹，如果没有就创建，并给予最高权限
            mkdir($new_file, 0700);
        }
        $wjm=time().rand(10000, 99999).".{$type}";
        $new_file = $new_file.$wjm;
        $fhwjm=$wjm1.$wjm;
        if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
            return $fhwjm;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

?>