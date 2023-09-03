@extends('layouts.app')
 
@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <div class="col-lg 4">
        <livewire:customer-show>
    </div>
 
@endsection
 
@section('script')
<script>
    window.addEventListener('close-modal', event => {
 
        $('#customerModal').modal('hide');
        $('#updateCustomerModal').modal('hide');
        $('#deleteCustomerModal').modal('hide');
    })
</script>
@endsection