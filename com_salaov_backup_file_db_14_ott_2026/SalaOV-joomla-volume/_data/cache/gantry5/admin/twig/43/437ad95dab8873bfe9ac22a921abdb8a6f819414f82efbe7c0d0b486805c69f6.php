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

/* menu/item.html.twig */
class __TwigTemplate_0c5d34feb4e786e00f3c6ba231e9665b460fe8d2fe9dab37167d690f5070903e extends \Twig\Template
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
        $context["ajaxTarget"] = ((($this->getAttribute(($context["item"] ?? null), "level", []) > 1)) ? ("data-g5-ajaxify-target-parent=\".submenu-column\"") : ("data-g5-ajaxify-target=\"[data-g5-menu-columns]\""));
        // line 2
        echo "
";
        // line 3
        $context["attributes"] = ((("data-g5-ajaxify=\"\" data-g5-ajaxify-params=\"" . twig_escape_filter($this->env, "{\"inline\":1}", "html_attr")) . "\" ") . ($context["ajaxTarget"] ?? null));
        // line 4
        echo "
";
        // line 5
        if ($this->getAttribute(($context["item"] ?? null), "path", [])) {
            // line 6
            echo "<a ";
            echo ($context["attributes"] ?? null);
            echo " href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "menu", 1 => ($context["id"] ?? null), 2 => $this->getAttribute(($context["item"] ?? null), "path", [])], "method"), "html", null, true);
            echo "\" class=\"menu-item\">
";
        } else {
            // line 8
            echo "<span class=\"menu-item\">
";
        }
        // line 10
        if (($this->getAttribute(($context["item"] ?? null), "type", []) == "particle")) {
            // line 11
            echo "    <span class=\"menu-item-content\">
        <span class=\"menu-item-title\">";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "title", []), "html", null, true);
            echo "</span>
        ";
            // line 13
            if ($this->getAttribute(($context["item"] ?? null), "subtitle", [])) {
                echo "<span class=\"menu-item-subtitle\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "subtitle", []), "html", null, true);
                echo "</span>";
            }
            // line 14
            echo "    </span>
    <span class=\"badge menu-item-type\">";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "particle", []), "html", null, true);
            echo "</span>
";
        } else {
            // line 17
            echo "    ";
            if ($this->getAttribute(($context["item"] ?? null), "image", [])) {
                // line 18
                echo "        <img alt=\"\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute(($context["item"] ?? null), "image", [])), "html", null, true);
                echo "\" />
    ";
            } elseif ($this->getAttribute(            // line 19
($context["item"] ?? null), "icon", [])) {
                // line 20
                echo "        <i class=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "icon", []), "html", null, true);
                echo "\"></i>
    ";
            }
            // line 22
            echo "    ";
            if (( !$this->getAttribute(($context["item"] ?? null), "icon_only", []) ||  !($this->getAttribute(($context["item"] ?? null), "image", []) || $this->getAttribute(($context["item"] ?? null), "icon", [])))) {
                // line 23
                echo "        <span class=\"menu-item-content\">
            <span class=\"menu-item-title\">";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "title", []), "html", null, true);
                echo "</span>
                ";
                // line 25
                if ($this->getAttribute(($context["item"] ?? null), "subtitle", [])) {
                    echo "<span class=\"menu-item-subtitle\">";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "subtitle", []), "html", null, true);
                    echo "</span>";
                }
                // line 26
                echo "        </span>
    ";
            }
            // line 28
            echo "    ";
            if ($this->getAttribute(($context["item"] ?? null), "children", [])) {
                // line 29
                echo "<span class=\"parent-indicator\"></span>";
            }
        }
        // line 32
        if ( !$this->getAttribute(($context["item"] ?? null), "path", [])) {
            // line 33
            echo "</span>
";
        } else {
            // line 35
            echo "</a>
";
        }
        // line 37
        echo "<a class=\"config-cog\" href=\"";
        echo twig_escape_filter($this->env, ((($this->getAttribute(($context["item"] ?? null), "type", []) == "particle")) ? ($this->getAttribute(($context["gantry"] ?? null), "route", [0 => "menu/particle"], "method")) : ($this->getAttribute(($context["gantry"] ?? null), "route", [0 => "menu/edit", 1 => ($context["id"] ?? null), 2 => $this->getAttribute(($context["item"] ?? null), "path", [])], "method"))), "html", null, true);
        echo "\">
    <i aria-label=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MENU_ITEM_SETTINGS"), "html", null, true);
        echo "\" class=\"fa fa-cog\" aria-hidden=\"true\"></i>
</a>
";
    }

    public function getTemplateName()
    {
        return "menu/item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 38,  130 => 37,  126 => 35,  122 => 33,  120 => 32,  116 => 29,  113 => 28,  109 => 26,  103 => 25,  99 => 24,  96 => 23,  93 => 22,  87 => 20,  85 => 19,  80 => 18,  77 => 17,  72 => 15,  69 => 14,  63 => 13,  59 => 12,  56 => 11,  54 => 10,  50 => 8,  42 => 6,  40 => 5,  37 => 4,  35 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "menu/item.html.twig", "/var/www/html/administrator/components/com_gantry5/templates/menu/item.html.twig");
    }
}
