@extends('Layout.masterlayout')
@section('content')
<div class="event">
    <div class="container">
    <div class="card-content">
        <div class="card-body">
            <div class="alert alert-success alert-dismissible mb-2" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bx bx-like"></i>
                    <b style="color: black;">
                        {{ session()->get('message') }}
                    </b>
                </div>
            </div>
        </div>
    </div>
        <div class="row" style="padding-bottom:30px;">
            <div class="col-12" >
                <h2 class="text-center" style="margin:30px 0px;">Organization Join form</h2>
                   
                <form action="/joinOrg" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="org_name">Organization Full name</label>
                        <input type="text" name="org_name" class="form-control" id="org_name" placeholder="Organization name" required>
                        <div class="invalid-feedback">
                            Valid Organization name is required.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="customer_phone">Phone</label>
                    <div class="input-group">
                        <input type="number" name="customer_phone" class="form-control" id="customer_phone" placeholder="Phone" required>
                        <div class="invalid-feedback" style="width: 100%;">
                              required.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="customer_Address">Address</label>
                    <div class="input-group">
                        <input type="text" name="customer_Address" class="form-control" id="customer_Address" placeholder="Address" required>
                        <div class="invalid-feedback" style="width: 100%;">
                             required.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="customer_details">Details</label>
                    <div class="input-group">
                        <input type="text" name="customer_details" class="form-control" id="customer_details" placeholder="Details" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            required.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="image" required>
                            <label class="custom-file-label" for="inputGroupFile02">Choose Event image</label>
                        </div>                        
                        <div class="invalid-feedback" style="width: 100%;">
                            required.
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Apply</button>
            </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection