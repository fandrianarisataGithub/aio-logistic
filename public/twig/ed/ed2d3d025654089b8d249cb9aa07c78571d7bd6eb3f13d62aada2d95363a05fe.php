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

/* page/donnee_jour.html.twig */
class __TwigTemplate_a83f4247e0ed4185d66d8efb9be8a4525a74def552aacc15b3345d96907aed8d extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "page/donnee_jour.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "\tDonnée du jour
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
    <section
        id=\"contents\">
        <!-- entete content -->
        ";
        // line 14
        $this->loadTemplate("nav2.html.twig", "page/donnee_jour.html.twig", 14)->display($context);
        // line 15
        echo "        <!-- / entete content -->
        <div id=\"hrs_content\">
            <div>
            ";
        // line 18
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        echo "
                <div class=\"col-lg-12 col-md-12 col-sm-12 col-sm-12 col-xs-12\">
                    <section class=\"section_part\" id=\"section_part_top\">
                        <div class=\"sous_titre\">
                            <h2>Donnée du jour</h2>
                                ";
        // line 24
        echo "                                <input type=\"date\" name = \"createdAt\" class=\"createdAt\" id = \"donnee_du_jour_createdAt\" value = \"";
        echo twig_escape_filter($this->env, ($context["today"] ?? null), "html", null, true);
        echo "\">
                                <a href=\"#\" id=\"change_date_insert\" class=\"btn btn-warning\">Rechercher</a>
                                <input type=\"hidden\" name=\"\" id=\"date1\" value=\"\">
                                <input type=\"hidden\" id=\"date2\" value=\"\" name=\"\">
                        </div>
                    </section>
                </div>
                <div class=\"col-lg-12 col-md-12 col-sm-12 col-sm-12 col-xs-12\">

                    <div
                        class=\"tab_content\" id=\"data_days\">

                        <!-- formulaire total -->

                            <div class=\"h4_titre\">
                                <h4>Hébergement</h4>
                            </div>
                            <div class=\"data_form\" 
                                 ";
        // line 42
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 42), "receptionniste", [], "any", false, false, false, 42), "oui"))) {
            // line 43
            echo "                                    style=\"display: none !important\"
                                 ";
        }
        // line 45
        echo "                                 
                            
                            >
                                <div class=\"form-group\">
                                    <label for=\"t_o\">Taux d'occupation :
                                    </label>
                                     ";
        // line 51
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 51), "receptionniste", [], "any", false, false, false, 51), "oui"))) {
            // line 52
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "heb_to", [], "any", false, false, false, 52), 'widget', ["attr" => ["class" => "input_pourcent", "max" => "100", "value" => ""]]);
            // line 60
            echo "
                                     ";
        } else {
            // line 62
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "heb_to", [], "any", false, false, false, 62), 'widget', ["attr" => ["class" => "input_pourcent", "max" => "100"]]);
            // line 70
            echo "
                                     ";
        }
        // line 72
        echo "                                    <span class=\"span__pourcent\">%</span>
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"c_a\">Chiffre d'affaire :
                                    </label>
                                    ";
        // line 78
        echo "                                    ";
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 78), "receptionniste", [], "any", false, false, false, 78), "oui"))) {
            // line 79
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "heb_ca", [], "any", false, false, false, 79), 'widget', ["attr" => ["class" => "input_nombre", "max" => "100", "value" => ""]]);
            // line 86
            echo "
                                    ";
        } else {
            // line 88
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "heb_ca", [], "any", false, false, false, 88), 'widget', ["attr" => ["class" => "input_nombre", "max" => "100"]]);
            // line 96
            echo "
                                    ";
        }
        // line 98
        echo "
                                    <span class=\"span__ar\">Ar</span>
                                </div>
                            </div>
                            ";
        // line 103
        echo "                            <div class=\"data_form kadoany\" 
                                 ";
        // line 104
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 104), "receptionniste", [], "any", false, false, false, 104), "oui"))) {
            // line 105
            echo "                                    style=\"display: none !important\"
                                 ";
        }
        // line 107
        echo "                            >
                                <div class=\"form-group\">
                                    <label for=\"t_o\">Nombre de pax hébergé : 
                                    </label>
                                     ";
        // line 111
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 111), "receptionniste", [], "any", false, false, false, 111), "oui"))) {
            // line 112
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "n_pax_heb", [], "any", false, false, false, 112), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "18", "value" => ""]]);
            // line 121
            echo "
                                     ";
        } else {
            // line 123
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "n_pax_heb", [], "any", false, false, false, 123), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "18", "value" => ""]]);
            // line 132
            echo "
                                     ";
        }
        // line 134
        echo "                                </div>
                                <div class=\"form-group\">
                                    <label for=\"c_a\">Nombre de chambre occupés :
                                    </label>
                                    ";
        // line 139
        echo "                                    ";
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 139), "receptionniste", [], "any", false, false, false, 139), "oui"))) {
            // line 140
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "n_chambre_occupe", [], "any", false, false, false, 140), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "18", "value" => ""]]);
            // line 149
            echo "
                                    ";
        } else {
            // line 151
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "n_chambre_occupe", [], "any", false, false, false, 151), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "18", "value" => ""]]);
            // line 160
            echo "
                                    ";
        }
        // line 162
        echo "                                </div>
                            </div>
                            <section class=\"sous_form\">
                                <h4 class=\"label__titre\">Nouveau client </h4>
                                <div class=\"sous_data_form\">
                                    <div>
                                        <span class=\"span__label\"></span>
                                        <input v-model=\"name\" v-on:keyup=\"proposeName\" type=\"text\" class=\"input__text\" placeholder=\"Nom\" name=\"nom_client\" id =\"nom_client\" autocomplete=\"off\"/>
                                        <ul v-if=\"isTyping && filteredClients.length && name !='' > 0\" class=\"group_nom_client\">
                                            <li v-for=\"client in filteredClients\" v-bind:key=\"client.id\">
                                                <a @click.prevent=\"putClient(client)\" href=\"#\">\${ client.name }</a>
                                            </li>
                                        </ul>
                                        <span class=\"span__label span_prenom\"></span>
                                        <input v-model=\"lastName\" @focus=\"liveOutFocus\" type=\"text\" class=\"input__text\" placeholder=\"Prénom\" name=\"prenom_client\" id = \"prenom_client\"/>
                                    </div>
                                    <div>
                                        <span class=\"span__label\"></span>
                                        <input v-model=\"email\" @focus=\"liveOutFocus\" type=\"text\" class=\"input__text\" placeholder=\"Adresse email\" name=\"email_client\" id =\"email_client\"/>
                                        <span  class=\"span__label span_prenom\"></span>
                                        <input v-model=\"telephone\" @focus=\"liveOutFocus\"  type=\"text\" class=\"input__text\" placeholder=\"Téléphone\" name=\"telephone_client\" id = \"telephone_client\"/>
                                    </div>
                                    <div>
                                        <div class=\"form-group\">
                                            <label for=\"date_arrive\" class=\"label_date\">Check in :</label>
                                            <input @focus=\"liveOutFocus\" type=\"date\" id=\"date_arrivee\">
                                            <input type=\"hidden\" id=\"hide_pseudo_hotel\" value=\"";
        // line 188
        echo twig_escape_filter($this->env, ($context["hotel"] ?? null), "html", null, true);
        echo "\">
                                        </div>
                                        <div class=\"form-group\">
                                            <label for=\"date_arrive\" class=\"label_date\">check out :</label>
                                            <input @focus=\"liveOutFocus\" type=\"date\" id=\"date_depart\">
                                        </div>
                                    </div>
                                    <div id=\"div_provenance\">
                                        <div class=\"form-group\">
                                            <label for=\"\">Provenance : </label>
                                            <select name=\"\" id=\"provenance\">
                                                <option value=\"OTA\" selected=\"selected\">OTA</option>
                                                <option value=\"DIRECT\">DIRECT</option>
                                                <option value=\"CORPO\">CORPO</option>
                                                <option value=\"TOA\">TOA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id=\"div_sous_source\">
                                        <div class=\"source_TOA source form-group\">
                                            <label for=\"\">Source : </label>
                                            ";
        // line 210
        echo "                                            <input type=\"text\" placeholder=\"ex Aventour\" class=\"input__text\" name=\"\">
                                        </div>
                                        <div class=\"source_CORPO source form-group\">
                                            <label for=\"\">Source : </label>
                                            ";
        // line 215
        echo "                                            <input type=\"text\" placeholder=\"Nom de la Société\" class=\"input__text\" name=\"\">
                                        </div>
                                        <div class=\"source_DIRECT source form-group\">
                                            <label for=\"\">Source : </label> 
                                            <select name=\"\">
                                                <option value=\"Email\">Email</option>
                                                <option value=\"Téléphone\">Téléphone</option>
                                                <option value=\"Site web\">Site web</option>
                                                <option value=\"Comptoir\">Comptoir</option>
                                            </select>
                                        </div>
                                        <div class=\"source_OTA source form-group\">
                                            <label for=\"\">Source : </label>
                                            <select name=\"\">
                                                <option value=\"Booking\">Booking</option>
                                                <option value=\"Expedia\">Expedia</option>
                                                <option value=\"Hotelbeds\">Hotelbeds</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class=\"form-group\">
                                            <label for=\"nbr_nuit\" class=\"label_nbr_chambre\">Nombre de chambre réservé :</label>
                                            <input type=\"number\" id=\"nbr_chambre\">
                                        </div>
                                        <div class=\"form-group\">
                                            <label for=\"prix_total\" class=\"label_prix_total\">Prix total du sejour:</label>
                                            <input type=\"text\" id=\"prix_total\" class=\"input_nombre\">
                                            <span class=\"span__ar\">Ar</span>
                                        </div>
                                        ";
        // line 249
        echo "                                    </div>
                                    <div class=\"info_arror_client\">
                                        <p></p>
                                    </div>
                                    <div>
                                        <button class=\"btn btn-default\" id = \"ajouter_client\">
                                            <span class=\"fa fa-plus\"></span>
                                            <span>Ajouter</span>
                                        </button>
                                    </div>
                                </div>
                            </section>
                            <div id=\"test\"></div>
                            <div class=\"tableau\" id=\"tab_client_present\">
                                <div class=\"sous_titre\">
                                    <h4 class=\"label__titre\">Client présent le : <span id=\"data_text_date\"></span></h4>
                                </div>
                                ";
        // line 266
        $this->loadTemplate("table/table_client.html.twig", "page/donnee_jour.html.twig", 266)->display($context);
        // line 267
        echo "                            </div>
                            <div id=\"test_d\"></div>
                            <div class=\"h4_titre\" 
                                ";
        // line 270
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 270), "receptionniste", [], "any", false, false, false, 270), "oui"))) {
            // line 271
            echo "                                    style=\"display: none !important\"
                                ";
        }
        // line 273
        echo "
                            >
                                <h4>Restaurant</h4>
                            </div>
                            <div class=\"data_form\"
                            
                                 ";
        // line 279
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 279), "receptionniste", [], "any", false, false, false, 279), "oui"))) {
            // line 280
            echo "                                    style=\"display: none !important\"
                                 ";
        }
        // line 282
        echo "                            >
                                <div class=\"form-group\">
                                    <label for=\"n_couvert\">Nombre de couvert :
                                    </label>
                                     ";
        // line 286
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 286), "receptionniste", [], "any", false, false, false, 286), "oui"))) {
            // line 287
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "res_n_couvert", [], "any", false, false, false, 287), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "23"]]);
            // line 294
            echo "
                                     ";
        } else {
            // line 296
            echo "                                         ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "res_n_couvert", [], "any", false, false, false, 296), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "23", "value" => ""]]);
            // line 304
            echo "
                                    ";
        }
        // line 306
        echo "                                </div>
                                <div class=\"form-group\">
                                    <label for=\"c_a_rest\">Chiffre d'affaire :
                                    </label>
                                    ";
        // line 311
        echo "                                    ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 311), "receptionniste", [], "any", false, false, false, 311), "oui"))) {
            // line 312
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "res_ca", [], "any", false, false, false, 312), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "23"]]);
            // line 319
            echo "
                                    ";
        } else {
            // line 321
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "res_ca", [], "any", false, false, false, 321), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "23", "value" => ""]]);
            // line 329
            echo "
                                    ";
        }
        // line 331
        echo "                                    <span class=\"span__ar\">Ar</span>
                                </div>
                            </div>
                            <div class=\"data_form\" 
                            
                                 ";
        // line 336
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 336), "receptionniste", [], "any", false, false, false, 336), "oui"))) {
            // line 337
            echo "                                    style=\"display: none !important\"
                                 ";
        }
        // line 339
        echo "                            >
                                <div class=\"form-group\">
                                    <label for=\"p_dejeuner\">Petit déjeuner :
                                    </label>
                                    ";
        // line 344
        echo "                                     ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 344), "receptionniste", [], "any", false, false, false, 344), "oui"))) {
            // line 345
            echo "                                         ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "res_p_dej", [], "any", false, false, false, 345), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "23"]]);
            // line 352
            echo "
                                     ";
        } else {
            // line 354
            echo "                                         ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "res_p_dej", [], "any", false, false, false, 354), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "23", "value" => ""]]);
            // line 362
            echo "
                                     ";
        }
        // line 364
        echo "                                </div>
                                <div class=\"form-group\">
                                    <label for=\"dejeuner\">Déjeuner :
                                    </label>
                                    ";
        // line 369
        echo "                                   ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 369), "receptionniste", [], "any", false, false, false, 369), "oui"))) {
            // line 370
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "res_dej", [], "any", false, false, false, 370), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "18"]]);
            // line 377
            echo "
                                   ";
        } else {
            // line 379
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "res_dej", [], "any", false, false, false, 379), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "18", "value" => ""]]);
            // line 387
            echo "
                                   ";
        }
        // line 389
        echo "                                </div>
                            </div>
                            <div class=\"data_form\"
                                 ";
        // line 392
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 392), "receptionniste", [], "any", false, false, false, 392), "oui"))) {
            // line 393
            echo "                                    style=\"display: none !important\"
                                 ";
        }
        // line 395
        echo "                            >
                                <div class=\"form-group\">
                                    <label for=\"dinner\">Dinner :
                                    </label>
                                    ";
        // line 400
        echo "                                    ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 400), "receptionniste", [], "any", false, false, false, 400), "oui"))) {
            // line 401
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "res_dinner", [], "any", false, false, false, 401), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "18"]]);
            // line 408
            echo "
                                    ";
        } else {
            // line 410
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "res_dinner", [], "any", false, false, false, 410), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "18", "value" => ""]]);
            // line 418
            echo "
                                    ";
        }
        // line 420
        echo "                                </div>
                            </div>
                            <div class=\"h4_titre\"
                            
                                 ";
        // line 424
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 424), "receptionniste", [], "any", false, false, false, 424), "oui"))) {
            // line 425
            echo "                                    style=\"display: none !important\"
                                 ";
        }
        // line 427
        echo "                            >
                                <h4>Spa</h4>
                            </div>
                            <div class=\"data_form\"
                                 ";
        // line 431
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 431), "receptionniste", [], "any", false, false, false, 431), "oui"))) {
            // line 432
            echo "                                    style=\"display: none !important\"
                                 ";
        }
        // line 434
        echo "                            >
                                <div class=\"form-group\">
                                    <label for=\"c_a_spa\">Chiffre d'affaire :
                                    </label>
                                    ";
        // line 439
        echo "                                    ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 439), "receptionniste", [], "any", false, false, false, 439), "oui"))) {
            // line 440
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "spa_ca", [], "any", false, false, false, 440), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "23"]]);
            // line 446
            echo "
                                    ";
        } else {
            // line 448
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "spa_ca", [], "any", false, false, false, 448), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "23", "value" => ""]]);
            // line 455
            echo "
                                    ";
        }
        // line 457
        echo "                                    <span class=\"span__ar\">Ar</span>
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"n_abonne\">Nombre d'abonné :
                                    </label>
                                    ";
        // line 463
        echo "                                     ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 463), "receptionniste", [], "any", false, false, false, 463), "oui"))) {
            // line 464
            echo "                                         ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "spa_n_abonne", [], "any", false, false, false, 464), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "18"]]);
            // line 471
            echo "
                                     ";
        } else {
            // line 473
            echo "                                         ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "spa_n_abonne", [], "any", false, false, false, 473), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "18", "value" => ""]]);
            // line 481
            echo "
                                     ";
        }
        // line 483
        echo "                                </div>
                            </div>
                            <div class=\"data_form\"
                                 ";
        // line 486
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 486), "receptionniste", [], "any", false, false, false, 486), "oui"))) {
            // line 487
            echo "                                    style=\"display: none !important\"
                                 ";
        }
        // line 489
        echo "                            >

                                <div class=\"form-group\">
                                    <label for=\"c_unique\">Fréquentation :
                                    </label>
                                    ";
        // line 495
        echo "                                     ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 495), "receptionniste", [], "any", false, false, false, 495), "oui"))) {
            // line 496
            echo "                                         ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "spa_c_unique", [], "any", false, false, false, 496), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "18"]]);
            // line 503
            echo "
                                     ";
        } else {
            // line 505
            echo "                                         ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "spa_c_unique", [], "any", false, false, false, 505), 'widget', ["attr" => ["class" => "input_nombre", "maxlength" => "18", "value" => ""]]);
            // line 513
            echo "
                                     ";
        }
        // line 515
        echo "                                </div>
                            </div>

                            <!-- text area  -->
                            <div class=\"h4_titre\" 
                            
                                 ";
        // line 521
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 521), "receptionniste", [], "any", false, false, false, 521), "oui"))) {
            // line 522
            echo "                                    style=\"display: none !important\"
                                 ";
        }
        // line 524
        echo "                            >
                                <h4>Compte rendu journalier</h4>
                            </div>
                            <div class=\"data_form crj\"
                                 ";
        // line 528
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 528), "receptionniste", [], "any", false, false, false, 528), "oui"))) {
            // line 529
            echo "                                    style=\"display: none !important\"
                                 ";
        }
        // line 531
        echo "                            
                            >
                                <div class=\"form-group\">
                                    <label for=\"c_a_spa\">Direction :
                                    </label>
                                    ";
        // line 537
        echo "                                    ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 537), "receptionniste", [], "any", false, false, false, 537), "oui"))) {
            // line 538
            echo "                                         ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_direction", [], "any", false, false, false, 538), 'widget', ["attr" => ["class" => "form-control"]]);
            // line 542
            echo "
                                    ";
        } else {
            // line 544
            echo "                                         ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_direction", [], "any", false, false, false, 544), 'widget', ["attr" => ["class" => "form-control form_vide", "value" => ""]]);
            // line 550
            echo "
                                    ";
        }
        // line 552
        echo "                                </div>
                                <div class=\"form-group\">
                                    <label for=\"c_a_spa\">Service RH :
                                    </label>
                                    ";
        // line 557
        echo "                                    ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 557), "receptionniste", [], "any", false, false, false, 557), "oui"))) {
            // line 558
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_service_rh", [], "any", false, false, false, 558), 'widget', ["attr" => ["class" => "form-control"]]);
            // line 562
            echo "
                                    ";
        } else {
            // line 564
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_service_rh", [], "any", false, false, false, 564), 'widget', ["attr" => ["class" => "form-control form_vide", "value" => ""]]);
            // line 570
            echo "
                                    ";
        }
        // line 572
        echo "                                </div>
                            </div>
                            <div class=\"data_form crj\"
                            
                                 ";
        // line 576
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 576), "receptionniste", [], "any", false, false, false, 576), "oui"))) {
            // line 577
            echo "                                    style=\"display: none !important\"
                                 ";
        }
        // line 579
        echo "                            >
                                <div class=\"form-group\">
                                    <label for=\"c_a_spa\">Commercial :
                                    </label>
                                    ";
        // line 584
        echo "                                    ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 584), "receptionniste", [], "any", false, false, false, 584), "oui"))) {
            // line 585
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_commercial", [], "any", false, false, false, 585), 'widget', ["attr" => ["class" => "form-control"]]);
            // line 589
            echo "
                                    ";
        } else {
            // line 591
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_commercial", [], "any", false, false, false, 591), 'widget', ["attr" => ["class" => "form-control form_vide", "value" => ""]]);
            // line 597
            echo "
                                    ";
        }
        // line 599
        echo "                                </div>
                                <div class=\"form-group\">
                                    <label for=\"c_a_spa\">Compatble :
                                    </label>
                                    ";
        // line 604
        echo "                                    ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 604), "receptionniste", [], "any", false, false, false, 604), "oui"))) {
            // line 605
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_comptable", [], "any", false, false, false, 605), 'widget', ["attr" => ["class" => "form-control"]]);
            // line 609
            echo "
                                    ";
        } else {
            // line 611
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_comptable", [], "any", false, false, false, 611), 'widget', ["attr" => ["class" => "form-control form_vide", "value" => ""]]);
            // line 616
            echo "
                                    ";
        }
        // line 618
        echo "                                </div>
                            </div>
                            <div class=\"data_form crj\"
                            
                                 ";
        // line 622
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 622), "receptionniste", [], "any", false, false, false, 622), "oui"))) {
            // line 623
            echo "                                    style=\"display: none !important\"
                                 ";
        }
        // line 625
        echo "                            >
                                <div class=\"form-group\">
                                    <label for=\"c_a_spa\">Réception :
                                    </label>
                                    ";
        // line 630
        echo "                                     ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 630), "receptionniste", [], "any", false, false, false, 630), "oui"))) {
            // line 631
            echo "                                         ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_reception", [], "any", false, false, false, 631), 'widget', ["attr" => ["class" => "form-control"]]);
            // line 635
            echo "
                                     ";
        } else {
            // line 637
            echo "                                         ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_reception", [], "any", false, false, false, 637), 'widget', ["attr" => ["class" => "form-control form_vide", "value" => ""]]);
            // line 642
            echo "
                                     ";
        }
        // line 644
        echo "                                </div>
                                <div class=\"form-group\">
                                    <label for=\"c_a_spa\">Restaurant :
                                    </label>
                                    ";
        // line 649
        echo "                                   ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 649), "receptionniste", [], "any", false, false, false, 649), "oui"))) {
            // line 650
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_restaurant", [], "any", false, false, false, 650), 'widget', ["attr" => ["class" => "form-control"]]);
            // line 654
            echo "
                                   ";
        } else {
            // line 656
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_restaurant", [], "any", false, false, false, 656), 'widget', ["attr" => ["class" => "form-control form_vide", "value" => ""]]);
            // line 661
            echo "
                                   ";
        }
        // line 663
        echo "                                </div>
                            </div>
                            <div class=\"data_form crj\"
                            
                                 ";
        // line 667
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 667), "receptionniste", [], "any", false, false, false, 667), "oui"))) {
            // line 668
            echo "                                    style=\"display: none !important\"
                                 ";
        }
        // line 670
        echo "                            >
                                <div class=\"form-group\">
                                    <label for=\"c_a_spa\">Spa :
                                    </label>
                                    ";
        // line 675
        echo "                                    ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 675), "receptionniste", [], "any", false, false, false, 675), "oui"))) {
            // line 676
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_spa", [], "any", false, false, false, 676), 'widget', ["attr" => ["class" => "form-control"]]);
            // line 680
            echo "
                                    ";
        } else {
            // line 682
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_spa", [], "any", false, false, false, 682), 'widget', ["attr" => ["class" => "form-control form_vide", "value" => ""]]);
            // line 687
            echo "
                                    ";
        }
        // line 689
        echo "                                </div>
                                <div class=\"form-group\">
                                    <label for=\"c_a_spa\">Service techniques :
                                    </label>
                                    ";
        // line 694
        echo "                                    ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 694), "receptionniste", [], "any", false, false, false, 694), "oui"))) {
            // line 695
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_s_technique", [], "any", false, false, false, 695), 'widget', ["attr" => ["class" => "form-control"]]);
            // line 699
            echo "
                                    ";
        } else {
            // line 701
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_s_technique", [], "any", false, false, false, 701), 'widget', ["attr" => ["class" => "form-control form_vide", "value" => ""]]);
            // line 706
            echo "
                                    ";
        }
        // line 708
        echo "                                </div>
                            </div>
                            <div class=\"data_form crj\"
                            
                                 ";
        // line 712
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 712), "receptionniste", [], "any", false, false, false, 712), "oui"))) {
            // line 713
            echo "                                    style=\"display: none !important\"
                                 ";
        }
        // line 715
        echo "                            >
                                <div class=\"form-group\">
                                    <label for=\"\">Litiges :
                                    </label>
                                    ";
        // line 720
        echo "                                    ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 720), "receptionniste", [], "any", false, false, false, 720), "oui"))) {
            // line 721
            echo "                                         ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_litiges", [], "any", false, false, false, 721), 'widget', ["attr" => ["class" => "form-control"]]);
            // line 725
            echo "
                                    ";
        } else {
            // line 727
            echo "                                         ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_litiges", [], "any", false, false, false, 727), 'widget', ["attr" => ["class" => "form-control form_vide", "value" => ""]]);
            // line 732
            echo "
                                    ";
        }
        // line 734
        echo "                                </div>
                                <div class=\"form-group\">
                                    <label for=\"\">Hébergement :
                                    </label>
                                    ";
        // line 739
        echo "                                    ";
        if ((0 !== twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 739), "receptionniste", [], "any", false, false, false, 739), "oui"))) {
            // line 740
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_hebergement", [], "any", false, false, false, 740), 'widget', ["attr" => ["class" => "form-control"]]);
            // line 744
            echo "
                                    ";
        } else {
            // line 746
            echo "                                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "crj_hebergement", [], "any", false, false, false, 746), 'widget', ["attr" => ["class" => "form-control form_vide", "value" => ""]]);
            // line 751
            echo "
                                    ";
        }
        // line 753
        echo "                                </div>
                            </div>

                            <!-- / textarea -->

                            <div class=\"btn-list\"
                                 ";
        // line 759
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 759), "receptionniste", [], "any", false, false, false, 759), "oui"))) {
            // line 760
            echo "                                    style=\"display: none !important\"
                                 ";
        }
        // line 762
        echo "                            >
                                <ul>
                                    <li id=\"li_submit_add_ddj\"><button type=\"submit\" id = \"btn_add_donnee_dj\" class=\"btn btn-warning\"><span>Enregistrer</span></button></li>
                                </ul>
                            </div>
                        ";
        // line 767
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "

                        <!-- / formulaire total -->
                    </div>


                    ";
        // line 773
        $this->loadTemplate("modal/modal_client.html.twig", "page/donnee_jour.html.twig", 773)->display($context);
        // line 774
        echo "
                </div>

            </div>
        </div>

    </section>
    <div class=\"load_modif\">
        <p>Patienter...</p>
    </div>


";
    }

    // line 788
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 789
        echo "
<script src=\"";
        // line 790
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/cleave.min.js"), "html", null, true);
        echo "\"></script>
<script>

    document.querySelector(\".input_pourcent\").onkeyup = function(){
        handleChange(this);
       // alert('kjh')
    }

\tfunction handleChange(input) {

    if (input.value < 0) {
    input.value = 0;
    } else if (input.value > 100) {
    input.value = 100;
    } else if (isNaN(input.value)) {
    input.value = 0;
    }

    }
</script>

<!-- limiter les  -->

<script>

        // ajout de client 

        \$(document).ready(function(){

            // vider le formulaire des recep

            \$('.form_vide').val('');
            /* table */
                var pseudo_hotel = \$('#hide_pseudo_hotel').val();
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
                            'date'  : \$(\"#donnee_du_jour_createdAt\").val()
                            },
                        \"dataSrc\":\"\",
                        
                    },
                    \"initComplete\":function( settings, json){
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

            /*  fin table */
            

            \$(\"#ajouter_client\").click(function (e) { 
                e.preventDefault();
                // alert('ksg')
                var nom = \$('#nom_client').val();
                var prenom = \$('#prenom_client').val();
                var date_arrivee = \$('#date_arrivee').val();
                var date_depart = \$('#date_depart').val();
                var createdAt = \$('#donnee_du_jour_createdAt').val();
                var nbr_chambre = \$('#nbr_chambre').val();
                var prix_total = \$(\"#prix_total\").val();
                var provenance = \$(\"#provenance\").val();
                var email_client = \$(\"#email_client\").val();
                var telephone_client = \$(\"#telephone_client\").val();
                var source = \"\";
                if(provenance == \"OTA\"){
                    source = \$(\".source_OTA select\").val();
                }
                if(provenance == \"DIRECT\"){
                    source = \$(\".source_DIRECT select\").val();
                }
                if(provenance == \"TOA\"){
                    source = \$(\".source_TOA input\").val();
                }
                if(provenance == \"CORPO\"){
                    source = \$(\".source_CORPO input\").val();
                }
                
                // var tarif_client = \$(\"#tarif_client\").val();
                var data = {
                    \"nom_client\"    : nom,
                    \"prenom_client\" : prenom,
                    \"date_arrivee\"  : date_arrivee,
                    \"date_depart\"   : date_depart,
                    \"nbr_chambre\"   : nbr_chambre,
                    \"prix_total\"    : prix_total,
                    \"createdAt\"     : createdAt, 
                    \"provenance\"    : provenance,
                    \"source\"        : source, 
                    \"email\"         : email_client,
                    \"telephone\"     : telephone_client
                    
                };

                \$.ajax({
                    url : \"";
        // line 939
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("store_client", ["pseudo_hotel" => ($context["hotel"] ?? null)]), "html", null, true);
        echo "\", // ClientController
                    type : \"POST\",
                    data : data,
                    beforeSend : function(){
                        \$(\"#ajouter_client\").html('<span>Patienter...</span>');
                    },
                    success : function (response) {
                       
                        if(response == \"ok\"){
                            // on initialise le formulaire
                            \$('#nom_client').val(\"\");
                            \$('#prenom_client').val(\"\");
                            \$('#date_arrivee').val(\"d-m-YYYY\");
                            \$('#date_depart').val(\"d-m-YYYY\");
                            \$(\"#nbr_chambre\").val(\"\");
                            \$(\"#prix_total\").val(\"\");
                            \$(\".source input\").val(\"\");
                            \$(\"#email_client\").val(\"\");
                            \$(\"#telephone_client\").val(\"\");
                            
                        }
                        else{
                            \$(\".info_arror_client p\").text(response);
                            \$(\".info_arror_client\").fadeIn(\"slow\");
                        }
                    },
                    complete : function(){
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
                         \$(\"#ajouter_client\").html('<span class=\"fa fa-plus\"></span><span>Ajouter</span>');
                    },
                    error : function() {
                        alert('Erreur au niveu de store visit')
                    },

                })
                
            });

            // fade out error form 

            \$(\"#ajouter_client\").blur(function(){
                \$(\".info_arror_client\").fadeOut(\"fast\");
                
            })

            // suppression client présent 

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
                     url : \"/admin/suprimer_client\",
                     data : {
                         \"visit_id\" : id,
                         \"pseudo_hotel\" : pseudo_hotel,
                     },
                     type : \"POST\",
                     success : function(response){
                         if(response == \"deleted\"){
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
                     url : \"/admin/check_client\",
                     data : {
                         \"visit_id\" : id,
                         \"action\" : \"modification\",
                     },
                     type : \"POST\",
                    
                     success : function(response){
                        //\$('#test').html(response);
                        \$('#form_edit_client').html(response);
                        \$('#modal_form_edit_client').modal('show');
                     },
                     error : function(error){
                         alert('erreur de server');
                     },
                })
            })

            /* reste à faire modification de l'input */

            \$(document).on('click', ' #a_modal_modif_client', function(ev){
                ev.preventDefault();
                var source_init = \$(this).attr(\"data-change-source-init\");
                var id = \$(this).attr(\"data-id\");
                var nom = \$('#modif_nom_client').last().val();
                var prenom = \$(' #modif_prenom_client').last().val();
                var date_arrivee = \$(' #modif_date_arrivee').last().val();
                var date_depart = \$(' #modif_date_depart').last().val();
                var nbr_chambre = \$(' #modif_nbr_chambre_client').last().val();
                var prix_total = \$(\" #modif_prix_total_client\").last().val();
                var provenance = \$(\" #modif_provenance_client\").last().val();
                var email = \$(\" #modif_email_client\").last().val();
                var telephone = \$(\" #modif_telephone_client\").last().val();
                
                var source = \"\";
                if(provenance == \"OTA\"){
                    source = \$(\" #modal_source_OTA_init select\").last().val();
                    if(source_init == \"oui\"){
                        source = \$(\" #modal_source_OTA select\").last().val();
                    }
                }
                if(provenance == \"DIRECT\"){
                    source = \$(\" #modal_source_DIRECT_init select\").last().val();
                    if(source_init == \"oui\"){
                         source = \$(\" #modal_source_DIRECT select\").last().val();
                    }
                }
                if(provenance == \"TOA\"){
                    source = \$(\" #modal_source_TOA_init input\").last().val();
                    if(source_init == \"oui\"){
                        source = \$(\" #modal_source_TOA input\").last().val();
                    }
                }
                if(provenance == \"CORPO\"){
                    source = \$(\" #modal_source_CORPO_init input\").last().val();
                    if(source_init == \"oui\"){
                        source = \$(\" #modal_source_CORPO input\").last().val();
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
                //console.log(data);

                \$.ajax({
                    url : \"/admin/edit_client\",
                    data : data,
                    type : \"POST\",
                    beforeSend : function(){
                       \$('#a_modal_modif_client').html('<span>Patienter...</span>'); 
                    },
                    success : function(response){
                        //\$('#test').html(response)
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
            
            // modif data 
            var date_text = \$('#donnee_du_jour_createdAt').val();
            var date_aff = toDateText(date_text);
            \$(\"#data_text_date\").text(date_aff);
            \$('#change_date_insert').on(\"click\", function(ev){
                //alert('dhb')
                ev.preventDefault();
                table.ajax.reload(null, false);
                var date = \$(\"#donnee_du_jour_createdAt\").val();
                \$.ajax({
                    url : \"/profile/check_ddj/\" + pseudo_hotel,
                    type : \"POST\",
                    data : {
                        \"date\" : date,
                    }, 
                    beforeSend : function(){
                        \$('#change_date_insert').text(\"Patienter ...\");
                    },
                    success : function(response){
                        var date_text = \$('#donnee_du_jour_createdAt').val();
                        var date_aff = toDateText(date_text);
                        \$(\"#data_text_date\").text(date_aff);
                        var res = response.split('-');
                        if(res.length > 1){ 
                            window.location.href = \"/profile/\" + pseudo_hotel + \"/add/donnee_jour/\" + response;
                        }
                        else{
                            window.location.href = \"/profile/\" + pseudo_hotel + \"/donnee_jour/\" + response;
                        }
                       
                    }, 
                    error : function(){
                        alert('erreur au niveau de check _ data ddj');
                    }
                })
            })

            function toDateText(date){
                var tab = date.split('-');
                var mois = {
                    \"01\"    : \"Janvier\",
                    \"02\"    : \"Février\",
                    \"03\"    : \"Mars\",
                    \"04\"    : \"Avril\",
                    \"05\"    : \"Mai\",
                    \"06\"    : \"Juin\",
                    \"07\"    : \"Juillet\",
                    \"08\"    : \"Août\",
                    \"09\"    : \"Septembre\",
                    \"10\"    : \"Octobre\",
                    \"11\"    : \"Novembre\",
                    \"12\"    : \"Décembre\"
                }
                return tab[2] + \" \" + mois[tab[1]] + \" \" + tab[0]; 
            }

            function reinitialise_source(){
                \$(\".source\").hide();
                var prov = \$(\"#provenance\").val();
                \$(\".source_\" + prov).show();
            }

            \$(\"#provenance\").change(function(){
                reinitialise_source();
            })

            function reinitialise_modal_source(){
                \$(\".modal_source\").hide();
                var prov = \$(\"#modif_provenance_client\").val();
                //alert(prov);
                \$(\"#modal_source_\" + prov).show();
            }

            \$(document).on(\"change\", \"#modif_provenance_client\", function(){
                
                \$(\".modal_source_init\").hide();
                // on change l'articut du a_modal_modif_client
                \$(\"#a_modal_modif_client\").attr(\"data-change-source-init\", \"oui\");
                reinitialise_modal_source();
            })

            reinitialise_source();
            reinitialise_modal_source();

           
        })

</script>

<script>
    
    var datas = \$('<div>').html('";
        // line 1242
        echo twig_escape_filter($this->env, ($context["result"] ?? null), "html", null, true);
        echo "')[0].textContent;
    var clients = JSON.parse(datas)
    //console.log(clients);
    var app = new Vue({
        el: '#app',
        delimiters: ['\${', '}'],
        data() {
            return {
                name: '',
                lastName: '',
                email: '',
                telephone: '',
                clients: clients,
                isTyping : false,
            }
        },
        computed : {
            filteredClients(){
                return this.clients.filter((client)=>{
                    return client.name.toLowerCase().includes(this.name.toLowerCase());
                })
            }
        },
        methods: {
            proposeName: function() {
                if(this.name.length > 2){
                        setTimeout(() => {
                        this.isTyping = true;
                    }, 300);
                }
                else{
                    setTimeout(() => {
                        this.isTyping = false;
                    }, 300);
                    // on vide les autres input
                    // this.lastName = \"\";
                    // this.email = \"\";
                    // this.telephone = \"\";
                }
            },
            putClient: function(client){
                this.isTyping = false;
                this.name = client.name;
                this.lastName = (client.lastName != '') ? client.lastName : ''
                this.email = (client.email != '') ? client.email : ''
                this.telephone = (client.telephone != '') ? client.telephone : ''

            },
            liveOutFocus : function () {
                this.isTyping = false;
            }
        }
    })
</script>
<script>

\t/* utilisation de cleave.js pour les input */

    // style des % et Ar
    var n = document.querySelectorAll(\".input_nombre\");
    for (var i = n.length - 1; i >= 0; i--) {
        //alert(n[i])
        new Cleave(n[i], { // prefix: 'Ar ',
            numeral: true,
            delimiter: [' '],
            numeralThousandsGroupStyle: 'thousand',
            numericOnly: true
        });
    }


    new Cleave('.input_pourcent', {blocks: [4]});


/* fin utilisation de cleave.js pour les input */

</script>

";
    }

    public function getTemplateName()
    {
        return "page/donnee_jour.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1428 => 1242,  1122 => 939,  970 => 790,  967 => 789,  963 => 788,  947 => 774,  945 => 773,  936 => 767,  929 => 762,  925 => 760,  923 => 759,  915 => 753,  911 => 751,  908 => 746,  904 => 744,  901 => 740,  898 => 739,  892 => 734,  888 => 732,  885 => 727,  881 => 725,  878 => 721,  875 => 720,  869 => 715,  865 => 713,  863 => 712,  857 => 708,  853 => 706,  850 => 701,  846 => 699,  843 => 695,  840 => 694,  834 => 689,  830 => 687,  827 => 682,  823 => 680,  820 => 676,  817 => 675,  811 => 670,  807 => 668,  805 => 667,  799 => 663,  795 => 661,  792 => 656,  788 => 654,  785 => 650,  782 => 649,  776 => 644,  772 => 642,  769 => 637,  765 => 635,  762 => 631,  759 => 630,  753 => 625,  749 => 623,  747 => 622,  741 => 618,  737 => 616,  734 => 611,  730 => 609,  727 => 605,  724 => 604,  718 => 599,  714 => 597,  711 => 591,  707 => 589,  704 => 585,  701 => 584,  695 => 579,  691 => 577,  689 => 576,  683 => 572,  679 => 570,  676 => 564,  672 => 562,  669 => 558,  666 => 557,  660 => 552,  656 => 550,  653 => 544,  649 => 542,  646 => 538,  643 => 537,  636 => 531,  632 => 529,  630 => 528,  624 => 524,  620 => 522,  618 => 521,  610 => 515,  606 => 513,  603 => 505,  599 => 503,  596 => 496,  593 => 495,  586 => 489,  582 => 487,  580 => 486,  575 => 483,  571 => 481,  568 => 473,  564 => 471,  561 => 464,  558 => 463,  551 => 457,  547 => 455,  544 => 448,  540 => 446,  537 => 440,  534 => 439,  528 => 434,  524 => 432,  522 => 431,  516 => 427,  512 => 425,  510 => 424,  504 => 420,  500 => 418,  497 => 410,  493 => 408,  490 => 401,  487 => 400,  481 => 395,  477 => 393,  475 => 392,  470 => 389,  466 => 387,  463 => 379,  459 => 377,  456 => 370,  453 => 369,  447 => 364,  443 => 362,  440 => 354,  436 => 352,  433 => 345,  430 => 344,  424 => 339,  420 => 337,  418 => 336,  411 => 331,  407 => 329,  404 => 321,  400 => 319,  397 => 312,  394 => 311,  388 => 306,  384 => 304,  381 => 296,  377 => 294,  374 => 287,  372 => 286,  366 => 282,  362 => 280,  360 => 279,  352 => 273,  348 => 271,  346 => 270,  341 => 267,  339 => 266,  320 => 249,  288 => 215,  282 => 210,  258 => 188,  230 => 162,  226 => 160,  223 => 151,  219 => 149,  216 => 140,  213 => 139,  207 => 134,  203 => 132,  200 => 123,  196 => 121,  193 => 112,  191 => 111,  185 => 107,  181 => 105,  179 => 104,  176 => 103,  170 => 98,  166 => 96,  163 => 88,  159 => 86,  156 => 79,  153 => 78,  146 => 72,  142 => 70,  139 => 62,  135 => 60,  132 => 52,  130 => 51,  122 => 45,  118 => 43,  116 => 42,  94 => 24,  86 => 18,  81 => 15,  79 => 14,  73 => 10,  69 => 9,  62 => 7,  58 => 6,  53 => 3,  49 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "page/donnee_jour.html.twig", "/home/dashboy/www/templates/page/donnee_jour.html.twig");
    }
}
