<?php include "admin_header.php" ?>

        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'ForumX') or die(mysqli_error($mysqli));

        $result = $mysqli->query("SELECT COUNT(*) FROM xUsers") or die($mysqli->error);


        $row = mysqli_fetch_row($result);

        $num_rows = $row[0];

        $set_per_page = 10;
        $total = ceil($num_rows / $set_per_page);


        if (isset($_GET['page']) && is_numeric($_GET['page'])) {

          $current_page = (int) $_GET['page'];
        } else {

          $current_page = 1;
        }

        if ($current_page > $total) {

          $current_page = $total;
        }

        if ($current_page < 1) {
          $current_page = 1;
        }


        $offset = ($current_page - 1) * $set_per_page;
        // $sql = "SELECT id FROM user LIMIT $offset, $set_per_page";
        // $result_row = $mysqli->query($sql) or die($mysqli->error);

        // $sql = "SELECT * FROM user LIMIT";
        // $sql .= "LIMIT $set_per_page";
        // $sql .= "OFFSET $$offset";
        $sql = "SELECT * FROM xUsers LIMIT $offset, $set_per_page";
        $result_row = $mysqli->query($sql) or die($mysqli->error);

        ?>


        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'ForumX') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM xUsers") or die($mysqli->error);
        ?>













  <section id="search" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ml-auto">
        <?php
              if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

                  <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
          <div class="input-group">
         
            <div>
            


                </div>

              <?php endif; ?>
</div>
            <div class="input-group-append">

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- USERS -->
  <section id="users">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>Latest Users</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-dark">
                <tr>

                  <th>User Id</th>
                  <th>Image</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th></th>

                </tr>
              </thead>
              <?php

              while ($row = $result_row->fetch_assoc()) :

                ?>
                <tbody>
                  <tr>
                    <td><?php echo $row['x_id']; ?></td>
                    <td><img src=<?php echo 'img/'.$row['x_userimage']; ?> height="100" width="150"></td>
                    <td><?php echo $row['x_username']; ?></td>
                    <td><?php echo $row['x_email']; ?></td>
                    <td> <a href="user_process.php?delete=<?php echo $row['x_id']; ?>" class="btn btn-danger mt-4" style="float:right;">Delete</a></td>

                  <tr>

                  <?php endwhile; ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">

          <ul class="pagination">
            <?php

            echo "<ul class='pagination'>";
            echo "<li class='page-item'><a class='page-link' href='admin_users.php?page=" . ($current_page - 1) . "' class='button'>Previous</a></li>";

            ?>

            <?php
            for ($i = 1; $i <= $total; $i++) {
              //active link
              if ($i == $current_page) {
                echo "<li class='page-item'><a class='page-link' href='admin_users.php?page={$i}'>{$i}</a></li>";
              } else {
                //not active

                echo "<li class='page-item'><a class='page-link' href='admin_users.php?page={$i}'>{$i}</a></li>";
              }
            }

            ?>
            <?php

            echo "<ul class='pagination'>";
            echo "<li class='page-item'><a class='page-link' href='admin_users.php?page=" . ($current_page - 1) . "' class='button'>Next</a></li>";



            ?>
          </ul>
        </div>
      </div>
    </div>
  </section>


  <!-- FOOTER -->
  <footer id="main-footer" class="bg-dark text-white mt-5 p-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <p class="lead text-center">
            Copyright &copy;
            <span id="year"></span>
            ForumX
          </p>
        </div>
      </div>
    </div>
  </footer>




  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());
  </script>
</body>

</html>