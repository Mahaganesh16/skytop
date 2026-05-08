$(document).ready(function(){
	// Update Section Status
	$(".updateCategoryStatus").click(function(){
		var status = $(this).attr('status_value');
		var category_id = $(this).attr("category_id");
		$.ajax({
			type: 'post',
			url: '../Fundraisers/updateCategoryStatus',
			data: {status:status,category_id:category_id},
			success:function(resp){
				//alert(resp);
				if(resp == 0){
					$("#category-"+category_id).html('<span class="badge badge-danger">In Active</span>');
				}else if(resp == 1){
					$("#category-"+category_id).html('<span class="badge badge-success">Active</span>');
				}
			},
			error:function(){
				alert('Error');
			}
		});
	});

});