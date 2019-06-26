<?php
require("../conn.php");
$del = "DELETE from sanpham where idSanPham=".$_GET['del_id']."";
$query = mysqli_query($con, $del);
header ("Location:index.php?p=top&idLoai=1&title=Top");
?>