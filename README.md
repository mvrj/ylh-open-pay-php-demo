# ylh-open-pay-php-demo

# 安装
```
git clone https://github.com/mvrj/ylh-open-pay-php-demo
composer install
//更新pay/pay.php下面中的$access_token值
$access_token = {access_token};
本地测试：
php -S localhost:8000
```
要测试notify_url请先将项目部署到公网中，return_url可以部署再本地。
