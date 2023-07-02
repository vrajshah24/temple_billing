<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AdminModel;
class LoginController extends Controller
{
    // authentication
    public function authenticate(Request $request){
        $data = $request->all();
        $username = $data['username'];
        $password = $data['password'];


        $res = AdminModel::select('admin_id')->where('admin_username',$username)->where('admin_password',md5($password))->get();
        if(isset($res[0])){
            session(['admin_id' => $res[0]->admin_id]);
            echo 'success';
        }
        else{
            echo 'error';
        }
    }
    //logout
    public function logout(){
        session(['admin_id' => null]);
        return view('login');

    }
    // add new admin 
    public function addAdmin(){
        $admin_id = session('admin_id');
        if($admin_id != ''){
            return view('addAdmin');
        }else{
            return view('login');
        }
    }
    public function storeAdmin(Request $request){
        $admin_id = session('admin_id');
        if($admin_id != ''){
            $data = $request->all();
            $username = $data['username'];
            $password = $data['password'];
            $res = AdminModel::select('admin_id')->where('admin_username',$username)->get();
            if(!isset($res[0])){
                $adminDetails = [
                    'admin_id '=> null,
                    'admin_username' => $username,
                    'admin_password' => md5($password)
                 ];
                $res = AdminModel::create($adminDetails);
                if($res!=''){
                    echo "success";
                }else{
                    echo 'error-1';
                }
            }
            else{
                echo 'error-2';
            }
            
        }else{
            return view('login');
        }
    }
}
