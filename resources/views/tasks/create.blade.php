@extends('tasks.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">+ Thêm công việc</h5>
            </div>
            <div class="card-body">
                <form action ={{ route('tasks.store') }} method="POST" novalidate>
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Tên công việc</label>
                        <input type="text" class="form-control @error('title') is-invalid
                        @enderror " name="title" id="title" placeholder="Nhập tên công việc..." value="{{ old('title') }}" required>
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control @error('description') is-invalid
                        @enderror" name="description" id="description" rows="3" placeholder="Nhập mô tả chi tiết..." value="{{ old('description') }}" required }}"></textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="due_date" class="form-label ">Hạn chót</label>
                        <input type="date" class="form-control @error('due_date') is-invalid
                        @enderror" name="due_date" id="due_date" value="{{ old('due_date') }}" required>
                        @error('due_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @endsection
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select id="status" name="status" class="form-select">
                            <option value="0" {{ old('status', '0') == '0' ? 'selected' : '' }}>Chưa làm</option>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Đang làm</option>
                            <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Hoàn thành</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">⬅ Quay lại</a>
                        <button type="submit" class="btn btn-primary">💾 Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
