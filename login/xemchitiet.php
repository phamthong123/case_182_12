<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
	require("../conn.php");
	@$id = $_GET['id'];
	$select = "SELECT * FROM sanpham WHERE idSanPham='$id'";
	$result = mysqli_query($con,$select);
	$row = mysqli_fetch_array($result);
?>
<style type="text/css">
#container{
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

#container:hover .image {
  opacity: 0.3;
}

#container:hover .middle {
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
<link href="chitiet.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="chitiet.js"></script>
        <div class="container">
        	<div class="row">
               <div class="col-xs-4 item-photo">
                    <img style="max-width:100%;float: left; height: 400px;width: 600px" src="<?php echo $row['url_img'] ?>" />
                </div>
                <div class="col-xs-5" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3><?php echo $row['tenSanPham'] ?></h3>
					<?php 
						$sl = "SELECT * FROM kieu WHERE idKieu=".$row['kieu'];
						 $r = mysqli_query($con,$sl);
						 $kq = mysqli_fetch_array($r);
					?>
					<h5>Kiểu:<?php echo $kq['tenKieu']; ?></h5>
                    <h5 style="color:red; margin-right: 20px"><?php echo $row['trangthai'] ?><small style="color:#337ab7">(5054 view)</small></h5>
        
                    <!-- Precios -->
                    <h6 class="title-price"><small>Giá</small></h6>
                    <h3 style="margin-top:0px;color: red">đ <?php echo $row['gia']; ?></h3>
        
                    <!-- Detalles especificos del producto -->
                    <div class="section">
                        <h6 class="title-attr" style="margin-top:15px;" ><small>Màu sắc</small></h6>                    
                        <div>
                            <div class="attr" style="width:25px;background:#5a5a5a;"></div>
                            <div class="attr" style="width:25px;background:white;"></div>
                        </div>
                    </div>   
                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>Số lượng hàng:<?php echo $row['soLuong']; ?></small></h6>                    
                    </div>
					<h5>Giảm giá:<?php echo $row['giamgia'] ?>%</h5>
					<h5>Mã giảm giá:<?php echo $row['maGiamgia'] ?></h5>
					<button id="myBtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
   							 Sửa
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
  	    <input value="<?php echo $row['tenSanPham']; ?>" type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
  	  </div>
		 <div class="form-group">
    	  <label for="name">Kiểu áo</label>
    	  <select name="kieu">
			  <?php 
		  		$idLoai = $_GET['idLoai'];
		  		$sql = "SELECT * FROM kieu WHERE idLoai='$idLoai'";
		  		$kq = mysqli_query($con,$sql);
				while($row1 = mysqli_fetch_array($kq)){ ?>
						<option <?php if($row1['idKieu']==$row['kieu']) {?> selected="<?php echo $row1['idKieu']; ?>" <?php } ?> value="<?php echo $row1['idKieu'] ?>"><?php echo $row1['tenKieu']; ?></option>
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
    	  <input value="<?php echo $row['gia']; ?>" onKeyPress="return isNumberKey(event)" type="text" class="form-control" name="price" placeholder="Chỉ được nhập số">
    </div>
	<div class="form-group">
      <label>Giảm giá(theo %):</label>
      <input value="<?php echo $row['giamgia']; ?>"  onKeyPress="return isNumberKey(event)" type="text" class="form-control" id="giamgia" name="giamgia" placeholder="Chỉ được nhập số" >
    </div>
	<div class="form-group">
      <label>Mã giảm giá:</label>
      <input value="<?php echo $row['maGiamgia']; ?>" id="inputtext" type="text" class="form-control" name="ma" placeholder="Nhập chuỗi tối đa 9 ký tự" title="Nhập chuỗi tối đa 8 ký tự" oninput='text_count_changed("inputtext","inputtext_counter",inputtext_approving_chars_count);'>
    </div>
	 <div class="form-group">
      <label>Số lượng hiện có:</label>
      <input value="<?php echo $row['soLuong']; ?>" onKeyPress="return isNumberKey(event)" type="text" class="form-control" name="solouong" placeholder="Chỉ được nhập số">
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
			<?php echo $row['chiTiet'] ?>
		</textarea> 
		<script>
			 CKEDITOR.replace( 'tomtat');
		</script>
    </div>
	  <input class="btn btn-primary" type="submit" name="submit" value="submit">
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
			if(empty($_FILES['url'])){
				$url = $row['url_img'];
			}else{
				$url = 'image/'.$_FILES['url']['name'];
			}
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
			$in = "UPDATE sanpham SET 
			tenSanPham='$name',tenSP_kd='$name_kd',kieu='$kieu',url_img='$url',gia='$price',chiTiet='$detail',giamgia='$discount',maGiamgia='$code',trangthai='$status',idLoai='$id',soLuong='$soluong' WHERE idSanPham='$id'";
			$them = mysqli_query($con,$in); ?>
			<script type="text/javascript">
	  				alert("<?php echo $row['url_img'] ?>");
					window.location.reload;
	  		</script>
	<?php	}  
	?>
</div>
  </div>

					</div>
					<button type="button" onClick="deleteme(<?php echo $id; ?>)" class="btn btn-danger">Xoá</button>
                </div>                              
        		<script language="javascript">
					function deleteme( delid ) {
						if ( confirm( "Bạn chắc chắn muốn xoá!" ) ) {
							window.location.href='delete_product.php?del_id='+delid+'';
							alert("Xoá thành công!");
							return true;
						} else
							return false;
					}
				</script>
                <div class="col-xs-9">
                    <ul class="menu-items">
                        <li class="active">Chi tiết sản phẩm</li>
                    </ul>
                    <div style="width:100%;border-top:1px solid silver">
						<?php echo $row['chiTiet']; ?>
                    </div>
                </div>		
            </div>
        </div> 
		<script type="text/javascript">
			  $(document).ready(function(){
            //-- Click on detail
            $("ul.menu-items > li").on("click",function(){
                $("ul.menu-items > li").removeClass("active");
                $(this).addClass("active");
            })

            $(".attr,.attr2").on("click",function(){
                var clase = $(this).attr("class");

                $("." + clase).removeClass("active");
                $(this).addClass("active");
            })

            //-- Click on QUANTITY
            $(".btn-minus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ now--;}
                    $(".section > div > input").val(now);
                }else{
                    $(".section > div > input").val("1");
                }
            })            
            $(".btn-plus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    $(".section > div > input").val(parseInt(now)+1);
                }else{
                    $(".section > div > input").val("1");
                }
            })                        
        }) 
		</script>
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
