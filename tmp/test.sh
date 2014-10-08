#!/bin/bash
lightstatus=$(jq -r .living.lamp.state /etc/pilight/config.json)
echo $lightstatus
