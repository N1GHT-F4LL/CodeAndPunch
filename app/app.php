<?php
   class app{
      private $__controller, $__action, $__params;
      function __construct(){
         $this->__controller = 'home';
         $this->__action ='index';
         $this->__params = [];
         $this->handleURL();
      }
      function getURL(){
         if (!empty($_SERVER['PATH_INFO'])){
            $url = $_SERVER['PATH_INFO'];
         }else{
            $url = '/';
         }
         return $url;
      }
      public function handleURL(){
         // echo '<pre>';
         // print_r($_GET);
         // echo '</pre>';
         $url = $this->getURL();
         $urlArr = array_filter(explode('/',$url));
         $urlArr = array_values($urlArr);
         if (!empty($urlArr[0])){
            $this->__controller = $urlArr[0];
            if(file_exists('app/controllers/'.($this->__controller).'.php')){
               require_once 'controllers/'.($this->__controller).'.php';
               #echo $this->__controller;
               $this->__controller = new $this->__controller();
            }else{
               require_once 'hi-there.html';
            }
         }
      }
   }
?>