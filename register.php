<?php include ('header.php'); ?>
<div class="page-wrapper">
   <section class="section">
      <div class="container">
         <header class="text-center">
            <h1>Register</h1>
            <h2>It's free and always will be.</h2>
         </header>
         <?php 
         // display message when user succesfully register
          echo $message; ?>

         <!-- begin of register form -->
         <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-field">
               <input class="commonField" id="firstname" name="firstname" type="text" required>
               <label class="commonLabel">First Name</label>
            </div>
            <div class="form-field">
               <input class="commonField" id="lastname" name="lastname" type="text" required>
               <label class="commonLabel">Last Name</label>
            </div>
            <div class="form-field">
               <input class="commonField" id="userName" name="userName" type="text" required>
               <label class="commonLabel">User Name:</label>
            </div>
            <div class="form-field">
               <input class="commonField" id="email" type="email" name="email" required>
               <label class="commonLabel">Email Address</label>
            </div>
            <div class="form-field">
               <input class="commonField" id="password" name="password" type="password" required>
               <label class="commonLabel">Password:</label>
            </div>
            <div class="form-field">
               <input class="commonField" id="repassword" name="repassword" type="password" required>
               <label class="commonLabel">Repeat Password:</label>
            </div>
            <div class="form-field">
               <input class="commonField" id="country" name="country" type="text" required>
               <label class="commonLabel">Country</label>
            </div>
            <div class="form-field">
               <input class="commonField" id="city" name="city" type="text" required>
               <label class="commonLabel">City</label>
            </div>
            <div class="form-field">
               <input class="commonField" id="telephone" name="telephone" type="tel" required>
               <label class="commonLabel">Telehone</label>
            </div>
            <div class="form-field">
               <input class="commonField" id="address" name="address" type="text" required>
               <label class="commonLabel">Address</label>
            </div>
            <div class="submit">
               <button type="submit" class="btn btn-success" name="register">Sign Up</button>
            </div>
         </form>
         <!-- end of register form -->
      </div>
   </section>
</div>
<!-- end of .page-wrapper -->
<?php include ('footer.php'); ?>