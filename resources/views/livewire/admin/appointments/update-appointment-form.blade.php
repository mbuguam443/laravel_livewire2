<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Appointments</h1>
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
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="" autocomplete="off" wire:submit.prevent="updateAppointment">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <select name="" id="" wire:model.defer="state.client_id" class="form-control @error('client_id')is-invalid @enderror">
                                                <option value="">Select client</option>
                                                @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{$client->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('client_id')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Date -->
                                        <div class="form-group">
                                            <label>Date:..</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                                <x-datepicker wire:model.defer="state.date" id="appointmentdate" :error="'date'" />
                                                @error('date')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror


                                            </div>





                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Time picker:</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                                <x-timepicker wire:model.defer="state.time" id="appointmenttime" :error="'time'" />
                                                @error('time')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>

                                            <!-- /.input group -->
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Note:</label>
                                        <textarea name="" id="note" wire:model.defer="state.note" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Status:</label>
                                            <select name="" id="" wire:model.defer="state.status" class="form-control @error('status')is-invalid @enderror">
                                                <option value="">Select Status</option>
                                                <option value="SCHEDULED">Scheduled</option>
                                                <option value="CLOSED">Closed</option>
                                            </select>
                                            @error('status')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-start">
                                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">
                                    <span>Save Changes</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


</div>
