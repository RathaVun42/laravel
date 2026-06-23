# laravel
Laravel


to create Laravel project at the first time we need to open some extensions in php.ini (C:\php\8.5.5\ts\x64 (php file location)) like extension=fileInfo, extension=zip, extension = dob_sqlite, extension=sqlite3 (we need to eras ; in front of it) ;

we can only create Laravel project on terminal (command) in specific folder that we want to store our project.
--> To create Laravel project:
	composer create-project Laravel/Laravel projectName

--> To run Laravel project: (terminal in our project) php artisan serve then follow the local host

* composer is php's package manager

--> project structure
	there are so many folders but the most used folders are app, database, resources, and routes


--> Route
	in route class there are some methods like get post delete update...
	route helps us manage our file, decide which file should be shown.

	Route::get('/routeURL', function(){
		return view('fileName');
	});

*--> view is a method used to open or browse a specific file in views(subclass of resource) folder
--> named route: a process to name a route

	Route::get('/login', function(){
    return "login page";
	})->name('login');
*--> '/login' is route URL, and 'login' inside name() is Route name that we just named it.
	
--> Route also can hold parameters 

	Route::get('/routeURL/{para}',function($para){
		return "This is route with parameter $para";
	});
--> to manage route that have the same prefix (manage subroute)

	Route::prefix('admin')->group(function(){
		Route::get('/user', function (){
			return "This is admin user route";
		})
    Route::get('/posts', function (){
			return "This is admin posts route";
		})
	});

-->middleware['auth'] is a function that require user to logged in before reach any page inside it.

	Route::middleware(['auth'])->group(function () { 
    Route::get('/profile', function () { 
        return 'User Profile'; 
    }); 
	
	}); 
--> midleware also can be held only one route:

	Route::get('/dashboard', function () { 
	    return view('dashboard'); 
	})->middleware('auth');

--> controller also can manage route instead of using view()

	Route::get('/user/{id}', [UserController::class, 'show']);
*--> UserController is a class, show is a public function inside UserController
*--> show here is a function inside controller class(index, edit, update, destroy, show). Then the action is now depending on these 5 function of controller.

--> but we need to create a class controller first: cmd php artisan make:Controller controllerName. This will create a subclass of Controller inside app/Http/Controllers/controllerName.php

--> fallback(): a function use show a default page when URL is mismatched to any route.

	Route::fallback(function(){
	    return response()->view('errors.404',[],404);//errors is the name of folder in side folder views about 404 is the name of file
	});

--> we also can built api with laravel: first we need to install api in terminal: php artisan install:api. After installed, it will generate an api.php file inside folder routes.

	-------------------------------------22/05/2026----------------------------------------

--> to connect database with migration: in file .env fill infor about our database, then run cmd php arisan migrate. So, our migration is now sync to data base.

--> to creat model: php artisan make:model ModelName  --resource (optional: it automatically create some useful function);
--> to create controller: php artisan make:controller ControllerName

	-------------------------------------29/05/2026-----------------------------------------

-->url('/routeURL/param')
-->route('RouteName', [param])
We can use these two method to point into a specific view.

	-----------------------------05/06/2026----------------------------

php artisan make:model Product --migration  // this will generate both model and migration name Product.

php artisan make:controller ProductController --resource // this will create controller with its neccessary function

php artisan make:model Post -m // this will create both model Post and migration file posts

php artisan make:controller Api/PostController --api // this will create controller of api and store it to Api subfolder in controller.