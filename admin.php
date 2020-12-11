<?php require_once('front/header.php'); ?>
<title>[Admin] - eBookShopee</title>
<?php
      $conexao = mysqli_connect("localhost","root","","eBookShopee") or print (mysqli_error());
      $id = $_SESSION['id'];
      $query = "SELECT *  FROM users ORDER BY name";
      $resultado = mysqli_query($conexao,$query);
    ?>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
        </tr>
    </thead>
    <tbody>
        <?php
          while($linha = mysqli_fetch_array($resultado)) {
            if ($linha['category'] == 'System Admin') continue;

            $user_id=$linha['id'];
            $query="SELECT * FROM books WHERE user_id = $user_id";
            $resultRequest = mysqli_query($conexao,$query);

            echo "<tr class=\"table-primary\">
                    <td>".$linha['id']."</td>
                    <td>".$linha['name']."</td>
                    <td>".$linha['email']."</td>
                  </tr>";
            if ($resultRequest->num_rows>0){
        ?>
        <tr>
            <td>
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">Total price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
              while($requestLine = mysqli_fetch_array($resultRequest)){
                echo "<tr>
                        <td>".$requestLine['id']."</td>
                        <td>".$requestLine['title']."</td>
                        <td>".$requestLine['author']."</td>
                        <td>".$requestLine['publisher']."</td>
                        <td>".$requestLine['price']."</td>
                      </tr>";
              }
            ?>
            </td>
        </tr>
    </tbody>
</table>
<?php
            }
          }
        ?>
</tbody>
</table>

<?php
    mysqli_close($conexao);
    ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
</body>

</html>