<?php if(!defined('KIRBY')) exit ?>

title: Projects
pages:
  template: project
files: false
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  markdown
  featured1:
    label: Featured Project 1
    type: select
    options: children
  featured2:
    label: Featured Project 2
    type: select
    options: children
  featured3:
    label: Featured Project 3
    type: select
    options: children