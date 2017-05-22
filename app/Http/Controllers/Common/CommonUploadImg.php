<?php
//文章-删除
namespace App\Http\Controllers\Common;

use App\Library\Upload;

class CommonUploadImg extends CommonBase
{
    public function index()
    {
        set_time_limit(0);
        ini_set('memory_limit', '1024M');
        
        $params['size'] = 1024000;
        $params['type'] = ['jpg','png','gif','bmp'];
        $res = Upload::uploadFile($_FILES['uploadFile'], $params);
        //构造回调参数
        $callBackParmas = $res['code'].",".$res['msg'];
        if ($res['code'] == 1) {
            $callBackParmas = $callBackParmas.",".$res['file_src'].",".$res['file_name'];
        }
        return "<script>parent.callback(".$callBackParmas.")</script>";
    }

}
