<?php
require_once  './vendor/autoload.php';
// 建立链接（Connection）
$connection = new PhpAmqpLib\Connection\AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
// 在链接（Connection）上开启一个信道（Channel）
$channel = $connection->channel();
// 声明一个交换机（Exchange）
$channel->queue_declare('test', false, false, false, false);
// 告诉通道，一次只能消费一个消息
$channel->basic_qos(null, 1, null);
// 设为confirm模式
$channel->confirm_select();

// 处理任务
$callback = function (\PhpAmqpLib\Message\AMQPMessage $msg) {
    // 获取消息
    echo "[来自生产者爸爸的爱] ", $msg->getBody(), "\n";

    sleep(1);

    // 确认一个消息 (任务完成，从队列中移除)
    // $msg->ack();

    // 重新放入队列 (队首)
    // $msg->nack(true);

    // 抛弃此消息
    // $msg->nack();

    // 拒绝此消息 （队首，给其他消费者处理，如果没有其他消费者将会阻塞）
    $msg->reject();
};

$channel->basic_consume('test', '', false, false, false, false, $callback);

while (count($channel->callbacks)) {
    $channel->wait();
}
