<?php 
  if (empty($_GET)){
    $koslocation = query("SELECT * FROM `location`");
    
  }
  else{
    $id_location = $_GET["id_location"];
    $koslocation = query("SELECT * FROM `location` WHERE `id_location`IN($id_location)");
  } 
?>
<section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Lokasi</h5>
            </div>
          </div>
          <div class="row">
          <?php $i = 1; ?>
          <?php foreach ($koslocation as $row) : ?>
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a class="component-categories d-block" href="location.php?id_location=<?= $row["id_location"]; ?>">
                <div class="categories-image">
                  <img
                    src="images/location.svg"
                    alt="Kos Location"
                    class="w-100"
                  />
                </div>
                <p class="categories-text">
                  <?php echo $row['location'];?>
                </p>
              </a>
            </div>
            <?php $i++; ?>
          <?php endforeach; ?>
          </div>
        </div>
      </section>