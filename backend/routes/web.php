<?php
/*
 * @Author: Louis Yu louis.yu@flashwire.com
 * @Date: 2022-09-02 22:10:54
 * @LastEditTime: 2022-09-07 14:43:56
 */

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/', [HomeController::class, 'indexAction']);

Route::any('/{module}/{controller}/{action}', function ($module, $controller, $action) {
    $controllerArr = array_map('ucfirst', explode('-', $controller));
    $controller = implode('', $controllerArr);
    $className = 'App\\Http\\Controllers\\' . $module . '\\' . ucfirst($controller) . 'Controller';
    try{
        $class = App::make($className);
    }catch(Illuminate\Contracts\Container\BindingResolutionException $e){
        //class not existed.
        abort(404);
    }

    $actionArr = array_map('ucfirst', explode('-', $action));
    $action = lcfirst(implode('', $actionArr));
    $action .= 'Action';
    //action not existed.
    if (!method_exists($class, $action)) {
        abort(404);
    }
    // Call action and return response.
    return app()->call([$class, $action]);
});

Route::any('/{controller}/{action}', function ($controller, $action) {
    $controllerArr = array_map('ucfirst', explode('-', $controller));
    $controller = implode('', $controllerArr);
    $className = 'App\\Http\\Controllers\\' . ucfirst($controller) . 'Controller';
    try{
        $class = App::make($className);
    }catch(Illuminate\Contracts\Container\BindingResolutionException $e){
        //class not existed.
        abort(404);
    }

    $actionArr = array_map('ucfirst', explode('-', $action));
    $action = lcfirst(implode('', $actionArr));
    $action .= 'Action';
    //action not existed.
    if (!method_exists($class, $action)) {
        abort(404);
    }
    // Call action and return response.
    return app()->call([$class, $action]);
});

