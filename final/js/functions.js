function getRaces() {
    $.ajax({
        type: "get",
        url: "./api/getRaces.php",
        success: function(data) {
            //Clear table
            $("#raceInfo").html("");
            //append all races to the races table div
            for (var i = 0; i < data.length; i++) {
                //Converting 24 hour clock to AM/PM
                var startTime;
                var ampm;
                if(data[i].start_time > 12) {
                    startTime = data[i].start_time - 12;
                    ampm = "PM"
                }
                else if (data[i].start_time == 12) {
                    startTime = data[i].start_time;
                    ampm = "PM";
                }
                else if (data[i].start_time == 0) {
                    startTime = 12;
                    ampm = "AM";
                }
                else {
                    startTime = data[i].start_time;
                    ampm = "AM";
                }
                //Building out table
                $("#raceInfo").append("<tr>" +
                "<td>" + data[i].id + "</td>" + 
                "<td>" + data[i].date + "</td>" + 
                "<td>" + startTime + " " + ampm + "</td>" + 
                "<td>" + data[i].location + "</td>" + 
                "<td><a href='?'>Map</a></td>" + 
                "<td><img class='buttonIcon editButton' id='" + data[i].id + "' src='img/racing-actions-edit.png'/>" + 
                "<img class='buttonIcon cancelButton' id='" + data[i].id + "' src='img/racing-actions-cancel.png'/>" + 
                "<img class='buttonIcon previewButton' id='" + data[i].id + "' src='img/racing-actions-racers.png'/></td>" +
                "</tr>"
                );
            }
            //Display error message if there are no races to display
            if (data.length == 0) {
                $("#raceInfo").html("Sorry, there are no current races to display");
            }
            //Debugging console log
            // console.log(data);
        },
        error: function(status) {
            console.log(status);
        }
        
    });
}

function saveInput() {
    $.ajax({
        type: "post",
        url: "./api/addRace.php",
        data: {
            "id": $("#raceId").val(),
            "date": $("#date").val(),
            "start": $("#start").val(),
            "password": $("#password").val(),
            "location": $("#location").val()
        },
        success: function(data) {
            if (data == "1") {
                //on successful insert, empty all text fields and hide the modal
                //as well as refreshing our table
                getRaces();
                $("#addError").html("")
                $("#raceId").val('');
                $("#date").val('');
                $("#start").val('');
                $("#password").val('');
                $("#location").val('');
                $("#addModal").modal("hide");
            }
            else {
                //on insert fail, display error message saying it's probably the RaceID needs to be unique
                $("#raceId").focus();
                $("#addError").html("There was an error creating your race, your Race ID must be unique!");
            }
            console.log(data);
        },
        error: function(status) {
            console.log(status);
        }
    });
}

$(document).ready(function () {
    getRaces();
    $("#addButton").click(function() {
        // console.log("add button is clicked");
        $("#addModal").modal("show");
        $("#raceId").focus();
    });
    $("#buttonSave").click(function() {
        saveInput();
        console.log("save button clicked");
    });
});

