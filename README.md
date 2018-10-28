## Larablog
#### A powerful open source Laravel Blog with WYSWYG and CRUD (Create Read Update Delete) built on [Laravel](http://laravel.com/) 5.7 and [Bootstrap](http://getbootstrap.com) 4

[![Build Status](https://travis-ci.org/jeremykenedy/larablog.svg?branch=master)](https://travis-ci.org/jeremykenedy/larablog)
[![StyleCI](https://github.styleci.io/repos/40459558/shield?branch=master)](https://github.styleci.io/repos/40459558)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jeremykenedy/larablog/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jeremykenedy/larablog/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/jeremykenedy/larablog/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

#### Table of contents
- [Features](#features)
- [Installation Instructions](#installation-instructions)
    - [Build the Front End Assets with Mix](#build-front-end-assets-with-mix)
- [Seeds](#seeds)
    - [Seeded Roles](#seeded-roles)
    - [Seeded Permissions](#seeded-permissions)
    - [Seeded Users](#seeded-users)
- [Commands](#commands)
    - [Generate Site Map](#generate-site-map)
- [Configs](#configs)
    - [Config File](#config-file)
    - [Env Variables](#env-variables)
    - [Language Files](#language-files)
- [Routes](#routes)
- [Screenshots](#screenshots)
- [File Tree](#file-tree)
- [License](#license)

### Features
| Larablog Features |
| :------------ |
|Built on [Laravel](http://laravel.com/) 5.7|
|Built on [Bootstrap](https://getbootstrap.com/) 4|
|Front End Built on [Start Bootstrap - Clean Blog](https://www.npmjs.com/package/startbootstrap-clean-blog) |
|Admin Built on [Paper Dashboard 2](https://www.npmjs.com/package/paper-dashboard-2) |
|Uses [MySQL](https://github.com/mysql) Database (can be changed)|
|Uses [Artisan](http://laravel.com/docs/5.7/artisan) to manage database migration, schema creations, and create/publish page controller templates|
|Dependencies are managed with [COMPOSER](https://getcomposer.org/)|
|Laravel Scaffolding **User** and **Administrator Authentication**.|
|CRUD (Create, Read, Update, Delete) User Management with [Laravel Users](https://github.com/jeremykenedy/laravel-users) Package|
|CRUD (Create, Read, Update, Delete) Blog Posts|
|CRUD (Create, Read, Update, Delete) Tags|
|Built in [CKEditor](https://ckeditor.com/) WYSWYG Editor|
|Google [reCaptcha Protection with Google API](https://developers.google.com/recaptcha/)|
|Robust File Manager using [UniSharp Laravel File Manager](https://github.com/UniSharp/laravel-filemanager) Package|
|Makes us of Laravel [Mix](https://laravel.com/docs/5.7/mix) to compile assets|
|Makes use of [Language Localization Files](https://laravel.com/docs/5.7/localization)|
|Active Nav states using [Laravel Requests](https://laravel.com/docs/5.7/requests)|
|User [Roles/ACL Implementation](https://github.com/jeremykenedy/laravel-roles)|
|Admin PHP Information UI using [Laravel PHP Info](https://github.com/jeremykenedy/laravel-phpinfo) Package|
|Activity Logging using [Laravel-logger](https://github.com/jeremykenedy/laravel-logger)|
|Uses Laravel built in [mail](https://laravel.com/docs/5.7/mail) services|
|Automatic sitemap generation with [Spatie Laravel Sitemap](https://github.com/spatie/laravel-sitemap) Package|
|Automatic RSS Feed generation with [Spatie Laravel Feed](https://github.com/spatie/laravel-feed) Package|
|Uses [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar) Package for local debugging|
|Generate sitemap through the admin panel or the CLI with Artisan.|

### Installation Instructions
1. Run `git clone https://github.com/jeremykenedy/larablog.git larablog`
2. Create a MySQL database for the project
    * ```mysql -u root -p```, if using Vagrant: ```mysql -u homestead -psecret```
    * ```create database larablog;```
    * ```\q```
3. From the projects root run `cp .env.example .env`
4. Configure your `.env` file
5. Run `composer install` from the projects root folder
6. From the projects root folder run:
```
php artisan vendor:publish --tag=laravelroles
```
7. From the projects root folder run `php artisan key:generate`
8. From the projects root folder run `php artisan migrate`
9. From the projects root folder run `composer dump-autoload`
10. From the projects root folder run `php artisan db:seed`
11. Compile the front end assets with [npm steps](#using-npm) or [yarn steps](#using-yarn).

#### Build the Front End Assets with Mix
##### Using NPM:
1. From the projects root folder run `npm install`
2. From the projects root folder run `npm run dev` or `npm run production`
  * You can watch assets with `npm run watch`

##### Using Yarn:
1. From the projects root folder run `yarn install`
2. From the projects root folder run `yarn run dev` or `yarn run production`
  * You can watch assets with `yarn run watch`

###### And thats it with the caveat of setting up and configuring your development environment. I recommend [Laravel Homestead](https://laravel.com/docs/5.7/homestead)

### Seeds
* [DatabaseSeeder.php](https://github.com/jeremykenedy/larablog/blob/master/database/seeds/DatabaseSeeder.php)
* [PermissionsTableSeeder.php](https://github.com/jeremykenedy/larablog/blob/master/database/seeds/PermissionsTableSeeder.php)
* [RolesTableSeeder.php](https://github.com/jeremykenedy/larablog/blob/master/database/seeds/RolesTableSeeder.php)
* [ConnectRelationshipsSeeder.php](https://github.com/jeremykenedy/larablog/blob/master/database/seeds/ConnectRelationshipsSeeder.php)
* [UsersTableSeeder.php](https://github.com/jeremykenedy/larablog/blob/master/database/seeds/UsersTableSeeder.php)
* [TagTableSeeder.php](https://github.com/jeremykenedy/larablog/blob/master/database/seeds/TagTableSeeder.php)
* [PostTableSeeder.php](https://github.com/jeremykenedy/larablog/blob/master/database/seeds/PostTableSeeder.php)

##### Seeded Roles
| Role | Level |
| :------------ | :------------ |
|Unverified|Level 0|
|User|Level 1|
|Writer|Level 2|
|Moderator|Level 3|
|Admin|Level 4|
|Super Admin|Level 3|

##### Seeded Permissions
  * view.users
  * create.users
  * edit.users
  * delete.users
  * perms.super-admin
  * perms.admin
  * perms.moderator
  * perms.writer
  * perms.user

##### Seeded Users
|Email|Password|Access|
|:------------|:------------|:------------|
|admin@admin.com|password|Super Admin Access|

* Controlled by the `.env` file.

### Commands
#### Generate Site Map
* You can generate a XML sitemap which is located at `/sitemap.xml` with the following Artisan Command:

`php artisan sitemap:generate` or `php artisan sitemap:generate {limit}`

`{limit}` is the number of pages that the sitemap generator will limit to generating.

* The sitemaps default number of pages is controlled by the `.env` variable `BLOG_SITEMAP_LIMIT`


### Configs
#### Config File
Here is a list of the custom config files that have been added or modified to the project:
* [blog.php](https://github.com/jeremykenedy/larablog/blob/master/config/blog.php)
* [admin.php](https://github.com/jeremykenedy/larablog/blob/master/config/admin.php)
* [laravel-logger.php](https://github.com/jeremykenedy/larablog/blob/master/config/laravel-logger.php)
* [laravelPhpInfo.php](https://github.com/jeremykenedy/larablog/blob/master/config/laravelPhpInfo.php)
* [laravelusers.php](https://github.com/jeremykenedy/larablog/blob/master/config/laravelusers.php)
* [roles.php](https://github.com/jeremykenedy/larablog/blob/master/config/roles.php)
* [superadmin.php](https://github.com/jeremykenedy/larablog/blob/master/config/superadmin.php)
* [sitemap.php](https://github.com/jeremykenedy/larablog/blob/master/config/sitemap.php)
* [filesystems.php](https://github.com/jeremykenedy/larablog/blob/master/config/filesystems.php)

#### Env Variables
Here is a list of the additonal added [`.env`](https://github.com/jeremykenedy/larablog/blob/master/.env.example) variables:

```
INITIAL_SEEDED_SUPER_ADMIN_USERNAME='Admin'
INITIAL_SEEDED_SUPER_ADMIN_USEREMAIL='admin@admin.com'
INITIAL_SEEDED_SUPER_ADMIN_USERPASSWORD='password'

BLOG_APP_NAME="${APP_NAME}"
BLOG_DEFAULT_TITLE='Lara(b)log2'
BLOG_DEFAULT_SUBTITLE='An open source blog platform'
BLOG_DEFAULT_DESCRIPTION='Larablog 2 is an open source blog built on Laravel'
BLOG_DEFAULT_AUTHOR='Jeremy Kenedy'
BLOG_SITEMAP_LIMIT=100

BLOG_DEFAULT_IMAGE=
BLOG_HOME_IMAGE=
BLOG_AUTHORS_IMAGE=
BLOG_AUTHOR_IMAGE=
BLOG_CONTACT_IMAGE=

BLOG_SM_URL_TWITTER=
BLOG_SM_URL_FACEBOOK=
BLOG_SM_URL_LINKEDIN=
BLOG_SM_URL_GOOGLEPLUS=
BLOG_SM_URL_GITHUB=

BLOG_DISQUSSHORTNAME=null
BLOG_GOOGLEANALYTICSID=null

BLOG_RSS_FEED_URL='/blog.rss'
BLOG_RSS_FEED_TITLE='My Blog feed'

BLOG_DEFAULT_PAGES_PER_PAGE=10
BLOG_DEFAULT_REVERSE_PAGINATION_DIRECTION=false
BLOG_DEFAULT_CONTACT_EMAIL=null
BLOG_UPLOADS_ENVIRONMENT=null
BLOG_UPLOADS_WEBPATH=null

ADMIN_DEFAULT_PAGES_PER_PAGE=100

LARAVEL_LOGGER_ROLES_MIDDLWARE=permission:perms.super.admin
LARAVEL_LOGGER_MIDDLEWARE_ENABLED=true
LARAVEL_LOGGER_USER_MODEL=App\Models\User
LARAVEL_LOGGER_LAYOUT=layouts.admin

# https://www.google.com/recaptcha/admin#list
ENABLE_RECAPTCHA=false
RECAPTCHA_SITE=YOURGOOGLECAPTCHAsitekeyHERE
RECAPTCHA_SECRET=YOURGOOGLECAPTCHAsecretHERE
RECAPTCHA_CDN=https://www.google.com/recaptcha/api.js
```

#### Language Files
* [larablog.php](https://github.com/jeremykenedy/larablog/blob/master/resources/lang/en/larablog.php)
* [admin.php](https://github.com/jeremykenedy/larablog/blob/master/resources/lang/en/admin.php)
* [tooltips.php](https://github.com/jeremykenedy/larablog/blob/master/resources/lang/en/tooltips.php)
* [messages.php](https://github.com/jeremykenedy/larablog/blob/master/resources/lang/en/messages.php)
* [forms.php](https://github.com/jeremykenedy/larablog/blob/master/resources/lang/en/forms.php)
* [emails.php](https://github.com/jeremykenedy/larablog/blob/master/resources/lang/en/emails.php)
* [validation.php](https://github.com/jeremykenedy/larablog/blob/master/resources/lang/en/validation.php)

### Routes

```
+--------+----------------------------------------+---------------------------------------------------+------------------------------+---------------------------------------------------------------------------------------------------+--------------------------------------------------------------------------------------------------------------------------+
| Domain | Method                                 | URI                                               | Name                         | Action                                                                                            | Middleware                                                                                                               |
+--------+----------------------------------------+---------------------------------------------------+------------------------------+---------------------------------------------------------------------------------------------------+--------------------------------------------------------------------------------------------------------------------------+
|        | GET|HEAD                               | /                                                 | home                         | App\Http\Controllers\BlogController@index                                                         | web,activity                                                                                                             |
|        | GET|HEAD                               | _debugbar/assets/javascript                       | debugbar.assets.js           | Barryvdh\Debugbar\Controllers\AssetController@js                                                  | Barryvdh\Debugbar\Middleware\DebugbarEnabled                                                                             |
|        | GET|HEAD                               | _debugbar/assets/stylesheets                      | debugbar.assets.css          | Barryvdh\Debugbar\Controllers\AssetController@css                                                 | Barryvdh\Debugbar\Middleware\DebugbarEnabled                                                                             |
|        | DELETE                                 | _debugbar/cache/{key}/{tags?}                     | debugbar.cache.delete        | Barryvdh\Debugbar\Controllers\CacheController@delete                                              | Barryvdh\Debugbar\Middleware\DebugbarEnabled                                                                             |
|        | GET|HEAD                               | _debugbar/clockwork/{id}                          | debugbar.clockwork           | Barryvdh\Debugbar\Controllers\OpenHandlerController@clockwork                                     | Barryvdh\Debugbar\Middleware\DebugbarEnabled                                                                             |
|        | GET|HEAD                               | _debugbar/open                                    | debugbar.openhandler         | Barryvdh\Debugbar\Controllers\OpenHandlerController@handle                                        | Barryvdh\Debugbar\Middleware\DebugbarEnabled                                                                             |
|        | GET|HEAD                               | activity                                          | activity                     | jeremykenedy\LaravelLogger\App\Http\Controllers\LaravelLoggerController@showAccessLog             | web,auth,activity                                                                                                        |
|        | DELETE                                 | activity/clear-activity                           | clear-activity               | jeremykenedy\LaravelLogger\App\Http\Controllers\LaravelLoggerController@clearActivityLog          | web,auth,activity                                                                                                        |
|        | GET|HEAD                               | activity/cleared                                  | cleared                      | jeremykenedy\LaravelLogger\App\Http\Controllers\LaravelLoggerController@showClearedActivityLog    | web,auth,activity                                                                                                        |
|        | GET|HEAD                               | activity/cleared/log/{id}                         |                              | jeremykenedy\LaravelLogger\App\Http\Controllers\LaravelLoggerController@showClearedAccessLogEntry | web,auth,activity                                                                                                        |
|        | DELETE                                 | activity/destroy-activity                         | destroy-activity             | jeremykenedy\LaravelLogger\App\Http\Controllers\LaravelLoggerController@destroyActivityLog        | web,auth,activity                                                                                                        |
|        | GET|HEAD                               | activity/log/{id}                                 |                              | jeremykenedy\LaravelLogger\App\Http\Controllers\LaravelLoggerController@showAccessLogEntry        | web,auth,activity                                                                                                        |
|        | POST                                   | activity/restore-log                              | restore-activity             | jeremykenedy\LaravelLogger\App\Http\Controllers\LaravelLoggerController@restoreClearedActivityLog | web,auth,activity                                                                                                        |
|        | GET|HEAD                               | admin                                             | admin                        | App\Http\Controllers\Admin\AdminController@index                                                  | web,auth,permission:perms.user,activity                                                                                  |
|        | GET|HEAD                               | admin/filemanager                                 | unisharp.lfm.show            | UniSharp\LaravelFilemanager\Controllers\LfmController@show                                        | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | admin/filemanager/crop                            | unisharp.lfm.getCrop         | UniSharp\LaravelFilemanager\Controllers\CropController@getCrop                                    | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | admin/filemanager/cropimage                       | unisharp.lfm.getCropimage    | UniSharp\LaravelFilemanager\Controllers\CropController@getCropimage                               | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | admin/filemanager/cropnewimage                    | unisharp.lfm.getCropimage    | UniSharp\LaravelFilemanager\Controllers\CropController@getNewCropimage                            | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | admin/filemanager/delete                          | unisharp.lfm.getDelete       | UniSharp\LaravelFilemanager\Controllers\DeleteController@getDelete                                | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | admin/filemanager/deletefolder                    | unisharp.lfm.getDeletefolder | UniSharp\LaravelFilemanager\Controllers\FolderController@getDeletefolder                          | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | admin/filemanager/doresize                        | unisharp.lfm.performResize   | UniSharp\LaravelFilemanager\Controllers\ResizeController@performResize                            | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | admin/filemanager/download                        | unisharp.lfm.getDownload     | UniSharp\LaravelFilemanager\Controllers\DownloadController@getDownload                            | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | admin/filemanager/errors                          | unisharp.lfm.getErrors       | UniSharp\LaravelFilemanager\Controllers\LfmController@getErrors                                   | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | admin/filemanager/files/{base_path}/{file_name}   | unisharp.lfm.                | UniSharp\LaravelFilemanager\Controllers\RedirectController@getFile                                |                                                                                                                          |
|        | GET|HEAD                               | admin/filemanager/folders                         | unisharp.lfm.getFolders      | UniSharp\LaravelFilemanager\Controllers\FolderController@getFolders                               | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | admin/filemanager/jsonitems                       | unisharp.lfm.getItems        | UniSharp\LaravelFilemanager\Controllers\ItemsController@getItems                                  | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | admin/filemanager/newfolder                       | unisharp.lfm.getAddfolder    | UniSharp\LaravelFilemanager\Controllers\FolderController@getAddfolder                             | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | admin/filemanager/photos/{base_path}/{image_name} | unisharp.lfm.                | UniSharp\LaravelFilemanager\Controllers\RedirectController@getImage                               |                                                                                                                          |
|        | GET|HEAD                               | admin/filemanager/rename                          | unisharp.lfm.getRename       | UniSharp\LaravelFilemanager\Controllers\RenameController@getRename                                | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | admin/filemanager/resize                          | unisharp.lfm.getResize       | UniSharp\LaravelFilemanager\Controllers\ResizeController@getResize                                | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | admin/filemanager/upload                          | unisharp.lfm.upload          | UniSharp\LaravelFilemanager\Controllers\UploadController@upload                                   | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | POST                                   | admin/generate-sitemap                            | generate-sitemap             | App\Http\Controllers\Admin\AdminController@generateSitemap                                        | web,auth,permission:perms.user,activity                                                                                  |
|        | POST                                   | admin/posts                                       | storepost                    | App\Http\Controllers\Admin\PostController@store                                                   | web,auth,permission:perms.writer,activity                                                                                |
|        | GET|HEAD                               | admin/posts                                       | admin.posts                  | App\Http\Controllers\Admin\PostController@index                                                   | web,auth,permission:perms.writer,activity                                                                                |
|        | GET|HEAD                               | admin/posts/create                                | posts.create                 | App\Http\Controllers\Admin\PostController@create                                                  | web,auth,permission:perms.writer,activity                                                                                |
|        | DELETE                                 | admin/posts/{post}                                | destroypost                  | App\Http\Controllers\Admin\PostController@destroy                                                 | web,auth,permission:perms.writer,activity                                                                                |
|        | PUT|PATCH                              | admin/posts/{post}                                | updatepost                   | App\Http\Controllers\Admin\PostController@update                                                  | web,auth,permission:perms.writer,activity                                                                                |
|        | GET|HEAD                               | admin/posts/{post}/edit                           | editpost                     | App\Http\Controllers\Admin\PostController@edit                                                    | web,auth,permission:perms.writer,activity                                                                                |
|        | GET|HEAD                               | admin/sitemap                                     | sitemap-admin                | App\Http\Controllers\Admin\AdminController@sitemap                                                | web,auth,permission:perms.user,activity                                                                                  |
|        | POST                                   | admin/tags                                        | storetag                     | App\Http\Controllers\Admin\TagController@store                                                    | web,auth,permission:perms.writer,activity                                                                                |
|        | GET|HEAD                               | admin/tags                                        | showtags                     | App\Http\Controllers\Admin\TagController@index                                                    | web,auth,permission:perms.writer,activity                                                                                |
|        | GET|HEAD                               | admin/tags/create                                 | createtag                    | App\Http\Controllers\Admin\TagController@create                                                   | web,auth,permission:perms.writer,activity                                                                                |
|        | PUT|PATCH                              | admin/tags/{tag}                                  | updatetag                    | App\Http\Controllers\Admin\TagController@update                                                   | web,auth,permission:perms.writer,activity                                                                                |
|        | DELETE                                 | admin/tags/{tag}                                  | destroytag                   | App\Http\Controllers\Admin\TagController@destroy                                                  | web,auth,permission:perms.writer,activity                                                                                |
|        | GET|HEAD                               | admin/tags/{tag}/edit                             | edittag                      | App\Http\Controllers\Admin\TagController@edit                                                     | web,auth,permission:perms.writer,activity                                                                                |
|        | GET|HEAD                               | admin/uploads                                     | admin-uploads                | App\Http\Controllers\Admin\AdminController@uploads                                                | web,auth,permission:perms.writer,activity                                                                                |
|        | GET|HEAD                               | api                                               | api                          | App\Http\Controllers\Api\BlogController@index                                                     | api                                                                                                                      |
|        | GET|HEAD                               | api/posts                                         | api-posts                    | App\Http\Controllers\Api\BlogController@posts                                                     | api                                                                                                                      |
|        | GET|HEAD                               | api/posts/all                                     | api-all-posts                | App\Http\Controllers\Api\BlogController@allPosts                                                  | api                                                                                                                      |
|        | GET|HEAD                               | api/posts/author/{author}                         | api-posts-by-author          | App\Http\Controllers\Api\BlogController@getPostsByAuthor                                          | api                                                                                                                      |
|        | GET|HEAD                               | api/posts/authors                                 | api-posts-authors            | App\Http\Controllers\Api\BlogController@getPostsAuthors                                           | api                                                                                                                      |
|        | GET|HEAD                               | api/posts/latest                                  | api-latest-post              | App\Http\Controllers\Api\BlogController@latestPost                                                | api                                                                                                                      |
|        | GET|HEAD                               | author/{author}                                   | author                       | App\Http\Controllers\BlogController@author                                                        | web,activity                                                                                                             |
|        | GET|HEAD                               | authors                                           | authors                      | App\Http\Controllers\BlogController@authors                                                       | web,activity                                                                                                             |
|        | GET|HEAD                               | blog.rss                                          | feeds.blog                   | Spatie\Feed\Http\FeedController                                                                   | web,activity                                                                                                             |
|        | POST                                   | contact                                           | contactSend                  | App\Http\Controllers\ContactController@contactSend                                                | web,activity                                                                                                             |
|        | GET|HEAD                               | contact                                           | contact                      | App\Http\Controllers\ContactController@index                                                      | web,activity                                                                                                             |
|        | GET|HEAD                               | login                                             | login                        | App\Http\Controllers\Auth\LoginController@showLoginForm                                           | web,activity,guest                                                                                                       |
|        | POST                                   | login                                             |                              | App\Http\Controllers\Auth\LoginController@login                                                   | web,activity,guest                                                                                                       |
|        | POST                                   | logout                                            | logout                       | App\Http\Controllers\Auth\LoginController@logout                                                  | web,activity                                                                                                             |
|        | POST                                   | password/email                                    | password.email               | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail                             | web,activity,guest                                                                                                       |
|        | GET|HEAD                               | password/reset                                    | password.request             | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm                            | web,activity,guest                                                                                                       |
|        | POST                                   | password/reset                                    | password.update              | App\Http\Controllers\Auth\ResetPasswordController@reset                                           | web,activity,guest                                                                                                       |
|        | GET|HEAD                               | password/reset/{token}                            | password.reset               | App\Http\Controllers\Auth\ResetPasswordController@showResetForm                                   | web,activity,guest                                                                                                       |
|        | GET|HEAD                               | phpinfo                                           | laravelPhpInfo::phpinfo      | jeremykenedy\LaravelPhpInfo\App\Http\Controllers\LaravelPhpInfoController@phpinfo                 | web,auth,permission:perms.super.admin                                                                                    |
|        | POST                                   | register                                          |                              | App\Http\Controllers\Auth\RegisterController@register                                             | web,activity,guest                                                                                                       |
|        | GET|HEAD                               | register                                          | register                     | App\Http\Controllers\Auth\RegisterController@showRegistrationForm                                 | web,activity,guest                                                                                                       |
|        | POST                                   | search-users                                      | search-users                 | jeremykenedy\laravelusers\app\Http\Controllers\UsersManagementController@search                   | web,auth,permission:perms.super.admin                                                                                    |
|        | POST                                   | users                                             | users.store                  | jeremykenedy\laravelusers\app\Http\Controllers\UsersManagementController@store                    | web,auth,permission:perms.super.admin                                                                                    |
|        | GET|HEAD                               | users                                             | users                        | jeremykenedy\laravelusers\app\Http\Controllers\UsersManagementController@index                    | web,auth,permission:perms.super.admin                                                                                    |
|        | GET|HEAD                               | users/create                                      | users.create                 | jeremykenedy\laravelusers\app\Http\Controllers\UsersManagementController@create                   | web,auth,permission:perms.super.admin                                                                                    |
|        | PUT|PATCH                              | users/{user}                                      | users.update                 | jeremykenedy\laravelusers\app\Http\Controllers\UsersManagementController@update                   | web,auth,permission:perms.super.admin                                                                                    |
|        | GET|HEAD                               | users/{user}                                      | users.show                   | jeremykenedy\laravelusers\app\Http\Controllers\UsersManagementController@show                     | web,auth,permission:perms.super.admin                                                                                    |
|        | DELETE                                 | users/{user}                                      | user.destroy                 | jeremykenedy\laravelusers\app\Http\Controllers\UsersManagementController@destroy                  | web,auth,permission:perms.super.admin                                                                                    |
|        | GET|HEAD                               | users/{user}/edit                                 | users.edit                   | jeremykenedy\laravelusers\app\Http\Controllers\UsersManagementController@edit                     | web,auth,permission:perms.super.admin                                                                                    |
|        | GET|HEAD                               | {slug}                                            |                              | App\Http\Controllers\BlogController@showPost                                                      | web,activity                                                                                                             |
+--------+----------------------------------------+---------------------------------------------------+------------------------------+---------------------------------------------------------------------------------------------------+--------------------------------------------------------------------------------------------------------------------------+

```

### Screenshots
![LaraBlog](https://s3-us-west-2.amazonaws.com/larablog.io/1-larablog-home.jpg)
![LaraBlog Post](https://s3-us-west-2.amazonaws.com/larablog.io/2-larablog-post.jpg)
![LaraBlog Post Comments](https://s3-us-west-2.amazonaws.com/larablog.io/22-larablog-comments.jpg)
![LaraBlog Tags](https://s3-us-west-2.amazonaws.com/larablog.io/3-larablog-tags.jpg)
![LaraBlog Author](https://s3-us-west-2.amazonaws.com/larablog.io/4-larablog-author.jpg)
![LaraBlog Authors](https://s3-us-west-2.amazonaws.com/larablog.io/5-larablog-authors.jpg)
![LaraBlog Contact](https://s3-us-west-2.amazonaws.com/larablog.io/6-larablog-contact.jpg)
![LaraBlog Admin Dashboard](https://s3-us-west-2.amazonaws.com/larablog.io/7-larablog-admin-dashboard.jpg)
![LaraBlog Admin Posts](https://s3-us-west-2.amazonaws.com/larablog.io/8-larablog-admin-posts.jpg)
![LaraBlog Admin Post Create](https://s3-us-west-2.amazonaws.com/larablog.io/9-larablog-admin-post-create.jpg)
![LaraBlog Admin Post Edit](https://s3-us-west-2.amazonaws.com/larablog.io/10-larablog-admin-post-edit.jpg)
![LaraBlog Admin Tags](https://s3-us-west-2.amazonaws.com/larablog.io/11-larablog-admin-post-tags.jpg)
![LaraBlog Admin Tag Edit](https://s3-us-west-2.amazonaws.com/larablog.io/12-larablog-admin-post-tag-edit.jpg)
![LaraBlog Admin Files](https://s3-us-west-2.amazonaws.com/larablog.io/13-larablog-admin-files.jpg)
![LaraBlog Admin File Manager Pop Up](https://s3-us-west-2.amazonaws.com/larablog.io/21-larablog-admin-file-manager-pop-up.jpg)
![LaraBlog Admin Upload](https://s3-us-west-2.amazonaws.com/larablog.io/14-larablog-admin-files-upload.jpg)
![LaraBlog Admin Users](https://s3-us-west-2.amazonaws.com/larablog.io/15-larablog-admin-users.jpg)
![LaraBlog Admin User](https://s3-us-west-2.amazonaws.com/larablog.io/16-larablog-admin-user.jpg)
![LaraBlog Admin User Edit](https://s3-us-west-2.amazonaws.com/larablog.io/17-larablog-admin-user-edit.jpg)
![LaraBlog Admin Sitemap](https://s3-us-west-2.amazonaws.com/larablog.io/20-larablog-admin-sitemap-gen.jpg)
![LaraBlog Admin PHP Info](https://s3-us-west-2.amazonaws.com/larablog.io/18-larablog-admin-phpinfo.jpg)
![LaraBlog Admin Activity](https://s3-us-west-2.amazonaws.com/larablog.io/19-larablog-admin-activity.jpg)

### File Tree

```
Larablog
├── .editorconfig
├── .env.example
├── .env.travis
├── .gitattributes
├── .gitignore
├── .travis.yml
├── LICENSE
├── README.md
├── app
│   ├── Console
│   │   ├── Commands
│   │   │   └── GenerateSitemap.php
│   │   └── Kernel.php
│   ├── Exceptions
│   │   └── Handler.php
│   ├── Handlers
│   │   └── LfmConfigHandler.php
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── Admin
│   │   │   │   ├── AdminController.php
│   │   │   │   ├── PostController.php
│   │   │   │   └── TagController.php
│   │   │   ├── Api
│   │   │   │   └── BlogController.php
│   │   │   ├── Auth
│   │   │   │   ├── ForgotPasswordController.php
│   │   │   │   ├── LoginController.php
│   │   │   │   ├── RegisterController.php
│   │   │   │   ├── ResetPasswordController.php
│   │   │   │   └── VerificationController.php
│   │   │   ├── BlogController.php
│   │   │   ├── ContactController.php
│   │   │   ├── Controller.php
│   │   │   └── HomeController.php
│   │   ├── Kernel.php
│   │   ├── Middleware
│   │   │   ├── Authenticate.php
│   │   │   ├── CheckForMaintenanceMode.php
│   │   │   ├── EncryptCookies.php
│   │   │   ├── RedirectIfAuthenticated.php
│   │   │   ├── TrimStrings.php
│   │   │   ├── TrustProxies.php
│   │   │   └── VerifyCsrfToken.php
│   │   └── Requests
│   │       ├── ContactRequest.php
│   │       ├── DestroyPostRequest.php
│   │       ├── DestroyTagRequest.php
│   │       ├── GenerateSitemapRequest.php
│   │       ├── StorePostRequest.php
│   │       ├── StoreTagRequest.php
│   │       ├── UpdatePostRequest.php
│   │       └── UpdateTagRequest.php
│   ├── Logic
│   │   └── helpers.php
│   ├── Mail
│   │   └── ContactMail.php
│   ├── Models
│   │   ├── Post.php
│   │   ├── Tag.php
│   │   └── User.php
│   ├── Providers
│   │   ├── AppServiceProvider.php
│   │   ├── AuthServiceProvider.php
│   │   ├── BroadcastServiceProvider.php
│   │   ├── EventServiceProvider.php
│   │   └── RouteServiceProvider.php
│   ├── Services
│   │   ├── Markdowner.php
│   │   ├── PostAuthors.php
│   │   ├── PostFormFields.php
│   │   ├── PostProcesses.php
│   │   ├── PostTemplates.php
│   │   ├── SitemapCrawlProfile.php
│   │   └── TagFormFields.php
│   └── Traits
│       └── CaptchaTrait.php
├── artisan
├── bootstrap
│   ├── app.php
│   └── cache
│       ├── .gitignore
│       ├── packages.php
│       └── services.php
├── composer.json
├── composer.lock
├── config
│   ├── admin.php
│   ├── app.php
│   ├── auth.php
│   ├── blog.php
│   ├── broadcasting.php
│   ├── cache.php
│   ├── database.php
│   ├── debug-server.php
│   ├── debugbar.php
│   ├── feed.php
│   ├── filesystems.php
│   ├── hashing.php
│   ├── image.php
│   ├── laravel-logger.php
│   ├── laravelPhpInfo.php
│   ├── laravelusers.php
│   ├── lfm.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── roles.php
│   ├── services.php
│   ├── session.php
│   ├── sitemap.php
│   ├── superadmin.php
│   ├── tinker.php
│   ├── trustedproxy.php
│   └── view.php
├── database
│   ├── .gitignore
│   ├── factories
│   │   ├── PostFactory.php
│   │   ├── TagFactory.php
│   │   └── UserFactory.php
│   ├── migrations
│   │   ├── 2014_10_12_000000_create_users_table.php
│   │   ├── 2014_10_12_100000_create_password_resets_table.php
│   │   ├── 2016_01_15_105324_create_roles_table.php
│   │   ├── 2016_01_15_114412_create_role_user_table.php
│   │   ├── 2016_01_26_115212_create_permissions_table.php
│   │   ├── 2016_01_26_115523_create_permission_role_table.php
│   │   ├── 2016_02_09_132439_create_permission_user_table.php
│   │   ├── 2018_10_10_070913_create_posts_table.php
│   │   ├── 2018_10_10_070928_create_tags_table.php
│   │   └── 2018_10_10_070949_create_post_tag_pivot_table.php
│   └── seeds
│       ├── ConnectRelationshipsSeeder.php
│       ├── DatabaseSeeder.php
│       ├── PermissionsTableSeeder.php
│       ├── PostTableSeeder.php
│       ├── RolesTableSeeder.php
│       ├── TagTableSeeder.php
│       └── UsersTableSeeder.php
├── package.json
├── phpunit.xml
├── public
│   ├── .htaccess
│   ├── css
│   │   ├── admin.css
│   │   ├── app.css
│   │   └── bs3-modals.css
│   ├── favicon.ico
│   ├── files
│   │   ├── 1
│   │   │   ├── thumbs
│   │   │   │   └── user.png
│   │   │   └── user.png
│   │   └── shares
│   ├── fonts
│   │   ├── font-awesome
│   │   │   ├── fa-brands-400.eot
│   │   │   ├── fa-brands-400.svg
│   │   │   ├── fa-brands-400.ttf
│   │   │   ├── fa-brands-400.woff
│   │   │   ├── fa-brands-400.woff2
│   │   │   ├── fa-regular-400.eot
│   │   │   ├── fa-regular-400.svg
│   │   │   ├── fa-regular-400.ttf
│   │   │   ├── fa-regular-400.woff
│   │   │   ├── fa-regular-400.woff2
│   │   │   ├── fa-solid-900.eot
│   │   │   ├── fa-solid-900.svg
│   │   │   ├── fa-solid-900.ttf
│   │   │   ├── fa-solid-900.woff
│   │   │   └── fa-solid-900.woff2
│   │   └── nucleo
│   │       ├── nucleo-icons.eot
│   │       ├── nucleo-icons.ttf
│   │       ├── nucleo-icons.woff
│   │       └── nucleo-icons.woff2
│   ├── images
│   ├── index.php
│   ├── js
│   │   ├── admin.js
│   │   ├── app.js
│   │   └── jquery.dataTables.min.js
│   ├── mix-manifest.json
│   ├── photos
│   │   ├── 1
│   │   └── shares
│   │       ├── math.jpg
│   │       ├── math_equations-wallpaper-2560x1600.jpg
│   │       └── thumbs
│   │           ├── math.jpg
│   │           └── math_equations-wallpaper-2560x1600.jpg
│   ├── robots.txt
│   ├── sitemap.xml
│   └── svg
│       ├── 403.svg
│       ├── 404.svg
│       ├── 500.svg
│       └── 503.svg
├── resources
│   ├── admin
│   │   ├── js
│   │   │   ├── admin.js
│   │   │   ├── bootstrap.js
│   │   │   ├── bs-tooltips.js
│   │   │   └── set-ckeditor.js
│   │   └── sass
│   │       ├── _dropzone.scss
│   │       ├── _fab.scss
│   │       ├── _forms.scss
│   │       ├── _nucleo-icons.scss
│   │       ├── _tables.scss
│   │       ├── _variables.scss
│   │       └── admin.scss
│   ├── js
│   │   ├── app.js
│   │   ├── bootstrap.js
│   │   └── components
│   │       └── ExampleComponent.vue
│   ├── lang
│   │   └── en
│   │       ├── admin.php
│   │       ├── auth.php
│   │       ├── emails.php
│   │       ├── forms.php
│   │       ├── larablog.php
│   │       ├── messages.php
│   │       ├── pagination.php
│   │       ├── passwords.php
│   │       ├── tooltips.php
│   │       └── validation.php
│   ├── sass
│   │   ├── _variables.scss
│   │   ├── app.scss
│   │   └── partials
│   │       └── _bs-visibility-classes.scss
│   └── views
│       ├── admin
│       │   ├── forms
│       │   │   └── generate-sitemap.blade.php
│       │   ├── modals
│       │   │   ├── delete-post-modal-form.blade.php
│       │   │   ├── delete-tag-modal-form.blade.php
│       │   │   ├── save-post-modal-form.blade.php
│       │   │   └── upload-modal.blade.php
│       │   ├── pages
│       │   │   ├── home.blade.php
│       │   │   ├── sitemap.blade.php
│       │   │   └── uploads.blade.php
│       │   ├── partials
│       │   │   ├── drawer-nav.blade.php
│       │   │   ├── footer.blade.php
│       │   │   ├── loading-file-1.blade.php
│       │   │   ├── loading-spinner-1.blade.php
│       │   │   ├── messages.blade.php
│       │   │   ├── navbar.blade.php
│       │   │   └── sidebar.blade.php
│       │   ├── post
│       │   │   ├── create.blade.php
│       │   │   ├── edit.blade.php
│       │   │   ├── index.blade.php
│       │   │   └── partials
│       │   │       └── post-form.blade.php
│       │   ├── scripts
│       │   │   ├── post-form-scripts.blade.php
│       │   │   └── save-post-modal.blade.php
│       │   └── tag
│       │       ├── create.blade.php
│       │       ├── edit.blade.php
│       │       ├── index.blade.php
│       │       └── partials
│       │           └── tag-form.blade.php
│       ├── auth
│       │   ├── login.blade.php
│       │   ├── passwords
│       │   │   ├── email.blade.php
│       │   │   └── reset.blade.php
│       │   ├── register.blade.php
│       │   └── verify.blade.php
│       ├── blog
│       │   ├── forms
│       │   │   └── contact-form.blade.php
│       │   ├── pages
│       │   │   ├── author.blade.php
│       │   │   ├── authors.blade.php
│       │   │   └── contact.blade.php
│       │   ├── partials
│       │   │   ├── analytics.blade.php
│       │   │   ├── disqus.blade.php
│       │   │   ├── disqusjs.blade.php
│       │   │   ├── footer.blade.php
│       │   │   ├── header-post.blade.php
│       │   │   ├── header.blade.php
│       │   │   ├── messages.blade.php
│       │   │   ├── nav.blade.php
│       │   │   ├── posts-pager.blade.php
│       │   │   ├── posts-roll.blade.php
│       │   │   └── social-media.blade.php
│       │   ├── post-layouts
│       │   │   └── standard.blade.php
│       │   └── roll-layouts
│       │       └── home.blade.php
│       ├── layouts
│       │   ├── admin.blade.php
│       │   ├── app.blade.php
│       │   └── auth.blade.php
│       └── mail
│           └── contact.blade.php
├── routes
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php
├── server.php
├── tests
│   ├── CreatesApplication.php
│   ├── Feature
│   │   ├── ExampleTest.php
│   │   ├── MarkdownerTest.php
│   │   └── PostsTest.php
│   ├── TestCase.php
│   └── Unit
│       └── ExampleTest.php
└── webpack.mix.js

```

* Tree command can be installed using brew: `brew install tree`
* File tree generated using command `tree -a -I '.git|node_modules|vendor|storage|ckeditor'`

### License
Larablog is licensed under the [MIT license](https://opensource.org/licenses/MIT). Enjoy!
