#!/usr/bin/env bash
# teste
# down - Stop All docker services provide to desenv envireoment
#
# Website:       https://pandora.io
# Author:        lizy by pandora.io
# Maintenance:   lizy by pandora.io
# reference Docs:
#
# CONFIGURATION?
# I recommend you to create a softlink to folder that is available on $PATH variable.
# $ sudo ln -s /home/bibolfo/repositorio/security/Scripts/Doker/goDocker /usr/local/bin
#
# Crontab:
# https://crontab.guru/
# sudo vi /etc/crontab
# */5 *    * * *   root    goDocker 1> /dev/null 2>&1
#
# -----------------------------------------------------------------------------#

# ----------------------------VARIABLES--------------------------------------- #
color_default=`tput setaf 69`

inicio(){
    echo "${color_default} ─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────"
    echo "$(tput sgr0) ───── ● início -- ${color_default} Stop All docker services $(tput sgr0) ─────"
    echo "${color_default} ─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────"
}


stopCompose(){

    echo "$(tput sgr0) ENCERRANDO Apache ${color_default}..."
    sudo a2dissite refletir.s023.conf && sudo systemctl reload apache2.service && sudo systemctl stop apache2.service
    sudo systemctl stop mariadb.service
    echo "$(tput sgr0) parando compose ${color_default}..."
    docker compose stop
    sudo docker compose down
    read -t3
    echo "${color_default} done!"
}

deleteNode(){
    echo "$(tput sgr0) deletando node_modules ${color_default}..."
    rm -rf node_modules
    read -t3
    echo "${color_default} done!"
}

deleteConainer(){
    echo "$(tput sgr0) deletando containers ${color_default}..."
    docker rm -vf $(docker ps -aq)
    read -t3
    echo "${color_default} done!"
}

deleteImages(){
    echo "$(tput sgr0) deletando images ${color_default}..."
    docker rmi -f $(docker images -aq)
    read -t3
    echo "${color_default} done!"
}

deleteVolumes(){
    echo "$(tput sgr0) deletando todo o resto... ${color_default}..."
    sudo docker system prune -af --volumes
    read -t3
    echo "${color_default} done!"
}


fim(){
    echo "${color_default} ─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────"
    echo "$(tput sgr0) ───── ● Fim -- ${color_default} Finalizando... $(tput sgr0) ─────"
    echo "${color_default} ─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────"
    echo "$(tput sgr0)"
}
# -----------------------------default process--------------------------------- #
main(){
    inicio
    stopCompose
    # deleteNode
    deleteConainer
    deleteImages
    deleteVolumes
    fim
}
# -------------------------------EXECUTION----------------------------------- #
main
# --------------------------------------------------------------------------- #
