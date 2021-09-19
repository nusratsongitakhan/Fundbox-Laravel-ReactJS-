<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event_category;

class CategoryController extends Controller
{
    public function categoryList(){
        $users = Event_category::all();

        // return view('User.CategoryList')->with('categoryList', $users)
        //                                     ->with('title', 'Category List');

        if( $users){
          
            return response()->json([
             'status' => 19,
             'list' =>  $users
          
             
         ]);
 
 
        }
       
    
}
}