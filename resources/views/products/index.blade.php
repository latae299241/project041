@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <br><br>    
                <h2>ตารางสินค้า</h2>
            </div>
         <br><br>  <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> เพิ่มสินค้า </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<br>
    <table class="table table-bordered">
        <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>ราคาขาย</th>
            <th>หน่วยนับสินค้า</th>
            <th>รหัสคลังสินค้า</th>
            <th>รหัสผู้ผลิต</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->detail }}</td>
            <td>{{ $product->product }}</td>
            <td>{{ $product->sup }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $products->links() !!}

@endsection
