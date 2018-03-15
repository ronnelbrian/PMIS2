<!DOCTYPE html>
<html>
<head>
	<title>Stock Ledger Report</title>
	<style type="text/css">
		body{
			
			font-size: 12px;
			font-style: normal;
			font-weight: 500;
			line-height: 13.2px;
		}

		.pb {
			page-break-before: always;
		}
	</style>
</head>
<body style="font-family: 'Source Sans Pro','Segoe UI','Droid Sans',Tahoma,Arial,sans-serif;">
	<table width="100%">
	<tr>
		<td>
			<b>Stock Ledger Report</b>
		</td>
		<td style="text-align:right">
			<b><i>Page 1</i></b>
		</td>
	</tr>
	</table>
	<table width="100%">
	<tr>
		<td style="width:125px">
			<b>Status:</b>
		</td>
		<td style="">
			<?php echo strtoupper($status);?>
		</td>
	</tr>
	<tr>
		<td style="width:125px">
			<b>Transaction Dates:</b>
		</td>
		<td style="">
			<?php echo 'From '.strtoupper($dates[0]).' To '.strtoupper($dates[1]);?>
		</td>
	</tr>
	<tr>
		<td style="width:125px">
			<b>Previous Balance:</b>
		</td>
		<td style="">
			<?php echo $bal;?>
		</td>
	</tr>
	<tr>
		<td style="width:125px">
			<b>Item:</b>
		</td>
		<td style="">
			<?php echo $item;?>
		</td>
	</tr>
	</table>
	<table width="100%" style="margin-top:5px;border-top: 1px solid;border-bottom: 1px solid; padding:0px; line-height:15px">
		<tr style="border-bottom:1px solid">
		<?php if(in_array('item_no', $columns)){?>
			<td width="2%" style="text-align:center; border-bottom:1px solid">
				<b>#</b>
			</td>
		<?php }?>
		<?php if(in_array('id', $columns)){?>
			<td width="8%" style="text-align:center; border-bottom:1px solid">
				<b>ID</b>
			</td>
		<?php }?>
		<?php if(in_array('product', $columns)){?>
			<td width="10%" style="text-align:center; border-bottom:1px solid">
				<b>Item</b>
			</td>
		<?php }?>
		<?php if(in_array('qty', $columns)){?>
			<td width="5%" style="text-align:center; border-bottom:1px solid">
				<b>Qty</b>
			</td>
		<?php }?>
		
		<?php if(in_array('delivered', $columns)){?>
			<td width="10%" style="text-align:center; border-bottom:1px solid">
				<b>Delivered</b>
			</td>
		<?php }?>
		<?php if(in_array('released', $columns)){?>
			<td width="10%" style="text-align:center; border-bottom:1px solid">
				<b>Released</b>
			</td>
		<?php }?>
			<td width="10%" style="text-align:center; border-bottom:1px solid">
				<b>Balance</b>
			</td>
		</tr>
		<?php
			$ctr = 0; 
			$no = 1;
			$page = 2;
			foreach($ledger as $r)
			{
				$ctr++;
				echo '<tr>';
				if(in_array('item_no', $columns))
					echo '<td style="text-align:center">'.$no.'</td>';
				if(in_array('id', $columns))
					echo '<td style="text-align:center">'.$r['id'].'</td>';
				if(in_array('product', $columns))
					echo '<td>'.$r['description'].'</td>';
				if(in_array('qty', $columns))
					echo '<td style="text-align:center">'.$r['qty'].'</td>';
				if(in_array('delivered', $columns))
					echo '<td style="text-align:center">'.$r['delivered'].'</td>';
				if(in_array('released', $columns))
					echo '<td style="text-align:center">'.$r['released'].'</td>';

					echo '<td style="text-align:center">'.$r['balance'].'</td>';
				echo '</tr>';

				if($ctr == 35)
				{
					 echo '</table>
					 	<table width="100%" class="pb">
						<tr>
							<td>
								<b>Stock Ledger Report</b>
							</td>
							<td style="text-align:right">
								<b><i>Page '.$page.'</i></b>
							</td>
						</tr>
						<tr>
							<td>
								<b>Status:</b>
							</td>
							<td>
								'.$status.'
							</td>
						</tr>
						</table>
						<table width="100%" style="margin-top:5px;border-top: 1px solid;border-bottom: 1px solid; padding:0px; line-height:15px">
						<tr style="border-bottom:1px solid">';
						$page++;
					 if(in_array('item_no', $columns)){
						echo '<td width="2%" style="text-align:center; border-bottom:1px solid">
							<b>#</b>
						</td>';
					 }
					 if(in_array('id', $columns)){
						echo '<td width="8%" style="text-align:center; border-bottom:1px solid">
							<b>ID</b>
						</td>';
					 }
					 if(in_array('product', $columns)){
						echo '<td width="10%" style="text-align:center; border-bottom:1px solid">
							<b>Item</b>
						</td>';
					 }
					 if(in_array('qty', $columns)){
						echo '<td width="10%" style="text-align:center; border-bottom:1px solid">
							<b>Qty</b>
						</td>';
					 }
					 if(in_array('delivered', $columns)){
						echo '<td width="5%" style="text-align:center; border-bottom:1px solid">
							<b>Delivered/Added</b>
						</td>';
					 }
					
					 if(in_array('released', $columns)){
						echo '<td width="10%" style="text-align:center; border-bottom:1px solid">
							<b>Released</b>
						</td>';
					 }
					echo '</tr>';
					$ctr = 0;
				}
				$no++;
			}

			// echo '<tr style="border-top:0.5px solid">
			// 		<td colspan="4" style="text-align:right;"> </td>
			// 		<td style="text-align:center;">'.$bal.'</td>
			// 	</tr>';
		?>
	</table>

	
	<div>
		<table style="border-top:0.5px solid" width="100%">
			<tr>
				<td>
					Printed on: <?php date_default_timezone_set('Asia/Manila'); echo date("F j, Y g:i a")."<br>/".$this->session->userdata('USERNAME')?>
				</td>
			</tr>
		</table>
			
	</div>
</body>
</html>