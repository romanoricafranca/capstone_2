    
<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>
<?php require_once "../controllers/connect.php"; ?>



    <div class="container">
              <div class="row">
                <div class="col-lg-6 offset-lg-3">
                  <form action="../controllers/action.php" method="POST">
                  

                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" name="email" id="emailadd" class="form-control">
                    <p id="result" class="lead mt-2"></p>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                  </div>

                
                       <input type="submit" class="btn btn-outline-dark" value="Log-in">

                </form>

                </div>

              </div>

            </div>