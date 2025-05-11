<!DOCTYPE html>
<html>

<head>
<title>Warranty form - OG Tech</title>
<?php include "header.php";?>

<style>
	.text {
		font-size:18px;
		color:white;
	}
	
	.textbox {
		margin-left:200px;
		margin-right:200px;
	}
	
	textarea {
		resize:none;
		outline:none;
		background-color:transparent;
		width:100%;
		height:120px;
		overflow:auto;
	}
	
	textarea:focus {
		outline:solid #44a69b;
	}
	
	.button {
		font-size:18px;
		border:3px solid white;
		cursor:pointer;
		width:140px;
		height:40px;
		background-color:transparent;
		color:white;
		box-shadow:5px 5px 3px 0px;
	}
	
	.button:hover {
		box-shadow:5px 5px 3px 0px green;
	}
	
</style>
</head>

<body>

<div class="page-title background-overlay" style="text-align:center;padding-top: 140px;padding-bottom: 140px">
<h1 style="font-weight:bold">Đơn Bảo Hành</h1>
<p class="text">OG Tech / Warranty Form</p>
</div>

<div class="textbox">
	<h3 style="color: white; display:flex; justify-content: center; align-items:center;">Vui lòng điền thông tin của bạn</h3>
	<form method="post">
	<table class="text">
		<tr>
			<td>Email:</td>
		</tr>
		<tr>
			<td><input class="text" type="email" name="email" required="required" placeholder="user@gmail.com"></input></td>
		</tr>
		<tr>
			<td>Họ tên:</td>
		</tr>
		<tr>
			<td><input class="text" name="name" required="required" placeholder="Nguyen Van A"></input></td>
		</tr>
		<tr>
			<td>Địa chỉ:</td>
		</tr>
		<tr>
			<td><textarea class="text" name="address" required="required" placeholder="123 Truong Dinh, Phuong 3, Quan 1, HCM city"></textarea></td>
		</tr>
		<tr>
			<td>Số điện thoại</td>
		</tr>
		<tr>
			<td><input class="text" type="tel" name="contact" required="required" placeholder="0123456789"></input></td>
		</tr>
		<tr>
			<td>Thông tin sản phẩm:</td>
		</tr>
		<tr>
			<td><input class="text" type="text" name="product_name" required="required" placeholder="Asus B85M-G"></input></td>
		</tr>
		<tr>
			<td>Các vấn đề sản phẩm gặp phải(mô tả chi tiết):</td>
		</tr>
		<tr>
			<td><textarea class="text" name="problem_statement" required="required" placeholder="Monitor display is frame drop / not working"></textarea></td>
		</tr>
		<tr>
			<td><input class="button" type="submit" name="submit" value="Submit form"></input></td>
		</tr>
	</table>
	</form>
</div>

<?php include "footer.php";?>
</body>

</html>