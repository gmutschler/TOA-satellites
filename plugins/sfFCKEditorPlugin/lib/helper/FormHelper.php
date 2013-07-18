<?php

function submit_image_tag($source, $options = array())
{
  if (!isset($options['alt']))
  {
    $path_pos = strrpos($source, '/');
    $dot_pos = strrpos($source, '.');
    $begin = $path_pos ? $path_pos + 1 : 0;
    $nb_str = ($dot_pos ? $dot_pos : strlen($source)) - $begin;
    $options['alt'] = ucfirst(substr($source, $begin, $nb_str));
  }

  return tag('input', array_merge(array('type' => 'image', 'name' => 'commit', 'src' => image_path($source)), _convert_options_to_javascript(_convert_options($options))));
}