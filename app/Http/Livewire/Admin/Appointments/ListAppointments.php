<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Appointment;
use Livewire\Component;

class ListAppointments extends AdminComponent
{
    protected $queryString=['status'];
    protected $listeners=['deleteConfirmed'=>'deleteAppointment'];
    public $appointmentIdBeingRemoved=null;
    public $status;
    public $SelectedRows=[];
    public $selectPageRows=false;



    public function markAllAsScheduled()
    {
       Appointment::whereIn('id',$this->SelectedRows)->update(['status'=>'SCHEDULED']);
       $this->reset(['SelectedRows','selectPageRows']);
    }

    public function markAllAsClosed()
    {
        Appointment::whereIn('id',$this->SelectedRows)->update(['status'=>'CLOSED']);
        $this->reset(['SelectedRows','selectPageRows']);
    }

    public function updatedselectPageRows($value)
    {
        if($value)
        {
           $this->SelectedRows=$this->appointments->pluck('id')->map(function($id){
               return (string)$id;
           });
        }else{
            $this->reset(['SelectedRows','selectPageRows']);
        }
        //dd($this->SelectedRows);
    }
    public function deleteSelectedRows()
    {
        Appointment::whereIn('id',$this->SelectedRows)->delete();
        $this->dispatchBrowserEvent('deleted',['message'=>'Appointment deleted successfully']);
        $this->reset(['SelectedRows','selectPageRows']);
    }
    public function getAppointmentsProperty()
    {
        return Appointment::with('client')
                      ->when($this->status,function($query,$status){
                           //dd($status);
                          return $query->where('status',$status);
                      })
                      ->latest()
                      ->paginate(5);
    }
    public function confirmAppointmentRemoval($appointmentId)
    {
        $this->appointmentIdBeingRemoved=$appointmentId;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }
    public function deleteAppointment()
    {
       $appointment=Appointment::findorfail($this->appointmentIdBeingRemoved);
       $appointment->delete();
       $this->dispatchBrowserEvent('deleted',['message'=>'Appointment deleted successfully']);
    }
    public function filterAppointmentByStatus($status=null)
    {
        $this->resetPage();
        $this->status=$status;
    }
    public function render()
    {
        $appointmentCount=Appointment::count();
        $scheduledAppointmentCount=Appointment::where('status','scheduled')->count();
        $closedAppointmentCount=Appointment::where('status','closed')->count();

        $appointments=$this->appointments;
        return view('livewire.admin.appointments.list-appointments',[
            'appointments'=>$appointments,
            'appointmentCount'=>$appointmentCount,
            'scheduledAppointmentCount'=>$scheduledAppointmentCount,
            'closedAppointmentCount'=>$closedAppointmentCount
        ]);
    }
}
