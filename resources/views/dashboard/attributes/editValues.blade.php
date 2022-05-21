@extends('dashboard.layouts.master')
@section('title','ویرایش مقدار')
@section('content')
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <div class="col-xl-12 box-margin height-card">
                <div class="card card-body">
                    <h4>ویرایش ویژگی مقدار : {{$attributeValue->value}}</h4>
                    <div class="row">

                        <div class="col-sm-6 col-xs-6">
                            <form action="{{route('attribute.update.value',['attributeValue'=>$attributeValue->id])}}" method="post">
                                @csrf
                                @method('PATCH')
                                @include('sections.error')
                                <div class="form-group">
                                    <label for="exampleInputEmail111">نام مقدار</label>
                                    <input type="text" name="value" value="{{$attributeValue->value}}"  class="form-control" id="exampleInputEmail111">
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">ویرایش مقدار</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
