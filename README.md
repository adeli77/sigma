REQUERIMIENTOS DE INSTALACIÓN
EL requerimiento mínimo es contar con PHP 5.4.0 o superior

INSTALACIÓN
Instalar vía git


Puede acceder a la aplicación a través de la siguiente URL:

CONFIGURACIÓN
Conexión a una Base de datos
Edite el archivo config/db.php con la configuración del servidor:

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=modulo',
    'username' => 'usuario',
    'password' => '123456',
    'charset' => 'utf8',
];"# MESSAGE" 
"# sigma" 