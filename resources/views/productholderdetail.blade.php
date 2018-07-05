@extends('layout')

@section('title', 'Details')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Product Holder Detail</h3>
        </div>
    </div>
    <table id="datatable_holders" class="table table-striped ">
        <tbody>
            <tr>
                <td> <strong> Employee Name : </strong> {{ $employee['name'] }}</td>
            </tr>
            <tr>
                <td> <strong> Employee E-mail : </strong>  {{ $employee['email'] }}</td>
            </tr>
            <tr>
                <td> <strong> Employee Phone : </strong>  {{ $employee['phone'] }}</td>
            </tr>
            <tr>
                <td> <strong> Employee Batch Id : </strong>  {{ $employee['batch_id'] }}</td>
            </tr>
            <tr>
                <td> <strong> Product Name : </strong>  {{ $product['name'] }}</td>
            </tr>
            <tr>
                <td> <strong> Product Type : </strong>  {{ $product['category'] }}</td>
            </tr>
            <tr>
                <td> <strong> Product Detail : </strong>  {{ $product['details'] }}</td>
            </tr>
            <tr>
                <td> <strong> Product Price : </strong>  {{ $product['price'] }}</td>
            </tr>
            <tr>
                <td style="padding: 0px"> </td>
            </tr>
            <tr>
                <td>
                    @if($holder['qr_code_status']==0)
                        <strong> QR code state : </strong>
                        <p style="color: red"> Not Generated Yet</p>
                        <a href="/productholder/addqrcode/{{$holder['id']}}"><button class="btn btn-success" > Generate </button></a>
                    @else
                        <strong> QR code state : </strong>
                        <p style="color: green">Generated</p>
                        <a href="/productholder/addqrcode/{{$holder['id']}}"><button class="btn btn-success" > Generate Again </button></a>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <p><strong> QR code : </strong></p>
                    @if($holder['qr_code_status']==0)
                         No QR code found!
                    @else
                        <img >
                            <?php echo QrCode::size(265)->generate($holder['qr_code']) ?>
                        </img>
                    @endif
                </td>
            </tr>

        </tbody>
    </table>
@endsection