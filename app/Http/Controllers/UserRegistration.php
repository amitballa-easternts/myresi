<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table_register;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserRegistration extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function store(Request $req)
    {
        $insert=Table_register::store($req);
        return redirect("reg");
        //return request()->all();

        // request()->validate([
        //     'name'=>'requred'
        // ]);

        // dd("successfull validation");
            // $blog= new Table_register;

            // $blog->fisrt_name=$req->fname;
            // $blog->lastname=$req->lname;
            // $blog->save();
            // $req->session()->flash("success","Register SuccessFully");

            // return redirect("reg");
    }

    public function list()
    {
        $data = Table_register::paginate(5);
        return view('list',["members"=>$data]);
    }
    public function deletehere(Request $id)
    {
        $data= Table_register::deletehere($id);
        
        return redirect("lists");
    }
    public function ShowData($id) 
    {
        $data= Table_register::find($id);
        return view("edit",["data"=>$data]);
    }
    public function updatehere(Request $req)
    {
        $insert =Table_register::updatehere($req);

        return redirect('lists');
    }
    public function login()
    {
        return view('login');
    }
    public function checklogin(Request $req)
    {
        $blog= new Table_register;
        $blog->email=$req->email;
        $blog->password=$req->password;
        $attribute=$req->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        //return $req->password;
        $req->session()->put('email',$req->email);
        //echo session('email');
        //return redirect('profile');

        $data=Table_register::where('email',$req->email)->first();
        //return $data['password'];
        // if (Hash::check($data['password'],$req->password))
        // {
        //     echo "no";
        // }
        // else{
        //     echo "yes";
        // }
         if($data!="")
         {
             
            if (Hash::check($req->password, $data['password'])) {
            
                return redirect('profile');
            }
            else
            {
                $req->session()->flash("invalid","Password Wrong");
                return redirect('login');
            }
         }   
         else
         {

            $req->session()->flash("invalid","Email Wrong");
            return redirect('login');
         }

         
    }

    public function querybuild()
    {
    
        return $data=DB::table('Table_registers')->get();
        //return $data=DB::table('Table_registers')->join('students','Table_registers.fisrt_name','=','students.username')->get();
        //return Table_register::count();
        //return view('querybuild',["members"=>$data]);
        
    }
    public function querymy($id=null)
    {
        return $id?Table_register::find($id) :Table_register::all();
        //return $data=DB::table('Table_registers')->get();
        //return $data=DB::table('Table_registers')->join('students','Table_registers.fisrt_name','=','students.username')->get();
        //return Table_register::count();
        //return view('querybuild',["members"=>$data]);
        
    }
    
    public function addpost(Request $req)
    {

        $blog= new Table_register;
        
        $blog->fisrt_name=$req->fisrt_name;
        $blog->lastname=$req->lastname;

        $result=$blog->save();
        if($result)
        {
            return ["reslut"=>"done"];
        }
        else{
            return ["result"=>"Not Done"];
        }
        
    }
}
