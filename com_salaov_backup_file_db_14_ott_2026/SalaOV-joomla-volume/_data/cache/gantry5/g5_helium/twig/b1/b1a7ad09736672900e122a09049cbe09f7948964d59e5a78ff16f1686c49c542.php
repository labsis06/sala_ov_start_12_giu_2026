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

/* @nucleus/page.html.twig */
class __TwigTemplate_f92fdcdd19f8b27e6ffbecb6db05aa7887a590823ea195939f97da191031e9a7 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'page_offcanvas' => [$this, 'block_page_offcanvas'],
            'page_layout' => [$this, 'block_page_layout'],
            'page_top' => [$this, 'block_page_top'],
            'page_bottom' => [$this, 'block_page_bottom'],
            'body_top' => [$this, 'block_body_top'],
            'body_bottom' => [$this, 'block_body_bottom'],
            'page_head' => [$this, 'block_page_head'],
            'page_footer' => [$this, 'block_page_footer'],
            'page' => [$this, 'block_page'],
            'page_body' => [$this, 'block_page_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "debugger", []), "startTimer", [0 => "render", 1 => "Rendering page"], "method");
        // line 2
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "setLayout", [], "method");
        // line 3
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "loadAtoms", [], "method");
        // line 4
        $context["segments"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "segments", [], "method");
        // line 6
        ob_start(function () { return ''; });
        // line 7
        echo "    ";
        if ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "hasContent", [], "method")) {
            // line 8
            echo "        ";
            $this->displayBlock('content', $context, $blocks);
            // line 10
            echo "    ";
        }
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 13
        $context["offcanvas"] = null;
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["segments"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["segment"]) {
            // line 15
            if (($this->getAttribute($context["segment"], "type", []) == "offcanvas")) {
                // line 16
                $context["offcanvas"] = $context["segment"];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['segment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        ob_start(function () { return ''; });
        // line 21
        echo "    ";
        $this->displayBlock('page_offcanvas', $context, $blocks);
        $context["page_offcanvas"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 28
        $context["page_offcanvas"] = ((twig_trim_filter(($context["page_offcanvas"] ?? null))) ? (twig_trim_filter(($context["page_offcanvas"] ?? null))) : (""));
        // line 29
        $context["offcanvas_position"] = ((($context["page_offcanvas"] ?? null)) ? ((($this->getAttribute($this->getAttribute(($context["offcanvas"] ?? null), "attributes", [], "any", false, true), "position", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["offcanvas"] ?? null), "attributes", [], "any", false, true), "position", []), "g-offcanvas-left")) : ("g-offcanvas-left"))) : (""));
        // line 31
        ob_start(function () { return ''; });
        // line 32
        echo "    ";
        $this->displayBlock('page_layout', $context, $blocks);
        $context["page_layout"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 41
        ob_start(function () { return ''; });
        // line 42
        echo "    ";
        $this->displayBlock('page_top', $context, $blocks);
        // line 44
        echo "    ";
        echo twig_join_filter($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", []), "getHtml", [0 => "top"], "method"), "
    ");
        echo "
";
        $context["page_top"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 47
        ob_start(function () { return ''; });
        // line 48
        echo "    ";
        $this->displayBlock('page_bottom', $context, $blocks);
        // line 50
        echo "    ";
        echo twig_join_filter($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", []), "getHtml", [0 => "bottom"], "method"), "
    ");
        echo "
";
        $context["page_bottom"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 53
        ob_start(function () { return ''; });
        // line 54
        echo "    ";
        $this->displayBlock('body_top', $context, $blocks);
        // line 56
        echo "    ";
        echo twig_join_filter($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", []), "getHtml", [0 => "body_top"], "method"), "
    ");
        echo "
";
        $context["body_top"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 59
        ob_start(function () { return ''; });
        // line 60
        echo "    ";
        $this->displayBlock('body_bottom', $context, $blocks);
        // line 62
        echo "    ";
        echo twig_join_filter($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", []), "getHtml", [0 => "body_bottom"], "method"), "
    ");
        echo "
";
        $context["body_bottom"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 65
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", []), "addScript", [0 => $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-assets://js/main.js"), 1 => 11, 2 => "footer"], "method");
        // line 69
        ob_start(function () { return ''; });
        // line 70
        echo "    ";
        $this->displayBlock('page_head', $context, $blocks);
        $context["page_head"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 75
        ob_start(function () { return ''; });
        // line 76
        echo "    ";
        $this->displayBlock('page_footer', $context, $blocks);
        // line 80
        echo "
    ";
        // line 81
        echo $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "debugger", []), "render", [], "method");
        echo "
";
        $context["page_footer"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 84
        $this->displayBlock('page', $context, $blocks);
    }

    // line 8
    public function block_content($context, array $blocks = [])
    {
        // line 9
        echo "        ";
    }

    // line 21
    public function block_page_offcanvas($context, array $blocks = [])
    {
        // line 22
        echo "        ";
        if (($context["offcanvas"] ?? null)) {
            // line 23
            echo "            ";
            $this->loadTemplate((("@nucleus/layout/" . $this->getAttribute(($context["offcanvas"] ?? null), "type", [])) . ".html.twig"), "@nucleus/page.html.twig", 23)->display(twig_array_merge($context, ["segment" => ($context["offcanvas"] ?? null)]));
        }
        // line 25
        echo "    ";
    }

    // line 32
    public function block_page_layout($context, array $blocks = [])
    {
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["segments"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["segment"]) {
            // line 34
            if (($this->getAttribute($context["segment"], "type", []) != "offcanvas")) {
                // line 35
                $this->loadTemplate((("@nucleus/layout/" . $this->getAttribute($context["segment"], "type", [])) . ".html.twig"), "@nucleus/page.html.twig", 35)->display(twig_array_merge($context, ["segments" => $this->getAttribute($context["segment"], "children", [])]));
            }
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['segment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 42
    public function block_page_top($context, array $blocks = [])
    {
        // line 43
        echo "    ";
    }

    // line 48
    public function block_page_bottom($context, array $blocks = [])
    {
        // line 49
        echo "    ";
    }

    // line 54
    public function block_body_top($context, array $blocks = [])
    {
        // line 55
        echo "    ";
    }

    // line 60
    public function block_body_bottom($context, array $blocks = [])
    {
        // line 61
        echo "    ";
    }

    // line 70
    public function block_page_head($context, array $blocks = [])
    {
        // line 71
        $this->loadTemplate("partials/page_head.html.twig", "@nucleus/page.html.twig", 71)->display($context);
    }

    // line 76
    public function block_page_footer($context, array $blocks = [])
    {
        // line 77
        echo "        ";
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", []), "finalize", [], "method");
        // line 78
        echo twig_join_filter($this->getAttribute(($context["gantry"] ?? null), "scripts", [0 => "footer"], "method"), "
    ");
    }

    // line 84
    public function block_page($context, array $blocks = [])
    {
        // line 85
        echo "<!DOCTYPE ";
        echo (($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "doctype", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "doctype", []), "html")) : ("html"));
        echo ">
<html";
        // line 86
        echo $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "page", []), "htmlAttributes", []);
        echo ">
    ";
        // line 87
        echo ($context["page_head"] ?? null);
        echo "
    ";
        // line 88
        $this->displayBlock('page_body', $context, $blocks);
        // line 106
        echo "
</html>
";
    }

    // line 88
    public function block_page_body($context, array $blocks = [])
    {
        // line 89
        echo "<body";
        echo $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "page", []), "bodyAttributes", [0 => ["class" => [0 => ($context["offcanvas_position"] ?? null), 1 => $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "page", []), "preset", []), 2 => ("g-style-" . $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "preset", []))]]], "method");
        echo ">
        ";
        // line 90
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "body", []), "body_top", []);
        echo "
        ";
        // line 91
        echo ($context["body_top"] ?? null);
        echo "
        ";
        // line 92
        echo ($context["page_offcanvas"] ?? null);
        echo "
        <div id=\"g-page-surround\">
            ";
        // line 94
        if (twig_trim_filter(($context["page_offcanvas"] ?? null))) {
            // line 95
            echo "<div class=\"g-offcanvas-hide g-offcanvas-toggle\" role=\"navigation\" data-offcanvas-toggle aria-controls=\"g-offcanvas\" aria-expanded=\"false\"><i class=\"fa fa-fw fa-bars\"></i></div>";
        }
        // line 97
        echo "            ";
        echo ($context["page_top"] ?? null);
        echo "
            ";
        // line 98
        echo ($context["page_layout"] ?? null);
        echo "
            ";
        // line 99
        echo ($context["page_bottom"] ?? null);
        echo "
        </div>
        ";
        // line 101
        echo ($context["body_bottom"] ?? null);
        echo "
        ";
        // line 102
        echo ($context["page_footer"] ?? null);
        echo "
        ";
        // line 103
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "body", []), "body_bottom", []);
        echo "
    </body>";
    }

    public function getTemplateName()
    {
        return "@nucleus/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  343 => 103,  339 => 102,  335 => 101,  330 => 99,  326 => 98,  321 => 97,  318 => 95,  316 => 94,  311 => 92,  307 => 91,  303 => 90,  298 => 89,  295 => 88,  289 => 106,  287 => 88,  283 => 87,  279 => 86,  274 => 85,  271 => 84,  266 => 78,  263 => 77,  260 => 76,  256 => 71,  253 => 70,  249 => 61,  246 => 60,  242 => 55,  239 => 54,  235 => 49,  232 => 48,  228 => 43,  225 => 42,  208 => 35,  206 => 34,  189 => 33,  186 => 32,  182 => 25,  178 => 23,  175 => 22,  172 => 21,  168 => 9,  165 => 8,  161 => 84,  156 => 81,  153 => 80,  150 => 76,  148 => 75,  144 => 70,  142 => 69,  140 => 65,  133 => 62,  130 => 60,  128 => 59,  121 => 56,  118 => 54,  116 => 53,  109 => 50,  106 => 48,  104 => 47,  97 => 44,  94 => 42,  92 => 41,  88 => 32,  86 => 31,  84 => 29,  82 => 28,  78 => 21,  76 => 20,  69 => 16,  67 => 15,  63 => 14,  61 => 13,  57 => 10,  54 => 8,  51 => 7,  49 => 6,  47 => 4,  45 => 3,  43 => 2,  41 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@nucleus/page.html.twig", "/var/www/html/media/gantry5/engines/nucleus/templates/page.html.twig");
    }
}
