<nav class="navbar navbar-expand-lg" style="background-color: #1ecbe1;
    overflow: hidden;">
   <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav" style="overflow: hidden; width: 700px; margin: auto;">
        <a class="nav-link"  href="home.php"><b>Homepage</b></a>
          <a class="nav-link"  href="savings.php">Add Savings</a>
          <a class="nav-link"href="withdraw_savings.php">Withdraw</a >
          <p style="color: rgb(26, 19, 2);font-size: 25px;" class="nav-link"href="#"><b>Balance Kshs <span><?php echo number_format( $account_balance, 0 )?></span></b></p>
          
        </div>
      </div>
    </div>
  </nav>