<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* forms/fields/select/date.html.twig */
class __TwigTemplate_c7d66e07d20ce88d33e2147ef85b02ddfe42e98abd6965587505434bae44a353 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'options' => [$this, 'block_options'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "forms/fields/select/selectize.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("forms/fields/select/selectize.html.twig", "forms/fields/select/date.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_options($context, array $blocks = [])
    {
        // line 4
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["field"] ?? null), "options", []));
        foreach ($context['_seq'] as $context["key"] => $context["text"]) {
            // line 5
            echo "        <option
                ";
            // line 7
            echo "                ";
            if (($context["key"] == ($context["value"] ?? null))) {
                echo "selected=\"selected\"";
            }
            // line 8
            echo "                value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\"
                ";
            // line 10
            echo "                ";
            if (twig_in_filter($this->getAttribute($this->getAttribute(($context["field"] ?? null), "options", []), "disabled", []), [0 => "on", 1 => "true", 2 => 1])) {
                echo "disabled=\"disabled\"";
            }
            // line 11
            echo "                ";
            if ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "options", [], "any", false, true), "label", [], "any", true, true)) {
                echo "label=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["field"] ?? null), "options", []), "label", []), "html", null, true);
                echo "\"";
            }
            // line 12
            echo "                >";
            echo twig_escape_filter($this->env, ((twig_test_empty($context["key"])) ? ($context["text"]) : (twig_date_format_filter($this->env, "now", $context["key"]))), "html", null, true);
            echo "</option>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['text'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "forms/fields/select/date.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 12,  65 => 11,  60 => 10,  55 => 8,  50 => 7,  47 => 5,  42 => 4,  39 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "forms/fields/select/date.html.twig", "/var/www/html/administrator/components/com_gantry5/templates/forms/fields/select/date.html.twig");
    }
}
