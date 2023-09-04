<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RentLog;
use Livewire\WithPagination;
class RentLogShow extends Component
{
    use WithPagination;
 
    protected $paginationTheme = 'bootstrap';
 
    public $customer_name, $laptop_name, $rent_date, $return_date, $rentlog_id;
    public $search = '';
 
    protected function rules()
    {
        return [
            'customer_name' => 'required|string|',
            'laptop_name' => 'required|string',
            'rent_date' => 'required|date',
            'return_date' => 'date',
        ];
    }
 
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
 
    public function saveRentLog()
    {
        $validatedData = $this->validate();
 
        RentLog::create($validatedData);
        session()->flash('message','Rent Log Berhasil Ditambah!');
        $this->resetInput();
        $this->closeModal();
    }
     
    public function editRentLog(int $rentlog_id)
    {
        $rentlog = RentLog::find($rentlog_id);
        if($rentlog){
 
            $this->rentlog_id = $rentlog->id;
            $this->customer_name = $rentlog->customer_name;
            $this->laptop_name = $rentlog->laptop_name;
            $this->rent_date = $rentlog->rent_date;
            $this->return_date = $rentlog->return_date;
        }else{
            return redirect()->to('/rentlogs');
        }
    }
 
    public function updateRentLog()
    {
        $validatedData = $this->validate();
 
        RentLog::where('id',$this->rentlog_id)->update([
            'customer_name' => $validatedData['customer_name'],
            'laptop_name' => $validatedData['laptop_name'],
            'rent_date' => $validatedData['rent_date'],
            'return_date' => $validatedData['return_date']
        ]);
        session()->flash('message','Rent Log Berhasil Diperbaharui!');
        $this->resetInput();
        $this->closeModal();
    }
     
    public function deleteRentLog(int $rentlog_id)
    {
        $this->rentlog_id = $rentlog_id;
    }
 
    public function destroyRentLog()
    {
        RentLog::find($this->rentlog_id)->delete();
        session()->flash('message','Rent Log Berhasil Dihapus!');
        $this->closeModal();
    }
 
    public function closeModal()
    {
        $this->resetInput();
    }
 
    public function resetInput()
    {
        $this->customer_name = '';
        $this->laptop_name = '';
        $this->rent_date = '';
        $this->return_date = '';
    }
 
    public function render()
    {
        $rentlogs = RentLog::where(function ($query) {
            $query->where('customer_name', 'like', '%' . $this->search . '%')
                  ->orWhere('laptop_name', 'like', '%' . $this->search . '%')
                  ->orWhere('rent_date', 'like', '%' . $this->search . '%')
                  ->orWhere('return_date', 'like', '%' . $this->search . '%');
        })->orderBy('id', 'ASC')->paginate(10);
        //$rentlogs = RentLog::select('id','customer_name','laptop_name','rent_date')->get();
        return view('livewire.rent-log-show', ['rentlogs' => $rentlogs]);
    }
}
