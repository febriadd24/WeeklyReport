// (function () {
//     'use strict';
$(document).ready(function(){
$("#Provinsi").change(event=>{
    $.get("kab/"+event.target.value+"", function(data,sta){
        $("#Kota").empty();
        data.forEach(element=> {
            $("#Kota").append("<option value="+element.NAMA_KAB+"> "+element.NAMA_KAB+" </option>");
        });
    });
});

/*
$("#town").change(event=>{
    $.get("kabs/"+event.target.value+"", function(data,sta){
        $("#setup_kab").empty();
        data.forEach(element=> {
            $("#setup_kab").append("<option value="+element.id+"> "+element.NAMA_KAB+" </option>");
        });
    });
});
*/
})
