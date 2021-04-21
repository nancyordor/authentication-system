<?php session_start();
include_once ('includes/header.php')
?>
<h3>Register</h3>
<p> Welcome, Please Register! </p>
<p>All fields are required! </p>

<body>
    <form action="registrationprocess.php" method="post">
        <?php
            if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
            echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
            session_destroy();
            }
        ?>
        <p>
        <label>Full Name</label><br />
        <input
        
        <?php 
        // ensures that if the page is refreshed the already inputted name is still there.             
             if(isset($_SESSION['fullname'])){
            echo "value=" . $_SESSION['fullname'];
        } 
        ?>
         type="text" name="fullname" 
        placeholder="Enter Full Name"  >
        </p>


        <p>
        <label>Email</label><br />
        <input
        <?php              
             if(isset($_SESSION['email'])){
            echo "value=" . $_SESSION['email'];
        } 
        ?>
         type="Email" name="email" placeholder="Enter Email"  >
        </p>

        <p>
        <label>Password</label><br />
        <input type="password" name="password" placeholder="Enter Password"  >
        </p>

        <p>
        <button type="submit">Register</button>
        </p>

    </form>



<? include_once includes/footer.php?>
