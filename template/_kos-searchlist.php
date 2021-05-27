<section class="store-new-products">
        <div class="container">
        <form class="form-inline my-2 my-lg-0" method="post">
            <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
          </form>
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
                      background-image: url('images/kos/<?php echo $rowkos['picture'];?>');
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