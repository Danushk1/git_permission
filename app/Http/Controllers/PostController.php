<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('index')->with('posts',$posts);
    }

    public function store(Request $request)
    {


        //Role::create(['name' => 'admin']);
       // Role::create(['name' => 'subadmin']);
       // Role::create(['name' => 'user']);

     // Permission::create(['name' => 'view']);
     // Permission::create(['name' => 'create']);
     // Permission::create(['name' => 'edit']);
     // Permission::create(['name' => 'delete']);

/*$admin->givePermissionTo('view');
$admin->givePermissionTo('create');
$admin->givePermissionTo('edit');
$admin->givePermissionTo('delete');



$subadmin->givePermissionTo('view');
$subadmin->givePermissionTo('create');
$subadmin->givePermissionTo('delete');


$user->givePermissionTo('view');*/
/*
$admin = User::find(1);
$subadmin = User::find(2);
$user = User::find(3);

$admin->assignRole('admin');
$subadmin->assignRole('subadmin');
$user->assignRole('user');*/

/*
$role_admin = Role::where('name', 'admin')->first();
$role_subadmin = Role::where('name', 'subadmin')->first();
$role_user = Role::where('name', 'user')->first();

$role_admin->givePermissionTo('view');
$role_admin->givePermissionTo('create');
$role_admin->givePermissionTo('edit');
$role_admin->givePermissionTo('delete');



$role_subadmin->givePermissionTo('view');
$role_subadmin->givePermissionTo('create');
$role_subadmin->givePermissionTo('delete');


$role_user->givePermissionTo('view');
*/
#########################################################

       if($request->hasFile("cover")){
            $file=$request->file("cover");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("cover/"),$imageName);

            $post =new Post([
                "title" =>$request->title,
                "author" =>$request->author,
                "body" =>$request->body,
                "cover" =>$imageName,
            ]);
           $post->save();
        }

         

            return redirect("home");
        

    }

  
    public function edit($id)
    
    {
        $lg= Auth::user();
       $g = $lg->email;
       
        if($g== 'admin@gmail.com'){
            $posts=Post::findOrFail($id);
            return view('edit')->with('posts',$posts);
        }else{
            return redirect("login");
        }

     
    }

   
    public function update(Request $request,$id)
    {
     $post=Post::findOrFail($id);
     if($request->hasFile("cover")){
         if (File::exists("cover/".$post->cover)) {
             File::delete("cover/".$post->cover);
         }
         $file=$request->file("cover");
         $post->cover=time()."_".$file->getClientOriginalName();
         $file->move(\public_path("/cover"),$post->cover);
         $request['cover']=$post->cover;
     }

        $post->update([
            "title" =>$request->title,
            "author"=>$request->author,
            "body"=>$request->body,
            "cover"=>$post->cover,
        ]);
        
       

        return redirect("/home");

    }

   
    public function destroy($id)
    {
         $posts=Post::findOrFail($id);

         if (File::exists("cover/".$posts->cover)) {
             File::delete("cover/".$posts->cover);
         }
        
         $posts->delete();
         return back();


    }

   


}
