@extends('admin.pages.master')
<link rel="stylesheet" href="{{ asset('admin_area/assets/bundles/izitoast/css/iziToast.min.css') }}">

@section('title')
    Settings
@endsection

@section('content')
    @include('admin.components.alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Online Purchase</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="control-label">Open/Close</div>
                        <label class="custom-switch mt-2" title="@if($status->online_purchase == 1) Disable @else Enable @endif">
                          <input id="toogleStore" type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" @if($status->online_purchase == 1) checked @endif>
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description" name="statusText">@if($status->online_purchase == 1) Open @elseif($status->online_purchase == 0) Closed @endif</span>
                        </label>
                      </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Store</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="control-label">Open/Close</div>
                        <label class="custom-switch mt-2" title="@if($status->opening == 1) Disable @else Enable @endif">
                          <input id="toogleStoreOpen" type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" @if($status->opening == 1) checked @endif>
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description" name="statusText">@if($status->opening == 1) Open @elseif($status->opening == 0) Closed @endif</span>
                        </label>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
<script src="{{ asset('admin_area/assets/bundles/izitoast/js/iziToast.min.js') }}"></script>
<script>
    $('#toogleStore').on('change', function()
    {
        var status = null;
        if($(this).is(':checked'))
        {
            status = "on";
        }
        else{
            status = "off";
        }

        $.ajax({
            type:'POST',
            url:'{{ route('admin.setting') }}',
            dataType:'json',
            data:{
                "_token": "{{ csrf_token() }}",
                "status": status
            },
            success:function(resp){
                if(resp.code == 0)
                {
                    if(resp.status == 1)
                    {
                        $('#toogleStore').parent().find('span[name="statusText"]').text("Open");
                        $('#toogleStore').parent().prop('title', "Disable");
                            iziToast.success({
                            title: 'Enabled',
                            message: 'Store is Open ',
                            position: 'topRight'
                        });
                    }
                    else if(resp.status == 0)
                    {
                        $('#toogleStore').parent().find('span[name="statusText"]').text("Closed");
                        $('#toogleStore').parent().prop('title', "Enable");
                        iziToast.warning({
                            title: 'Disabled',
                            message: 'Store is Closed ',
                            position: 'topRight'
                        });
                    }
                }
            },
            error:function(err){
                console.error(err.responseText);
            }
        })
        
    })
    $('#toogleStoreOpen').on('change', function()
    {
        var status = null;
        if($(this).is(':checked'))
        {
            statusStore = "on";
        }
        else{
            statusStore = "off";
        }

        $.ajax({
            type:'POST',
            url:'{{ route('admin.setting') }}',
            dataType:'json',
            data:{
                "_token": "{{ csrf_token() }}",
                "statusStore": statusStore
            },
            success:function(resp){
                if(resp.code == 0)
                {
                    if(resp.status == 1)
                    {
                        $('#toogleStoreOpen').parent().find('span[name="statusText"]').text("Open");
                        $('#toogleStore').parent().prop('title', "Disable");
                            iziToast.success({
                            title: 'Enabled',
                            message: 'Store is Open ',
                            position: 'topRight'
                        });
                    }
                    else if(resp.status == 0)
                    {
                        $('#toogleStoreOpen').parent().find('span[name="statusText"]').text("Closed");
                        $('#toogleStore').parent().prop('title', "Enable");
                        iziToast.warning({
                            title: 'Disabled',
                            message: 'Store is Closed ',
                            position: 'topRight'
                        });
                    }
                }
            },
            error:function(err){
                console.error(err.responseText);
            }
        })
        
    })
</script>
@endsection
