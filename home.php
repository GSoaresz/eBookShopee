<?php 
  require_once('front/header.php');
  session_start(); 
?>
<?php if ($_SESSION['category'] == 'System Admin'){
    header("Location: admin.php");
}?>
<title>Main page- eBookShopee</title>

<form method="post" action="insert_request.php">
    <button type="submit" class="btn btn-light btn-xs" data-toggle="modal" data-target="#delete-modal">
        <svg class="bi bi-file-earmark-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M9 1H4a2 2 0 00-2 2v10a2 2 0 002 2h5v-1H4a1 1 0 01-1-1V3a1 1 0 011-1h5v2.5A1.5 1.5 0 0010.5 6H13v2h1V6L9 1z" />
            <path fill-rule="evenodd"
                d="M13.5 10a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13v-1.5a.5.5 0 01.5-.5z"
                clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M13 12.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z"
                clip-rule="evenodd" />
        </svg>
        Add Book
    </button>
</form>
<?php
      $conexao = mysqli_connect("localhost","root","","eBookShopee") or print (mysqli_error());
      // test if admin or normal customer to redirect a suitable page.
      if (!empty($_POST["dataForRemoving"])){
          $removingRow = $_POST["dataForRemoving"];
          $query_for_removing = "DELETE FROM books WHERE id=$removingRow";
          mysqli_query($conexao,$query_for_removing);
        }

      $id = $_SESSION['id'];
      $query = "SELECT id, author, title, publisher, price, user_id FROM books WHERE user_id=$id";
      $resultado = mysqli_query($conexao,$query);
    ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Author</th>
            <th scope="col">Title</th>
            <th scope="col">Publisher</th>
            <th scope="col">Total price</th>
            <th scope="col">
            <th>
            <th scope="col">
            <th>
        </tr>
    </thead>
    <tbody>
        <?php
          while($linha = mysqli_fetch_array($resultado)){
        ?>
        <tr>
            <?php
            echo "<td>".$linha['id']."</td>
            <td>".$linha['author']."</td>
            <td>".$linha['title']."</td>
            <td>".$linha['publisher']."</td>
            <td>U$ ".$linha['price']."</td>";
          ?>
            <td>
                <form method="post" action="update_request.php">
                    <input type="hidden" id="inputHidden" name="dataForUpdating" value=<?php echo $linha['id']; ?>>
                    <button type="submit" class="btn btn-info btn-xs">Edit</button>
                </form>
            </td>
            <td>
                <form method="post" action="home.php">
                    <input type="hidden" id="inputHidden" name="dataForRemoving" value=<?php echo $linha['id']; ?>>
                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                </form>
            </td>
        </tr>
        <?php
          }
        ?>
    </tbody>
</table>

<?php
      mysqli_close($conexao);
    ?>

<?php include_once("front/footer.php");?>