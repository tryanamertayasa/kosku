<table
                class="table table-borderless table-cart"
                aria-describedby="Cart"
              >
                <thead>
                  <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody method="post">
                  <?php $i = 1; ?>
                  <?php foreach ($userlist as $row) : ?>
                  <tr>
                  <td style="width: 15%;">
                      <div class="product-title"><?php echo $i;?></div>
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title"><?php echo $row['nama'];?></div>
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title"><?php echo $row['email'];?></div>
                    </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>