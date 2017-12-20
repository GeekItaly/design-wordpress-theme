var $ = jQuery;

//var xxx = $('#xxx');
// ...

var leftmenuScrollStuffIsBinded = false;



function bindLeftmenuScrollStuff(){
	
	$(window).bind('scroll.namespace_leftmenu', function(){
		
		// ...
		
	});
	
	// ...
	
}

function unbindLeftmenuScrollStuff(){
	
	$(window).unbind('scroll.namespace_leftmenu');
	
	// ...
	
}



$(window).bind('resize.namespace_leftmenu', function(){
	
	if($(window).width() < 784){
		if(leftmenuScrollStuffIsBinded){
			console.log('leftmenuScrollStuffIsBinded: false');
			leftmenuScrollStuffIsBinded = false;
			unbindLeftmenuScrollStuff();
		}
	}else{
		if(!leftmenuScrollStuffIsBinded){
			console.log('leftmenuScrollStuffIsBinded: true');
			leftmenuScrollStuffIsBinded = true;
			bindLeftmenuScrollStuff();
		}
	}
	
});

