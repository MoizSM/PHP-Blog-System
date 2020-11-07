<!-- Registeration Button -->
<a class="btn modal-trigger account" href="#modal1">Register</a>

 <!-- Registration Form -->
 <div id="modal1" class="modal">
     <div class="modal-content">
         <h4>Create A New Account</h4>
         <form action="index.php" method="POST">
             <div class="input-field">
                 <label for="fName">First Name</label>
                 <input type="text" name="fName" id="fName">
             </div>
             <div class="input-field">
                 <label for="lName">Last Name</label>
                 <input type="text" name="lName" id="lName">
             </div>
             <div class="input-field">
                 <label for="email">Email</label>
                 <input type="email" name="email" id="email">
             </div>
             <div class="input-field">
                 <label for="password">Password</label>
                 <input type="password" name="password" id="password">
             </div>
             <div class="input-field">
                 <input type="submit" name="submit" id="submit" value="CREATE ACCOUNT">
             </div>
         </form>
     </div>
 </div>