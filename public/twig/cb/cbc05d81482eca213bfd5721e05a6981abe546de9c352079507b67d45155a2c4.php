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

/* modal/modal_client.html.twig */
class __TwigTemplate_3943d141a1e3a74f368770a088ff67dce87ba596951556e18a825e2a2eea32e5 extends Template
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
        echo "<!-- Modal modif  -->
                    <div class=\"modal fade\" id=\"modal_form_edit_client\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                        <div class=\"modal-dialog opacity-animate4\">
                            <div class=\"modal-content\">
                                <div class=\"modal-header\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                    <h3 class=\"modal-title\" style=\"text-align: center;\">Modification</h3>
                                </div>
                                <div class=\"modal-body modal_modif_client\">
                                    <form action=\"/profile/' . \$pseudo_hotel . '/hebergement\" method = \"POST\" id=\"form_edit_client\">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- fin Modal modif  -->

                    <!-- Modal suppr  -->

                    <div class=\"modal fade\" id=\"modal_form_confirme\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                        <div class=\"modal-dialog opacity-animate4\">
                            <div class=\"modal-content\">
                                <div class=\"modal-header\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                    <h3 class=\"modal-title\" style=\"text-align: center;\">Voulez-vous vraiment supprimer cet élément ?</h3>
                                </div>
                                <div class=\"modal-body\">
                                    <div id=\"div__conf\">
                                        <button class=\"btn btn-warning supprimer\" data-id = \"\"  data-dismiss=\"modal\" data-confirm = \"oui\">Supprimer</button>
                                        <button class=\"btn btn-warning annuler\" data-dismiss=\"modal\" data-confirm = \"non\">Annuler</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- fin Modal suppr  -->";
    }

    public function getTemplateName()
    {
        return "modal/modal_client.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modal/modal_client.html.twig", "/home/dashboy/www/templates/modal/modal_client.html.twig");
    }
}
