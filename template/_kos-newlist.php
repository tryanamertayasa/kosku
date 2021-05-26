<section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Listing Kos</h5>
            </div>
          </div>
          <div class="row">
          <?php $i = 1; ?>
          <?php foreach ($kosdata as $rowkos) : ?>
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a class="component-products d-block" href="details.php?id_kos=<?= $rowkos["id_kos"]; ?>">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      background-image: url('images/kos1.jpeg');
                    "
                  ></div>
                </div>
                <div class="products-text">
                  <?php echo $rowkos['title'];?>
                </div>
                <div class="products-price">
                  <?php echo $rowkos['price'];?>
                </div>
              </a>
            </div>
            <?php $i++; ?>
          <?php endforeach; ?>
          </div>
        </div>
      </section>