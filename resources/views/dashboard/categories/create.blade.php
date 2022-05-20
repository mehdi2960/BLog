@extends('dashboard.layouts.master')
@section('content')
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <div class="col-xl-12 box-margin height-card">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-sm-6 col-xs-9">
                            <p> ایجاد دسته بندی: </p>
                            <form action="{{route('category.store')}}" method="post">
                                @csrf
                                @include('sections.error')
                                <div class="form-group">
                                    <label for="exampleInputEmail111">نام دسته بندی</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail111">
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">ایجاد دسته بندی</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
