var height =$('#header').height();

$(window).scroll(function(){
    if($(this).scrollTop()> height){
        $('.category_bar').addClass('fixed');
    }else{
        $('.category_bar').removeClass('fided');
    }
});


var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}


// Contact_us messages

function send_message(){
  var name=jQuery("#name").val();
  var email=jQuery("#email").val();
  var mobile=jQuery("#mobile").val();
  var message=jQuery("#message").val();
  var is_error='';

  if(name==""){
      alert('Please enter name');
  }else if(email==""){
      alert('Please enter email');
  }else if(mobile==""){
      alert('Please enter mobile');
  }else if(message==""){
      alert('Please enter message');
  }else{
      jQuery.ajax({
          url:'send_message.php',
          type:'post',
          data:'name='+name+'&email='+email+'&mobile='+mobile+'&message='+message,
          success:function(result){
              alert(result);
          }

      })
  }

}
function manage_cart(pid,type){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
			if(type=='update' || type=='remove'){
				window.location.href=windows.location.href;
			}
			if(result=='not_avaliable'){
				alert('Qty not avaliable');	
			}else{
				jQuery('.htc__qua').html(result);
			}
		}	
	});	
}
