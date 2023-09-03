<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer;

class CustomerShow extends Component
{
    use WithPagination;
 
    protected $paginationTheme = 'bootstrap';
 
    public $name, $email, $phone, $address, $customer_id;
    public $search = '';
 
    protected function rules()
    {
        return [
            'name' => 'required|string',
            'email' => ['required','email'],
            'phone' => 'required',
            'address' => 'required|string',
        ];
    }
 
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
 
    public function saveCustomer()
    {
        $validatedData = $this->validate();
 
        Customer::create($validatedData);
        session()->flash('message','customer Added Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
     
    public function editCustomer(int $customer_id)
    {
        $customer = Customer::find($customer_id);
        if($customer){
 
            $this->customer_id = $customer->id;
            $this->name = $customer->name;
            $this->email = $customer->email;
            $this->phone = $customer->phone;
            $this->address = $customer->address;
        }else{
            return redirect()->to('/customers');
        }
    }
 
    public function updateCustomer()
    {
        $validatedData = $this->validate();
 
        Customer::where('id',$this->customer_id)->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address']
        ]);
        session()->flash('message','customer Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
     
    public function deleteCustomer(int $customer_id)
    {
        $this->customer_id = $customer_id;
    }
 
    public function destroyCustomer()
    {
        Customer::find($this->customer_id)->delete();
        session()->flash('message','customer Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
 
    public function closeModal()
    {
        $this->resetInput();
    }
 
    public function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->address = '';
    }
 
    public function render()
    {
        $customers = Customer::where('name', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(10);
        //$customers = Customer::select('id','name','email','phone','address')->get();
        return view('livewire.customer-show', ['customers' => $customers]);
    }
}

