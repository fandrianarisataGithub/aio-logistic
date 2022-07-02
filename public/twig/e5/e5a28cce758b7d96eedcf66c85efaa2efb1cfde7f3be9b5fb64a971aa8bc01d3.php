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

/* page/hebergement.html.twig */
class __TwigTemplate_288de65a7cf11272246ee34962151c545e6133b873bf3d542cf7b0f8630a4377 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html.twig", "page/hebergement.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "\tHébergement
";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "\t<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/dashboard.css"), "html", null, true);
        echo "\">
";
    }

    // line 9
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "
\t<section
\t\tid=\"contents\">
\t\t<!-- entete content -->
\t\t\t";
        // line 14
        $this->loadTemplate("nav2.html.twig", "page/hebergement.html.twig", 14)->display($context);
        // line 15
        echo "\t\t<!-- / entete content -->

\t\t<!-- contenue  -->
\t\t<div id=\"hrs_content\">
\t\t\t<div>
\t\t\t\t<div class=\"col-lg-12 col-md-12 col-sm-12 col-sm-12 col-xs-12\">
\t\t\t\t\t<section class=\"section_part\" id=\"section_part_top\">
\t\t\t\t\t\t<div class=\"sous_titre\">
\t\t\t\t\t\t\t<h3>Hébergement</h3>
\t\t\t\t\t\t</div>
\t\t\t\t\t</section>
\t\t\t\t</div>
\t\t\t\t<div
\t\t\t\t\tclass=\"col-lg-12 col-md-12 col-sm-12 col-sm-12 col-xs-12\"
\t\t\t\t\t
\t\t\t\t\t";
        // line 30
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 30), "receptionniste", [], "any", false, false, false, 30), "oui"))) {
            // line 31
            echo "\t\t\t\t\t\tstyle = \"display : none;\"
\t\t\t\t\t";
        }
        // line 33
        echo "\t\t\t\t\t>
\t\t\t\t\t<!-- debut chart 1 -->
\t\t\t\t\t<section class=\"section_part tab_content margin_tab graph_content\">
\t\t\t\t\t\t<div class=\"chart_title\">
\t\t\t\t\t\t\t<div class=\"chart_title-part\">
\t\t\t\t\t\t\t\t<h4>Taux d'occupation</h4>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<form action=\"\" class=\"tri\">
\t\t\t\t\t\t\t\t<select name=\"\" id=\"mois_heb_to\">
\t\t\t\t\t\t\t\t\t<option selected=\"selected\" value=\"tous_les_mois\">Tous les mois</option>
\t\t\t\t\t\t\t\t\t<option value=\"01\">Janvier</option>
\t\t\t\t\t\t\t\t\t<option value=\"02\">Février</option>
\t\t\t\t\t\t\t\t\t<option value=\"03\">Mars</option>
\t\t\t\t\t\t\t\t\t<option value=\"04\">Avril</option>
\t\t\t\t\t\t\t\t\t<option value=\"05\">Mai</option>
\t\t\t\t\t\t\t\t\t<option value=\"06\">Juin</option>
\t\t\t\t\t\t\t\t\t<option value=\"07\">Juillet</option>
\t\t\t\t\t\t\t\t\t<option value=\"08\">Août</option>
\t\t\t\t\t\t\t\t\t<option value=\"09\">Septembre</option>
\t\t\t\t\t\t\t\t\t<option value=\"10\">Octobre</option>
\t\t\t\t\t\t\t\t\t<option value=\"11\">Novembre</option>
\t\t\t\t\t\t\t\t\t<option value=\"12\">Décembre</option>
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<select name=\"\" class=\"annee\" id=\"annee_heb_to\">
\t\t\t\t\t\t\t\t\t";
        // line 57
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tab_annee"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
            // line 58
            echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $context["a"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["a"], "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['a'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        // line 64
        echo "\t\t\t\t\t\t<section>
\t\t\t\t\t\t\t<div id=\"element_canvas_heb_to\">

\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<canvas id=\"canvas_to\"></canvas>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div style = \"opacity : 0 !important\" id=\"chart-legends_to\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</section>

\t\t\t\t\t</section>
\t\t\t\t\t<!-- fin chart 1 -->
\t\t\t\t\t<!-- debut chart 2 -->
\t\t\t\t\t<section class=\"section_part tab_content margin_tab graph_content\"
\t\t\t\t\t
\t\t\t\t\t";
        // line 79
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 79), "receptionniste", [], "any", false, false, false, 79), "oui"))) {
            // line 80
            echo "\t\t\t\t\t\tstyle = \"display : none;\"
\t\t\t\t\t";
        }
        // line 82
        echo "\t\t\t\t\t>
\t\t\t\t\t\t<div class=\"chart_title\">
\t\t\t\t\t\t\t<div class=\"chart_title-part\">
\t\t\t\t\t\t\t\t<h4>Chiffre d'affaire</h4>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<form action=\"\" class=\"tri\">
\t\t\t\t\t\t\t\t<select name=\"\" id=\"mois_heb_ca\">
\t\t\t\t\t\t\t\t\t<option selected=\"selected\" value=\"tous_les_mois\">Tous les mois</option>
\t\t\t\t\t\t\t\t\t<option value=\"01\">Janvier</option>
\t\t\t\t\t\t\t\t\t<option value=\"02\">Février</option>
\t\t\t\t\t\t\t\t\t<option value=\"03\">Mars</option>
\t\t\t\t\t\t\t\t\t<option value=\"04\">Avril</option>
\t\t\t\t\t\t\t\t\t<option value=\"05\">Mai</option>
\t\t\t\t\t\t\t\t\t<option value=\"06\">Juin</option>
\t\t\t\t\t\t\t\t\t<option value=\"07\">Juillet</option>
\t\t\t\t\t\t\t\t\t<option value=\"08\">Août</option>
\t\t\t\t\t\t\t\t\t<option value=\"09\">Septembre</option>
\t\t\t\t\t\t\t\t\t<option value=\"10\">Octobre</option>
\t\t\t\t\t\t\t\t\t<option value=\"11\">Novembre</option>
\t\t\t\t\t\t\t\t\t<option value=\"12\">Décembre</option>
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<select name=\"\" class=\"annee\" id=\"annee_heb_ca\">
\t\t\t\t\t\t\t\t\t";
        // line 104
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tab_annee"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
            // line 105
            echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $context["a"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["a"], "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['a'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 107
        echo "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<section>
\t\t\t\t\t\t\t<div id=\"element_canvas_heb_ca\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<canvas id=\"canvas_ca\"></canvas>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div style = \"opacity : 0 !important\" id=\"chart-legends_ca\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</section>

\t\t\t\t\t</section>
\t\t\t\t\t<!-- fin chart2  -->
\t\t\t\t\t";
        // line 123
        echo "
\t\t\t\t\t<section class=\"section_part tab_content margin_tab graph_content\"
\t\t\t\t\t
\t\t\t\t\t";
        // line 126
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 126), "receptionniste", [], "any", false, false, false, 126), "oui"))) {
            // line 127
            echo "\t\t\t\t\t\tstyle = \"display : none;\"
\t\t\t\t\t";
        }
        // line 129
        echo "\t\t\t\t\t>
\t\t\t\t\t\t<div class=\"chart_title\">
\t\t\t\t\t\t\t<div class=\"chart_title-part\">
\t\t\t\t\t\t\t\t<h4>Pax hébergé et Nombre de chambre occupé</h4>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<form action=\"\" class=\"tri\">
\t\t\t\t\t\t\t\t<select name=\"\" id=\"mois_pax\">
\t\t\t\t\t\t\t\t\t<option selected=\"selected\" value=\"tous_les_mois\">Tous les mois</option>
\t\t\t\t\t\t\t\t\t<option value=\"01\">Janvier</option>
\t\t\t\t\t\t\t\t\t<option value=\"02\">Février</option>
\t\t\t\t\t\t\t\t\t<option value=\"03\">Mars</option>
\t\t\t\t\t\t\t\t\t<option value=\"04\">Avril</option>
\t\t\t\t\t\t\t\t\t<option value=\"05\">Mai</option>
\t\t\t\t\t\t\t\t\t<option value=\"06\">Juin</option>
\t\t\t\t\t\t\t\t\t<option value=\"07\">Juillet</option>
\t\t\t\t\t\t\t\t\t<option value=\"08\">Août</option>
\t\t\t\t\t\t\t\t\t<option value=\"09\">Septembre</option>
\t\t\t\t\t\t\t\t\t<option value=\"10\">Octobre</option>
\t\t\t\t\t\t\t\t\t<option value=\"11\">Novembre</option>
\t\t\t\t\t\t\t\t\t<option value=\"12\">Décembre</option>
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t<select name=\"\" class=\"annee\" id=\"annee_pax\">
\t\t\t\t\t\t\t\t\t";
        // line 151
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tab_annee"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
            // line 152
            echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $context["a"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["a"], "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['a'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 154
        echo "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<section>
\t\t\t\t\t\t\t<div id=\"element_canvas_pax\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<canvas id=\"canvas_pax\"></canvas>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div id=\"chart-legends_pax\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</section>

\t\t\t\t\t</section>

\t\t\t\t\t";
        // line 170
        echo "
\t\t\t\t\t";
        // line 172
        echo "\t\t\t\t\t<section class=\"section_part tab_content margin_tab graph_content\"
\t\t\t\t\t
\t\t\t\t\t";
        // line 174
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 174), "receptionniste", [], "any", false, false, false, 174), "oui"))) {
            // line 175
            echo "\t\t\t\t\t\tstyle = \"display : none;\"
\t\t\t\t\t";
        }
        // line 177
        echo "\t\t\t\t\t>
\t\t\t\t\t\t<div class=\"chart_title\">
\t\t\t\t\t\t\t<div class=\"chart_title-part\">
\t\t\t\t\t\t\t\t<h4>KPI</h4>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<form action=\"\" class=\"tri\">
\t\t\t\t\t\t\t\t<select name=\"\" class=\"annee\" id=\"annee_kpi\">
\t\t\t\t\t\t\t\t\t";
        // line 184
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["year_mens"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
            // line 185
            echo "\t\t\t\t\t\t\t\t\t\t";
            if ((0 === twig_compare(($context["annee"] ?? null), $context["a"]))) {
                // line 186
                echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $context["a"], "html", null, true);
                echo "\" selected >";
                echo twig_escape_filter($this->env, $context["a"], "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 188
                echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $context["a"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["a"], "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 189
            echo " 
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['a'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 191
        echo "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<section>
\t\t\t\t\t\t\t<div id=\"element_canvas_KPI\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<canvas id=\"canvas_KPI\"></canvas>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div id=\"chart-legends_KPI\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</section>

\t\t\t\t\t</section>
\t\t\t\t\t";
        // line 206
        echo "

\t\t\t\t</div>
\t\t\t\t<div class=\"col-lg-12 col-md-12 col-sm-12 col-sm-12 col-xs-12\">
\t\t\t\t\t<section class=\"section_part tab_content margin_tab tab_liste_client\">
\t\t\t\t\t\t<div class=\"tableau\">
\t\t\t\t\t\t\t<div class=\"sous_titre\">
\t\t\t\t\t\t\t\t";
        // line 213
        if ((isset($context["date_text_month"]) || array_key_exists("date_text_month", $context))) {
            // line 214
            echo "\t\t\t\t\t\t\t\t\t<h4>Liste des clients hébergés le : <span id=\"date_text_heb\">";
            echo twig_escape_filter($this->env, ($context["date_text_month"] ?? null), "html", null, true);
            echo "</span></h4>
\t\t\t\t\t\t\t\t";
        }
        // line 216
        echo "\t\t\t\t\t\t\t\t";
        if ((isset($context["interval_text_date"]) || array_key_exists("interval_text_date", $context))) {
            // line 217
            echo "\t\t\t\t\t\t\t\t\t<h4>Liste des clients hébergés entre <span>";
            echo twig_escape_filter($this->env, ($context["interval_text_date"] ?? null), "html", null, true);
            echo "</span></h4>
\t\t\t\t\t\t\t\t";
        }
        // line 219
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<section class=\" filtre\">
\t\t\t\t\t\t\t\t<div class=\"sous_titre_filtre\">
\t\t\t\t\t\t\t\t\t<h3>Filtre</h3>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        // line 225
        echo "\t\t\t\t\t\t\t\t<form class=\"tri\" id=\"form_tri_tab_heb\" action=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("hebergement", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
        echo "\" method=\"POST\">
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name = \"createdAt\" class=\"createdAt\" id = \"donnee_du_jour_createdAt\" value = \"";
        // line 226
        echo twig_escape_filter($this->env, ($context["today"] ?? null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t<input name=\"date1\" type=\"date\" id=\"date1\" ";
        // line 227
        if ((isset($context["date1"]) || array_key_exists("date1", $context))) {
            echo " value=\"";
            echo twig_escape_filter($this->env, ($context["date1"] ?? null), "html", null, true);
            echo "\" ";
        }
        echo ">
\t\t\t\t\t\t\t\t\t<input type=\"date\" name=\"date2\" id=\"date2\" ";
        // line 228
        if ((isset($context["date2"]) || array_key_exists("date2", $context))) {
            echo " value=\"";
            echo twig_escape_filter($this->env, ($context["date2"] ?? null), "html", null, true);
            echo "\" ";
        }
        echo ">
\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary btn-xs btn_filter\" id=\"button_filtre_client\">
\t\t\t\t\t\t\t\t\t\t<span>Filtrer</span>
\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t</section>
\t\t\t\t\t\t\t";
        // line 234
        $this->loadTemplate("table/table_client.html.twig", "page/hebergement.html.twig", 234)->display($context);
        // line 235
        echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
        // line 236
        $this->loadTemplate("modal/modal_client.html.twig", "page/hebergement.html.twig", 236)->display($context);
        // line 237
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</section>

\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<!-- / contenue  -->
\t</section>

";
    }

    // line 248
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 249
        echo "
\t<script>
\t\t\tvar my_data_to = [";
        // line 251
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tab_heb_to"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            echo " ";
            echo twig_escape_filter($this->env, $context["t"], "html", null, true);
            echo ",";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "];
\t
\t\t\tvar my_data_ca = [";
        // line 253
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tab_heb_ca"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["tca"]) {
            echo " ";
            echo twig_escape_filter($this->env, $context["tca"], "html", null, true);
            echo ",";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tca'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "];

\t\t\tvar my_data_pax = [";
        // line 255
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tab_heb_pax"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            echo " ";
            echo twig_escape_filter($this->env, $context["t"], "html", null, true);
            echo ",";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "];
\t\t\tvar my_data_occ = [";
        // line 256
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tab_heb_occ"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            echo " ";
            echo twig_escape_filter($this->env, $context["t"], "html", null, true);
            echo ",";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "];

\t\t\tvar  my_data_adr = { 0 : 0};
\t\t\tvar  my_data_revp = { 0 : 0};

\t\t\t";
        // line 261
        if ( !twig_test_empty(($context["tab_adr"] ?? null))) {
            // line 262
            echo "\t\t\t\t my_data_adr = ";
            echo json_encode(($context["tab_adr"] ?? null));
            echo " ;
\t\t\t";
        }
        // line 264
        echo "\t\t\t
\t\t\t ";
        // line 265
        if ( !twig_test_empty(($context["tab_revp"] ?? null))) {
            // line 266
            echo "\t\t\t\t my_data_revp = ";
            echo json_encode(($context["tab_revp"] ?? null));
            echo " ;
\t\t\t ";
        }
        // line 268
        echo "
\t\t\$(document).ready(function () {

\t\t\t/* donnée pour les deux chart */

\t\t\t// tracer
\t\t\t
\t\t\tvar souche_adr = {
\t\t\t\t'0' : 0,
\t\t\t\t'1' : 0,
\t\t\t\t'2' : 0,
\t\t\t\t'3' : 0,
\t\t\t\t'4' : 0,
\t\t\t\t'5' : 0,
\t\t\t\t'6' : 0,
\t\t\t\t'7' : 0,
\t\t\t\t'8' : 0,
\t\t\t\t'9' : 0,
\t\t\t\t'10' : 0,
\t\t\t\t'11' : 0
\t\t\t}
\t\t\tfor (var item in my_data_adr) {
\t\t\t\tsouche_adr[item] = my_data_adr[item];
\t\t\t}
\t\t\t//console.log(souche);
\t\t\tvar souche2_adr  = [];
\t\t\tfor (var item in souche_adr) {
\t\t\t\tsouche2_adr.push(souche_adr[item]);
\t\t\t}

\t\t\tvar souche_revp = {
\t\t\t\t'0' : 0,
\t\t\t\t'1' : 0,
\t\t\t\t'2' : 0,
\t\t\t\t'3' : 0,
\t\t\t\t'4' : 0,
\t\t\t\t'5' : 0,
\t\t\t\t'6' : 0,
\t\t\t\t'7' : 0,
\t\t\t\t'8' : 0,
\t\t\t\t'9' : 0,
\t\t\t\t'10' : 0,
\t\t\t\t'11' : 0
\t\t\t}
\t\t\tfor (var item in my_data_revp) {
\t\t\t\tsouche_revp[item] = my_data_revp[item];
\t\t\t}

\t\t\t//console.log(souche);
\t\t\tvar souche2_revp  = [];
\t\t\tfor (var item in souche_revp) {
\t\t\t\tsouche2_revp.push(souche_revp[item]);
\t\t\t}

\t\t\tvar my_labels = [\"Jan\",\"Feb\",\"Mar\",\"Apr\",\"May\",\"Jun\",\"Jul\",\"Aug\",\"Sept\",\"Oct\",\"Nov\",\"Dec\"];

\t\t\t/* fin donnée pour les deux chart */


\t\t\tfunction create_ctx1() {
\t\t\tvar ctx1 = document.getElementById('canvas_to').getContext(\"2d\");
\t\t\t\treturn ctx1;
\t\t\t}

\t\t\tfunction create_config1(data, labels, max_y, stepSize) {

\t\t\t\tvar ctx1 = create_ctx1();

\t\t\t\tvar gradientfill_1 = ctx1.createLinearGradient(0, 0, 0, 320);
\t\t\t\tgradientfill_1.addColorStop(0, '#d29e00');
\t\t\t\tgradientfill_1.addColorStop(1, 'transparent');

\t\t\t\tvar gradientfill_2 = ctx1.createLinearGradient(0, 0, 0, 320);
\t\t\t\tgradientfill_2.addColorStop(0, '#55d8ff');
\t\t\t\tgradientfill_2.addColorStop(1, 'transparent');


\t\t\t\tvar config1 = {
\t\t\t\t\ttype: 'line',
\t\t\t\t\tdata: {
\t\t\t\t\t\tdatasets: 
\t\t\t\t\t\t[
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tlabel: \"Taux d'occupation\",
\t\t\t\t\t\t\t\tfill: true,
\t\t\t\t\t\t\t\tbackgroundColor: gradientfill_1,
\t\t\t\t\t\t\t\tborderColor: \"#d29e00\",
\t\t\t\t\t\t\t\t/* insertion des données sur l'axe (oy) */
\t\t\t\t\t\t\t\tdata: data,
\t\t\t\t\t\t\t\t// qui est un tableau simple
\t\t\t\t\t\t\t\t/* / insertion des données sur l'axe (oy) */
\t\t\t\t\t\t\t\tpointStyle: 'circle',
\t\t\t\t\t\t\t\tpointBackgroundColor: \"transparent\",
\t\t\t\t\t\t\t\tpointBorderWidth: '2',
\t\t\t\t\t\t\t\tradius: '5',
\t\t\t\t\t\t\t\thoverRadius: '5',
\t\t\t\t\t\t\t\tborderWidth: 2
\t\t\t\t\t\t\t}
\t\t\t\t\t\t]
\t\t\t\t\t},
\t\t\t\t\toptions: {

\t\t\t\t\t\tlegend: {
\t\t\t\t\t\t\tdisplay: false,
\t\t\t\t\t\t\talign: 'start',
\t\t\t\t\t\t\tposition: 'bottom'
\t\t\t\t\t\t},
\t\t\t\t\t\tresponsive: true,
\t\t\t\t\t\ttitle: {
\t\t\t\t\t\t\tdisplay: true,
\t\t\t\t\t\t\ttext: ''
\t\t\t\t\t\t},
\t\t\t\t\t\ttooltips: {
\t\t\t\t\t\t\tmode: 'index',
\t\t\t\t\t\t\tintersect: false
\t\t\t\t\t\t},
\t\t\t\t\t\thover: {
\t\t\t\t\t\t\tmode: 'nearest',
\t\t\t\t\t\t\tintersect: true
\t\t\t\t\t\t},

\t\t\t\t\t\tscales: {

\t\t\t\t\t\t\txAxes: 
\t\t\t\t\t\t\t[
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\ttype: 'category',
\t\t\t\t\t\t\t\t\tlabels: labels,
\t\t\t\t\t\t\t\t\t// qui est un tableau simple
\t\t\t\t\t\t\t\t\t/* / insertion des données sur l'axe (ox) */
\t\t\t\t\t\t\t\t\tgridLines: {
\t\t\t\t\t\t\t\t\t\tdrawOnChartArea: true,
\t\t\t\t\t\t\t\t\t\tdrawTicks: false,
\t\t\t\t\t\t\t\t\t\tcolor: \"#f0f2f4\"
\t\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t\tticks: {
\t\t\t\t\t\t\t\t\t\tpadding: 20, // pour le marge % axe x
\t\t\t\t\t\t\t\t\t\tfontSize: (function () {
\t\t\t\t\t\t\t\t\t\t\t\t\t\tvar w = \$(window).width();
\t\t\t\t\t\t\t\t\t\t\t\t\t\tif (w < 769) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\treturn 7;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\treturn 10;
\t\t\t\t\t\t\t\t\t\t\t\t\t})()
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t],
\t\t\t\t\t\t\tyAxes: [
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\tgridLines: {
\t\t\t\t\t\t\t\t\t\tdrawOnChartArea: true,
\t\t\t\t\t\t\t\t\t\tdrawTicks: false,
\t\t\t\t\t\t\t\t\t\tcolor: \"#dddfe1\"
\t\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t\tticks: {
\t\t\t\t\t\t\t\t\t\tpadding: 20, // pour le marge % axe y
\t\t\t\t\t\t\t\t\t\tmin: 0,
\t\t\t\t\t\t\t\t\t\tmax: max_y,
\t\t\t\t\t\t\t\t\t\tstepSize: stepSize,
\t\t\t\t\t\t\t\t\t\tcallback: function (value) {
\t\t\t\t\t\t\t\t\t\t\treturn value + \"%\"
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t},

\t\t\t\t\t\t\t\t\tdisplay: true,
\t\t\t\t\t\t\t\t\tscaleLabel: {
\t\t\t\t\t\t\t\t\t\tdisplay: true,
\t\t\t\t\t\t\t\t\t\tlabelString: ''
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t]
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t};

\t\t\t\treturn config1;
\t\t\t}

\t\t\t// fin event pour data 1

\t\t\t// fin chart 1

\t\t\t// debut chart  2


\t\t\tfunction create_ctx2() {
\t\t\t\tvar ctx2 = document.getElementById('canvas_ca').getContext(\"2d\");
\t\t\t\tvar gradientfill_1 = ctx2.createLinearGradient(0, 0, 0, 320);
\t\t\t\tgradientfill_1.addColorStop(0, '#d29e00');
\t\t\t\tgradientfill_1.addColorStop(1, 'transparent');
\t\t\t\tvar gradientfill_2 = ctx2.createLinearGradient(0, 0, 0, 320);
\t\t\t\tgradientfill_2.addColorStop(0, '#55d8ff');
\t\t\t\tgradientfill_2.addColorStop(1, 'transparent');
\t\t\t\treturn ctx2;
\t\t\t}

\t\t\tfunction create_config2(data, labels, max_y, stepSize) {

\t\t\t\tvar ctx2 = create_ctx2();

\t\t\t\tvar gradientfill_1 = ctx2.createLinearGradient(0, 0, 0, 320);
\t\t\t\tgradientfill_1.addColorStop(0, '#d29e00');
\t\t\t\tgradientfill_1.addColorStop(1, 'transparent');

\t\t\t\tvar gradientfill_2 = ctx2.createLinearGradient(0, 0, 0, 320);
\t\t\t\tgradientfill_2.addColorStop(0, '#55d8ff');
\t\t\t\tgradientfill_2.addColorStop(1, 'transparent');

\t\t\t\tvar config2 = {
\t\t\t\t\ttype: 'line',
\t\t\t\t\tdata: {
\t\t\t\t\t\tdatasets: 
\t\t\t\t\t\t[
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tlabel: \"Chiffre d'affaire\",
\t\t\t\t\t\t\t\tfill: true,
\t\t\t\t\t\t\t\tbackgroundColor: gradientfill_2,
\t\t\t\t\t\t\t\tborderColor: \"#55d8ff\",

\t\t\t\t\t\t\t\t/* insertion des données sur l'axe (oy) */

\t\t\t\t\t\t\t\tdata: data,

\t\t\t\t\t\t\t\t/* insertion des données sur l'axe (oy) */
\t\t\t\t\t\t\t\tpointStyle: 'circle',
\t\t\t\t\t\t\t\tpointBackgroundColor: \"transparent\",
\t\t\t\t\t\t\t\tpointBorderWidth: '2',
\t\t\t\t\t\t\t\tradius: '5',
\t\t\t\t\t\t\t\thoverRadius: '5',
\t\t\t\t\t\t\t\tborderWidth: 2
\t\t\t\t\t\t\t}
\t\t\t\t\t\t]
\t\t\t\t\t},
\t\t\t\t\toptions: {
\t\t\t\t\t\tlegend: {
\t\t\t\t\t\t\tdisplay: false,
\t\t\t\t\t\t\talign: 'start',
\t\t\t\t\t\t\tposition: 'bottom'

\t\t\t\t\t\t},

\t\t\t\t\tresponsive: true,
\t\t\t\t\ttitle: {
\t\t\t\t\t\tdisplay: true,
\t\t\t\t\t\ttext: ''
\t\t\t\t\t},
\t\t\t\t\ttooltips: {
\t\t\t\t\t\tmode: 'index',
\t\t\t\t\t\tintersect: false
\t\t\t\t\t},
\t\t\t\t\thover: {
\t\t\t\t\t\tmode: 'nearest',
\t\t\t\t\t\tintersect: true
\t\t\t\t\t},

\t\t\t\t\tscales: 
\t\t\t\t\t{

\t\t\t\t\t\txAxes: 
\t\t\t\t\t\t[
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\ttype: 'category',

\t\t\t\t\t\t\t\t/* insertion des données sur l'axe (ox) */

\t\t\t\t\t\t\t\tlabels: labels,
\t\t\t\t\t\t\t\t/* /insertion des données sur l'axe (ox) */

\t\t\t\t\t\t\t\tgridLines: {
\t\t\t\t\t\t\t\t\tdrawOnChartArea: true,
\t\t\t\t\t\t\t\t\tdrawTicks: false,
\t\t\t\t\t\t\t\t\tcolor: \"#f0f2f4\"
\t\t\t\t\t\t\t\t},

\t\t\t\t\t\t\t\tticks: 
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\tpadding: 20, // pour le marge % axe x
\t\t\t\t\t\t\t\t\tfontSize: (function () {
\t\t\t\t\t\t\t\t\t\tvar w = \$(window).width();
\t\t\t\t\t\t\t\t\t\tif (w < 769) {
\t\t\t\t\t\t\t\t\t\t\treturn 7;
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\treturn 10;
\t\t\t\t\t\t\t\t\t})()
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}
\t\t\t\t\t\t],
\t\t\t\t\t\tyAxes: 
\t\t\t\t\t\t[
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tgridLines: {
\t\t\t\t\t\t\t\t\tdrawOnChartArea: true,
\t\t\t\t\t\t\t\t\tdrawTicks: false,
\t\t\t\t\t\t\t\t\tcolor: \"#dddfe1\"
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\tticks: {
\t\t\t\t\t\t\t\t\tpadding: 20, // pour le marge % axe y
\t\t\t\t\t\t\t\t\tmin : 0,
\t\t\t\t\t\t\t\t\tmax: max_y,
\t\t\t\t\t\t\t\t\tstepSize: stepSize,

\t\t\t\t\t\t\t\t\tcallback: function (value) {
\t\t\t\t\t\t\t\t\t\tvar test = new Intl.NumberFormat();
\t\t\t\t\t\t\t\t\t\tvar val = test.format(value);
\t\t\t\t\t\t\t\t\t\treturn val + \" Ar\"
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\tdisplay: true,
\t\t\t\t\t\t\t\tscaleLabel: {
\t\t\t\t\t\t\t\t\tdisplay: true,
\t\t\t\t\t\t\t\t\tlabelString: ''
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}
\t\t\t\t\t\t]
\t\t\t\t\t}
\t\t\t\t}
\t\t\t};

\t\t\treturn config2;
\t\t}


\t\t// fin chart2

\t\t// debut chart 3

\t\tfunction create_ctx3() {
\t\t\tvar ctx3 = document.getElementById('canvas_pax').getContext(\"2d\");

\t\t\tvar gradientfill_1 = ctx3.createLinearGradient(0, 0, 0, 320);
\t\t\tgradientfill_1.addColorStop(0, '#d29e00');
\t\t\tgradientfill_1.addColorStop(1, 'transparent');

\t\t\tvar gradientfill_2 = ctx3.createLinearGradient(0, 0, 0, 320);
\t\t\tgradientfill_2.addColorStop(0, '#55d8ff');
\t\t\tgradientfill_2.addColorStop(1, 'transparent');

\t\t\treturn ctx3;
\t\t}

\t\tfunction create_config3(data1, data2, labels, max_y, stepSize) {

\t\t\t\tvar ctx3 = create_ctx3();

\t\t\t\tvar gradientfill_1 = ctx3.createLinearGradient(0, 0, 0, 320);
\t\t\t\tgradientfill_1.addColorStop(0, '#d29e00');
\t\t\t\tgradientfill_1.addColorStop(1, 'transparent');

\t\t\t\tvar gradientfill_2 = ctx3.createLinearGradient(0, 0, 0, 320);
\t\t\t\tgradientfill_2.addColorStop(0, '#55d8ff');
\t\t\t\tgradientfill_2.addColorStop(1, 'transparent');

\t\t\t\tvar config3 = {
\t\t\t\t\ttype: 'line',
\t\t\t\t\tdata: {
\t\t\t\t\t\tdatasets: 
\t\t\t\t\t\t[
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tlabel: \"Nombre de pax hébergé\",
\t\t\t\t\t\t\t\tfill: true,
\t\t\t\t\t\t\t\tbackgroundColor: gradientfill_1,
\t\t\t\t\t\t\t\tborderColor: \"#d29e00\",

\t\t\t\t\t\t\t\t/* insertion des données sur l'axe (oy) */

\t\t\t\t\t\t\t\tdata: data1,

\t\t\t\t\t\t\t\t/* insertion des données sur l'axe (oy) */
\t\t\t\t\t\t\t\tpointStyle: 'circle',
\t\t\t\t\t\t\t\tpointBackgroundColor: \"transparent\",
\t\t\t\t\t\t\t\tpointBorderWidth: '2',
\t\t\t\t\t\t\t\tradius: '5',
\t\t\t\t\t\t\t\thoverRadius: '5',
\t\t\t\t\t\t\t\tborderWidth: 2
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tlabel: \"Nombre de chambre occupé\",
\t\t\t\t\t\t\t\tfill: true,
\t\t\t\t\t\t\t\tbackgroundColor: gradientfill_2,
\t\t\t\t\t\t\t\tborderColor: \"#55d8ff\",

\t\t\t\t\t\t\t\t/* insertion des données sur l'axe (oy) */

\t\t\t\t\t\t\t\tdata: data2,

\t\t\t\t\t\t\t\t/* insertion des données sur l'axe (oy) */
\t\t\t\t\t\t\t\tpointStyle: 'circle',
\t\t\t\t\t\t\t\tpointBackgroundColor: \"transparent\",
\t\t\t\t\t\t\t\tpointBorderWidth: '2',
\t\t\t\t\t\t\t\tradius: '5',
\t\t\t\t\t\t\t\thoverRadius: '5',
\t\t\t\t\t\t\t\tborderWidth: 2
\t\t\t\t\t\t\t}
\t\t\t\t\t\t]
\t\t\t\t\t},
\t\t\t\t\toptions: {
\t\t\t\t\t\tlegend: {
\t\t\t\t\t\t\tdisplay: false,
\t\t\t\t\t\t\talign: 'start',
\t\t\t\t\t\t\tposition: 'bottom'

\t\t\t\t\t\t},
\t\t\t\t\t\tlegendCallback: function (chart) {
\t\t\t\t\t\t\tvar text = [];
\t\t\t\t\t\t\ttext.push('<ul class=\"my_liste_legend ul_3\">');
\t\t\t\t\t\t\tfor (var i = 0; i < chart.data.datasets.length; i++) {
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\ttext.push('<li>');
\t\t\t\t\t\t\t\ttext.push('<span data_leg = \"' + i + '\" style=\"background-color:' + chart.data.datasets[i].borderColor + '\">' + '</span><b data_leg = \"' + i + '\">' + chart.data.datasets[i].label + '</b>');
\t\t\t\t\t\t\t\ttext.push('</li>');
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\ttext.push('</ul>');
\t\t\t\t\t\t\treturn text.join(\"\");
\t\t\t\t\t\t},

\t\t\t\t\tresponsive: true,
\t\t\t\t\ttitle: {
\t\t\t\t\t\tdisplay: true,
\t\t\t\t\t\ttext: ''
\t\t\t\t\t},
\t\t\t\t\ttooltips: {
\t\t\t\t\t\tmode: 'index',
\t\t\t\t\t\tintersect: false
\t\t\t\t\t},
\t\t\t\t\thover: {
\t\t\t\t\t\tmode: 'nearest',
\t\t\t\t\t\tintersect: true
\t\t\t\t\t},

\t\t\t\t\tscales: 
\t\t\t\t\t{

\t\t\t\t\t\txAxes: 
\t\t\t\t\t\t[
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\ttype: 'category',

\t\t\t\t\t\t\t\t/* insertion des données sur l'axe (ox) */

\t\t\t\t\t\t\t\tlabels: labels,
\t\t\t\t\t\t\t\t/* /insertion des données sur l'axe (ox) */

\t\t\t\t\t\t\t\tgridLines: {
\t\t\t\t\t\t\t\t\tdrawOnChartArea: true,
\t\t\t\t\t\t\t\t\tdrawTicks: false,
\t\t\t\t\t\t\t\t\tcolor: \"#f0f2f4\"
\t\t\t\t\t\t\t\t},

\t\t\t\t\t\t\t\tticks: 
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\tpadding: 20, // pour le marge % axe x
\t\t\t\t\t\t\t\t\tfontSize: (function () {
\t\t\t\t\t\t\t\t\t\t\t\t\tvar w = \$(window).width();
\t\t\t\t\t\t\t\t\t\t\t\t\tif (w < 769) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\treturn 7;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\treturn 10;
\t\t\t\t\t\t\t\t\t\t\t\t})()
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}
\t\t\t\t\t\t],
\t\t\t\t\t\tyAxes: 
\t\t\t\t\t\t[
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tgridLines: {
\t\t\t\t\t\t\t\t\tdrawOnChartArea: true,
\t\t\t\t\t\t\t\t\tdrawTicks: false,
\t\t\t\t\t\t\t\t\tcolor: \"#dddfe1\"
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\tticks: {
\t\t\t\t\t\t\t\t\tpadding: 20, // pour le marge % axe y
\t\t\t\t\t\t\t\t\tmin : 0,
\t\t\t\t\t\t\t\t\tmax: max_y,
\t\t\t\t\t\t\t\t\tstepSize: stepSize,

\t\t\t\t\t\t\t\t\t// callback: function (value) {
\t\t\t\t\t\t\t\t\t// \tvar test = new Intl.NumberFormat();
\t\t\t\t\t\t\t\t\t// \tvar val = test.format(value);
\t\t\t\t\t\t\t\t\t// \treturn val + \" Ar\"
\t\t\t\t\t\t\t\t\t// }
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\tdisplay: true,
\t\t\t\t\t\t\t\tscaleLabel: {
\t\t\t\t\t\t\t\t\tdisplay: true,
\t\t\t\t\t\t\t\t\tlabelString: ''
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}
\t\t\t\t\t\t]
\t\t\t\t\t}
\t\t\t\t}
\t\t\t};

\t\t\treturn config3;
\t\t}

\t\t// debut chart 4 

\t\tfunction create_ctx4() {
\t\t\tvar ctx4 = document.getElementById('canvas_KPI').getContext(\"2d\");

\t\t\tvar gradientfill_1 = ctx4.createLinearGradient(0, 0, 0, 320);
\t\t\tgradientfill_1.addColorStop(0, '#d29e00');
\t\t\tgradientfill_1.addColorStop(1, 'transparent');

\t\t\tvar gradientfill_2 = ctx4.createLinearGradient(0, 0, 0, 320);
\t\t\tgradientfill_2.addColorStop(0, '#55d8ff');
\t\t\tgradientfill_2.addColorStop(1, 'transparent');

\t\t\treturn ctx4;
\t\t}

\t\tfunction create_config4(data1, data2, labels, max_y, stepSize) {

\t\t\t\tvar ctx4 = create_ctx4();

\t\t\t\tvar gradientfill_1 = ctx4.createLinearGradient(0, 0, 0, 320);
\t\t\t\tgradientfill_1.addColorStop(0, '#d29e00');
\t\t\t\tgradientfill_1.addColorStop(1, 'transparent');

\t\t\t\tvar gradientfill_2 = ctx4.createLinearGradient(0, 0, 0, 320);
\t\t\t\tgradientfill_2.addColorStop(0, '#55d8ff');
\t\t\t\tgradientfill_2.addColorStop(1, 'transparent');

\t\t\t\tvar config4 = {
\t\t\t\t\ttype: 'line',
\t\t\t\t\tdata: {
\t\t\t\t\t\tdatasets: 
\t\t\t\t\t\t[
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tlabel: \"ADR\",
\t\t\t\t\t\t\t\tfill: true,
\t\t\t\t\t\t\t\tbackgroundColor: gradientfill_1,
\t\t\t\t\t\t\t\tborderColor: \"#d29e00\",

\t\t\t\t\t\t\t\t/* insertion des données sur l'axe (oy) */

\t\t\t\t\t\t\t\tdata: data1,

\t\t\t\t\t\t\t\t/* insertion des données sur l'axe (oy) */
\t\t\t\t\t\t\t\tpointStyle: 'circle',
\t\t\t\t\t\t\t\tpointBackgroundColor: \"transparent\",
\t\t\t\t\t\t\t\tpointBorderWidth: '2',
\t\t\t\t\t\t\t\tradius: '5',
\t\t\t\t\t\t\t\thoverRadius: '5',
\t\t\t\t\t\t\t\tborderWidth: 2
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tlabel: \"RevPAR\",
\t\t\t\t\t\t\t\tfill: true,
\t\t\t\t\t\t\t\tbackgroundColor: gradientfill_2,
\t\t\t\t\t\t\t\tborderColor: \"#55d8ff\",

\t\t\t\t\t\t\t\t/* insertion des données sur l'axe (oy) */

\t\t\t\t\t\t\t\tdata: data2,

\t\t\t\t\t\t\t\t/* insertion des données sur l'axe (oy) */
\t\t\t\t\t\t\t\tpointStyle: 'circle',
\t\t\t\t\t\t\t\tpointBackgroundColor: \"transparent\",
\t\t\t\t\t\t\t\tpointBorderWidth: '2',
\t\t\t\t\t\t\t\tradius: '5',
\t\t\t\t\t\t\t\thoverRadius: '5',
\t\t\t\t\t\t\t\tborderWidth: 2
\t\t\t\t\t\t\t}
\t\t\t\t\t\t]
\t\t\t\t\t},
\t\t\t\t\toptions: {
\t\t\t\t\t\tmode: 'index',
\t\t\t\t\t\tintersect: false,
\t\t\t\t\t\tlegend: {
\t\t\t\t\t\t\tdisplay: false,

\t\t\t\t\t\t},
\t\t\t\t\t\tlegendCallback: function (chart) {
\t\t\t\t\t\t\tvar text = [];
\t\t\t\t\t\t\ttext.push('<ul class=\"my_liste_legend ul_4\">');
\t\t\t\t\t\t\tfor (var i = 0; i < chart.data.datasets.length; i++) {
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\ttext.push('<li>');
\t\t\t\t\t\t\t\ttext.push('<span data_leg = \"' + i + '\" style=\"background-color:' + chart.data.datasets[i].borderColor + '\">' + '</span><b data_leg = \"' + i + '\">' + chart.data.datasets[i].label + '</b>');
\t\t\t\t\t\t\t\ttext.push('</li>');
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\ttext.push('</ul>');
\t\t\t\t\t\t\treturn text.join(\"\");
\t\t\t\t\t\t},

\t\t\t\t\tresponsive: true,
\t\t\t\t\ttitle: {
\t\t\t\t\t\tdisplay: true,
\t\t\t\t\t\ttext: ''
\t\t\t\t\t},
\t\t\t\t\ttooltips: {
\t\t\t\t\t\tmode: 'index',
\t\t\t\t\t\tintersect: false,
\t\t\t\t\t},
\t\t\t\t\thover: {
\t\t\t\t\t\tmode: 'nearest',
\t\t\t\t\t\tintersect: true
\t\t\t\t\t},

\t\t\t\t\tscales: 
\t\t\t\t\t{

\t\t\t\t\t\txAxes: 
\t\t\t\t\t\t[
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\ttype: 'category',

\t\t\t\t\t\t\t\t/* insertion des données sur l'axe (ox) */

\t\t\t\t\t\t\t\tlabels: labels,
\t\t\t\t\t\t\t\t/* /insertion des données sur l'axe (ox) */

\t\t\t\t\t\t\t\tgridLines: {
\t\t\t\t\t\t\t\t\tdrawOnChartArea: true,
\t\t\t\t\t\t\t\t\tdrawTicks: false,
\t\t\t\t\t\t\t\t\tcolor: \"#f0f2f4\"
\t\t\t\t\t\t\t\t},

\t\t\t\t\t\t\t\tticks: 
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\tpadding: 20, // pour le marge % axe x
\t\t\t\t\t\t\t\t\tfontSize: (function () {
\t\t\t\t\t\t\t\t\t\t\t\t\tvar w = \$(window).width();
\t\t\t\t\t\t\t\t\t\t\t\t\tif (w < 769) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\treturn 7;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\treturn 10;
\t\t\t\t\t\t\t\t\t\t\t\t})()
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}
\t\t\t\t\t\t],
\t\t\t\t\t\tyAxes: 
\t\t\t\t\t\t[
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tgridLines: {
\t\t\t\t\t\t\t\t\tdrawOnChartArea: true,
\t\t\t\t\t\t\t\t\tdrawTicks: false,
\t\t\t\t\t\t\t\t\tcolor: \"#dddfe1\"
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\tticks: {
\t\t\t\t\t\t\t\t\tpadding: 20, // pour le marge % axe y
\t\t\t\t\t\t\t\t\tmin : 0,
\t\t\t\t\t\t\t\t\tmax: max_y,
\t\t\t\t\t\t\t\t\tstepSize: stepSize,

\t\t\t\t\t\t\t\t\tcallback: function (value) {
\t\t\t\t\t\t\t\t\t\tvar test = new Intl.NumberFormat();
\t\t\t\t\t\t\t\t\t\tvar val = test.format(value);
\t\t\t\t\t\t\t\t\t\treturn val + \" Ar\"
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\tdisplay: true,
\t\t\t\t\t\t\t\tscaleLabel: {
\t\t\t\t\t\t\t\t\tdisplay: true,
\t\t\t\t\t\t\t\t\tlabelString: ''
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}
\t\t\t\t\t\t]
\t\t\t\t\t}
\t\t\t\t}
\t\t\t};

\t\t\treturn config4;
\t\t}


\t\t// responsive pour les chart


\t\tfunction create_chart1(ctx1, config1) {
\t\t\tvar myChart1 = new Chart(ctx1, config1);

\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\tdocument.getElementById('chart-legends_to').innerHTML = myChart1.generateLegend();

\t\t\t// event pour data 1

\t\t\tvar ev_click = false;
\t\t\tvar tab_temp = [];
\t\t\tfor (var i = 0; i < myChart1.data.datasets[0].data.length; i++) { // myChart1.data.datasets[0].data[i]= -10;
\t\t\t\ttab_temp[i] = myChart1.data.datasets[0].data[i];
\t\t\t}
\t\t\t\$(\"#chart-legends_to\").on('click', \"li span[data_leg=0]\", function () {

\t\t\t\tif (ev_click == false) {
\t\t\t\t\t\$(\".ul_1 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\tfor (var i = 0; i < myChart1.data.datasets[0].data.length; i++) {
\t\t\t\t\t\tmyChart1.data.datasets[0].data[i] = -10;
\t\t\t\t\t}
\t\t\t\t\tmyChart1.update();
\t\t\t\t\tev_click = ! ev_click;
\t\t\t\t\t// alert(ev_click) ;
\t\t\t\t} else {
\t\t\t\t\t\$(\".ul_1 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\tfor (var i = 0; i < myChart1.data.datasets[0].data.length; i++) {
\t\t\t\t\t\tmyChart1.data.datasets[0].data[i] = tab_temp[i];
\t\t\t\t\t}
\t\t\t\t\tmyChart1.update();
\t\t\t\t\tev_click = ! ev_click;
\t\t\t\t\t// alert(ev_click) ;
\t\t\t\t}
\t\t\t});

\t\t\treturn myChart1;

\t\t}

\t\tfunction create_chart2(ctx2, config2) {
\t\t\tvar myChart2 = new Chart(ctx2, config2);

\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\tdocument.getElementById('chart-legends_ca').innerHTML = myChart2.generateLegend();


\t\t\t// legende 2

\t\t\tvar ev_click2 = false;
\t\t\tvar tab_temp2 = [];
\t\t\tfor (var i = 0; i < myChart2.data.datasets[0].data.length; i++) { // myChart2.data.datasets[0].data[i]= -10;
\t\t\ttab_temp2[i] = myChart2.data.datasets[0].data[i];
\t\t\t}
\t\t\t\$(\"#chart-legends_ca\").on('click', \"li span[data_leg=0]\", function () {

\t\t\t\tif (ev_click2 == false) {
\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\tfor (var i = 0; i < myChart2.data.datasets[0].data.length; i++) {
\t\t\t\t\t\tmyChart2.data.datasets[0].data[i] = -10;
\t\t\t\t\t}
\t\t\t\t\tmyChart2.update();
\t\t\t\t\tev_click2 = ! ev_click2;
\t\t\t\t\t// alert(ev_click2) ;
\t\t\t\t} else {
\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\tfor (var i = 0; i < myChart2.data.datasets[0].data.length; i++) {
\t\t\t\t\t\tmyChart2.data.datasets[0].data[i] = tab_temp2[i];
\t\t\t\t\t}

\t\t\t\t\tmyChart2.update();
\t\t\t\t\tev_click2 = ! ev_click2;

\t\t\t\t}
\t\t\t});

\t\t\treturn myChart2;

\t\t}

\t\tfunction create_chart3(ctx3, config3) {
\t\t\tvar myChart3 = new Chart(ctx3, config3);

\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\tdocument.getElementById('chart-legends_pax').innerHTML = myChart3.generateLegend();

\t\t\t// event pour data 1

\t\t\tvar ev_click1 = false;
\t\t\tvar ev_click2 = false;
\t\t\tvar tab_temp = [];
\t\t\tvar tab_temp2 = [];
\t\t\tfor (var i = 0; i < myChart3.data.datasets[0].data.length; i++) { // myChart1.data.datasets[0].data[i]= -10;
\t\t\t\ttab_temp[i] = myChart3.data.datasets[0].data[i];
\t\t\t}
\t\t\tfor (var i = 0; i < myChart3.data.datasets[1].data.length; i++) { // myChart1.data.datasets[0].data[i]= -10;
\t\t\t\ttab_temp2[i] = myChart3.data.datasets[1].data[i];
\t\t\t}
\t\t\t\$(\"#chart-legends_pax\").on('click', \"li span[data_leg=0]\", function () {
\t\t\t\tif (ev_click1 == false) {
\t\t\t\t\t\$(\".ul_3 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[0].data.length; i++) {
\t\t\t\t\t\tmyChart3.data.datasets[0].data[i] = 0;
\t\t\t\t\t}
\t\t\t\t\tmyChart3.update();
\t\t\t\t\tev_click1 = ! ev_click1;
\t\t\t\t\t// alert(ev_click1) ;
\t\t\t\t} else {
\t\t\t\t\t\$(\".ul_3 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[0].data.length; i++) {
\t\t\t\t\t\tmyChart3.data.datasets[0].data[i] = tab_temp[i];
\t\t\t\t\t}
\t\t\t\t\tmyChart3.update();
\t\t\t\t\tev_click1 = ! ev_click1;
\t\t\t\t}
\t\t\t});

\t\t\t\$(\"#chart-legends_pax\").on('click', \"li span[data_leg=1]\", function () {
\t\t\t\tif (ev_click2 == false) {
\t\t\t\t\t\$(\".ul_3 li span[data_leg=1]\").addClass(\"legende_click\");
\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[1].data.length; i++) {
\t\t\t\t\t\tmyChart3.data.datasets[1].data[i] = 0;
\t\t\t\t\t}
\t\t\t\t\tmyChart3.update();
\t\t\t\t\tev_click2 = ! ev_click2;
\t\t\t\t\t// alert(ev_click2) ;
\t\t\t\t} else {
\t\t\t\t\t\$(\".ul_3 li span[data_leg=1]\").removeClass(\"legende_click\");
\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[1].data.length; i++) {
\t\t\t\t\t\tmyChart3.data.datasets[1].data[i] = tab_temp2[i];
\t\t\t\t\t}
\t\t\t\t\tmyChart3.update();
\t\t\t\t\tev_click2 = ! ev_click2;
\t\t\t\t}
\t\t\t});

\t\t\treturn myChart3;

\t\t}

\t\tfunction create_chart4(ctx4, config4) {
\t\t\tvar myChart4 = new Chart(ctx4, config4);

\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\tdocument.getElementById('chart-legends_KPI').innerHTML = myChart4.generateLegend();

\t\t\t// event pour data 1

\t\t\tvar ev_click1 = false;
\t\t\tvar ev_click2 = false;
\t\t\tvar tab_temp = [];
\t\t\tvar tab_temp2 = [];
\t\t\tfor (var i = 0; i < myChart4.data.datasets[0].data.length; i++) { // myChart1.data.datasets[0].data[i]= -10;
\t\t\t\ttab_temp[i] = myChart4.data.datasets[0].data[i];
\t\t\t}
\t\t\tfor (var i = 0; i < myChart4.data.datasets[1].data.length; i++) { // myChart1.data.datasets[0].data[i]= -10;
\t\t\t\ttab_temp2[i] = myChart4.data.datasets[1].data[i];
\t\t\t}
\t\t\t\$(\"#chart-legends_KPI\").on('click', \"li span[data_leg=0]\", function () {
\t\t\t\tif (ev_click1 == false) {
\t\t\t\t\t\$(\".ul_4 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\tfor (var i = 0; i < myChart4.data.datasets[0].data.length; i++) {
\t\t\t\t\t\tmyChart4.data.datasets[0].data[i] = 0;
\t\t\t\t\t}
\t\t\t\t\tmyChart4.update();
\t\t\t\t\tev_click1 = ! ev_click1;
\t\t\t\t\t// alert(ev_click1) ;
\t\t\t\t} else {
\t\t\t\t\t\$(\".ul_4 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\tfor (var i = 0; i < myChart4.data.datasets[0].data.length; i++) {
\t\t\t\t\t\tmyChart4.data.datasets[0].data[i] = tab_temp[i];
\t\t\t\t\t}
\t\t\t\t\tmyChart4.update();
\t\t\t\t\tev_click1 = ! ev_click1;
\t\t\t\t}
\t\t\t});

\t\t\t\$(\"#chart-legends_KPI\").on('click', \"li span[data_leg=1]\", function () {
\t\t\t\tif (ev_click2 == false) {
\t\t\t\t\t\$(\".ul_4 li span[data_leg=1]\").addClass(\"legende_click\");
\t\t\t\t\tfor (var i = 0; i < myChart4.data.datasets[1].data.length; i++) {
\t\t\t\t\t\tmyChart4.data.datasets[1].data[i] = 0;
\t\t\t\t\t}
\t\t\t\t\tmyChart4.update();
\t\t\t\t\tev_click2 = ! ev_click2;
\t\t\t\t\t// alert(ev_click2) ;
\t\t\t\t} else {
\t\t\t\t\t\$(\".ul_4 li span[data_leg=1]\").removeClass(\"legende_click\");
\t\t\t\t\tfor (var i = 0; i < myChart4.data.datasets[1].data.length; i++) {
\t\t\t\t\t\tmyChart4.data.datasets[1].data[i] = tab_temp2[i];
\t\t\t\t\t}
\t\t\t\t\tmyChart4.update();
\t\t\t\t\tev_click2 = ! ev_click2;
\t\t\t\t}
\t\t\t});

\t\t\treturn myChart4;

\t\t}

\t\tfunction findArrayMax(array){
\t\t\tvar M = array[0];
\t\t\t
\t\t\tfor(var i = 0; i< array.length; i++){
\t\t\t\tvar x = parseFloat(array[i]);
\t\t\t\tif(M < x){
\t\t\t\t\tM = x;
\t\t\t\t}
\t\t\t}
\t\t\t
\t\t\treturn M;
\t\t}

\t\tfunction portionner(val){
\t\t\treturn parseInt(val / 4) ;
\t\t} 
\t\tvar myChart1 = create_chart1(create_ctx1(), create_config1(my_data_to, my_labels, 100, 20));

\t\tif(findArrayMax(my_data_ca) != 0){
\t\t\tvar myChart2 = create_chart2(create_ctx2(), create_config2(my_data_ca, my_labels, parseInt(findArrayMax(my_data_ca) + portionner(findArrayMax(my_data_ca))), portionner(findArrayMax(my_data_ca))));
\t\t}
\t\telse if(findArrayMax(my_data_ca) == 0){
\t\t\tvar myChart2 = create_chart2(create_ctx2(), create_config2(my_data_ca, my_labels, 100, 20));
\t\t}

\t\tvar max_pax = findArrayMax(my_data_pax);
\t\tvar max_occ = findArrayMax(my_data_occ);
\t\tvar ex = [max_pax, max_occ];
\t\tvar max_pax_occ = findArrayMax(ex);
\t\tif(max_pax_occ != 0){
\t\t\tvar myChart3 = create_chart3(create_ctx3(), create_config3(my_data_pax, my_data_occ, my_labels,  5*parseInt(portionner(max_pax_occ)) , portionner(max_pax_occ)));
\t\t}
\t\telse if(max_pax_occ == 0){
\t\t\tvar myChart3 = create_chart3(create_ctx3(), create_config3(my_data_pax, my_data_occ, my_labels, 100, 20));
\t\t}

\t\t// affiche chart 4

\t\tvar max_adr = findArrayMax(souche2_adr);
\t\tvar max_revp = findArrayMax(souche2_revp);
\t\tvar ex = [max_adr, max_revp];
\t\tvar max_kpi = findArrayMax(ex);
\t\t
\t\tif(max_kpi != 0){
\t\t\tvar myChart4 = create_chart4(create_ctx4(), create_config4(souche2_adr, souche2_revp, my_labels,  5*parseInt(portionner(max_kpi)) , portionner(max_kpi)));
\t\t}
\t\telse if(max_kpi == 0){
\t\t\tvar myChart4 = create_chart4(create_ctx4(), create_config4(souche2_adr, souche2_revp, my_labels, 100, 20));
\t\t}

\t\t/* ajax pour loader le graph */

\t\t/* debut dataTable */

\t\tvar pseudo_hotel = \"";
        // line 1190
        echo twig_escape_filter($this->env, ($context["hotel"] ?? null), "html", null, true);
        echo "\";
\t\t// alert(pseudo_hotel);
                //alert(pseudo_hotel);
                var table = \$('#tableau_client_donnee_jour').DataTable({
                    \"language\": {
                        \"sEmptyTable\": \"Aucune donnée disponible dans le tableau\",
                        \"sInfo\": \"Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments\",
                        \"sInfoEmpty\": \"Affichage de l'élément 0 à 0 sur 0 élément\",
                        \"sInfoFiltered\": \"(filtré à partir de _MAX_ éléments au total)\",
                        \"sInfoPostFix\": \"\",
                        \"sInfoThousands\": \",\",
                        \"sLengthMenu\": \"Afficher _MENU_ éléments\",
                        \"sLoadingRecords\": \"Chargement...\",
                        \"sProcessing\": \"Traitement...\",
                        \"sSearch\": \"Rechercher :\",
                        \"sZeroRecords\": \"Aucun élément correspondant trouvé\",
                        \"oPaginate\": {
                            \"sFirst\": \"Premier\",
                            \"sLast\": \"Dernier\",
                            \"sNext\": \"Suivant\",
                            \"sPrevious\": \"Précédent\"
                        },
                        \"oAria\": {
                            \"sSortAscending\": \": activer pour trier la colonne par ordre croissant\",
                            \"sSortDescending\": \": activer pour trier la colonne par ordre décroissant\"
                        },
                        \"select\": {
                            \"rows\": {
                                    \"_\": \"%d lignes sélectionnées\",
                                    \"0\": \"Aucune ligne sélectionnée\",
                                    \"1\": \"1 ligne sélectionnée\"
                            }
                        }
                    },

                    \"ajax\" : {
                        url : \"/profile/select_current_client\", // any am Clientcontroller
                        type : 'POST', 
                        data : {
                            'pseudo_hotel' : pseudo_hotel,
                            'date'  : \$(\"#donnee_du_jour_createdAt\").val(),
\t\t\t\t\t\t\t'date1' : \$(\"#date1\").val(),
\t\t\t\t\t\t\t'date2'\t: \$(\"#date2\").val()
                            },
                        \"dataSrc\":\"\",
                        
                    },
                    \"initComplete\":function( settings, json){
\t\t\t\t\t\t
                        var montant = document.querySelectorAll(\".montant\");
                        var t = montant.length;
                        var test = new Intl.NumberFormat();
                        if (t > 0) {
                            for (var i = 0; i < t; i++) {
                                var val = test.format(montant[i].innerHTML);
                                montant[i].innerHTML = val;
                            }           
                        }
                    },

                    //annule le tri
                    order : [[0 , 'asc']],
                    ordering : false,

                    responsive: true,
                    scrollY: false, // raha scrollena de asina val ex 400
                    scrollX: true,
                    scrollCollapse: true,
                    paging: true,
                     autoFill: true
                });

                new \$.fn.dataTable.FixedHeader(table);

\t\t\t\t

\t\t\t/*  fiun table */

\t\t\t/* fin datatable */


\t\t\t/* fin tri tableau heb */
\t\t\t// suppression client présent 

            \$(document).on('click', \".btn_client_suppr\", function(ev){
                //ev.preventDefault();
                var id = \$(this).attr('data-id');
                //alert(id);
                \$('#div__conf button.supprimer').attr('data-id', id);
            })

            \$('#div__conf button.supprimer').on('click', function(){
                 var id = \$(this).attr('data-id');
                 //alert(id);
                 // ajax
                 \$.ajax({
                     url : \"/profile/suprimer_client\",
                     data : {
                         \"visit_id\" : id,
                         \"pseudo_hotel\" : pseudo_hotel,
                     },
                     type : \"POST\",
                     success : function(response){
                         if(response == \"deleted\"){
                             table.ajax.reload(function(response){
                                var montant = document.querySelectorAll(\".montant\");

\t\t\t\t\t\t\t\tvar t = montant.length;
\t\t\t\t\t\t\t\tvar test = new Intl.NumberFormat();
\t\t\t\t\t\t\t\tif (t > 0) {
\t\t\t\t\t\t\t\t\tfor (var i = 0; i < t; i++) {
\t\t\t\t\t\t\t\t\t\tvar temp = montant[i].innerHTML.replaceAll(\" \", \"\");
\t\t\t\t\t\t\t\t\t\tvar val = test.format(temp);
\t\t\t\t\t\t\t\t\t\tmontant[i].innerHTML = val;
\t\t\t\t\t\t\t\t\t}           
\t\t\t\t\t\t\t\t}
                            }, false);
                         }
                     },
                     error : function(error){
                         alert('erreur de server suppression client dans donnée du jour ');
                     },
                })
            })

            /* fin suppression client*/

            /* debut modif client */

            \$(document).on('click', '.btn_client_modif', function(ev){
                ev.preventDefault();
                 var id = \$(this).attr('data-id');
                 //alert(id);
                 \$.ajax({
                     url : \"/profile/check_client\",
                     data : {
                         \"visit_id\" : id,
                         \"action\" : \"modification\",
                     },
                     type : \"POST\",
                    
                     success : function(response){
                        \$('#form_edit_client').html(response);
                        \$('#modal_form_edit_client').modal('show');
                     },
                     error : function(error){
                         alert('erreur de server check client');
                     },
                })
            })

            \$(document).on('click', '#a_modal_modif_client', function(ev){
                ev.preventDefault();
                var source_init = \$(this).attr(\"data-change-source-init\");
                var id = \$(this).attr(\"data-id\");
                var nom = \$('#modif_nom_client').val();
                var prenom = \$('#modif_prenom_client').val();
                var date_arrivee = \$('#modif_date_arrivee').val();
                var date_depart = \$('#modif_date_depart').val();
                var nbr_chambre = \$('#modif_nbr_chambre_client').val();
                var prix_total = \$(\"#modif_prix_total_client\").val();
                var provenance = \$(\"#modif_provenance_client\").val();
                var email = \$(\"#modif_email_client\").val();
                var telephone = \$(\"#modif_telephone_client\").val();
                
                var source = \"\";
                if(provenance == \"OTA\"){
                    source = \$(\"#modal_source_OTA_init select\").val();
                    if(source_init == \"oui\"){
                        source = \$(\"#modal_source_OTA select\").val();
                    }
                }
                if(provenance == \"DIRECT\"){
                    source = \$(\"#modal_source_DIRECT_init select\").val();
                    if(source_init == \"oui\"){
                         source = \$(\"#modal_source_DIRECT select\").val();
                    }
                }
                if(provenance == \"TOA\"){
                    source = \$(\"#modal_source_TOA_init input\").val();
                    if(source_init == \"oui\"){
                        source = \$(\"#modal_source_TOA input\").val();
                    }
                }
                if(provenance == \"CORPO\"){
                    source = \$(\"#modal_source_CORPO_init input\").val();
                    if(source_init == \"oui\"){
                        source = \$(\"#modal_source_CORPO input\").val();
                    }
                }
                var  data = {
                    \"id\" : id,
                    \"nom\"    : nom,
                    \"prenom\" : prenom,
                    \"date_arrivee\"  : date_arrivee,
                    \"date_depart\"   : date_depart,
                    \"nbr_chambre\"   : nbr_chambre,
                    \"prix_total\"    : prix_total,
                    \"provenance\"    : provenance,  
                    \"source\"        : source, 
                    \"email\"         : email,    
                    \"telephone\"     : telephone, 
                }

                \$.ajax({
                    url : \"/profile/edit_client\",
                    data : data,
                    type : \"POST\",
                    beforeSend : function(){
                       \$('#a_modal_modif_client').html('<span>Patienter...</span>'); 
                    },
                    success : function(response){
                        if(response == \"ok\"){
                            table.ajax.reload(function(response){
                                var montant = document.querySelectorAll(\".montant\");
                                var t = montant.length;
                                var test = new Intl.NumberFormat();
                                if (t > 0) {
                                    for (var i = 0; i < t; i++) {
                                        var val = test.format(montant[i].innerHTML);
                                        montant[i].innerHTML = val;
                                    }           
                                }
                            }, false);
                            \$('#modal_form_edit_client').modal('hide');
                        }
                    },
                    error : function(error){
                         alert('erreur de server');
                    },
                    complete : function(){
                          \$('#a_modal_modif_client').html('<span>Enregistrer</span>'); 
                    },
                })
            })


\t\t// triage chart heb_to
\t\t\$('#mois_heb_to').on('change', function () {


\t\t\t\t\$('#element_canvas_heb_to').empty();

\t\t\t\tvar mois = \$('#mois_heb_to').val();
\t\t\t\tvar annee = \$('#annee_heb_to').val();
\t\t\t\tvar data = {
\t\t\t\t'data': mois + \"-\" + annee
\t\t\t\t};
\t\t\t\t\t\$.ajax({
\t\t\t\t\t\turl: \"/profile/filtre/graph/heb_to/\" + pseudo_hotel,
\t\t\t\t\t\ttype: \"POST\",
\t\t\t\t\t\tdata: data,
\t\t\t\t\t\tbeforeSend: function () {
\t\t\t\t\t\t\t\$('.load_canvas_to').css('display', 'flex');
\t\t\t\t\t\t},
\t\t\t\t\t\tsuccess: function (response) {
\t\t\t\t\t\t\tif (response) { // console.log(response);
\t\t\t\t\t\t\t\tif (mois != 'tous_les_mois') {


\t\t\t\t\t\t\t\t\tvar my_data = response;

\t\t\t\t\t\t\t\t\tvar my_labels = [\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\"];

\t\t\t\t\t\t\t\t\t\$('#element_canvas_heb_to').html('<div><canvas id=\"canvas_to\"></canvas></div><div style = \"opacity : 0 !important\" id=\"chart-legends_to\"></div>');

\t\t\t\t\t\t\t\t\tsetTimeout(function () {

\t\t\t\t\t\t\t\t\t\tmyChart1 = new Chart(create_ctx1(), create_config1(my_data, my_labels, 100, 20));
\t\t\t\t\t\t\t\t\t\tmyChart1.update();
\t\t\t\t\t\t\t\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\t\t\t\t\t\t\t\tdocument.getElementById('chart-legends_to').innerHTML = myChart1.generateLegend();

\t\t\t\t\t\t\t\t\t\t// event pour data 1

\t\t\t\t\t\t\t\t\t\tvar ev_click = false;
\t\t\t\t\t\t\t\t\t\tvar tab_temp = [];
\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart1.data.datasets[0].data.length; i++) { // myChart1.data.datasets[0].data[i]= -10;
\t\t\t\t\t\t\t\t\t\t\ttab_temp[i] = myChart1.data.datasets[0].data[i];
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_to\").on('click', \"li span[data_leg=0]\", function () {

\t\t\t\t\t\t\t\t\t\t\tif (ev_click == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_1 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart1.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart1.data.datasets[0].data[i] = -10;
\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\tmyChart1.update();
\t\t\t\t\t\t\t\t\t\t\t\tev_click = ! ev_click;
\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click) ;
\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_1 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart1.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart1.data.datasets[0].data[i] = tab_temp[i];
\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\tmyChart1.update();
\t\t\t\t\t\t\t\t\t\t\t\tev_click = ! ev_click;
\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click) ;
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t});

\t\t\t\t\t\t\t\t\t}, 1000)

\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\tvar my_data = response;
\t\t\t\t\t\t\t\t\tvar my_labels = [\"Jan\",\"Feb\",\"Mar\",\"Apr\",\"May\",\"Jun\",\"Jul\",\"Aug\",\"Sept\",\"Oct\",\"Nov\",\"Dec\"];
\t\t\t\t\t\t\t\t\t\$('#element_canvas_heb_to').html('<div><canvas id=\"canvas_to\"></canvas></div><div style = \"opacity : 0 !important\" id=\"chart-legends_to\"></div>');

\t\t\t\t\t\t\t\t\tsetTimeout(function () {

\t\t\t\t\t\t\t\t\t\tmyChart1 = new Chart(create_ctx1(), create_config1(my_data, my_labels, 100, 20));
\t\t\t\t\t\t\t\t\t\tmyChart1.update();
\t\t\t\t\t\t\t\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\t\t\t\t\t\t\t\tdocument.getElementById('chart-legends_to').innerHTML = myChart1.generateLegend();

\t\t\t\t\t\t\t\t\t\t// event pour data 1

\t\t\t\t\t\t\t\t\t\tvar ev_click = false;
\t\t\t\t\t\t\t\t\t\tvar tab_temp = [];
\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart1.data.datasets[0].data.length; i++) { // myChart1.data.datasets[0].data[i]= -10;
\t\t\t\t\t\t\t\t\t\t\ttab_temp[i] = myChart1.data.datasets[0].data[i];
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_to\").on('click', \"li span[data_leg=0]\", function () {

\t\t\t\t\t\t\t\t\t\t\tif (ev_click == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_1 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart1.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart1.data.datasets[0].data[i] = -10;
\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart1.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click = ! ev_click;
\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click) ;
\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_1 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart1.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart1.data.datasets[0].data[i] = tab_temp[i];
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart1.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click = ! ev_click;
\t\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click) ;
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t});

\t\t\t\t\t\t\t\t\t}, 1000)
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}
\t\t\t\t\t\t},
\t\t\t\t\t\terror: function (error) {
\t\t\t\t\t\t\talert('erreur server au niveau de triage chart heb_to ' + pseudo_hotel)
\t\t\t\t\t\t},
\t\t\t\t\t\tcomplete: function () {
\t\t\t\t\t\t\tsetTimeout(function () {
\t\t\t\t\t\t\t\t\$('.load_canvas_to').css('display', 'none');
\t\t\t\t\t\t\t}, 1000);
\t\t\t\t\t\t}
\t\t\t\t\t})
\t})

\t\t\t\t\t\$('#annee_heb_to').on('change', function () {
\t\t\t\t\t\t\$('#element_canvas_heb_to').empty();
\t\t\t\t\t\tvar mois = \$('#mois_heb_to').val();
\t\t\t\t\t\tvar annee = \$('#annee_heb_to').val();
\t\t\t\t\t\tvar data = {
\t\t\t\t\t\t\t'data': mois + \"-\" + annee
\t\t\t\t\t\t};
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\turl: \"/profile/filtre/graph/heb_to/\" + pseudo_hotel,
\t\t\t\t\t\t\ttype: \"POST\",
\t\t\t\t\t\t\tdata: data,
\t\t\t\t\t\t\tbeforeSend: function () {
\t\t\t\t\t\t\t\t\$('.load_canvas_to').css('display', 'flex');
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\tsuccess: function (response) {
\t\t\t\t\t\t\t\tif (response) { // console.log(response);
\t\t\t\t\t\t\t\tif (mois != 'tous_les_mois') {

\t\t\t\t\t\t\t\tvar my_data = response;

\t\t\t\t\t\t\t\tvar my_labels = [\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\"];


\t\t\t\t\t\t\t\t\$('#element_canvas_heb_to').html('<div><canvas id=\"canvas_to\"></canvas></div><div style = \"opacity : 0 !important\" id=\"chart-legends_to\"></div>');

\t\t\t\t\t\t\t\tsetTimeout(function () {

\t\t\t\t\t\t\t\t\t\tmyChart1 = new Chart(create_ctx1(), create_config1(my_data, my_labels, 100,20));
\t\t\t\t\t\t\t\t\t\tmyChart1.update();
\t\t\t\t\t\t\t\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\t\t\t\t\t\t\t\tdocument.getElementById('chart-legends_to').innerHTML = myChart1.generateLegend();

\t\t\t\t\t\t\t\t\t\t\t// event pour data 1

\t\t\t\t\t\t\t\t\t\tvar ev_click = false;
\t\t\t\t\t\t\t\t\t\tvar tab_temp = [];
\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart1.data.datasets[0].data.length; i++) { // myChart1.data.datasets[0].data[i]= -10;
\t\t\t\t\t\t\t\t\t\t\ttab_temp[i] = myChart1.data.datasets[0].data[i];
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_to\").on('click', \"li span[data_leg=0]\", function () {

\t\t\t\t\t\t\t\t\t\t\tif (ev_click == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_1 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart1.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart1.data.datasets[0].data[i] = -10;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart1.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click = ! ev_click;
\t\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click) ;
\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_1 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart1.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart1.data.datasets[0].data[i] = tab_temp[i];
\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\tmyChart1.update();
\t\t\t\t\t\t\t\t\t\t\t\tev_click = ! ev_click;
\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click) ;
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t}, 1000)
\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\tvar my_data = response;
\t\t\t\t\t\t\t\t\tvar my_labels = [\"Jan\",\"Feb\",\"Mar\",\"Apr\",\"May\",\"Jun\",\"Jul\",\"Aug\",\"Sept\",\"Oct\",\"Nov\",\"Dec\"];;

\t\t\t\t\t\t\t\t\t\$('#element_canvas_heb_to').html('<div><canvas id=\"canvas_to\"></canvas></div><div style = \"opacity : 0 !important\" id=\"chart-legends_to\"></div>');

\t\t\t\t\t\t\t\t\tsetTimeout(function () {

\t\t\t\t\t\t\t\t\t\tmyChart1 = new Chart(create_ctx1(), create_config1(my_data, my_labels, 100, 20));
\t\t\t\t\t\t\t\t\t\tmyChart1.update();
\t\t\t\t\t\t\t\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\t\t\t\t\t\t\t\tdocument.getElementById('chart-legends_to').innerHTML = myChart1.generateLegend();

\t\t\t\t\t\t\t\t\t\t// event pour data 1

\t\t\t\t\t\t\t\t\t\tvar ev_click = false;
\t\t\t\t\t\t\t\t\t\tvar tab_temp = [];
\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart1.data.datasets[0].data.length; i++) { // myChart1.data.datasets[0].data[i]= -10;
\t\t\t\t\t\t\t\t\t\t\ttab_temp[i] = myChart1.data.datasets[0].data[i];
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_to\").on('click', \"li span[data_leg=0]\", function () {

\t\t\t\t\t\t\t\t\t\t\tif (ev_click == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_1 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart1.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart1.data.datasets[0].data[i] = -10;
\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\tmyChart1.update();
\t\t\t\t\t\t\t\t\t\t\t\tev_click = ! ev_click;
\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click) ;
\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_1 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart1.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\tmyChart1.data.datasets[0].data[i] = tab_temp[i];
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\tmyChart1.update();
\t\t\t\t\t\t\t\t\t\t\tev_click = ! ev_click;
\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click) ;
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t});

\t\t\t\t\t\t\t\t}, 1000)
\t\t\t\t\t\t\t}
\t\t\t\t\t\t}
\t\t\t\t\t},

\t\t\t\t\tcomplete: function () {
\t\t\t\t\t\tsetTimeout(function () {
\t\t\t\t\t\t\t\$('.load_canvas_to').css('display', 'none');
\t\t\t\t\t\t}, 1000);
\t\t\t\t\t},
\t\t\t\t\terror: function (error) {
\t\t\t\t\t\talert('erreur server au niveau de triage chart heb_to ' + pseudo_hotel)
\t\t\t\t\t}
\t\t\t\t})
\t\t\t})

\t\t\t\t\t\t// triage chart heb_ca
\t\t\t\t\$('#mois_heb_ca').on('change', function () {

\t\t\t\t\t\t\$('#element_canvas_heb_ca').empty();

\t\t\t\t\t\tvar mois = \$('#mois_heb_ca').val();
\t\t\t\t\t\tvar annee = \$('#annee_heb_ca').val();
\t\t\t\t\t\tvar data = {
\t\t\t\t\t\t\t'data': mois + \"-\" + annee
\t\t\t\t\t\t};
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\turl: \"/profile/filtre/graph/heb_ca/\" + pseudo_hotel,
\t\t\t\t\t\t\ttype: \"POST\",
\t\t\t\t\t\t\tdata: data,
\t\t\t\t\t\t\tbeforeSend: function () {
\t\t\t\t\t\t\t\t\$('.load_canvas_ca').css('display', 'flex');
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\tsuccess: function (response) {
\t\t\t\t\t\t\t\tif (response) { // console.log(response);
\t\t\t\t\t\t\t\t\tif (mois != 'tous_les_mois') {
\t\t\t\t\t\t\t\t\t\tvar my_data = response;
\t\t\t\t\t\t\t\t\t\tvar my_labels = [\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\"];


\t\t\t\t\t\t\t\t\t\t\$('#element_canvas_heb_ca').html('<div><canvas id=\"canvas_ca\"></canvas></div><div style = \"opacity : 0 !important\" id=\"chart-legends_ca\"></div>');

\t\t\t\t\t\t\t\t\t\tsetTimeout(function () {

\t\t\t\t\t\t\t\t\t\t\tvar Max = parseInt(findArrayMax(my_data) + portionner(findArrayMax(my_data)));
\t\t\t\t\t\t\t\t\t\t\tvar pas = portionner(findArrayMax(my_data));
\t\t\t\t\t\t\t\t\t\t\tif(Max != 0){
\t\t\t\t\t\t\t\t\t\t\t\tmyChart2 = new Chart(create_ctx2(), create_config2 (my_data, my_labels, Max, pas));
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\telse if(Max == 0){
\t\t\t\t\t\t\t\t\t\t\t\tMax = 100;
\t\t\t\t\t\t\t\t\t\t\t\tpas = 20; 
\t\t\t\t\t\t\t\t\t\t\t\tmyChart2 = new Chart(create_ctx2(), create_config2 (my_data, my_labels, Max, pas));
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\tmyChart2.update();

\t\t\t\t\t\t\t\t\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\t\t\t\t\t\t\t\t\tdocument.getElementById('chart-legends_ca').innerHTML = myChart2.generateLegend();


\t\t\t\t\t\t\t\t\t\t\t// legende 2

\t\t\t\t\t\t\t\t\t\t\tvar ev_click2 = false;
\t\t\t\t\t\t\t\t\t\t\tvar tab_temp2 = [];
\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart2.data.datasets[0].data.length; i++) { // myChart2.data.datasets[0].data[i]= -10;
\t\t\t\t\t\t\t\t\t\t\t\ttab_temp2[i] = myChart2.data.datasets[0].data[i];
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_ca\").on('click', \"li span[data_leg=0]\", function () {

\t\t\t\t\t\t\t\t\t\t\t\tif (ev_click2 == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart2.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.data.datasets[0].data[i] = -10;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;
\t\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click2) ;
\t\t\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart2.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.data.datasets[0].data[i] = tab_temp2[i];
\t\t\t\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;

\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t}, 1000)
\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\tvar my_data = response;
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\tvar my_labels = [\"Jan\",\"Feb\",\"Mar\",\"Apr\",\"May\",\"Jun\",\"Jul\",\"Aug\",\"Sept\",\"Oct\",\"Nov\",\"Dec\"];

\t\t\t\t\t\t\t\t\t\t\$('#element_canvas_heb_ca').html('<div><canvas id=\"canvas_ca\"></canvas></div><div style = \"opacity : 0 !important\" id=\"chart-legends_ca\"></div>');

\t\t\t\t\t\t\t\t\t\tsetTimeout(function () {
\t\t\t\t\t\t\t\t\t\t\tvar Max = parseInt(findArrayMax(my_data) + portionner(findArrayMax(my_data)));
\t\t\t\t\t\t\t\t\t\t\tvar pas = portionner(findArrayMax(my_data))
\t\t\t\t\t\t\t\t\t\t\tif(Max != 0){
\t\t\t\t\t\t\t\t\t\t\t\tmyChart2 = new Chart(create_ctx2(), create_config2(my_data, my_labels, Max, pas));
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\telse{
\t\t\t\t\t\t\t\t\t\t\t\tMax = 100;
\t\t\t\t\t\t\t\t\t\t\t\tpas = 20;
\t\t\t\t\t\t\t\t\t\t\t\tmyChart2 = new Chart(create_ctx2(), create_config2(my_data, my_labels, Max, pas));
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\tmyChart2.update();

\t\t\t\t\t\t\t\t\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\t\t\t\t\t\t\t\t\tdocument.getElementById('chart-legends_ca').innerHTML = myChart2.generateLegend();


\t\t\t\t\t\t\t\t\t\t\t// legende 2

\t\t\t\t\t\t\t\t\t\t\tvar ev_click2 = false;
\t\t\t\t\t\t\t\t\t\t\tvar tab_temp2 = [];
\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart2.data.datasets[0].data.length; i++) { // myChart2.data.datasets[0].data[i]= -10;
\t\t\t\t\t\t\t\t\t\t\t\ttab_temp2[i] = myChart2.data.datasets[0].data[i];
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_ca\").on('click', \"li span[data_leg=0]\", function () {

\t\t\t\t\t\t\t\t\t\t\t\t\tif (ev_click2 == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart2.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.data.datasets[0].data[i] = -10;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.update();
\t\t\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click2) ;
\t\t\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart2.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.data.datasets[0].data[i] = tab_temp2[i];
\t\t\t\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.update();
\t\t\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t});

\t\t\t\t\t\t\t\t\t\t}, 1000)
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\terror: function (error) {
\t\t\t\t\t\t\t\talert('erreur server au niveau de triage chart heb_to ' + pseudo_hotel)
\t\t\t\t\t\t\t}
\t\t\t\t\t\t})
\t\t\t\t\t})

\t\t\t\t\$('#annee_heb_ca').on('change', function () {

\t\t\t\t\t\$('#element_canvas_heb_ca').empty();

\t\t\t\t\tvar mois = \$('#mois_heb_ca').val();
\t\t\t\t\tvar annee = \$('#annee_heb_ca').val();
\t\t\t\t\tvar data = {
\t\t\t\t\t\t'data': mois + \"-\" + annee
\t\t\t\t\t};
\t\t\t\t\t// alert(data.data);
\t\t\t\t\t\$.ajax({
\t\t\t\t\t\turl: \"/profile/filtre/graph/heb_ca/\" + pseudo_hotel,
\t\t\t\t\t\ttype: \"POST\",
\t\t\t\t\t\tdata: data,
\t\t\t\t\t\tbeforeSend: function () {
\t\t\t\t\t\t\t\$('.load_canvas_ca').css('display', 'flex');
\t\t\t\t\t\t},
\t\t\t\t\t\tsuccess: function (response) {

\t\t\t\t\t\t\tif (response) { // console.log(response);
\t\t\t\t\t\t\t\tif (mois != 'tous_les_mois') {
\t\t\t\t\t\t\t\t\tvar my_data = response;
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\tvar my_labels = [\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\"];


\t\t\t\t\t\t\t\t\t\$('#element_canvas_heb_ca').html('<div><canvas id=\"canvas_ca\"></canvas></div><div style = \"opacity : 0 !important\" id=\"chart-legends_ca\"></div>');

\t\t\t\t\t\t\t\t\tsetTimeout(function () {
\t\t\t\t\t\t\t\t\t\tvar Max = parseInt(findArrayMax(my_data) + portionner(findArrayMax(my_data)));
\t\t\t\t\t\t\t\t\t\tvar pas = portionner(findArrayMax(my_data));
\t\t\t\t\t\t\t\t\t\tif(Max != 0){
\t\t\t\t\t\t\t\t\t\t\tmyChart2 = new Chart(create_ctx2(), create_config2(my_data, my_labels, Max, pas));
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\telse if(Max ==0){
\t\t\t\t\t\t\t\t\t\t\tMax = 100;
\t\t\t\t\t\t\t\t\t\t\tpas = 20;
\t\t\t\t\t\t\t\t\t\t\tmyChart2 = new Chart(create_ctx2(), create_config2(my_data, my_labels, Max, pas));
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\tmyChart2.update();

\t\t\t\t\t\t\t\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\t\t\t\t\t\t\t\tdocument.getElementById('chart-legends_ca').innerHTML = myChart2.generateLegend();


\t\t\t\t\t\t\t\t\t\t// legende 2

\t\t\t\t\t\t\t\t\t\tvar ev_click2 = false;
\t\t\t\t\t\t\t\t\t\tvar tab_temp2 = [];
\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart2.data.datasets[0].data.length; i++) { // myChart2.data.datasets[0].data[i]= -10;
\t\t\t\t\t\t\t\t\t\t\ttab_temp2[i] = myChart2.data.datasets[0].data[i];
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_ca\").on('click', \"li span[data_leg=0]\", function () {

\t\t\t\t\t\t\t\t\t\t\tif (ev_click2 == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart2.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.data.datasets[0].data[i] = -10;
\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.update();
\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;
\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click2) ;
\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart2.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.data.datasets[0].data[i] = tab_temp2[i];
\t\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.update();
\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;

\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t});

\t\t\t\t\t\t\t\t\t}, 1000)

\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\tvar my_data = response;
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\tvar my_labels = [
\t\t\t\t\t\t\t\t\t\t\"Jan\",
\t\t\t\t\t\t\t\t\t\t\"Feb\",
\t\t\t\t\t\t\t\t\t\t\"Mar\",
\t\t\t\t\t\t\t\t\t\t\"Apr\",
\t\t\t\t\t\t\t\t\t\t\"May\",
\t\t\t\t\t\t\t\t\t\t\"Jun\",
\t\t\t\t\t\t\t\t\t\t\"Jul\",
\t\t\t\t\t\t\t\t\t\t\"Aug\",
\t\t\t\t\t\t\t\t\t\t\"Sept\",
\t\t\t\t\t\t\t\t\t\t\"Oct\",
\t\t\t\t\t\t\t\t\t\t\"Nov\",
\t\t\t\t\t\t\t\t\t\t\"Dec\"
\t\t\t\t\t\t\t\t\t\t];

\t\t\t\t\t\t\t\t\t\t\$('#element_canvas_heb_ca').html('<div><canvas id=\"canvas_ca\"></canvas></div><div style = \"opacity : 0 !important\" id=\"chart-legends_ca\"></div>');

\t\t\t\t\t\t\t\t\t\tsetTimeout(function () {

\t\t\t\t\t\t\t\t\t\t\tvar Max = parseInt(findArrayMax(my_data) + portionner(findArrayMax(my_data)));
\t\t\t\t\t\t\t\t\t\t\tvar pas = portionner(findArrayMax(my_data));
\t\t\t\t\t\t\t\t\t\t\tif(Max != 0){
\t\t\t\t\t\t\t\t\t\t\t\tmyChart2 = new Chart(create_ctx2(), create_config2(my_data, my_labels, Max, pas));
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\telse if(Max ==0){
\t\t\t\t\t\t\t\t\t\t\t\tMax = 100;
\t\t\t\t\t\t\t\t\t\t\t\tpas = 20;
\t\t\t\t\t\t\t\t\t\t\t\tmyChart2 = new Chart(create_ctx2(), create_config2(my_data, my_labels, Max, pas));
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\tmyChart2.update();

\t\t\t\t\t\t\t\t\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\t\t\t\t\t\t\t\t\tdocument.getElementById('chart-legends_ca').innerHTML = myChart2.generateLegend();


\t\t\t\t\t\t\t\t\t\t\t// legende 2

\t\t\t\t\t\t\t\t\t\t\tvar ev_click2 = false;
\t\t\t\t\t\t\t\t\t\t\tvar tab_temp2 = [];
\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart2.data.datasets[0].data.length; i++) { // myChart2.data.datasets[0].data[i]= -10;
\t\t\t\t\t\t\t\t\t\t\t\ttab_temp2[i] = myChart2.data.datasets[0].data[i];
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_ca\").on('click', \"li span[data_leg=0]\", function () {

\t\t\t\t\t\t\t\t\t\t\t\tif (ev_click2 == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart2.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.data.datasets[0].data[i] = -10;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;
\t\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click2) ;
\t\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart2.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.data.datasets[0].data[i] = tab_temp2[i];
\t\t\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart2.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;

\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t});

\t\t\t\t\t\t\t\t\t\t}, 1000)
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t},
\t\t\t\t\t\terror: function (error) {
\t\t\t\t\t\t\talert('erreur server au niveau de triage chart heb_ca ' + pseudo_hotel)
\t\t\t\t\t\t}
\t\t\t\t\t})
\t\t\t\t})

\t\t\t\t// mois pax 
\t\t\t\t\$('#mois_pax').on(\"change\", function(){
\t\t\t\t\t\$('#element_canvas_pax').empty();

\t\t\t\t\t\tvar mois = \$('#mois_pax').val();
\t\t\t\t\t\tvar annee = \$('#annee_pax').val();
\t\t\t\t\t\tvar data = {
\t\t\t\t\t\t\t'data': mois + \"-\" + annee
\t\t\t\t\t\t};
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\turl: \"/profile/filtre/graph/pax/\" + pseudo_hotel,
\t\t\t\t\t\t\ttype: \"POST\",
\t\t\t\t\t\t\tdata: data,
\t\t\t\t\t\t\t
\t\t\t\t\t\t\tsuccess: function (response) {
\t\t\t\t\t\t\t\tif (response) {
\t\t\t\t\t\t\t\t\tif (mois != 'tous_les_mois') {
\t\t\t\t\t\t\t\t\t\tvar my_data = response;
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\tvar my_labels = [\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\"];


\t\t\t\t\t\t\t\t\t\t\$('#element_canvas_pax').html('<div><canvas id=\"canvas_pax\"></canvas></div><div id=\"chart-legends_pax\"></div>');

\t\t\t\t\t\t\t\t\t\tsetTimeout(function () {

\t\t\t\t\t\t\t\t\t\t\tvar Max1 = Math.max(...my_data.tab_jour_n_pax);
\t\t\t\t\t\t\t\t\t\t\tvar Max2 = Math.max(...my_data.tab_jour_n_chambre);
\t\t\t\t\t\t\t\t\t\t\tvar Max = Math.max(Max1, Max2);
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\tif(Max != 0){
\t\t\t\t\t\t\t\t\t\t\t\t// fenitra
\t\t\t\t\t\t\t\t\t\t\t\tvar myChart3 = create_chart3(create_ctx3(), create_config3(my_data.tab_jour_n_pax, my_data.tab_jour_n_chambre, my_labels,  5*parseInt(portionner(Max)) , portionner(Max)));
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\telse if(Max == 0){
\t\t\t\t\t\t\t\t\t\t\t\tMax = 100;
\t\t\t\t\t\t\t\t\t\t\t\tpas = 20; 
\t\t\t\t\t\t\t\t\t\t\t\tvar myChart3 = create_chart3(create_ctx3(), create_config3(my_data.tab_heb_n_pax, my_data.tab_heb_n_chambre, my_labels, 100, 20));
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();

\t\t\t\t\t\t\t\t\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\t\t\t\t\t\t\t\t\tdocument.getElementById('chart-legends_pax').innerHTML = myChart3.generateLegend();


\t\t\t\t\t\t\t\t\t\t\t// legende 2

\t\t\t\t\t\t\t\t\t\t\tvar ev_click1 = false;
\t\t\t\t\t\t\t\t\t\t\tvar tab_temp1 = [];
\t\t\t\t\t\t\t\t\t\t\tvar ev_click2 = false;
\t\t\t\t\t\t\t\t\t\t\tvar tab_temp2 = [];
\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[0].data.length; i++) { 
\t\t\t\t\t\t\t\t\t\t\t\ttab_temp1[i] = myChart3.data.datasets[0].data[i];
\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[1].data.length; i++) { 
\t\t\t\t\t\t\t\t\t\t\t\ttab_temp2[i] = myChart3.data.datasets[1].data[i];
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_pax\").on('click', \"li span[data_leg=0]\", function () {

\t\t\t\t\t\t\t\t\t\t\t\tif (ev_click1 == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[0].data[i] = 0;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click1 = ! ev_click1;
\t\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click2) ;
\t\t\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[0].data[i] = tab_temp1[i];
\t\t\t\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click1 = ! ev_click1;

\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_pax\").on('click', \"li span[data_leg=1]\", function () {

\t\t\t\t\t\t\t\t\t\t\t\tif (ev_click2 == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=1]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[1].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[1].data[i] = 0;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;
\t\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click2) ;
\t\t\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=1]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[1].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[1].data[i] = tab_temp2[i];
\t\t\t\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;

\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t}, 1000)
\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t// eto zao
\t\t\t\t\t\t\t\t\t\tvar my_data = response;
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\tvar my_labels = [\"Jan\",\"Feb\",\"Mar\",\"Apr\",\"May\",\"Jun\",\"Jul\",\"Aug\",\"Sept\",\"Oct\",\"Nov\",\"Dec\"];
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\$('#element_canvas_pax').html('<div><canvas id=\"canvas_pax\"></canvas></div><div id=\"chart-legends_pax\"></div>');

\t\t\t\t\t\t\t\t\t\tsetTimeout(function () {
\t\t\t\t\t\t\t\t\t\t\tvar Max1 = Math.max(...my_data.tab_heb_n_pax);
\t\t\t\t\t\t\t\t\t\t\tvar Max2 = Math.max(...my_data.tab_heb_n_chambre);
\t\t\t\t\t\t\t\t\t\t\tvar Max = Math.max(Max1, Max2);
\t\t\t\t\t\t\t\t\t\t\tif(Max != 0){
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\tvar myChart3 = create_chart3(create_ctx3(), create_config3(my_data.tab_heb_n_pax, my_data.tab_heb_n_chambre, my_labels, 5*parseInt(portionner(Max)) , portionner(Max)));
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\telse if(Max == 0){
\t\t\t\t\t\t\t\t\t\t\t\tMax = 100;
\t\t\t\t\t\t\t\t\t\t\t\tpas = 20; 
\t\t\t\t\t\t\t\t\t\t\t\tvar myChart3 = create_chart3(create_ctx3(), create_config3(my_data.tab_heb_n_pax, my_data.tab_heb_n_chambre, my_labels, 100, 20));
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();

\t\t\t\t\t\t\t\t\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\t\t\t\t\t\t\t\t\tdocument.getElementById('chart-legends_pax').innerHTML = myChart3.generateLegend();


\t\t\t\t\t\t\t\t\t\t\t// legende 2

\t\t\t\t\t\t\t\t\t\t\tvar ev_click1 = false;
\t\t\t\t\t\t\t\t\t\t\tvar tab_temp1 = [];
\t\t\t\t\t\t\t\t\t\t\tvar ev_click2 = false;
\t\t\t\t\t\t\t\t\t\t\tvar tab_temp2 = [];
\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[0].data.length; i++) { 
\t\t\t\t\t\t\t\t\t\t\t\ttab_temp1[i] = myChart3.data.datasets[0].data[i];
\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[1].data.length; i++) { 
\t\t\t\t\t\t\t\t\t\t\t\ttab_temp2[i] = myChart3.data.datasets[1].data[i];
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_pax\").on('click', \"li span[data_leg=0]\", function () {

\t\t\t\t\t\t\t\t\t\t\t\tif (ev_click1 == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[0].data[i] = 0;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click1 = ! ev_click1;
\t\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click2) ;
\t\t\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[0].data[i] = tab_temp1[i];
\t\t\t\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click1 = ! ev_click1;

\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_pax\").on('click', \"li span[data_leg=1]\", function () {

\t\t\t\t\t\t\t\t\t\t\t\tif (ev_click2 == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=1]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[1].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[1].data[i] = 0;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;
\t\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click2) ;
\t\t\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=1]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[1].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[1].data[i] = tab_temp2[i];
\t\t\t\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;

\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t});

\t\t\t\t\t\t\t\t\t\t}, 1000)
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\terror: function (error) {
\t\t\t\t\t\t\t\talert('erreur server au niveau de triage chart heb_to ' + pseudo_hotel)
\t\t\t\t\t\t\t}
\t\t\t\t\t\t})
\t\t\t\t})

\t\t\t\t\$('#annee_pax').on(\"change\", function(){
\t\t\t\t\t\$('#element_canvas_pax').empty();

\t\t\t\t\t\tvar mois = \$('#mois_pax').val();
\t\t\t\t\t\tvar annee = \$('#annee_pax').val();
\t\t\t\t\t\tvar data = {
\t\t\t\t\t\t\t'data': mois + \"-\" + annee
\t\t\t\t\t\t};
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\turl: \"/profile/filtre/graph/pax/\" + pseudo_hotel,
\t\t\t\t\t\t\ttype: \"POST\",
\t\t\t\t\t\t\tdata: data,
\t\t\t\t\t\t\tsuccess: function (response) {
\t\t\t\t\t\t\t\tif (response) {
\t\t\t\t\t\t\t\t\tif (mois != 'tous_les_mois') {
\t\t\t\t\t\t\t\t\t\tvar my_data = response;
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\tvar my_labels = [\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\"];


\t\t\t\t\t\t\t\t\t\t\$('#element_canvas_pax').html('<div><canvas id=\"canvas_pax\"></canvas></div><div id=\"chart-legends_pax\"></div>');

\t\t\t\t\t\t\t\t\t\tsetTimeout(function () {

\t\t\t\t\t\t\t\t\t\t\tvar Max1 = Math.max(...my_data.tab_jour_n_pax);
\t\t\t\t\t\t\t\t\t\t\tvar Max2 = Math.max(...my_data.tab_jour_n_chambre);
\t\t\t\t\t\t\t\t\t\t\tvar Max = Math.max(Max1, Max2);
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\tif(Max != 0){
\t\t\t\t\t\t\t\t\t\t\t\t// fenitra
\t\t\t\t\t\t\t\t\t\t\t\tvar myChart3 = create_chart3(create_ctx3(), create_config3(my_data.tab_jour_n_pax, my_data.tab_jour_n_chambre, my_labels,  Max + parseInt(Max / 4) , portionner(Max)));
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\telse if(Max == 0){
\t\t\t\t\t\t\t\t\t\t\t\tMax = 100;
\t\t\t\t\t\t\t\t\t\t\t\tpas = 20; 
\t\t\t\t\t\t\t\t\t\t\t\tvar myChart3 = create_chart3(create_ctx3(), create_config3(my_data.tab_heb_n_pax, my_data.tab_heb_n_chambre, my_labels, 100, 20));
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();

\t\t\t\t\t\t\t\t\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\t\t\t\t\t\t\t\t\tdocument.getElementById('chart-legends_pax').innerHTML = myChart3.generateLegend();


\t\t\t\t\t\t\t\t\t\t\t// legende 2

\t\t\t\t\t\t\t\t\t\t\tvar ev_click1 = false;
\t\t\t\t\t\t\t\t\t\t\tvar tab_temp1 = [];
\t\t\t\t\t\t\t\t\t\t\tvar ev_click2 = false;
\t\t\t\t\t\t\t\t\t\t\tvar tab_temp2 = [];
\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[0].data.length; i++) { 
\t\t\t\t\t\t\t\t\t\t\t\ttab_temp1[i] = myChart3.data.datasets[0].data[i];
\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[1].data.length; i++) { 
\t\t\t\t\t\t\t\t\t\t\t\ttab_temp2[i] = myChart3.data.datasets[1].data[i];
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_pax\").on('click', \"li span[data_leg=0]\", function () {

\t\t\t\t\t\t\t\t\t\t\t\tif (ev_click1 == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[0].data[i] = 0;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click1 = ! ev_click1;
\t\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click2) ;
\t\t\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[0].data[i] = tab_temp1[i];
\t\t\t\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click1 = ! ev_click1;

\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_pax\").on('click', \"li span[data_leg=1]\", function () {

\t\t\t\t\t\t\t\t\t\t\t\tif (ev_click2 == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=1]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[1].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[1].data[i] = 0;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;
\t\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click2) ;
\t\t\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=1]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[1].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[1].data[i] = tab_temp2[i];
\t\t\t\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;

\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t}, 1000)
\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t// eto zao
\t\t\t\t\t\t\t\t\t\tvar my_data = response;
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\tvar my_labels = [\"Jan\",\"Feb\",\"Mar\",\"Apr\",\"May\",\"Jun\",\"Jul\",\"Aug\",\"Sept\",\"Oct\",\"Nov\",\"Dec\"];
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\$('#element_canvas_pax').html('<div><canvas id=\"canvas_pax\"></canvas></div><div id=\"chart-legends_pax\"></div>');

\t\t\t\t\t\t\t\t\t\tsetTimeout(function () {
\t\t\t\t\t\t\t\t\t\t\tvar Max1 = Math.max(...my_data.tab_heb_n_pax);
\t\t\t\t\t\t\t\t\t\t\tvar Max2 = Math.max(...my_data.tab_heb_n_chambre);
\t\t\t\t\t\t\t\t\t\t\tvar Max = Math.max(Max1, Max2);
\t\t\t\t\t\t\t\t\t\t\tif(Max != 0){
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\tvar myChart3 = create_chart3(create_ctx3(), create_config3(my_data.tab_heb_n_pax, my_data.tab_heb_n_chambre, my_labels,  Max + parseInt(Max / 4) , portionner(Max)));
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\telse if(Max == 0){
\t\t\t\t\t\t\t\t\t\t\t\tMax = 100;
\t\t\t\t\t\t\t\t\t\t\t\tpas = 20; 
\t\t\t\t\t\t\t\t\t\t\t\tvar myChart3 = create_chart3(create_ctx3(), create_config3(my_data.tab_heb_n_pax, my_data.tab_heb_n_chambre, my_labels, 100, 20));
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();

\t\t\t\t\t\t\t\t\t\t\t// pour dire qu'on va utiliser notre propre légende html fenitra
\t\t\t\t\t\t\t\t\t\t\tdocument.getElementById('chart-legends_pax').innerHTML = myChart3.generateLegend();


\t\t\t\t\t\t\t\t\t\t\t// legende 2

\t\t\t\t\t\t\t\t\t\t\tvar ev_click1 = false;
\t\t\t\t\t\t\t\t\t\t\tvar tab_temp1 = [];
\t\t\t\t\t\t\t\t\t\t\tvar ev_click2 = false;
\t\t\t\t\t\t\t\t\t\t\tvar tab_temp2 = [];
\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[0].data.length; i++) { 
\t\t\t\t\t\t\t\t\t\t\t\ttab_temp1[i] = myChart3.data.datasets[0].data[i];
\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[1].data.length; i++) { 
\t\t\t\t\t\t\t\t\t\t\t\ttab_temp2[i] = myChart3.data.datasets[1].data[i];
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_pax\").on('click', \"li span[data_leg=0]\", function () {

\t\t\t\t\t\t\t\t\t\t\t\tif (ev_click1 == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[0].data[i] = 0;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click1 = ! ev_click1;
\t\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click2) ;
\t\t\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=0]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[0].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[0].data[i] = tab_temp1[i];
\t\t\t\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click1 = ! ev_click1;

\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t\$(\"#chart-legends_pax\").on('click', \"li span[data_leg=1]\", function () {

\t\t\t\t\t\t\t\t\t\t\t\tif (ev_click2 == false) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=1]\").addClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[1].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[1].data[i] = 0;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;
\t\t\t\t\t\t\t\t\t\t\t\t\t// alert(ev_click2) ;
\t\t\t\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\".ul_2 li span[data_leg=1]\").removeClass(\"legende_click\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\tfor (var i = 0; i < myChart3.data.datasets[1].data.length; i++) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.data.datasets[1].data[i] = tab_temp2[i];
\t\t\t\t\t\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\t\t\t\t\tmyChart3.update();
\t\t\t\t\t\t\t\t\t\t\t\t\tev_click2 = ! ev_click2;

\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t});

\t\t\t\t\t\t\t\t\t\t}, 1000)
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\terror: function (error) {
\t\t\t\t\t\t\t\talert('erreur server au niveau de triage chart heb_to ' + pseudo_hotel)
\t\t\t\t\t\t\t}
\t\t\t\t\t\t})
\t\t\t\t})

\t\t\t\t\$('#annee_kpi').on('change', function(){
\t\t\t\t\t\t\$(\"#element_canvas_KPI\").empty();
\t\t\t\t\t\tvar annee = \$('#annee_kpi').val();
\t\t\t\t\t\tvar data = {'data' : annee};
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\turl : \"/profile/filtre/graph/kpi/\"+pseudo_hotel,
\t\t\t\t\t\t\ttype : \"POST\",
\t\t\t\t\t\t\tdata : data,
\t\t\t\t\t\t\tsuccess : function(response){
\t\t\t\t\t\t\t\tvar my_data = response;
                                console.log(my_data);
\t\t\t\t\t\t\t\tvar my_data_adr = my_data.data_adr;
\t\t\t\t\t\t\t\tvar my_data_revp = my_data.data_revp;

\t\t\t\t\t\t\t\tvar souche_adr = {
\t\t\t\t\t\t\t\t\t\t'0' : 0,
\t\t\t\t\t\t\t\t\t\t'1' : 0,
\t\t\t\t\t\t\t\t\t\t'2' : 0,
\t\t\t\t\t\t\t\t\t\t'3' : 0,
\t\t\t\t\t\t\t\t\t\t'4' : 0,
\t\t\t\t\t\t\t\t\t\t'5' : 0,
\t\t\t\t\t\t\t\t\t\t'6' : 0,
\t\t\t\t\t\t\t\t\t\t'7' : 0,
\t\t\t\t\t\t\t\t\t\t'8' : 0,
\t\t\t\t\t\t\t\t\t\t'9' : 0,
\t\t\t\t\t\t\t\t\t\t'10' : 0,
\t\t\t\t\t\t\t\t\t\t'11' : 0
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\tfor (var item in my_data_adr) {
\t\t\t\t\t\t\t\t\t\tsouche_adr[item] = my_data_adr[item];
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t//console.log(souche);
\t\t\t\t\t\t\t\t\tvar souche2_adr  = [];
\t\t\t\t\t\t\t\t\tfor (var item in souche_adr) {
\t\t\t\t\t\t\t\t\t\tsouche2_adr.push(souche_adr[item]);
\t\t\t\t\t\t\t\t\t}

\t\t\t\t\t\t\t\t\tvar souche_revp = {
\t\t\t\t\t\t\t\t\t\t'0' : 0,
\t\t\t\t\t\t\t\t\t\t'1' : 0,
\t\t\t\t\t\t\t\t\t\t'2' : 0,
\t\t\t\t\t\t\t\t\t\t'3' : 0,
\t\t\t\t\t\t\t\t\t\t'4' : 0,
\t\t\t\t\t\t\t\t\t\t'5' : 0,
\t\t\t\t\t\t\t\t\t\t'6' : 0,
\t\t\t\t\t\t\t\t\t\t'7' : 0,
\t\t\t\t\t\t\t\t\t\t'8' : 0,
\t\t\t\t\t\t\t\t\t\t'9' : 0,
\t\t\t\t\t\t\t\t\t\t'10' : 0,
\t\t\t\t\t\t\t\t\t\t'11' : 0
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\tfor (var item in my_data_revp) {
\t\t\t\t\t\t\t\t\t\tsouche_revp[item] = my_data_revp[item];
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t//console.log(souche);
\t\t\t\t\t\t\t\t\tvar souche2_revp  = [];
\t\t\t\t\t\t\t\t\tfor (var item in souche_revp) {
\t\t\t\t\t\t\t\t\t\tsouche2_revp.push(souche_revp[item]);
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\tvar max_adr = findArrayMax(souche2_adr);
\t\t\t\t\t\t\t\t\tvar max_revp = findArrayMax(souche2_revp);
\t\t\t\t\t\t\t\t\tvar ex = [max_adr, max_revp];
\t\t\t\t\t\t\t\t\tvar max_kpi = findArrayMax(ex);

                                var my_labels = [\"Jan\",\"Feb\",\"Mar\",\"Apr\",\"May\",\"Jun\",\"Jul\",\"Aug\",\"Sept\",\"Oct\",\"Nov\",\"Dec\"];
                                var w = \$(window).width();
\t\t\t\t\t\t\t\t\$(\"#element_canvas_KPI\").html('<div><canvas id=\"canvas_KPI\"></canvas></div><div id=\"chart-legends_KPI\"></div>');
                                if (w <= 768) {
\t\t\t\t\t\t\t\t\tif(max_kpi != 0){
\t\t\t\t\t\t\t\t\t\tvar myChart4 = create_chart4(create_ctx4(), create_config4(souche2_adr, souche2_revp, my_labels,  5*parseInt(portionner(max_kpi)) , portionner(max_kpi)));
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\telse if(max_kpi == 0){
\t\t\t\t\t\t\t\t\t\tvar myChart4 = create_chart4(create_ctx4(), create_config4(souche2_adr, souche2_revp, my_labels, 100, 20));
\t\t\t\t\t\t\t\t\t}
                                    myChart4.update();
                                    //add_resp_heb(myChart1, myChart2);
                                } else {
                                    if(max_kpi != 0){
\t\t\t\t\t\t\t\t\t\tvar myChart4 = create_chart4(create_ctx4(), create_config4(souche2_adr, souche2_revp, my_labels,  5*parseInt(portionner(max_kpi)) , portionner(max_kpi)));
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\telse if(max_kpi == 0){
\t\t\t\t\t\t\t\t\t\tvar myChart4 = create_chart4(create_ctx4(), create_config4(souche2_adr, souche2_revp, my_labels, 100, 20));
\t\t\t\t\t\t\t\t\t}
                                    myChart4.update();
                                }
\t\t\t\t\t\t\t}, 
\t\t\t\t\t\t\terror : function(error){
\t\t\t\t\t\t\t\talert('erreur server au niveau de triage stock '+pseudo_hotel)
\t\t\t\t\t\t\t}
\t\t\t\t\t\t})
\t\t\t\t})

\t\t\t\tfunction reinitialise_modal_source(){
\t\t\t\t\t\$(\".modal_source\").hide();
\t\t\t\t\tvar prov = \$(\"#modif_provenance_client\").val();
\t\t\t\t\t//alert(prov);
\t\t\t\t\t\$(\"#modal_source_\" + prov).show();
\t\t\t\t}

\t\t\t\t\$(document).on(\"change\", \"#modif_provenance_client\", function(){
\t\t\t\t\t
\t\t\t\t\t\$(\".modal_source_init\").hide();
\t\t\t\t\t\$(\"#a_modal_modif_client\").attr(\"data-change-source-init\", \"oui\");
\t\t\t\t\treinitialise_modal_source();
\t\t\t\t})
\t\t\t\t
\t\t\t\treinitialise_modal_source();
\t\t})
\t</script>


";
    }

    public function getTemplateName()
    {
        return "page/hebergement.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1457 => 1190,  533 => 268,  527 => 266,  525 => 265,  522 => 264,  516 => 262,  514 => 261,  497 => 256,  484 => 255,  470 => 253,  456 => 251,  452 => 249,  448 => 248,  434 => 237,  432 => 236,  429 => 235,  427 => 234,  414 => 228,  406 => 227,  402 => 226,  397 => 225,  390 => 219,  384 => 217,  381 => 216,  375 => 214,  373 => 213,  364 => 206,  348 => 191,  341 => 189,  333 => 188,  325 => 186,  322 => 185,  318 => 184,  309 => 177,  305 => 175,  303 => 174,  299 => 172,  296 => 170,  279 => 154,  268 => 152,  264 => 151,  240 => 129,  236 => 127,  234 => 126,  229 => 123,  212 => 107,  201 => 105,  197 => 104,  173 => 82,  169 => 80,  167 => 79,  150 => 64,  145 => 60,  134 => 58,  130 => 57,  104 => 33,  100 => 31,  98 => 30,  81 => 15,  79 => 14,  73 => 10,  69 => 9,  62 => 7,  58 => 6,  53 => 3,  49 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "page/hebergement.html.twig", "/home/dashboy/www/templates/page/hebergement.html.twig");
    }
}
