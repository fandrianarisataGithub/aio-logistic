<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* security/login.html.twig */
class __TwigTemplate_d7b01e4c35c1572c47aa06c9040b5890afdaa1f9783a822d2a27ead54c1ca526 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html>
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<title>
\t\t\tLogin
\t\t</title>
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=Edge\">
\t\t<meta name=\"description\" content=\"\">
\t\t<meta name=\"keywords\" content=\"\">
\t\t<meta name=\"author\" content=\"\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
\t\t<link href=\"https://fonts.googleapis.com/css?family=Lato:200,300,400,500,600,700,800,900,1000&display=swap\" rel=\"stylesheet\">

\t\t<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css\">
\t\t<link href=\"https://fonts.googleapis.com/css?family=Droid+Sans\" rel=\"stylesheet\">
\t\t<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\">
\t\t<link rel=\"stylesheet\" href=\"https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css\">
\t\t<link rel=\"stylesheet\" href=\"https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap.min.css\">
\t\t<link rel=\"stylesheet\" href=\"https://cdn.datatables.net/responsive/2.2.4/css/responsive.bootstrap.min.css\">
\t\t<link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/login.css"), "html", null, true);
        echo "\">
\t</head>

\t<body>
\t<section class=\"wrapper\" id=\"home_dashboard\">
\t\t\t <div class=\"container-fluid\" style=\"background-image:url(";
        // line 26
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/fond_accueil_prelogin.jpg"), "html", null, true);
        echo ")\">
\t\t\t \t<div class=\"header\">
\t\t\t\t\t<h3>DASHBOARD</h3>
\t\t\t\t</div>
\t\t\t\t<div class=\"ligne\"></div>
\t\t\t \t<div class=\"button_liste\">
\t\t\t\t\t<div class=\"background-button\" id=\"div_shadow_tropical_wood\">
\t\t\t\t\t\t<a href=\"#\" class=\"link_logo\">
\t\t\t\t\t\t\t<div class=\"img_content\" data-log=\"authentification_tw\">
\t\t\t\t\t\t\t\t<img src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/bouton_tropical_wood.png"), "html", null, true);
        echo "\" class=\"img-responsive\" alt=\"\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"background-button\" id=\"div_shadow_sounds\">
\t\t\t\t\t\t<a href=\"#\" class=\"link_logo\">
\t\t\t\t\t\t\t<div class=\"img_content\" data-log=\"authentification_s\">
\t\t\t\t\t\t\t\t<img src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/bouton_sounds.png"), "html", null, true);
        echo "\" class=\"img-responsive\" alt=\"\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t </div>
\t\t</section>

\t\t<section class=\"wrapper\" id=\"authentification_s\" style=\"display:none\">
\t\t\t<div class=\"container-fluid\">
\t\t\t\t<div class=\"col-lg-6 col-md-6 col-sm-6\" style=\"background-image: url(";
        // line 52
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/login.png"), "html", null, true);
        echo ");\">

\t\t\t\t\t<div class=\"fond_gauche\"></div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-lg-6 col-md-6 col-sm-6\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"grand_titre_si\">
\t\t\t\t\t\t\t<div class=\"bg_titre\">
\t\t\t\t\t\t\t\t<span>SOUND'S</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"sm_titre\">
\t\t\t\t\t\t\t\t<span>HOTELS GROUP</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"div_parag\">
\t\t\t\t\t\t\t<p>Veuillez vous connecter ici.</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"form\">
\t\t\t\t\t\t\t<form method=\"post\" id=\"form_sounds\">
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<span class=\"span__label\"></span>
\t\t\t\t\t\t\t\t\t<input type=\"email\" name=\"email\" data-placeholder=\"Adresse mail\" id=\"mail_s\" class=\"form-control\" value=\"";
        // line 77
        echo twig_escape_filter($this->env, ($context["last_username"] ?? null), "html", null, true);
        echo "\" placeholder=\"Adresse mail\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<span class=\"span__label\"></span><input type=\"password\" id=\"password_s\" class=\"form-control\" name=\"password\" data-placeholder=\"Password\" placeholder=\"Password\">
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"sounds\" name=\"groupe\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group div__check\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"remember_me_s\" name=\"_remember_me\" value=\"remember\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<label for=\"remember_me_s\">Se souvenir de moi</label>
\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 87
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("forgot_password");
        echo "\" class=\"link_forgot_pass\">
\t\t\t\t\t\t\t\t\t\t<span>Mot de passe oublié</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        // line 91
        if (($context["error"] ?? null)) {
            // line 92
            echo "\t\t\t\t\t\t\t\t\t<div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "messageKey", [], "any", false, false, false, 92), twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "messageData", [], "any", false, false, false, 92), "security"), "html", null, true);
            echo "</div>
\t\t\t\t\t\t\t\t";
        }
        // line 94
        echo "\t\t\t\t\t\t\t\t<input
\t\t\t\t\t\t\t\ttype=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t";
        // line 106
        echo "\t\t\t\t\t\t\t\t<div id=\"info_log_sounds\">
\t\t\t\t\t\t\t\t\t<p>lorem dfhlk qsdhgkl </p>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group last_iput\">
\t\t\t\t\t\t\t\t\t<button type=\"submit\" id=\"btn_login_s\" class=\"btn_login btn btn-md\" name=\"\"><span>Se connecter</span></button>
\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 111
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        echo "\" class=\"btn btn-md btn_si\" id=\"retour_sounds\"><span class=\"fa fa-angle-double-left\"></span>Retour</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</section>

\t\t";
        // line 121
        echo "\t\t<section class=\"wrapper\" id=\"authentification_tw\" style=\"display:none\">
\t\t\t<div class=\"container-fluid\">
\t\t\t\t<div class=\"col-lg-6 col-md-6 col-sm-6\" style=\"background-image: url(";
        // line 123
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/fond_login_tropical_wood_leger.jpg"), "html", null, true);
        echo ");\">

\t\t\t\t\t<div class=\"fond_gauche\"></div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-lg-6 col-md-6 col-sm-6\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"logo_login\">
\t\t\t\t\t\t\t<img src=\"";
        // line 130
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/tropical.png"), "html", null, true);
        echo "\" alt=\"logo\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"div_parag\">
\t\t\t\t\t\t\t<p>Veuillez vous connecter ici.</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"form\">
\t\t\t\t\t\t\t<form method=\"post\" id=\"form_tw\">
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<span class=\"span__label span__label_tw\"></span>
\t\t\t\t\t\t\t\t\t<input type=\"email\" name=\"email\" data-placeholder=\"Adresse mail\" id=\"mail_tw\" class=\"form-control\"  value=\"";
        // line 143
        echo twig_escape_filter($this->env, ($context["last_username"] ?? null), "html", null, true);
        echo "\" placeholder=\"Adresse mail\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<span class=\"span__label span__label_tw\"></span>
\t\t\t\t\t\t\t\t\t<input type=\"password\" class=\"form-control\" id=\"password_tw\" name=\"password\" data-placeholder=\"Password\" placeholder=\"Password\">
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"tropical_wood\" name=\"groupe\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group div__check\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"remember_me_tw\" id=\"remember_me_tw\" name=\"_remember_me\" value=\"remember\">
\t\t\t\t\t\t\t\t\t<label for=\"remember_me_tw\">Se souvenir de moi</label>
\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 153
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("forgot_password");
        echo "\" class=\"link_forgot_pass\">
\t\t\t\t\t\t\t\t\t\t<span>Mot de passe oublié</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        // line 157
        if (($context["error"] ?? null)) {
            // line 158
            echo "\t\t\t\t\t\t\t\t\t<div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "messageKey", [], "any", false, false, false, 158), twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "messageData", [], "any", false, false, false, 158), "security"), "html", null, true);
            echo "</div>
\t\t\t\t\t\t\t\t";
        }
        // line 160
        echo "\t\t\t\t\t\t\t\t<input
\t\t\t\t\t\t\t\ttype=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t";
        // line 172
        echo "\t\t\t\t\t\t\t\t<div id=\"info_log_tw\">
\t\t\t\t\t\t\t\t\t<p>lorem dfhlk qsdhgkl </p>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group last_iput\">
\t\t\t\t\t\t\t\t\t<button type=\"submit\" id=\"btn_login_tw\" class=\"btn_login btn btn-md login_tropical_wood\" name=\"\"><span>Se connecter</span></button>
\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 177
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        echo "\" class=\"btn btn-md btn_si\" id=\"retour_tw\"><span class=\"fa fa-angle-double-left\"></span>Retour</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</section>
\t\t<script src=\"";
        // line 185
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("jquery/jquery.min.js"), "html", null, true);
        echo "\"></script>

\t\t\t<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>
\t\t\t<script src=\"https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js\"></script>
\t\t\t<script>
\t\t\t\t/* pour l'annimation de loader */


\t\t\t\$(document).ready(function () {
\t\t\t\tsetTimeout(function () {
\t\t\t\t\$('body').addClass('loaded');
\t\t\t\t}, 2000);
\t\t\t})

\t\t\t/* fin loader */
\t\t\t</script>
\t\t\t<script src=\"https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js\"></script>
\t\t\t<script src=\"https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js\"></script>
\t\t\t<script src=\"https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js\"></script>
\t\t\t<script src=\"https://cdn.datatables.net/responsive/2.2.4/js/dataTables.responsive.min.js\"></script>
\t\t\t<script src=\"https://cdn.datatables.net/responsive/2.2.4/js/responsive.bootstrap.min.js\"></script>
\t\t\t<script src=\"https://cdn.jsdelivr.net/npm/vue@2.6.0\"></script>
\t\t\t<script src='";
        // line 207
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/currency.js"), "html", null, true);
        echo "'></script>
\t\t\t<script src='";
        // line 208
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashboard.js"), "html", null, true);
        echo "'></script>
\t\t\t<script>

\t\t\t\t\t/*animation des input  */

\t\t\t\t\t\$(document).ready(function () {
\t\t\t\t\t\t\$(\"input[placeholder]\").on({
\t\t\t\t\t\t\tfocus: function () {
\t\t\t\t\t\t\t\$(this).parent().children(\".span__label\").text(\$(this).attr('placeholder'));
\t\t\t\t\t\t\t\$(this).attr('placeholder', ' ');
\t\t\t\t\t\t\t\$(this).css(\"border-color\", \"#d29e00\");
\t\t\t\t\t\t},
\t\t\t\t\t\tblur: function () {
\t\t\t\t\t\t\tvar t = \$(this).attr('data-placeholder');
\t\t\t\t\t\t\t\$(this).attr('placeholder', t);
\t\t\t\t\t\t\t\$(this).parent().children(\".span__label\").text(\"\");
\t\t\t\t\t\t\t\$(this).css(\"border-color\", \"#e2e3e6\");
\t\t\t\t\t\t\t}
\t\t\t\t\t\t})
\t\t\t\t\t\t
\t\t\t\t\t\t// annimation pour les choix de login 
\t\t\t\t\t\t\$('.img_content').on('click', function(ev){
\t\t\t\t\t\t\tev.preventDefault();
\t\t\t\t\t\t\tvar data_log = \$(this).attr('data-log');
\t\t\t\t\t\t\t//alert(data_log);
\t\t\t\t\t\t\t\$('#home_dashboard').slideUp();
\t\t\t\t\t\t\t\$('#' + data_log).slideDown();
\t\t\t\t\t\t})
\t\t\t\t\t// login tw

\t\t\t\t\t\t\$(\"#btn_login_tw\").on('click', function(ev){
\t\t\t\t\t\t\tev.preventDefault();
\t\t\t\t\t\t\tvar data = {
\t\t\t\t\t\t\t\t'mail' \t\t: \$(\"#mail_tw\").val(),
\t\t\t\t\t\t\t\t'password'\t: \$(\"#password_tw\").val(),
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\t\turl \t: \"/test_auth_tw\",
\t\t\t\t\t\t\t\ttype \t: \"POST\",
\t\t\t\t\t\t\t\tdata \t: data,
\t\t\t\t\t\t\t\tbeforeSend : function(){
\t\t\t\t\t\t\t\t\t\$(\"#btn_login_tw span\").text(\"Patienter...\");
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\tsuccess\t: function(response){
\t\t\t\t\t\t\t\t\tif(response == \"oui\"){
\t\t\t\t\t\t\t\t\t\t\$('#form_tw').submit();
\t\t\t\t\t\t\t\t\t}else{
\t\t\t\t\t\t\t\t\t\t\$('#info_log_tw p').text(\"Adresse email introuvable\");
\t\t\t\t\t\t\t\t\t\t\$('#info_log_tw').fadeIn(\"slow\");

\t\t\t\t\t\t\t\t\t\tsetTimeout(() => {
\t\t\t\t\t\t\t\t\t\t\t\$('#info_log_tw').fadeOut(\"slow\");
\t\t\t\t\t\t\t\t\t\t}, 3000);
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\tcomplete : function(){
\t\t\t\t\t\t\t\t\t\$(\"#btn_login_tw span\").text(\"Se connecter\");
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\terror\t: function(){
\t\t\t\t\t\t\t\t\talert('erreur au niveau de la route test_auth');
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t})
\t\t\t\t\t\t})

\t\t\t\t\t\t// login sounds

\t\t\t\t\t\t\$(\"#btn_login_s\").on('click', function(ev){
\t\t\t\t\t\t\tev.preventDefault();
\t\t\t\t\t\t\tvar data = {
\t\t\t\t\t\t\t\t'mail' \t\t: \$(\"#mail_s\").val(),
\t\t\t\t\t\t\t\t'password'\t: \$(\"#password_s\").val(),
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\t\turl \t: \"/test_auth_s\",
\t\t\t\t\t\t\t\ttype \t: \"POST\",
\t\t\t\t\t\t\t\tdata \t: data,
\t\t\t\t\t\t\t\tbeforeSend : function(){
\t\t\t\t\t\t\t\t\t\$(\"#btn_login_s span\").text(\"Patienter...\");
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\tsuccess\t: function(response){
\t\t\t\t\t\t\t\t\tif(response == \"oui\"){
\t\t\t\t\t\t\t\t\t\t\$('#form_sounds').submit();
\t\t\t\t\t\t\t\t\t}else{
\t\t\t\t\t\t\t\t\t\t\$('#info_log_sounds p').text(\"Adresse email introuvable\");
\t\t\t\t\t\t\t\t\t\t\$('#info_log_sounds').fadeIn(\"slow\");

\t\t\t\t\t\t\t\t\t\tsetTimeout(() => {
\t\t\t\t\t\t\t\t\t\t\t\$('#info_log_sounds').fadeOut(\"slow\");
\t\t\t\t\t\t\t\t\t\t}, 3000);
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\tcomplete : function(){
\t\t\t\t\t\t\t\t\t\$(\"#btn_login_s span\").text(\"Se connecter\");
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\terror\t: function(){
\t\t\t\t\t\t\t\t\talert('erreur au niveau de la route test_auth_s');
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t})
\t\t\t\t\t\t})

\t\t\t\t\t})

\t\t\t\t\t/* / animation des input  */

\t\t\t</script>
\t</body>
</html>

";
    }

    public function getTemplateName()
    {
        return "security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  296 => 208,  292 => 207,  267 => 185,  256 => 177,  249 => 172,  245 => 161,  242 => 160,  236 => 158,  234 => 157,  227 => 153,  214 => 143,  198 => 130,  188 => 123,  184 => 121,  172 => 111,  165 => 106,  161 => 95,  158 => 94,  152 => 92,  150 => 91,  143 => 87,  130 => 77,  102 => 52,  89 => 42,  79 => 35,  67 => 26,  59 => 21,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "security/login.html.twig", "/home/dashboy/www/templates/security/login.html.twig");
    }
}
