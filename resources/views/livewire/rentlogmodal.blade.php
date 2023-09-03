<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="rentlogModal" tabindex="-1" aria-labelledby="rentlogModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rentlogModalLabel">Create RentLog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="saveRentLog">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Customer Name</label>
                        <input type="text" wire:model="customer_name" class="form-control">
                        @error('customer_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Laptop Name</label>
                        <input type="text" wire:model="laptop_name" class="form-control">
                        @error('laptop_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Rent Date</label>
                        <input type="date" wire:model="rent_date" class="form-control">
                        @error('rent_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Return Date</label>
                        <input type="date" wire:model="return_date" class="form-control">
                        @error('return_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
<!-- Update RentLog Modal -->
<div wire:ignore.self class="modal fade" id="updateRentLogModal" tabindex="-1" aria-labelledby="updateRentLogModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateRentLogModalLabel">Edit RentLog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateRentLog">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Customer Name</label>
                        <input type="text" wire:model="customer_name" class="form-control">
                        @error('customer_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Laptop Name</label>
                        <input type="text" wire:model="laptop_name" class="form-control">
                        @error('laptop_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Rent Date</label>
                        <input type="date" wire:model="rent_date" class="form-control">
                        @error('rent_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Return Date</label>
                        <input type="date" wire:model="return_date" class="form-control">
                        @error('return_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
 
<!-- Delete RentLog Modal -->
<div wire:ignore.self class="modal fade" id="deleteRentLogModal" tabindex="-1" aria-labelledby="deleteRentLogModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRentLogModalLabel">Delete RentLog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyRentLog">
                <div class="modal-body">
                    <h4>Are you sure you want to delete this data ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes! Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>