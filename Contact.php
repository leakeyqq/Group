<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet"  integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home.css">
</head>
<body class="p-3 mb-2 bg-dark-subtle text-emphasis-dark" >
<nav class="navbar navbar-expand-lg" style="background-color: #1ecbe1;
    overflow: hidden;">
   <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="navbar-nav" style="overflow: hidden; width: 700px; margin: auto;">
          <a class="nav-link" href="home.php">Home</a>
          <a class="nav-link" href="#">About</a>
          <a class="nav-link" href="#">Transactions</a>
          <a class="nav-link" href="#">Loans</a>
          <a class="nav-link" href="Contact.php">Contacts</a>
          <a class="nav-link" href="#">FAQ</a>

        </div>
      </div>
    </div>
  </nav><br />
  <div class="form-area">
    <div class="container">
      <div class="row single-form g-0">
        <div class="col-sm-12 col-lg-6">
          <div class="left">
            <h2><span>Contact Us For</span> <br>Business Enquiries</h2>
          </div>
        </div>
        <div class="col-sm-12 col-lg-6">
          <div class="right">
            <i class="fa fa-caret-left"></i>
            <form method="post" action="send-email.php" class="animate-form">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputPassword1" required="">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label class="form-label" for="exampleInputPassword1">Message</label>
    <textarea name="message" class="form-control" id="exampleInputPassword1" required=""></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>           
          </div>
        </div>
      </div>
    </div>
  </div><br>

    <?php
  include("footer.php")
  ?>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
     crossorigin="anonymous"></script>
</body>
</html>