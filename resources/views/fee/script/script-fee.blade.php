<script type="text/javascript">

var n = $('#disabled').val();



 $('.create-fee').on('click', function(e){
 	$('#createFeePopup').modal('show')
 });
	
	//==============create fee====================

	

	//---------------------enable form element----------------

	function enableFormElement(frmName)
	{
		$.each($(frmName).find('input,select'),function(i,element){

			$(element).attr('disabled',false);
		})
	}

	//------------------------------------------------
	$('.btn-paid').on('click',function(e){
		e.preventDefault();
		s_fee_id = $(this).data('id-paid');
		balance = $(this).val();
	$.get("{{route('pay')}}",{s_fee_id:s_fee_id},function(data){
    $('#Paid').attr('id','Pay');
    $('#s_fee_id').val(data.s_fee_id);
	$('#program_id').val(data.program_id);
	$('#level_id').val(data.level_id);
    $('#LevelID').val(data.level_id);
    $('#Fee').val(data.school_fee);
    $('#FeeID').val(data.fee_id);
    $('#Amount').val(data.student_amount);
    $('#Discount').val(data.discount);
    $('#Pay').val(balance);
    $('#Pay').focus();
    $('#Pay').select();
    $('#b').val(balance); 
    addItem(data);
    showStudentLevel(data);
	
	})

	})
	//-----------------------------------------------
function addItem(data)
{
	$('#program_id').empty().append($("<option/>",{
		value:data.program_id,
		text:data.program_id
	}))

	$('#level_id').empty().append($("<option/>",{
		value:data.level_id,
		text:data.level_id
	}))
}

function showStudentLevel(data)
{
	$.get("{{route('showLevelStudent')}}",{level_id:data.level_id,student_id:data.student_id},function(data){
		$('.academicDetail').text(data.detail);

	})
}

	//-----------------------------------------------

	function disabled_input()
	{
		$.each($('body').find('.d'),function(i,item){
			$(item).attr('disabled',true).css({'background':'#f5f5f5',
				'border':'1px solid #ccc'

		                   });
			$(item).attr('readonly',false);
		}); 
	}
	//---------------------

	$(document).ready(function(){
		if(n==0)
		{
			disabled_input();
		}
	})


</script>