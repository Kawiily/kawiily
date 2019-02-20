<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Models\Home;
use App\Http\Controllers\Ajax;

class HomeController extends Controller{
    public $home;
    public function __construct(){
        $this->home=new Home();// 实例化model
    }
    public function register(){
        return view('vendor/register');
    }
    public function index(){
        return view('vendor/index');
    }
    public function login(){
        return view('vendor/login');
    }
    public function sign(){
        $input = Input::all();
        $res=$this->home->signInfo($input['name'],$input['pwd']);
        if($res == 1){
            echo '<script>alert("用户不存在");location.href="'.'login'.'";</script>';
        }elseif($res ==2){
            echo '<script>alert("密码错误");location.href="'.'login'.'";</script>';
        }else{
            echo '<script>alert("登录成功");location.href="'.'show'.'";</script>';
        }
    }
    public function home(){
        return view('vendor/home');
    }
    public function add(){
        $input = Input::all();
        $res=$this->home->getInfo($input);
        if($res){
            echo '<script>alert("添加成功");location.href="'.'show'.'";</script>';
        }
    }
    public function enroll(){
        $input = Input::all();
        $res=$this->home->getInfo($input);
        if($res){
            echo '<script>alert("注册成功,可以登录了");location.href="'.'login'.'";</script>';
        }
    }
    public function show(){
        $data=$this->home->showInfo();
        if(isset($data)){
            return view('vendor/show',['data'=>$data]);
        }

    }
    public function delete(){
        $input = Input::all();
        $res=$this->home->delRow($input['id']);
        if($res){
            echo '<script>alert("删除成功");location.href="'.'show'.'";</script>';
        }
    }
    public function upload(){
        echo '<script>alert("此功能暂不可用");location.href="'.'show'.'";</script>';
    }
    public function signOut(){
        // 释放全部 session
        Session::flush();
        echo '<script>alert("退出成功");location.href="'.'login'.'";</script>';
    }
    public function search(){
        $input = Input::all();
        $res = $this->home->search($input);
        echo $res;
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/15
 * Time: 22:36
 */

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function index()
    {
        return view('index/index');
    }
    public function login(){
        $info = $input = Input::all();
        $data = DB::table("admin_user")->where("username",$info['username'])->get()->toArray();
        if(!empty($data)){
            foreach($data as $k=>$v){
                if($v->password != $info['password']){
                    echo '<script>alert("密码错误");location.href="'.'../index'.'";</script>';
                }else{
                    Session::put('username', $info['username']);
                    echo '<script>alert("登录成功");location.href="'.'userlist'.'";</script>';
                }
            }
        }else{
            echo '<script>alert("用户不存在");location.href="'.'../index'.'";</script>';
        }

    }


    public function user(){
        return view("user/userlist");
    }



}