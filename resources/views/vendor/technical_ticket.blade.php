@extends('vendor.layout.master')
@section('title', '')
@section('content')
    <style>
        .jquery-uploader-preview-container {
            padding: 0;
        }

        .jquery-uploader-select {
            background: #F6F6F6;
        }

        .jquery-uploader-select-card {
            border: 1px dashed #CCCCCC;
            padding: 0;
        }

        .jquery-uploader-select>.upload-button {
            height: unset;
        }

        .jquery-uploader-select>.upload-button span {
            color: #BBBBBB;
            text-transform: uppercase;
            font-weight: 600;
        }

        .jquery-uploader-select-card:hover {
            border-color: #b0191e;
        }

        .new-ticket-content .fa-arrow-left {
            width: 30px;
        }

        .new-ticket-content textarea {
            border: 1px solid #CCCCCC;
            background: #fff;
        }

        .new-ticket-content button {
            border: 1px solid #CCCCCC;
            background: #fff;
        }

        .new-ticket-content input:focus {
            border: 1px solid #CCCCCC;
            background: #fff;
        }

        .new-ticket-content .box {
            width: 100%;
            min-height: 150px;
            cursor: pointer;
            background: #F7F7F7;
            border: 2px dashed rgba(48, 48, 48, 0.3);
            padding: 20px 20px;
        }

        .new-ticket-content .box-inside {
            text-align: center;
            margin: 2em 0;
        }

        .new-ticket-content .submit-btn {
            width: 198px;
            background: #b0191e;
            color: #fff;
            font-size: 18px;
            font-weight: 600;
        }

        .new-ticket-content .box-inside .heading {
            font-family: 'Inter';
            font-weight: 600;
            color: rgba(28, 28, 28, 0.5);
        }
    </style>
    <div class="p-xl-4 p-2 admin-main-content border new-ticket-content">
        <div class="d-flex align-items-center">
            <button><span class="fas fa-arrow-left p-1"></span></button>
            <h3 class="ms-sm-3">Submit a Ticket</h3>
        </div>
        <div class="ms-5 mt-3">
            <p>Please enter details of your request. A member of our support staff will respond soon as possible</p>
        </div>
        <form action="{{URL('create-ticket')}}" method="POST"  enctype="multipart/form-data" class="mt-5">
           @csrf
            <div>
                <label for="subject" class="text-uppercase">Subject <span class="text-danger">*</span></label>
                <input type="text" name="subject" class="rounded-0 form-control" placeholder="subject">
            </div>
            <div class="mt-3">
                <label for="subject" class="text-uppercase">Description<span class="text-danger">*</span></label>
                <textarea name="description" class="w-100 rounded-0 form-control" cols="1" rows="10"></textarea>
            </div>

            <div class="mt-3">
                <label for="subject" class="text-uppercase">attachments <span class="text-danger">*</span></label>
                <div class="box py-5" id="attachmentFileBox">
                    <div class="box-inside">
                        <h6 class="heading file-val">Click to upload file</h6>
                        <small class="d-block mt-2">Maximum file size 50MB</small>
                    </div>
                </div>
                <input type="file" accept=".xls,.xlsx, .docx, .pdf" id="attachmentFile" name="document" class="d-none" />
                <div class="mt-3">
                    <button type="button" class="submit-btn p-3">Submit</button>
                </div>
            </div>
        </form>
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
        $(function() {
            $(document).on('click', '#attachmentFileBox', function() {
                $("#attachmentFile").click();
            });

            $('#attachmentFile').change(function() {
                var file = this.files[0];
                var fileSize = file.size;
                var maxSize = 50 * 1024 * 1024; // 50 MB
                if (fileSize < maxSize && file.length !== 0) {
                    alert("Selected file is below the required file size limit of 50MB.");
                    $('.file-val').text($('#attachmentFile').val().replace(/C:\\fakepath\\/i, ''));
                } else {
                    alert("Selected file exceeds the maximum file size limit of 50MB.");
                    $(this).val(""); // Clear the file input
                }
            });
        })
    </script>

@endsection
