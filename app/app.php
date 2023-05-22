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
         // URL split
         $url = $this->getURL();
         $urlArr = array_filter(explode('/',$url));
         $urlArr = array_values($urlArr);

         // Controller process
         if (!empty($urlArr[0])){
            $this->__controller = $urlArr[0];
            if(file_exists('app/controllers/'.($this->__controller).'.php')){
               require_once 'controllers/'.($this->__controller).'.php';
               #echo $this->__controller;
               $this->__controller = new $this->__controller();
               unset($urlArr[0]);
            }else{
               require_once 'hi-there.html';
            }
         }

         // Action process
         if (!empty($urlArr[1])){
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
         }else{

         }

         // Params process
         if (!empty($urlArr[2])){
            $this->__params = array_values($urlArr);
            call_user_func_array($this->__controller,$this->__action,$this->__params);
         }else{

         }

         // Print for debug
         echo '<pre>';
         print_r($this->__params);
         echo '</pre>';
      }
   }
?>