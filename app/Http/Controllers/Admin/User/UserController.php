<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\MessageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use MessageTrait;
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function dashboard(){
        $admin = $this->user::count();
        return view('dashboard', compact('admin'));
    }    
    public function index()
    {
        $users = $this->user->latest()->get();
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $this->user->create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' =>Hash::make($request->password)
            ]);
            DB::commit();
            return $this->SuccessMessage('admin.user', __('message.added'));
        }catch(\Exception $ex){
            DB::rollback();
            return $this->ErrorMessage('admin.user.create', $ex->getMessage());
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id){
        $user = $this->user->findOrFail($id);
        return view('admin.user.edit',[
            'user' => $user,
        ]);
    }
    public function update(Request $request, $id){
        try{
            $user= $this->user->find($id);
            DB::beginTransaction();
            $user->where('users.id',$id)->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' =>Hash::make($request->password)
            ]);
            DB::commit();
            return $this->SuccessMessage('admin.user', __('message.updated') );
        }catch(\Exception $ex){
            DB::rollback();
            return $this->ErrorMessage('admin.user.edit', $ex->getMessage());
        }
    }
    public function changepassword(Request $request, $id){
        try{
            $user = $this->user->findOrFail($id);
            $user->password = Hash::make($request->password);
            return $this->SuccessMessage('admin.user',  __('message.updated'));
        }catch(\Exception $ex){
            DB::rollback();
            return $this->ErrorMessage('admin.user', $ex->getMessage());
        }
    }
    public function destroy($id){
        try{
            $user = $this->user->findOrFail($id);
            $user->delete();
            return $this->SuccessMessage('admin.user', __('message.deleted'));
        }catch(\Exception $ex){
            DB::rollback();
            return $this->ErrorMessage('admin.user', $ex->getMessage());
        }
    }
}
