<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="laptopModal" tabindex="-1" aria-labelledby="laptopModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="laptopModalLabel">Tambah Laptop Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form >
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Laptop Code</label>
                        <input type="text" wire:model="code" class="form-control">
                        @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Laptop Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Laptop Category</label>
                        <input type="text" wire:model="category" class="form-control">
                        @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" wire:click="saveLaptop" class="btn btn-primary" wire:loading.attr="disabled">
                        <div wire:loading>
                            <div class="spinner-border spinner-border-sm" role="status">
                               
                              </div>
                        </div>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
 
<!-- Update Laptop Modal -->
<div wire:ignore.self class="modal fade" id="updateLaptopModal" tabindex="-1" aria-labelledby="updateLaptopModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateLaptopModalLabel">Edit Laptop</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateLaptop">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Laptop Code</label>
                        <input type="text" wire:model="code" class="form-control">
                        @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Laptop Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Laptop Category</label>
                        <input type="text" wire:model="category" class="form-control">
                        @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
 
<!-- Delete Laptop Modal -->
<div wire:ignore.self class="modal fade" id="deleteLaptopModal" tabindex="-1" aria-labelledby="deleteLaptopModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLaptopModalLabel">Delete Laptop</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyLaptop">
                <div class="modal-body">
                    <h4>Yakin ingin menghapus data?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>

