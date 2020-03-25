<?php

function alpha_bootstrapping(){
    load_theme_textdomain("alpha");
}
add_action("after_setup_theme","alpha_bootstrapping");