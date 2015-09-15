# larablog 
A blog project built on Laravel 5.1 and Bootstrap 3.5 - https://larablog.io

| Features  |
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

---

## Quick Project Setup
1. Run `sudo git clone https://github.com/jeremykenedy/larablog.git larablog`
2. Run `composer update` from the projects root folder
3. From the projects root run `cp .env.example .env`
4. Configure your .env file
5. From the projects root run `cp /config.blog.example.php /config/blog.php`
6. Configure your blog.php file.
7. From the projects root run `php artisan migrate`
8. From the projects root run `sudo chmod -R 777 ../larablog`
9. Go to your browser and refresh the projects page.
10. From the projects root run `sudo chmod -R 755 ../larablog`

---

## Vagrant Dev Environment Start

| Command        | Action           
| ------------- |:-------------|
| `vagrant up` | Start Vagrant VM named homestead |  
| `vagrant up --provision` | Start Vagrant VM named homestead if vagrantfile updated |    


## Environment Access
* From Terminal run `sudo ssh vagrant@127.0.0.1 -p 222`
   * Password is `vagrant`

* MySQL Access: `mysql -u homestead -ppassword` 

---

## Dev Commands

# Make a new page
* Create the controller with Artisan:  
	`php artisan make:controller --plain TheNameOfYourController`

# Compile Scripts, Less/Sass with:
`sudo gulp`
* You Can pull the listed assets in `gulpfile.js` with the following command:
`sudo gulp copyfile`

---

## Create about page as Example:
### 1. Edit the NAV in: `/resources/views/blog/partials/page-nav.blade.php`

  i. Add the following to the NAV:
```
	<li>
	  <a href="/about">About</a>
	</li>

```

  ii.  The content of `/resources/views/blog/partials/page-nav.blade.php` will now look like:

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

### 2. Edit the ROUTES in: `/app/Http/routes.php`
	i. After the following line: `get('blog/{slug}', 'BlogController@showPost');`
		a. Add the following TWO lines:
```
	$router->get('about', 'AboutController@showView');
```

### 3.  Create the CONTROLLER using ARTISAN:  `php artisan make:controller --plain AboutController`
	i. Replace Content of `/app/Http/Controllers/AboutController.php` with :

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

### 4.  Create `about.blade.php` in the `/resources/views/blog/layouts` directory.
    i. Replace Content of `/resources/views/blog/layouts/about.blade.php` with :

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
### 5.  Test by going to the `http://yourprojectURI/about`.
### 6.  Complete.

---

# Mail Commands #
```
php artisan queue:work
```

# OK
```
queue:listen
```

## BETTER
Running `queue:listen` with supervisord
supervisord is a *nix utility to monitor and control processes. We’re not delving into how to install this utility, but if you have it and get it installed, below is a portion of /etc/supervisord.conf that works well.
```
Portion of supervisord.conf for queue:listen
[program:l5beauty-queue-listen]
command=php /PATH/TO/l5beauty/artisan queue:listen
user=NONROOT-USER
process_name=%(program_name)s_%(process_num)d
directory=/PATH/TO/l5beauty
stdout_logfile=/PATH/TO/l5beauty/storage/logs/supervisord.log
redirect_stderr=true
numprocs=1
```

You'll need to replace the /PATH/TO/ to match your local install. Likewise, the user setting will be unique to your installation.

## THEN
```
crontab -e
* * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&1
```

```
php artisan make:job --queued TestJob
```

---

## Running To Do List:

* Change page content to be pulled from database.
* Add controller, methods, and view for editing page in admin panel.
* Add maged page functionality to admin.
* Add GA
* Add GA Tracking 
* Add GA admin functionality.
* Add GA tracking admin functionality.
* Add Homepage content to database.
* Add Homepage editing functionality to admin.

---

## Enjoy

~ Jeremy
