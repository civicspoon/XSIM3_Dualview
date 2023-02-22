<div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
	<div class="col-2"><button class="btn btn-lg btn-info" onclick="history.back()"> <i class="fa fa-backward" aria-hidden="true"></i>  Go Back</button></div>
</div>

<?php
$conn= mysqli_connect("localhost","root","aot#avsec","xsim2") 
or die("Error: " . mysqli_error($conn));
mysqli_query($conn, "SET NAMES 'utf8' ");
//query
$query=mysqli_query($conn,"SELECT COUNT(id) FROM `type` WHERE category ='".$_GET['category']."'");
	$row = mysqli_fetch_row($query);

	$rows = $row[0];

	$page_rows = 5;  

	$last = ceil($rows/$page_rows);

	if($last < 1){
		$last = 1;
	}

	$pagenum = 1;

	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}

	if ($pagenum < 1) {
		$pagenum = 1;
	}
	else if ($pagenum > $last) {
		$pagenum = $last;
	}
	
	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

	$nquery=mysqli_query($conn,"SELECT * from  type WHERE category = '".$_GET['category']."' $limit");

	$paginationCtrls = '';

	if($last != 1){

	if ($pagenum > 1) {
$previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-info">Previous</a> &nbsp; &nbsp; ';

		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
			}
	}
}

	$paginationCtrls .= ''.$pagenum.' &nbsp; ';

	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-primary">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}

if ($pagenum != $last) {
$next = $pagenum + 1;
$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-info">Next</a> ';
}
	}
?>

	
		<div" rel="nofollow">
			<div style="height: 20px;"></div>
			<div class="row">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-12 card shadow">
					<h4>Item List</h4>
					<table width="80%" class="table table-striped table-bordered table-hover ">
						
						<thead>
							<tr class="info text-center">
							<!-- <th>ID</th> -->
							<th>ITEM</th>
							<th>IMG</th>
							
							</tr>
						</thead>
					
						<tbody>
							<?php
								while($crow = mysqli_fetch_array($nquery)){
							?>
							<tr class="text-center">
								<!-- <td><a href="#"><?php echo $crow['id']; ?></a></td> -->
								<td style="width:700px"><?php echo $crow['type']; ?></td>
								<td><?php echo $crow['img']; ?></td>
							
							</tr>
							<?php
									}
							?>
						</tbody>
					</table>
					<div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
				</div>
				<div class="col-lg-2">
				</div>
			</div>
		</div>
