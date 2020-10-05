<?php
	session_start();
?>
<?php
	include_once 'connection.php';
	$output=' ';
	
	if(isset($_POST['export'])){
		$sql ="SELECT * FROM triptable WHERE trip_status!='Done' ORDER BY tripID DESC";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0){
			$output ='
			<table class="table" bordered="1">
			<tr>
				<th>tripID</th>
				<th>cust_name</th>
				<th>areaID</th>
				<th>container_retrieve</th>
				<th>container_placed</th>
				<th>collection_time</th>
				<th>collection_type</th>
				<th>waste_type</th>
				<th>ship_date</th>
				<th>return_date</th>
				<th>driverID</th>
				<th>adminID</th>
				<th>assign_status</th>
				<th>trip_status</th>
				<th>truckID</th>
				<th>salesOrderNo</th>
				<th>address</th>
				<th>container_size</th>
			</tr>
			';
			
			while($row= mysqli_fetch_array($result)){
				$output .= '
					<tr>
						<td>'.$row['tripID'].'</td>
						';
						if(is_null($row['cust_name'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['cust_name'].'</td>';
						}
						if(is_null($row['areaID'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['areaID'].'</td>';
						}
						if(is_null($row['container_retrieve'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['container_retrieve'].'</td>';
						}
						if(is_null($row['container_placed'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['container_placed'].'</td>';
						}
						if(is_null($row['collection_time'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['collection_time'].'</td>';
						}
						if(is_null($row['collection_type'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['collection_type'].'</td>';
						}
						if(is_null($row['waste_type'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['waste_type'].'</td>';
						}
						if(is_null($row['ship_date'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['ship_date'].'</td>';
						}
						if(is_null($row['return_date'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['return_date'].'</td>';
						}
						if(is_null($row['driverID'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['driverID'].'</td>';
						}
						if(is_null($row['adminID'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['adminID'].'</td>';
						}
						if(is_null($row['assign_status'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['assign_status'].'</td>';
						}
						if(is_null($row['trip_status'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['trip_status'].'</td>';
						}
						if(is_null($row['truckID'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['truckID'].'</td>';
						}
						if(is_null($row['salesOrderNo'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['salesOrderNo'].'</td>';
						}
						if(is_null($row['address'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['address'].'</td>';
						}
						if(is_null($row['container_size'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['container_size'].'</td>';
						}
						
						$output .= '
					</tr>
				';
			}
			$output .= '</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=download.xls");
			echo $output;
			
		}
	}
	
?>