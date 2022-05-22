@extends('dashboard.layouts.master')
@section('content')
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <div class="col-xl-12 box-margin height-card">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-sm-4 col-xs-4">
                            <p> ویرایش دسترسی: </p>
                            <form action="{{route('permissions.update',['permission'=>$permission->id])}}" method="post">
                                @csrf
                                @method('PATCH')
                                @include('sections.error')
                                <div class="form-group">
                                    <label for="exampleInputEmail111">نام دسترسی: </label>
                                    <input type="text" name="name" value="{{$permission->name}}" class="form-control" id="exampleInputEmail111">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail111">توضیح دسترسی: </label>
                                    <input type="text" name="description" value="{{$permission->description}}" class="form-control" id="exampleInputEmail111">
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">ویرایش دسترسی</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
