<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>Daily Notes</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2 >Daily Notes</h2>
		<div id="form_input">
			<table>
				<?php echo form_open('daily/submit'); ?>
			<tr>
				<td> <?php echo form_label('Date : '); ?></td>
				<td> <?php echo form_input('date',date('Y-m-d'),'id="date"'); ?></td>
			</tr>
			<tr>
				<td> <?php echo form_label('Name : ');?> </td>
				<td> <?php echo form_input('name','','id="name"'); ?></td>
			</tr>
			<tr>
				<td> <?php echo form_label('Amount : ');?> </td>
				<td> <?php echo form_input('amount','','id="amount"'); ?></td>
			</tr>
			<tr>
				<td> <?php echo form_submit('submit','Submit','id="submit"'); echo form_close(); ?> </td>
			</tr>
			</table>
		</div>
	</body>
</html>
