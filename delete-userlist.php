<?php 

require 'functions.php';

$id = $_GET["id_user"];

if(deleteUserlist($id) > 0 ){
	echo "<script>
		alert('Data User Berhasil Dihapus');
		document.location.href = 'admin-userlist.php';
  	</script>";
} 
else {
	echo "Data User Gagal Dihapus";
}

?>