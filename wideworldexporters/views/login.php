<html>
<head>
    <?php include('../includes/scripts.php'); ?>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<div class="wrapper fadeInDown">
    <div id="formContent">

        <div class="fadeIn first">
            <img src="https://image.flaticon.com/icons/png/512/33/33308.png" id="icon" alt="User Icon" style="width:100px; height:100px; margin: 5px 0 5px 0" />
        </div>

        <form id="loginform" method="post" action="../controller/login.php">
            <input type="text" id="login" class="fadeIn second" name="email" placeholder="login">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In" style="margin-bottom: 0;">
        </form>

        <div id="error" style="width:auto;height:auto;display:none;padding: 5px 15px 5px 15px;background:#57BAED;margin-bottom: 5px;color:white;border-radius: 3px;text-transform:uppercase;font-size:80%;"></div>

        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>
<script>
    $(document).ready(function () {
        $('#loginform').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '../controller/login.php',
                dataType: 'json',
                data: $(this).serialize(),
                success: function (res) {
                    console.log('done');
                    if (res.success === true) {
                        $('#error').css('display', 'inline-block');
                        $('#error').html('Welcome');
                        window.location.replace('../views/gegevens.php');
                    } else {
                        $('#error').css('display', 'inline-block');
                        $('#error').html(res.warning);
                    }
                }
            });
        });
    });
</script>
</body>
</html>