<?php
//文章-新增提交
namespace App\Http\Controllers\Article;

use App\Library\Common;

class ArticleAddCheck extends ArticleBase
{
    public function index()
    {
        //参数校验及获取
        $resCheckParams = $this->checkParams($this->request);
        if ($resCheckParams['code'] < 0) {
            return $resCheckParams;
        }
        $article = [
            'title' => trim($this->request['title']),
            'introduction' => trim($this->request['introduction']),
            'pic_url' => trim($this->request['pic_url']),
        ];
        //构造文章内容并校验
        $content = [];
        $index = 0;
        $has_real_content = 0;
        try{
            $contentType = $this->request['contentType'];
            $contentText = $this->request['content_text'];
            $contentPic = $this->request['content_pic'];
            foreach ($contentType as $contentTypeItem) {
                $contentItem = [];
                $type = intval($contentTypeItem);
                if ($type == 1 or $type == 3) {
                    $contentText = Common::delStrBothBlank($contentText[$index]);
                    $contentItem = [
                        'type' => $type,
                        'rank' => $index,
                        'content' => $contentText,
                    ];
                    if ($contentText) {
                        $has_real_content = 1;
                    }
                } elseif ($type == 2) {
                    if ($contentPic[$index]) {
                        $contentItem = [
                            'type' => $type,
                            'rank' => $index,
                            'pic_url' => $contentPic[$index],
                        ];
                        $has_real_content = 1;
                    }
                }
                if ($contentItem) {
                    $content[] = $contentItem;
                    $index++;
                }
            }
        } catch (\Exception $e) {
            return ['code'=>-2,'msg'=>'缺少文章内容或者文章内容不完整','exception_msg'=>$e->getMessage(),'exception_line'=>$e->getLine()];
        }
        if (!$has_real_content) {
            return ['code'=>-2,'msg'=>'缺少文章内容或者文章内容不完整'];
        }


        return ['article'=>$article,'content'=>$content];



        //开启事务，进行新增
//        DB::beginTransaction();
//        try{
//            $this->OpOgcBountyPayMod->updateBy(['pay_status'=>5,'pay_message'=>'发放异常,程序运行中断或者更新失败','assign_time'=>$assignTime,'out_biz_no'=>$orderNumber,'last_op_id'=>$this->user_id],['id'=>$id]);
//            $this->OpOgcBountyMod->updateBy(['audit_status'=>8,'pay_message'=>'发放异常,程序运行中断或者更新失败'],['pay_id'=>$id]);
//            $logId = $this->OpOgcBountyLogMod->insertGetId($log);
//            DB::commit();
//        } catch (\Exception $e) {
//            DB::rollback();
//            return ['code'=>-4,'msg'=>'程序运行异常，未进行打款，请重试','exception'=>$e->getMessage()];
//        }


    }

    //参数校验
    private function checkParams($request = []) {
        if (!isset($request['title']) || !trim($request['title'])) {
            return ['code'=>-1,'msg'=>'没有获取到有效的title'];
        }
        if (!isset($request['introduction']) || !trim($request['introduction'])) {
            return ['code'=>-1,'msg'=>'没有获取到有效的introduction'];
        }
        if (!isset($request['pic_url']) || !trim($request['pic_url'])) {
            return ['code'=>-1,'msg'=>'没有获取到有效的pic_url'];
        }
        return ['code'=>1,'msg'=>'校验成功'];
    }

}
