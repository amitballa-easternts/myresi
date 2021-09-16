<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
class Table_register extends Model
{
    use HasFactory;
        
    //public $table='table_registers';
    public function scopeStore($query,$req)
    {
        $blog= new Table_register;
        $attribute=$req->validate([
            'fname'=>'required|max:10|min:2|unique:table_registers,fisrt_name',
            'lname'=>'required|max:10|min:2',
            'email'=>'required|unique:table_registers,email'
        ]);
        $blog->fisrt_name=$req->fname;
        $blog->lastname=$req->lname;
        $blog->email=$req->email;
        $blog->password= Hash::make($req->password);;
        $blog->email=$req->file('file')->store('img');
        $blog->save();
        $req->session()->flash("success","Register SuccessFully");

         
    }
    public function scopeUpdatehere($query,$req)
    {
        $data =Table_register::find($req->id);
        
        $data->fisrt_name=$req->fname;
        $data->lastname=$req->lname;

        
        $data->save();
    }
    public function scopeDeletehere($query,$req)
    {
        $data= Table_register::find($req->id);
        $data->delete();
    }

}
 