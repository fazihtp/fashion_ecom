<?= $this->load->view('includes/admin_sidebar.php','',TRUE);?>
<?= $this->load->view('includes/admin_header.php','',TRUE);?>
<div class="ec-content-wrapper">
				<div class="content">
					<!-- Top Statistics -->
				


					<div class="row">
						<div class="col-xl-12 col-md-12 p-b-15">
							<!-- User activity statistics -->
							<div class="card card-default" id="user-activity">
								<div class="no-gutters">
									<div>
									        <div class="row" style="margin:20px">
						     	 
                                            <div class="col-md-7">
        								  	<h2>Sales Report</h2>
        								    </div>
                                            
                                            <div class="col-md-2">
        								  	<input type="date" class="form-control" name="custom_sales_from_date" id="custom_sales_from_date">
        								    </div>
                                     	    <div class="col-lg-2">
											<input type="date" class="form-control" name="custom_sales_to_date" id="custom_sales_to_date">
											</div> 
											<div class="col-md-1" >
        							    	<button class="btn btn-info" type="button" onclick="sales_search()">Search</button>
                                            </div>
                                            </div>
									  	<div class="row" style="padding:10px">
					    <div class="col-xl-2 col-sm-6 p-b-15 lbl-card" style="width: 19.65%;">
							<div class="card card-mini dash-card card-3">
								<div class="card-body" style="background-color: #dcd7d2;border-radius: 13px;">
									<h2 class="mb-1" id="orders"></h2>
									<p>Order</p>
									<span class="mdi mdi-package-variant"></span>
								</div>
							</div>
						</div>
						
						
						<div class="col-xl-2 col-sm-6 p-b-15 lbl-card" style="width: 19.65%;">
							<div class="card card-mini dash-card card-1">
								<div class="card-body"  style="background-color: #dcd7d2;border-radius: 13px;">
									<h2 class="mb-1" id="product_count"></h2>
									<p>Products</p>
									<span class="mdi mdi-cart"></span>
								</div>
							</div>
						</div>
						<div class="col-xl-2 col-sm-6 p-b-15 lbl-card" style="width: 19.65%;">
							<div class="card card-mini dash-card card-2">
								<div class="card-body"  style="background-color: #dcd7d2;border-radius: 13px;">
									<h2 class="mb-1" id="shipping_amount"></h2>
									<p>Shipping</p>
									<span class="mdi mdi-truck-fast"></span>
								</div>
							</div>
						</div>
						
						<div class="col-xl-2 col-sm-6 p-b-15 lbl-card" style="width: 19.65%;">
							<div class="card card-mini dash-card card-4">
								<div class="card-body"  style="background-color: #dcd7d2;border-radius: 13px;">
									<h2 class="mb-1" id="sale_amount">$98,503</h2>
									<p>Sale</p>
									<span class="mdi mdi-currency-usd"></span>
								</div>
							</div>
						</div>
    						<div class="col-xl-2 col-sm-6 p-b-15 lbl-card" style="width: 19.65%;">
							<div class="card card-mini dash-card card-4">
								<div class="card-body"  style="background-color: #dcd7d2;border-radius: 13px;">
									<h2 class="mb-1" id="total_amount"></h2>
									<p>Total </p>
									<span class="mdi mdi-currency-usd"></span>
								</div>
							</div>
						</div>
					</div>
										<div class="card-body">
												<div id="main" ></div>
										</div>
										<div class="card-footer d-flex flex-wrap bg-white border-top">
											<a href="<?php echo base_url();?>Dashboard" class="text-uppercase py-3">In-Detail Overview</a>
										
										</div>
										<div class="card-body pt-0 pb-15px">
									<table class="table ">
										<tbody>
											<tr>
											
												<td style="width: 808px;"></td>
												<td class="totalShipping"></td>
												<td class="totalOrder"></td>
												<td class="totalAm"></td>
											
											</tr>
											</tbody>
									</table>
								</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-12 col-md-12 p-b-15">
							<div class="card card-default">
								<div class="card-header flex-column align-items-start">
								
								</div>
								 <div class="row" style="margin:20px">
						     	 
                                            <div class="col-md-7">
        								  	<h2>Sales Report</h2>
        								    </div>
        								    <div class="col-md-2">
        								  	<input type="date" class="form-control" name="custom_from_date" id="custom_from_date" onchange="get_custom_from_date();">
        								    </div>
                                     	    <div class="col-lg-2">
											<input type="date" class="form-control" name="custom_to_date" id="custom_to_date" onchange="get_custom_to_date();">
											</div> 
											<div class="col-md-1" >
        							    	<button class="btn btn-info" type="button" onclick="search()">Search</button>
                                            </div>
                                            
                                            
                                            
                                            </div>
								<div class="card-body">
								    <div class="tab-content" id="userActivityContent"> 
												<div class="tab-pane fade show active" id="user" role="tabpanel">
													<canvas id="activity" class="chartjs"></canvas>
												</div>
											</div>
											
							

								</div>
								<div class="card-footer d-flex flex-wrap bg-white border-top">
									<a href="#" class="text-uppercase py-3">In-Detail Overview</a>
								</div>
							</div>
						</div>
					</div>
					
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->
<?= $this->load->view('includes/admin_footer.php','',TRUE);?>
<?php
$labels = [];
$order_sums = [];
?>
<script src="<?=base_url();?>admin_assets/js/echarts/echarts.min.js"></script>
<script>
$(document).ready(function() {
    var fdate=$('#custom_from_date').val();
    var tdate=$('#custom_to_date').val();
    getGraph(fdate,tdate);
    
    var fsdate=$('#custom_sales_from_date').val();
    var tsdate=$('#custom_sales_to_date').val();
    getSalesGraph(fsdate,tsdate);
});
function getGraph(fdate,tdate){
$.ajax({
    url: '<?= base_url() ?>Dashboard/getGraphPerDateReport',
    data: {
        fdate: fdate,
        tdate: tdate,
    },
    type: 'GET',
    dataType: 'json',
    success: function (response) {
        
        var totalAmount = parseFloat(response['total_sales'].totalAmount);
        var shippingAmount =  parseFloat(response['total_sales'].shippingAmount);
        var totalSum = totalAmount + shippingAmount;
        var productCount =  parseFloat(response['total_products_sold'].counts);
        var totalOrders =  parseFloat(response['total_orders'].orders);
        $(".totalOrder").html('<font size="3px;" color="#FF0000"><strong>Order Amount:  '+totalAmount+'</strong></font>');
        $(".totalShipping").html('<font size="3px;" color="#FF0000"><strong> Shipping: '+shippingAmount+'</strong></font>');
        $(".totalAm").html('<font size="3px;" color="#FF0000"><strong> Total :'+totalSum+'</strong></font>');
          $("#product_count").html(productCount);
          $("#shipping_amount").html(shippingAmount);
          $("#sale_amount").html(totalAmount);
          $("#orders").html(totalOrders);
          $("#total_amount").html('$'+totalSum+'');
        var label1 = [];
        var datas1 = [];
        var datas2 = [];
        var activity = document.getElementById("activity");
        var sum = <?php echo json_encode($order_sums); ?>;
        if (activity !== null) {
    
    
    
response.sales.forEach(function (data) {
    var date = new Date(data.created_at);
    var month = date.toLocaleDateString('en-US', {
        month: 'short',
    });
    var day = date.getDate();
    var year = date.getFullYear();
    var formattedDate = day + '-' + month + '-' + year;
    label1.push(formattedDate);
    datas2.push(data.shippingAmount);
    datas1.push(data.totalAmount);
});
 var activityData = [
      {
        first: datas1,
        second:datas2
      }
    ];
    var config = {
      type: "line",
      data: {
       labels:label1, 
        datasets: [
          {
            label: "Order Amount",
            backgroundColor: "transparent",
            borderColor: "rgba(82, 136, 255, .8)",
            data: datas1,
            lineTension: 0,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255,255,255,1)",
            pointHoverBackgroundColor: "rgba(255,255,255,1)",
            pointBorderWidth: 2,
            pointHoverRadius: 7,
            pointHoverBorderWidth: 1,
          },
          {
            label: "Shipping Charge",
            backgroundColor: "transparent",
            borderColor: "rgba(255, 199, 15, .8)",
            data: activityData[0].second,
            lineTension: 0,
            borderDash: [10, 5],
            borderWidth: 1,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255,255,255,1)",
            pointHoverBackgroundColor: "rgba(255,255,255,1)",
            pointBorderWidth: 2,
            pointHoverRadius: 7,
            pointHoverBorderWidth: 1
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        scales: {
          xAxes: [
            {
              gridLines: {
                display: false,
              },
              ticks: {
                fontColor: "#8a909d",
                 beginAtZero: true, 
              },
            }
          ],
          yAxes: [
            {
                
              gridLines: {
                fontColor: "#8a909d",
                fontFamily: "Roboto, sans-serif",
                display: true,
                color: "#eee",
                zeroLineColor: "#eee"
              },
              ticks: {
                stepSize: 0,
                fontColor: "#8a909d",
                fontFamily: "Roboto, sans-serif"
              }
            }
          ]
        },
        tooltips: {
          mode: "index",
          intersect: false,
          titleFontColor: "#888",
          bodyFontColor: "#555",
          titleFontSize: 12,
          bodyFontSize: 15,
          backgroundColor: "rgba(256,256,256,0.95)",
          displayColors: true,
          xPadding: 10,
          yPadding: 7,
          borderColor: "rgba(220, 220, 220, 0.9)",
          borderWidth: 2,
          caretSize: 6,
          caretPadding: 5
        }
      }
    };

    var ctx = document.getElementById("activity").getContext("2d");
    var myLine = new Chart(ctx, config);
}
    }, // Add this closing brace
    error: function (xhr, textStatus, errorThrown) {
        console.error('Error fetching data: ' + errorThrown);
    },
});
}


document.addEventListener('DOMContentLoaded', function () {
    var customFromDateInput = document.getElementById('custom_from_date');
    var customToDateInput = document.getElementById('custom_to_date');

    var currentDate = new Date();
    currentDate.setDate(currentDate.getDate() - 7); // Subtract 7 days for one week ago

    var oneWeekAgo = currentDate.toISOString().split('T')[0];
    customFromDateInput.value = oneWeekAgo;
    customToDateInput.value = new Date().toISOString().split('T')[0];
});
document.addEventListener('DOMContentLoaded', function () {
    var customFromDateInput = document.getElementById('custom_sales_from_date');
    var customToDateInput = document.getElementById('custom_sales_to_date');

    var currentDate = new Date();
    currentDate.setDate(currentDate.getDate() - 7); // Subtract 7 days for one week ago

    var oneWeekAgo = currentDate.toISOString().split('T')[0];
    customFromDateInput.value = oneWeekAgo;
    customToDateInput.value = new Date().toISOString().split('T')[0];
});
function search(){
        var fdate=$('#custom_from_date').val();
        var tdate=$('#custom_to_date').val();
    
        getGraph(fdate,tdate);
}
function sales_search(){
        var fsdate=$('#custom_sales_from_date').val();
        var tsdate=$('#custom_sales_to_date').val();
    
        getSalesGraph(fsdate,tsdate);
}
</script>
<script>
function getSalesGraph(fdate,tdate){
    
$.ajax({
    url: '<?= base_url() ?>Dashboard/getGraphPerDateReport',
    data: {
        fdate: fdate,
        tdate: tdate,
    },
    type: 'GET',
    dataType: 'json',
    success: function (response) {
        
        var totalAmount = parseFloat(response['total_sales'].totalAmount);
        var shippingAmount =  parseFloat(response['total_sales'].shippingAmount);
        var totalSum = totalAmount + shippingAmount;
        var productCount =  parseFloat(response['total_products_sold'].counts);
        var totalOrders =  parseFloat(response['total_orders'].orders);
        $(".totalOrder").html('<font size="3px;" color="#FF0000"><strong>Order Amount:  '+totalAmount+'</strong></font>');
        $(".totalShipping").html('<font size="3px;" color="#FF0000"><strong> Shipping: '+shippingAmount+'</strong></font>');
        $(".totalAm").html('<font size="3px;" color="#FF0000"><strong> Total :'+totalSum+'</strong></font>');
          $("#product_count").html(productCount);
          $("#shipping_amount").html(shippingAmount);
          $("#sale_amount").html(totalAmount);
          $("#orders").html(totalOrders);
          $("#total_amount").html('$'+totalSum+'');
        
        var label1 = [];
        var datas1 = [];
        var datas2 = [];
       var chartDom = document.getElementById('main');
        var sum = <?php echo json_encode($order_sums); ?>;
        if (chartDom !== null) {
    
    
    
response.sales.forEach(function (data) {
    var date = new Date(data.created_at);
    var month = date.toLocaleDateString('en-US', {
        month: 'short',
    });
    var day = date.getDate();
    var year = date.getFullYear();
    var formattedDate = day + '-' + month + '-' + year;
    label1.push(formattedDate);
    datas2.push(data.shippingAmount);
    datas1.push(data.totalAmount);
});

var app = {};


var myChart = echarts.init(chartDom);
var option;
myChart.resize({
  width: 991,
  height: 450
});
const posList = [
  'left',
  'right',
  'top',
  'bottom',
  'inside',
  'insideTop',
  'insideLeft',
  'insideRight',
  'insideBottom',
  'insideTopLeft',
  'insideTopRight',
  'insideBottomLeft',
  'insideBottomRight'
];
app.configParameters = {
  rotate: {
    min: -90,
    max: 90
  },
  align: {
    options: {
      left: 'left',
      center: 'center',
      right: 'right'
    }
  },
  verticalAlign: {
    options: {
      top: 'top',
      middle: 'middle',
      bottom: 'bottom'
    }
  },
  position: {
    options: posList.reduce(function (map, pos) {
      map[pos] = pos;
      return map;
    }, {})
  },
  distance: {
    min: 0,
    max: 100
  }
};
app.config = {
  rotate: 90,
  align: 'left',
  verticalAlign: 'middle',
  position: 'insideBottom',
  distance: 15,
  onChange: function () {
    const labelOption = {
      rotate: app.config.rotate,
      align: app.config.align,
      verticalAlign: app.config.verticalAlign,
      position: app.config.position,
      distance: app.config.distance
    };
    myChart.setOption({
      series: [
        {
          label: labelOption
        },
        {
          label: labelOption
        },
        
      ]
    });
  }
};
const labelOption = {
  show: true,
  position: app.config.position,
  distance: app.config.distance,
  align: app.config.align,
  verticalAlign: app.config.verticalAlign,
  rotate: app.config.rotate,
  formatter: '{c}  {name|{a}}',
  fontSize: 16,
  rich: {
    name: {}
  }
};
option = {
  tooltip: {
    trigger: 'axis',
    axisPointer: {
      type: 'shadow'
    }
  },
  legend: {
    data: ['Order', 'Shipping']
  },
  toolbox: {
    show: true,
    orient: 'vertical',
    left: 'right',
    top: 'center',
    feature: {
      mark: { show: true },
      dataView: { show: true, readOnly: false },
      magicType: { show: true, type: ['line', 'bar', 'stack'] },
      restore: { show: true },
      saveAsImage: { show: true }
    }
  },
  xAxis: [
    {
      type: 'category',
      axisTick: { show: false },
      data: label1
    }
  ],
  yAxis: [
    {
      type: 'value'
    }
  ],
  series: [
    {
      name: 'Order ',
      type: 'bar',
      barGap: 0,
      label: labelOption,
      emphasis: {
        focus: 'series'
      },
    //   data: [320, 332, 301, 334, 390]
      data: datas1
    },
    {
      name: 'Shipping ',
      type: 'bar',
      label: labelOption,
      emphasis: {
        focus: 'series'
      },
    //   data: [150, 232, 201, 154, 190]
      data: datas2
    }
  ]
};

option && myChart.setOption(option);


    var ctx = document.getElementById("main").getContext("2d");
    var myLine = new Chart(ctx, config);
}
    }, // Add this closing brace
    error: function (xhr, textStatus, errorThrown) {
        console.error('Error fetching data: ' + errorThrown);
    },
});

}
</script>