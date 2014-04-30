<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 30.04.14
 * Time: 23:46
 */

namespace AmuletOfDragon;


use AmuletOfDragon\Helper\StrHelper;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\RequestContext;

class Router {
    public static function create(){
        //$router = new \Symfony\Component\Routing\Router();
        $cfg = Amulet::getInstance()->getConfig();
        $dir = $cfg->SERVICES_PATH;
        $dir = StrHelper::replaceKeyWords($dir);
        $locator = new FileLocator($dir);
        $loader = new \Symfony\Component\Routing\Loader\YamlFileLoader($locator);

        $router = new \Symfony\Component\Routing\Router($loader, 'routes.yml');
        $request = Request::createFromGlobals();
        $context = new RequestContext();
        $context->fromRequest($request);

        $router->setContext($context);

        $matchRoute = $router->matchRequest($request);

        //$route = $router->getRouteCollection()->get($matchRoute["_route"]);


        //$defaults = $route->getDefaults();
        $controller = $matchRoute["_controller"];
        $action = isset($matchRoute["_action"]) ? $matchRoute["_action"]."Action" : "indexAction";

        if(class_exists($controller)){
            $cntr = new $controller();
            if(method_exists($cntr, $action)){
                unset($matchRoute["_route"]);
                $cntr->$action($matchRoute);
            } else {
                throw new RouteNotFoundException("Route method ".$action." not found");
            }
        } else {
            throw new RouteNotFoundException("Controller ".$controller." not found");
        }
        Registry::get(Registry::BUILDER)->set("router", $router);
    }
} 