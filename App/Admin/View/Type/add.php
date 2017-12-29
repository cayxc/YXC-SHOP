<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="./Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link href="./Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
	    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
	    
	</head>
	<body>
		<form action="" method="post">	
			<div class="alert alert-success">添加商品类型</div>
			<div class="form-group">
				<label for="exampleInputEmail1">请在输入框中填写要添加的商品类型名称，然后点击添加按钮</label>
				<textarea name="tname" rows="5" cols=""  class="form-control" placeholder="一次可添加一个或多个类型，添加多个类型时请用 | 分开"></textarea>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">类型排序</label>
				<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入类型排序"  name="tsort" value="100">
			</div>
			
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
