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

/* @gantry-admin/layouts/outline.html.twig */
class __TwigTemplate_73045944b4f238a6a92c83f203e005677db18c29479756be9ff56801e709be07 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        try {            // line 2
            $context["preset"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "outlines", []), "layoutPreset", [0 => ($context["name"] ?? null)], "method");
        } catch (\Exception $e) {
            if ($context['gantry']->debug()) throw $e;
            if (\GANTRY_DEBUGGER) \Gantry\Debugger::addException($e);
            $context['e'] = $e;
            // line 4
            $context["preset"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "outlines", []), "layoutPreset", [0 => "default"], "method");
        }
        // line 6
        echo "
<div id=\"outline-";
        // line 7
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\" class=\"page\">
    <h4>
        ";
        // line 9
        if ((($context["name"] ?? null) == "default")) {
            // line 10
            echo "            <span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_BASE_OUTLINE"), "html", null, true);
            echo "</span>
        ";
        } else {
            // line 12
            echo "            ";
            if ($this->getAttribute(($context["gantry"] ?? null), "authorize", [0 => "outline.rename"], "method")) {
                // line 13
                echo "            <span data-g-config-href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "configurations", 1 => ($context["name"] ?? null), 2 => "rename"], "method"), "html", null, true);
                echo "\" data-g-config-method=\"post\"
                  data-title-editable=\"";
                // line 14
                echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
                echo "\" class=\"title\" data-tip=\"";
                echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
                echo "\" data-tip-place=\"top-right\">
                ";
                // line 15
                echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
                echo "
            </span>
            <i class=\"fa fa-fw fa-pencil fa-pencil-alt font-small\" aria-hidden=\"true\" tabindex=\"0\" aria-label=\"";
                // line 17
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EDIT_TITLE", twig_escape_filter($this->env, ($context["title"] ?? null))), "html", null, true);
                echo "\" data-title-edit=\"\"></i>
            ";
            } else {
                // line 19
                echo "                ";
                echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
                echo "
            ";
            }
            // line 21
            echo "        ";
        }
        // line 22
        echo "        <span class=\"float-right font-small\">(";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ID_X", ($context["name"] ?? null)), "html", null, true);
        echo ")</span>
    </h4>
    <div class=\"inner-params\">
        <img src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc((($this->getAttribute(($context["preset"] ?? null), "image", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["preset"] ?? null), "image", []), "gantry-admin://images/layouts/default.png")) : ("gantry-admin://images/layouts/default.png"))), "html", null, true);
        echo "\" />
    </div>
    <div class=\"inner-params\">
        <div class=\"center outline-actions\">
            <a data-title=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EDIT"), "html", null, true);
        echo "\"
               data-tip=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EDIT"), "html", null, true);
        echo "\"
               role=\"button\"
               aria-label=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EDIT_X", ($context["title"] ?? null)), "html", null, true);
        echo "\"
               title=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EDIT_X", ($context["title"] ?? null)), "html", null, true);
        echo "\"
               data-g5-ajaxify=\"\"
               data-g5-ajaxify-target=\"[data-g5-content-wrapper]\"
               data-g5-ajaxify-params=\"";
        // line 36
        echo twig_escape_filter($this->env, twig_jsonencode_filter(["navbar" => true]), "html_attr");
        echo "\"
               href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "configurations", 1 => ($context["name"] ?? null), 2 => "layout"], "method"), "html", null, true);
        echo "\"
               class=\"button button-primary\"
            >
                <i class=\"fa fa-fw fa-pencil fa-pencil-alt\" aria-hidden=\"true\"></i>
            </a>
            ";
        // line 42
        if (($this->getAttribute(($context["gantry"] ?? null), "authorize", [0 => "outline.create"], "method") && $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "outlines", []), "canDuplicate", [0 => ($context["name"] ?? null)], "method"))) {
            // line 43
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "configurations", 1 => ($context["name"] ?? null), 2 => "duplicate"], "method"), "html", null, true);
            echo "\"
               data-tip=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_DUPLICATE"), "html", null, true);
            echo "\"
               title=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_DUPLICATE_X", ($context["title"] ?? null)), "html", null, true);
            echo "\"
               aria-label=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_DUPLICATE_X", ($context["title"] ?? null)), "html", null, true);
            echo "\"
               data-g5-outline-duplicate class=\"button button-secondary\">
                <i class=\"fa fa-fw fa-copy\" aria-hidden=\"true\"></i>
            </a>
            ";
        }
        // line 51
        echo "            ";
        if ((((($context["name"] ?? null) != "default") && $this->getAttribute(($context["gantry"] ?? null), "authorize", [0 => "outline.delete"], "method")) && $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "outlines", []), "canDelete", [0 => ($context["name"] ?? null)], "method"))) {
            // line 52
            echo "            <button data-title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_DELETE"), "html", null, true);
            echo "\"
                    data-tip=\"";
            // line 53
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_DELETE"), "html", null, true);
            echo "\"
                    title=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_DELETE_X", ($context["title"] ?? null)), "html", null, true);
            echo "\"
                    aria-label=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_DELETE_X", ($context["title"] ?? null)), "html", null, true);
            echo "\"
                    data-g-config=\"delete\"
                    data-g-config-href=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "configurations", 1 => ($context["name"] ?? null), 2 => "delete"], "method"), "html", null, true);
            echo "\"
                    data-g-config-href-confirm=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "configurations", 1 => ($context["name"] ?? null), 2 => "delete/confirm"], "method"), "html", null, true);
            echo "\"
                    data-g-config-method=\"POST\" class=\"button red\"
            >
                <i class=\"far fa-fw fa-trash-alt\" aria-hidden=\"true\"></i>
            </button>
            ";
        }
        // line 64
        echo "        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/layouts/outline.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 64,  182 => 58,  178 => 57,  173 => 55,  169 => 54,  165 => 53,  160 => 52,  157 => 51,  149 => 46,  145 => 45,  141 => 44,  136 => 43,  134 => 42,  126 => 37,  122 => 36,  116 => 33,  112 => 32,  107 => 30,  103 => 29,  96 => 25,  89 => 22,  86 => 21,  80 => 19,  75 => 17,  70 => 15,  64 => 14,  59 => 13,  56 => 12,  50 => 10,  48 => 9,  43 => 7,  40 => 6,  37 => 4,  31 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@gantry-admin/layouts/outline.html.twig", "/var/www/html/administrator/components/com_gantry5/templates/layouts/outline.html.twig");
    }
}
