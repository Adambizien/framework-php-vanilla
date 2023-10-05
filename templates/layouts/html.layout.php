<?php
  fromInc("html_footer");
  fromInc("menu");
  if(isset($pageContent)){
    echo $pageContent;
  }
  fromInc("html_header");
