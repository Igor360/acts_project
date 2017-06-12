var selectTeacher = false;

$(".teacher").click(function(){
    $(".about_teacher").attr("style","display:none;");
    $(".teacher").attr("style","filter:blur(20px);");
    $(this).attr("style","filter:blur(0px);");
    var idTeacher = $(this).attr("id");
    var classAbout = "."+idTeacher; 
    $(classAbout).attr("style","display:block;");
    if (selectTeacher)
    {
        $(".about_teacher").attr("style","display:none;");
        $(".teacher").attr("style","filter:blur(0px);");
        selectTeacher = false;
    }
    else
    {
        selectTeacher = true;
    }
});
$(".footer,.navbar").click(function(){
    $(".about_teacher").attr("style","display:none;");
    $(".teacher").attr("style","filter:blur(0px);");
    selectTeacher = false;
});
$('body').dblclick(function(){
    $(".about_teacher").attr("style","display:none;");
    $(".teacher").attr("style","filter:blur(0px);");
    selectTeacher = false;
});

    
