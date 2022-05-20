@extends('dashboard.layouts.master')
@section('title','مدیریت نظرات تائید نشده')
@section('style')
    <!-- These plugins only need for the run this page -->
    <link rel="stylesheet" href="/admin/css/default-assets/datatables.bootstrap4.css">
    <link rel="stylesheet" href="/admin/css/default-assets/responsive.bootstrap4.css">
    <link rel="stylesheet" href="/admin/css/default-assets/buttons.bootstrap4.css">
    <link rel="stylesheet" href="/admin/css/default-assets/select.bootstrap4.css">
    <link rel="stylesheet" href="/admin/css/default-assets/notification.css">
@endsection
@section('content')
    <div class="main-content">
        <div class="data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">لیست نظرات تایید نشده</h4>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>آیدی نظر</th>
                                        <th>مربوط به</th>
                                        <th>نام نظر دهنده</th>
                                        <th>متن نظر</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td>{{ $comment->id }}</td>
                                            <td>
                                                @if($comment->commentable_type == "App\Models\Product")
                                                    محصولات
                                                @endif
                                            </td>
                                            <td>{{ $comment->user->name }}</td>
                                            <td>{{ $comment->text }}</td>
                                            <td>
                                                <span class="badge-danger badge">تائید نشده</span>
                                            </td>
                                            <td class="d-flex">
                                                <form action="{{ route('comments.destroy',['comment'=>$comment->id]) }}" method="POST">
                                                    @CSRF
                                                    @method('delete')
                                                    <button type="submit" onclick="return confirm('آیا از حذف رکورد مورد نظر مطمیئن هستید؟')" class="btn btn-danger btn-sm">حذف</button>
                                                </form>
                                                <form action="{{ route('unapproved.post',['comment'=>$comment->id]) }}" method="POST">
                                                    @CSRF
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success btn-sm">تایید</button>
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

@section('script')
    <!-- These plugins only need for the run this page -->
    <script src="/admin/js/default-assets/jquery.datatables.min.js"></script>
    <script src="/admin/js/default-assets/datatables.bootstrap4.js"></script>
    <script src="/admin/js/default-assets/datatable-responsive.min.js"></script>
    <script src="/admin/js/default-assets/responsive.bootstrap4.min.js"></script>
    <script src="/admin/js/default-assets/datatable-button.min.js"></script>
    <script src="/admin/js/default-assets/button.bootstrap4.min.js"></script>
    <script src="/admin/js/default-assets/button.html5.min.js"></script>
    <script src="/admin/js/default-assets/button.flash.min.js"></script>
    <script src="/admin/js/default-assets/button.print.min.js"></script>
    <script src="/admin/js/default-assets/datatables.keytable.min.js"></script>
    <script src="/admin/js/default-assets/datatables.select.min.js"></script>
    <script src="/admin/js/default-assets/demo.datatable-init.js"></script>
    <script src="/admin/js/default-assets/bootstrap-growl.js"></script>
    <script src="/admin/js/default-assets/notification-active.js"></script>
@endsection
