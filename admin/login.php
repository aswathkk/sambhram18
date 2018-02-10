<?php
  session_start();

  if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin')
      header('location:index.php');
      
  if(isset($_POST['username']) && isset($_POST['password'])) {
    if(md5($_POST['username']) == '21232f297a57a5a743894a0e4a801fc3' && md5($_POST['password']) == '2dc51505123d60badc03231348911b4e') {
      $_SESSION['username'] = 'admin';
      header('location:index.php');
    } else {
      header('location:login.php?error');
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#02b3e4">

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!--<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Ruslan+Display" rel="stylesheet">-->
    
    <link rel="stylesheet" href="../css/style.css">
    <style>
      h2 {
        text-align: center;
      }
      .sambhram {
        font-family: Amarillo;
        position: relative;
        left: 1.5em;
      }
      .tag {
        font-size: 0.5em;
        position: relative;
        top: 1em;
        left: 0;
      }
    </style>
    <title>Sambhram Admin Panel</title>
  </head>
  <body>
    <div class="container full-height">
      <div class="row align-items-center justify-content-center full-height">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title my-4">
                <span class="sambhram">Sambhram</span>
                <span class="tag">Admin Panel</span>
              </h2>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="text-center px-4 pt-5 pb-2">
                <div class="form-group">
                  <input type="text" name="username" class="form-control" placeholder="username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="password">
                </div>
                <div id="error" class="alert alert-danger" style="display: none;" role="alert">
                  Username or password error !!
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script>
      <?php
        if(isset($_GET['error'])) {
      ?>
        $('#error').fadeIn(400).delay(3000).fadeOut(1000);
      <?php
        }
      ?>
    </script>
  </body>
</html>