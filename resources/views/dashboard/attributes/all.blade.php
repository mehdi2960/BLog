@extends('dashboard.layouts.master')
@section('title','مدیریت ویژگی')
@section('content')
    <div class="main-content">
        <div class="data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">لیست ویژگی ها</h4>
                                <a href="{{route('attributes.create')}}" class="btn btn-success">افرودن ویژگی</a>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>آیدی ویژگی</th>
                                        <th>نام ویژگی</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($attributes as $attribute)
                                        <tr>
                                            <td>{{$attribute->id}}</td>
                                            <td>{{$attribute->name}}</td>
                                            <td class="d-flex">
                                                <form action="{{route('attributes.destroy',['attribute'=>$attribute->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                                </form>
                                                <a class="btn btn-success btn-sm" href="{{route('attributes.edit',['attribute'=>$attribute->id])}}">ویرایش</a>
                                                <a class="btn btn-primary btn-sm" href="{{route('attribute.value',['attribute'=>$attribute->id])}}">افزودن مقدار</a>
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
