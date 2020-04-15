<?php

namespace app\push\controller;

use GatewayWorker\Lib\Gateway;

class Events
{

    private $url;

    public function __construct()
    {
        $this->url = "http://www.shareac.com/api/Worker/";
    }

    /**
     * 当客户端连接时触发
     * 如果业务不需此回调可以删除onConnect
     *
     * @param int $client_id 连接id
     */
    public static function onConnect($client_id)
    {
//        $data = array(
//            'type' => 'init',
//            'client_id' => $client_id
//        );
//        Gateway::sendToClient($client_id, json_encode($data));

//        // 向当前client_id发送数据
//        Gateway::sendToClient($client_id, "Hello $client_id\r\n");
//        // 向所有人发送
//        Gateway::sendToAll("$client_id login\r\n");
    }

    /**
     * 当客户端发来消息时触发
     * @param int $client_id 连接id
     * @param mixed $message 具体消息
     */
    public static function onMessage($client_id, $message)
    {
        $message = json_decode($message, 1);
        Gateway::sendToClient($client_id, 'success');
        switch ($message['Type']) {


        }
    }

    /**
     * 当用户断开连接时触发
     * @param int $client_id 连接id
     */
    public static function onClose($client_id)
    {
        //设备心跳断开
        if ($_SESSION['uid'] && !Gateway::isUidOnline($_SESSION['uid'])) {
        }
    }


}