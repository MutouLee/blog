## 基本介绍

个人自用博客，基于Laravel开发。
- 单用户博客；
- 栏目分类、博客管理、导航菜单管理；
- TopBanner后台自定义；
- 响应式界面；

演示：https://dobeen.net

## 运行环境

- Nginx
- PHP 8.1
- Mysql 5.7
- Laravel 9.*
- Dcat Admin 2.*

## 安装

- composer install
- cp .env.example .env
- vim .env （ 设置数据库相关参数 ）
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- npm install
- npm run dev

## 感谢
- Laravel
- Dcat Admin

## License

The Blog is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).