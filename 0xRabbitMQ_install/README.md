# 安装 RabbitMQ

学习建议用 `docker` 请先安装下列环境

- docker
- docker-compose 

## 安装 docker

示例我自己是 `ubuntu` 系统，`debain` 系的 `Linux` 应该都是可以用的

```
$ sudo apt install docker docker-compose -y
```


## 运行起来


```
$ cd 0xRabbitMQ_install
$ docker-compose up
```

恭喜你，已经完成学习环境的搭建。容器开放两个端口 `5672` 和 `15672`，后者是 web管理后台 的；

<br />

访问 [http://localhost:15672](http://localhost:15672) 进入后台，账号和密码分别是 `guest` / `guest`