<?php 
require_once __DIR__ . '/vendor/autoload.php';

// 建立链接（Connection）
$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
// 在链接（Connection）上开启一个信道（Channel）
$channel = $connection->channel();
// 声明一个交换机（Exchange）
$channel->queue_declare('test', false, false, false, false);


for ($i=0; 100>$i; $i++) {
    // 创建一个消息
    $msg = new \PhpAmqpLib\Message\AMQPMessage('你好!--'.$i);
    // 简单推送
    $channel->basic_publish($msg, '', 'test');
}

// 关闭信道（Channel）
$channel->close();
// 关闭链接（Connection）
$connection->close();