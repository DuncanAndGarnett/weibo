<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author Administrator
 */
class index {
    //put your code here
    
}
$a = DB::select('select * from message');
dd($a);
$a=DB::table("message");

