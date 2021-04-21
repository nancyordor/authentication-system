<?php session_start();

include_once('includes/header.php');
?>

<h3>Login</h3>
<p>
    <?php
    // this line communicates with the one in registration process in other to printout the specified message
    if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
        echo "<span style='color:red'>" . $_SESSION['message'] . "</span>";
        session_destroy();
    }
    ?>
</p>

<form action="loginprocess.php" method="post">
    <?php
    if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
        echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
        session_destroy();
    }
    ?>

    <p>
        <label>Email</label><br />
        <input <?php
                if (isset($_SESSION['email'])) {
                    echo "value=" . $_SESSION['email'];
                }
                ?> type="Email" name="email" placeholder="Enter Email">
    </p>

    <p>
        <label>Password</label><br />
        <input type="password" name="password" placeholder="Enter Password">
    </p>

    <p>
        <button type="submit">Register</button>
    </p>

</form>



<? include_once includes/footer.php?>