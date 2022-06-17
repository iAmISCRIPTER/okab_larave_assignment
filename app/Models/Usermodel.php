<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Usermodel extends Model
{
    use HasFactory;

    public function userExists($email){
        $result = DB::table('users')->select('*')->where('email',$email)->get();       
        if(($result==NULL)|| sizeof($result)<=0){
            return false;
        }
        return true;
    }

    public function DeleteUser($id){
        DB::table('users')->where('id',$id)->delete();        
     }

    public function InsertUser($postAr){
       return  DB::table('users')->insertGetId($postAr);        
    }
    public function getList(){
        return  DB::table('users')->get();
    }

    public function getUser($id){
        return  DB::table('users')->where('id',$id)->get();
    }
    public function updateUser($id,$postAr){
        unset($postAr['id']);
        DB::table('users')->where('id',$id)->update($postAr);      
    }

    public function search($term){        
        return DB::table('users')
            ->Where('name', 'like',  trim($term) .'%')
            ->orWhere('address', 'like',  trim($term) .'%')
            ->orWhere('locality', 'like',  trim($term) .'%')
            ->get();

    }


}
