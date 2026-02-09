<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">
                    {{ __('Todo List Dashboard') }}
                </h2>
                <p class="text-sm text-gray-500">
                    Quản lý công việc thông minh, đơn giản và nhanh chóng.
                </p>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                @auth
                    <a href="{{ route('tasks.index') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                        Vào trang Task
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center rounded-md border border-indigo-600 px-4 py-2 text-sm font-semibold text-indigo-600 hover:bg-indigo-50">
                        Đăng nhập
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                            Đăng ký
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-700">
                    <div class="grid gap-6 md:grid-cols-2">
                        <div class="space-y-4">
                            <h3 class="text-xl font-semibold text-gray-900">Todo List Pro giúp bạn làm gì?</h3>
                            <ul class="space-y-2 text-sm text-gray-600">
                                <li>✅ Tạo task mới và theo dõi tiến độ rõ ràng.</li>
                                <li>✅ Lưu trữ an toàn, đồng bộ tài khoản của bạn.</li>
                                <li>✅ Sắp xếp công việc theo mức độ ưu tiên.</li>
                                <li>✅ Xem danh sách, chỉnh sửa và hoàn thành nhanh.</li>
                            </ul>
                            @auth
                                <div class="rounded-md border border-green-100 bg-green-50 p-4 text-sm text-green-700">
                                    Bạn đang đăng nhập với tài khoản <strong>{{ Auth::user()->email }}</strong>. 
                                    Hãy vào trang Task để bắt đầu công việc ngay!
                                </div>
                            @else
                                <div class="rounded-md border border-blue-100 bg-blue-50 p-4 text-sm text-blue-700">
                                    Hãy đăng nhập hoặc đăng ký để lưu toàn bộ danh sách công việc của bạn.
                                </div>
                            @endauth
                        </div>
                        <div class="space-y-4">
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-6">
                                <h4 class="text-lg font-semibold text-gray-900">Bắt đầu nhanh</h4>
                                <p class="mt-2 text-sm text-gray-600">
                                    Sau khi đăng nhập, bạn sẽ được chuyển tới trang Task để tạo mới, cập nhật hoặc xoá công việc.
                                    Bạn cũng có thể quay lại Dashboard bất cứ lúc nào để xem tổng quan.
                                </p>
                                <div class="mt-4 flex flex-wrap gap-2">
                                    <span class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1 text-xs font-medium text-indigo-700">Nhanh gọn</span>
                                    <span class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-xs font-medium text-emerald-700">An toàn</span>
                                    <span class="inline-flex items-center rounded-full bg-amber-100 px-3 py-1 text-xs font-medium text-amber-700">Dễ dùng</span>
                                </div>
                            </div>
                            <div class="rounded-lg border border-gray-200 p-6">
                                <h4 class="text-lg font-semibold text-gray-900">Cần hỗ trợ?</h4>
                                <p class="mt-2 text-sm text-gray-600">
                                    Nếu bạn gặp vấn đề về đăng nhập hoặc đăng xuất, hãy thử tải lại trang
                                    hoặc kiểm tra trạng thái đăng nhập trong menu header.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
