<?php

namespace Rewrite;

/**
 * 控制器扩展重写类
 * @author chenran 2016-7-16
 */
class DevController extends \Think\Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * 
     * @param string $message 说明
     * @param int $code 状态
     * @param array $result 数据
     */
    public function Json($message, $code = 1, $result = '') {
        header('Content-Type:application/json; charset=utf-8');
        $data = [
            'message' => $message,
            'code' => $code,
            'data' => $result,
        ];
        exit(json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    /**
     * 得到IP
     * @return string
     */
    public function getIP() {
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    /**
     * 对象转数组
     * @param array $object 对象
     * @return array
     */
    public function objectToArray($object) {
        $result = is_object($object) ? get_object_vars($object) : $object;
        if (is_array($result)) {
            return array_map(__FUNCTION__, $result);
        } else {
            return $result;
        }
    }

    /**
     * 生成随机字符串
     * @param type $length
     * @return string
     */
    public function RandStr($length) {
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol) - 1;

        for ($i = 0; $i < $length; $i++) {
            $str .= $strPol[rand(0, $max)]; //rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }

        return $str;
    }

    /**
     * 上传图片公共方法
     * @param type $name
     * @param string $upload_conf
     * @return string
     */
    public function Upload_Img($name, $upload_conf = '') {
        if (empty($_FILES[$name]['name'])) {
            return '';
        }
        if (empty($upload_conf)) {
            $upload_conf = C('UPLOADS');
        }
        $upload = new \Think\Upload(); // 实例化上传类
        $upload->maxSize = 3145728; // 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->rootPath = $upload_conf; // 设置附件上传根目录
        // 上传单个文件 
        $info = $upload->uploadOne($_FILES[$name]);
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功 获取上传文件信息
            $file = $upload_conf . $info['savepath'] . $info['savename'];
        }
        ysimg($file); //压缩图片
        $file = substr($file, 2);
        return $file;
    }

}

// 设置控制器别名 便于升级
class_alias('Think\RewriteController', 'Think\RewriteAction');
