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

/* nav2.html.twig */
class __TwigTemplate_0a0670c0c8ef223e4301f0764ce7b636b7d7a9dd61360b0b279586a63877c7b3 extends Template
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
        echo "<div id=\"top-content\">
\t<div id=\"entete_fixed\">
\t\t<div class=\"div__button_toggle_nav\">
\t\t\t<a href=\"#\" id=\"btn_drop_side_menu\">
\t\t\t\t<i data-show=\"show-side-navigation1\" class=\"fa fa-bars show-side-btn\"></i>
\t\t\t</a>
\t\t</div>
\t\t<ul>
\t\t\t";
        // line 9
        if ((0 === twig_compare(($context["groupe"] ?? null), "sounds"))) {
            // line 10
            echo "\t\t\t\t";
            if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 10), "hotel", [], "any", false, false, false, 10), "tous"))) {
                // line 11
                echo "\t\t\t\t\t";
                if ((0 === twig_compare(($context["hotel"] ?? null), "royal_beach"))) {
                    // line 12
                    echo "\t\t\t\t\t\t<li ";
                    if ((0 === twig_compare(($context["hotel"] ?? null), "royal_beach"))) {
                        echo " class=\"logo_active\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t<a href=\"";
                    // line 13
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("royal_beach", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 15
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo1.png"), "html", null, true);
                    echo "\" alt=\"logo1\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                }
                // line 20
                echo "\t\t\t\t";
            } else {
                // line 21
                echo "\t\t\t\t\t<li ";
                if ((0 === twig_compare(($context["hotel"] ?? null), "royal_beach"))) {
                    echo " class=\"logo_active\" ";
                }
                echo ">
\t\t\t\t\t\t<a href=\"";
                // line 22
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("royal_beach", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<img src=\"";
                // line 24
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo1.png"), "html", null, true);
                echo "\" alt=\"logo1\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            // line 29
            echo "
\t\t\t\t";
            // line 30
            if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 30), "hotel", [], "any", false, false, false, 30), "tous"))) {
                // line 31
                echo "\t\t\t\t\t";
                if ((0 === twig_compare(($context["hotel"] ?? null), "calypso"))) {
                    // line 32
                    echo "\t\t\t\t\t\t<li ";
                    if ((0 === twig_compare(($context["hotel"] ?? null), "calypso"))) {
                        echo " class=\"logo_active\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t<a href=\"";
                    // line 33
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("calypso", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 35
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo2.png"), "html", null, true);
                    echo "\" alt=\"logo2\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                }
                // line 40
                echo "\t\t\t\t";
            } else {
                // line 41
                echo "\t\t\t\t\t<li ";
                if ((0 === twig_compare(($context["hotel"] ?? null), "calypso"))) {
                    echo " class=\"logo_active\" ";
                }
                echo ">
\t\t\t\t\t\t<a href=\"";
                // line 42
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("calypso", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<img src=\"";
                // line 44
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo2.png"), "html", null, true);
                echo "\" alt=\"logo2\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            // line 49
            echo "
\t\t\t\t";
            // line 50
            if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 50), "hotel", [], "any", false, false, false, 50), "tous"))) {
                // line 51
                echo "\t\t\t\t\t";
                if ((0 === twig_compare(($context["hotel"] ?? null), "baobab_tree"))) {
                    // line 52
                    echo "\t\t\t\t\t\t<li ";
                    if ((0 === twig_compare(($context["hotel"] ?? null), "baobab_tree"))) {
                        echo " class=\"logo_active\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t<a href=\"";
                    // line 53
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("baobab_tree", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 55
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo3.png"), "html", null, true);
                    echo "\" alt=\"logo3\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                }
                // line 60
                echo "\t\t\t\t";
            } else {
                // line 61
                echo "\t\t\t\t\t<li ";
                if ((0 === twig_compare(($context["hotel"] ?? null), "baobab_tree"))) {
                    echo " class=\"logo_active\" ";
                }
                echo ">
\t\t\t\t\t\t<a href=\"";
                // line 62
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("baobab_tree", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<img src=\"";
                // line 64
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo3.png"), "html", null, true);
                echo "\" alt=\"logo3\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            // line 69
            echo "
\t\t\t\t";
            // line 70
            if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 70), "hotel", [], "any", false, false, false, 70), "tous"))) {
                // line 71
                echo "\t\t\t\t\t";
                if ((0 === twig_compare(($context["hotel"] ?? null), "vanila_hotel"))) {
                    // line 72
                    echo "\t\t\t\t\t\t<li ";
                    if ((0 === twig_compare(($context["hotel"] ?? null), "vanila_hotel"))) {
                        echo " class=\"logo_active\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t<a href=\"";
                    // line 73
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("vanila_hotel", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 75
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo4.png"), "html", null, true);
                    echo "\" alt=\"logo4\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                }
                // line 80
                echo "\t\t\t\t";
            } else {
                // line 81
                echo "\t\t\t\t\t<li ";
                if ((0 === twig_compare(($context["hotel"] ?? null), "vanila_hotel"))) {
                    echo " class=\"logo_active\" ";
                }
                echo ">
\t\t\t\t\t\t<a href=\"";
                // line 82
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("vanila_hotel", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<img src=\"";
                // line 84
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo4.png"), "html", null, true);
                echo "\" alt=\"logo4\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            // line 89
            echo "\t\t\t\t<li id=\"nav_fixed_top_tw\">
\t\t\t\t\t<a href=\"";
            // line 90
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fidelisation_home", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
            echo "\">
\t\t\t\t\t\t<div id=\"div_logo_f\" style=\"background:#d29e00 !important; border:5px solid rgba(189,189,189);padding:5px;\">
\t\t\t\t\t\t\t<img style=\"width:30px !important;\" src=\"";
            // line 92
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/fidelisation/icone_logo_f.png"), "html", null, true);
            echo "\" alt=\"logo5\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 97
        echo "\t\t\t";
        if ((0 === twig_compare(($context["groupe"] ?? null), "tropical_wood"))) {
            // line 98
            echo "\t\t\t\t<li id=\"li_tropical\" class=\"logo_active\">
\t\t\t\t\t<a href=\"";
            // line 99
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("tropical_wood");
            echo "\">
\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<img src=\"";
            // line 101
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/tropical.png"), "html", null, true);
            echo "\" alt=\"tw\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 106
        echo "\t\t</ul>
\t\t<div class=\"div__button_logout\">
\t\t\t<a href=\"";
        // line 108
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        echo "\">
\t\t\t\t<span aria-hidden=\"true\" class=\"fa fa-sign-out fa-2x\"></span>
\t\t\t</a>
\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "nav2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  290 => 108,  286 => 106,  278 => 101,  273 => 99,  270 => 98,  267 => 97,  259 => 92,  254 => 90,  251 => 89,  243 => 84,  238 => 82,  231 => 81,  228 => 80,  220 => 75,  215 => 73,  208 => 72,  205 => 71,  203 => 70,  200 => 69,  192 => 64,  187 => 62,  180 => 61,  177 => 60,  169 => 55,  164 => 53,  157 => 52,  154 => 51,  152 => 50,  149 => 49,  141 => 44,  136 => 42,  129 => 41,  126 => 40,  118 => 35,  113 => 33,  106 => 32,  103 => 31,  101 => 30,  98 => 29,  90 => 24,  85 => 22,  78 => 21,  75 => 20,  67 => 15,  62 => 13,  55 => 12,  52 => 11,  49 => 10,  47 => 9,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "nav2.html.twig", "/home/dashboy/www/templates/nav2.html.twig");
    }
}
