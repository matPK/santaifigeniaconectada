/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var formResponsive;

$(document).ready(function(){            
    
    (formResponsive = function(){
        if($(window).width() < 992){
            $("#form-group-id").addClass("form-group-lg");
            $("#search-button").addClass("btn-lg");
        }else{
            $("#form-group-id").removeClass("form-group-lg");
            $("#search-button").removeClass("btn-lg");
        }
    })();
    
    $(window).resize(formResponsive);    
});