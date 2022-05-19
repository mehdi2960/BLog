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
                                        <th>عکس محصول</th>
                                        <th>قیمت محصول</th>
                                        <th>مشاهده تخفیف</th>
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
                                            <td>
                                                <img width="100" src="{{str_replace('public','/storage',$product->image)}}" alt="">
                                            </td>
                                            <td>{{number_format($product->price)}}</td>
                                            <td>
                                                @if(!$product->discount()->exists())
                                                <a href="{{route('product.discount.create',['product'=>$product->id])}}">تخفیف</a>
                                                @else
                                                    <span style="color:red;">{{$product->discount->value}}%</span>
                                                    <form action="{{route('product.discount.destroy',['discount'=>$product->discount->id,'product'=>$product->id])}}}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="badge badge-danger">حذف</button>
                                                    </form>
                                                    <a class="badge badge-primary" href="{{route('product.discount.edit',['discount'=>$product->discount->id,'product'=>$product->id])}}">ویرایش</a>
                                                @endif
                                            </td>
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
