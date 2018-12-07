function init() {
    home();
}

//Populate mainActivity with "home" page
function home() {
    console.log("home was called");
    $("#hidden").html("");
    $("#mainActivity").html('<div id="container">' +
        '<div id="myCarousel" class="carousel slide" data-ride="carousel">' +
            
        //   <!-- Wrapper for slides -->
          '<div class="carousel-inner">' +
            '<div class="item active">' +
              '<img src="img/lion.jpg" alt="Lion">' +
            '</div>' +
        
            '<div class="item">' +
              '<img src="img/tiger.jpg" alt="Tiger">' +
            '</div>' +
        
            '<div class="item">' +
              '<img src="img/bear.jpg" alt="Bear">' +
            '</div>' +
            
            '<div class="item">' + 
              '<img src="img/otter.jpg" alt="Otter">' +
            '</div>' +
          '</div>' +
        
        //   <!-- Left and right controls -->
          '<a class="left carousel-control" href="#myCarousel" data-slide="prev">' +
            '<span class="glyphicon glyphicon-chevron-left"></span>' +
            '<span class="sr-only">Previous</span>' +
          '</a>' +
          '<a class="right carousel-control" href="#myCarousel" data-slide="next">' +
            '<span class="glyphicon glyphicon-chevron-right"></span>' +
            '<span class="sr-only">Next</span>' + 
          '</a>' +
        '</div>' +
    '</div><br>' +
    '<button type="button" class="btn btn-info btn-lg">Adopt Now</button>');
    
}

//populate mainActivity with "adoptions" page
function adoptions() {
    
    $.ajax({
        type: "post",
        url: "api/getPetInfo.php",
        data: {"all": true},
        datatype: "application/json",
        success: function(data, status) {
            $("#mainActivity").html("");
            for(var i = 0; i < data.length; i++) {
                $("#mainActivity").append('<div class="panel panel-default"">' +
                      "<div class='panel-body'>" +
                        "Name: <a class='petModalActivate' id=" + data[i].id + " data-toggle='modal' data-target='#petModal'>" + data[i].name + "</a>" +
                        "<br>Type: " + data[i].type +
                        "<input type='button' value='Adopt Me!' class='btn btn-info btn-lg' id='" + data[i].id + "'>" +
                      "</div>" +
                    "</div>"
                    
                    
                );
            }
            console.log(data);
            $(".petModalActivate").click(function() {
              $.ajax({
                type: "post",
                url: "api/getPetInfo.php",
                data: {"id": $(this).attr('id')},
                datatype: "application/json",
                beforeSend: function() {
                  $("#hidden").html('<div class="modal fade" id="petModal" role="dialog">' +
                      '<div class="modal-dialog">' +
                        '<div class="modal-content">' +
                          '<div class="modal-header">' +
                            '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
                            '<h4 class="modal-title" id="mod-title">Loading</h4>' +
                          '</div>' + 
                          '<div class="modal-body" id="mod-bod">' +
                            '<img src="img/loading.gif" alt="Loading"/>',
                          '</div>' +
                        '</div>' +
                      '</div>' +
                    '</div>');
                },
                success: function(data, status) {
                  console.log(data);
                  //added a delay to ensure the loading spinner functionality is visible
                  $("#mod-title").delay(1000).queue(function() {$(this).html(data[0].name)});
                  $("#mod-bod").delay(1000).queue(function() {$(this).html('<img src="img/' + data[0].pictureURL + '" alt="' + data[0].name + '"/>' +
                    '<p>Age: ' + (2018 - data[0].yob) + ' years</p>' +
                    '<p>Breed: ' + data[0].breed + '</p>' +
                    '<p>' + data[0].description + '</p>')});
                },
                fail: function(status) {
                  console.log(status);
                }
              });
            });
  
        },
        fail: function(status) {
            console.log("mission failed bois, we'll get'em next time");
            console.log(status);
        }
        
    });
    
}

//populate mainActivity with "about" page
function about() {
    $("#hidden").html("");
    $("#mainActivity").html("We are supported with generous donations from viewers like you, and the CSUMB big animal shipping company!");
}

$("#home").click(function() {
    console.log("we called home");
    home();
});
$("#adoptions").click(function() {
    adoptions();
});
$("#about").click(function() {
    about();
});


