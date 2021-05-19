<?php
session_start();
include("../../actions/initialState.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>TECHSHOP ADMIN</title>
  <link rel="stylesheet" href="../../assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
  <link rel="stylesheet" href="../../assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <!-- <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css"> -->
  <!-- <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.addons.css"> -->
  <link rel="stylesheet" href="../../assets/css/shared/style.css">
  <link rel="stylesheet" href="../../assets/css/demo_1/style.css">
  <link rel="shortcut icon" href="../../../assets/image/icon.png" />
</head>

<body>
  <div class="container-scroller">
    <?php
    require("../../navbar.php");
    ?>
    <div class="container-fluid page-body-wrapper">
      <?php
      require("../../sidebar.php");
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- Page Title Header Starts-->
          <div class="row page-title-header">
            <div class="col-12">
              <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
              </div>
            </div>
            <div class="col-md-12">
              <div class="page-header-toolbar">
                <div class="btn-group toolbar-item" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-left"></i></button>
                  <button type="button" class="btn btn-secondary">2021</button>
                  <button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-right"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- Page Title Header Ends-->
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-4">
                      <div class="d-flex align-content-center justify-content-center">
                        <div class="wrapper">
                          <h3 class="mb-0 font-weight-semibold text-center""><?= $sumView ?></h3>
                          <h5 class=" mb-0 font-weight-medium text-primary">Lượt xem</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-4 mt-md-0 mt-4">
                      <div class="d-flex align-content-center justify-content-center">
                        <div class="wrapper">
                          <h3 class="mb-0 font-weight-semibold text-center""><?= $sumBuy ?></h3>
                          <h5 class=" mb-0 font-weight-medium text-primary">Lượt mua hàng</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-4 mt-md-0 mt-4">
                      <div class="d-flex align-content-center justify-content-center">
                        <div class="wrapper">
                          <h3 class="mb-0 font-weight-semibold text-center""><?= $sumComment ?></h3>
                          <h5 class=" mb-0 font-weight-medium text-primary">Lượt bình luận</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-4 mt-md-0 mt-4">
                      <div class="d-flex align-content-center justify-content-center">
                        <div class="wrapper">
                          <h3 class="mb-0 font-weight-semibold text-center""><?= $sumRate ?></h3>
                          <h5 class=" mb-0 font-weight-medium text-primary">Lượt đánh giá</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">Biểu đồ mua hàng</h4>
                  <div class="d-flex flex-column flex-lg-row">
                    <p>Số lượng sản phẩm bán ra</p>
                  </div>
                  <div class="d-flex flex-column flex-lg-row">
                    <div class="data-wrapper d-flex mt-2 mt-lg-0">
                      <div class="wrapper pr-5">
                        <h5 class="mb-0">Tổng đơn hàng</h5>
                        <div class="d-flex align-items-center">
                          <h4 class="font-weight-semibold mb-0"><?= $sumOrder ?></h4>
                        </div>
                      </div>
                      <div class="wrapper">
                        <h5 class="mb-0">Total doanh thu</h5>
                        <div class="d-flex align-items-center">
                          <h4 class="font-weight-semibold mb-0"><?php echo number_format($sumOrderPrice) . "đ"; ?></h4>
                        </div>
                      </div>
                    </div>
                    <div class="ml-lg-auto" id="sales-statistics-legend"></div>
                  </div>
                  <canvas class="mt-5" height="120" id="sales-statistics-overview"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body d-flex flex-column">
                  <div class="wrapper">
                    <div class="col-md-12">
                      <div class="d-flex align-items-center pb-2">
                        <div class="dot-indicator bg-danger mr-2"></div>
                        <p class="mb-0">Total Users</p>
                      </div>
                      <h4 class="font-weight-semibold" style="margin-bottom:0;"><?= $sumUser ?></h4>
                      <div class="progress progress-md">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 10%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
                      </div>
                    </div>
                    <div class="col-md-12 mt-4 mt-md-0" style="margin-top: 20px !important;">
                      <div class="d-flex align-items-center pb-2">
                        <div class="dot-indicator bg-success mr-2"></div>
                        <p class="mb-0">Active Users</p>
                      </div>
                      <h4 class="font-weight-semibold" style="margin-bottom:0;"><?= $sumUser ?></h4>
                      <div class="progress progress-md">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="45"></div>
                      </div>
                    </div>
                  </div>
                  <canvas class="my-auto mx-auto" height="250" id="net-profit"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!--  <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">Hoạt động gần đây</h4>
                  <div class="d-flex py-2 border-bottom">
                    <div class="wrapper">
                      <small class="text-muted">Mar 14, 2019</small>
                      <p class="font-weight-semibold text-gray mb-0">Change in Directors</p>
                    </div>
                  </div>
                  <div class="d-flex py-2 border-bottom">
                    <div class="wrapper">
                      <small class="text-muted">Mar 14, 2019</small>
                      <p class="font-weight-semibold text-gray mb-0">Other Events</p>
                    </div>
                  </div>
                  <div class="d-flex py-2 border-bottom">
                    <div class="wrapper">
                      <small class="text-muted">Mar 14, 2019</small>
                      <p class="font-weight-semibold text-gray mb-0">Quarterly Report</p>
                    </div>
                  </div>
                  <div class="d-flex pt-2">
                    <div class="wrapper">
                      <small class="text-muted">Mar 14, 2019</small>
                      <p class="font-weight-semibold text-gray mb-0">Change in Directors</p>
                    </div>
                  </div>
                   <a class="d-block mt-5" href="#">Show all</a> 
                </div>
              </div>
            </div> -->
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">Lượt xem nhiều nhất</h4>
                  <div class="table-responsive">
                    <table class="table table-stretched">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Tên sản phẩm</th>
                          <th>Số lượt xem</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        foreach ($tableViewProduct as $tVP) {
                          $type = mysqli_fetch_assoc($connect->query("SELECT name from producttype where id = $tVP[2]"))['name'];
                          echo <<<XXX
                              <tr>
                                <td>
                                  <p class="mb-1 text-dark font-weight-medium">$i</p><small
                                    class="font-weight-medium">$type</small>
                                </td>
                                <td class="font-weight-medium">$tVP[0]</td>
                                <td class="text-success font-weight-medium">$tVP[1]</td>
                              </tr>
                            XXX;
                          $i++;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between pb-3">
                    <h4 class="card-title mb-0">Người dùng mới đăng ký</h4>
                  </div>
                  <ul class="timeline">
                    <?php
                    foreach ($tableUserSignUpSuccess as $tUSUS) {
                      echo <<<XXX
                          <li class="timeline-item">
                            <p class="timeline-content"><a href="#">$tUSUS[0]</a> vừa đăng ký thành công</p>
                            <p class="event-time mt-2">$tUSUS[1]</p>
                          </li>
                        XXX;
                    }
                    ?>
                  </ul>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- content-wrapper ends -->
        <?php
        require("../../footer.php");
        ?>
      </div>
    </div>

  </div>
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/vendors/js/vendor.bundle.addons.js"></script>
  <script src="../../assets/js/shared/off-canvas.js"></script>
  <script src="../../assets/js/shared/misc.js"></script>
  <!-- <script src="../../assets/js/demo_1/dashboard.js"></script> -->
  <script>
    (function($) {
      'use strict';
      $(function() {
        var lineStatsOptions = {
          scales: {
            yAxes: [{
              display: false
            }],
            xAxes: [{
              display: false
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            },
            line: {
              tension: 0
            }
          },
          stepsize: 100
        }
        if ($('#sales-statistics-overview').length) {
          var salesChartCanvas = $("#sales-statistics-overview").get(0).getContext("2d");
          var gradientStrokeFill_1 = salesChartCanvas.createLinearGradient(0, 0, 0, 450);
          gradientStrokeFill_1.addColorStop(1, 'rgba(255,255,255, 0.0)');
          gradientStrokeFill_1.addColorStop(0, 'rgba(102,78,235, 0.2)');
          var data_1_1 = [<?php echo implode(',', $tableOrder) ?>];
          var areaData = {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "Octorber", "November", "December"],
            datasets: [{
              label: 'Đơn hàng',
              data: data_1_1,
              borderColor: infoColor,
              backgroundColor: gradientStrokeFill_1,
              borderWidth: 2
            }]
          };
          var areaOptions = {
            responsive: true,
            animation: {
              animateScale: true,
              animateRotate: true
            },
            elements: {
              point: {
                radius: 3,
                backgroundColor: "#fff"
              },
              line: {
                tension: 0
              }
            },
            layout: {
              padding: {
                left: 0,
                right: 0,
                top: 0,
                bottom: 0
              }
            },
            legend: false,
            legendCallback: function(chart) {
              var text = [];
              text.push('<div class="chartjs-legend"><ul>');
              for (var i = 0; i < chart.data.datasets.length; i++) {
                console.log(chart.data.datasets[i]); // see what's inside the obj.
                text.push('<li>');
                text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                text.push(chart.data.datasets[i].label);
                text.push('</li>');
              }
              text.push('</ul></div>');
              return text.join("");
            },
            scales: {
              xAxes: [{
                display: false,
                ticks: {
                  display: false,
                  beginAtZero: false
                },
                gridLines: {
                  drawBorder: false
                }
              }],
              yAxes: [{
                ticks: {
                  max: 30,
                  min: 0,
                  stepSize: 5,
                  fontColor: "#858585",
                  beginAtZero: false
                },
                gridLines: {
                  color: '#e2e6ec',
                  display: true,
                  drawBorder: false
                }
              }]
            }
          }

          var salesChart = new Chart(salesChartCanvas, {
            type: 'line',
            data: areaData,
            options: areaOptions
          });
          document.getElementById('sales-statistics-legend').innerHTML = salesChart.generateLegend();
          $("#sales-statistics_switch_1").click(function() {
            var data = salesChart.data;
            data.datasets[0].data = data_1_1;
            salesChart.update();
          });
          $("#sales-statistics_switch_2").click(function() {
            var data = salesChart.data;
            data.datasets[0].data = data_2_1;
            salesChart.update();
          });
          $("#sales-statistics_switch_3").click(function() {
            var data = salesChart.data;
            data.datasets[0].data = data_3_1;
            salesChart.update();
          });
          $("#sales-statistics_switch_4").click(function() {
            var data = salesChart.data;
            data.datasets[0].data = data_4_1;
            salesChart.update();
          });
        }
        if ($("#net-profit").length) {
          var marksCanvas = document.getElementById("net-profit");
          var marksData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
              label: "Người dùng",
              backgroundColor: 'rgba(88, 208, 222,0.8)',
              borderColor: 'rgba(88, 208, 222,0.8)',
              borderWidth: 0,
              fill: true,
              radius: 0,
              pointRadius: 0,
              pointBorderWidth: 0,
              pointBackgroundColor: 'rgba(88, 208, 222,0.8)',
              pointHoverRadius: 10,
              pointHitRadius: 5,
              // data: [54, 45, 60, 70, 54, 75, 60, 54, 12, 43, 25, 45]
              data: [<?php echo implode(',', $tableUserCreate) ?>],
            }]
          };

          var chartOptions = {
            scale: {
              ticks: {
                beginAtZero: true,
                min: 0,
                max: 20,
                stepSize: 20,
                display: false,
              },
              pointLabels: {
                fontSize: 16
              },
              angleLines: {
                color: '#e9ebf1'
              },
              gridLines: {
                color: "#e9ebf1"
              }
            },
            legend: false,
            legendCallback: function(chart) {
              var text = [];
              text.push('<div class="chartjs-legend"><ul>');
              for (var i = 0; i < chart.data.datasets.length; i++) {
                // console.log(chart.data.datasets[i]); // see what's inside the obj.
                text.push('<li>');
                text.push('<span style="background-color:' + chart.data.datasets[i].backgroundColor + '">' + '</span>');
                text.push(chart.data.datasets[i].label);
                text.push('</li>');
              }
              text.push('</ul></div>');
              return text.join("");
            },
          };

          var radarChart = new Chart(marksCanvas, {
            type: 'radar',
            data: marksData,
            options: chartOptions
          });
          document.getElementById('net-profit-legend').innerHTML = radarChart.generateLegend();
        }
        if ($('#total-revenue').length) {
          var ctx = document.getElementById('total-revenue').getContext("2d");
          var data = {
            labels: [
              "Day01",
              "Day02",
              "Day03",
              "Day04",
              "Day05",
              "Day06",
              "Day07",
              "Day08",
              "Day09",
              "Day10",
              "Day11",
              "Day12",
              "Day13",
              "Day14",
              "Day15",
              "Day16",
              "Day17",
              "Day18",
              "Day19",
              "Day20",
              "Day21",
              "Day22",
              "Day23",
              "Day24",
              "Day25",
              "Day26",
              "Day27",
              "Day28",
              "Day29",
              "Day30",
              "Day31",
              "Day32",
              "Day33",
              "Day34",
              "Day35",
              "Day36",
              "Day37",
              "Day38",
              "Day39",
              "Day40",
              "Day41",
              "Day42",
              "Day43",
              "Day44",
              "Day45",
              "Day46",
              "Day47",
              "Day48",
              "Day49",
              "Day50",
              "Day51",
              "Day52",
              "Day53",
              "Day54",
              "Day55",
              "Day56",
              "Day57",
              "Day58",
              "Day59",
              "Day60",
              "Day61",
              "Day62",
              "Day63",
              "Day64",
              "Day65",
              "Day66",
              "Day67",
              "Day68",
              "Day69",
              "Day70",
              "Day71",
              "Day72",
              "Day73",
              "Day74",
              "Day75",
              "Day76",
              "Day77",
              "Day78",
              "Day79",
              "Day80",
              "Day81",
              "Day82"
            ],
            datasets: [{
              label: 'Total Revenue',
              data: [56,
                55,
                59,
                59,
                59,
                57,
                56,
                57,
                54,
                56,
                58,
                57,
                59,
                58,
                59,
                57,
                55,
                56,
                54,
                52,
                49,
                48,
                50,
                50,
                46,
                45,
                49,
                50,
                52,
                53,
                52,
                55,
                54,
                53,
                56,
                55,
                56,
                55,
                54,
                55,
                57,
                58,
                56,
                55,
                56,
                57,
                58,
                59,
                58,
                57,
                55,
                53,
                52,
                55,
                57,
                55,
                54,
                52,
                55,
                57,
                56,
                57,
                58,
                59,
                58,
                59,
                57,
                56,
                55,
                57,
                58,
                59,
                60,
                62,
                60,
                59,
                58,
                57,
                56,
                57,
                56,
                58,
                59
              ],
              borderColor: '#9B86F1',
              backgroundColor: '#f2f2ff',
              borderWidth: 3,
              fill: 'origin'
            }]
          };
          var lineChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
              scales: {
                yAxes: [{
                  display: false
                }],
                xAxes: [{
                  display: false
                }]
              },
              legend: {
                display: false
              },
              elements: {
                point: {
                  radius: 0
                },
                line: {
                  tension: 0
                }
              },
              stepsize: 100
            }
          });
        }
        if ($('#total-transaction').length) {
          var ctx = document.getElementById('total-transaction').getContext('2d');
          var gradientStrokeFill_1 = ctx.createLinearGradient(0, 100, 200, 0);
          gradientStrokeFill_1.addColorStop(0, '#fa5539');
          gradientStrokeFill_1.addColorStop(1, '#fa3252');
          var areaData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
            datasets: [{
              label: 'Sessions',
              data: [320, 280, 300, 280, 300, 270, 350],
              backgroundColor: gradientStrokeFill_1,
              borderColor: '#fa394e',
              borderWidth: 0,
              pointBackgroundColor: "#fa394e",
              pointRadius: 7,
              pointBorderWidth: 3,
              pointBorderColor: '#fff',
              pointHoverRadius: 7,
              pointHoverBackgroundColor: "#fa394e",
              pointHoverBorderColor: "#fa394e",
              pointHoverBorderWidth: 2,
              pointHitRadius: 7,
            }]
          };
          var areaOptions = {
            responsive: true,
            animation: {
              animateScale: true,
              animateRotate: true
            },
            elements: {
              point: {
                radius: 0
              }
            },
            layout: {
              padding: {
                left: -10,
                right: 0,
                top: 0,
                bottom: -10
              }
            },
            legend: false,
            scales: {
              xAxes: [{
                gridLines: {
                  display: false
                },
                ticks: {
                  display: false
                }
              }],
              yAxes: [{
                gridLines: {
                  display: false
                },
                ticks: {
                  display: false
                }
              }]
            }
          }
          var revenueChart = new Chart(ctx, {
            type: 'line',
            data: areaData,
            options: areaOptions
          });
        }
      });
    })(jQuery);
  </script>
</body>

</html>