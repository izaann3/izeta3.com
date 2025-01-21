<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: https://izeta3.com/index.php');
    exit();
}

$rutas = [
    '/var/www/izeta3.com/??.enc',
    '/opt/lampp/apache2/htdocs/Proyecto/??.enc'
];

$file_name = 'UN_PREVIEW.wav';

$dotenv = parse_ini_file(__DIR__ . '/.env');
$key = $dotenv['ENCRYPTION_KEY'];

$encrypted_file_path = null;

foreach ($rutas as $ruta) {
    if (file_exists($ruta)) {
        $encrypted_file_path = $ruta;
        break;
    }
}

if (!$encrypted_file_path) {
    echo "El archivo no está disponible en ninguna de las rutas especificadas.";
    exit();
}

$encrypted_data = file_get_contents($encrypted_file_path);
$iv_length = openssl_cipher_iv_length('aes-256-cbc');
$iv = substr($encrypted_data, 0, $iv_length);
$encrypted_content = substr($encrypted_data, $iv_length);

$decrypted_content = openssl_decrypt($encrypted_content, 'aes-256-cbc', $key, 0, $iv);

header('Content-Description: File Transfer');
header('Content-Type: audio/wav');
header('Content-Disposition: attachment; filename="' . $file_name . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . strlen($decrypted_content));
echo $decrypted_content;
exit();
?>

