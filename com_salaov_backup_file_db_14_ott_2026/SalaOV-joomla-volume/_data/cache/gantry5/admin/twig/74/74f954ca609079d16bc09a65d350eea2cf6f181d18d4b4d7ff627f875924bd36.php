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

/* @gantry-admin/pages/themes/themes.html.twig */
class __TwigTemplate_dfbca0b637685688ab224fc7ec791bdb351d76192d0c7348d2ba1dce9b5613af extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'gantry' => [$this, 'block_gantry'],
            'footer_section' => [$this, 'block_footer_section'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((((($context["ajax"] ?? null) - ($context["suffix"] ?? null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/pages/themes/themes.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 3
        $context["settings_url"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", []), "settings", []);
        // line 4
        $context["settings_key"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", []), "settings_key", []);
        // line 1
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        // line 7
        echo "    <div id=\"g5-container\" class=\"g-container\">
        <div class=\"inner-container\">
            <div class=\"g-grid\">
                <div class=\"g-block main-block\">
                    <section id=\"main\">
                        <div data-g5-content=\"\">
                            ";
        // line 13
        $this->displayBlock('gantry', $context, $blocks);
        // line 60
        echo "                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
";
    }

    // line 13
    public function block_gantry($context, array $blocks = [])
    {
        // line 14
        echo "                                <div class=\"g-content\" data-g5-content=\"\">
                                    <div class=\"g-grid overview-header\">
                                        <div class=\"g-block\">
                                            <h2 class=\"theme-title\"><i class=\"fa fa-fw fa-plug\" aria-hidden=\"true\"></i> ";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_AVAILABLE_THEMES"), "html", null, true);
        echo "</h2>
                                        </div>
                                    ";
        // line 19
        if (($context["settings_url"] ?? null)) {
            // line 20
            echo "                                        <div class=\"g-block\">
                                            <a class=\"button button-primary float-right\" href=\"";
            // line 21
            echo twig_escape_filter($this->env, ($context["settings_url"] ?? null), "html", null, true);
            echo "\" data-settings-key=\"";
            echo twig_escape_filter($this->env, ($context["settings_key"] ?? null), "html", null, true);
            echo "\">
                                                <i class=\"fa fa-cog\" aria-hidden=\"true\"></i> ";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PLATFORM_SETTINGS"), "html", null, true);
            echo "
                                            </a>
                                        </div>
                                    ";
        }
        // line 26
        echo "                                    </div>
                                    <div class=\"themes cards-wrapper g-grid fixed-blocks\">
                                        ";
        // line 28
        if (twig_length_filter($this->env, ($context["themes"] ?? null))) {
            // line 29
            echo "                                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["themes"] ?? null));
            foreach ($context['_seq'] as $context["id"] => $context["theme"]) {
                // line 30
                echo "                                            <div class=\"theme card\">
                                                <div class=\"theme-id\">
                                                    ";
                // line 32
                if ($this->getAttribute($this->getAttribute($context["theme"], "details", []), "icon", [])) {
                    echo "<i class=\"fa fa-fw fa-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["theme"], "details", []), "icon", []), "html", null, true);
                    echo "\" aria-hidden=\"true\"></i>";
                }
                // line 33
                echo "                                                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "title", []), "html", null, true);
                echo " <span class=\"theme-info\">(v";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["theme"], "details", []), "version", []), "html", null, true);
                echo " / ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "name", []), "html", null, true);
                echo ")</span>
                                                </div>
                                                <div class=\"theme-screenshot\">
                                                    ";
                // line 36
                if ($this->getAttribute($context["theme"], "admin_url", [])) {
                    // line 37
                    echo "                                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "admin_url", []), "html", null, true);
                    echo "\">
                                                    ";
                }
                // line 39
                echo "                                                        <img src=\"";
                echo twig_escape_filter($this->env, _twig_default_filter($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($context["theme"], "thumbnail", [])), "http://www.placehold.it/206x150/f4f4f4"), "html", null, true);
                echo "\" />
                                                    ";
                // line 40
                if ($this->getAttribute($context["theme"], "admin_url", [])) {
                    // line 41
                    echo "                                                    </a>
                                                    ";
                }
                // line 43
                echo "                                                </div>
                                                <div class=\"theme-name\">
                                                    ";
                // line 45
                if ($this->getAttribute($context["theme"], "preview_url", [])) {
                    // line 46
                    echo "                                                    <a class=\"button\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "preview_url", []), "html", null, true);
                    echo "\" target=\"_blank\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PREVIEW"), "html", null, true);
                    echo "</a>
                                                    ";
                }
                // line 48
                echo "                                                    ";
                if ($this->getAttribute($context["theme"], "admin_url", [])) {
                    // line 49
                    echo "                                                    <a class=\"button button-primary\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "admin_url", []), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_CONFIGURE"), "html", null, true);
                    echo "</a>
                                                    ";
                }
                // line 51
                echo "                                                </div>
                                            </div>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['theme'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "                                        ";
        } else {
            // line 55
            echo "                                            <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_NO_THEMES_INSTALLED"), "html", null, true);
            echo "</p>
                                        ";
        }
        // line 57
        echo "                                    </div>
                                </div>
                            ";
    }

    // line 68
    public function block_footer_section($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/themes/themes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 68,  192 => 57,  186 => 55,  183 => 54,  175 => 51,  167 => 49,  164 => 48,  156 => 46,  154 => 45,  150 => 43,  146 => 41,  144 => 40,  139 => 39,  133 => 37,  131 => 36,  120 => 33,  114 => 32,  110 => 30,  105 => 29,  103 => 28,  99 => 26,  92 => 22,  86 => 21,  83 => 20,  81 => 19,  76 => 17,  71 => 14,  68 => 13,  58 => 60,  56 => 13,  48 => 7,  45 => 6,  41 => 1,  39 => 4,  37 => 3,  31 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@gantry-admin/pages/themes/themes.html.twig", "/var/www/html/administrator/components/com_gantry5/templates/pages/themes/themes.html.twig");
    }
}
