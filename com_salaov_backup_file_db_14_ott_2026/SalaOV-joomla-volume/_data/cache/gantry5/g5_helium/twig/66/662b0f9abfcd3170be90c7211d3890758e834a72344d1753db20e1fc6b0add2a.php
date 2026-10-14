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

/* @particles/custom.html.twig */
class __TwigTemplate_c166bbb643fb7e72455c42f65a950f6d08c9bcffc675276c855bd01cd2888f87 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/custom.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_particle($context, array $blocks = [])
    {
        // line 4
        echo "    ";
        $context["html"] = (($this->getAttribute(($context["particle"] ?? null), "twig", [])) ? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "compile", [0 => $this->getAttribute(($context["particle"] ?? null), "html", [])], "method")) : ($this->getAttribute(($context["particle"] ?? null), "html", [])));
        // line 5
        echo "    ";
        echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->htmlFilter((($this->getAttribute(($context["particle"] ?? null), "filter", [])) ? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", []), "filter", [0 => ($context["html"] ?? null)], "method")) : (($context["html"] ?? null))));
        echo "
";
    }

    public function getTemplateName()
    {
        return "@particles/custom.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 5,  42 => 4,  39 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@particles/custom.html.twig", "/var/www/html/media/gantry5/engines/nucleus/particles/custom.html.twig");
    }
}
