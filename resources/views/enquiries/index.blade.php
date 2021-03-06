@extends('layouts.app')

@section('content')
<div class="container-fluid pl-0 pr-0 ml-0 mr-0">
    <div class="headline-contents headline-contents-height">
        <h2 class="d-inline-block headline-content">Enquiries</h2>
        <div class="float-md-right">
            <div class="btn-toolbar d-inline-block" role="toolbar">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    @if(request('start_date'))
                    <a href="/enquiriesexcel?start_date={{request('start_date')}}&end_date={{request('end_date')}}" class="btn btn-light"><i class="fa fa-file-excel"></i> Excel</a>
                    @else
                    <a href="/enquiriesexcel" class="btn btn-light {{count($enquiries) ? '' : 'disabled'}}"><i class="fa fa-file-excel"></i> Excel</a>
                    @endif
                    <a href="/enquiriespdf" class="btn btn-light {{count($enquiries) ? '' : 'disabled'}}"><i class="fa fa-file-pdf"></i> PDF</a>
                    <a href="/enquiriescsv" class="btn btn-light {{count($enquiries) ? '' : 'disabled'}}"><i class="fas fa-file-csv"></i> CSV</a>
                </div>
            </div>
            <a href="/enquiries/add" class="btn btn-primary">Add Enquiry</a>

        </div>
    </div>
    @include('components.filters.datefilter')
    <div class="table-responsive-sm">
        <table class="table descDataTable">
            <thead>
                <tr class="product-list-menu">
                    <th>Enquiry No.</th>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Followup Date</th>
                    <th class="text-right">Amount</th>
                    <th>Status</th>
                    <th width="160px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enquiries as $key => $enquiry)
                <tr>
                    <td>ENQ-00{{$enquiry->sr_no}}</td>
                    <td>{{$enquiry->customer->fullname}}</td>
                    <td>{{$enquiry->enquiry_date}}</td>
                    <td>{{$enquiry->followup_date}} {{$enquiry->followup_time}}</td>
                    <td class="text-right">&#8377; {{number_format($enquiry->grand_total)}}</td>
                    <td><span class="badge badge-{{$enquiry->status == -1 ? 'danger' : ($enquiry->status == 1 ? 'success' : 'warning')}}">{{$enquiry->status == -1 ? 'Cancelled' : ($enquiry->status == 1 ? 'Converted' : 'Pending')}}</span> </td>
                    <td>
                        <a href="/enquiries/{{$enquiry->sr_no}}" class="btn btn-sm" title="Edit"><i class="fa fa-eye"></i></a>
                        @if(!$enquiry->status == -1 && !$enquiry->status == 1)
                        <a href="/enquiries/{{$enquiry->id}}/edit" class="btn btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                        @else
                        <a href="#" class="btn btn-sm disabled" title="Edit"><i class="fa fa-pencil"></i></a>
                        @endif
                        @if($enquiry->status == 1)
                        <a href="#" class="btn btn-sm disabled" title="Delete"><i class="fa fa-trash"></i></a>
                        @else
                        <form method="post" action="/enquiries/{{$enquiry->id}}/delete" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm" title="Delete" onclick="return confirm('Are you sure, You want to delete this enquiry?');"><i class="fa fa-trash"></i></button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
