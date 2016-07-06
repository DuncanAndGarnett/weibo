<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LayoutController extends Controller
{
    //引入top模板
    public function top()
    {
        return view("layout.top");
    }
    
    public function left()
    {
       return view("layout.left"); 
     }
     
      public function right()
    {
       return view("layout.right"); 
     }
   
}
