@extends('layout')

@section('title', 'All Employee')

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Employee List</h3>
        </div>
        <div class="nav navbar-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmployee">Add New</button>
        </div>
    </div>

    <div class="clearfix" style="height: 50px"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="datatable_promos" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Employee Batch Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th style="display: none">U id</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($employee_list))
                        <?php $i = 1 ; ?>
                        @foreach($employee_list as $employee)
                            <tr id="type_row_<?php echo $i;?>">
                                <td>{{ $i }}</td>
                                <td>{{ $employee['batch_id'] }}</td>
                                <td>{{ $employee['name'] }}</td>
                                <td>{{ $employee['email'] }}</td>
                                <td>{{ $employee['phone'] }}</td>
                                <td style="display: none">{{ $employee['id'] }}</td>
                                <td>
                                    <button id ="change_{{$employee['id']}}" data-toggle="modal" data-target="#changeNews" class="btn btn_change btn-sm btn-info fa fa-edit" data-id="{{ $employee['id'] }}"></button></a>
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

    <div id= "addEmployee" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModaladdnewmenu">Add new Employee</h4>
                </div>

                <div class="modal-body">
                    <form action="{{route('employee.store')}}" method="post" id = "addEmployee">
                    {{ csrf_field() }}

                        <label>Name</label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="name" name="name">
                        <br/>
                        <label>Batch Id</label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="b_id" name="b_id">
                        <br/>
                        <label>Email</label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="email" name="email">
                        <br/>
                        <label>Phone No</label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="phone" name="phone">
                        <br>
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

    <div id= "changeNews" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalEditEmployee">Edit a Promo</h4>
                </div>

                <div class="modal-body">
                    <form action="{{route('employee.updateinfo')}}" method="post" id = "editEmployee" >
                        {{ csrf_field() }}
                        <input type="hidden" name="e_id" id="e_id" value="">
                        <label>Name</label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="edit_name" name="edit_name">
                        <br/>
                        <label>Batch Id</label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="edit_b_id" name="edit_b_id">
                        <br/>
                        <label>Email</label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="edit_email" name="edit_email">
                        <br/>
                        <label>Phone No</label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="edit_phone" name="edit_phone">
                        <br>
                        <br>
                        <div class="pull-right">
                            <button id="edit_saveEmployee" type="submit" class="btn btn-primary">Save</button>
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

@section('scripts')
    <script>
        $(document).ready(function() {

            $('html').on('click','.btn_change',function(){
                event.preventDefault();

                var currentRow = $(this).closest("tr");
                var name = currentRow.find("td:eq(2)").text();
                var b_id = currentRow.find("td:eq(1)").text();
                var email =currentRow.find("td:eq(3)").text();
                var phone = currentRow.find("td:eq(4)").text();
                var id = currentRow.find("td:eq(5)").text();

                $('#edit_name').val(name);
                $('#edit_b_id').val(b_id);
                $('#edit_email').val(email);
                $('#edit_phone').val(phone);
                $('#e_id').val(id);

            });

        });
    </script>
@endsection