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

/* @gantry-admin/partials/page.html.twig */
class __TwigTemplate_dfc839909f1dd9c64572ba7458a38f1421d843cff51d0f02e8b4a4040560b8c7 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascript' => [$this, 'block_javascript'],
            'content' => [$this, 'block_content'],
            'footer_section' => [$this, 'block_footer_section'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
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
        // line 2
        echo "    ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 5
        echo "
    ";
        // line 6
        $this->displayBlock('javascript', $context, $blocks);
        $content = ob_get_clean();
        $assetFunction($content, $location, $priority);
        // line 18
        echo "<div id=\"g5-container\">
    ";
        // line 19
        $this->displayBlock('content', $context, $blocks);
        // line 21
        echo "
    ";
        // line 22
        $this->displayBlock('footer_section', $context, $blocks);
        // line 24
        echo "</div>

";
        // line 26
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", []), "finalize", [], "method");
    }

    // line 2
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 3
        echo "        <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-admin://assets/css-compiled/joomla-g-admin.css"));
        echo "\" type=\"text/css\" />
    ";
    }

    // line 6
    public function block_javascript($context, array $blocks = [])
    {
        // line 7
        echo "        <script>
            var GANTRY_AJAX_SUFFIX = '";
        // line 8
        echo $this->getAttribute(($context["gantry"] ?? null), "ajax_suffix", []);
        echo "';
            var GANTRY_AJAX_URL = '";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "%ajax%"], "method"));
        echo "';
            var GANTRY_AJAX_CONF_URL = '";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "configurations/%ajax%"], "method"));
        echo "';
            var GANTRY_AJAX_NONCE = null;
            var GANTRY_PLATFORM = 'joomla';
        </script>
        <script type=\"text/javascript\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-admin://js/dark-mode.js"));
        echo "\"></script>
    ";
    }

    // line 19
    public function block_content($context, array $blocks = [])
    {
        // line 20
        echo "    ";
    }

    // line 22
    public function block_footer_section($context, array $blocks = [])
    {
        // line 23
        echo "    ";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/partials/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 23,  118 => 22,  114 => 20,  111 => 19,  105 => 14,  98 => 10,  94 => 9,  90 => 8,  87 => 7,  84 => 6,  77 => 3,  74 => 2,  70 => 26,  66 => 24,  64 => 22,  61 => 21,  59 => 19,  56 => 18,  52 => 6,  49 => 5,  46 => 2,  34 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@gantry-admin/partials/page.html.twig", "/var/www/html/administrator/components/com_gantry5/templates/partials/page.html.twig");
    }
}
