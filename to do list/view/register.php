<?php
include "layout/header.php";

if (isset($message)) {
    echo "<p class='alert-info'>$message</p>";
}
?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Đăng ký</h1>
        </div>
        <div class="col-12">
            <form method="post">
                <div class="form-group">
                    <label>Tên đăng nhập</label>
                    <input type="text" class="form-control" name="username" placeholder="Nhập tên" required>
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="text" class="form-control" name="password" placeholder="Nhập password" required>
                </div>
                <button type="submit" class="btn btn-primary">Đăng ký</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
</div>