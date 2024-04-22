#!/bin/sh

# I - prompt user

echo "Hello $USER"

# II - receive arguments

name="Adrien"

echo "Hello $name"

# III - path to

path="/home/adrien/Documents"

# Vérifier si l'argument est fourni
if [ -z "$path" ]; then
    echo "Erreur : Veuillez fournir un chemin en argument."
    exit 1
fi

# Vérifier si le chemin existe
if [ ! -e "$path" ]; then
    echo "Erreur : Le chemin '$path' n'existe pas."
    exit 1
fi

# Vérifier si le chemin est un fichier
if [ -f "$path" ]; then
    # Vérifier s'il s'agit d'un fichier texte
    if [ "$(file --mime-type -b "$path" | cut -d'/' -f1)" = "text" ]; then
        echo "Contenu du fichier '$path' :"
        cat "$path"
    else
        echo "Erreur : '$path' n'est pas un fichier texte."
        exit 1
    fi
fi

# Vérifier si le chemin est un répertoire
if [ -d "$path" ]; then
    echo "Contenu du répertoire '$path' :"
    # Liste uniquement les fichiers texte
    find "$path" -type f \( -iname "*.txt" -o -iname "*.js" \) -exec cat {} \;
fi
