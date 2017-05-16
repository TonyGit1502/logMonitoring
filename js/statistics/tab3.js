$(document).ready(function(){
	var id = $("#dropdown1").attr("id");
	userID = "<?php echo $_COOKIE['userID'];?>";
    $.ajax({
        type: "POST",
        url: "php/statistics/allGroups.php",
        data: {id: id},
        dataType: "json",
        success: function(data){
            var a1 = data[0];
                a2 = data[1];

            var cq = $("#graphChart1");
            Chart.defaults.global.defaultFontSize = 14;
            Chart.defaults.global.tooltips.bodyFontSize = 16;
            var graphChart1 = new Chart(cq, {
                type: 'doughnut',
                data: {
                    labels: ["Юноши", "Девушки"],
                    datasets: [{
                        data: [a1, a2],
                        backgroundColor: [
                            "rgba(63, 81, 181, 0.7)",
                            "rgba(118, 255, 3, 0.7)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(63, 81, 181, 1)",
                            "rgba(118, 255, 3, 1)"
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
            var cw = $("#graphChart2");
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