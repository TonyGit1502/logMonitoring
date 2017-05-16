$(document).ready(function(){
    var id = $("tab-2").attr("id");
    userID = "<?php echo $_COOKIE['userID'];?>";
    $.ajax({
        type: "POST",
        url: "php/statistics/allGroups.php",
        data: {id: id,
        	userID: userID
        },
        dataType: "json",
        success: function(a1){
        	console.log(a1[0]);
        }
    });
});