<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between mb-2">
                        <button wire:click.prevent="addNew" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i>Add New User</button>
                        <x-search-input />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">
                                            Role
                                        </th>
                                        <th scope="col">Options</th>
                                    </tr>
                                </thead>
                                <tbody wire:loading.class="text-muted">
                                    @forelse($users as $user)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            <img src="{{ $user->getAvatarUrlAttribute() }}" alt="" style="width:100px;height:100px">
                                            {{ $user->name }}
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <select name="" id="" class="form-control" wire:change="changeRole({{$user}},$event.target.value)">
                                                <option value="admin" {{($user->role=='admin'?'selected':'')}}>ADMIN</option>
                                                <option value="user" {{($user->role=='user'?'selected':'')}}>USER</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a href="" wire:click.prevent="edit({{$user}})">
                                                <i class="fa fa-edit mr-2"></i>
                                            </a>

                                            <a href="" wire:click.prevent="confirmUserRemaval({{$user->id}})">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <div>
                                        <tr class="text-center">
                                            <td colspan="5">
                                                No Results found
                                                <img src="{{ asset('backend/plugins/svg/resultsnotfound.svg') }}" height="150px" width="150px" alt="">
                                            </td>
                                        </tr>
                                    </div>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <!-- Modal -->
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <form autocomplete="off" wire:submit.prevent="{{$showEditModal? 'updateUser':'createUser'}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            @if($showEditModal)
                            <span>Edit User</span>
                            @else
                            <span>Add New User</span>
                            @endif
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input wire:model.defer="state.name" type="text" class="form-control @error('name')is-invalid @enderror" id="name" aria-describedby="emailHelp" placeholder="Enter email">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input wire:model.defer="state.email" type="email" class="form-control @error('email')is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input wire:model.defer="state.password" type="password" class="form-control @error('password')is-invalid @enderror" id="password" placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input wire:model.defer="state.password_confirmation" type="password" class="form-control @error('password_confirmation')is-invalid @enderror" id="password_confirmation" placeholder="Password">
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <!-- <label for="customFile">Custom File</label> -->
                            <label for="">Profile Photo</label>
                            @if($photo)
                            <img src="{{$photo->temporaryUrl()}}" class="img  d-block mt-2 mb-2 w-100"  alt="">
                            @else
                            <img src="{{$state['avatar_url']??''}}" class="img  d-block mt-2  mb-2 w-100"  alt="">
                            @endif
                            <div class="custom-file">
                                <div x-data="{ isUploading:false,progress:5} "
                                  x-on:livewire-upload-start="isUploading=true"
                                  x-on:livewire-upload-finish="isUploading=false; progress=5"
                                  x-on:livewire-upload-start="isUploading=false"
                                  x-on:livewire-upload-error="isUploading=false"
                                  x-on:livewire-upload-progress="progress=$event.detail.progress"
                                >
                                    <input wire:model="photo" type="file" class="custom-file-input" id="customFile">
                                    <div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                                        <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                                <label class="custom-file-label" for="customFile">
                                    @if($photo)
                                    {{$photo->getClientOriginalName()}}
                                    @else
                                    Choose file
                                    @endif
                                </label>

                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            @if($showEditModal)
                            <span>Save changes</span>
                            @else
                            <span>Save</span>
                            @endif
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- second modal -->
    <div class="modal fade" id="form2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    Are you sure you want to delete this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-2"></i>Close</button>
                    <button wire:click.prevent="deleteUser" type="submit" class="btn btn-danger"> <i class="fa fa-trash mr-2"></i>Delete user</button>
                </div>
            </div>

        </div>
    </div>

</div>
