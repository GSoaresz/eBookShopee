<?php require_once('front/header.php'); ?>
<title> Request - eBookShopee</title>
<?php
      if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['publisher']) && !empty($_POST['price'])){
        $bookAuthor = $_POST['author'];
        $bookTitle = $_POST['title'];
        $bookPublisher = $_POST['publisher'];
        $bookPrice = $_POST['price'];
        $user_id = $_SESSION['id'];
        
        $conexao = mysqli_connect("localhost","root","","eBookShopee") or print (mysqli_error());

        $query = "INSERT INTO books (author,title,publisher,price,user_id) VALUES ('$bookAuthor','$bookTitle', '$bookPublisher', '$bookPrice', '$user_id')";
        
        if (mysqli_query($conexao, $query)) {  
            header("Location: home.php?msg=OK");
        } else {
    ?>
<div class="alert alert-danger" role="alert">
    <?php echo "<strong> Could not connect to the database server. Try again. <strong><br>";?>
    <?php 
        echo $bookAuthor."<br>";
        echo $bookTitle."<br>";
        echo $bookPublisher."<br>";
        echo $bookPrice."<br>";
        echo $user_id."<br>";
         ?>
</div>
<?php
        }
      }
    ?>

<form action="insert_request.php" method="post">
    <div class="form-group">
        <div class="col-md-4 mb-3">
            <label for="authorInputLabel">Author:</label>
            <input type="text" class="form-control" required id="authorInputLabel" name="author">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 mb-3">
            <label for="titleInputLabel">Title:</label>
            <input type="text" class="form-control" required id="titleInputLabel" name="title">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 mb-3">
            <label for="publisherInputLabel">Publisher:</label>
            <input type="text" class="form-control" required id="publisherInputLabel" name="publisher">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 mb-3">
            <label for="priceInputLabel">Price:</label>
            <input type="text" class="form-control" required id="priceInputLabel" name="price">
        </div>
    </div>
    <button type="submit" class="btn btn-info" name="submit">Submit</button>
</form>

<?php include_once("front/footer.php");?>