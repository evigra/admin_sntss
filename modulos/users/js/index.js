
	$(document).ready(function()
	{
		$.ajax({
			type: 'GET',
			url: '../modulos/familia/ajax/index.php',
			contentType:"application/json",
			data:"&sys_section_rh_calculo=section_rechazo&id=",
			success: function (res) 
			{
				$("div#REPORT").html(res);
			},
		});


    });
