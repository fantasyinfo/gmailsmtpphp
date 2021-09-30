<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form id="contactFrm">
        <table>
            <tr>
                <td>Name: </td>
                <td> <input type="text" name="user_name" id="name" required> </td>
            </tr>
            <tr>
                <td>Email: </td>
                <td> <input type="email" name="user_email" id="email" required> </td>
            </tr>
            <tr>
                <td></td>
                <td> <input type="submit" name="submit" id="submit"> <span id="msg"></span></td>
            </tr>
        </table>
    </form>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        $("#msg").html("");
        // sending form data
        $("#contactFrm").on("submit", function(e) {
            $("#submit").val("Please Wait...");
            $("#submit").attr("disabled", true);

            e.preventDefault();
            $.ajax({
                url: "data.php",
                method: "post",
                data: $("#contactFrm").serialize(),
                success: function(result) {
                    // alert(result);
                    $("#submit").html("Submit");
                    $("#submit").val("disabled", false);
                    $("#contactFrm")[0].reset();
                    $("#msg").html(result);
                }
            });
        });
    });
    </script>
</body>

</html>