<?php
use yii\helpers\Html;
?>
<html>
	<body>
		<center>
		<?= Html::img('@web/img/cghmclogo1.jpg',['alt' => 'My IP','style' => 'width:9%;margin-left: 50px;margin-top: 10px;']) ?>
		<p style="font-family: Arial;font-size: 22px;margin-left: 135px;margin-top: -65px;"><strong>
		Chinese General Hospital and Medical Center
		</strong></p>

		<p style="font-family: Arial;font-size: 16px;margin-left: 130px;padding-top: -10px;">
		Technical Support Section | Online Service and Installation Report Form
		</p>
		<table style="padding-bottom: 15px;padding-top: 15px;width: 100%;">
			<tr>
				<td style="width: 120px;">
					<p style="font-family: Arial;text-align: left;">Service Number: </p>
				</td>
				<td style="border-bottom: 1px solid black; width: 200px;">
					<p style="font-family: Arial;"><?= 'TSS'.date('Y').'-'.$model->servicereportnum;  ?></p>
				</td>
				<td style="padding-left: 50px;width: 200px;">
					<p style="font-family: Arial;text-align: left;margin-left: 500px;">Date and Time Received: </p>
				</td>
				<td style="border-bottom: 1px solid black;">
					<p style="font-family: Arial;"><?= $model->datereceived.' '.$model->timereceived;  ?></p>
				</td>
			</tr>
			<tr>
				<td style="width: 100px;padding-top: 10px;">
					<p style="font-family: Arial;text-align: left;">Department: </p>
				</td>
				<td style="border-bottom: 1px solid black; width: 200px;padding-top: 10px;">
					<p style="font-family: Arial; font-size: 12px;"><?= $model->department;  ?></p>
				</td>
				<td style="padding-left: 50px;width: 230px;padding-top: 10px;">
					<p style="font-family: Arial;text-align: left;margin-left: 500px;">Date and Time Completed: </p>
				</td>
				<td style="border-bottom: 1px solid black;padding-top: 10px;width: 200px;">
					<p style="font-family: Arial;"><?= $model->datecomplete.' '.$model->timecomplete;  ?></p>
				</td>
			</tr>
			<tr>
				<td style="width: 100px;padding-top: 10px;">
					<p style="font-family: Arial;text-align:">Section: </p>
				</td>
				<td style="border-bottom: 1px solid black; width: 200px;padding-top: 10px;">
					<p style="font-family: Arial;font-size: 12px"><?= $model->section;  ?></p>
				</td>
				<td style="padding-left: 50px;width: 260px;padding-top: 10px;">
					<strong><p style="font-family: Arial;text-align:">MAJOR REPORT:  [&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]   </p></strong>
				</td>
			</tr>

			<tr>
				<td style="width: 100px;padding-top: 10px;">
					<p style="font-family: Arial;text-align:">Type of Report: </p>
				</td>
				<td style="border-bottom: 1px solid black; width: 200px;padding-top: 10px;">
					<p style="font-family: Arial;font-size: 12px"><?= $model->typeofservice.' Report';  ?></p>
				</td>
			</tr>
		</table>

		<table style="padding-bottom: 15px;padding-top: -5px;width: 100%;">
			<tr>
				<td style="width: 175px;">
					<p style="font-family: Arial;text-align: left;font-size: 15px;"><STRONG>[&nbsp;&nbsp;<?= $model->typeofservice == 'Service' ? '&#x2714;' : '' ?>&nbsp;&nbsp;] SERVICE REPORT</STRONG></p>
				</td>
			</tr>
			
		</table>

		<p style="margin-left: 5px;margin-bottom: -40px; font-family: Arial;text-align: left;position:absolute;">
		<strong>Problem Encounter:</strong></p>
		<table style="width: 50%; text-align: center">
			<tr>
				<td style="width: 100%;border: 1px solid black; height: 200px;">
					<?= $model->problem; ?>
				</td>
			</tr>
		</table>

		<p style="margin-top: -92.6px;margin-left: 359px;margin-bottom: -40px; font-family: Arial;text-align: left;">
		<strong>Remarks:</strong></p>
		<table style="width: 100%; text-align: center;margin-left: 353px;">
			<tr>
				<td style="width: 100%;border: 1px solid black; height: 100px;word-wrap: break-word;">
					<?= $model->remarks; ?>
				</td>
			</tr>
		</table>

		<p style="margin-top: -192.6px;margin-left: 359px;margin-bottom: -40px; font-family: Arial;text-align: left;">
		<strong>Action Taken:</strong></p>
		<table style="width: 100%; text-align: center;margin-left: 353px;">
			<tr>
				<td style="width: 100%;border: 1px solid black; height: 100px;word-wrap: break-word;">
					<?= $model->actiontaken; ?>
				</td>
			</tr>
		</table>
		
		<p style="font-family: Arial;text-align: left;margin-top: 100px;padding-bottom: -10px"><strong>Status of Service Report:</strong></p>
		<span style="font-family: Arial;text-align: left;">
		(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) Fixed&nbsp;&nbsp;&nbsp;
		(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) Reschedule&nbsp;&nbsp;&nbsp;
		(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) Request for Parts&nbsp;&nbsp;&nbsp;
		(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) Issued Service Unit&nbsp;&nbsp;&nbsp;
		(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) Check by Supplier&nbsp;&nbsp;&nbsp;
		(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) Others,(please specify):____________________________________________
		
		</span>
		
		<br>
		
		<span style="font-family: Arial;font-size: 15px;text-align: left;padding-top: 5px"><br><strong>
			[&nbsp;&nbsp;<?= $model->typeofservice == 'Installation' ? '&#x2714;' : '' ?>&nbsp;&nbsp;] INSTALLATION REPORT</strong></span>

		<?php if($model->typeofservice == 'Installation'){ ?>
		<table style="width: 50%; text-align: left">
			<tr>
				<td style="width: 200%; height: 40px;">
					<?= $model->installation_descrip; ?>
				</td>
			</tr>
		</table> 
		<?php } ?>
		


		<table style="width: 100%; text-align: center;margin-top: 5px;border-spacing: 0;">
			<tr>
				<td style="border: 1px solid black;width: 100px;font-size: 10px;color: white;background-color: black;"><p style="font-family: Arial;">
					Quantity
				</td>

				<td style="border: 1px solid black;width: 300px;font-size: 10px;color: white;background-color: black;">
					Description
				</td>
				<td style="border: 1px solid black;width: 100px;font-size: 10px;color: white;background-color: black;">
					Tag Number | Serial Number
				</td>
			</tr>
			<tr>
				<td style="border: 1px solid black;height: 24px;">	<?= $model->quantity;  ?>		
				</td>
				<td style="border: 1px solid black;height: 24px;">	<?= $model->description;  ?>		
				</td>
				<td style="border: 1px solid black;height: 24px;">	<?= $model->tag_number_serial_number;  ?>		
				</td>
			</tr>
			<tr>
				<td style="border: 1px solid black;height: 24px;">				
				</td>
				<td style="border: 1px solid black;height: 24px;">	
			 	</td>
				<td style="border: 1px solid black;height: 24px;">			
				</td>
			</tr>
			<tr>
				<td style="border: 1px solid black;height: 24px;">			
				</td>
				<td style="border: 1px solid black;height: 24px;">		
				</td>
				<td style="border: 1px solid black;height: 24px;">				
				</td>
			</tr>
			<tr>
				<td style="border: 1px solid black;height: 24px;">			
				</td>
				<td style="border: 1px solid black;height: 24px;">				
				</td>
				<td style="border: 1px solid black;height: 24px;">				
				</td>
			</tr>
			
			<tr>
				<td style="border: 1px solid black;width: 100px;font-size: 10px;color: white;background-color: black;">
					Status
				</td>
				<td style="border: 1px solid black;width: 300px;font-size: 10px;color: white;background-color: black;">
					Description
				</td>
				<td style="border: 1px solid black;width: 100px;font-size: 10px;color: white;background-color: black;">
					Tag Number | Serial Number
				</td>
			</tr>
			<tr>
				<td style="border: 1px solid black;height: 24px;"><?= $model->installation_report_status;  ?>				
				</td>
				<td style="border: 1px solid black;height: 24px;">			
				</td>
				<td style="border: 1px solid black;height: 24px;">				
				</td>
			</tr>
			<tr>
				<td style="border: 1px solid black;height: 24px;">				
				</td>
				<td style="border: 1px solid black;height: 24px;">				
				</td>
				<td style="border: 1px solid black;height: 24px;">				
				</td>
			</tr>
			<tr>
				<td style="border: 1px solid black;height: 24px;">			
				</td>
				<td style="border: 1px solid black;height: 24px;">				
				</td>
				<td style="border: 1px solid black;height: 24px;">				
				</td>
			</tr>
			<tr>
				<td style="border: 1px solid black;height: 24px;">				
				</td>
				<td style="border: 1px solid black;height: 24px;">				
				</td>
				<td style="border: 1px solid black;height: 24px;">				
				</td>
			</tr>
		</table>
		<p style="font-family: Arial;text-align: left;margin-top: -1px;padding-bottom: -10px"><strong>Status of Installation Report:</strong></p>

		<span style="font-family: Arial;text-align: left;">
		(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) Service Unit &nbsp;&nbsp;&nbsp;
		(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) New Item &nbsp;&nbsp;&nbsp;
		(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) Others,(please specify):____________________________________________
		<p style="font-family: Arial;text-align: left;padding-bottom: -10px;font-size: 15px;">
		
		<strong>Note: 24 hours with no follow up call is considered "Done"</strong></p>
		<br><br>
		<table width="100%" style="border-spacing: 0px">
			<tr>
				<td style="border-bottom: 1px solid black;height: 15px;width: 300px; text-align: center;">		
				<?= $model->name ?>		
				</td>
				<td style="">				
				</td>
				<td style="border-bottom: 1px solid black;height: 15px;width: 250px">				
				</td>
			</tr>
			<tr>
				<td style="text-align: center">User/Representative (Signature is required)</td><br><br>
				<td></td>
				<td style="text-align: center">Technical Support Representative</td>
			</tr>
			<tr>
				<td style="text-align: left;font-size: 10px">TSS - SD / FO - 02</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td style="text-align: left;font-size: 10px">REV.4 JUNE 22, 2018</td>
				<td></td>
				<td></td>
			</tr>
		</table>
		</center>
	</body>
</html>