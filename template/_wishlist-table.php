<table
                class="table table-borderless table-cart"
                aria-describedby="Cart"
              >
                <thead>
                  <tr>
                    <th scope="col">Pemilik</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Menu</th>
                  </tr>
                </thead>
                <tbody method="post">
                  <?php $i = 1; ?>
                  <?php foreach ($koswishlist as $row) : ?>
                  <tr>
                  <td style="width: 35%;">
                      <div class="product-title"><?php echo $row['name'];?></div>
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title"><?php echo $row['title'];?></div>
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title"><?php echo $row['price'];?></div>
                      <div class="product-subtitle">Rupiah</div>
                    </td>
                    <td style="width: 20%;">
                      <a href="delete-wishlist.php?id_wishlist=<?= $row["id_wishlist"]; ?>" class="btn btn-remove-cart">
                        Remove
                      </a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>