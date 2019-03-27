<script type="text/javascript">
	
		//===============================================
	$('#academic_id').on('change',function(e){
		showCourseInfo();
	})
	
	//===============================================
	
	//===============================================
	$('#level_id').on('change',function(e){
		showCourseInfo();
	})
	//===============================================
	$('#shift_id').on('change',function(e){
		showCourseInfo();
	})
	//===============================================
	$('#time_id').on('change',function(e){
		showCourseInfo();
	})
	//===============================================
	$('#batch_id').on('change',function(e){
		showCourseInfo();
	})
	//===============================================
	$('#group_id').on('change',function(e){
		showCourseInfo();
	})
		//====================================
	$("#frm-view-course #program_id").on('change',function(e){
		var program_id =$(this).val();
		var level = $('#level_id')
		$(level).empty();
		$.get("{{route('showLevel')}}",{program_id:program_id},function(data){
		$.each(data,function(i,l){
			$(level).append($("<option/>",{
				value :l.level_id,
				text : l.level
			}))
		})
		showCourseInfo();
		})
	})
	//===============================================
//===========================================
$('#show-course-info').on('click',function(e){
	e.preventDefault();
		showCourseInfo();
	$('#choose-academic').modal('show');
})
//===================================================
	function showCourseInfo()

	{
		var data = $('#frm-view-course').serialize();
		$.get("{{route('showCourseInformation')}}", data,function(data){
				$('#add-class-info').empty().append(data);
				$('td#hidden').addClass('hidden');
				$('th#hidden').addClass('hidden');
				
		})
	
	}

	
</script>