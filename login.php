<?php include ('header.php'); ?>
<div class="page-wrapper">
  <!-- begin of login section -->
   <section class="section">
      <div class="container">
         <header class="text-center">
            <h1>Login</h1>
            <h2>Let's Do Shopping</h2>
         </header>
         <!-- Login Form -->
         <form action="login.php" method="POST">
            <div class="form-field">
               <input class="commonField" id="email" type="email" name="email" required>
               <label class="commonLabel">Please Enter Your Email To Login</label>
            </div>
            <div class="form-field">
               <input class="commonField" id="password" type="password" name="password" required>
               <label class="commonLabel">Password</label>
            </div>
            
              <div id="loginmsg" class="text-center"><?php echo $message; ?></div>
            
            <div class="submit">
               <button type="submit" class="btn btn-success" name="login">Sign In</button>
            </div>
         </form>
         <!-- end of Login form -->
      </div>
   </section>
   <!-- end of section -->
</div>
<!-- end of .page-wrapper -->
<?php include ('footer.php'); ?>