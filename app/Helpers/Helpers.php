<?php

# Função para upload de imagem
if (! function_exists('upload_img')) {
    /**
     * @param $file
     * @param $folder
     * @param string $name
     * @return string
     */
    function upload_img($file, $folder, $name = 'img-upload')
    {
        # *************************** #
        #     Configuração da func.   #
        # *************************** #

        $arquivo = $file;
        $local = $folder;

        # *************************** #
        #     Realização do upload    #
        # *************************** #

        $finalF = $name . time() . '-pf.' . $arquivo->getClientOriginalExtension();
        $arquivo->move($local, $finalF);

        # *************************** #
        #     Retorno o resultado     #
        # *************************** #
        return $image = "/" . $local . "/" . $finalF;
    }
}