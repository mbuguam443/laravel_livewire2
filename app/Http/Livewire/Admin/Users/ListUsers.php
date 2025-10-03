<?php

namespace App\Http\Livewire\Admin\Users;

use App\Http\Livewire\Admin\AdminComponent;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ListUsers extends AdminComponent
{
    use WithFileUploads;
    public $state=[];
    public $showEditModal=false;
    public $user;
    public $userIdBeingRemoved;
    public $searchTerm=null;
    public $photo;

    protected $queryString = ['page'];

    public function addNew()
    {
       $this->reset();
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

        if($this->photo)
        {
            $Validateddata['avatar']=$this->photo->store('/','avatars');
        }

        User::create($Validateddata);
        $this->dispatchBrowserEvent('hide-form',['message'=>'user added successfully']);
    }
    public function edit(User $user)
    {

        $this->reset(['state', 'photo']);
        $this->user=$user;
        $this->showEditModal=true;
        $this->state=$user->toArray();
         //dd($this->state);
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
            Storage::disk('avatars')->delete($this->user->avatar);
            $Validateddata['password']=bcrypt($Validateddata['password']);
        }

       if($this->photo)
        {
            $Validateddata['avatar']=$this->photo->store('/','avatars');
        }

        $this->user->update($Validateddata);
        $this->dispatchBrowserEvent('hide-form',['message'=>'user updated successfully']);
    }
    public function render()
    {
        $users=User::query()
                ->where('name','like','%'.$this->searchTerm.'%')
                ->orwhere('email','like','%'.$this->searchTerm.'%')
                ->latest()
                ->paginate(2);
        return view('livewire.admin.users.list-users',[
            'users'=>$users
        ]);
    }
}
