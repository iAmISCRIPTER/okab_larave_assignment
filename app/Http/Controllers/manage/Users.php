<?php

namespace App\Http\Controllers\manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Usermodel;
use Illuminate\Support\Facades\Auth;

class Users extends Controller
{
    public function __construct() {

    }
   
    public function add(){
        return view('admin_manage.users.add');
        //return view('admin_manage.users.add');
    }
    public function list(){
        $result = Usermodel::getList();
        return view('admin_manage.users.list',['users'=> $result]);
    }
    public function delete($id){
        
        Usermodel::DeleteUser($id);

        if(Auth::user()['role']!=='admin'){
            return view('public.denied');
        }

        return redirect('users/list');        
    }

    public function update($id){
        $getUserData =  Usermodel::getUser($id);        
        if(($getUserData==NULL)||(sizeof($getUserData)<=0)){
            return view('public.denied');
        }
        return view('admin_manage.users.update',['user'=> $getUserData[0]]);       
    }

    public function search($str){
        $str = trim($str);
        if(strlen($str)<=0){
            return view('public.denied');
        }
        $getUserData =  Usermodel::search($str);        
        if(($getUserData==NULL)||(sizeof($getUserData)<=0)){
            return view('public.denied');
        }
        return view('admin_manage.users.list',['users'=> $getUserData]);    
    }



    public function savechanges(Request $request){

        $postAr = $request->all();
        unset( $postAr['_token']);      
        
        $result = Usermodel::updateUser( $postAr['id'],$postAr);

        return redirect('users/list');  
    }

    
    public function insert(Request $request){

        $postAr = $request->all();
        unset( $postAr['_token']);
        
        if(UserModel::userExists($postAr['email'])){
            return view('admin_manage.users.add',['error'=> $postAr['email'] . " already exists in our eco-system"]);            
        }

        $result = Usermodel::InsertUser($postAr);

        if($result==0){
            return view('admin_manage.users.add',['error'=>"Error :: Data Not Saved !!!"]);
        }else{
            return view('admin_manage.users.add',['error'=>"Sucess :: Data Saved"]);
        }
    }

}
