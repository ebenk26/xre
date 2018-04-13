$(".pass-strength-student").keyup(function()
{
    checkPassStrength($(this).val(), "student");
});

$(".pass-strength-employer").keyup(function()
{
    checkPassStrength($(this).val(), "employer");
});

$(".pass-strength-jobseeker").keyup(function()
{
    checkPassStrength($(this).val(), "jobseeker");
});

$(".pass-strength-employer-setting").keyup(function()
{
    checkPassStrength($(this).val(), "employer-setting");
});

$(".pass-strength-student-setting").keyup(function()
{
    checkPassStrength($(this).val(), "student-setting");
});

function scorePassword(pass)
{
    var score = 0;

    if (!pass)
        return score;

    // award every unique letter until 5 repetitions
    var letters = new Object();

    for (var i=0; i<pass.length; i++)
    {
        letters[pass[i]] = (letters[pass[i]] || 0) + 1;
        score += 5.0 / letters[pass[i]];
    }

    // bonus points for mixing it up
    var variations = 
    {
        digits: /\d/.test(pass),
        lower: /[a-z]/.test(pass),
        upper: /[A-Z]/.test(pass),
        nonWords: /\W/.test(pass),
    }

    variationCount = 0;

    for (var check in variations)
    {
        variationCount += (variations[check] == true) ? 1 : 0;
    }

    score += (variationCount - 1) * 10;

    if(score>100) score = 100;

    return parseInt(score);
}

function checkPassStrength(pass, category)
{
    if(pass == ""){
        $(".password-strength-bar-student").hide();
        $(".password-strength-bar-employer").hide();
        $(".password-strength-bar-jobseeker").hide();
        $(".password-strength-bar-employer-setting").hide();
        $(".password-strength-bar-student-setting").hide();
    }else{
        $(".password-strength-bar-"+category).show();
    }

    var score = scorePassword(pass);

    $(".progress-bar").attr('aria-valuenow',score);
    $(".progress-bar").attr('style','width: '+score+'%');
    

    if (score > 80)
    {
        $(".progress-bar").attr('style','width: 100%');
        $(".progress-bar").attr('data-label','Strong');
        $(".progress-bar").attr('class','progress-bar progress-bar-success');
        $(".progress-bar span").text('Strong');
    }

    else if (score > 60)
    {
        $(".progress-bar").attr('data-label','Good');
        $(".progress-bar").attr('class','progress-bar progress-bar-info');
        $(".progress-bar span").text('Good');
    }

    else if (score >= 30)
    {
        $(".progress-bar").attr('data-label','Weak');
        $(".progress-bar").attr('class','progress-bar progress-bar-warning');
        $(".progress-bar span").text('Weak');
    }

    else if (score < 30)
    {
        $(".progress-bar").attr('data-label','Poor');
        $(".progress-bar").attr('class','progress-bar progress-bar-danger');
        $(".progress-bar span").text('Poor');
    }
}