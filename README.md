# Larablog

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

A powerful Laravel [CRUD](https://scotch.io/tutorials/simple-laravel-crud-with-resource-controllers) (Create Read Update Delete) blog built on [Laravel](http://laravel.com/) 5.1 and [Bootstrap](http://getbootstrap.com) 3.5.x - [<https://larablog.io>](https://larablog.io) 

| Larablog Features  |
| :------------ |
|Built on Laravel 5.1|
|Uses MySQL Database, manage in .env file|
|Front End and Admin Area are Responsive Using Bootstrap 3.5|
|HTML5, CSS3, PHP5.4+, and Legacy Browser Support|
|Optional use of Amazon API to store Uploads/Assets on S3 Bucket, manage in .env file|
|Uses Disqus API [https://disqus.com/api/docs/] for Comments, manage in .env file|
|Custom Front End and Backend Styling in Place|
|Front End CSS Built with LESS Compiler, manage in gulpfile|
|Backend Built on SCSS Compiler (LESS Available), manage in gulpfile|
|Uses Composer and Bowser to manage functional assets, composer.json and bower.json|
|Compiles, Combines, and Minifies LESS and SCSS with GULP, manage in gulpfile|
|Optionally Manage front-end assets with GULP, gulpfile|
|Combines and Minifies JS with GULP, gulpfile|
|Uses MVC structure to build front and back end|
|Uses Artisan to manage database migration, schema creations, and create/publish page controller templates|
|Uses Laravel Blade Template System and Syntax for front and back end|
|Easily Manage SQL connection all API connections in .env file|
|Connect Social Media in .env file|
|Manual CLI User Creation|
|Manual CLI User MD5 Encrypted Password Creation|
|Tag manager|
|Asset/Upload Manager|
|Posts Manager with Search, sort, edit, view, pagination, and results limit filter|
|Post Editor using CKEditer 4.5.3 API|
|Post Publish Date, Publish Time, Draft Status, and Private Status Control|
|Posts Automatically Generate RSS XML Feed/Page|
|Posts Use Rainbow.js for displaying code|
|All Page Hero’s are Parallax|
|Contact Page with contact form, custom Error Messages and CSS Animation|
|Can use Mailgun API or PHP mail() function to send email, managed in .env file|
|Custom Catch All 404 Page|
|About Page|
|Automatically Generates sitemap.xml file of published posts and public pages|
|Completely Open Source with MIT License Included|

## [Laravel](http://laravel.com/) PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.png)](https://travis-ci.org/laravel/framework) [![Latest Stable Version](https://poser.pugx.org/laravel/framework/version.png)](https://packagist.org/packages/laravel/framework) [![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.png)](https://packagist.org/packages/laravel/framework) [![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

### Official Laravel Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All Laravel Framework related issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### Laravel License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

## [Bootstrap](http://getbootstrap.com) Front-End Framework

[![Build Status](https://img.shields.io/travis/twbs/bootstrap/master.svg)](https://travis-ci.org/twbs/bootstrap) ![Bower version](https://img.shields.io/bower/v/bootstrap.svg) [![npm version](https://img.shields.io/npm/v/bootstrap.svg)](https://www.npmjs.com/package/bootstrap) [![devDependency Status](https://img.shields.io/david/dev/twbs/bootstrap.svg)](https://david-dm.org/twbs/bootstrap#info=devDependencies) [![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Bootstrap is a sleek, intuitive, and powerful front-end framework for faster and easier web development, created by [Mark Otto](https://twitter.com/mdo) and [Jacob Thornton](https://twitter.com/fat), and maintained by the [core team](https://github.com/orgs/twbs/people) with the massive support and involvement of the community.

[Bootstrap](http://getbootstrap.com)'s documentation, included in this repo in the root directory, is built with [Jekyll](http://jekyllrb.com) and publicly hosted on GitHub Pages at [<http://getbootstrap.com>](http://getbootstrap.com).

## [Larablog](https://larablog.io)

[![Build Status](https://img.shields.io/travis/twbs/bootstrap/master.svg)](https://travis-ci.org/twbs/bootstrap)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

### Quick Project Setup
1. Run `sudo git clone https://github.com/jeremykenedy/larablog.git larablog`
2. Run `composer update` from the projects root folder
3. From the projects root run `cp .env.example .env`
4. Configure your .env file
5. From the projects root run `cp /config/blog.example.php /config/blog.php`
6. Configure your blog.php file.
7. From the projects root run `php artisan migrate`
8. From the projects root run `sudo chmod -R 777 ../larablog`
9. Go to your browser and refresh the projects page.
10. From the projects root run `sudo chmod -R 755 ../larablog`
11. Create your admin user using `sudo php artisan tinker`
     * Below are the steps for using `php artisan tinker` to create the admin user:
```
	~/Code/larablog php artisan tinker
	Psy Shell v0.4.3 (PHP 5.6.7-1+deb.sury.org~utopic+1 — cli) by Justin Hileman
	>>> $user = new App\User;
	=> <App\User #000000007543b78f0000000009f4a1ca> {}
	>>> $user->name = 'Your Name';
	=> "Your Name"
	>>> $user->email = 'YOUR@email.com';
	=> "YOUR@email.com"
	>>> $user->password = bcrypt('YOUR PASSWORD');
	=> "fgkdjfgjfsdlgkjdkortjk&jkrjdskljr54$kfdkgjkdfjgkjkgjdfkgjlkfd"
	>>> $user->save();
	=> true
	>>> exit;
```

### Commonly Used Folders and Files Structure
```
larablog/
   ├── app/
   │   ├── Http/
   │   │   ├── Controllers/
   │   │   │   ├── Admin/
   │   │   │   │   ├── PostController.php
   │   │   │   │   ├── TagController.php			
   │   │   │   │   └── UploadController.php
   │   │   │   ├── Auth/
   │   │   │   │   ├── AuthController.php
   │   │   │   │   └── PasswordController.php
   │   │   │   ├── BlogController.php
   │   │   │   ├── ContactController.php
   │   │   │   └── Controller.php
   │   │   ├── Requests/
   │   │   │   ├── ContactMeRequest.php
   │   │   │   ├── PostCreateRequest.php
   │   │   │   ├── PostUpdateRequest.php
   │   │   │   ├── Request.php
   │   │   │   ├── TagCreateRequest.php
   │   │   │   ├── TagUpdateRequest.php
   │   │   │   ├── UploadFileRequest.php
   │   │   │   └── UploadNewFolderRequest.php
   │   │   ├── Jobs/
   │   │   │   ├── BlogIndexData.php
   │   │   │   ├── Job.php
   │   │   │   ├── PostFormFields.php
   │   │   │   └── TestJob.php
   │   │   ├── Services/
   │   │   │   ├── Markdowner.php
   │   │   │   ├── RssFeed.php
   │   │   │   ├── SiteMap.php
   │   │   │   └── UploadsManager.php
   │   │   └── routes.php
   │   ├── Post.php
   │   ├── Tag.php
   │   ├── User.php 
   │   └── helpers.php
   ├── config/
   │   ├── app.php
   │   ├── auth.php
   │   ├── blog.php
   │   ├── database.php
   │   ├── filesystems.php
   │   ├── mail.php
   │   ├── queue.php
   │   ├── services.php
   │   ├── session.php
   │   └── view.php
   ├──
   │   ├──
   │   │	├──
   │   │   │   ├──
   │   │   │   │   ├──
   │   │   │   │   │   ├──
   │   │   │   │   │   │   ├──
   │   │   │   │   │   │   │   └──
   │   │   │   │   │   │   └──
   │   │   │   │   │   └──
   │   │   │   │   └──
   │   │   │   └──
   │   │   └──
   │   └──
   ├──
   └──
```

## Other Very Usefull Information

### Vagrant Dev Environment

## Start Vagrant

|Command        |Action           
|:------------- |:-------------|
| `vagrant up` | Start Vagrant VM |  
| `vagrant up --provision` | Start Vagrant VM if vagrantfile updated |    
| `vagrant halt` | Stop Vagrant VM |  

## Access Vagrant SSH and MySQL
|Command        |Action      | 
|:------------- |:------------- |
| ```sudo ssh vagrant@127.0.0.1 -p 222``` | Access Vagrant VM via SSH. Password is ``` vagrant  ``` |
| ```mysql -u homestead -ppassword``` | Access Vagrant VM MySQL. Password is ``` vagrant  ``` |

### GULP Asset Processing Commands 

####
GULP settings and asset management setting can be found in file:
``` 
gulpfile.js
```

#### Compile Less/Sass command:
```
sudo gulp
```

#### Pull listed GULP assets command:
```
sudo gulp copyfile
```

## How to Make a new page
#### Create about page as Example:

##### 1. From the projects root folder create the controller with Artisan:  
```
	php artisan make:controller --plain TheNameOfYourController
```

##### 2. Edit the NAV in: `/resources/views/blog/partials/page-nav.blade.php`

###### i. Add the following to the NAV:
```
	<li>
	  <a href="/about">About</a>
	</li>
```

###### ii.  The content of `/resources/views/blog/partials/page-nav.blade.php` will now look like:

```
	{{-- Navigation --}}
	<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
	  <div class="container">
	    {{-- Brand and toggle get grouped for better mobile display --}}
	    <div class="navbar-header page-scroll">
	      <button type="button" class="navbar-toggle" data-toggle="collapse"
	      data-target="#navbar-main">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="/">{{ config('blog.name') }}</a>
	    </div>
	    {{-- Collect the nav links, forms, and other content for toggling --}}
	    <div class="collapse navbar-collapse" id="navbar-main">
	      <ul class="nav navbar-nav">
	        <li>
	          <a href="/">Home</a>
	        </li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li>
	          <a href="/about">About</a>
	        </li>
	        <li>
	          <a href="/contact">Contact</a>
	        </li>
	        @if (Auth::guest())
	        @else
	        <li class="dropdown ">
	          <a href="/admin/post" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	            Hi {{ Auth::user()->name }}!
	            <span class="caret"></span>
	          </a>
	          <ul class="dropdown-menu">
	            <li @if (Request::is('admin/post*')) class="active" @endif>
	              <a href="/admin/post">Posts</a>
	            </li>
	            <li role="separator" class="divider"></li>
	            <li @if (Request::is('admin/tag*')) class="active" @endif>
	              <a href="/admin/tag">Tags</a>
	            </li>
	            <li role="separator" class="divider"></li>
	            <li @if (Request::is('admin/upload*')) class="active" @endif>
	              <a href="/admin/upload">Uploads</a>
	            </li>
	            <li role="separator" class="divider"></li>
	            <li><a href="/auth/logout">Logout</a></li>
	          </ul>
	        </li>
	        @endif
	      </ul>
	    </div>
	  </div>
	</nav>
```

##### 3. Edit the ROUTES in: /app/Http/routes.php

###### i. After the following line: 
```
get('blog/{slug}', 'BlogController@showPost');
```

####### a. Add the following TWO lines:
	
```
	$router->get('about', 'AboutController@showView');
```

##### 4.  Create the CONTROLLER using ARTISAN with the following command:  
```
php artisan make:controller --plain AboutController
```
##### 5. Replace Content of `/app/Http/Controllers/AboutController.php` with :

```
	<?php

	namespace App\Http\Controllers;

	use App\Http\Requests\ContactMeRequest;
	use Illuminate\Support\Facades\Mail;
	use App\Services\SiteMap;

	class AboutController extends Controller
	{
	  /**
	   * Show the Page
	   *
	   * @return View
	   */
	  public function showView()
	  {
	    return view('blog.layouts.about');
	  }
	}
```

##### 6. Create `about.blade.php` in the `/resources/views/blog/layouts` directory.

##### 7. Replace Content of `/resources/views/blog/layouts/about.blade.php` with :

```
	@extends('blog.layouts.master', ['meta_description' => 'About Me'])
	@section('page-header')
	<header class="intro-header parallax-window" data-parallax="scroll" data-image-src="{{ page_image('backgrounds/about-bg.jpg') }}" >
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	                <div class="page-heading">
	                    <h1>
	                        About Me
	                    </h1>
	                    <hr class="small">
	                    <span class="subheading">
	                        This is what I do.
	                    </span>
	                </div>
	            </div>
	        </div>
	    </div>
	</header>
	@stop
	@section('content')
	<!-- Main Content -->
	<div class="container">
	    <div class="row">
	        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>
	            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>
	            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum molestiae debitis nobis, quod sapiente qui voluptatum, placeat magni repudiandae accusantium fugit quas labore non rerum possimus, corrupti enim modi! Et.</p>
	        </div>
	    </div>
	</div>
	<hr>
	@endsection

```
##### 8.  Test by going to the `http://yourprojectURI/about`.
##### 9.  Complete.

## Mail Commands #
### Show Queued Mail
```
php artisan queue:work
```

### Actively Listen for mail
```
queue:listen
```

### Automate Mail
Running `queue:listen` with supervisord
supervisord is a *nix utility to monitor and control processes. We’re not delving into how to install this utility, but if you have it and get it installed, below is a portion of /etc/supervisord.conf that works well.
```
Portion of supervisord.conf for queue:listen
[program:larablog-queue-listen]
command=php /PATH/TO/l5beauty/artisan queue:listen
user=NONROOT-USER
process_name=%(program_name)s_%(process_num)d
directory=/PATH/TO/l5beauty
stdout_logfile=/PATH/TO/l5beauty/storage/logs/supervisord.log
redirect_stderr=true
numprocs=1
```

##### You'll need to replace the /PATH/TO/ to match your local install. Likewise, the user setting will be unique to your installation.

###### 1. Access and edit the systems CRON with the following command:
```
crontab -e
```
###### 2. Add the following to your CRON file:
```
* * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&1
```
###### 3. Intialize and test Laravel mail with your version of the following command:
```
php artisan make:job --queued TestJob
```

### Contributing To Larablog

**All Larablog issues and pull requests should be filed on the [jeremykenedy/larablog](http://github.com/jeremykenedy/larablog) repository.**

### Larablog License

The Larablog framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

## Running To Do List:

* Change page content to be pulled from database.
* Add controller, methods, and view for editing page in admin panel.
* Add managed page functionality to admin.
* Add Avatar
* Add GA
* Add GA Tracking 
* Add GA admin functionality.
* Add GA tracking admin functionality.
* Add Homepage content to database.
* Add Homepage editing functionality to admin.

## ~~Bugs~~ Features
* Parallax background will not render until page width is touched, most likely js conflict.
* Z-Index of front end user dropdown not correct and links un-clickable.

## Enjoy

### ~ Jeremy
