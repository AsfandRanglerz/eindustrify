@extends('admin.master_layout')
@section('title')
    <title>
        {{ __('Technical Support') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Technical Support') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.dashboard') }}">{{ __('admin.Dashboard') }}</a></div>

                </div>
            </div>

            <div class="section-body">
                {{-- <a href="{{ route('admin.send-email-to-all-customer') }}" class="btn btn-primary">{{__('admin.Send email to all user')}}</a> --}}
                {{-- <a href="{{ route('admin.add-customer') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                    {{ __('admin.Add New') }}</a> --}}
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>{{ __('admin.SN') }}</th>
                                                <th>{{ __('Ticket Id') }}</th>
                                                <th>{{ __('Date') }}</th>
                                                <th>{{ __('Subject') }}</th>
                                                <th>{{ __('Description') }}</th>
                                                <th>{{ __('status') }}</th>
                                                <th>{{ __('admin.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $technicalSupport)
                                                <?php
                                                $date = \Carbon\Carbon::parse($technicalSupport->date);
                                                ?>
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $technicalSupport->ticket_no }}</td>
                                                    <td>{{ $date->format('M d, Y') }}</td>
                                                    <td>{{ $technicalSupport->subject }}</td>
                                                    <td>{{ $technicalSupport->description }}</td>
                                                    <td>{{ $technicalSupport->status }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.technical-support-edit', $technicalSupport->id) }}"
                                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a href="javascript:;" data-toggle="modal"
                                                            data-target="#deleteModal" class="btn btn-danger btn-sm"
                                                            onclick="deleteData({{ $technicalSupport->id }})"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
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
    <!-- Modal -->
    <div class="modal fade" id="canNotDeleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    {{ __('admin.You can not delete this customer. Because there are one or more order and shop account has been created in this customer.') }}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('admin.Close') }}</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('admin/technical-support-delete/') }}' + "/" + id)
        }
    </script>
@endsection
