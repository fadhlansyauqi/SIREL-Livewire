@extends('layouts.app')
 
@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <div class="col-lg 4">
        <livewire:rent-log-show>
    </div>
 
@endsection
 
@section('script')
<script>
    window.addEventListener('close-modal', event => {
 
        $('#rentlogModal').modal('hide');
        $('#updateRentLogModal').modal('hide');
        $('#deleteRentLogModal').modal('hide');
    })
</script>
@endsection