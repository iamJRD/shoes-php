<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Store.php";
    require_once __DIR__."/../src/Brand.php";

    $app = new Silex\Application();

    $app['debug'] = true;

    $server = 'mysql:host=localhost:8889;dbname=shoes';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig');
    });

    $app->get("/stores", function() use ($app) {
        $stores = Store::getAll();

        return $app['twig']->render('stores.html.twig', array('stores' => $stores));
    });

    $app->post("/add_store", function() use ($app) {
        $id = null;
        $name = $_POST['name'];
        $new_store = new Store($id, $name);
        $new_store->save();

        $stores = Store::getAll();
        return $app['twig']->render('stores.html.twig', array('stores' => $stores));
    });

    $app->post("/delete_stores", function() use ($app) {
        Store::deleteAll();
        $stores = Store::getAll();

        return $app['twig']->render('stores.html.twig', array('stores' => $stores));
    });

    $app->get("/store/{id}", function($id) use ($app) {
        $store = Store::find($id);
        $brands = $store->getBrands();
        $all_brands = Brand::getAll();

        return $app['twig']->render('store.html.twig', array('store' => $store, 'brands' => $brands, 'all_brands' => $all_brands));
    });

    return $app;
?>
