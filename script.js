jQuery(document).ready(function(){
	jQuery("#footer").append("<a class=nextProda href=#>Прода</a>");

	jQuery(".nextProda").live("click",function(){
		jQuery(".prodanew").each(function(i, obj){
			var p=jQuery(obj).position();
			jQuery(obj).removeClass("prodanew");
			window.scrollTo(0,p.top);
			return false;
		});
		return false;
	});
});
