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

/* base.html.twig */
class __TwigTemplate_87fe4e7b0bda27c9f6163a962bd719c012f9c81e42e5ab334b01e0cd4d71bb0c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
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
\t\t\t";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        // line 8
        echo "\t\t</title>
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=Edge\">
\t\t<meta name=\"description\" content=\"\">
\t\t<meta name=\"keywords\" content=\"\">
\t\t<meta name=\"author\" content=\"\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
\t\t<link href=\"https://fonts.googleapis.com/css?family=Lato:200,300,400,500,600,700,800,900,1000&display=swap\" rel=\"stylesheet\">

\t\t<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css\">
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css\"/>
\t\t<link href=\"https://fonts.googleapis.com/css?family=Droid+Sans\" rel=\"stylesheet\">
\t\t<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\">
\t\t<link rel=\"stylesheet\" href=\"https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css\">
\t\t<link rel=\"stylesheet\" href=\"https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap.min.css\">
\t\t<link rel=\"stylesheet\" href=\"https://cdn.datatables.net/responsive/2.2.4/css/responsive.bootstrap.min.css\">

\t\t";
        // line 24
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 25
        echo "\t\t</head>
\t\t<body>
\t\t\t";
        // line 28
        echo "\t\t\t<div class=\"loader-wrapper\">
\t\t\t\t<div class=\"loader\"></div>

\t\t\t\t<div class=\"loader-section section-left\"></div>
\t\t\t\t<div class=\"loader-section section-right\"></div>
\t\t\t</div>
\t\t\t";
        // line 35
        echo "
\t\t\t";
        // line 37
        echo "
\t\t\t";
        // line 38
        $context["session"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, false, false, 38), "get", [0 => "hotel"], "method", false, false, false, 38);
        // line 39
        echo "\t\t\t";
        $context["groupe"] = (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["session"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["groupe"] ?? null) : null);
        // line 40
        echo "
\t\t\t";
        // line 41
        if (twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 41)) {
            // line 42
            echo "\t\t\t\t
\t\t\t\t<aside class=\"side-nav\" id=\"show-side-navigation1\">
\t\t\t\t\t<div id=\"aside1\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t";
            // line 47
            echo "\t\t\t\t\t\t\t";
            if ((0 === twig_compare(($context["groupe"] ?? null), "sounds"))) {
                // line 48
                echo "\t\t\t\t\t\t\t\t";
                $context["array_admin_hotel"] = [0 => "tous", 1 => "tous_hotel"];
                // line 49
                echo "\t\t\t\t\t\t\t\t";
                if (!twig_in_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 49), "hotel", [], "any", false, false, false, 49), ($context["array_admin_hotel"] ?? null))) {
                    // line 50
                    echo "\t\t\t\t\t\t\t\t\t";
                    if ((0 === twig_compare(($context["hotel"] ?? null), "royal_beach"))) {
                        // line 51
                        echo "\t\t\t\t\t\t\t\t\t\t<li ";
                        if ((0 === twig_compare(($context["hotel"] ?? null), "royal_beach"))) {
                            echo " class=\"logo_active\" ";
                        }
                        echo ">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 52
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("royal_beach", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        // line 54
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo1.png"), "html", null, true);
                        echo "\" alt=\"logo1\">
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 59
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    // line 60
                    echo "\t\t\t\t\t\t\t\t\t<li ";
                    if ((0 === twig_compare(($context["hotel"] ?? null), "royal_beach"))) {
                        echo " class=\"logo_active\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 61
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("royal_beach", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 63
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo1.png"), "html", null, true);
                    echo "\" alt=\"logo1\">
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
                }
                // line 68
                echo "\t\t\t\t\t\t\t\t";
                if (!twig_in_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 68), "hotel", [], "any", false, false, false, 68), ($context["array_admin_hotel"] ?? null))) {
                    // line 69
                    echo "\t\t\t\t\t\t\t\t\t";
                    if ((0 === twig_compare(($context["hotel"] ?? null), "calypso"))) {
                        // line 70
                        echo "\t\t\t\t\t\t\t\t\t\t<li ";
                        if ((0 === twig_compare(($context["hotel"] ?? null), "calypso"))) {
                            echo " class=\"logo_active\" ";
                        }
                        echo ">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 71
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("calypso", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        // line 73
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo2.png"), "html", null, true);
                        echo "\" alt=\"logo2\">
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 78
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    // line 79
                    echo "\t\t\t\t\t\t\t\t\t<li ";
                    if ((0 === twig_compare(($context["hotel"] ?? null), "calypso"))) {
                        echo " class=\"logo_active\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 80
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("calypso", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 82
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo2.png"), "html", null, true);
                    echo "\" alt=\"logo2\">
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
                }
                // line 87
                echo "\t\t\t\t\t\t\t\t";
                if (!twig_in_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 87), "hotel", [], "any", false, false, false, 87), ($context["array_admin_hotel"] ?? null))) {
                    // line 88
                    echo "\t\t\t\t\t\t\t\t\t";
                    if ((0 === twig_compare(($context["hotel"] ?? null), "baobab_tree"))) {
                        // line 89
                        echo "\t\t\t\t\t\t\t\t\t\t<li ";
                        if ((0 === twig_compare(($context["hotel"] ?? null), "baobab_tree"))) {
                            echo " class=\"logo_active\" ";
                        }
                        echo ">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 90
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("baobab_tree", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        // line 92
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo3.png"), "html", null, true);
                        echo "\" alt=\"logo3\">
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t";
                    }
                    // line 98
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    // line 99
                    echo "\t\t\t\t\t\t\t\t\t<li ";
                    if ((0 === twig_compare(($context["hotel"] ?? null), "baobab_tree"))) {
                        echo " class=\"logo_active\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 100
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("baobab_tree", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 102
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo3.png"), "html", null, true);
                    echo "\" alt=\"logo3\">
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t";
                }
                // line 108
                echo "\t\t\t\t\t\t\t\t";
                if (!twig_in_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 108), "hotel", [], "any", false, false, false, 108), ($context["array_admin_hotel"] ?? null))) {
                    // line 109
                    echo "\t\t\t\t\t\t\t\t\t";
                    if ((0 === twig_compare(($context["hotel"] ?? null), "vanila_hotel"))) {
                        // line 110
                        echo "\t\t\t\t\t\t\t\t\t\t<li ";
                        if ((0 === twig_compare(($context["hotel"] ?? null), "vanila_hotel"))) {
                            echo " class=\"logo_active\" ";
                        }
                        echo ">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 111
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("vanila_hotel", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        // line 113
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo4.png"), "html", null, true);
                        echo "\" alt=\"logo4\">
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 118
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    // line 119
                    echo "\t\t\t\t\t\t\t\t\t<li ";
                    if ((0 === twig_compare(($context["hotel"] ?? null), "vanila_hotel"))) {
                        echo " class=\"logo_active\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 120
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("vanila_hotel", ["current_page" => ($context["current_page"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 122
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hazo4.png"), "html", null, true);
                    echo "\" alt=\"logo4\">
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
                }
                // line 127
                echo "\t\t\t\t\t\t\t\t<li 
\t\t\t\t\t\t\t\t\t";
                // line 128
                if (((isset($context["fidelisation"]) || array_key_exists("fidelisation", $context)) && (0 === twig_compare(($context["fidelisation"] ?? null), true)))) {
                    // line 129
                    echo "\t\t\t\t\t\t\t\t\t\tclass=\"logo_active_fidelisation\"
\t\t\t\t\t\t\t\t\t";
                }
                // line 131
                echo "\t\t\t\t\t\t\t\t>
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 132
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fidelisation_home", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
                echo "\">\t
\t\t\t\t\t\t\t\t\t\t<div id=\"div_logo_f\" style=\"background:#d29e00 !important; border:5px solid rgba(189,189,189);padding:5px;\">
\t\t\t\t\t\t\t\t\t\t\t<img style=\"width:30px !important;\" src=\"";
                // line 134
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/fidelisation/icone_logo_f.png"), "html", null, true);
                echo "\" alt=\"logo5\">
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t";
            }
            // line 140
            echo "
\t\t\t\t\t\t\t";
            // line 142
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            // line 143
            if ((0 === twig_compare(($context["groupe"] ?? null), "tropical_wood"))) {
                // line 144
                echo "\t\t\t\t\t\t\t\t<li id=\"li_tropical\" class=\"logo_active\">
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 145
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("tropical_wood");
                echo "\">
\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                // line 147
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/tropical.png"), "html", null, true);
                echo "\" alt=\"tw\">
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
            }
            // line 152
            echo "\t\t\t\t\t\t\t";
            // line 153
            echo "\t\t\t\t\t\t\t<li id=\"log_out\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 155
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            echo "\">
\t\t\t\t\t\t\t\t\t\t<span aria-hidden=\"true\" class=\"fa fa-sign-out fa-2x\"></span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"aside2\" 
\t\t\t\t\t\t";
            // line 163
            if (((isset($context["fidelisation"]) || array_key_exists("fidelisation", $context)) && (0 === twig_compare(($context["fidelisation"] ?? null), true)))) {
                // line 164
                echo "\t\t\t\t\t\t\tstyle=\"display:none !important\"
\t\t\t\t\t\t";
            }
            // line 166
            echo "\t\t\t\t\t>
\t\t\t\t\t\t<div class=\"heading\">
\t\t\t\t\t\t\t";
            // line 168
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 168), "image", [], "any", false, false, false, 168)) {
                // line 169
                echo "\t\t\t\t\t\t\t\t<img src=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 169), "image", [], "any", false, false, false, 169)), "html", null, true);
                echo "\" alt=\"pdp\">
\t\t\t\t\t\t\t";
            } else {
                // line 171
                echo "\t\t\t\t\t\t\t\t<img src=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/user_pdp.png"), "html", null, true);
                echo "\" alt=\"pdp\">
\t\t\t\t\t\t\t";
            }
            // line 173
            echo "\t\t\t\t\t\t\t<div class=\"info\">
\t\t\t\t\t\t\t\t<h3>
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 175
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("setting", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
            echo "\" >
\t\t\t\t\t\t\t\t\t\t";
            // line 176
            if (twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 176)) {
                // line 177
                echo "\t\t\t\t\t\t\t\t\t\t\t<span>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 177), "nom", [], "any", false, false, false, 177), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t<span>";
                // line 178
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 178), "prenom", [], "any", false, false, false, 178), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 180
            echo "\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"reglage\">
\t\t\t\t\t\t\t\t<a href=\"";
            // line 184
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("setting", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
            echo "\" >Settings</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            // line 188
            echo "\t\t\t\t\t\t\t";
            if ((0 === twig_compare(($context["groupe"] ?? null), "sounds"))) {
                // line 189
                echo "\t\t\t\t\t\t\t\t<ul class=\"categories\">
\t\t\t\t\t\t\t\t\t";
                // line 190
                if (((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 190), "receptionniste", [], "any", false, false, false, 190), "oui")) && (0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 190), "comptable", [], "any", false, false, false, 190), "oui")))) {
                    // line 191
                    echo "\t\t\t\t\t\t\t\t\t\t<li ";
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__compte_rendu")))) {
                        echo " id=\"";
                        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
                        echo "\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 192
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("crj", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<i aria-hidden=\"true\" id=\"crj\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 194
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__compte_rendu")))) {
                        // line 195
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/crj_2.png"), "html", null, true);
                        echo "\" alt=\"icone crj 1\" class=\"img-responsive nav_icone\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 197
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/crj.png"), "html", null, true);
                        echo "\" alt=\"icone crj 1\" class=\"img-responsive nav_icone\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 199
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/crj_2.png"), "html", null, true);
                    echo "\" alt=\"icone crj 2\" class=\"img-responsive nav_icone_hover\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t\t</i>
\t\t\t\t\t\t\t\t\t\t\t\t<span>Compte rendu journalier</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
                }
                // line 205
                echo "\t\t\t\t\t\t\t\t\t";
                if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 205), "comptable", [], "any", false, false, false, 205), "oui"))) {
                    // line 206
                    echo "\t\t\t\t\t\t\t\t\t\t<li ";
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__hebergement")))) {
                        echo " id=\"";
                        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
                        echo "\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 207
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("hebergement", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<i aria-hidden=\"true\" id=\"bed\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 209
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__hebergement")))) {
                        // line 210
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/bed_2.png"), "html", null, true);
                        echo "\" alt=\"icone bed 1\" class=\"img-responsive nav_icone\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 212
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/bed.png"), "html", null, true);
                        echo "\" alt=\"icone bed 1\" class=\"img-responsive nav_icone\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 214
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 215
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/bed_2.png"), "html", null, true);
                    echo "\" alt=\"icone bed 2\" class=\"img-responsive nav_icone_hover\" width=\"40\">

\t\t\t\t\t\t\t\t\t\t\t\t</i>
\t\t\t\t\t\t\t\t\t\t\t\t<span>Hébergement</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
                }
                // line 222
                echo "\t\t\t\t\t\t\t\t\t";
                if (((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 222), "receptionniste", [], "any", false, false, false, 222), "oui")) && (0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 222), "comptable", [], "any", false, false, false, 222), "oui")))) {
                    // line 223
                    echo "\t\t\t\t\t\t\t\t\t<li ";
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__restaurant")))) {
                        echo " id=\"";
                        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
                        echo "\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 224
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("restaurant", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t<i aria-hidden=\"true\" id=\"restaurant\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 226
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__restaurant")))) {
                        // line 227
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/restaurant_2.png"), "html", null, true);
                        echo "\" alt=\"icone bed 1\" class=\"img-responsive nav_icone\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 229
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/restaurant.png"), "html", null, true);
                        echo "\" alt=\"icone bed 1\" class=\"img-responsive nav_icone\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 231
                    echo "

\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 233
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/restaurant_2.png"), "html", null, true);
                    echo "\" alt=\"icone bed 2\" class=\"img-responsive nav_icone_hover\" width=\"40\">

\t\t\t\t\t\t\t\t\t\t\t</i>
\t\t\t\t\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t\t\t\t\tRestaurant</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
                }
                // line 241
                echo "\t\t\t\t\t\t\t\t\t";
                if (((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 241), "receptionniste", [], "any", false, false, false, 241), "oui")) && (0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 241), "comptable", [], "any", false, false, false, 241), "oui")))) {
                    // line 242
                    echo "\t\t\t\t\t\t\t\t\t<li ";
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__spa")))) {
                        echo " id=\"";
                        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
                        echo "\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 243
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("spa", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t<i aria-hidden=\"true\" id=\"spa\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 245
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__spa")))) {
                        // line 246
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/spa_2.png"), "html", null, true);
                        echo "\" alt=\"icone bed 1\" class=\"img-responsive nav_icone\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 248
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/spa.png"), "html", null, true);
                        echo "\" alt=\"icone bed 1\" class=\"img-responsive nav_icone\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 250
                    echo "

\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 252
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/spa_2.png"), "html", null, true);
                    echo "\" alt=\"icone bed 2\" class=\"img-responsive nav_icone_hover\" width=\"40\">

\t\t\t\t\t\t\t\t\t\t\t</i>
\t\t\t\t\t\t\t\t\t\t\t<span>Spa</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
                }
                // line 259
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 260
                if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 260), "receptionniste", [], "any", false, false, false, 260), "oui"))) {
                    // line 261
                    echo "\t\t\t\t\t\t\t\t\t<li ";
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__fournisseur")))) {
                        echo " id=\"";
                        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
                        echo "\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 262
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fournisseur", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t<i aria-hidden=\"true\" id=\"fournisseur\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 264
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__fournisseur")))) {
                        // line 265
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/fournisseur_2.png"), "html", null, true);
                        echo "\" alt=\"icone bed 1\" class=\"img-responsive nav_icone\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 267
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/fournisseur.png"), "html", null, true);
                        echo "\" alt=\"icone bed 1\" class=\"img-responsive nav_icone\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 269
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 270
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/fournisseur_2.png"), "html", null, true);
                    echo "\" alt=\"icone bed 2\" class=\"img-responsive nav_icone_hover\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t</i>
\t\t\t\t\t\t\t\t\t\t\t<span>Fournisseur</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
                }
                // line 276
                echo "\t\t\t\t\t\t\t\t\t";
                if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 276), "receptionniste", [], "any", false, false, false, 276), "oui"))) {
                    // line 277
                    echo "\t\t\t\t\t\t\t\t\t<li ";
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__client_upload")))) {
                        echo " id=\"";
                        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
                        echo "\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 278
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_upload", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t<i aria-hidden=\"true\" id=\"client\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 280
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__client_upload")))) {
                        // line 281
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/client_2.png"), "html", null, true);
                        echo "\" alt=\"icone bed 1\" class=\"img-responsive nav_icone\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 283
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/client.png"), "html", null, true);
                        echo "\" alt=\"icone bed 1\" class=\"img-responsive nav_icone\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 285
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 286
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/client_2.png"), "html", null, true);
                    echo "\" alt=\"icone bed 2\" class=\"img-responsive nav_icone_hover\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t</i>
\t\t\t\t\t\t\t\t\t\t\t<span>Client</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
                }
                // line 292
                echo "\t\t\t\t\t\t\t\t\t";
                if (((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 292), "receptionniste", [], "any", false, false, false, 292), "oui")) && (0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 292), "comptable", [], "any", false, false, false, 292), "oui")))) {
                    // line 293
                    echo "\t\t\t\t\t\t\t\t\t<li ";
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "fiche_hotel")))) {
                        echo " id=\"";
                        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
                        echo "\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 294
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fiche_hotel", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t<i aria-hidden=\"true\" id=\"edit\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 296
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "fiche_hotel")))) {
                        // line 297
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/edit_2.png"), "html", null, true);
                        echo "\" alt=\"icone bed 1\" class=\"img-responsive nav_icone\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 299
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/edit.png"), "html", null, true);
                        echo "\" alt=\"icone bed 1\" class=\"img-responsive nav_icone\" width=\"40\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 301
                    echo "

\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 303
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/edit_2.png"), "html", null, true);
                    echo "\" alt=\"icone bed 2\" class=\"img-responsive nav_icone_hover\" width=\"40\">

\t\t\t\t\t\t\t\t\t\t\t</i>
\t\t\t\t\t\t\t\t\t\t\t<span>Fiche hôtel</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
                }
                // line 310
                echo "\t\t\t\t\t\t\t\t\t";
                if (((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 310), "receptionniste", [], "any", false, false, false, 310), "oui")) && (0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 310), "comptable", [], "any", false, false, false, 310), "oui")))) {
                    // line 311
                    echo "\t\t\t\t\t\t\t\t\t\t<li ";
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__stock")))) {
                        echo " id=\"";
                        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
                        echo "\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 312
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("stock", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<small class=\"fa fa-archive\" ";
                    // line 313
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__stock")))) {
                        echo " style=\"color:#d29e00 !important\" ";
                    }
                    echo "></small>
\t\t\t\t\t\t\t\t\t\t\t\t<span ";
                    // line 314
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__stock")))) {
                        echo " style=\"color:#d29e00 !important\" ";
                    }
                    echo ">Stock</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t<li ";
                    // line 317
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__cost")))) {
                        echo " id=\"";
                        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
                        echo "\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 318
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cost", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<small class=\"fa fa-money\" ";
                    // line 319
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__cost")))) {
                        echo " style=\"color:#d29e00 !important\" ";
                    }
                    echo "></small>
\t\t\t\t\t\t\t\t\t\t\t\t<span ";
                    // line 320
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__cost")))) {
                        echo " style=\"color:#d29e00 !important\" ";
                    }
                    echo ">Cost</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t<li ";
                    // line 323
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__sqn")))) {
                        echo " id=\"";
                        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
                        echo "\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 324
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sqn", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<small class=\"fa fa-fax\" ";
                    // line 325
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__sqn")))) {
                        echo " style=\"color:#d29e00 !important\" ";
                    }
                    echo "></small>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"sqn\" ";
                    // line 326
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__sqn")))) {
                        echo " style=\"color:#d29e00 !important\" ";
                    }
                    echo ">Service quality - Notation</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t<li id=\"li_historique\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-clock-o\"></span>
\t\t\t\t\t\t\t\t\t\t\t\t<span>Historiques</span>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-angle-down\"></span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t<ul class=\"ul_historique\">
\t\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 337
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("h_hebergement", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>Hébergement</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 342
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("h_restaurant", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>Restaurant</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 347
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("h_spa", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>Spa</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
                }
                // line 354
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<div class=\"liste_dj_dm\">\t
\t\t\t\t\t\t\t\t\t\t";
                // line 356
                if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 356), "comptable", [], "any", false, false, false, 356), "oui"))) {
                    // line 357
                    echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"liste_dj_dm_item\" ";
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__donnee_du_jour")))) {
                        echo " id=\"";
                        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
                        echo "\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 358
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("donnee_jour", ["pseudo_hotel" => ($context["hotel"] ?? null), "id" => "vide"]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-plus\"></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<span>Données journalières</span>
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 364
                echo "\t\t\t\t\t\t\t\t\t\t";
                if (((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 364), "receptionniste", [], "any", false, false, false, 364), "oui")) && (0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 364), "comptable", [], "any", false, false, false, 364), "oui")))) {
                    // line 365
                    echo "\t\t\t\t\t\t\t\t\t\t<div class=\"liste_dj_dm_item\" ";
                    if ((((isset($context["id"]) || array_key_exists("id", $context)) &&  !(null === ($context["id"] ?? null))) && (0 === twig_compare(($context["id"] ?? null), "li__donnee_mensuelle")))) {
                        echo " id=\"";
                        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
                        echo "\" ";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 366
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("donnee_mensuelle", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-plus\"></span>
\t\t\t\t\t\t\t\t\t\t\t\t<span>Données mensuelles</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 372
                echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t</ul>

\t\t\t\t\t\t\t";
            }
            // line 378
            echo "\t\t\t\t\t\t";
            // line 379
            echo "\t\t\t\t\t\t";
            // line 380
            echo "\t\t\t\t\t\t\t";
            if ((0 === twig_compare(($context["groupe"] ?? null), "tropical_wood"))) {
                // line 381
                echo "\t\t\t\t\t\t\t\t<ul class=\"categories\">
\t\t\t\t\t\t\t\t";
                // line 382
                if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                    // line 383
                    echo "\t\t\t\t\t\t\t\t\t<li 
\t\t\t\t\t\t\t\t\t\t";
                    // line 384
                    if (((isset($context["id_page"]) || array_key_exists("id_page", $context)) && (0 === twig_compare(($context["id_page"] ?? null), "li__dashboard_tw")))) {
                        // line 385
                        echo "\t\t\t\t\t\t\t\t\t\t\tid=\"li__dashboard_tw\"
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 387
                    echo "\t\t\t\t\t\t\t\t\t\tclass=\"li_tw\"
\t\t\t\t\t\t\t\t\t>
\t\t\t\t\t\t\t\t\t\t<a
\t\t\t\t\t\t\t\t\t\t\thref=\"";
                    // line 390
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("tropical_wood");
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t<span>Tableau de bord client</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li
\t\t\t\t\t\t\t\t\t\t";
                    // line 395
                    if (((isset($context["id_page"]) || array_key_exists("id_page", $context)) && (0 === twig_compare(($context["id_page"] ?? null), "li_entreprise_contact")))) {
                        // line 396
                        echo "\t\t\t\t\t\t\t\t\t\t\t id=\"li_entreprise_contact\"
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 398
                    echo "\t\t\t\t\t\t\t\t\t\tclass=\"li_tw\"
\t\t\t\t\t\t\t\t\t>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 400
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("liste_client_tw");
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<span>Fiche client</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li ";
                    // line 405
                    if (((isset($context["id_page"]) || array_key_exists("id_page", $context)) && (0 === twig_compare(($context["id_page"] ?? null), "li_liste_changement")))) {
                        echo " id=\"li_liste_changement\" ";
                    }
                    echo " class=\"li_tw\">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 406
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("liste_changement_pf");
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t<span>Liste changement</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
                }
                // line 411
                echo "\t\t\t\t\t\t\t\t\t<li ";
                if (((isset($context["id_page"]) || array_key_exists("id_page", $context)) && (0 === twig_compare(($context["id_page"] ?? null), "li_importer")))) {
                    echo " id=\"li_importer\" ";
                }
                echo " class=\"li_tw\">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 412
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("importer_client");
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t<span>Importer</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li ";
                // line 416
                if (((isset($context["id_page"]) || array_key_exists("id_page", $context)) && (0 === twig_compare(($context["id_page"] ?? null), "li_tresoreriet")))) {
                    echo " id=\"li_tresoreriet\" ";
                }
                echo " class=\"li_tw\">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 417
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("tresorerie_recette");
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t<span>Trésorerie</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</ul>

\t\t\t\t\t\t\t";
            }
            // line 425
            echo "\t\t\t\t\t\t";
            // line 426
            echo "\t\t\t\t\t</div>
\t\t\t\t</aside>
\t\t\t\t

\t\t\t";
        }
        // line 431
        echo "
\t\t\t<div id=\"app\">
\t\t\t\t";
        // line 433
        $this->displayBlock('body', $context, $blocks);
        // line 434
        echo "\t\t\t</div>
\t\t\t
\t\t\t<!--script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js\"></script-->
\t\t\t<script src=\"";
        // line 437
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("jquery/jquery.min.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script type=\"text/javascript\" src=\"//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js\"></script>
\t\t\t<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>
\t\t\t<script src=\"https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js\"></script>
\t\t\t";
        // line 442
        echo "\t\t\t<script src=\"https://cdn.jsdelivr.net/npm/vue@2.6.0\"></script>
\t\t\t<script src=\"https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js\"></script>
\t\t\t<script>
\t\t\t\t/* pour l'annimation de loader */

\t\t\tvar title = document.querySelector(\"title\");
\t\t\ttitle.innerHTML = title.innerHTML.toUpperCase();
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
\t\t\t<script src='";
        // line 462
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/currency.js"), "html", null, true);
        echo "'></script>
\t\t\t<script src='";
        // line 463
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashboard.js"), "html", null, true);
        echo "'></script>
\t\t\t";
        // line 464
        $this->displayBlock('javascripts', $context, $blocks);
        // line 467
        echo "\t\t</body>
\t</html>

";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "\t\t\t";
    }

    // line 24
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 433
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 464
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 465
        echo "
\t\t\t";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1101 => 465,  1097 => 464,  1091 => 433,  1085 => 24,  1081 => 7,  1077 => 6,  1070 => 467,  1068 => 464,  1064 => 463,  1060 => 462,  1038 => 442,  1031 => 437,  1026 => 434,  1024 => 433,  1020 => 431,  1013 => 426,  1011 => 425,  1000 => 417,  994 => 416,  987 => 412,  980 => 411,  972 => 406,  966 => 405,  958 => 400,  954 => 398,  950 => 396,  948 => 395,  940 => 390,  935 => 387,  931 => 385,  929 => 384,  926 => 383,  924 => 382,  921 => 381,  918 => 380,  916 => 379,  914 => 378,  906 => 372,  897 => 366,  888 => 365,  885 => 364,  876 => 358,  867 => 357,  865 => 356,  861 => 354,  851 => 347,  843 => 342,  835 => 337,  819 => 326,  813 => 325,  809 => 324,  801 => 323,  793 => 320,  787 => 319,  783 => 318,  775 => 317,  767 => 314,  761 => 313,  757 => 312,  748 => 311,  745 => 310,  735 => 303,  731 => 301,  725 => 299,  719 => 297,  717 => 296,  712 => 294,  703 => 293,  700 => 292,  691 => 286,  688 => 285,  682 => 283,  676 => 281,  674 => 280,  669 => 278,  660 => 277,  657 => 276,  648 => 270,  645 => 269,  639 => 267,  633 => 265,  631 => 264,  626 => 262,  617 => 261,  615 => 260,  612 => 259,  602 => 252,  598 => 250,  592 => 248,  586 => 246,  584 => 245,  579 => 243,  570 => 242,  567 => 241,  556 => 233,  552 => 231,  546 => 229,  540 => 227,  538 => 226,  533 => 224,  524 => 223,  521 => 222,  511 => 215,  508 => 214,  502 => 212,  496 => 210,  494 => 209,  489 => 207,  480 => 206,  477 => 205,  467 => 199,  461 => 197,  455 => 195,  453 => 194,  448 => 192,  439 => 191,  437 => 190,  434 => 189,  431 => 188,  425 => 184,  419 => 180,  414 => 178,  409 => 177,  407 => 176,  403 => 175,  399 => 173,  393 => 171,  387 => 169,  385 => 168,  381 => 166,  377 => 164,  375 => 163,  364 => 155,  360 => 153,  358 => 152,  350 => 147,  345 => 145,  342 => 144,  340 => 143,  337 => 142,  334 => 140,  325 => 134,  320 => 132,  317 => 131,  313 => 129,  311 => 128,  308 => 127,  300 => 122,  295 => 120,  288 => 119,  285 => 118,  277 => 113,  272 => 111,  265 => 110,  262 => 109,  259 => 108,  250 => 102,  245 => 100,  238 => 99,  235 => 98,  226 => 92,  221 => 90,  214 => 89,  211 => 88,  208 => 87,  200 => 82,  195 => 80,  188 => 79,  185 => 78,  177 => 73,  172 => 71,  165 => 70,  162 => 69,  159 => 68,  151 => 63,  146 => 61,  139 => 60,  136 => 59,  128 => 54,  123 => 52,  116 => 51,  113 => 50,  110 => 49,  107 => 48,  104 => 47,  98 => 42,  96 => 41,  93 => 40,  90 => 39,  88 => 38,  85 => 37,  82 => 35,  74 => 28,  70 => 25,  68 => 24,  50 => 8,  48 => 6,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html.twig", "/home/dashboy/www/templates/base.html.twig");
    }
}
