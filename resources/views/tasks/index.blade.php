@extends('tasks.layout')

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Danh sách công việc</h5>
            <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-primary">+ Thêm Task</a>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('tasks.index') }}" class="row mb-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" value="{{ request('search')}}"
                        placeholder=" Tìm kiếm task...">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">-- Lọc theo trạng thái --</option>
                        <option value="0" @if (request('status') === '0') selected @endif>Chưa làm</option>
                        <option value="1" @if (request('status') === '1') selected @endif>Đang làm</option>
                        <option value="2" @if (request('status') === '2') selected @endif>Hoàn thành</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="sort_option" class="form-select">
                        <option value="">-- Sắp xếp theo --</option>
                        <option value="due_date_asc" @if (request('sort_option') === 'due_date_asc') selected @endif>Sắp đến hạn chót</option>
                        <option value="due_date_desc" @if (request('sort_option') === 'due_date_desc') selected @endif>Chưa đến hạn chót</option>
                        <option value="created_at_asc" @if (request('sort_option') === 'created_at_asc') selected @endif>Ngày tạo cũ nhất</option>
                        <option value="created_at_desc" @if (request('sort_option') === 'created_at_desc') selected @endif>Ngày tạo mới nhất</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Lọc</button>
                </div>
            </form>
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Công việc</th>
                        <th>Hạn chót</th>
                        <th>Trạng thái</th>
                        <th>Thời gian tạo</th>
                        <th>Người thực hiện</th>
                        <th class="text-end">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>
                                <span
                                    class="{{ $task->status == 'completed' ? 'text-decoration-line-through text-muted' : '' }}">
                                    {{ $task->title }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}</td>
                            <td>
                                @if ($task->status == '0')
                                    <span class="badge bg-warning text-dark">Chưa làm</span>
                                @elseif ($task->status == '1')
                                    <span class="badge bg-success">Đang làm</span>
                                @elseif ($task->status == '2')
                                    <span class="badge bg-secondary">Hoàn thành</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($task->created_at)->format('d/m/Y') }}</td>
                            <td>{{ $task->user->name  }}</td>
                            <td class="text-end">
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info text-white">Xem</a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Sửa</a>

                                {{-- Form xóa (Cần dùng POST/DELETE thay vì thẻ <a>) --}}
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                                    </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Không có công việc nào</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $tasks->links('vendor.pagination.bootstrap-5') }}
            </div>

        </div>
    </div>
@endsection