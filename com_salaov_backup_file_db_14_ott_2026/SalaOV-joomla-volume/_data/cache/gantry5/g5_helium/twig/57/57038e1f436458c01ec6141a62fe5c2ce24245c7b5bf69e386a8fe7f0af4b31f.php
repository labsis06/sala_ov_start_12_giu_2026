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

/* @particles/social.html.twig */
class __TwigTemplate_a4098b9a8653aae30990db06abb683547b481afa0a4e6fa0a73d59fc2169984c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'particle' => [$this, 'block_particle'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@nucleus/partials/particle.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 3
        if ($this->getAttribute(($context["particle"] ?? null), "target", [])) {
            // line 4
            $context["targetAttrib"] = ((" target=\"" . twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "target", []))) . "\"");
            // line 5
            $context["targetAttrib"] = ((($this->getAttribute(($context["particle"] ?? null), "target", []) == "_blank")) ? ((($context["targetAttrib"] ?? null) . " rel=\"noopener noreferrer\"")) : (($context["targetAttrib"] ?? null)));
        }
        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/social.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_particle($context, array $blocks = [])
    {
        // line 9
        echo "    ";
        if ($this->getAttribute(($context["particle"] ?? null), "title", [])) {
            echo "<h2 class=\"g-title\">";
            echo $this->getAttribute(($context["particle"] ?? null), "title", []);
            echo "</h2>";
        }
        // line 10
        echo "    <div class=\"g-social ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["particle"] ?? null), "css", []), "class", []), "html", null, true);
        echo "\">
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["particle"] ?? null), "items", []));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 12
            echo "            ";
            $context["title"] = (( !twig_test_empty($this->getAttribute($context["item"], "title", []))) ? (twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", []))) : (twig_escape_filter($this->env, $this->getAttribute($context["item"], "text", []))));
            // line 13
            echo "            ";
            $context["titleAttrib"] = (( !twig_test_empty(($context["title"] ?? null))) ? (((((" title=\"" . ($context["title"] ?? null)) . "\" aria-label=\"") . ($context["title"] ?? null)) . "\"")) : (""));
            // line 14
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "link", []));
            echo "\"";
            echo ($context["targetAttrib"] ?? null);
            echo ($context["titleAttrib"] ?? null);
            echo ">
                ";
            // line 15
            if (twig_in_filter($this->getAttribute(($context["particle"] ?? null), "display", []), [0 => "both", 1 => "icons_only"])) {
                echo "<span class=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "icon", []));
                echo "\"></span>";
            }
            // line 16
            echo "                ";
            if (twig_in_filter($this->getAttribute(($context["particle"] ?? null), "display", []), [0 => "both", 1 => "text_only"])) {
                echo "<span class=\"g-social-text\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "text", []));
                echo "</span>";
            }
            // line 17
            echo "            </a>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "@particles/social.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 19,  93 => 17,  86 => 16,  80 => 15,  72 => 14,  69 => 13,  66 => 12,  62 => 11,  57 => 10,  50 => 9,  47 => 8,  42 => 1,  39 => 5,  37 => 4,  35 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@particles/social.html.twig", "/var/www/html/media/gantry5/engines/nucleus/particles/social.html.twig");
    }
}
