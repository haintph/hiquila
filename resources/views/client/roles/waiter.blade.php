<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giao Diện Nhân Viên Phục Vụ</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2ecc71;
            --secondary-color: #3498db;
            --bg-color: #f4f6f7;
            --text-color: #333;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--bg-color);
            line-height: 1.6;
        }
        .dashboard {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: white;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo img {
            width: 100px;
        }
        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            color: #666;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .menu-item:hover, .menu-item.active {
            background-color: var(--primary-color);
            color: white;
        }
        .menu-item i {
            margin-right: 10px;
            font-size: 20px;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .tables-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        .table-card {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .table-card:hover {
            transform: scale(1.05);
        }
        .table-card.occupied {
            background-color: #ff6b6b;
            color: white;
        }
        .table-card.available {
            background-color: var(--primary-color);
            color: white;
        }
        .order-section {
            margin-top: 30px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .order-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .order-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        .order-item {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        .btn-secondary {
            background-color: var(--secondary-color);
            color: white;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="logo">
                <img src="https://via.placeholder.com/100" alt="Logo Nhà Hàng">
            </div>
            <nav>
                <a href="#" class="menu-item active">
                    <i class="ri-home-line"></i> Tổng Quan
                </a>
                <a href="#" class="menu-item">
                    <i class="ri-restaurant-line"></i> Quản Lý Bàn
                </a>
                <a href="#" class="menu-item">
                    <i class="ri-bill-line"></i> Đặt Đơn Hàng
                </a>
                <a href="#" class="menu-item">
                    <i class="ri-user-line"></i> Khách Hàng
                </a>
                <a href="#" class="menu-item">
                    <i class="ri-settings-3-line"></i> Cài Đặt
                </a>
            </nav>
        </div>
        <div class="main-content">
            <div class="header">
                <h1>Bảng Điều Khiển</h1>
                <div>
                    <span>Nhân Viên: Nguyễn Văn A</span>
                    <button class="btn btn-secondary">Đăng Xuất</button>
                </div>
            </div>

            <div class="tables-section">
                <h2>Trạng Thái Bàn</h2>
                <div class="tables-grid">
                    <div class="table-card available">
                        <h3>Bàn 1</h3>
                        <p>Trống</p>
                    </div>
                    <div class="table-card occupied">
                        <h3>Bàn 2</h3>
                        <p>Đã Đặt</p>
                    </div>
                    <div class="table-card available">
                        <h3>Bàn 3</h3>
                        <p>Trống</p>
                    </div>
                    <div class="table-card occupied">
                        <h3>Bàn 4</h3>
                        <p>Đã Đặt</p>
                    </div>
                    <div class="table-card available">
                        <h3>Bàn 5</h3>
                        <p>Trống</p>
                    </div>
                    <div class="table-card available">
                        <h3>Bàn 6</h3>
                        <p>Trống</p>
                    </div>
                    <div class="table-card occupied">
                        <h3>Bàn 7</h3>
                        <p>Đã Đặt</p>
                    </div>
                    <div class="table-card available">
                        <h3>Bàn 8</h3>
                        <p>Trống</p>
                    </div>
                </div>
            </div>

            <div class="order-section">
                <div class="order-header">
                    <h2>Đơn Hàng Đang Chờ</h2>
                    <button class="btn btn-primary">Thêm Đơn Hàng</button>
                </div>
                <div class="order-list">
                    <div class="order-item">
                        <div>
                            <strong>Bàn 2</strong>
                            <p>2 Phở, 1 Nước Cam</p>
                        </div>
                        <button class="btn btn-secondary">Xử Lý</button>
                    </div>
                    <div class="order-item">
                        <div>
                            <strong>Bàn 4</strong>
                            <p>1 Bún Bò, 2 Sinh Tố</p>
                        </div>
                        <button class="btn btn-secondary">Xử Lý</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>