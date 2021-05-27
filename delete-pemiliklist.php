<?php 

require 'functions.php';

$id = $_GET["id_pemilik_kos"];

if(deletePemiliklist($id) > 0 ){
	echo "<script>
		alert('Data Pemilik Berhasil Dihapus');
		document.location.href = 'admin-pemiliklist.php';
  	</script>";
} 
else {
	echo "Data Pemilik Gagal Dihapus";
}

?>