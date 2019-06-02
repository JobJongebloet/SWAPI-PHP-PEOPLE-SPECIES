<?php

class Application
{
    //Set main page
    public function __construct()
    {
            require 'C:\xampp\htdocs\phpWebsite\public\controller\home.php';
            $page = new Home();
            $page->index();
    }
}
