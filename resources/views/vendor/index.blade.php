@extends('vendor.layout.master')
@section('title', '')
@section('content')
    <div class="p-xl-4 p-3 admin-main-content">
        <div class="admin-main-content-inner">
            <div class="dashboard-front-pg">
                <h4>Dashboard</h4>
                <h6>Here’s what’s happening with your store.</h6>                
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @if (\Illuminate\Support\Facades\Session::has('message'))
        <script>
            toastr.success('{{ \Illuminate\Support\Facades\Session::get('message') }}');
        </script>
    @endif
    @if (\Illuminate\Support\Facades\Session::has('error'))
        <script>
            toastr.error('{{ \Illuminate\Support\Facades\Session::get('error') }}');
        </script>
    @endif
@endsection