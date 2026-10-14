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

/* @nucleus/layout/grid.html.twig */
class __TwigTemplate_6068875ccb8e198615cce67b6b6765daa5ed0f749fb6e67e3592922bfae782a8 extends \Twig\Template
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
        $context["attr_extra"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->attributeArrayFilter($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", []), "extra", []));
        // line 2
        $context["class"] = ("g-grid" . (($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", []), "class", [])) ? ((" " . twig_join_filter($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", []), "class", []), " "))) : ("")));
        // line 4
        ob_start(function () { return ''; });
        // line 5
        echo "    ";
        if ($this->getAttribute(($context["segment"] ?? null), "children", [])) {
            // line 6
            echo "        ";
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
                // line 7
                echo "            ";
                $this->loadTemplate((("@nucleus/layout/" . $this->getAttribute($context["segment"], "type", [])) . ".html.twig"), "@nucleus/layout/grid.html.twig", 7)->display(twig_array_merge($context, ["segments" => $this->getAttribute($context["segment"], "children", [])]));
                // line 8
                echo "        ";
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
            // line 9
            echo "    ";
        }
        $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 12
        if (twig_trim_filter(($context["html"] ?? null))) {
            // line 13
            echo "        <div ";
            if ($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", []), "id", [])) {
                echo "id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", []), "id", []));
                echo "\" ";
            }
            echo "class=\"";
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\"";
            echo ($context["attr_extra"] ?? null);
            echo ">";
            // line 14
            echo ($context["html"] ?? null);
            // line 15
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@nucleus/layout/grid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 15,  92 => 14,  80 => 13,  78 => 12,  74 => 9,  60 => 8,  57 => 7,  39 => 6,  36 => 5,  34 => 4,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@nucleus/layout/grid.html.twig", "/var/www/html/media/gantry5/engines/nucleus/templates/layout/grid.html.twig");
    }
}
