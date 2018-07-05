@extends('layout')

@section('title', 'All Requirements')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Requirement List</h3>
        </div>
        <div class="nav navbar-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRequirement">Add New</button>
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
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($req_list))
                    <?php $i = 1 ; ?>
                    @foreach($req_list as $req)
                        <tr id="type_row_<?php echo $i;?>">
                            <td>{{ $i }}</td>
                            <td>{{ $req['employee_id'] }}</td>
                            <td>{{ $req['product_id'] }}</td>
                            <td><button class="btn btn-default" style="border-radius: 50%"> {{ $req['amount'] }} </button> </td>
                            <td>
                                <button id ="change_{{$req['id']}}" data-toggle="modal" data-target="#changeNews" class="btn btn_change btn-sm btn-info fa fa-edit" data-id="{{ $req['id'] }}"></button></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div><!--row-->
    <!--Add a Employee -->

    <div id= "addRequirement" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModaladdnewmenu">Set A Requirement</h4>
                </div>

                <div class="modal-body">
                    <form action="{{ route('requirement.storerequirement') }}" method="post" id = "addRequirement">
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

                        <label>No of Requirements : </label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="number" id="count" name="count">
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

    <!--/add a Employee-->
@endsection