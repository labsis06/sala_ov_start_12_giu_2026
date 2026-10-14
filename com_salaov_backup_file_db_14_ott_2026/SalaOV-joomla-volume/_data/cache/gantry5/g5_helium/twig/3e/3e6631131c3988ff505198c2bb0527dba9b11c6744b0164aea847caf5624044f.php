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

/* @nucleus/page_head.html.twig */
class __TwigTemplate_6a9ca7640211069eec6c1b70031cbc3db18ad38210da312832c0faa7c25372e1 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'head_stylesheets' => [$this, 'block_head_stylesheets'],
            'head_scripts' => [$this, 'block_head_scripts'],
            'head_platform' => [$this, 'block_head_platform'],
            'head_overrides' => [$this, 'block_head_overrides'],
            'head_meta' => [$this, 'block_head_meta'],
            'head_title' => [$this, 'block_head_title'],
            'head_application' => [$this, 'block_head_application'],
            'head_ie_stylesheets' => [$this, 'block_head_ie_stylesheets'],
            'head' => [$this, 'block_head'],
            'head_custom' => [$this, 'block_head_custom'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "debugger", []), "assets", [], "method");
        // line 2
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "loadAtoms", [], "method");
        // line 4
        $context["faEnabled"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "enable", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "enable", []), 1)) : (1));
        // line 5
        $context["faVersion"] = ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "version", [], "any", true, true) &&  !(null === $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "version", [])))) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "version", [])) : (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "default_version", [], "any", true, true) &&  !(null === $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "default_version", [])))) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "default_version", [])) : ("fa4"))));
        // line 6
        echo "
";
        // line 7
        $assetFunction = $this->env->getFunction('parse_assets')->getCallable();
        $assetVariables = ["priority" => 10];
        if ($assetVariables && !is_array($assetVariables)) {
            throw new UnexpectedValueException('{% scripts with x %}: x is not an array');
        }
        $location = "head";
        if ($location && !is_string($location)) {
            throw new UnexpectedValueException('{% scripts in x %}: x is not a string');
        }
        $priority = isset($assetVariables['priority']) ? $assetVariables['priority'] : 0;
        ob_start();
        // line 8
        echo "    ";
        $this->displayBlock('head_stylesheets', $context, $blocks);
        // line 15
        $this->displayBlock('head_scripts', $context, $blocks);
        // line 33
        $this->displayBlock('head_platform', $context, $blocks);
        // line 34
        echo "
   ";
        // line 35
        $this->displayBlock('head_overrides', $context, $blocks);
        $content = ob_get_clean();
        $assetFunction($content, $location, $priority);
        // line 58
        echo "<head>
    ";
        // line 59
        echo twig_join_filter($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", []), "getHtml", [0 => "head_top"], "method"), "
    ");
        echo "
    ";
        // line 60
        $this->displayBlock('head_meta', $context, $blocks);
        // line 86
        $this->displayBlock('head_title', $context, $blocks);
        // line 90
        echo "
    ";
        // line 91
        $this->displayBlock('head_application', $context, $blocks);
        // line 95
        echo "
    ";
        // line 96
        $this->displayBlock('head_ie_stylesheets', $context, $blocks);
        // line 99
        $this->displayBlock('head', $context, $blocks);
        // line 100
        $this->displayBlock('head_custom', $context, $blocks);
        // line 105
        echo twig_join_filter($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", []), "getHtml", [0 => "head_bottom"], "method"), "
    ");
        echo "
</head>
";
    }

    // line 8
    public function block_head_stylesheets($context, array $blocks = [])
    {
        // line 9
        echo "<link rel=\"stylesheet\" href=\"gantry-engine://css-compiled/nucleus.css\" type=\"text/css\"/>
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", [], "any", false, true), "configuration", [], "any", false, true), "css", [], "any", false, true), "persistent", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", [], "any", false, true), "configuration", [], "any", false, true), "css", [], "any", false, true), "persistent", []), $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "configuration", []), "css", []), "files", []))) : ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "configuration", []), "css", []), "files", []))));
        foreach ($context['_seq'] as $context["_key"] => $context["scss"]) {
            // line 11
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $context["scss"], "html", null, true);
            echo ".scss\" type=\"text/css\"/>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['scss'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "    ";
    }

    // line 15
    public function block_head_scripts($context, array $blocks = [])
    {
        // line 16
        if (($context["faEnabled"] ?? null)) {
            // line 17
            echo "        ";
            if (((($context["faVersion"] ?? null) == "manual") || twig_trim_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "fontawesome", []), "html_js_import", [])))) {
                // line 18
                echo "            ";
                echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->htmlFilter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "fontawesome", []), "html_js_import", []));
            } elseif ((            // line 19
($context["faVersion"] ?? null) == "fa5js")) {
                // line 20
                echo "            <script type=\"text/javascript\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-assets://js/font-awesome6-all.min.js"), "html", null, true);
                echo "\"></script>
            ";
                // line 21
                if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "fa4_compatibility", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "fa4_compatibility", []), 1)) : (1))) {
                    // line 22
                    echo "                <script type=\"text/javascript\" src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-assets://js/font-awesome6-shim.min.js"), "html", null, true);
                    echo "\"></script>
            ";
                }
                // line 24
                echo "        ";
            } elseif ((($context["faVersion"] ?? null) == "fa7js")) {
                // line 25
                echo "            <script type=\"text/javascript\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-assets://js/font-awesome7-all.min.js"), "html", null, true);
                echo "\"></script>
            ";
                // line 26
                if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "fa4_compatibility", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "fa4_compatibility", []), 1)) : (1))) {
                    // line 27
                    echo "                <script type=\"text/javascript\" src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-assets://js/font-awesome7-shim.min.js"), "html", null, true);
                    echo "\"></script>
            ";
                }
                // line 29
                echo "        ";
            }
            // line 30
            echo "    ";
        }
    }

    // line 33
    public function block_head_platform($context, array $blocks = [])
    {
    }

    // line 35
    public function block_head_overrides($context, array $blocks = [])
    {
        // line 36
        if (($context["faEnabled"] ?? null)) {
            // line 37
            echo "            ";
            if (((($context["faVersion"] ?? null) == "manual") || twig_trim_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "fontawesome", []), "html_css_import", [])))) {
                // line 38
                echo "                ";
                echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->htmlFilter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "fontawesome", []), "html_css_import", []));
            } elseif ((            // line 39
($context["faVersion"] ?? null) == "fa4")) {
                // line 40
                echo "                <link rel=\"stylesheet\" href=\"gantry-assets://css/font-awesome.min.css\" type=\"text/css\"/>
            ";
            } elseif ((            // line 41
($context["faVersion"] ?? null) == "fa5css")) {
                // line 42
                echo "                <link rel=\"stylesheet\" href=\"gantry-assets://css/font-awesome6-all.min.css\" type=\"text/css\">
                ";
                // line 43
                if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "fa4_compatibility", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "fa4_compatibility", []), 1)) : (1))) {
                    // line 44
                    echo "
                ";
                }
                // line 46
                echo "            ";
            } elseif ((($context["faVersion"] ?? null) == "fa7css")) {
                // line 47
                echo "                <link rel=\"stylesheet\" href=\"gantry-assets://css/font-awesome7-all.min.css\" type=\"text/css\">
            ";
            } elseif ((((            // line 48
($context["faVersion"] ?? null) == "fa5js") || ((($context["faVersion"] ?? null) == "manual") && $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "fontawesome", []), "html_js_import", []))) && (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "content_compatibility", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "content_compatibility", []), 1)) : (1)))) {
                // line 49
                echo "                <link rel=\"stylesheet\" href=\"gantry-assets://css/font-awesome6-pseudo.min.css\" type=\"text/css\">
            ";
            }
            // line 51
            echo "        ";
        }
        // line 52
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "configuration", []), "css", []), "overrides", []));
        foreach ($context['_seq'] as $context["_key"] => $context["scss"]) {
            // line 53
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $context["scss"], "html", null, true);
            echo ".scss\" type=\"text/css\"/>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['scss'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "    ";
    }

    // line 60
    public function block_head_meta($context, array $blocks = [])
    {
        // line 61
        echo "        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
        ";
        // line 63
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "head", []), "meta", [])) {
            // line 64
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "head", []), "meta", []));
            foreach ($context['_seq'] as $context["_key"] => $context["attributes"]) {
                // line 65
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["attributes"]);
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 66
                    echo "                    ";
                    if ((is_string($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["key"]) && is_string($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = "og:") && ('' === $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 || 0 === strpos($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4, $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144)))) {
                        // line 67
                        echo "                    <meta property=\"";
                        echo twig_escape_filter($this->env, $context["key"]);
                        echo "\" content=\"";
                        echo twig_escape_filter($this->env, $context["value"]);
                        echo "\" />
                    ";
                    } else {
                        // line 69
                        echo "                    <meta name=\"";
                        echo twig_escape_filter($this->env, $context["key"]);
                        echo "\" content=\"";
                        echo twig_escape_filter($this->env, $context["value"]);
                        echo "\" />
                    ";
                    }
                    // line 71
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributes'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 74
        echo twig_join_filter($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", []), "getHtml", [0 => "head_meta"], "method"), "
    ");
        echo "

        ";
        // line 76
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "assets", []), "favicon", [])) {
            // line 77
            echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "assets", []), "favicon", [])), "html", null, true);
            echo "\" />
        ";
        }
        // line 79
        echo "
        ";
        // line 80
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "assets", []), "touchicon", [])) {
            // line 81
            echo "        <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "assets", []), "touchicon", [])), "html", null, true);
            echo "\">
        <link rel=\"icon\" sizes=\"192x192\" href=\"";
            // line 82
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "assets", []), "touchicon", [])), "html", null, true);
            echo "\">
        ";
        }
        // line 84
        echo "    ";
    }

    // line 86
    public function block_head_title($context, array $blocks = [])
    {
        // line 87
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>Title</title>";
    }

    // line 91
    public function block_head_application($context, array $blocks = [])
    {
        // line 92
        echo twig_join_filter($this->getAttribute(($context["gantry"] ?? null), "styles", [0 => "head"], "method"), "
");
        echo "
        ";
        // line 93
        echo twig_join_filter($this->getAttribute(($context["gantry"] ?? null), "scripts", [0 => "head"], "method"), "
");
    }

    // line 96
    public function block_head_ie_stylesheets($context, array $blocks = [])
    {
    }

    // line 99
    public function block_head($context, array $blocks = [])
    {
    }

    // line 100
    public function block_head_custom($context, array $blocks = [])
    {
        // line 101
        echo "        ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "head", []), "head_bottom", [])) {
            // line 102
            echo "        ";
            echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "head", []), "head_bottom", []);
            echo "
        ";
        }
        // line 104
        echo "    ";
    }

    public function getTemplateName()
    {
        return "@nucleus/page_head.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  370 => 104,  364 => 102,  361 => 101,  358 => 100,  353 => 99,  348 => 96,  343 => 93,  338 => 92,  335 => 91,  330 => 87,  327 => 86,  323 => 84,  318 => 82,  313 => 81,  311 => 80,  308 => 79,  302 => 77,  300 => 76,  294 => 74,  283 => 71,  275 => 69,  267 => 67,  264 => 66,  260 => 65,  256 => 64,  254 => 63,  250 => 61,  247 => 60,  243 => 55,  235 => 53,  230 => 52,  227 => 51,  223 => 49,  221 => 48,  218 => 47,  215 => 46,  211 => 44,  209 => 43,  206 => 42,  204 => 41,  201 => 40,  199 => 39,  196 => 38,  193 => 37,  191 => 36,  188 => 35,  183 => 33,  178 => 30,  175 => 29,  169 => 27,  167 => 26,  162 => 25,  159 => 24,  153 => 22,  151 => 21,  146 => 20,  144 => 19,  141 => 18,  138 => 17,  136 => 16,  133 => 15,  129 => 13,  121 => 11,  117 => 10,  114 => 9,  111 => 8,  103 => 105,  101 => 100,  99 => 99,  97 => 96,  94 => 95,  92 => 91,  89 => 90,  87 => 86,  85 => 60,  80 => 59,  77 => 58,  73 => 35,  70 => 34,  68 => 33,  66 => 15,  63 => 8,  51 => 7,  48 => 6,  46 => 5,  44 => 4,  42 => 2,  40 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@nucleus/page_head.html.twig", "/var/www/html/media/gantry5/engines/nucleus/templates/page_head.html.twig");
    }
}
