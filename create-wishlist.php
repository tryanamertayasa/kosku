<?php 

require 'functions.php';

$id = $_GET["id_kos"];

if(createWishlist($id) > 0 ){
	echo "<script>
		alert('Data Wishlist Berhasil Ditambahkan');
		document.location.href = 'wishlist.php';
  	</script>";
} 
else {
	echo "Data Wishlist Berhasil Dihapus";
}

?>