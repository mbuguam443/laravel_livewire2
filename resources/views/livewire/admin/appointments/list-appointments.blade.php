<div>
   <x-loading-indicator/>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Appointments </h1>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Appointments</li>
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
                        <a href="{{ route('admin.appointments.create') }}">
                            <button class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i>Add New Appointments</button>
                        </a>
                        @if($SelectedRows)
                        <div class="btn-group" wire:ignore>
                            <button type="button" class="btn btn-default">Bulk Actions</button>
                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a wire:click.prevent="deleteSelectedRows" class="dropdown-item" href="#">Delete selected</a>
                                <a wire:click.prevent="markAllAsScheduled" class="dropdown-item" href="#">Mark as Scheduled</a>
                                <a wire:click.prevent="markAllAsClosed" class="dropdown-item" href="#">Mark as Closed</a>
                                <a wire:click.prevent="export" class="dropdown-item" href="#">Export</a>
                            </div>
                        </div>
                        <span>Selected {{count($SelectedRows)}} {{Str::plural('appointment',count($SelectedRows))}}</span>
                        @endif
                        <div class="btn-group">
                            <button wire:click="filterAppointmentByStatus" type="button" class="btn {{ is_null($status) ?'btn-secondary':'btn-default'}}">
                                <span class="mr-1">All</span>
                                <span class="badge badge-pill badge-info">{{$appointmentCount}}</span>
                            </button>
                            <button wire:click="filterAppointmentByStatus('scheduled')" type="button" class="btn {{ $status=='scheduled' ?'btn-secondary':'btn-default'}}">
                                <span class="mr-1">scheduled</span>
                                <span class="badge badge-pill badge-primary">{{$scheduledAppointmentCount}}</span>
                            </button>
                            <button wire:click="filterAppointmentByStatus('closed')" type="button" class="btn {{ $status=='closed' ?'btn-secondary':'btn-default'}}">
                                <span class="mr-1">closed</span>
                                <span class="badge badge-pill badge-success">{{$closedAppointmentCount}}</span>
                            </button>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="icheck-primary d-inline ml-2">
                                                <input wire:model="selectPageRows" type="checkbox" value="" name="todo2" id="todoCheck2">
                                                <label for="todoCheck2"></label>
                                            </div>
                                        </th>
                                        <th scope="col">#</th>
                                        <th scope="col">Client Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Registered Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Options</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($appointments as $appointment)
                                    <tr>
                                        <td>
                                            <div class="icheck-primary d-inline ml-2">
                                                <input wire:model="SelectedRows" type="checkbox" value="{{$appointment->id}}" name="todo2" id="{{$appointment->id}}">
                                                <label for="{{$appointment->id}}"></label>
                                            </div>
                                        </td>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$appointment->client->name}}</td>
                                        <td>{{$appointment->date}}</td>
                                        <td>{{$appointment->created_at->toFormattedDate()}}</td>
                                        <td>{{$appointment->time}}</td>
                                        <td>

                                            <span class="badge badge-{{$appointment->getStatusBadgeAttribute()}}">{{$appointment->status}}</span>


                                        </td>
                                        <td>

                                            <a href="{{route('admin.appointments.edit', $appointment)}}">
                                                <i class="fa fa-edit mr-2"></i>
                                            </a>

                                            <a href="" wire:click.prevent="confirmAppointmentRemoval({{$appointment->id}})">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            {!! $appointments->links() !!}

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
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
