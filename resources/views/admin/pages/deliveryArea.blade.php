@extends('admin.pages.master')

@section('title')
    Delivery Area
@endsection

@section('content')
    @include('admin.components.alert')
    <div class="row">

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Delivery Area</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.createCity') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p class="text-secondary">Basic Information</p>
                        <hr>
                        <input type="number" hidden name="categoryID" value="">

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>City Name</label>
                                <input type="text" class="form-control" name="cityName" placeholder="City Name" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <input type="submit" class="btn btn-success" value="Create">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Postal code</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.createPostcode') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p class="text-secondary">Basic Information</p>
                        <hr>
                        <input type="number" hidden name="categoryID" value="">

                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Area Name</label>
                                <input type="text" class="form-control" name="areaName" placeholder="Area Name" value="">
                            </div>

                            <div class="col-sm-3">
                                <label>Postcode</label>
                                <input type="number" class="form-control" name="postCode" placeholder="Postcode" value="">
                            </div>

                            <div class="col-sm-3">
                                <label>Min. Purchase Amount</label>
                                <input type="number" step="any" class="form-control" name="minPurchaseAmount"
                                    placeholder="min. Purchase Amount" value="">
                            </div>

                            <div class="col-sm-3">
                                <label>Select City</label>
                                <select name="cityId" class="form-control">
                                    <option value="" hidden>Select a city</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <input type="submit" class="btn btn-success" value="Create">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="text-center">
                <h4>Delivery and Postcode list</h4>
            </div>
            <div class="row">
                @foreach ($cities as $city)
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="p2">
                                            <h4 name="cityNameTitle">{{ $city->name }}</h4>
                                        </div>
                                        <div class="p2">
                                            <a href="#" class="btn btn-sm btn-primary" data-target="#editCityModal" data-toggle="modal" data-city_id="{{ $city->id }}" data-city_name="{{ $city->name }}"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.deleteCity',$city->id) }}" onclick="if(!confirm('Are you sure?')){return false;}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (count($city->getPostcode($city->id)) > 0)
                                    <div class="table responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Area Name</th>
                                                    <th>Postcode</th>
                                                    <th>min_amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($city->getPostcode($city->id) as $postcode)
                                                    <tr>
                                                        <td name="areaName">{{ $postcode->area }}</td>
                                                        <td name="postCode">{{ $postcode->postcode }}</td>
                                                        <td name="minPurchaseAmount">{{ $postcode->min_amount }}</td>
                                                        <td>
                                                            <a href="#" data-target="#editPostcodeModal" data-toggle="modal" 
                                                            data-postcode-info='{"id":"{{$postcode->id }}",
                                                                                "area": "{{ $postcode->area }}",
                                                                                "postcode": "{{ $postcode->postcode }}",
                                                                                "min_amount": "{{ $postcode->min_amount }}",
                                                                                "city_id": "{{ $postcode->city_id }}"}' 
                                                            class="btn btn-sm btn-primary">Edit</a>

                                                            <a href="{{ route('admin.deletePostcode',$postcode->id) }}" onclick="if(!confirm('Are you sure?')){return false;}" class="btn btn-sm btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection


@section('modal')
    <div class="modal fade" id="editCityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit City</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="editCityForm" enctype="multipart/form-data">
                        <input type="hidden" id="cityId" required>
                        <p class="text-secondary">Basic Information</p>
                        <hr>
                        <input type="number" hidden name="categoryID" value="">

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label>City Name</label>
                                <input type="text" class="form-control" id="renamedCity" placeholder="City Name" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success" id="editCityBtn">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editPostcodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Postcode</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="editPostcodeForm" enctype="multipart/form-data">
                        <input type="hidden" id="postCodeId" required>
                        <p class="text-secondary">Basic Information</p>
                        <hr>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Area Name</label>
                                <input type="text" class="form-control" id="areaName_postCodeEdit" placeholder="Area Name" value="" required>
                            </div>

                            <div class="col-sm-6">
                                <label>Postcode</label>
                                <input type="number" class="form-control" id="postCode_postCodeEdit" placeholder="Postcode" value="" required>
                            </div>

                            <div class="col-sm-6">
                                <label>Min. Purchase Amount</label>
                                <input type="number" step="any" class="form-control" id="minPurchaseAmount_postCodeEdit"
                                    placeholder="min. Purchase Amount" value="" required>
                            </div>

                            <div class="col-sm-6">
                                <label>Select City</label>
                                <select id="cityId_postCodeEdit" class="form-control" required>
                                    <option value="" hidden>Select a city</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success" id="editPostcodeBtn">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script>
        /* edit City Modal */
        $('#editCityModal').on('shown.bs.modal',(e)=>{
            var targetBtn = $(e.relatedTarget);
            $('#cityId').val(targetBtn.data('city_id'));
            $('#editCityModal').val(targetBtn.data('city_name'));

            $('#editCityForm').submit((e)=>{
                e.preventDefault();

                var formData = new FormData();
                formData.append("cityName",$('#editCityModal').val());
                formData.append("cityId",$('#cityId').val());
                formData.append("_token","{{ csrf_token() }}");
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.editCity') }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:(resp)=>{
                        if(resp == 0)
                        {
                            $('#editCityBtn').html('Success <i class="fas fa-check"></i>');
                            targetBtn.parent().parent().find('h4[name="cityNameTitle"]').html($('#editCityModal').val());
                            setInterval(()=>{
                                $('#editCityBtn').html('Update');
                            },2000);
                        }
                        else{
                            console.error("Failed to edit")
                        }
                    },
                    error:(err)=>{
                        console.error(err.responseText);
                    }
                })
            });
        });

        $('#editCityModal').on('hidden.bs.modal',()=>{
            $('#editPostcodeForm').trigger('reset');
        });

        /* edit Postcode Modal */
        $('#editPostcodeModal').on('shown.bs.modal',(e)=>{
            var targetBtn = $(e.relatedTarget);

            var dataset = targetBtn.data('postcode-info');
            
            $('#postCodeId').val(dataset.id);
            $('#areaName_postCodeEdit').val(dataset.area);
            $('#postCode_postCodeEdit').val(dataset.postcode);
            $('#minPurchaseAmount_postCodeEdit').val(dataset.min_amount);
            $('#cityId_postCodeEdit').val(dataset.city_id).change();

            $('#editPostcodeForm').submit((e)=>{
                e.preventDefault();

                var formData = new FormData();
                formData.append("postCodeId",$('#postCodeId').val());
                formData.append("areaName",$('#areaName_postCodeEdit').val());
                formData.append("postCode",$('#postCode_postCodeEdit').val());
                formData.append("minPurchaseAmount",$('#minPurchaseAmount_postCodeEdit').val());
                formData.append("cityId",$('#cityId_postCodeEdit').val());
                formData.append("_token","{{ csrf_token() }}");

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.editPostcode') }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:(resp)=>{
                        if(resp == 0)
                        {
                            $('#editPostcodeBtn').html('Success <i class="fas fa-check"></i>');
                            var getPostcodeInputsfield = targetBtn.parent().parent();
                            getPostcodeInputsfield.find('td[name="areaName"]').html($('#areaName_postCodeEdit').val());
                            getPostcodeInputsfield.find('td[name="postCode"]').html($('#postCode_postCodeEdit').val());
                            getPostcodeInputsfield.find('td[name="minPurchaseAmount"]').html($('#minPurchaseAmount_postCodeEdit').val());

                            setInterval(()=>{
                                $('#editPostcodeBtn').html('Update');
                            },2000);
                        }
                        else{
                            console.error("Failed to edit")
                        }
                    },
                    error:(err)=>{
                        console.error(err.responseText);
                    }
                })
            });

        });

        $('#editPostcodeModal').on('hidden.bs.modal',()=>{
            $('#editPostcodeForm').trigger('reset');
        });
    </script>
@endsection