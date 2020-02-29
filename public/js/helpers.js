function states(country_code,state_id,state_code =null){
	$.ajax({
		type:'GET',
		url:'/states/'+country_code,
		success:function(res){
			console.log('#'+state_id);

			if(res){
				$('#'+state_id).empty();
				$.each(res,function(i,v){
					$('#'+state_id).append('<option value="'+v.state_code+'" '+(state_code == v.state_code ? 'selected' : '')+'>'+v.state_name+'</option>');
				});
			}else{
				$('#'+state_id).empty();

			}

		}
	});
}
function cities(state_code,city_id,city_code=null){
	$.ajax({
		type:'GET',
		url:'/cities/'+state_code,
		success:function(res){
			console.log('#'+city_id);

			if(res){
				$('#'+city_id).empty();
				$.each(res,function(i,v){
					$('#'+city_id).append('<option value="'+v.city_code+'" '+(city_code == v.city_code ? 'selected' : '')+'>'+v.city_name+'</option>');
				});
			}else{
				$('#'+city_id).empty();

			}

		}
	});
}