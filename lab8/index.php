<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>DEMO GỬI EMAIL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>
<body>
<div class="container mt-4" style="max-width: 600px;">
    <h2>Email tới bạn</h2>
    <form action="mail.php" enctype="multipart/form-data" method="POST">
        <div class="form-group">
            <label>Email người nhận:</label>
            <input type="email" class="form-control" name="email" placeholder="Nhập email người nhận" required>
        </div>
        
        <div class="form-group">
            <label>Tiêu đề (Subject):</label>
            <input type="text" class="form-control" name="tieude" placeholder="Nhập tiêu đề" required>
        </div>
        
        <div class="form-group">
            <label>Nội dung:</label>
            <textarea name="content" id="editor" class="form-control" rows="5"></textarea>
        </div>
        
        <div class="form-group">
            <label>File đính kèm:</label>
            <input type="file" class="form-control-file" name="file">
        </div>
        
        <button type="submit" class="btn btn-primary">Gửi Mail</button>
    </form>
</div>

<script>
    CKEDITOR.replace('editor');
</script>
</body>
</html>