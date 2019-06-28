<?php  
 //load_data.php  
 $connect = mysqli_connect("localhost", "root", "", "congcu");  
 $output = ''; 
$brand =$_POST["brand_id"];
 $id = $_POST['idLoai'];
 if(isset($_POST["brand_id"]))  
 {  
      if($_POST["brand_id"] != '')  
      {  
           $sql = "SELECT * FROM sanpham WHERE kieu ='$brand' and idLoai = '$id'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM sanpham WHERE idLoai = '$id'";  
      }  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
		  	$output .= '<a href="index.php?p=xemchitiet&id='.$row["idSanPham"].'&idLoai='.$id.'">';
       		$output .= '<img src='.$row["url_img"].'' ;
			$output .= ' class="image" style="width:100%">';
		    $output .= '<div class="middle">';
		    $output .= '<div class="text">Xem thêm</div>';
		    $output .= '</div>';
		    $output .= '<p>'.$row['tenSanPham'].'';
		    $output .= '</p>';
		    $output .= '<p>'.$row['gia'].'';
		    $output .= '</p>';
		    $output .= '</a>';
		    $output .= '</a>';
		  
      }  
      echo $output;  
 }  
 ?>  