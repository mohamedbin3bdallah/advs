$(document).ready(function(){
	$(".featured").change(function() {
		var id = $(this).attr('id');
		if(this.checked) value = 1;
		else value = 0;
		$.ajax({
			type:'POST',
			//data:dataString,
			data: {	
			'id': id,
			'value': value,
			},
			url:'ajaxs/featured.php',
			success: function (response) {	document.location.href = 'admin.php?c=ads';	}
		});
	});
});

$(document).ready(function(){
	$(".active").change(function() {
		var id = $(this).attr('id');
		if(this.checked) value = 1;
		else value = 0;
		$.ajax({
			type:'POST',
			//data:dataString,
			data: {	
			'id': id,
			'value': value,
			},
			url:'ajaxs/active.php',
			success: function (response) {	document.location.href = 'admin.php?c=ads';	}
		});
	});
});

$(document).ready(function(){
	$(".del").click(function() {
		var id = $(this).attr('id');
		$("#del-"+id).modal('show');
		
	});
});

function mydelete(id,currenttable,img)
{
	$.ajax({
		type:'POST',
		//data:dataString,
		data: {	
		'id': id,
		'currenttable': currenttable,
		'img': img,
		},
		url:'ajaxs/deleteind1.php',
		success: function (response) {
			if(response == 1)
			{
				$("#tr-"+id).hide();
				$("#success").modal('show');
				setTimeout(function() { $("#success").modal('hide'); }, 3000);
			}
			else
			{
				$("#cantdelete").modal('show');
				setTimeout(function() { $("#cantdelete").modal('hide'); }, 3000);
			}
		}
	});
}