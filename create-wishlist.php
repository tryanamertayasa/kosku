<?php 

require 'functions.php';

$id = $_GET["id_kos"];

if(createWishlist($id) > 0 ){
	echo "<script>
		alert('Data Wishlist Berhasil Ditambahkan');
		document.location.href = 'index.php';
  	</script>";
} 
else {
	echo "Data Wishlist Berhasil Dihapus";
}

?>