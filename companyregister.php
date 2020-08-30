<?php include('server2.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Icon -->
    <link rel="stylesheet" href="rej/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="rej/css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="rej/images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                     <form method="POST" id="signup-form" class="signup-form" action="companyregister.php">
                  <?php include('errors.php'); ?>
                        <h2 class="form-title">Create account For company setor</h2>
                        <div class="form-group">
                        <label for="validationCustom01">User Name</label>
                            <input type="text" class="form-input" name="username" id="validationCustom01"  placeholder="Your Name" required/>
                            <div class="invalid-feedback">
                            Please provide a valid zip.
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="validationCustom05">Type</label>
                        <select name="type">
                            
                              <option class="form-control"  required > TEA </option>
                              <option class="form-control"  required > RUBBER </option>
                              <option class="form-control" placeholder=""  required > CINNOMEN </option>
                              <option class="form-control"  required > Shop </option> 
                                   </select>
                            <div class="invalid-feedback">
                            Please provide a valid zip.
                             </div>
                        </div>
                        <div class="form-group">
                        <label for="validationCustom06">Adress</label>
                            <input type="text" class="form-input" name="address" id="validationCustom06" placeholder="Adress" required/>
                            <div class="invalid-feedback">
                            Please provide a valid zip.
                             </div>
                        </div>
                        <div class="form-group">
                        <label for="validationCustom07">Tell</label>
                            <input type="text" class="form-input" name="tell" id="validationCustom07" placeholder="Tell no" required/>
                            <div class="invalid-feedback">
                            Please provide a valid zip.
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="validationCustom02">Email Adress</label>
                            <input type="email" class="form-input" name="email" id="validationCustom02" placeholder="Your Email" required/>
                            <div class="invalid-feedback">
                            Please provide a valid zip.
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="validationCustom03">Paswoord</label>
                            <input type="password" class="form-input" name="password_1" id="validationCustom03" placeholder="Password" required/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
                        </div>
                        <div class="form-group">
                        <label for="validationCustom04">Confirm Password</label>
                            <input type="password" class="form-input" name="password_2" id="validationCustom04" placeholder="Repeat your password" required/>
                            <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="reg_company" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
                    <p class="loginhere">
                        Have already an account ? <a href="companylogin.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="rej/vendor/jquery/jquery.min.js"></script>
    <script src="rej/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>