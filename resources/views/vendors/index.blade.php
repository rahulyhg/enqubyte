@extends('layouts.app')

@section('content')
<div class="container-fluid pl-0 pr-0">
    <div class="headline-contents border-bottom-0 headline-contents-height">
        <h2 class="d-inline-block headline-content"><span><a href="/home"> Home  </a><i class="fa fa-angle-right ml-2 mr-2" aria-hidden="true"></i></span> Vendors</h2>
        <div class="float-md-right">
            <div class="btn-toolbar d-inline-block" role="toolbar">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="/vendorsexcel" class="btn btn-light {{count($vendors) ? '' : 'disabled'}}"><i class="fa fa-file-excel"></i> Excel</a>
                    <a href="/vendorspdf" class="btn btn-light {{count($vendors) ? '' : 'disabled'}}"><i class="fa fa-file-pdf"></i> PDF</a>
                    <a href="/vendorscsv" class="btn btn-light {{count($vendors) ? '' : 'disabled'}}"><i class="fas fa-file-csv"></i> CSV</a>
                </div>
            </div>
            <a href="#addVendorModal" data-toggle="modal" class="btn btn-primary">Add Vendor</a>
        </div>
    </div>
    <div class="table-responsive-sm">
        <table class="table dataTable">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th width="160px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendors as $key => $vendor)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>
                        <img src="{{ Avatar::create($vendor->name)->toBase64() }}" style="width: 32px; height: 32px; margin-right: 7px;">
                        {{$vendor->name}}
                    </td>
                    <td>{{$vendor->email}}</td>
                    <td>{{$vendor->phone}}</td>
                    <td>
                        <a href="#editVendorModal{{$key}}" data-toggle="modal" class="btn btn-sm"><i class="fas fa-pencil-alt"></i>  </a>
                        <a href="/vendors/{{$vendor->id}}" class="btn btn-sm"><i class="fa fa-eye"></i></a>

                        <form method="post" action="/vendors/{{$vendor->id}}/delete" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger product-delete-btn" onclick="return confirm('Are you sure, You want to delete this employee?');"><i class="fa fa-trash"></i> </button>
                        </form>

                        <div class="modal fade in editVendorModal{{$key}} pr-md-0" id="editVendorModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Vendor</h5>
                                        <button type="button" class="close btn-close-modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="/vendors/{{$vendor->id}}/update">
                                        @csrf
                                        <div class="modal-body">
                                            @if(auth()->user()->mode)
                                            <div class="form-group">
                                                <label>Store<sup class="error">*</sup></label>
                                                <select name="store_id" class="form-control" required>
                                                    <option disabled>-- Select Store --</option>
                                                    @foreach($stores as $store)
                                                    <option value="{{$store->id}}" {{$vendor->store_id == $store->id ? 'selected' : ''}}>{{$store->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @else
                                            <input type="hidden" name="store_id" value="0">
                                            @endif
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label>Name<sup class="error">*</sup></label>
                                                    <input type="text" name="name" value="{{$vendor->name}}" class="form-control" placeholder="Name" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label>Contact Person<sup class="error">*</sup></label>
                                                    <input type="text" name="contact_person" value="{{$vendor->contact_person}}" class="form-control" placeholder="Contact Person">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label>Phone<sup class="error">*</sup></label>
                                                    <input type="text" maxlength="10" minlength="10" pattern="\d*" name="phone" value="{{$vendor->phone}}" class="form-control" placeholder="Phone" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label>Email Address</label>
                                                    <input type="email" name="email" value="{{$vendor->email}}" class="form-control" placeholder="Vendor email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address" class="form-control" placeholder="Address">{{$vendor->address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-close-modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



<div class="modal fade in addVendorModal pr-md-0" id="addVendorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Vendor</h5>
                <button type="button" class="close btn-close-modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/vendors">
                @csrf
                <div class="modal-body">
                    @if(auth()->user()->mode)
                    <div class="form-group">
                        <label>Store<sup class="error">*</sup></label>
                        <select name="store_id" class="form-control" required>
                            <option disabled selected>-- Select Store --</option>
                            @foreach($stores as $store)
                            <option value="{{$store->id}}">{{$store->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @else
                    <input type="hidden" name="store_id" value="0">
                    @endif
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Name<sup class="error">*</sup></label>
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Contact Person</label>
                            <input type="text" name="contact_person" maxlength="50" class="form-control" placeholder="Contact Person">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Phone<sup class="error">*</sup></label>
                            <input type="text" maxlength="10" minlength="10" pattern="\d*" name="phone" class="form-control" placeholder="Phone" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Vendor email" data-parsley-remote="{{url('/vendors/email/{value}/available')}}" data-parsley-remote-message="Email already exist!">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" placeholder="Address"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close-modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"> Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
