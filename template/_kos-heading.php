<section class="store-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <h1><?php echo $kosdetails['title'];?></h1>
                <div class="owner">Pemilik <?php echo $kosdetails['name'];?></div>
                <div class="price"><?php echo $kosdetails['price'];?></div>
              </div>
              <div class="col-lg-2" data-aos="zoom-in">
                <a
                  class="btn btn-success nav-link px-4 text-white btn-block mb-3"
                  href="create-wishlist.php?id_kos=<?= $kosdetails["id_kos"]; ?>" 
                  >Tambah ke Wishlist</a
                >
                <a
                  class="btn btn-success nav-link px-4 text-white btn-block mb-3"
                  href="https://api.whatsapp.com/send?phone=<?php echo $kosdetails['no_hp'];?>&text=Halo%20saya%20tertarik%20dengan%20kos%20<?php echo $kosdetails['price'];?>!"
                  > Hubungi Pemilik </a
                >
              </div>
            </div>
          </div>
        </section>