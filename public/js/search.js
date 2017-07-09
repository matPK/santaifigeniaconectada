/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var fitSpansInBoxes;

$(document).ready(function(){            
    (fitSpansInBoxes = function(boxClass, spanClass){
        $(boxClass).each(function(){
            var box = $(this);
            var span = box.children(spanClass);
            span.css("font-size", "20px");
            while(span.width() > box.width()){
                var fontSize = parseInt(span.css("font-size"));
                fontSize = (fontSize - 1) + "px";
                span.css("font-size", fontSize);
            }
        });            
    })(boxClass, spanClass);        
});
