<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>

	<style type="text/css">
		#header{
			font-size: 22px;
			font-weight: bolder;
			padding: 0px 60px 0px 60px;
			text-align: center;
		}
		#content{
			margin-top: 30px;
			padding: 0px 60px 0px 60px;

		}
		table, th, td{
			border: 1px solid black;
		}
		table{
			border-collapse: collapse;
		}
		tr:nth-child(even) {
			background-color:  	#DCDCDC;
		}
		tr:first-child{
			width: 40px;
		}
		th{
		    background: #A9A9A9;
		    color: black;
			/*min-width: 100px;*/
		}
		td{
			padding: 2px;
			padding-left: 10px;
		} 
		.line1{border-top: 1px solid #A9A9A9; margin-bottom: 5px;}
		.line2{border-top: 3px solid #A9A9A9;}
	</style>
</head>
<body>	
	<div id="header">
		<div style="padding: 20px;">Laporan Detail Perhitungan</div>
		<div class="line1"></div>
		<div class="line2"></div>
	</div>

	<div id="content">
		<table style="margin: 0 auto; width: 100%;">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Lab</th>
					<th>Nama Tanaman</th>
					<th>Tahun Tanaman</th>
					<th>Hasil</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1;foreach ($hasil as $row): ?>
                    <tr>
                    	<td><?= $i ?></td>
                        <td><?= $row['kode_lab'] ?></td>
                        <!-- <td><?= $row['kode_sampel'] ?></td> -->
                        <td><?= $row['nama_tanaman'] ?></td>
                        <td><?= $row['tahun_tanaman'] ?></td>
                        <td><?= $row['hasil'] ?></td>
                    </tr>
                <?php endforeach; ?>
			</tbody>
		</table>		
	</div>

</body>
</html>