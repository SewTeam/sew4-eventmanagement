<?php

?>

<html>
    <head>
        <title>Event erstellen</title>
        <meta charset="utf-8">

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

        <!-- JQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <!-- Bootstrap JS CDN
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>-->

        <!-- Fontawesome CDN -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

        <script>
        function makeid() {
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for (var i = 0; i < 5; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text;
        }

            function addOptionField() {
                var tempId = makeid();
                $("#voteables").append("<div id='" + tempId + "' class='option'><br><input type='text' placeholder='Option' name='" + tempId + "'><i class='fa fa-times-circle' onclick='remove($(this))'></i></div>");
            }

            function remove($option) {
                $option.closest('.option').remove();
            }

            $(function() {
                $("#votingForm").ajaxForm(function(){
                    alert("Das Voting wurde erstellt.");
                });
            });
        </script>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12 text-center">
                    <h1>Neues Voting erstellen</h1>
                    <hr>
                    <form id="votingForm" method="post" action="save.php">
                        <input type="text" id="name" placeholder="Titel" name="titel"><br>
                        <textarea id="desc" placeholder="Beschreibung" name="desc"></textarea>
                        <div id="voteables">
                            <input type="text" placeholder="Option" name="o1">
                        </div>
                        <i class="fa fa-plus-circle" onclick="addOptionField()"></i><br>
                        <button type="submit">Voting erstellen</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
