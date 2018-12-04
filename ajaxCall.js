//POST REQUEST
/*$(document).on('click','#save',function(e) {
    var data = $("#form_add").serialize();
    $.ajax({
           data: data,
           type: "post",
           url: "insert.php",
           success: function(data){
                alert("Data Save: " + data);
           }
  });
   });*/


$(document).ready(function(){
    $(document).delegate('#addButton', 'click', function (event) {
        event.preventDefault();

        //serialize form data

        var url = $('#form_add').serialize();

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

                //alert('Could not be posted');

            }



        });
    });

});