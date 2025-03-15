@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center gap-1">
                            <h4 class="card-title flex-grow-1">All Posts List</h4>
                            <a href="{{ route('post_create') }}" class="btn btn-sm btn-primary">
                                Add Post
                            </a>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover table-centered">
                                <thead class="bg-light-subtle">
                                    <tr>
                                        {{-- <th>ID</th> --}}
                                        <th>Title</th>
                                        <th>Category</th> <!-- Thêm cột danh mục -->
                                        <th>Content</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            {{-- <td>{{ $post->id }}</td> --}}
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->category->name ?? 'N/A' }}</td>
                                            <td>{{ Str::limit($post->content, 50, '...') }}</td>
                                            <td>
                                                @if($post->image)
                                                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="avatar-md">
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $post->status ? 'Published' : 'Draft' }}</td>
                                            <td>{{ $post->created_at->format('d-m-Y H:i') }}</td>
                                            <td>{{ $post->updated_at->format('d-m-Y H:i') }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('post_detail', $post->id) }}" class="btn btn-light btn-sm">
                                                        <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <a href="{{ route('post_edit', $post->id) }}" class="btn btn-soft-primary btn-sm">
                                                        <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <form action="{{ route('post_destroy', $post->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" type="submit" class="btn btn-soft-danger btn-sm">
                                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer border-top">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> &copy; Larkon. Crafted by <iconify-icon icon="iconamoon:heart-duotone" class="fs-18 align-middle text-danger"></iconify-icon> 
                        <a href="https://1.envato.market/techzaa" class="fw-bold footer-text" target="_blank">Techzaa</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
