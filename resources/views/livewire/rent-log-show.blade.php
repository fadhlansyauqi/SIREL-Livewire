<div>
    @include('livewire.rentlogmodal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif
 
                <div class="card">
                    <div class="card-header">
                        <h4>Rent Log List
                            <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search..." style="width: 230px" />
                            <button type="button" class="btn btn-add float-end" data-bs-toggle="modal" data-bs-target="#rentlogModal">
                                Add New rentlog
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th>Laptop Name</th>
                                    <th>Rent Date</th>
                                    <th>Return Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rentlogs as $rentlog)
                                    <tr>
                                        <td>{{ $rentlog->id }}</td>
                                        <td>{{ $rentlog->customer_name }}</td>
                                        <td>{{ $rentlog->laptop_name }}</td>
                                        <td>{{ $rentlog->rent_date }}</td>
                                        <td>{{ $rentlog->return_date }}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#updateRentLogModal" wire:click="editRentLog({{$rentlog->id}})" class="btn btn-edit">
                                                Edit
                                            </button>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteRentLogModal" wire:click="deleteRentLog({{$rentlog->id}})" class="btn btn-danger">Delete</button>
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
                            {{ $rentlogs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</div> 