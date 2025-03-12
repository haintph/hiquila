@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center gap-1">
                            <h4 class="card-title flex-grow-1">All Sliders</h4>
                            <a href="{{ route('sliders.create') }}" class="btn btn-sm btn-primary">
                                Add Slider
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
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $index => $slider)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td>
                                                <div
                                                    class="rounded bg-light avatar-lg d-flex align-items-center justify-content-center">
                                                    <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image"
                                                        class="img-fluid" style="width: 250px; height: auto;">
                                                </div>

                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('sliders.edit', $slider->id) }}"
                                                        class="btn btn-soft-primary btn-sm">
                                                        <iconify-icon icon="solar:pen-2-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <form action="{{ route('sliders.destroy', $slider->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            onclick="return confirm('Bạn có chắc muốn xóa slider này?')"
                                                            type="submit" class="btn btn-soft-danger btn-sm">
                                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                                class="align-middle fs-18"></iconify-icon>
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
                            {{-- {{ $sliders->links() }} --}}
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
                        </script> &copy; Larkon. Crafted by <iconify-icon icon="iconamoon:heart-duotone"
                            class="fs-18 align-middle text-danger"></iconify-icon> <a href="https://1.envato.market/techzaa"
                            class="fw-bold footer-text" target="_blank">Techzaa</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
