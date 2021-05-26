<section class="store-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <h1>Kos Pasha</h1>
                <div class="owner">Pemilik Pasha enaisan</div>
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
                  href="/cart.html"
                  >Hubungi Pemilik</a
                >
              </div>
            </div>
          </div>
        </section>