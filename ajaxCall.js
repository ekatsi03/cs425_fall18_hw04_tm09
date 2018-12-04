//POST REQUEST



$(document).ready(function(){
    alert("sto document ready");
    $(document).delegate('#addButton', 'click', function (event) {
        event.preventDefault();
        alert('clicked on button save');

        //serialize form data

        var url = $('form').serialize();

        //alert("URL: " + url);

        //function to turn url to an object

        function getUrlVars(url) {

            var hash;

            var myJson = {};

            var hashes = url.slice(url.indexOf('?') + 1).split('&');

            for (var i = 0; i < hashes.length; i++) {

                hash = hashes[i].split('=');

                myJson[hash[0]] = hash[1];

            }

            return JSON.stringify(myJson);

        }



        //pass serialized data to function

        var test = getUrlVars(url);

        //post with ajax

        $.ajax({

            type:"POST",

            url: "create_general.php",

            data: test,

            ContentType:"application/json",

            success:function(){

                alert('successfully posted');

            },

            error:function(){

                alert('Could not be posted');

            }



        });
    });

});