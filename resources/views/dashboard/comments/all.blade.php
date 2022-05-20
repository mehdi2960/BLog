@extends('dashboard.layouts.master')
@section('title','مدیریت نظرات')
@section('content')
    <div class="main-content">
        <div class="data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">لیست نظرات</h4>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>آیدی نظرات</th>
                                        <th>مربوط به</th>
                                        <th>نام نظردهنده</th>
                                        <th>متن نظر</th>
                                        <th>وضیعت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td>{{$comment->id}}</td>
                                            <td>
                                                @if($comment->commentable_type=="App\Models\Product")
                                                    محصولات
                                                @endif
                                            </td>
                                            <td>{{$comment->user->name}} </td>
                                            <td>{{$comment->text}}</td>
                                            <td>
                                                @if($comment->approved==1)
                                                    <span class="badge badge-success">تایید شده</span>
                                                @else
                                                    <span class="badge badge-danger">تایید نشده</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{route('comments.destroy',['comment'=>$comment->id])}}" method="post">
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
