@extends('vendor.layout.master')
@section('title', '')
@section('content')
    <div class="admin-main-content border add-product-content">
        <div class="row mx-auto store-header">
            <div class="col-xl-11 py-4 mx-auto">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('public/uploads/website-images/images/tax-duty.png') }}">
                    <h3 class="ms-3">Taxes and duties</h3>
                </div>
            </div>
        </div>
        <h6>Manage sales tax collection</h6>
        <p>If you haven’t already, create a shipping zone in the region(s) you’re liable in. Then, find the region in this list and select it to manage its tax settings. If you’re unsure about where you’re liable, check with a tax professional.</p>
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
    <script>

    </script>
@endsection
