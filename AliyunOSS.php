<?php
/**
 * Created by PhpStorm.
 * User: tu6ge
 * Date: 2018/5/24
 * Time: 15:06
 */
namespace app\common\library;

use OSS\OssClient;
use think\Config;

class AliyunOSS
{
    public $config = [];
    public function __construct()
    {
        $this->config = Config::get('aliyun.oss');
        $this->client = new OssClient($this->config['accessKeyId'], $this->config['accessKeySecret'], $this->config['endpoint']);
    }
    public static function instance(){
        return new static();
    }

    public function getClient(){
        return $this->client;
    }

    /**
     * 上传文件
     * @param $object
     * @param $fileName
     * @return null
     */
    public function updateFile($object, $fileName)
    {
        return $this->client->uploadFile($this->config['bucket'], $object, $fileName);
    }
}