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

/* forms/input.html.twig */
class __TwigTemplate_3308c8604cc45e5da4a2c0ae65fb90767421b27ca2ba8444366277ec2a21d207 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascript' => [$this, 'block_javascript'],
            'javascript_footer' => [$this, 'block_javascript_footer'],
            'field' => [$this, 'block_field'],
            'contents' => [$this, 'block_contents'],
            'group' => [$this, 'block_group'],
            'input' => [$this, 'block_input'],
            'global_attributes' => [$this, 'block_global_attributes'],
            'reset_field' => [$this, 'block_reset_field'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $assetFunction = $this->env->getFunction('parse_assets')->getCallable();
        $assetVariables = [];
        if ($assetVariables && !is_array($assetVariables)) {
            throw new UnexpectedValueException('{% scripts with x %}: x is not an array');
        }
        $location = "head";
        if ($location && !is_string($location)) {
            throw new UnexpectedValueException('{% scripts in x %}: x is not a string');
        }
        $priority = isset($assetVariables['priority']) ? $assetVariables['priority'] : 0;
        ob_start();
        // line 2
        echo "    ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 4
        echo "
    ";
        // line 5
        $this->displayBlock('javascript', $context, $blocks);
        $content = ob_get_clean();
        $assetFunction($content, $location, $priority);
        // line 9
        $assetFunction = $this->env->getFunction('parse_assets')->getCallable();
        $assetVariables = [];
        if ($assetVariables && !is_array($assetVariables)) {
            throw new UnexpectedValueException('{% scripts with x %}: x is not an array');
        }
        $location = "footer";
        if ($location && !is_string($location)) {
            throw new UnexpectedValueException('{% scripts in x %}: x is not a string');
        }
        $priority = isset($assetVariables['priority']) ? $assetVariables['priority'] : 0;
        ob_start();
        // line 10
        echo "    ";
        $this->displayBlock('javascript_footer', $context, $blocks);
        $content = ob_get_clean();
        $assetFunction($content, $location, $priority);
        // line 14
        $context["name"] = (($context["name"]) ?? ($this->getAttribute(($context["field"] ?? null), "name", [])));
        // line 15
        $context["default_value"] = (($context["default_value"]) ?? ($this->getAttribute(($context["field"] ?? null), "default", [])));
        // line 16
        $context["current_value"] = (($context["current_value"]) ?? (($context["value"] ?? null)));
        // line 17
        $context["has_value"] =  !(null === ($context["current_value"] ?? null));
        // line 18
        $context["value"] = ((($context["has_value"] ?? null)) ? (($context["current_value"] ?? null)) : (($context["default_value"] ?? null)));
        // line 20
        $this->displayBlock('field', $context, $blocks);
    }

    // line 2
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 3
        echo "    ";
    }

    // line 5
    public function block_javascript($context, array $blocks = [])
    {
        // line 6
        echo "    ";
    }

    // line 10
    public function block_javascript_footer($context, array $blocks = [])
    {
        // line 11
        echo "    ";
    }

    // line 20
    public function block_field($context, array $blocks = [])
    {
        // line 21
        echo "    ";
        if (( !$this->getAttribute(($context["field"] ?? null), "isset", []) ||  !(null === ($context["value"] ?? null)))) {
            // line 22
            echo "    ";
            $this->displayBlock('contents', $context, $blocks);
            // line 48
            echo "    ";
        }
    }

    // line 22
    public function block_contents($context, array $blocks = [])
    {
        // line 23
        echo "        ";
        $this->displayBlock('group', $context, $blocks);
        // line 47
        echo "    ";
    }

    // line 23
    public function block_group($context, array $blocks = [])
    {
        // line 24
        echo "            ";
        $this->displayBlock('input', $context, $blocks);
        // line 46
        echo "        ";
    }

    // line 24
    public function block_input($context, array $blocks = [])
    {
        // line 25
        echo "                <input
                        ";
        // line 27
        echo "                        name=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . ($context["name"] ?? null))), "html", null, true);
        echo "\"
                        value=\"";
        // line 28
        echo twig_escape_filter($this->env, twig_join_filter(($context["value"] ?? null), ", "), "html", null, true);
        echo "\"
                        ";
        // line 30
        echo "                        ";
        $this->displayBlock('global_attributes', $context, $blocks);
        // line 38
        echo "                        />

                ";
        // line 40
        $this->displayBlock('reset_field', $context, $blocks);
        // line 45
        echo "            ";
    }

    // line 30
    public function block_global_attributes($context, array $blocks = [])
    {
        // line 31
        echo "                            ";
        if ($this->getAttribute(($context["field"] ?? null), "class", [], "any", true, true)) {
            echo " class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "class", []), "html", null, true);
            echo "\" ";
        }
        // line 32
        echo "                            ";
        if ($this->getAttribute(($context["field"] ?? null), "id", [], "any", true, true)) {
            echo " id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "id", []), "html", null, true);
            echo "\" ";
        }
        // line 33
        echo "                            ";
        if ($this->getAttribute(($context["field"] ?? null), "style", [], "any", true, true)) {
            echo " style=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "style", []), "html", null, true);
            echo "\" ";
        }
        // line 34
        echo "                            ";
        if ($this->getAttribute(($context["field"] ?? null), "title", [], "any", true, true)) {
            echo " title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "title", []), "html", null, true);
            echo "\" ";
        }
        // line 35
        echo "                            ";
        if ($this->getAttribute(($context["field"] ?? null), "override_target", [], "any", true, true)) {
            echo " data-override-target=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "override_target", []), "html_attr");
            echo "\" ";
        }
        // line 36
        echo "                            aria-label=\"";
        echo twig_escape_filter($this->env, twig_trim_filter(twig_title_string_filter($this->env, twig_replace_filter((($context["scope"] ?? null) . ($context["name"] ?? null)), ["." => " "]))), "html", null, true);
        echo "\"
                        ";
    }

    // line 40
    public function block_reset_field($context, array $blocks = [])
    {
        // line 41
        if (( !$this->getAttribute(($context["field"] ?? null), "reset_field", [], "any", true, true) || twig_in_filter($this->getAttribute(($context["field"] ?? null), "reset_field", []), [0 => "on", 1 => "true", 2 => 1]))) {
            // line 42
            echo "                        <span class=\"g-reset-field\" data-g-reset-field=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . ($context["name"] ?? null))), "html", null, true);
            echo "\"><i class=\"fa  fa-fw fa-times-circle\" aria-hidden=\"true\"></i></span>
                    ";
        }
    }

    public function getTemplateName()
    {
        return "forms/input.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  225 => 42,  223 => 41,  220 => 40,  213 => 36,  206 => 35,  199 => 34,  192 => 33,  185 => 32,  178 => 31,  175 => 30,  171 => 45,  169 => 40,  165 => 38,  162 => 30,  158 => 28,  153 => 27,  150 => 25,  147 => 24,  143 => 46,  140 => 24,  137 => 23,  133 => 47,  130 => 23,  127 => 22,  122 => 48,  119 => 22,  116 => 21,  113 => 20,  109 => 11,  106 => 10,  102 => 6,  99 => 5,  95 => 3,  92 => 2,  88 => 20,  86 => 18,  84 => 17,  82 => 16,  80 => 15,  78 => 14,  73 => 10,  61 => 9,  57 => 5,  54 => 4,  51 => 2,  39 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "forms/input.html.twig", "/var/www/html/administrator/components/com_gantry5/templates/forms/input.html.twig");
    }
}
