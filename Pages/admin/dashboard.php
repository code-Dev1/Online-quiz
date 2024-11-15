<h3 class="font-monospace mt-3">Dashboard->admin</h3>
<?php
session_start(); // شروع سشن

// چک کردن اینکه آیا کاربر وارد شده است
if (!isset($_SESSION['uId']) || $_SESSION['uId'] !== true) {
    // اگر کاربر وارد نشده باشد، به صفحه ورود هدایت می‌شود
    header("Location: login.php");
    exit();
}

// اگر وارد شده باشد، می‌توانیم اطلاعات داشبورد را نمایش دهیم
echo "خوش آمدید " . $_SESSION['uId'];
?>
