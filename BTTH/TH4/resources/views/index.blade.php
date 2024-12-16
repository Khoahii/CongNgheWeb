<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Isues</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="/issue/create" class="btn btn-success"><i class="material-icons">&#xE147;</i>
                                <span>Add
                                    New Isues</span></a>
                            <a href="#deleteEmployeeModal" class="btn btn-danger"><i class="material-icons">&#xE15C;</i>
                                <span>Delete</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mã vấn đề</th>
                            <th>Tên máy tính</th>
                            <th>Tên phiên bản</th>
                            <th>Người báo cáo sự cố</th>
                            <th>Thời gian báo cáo</th>
                            <th>Mức độ sự cố</th>
                            <th>Trạng thái hiện tại</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($issues as $issue)
                            <tr>
                                <td>{{ $issue->id }}</td>
                                <td>{{ $issue->computer->computer_name }}</td>
                                <td>{{ $issue->computer->model }}</td>
                                <td>{{ $issue->reported_by }}</td>
                                <td>{{ $issue->reported_date }}</td>
                                <td>{{ $issue->urgency }}</td>
                                <td>{{ $issue->status }}</td>
                                <td>
                                    <a href="{{ route('editIssue', $issue->id) }}" class="edit"><i
                                            class="material-icons">&#xE254;</i></a>
                                    <a class="delete btn-delete" data-id={{ $issue->id }}>
                                        <i class="material-icons">&#xE872;</i>
                                    </a>
                                    <!-- Form xóa -->
                                    <form class="frm-delete" action="" method="POST" style="display: inline;">
                                        @csrf @method('DELETE')
                                    </form>
                                    <!-- end Form xoa -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>{{ $issues->count() }}</b> out of <b>{{ $issues->totalissues }}</b>
                        entries</div>
                    <ul class="pagination">
                        <li class="page-item {{ $issues->page == 1 ? ' hidde' : '' }}">
                            <a href="/issue?page={{ $issues->page - 1 }}" class="page-link">Previous</a>
                        </li>
                        @for ($i = 1; $i <= $issues->totalPages; $i++)
                            <li class="page-item {{ $i == $issues->page ? 'active' : '' }}">
                                <a href="/issue?page={{ $i }}" class="page-link">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $issues->page == $issues->totalPages ? ' hidde' : '' }}">
                            <a href="/issue?page={{ $issues->page + 1 }}" class="page-link">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/issue.js') }}"></script>
</body>

</html>
