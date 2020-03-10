<form method="post">
    Name: <input type="text" name="named"><br>
    E-mail: <input type="text" name="emaild"><br>
    <input type="submit">
</form>
Welcome <?php echo isset($_POST['named'])?$_POST['named']:''; ?><br>
Your email address is: <?php echo isset($_POST['emaild'])?$_POST["emaild"]:''; ?>