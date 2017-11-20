<?php

/* layouts/index.twig */
class __TwigTemplate_01a5dee7e8a617c04912e4708f534e7f996c40c3cea78417adc885d524cf7b4d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/base.twig", "layouts/index.twig", 1);
        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "layouts/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layouts/base.twig\" %}
", "layouts/index.twig", "/var/www/teachtest.youtome.es/public_html/app/views/layouts/index.twig");
    }
}
