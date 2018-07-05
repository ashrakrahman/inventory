@extends('layout')

@section('title', 'Product Holders')

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Current Product Holders</h3>
        </div>
        <div class="nav navbar-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addHolder">Add New</button>
        </div>
    </div>

    <div class="clearfix" style="height: 50px"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="datatable_promos" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Employee Id </th>
                    <th>Product Id </th>
                    <th>Issue Date</th>
                    <th>QR code State</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($holder_list))
                    <?php $i = 1 ; ?>
                    @foreach($holder_list as $holder)
                        <tr id="type_row_<?php echo $i;?>">
                            <td>{{ $i }}</td>
                            <td>{{ $holder['employee_id'] }}</td>
                            <td>{{ $holder['product_id'] }}</td>
                            <td>{{ $holder['employee_issue_date'] }}</td>
                            <td>
                                @if($holder['qr_code_status']==0) <p style="color: red">Not Generated Yet</p>
                                    @else <p style="color: green">Generated</p>
                                @endif
                            </td>
                            <td>
                                <a href="/productholder/detail/{{$holder['id']}}" style="color: blue"> Detail </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div><!--row-->

    <div id= "addHolder" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModaladdnewmenu">Add A Product Holder</h4>
                </div>

                <div class="modal-body">
                    <form action="{{route('productholder.storeholder')}}" method="post" id = "addRequirement">
                        {{ csrf_field() }}

                        <label>Employee Id:</label>
                        <select id="employee_select" name="employee_select" class="select2_single form-control" style="width: 100%" >
                            <option value="">Select Employee</option>
                            @if(count($employee_list))
                                @foreach($employee_list as $employee)
                                    <option value="{{$employee['id']}}"> {{$employee['id']}} - {{ $employee['name'] }}</option>
                                @endforeach
                            @endif
                        </select>

                        <label>Product:</label>
                        <select id="product_select" name="product_select" class="select2_single form-control" style="width: 100%" >
                            <option value="">Select Product</option>
                            @if(count($product_list))
                                @foreach($product_list as $product)
                                    <option value="{{$product['id']}}">{{ $product['name'] }}</option>
                                @endforeach
                            @endif
                        </select>

                        <label>Issue Date : </label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="date" id="issue" name="issue">
                        <br/>
                        <br>
                        <div class="pull-right">
                            <button id="saveEmployee" type="submit" class="btn btn-primary">Save</button>
                            <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>

                <div class="modal-footer">

                </div>

            </div>

        </div>

    </div>

@endsection