<html>
<head>
    <?php include('../includes/scripts.php'); ?>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<div class="wrapper fadeInDown">
    <div id="formContent">

        <div class="fadeIn first">
            <img src="https://image.flaticon.com/icons/png/512/33/33308.png" id="icon" alt="User Icon"
                 style="width:100px; height:100px; margin: 5px 0 5px 0"/>
        </div>

        <form id="registerform" type="post">
            <label for="fullname">Volledige naam</label>
            <input type="text" id="fullname" name="fullname"><br>

            <label for="preferredname">Roepnaam</label>
            <input type="text" id="preferredname" name="preferredname"><br>

            <label for="phonenumber">Telefoonnummer</label>
            <input type="text" id="phonenumber" name="phonenumber"><br>

            <label for="email">E-mail</label><br>
            <input type="email" id="email" name="email">

            <label for="password">Wachtwoord</label>
            <input type="password" id="password" name="password"><br>
            <input type="submit" name="submit" value="Versturen">
        </form>

        <div id="error"
             style="width:auto;height:auto;display:none;padding: 5px 15px 5px 15px;background:#57BAED;margin-bottom: 5px;color:white;border-radius: 3px;text-transform:uppercase;font-size:80%;"></div>

        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>
<script>
    $(document).ready(function () {
        $('#registerform').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '../controller/register.php',
                dataType: 'json',
                data: $(this).serialize(),
                success: function (res) {
                    if (res.success === true) {
                        $('#error').css('display', 'inline-block');
                        $('#error').html('Geregistreerd');
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