<?php
//文章-新增提交
namespace App\Http\Controllers\Article;

class ArticleAddCheck extends ArticleBase
{
    public function index()
    {
        //构造文章内容
        $articleContent = [];
        $contentType = $this->request['contentType'];
        $content = $this->request['content'];
        $contentPicUrl = $this->request['content_pic'];
        $index = 0;
        foreach ($contentType as $contentTypeItem) {
            $articleContentOne = [
                'type' => $contentTypeItem,
                'rank' => $index,
            ];
            if ($contentTypeItem == 1 or $contentTypeItem == 3) {
                $articleContentOne['content'] = $content[$index];
            } elseif ($contentTypeItem == 2) {
                $articleContentOne['pic_url'] = $contentPicUrl[$index];
            }
            $articleContent[] = $articleContentOne;
            $index++;
        }
        return $articleContent;

        //参数校验及获取
//        $resCheckParams = $this->checkParams($this->request);
//        if ($resCheckParams['code'] < 0) {
//            return $resCheckParams;
//        }
        $title = trim($this->request['title']);
        $introduction = trim($this->request['introduction']);
        $pic_url = trim($this->request['pic_url']);
        $content = $this->request['content'];
//        return $_FILES['content_pic'];
        return $this->request['contentType'];
        return $this->request['content'];


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
        if (!isset($request['content'])) {
            return ['code'=>-1,'msg'=>'没有获取到有效的content'];
        }
        return ['code'=>1,'msg'=>'校验成功'];
    }

}
