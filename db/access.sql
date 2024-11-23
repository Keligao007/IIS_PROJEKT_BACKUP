-- Give access
GRANT ALL PRIVILEGES ON xgerge02.* TO 'xgrecn00'@'localhost';
GRANT ALL PRIVILEGES ON xgerge02.* TO 'xbaumg01'@'localhost';
FLUSH PRIVILEGES;

-- Revoke  access
REVOKE ALL PRIVILEGES ON xgerge02.* FROM 'other_username'@'hostname';
FLUSH PRIVILEGES;
