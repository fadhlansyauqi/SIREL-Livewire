<div>
    @include('livewire.laptopmodal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
 
                <div class="card">
                    <div class="card-header">
                        <h4>Laptop List
                            <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search..." style="width: 230px" />
                            <button type="button" class="btn btn-add float-end" data-bs-toggle="modal" data-bs-target="#laptopModal">
                                Add New laptop
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="thead">
                                <tr>
                                    <th>ID</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = ($laptops->currentPage()-1) * $laptops->perPage()+1; 
                                @endphp
                                @forelse ($laptops as $laptop)
                                    <tr>
                                        <td>{{ $num++ }}</td>
                                        <td>{{ $laptop->code }}</td>
                                        <td>{{ $laptop->name }}</td>
                                        <td>{{ $laptop->category }}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#updateLaptopModal" wire:click="editLaptop({{$laptop->id}})" class="btn btn-edit ">
                                                Edit
                                            </button>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteLaptopModal" wire:click="deleteLaptop({{$laptop->id}})" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $laptops->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</div> 

