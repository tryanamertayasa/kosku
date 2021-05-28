<div class="dashboard-content">
                <div class="tab-content" id="myTabContent">
                <?php $i = 1; ?>
                    <?php foreach ($kosdata as $row) : ?>
                    <div class="row mt-3">
                      <div class="col-12 mt-2">
                        <a
                          class="card card-list d-block"
                          href="pemilik-iklan-details.php?id_kos=<?= $row["id_kos"]; ?>"
                        >
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-1">
                                <img
                                  src=""
                                  alt=""
                                />
                              </div>
                              <div class="col-md-4">
                                <?php echo $row['title'];?>
                              </div>
                              <div class="col-md-3">
                              <?php echo $row['price'];?>
                              </div>
                              <div class="col-md-3">
                              <?php echo $row['id_location'];?>
                              </div>
                              <div class="col-md-1 d-none d-md-block">
                                <img
                                  src="images/dashboard-arrow-right.svg"
                                  alt=""
                                />
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </div>