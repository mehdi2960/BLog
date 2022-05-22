@extends('dashboard.layouts.master')
@section('content')
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <div class="col-xl-12 box-margin height-card">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-sm-4 col-xs-4">
                            <p> ویرایش نقش: </p>
                            <form action="{{route('roles.update',['role'=>$role->id])}}" method="post">
                                @csrf
                                @method('PATCH')
                                @include('sections.error')
                                <div class="form-group">
                                    <label for="exampleInputEmail111">نام نقش: </label>
                                    <input type="text" name="name" value="{{$role->name}}" class="form-control" id="exampleInputEmail111">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail111">توضیح نقش: </label>
                                    <input type="text" name="description" value="{{$role->description}}" class="form-control" id="exampleInputEmail111">
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">ویرایش نقش</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
