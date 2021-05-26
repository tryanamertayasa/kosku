<section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Listing Kos</h5>
            </div>
          </div>
          <div class="row">
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="100"
            >
            <?php $i = 1; ?>
            <?php foreach ($kosdata as $row) : ?>
              <a class="component-products d-block" href="/details.html">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      background-image: url('images/kos1.jpeg');
                    "
                  ></div>
                </div>
                <div class="products-text">
                  Kos Pasha
                </div>
                <div class="products-price">
                  Rp 800.000
                </div>
              </a>
            </div>
          </div>
        </div>
      </section>