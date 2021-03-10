<?php
/**
 * Plugin Name: Latex Plugin
 * Plugin URI: https://github.com/weikaaai/latex-plugin
 * Description: You can render LaTeX mathematical expressions using MathJax anywhere in your post.
 * Version: 1.1
 * Author: Wei-Kai Fang
 * Author URI: https://github.com/weikaaai
 */

 add_action('wp_enqueue_scripts', 'register_plugin_files');

 function register_plugin_files() {
   wp_register_style('latex', plugins_url('latex-plugin/css/latex.css'));
   wp_enqueue_style('latex');
   wp_enqueue_script('loadmathjax', plugins_url('latex-plugin/js/latest.js?config=TeX-MML-AM_CHTML-full,Safe'), '', '', false);
   // wp_enqueue_script('setup', plugins_url('latex-plugin/js/setup.js'), '', '', true);
   wp_enqueue_script('requirejs', plugins_url('latex-plugin/js/requirejs.js'), '', '', true);
 }

 add_action('wp_footer', 'mathjax_config', 50);

 function mathjax_config() {
   echo '<script type="text/x-mathjax-config">' . PHP_EOL;
   echo 'init_mathjax = function() {' . PHP_EOL;
   echo 'if (window.MathJax) {' . PHP_EOL;
   echo 'MathJax.Hub.Config({' . PHP_EOL;
   echo 'TeX: {' . PHP_EOL;
   echo 'equationNumbers: {' . PHP_EOL;
   echo 'autoNumber: "AMS",' . PHP_EOL;
   echo 'useLabelIds: true' . PHP_EOL;
   echo '}' . PHP_EOL;
   echo '},' . PHP_EOL;
   echo 'tex2jax: {' . PHP_EOL;
   echo 'inlineMath: [ ["$","$"], ["\\\(","\\\)"] ],' . PHP_EOL;
   echo 'displayMath: [ ["$$","$$"], ["\\\[","\\\]"] ],' . PHP_EOL;
   echo 'processEscapes: true,' . PHP_EOL;
   echo 'processEnvironments: true' . PHP_EOL;
   echo '},' . PHP_EOL;
   echo 'displayAlign: "center",' . PHP_EOL;
   echo 'CommonHTML: {' . PHP_EOL;
   echo 'linebreaks: {' . PHP_EOL;
   echo 'automatic: true' . PHP_EOL;
   echo '}' . PHP_EOL;
   echo '},' . PHP_EOL;
   echo '"HTML-CSS": {' . PHP_EOL;
   echo 'linebreaks: {' . PHP_EOL;
   echo 'automatic: true' . PHP_EOL;
   echo '}' . PHP_EOL;
   echo '}' . PHP_EOL;
   echo '});' . PHP_EOL;
   echo 'MathJax.Hub.Queue(["Typeset", MathJax.Hub]);' . PHP_EOL;
   echo '}' . PHP_EOL;
   echo '}' . PHP_EOL;
   echo 'init_mathjax();' . PHP_EOL;
   echo '</script>' . PHP_EOL;
 }