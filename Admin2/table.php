<style>
	table {border.collapse: collapse; width: 500px: 120px; }
	tr, td {border: 1px solid ;}
</style>

<table>
<input type="text" width="700" size="70">
	<?php
		for($baris=1; $baris<=5; $baris++)
		{
			for($kolom=1; $kolom<=6; $kolom++)
			{
				echo "<td> kolom ke $kolom</td>";
			}
			echo "<tr> baris ke $baris </tr>";
		}
	?>
</table>