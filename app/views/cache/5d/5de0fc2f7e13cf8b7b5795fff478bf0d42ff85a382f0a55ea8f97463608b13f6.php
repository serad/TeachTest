<?php

/* layouts/base.twig */
class __TwigTemplate_f95a24f006dc131e237f091c7b4ba086efd7d777de391cff1b1fd7784f6f2e85 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'css' => array($this, 'block_css'),
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 12
        echo "    </head>
    <body>
\t<nav>
    \t\t<div class=\"nav-wrapper blue-grey darken\" >
\t\t     \t<a href=\"/\" class=\"brand-logo right\">T</a>
\t\t\t<a href=\"#\" data-activates=\"mobile-demo\" class=\"button-collapse\"><i class=\"material-icons\">menu</i></a>
\t\t      <ul id=\"nav-mobile\" class=\"left hide-on-med-and-down\">
\t\t        <li class=\"index\"><a href=\"/\">Indice</a></li>
\t\t        <li class=\"courses\"><a href=\"/index/courses/\">Cursos</a></li>
\t\t        <li class=\"contact\"><a href=\"/index/contact/\">Contacto</a></li>
\t\t      </ul>
\t\t\t<ul class=\"side-nav\" id=\"mobile-demo\">
\t\t\t\t<li class=\"index\"><a href=\"/\">Indice</a></li>
\t\t\t\t<li class=\"courses\"><a href=\"/index/courses/\">Cursos</a></li>
\t\t\t\t<li class=\"contact\"><a href=\"/index/contact/\">Contacto</a></li>
\t\t\t</ul>
\t\t</div>
\t</nav>
        <div class=\"container\">";
        // line 30
        $this->displayBlock('content', $context, $blocks);
        echo "</div>
        <footer class=\"page-footer blue-grey darken-2\">
          <div class=\"footer-copyright\">
            <div class=\"container\">
            © 2017 Copyright Text
            <a class=\"grey-text text-lighten-4 right\" href=\"#!\">More Links</a>
            </div>
          </div>
        </footer>

\t<!--Import jQuery before materialize.js-->
\t<script type=\"text/javascript\" src=\"https://code.jquery.com/jquery-3.2.1.min.js\"></script>
      \t<script type=\"text/javascript\" src=\"/public/js/materialize.min.js\"></script>
\t<script type=\"text/javascript\" src=\"/public/js/main.js\"></script>
    \t";
        // line 44
        $this->displayBlock('scripts', $context, $blocks);
        // line 45
        echo "    </body>
</html>
";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "\t    <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
\t    <link rel=\"stylesheet\" href=\"/public/css/materialize.min.css\" />
            <link rel=\"stylesheet\" href=\"/public/css/style.css\" />
\t    ";
        // line 8
        $this->displayBlock('css', $context, $blocks);
        // line 9
        echo "\t    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
            <title>";
        // line 10
        $this->displayBlock('title', $context, $blocks);
        echo " - My Webpage</title>
        ";
    }

    // line 8
    public function block_css($context, array $blocks = array())
    {
    }

    // line 10
    public function block_title($context, array $blocks = array())
    {
    }

    // line 30
    public function block_content($context, array $blocks = array())
    {
    }

    // line 44
    public function block_scripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layouts/base.twig";
    }

    public function getDebugInfo()
    {
        return array (  110 => 44,  105 => 30,  100 => 10,  95 => 8,  89 => 10,  86 => 9,  84 => 8,  79 => 5,  76 => 4,  70 => 45,  68 => 44,  51 => 30,  31 => 12,  29 => 4,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        {% block head %}
\t    <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
\t    <link rel=\"stylesheet\" href=\"/public/css/materialize.min.css\" />
            <link rel=\"stylesheet\" href=\"/public/css/style.css\" />
\t    {% block css %}{% endblock %}
\t    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
            <title>{% block title %}{% endblock %} - My Webpage</title>
        {% endblock %}
    </head>
    <body>
\t<nav>
    \t\t<div class=\"nav-wrapper blue-grey darken\" >
\t\t     \t<a href=\"/\" class=\"brand-logo right\">T</a>
\t\t\t<a href=\"#\" data-activates=\"mobile-demo\" class=\"button-collapse\"><i class=\"material-icons\">menu</i></a>
\t\t      <ul id=\"nav-mobile\" class=\"left hide-on-med-and-down\">
\t\t        <li class=\"index\"><a href=\"/\">Indice</a></li>
\t\t        <li class=\"courses\"><a href=\"/index/courses/\">Cursos</a></li>
\t\t        <li class=\"contact\"><a href=\"/index/contact/\">Contacto</a></li>
\t\t      </ul>
\t\t\t<ul class=\"side-nav\" id=\"mobile-demo\">
\t\t\t\t<li class=\"index\"><a href=\"/\">Indice</a></li>
\t\t\t\t<li class=\"courses\"><a href=\"/index/courses/\">Cursos</a></li>
\t\t\t\t<li class=\"contact\"><a href=\"/index/contact/\">Contacto</a></li>
\t\t\t</ul>
\t\t</div>
\t</nav>
        <div class=\"container\">{% block content %}{% endblock %}</div>
        <footer class=\"page-footer blue-grey darken-2\">
          <div class=\"footer-copyright\">
            <div class=\"container\">
            © 2017 Copyright Text
            <a class=\"grey-text text-lighten-4 right\" href=\"#!\">More Links</a>
            </div>
          </div>
        </footer>

\t<!--Import jQuery before materialize.js-->
\t<script type=\"text/javascript\" src=\"https://code.jquery.com/jquery-3.2.1.min.js\"></script>
      \t<script type=\"text/javascript\" src=\"/public/js/materialize.min.js\"></script>
\t<script type=\"text/javascript\" src=\"/public/js/main.js\"></script>
    \t{% block scripts %}{% endblock %}
    </body>
</html>
", "layouts/base.twig", "/var/www/teachtest.youtome.es/public_html/app/views/layouts/base.twig");
    }
}
