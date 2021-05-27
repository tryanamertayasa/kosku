<table
                class="table table-borderless table-cart"
                aria-describedby="Cart"
              >
                <thead>
                  <tr>
                    <th scope="col">ID Pemilik</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Menu</th>
                  </tr>
                </thead>
                <tbody method="post">
                  <?php $i = 1; ?>
                  <?php foreach ($pemiliklist as $row) : ?>
                  <tr>
                  <td style="width: 15%;">
                      <div class="product-title"><?php echo $row['id_pemilik_kos'];?></div>
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title"><?php echo $row['name'];?></div>
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title"><?php echo $row['email'];?></div>
                    </td>
                    <td style="width: 25%;">
                      <a href="delete-pemiliklist.php?id_pemilik_kos=<?= $row["id_pemilik_kos"]; ?>" class="btn btn-remove-cart">
                        Remove
                      </a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>