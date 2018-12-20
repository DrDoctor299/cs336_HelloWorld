<!DOCTYPE html>

<html>
    <head>
        <title>Dashboard</title>
        <meta charset="UTF-8">
        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--Bootstrap JS and CSS-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!--Custom CSS-->
        <link rel="stylesheet" href = "css/styles.css">
        <!--Custom Javascript-->
        <script language="javascript" type="text/javascript" src="js/functions.js"></script>
    </head>
    <body>
        <!--Search bar-->
        <div id="search">
            
        </div>
        <!--Table of races-->
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>Location</th>
            <th></th>
            <th><a href="?">Past Races</a>  <img class="buttonIcon" id="addButton" src="img/racing-add.png"/></th>
        </tr>
        <div id="raceInfo"></div>
        
        <!--Modal-->
        <div id="addModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
        
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Race Details</h4>
                    </div>
                    <div class="modal-body">
                        <span id = "addError"></span> <br>
                        <span>Race ID <input type="text" id="raceId"> <br></span>
                        <span>Race Date <input type="date" id="date"> <br></span>
                        <span>Start Time <input type="number" id="start"> 24 hours <br></span>
                        <span>Password <input type="password" id="password"> <br></span>
                        <span>Location <textarea id="location"></textarea> <br></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success btn-lg" id="buttonSave">Save</button>
                    </div>
                </div>
        
            </div>
        </div>
    </body>
</html>