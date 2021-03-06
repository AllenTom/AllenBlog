<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

//Router::scope('/', function (RouteBuilder $routes) {
//    /**
//     * Here, we are connecting '/' (base path) to a controller called 'Pages',
//     * its action called 'display', and we pass a param to select the view file
//     * to use (in this case, src/Template/Pages/home.ctp)...
//     */
//
//    /**
//     * ...and connect the rest of 'Pages' controller's URLs.
//     */
//    $routes->connect('/login', ['controller' => 'Login', 'action' => 'index', 'index']);
//    $routes->connect('/sign-up', ['controller' => 'Main', 'action' => 'signUp', 'sign_up']);
//
//    $routes->connect('/api/category/add',['controller'=>'Category','action'=>'add']);
//
//    $routes->connect('/api/article/add',['controller'=>'Article','action'=>'add']);
//    $routes->connect('/api/article/:id/delete',['controller'=>'Article','action'=>'delete']);
//    $routes->connect('/api/article',['controller'=>'Article']);
//
//    $routes->connect('/auth',['controller'=>'Auth','action'=>'index']);
//    $routes->connect('/user',['controller'=>'User','action'=>'index']);
//    $routes->connect('/', ['controller' => 'Blog', 'action' => 'index', 'index']);
//
//    $routes->connect(
//        '/articles/:id',
//        ['controller' => 'Blog', 'action' => 'articleDetail'])
//        ->setPatterns(['id' => '\d+'])
//        ->setPass(['id']);
//
//
//    /**
//     * Connect catchall routes for all controllers.
//     *
//     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
//     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
//     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
//     *
//     * Any route class can be used with this method, such as:
//     * - DashedRoute
//     * - InflectedRoute
//     * - Route
//     * - Or your own route class
//     *
//     * You can remove these routes once you've connected the
//     * routes you want in your application.
//     */
//    $routes->fallbacks(DashedRoute::class);
//});
Router::prefix('admin', function (RouteBuilder $routers) {
    $routers->scope('/article', function (RouteBuilder $routers) {
        $routers->connect("/", ['controller' => 'Article', 'action' => 'index']);
        $routers->connect("/editor", ['controller' => 'Article', 'action' => 'editor']);
        $routers->connect("/editor/:id", ['controller' => 'Article', 'action' => 'editor']);
        $routers->connect("/save", ['controller' => 'Article', 'action' => 'save']);
        $routers->connect("/:id", ['controller' => 'Article', 'action' => 'getContent']);
        $routers->connect("/:id/delete", ['controller' => 'Article', 'action' => 'delete']);
    });
    $routers->scope("/category", function (RouteBuilder $routers) {
        $routers->connect("/", ['controller' => 'Category', 'action' => 'index']);
        $routers->connect("/add", ['controller' => 'Category', 'action' => 'add']);
        $routers->connect("/delete", ['controller' => 'Category', 'action' => 'delete']);
    });

    $routers->connect("/", ['controller' => 'DashBoard', 'action' => 'index']);
});
Router::scope("/", function (RouteBuilder $routers) {
    $routers->connect("/", ['controller' => 'Index', 'action' => 'index']);
    $routers->scope("/login", function (RouteBuilder $routers) {
        $routers->connect("/", ['controller' => 'Login', 'action' => 'index']);
        $routers->connect("/auth", ['controller' => 'Login', 'action' => 'auth']);
        $routers->connect("/logout", ['controller' => 'Login', 'action' => 'logout']);
    });
    $routers->prefix("news", function (RouteBuilder $routers) {
        $routers->connect("/:id", ['controller' => 'ArticleDetail', 'action' => 'index']);
    });
    $routers->scope("/register", function (RouteBuilder $routers) {
        $routers->connect("/", ['controller' => 'Register', 'action' => 'index']);
        $routers->connect("/create", ['controller' => 'Register', 'action' => 'create']);
    });


});
/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
