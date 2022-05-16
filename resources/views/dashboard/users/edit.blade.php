@extends('dashboard.layouts.master')
@section('title','ویرایش کاربر')
@section('content')
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <div class="col-xl-12 box-margin height-card">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="{{route('users.update',['user'=>$user->id])}}" method="post">
                                @csrf
                                @method('PATCH')
                                @include('sections.error')
                                <div class="form-group">
                                    <label for="exampleInputEmail111">نام</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail111" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail12">آدرس ایمیل</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail12" value="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword11">کلمه عبور</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword11" placeholder="رمز عبور">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword12">تکرار کلمه عبور</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword12" placeholder="تکرار رمز عبور">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">ویرایش کاربر</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
