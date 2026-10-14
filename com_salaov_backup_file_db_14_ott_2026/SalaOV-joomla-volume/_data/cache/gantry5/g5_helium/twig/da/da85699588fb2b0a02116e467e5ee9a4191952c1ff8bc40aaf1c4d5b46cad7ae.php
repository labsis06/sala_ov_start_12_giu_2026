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

/* partials/page_head.html.twig */
class __TwigTemplate_2910d07d5b6da5a6ed66fe9be4a3568d0398f67d5ceb74e1a12cc89b38186532 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'head_title' => [$this, 'block_head_title'],
            'head_application' => [$this, 'block_head_application'],
            'head_platform' => [$this, 'block_head_platform'],
            'head' => [$this, 'block_head'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@nucleus/page_head.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("@nucleus/page_head.html.twig", "partials/page_head.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head_title($context, array $blocks = [])
    {
    }

    // line 6
    public function block_head_application($context, array $blocks = [])
    {
        // line 7
        if ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", []), "checkVersion", [0 => 4], "method")) {
            echo " ";
            // line 8
            echo "    <jdoc:include type=\"metas\" />
    <jdoc:include type=\"styles\" />
    <jdoc:include type=\"scripts\" />
    ";
        } elseif ($this->getAttribute($this->getAttribute(        // line 11
($context["gantry"] ?? null), "platform", []), "checkVersion", [0 => 3], "method")) {
            echo " ";
            // line 12
            echo "    <jdoc:include type=\"head\" />
    ";
        }
    }

    // line 16
    public function block_head_platform($context, array $blocks = [])
    {
        // line 17
        $this->displayParentBlock("head_platform", $context, $blocks);
        echo "
    ";
        // line 18
        if ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "joomla", [])) {
            // line 19
            echo "        ";
            if ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", []), "checkVersion", [0 => 4], "method")) {
                echo " ";
                // line 20
                echo "            ";
                if (($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "page", []), "direction", []) != "rtl")) {
                    // line 21
                    echo "            <link rel=\"stylesheet\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-engine://css-compiled/bootstrap5.css"), "html", null, true);
                    echo "\" type=\"text/css\" />
            ";
                } else {
                    // line 23
                    echo "            <link rel=\"stylesheet\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-engine://css-compiled/bootstrap5-rtl.css"), "html", null, true);
                    echo "\" type=\"text/css\" />
            ";
                }
                // line 25
                echo "            <link rel=\"stylesheet\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("media/system/css/joomla-fontawesome.min.css"), "html", null, true);
                echo "\" type=\"text/css\" />
        ";
            } elseif ($this->getAttribute($this->getAttribute(            // line 26
($context["gantry"] ?? null), "platform", []), "checkVersion", [0 => 3], "method")) {
                echo " ";
                // line 27
                echo "            <link rel=\"stylesheet\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-assets://css/bootstrap-gantry.css"), "html", null, true);
                echo "\" type=\"text/css\" />
            <link rel=\"stylesheet\" href=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-engine://css-compiled/joomla.css"), "html", null, true);
                echo "\" type=\"text/css\" />
            ";
                // line 29
                if (($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "page", []), "direction", []) == "rtl")) {
                    // line 30
                    echo "            <link rel=\"stylesheet\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("media/jui/css/bootstrap-rtl.css"), "html", null, true);
                    echo "\" type=\"text/css\" />
            ";
                }
                // line 32
                echo "            <link rel=\"stylesheet\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("media/jui/css/icomoon.css"), "html", null, true);
                echo "\" type=\"text/css\" />
        ";
            }
            // line 34
            echo "    ";
        }
        // line 35
        echo "
    ";
        // line 36
        if ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "joomla", [])) {
            // line 37
            echo "        ";
            if ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", []), "checkVersion", [0 => 5], "method")) {
                // line 38
                echo "            ";
                // line 39
                echo "            <link rel=\"stylesheet\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("media/plg_system_debug/css/debug.css"), "html", null, true);
                echo "\" type=\"text/css\"/>
        ";
            } elseif ($this->getAttribute($this->getAttribute(            // line 40
($context["gantry"] ?? null), "platform", []), "checkVersion", [0 => 4], "method")) {
                // line 41
                echo "            ";
                // line 42
                echo "            <link rel=\"stylesheet\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("media/system/css/debug.css"), "html", null, true);
                echo "\" type=\"text/css\"/>
        ";
            } elseif ($this->getAttribute($this->getAttribute(            // line 43
($context["gantry"] ?? null), "platform", []), "checkVersion", [0 => 3], "method")) {
                // line 44
                echo "            ";
                // line 45
                echo "            ";
                if ($this->getAttribute(($context["gantry"] ?? null), "debug", [])) {
                    // line 46
                    echo "                <link rel=\"stylesheet\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("media/cms/css/debug.css"), "html", null, true);
                    echo "\" type=\"text/css\"/>
            ";
                }
                // line 48
                echo "        ";
            }
            // line 49
            echo "    ";
        }
    }

    // line 52
    public function block_head($context, array $blocks = [])
    {
        // line 53
        $this->displayParentBlock("head", $context, $blocks);
    }

    public function getTemplateName()
    {
        return "partials/page_head.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 53,  174 => 52,  169 => 49,  166 => 48,  160 => 46,  157 => 45,  155 => 44,  153 => 43,  148 => 42,  146 => 41,  144 => 40,  139 => 39,  137 => 38,  134 => 37,  132 => 36,  129 => 35,  126 => 34,  120 => 32,  114 => 30,  112 => 29,  108 => 28,  103 => 27,  100 => 26,  95 => 25,  89 => 23,  83 => 21,  80 => 20,  76 => 19,  74 => 18,  70 => 17,  67 => 16,  61 => 12,  58 => 11,  53 => 8,  50 => 7,  47 => 6,  42 => 3,  32 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "partials/page_head.html.twig", "/var/www/html/media/gantry5/engines/nucleus/twig/partials/page_head.html.twig");
    }
}
