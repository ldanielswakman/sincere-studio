<?php if(!defined('KIRBY')) exit ?>

title: Project
pages: false
files:
  sortable: true
fields:
  title:
    label: Title
    type:  text
  year:
    label: Year
    type:  text
  text:
    label: Text
    type:  textarea
  tags:
    label: Tags
    type:  tags
  projecturl:
    label: URL
    type:  url
  featuredimage:
    label: Featured Image
    type: select
    options: images
  sections:
    label: Sections
    type: structure
    fields:
      textcolumn:
        label: >
          Text column <i>(small)</i>
        type: textarea
      imagecolumn:
        label: >
          Image column <i>(large)</i>
        type: textarea
      fullscreen:
        text: Fullscreen image?
        type: checkbox
    entry: >
      <table>
        <tr>
          <td width="60%" style="padding-right: 20px;">{{textcolumn}}</td>
          <td width="40%">{{imagecolumn}}</td>
        <tr>
      </table>
      <div style="margin-top: 10px; color: #999">Fullscreen: {{fullscreen}}</div>