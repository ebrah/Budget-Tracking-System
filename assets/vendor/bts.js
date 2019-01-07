$(function () {
      ///CUSTOMIZATION ///

$('#price').on('keyup', function() {
	let total = ($(this).val() * $('#quantity').val());
	 $('#tprice').val(total); 
	 $('#tprice1').val(total); 
});

$('#quantity').on('keyup', function() {
    let p =  $('#price').val();
    if(p != ''){
        let total = (p * $('#quantity').val());
        $('#tprice').val(total); 
        $('#tprice1').val(total); 
    }

});

$('.btn').on('click', function(){
    let ur = $(this).attr('deleteUrl');
    
    $('#deleteUrl').attr('href', ur);

    $('.btn').off('click');
});

$('.ignor').on('click', function(){

    let ign = $(this).attr('recommendUrl');
  
     $('#recommendBox>form').attr('action', ign);

     $('.ignor').off('click');
   
});

$('#switch-btn').on('click', function(){

    let sw = $(this).attr('data-link');
  
     $('#manager>form').attr('action', sw);
   
});

$('.budget-btn').on('click', function(){

  

    let url = $(this).attr('rUrl');
    
    $('#rejectBox>form').attr('action', url);

    $('.budget-btn').off('click');
   
});

$('.budget-reason').on('click', function(){

   

    let r = $(this).attr('recommendation');
    let u = $(this).attr('user');
    let q = $(this).attr('qualification');
    
    $('#rtext').text(r);
    $('#usr').text(u);
    $('#qualification').text(q);

    $('.budget-btn').off('click');
   
});



});