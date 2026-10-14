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

/* @gantry-admin/pages/menu/menu.html.twig */
class __TwigTemplate_60acee13ddee082eba6dd64e69fefcbd2c6fa6a595155bd53e9fdf5c5dd3ad94 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'gantry' => [$this, 'block_gantry'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((((($context["ajax"] ?? null) - ($context["suffix"] ?? null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/pages/menu/menu.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 3
        $context["visible"] = ( !($context["error"] ?? null) && $this->getAttribute(($context["gantry"] ?? null), "authorize", [0 => "menu.manage", 1 => ($context["id"] ?? null)], "method"));
        // line 4
        $context["authorized"] = (($context["visible"] ?? null) && $this->getAttribute(($context["gantry"] ?? null), "authorize", [0 => "menu.edit", 1 => ($context["id"] ?? null)], "method"));
        // line 1
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_gantry($context, array $blocks = [])
    {
        // line 7
        echo "<form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "menu", 1 => ($context["id"] ?? null)], "method"), "html", null, true);
        echo "\" data-mm-container=\"\">
    <div class=\"menu-header\">
        <span class=\"float-right\">
            <button class=\"button button-back-to-conf\">
                <i class=\"fa fa-fw fa-arrow-left\" aria-hidden=\"true\"></i> <span>";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_BACK_SETUP"), "html", null, true);
        echo "</span>
            </button>
            ";
        // line 13
        if (($context["authorized"] ?? null)) {
            // line 14
            echo "            <button type=\"submit\" class=\"button button-primary button-save\" data-save=\"Menu\">
                <i class=\"fa fa-fw fa-check\" aria-hidden=\"true\"></i> <span>";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SAVE_MENU"), "html", null, true);
            echo "</span>
            </button>
            ";
        }
        // line 18
        echo "        </span>
        <h2 class=\"page-title\">";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MENU_EDITOR"), "html", null, true);
        echo "</h2>
        ";
        // line 20
        if (($context["menus"] ?? null)) {
            // line 21
            echo "        <select placeholder=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SELECT_ELI"), "html", null, true);
            echo "\"
                data-selectize-ajaxify=\"\"
                data-selectize=\"\"
                data-g5-ajaxify-target=\"[data-g5-content]\"
                class=\"menu-select-wrap\"
        >
            ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["menus"] ?? null));
            foreach ($context['_seq'] as $context["menu_name"] => $context["menu_title"]) {
                // line 28
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, $context["menu_name"], "html", null, true);
                echo "\"
                    ";
                // line 29
                if ((($context["id"] ?? null) == $context["menu_name"])) {
                    echo "selected=\"selected\"";
                }
                // line 30
                echo "                    data-data=\"";
                echo twig_escape_filter($this->env, twig_jsonencode_filter(["url" => $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "menu", 1 => $context["menu_name"]], "method")]), "html_attr");
                echo "\">
                ";
                // line 31
                echo twig_escape_filter($this->env, $context["menu_title"], "html", null, true);
                echo (((($context["default_menu"] ?? null) == $context["menu_name"])) ? (" ★") : (""));
                echo "
            </option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['menu_name'], $context['menu_title'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo "        </select>
        ";
        }
        // line 36
        echo "    </div>

    ";
        // line 38
        if (($context["error"] ?? null)) {
            // line 39
            echo "        <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["error"] ?? null), "message", []), "html", null, true);
            echo "</div>
    ";
        } elseif ( !        // line 40
($context["authorized"] ?? null)) {
            // line 41
            echo "        <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MENU_EDIT_UNAUTHORIZED"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MENU_EDIT_UNAUTHORIZED_PLATFORM"), "html", null, true);
            echo "</div>
    ";
        }
        // line 43
        echo "
    ";
        // line 44
        if (($context["authorized"] ?? null)) {
            // line 45
            echo "    <div class=\"g5-mm-particles-picker\">
        <ul class=\"g-menu-addblock\">
            ";
            // line 47
            if ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", []), "has", [0 => "modules"], "method")) {
                // line 48
                echo "            <li data-mm-blocktype=\"module\" data-mm-id=\"__module\">
                <span class=\"menu-item\">
                    <i class=\"far fa-fw fa-hand-paper\" aria-hidden=\"true\"></i>
                    <span class=\"title\">";
                // line 51
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MODULE"), "html", null, true);
                echo "</span>
                </span>
                <a class=\"config-cog\" href=\"";
                // line 53
                echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "menu/select/module"], "method"), "html", null, true);
                echo "\">
                    <i aria-label=\"";
                // line 54
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MENU_MODULE_SETTINGS"), "html", null, true);
                echo "\" class=\"fa fa-cog\" aria-hidden=\"true\"></i>
                </a>
            </li>
            ";
            } elseif ($this->getAttribute($this->getAttribute(            // line 57
($context["gantry"] ?? null), "platform", []), "has", [0 => "widgets"], "method")) {
                // line 58
                echo "            <li data-mm-blocktype=\"widget\" data-mm-id=\"__widget\">
                <span class=\"menu-item\">
                    <i class=\"far fa-fw fa-hand-paper\" aria-hidden=\"true\"></i>
                    <span class=\"title\">";
                // line 61
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_WIDGET"), "html", null, true);
                echo "</span>
                </span>
                <a class=\"config-cog\" href=\"";
                // line 63
                echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "menu/select/widget"], "method"), "html", null, true);
                echo "\">
                    <i aria-label=\"";
                // line 64
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MENU_WIDGET_SETTINGS"), "html", null, true);
                echo "\" class=\"fa fa-cog\" aria-hidden=\"true\"></i>
                </a>
            </li>
            ";
            }
            // line 68
            echo "            <li data-mm-blocktype=\"particle\" data-mm-id=\"__particle\">
                <span class=\"menu-item\">
                    <i class=\"far fa-fw fa-hand-paper\" aria-hidden=\"true\"></i>
                    <span class=\"title\">";
            // line 71
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PARTICLE"), "html", null, true);
            echo "</span>
                </span>
                <a class=\"config-cog\" href=\"";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "menu/select/particle"], "method"), "html", null, true);
            echo "\">
                    <i aria-label=\"";
            // line 74
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MENU_PARTICLE_SETTINGS"), "html", null, true);
            echo "\" class=\"fa fa-cog\" aria-hidden=\"true\"></i>
                </a>
            </li>
        </ul>
    </div>
    ";
        }
        // line 80
        echo "
    ";
        // line 81
        if (($context["visible"] ?? null)) {
            // line 82
            echo "    <div id=\"menu-editor\"
         data-menu-ordering=\"";
            // line 83
            echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute(($context["menu"] ?? null), "ordering", [])), "html_attr");
            echo "\"
         data-menu-items=\"";
            // line 84
            echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute(($context["menu"] ?? null), "items", [0 => false], "method")), "html_attr");
            echo "\"
         data-menu-settings=\"";
            // line 85
            echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute(($context["menu"] ?? null), "settings", [])), "html_attr");
            echo "\">
        ";
            // line 86
            if (twig_length_filter($this->env, $this->getAttribute(($context["menu"] ?? null), "items", []))) {
                // line 87
                echo "            ";
                $this->loadTemplate("menu/base.html.twig", "@gantry-admin/pages/menu/menu.html.twig", 87)->display(twig_array_merge($context, ["item" => $this->getAttribute(($context["menu"] ?? null), "root", [])]));
                // line 88
                echo "        ";
            } else {
                // line 89
                echo "            ";
                $this->loadTemplate("menu/empty.html.twig", "@gantry-admin/pages/menu/menu.html.twig", 89)->display(twig_array_merge($context, ["item" => $this->getAttribute(($context["menu"] ?? null), "root", [])]));
                // line 90
                echo "        ";
            }
            // line 91
            echo "    </div>

    <div id=\"trash\" data-mm-eraseparticle=\"\"><div class=\"trash-zone\">&times;</div><span>";
            // line 93
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_DROP_DELETE"), "html", null, true);
            echo "</span></div>
    ";
        }
        // line 95
        echo "</form>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/menu/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  262 => 95,  257 => 93,  253 => 91,  250 => 90,  247 => 89,  244 => 88,  241 => 87,  239 => 86,  235 => 85,  231 => 84,  227 => 83,  224 => 82,  222 => 81,  219 => 80,  210 => 74,  206 => 73,  201 => 71,  196 => 68,  189 => 64,  185 => 63,  180 => 61,  175 => 58,  173 => 57,  167 => 54,  163 => 53,  158 => 51,  153 => 48,  151 => 47,  147 => 45,  145 => 44,  142 => 43,  134 => 41,  132 => 40,  127 => 39,  125 => 38,  121 => 36,  117 => 34,  107 => 31,  102 => 30,  98 => 29,  93 => 28,  89 => 27,  79 => 21,  77 => 20,  73 => 19,  70 => 18,  64 => 15,  61 => 14,  59 => 13,  54 => 11,  46 => 7,  43 => 6,  39 => 1,  37 => 4,  35 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@gantry-admin/pages/menu/menu.html.twig", "/var/www/html/administrator/components/com_gantry5/templates/pages/menu/menu.html.twig");
    }
}
