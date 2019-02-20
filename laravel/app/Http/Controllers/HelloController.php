<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/15
 * Time: 22:36
 */
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class HelloController extends Controller
{
    /**
     * No explanation
     *
     * @author Zhiqiang Guo
     * @return void
     * @throws Exception
     * @access public
     */
    public function index ()
    {
        return view('hello');
    }



}