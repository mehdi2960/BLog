@extends('dashboard.layouts.master')
@section('title','مدیریت دسته بندی ها')
@section('content')
    <div class="main-content">
        <div class="data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">لیست دسته بندی ها</h4>
                                <a class="btn btn-success" href="{{route('category.create')}}">ایجاد دسته بندی</a>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>آیدی دسته بندی</th>
                                        <th>نام دسته بندی</th>
                                        <th>دسته بندی مادر</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categores as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>
                                                {{$category->name}}
                                            </td>
{{--                                            <td>{{$category->child->name}}</td>--}}
                                            <td>
                                                <a class="badge badge-success" href="{{route('category.edit',['category'=>$category->id])}}">ویرایش</a>
                                                <form action="{{route('category.destroy',['category'=>$category->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('آیا از حذف رکورد مورد نطر مطمئن هستید!')" class="badge badge-danger">حذف</button>
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
