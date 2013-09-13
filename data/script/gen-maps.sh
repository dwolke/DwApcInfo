#!/bin/sh

if [ $# -lt 1 ]
  then
  echo "Usage: $0 Projektpfad (OHNE! Slash am Ende!!!)"
  exit 1
fi

cg=$1/vendor/zendframework/zendframework/bin/classmap_generator.php
tg=$1/vendor/zendframework/zendframework/bin/templatemap_generator.php
cm=autoload.classmap.php
tm=template_map.php
mod=$1/module

php $cg -l $mod/DwApcInfo $mod/DwApcInfo/$cm