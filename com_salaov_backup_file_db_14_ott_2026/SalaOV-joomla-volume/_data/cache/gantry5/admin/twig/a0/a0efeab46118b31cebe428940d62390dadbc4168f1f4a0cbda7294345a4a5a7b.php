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

/* @gantry-admin/pages/configurations/assignments/assignments.html.twig */
class __TwigTemplate_0ea0603016912452b94d6efa5daa13044d7f825291383b4cc38c53ec396955a2 extends \Twig\Template
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
        return $this->loadTemplate((((($context["ajax"] ?? null) - ($context["suffix"] ?? null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/pages/configurations/assignments/assignments.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 3
        $context["edit"] = $this->getAttribute(($context["gantry"] ?? null), "authorize", [0 => "outline.assign"], "method");
        // line 1
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_gantry($context, array $blocks = [])
    {
        // line 6
        echo "    <div id=\"assignments\">
        ";
        // line 7
        if (($context["assignments"] ?? null)) {
            // line 8
            echo "            <form method=\"post\">
                ";
            // line 9
            if (($context["edit"] ?? null)) {
                // line 10
                echo "                <span class=\"float-right\">
                    <button type=\"submit\" class=\"button button-primary button-save\" data-save=\"Assignments\">
                        <i class=\"fa fa-fw fa-check\" aria-hidden=\"true\"></i> <span>";
                // line 12
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SAVE_ASSIGNMENTS"), "html", null, true);
                echo "</span>
                    </button>
                </span>
                ";
            }
            // line 16
            echo "
                <h2 class=\"page-title\">";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ASSIGNMENTS"), "html", null, true);
            echo "</h2>

                <div class=\"g-filters-bar\">
                    <div class=\"g-panel-filters\" data-g-global-filter=\"\">
                        <div class=\"search settings-block\">
                            <input type=\"text\" placeholder=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_GLOBAL_FILTER_ELI"), "html", null, true);
            echo "\" aria-label=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_GLOBAL_FILTER_ELI"), "html", null, true);
            echo "\" role=\"search\">
                            <i class=\"fa fa-fw fa-search\" aria-hidden=\"true\"></i>
                        </div>
                    </div>
                    <label>
                        <input type=\"checkbox\" data-assignments-enabledonly=\"\" /> ";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ASSIGNMENTS_HIDE_UNASSIGNED"), "html", null, true);
            echo "
                    </label>
                    ";
            // line 29
            if (($context["edit"] ?? null)) {
                // line 30
                echo "                        <a href=\"#\" data-g-assignments-check=\"\"
                           aria-label=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ASSIGNMENTS_SELECT_ALL"), "html", null, true);
                echo "\"
                           data-tip=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ASSIGNMENTS_SELECT_ALL"), "html", null, true);
                echo "\"
                           data-tip-place=\"top\">All
                        </a>
                        <a href=\"#\" data-g-assignments-uncheck=\"\"
                           aria-label=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ASSIGNMENTS_UNSELECT_ALL"), "html", null, true);
                echo "\"
                           data-tip=\"";
                // line 37
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ASSIGNMENTS_UNSELECT_ALL"), "html", null, true);
                echo "\"
                           data-tip-place=\"top\">None
                        </a>
                    ";
            }
            // line 41
            echo "
                    ";
            // line 42
            if (($context["options"] ?? null)) {
                // line 43
                echo "                        <div class=\"pull-right\">
                            ";
                // line 44
                $this->loadTemplate("@gantry-admin/forms/fields/select/selectize.html.twig", "@gantry-admin/pages/configurations/assignments/assignments.html.twig", 44)->display(twig_to_array(["layout" => "input", "name" => "assignments.assignment", "field" => ["type" => "select.selectize", "options" => ($context["options"] ?? null)], "value" => ($context["assignment"] ?? null)]));
                // line 45
                echo "                        </div>
                    ";
            }
            // line 47
            echo "                </div>

                <div class=\"cards-wrapper clearfix\">
                    ";
            // line 50
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["assignments"] ?? null));
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
            foreach ($context['_seq'] as $context["type"] => $context["types"]) {
                // line 51
                echo "                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["types"]);
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
                foreach ($context['_seq'] as $context["name"] => $context["list"]) {
                    // line 52
                    echo "                            ";
                    if ($this->getAttribute($context["list"], "items", [])) {
                        // line 53
                        echo "                            <div class=\"card settings-block\">
                                <h4>
                                    ";
                        // line 55
                        echo twig_escape_filter($this->env, $this->getAttribute($context["list"], "label", []), "html", null, true);
                        echo "
                                    <div class=\"g-panel-filters float-right align-right\">
                                        <div class=\"search settings-block\">
                                            <input type=\"text\" placeholder=\"";
                        // line 58
                        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FILTER_ELI"), "html", null, true);
                        echo "\" aria-label=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FILTER_ELI"), "html", null, true);
                        echo "\">
                                            <i class=\"fa fa-fw fa-search\" aria-hidden=\"true\"></i>
                                        </div>
                                        ";
                        // line 61
                        if (($context["edit"] ?? null)) {
                            // line 62
                            echo "                                            <a href=\"#\" data-g-assignments-check=\"\"
                                               aria-label=\"";
                            // line 63
                            echo twig_escape_filter($this->env, (($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SELECT_ALL_MENU") . " in ") . $this->getAttribute($context["list"], "label", [])), "html", null, true);
                            echo "\"
                                               data-tip=\"";
                            // line 64
                            echo twig_escape_filter($this->env, (($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SELECT_ALL_MENU") . " in ") . $this->getAttribute($context["list"], "label", [])), "html", null, true);
                            echo "\"
                                               data-tip-place=\"top\">All
                                            </a>
                                            <a href=\"#\" data-g-assignments-uncheck=\"\"
                                               aria-label=\"";
                            // line 68
                            echo twig_escape_filter($this->env, (($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_UNSELECT_ALL_MENU") . " in ") . $this->getAttribute($context["list"], "label", [])), "html", null, true);
                            echo "\"
                                               data-tip=\"";
                            // line 69
                            echo twig_escape_filter($this->env, (($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_UNSELECT_ALL_MENU") . " in ") . $this->getAttribute($context["list"], "label", [])), "html", null, true);
                            echo "\"
                                               data-tip-place=\"top\">None
                                            </a>
                                        ";
                        }
                        // line 73
                        echo "                                    </div>
                                </h4>

                                <div class=\"settings-param-wrapper\">
                                    ";
                        // line 77
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["list"], "items", []));
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
                        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
                            // line 78
                            echo "                                        ";
                            $context["path"] = ((((("assignments." . $context["type"]) . ".") . $context["name"]) . ".") . $this->getAttribute($context["link"], "name", []));
                            // line 79
                            echo "                                        ";
                            $context["group"] = (($this->getAttribute($context["link"], "section", [])) ? ((("data-g-assignments-group=\"" . twig_escape_filter($this->env, $this->getAttribute($context["link"], "name", []))) . "\"")) : ((("data-g-assignments-parent=\"" . twig_escape_filter($this->env, $this->getAttribute($context["link"], "taxonomy", []))) . "\"")));
                            // line 80
                            echo "                                        ";
                            $context["value"] = (($this->getAttribute($context["link"], "value", [], "any", true, true)) ? ($this->getAttribute($context["link"], "value", [])) : ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "get", [0 => ($context["path"] ?? null)], "method")));
                            // line 81
                            echo "                                        <label class=\"settings-param";
                            if ($this->getAttribute($context["link"], "section", [])) {
                                echo " settings-param-section";
                            }
                            echo "\" ";
                            echo ($context["group"] ?? null);
                            echo ">
                                            ";
                            // line 82
                            $this->loadTemplate("forms/fields/enable/enable.html.twig", "@gantry-admin/pages/configurations/assignments/assignments.html.twig", 82)->display(twig_array_merge($context, ["default" => true, "name" => $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter(                            // line 84
($context["path"] ?? null)), "field" => $this->getAttribute(                            // line 85
$context["link"], "field", []), "value" =>                             // line 86
($context["value"] ?? null), "disabled" =>  !                            // line 87
($context["value"] ?? null), "turned_off" => $this->getAttribute(                            // line 88
$context["link"], "disabled", []), "title" => (("'" . $this->getAttribute(                            // line 89
$context["link"], "label", [])) . "' Menu Item")]));
                            // line 91
                            echo "                                            <span class=\"settings-param-title";
                            if ($this->getAttribute($context["link"], "section", [])) {
                                echo " settings-param-section-title";
                            }
                            echo "\">";
                            // line 92
                            echo twig_escape_filter($this->env, $this->getAttribute($context["link"], "label", []), "html", null, true);
                            // line 93
                            echo "</span>
                                        </label>
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
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 96
                        echo "                                </div>
                            </div>
                            ";
                    }
                    // line 99
                    echo "                        ";
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
                unset($context['_seq'], $context['_iterated'], $context['name'], $context['list'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 100
                echo "                    ";
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
            unset($context['_seq'], $context['_iterated'], $context['type'], $context['types'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 101
            echo "                </div>

                ";
            // line 103
            if (($context["edit"] ?? null)) {
                // line 104
                echo "                <div class=\"g-footer-actions\">
                    <span class=\"float-right\">
                        <button type=\"submit\" class=\"button button-primary button-save\" data-save=\"";
                // line 106
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ASSIGNMENTS"), "html", null, true);
                echo "\">
                            <i class=\"fa fa-fw fa-check\" aria-hidden=\"true\"></i> <span>";
                // line 107
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SAVE_ASSIGNMENTS"), "html", null, true);
                echo "</span>
                        </button>
                    </span>
                </div>
                ";
            }
            // line 112
            echo "                <input type=\"hidden\" name=\"_end\" value=\"1\" />
            </form>
        ";
        } else {
            // line 115
            echo "            <h2 class=\"page-title\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ASSIGNMENTS"), "html", null, true);
            echo "</h2>
            ";
            // line 116
            if ((($context["configuration"] ?? null) == "default")) {
                // line 117
                echo "                <p>";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ASSIGN_BASE_DESC"), "html", null, true);
                echo "</p>
            ";
            } else {
                // line 119
                echo "                <p>";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_NO_ASSIGNMENTS_DESC"), "html", null, true);
                echo "</p>
            ";
            }
            // line 121
            echo "        ";
        }
        // line 122
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/configurations/assignments/assignments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  375 => 122,  372 => 121,  366 => 119,  360 => 117,  358 => 116,  353 => 115,  348 => 112,  340 => 107,  336 => 106,  332 => 104,  330 => 103,  326 => 101,  312 => 100,  298 => 99,  293 => 96,  277 => 93,  275 => 92,  269 => 91,  267 => 89,  266 => 88,  265 => 87,  264 => 86,  263 => 85,  262 => 84,  261 => 82,  252 => 81,  249 => 80,  246 => 79,  243 => 78,  226 => 77,  220 => 73,  213 => 69,  209 => 68,  202 => 64,  198 => 63,  195 => 62,  193 => 61,  185 => 58,  179 => 55,  175 => 53,  172 => 52,  154 => 51,  137 => 50,  132 => 47,  128 => 45,  126 => 44,  123 => 43,  121 => 42,  118 => 41,  111 => 37,  107 => 36,  100 => 32,  96 => 31,  93 => 30,  91 => 29,  86 => 27,  76 => 22,  68 => 17,  65 => 16,  58 => 12,  54 => 10,  52 => 9,  49 => 8,  47 => 7,  44 => 6,  41 => 5,  37 => 1,  35 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@gantry-admin/pages/configurations/assignments/assignments.html.twig", "/var/www/html/administrator/components/com_gantry5/templates/pages/configurations/assignments/assignments.html.twig");
    }
}
