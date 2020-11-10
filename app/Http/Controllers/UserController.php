<?php

namespace App\Http\Controllers;

use App\Helper\FireBase;
use App\Helper\UsersStatus;
use App\Http\Resources\UserResource;
use App\Notifications\ActiveUser;
use App\Repository\PublicRepository;
use App\Repository\UserRepository;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->middleware('auth:admin');
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users=$this->userRepository->findAll();
        return view('admin.users',compact('users'));
    }

    public function delete($id)
    {
        $this->userRepository->delete($id);
        return back()->with('success','User Deleted');
    }

    public function block($id)
    {
        $data['active']=UsersStatus::Blocked;
        $this->userRepository->update($id,$data);
        return back()->with('success','User Blocked');
    }

    public function activeAndDe($id)
    {
        $user=$this->userRepository->findById($id);
        if($user->active==UsersStatus::Active){
            $data['active']=UsersStatus::Deactive;
        }else{
            $data['active']=UsersStatus::Active;
        }
        $this->userRepository->update($id,$data);
        $newUser=$this->userRepository->findById($id);
        $return['token']=$newUser->createToken('renta')->accessToken;
        $return['user']=new UserResource($newUser);
        if($newUser->active==UsersStatus::Active) {
            $notify = [
                'title'=>'تفعيل العضويه',
                'message'=>'تم تفعيل العضويه بنجاح',
                'user'=>$return,
                'type' => 'activeUser',
            ];
            \Illuminate\Support\Facades\Notification::send($newUser, new ActiveUser($notify));
            FireBase::firebase($newUser->id,['status'=>'active']);
            FireBase::notification($newUser->firebase_token,$notify);
        }
        return back()->with('success','User Updated');
    }

    public function history($id)
    {
        $users=User::with(['posts','offers'])->find($id);
        return view('admin.history',compact('users'));
    }
}
