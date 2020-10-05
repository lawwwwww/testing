<?php
	session_start();
?>
<?php
	include_once 'connection.php';
	$output=' ';
	
	if(isset($_POST['export'])){
		$sql ="SELECT * FROM tripdonetable ORDER BY tripID DESC";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0){
			$output ='
			<table class="table" bordered="1">
			<tr>
				<th>tripID</th>
				<th>invoiceID</th>
				<th>invoice_date</th>
				<th>driverID</th>
				<th>custName</th>
				<th>container retrieve</th>
				<th>container placed</th>
				<th>collection time</th>
				<th>collection type</th>
				<th>ship date</th>
				<th>return date</th>
				<th>truckID</th>
				<th>salesOrderNo</th>
				<th>address</th>
				<th>receiver</th>
				
			</tr>
			';
			
			while($row= mysqli_fetch_array($result)){
				$output .= '
					<tr>
						<td>'.$row['tripID'].'</td>
						';
						if(is_null($row['invoiceID'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['invoiceID'].'</td>';
						}
						if(is_null($row['invoice_date'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['invoice_date'].'</td>';
						}
						
						if(is_null($row['driverID'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['driverID'].'</td>';
						}if(is_null($row['cust_name'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['cust_name'].'</td>';
						}if(is_null($row['container_retrieve'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['container_retrieve'].'</td>';
						}if(is_null($row['container_placed'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['container_placed'].'</td>';
						}if(is_null($row['collection_time'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['collection_time'].'</td>';
						}if(is_null($row['collection_type'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['collection_type'].'</td>';
						}if(is_null($row['ship_date'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['ship_date'].'</td>';
						}if(is_null($row['return_date'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['return_date'].'</td>';
						}if(is_null($row['truckID'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['truckID'].'</td>';
						}if(is_null($row['salesOrderNo'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['salesOrderNo'].'</td>';
						}if(is_null($row['address'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['address'].'</td>';
						}if(is_null($row['p_receive'])){
							$output .='<td></td>';
						}else{
							$output.='<td>'.$row['p_receive'].'</td>';
						}
						
						
						
						$output .= '
					</tr>
				';
			}
			$output .= '</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=tripdone.xls");
			echo $output;
			
		}
	}
	
?>