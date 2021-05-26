<?php 

require 'functions.php';

$id = $_GET["id_wishlist"];

if(deleteWishlist($id) > 0 ){
	echo "<script>
		alert('Data Wishlist Berhasil Dihapus');
		document.location.href = 'wishlist.php';
  	</script>";
} 
else {
	echo "Data Wishlist Gagal Dihapus";
}

?>