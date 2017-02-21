<?php

class mailController extends Controller
{
   
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index()
    {
	header('location: http://www.sosmedica.com:2096');
    }
}

?>
