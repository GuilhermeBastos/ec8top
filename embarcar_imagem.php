<?php
/*
Atribua o caminho de seu arquivo a uma vari�vel usando a linha de c�digo abaixo.
Substitua a string dentro das aspas pelo caminho para sua imagem no servidor Web.
*/
$nome="04";
$image=$nome.".png";
//$image="01.png";

/*
Extraia os dados de seu arquivo para uma vari�vel. O uso da tag 'rb' informa que deve ser lido como bin�rio.
Adicione as linhas de c�digo a seguir em seu arquivo.
*/
$data = fopen ($image, 'rb'); 
$size=filesize ($image);
$contents= fread ($data, $size);
fclose ($data);

/*
Codifique o conte�do de seu arquivo, agora armazenado na vari�vel $contents.
Insira a linha de c�digo a seguir e sua imagem ser� uma string bin�ria, armazenada na vari�vel $encoded.
Agora voc� pode salvar essa string em um banco de dados para facilitar o armazenamento, passar a vari�vel para edi��o ou exibi-la.
*/

//encoded= imagem codificada
$encoded= base64_encode($contents);
$ln= str_replace("\\","\\\\",$encoded);
$ln= str_replace("\"","\\\"",$ln);
$ln= str_replace("%","%%",$ln);

//para testar descomente as proximas 2 linhas 
//header("Content-Type: image/jpeg");
//echo $contents;
//-----------------------------------------

//desencoded= imagem descodificada
//$desencoded= base64_decode($encoded);

echo "<textarea style='width:100%;height:100%;scroll'>";
echo "int img".$nome."(char *b, size_t s){\n";
echo "\n";
echo "    //buffer que conter� o texto\n";
echo "    char buffer[TAMBUFF];\n";
echo "    buffer[0] = '\\x0';\n";
echo "\n";
echo "    //codigo binario embarcado da imagem\n";
echo "    strncpy(buffer,\n";
echo "\"".trim($ln)."\"\n";
echo "	,sizeof(buffer));\n";
echo "\n";
echo "	strncat(b, buffer, s);  \n";
echo "    //retorna sucesso\n";
echo "    return 1;\n";
echo "}\n";
echo "</textarea>";
