<?php
/*
* App Core Class
* Creates URL and loads core controller
* URL FORMAT ~ /controller/method/params
*/
class Core {
    // if nothing else loads
    // we are going to load 'Pages'
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    //uses the superglobal get
    //to get the url
    public function __construct(){
        //print_r($this->getUrl());
        // so now we have our URL from the function below
        $url = $this->getUrl();
        //Look in controllers for first value, posts or whatever
         if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
            // if file exists, set it as the controller
            // for example, pages
            // remember if it doesn't exist,
            // we will just route it back to the default
            $this->currentController = ucwords($url[0]);
            // unset 0 index
            unset($url[0]);
        }
        // Require the controller
        // so if its one of our set files, we can require it
        require_once '../app/controllers/' . $this->currentController . '.php';
        // and then instantiate the controller
        $this->currentController = new $this->currentController;

        // check for second part of the url array
        if (isset($url[1])) {
            // Check to see if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // Unset 1 index
                unset($url[1]);
            }
        }


        //get $params
        $this->params = $url ? array_values($url) : [];

        // call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }
    public function getUrl(){
        // This is our getter
        // check forwhatever is in the get superglobal
        if (isset($_GET['url'])) {
            //strip the forward slash from the end
            $url = rtrim($_GET['url'], '/');
            //sanitise it for stuff that doesn't belong in a url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // this explodes it all into an array
            // whereever there is a forward slash
            // so clever.
            $url = explode('/', $url);
            // return the url
            return $url;

        }
    }
}
