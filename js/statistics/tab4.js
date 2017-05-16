$(document).ready(function(){
	var id = $("#dropdown2").attr("id");
	userID = "<?php echo $_COOKIE['userID'];?>";
    $.ajax({
        type: "POST",
        url: "php/statistics/allGroups.php",
        data: {id: id},
        dataType: "json",
        success: function(data){
            var a1 = data[1];
                a2 = data[0];
            var cq = $("#graphChart3");
            Chart.defaults.global.defaultFontSize = 14;
            Chart.defaults.global.tooltips.bodyFontSize = 16;
            var graphChart1 = new Chart(cq, {
                type: 'doughnut',
                data: {
                    labels: ["Юноши", "Девушки"],
                    datasets: [{
                        data: [a1, a2],
                        backgroundColor: [
                            "rgba(213, 0, 0, 0.7)",
                            "rgba(76, 175, 80, 0.7)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(213, 0, 0, 1)",
                            "rgba(76, 175, 80, 1)"
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
            var city1 = data[2];
                city2 = data[3];
                city3 = data[4];
            var cw = $("#graphChart4");
            Chart.defaults.global.defaultFontSize = 14;
            Chart.defaults.global.tooltips.bodyFontSize = 16;
            var graphChart1 = new Chart(cw, {
                type: 'bar',
                data: {
                    labels: ["Самара", "Новокуйбышевск", "Другие города"],
                    datasets: [{
                        label: 'Проживают',
                        data: [city1, city2, city3],
                        backgroundColor: [
                            "rgba(3, 169, 244, 0.7)",
                            "rgba(0, 188, 212, 0.7)",
                            "rgba(0, 150, 136, 0.7)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(3, 169, 244, 1)",
                            "rgba(0, 188, 212, 1)",
                            "rgba(0, 150, 136, 1)"
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