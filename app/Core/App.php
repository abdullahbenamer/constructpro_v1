<?php

class App
{
    protected $controller = 'Dashboard';
    protected $method = 'index';
    protected $params = [];

    public static $current_url = '';

    public function __construct()
    {
        $url = $this->parseUrl();

        self::$current_url =
            rtrim($_GET['url'] ?? '', '/');

     spl_autoload_register(function ($class) {
    $paths = [
        '../app/Controllers/',
        '../app/Models/',
        '../app/Services/'
    ];

    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
        // --------------------
        // ROUTING
        // --------------------

        $controller_name = !empty($url[0])
            ? $this->controllerFromUrl($url[0])
            : 'Dashboard';

        $controller_file =
            '../app/Controllers/' . $controller_name . '.php';

        require_once '../app/Core/Controller.php';

        // Unknown controller: display the custom 404 page.
        if (!file_exists($controller_file)) {
            $this->show404();
            return;
        }

        require_once $controller_file;

        if (!class_exists($controller_name)) {
            $this->show404();
            return;
        }

        $this->controller = new $controller_name();

        
        // Resolve the requested method.
        if (
            isset($url[1]) &&
            method_exists($this->controller, $url[1])
        ) {
            $this->method = $url[1];

            unset($url[0], $url[1]);
        } else {
            // Preserve existing routes such as /project-costs/57.
            $this->method = 'index';

            unset($url[0]);
        }

    
$this->params = $url ? array_values($url) : [];

// ==================================================
// CENTRALIZED REQUIRED-ARGUMENT VALIDATION
// ==================================================

$reflection = new ReflectionMethod(
    $this->controller,
    $this->method
);

$requiredParameters =
    $reflection->getNumberOfRequiredParameters();

if (count($this->params) < $requiredParameters) {
    $this->show404();
    return;
}

// ==================================================
// INVOKE CONTROLLER METHOD
// ==================================================

call_user_func_array(
    [$this->controller, $this->method],
    $this->params
);
    }
    private function controllerFromUrl($segment)
    {
        return str_replace(
            ' ',
            '',
            ucwords(
                str_replace('-', ' ', $segment)
            )
        );
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return array_filter(
                explode('/', rtrim($_GET['url'], '/'))
            );
        }

        return [];
    }

    // 404 page
    private function show404(): void
    {
        http_response_code(404);

        require_once '../app/Views/errors/404.php';
    }

}
