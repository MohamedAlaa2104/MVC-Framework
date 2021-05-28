<?php
/*
* App Core Class
* Creating Urls & Loads Core Controller
* URL Format - /controller/method/params
*/

class Core 
{
    protected $currentUrl = [];
    protected $currentController = 'home';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $this->getUrl();
        $this->requireController();
        $this->instantiatController();
        $this->getUrlParams();
    }

    public function getUrl()
    {
       if(isset($_GET['url']))
       {
           $url = rtrim($_GET['url'], '/');
           $url = filter_var($url, FILTER_SANITIZE_URL);
           $url = explode('/', $url);
           $this->currentUrl = $url;
       }
    }

    public function controllerPath($name)
    {
        return '../app/controller/' . ucwords($name) . 'Controller.php';
    }

    public function checkControllerFileExists($name)
    {
        if(!file_exists( $this->controllerPath($name) ))
            throw new Exception;
        
        $this->currentController = ucwords($name);
        unset($this->currentUrl[0]);
        
    }

    public function requireController()
    {
        try{
            if(isset($this->currentUrl[0]))
            $this->checkControllerFileExists($this->currentUrl[0]);
            require_once $this->controllerPath($this->currentController);
        }catch(Exception $e){
            $this->currentController = 'erorr';
        }
    }

    public function instantiatController()
    {
        $this->currentController = new $this->currentController;
    }

    public function getUrlParams()
    {
        if(isset($this->currentUrl[1]))
        {
            if(method_exists($this->currentController, $this->currentUrl[1]))
            {
                $this->currentMethod = $this->currentUrl[1];
                unset($this->currentUrl[1]);
            }
            $this->params = $this->currentUrl ? array_values($this->currentUrl) : [];
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }
    }
}
