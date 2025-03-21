<script src="/admin/assets/js/config.js"></script>
<script src="/admin/assets/js/vendor.js"></script>

<!-- App Javascript (Require in all Page) -->
<script src="/admin/assets/js/app.js"></script>

<!-- Vector Map Js -->
<script src="/admin/assets/vendor/jsvectormap/js/jsvectormap.min.js"></script>
<script src="/admin/assets/vendor/jsvectormap/maps/world-merc.js"></script>
<script src="/admin/assets/vendor/jsvectormap/maps/world.js"></script>

<!-- Dashboard Js -->
<script src="/admin/assets/js/pages/dashboard.js"></script>

<!-- Thêm vào <head> hoặc trước </body> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function toggleVariants(dishId) {
        let row = document.getElementById('variants-' + dishId);
        if (row.style.display === "none") {
            row.style.display = "table-row";
        } else {
            row.style.display = "none";
        }
    }
</script>
<script>
    // Ẩn/Hiện danh sách biến thể khi bấm vào ô chứa biến thể
    function toggleVariants(dishId) {
        let row = document.getElementById("variants-" + dishId);
        row.style.display = (row.style.display === "none") ? "table-row" : "none";
    }

    // Xóa biến thể bằng AJAX
    function deleteVariant(event, variantId) {
        event.preventDefault();

        Swal.fire({
            title: "Bạn có chắc chắn muốn xóa?",
            text: "Dữ liệu sẽ không thể khôi phục!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Xóa",
            cancelButtonText: "Hủy"
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("{{ url('/variants/destroy') }}/" + variantId, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            _method: "DELETE"
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            let row = document.getElementById("variant-row-" + variantId);
                            let dishId = row.closest("tr").previousElementSibling.querySelector(
                                "td[onclick]").getAttribute("onclick").match(/\d+/)[0];

                            if (row) {
                                row.style.transition = "opacity 0.5s";
                                row.style.opacity = "0";
                                setTimeout(() => {
                                    row.remove();
                                    updateDishVariants(dishId);
                                }, 500);
                            }

                            Swal.fire({
                                title: "Đã xóa!",
                                text: "Biến thể đã được xóa thành công.",
                                icon: "success",
                                timer: 2000,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                title: "Lỗi!",
                                text: "Xóa thất bại, vui lòng thử lại!",
                                icon: "error",
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Lỗi:", error);
                        Swal.fire({
                            title: "Lỗi!",
                            text: "Không thể kết nối đến server.",
                            icon: "error",
                            timer: 2000,
                            showConfirmButton: false
                        });
                    });
            }
        });
    }

    function updateDishVariants(dishId) {
        let parentDishCell = document.querySelector(`td[onclick="toggleVariants(${dishId})"]`);
        let remainingVariants = document.querySelectorAll(`#variants-${dishId} .list-group-item`);

        if (parentDishCell) {
            if (remainingVariants.length > 0) {
                let variantNames = Array.from(remainingVariants).map(item => item.querySelector('span').textContent);
                parentDishCell.textContent = variantNames.join(', ');
            } else {
                parentDishCell.innerHTML = '<span class="text-muted">Chưa có loại</span>';
            }
        }
    }
</script>
