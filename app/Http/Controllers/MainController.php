<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function actionIndex(){
        return view("main");
    }
    public function actionAbout(Request $request){
        return view("about",[
            "author"=>$request->get("author","I`am"),
            "authors"=>["vasia","trulala"]
        ]);
    }
    public function actionProfile($name){
        return view("profile",[
            "name"=>$name
        ]);
    }
}


