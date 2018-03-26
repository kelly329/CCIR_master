<?php
namespace Home\Controller;
use Think\Controller;
use Component\Classify;
class RecommendController extends CommonController {
    public function doRecommend(){
        $recommend = D('recommend');
//        dump($_POST);die;
        if (IS_POST) {
            $data['userId'] = $_SESSION['userInfo']['userId'];
            $data['title'] = I('title');
            $data['maintype'] = I('maintype');
            $data['typeId'] = I('typeId');
            $data['content'] = I('content');
            $data['createtime'] = time();
            if ($_FILES['picurl']['tmp_name'] != '') {
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath = './Uploads/RContest/'; // 设置附件上传目录
                $upload->rootPath = './';
                // 上传文件
                $info = $upload->uploadOne($_FILES['picurl']);
                if (!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                } else {// 上传成功
                    $data['picurl'] = $info['savepath'] . $info['savename'];
                }
            }
            if ($_FILES['texturl']['tmp_name'] != '') {
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728;// 设置附件上传大小
                $upload->exts = array('doc', 'pdf', 'docx');// 设置附件上传类型
                $upload->savePath = './Uploads/RFile/'; // 设置附件上传目录
                $upload->rootPath = './';
                // 上传文件
                $info = $upload->uploadOne($_FILES['texturl']);
                if (!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                } else {// 上传成功
                    $data['texturl'] = $info['savepath'] . $info['savename'];
                }
            }

            if ($recommend->create($data)) {
                if ($recommend->add()) {
                    alertToUrl(__MODULE__ . "/Index/index", "推荐比赛成功");
                } else {
                    alertToUrl(__MODULE__ . "/Recommend/recommend", "推荐比赛失败");
                }

            } else {
                $this->error($recommend->getError());
            }
            return;
        }

        $typeList = D('type')->select();
        $classify = new Classify();
        $Data = $classify->typetree($typeList);
        $this->assign('type', $Data);
        $this->display("recommend");
    }

}