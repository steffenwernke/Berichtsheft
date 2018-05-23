# Rechte für `ausbilder`@`localhost`

GRANT SELECT, INSERT, UPDATE, DELETE ON *.* TO 'ausbilder'@'localhost' IDENTIFIED BY PASSWORD '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257';


# Rechte für `initialisierung`@`localhost`

GRANT SELECT ON *.* TO 'initialisierung'@'localhost' IDENTIFIED BY PASSWORD '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257';


# Rechte für `teilnehmer`@`localhost`

GRANT SELECT, INSERT, UPDATE ON *.* TO 'teilnehmer'@'localhost' IDENTIFIED BY PASSWORD '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257';