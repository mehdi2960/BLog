@extends('dashboard.layouts.master')
@section('title','افزودن مقدار برای ویژگی')
@section('content')
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <div class="col-xl-12 box-margin height-card">
                <div class="card card-body">
                    <h4 class="card-title"> افزودن مقدار برای ویژگی :{{$attribute->name}}</h4>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <form action="{{route('attribute.post.value')}}" method="post">
                                @csrf
                                @include('sections.error')
                                <div class="form-group">
                                    <label for="exampleInputEmail111">مقدار</label>
                                    <input type="text" name="value" class="form-control" id="exampleInputEmail111">
                                </div>
                                <input type="hidden" value="{{$attribute->id}}" name="attribute_id">
                                <button type="submit" class="btn btn-primary mr-2">ثبت مقدار</button>
                            </form>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <h4 class="card-title mb-2">لیست مقدار</h4>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>آیدی مقدار</th>
                                        <th>نام مقدار</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($values as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->value}}</td>
                                            <td class="d-flex">
                                                <form action="{{route('attribute.delete.value',['attributeValue'=>$value->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                                </form>
                                                <a class="btn btn-success btn-sm" href="{{route('attribute.edit.value',['attributeValue'=>$value->id])}}">ویرایش</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
