<?php
abstract class ControllerBase {
    
    protected $view;
    
    function __construct()
    {
        $this->view = new View();
    }
}
?>