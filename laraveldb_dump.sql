CREATE TABLE `CATEGORIA_TRANSACAO` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(255) UNIQUE NOT NULL
);

CREATE TABLE `TRANSACAO` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` integer NOT NULL,
  `id_categoria` integer,
  `tipo` tinyint(1) NOT NULL COMMENT '0 -> recebimento / 1 -> pagamento',
  `valor` double NOT NULL
);

CREATE TABLE `USUARIO` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) UNIQUE NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `email` varchar(255) UNIQUE NOT NULL,
  `senha` varchar(255) NOT NULL
);

ALTER TABLE `TRANSACAO` ADD FOREIGN KEY (`id_usuario`) REFERENCES `USUARIO` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE `TRANSACAO` ADD FOREIGN KEY (`id_categoria`) REFERENCES `CATEGORIA_TRANSACAO` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT;

ALTER TABLE `USUARIO` CHANGE `data_cadastro` `data_cadastro` DATETIME NULL DEFAULT CURRENT_TIMESTAMP;

INSERT INTO `CATEGORIA_TRANSACAO` (`id`, `nome`) VALUES
(3, 'Compras'),
(2, 'Dividendo'),
(1, 'Investimento');

INSERT INTO `USUARIO` (`id`, `nome`, `cpf`, `data_cadastro`, `email`, `senha`) VALUES
(1, 'Claudio Jorge', '70000000000', '2025-01-29 18:25:31', 'c@gmail.com', '321321'),
(2, 'Angela Matos', '70000000001', '2025-01-29 18:26:20', 'a@gmail.com', '123321'),
(3, 'Carlos Matheus', '12312312301', '2025-01-29 18:26:37', 'cm@gmail.com', '999');
COMMIT;

INSERT INTO `TRANSACAO` (`id`, `id_usuario`, `id_categoria`, `tipo`, `valor`) VALUES
(1, 1, NULL, 1, 99.99),
(2, 2, 1, 1, 1999.99),
(3, 2, 2, 0, 1.99),
(4, 3, 3, 1, 200.47),
(5, 1, NULL, 0, 200);
COMMIT;
