<html>
<head>
	<title>Checker Board</title>
	<style type="text/css">
		td {
			height: 30px;
			width: 30px;

		}

		.color1 {
			background-color: black;
		}

		.color2 {
			background-color: red;
		}
	</style>
</head>
<body>
	<h1>Checker Board</h1>
	<table>
<?php
	for($i = 0; $i < 8; $i++)
	{ 	?>
		<tr>
<?php 
			for ($j = 0; $j < 8; $j++)
			{	
				if (($j+$i )% 2 == 0) 
				{	?>
					<td class=color1></td>
<?php 			}
				else 
				{ 	?>
					<td class=color2></td>
<?php			}
			} 		?>
			
		</tr>
<?php	
	} 	?>

		

	</table>
</body>
</html>