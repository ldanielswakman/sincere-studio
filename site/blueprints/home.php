<?php if(!defined('KIRBY')) exit ?>

title: Home
pages: false
fields:
  title:
    label: Title
    type:  text
  intro_bg_image:
    label: Intro Background Image
    type: image
    width: 1/2
  intro_bg_color:
    label: >
      Intro Background Colour <small style="font-weight: normal; color: #999;">(with #)</small>
    type: text
    icon: eyedropper
    width: 1/2
  text:
    label: Text
    type:  textarea
    size:  large
  current:
    label: Current
    type: structure
    style: table
    fields:
      text:
        label: Text
        type: text
      link:
        label: Link
        type: url