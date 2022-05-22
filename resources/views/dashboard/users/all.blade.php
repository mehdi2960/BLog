@extends('dashboard.layouts.master')
@section('title','مدیریت کاربران')
@section('content')
    <div class="main-content">
        <div class="data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">لیست کاربران</h4>
                                <a href="{{route('users.create')}}" class="btn btn-success">افرودن کاربر</a>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>نام</th>
                                        <th>ایمیل</th>
                                        <th>وضیعت ایمیل</th>
                                        <th>نقش کاربری</th>
                                        <th>شماره تماس</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @if($user->email_verified_at)
                                                    <span class="badge badge-success">فعال</span>
                                                @else
                                                    <span class="badge badge-danger">غیرفعال</span>
                                                @endif

                                            </td>
                                            <td>
                                                @if($user->is_admin)
                                                    <span class="badge badge-success">مدیر</span>
                                                @elseif($user->is_operator)
                                                    <span class="badge badge-success">اپراتور</span>
                                                @else
                                                    <span class="badge badge-success">کاربر عادی</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->phone_number)

                                                    {{$user->phone_number}}
                                                @else
                                                    <span class="badge badge-danger">ندارد</span>
                                                @endif
                                            </td>
                                            <td style="display: flex !important;">
                                                <a href="{{route('users.edit',['user'=>$user->id])}}" class="btn btn-primary btn-sm">ویرایش</a>
                                                <a href="{{route('users.role',['user'=>$user->id])}}" class="btn btn-success btn-sm">دسترسی</a>
                                                <form action="{{route('users.destroy',['user'=>$user->id])}}" method="post">
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
