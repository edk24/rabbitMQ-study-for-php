# RabbitMQ 学习 for PHP


## 0x环境部署

[马上去看](0xRabbitMQ_install/README.md)


## RabbitMQ

安装扩展

```
composer require php-amqplib/php-amqplib
```

### 1.生产者

- publisher.php

**运行**

```bash
$ php publisher.php
```


### 2.消费者

> 可以存在多个消费者来处理业务

- consome.php 

**运行**

```bash
$ php consome.php
```

## End

参考文章

- https://blog.csdn.net/u014290054/article/details/78923894
- [PHP实战RabbitMQ之延时队列篇](https://segmentfault.com/a/1190000022774099)