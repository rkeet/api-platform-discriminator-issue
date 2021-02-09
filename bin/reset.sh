#!/bin/bash

bin/console doctrine:schema:drop -f
bin/console doctrine:schema:create
bin/console doctrine:fixture:load -n