@extends('layouts.app')

@section('content')
<div class="container-fluid pl-0 pr-0 ml-0 mr-0">
    <div class="headline-contents">
        <h2 class="d-inline-block headline-content"><span>
            <a href="/visitors" class="mr-1"><i class="fa fa-arrow-left"></i></a>
            <a href="/home"> Home  </a>
            <a href="/visitors"><i class="fa fa-angle-right ml-2 mr-2" aria-hidden="true"></i></span> Visitors</a>
            <i class="fa fa-angle-right ml-2 mr-2" aria-hidden="true"></i></span> {{$visitor->fullname}}
        </h2>
    </div>
    <div class="container-fluid px-md-5 status-user-amount-desktop mt-4">
        <div class="d-flex align-self-center">
            <div class="py-2">
                <h3 class="mb-1"><a href="" class="text-primary custom-primary-text"> {{$visitor->fullname}}</a></h3>
                <p style="font-weight: 400;font-size: 17px;color:#000;">
                   <b style="font-weight: 500;">{{ $visitor->phone }}</b>
                </p>
            </div>
            <div class="ml-auto p-2">
                <div class="d-flex">
                    <div class="px-4 text-center">
                        <div><b>Total Enquiries</b></div>
                        <h3 class="mt-2 Due">{{ count($visitor->enquiries)}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-md-5 status-user-amount-responsive">
        <div class="d-flex justify-content-between">
            <div class="py-2 text-left">
                <div>Visitor</div>
                <h3><a href="" class="text-primary custom-primary-text"> {{$visitor->fullname}}</a></h3>
            </div>
            <div class="py-2 text-right">
                <div>Total Enquiries</div>
                <h3 class="mt-2 Due">{{ count($visitor->enquiries)}}</h3>
            </div>
        </div>
    </div>

    <div class="container-fluid px-md-5 mt-3">
        <div class="card">
            <div class="card-header">
                <strong>Enquiries</strong>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive-sm">
                    <table class="table table-striped custom-show-table mb-0">
                        <thead>
                            <tr>
                                <th class="center">Enquiry No.</th>
                                <th>Date</th>
                                <th>Followup Date</th>
                                <th>Details</th>
                                <th class="right">Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($visitor->enquiries as $key => $enquiry)
                            <tr>
                                <td>{{$enquiry->id}}</td>
                                <td>{{$enquiry->enquiry_date}}</td>
                                <td>{{$enquiry->followup_date}}</td>
                                <td><a href="/enquiries/{{$enquiry->id}}" target="_blank"># Enquiry {{$enquiry->id}}</a></td>
                                <td>&#8377; {{number_format($enquiry->grand_total)}}</td>
                                <td><span class="badge badge-{{$enquiry->status == -1 ? 'danger' : ($enquiry->status == 1 ? 'success' : 'warning')}}">{{$enquiry->status == -1 ? 'Cancelled' : ($enquiry->status == 1 ? 'Converted' : 'Pending')}}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection