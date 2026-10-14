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

/* @gantry-admin/partials/base.html.twig */
class __TwigTemplate_7c897984eb97efbf0041a5cc930dacdfc9d8a8a1749d94f4eff1463015352bec extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascript' => [$this, 'block_javascript'],
            'content' => [$this, 'block_content'],
            'gantry_content_wrapper' => [$this, 'block_gantry_content_wrapper'],
            'gantry' => [$this, 'block_gantry'],
            'footer_section' => [$this, 'block_footer_section'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@gantry-admin/partials/page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("@gantry-admin/partials/page.html.twig", "@gantry-admin/partials/base.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 4
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-admin://assets/css-compiled/g-admin.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-admin://assets/css/font-awesome6-all.min.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-admin://assets/css/font-awesome6-shim.min.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    ";
        // line 7
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
    }

    // line 10
    public function block_javascript($context, array $blocks = [])
    {
        // line 11
        echo "    <script type=\"text/javascript\" async=\"async\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-admin://assets/js/main.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 12
        $this->loadTemplate("@gantry-admin/partials/js-translations.html.twig", "@gantry-admin/partials/base.html.twig", 12)->display($context);
        // line 13
        echo "    ";
        $this->displayParentBlock("javascript", $context, $blocks);
        echo "
";
    }

    // line 16
    public function block_content($context, array $blocks = [])
    {
        // line 17
        echo "    <div id=\"main-header\" data-mode-indicator=\"production\">
        ";
        // line 18
        $this->loadTemplate("@gantry-admin/partials/php_unsupported.html.twig", "@gantry-admin/partials/base.html.twig", 18)->display($context);
        // line 19
        echo "        ";
        $this->loadTemplate("@gantry-admin/partials/header.html.twig", "@gantry-admin/partials/base.html.twig", 19)->display($context);
        // line 20
        echo "    </div>
    <div class=\"inner-container\">
        ";
        // line 22
        $this->loadTemplate("@gantry-admin/partials/updates.html.twig", "@gantry-admin/partials/base.html.twig", 22)->display($context);
        // line 23
        echo "        ";
        $this->displayBlock('gantry_content_wrapper', $context, $blocks);
        // line 38
        echo "    </div>
";
    }

    // line 23
    public function block_gantry_content_wrapper($context, array $blocks = [])
    {
        // line 24
        echo "            <div data-g5-content-wrapper=\"\">
                ";
        // line 25
        $this->loadTemplate("@gantry-admin/partials/navigation.html.twig", "@gantry-admin/partials/base.html.twig", 25)->display($context);
        // line 26
        echo "                <div class=\"g-grid\">
                    <div class=\"g-block main-block\">
                        <section id=\"g-main\">
                            <div class=\"g-content\" data-g5-content=\"\">
                                ";
        // line 30
        $this->displayBlock('gantry', $context, $blocks);
        // line 32
        echo "                            </div>
                        </section>
                    </div>
                </div>
            </div>
        ";
    }

    // line 30
    public function block_gantry($context, array $blocks = [])
    {
        // line 31
        echo "                                ";
    }

    // line 41
    public function block_footer_section($context, array $blocks = [])
    {
        // line 42
        echo "    <footer id=\"footer\">
        <div>
            ";
        // line 44
        echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FOOTER");
        echo "
        </div>
        ";
        // line 46
        $context["version"] = twig_constant("GANTRY5_VERSION");
        // line 47
        echo "        ";
        $context["version_date"] = twig_constant("GANTRY5_VERSION_DATE");
        // line 48
        echo "        <div>
            ";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FOOTER_VERSION"), "html", null, true);
        echo " <span class=\"g-version\">";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "</span>
            /
            ";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FOOTER_RELEASED"), "html", null, true);
        echo " <span class=\"g-version-date\">";
        echo twig_escape_filter($this->env, ($context["version_date"] ?? null), "html", null, true);
        echo "</span>
        </div>
        <div><a href=\"#\" data-changelog=\"";
        // line 53
        echo twig_escape_filter($this->env, twig_constant("GANTRY5_VERSION"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_CHANGELOG"), "html", null, true);
        echo "</a></div>
    </footer>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/partials/base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 53,  167 => 51,  160 => 49,  157 => 48,  154 => 47,  152 => 46,  147 => 44,  143 => 42,  140 => 41,  136 => 31,  133 => 30,  124 => 32,  122 => 30,  116 => 26,  114 => 25,  111 => 24,  108 => 23,  103 => 38,  100 => 23,  98 => 22,  94 => 20,  91 => 19,  89 => 18,  86 => 17,  83 => 16,  76 => 13,  74 => 12,  69 => 11,  66 => 10,  60 => 7,  56 => 6,  52 => 5,  47 => 4,  44 => 3,  34 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@gantry-admin/partials/base.html.twig", "/var/www/html/administrator/components/com_gantry5/templates/partials/base.html.twig");
    }
}
