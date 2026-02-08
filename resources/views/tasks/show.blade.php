@extends('tasks.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">📄 Chi tiết công việc</h5>
                    <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-secondary">⬅ Quay lại</a>
                </div>
                <div class="card-body">
                    <h4 class="fw-bold mb-3">{{ $task->title }}</h4>
                    <p class="text-muted"><strong>Mô tả:</strong></p>
                    <p>{{ $task->description }}</p>
                    <p><strong>Hạn chót:</strong> <span
                            class="badge bg-danger">{{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}</span></p>
                    <p><strong>Trạng thái:</strong>
                        @if ($task->status == '0')
                            <span class="badge bg-warning text-dark">Chưa làm</span>
                        @elseif ($task->status == '1')
                            <span class="badge bg-success">Đang làm</span>
                        @elseif ($task->status == '2')
                            <span class="badge bg-secondary">Hoàn thành</span>
                        @endif
                    </p>

                    <div class="mt-4 d-flex justify-content-end">
                        <a href="{{ route('tasks.edit', 1) }}" class="btn btn-warning me-2">✏️ Sửa</a>
                        <button class="btn btn-danger">🗑 Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection