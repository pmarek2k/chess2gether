<?php

class LocationController extends AppController
{
    public function chooseLocation(){
        if(!$this->isPost()){
            if(isset($_COOKIE["user"])){
                $this->render("chooseLocation");
            }
            else{
                $this->render('login');
            }
        }

        echo "hello ❤";

    }

    public function createLocation(){
        if(!$this->isPost()){
            if(isset($_COOKIE["user"])){
                $this->render("createLocation");
            }
            else{
                $this->render('login');
            }
        }

        echo $_POST["latitude"];
        echo "</br>";
        echo $_POST["longitude"];
    }

}