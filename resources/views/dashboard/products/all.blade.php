@extends('dashboard.layouts.master')
@section('title','مدیریت محصولات')
@section('content')
    <div class="main-content">
        <div class="data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">لیست محصولات</h4>
                                <a href="{{route('products.create')}}" class="btn btn-success">افرودن محصول</a>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>آیدی محصول</th>
                                        <th>نام محصول</th>
                                        <th>توضیحات محصول</th>
                                        <th>قیمت محصول</th>
                                        <th>موچودی</th>
                                        <th>تعداد بازدید</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->title}}</td>
                                            <td>{{$product->text}}</td>
                                            <td>{{number_format($product->price)}}</td>
                                            <td>{{$product->amount}}</td>
                                            <td>{{$product->view}}</td>
                                            <td style="display: flex !important;">
                                                <a href="{{route('products.edit',['product'=>$product->id])}}" class="btn btn-primary btn-sm">ویرایش</a>
                                                <form action="{{route('products.destroy',['product'=>$product->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->
            </div>
        </div>
    </div>
@endsection
