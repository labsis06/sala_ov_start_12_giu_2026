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

/* @gantry-admin/pages/configurations/configurations.html.twig */
class __TwigTemplate_e0ca36099d911744d729f2e01fa302d53eeff791fc13a19dc5466612124a87bb extends \Twig\Template
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
        return $this->loadTemplate((((($context["ajax"] ?? null) - ($context["suffix"] ?? null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/pages/configurations/configurations.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_gantry($context, array $blocks = [])
    {
        // line 4
        echo "    <div id=\"configurations\">
        <div class=\"menu-header\">
        <span class=\"float-right\">
            <button class=\"button button-back-to-conf\" tabindex=\"0\"
                    aria-label=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_BACK_SETUP"), "html", null, true);
        echo "\"><i class=\"fa fa-fw fa-fw fa-arrow-left\" aria-hidden=\"true\"></i>
                <span>";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_BACK_SETUP"), "html", null, true);
        echo "</span></button>
        </span>
            <h2 class=\"page-title\">
                ";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_OUTLINES"), "html", null, true);
        echo "
                ";
        // line 13
        if ($this->getAttribute(($context["gantry"] ?? null), "authorize", [0 => "outline.create"], "method")) {
            // line 14
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "configurations", 1 => "create"], "method"), "html", null, true);
            echo "\"
                   title=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ADD_NEW_OUTLINE"), "html", null, true);
            echo "\"
                   aria-label=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ADD_NEW_OUTLINE"), "html", null, true);
            echo "\"
                   data-g5-outline-create class=\"button button-primary\">
                    <i class=\"fa fa-fw fa-plus\" aria-hidden=\"true\"></i>
                </a>
                ";
        }
        // line 21
        echo "            </h2>
        </div>

        <ul class=\"g-grid\">
            <li class=\"card g-block size-1-4\">
                ";
        // line 26
        $context["name"] = "default";
        // line 27
        echo "                ";
        $this->loadTemplate("@gantry-admin/layouts/outline.html.twig", "@gantry-admin/pages/configurations/configurations.html.twig", 27)->display($context);
        // line 28
        echo "            </li>
            ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "outlines", []), "user", []));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["name"] => $context["title"]) {
            // line 30
            echo "                <li class=\"card g-block size-1-4";
            echo (($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "outlines", []), "isDefault", [0 => $context["name"]], "method")) ? (" outline-is-default") : (""));
            echo "\">
                    ";
            // line 31
            $this->loadTemplate("@gantry-admin/layouts/outline.html.twig", "@gantry-admin/pages/configurations/configurations.html.twig", 31)->display($context);
            // line 32
            echo "                </li>
            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['title'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "            ";
        if ($this->getAttribute(($context["gantry"] ?? null), "authorize", [0 => "outline.create"], "method")) {
            // line 35
            echo "            <li class=\"card g-block size-1-4 add-new\">
                <div class=\"page\">
                    <a href=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "configurations", 1 => "create"], "method"), "html", null, true);
            echo "\"
                       title=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ADD_NEW_OUTLINE"), "html", null, true);
            echo "\"
                       aria-label=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ADD_NEW_OUTLINE"), "html", null, true);
            echo "\"
                       data-g5-outline-create tabindex=\"0\">
                        <i class=\"fa fa-fw fa-plus\" aria-hidden=\"true\"></i>
                    </a>
                </div>
            </li>
            ";
        }
        // line 46
        echo "        </ul>

        <h2>";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SYSTEM_OUTLINES"), "html", null, true);
        echo "</h2>
        <ul class=\"g-grid\">
            ";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "outlines", []), "system", []));
        foreach ($context['_seq'] as $context["name"] => $context["title"]) {
            // line 51
            echo "                ";
            $context["preset"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "outlines", []), "layoutPreset", [0 => $context["name"]], "method");
            // line 52
            echo "                <li class=\"card g-block size-1-4\">
                    <div class=\"page\">
                        <h4>";
            // line 54
            echo twig_escape_filter($this->env, $context["title"], "html", null, true);
            echo " <span class=\"float-right font-small\">(";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ID_X", $context["name"]), "html", null, true);
            echo ")</span></h4>
                        <div class=\"inner-params\">
                            <img src=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc((($this->getAttribute(($context["preset"] ?? null), "image", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["preset"] ?? null), "image", []), "gantry-admin://images/layouts/default.png")) : ("gantry-admin://images/layouts/default.png"))), "html", null, true);
            echo "\" />
                        </div>
                        <div class=\"inner-params\">
                            <div class=\"center\">
                                <a data-tip=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EDIT"), "html", null, true);
            echo "\"
                                   title=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EDIT_X", $context["title"]), "html", null, true);
            echo "\"
                                   aria-label=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EDIT_X", $context["title"]), "html", null, true);
            echo "\"
                                   data-g5-ajaxify=\"\"
                                   data-g5-ajaxify-target=\"[data-g5-content-wrapper]\"
                                   data-g5-ajaxify-params=\"";
            // line 65
            echo twig_escape_filter($this->env, twig_jsonencode_filter(["navbar" => true]), "html_attr");
            echo "\"
                                   href=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "configurations", 1 => $context["name"], 2 => "layout"], "method"), "html", null, true);
            echo "\"
                                   class=\"button button-primary\">
                                    <i class=\"fa fa-fw fa-pencil fa-pencil-alt\" aria-hidden=\"true\"></i>
                                </a>
                                ";
            // line 70
            if ($this->getAttribute(($context["gantry"] ?? null), "authorize", [0 => "outline.create"], "method")) {
                // line 71
                echo "                                <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "configurations", 1 => $context["name"], 2 => "duplicate"], "method"), "html", null, true);
                echo "\"
                                   data-tip=\"";
                // line 72
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_DUPLICATE"), "html", null, true);
                echo "\"
                                   title=\"";
                // line 73
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_DUPLICATE_X", $context["title"]), "html", null, true);
                echo "\"
                                   aria-label=\"";
                // line 74
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_DUPLICATE_X", $context["title"]), "html", null, true);
                echo "\"
                                   data-g5-outline-duplicate class=\"button button-secondary\">
                                    <i class=\"fa fa-fw fa-copy\" aria-hidden=\"true\"></i>
                                </a>
                                ";
            }
            // line 79
            echo "                            </div>
                        </div>
                    </div>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['title'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 84
        echo "        </ul>
    </div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/configurations/configurations.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  251 => 84,  241 => 79,  233 => 74,  229 => 73,  225 => 72,  220 => 71,  218 => 70,  211 => 66,  207 => 65,  201 => 62,  197 => 61,  193 => 60,  186 => 56,  179 => 54,  175 => 52,  172 => 51,  168 => 50,  163 => 48,  159 => 46,  149 => 39,  145 => 38,  141 => 37,  137 => 35,  134 => 34,  119 => 32,  117 => 31,  112 => 30,  95 => 29,  92 => 28,  89 => 27,  87 => 26,  80 => 21,  72 => 16,  68 => 15,  63 => 14,  61 => 13,  57 => 12,  51 => 9,  47 => 8,  41 => 4,  38 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@gantry-admin/pages/configurations/configurations.html.twig", "/var/www/html/administrator/components/com_gantry5/templates/pages/configurations/configurations.html.twig");
    }
}
