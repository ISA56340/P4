<?php
//namespace JF\Blog\controller

class ErrorController
{
    public function errorNotFound()
    {
        require 'view/error_404.php';
    }

    public function errorServer()
    {
        require 'view/error_500.php';
    }
}