$(document).ready(function(){
	var id = $("#tab-1").attr("id");
	userID = "<?php echo $_COOKIE['userID'];?>";
    $.ajax({
        type: "POST",
        url: "php/statistics/allGroups.php",
        data: {id: id},
        dataType: "json",
        success: function(data){
            gip_113 = data[0];
            gip_114 = data[1];
            gip_115 = data[2];

            var ctx = $("#myBarChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["ГИП-113", "ГИП-114", "ГИП-115"],
                    datasets: [{
                        label: 'Количество студентов в группе',
                        data: [gip_113, gip_114, gip_115],
                        backgroundColor: [
                            'rgba(255, 193, 7, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(76, 175, 80, 0.7)'
                        ],
                        borderColor: [
                            'rgba(255, 193, 7, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(76, 175, 80, 1)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
            var male = data[3];
              female = data[4];
              var cntx = $("#myPieChart");
              var myPieChart = new Chart(cntx,{
                    type: 'pie',
                    data: {
                        labels: ["Юноши","Девушки"],
                        datasets: [{
                            data: [male, female],
                            backgroundColor: [
                                "rgba(1, 87, 155, 0.7)",
                                "rgba(244, 67, 54, 0.7)"
                            ],
                            hoverBackgroundColor: [
                                "rgba(1, 87, 155, 1)",
                                "rgba(244, 67, 54, 1)"
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        animation:{
                            animateScale:true
                        }
                    }
               });
        }
    });            
	
});