<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //渲染登录页面
    public function loginshow()
    {
        return view('login');
    }
    //登录
    public function login(Request $request)
    {
        $user = Auth::attempt();
        if ($user){
            $request->session();
            return redirect('show');
        }
    }
    //显示分配表单
    public function show(){
        $data = User::get();
        return view('show',compact('data'));
    }
    //添加的方法
    public function save(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'user_id' => 'required',
                'desc'=>'required'
            ]);
            return ['code'=>500,'msg'=>$validatedData];
        }catch (\Exception $exception){
            $data = Task::insert($request->except('_token'));
            if ($data){
                return ['code'=>200,'msg'=>'添加成功'];
            }
        }

    }
}
