<?php 
require("../conn.php");
$idLoai = $_GET['idLoai'];
 function fill_brand($con)  
 {  
	 $idLoai = $_GET['idLoai'];
      $output = '';  
      $sql = "SELECT * FROM kieu where idLoai='$idLoai'";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["idKieu"].'">'.$row["tenKieu"].'</option>';  
      }  
      return $output;  
 } 
?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<style type="text/css">
#ajax {
  position: relative;
  width: 50%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

#ajax:hover .image {
  opacity: 0.3;
}

#ajax:hover .middle {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;

}
p{
	text-align: center;
}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
	width: 50px;
	margin-left: 1150px;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<body>
	<input id="idLoai" type="hidden" value="<?php echo $idLoai; ?>">
	<div class="container" style="z-index: 9;position: relative">

  <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0"><?php echo @$_GET['title']; ?></h1>
	 <select name="brand" id="brand">  
      	     <option value="">Show All Product</option>  
      	     <?php echo fill_brand($con); ?>  
      </select> 
	<button id="myBtn" style="margin-left: 1000px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
   			 Thêm
  	</button>
	<div id="myModal" class="modal" >

  <!-- Modal content -->
  <div class="modal-content" style="z-index: 20; position: relative">
    <span class="close">&times;</span>
    <div class="container">
  <h2>Thêm sản phẩm</h2>
  <form onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">Tên sản phẩm:</label>
      <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
    </div>
	 <div class="form-group">
      <label for="name">Kiểu áo</label>
      <select name="kieu">
		  <?php 
		  		$idLoai = $_GET['idLoai'];
		  		$sql = "SELECT * FROM kieu WHERE idLoai='$idLoai'";
		  		$kq = mysqli_query($con,$sql);
				while($row = mysqli_fetch_array($kq)){ ?>
					<option value="<?php echo $row['idKieu'] ?>"><?php echo $row['tenKieu']; ?></option>
		<?php	}
		  ?>
	  </select>
    </div>
	<div class="form-group">
      <label>URL_Hình</label>
      <input type="file" class="form-control" id="file" name="url" onchange="return fileValidation()">
	  <div id="imagePreview"></div>
    </div>
    <div class="form-group">
      <label>Giá:</label>
      <input onKeyPress="return isNumberKey(event)" type="text" class="form-control" name="price" placeholder="Chỉ được nhập số">
    </div>
	<div class="form-group">
      <label>Giảm giá(theo %):</label>
      <input onKeyPress="return isNumberKey(event)" type="text" class="form-control" id="giamgia" name="giamgia" placeholder="Chỉ được nhập số" >
    </div>
	<div class="form-group">
      <label>Mã giảm giá:</label>
      <input id="inputtext" type="text" class="form-control" name="ma" placeholder="Nhập chuỗi tối đa 9 ký tự" title="Nhập chuỗi tối đa 8 ký tự" oninput='text_count_changed("inputtext","inputtext_counter",inputtext_approving_chars_count);'>
    </div>
	 <div class="form-group">
      <label>Số lượng hiện có:</label>
      <input onKeyPress="return isNumberKey(event)" type="text" class="form-control" name="solouong" placeholder="Chỉ được nhập số">
    </div>
	 <div class="form-group">
	  <label>Tình trạng</label></br>
		<select name="tinhtrang">
	  		<option value="1">Đang bán</option>
	  		<option value="2">Chưa bán</option>
	  	</select>
    </div>
	 <div class="form-group">
      <label>Thông tin sản phẩm:</label>
		<textarea id="tomtat" style="width: 500px; height: 300px" name="tomtat">
		</textarea> 
		<script>
			 CKEDITOR.replace( 'tomtat');
		</script>
    </div>
	  <input type="submit" name="submit" value="submit">
	  <script type="text/javascript">
		  inputtext_approving_chars_count = 10;
		  function text_count_changed(textfield_id,counter_id,count){
			  if(count-parseInt(document.getElementById(textfield_id).value.length)<0){
				  document.getElementById(textfield_id).value = document.getElementById(textfield_id).value.substr(0,count);
			  }
			  
			  document.getElementById(counter_id).innerHTML = count-parseInt(document.getElementById(textfield_id).value.length);
		  }
		  function validateForm()
            {
				var name = document.getElementById('name').value;
				var url = document.getElementById('url').value;
				var price = document.getElementById('price').value;
				if(name == ''){
					alert("Không được bỏ trống tên sản phẩm");
					return false;
				}
				if(url == ''){
					alert("Không được bỏ trống hình sản phẩm");
					return false;
				}
				if(price == ''){
					alert("Không được bỏ trống giá sản phẩm");
					return false;
				}
                return true;
            }
			function fileValidation(){
			var fileInput = document.getElementById('file');
			var filePath = fileInput.value;//lấy giá trị input theo id
			var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
			//Kiểm tra định dạng
			if(!allowedExtensions.exec(filePath)){
				alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif only.');
				fileInput.value = '';
				return false;
			}else{
				//Image preview
				if (fileInput.files && fileInput.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						document.getElementById('imagePreview').innerHTML = '<img style="width:300px;height:400px;" src="'+e.target.result+'"/>';
					};
					reader.readAsDataURL(fileInput.files[0]);
				}
			}
		}
		  function isNumberKey(evt)
		  {
			  var charCode = (evt.which) ? evt.which : event.keyCode
			  if (charCode > 31 && (charCode < 48 || charCode > 57))
				  return false;
			  return true;
 		}
	  </script>	
  </form>
	<?php 
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			function stripUnicode($str){
				if(!$str) return false;
				$unicode = array(
					'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
					'd'=>'đ',
					'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
					'i'=>'í|ì|ỉ|ĩ|ị',
					'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
					'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
					'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
				);
				foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
				return $str;
			}
			$name_kd = stripUnicode($name);
			$url = 'image/'.$_FILES['url']['name'];
			$price = $_POST['price'];
			$soluong = $_POST['soluong'];	
			$detail = $_POST['tomtat'];
			$discount = $_POST['giamgia'];
			$code = $_GET['ma'];
			$id = $_GET['idLoai'];
			$kieu = $_POST['kieu'];
			if(isset($_POST['giamgia']) || isset($_POST['ma'])){
				$status = 'Đang giảm giá';
			}else{
				$status = $_POST['tinhtrang'];
			}
			$in = "INSERT into sanpham(tenSanPham,tenSP_kd,kieu,url_img,gia,chiTiet,giamgia,maGiamgia,trangthai,idLoai,soLuong) VALUES('$name','$name_kd','$kieu','$url','$price','$detail','$discount','$code','$status','$id','$soluong')";
			$them = mysqli_query($con,$in); ?>
			<script type="text/javascript">
	  				alert("Thêm thành công");
	  		</script>
	<?php	}  
	?>
</div>
  </div>

	</div>
  <hr class="mt-2 mb-5">
  <div class="row text-center text-lg-left" style="position: relative; z-index: -1"> 
	<?php 
		$product_id = '';
	   @$id = $_GET['idLoai'];
		$sl = "SELECT * FROM sanpham WHERE idLoai='$id'";
		$result = mysqli_query($con,$sl);
		$dem = mysqli_num_rows($result);
		while($num = mysqli_fetch_array($result)){ ?>
      <div class="col-lg-3 col-md-4 col-6" id="ajax">
				<a href="index.php?p=xemchitiet&id=<?php echo $num['idSanPham'] ?>&idLoai=<?php echo $idLoai; ?>" class="d-block mb-4 h-100">
				  <img src="<?php echo $num['url_img'] ?>" class="image" style="width:100%">
				  	<div class="middle">
    				<div class="text">Xem thêm</div>
  					</div>
				  	<p><?php echo $num['tenSanPham']; ?></p>
				  	<p><?php echo $num['gia']; ?></p>
    		  </a>
     </div>
	  	<?php $product_id = $num['idSanPham']; }
		 ?>
  </div>
</div>
	<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script>  
 $(document).ready(function(){  
      $('#brand').change(function(){  
          var brand_id = $(this).val(); 
		  var idLoai = $("#idLoai").val();
           $.ajax({  
                url:"test1.php",  
                method:"POST",  
                data:{brand_id:brand_id,idLoai:idLoai},  
                success:function(data){  
                     $('#ajax').html(data);  
                }  
           });  
      });  
 });  
 </script>
<script>  
 $(document).ready(function(){  
      $(document).on('click', '#btn_more', function(){  
           var last_product_id = $(this).data("vid");
		   var idLoai = <?php echo $idLoai; ?>;
           $('#btn_more').html("Đang tải...");  
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{last_product_id:last_product_id,idLoai:idLoai},  
                dataType:"text",  
                success:function(data)  
                {  
                     if(data != '')  
                     {  
                          $('#remove_row2').remove();  
                          $('#ajax').append(data);  
                     }  
                     else  
                     {  
                          $('#btn_more').html("Không còn sản phẩm nào");  
                     }  
                }  
           });  
      });  
 });  
 </script>
</body>
</html>
