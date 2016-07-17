# ThinkPHP 重写或者新增控制器类

首先先在根目录新建Rewrite目录，新建完成后需要修改common目录中的config.php文件。

'AUTOLOAD_NAMESPACE' => ['Rewrite' => './Rewrite'], //扩展类目录

只需要如下就可以使用重写的类：
```PHP
class IndexController extends \Rewrite\DevController {
}
```
