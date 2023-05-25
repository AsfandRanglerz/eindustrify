@extends('admin.master_layout')
@section('title')
    <title>{{ __('admin.Product Brand') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('admin.Product Brand') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.dashboard') }}">{{ __('admin.Dashboard') }}</a></div>
                    <div class="breadcrumb-item">{{ __('admin.Product Brand') }}</div>
                </div>
            </div>

            <div class="section-body">
                <a href="{{ route('admin.product-brand.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                    {{ __('admin.Add New') }}</a>
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>{{ __('admin.SN') }}</th>
                                                <th>{{ __('admin.Name') }}</th>
                                                <th>{{ __('admin.Slug') }}</th>
                                                <th>{{ __('admin.Logo') }}</th>
                                                <th>{{ __('admin.Rating') }}</th>
                                                <th>{{ __('Type') }}</th>
                                                <th>{{ __('admin.Status') }}</th>
                                                <th>{{ __('admin.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($brands as $index => $brand)
                                                <tr>
                                                    <td>{{ ++$index }}</td>
                                                    <td>{{ $brand->name }}</td>
                                                    <td>{{ $brand->slug }}</td>
                                                    <td> <img class="rounded-circle" src="{{ asset($brand->logo) }}"
                                                            alt="" width="50px"></td>
                                                    <td>{{ $brand->rating }}</td>
                                                    <td>
                                                        @if($brand->is_featured==1)
                                                         Featured Brand
                                                         @else
                                                         Undefined Brand
                                                         @endif
                                                    </td>
                                                    <td>
                                                        @if ($brand->status == 1)
                                                            <a href="javascript:;"
                                                                onclick="changeProductBrandStatus({{ $brand->id }})">
                                                                <input id="status_toggle" type="checkbox" checked
                                                                    data-toggle="toggle" data-on="{{ __('admin.Active') }}"
                                                                    data-off="{{ __('admin.InActive') }}"
                                                                    data-onstyle="success" data-offstyle="danger">
                                                            </a>
                                                        @else
                                                            <a href="javascript:;"
                                                                onclick="changeProductBrandStatus({{ $brand->id }})">
                                                                <input id="status_toggle" type="checkbox"
                                                                    data-toggle="toggle" data-on="{{ __('admin.Active') }}"
                                                                    data-off="{{ __('admin.InActive') }}"
                                                                    data-onstyle="success" data-offstyle="danger">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.product-brand.edit', $brand->id) }}"
                                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a>

                                                            <a href="javascript:;" data-toggle="modal"
                                                                data-target="#deleteModal" class="btn btn-danger btn-sm"
                                                                onclick="deleteData({{ $brand->id }})"><i
                                                                    class="fa fa-trash" aria-hidden="true"></i></a>
                                                        <div class="dropdown d-inline">
                                                            <button class="btn btn-primary btn-sm dropdown-toggle"
                                                                type="button" id="dropdownMenuButton2"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="fas fa-cog"></i>
                                                            </button>

                                                            <div class="dropdown-menu" x-placement="top-start"
                                                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -131px, 0px);">

                                                                <a class="dropdown-item has-icon"
                                                                    href="{{ route('admin.product-brand-highlight', $brand->id) }}"><i
                                                                        class="fas fa-lightbulb"></i>
                                                                    {{ __('admin.Highlight') }}</a>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    <script>
        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('admin/product-brand/') }}' + "/" + id)
        }

        function changeProductBrandStatus(id) {
            var isDemo = "{{ env('APP_VERSION') }}"
            if (isDemo == 0) {
                toastr.error('This Is Demo Version. You Can Not Change Anything');
                return;
            }
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                url: "{{ url('/admin/product-brand-status/') }}" + "/" + id,
                success: function(response) {
                    toastr.success(response)
                },
                error: function(err) {
                    console.log(err);

                }
            })
        }
    </script>
@endsection
