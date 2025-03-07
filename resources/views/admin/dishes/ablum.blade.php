<div class="col-lg-12">
    <label class="form-label">Album ảnh</label>
    <ul class="list-group" id="image-list">
        @foreach ($albumImages as $image)
            <li class="list-group-item d-flex justify-content-between align-items-center" id="image-{{ $image->id }}">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('storage/' . $image->image_path) }}" class="rounded me-3"
                        id="preview-{{ $image->id }}" style="width: 80px; height: 80px; object-fit: cover;">
                    <span>Ảnh {{ $loop->iteration }}</span>
                </div>

                <button class="btn btn-sm btn-danger delete-image" data-id="{{ $image->id }}">Xóa</button>
            </li>
        @endforeach
        <li>
            <!-- Upload hình ảnh album -->
            <div class="col-lg-6">
                <label class="form-label">Thêm ảnh vào album (Tối đa 3 ảnh)</label>
                <input type="file" id="albumImagesInput" name="images[]" class="form-control" multiple
                    accept="image/*" onchange="checkImageLimit(event)">
                <small id="imageLimitWarning" class="text-danger d-none">Bạn chỉ có thể thêm tối đa 3 ảnh.</small>
            </div>
        </li>
    </ul>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Xóa ảnh
        document.querySelectorAll(".delete-image").forEach(button => {
            button.addEventListener("click", function() {
                let imageId = this.getAttribute("data-id");
                let listItem = document.getElementById(`image-${imageId}`);

                if (confirm("Bạn có chắc muốn xóa ảnh này?")) {
                    fetch(`/dish/image/delete/${imageId}`, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json"
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                listItem.remove();
                            } else {
                                alert("Lỗi khi xóa ảnh!");
                            }
                        })
                        .catch(error => console.error("Error:", error));
                }
            });
        });
    });

    function checkImageLimit(event) {
        let imageInput = document.getElementById("albumImagesInput");
        let imageWarning = document.getElementById("imageLimitWarning");
        let currentImages = document.querySelectorAll(".list-group-item").length; // Đếm số ảnh hiện có

        if (currentImages >= 3) {
            event.preventDefault();
            imageInput.value = ""; // Xóa ảnh vừa chọn
            imageWarning.classList.remove("d-none");
        } else {
            imageWarning.classList.add("d-none");
        }
    }
</script>
