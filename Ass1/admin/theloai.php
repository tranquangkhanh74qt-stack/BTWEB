<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danh sách Thể Loại</title>
</head>
<body>
<?php include_once('../connect.php'); ?>
<table align="center" border="1" width="600" cellpadding="8" cellspacing="0">
    <tr align="center">
        <td><strong>Ten The Loai</strong></td>
        <td><strong>Thu Tu</strong></td>
        <td><strong>An Hien</strong></td>
        <td><strong>Bieu tuong</strong></td>
        <td colspan="2"><a href="theloai_them.php">Them</a></td>
    </tr>
<?php 
    $sql = "SELECT * FROM theloai";
    $results = mysqli_query($connect, $sql);
    if ($results && mysqli_num_rows($results) > 0) {
        while (($rows = mysqli_fetch_assoc($results)) != NULL) {
?>
    <tr align="center">
        <td><?php echo $rows['TenTL']; ?></td>
        <td><?php echo $rows['ThuTu']; ?></td>
        <td><?php echo ($rows['AnHien'] == 1) ? "Hien" : "An"; ?></td>
        <td><img src="image/<?php echo $rows['icon']; ?>" width="40" height="40" alt="<?php echo $rows['TenTL']; ?>" /></td>
        <td><a href="theloai_sua.php?idTL=<?php echo $rows['idTL'];?>">Sua</a></td>
        <td>
            <a href="theloai_xoa.php?idTL=<?php echo $rows['idTL'];?>" onclick="return confirm('Ban co chac chan khong?');">Xoa</a>
        </td>
    </tr>
<?php 
        } 
    } else {
        echo "<tr><td colspan='6' align='center'>Chua co du lieu!</td></tr>";
    }
    mysqli_close($connect);
?>
</table>
</body>
</html>