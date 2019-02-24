# Roles and abilities


config/app.php

```
RoleCms\RoleCmsServiceProvider::class,
```
Exceptions/Handler.php in function render() after `return parent::render($request, $exception);`

```
if ($exception instanceof AuthorizationException) {
    //unauthenticated action, redirect or something
}
```
App\User.php
```
use RoleCms\Traits\HasRoleCms;

class User extends Authenticatable {

    use HasRoleCms;
}
```

Config.rolecms.php
```
 'default_route' => 'test.read', // default route action
 'roles_super_admin' => [1],
 'abilities' => [
        'test' => [
            'create',
            'read',
            'edit',
            'delete'
        ],
    ]
 ```
 routes/web.php

```
Route::get('/', 'testController@index')->middleware('role:SuperAdmin|Admin','can:test.read');
```
or
```
@can('test.read')
  //do something
@endcan
```
