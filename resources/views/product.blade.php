@extends('layout')

@section('title', 'All Product')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Product List</h3>
        </div>
        <div class="nav navbar-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct">Add New</button>
        </div>
    </div>

    <div class="clearfix" style="height: 50px"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="datatable_promos" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Product Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th style="display: none">P id</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($product_list))
                    <?php $i = 1 ; ?>
                    @foreach($product_list as $product)
                        <tr id="type_row_<?php echo $i;?>">
                            <td>{{ $i }}</td>
                            <td>{{ $product['category'] }}</td>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['details'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td style="display: none">{{ $product['id'] }}</td>
                            <td>
                                <button id ="change_{{$product['id']}}" data-toggle="modal" data-target="#changeNews" class="btn btn_change btn-sm btn-info fa fa-edit" data-id="{{ $product['id'] }}"></button></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div><!--row-->

    <!--Add a Product -->

    <div id= "addProduct" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModaladdnewmenu">Add new Product</h4>
                </div>

                <div class="modal-body">
                    <form action="{{route('product.storeproduct')}}" method="post" id = "addProduct">
                        {{ csrf_field() }}

                        <label>Name</label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="name" name="name">
                        <br/>
                        <label>Category </label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="cat" name="cat">
                        <br/>
                        <label>Description</label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="details" name="details">
                        <br/>
                        <label>Price</label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="price" name="price">
                        <br>
                        <br>
                        <div class="pull-right">
                            <button id="saveProduct" type="submit" class="btn btn-primary">Save</button>
                            <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>

                <div class="modal-footer">

                </div>

            </div>

        </div>

    </div>

    <!--/add a Product-->

    <div id= "changeNews" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalEditProduct">Edit a Promo</h4>
                </div>

                <div class="modal-body">
                    <form action="{{route('product.updateproduct')}}" method="post" id = "editProducts" >
                        {{ csrf_field() }}
                        <input type="hidden" name="p_id" id="p_id" value="">
                        <label>Name</label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="edit_name" name="edit_name">
                        <br/>
                        <label>Category </label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="edit_cat" name="edit_cat">
                        <br/>
                        <label>Description</label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="edit_details" name="edit_details">
                        <br/>
                        <label>Price</label>
                        <br/>
                        <input class="col-md-12 col-sm-12 col-xs-12" type="text" id="edit_price" name="edit_price">
                        <br>
                        <br>
                        <div class="pull-right">
                            <button id="save_edit_Product" type="submit" class="btn btn-primary">Save</button>
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
                var category = currentRow.find("td:eq(1)").text();
                var name = currentRow.find("td:eq(2)").text();
                var description =currentRow.find("td:eq(3)").text();
                var price = currentRow.find("td:eq(4)").text();
                var id = currentRow.find("td:eq(5)").text();

                $('#edit_name').val(name);
                $('#edit_cat').val(category);
                $('#edit_details').val(description);
                $('#edit_price').val(price);
                $('#p_id').val(id);

            });

        });
    </script>
@endsection