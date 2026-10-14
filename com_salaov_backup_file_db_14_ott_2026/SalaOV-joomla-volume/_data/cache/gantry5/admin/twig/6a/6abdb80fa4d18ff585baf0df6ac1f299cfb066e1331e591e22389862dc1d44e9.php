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

/* forms/fields/container/tabs.html.twig */
class __TwigTemplate_17fcf0ff616dc161b683f20f676a6e07191709415a6c9f28e06e56fe6c35b163 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'overridable' => [$this, 'block_overridable'],
            'contents' => [$this, 'block_contents'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((("forms/" . ((array_key_exists("layout", $context)) ? (_twig_default_filter(($context["layout"] ?? null), "field")) : ("field"))) . ".html.twig"), "forms/fields/container/tabs.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_overridable($context, array $blocks = [])
    {
    }

    // line 7
    public function block_contents($context, array $blocks = [])
    {
        // line 8
        echo "    <div class=\"g5-tabs-container\">
        ";
        // line 9
        if ($this->getAttribute(($context["field"] ?? null), "fields", [])) {
            // line 10
            echo "            ";
            $context["tabs"] = [];
            // line 11
            echo "            ";
            $context["panes"] = [];
            // line 12
            echo "            ";
            $context["fieldId"] = (("g-tabs-container-" . $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter(($context["name"] ?? null))) . "-");
            // line 13
            echo "
            ";
            // line 15
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["field"] ?? null), "fields", []));
            foreach ($context['_seq'] as $context["tab"] => $context["content"]) {
                // line 16
                echo "                ";
                if (( !($context["ignore_not_overrideable"] ?? null) || ( !$this->getAttribute($context["content"], "overridable", [], "any", true, true) || $this->getAttribute($context["content"], "overridable", [])))) {
                    // line 17
                    echo "                    ";
                    $context["tabs"] = twig_array_merge(($context["tabs"] ?? null), [0 => $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transKeyFilter((($this->getAttribute($context["content"], "label", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["content"], "label", []), $context["tab"])) : ($context["tab"])), "GANTRY5_FORM_FIELD", ($context["scope"] ?? null), ($context["name"] ?? null), $context["tab"], "LABEL")]);
                    // line 18
                    echo "                    ";
                    $context["panes"] = twig_array_merge(($context["panes"] ?? null), [0 => (($this->getAttribute($context["content"], "fields", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["content"], "fields", []), [])) : ([]))]);
                    // line 19
                    echo "                ";
                }
                // line 20
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['tab'], $context['content'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "
            <div class=\"g-tabs\" role=\"tablist\">
                <ul>
                    ";
            // line 24
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["tabs"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["tab"]) {
                // line 25
                echo "                        <li ";
                echo (( !$this->getAttribute($context["loop"], "index0", [])) ? ("class=\"active\"") : (""));
                echo ">
                            <a href=\"#\"
                               id=\"";
                // line 27
                echo twig_escape_filter($this->env, ((($context["fieldId"] ?? null) . $this->getAttribute($context["loop"], "index0", [])) . twig_lower_filter($this->env, "-tab")), "html", null, true);
                echo "\"
                               aria-controls=\"";
                // line 28
                echo twig_escape_filter($this->env, ((($context["fieldId"] ?? null) . $this->getAttribute($context["loop"], "index0", [])) . twig_lower_filter($this->env, "-pane")), "html", null, true);
                echo "\"
                               aria-expanded=\"";
                // line 29
                echo (( !$this->getAttribute($context["loop"], "index0", [])) ? ("true") : ("false"));
                echo "\"
                               role=\"presentation\"><span>";
                // line 30
                echo twig_escape_filter($this->env, $context["tab"], "html", null, true);
                echo "</span></a>
                        </li>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tab'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "                </ul>
            </div>

            <div class=\"g-panes\">
                ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["panes"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["pane"]) {
                // line 38
                echo "                    <div class=\"g-pane clearfix ";
                echo (( !$this->getAttribute($context["loop"], "index0", [])) ? ("active") : (""));
                echo "\"
                         role=\"tabpanel\"
                         id=\"";
                // line 40
                echo twig_escape_filter($this->env, ((($context["fieldId"] ?? null) . $this->getAttribute($context["loop"], "index0", [])) . twig_lower_filter($this->env, "-pane")), "html", null, true);
                echo "\"
                         aria-labelledby=\"";
                // line 41
                echo twig_escape_filter($this->env, ((($context["fieldId"] ?? null) . $this->getAttribute($context["loop"], "index0", [])) . twig_lower_filter($this->env, "-tab")), "html", null, true);
                echo "\"
                         aria-expanded=\"";
                // line 42
                echo (( !$this->getAttribute($context["loop"], "index0", [])) ? ("true") : ("false"));
                echo "\">
                        ";
                // line 43
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["pane"]);
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
                foreach ($context['_seq'] as $context["childName"] => $context["child"]) {
                    // line 44
                    echo "                            ";
                    if ((is_string($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["childName"]) && is_string($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ".") && ('' === $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 || 0 === strpos($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4, $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144)))) {
                        // line 45
                        echo "                                ";
                        $context["childKey"] = twig_trim_filter($context["childName"], ".");
                        // line 46
                        echo "                                ";
                        $context["childValue"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->nestedFunc(($context["value"] ?? null), ($context["childKey"] ?? null));
                        // line 47
                        echo "                                ";
                        $context["childDefault"] = null;
                        // line 48
                        echo "                            ";
                    } else {
                        // line 49
                        echo "                                ";
                        $context["container"] = ($this->getAttribute($context["child"], "type", []) == "container.tabs");
                        // line 50
                        echo "                                ";
                        $context["childKey"] = $context["childName"];
                        // line 51
                        echo "                                ";
                        $context["childValue"] = ((($context["container"] ?? null)) ? (($context["value"] ?? null)) : ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->nestedFunc(($context["data"] ?? null), (($context["scope"] ?? null) . ($context["childKey"] ?? null)))));
                        // line 52
                        echo "                                ";
                        $context["childDefault"] = ((($context["container"] ?? null)) ? (($context["defaults"] ?? null)) : ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->nestedFunc(($context["defaults"] ?? null), (($context["scope"] ?? null) . ($context["childKey"] ?? null)))));
                        // line 53
                        echo "                            ";
                    }
                    // line 54
                    echo "                            ";
                    $context["childName"] = (($context["parent_field"] ?? null) . twig_trim_filter($context["childName"], "."));
                    // line 55
                    echo "
                            ";
                    // line 56
                    if ($this->getAttribute($context["child"], "type", [])) {
                        // line 57
                        echo "                                ";
                        $context["child_overrideable"] = (($this->getAttribute($context["child"], "overridable", [], "any", true, true)) ? ($this->getAttribute($context["child"], "overridable", [])) : ((($this->getAttribute($context["child"], "overrideable", [], "any", true, true)) ? ($this->getAttribute($context["child"], "overrideable", [])) : (true))));
                        // line 58
                        echo "
                                ";
                        // line 59
                        if (((($this->getAttribute($context["child"], "type", []) &&  !$this->getAttribute($context["child"], "skip", [])) &&  !((($context["ignore_not_overrideable"] ?? null) &&  !($context["child_overrideable"] ?? null)) && (null === ($context["childValue"] ?? null)))) &&  !((null === ($context["childValue"] ?? null)) && ($context["not_global_overrideable"] ?? null)))) {
                            // line 60
                            echo "                                    ";
                            $this->loadTemplate([0 => (("forms/fields/" . twig_replace_filter($this->getAttribute($context["child"], "type", []), ["." => "/"])) . ".html.twig"), 1 => "forms/fields/unknown/unknown.html.twig"], "forms/fields/container/tabs.html.twig", 60)->display(twig_array_merge($context, ["name" =>                             // line 61
$context["childName"], "field" => $context["child"], "current_value" => ($context["childValue"] ?? null), "value" => null, "default_value" => ($context["childDefault"] ?? null), "overrideable" => (($context["overrideable"] ?? null) && ($context["child_overrideable"] ?? null))]));
                            // line 62
                            echo "                                ";
                        }
                        // line 63
                        echo "                            ";
                    }
                    // line 64
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
                unset($context['_seq'], $context['_iterated'], $context['childName'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 65
                echo "                    </div>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pane'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "            </div>

        ";
        }
        // line 70
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "forms/fields/container/tabs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  292 => 70,  287 => 67,  272 => 65,  258 => 64,  255 => 63,  252 => 62,  250 => 61,  248 => 60,  246 => 59,  243 => 58,  240 => 57,  238 => 56,  235 => 55,  232 => 54,  229 => 53,  226 => 52,  223 => 51,  220 => 50,  217 => 49,  214 => 48,  211 => 47,  208 => 46,  205 => 45,  202 => 44,  185 => 43,  181 => 42,  177 => 41,  173 => 40,  167 => 38,  150 => 37,  144 => 33,  127 => 30,  123 => 29,  119 => 28,  115 => 27,  109 => 25,  92 => 24,  87 => 21,  81 => 20,  78 => 19,  75 => 18,  72 => 17,  69 => 16,  64 => 15,  61 => 13,  58 => 12,  55 => 11,  52 => 10,  50 => 9,  47 => 8,  44 => 7,  39 => 4,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "forms/fields/container/tabs.html.twig", "/var/www/html/administrator/components/com_gantry5/templates/forms/fields/container/tabs.html.twig");
    }
}
