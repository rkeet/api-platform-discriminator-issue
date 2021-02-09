#!/bin/sh
docker network create discriminator || true
docker-compose -p discriminator -f docker/docker-compose-development.yaml build
