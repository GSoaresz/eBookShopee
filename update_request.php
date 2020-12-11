<?php require_once('front/header.php');?>
<title>Edit request - eBookShopee</title>
<?php
    if(!empty($_POST["codeUpdating"])){
      $author = $_POST['author'];
      $title = $_POST['title'];
      $publisher = $_POST['publisher'];
      $price = $_POST['price'];
      $book_id = $_POST['codeUpdating'];

      $conexao = mysqli_connect("localhost","root","","eBookShopee") or print (mysqli_error());
      
      $query = "UPDATE books SET author='$author',title='$title', publisher='$publisher', price='$price' WHERE id=$book_id";
      
      if (mysqli_query($conexao, $query)) {
      ?>
<div class="alert alert-info" role="alert">
    <?php echo "<strong>Order has been updated.</strong>"; ?>
</div>
<?php
        } else {
      ?>
<div class="alert alert-danger" role="alert">
    <?php echo "<strong> Erro: <strong>" . $query . "<br>" . mysqli_error($conexao);?>
</div>
<?php
        }
    }
    if (!empty($_POST["dataForUpdating"])){
      $book_id = $_POST['dataForUpdating'];
      $conexao = mysqli_connect("localhost","root","","eBookShopee") or print (mysqli_error());

      $query = "SELECT id,author,title,publisher,price FROM books WHERE id=$book_id";
      $resultado = mysqli_query($conexao,$query);  

      $linha = mysqli_fetch_array($resultado);
      ?>

<form action="update_request.php" method="post">
    <div class="form-group">
        <div class="col-md-4 mb-3">
            <label for="authorInputLabel">Author:</label>
            <input type="text" class="form-control" required id="authorInputLabel" name="author"
                value="<?php echo $linha['author'];?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 mb-3">
            <label for="titleInputLabel">Title:</label>
            <input type="text" class="form-control" required id="titleInputLabel" name="title"
                value="<?php echo $linha['title'];?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 mb-3">
            <label for="publisherInputLabel">Publisher:</label>
            <input type="text" class="form-control" required id="publisherInputLabel" name="publisher"
                value="<?php echo $linha['publisher'];?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 mb-3">
            <label for="priceInputLabel">Total price (U$):</label>
            <input type="text" class="form-control" required id="priceInputLabel" name="price"
                value="<?php echo $linha['price'];?>">
        </div>
    </div>
    <input type="hidden" id="inputHidden" name="codeUpdating" value="<?php echo $linha['id']; ?> ">
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
<?php
        }
      ?>

<?php include_once("front/footer.php"); ?>