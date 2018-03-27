<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
ini_set('display_errors', 1);
$host='localhost';
$db='test';
$user='root';
$password='';
$market='SWAZI';//SWAZI OR CAME
$con=mysqli_connect("$host","$user","$password","$db");
$results=mysqli_query($con,"SELECT id,name,value FROM `$market.vals` order by id asc");
?>
<dir class="row">
	<dir class="span4">
	
</dir>

<dir class="span4">
	<form method="post" action="#">
		<input type="file" name="fileimporter" >
<button class="btn btn-warning"><i class="icon-file"></i> <strong>Upload Xml</strong></button>
	</form>
<a href="executexml.php" class="btn btn-success"><i class="icon-pencil"></i> <strong>Post Xml</strong></a>
<a href="postgres.php" class="btn btn-primary"><i class="icon-edit"></i> <strong>Post To Postgres</strong></a>
<a href="reset.php" class="btn btn-danger"><i class="icon-trash"></i> <strong>Reset</strong></a>
	
</dir>
<div class="span4">
	
</div>
</dir>
<dir class="row">
	<dir class="span3">
		
	</dir>
	<dir class="span3">
		
<table class="table table-bordered table-stripped">
	<thead>
		<th>ID</th>
		<th>name</th>
		<th>value</th>
	</thead>
	<tbody>
		<?php while($row=mysqli_fetch_array($results,MYSQLI_NUM)){?>
		<tr>
			<td><?php echo $row[0];?></td>
			<td><?php echo $row[1];?></td>
			<td><?php echo $row[2];?></td>
		</tr>
		<?php }?>
	</tbody>
</table>
	</dir>
</dir>