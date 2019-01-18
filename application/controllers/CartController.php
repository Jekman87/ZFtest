<?php

class CartController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $numbers = new Zend_Session_Namespace('numbers');


        echo "a = " . $numbers->a * Zend_Registry::get('plus') ."<br>";
        echo "b = " . $numbers->b * Zend_Registry::get('plus') ."<br>";
        echo "c = " . $numbers->c * Zend_Registry::get('plus') ."<br>";





    }




}



