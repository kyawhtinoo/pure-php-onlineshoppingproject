$(document).ready(function(){

	$('.searchBtn').on('click',function(){
		var startDate = $('#startDate').val();
		var endDate = $('#endDate').val();

		// ajax
		$.ajax({
			type:'POST',
			url:'order_search.php',
			data:{
				start:startDate,
				end:endDate
			},
			success:function(response){
				
				var searchResults = JSON.parse(response);
				var ordersearchresultDiv = '';

				ordersearchresultDiv += `<h3 class="tile-title"> 
				${startDate} - ${endDate} Order List </h3>
						<div class="table-responsive">
                            <table class="table table-hover table-bordered 
                            searchdisplay">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                      <th> Date </th>
                                      <th> Voucherno </th>
                                      <th> Total </th>
                                      <th> Status </th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>`;
                var a=1;
				$.each(searchResults,function(i,v){
					if (v) {
						var id = v.id;
						var voucherno = v.voucherno;
						var total = v.total;
						var status = v.status;
						var date = v.orderdate;

						if(status == "Order"){
							var actionBtn = `<a href="order_detail.php" class="btn btn-outline-info"> 
                                                <i class="icofont-info"></i>
                                            </a>
                                            <a href="order_confirm.php?id=${id}&status=0" class="btn btn-outline-success"> 
                                                <i class="icofont-ui-check"></i>
                                            </a>
                                            <a href="order_delete.php?id=${id}&status=1" class="btn btn-outline-danger"> 
                                                <i class="icofont-close"></i>
                                            </a>`;
						}else{
							var actionBtn =`<a href="" class="btn btn-outline-info"> 
                                                <i class="icofont-info"></i>
                                            </a>`;
						}


						$('#todayorderlistDiv div.tile-body').hide();

						ordersearchresultDiv +=`<tr>
													<td> ${a++} </td>
													<td> ${date}</td>
													<td> ${voucherno} </td>
													<td> ${total} </td>
													<td> ${status} </td>
													<td> ${actionBtn} </td>
												</tr>`;
					}
				});

				ordersearchresultDiv += `</tbody>
										</thead>
										</table>
										</div>`;						

				$('#todayorderlistDiv').html(ordersearchresultDiv);
			}
		})

	});


 $.ajax({
 	type:"POST",
 	url: "getEarning.php",
 	success:function(response){
   console.log(typeof(response));
    var earningResult =JSON.parse(response);


   var data = {
      	labels: ["January", "February", "March", "April", "May","June","July",
      	"August","September","October","November","December"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [earningResult[0], earningResult[1], earningResult[2], earningResult[3], 
      			earningResult[4],earningResult[5],earningResult[6],earningResult[7],earningResult[8],
      			earningResult[9],earningResult[10],earningResult[11]]
      		},
      		
      	]
      };

  var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);






 	}
 })

   var data = {
      	labels: ["January", "February", "March", "April", "May","June","July",
      	"August","September","October","November","December"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		
      	]
      };
     
});