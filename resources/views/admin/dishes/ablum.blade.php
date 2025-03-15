<div class="col-lg-12">
    <label class="form-label">Album ảnh</label>
    <ul class="list-group" id="image-list">
        @foreach ($albumImages as $image)
            <li class="list-group-item d-flex justify-content-between align-items-center image-item"
                id="image-{{ $image->id }}">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('storage/' . $image->image_path) }}" class="rounded me-3 preview-img"
                        id="preview-{{ $image->id }}" style="width: 80px; height: 80px; object-fit: cover;">
                    <span>Ảnh {{ $loop->iteration }}</span>
                </div>

                <button class="btn btn-sm btn-danger delete-image" data-id="{{ $image->id }}">Xóa</button>
            </li>
        @endforeach
        <li id="upload-container">
            <div class="col-lg-6">
                <label class="form-label">Thêm ảnh vào album (Tối đa 3 ảnh)</label>
                <input type="file" id="albumImagesInput" name="images[]" class="form-control" multiple
                    accept="image/*" onchange="previewImages(event)">

                <small id="imageLimitWarning" class="text-danger d-none">Bạn chỉ có thể thêm tối đa 3 ảnh.</small>
            </div>

            <!-- Khung hiển thị ảnh mới chọn -->
            <div class="row mt-3" id="imagePreviewContainer"></div>
        </li>
    </ul>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".delete-image").forEach(button => {
            button.addEventListener("click", function(event) {
                event.preventDefault();
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
                                checkImageLimit();
                            } else {
                                alert("Lỗi khi xóa ảnh!");
                            }
                        })
                        .catch(error => console.error("Error:", error));
                }
            });
        });
    });

    let selectedFiles = []; // Mảng chứa danh sách file ảnh đã chọn

    function previewImages(event) {
        let files = Array.from(event.target.files); // Lấy danh sách file mới chọn
        let imageList = document.getElementById("image-list");
        let uploadContainer = document.getElementById("upload-container");
        let imageWarning = document.getElementById("imageLimitWarning");

        let currentImages = document.querySelectorAll(".image-item").length; // Số ảnh hiện tại trong album
        let newImagesCount = currentImages + files.length;

        if (newImagesCount > 3) {
            imageWarning.classList.remove("d-none");
            return;
        } else {
            imageWarning.classList.add("d-none");
        }

        files.forEach(file => {
            if (currentImages >= 3) return;

            let reader = new FileReader();
            let imageWrapper = document.createElement("li");
            imageWrapper.classList.add("list-group-item", "d-flex", "justify-content-between",
                "align-items-center", "image-item");

            let imgElement = document.createElement("img");
            imgElement.style.width = "80px";
            imgElement.style.height = "80px";
            imgElement.style.objectFit = "cover";
            imgElement.classList.add("rounded", "me-3", "preview-img");

            let deleteBtn = document.createElement("button");
            deleteBtn.classList.add("btn", "btn-sm", "btn-danger");
            deleteBtn.innerText = "Xóa";
            deleteBtn.onclick = function() {
                let indexToRemove = selectedFiles.indexOf(file);
                if (indexToRemove > -1) {
                    selectedFiles.splice(indexToRemove, 1);
                }
                imageWrapper.remove();
                updateInputFile(); // Cập nhật lại input file
                checkImageLimit();
            };

            reader.onload = function(e) {
                imgElement.src = e.target.result;
            };

            reader.readAsDataURL(file);

            let textSpan = document.createElement("span");
            textSpan.innerText = `Ảnh ${currentImages + 1}`;

            let divContainer = document.createElement("div");
            divContainer.classList.add("d-flex", "align-items-center");
            divContainer.appendChild(imgElement);
            divContainer.appendChild(textSpan);

            imageWrapper.appendChild(divContainer);
            imageWrapper.appendChild(deleteBtn);

            imageList.insertBefore(imageWrapper, uploadContainer);
            selectedFiles.push(file); // Thêm ảnh vào danh sách lưu trữ
            currentImages++;
        });

        updateInputFile();
        checkImageLimit();
    }

    // ✅ Cập nhật lại input file với tất cả ảnh đã chọn
    function updateInputFile() {
        let dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        document.getElementById("albumImagesInput").files = dataTransfer.files;
    }

    // ✅ Kiểm tra số lượng ảnh và ẩn/hiện input upload
    function checkImageLimit() {
        let imageWarning = document.getElementById("imageLimitWarning");
        let currentImages = document.querySelectorAll(".image-item").length;
        let uploadContainer = document.getElementById("upload-container");

        if (currentImages >= 3) {
            imageWarning.classList.remove("d-none");
            uploadContainer.style.display = "none";
        } else {
            imageWarning.classList.add("d-none");
            uploadContainer.style.display = "block";
        }
    }
</script>
