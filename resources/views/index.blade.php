@extends('layouts.app')
 
@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <div class="col-lg 4">
        <livewire:laptop-show>
    </div>
 
@endsection
 
@push('script')
<script>
    window.addEventListener('close-modal', event => {
 
        $('#laptopModal').modal('hide');
        $('#updateLaptopModal').modal('hide');
        $('#deleteLaptopModal').modal('hide');
    })
</script>
@endpush