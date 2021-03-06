<?php
use Aura\Router\RouterFactory;


$router_factory = new RouterFactory;
$router = $router_factory->newInstance();

/******* Main Page Routes ************/
$router->add("home", "/")->setValues(['action'=>'Bolt\Extensions\Action\Home']);
$router->add("submit", "/submit")->setValues(['action'=>'Bolt\Extensions\Action\Submit']);
$router->add("submitted", "/submitted")->setValues(['action'=>'Bolt\Extensions\Action\Submitted']);

$router->add("register", "/register")->setValues(['action'=>'Bolt\Extensions\Action\Register']);
$router->add("admin", "/admin")->setValues(['action'=>'Bolt\Extensions\Action\Admin']);
$router->add("login", "/login")->setValues(['action'=>'Bolt\Extensions\Action\Login']);
$router->add("logout", "/logout")->setValues(['action'=>'Bolt\Extensions\Action\Logout']);
$router->add("profile", "/profile")->setValues(['action'=>'Bolt\Extensions\Action\Profile']);
$router->add("update", "/update/{package}")->setValues(['action'=>'Bolt\Extensions\Action\UpdatePackage']);
$router->add("edit", "/edit/{package}")->setValues(['action'=>'Bolt\Extensions\Action\EditPackage']);
$router->add("view", "/view/{package}")->setValues(['action'=>'Bolt\Extensions\Action\ViewPackage']);
$router->add("disable", "/disable/{package}")->setValues(['action'=>'Bolt\Extensions\Action\DisablePackage']);

$router->add("search", "/search")->setValues(['action'=>'Bolt\Extensions\Action\Search', 'type'=>'search']);
$router->add("browse", "/browse")->setValues(['action'=>'Bolt\Extensions\Action\Search', 'type'=>'browse']);
$router->add("list", "/list.json")->setValues(['action'=>'Bolt\Extensions\Action\ListPackages']);
$router->add("usercheck", "/usercheck.json")->setValues(['action'=>'Bolt\Extensions\Action\UserCheck']);
$router->add("info", "/info.json")->setValues(['action'=>'Bolt\Extensions\Action\PackageInfo']);

$router->add("test", "/test/{package}/{version}")->setValues(['action'=>'Bolt\Extensions\Action\TestExtension']);
$router->add("retest", "/retest/{package}/{version}")->setValues(['action'=>'Bolt\Extensions\Action\TestExtension','retest'=>true]);

$router->add("ping", "/ping")->setValues(['action'=>'Bolt\Extensions\Action\Ping']);

$router->add(
    "stat.install",
    "/stat/install{/package,version}")
        ->addTokens(['package' => '[^/]+/[^/]+'])
        ->setValues(['action'=>'Bolt\Extensions\Action\Stat','id'=>'install']);

$router->add("star", "/star/{package}")->setValues(['action'=>'Bolt\Extensions\Action\StarPackage']);


return $router;
