@extends('dashboard.layouts.master')
@section('content')
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <div class="col-xl-12 box-margin height-card">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-sm-4 col-xs-4">
                            <p> ایجاد دسترسی: </p>
                            <form action="{{route('permissions.store')}}" method="post">
                                @csrf
                                @include('sections.error')
                                <div class="form-group">
                                    <label for="exampleInputEmail111">نام دسترسی: </label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail111">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail111">توضیح دسترسی: </label>
                                    <input type="text" name="description" value="{{old('description')}}" class="form-control" id="exampleInputEmail111">
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">ایجاد دسترسی</button>
                            </form>
                        </div>
                        <div class=" col-sm-8 col-12 box-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-2">لیست دسترسی ها</h4>
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                        <tr>
                                            <th>نام دسترسی</th>
                                            <th>توضیح دسترسی</th>
{{--                                            <th>وضیعت</th>--}}
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($permissions as $permission)
                                            <tr>
                                                <td>{{$permission->name}}</td>
                                                <td>
                                                    {{$permission->description}}
                                                </td>
                                                <td>
                                                    <a class="badge badge-success" href="{{route('permissions.edit',['permission'=>$permission->id])}}">ویرایش</a>
                                                    <form action="{{route('permissions.destroy',['permission'=>$permission->id])}}" method="post">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
