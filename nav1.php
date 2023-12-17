<?php
    session_start();

    // Check if the user is authenticated
    if (!isset($_SESSION["id"])) {
        header("Location: loginform.html"); // Redirect to login page
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
.error {
color: red;
}


body{
  background: url(./img/blue-curve-frame-template_53876-114605.avif) no-repeat;
  background-size: 100% 150%;
  
}
</style>
</head>
<body>

   <h1>Admission Procedure</h1>
    <p>Generally, admission is granted from Montessori, Nursery to Grade 5. Admission notifications are published in daily local newspapers and  face book page at the end of the academic session.</p>
    <h2>Admission Policy or Criteria:</h2>
    <p>Admission in the school is made without any distinction of religion, race caste, place of birth etc. being based on the admission guidelines of the local government and the policies of Ministry of Education, Science and Technology.Concerned parents and aspiring students are expected to complete all the formalities within the given time framework</p>
  <style>
     .error {
      color: red;
     }
  </style>


  <h3>Admission form</h3>   
        <legend>User personal information</legend>  

  <form id="myForm" onsubmit="return validateForm()" action="table.php" method="post">
    <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <span class="error" id="nameError"></span><br><br>


        <label for="class">Enter class:</label>
        <input type="number" id="class" name="class" min="1" max="5"><br><br>
 

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone">
        <span class="error" id="phoneError"></span><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <span class="error" id="emailError"></span><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address">
        <span class="error" id="addressError"></span><br><br>

        
        <button type="submit">Submit</button>
  


<script>
  function validateForm() {
     name = document.getElementById('name').value;
     phone = document.getElementById('phone').value;
     email = document.getElementById('email').value;
    
   nameError = document.getElementById('nameError');
   phoneError = document.getElementById('phoneError');
   emailError = document.getElementById('emailError');
  

    phonePattern = /^\d{10}$/;
emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

if(!name){
  nameError.textContent = 'Please enter your name.';
} else {
nameError.textContent = '';

}
  if (!phone) {
phoneError.textContent = 'Please enter your phone number.';
}
 else if (!phonePattern.test(phone)) {
phoneError.textContent = 'Please enter a valid 10-digit phone number.';
} 
else {
phoneError.textContent = '';
}

  if (!email) {
emailError.textContent = 'Please enter your email address.';
} 
 else if (!emailPattern.test(email)) {
emailError.textContent = 'Please enter a valid email address.';
}
 else {
emailError.textContent = '';
}

return !(nameError.textContent || phoneError.textContent || emailError.textContent ||);
}

</script>

</form>
</body>
</html>