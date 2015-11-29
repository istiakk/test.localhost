<?php
$this->layout = '~/views/shared/_defaultLayout.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contact</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h3><span id="msglabel">Send US a Message We Will Contact You !</span></h3>
                <form method="post" id="contactForm" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name" class="h4">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required>
                        </div>
                        
                        <div class="form-group col-sm-6">
                            <label for="email" class="h4">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                        </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-sm-6">
                            <label for="content" class="h4">Document</label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                            <input type="file" class="form-control" id="content" name="content" accept=".pdf">
                        </div></div>
                    
                    <div class="form-group">
                        <label for="message" class="h4 ">Message</label>
                        <textarea id="message" class="form-control" rows="5" placeholder="Enter your message" required></textarea>
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>
                    <div id="msgSubmit" class="h3 text-center hidden">Message Submitted!</div>
                </form>
            </div>
        </div>

        <div class="row" id="displayResult">
            <div class="col-md-3"></div>
            <div id="sucumsg" style="text-align:center">
                <div class="alert alert-success">
                    <span id="nameData"></span><strong> Your Message has been sent ! </strong>
                </div></div>
        </div>
    </body>
</html>


<script>
    $(document).ready(function () {
        $("#displayResult").hide();
        $("#contactForm").on('submit', function (e) {
            $("#loader").show();
            var data = {};
            data['name'] = $("#name").val();
            data['email'] = $("#email").val();
            data['content'] = $("#content").val();
            data['message'] = $("#message").val();

            $.ajax({
                url: '/test.localhost/contact',
                type: 'post',
                data: data,
                success: function (returnedData) {
                $('#nameData').html($('#name').val());
                $("#displayResult").show();
                $("#contactForm").hide();
                $("#msglabel").hide();  
                }
            });
            return false;
        });
    });
</script>
