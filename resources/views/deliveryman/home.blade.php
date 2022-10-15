@php
$userData = auth('deliveryman')->user();
@endphp
@extends('deliveryman.layouts.master')

@section('title')
    My Dashboard
@endsection

@section('custom_css')
    <style>
        .avatar-icon:hover {
            box-shadow: 0px 3px 6px 0px rgb(0, 0, 0, 0.1);
            transition: all 0.4s;
            transform: translate(50%, 40%);
        }
        .card-footer{
            border-radius: 10px !important;
        }
    </style>
@endsection

@section('content')
@include('deliveryman.components.alert')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Profile</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary">View All</a>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle"
                                aria-expanded="false">Options</a>
                            <div class="dropdown-menu" x-placement="bottom-start"
                                style="position: absolute; transform: translate3d(-5px, 26px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>
                                    #{{ $userData->id }}</a>
                                <a href="#" class="dropdown-item has-icon" id="editBtn" data-edit-mode="false"><i class="far fa-edit"></i> Edit</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
                                    Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('deliveryman.updateProfile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="profileImgFile" id="profileImgFile" accept="image/*" hidden>

                        <div class="media">
                            <figure class="avatar mr-2 avatar-xl">
                                @if ($userData->profileImg != '')
                                    <img id="currentProfileImg" src="{{ asset('uploads/deliveryman/' . $userData->profileImg) }}" alt="">
                                @else <img id="currentProfileImg" src="{{ asset('image/01.jpg') }}" alt="">
                                @endif
                                <button type="button" class="btn avatar-icon d-none" id="uploadImgBtn" style="border-radius: 50%;"><i
                                        class="fas fa-camera-retro" style="font-size: 20px;"></i></button>
                            </figure>
                            <div class="media-body ml-3">
                                <h5 class="mt-0">{{ $userData->name }}</h5>
                                <div data-hidden-input="">
                                    <input type="text" class="form-control mb-3" name="fullname" placeholder="Fullname..." value="{{ $userData->name }}">
                                </div>
                                <div class="form-group ml-3">
                                    <label>Email</label>
                                    <input type="text" style="background-color: #fdfdff" class="form-control" name="user_email" disabled
                                        placeholder="{{ $userData->email }}" data-enable-input="">
                                </div>
                                <div class="form-group ml-3">
                                    <label>Phone</label>
                                    <input type="tel" style="background-color: #fdfdff" class="form-control"  name="phone" disabled
                                        placeholder="{{ $userData->phone }}" data-enable-input="">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer bg-whitesmoke text-right">
                    <button class="btn btn-primary d-none" id="saveBtn">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script>
        /* Hide all the inputs */
        $('[data-hidden-input]').hide();

        /* Click on update Image */
        $('#uploadImgBtn').click(function(){
            $('#profileImgFile').trigger('click');
        });

        /* Check if uploaded files valid */
        $('#profileImgFile').change(function(){
            var fileType = this.files[0]['type'];
            var validFile = ['image/jpeg','image/jpg','image/png','image/webp','image/svg'];

            if(validFile.includes(fileType))
            {
                $('#currentProfileImg').attr('src',URL.createObjectURL(this.files[0]));
            }
            else{
                iziToast.error({
                        icon: 'fe-alert-triangle',
                        title: 'Caution',
                        message: 'Wrong File type',
                        position: 'bottomCenter',
                        transitionIn: 'bounceInUp'
                    });
                $(this).val(null);
            }
        })

        /* Click edit Button */
        $('#editBtn').click(function(){
            var editMode = $(this).data('edit-mode');
            if(editMode == false)
            {
                editModeOn();
                $(this).data('edit-mode', true);
            }
            else{
                editModeOff();
                $(this).data('edit-mode', false);
            }
        });

        function editModeOn(){
            $('[data-hidden-input]').show();
            $('[data-enable-input]').prop("disabled", false); // Element(s) are now enabled.
            $('#uploadImgBtn').removeClass("d-none");
            $('#saveBtn').removeClass("d-none");

        }

        function editModeOff(){
            $('[data-hidden-input]').hide();
            $('[data-enable-input]').prop("disabled", true); // Element(s) are now disabled.
            $('#uploadImgBtn').addClass("d-none");
            $('#saveBtn').addClass("d-none");
}
    </script>
@endsection
