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

/* table/table_client.html.twig */
class __TwigTemplate_9bf01b9457c9cdbafd610de9c7d0131d3b049a400ab6cd60c4546d5a05d209f0 extends Template
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
        echo "<div>
\t<table class=\"display\" style=\"width: 100%\" id=\"tableau_client_donnee_jour\">
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<td>
\t\t\t\t\t<span>NOM</span>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<span>CHECK IN</span>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<span>CHECK OUT</span>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<span>PROVENANCE</span>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<span>SOURCE</span>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<span>NBR NUITE</span>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<span>NBR CHAMBRE</span>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<span>PRIX TOTAL</span>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<span>ACTIONS</span>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody id=\"tbody_load\"></tbody>
\t</table>
</div>
";
    }

    public function getTemplateName()
    {
        return "table/table_client.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "table/table_client.html.twig", "/home/dashboy/www/templates/table/table_client.html.twig");
    }
}
