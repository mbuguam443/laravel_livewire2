<?php

namespace App\Http\Livewire\Admin\Users;

use App\Http\Livewire\Admin\AdminComponent;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Livewire\WithPagination;

class ListUsers extends AdminComponent
{

    public $state=[];
    public $showEditModal=false;
    public $user;
    public $userIdBeingRemoved;

    public function addNew()
    {
       $this->state=[];
       $this->showEditModal=false;
       $this->dispatchBrowserEvent('show-form');
    }
    public function confirmUserRemaval($userId)
    {
       $this->userIdBeingRemoved=$userId;
       $this->dispatchBrowserEvent('show-delete-modal');
    }
    public function deleteUser()
    {
        $user=User::findorfail($this->userIdBeingRemoved);
        $user->delete();
        $this->dispatchBrowserEvent('hide-delete-form',['message'=>'user deleted successfully']);
    }
    public function createUser()
    {
        $Validateddata=Validator::make($this->state,[
            'name'=>'required',
            'email'=>'required | email | unique:users',
            'password'=>'required | confirmed',
        ])->validate();

        $Validateddata['password']=bcrypt($Validateddata['password']);

        User::create($Validateddata);
        $this->dispatchBrowserEvent('hide-form',['message'=>'user added successfully']);
    }
    public function edit(User $user)
    {
        $this->user=$user;
        $this->showEditModal=true;
        $this->state=$user->toArray();
        $this->dispatchBrowserEvent('show-form');
    }
    public function updateUser()
    {
        $Validateddata=Validator::make($this->state,[
            'name'=>'required',
            'email'=>'required | email | unique:users,email,'.$this->user->id,
            'password'=>'sometimes | confirmed',
        ])->validate();

        if(!empty($Validateddata['password']))
        {
            $Validateddata['password']=bcrypt($Validateddata['password']);
        }


        $this->user->update($Validateddata);
        $this->dispatchBrowserEvent('hide-form',['message'=>'user updated successfully']);
    }
    public function render()
    {
        $users=User::latest()->paginate(2);
        return view('livewire.admin.users.list-users',[
            'users'=>$users
        ]);
    }
}
