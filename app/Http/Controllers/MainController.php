<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function actionIndex(){
        //Method 1
            //$posts = DB::select("SELECT * FROM `posts`");
        //Method 2
            $posts = DB::table('posts')->get();
            $users_posts = DB::table('posts')
                ->join("users","users.id","=","posts.user_id")
                ->select("posts.name","posts.content","users.name")->get();

        return view("main",["posts"=>$posts,"post_exist"=>$users_posts]);
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
    public function actionAddPost(Request $request){
        //Method 1

/*        DB::transaction(function() use ($request){
            DB::insert("INSERT INTO `posts` SET `user_id`=:user_id,
                    `name`=:name,
                    `content`=:content",
                ["user_id"=>1,
                    "name"=>$request["name"],
                    "content"=>$request['content']]);
        });*/
        //Method 2

        DB::table("posts")->insert(["user_id"=>1,
            "name"=>$request["name"],
            "content"=>$request['content']]);
        return redirect()->route("main");

    }
    public function actionDelPost($postid){

        //Method 1
        /*Если мы хотим обратиться не к подключению по умолчанию
        * используется DB::connection("подключение")
        */
/*        try{
            DB::beginTransaction();
            DB::connection("mysql")->delete("DELETE FROM `posts`
            WHERE `id`=:id",["id"=>(int)$postid]);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
        }*/
        //Method 2
        DB::table("posts")->delete($postid);
        return redirect()->route("main");
    }

    public function actionAdmin(){
        return view("admin");
    }
}


