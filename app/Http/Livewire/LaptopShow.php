<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Laptop;
use Livewire\Component;
 
class LaptopShow extends Component
{
    use WithPagination;
 
    protected $paginationTheme = 'bootstrap';
 
    public $code, $name, $category, $laptop_id;
    public $search = '';
 
    protected function rules()
    {
        return [
            'code' => 'required|string|unique:laptops',
            'name' => 'required|string',
            'category' => 'required|string',
        ];
    }
 
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
 
    public function saveLaptop()
    {
        $validatedData = $this->validate();
 
        Laptop::create($validatedData);
        session()->flash('message','laptop Added Successfully');
        $this->resetInput();
        $this->closeModal();
    }
     
    public function editLaptop(int $laptop_id)
    {
        $laptop = Laptop::find($laptop_id);
        if($laptop){
 
            $this->laptop_id = $laptop->id;
            $this->code = $laptop->code;
            $this->name = $laptop->name;
            $this->category = $laptop->category;
        }else{
            return redirect()->to('/laptops');
        }
    }
 
    public function updateLaptop()
    {
        $validatedData = $this->validate();
 
        Laptop::where('id',$this->laptop_id)->update([
            'code' => $validatedData['code'],
            'name' => $validatedData['name'],
            'category' => $validatedData['category']
        ]);
        session()->flash('message','laptop Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
     
    public function deleteLaptop(int $laptop_id)
    {
        $this->laptop_id = $laptop_id;
    }
 
    public function destroyLaptop()
    {
        Laptop::find($this->laptop_id)->delete();
        session()->flash('message','laptop Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
 
    public function closeModal()
    {
        $this->dispatchBrowserEvent('close-modal');
    }
 
    public function resetInput()
    {
        $this->code = '';
        $this->name = '';
        $this->category = '';
        $this->dispatchBrowserEvent('close-modal');
    }
 
    public function render()
    {
        $laptops = Laptop::where(function ($query) {
            $query->where('code', 'like', '%' . $this->search . '%')
                  ->orWhere('name', 'like', '%' . $this->search . '%')
                  ->orWhere('category', 'like', '%' . $this->search . '%');
        })->orderBy('id', 'ASC')->paginate(10);
        //$laptops = laptop::select('id','code','name','category')->get();
        return view('livewire.laptop-show', ['laptops' => $laptops]);
    }
}
