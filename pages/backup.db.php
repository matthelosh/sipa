<?php
$file = $db.'_'.date("DdMY").'_'.time().'.sql';
?>
<section class="content-header">
  <h1>
    Dashboard
    <small id="pgHeader">Backup DB</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?p=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Backup Database</li>
  </ol>
</section>

<div class="row" style="margin-top: 20px">
  <div class="col-sm-8">
    <div class="box box-success">
      <div class="box-header with-border">
        <h1 class="box-title">Mencadangkan Database</h1>
      </div>
      <div class="box-body ">
        <form action="index.php?p=backup-db" method="post" class="form" name="frm-backup" enctype="multipart/form-data">
          <div class="form-group">
            <label for="backup">Backup Database</label>
            <input class="btn btn-flat bg-aqua " type="submit" name="backup" value="Proses" onclick="return pastikan('Backup Database?')">
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<div class="row" >
  <div class="col-sm-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h1 class="box-title">Mengembalikan Database</h1>
      </div>
      <div class="box-body ">
        <form action="index.php?p=backup-db" method="post" class="form" name="frm-restore" enctype="multipart/form-data">
          <div class="form-group">
            <label for="restore">Restore Database</label>
            <input class="form-control bg-teal" type="file" name="restore">

          </div>
          <div class="form-group">
            <input class="btn btn-flat btn-success " type="submit" name="restore" value="Proses" onclick="return pastikan('Restore Database?')">
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<?php
// Download SQL file
  if(isset$_GET['nama_file']) {
    $file = $back_dir.$_GET['nama_file'];

    if(file_exists($file)) {
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename='.basename($file));
      header('Expires: 0');
      header('Cache-Control: private');
      header('Pragma: private');
      header('Content-Length:'.filesize($file));
      ob_clean()
      flush()
      readfile($file);
      exit;
    } else {
      echo "File {$_GET['nama_file']} sudah tidak ada";
    }
  }

  if(isset($_POST['backup'])) {
    backup($file);
    echo 'Backup database selesai <a style="cursor:pointer" href="?nama_file='.$file.'" title="Download"> Download Hasil Backup</a>';
    echo "<pre>";
    print_r($return);
    echo "</pre">;
  } else {
    unset($_POST['backup']);
  }



  function backup($nama_file,$tables = '')
{
	global $return, $tables, $back_dir, $database ;

	if($tables == '')
	{
		$tables = array();
		$result = @mysql_list_tables($database);
		while($row = @mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}else{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}

	$return	= '';

	foreach($tables as $table)
	{
		$result	 = @mysql_query('SELECT * FROM '.$table);
		$num_fields = @mysql_num_fields($result);

		//menyisipkan query drop table untuk nanti hapus table yang lama
		$return	.= "DROP TABLE IF EXISTS ".$table.";";
		$row2	 = @mysql_fetch_row(mysql_query('SHOW CREATE TABLE  '.$table));
		$return	.= "\n\n".$row2[1].";\n\n";

		for ($i = 0; $i < $num_fields; $i++)
		{
			while($row = @mysql_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';

				for($j=0; $j<$num_fields; $j++)
				{
					$row[$j] = @addslashes($row[$j]);
					$row[$j] = @ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}

	$nama_file;

	$handle = fopen($back_dir.$nama_file,'w+');
	fwrite($handle, $return);
	fclose($handle);
}
?>


<script type="text/javascript">
  function pastikan(text){
    confirm('Apakah Anda yakin akan '+text);
    // return false;
  }
</script>
