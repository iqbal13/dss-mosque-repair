<div class="col-md-12">
<h3 class="text-center"> Optimasi </h3>
 <div class="col-md-12 padding-0" style="margin-top:20px;">
            <div class="col-md-12 padding-0">
                <div class="col-md-6 padding-0">
                   <div class="col-md-12 padding-0">
                      <div class="col-md-12">
                        <div class="panel chart-title">
                          <h3><span class="fa fa-area-chart"></span>   Optimasi with simulated annealing</h3>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="panel">
                             <div class="panel-heading-white panel-heading text-center">
                                <h4>Doughnut Chart</h4>
                              </div>
                              <div class="panel-body">
                                <center>
                                <canvas class="doughnut-chart"></canvas>
                                </center>
                              </div>
                        </div>
                    </div>

                   <div class="col-md-6">
                        <div class="panel">
                             <div class="panel-heading-white panel-heading text-center">
                                <h4>Pie Chart</h4>
                              </div>
                              <div class="panel-body">
                                  <center>
                                  <canvas class="pie-chart"></canvas>
                                  </center>
                              </div>
                        </div>
                    </div>
                 
                   </div>
                  </div>
                  <div class="col-md-6">
                      <div class="panel">
                           <div class="panel-heading-white panel-heading">
                              <h4>Line Chart</h4>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                  <canvas class="line-chart"></canvas>
                                </div>
                            </div>
                      </div>

                  
                  </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                       <div class="panel-heading-white panel-heading">
                          <h4>Hasil Optimasi</h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                             <canvas class="bar-chart"></canvas>
                            </div>
                        </div>
                  </div>
            </div>

          </div>
</div>

  <script src="<?php echo base_url();?>assets/js/plugins/chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/jquery.nicescroll.js"></script>


    <!-- custom -->
     <script src="<?php echo base_url();?>assets/js/main.js"></script>
     <script type="text/javascript">
      (function(jQuery){
    
        var barData = {
            labels: ["Masjid 1 ", "Masjid 2", "Masjid 3", "Masjid 4", "Masjid 5", "Masjid 6", "Masjid 7"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(21,186,103,0.5)",
                    strokeColor: "rgba(220,220,220,0.8)",
                    highlightFill: "rgba(220,220,220,0.75)",
                    highlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                }
            ]
        };

        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(21,186,103,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(21,113,186,0.5)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };


        var doughnutData = [
                {
                    value: 100,
                    color:"#4ED18F",
                    highlight: "#15BA67",
                    label: "Alfa"
                },
                {
                    value: 250,
                    color: "#15BA67",
                    highlight: "#15BA67",
                    label: "Beta"
                },
                {
                    value: 100,
                    color: "#5BAABF",
                    highlight: "#15BA67",
                    label: "Gamma"
                },
                {
                    value: 40,
                    color: "#94D7E9",
                    highlight: "#15BA67",
                    label: "Peta"
                },
                {
                    value: 120,
                    color: "#BBE0E9",
                    highlight: "#15BA67",
                    label: "X"
                }

            ];

             window.onload = function(){
                var ctx = $(".doughnut-chart")[0].getContext("2d");
                window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {
                    responsive : true,
                    showTooltips: true
                });

                var ctx2 = $(".pie-chart")[0].getContext("2d");
                window.myPie = new Chart(ctx2).Pie(doughnutData, {
                    responsive : true,
                    showTooltips: true
                });

                var ctx3 = $(".line-chart")[0].getContext("2d");
                window.myLine = new Chart(ctx3).Line(lineChartData, {
                    responsive : true,
                    showTooltips: true
                });

                var ctx4 = $(".bar-chart")[0].getContext("2d");
                window.myBar = new Chart(ctx4).Bar(barData, {
                    responsive : true,
                    showTooltips: true
                });

                var ctx5 = $(".radar-chart")[0].getContext("2d");
                window.myRadar = new Chart(ctx5).Radar(radarData, {
                    responsive : true,
                    showTooltips: true
                });

                var ctx6 = $(".polar-chart")[0].getContext("2d");
                window.myPolar = new Chart(ctx6).PolarArea(doughnutData, {
                    responsive : true,
                    showTooltips: true
                });
            };
        })(jQuery);
     </script>
