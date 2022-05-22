@extends('dashboard.layouts.master')
@section('style')
    <link rel="stylesheet" href="/path/to/select2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection
@section('content')
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <div class="col-xl-12 box-margin height-card">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-sm-4 col-xs-4">
                            <p> ایجاد نقش: </p>
                            <form action="{{route('roles.store')}}" method="post">
                                @csrf
                                @include('sections.error')
                                <div class="form-group">
                                    <label for="exampleInputEmail111">نام نقش: </label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail111">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail111">توضیح نقش: </label>
                                    <input type="text" name="description" value="{{old('description')}}" class="form-control" id="exampleInputEmail111">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail111">انتخاب مجوز : </label>
                                    <select class="form-control select" name="permissions[]" multiple="multiple" id="">
                                        @foreach($permissions as $permission)
                                          <option value="{{$permission->id}}">{{$permission->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">ثبت</button>
                            </form>
                        </div>
                        <div class=" col-sm-8 col-12 box-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-2">لیست نقش ها</h4>
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                        <tr>
                                            <th>نام نقش</th>
                                            <th>توضیح نقش</th>
                                            <th>نمایش مجوزها</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td>{{$role->name}}</td>
                                                <td>
                                                    {{$role->description}}
                                                </td>
                                                <td>
                                                    @foreach($role->permissions as $permission)
                                                        {{$permission->description}} -
                                                    @endforeach
                                                </td>
                                                <td class="d-flex">
                                                    <a class="btn btn-success btn-sm" href="{{route('roles.edit',['role'=>$role->id])}}">ویرایش</a>
                                                    <form action="{{route('roles.destroy',['role'=>$role->id])}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('آیا از حذف رکورد مورد نطر مطمئن هستید!')" class="btn btn-danger btn-sm">حذف</button>
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
@section('script')
    <script>
        $('.select').select2({
            theme: 'bootstrap4',
        });
    </script>
@endsection
