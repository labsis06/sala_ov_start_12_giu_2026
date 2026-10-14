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

/* @gantry-admin/partials/header.html.twig */
class __TwigTemplate_d831df289b69ed7fe5c943a92af23d35c1c5fb2ef32560a36f56657052fdacb9 extends \Twig\Template
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
        echo "<div class=\"g-grid\">
    <div class=\"g-block\">
        <div class=\"g-content clearfix\">
            <span class=\"theme-title\">
                <i class=\"fa fa-tint\" aria-hidden=\"true\"></i>
                ";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_THEME"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "title", []), "html", null, true);
        echo "
                <small>(v";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "version", []), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "name", []), "html", null, true);
        echo ")</small>
            </span>

            ";
        // line 10
        $context["settings_url"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", []), "settings", []);
        // line 11
        echo "            ";
        $context["settings_key"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", []), "settings_key", []);
        // line 12
        echo "            <ul class=\"float-right\">
                <li ";
        // line 13
        echo (((($context["location"] ?? null) == "configurations")) ? ("class=\"active\"") : (""));
        echo ">
                    <a data-g5-ajaxify=\"\"
                       data-g5-ajaxify-target=\"[data-g5-content]\"
                       href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "configurations"], "method"), "html", null, true);
        echo "\"
                    >
                        <i class=\"fa fa-fw fa-th\" aria-hidden=\"true\"></i> ";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_OUTLINES"), "html", null, true);
        echo "
                    </a>
                </li>
                ";
        // line 22
        echo "                ";
        // line 27
        echo "                ";
        if ($this->getAttribute(($context["gantry"] ?? null), "authorize", [0 => "menu.manage"], "method")) {
            // line 28
            echo "                <li ";
            echo (((($context["location"] ?? null) == "menu")) ? ("class=\"active\"") : (""));
            echo ">
                    <a data-g5-ajaxify=\"\" data-g5-ajaxify-target=\"[data-g5-content]\" href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "menu"], "method"), "html", null, true);
            echo "\">
                        <i class=\"fa fa-fw fa-bars\" aria-hidden=\"true\"></i> <span>";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MENU"), "html", null, true);
            echo "</span>
                    </a>
                </li>
                ";
        }
        // line 34
        echo "                <li ";
        echo (((($context["location"] ?? null) == "about")) ? ("class=\"active\"") : (""));
        echo ">
                    <a data-g5-ajaxify=\"\" data-g5-ajaxify-target=\"[data-g5-content]\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "about"], "method"), "html", null, true);
        echo "\">
                        <i class=\"fa fa-fw fa-question-circle\" aria-hidden=\"true\"></i> <span>";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ABOUT"), "html", null, true);
        echo "</span>
                    </a>
                </li>
                <li data-g-extras data-g-popover data-g-popover-style=\"extras\" aria-haspopup=\"true\" aria-expanded=\"false\" role=\"presentation\">
                    <a href=\"#\"><i class=\"fa fa-fw fa-cog\" aria-hidden=\"true\"></i> ";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EXTRAS"), "html", null, true);
        echo " <i class=\"font-small fa fa-fw fa-chevron-down\" aria-hidden=\"true\"></i></a>
                    <ul data-popover-content class=\"hidden\" tabindex=\"0\">
                        ";
        // line 42
        $context["prod_mode"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PRODUCTION");
        // line 43
        echo "                        ";
        $context["dev_mode"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_DEVELOPMENT");
        // line 44
        echo "                        <li data-g-devprod=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter([0 => ($context["dev_mode"] ?? null), 1 => ($context["prod_mode"] ?? null)]), "html_attr");
        echo "\">
                            <i class=\"fa fa-fw fa-wrench\" aria-hidden=\"true\"></i> <span class=\"devprod-mode\">";
        // line 45
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "global", []), "production", [])) ? (($context["prod_mode"] ?? null)) : (($context["dev_mode"] ?? null))), "html", null, true);
        echo "</span>
                            <div class=\"float-right\">
                                <span class=\"enabler\" role=\"checkbox\" aria-checked=\"";
        // line 47
        echo (($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "global", []), "production", [])) ? ("true") : ("false"));
        echo "\" tabindex=\"0\" aria-label=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PRODUCTION_MODE_ARIA_LABEL"), "html", null, true);
        echo "\">
                                <input type=\"hidden\" name=\"production_mode\" value=\"";
        // line 48
        echo (($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "global", []), "production", [])) ? (1) : (0));
        echo "\">
                                    <span class=\"toggle\"><span class=\"knob\"></span></span>
                                </span>
                            </div>
                        </li>
                        <li data-g-popover-follow>
                            <a tabindex=\"0\"
                               href=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "cache"], "method"), "html", null, true);
        echo "\"
                               data-ajax-action=\"\"
                               data-ajax-action-method=\"get\"
                               data-ajax-action-indicator=\"li[data-g-extras]\"
                            ><i class=\"fa fa-fw fa-recycle\" aria-hidden=\"true\"></i> ";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_CLEAR_CACHE"), "html", null, true);
        echo "
                            </a>
                        </li>
                        ";
        // line 62
        if (($context["settings_url"] ?? null)) {
            // line 63
            echo "                            <li>
                                <a tabindex=\"0\"
                                   href=\"";
            // line 65
            echo twig_escape_filter($this->env, ($context["settings_url"] ?? null), "html", null, true);
            echo "\"
                                   data-settings-key=\"";
            // line 66
            echo twig_escape_filter($this->env, ($context["settings_key"] ?? null), "html", null, true);
            echo "\"
                                >
                                    <i class=\"fab fa-fw fa-";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", []), "name", []), "html", null, true);
            echo "\" aria-hidden=\"true\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PLATFORM_SETTINGS"), "html", null, true);
            echo "
                                </a>
                            </li>
                        ";
        }
        // line 72
        echo "                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/partials/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  186 => 72,  177 => 68,  172 => 66,  168 => 65,  164 => 63,  162 => 62,  156 => 59,  149 => 55,  139 => 48,  133 => 47,  128 => 45,  123 => 44,  120 => 43,  118 => 42,  113 => 40,  106 => 36,  102 => 35,  97 => 34,  90 => 30,  86 => 29,  81 => 28,  78 => 27,  76 => 22,  70 => 18,  65 => 16,  59 => 13,  56 => 12,  53 => 11,  51 => 10,  43 => 7,  37 => 6,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@gantry-admin/partials/header.html.twig", "/var/www/html/administrator/components/com_gantry5/templates/partials/header.html.twig");
    }
}
