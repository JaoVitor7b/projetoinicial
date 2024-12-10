-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para escola
CREATE DATABASE IF NOT EXISTS `escola` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `escola`;

-- Copiando estrutura para tabela escola.avisos
CREATE TABLE IF NOT EXISTS `avisos` (
  `idaviso` int(11) NOT NULL AUTO_INCREMENT,
  `aviso` varchar(100) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `horario` varchar(100) DEFAULT NULL,
  `descricao` longtext DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idaviso`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.avisos: ~4 rows (aproximadamente)
INSERT INTO `avisos` (`idaviso`, `aviso`, `dia`, `horario`, `descricao`, `foto`) VALUES
	(2, 'Interclasse', '2024-12-17', '09:00:00', 'Prepare-se para uma experiência inesquecível de competição, amizade e muita energia! O Interclasse 2024 está chegando, e esta é a sua chance de brilhar e mostrar o espírito de equipe. Este evento reúne todas as turmas da escola em um festival esportivo repleto de jogos emocionantes, trabalho em equipe e uma pitada de rivalidade saudável.', 'MariaSantana(2).png'),
	(3, 'Natal na Escola', '2024-12-25', '07:00:00', 'Entre no espírito natalino e venha celebrar conosco o Natal Encantado, um evento especial preparado com muito carinho para alunos, professores, familiares e toda a comunidade escolar!\r\n\r\nO Natal na nossa escola será repleto de magia, união e alegria, com atividades que prometem emocionar e envolver todos os presentes.', 'MariaSantana(2).png'),
	(4, 'Formatura Ensino Médio', '2024-12-13', '19:00:00', 'Com grande alegria, a Escola Estadual Professora Maria Santana de Almeida convida todos para a cerimônia de formatura da Turma do Ensino Médio 2024. Este é um momento especial de celebração e reconhecimento pelo esforço, dedicação e conquistas dos nossos formandos.\r\n\r\nA formatura marca o encerramento de uma importante etapa na vida de nossos alunos e o início de novas jornadas. Junte-se a nós para homenagear aqueles que, com muito empenho, escreveram uma história de aprendizado e superação em nossa escola.', 'MariaSantana(2).png'),
	(5, 'Conselho de Classe', '2024-12-17', '08:30:00', 'O Conselho de Classe é um momento de reflexão e avaliação sobre o desempenho acadêmico e comportamental dos alunos, reunindo professores, coordenadores e a direção da escola. Durante essa reunião, serão discutidos os avanços, as dificuldades enfrentadas pelos alunos e as estratégias de acompanhamento para o próximo período letivo.', 'MariaSantana(2).png');

-- Copiando estrutura para tabela escola.banner
CREATE TABLE IF NOT EXISTS `banner` (
  `idbanner` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idbanner`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.banner: ~3 rows (aproximadamente)
INSERT INTO `banner` (`idbanner`, `foto`) VALUES
	(1, 'ImagemdoWhatsAppde2024-11-06à(s)08.35.05_733ed340.jpg'),
	(3, 'ImagemdoWhatsAppde2024-11-06à(s)08.35.15_aac6ce6a.jpg'),
	(4, 'ImagemdoWhatsAppde2024-11-06à(s)08.35.17_a89b8a11.jpg');

-- Copiando estrutura para tabela escola.carousel
CREATE TABLE IF NOT EXISTS `carousel` (
  `idcarousel` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcarousel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.carousel: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela escola.eixo
CREATE TABLE IF NOT EXISTS `eixo` (
  `ideixo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ideixo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.eixo: ~4 rows (aproximadamente)
INSERT INTO `eixo` (`ideixo`, `nome`, `foto`) VALUES
	(1, 'Diretoria', 'Capturadetela2024-10-14201733.png'),
	(2, 'Ciências da Natureza', 'Designsemnome.png'),
	(3, 'Ciências Humanas', 'WhatsAppImage2024-10-15at17.39.08.jpeg'),
	(4, 'Coordenação', 'Designsemnome.png'),
	(5, 'Secretaria', 'WhatsAppImage2024-10-15at17.39.08.jpeg');

-- Copiando estrutura para tabela escola.escola
CREATE TABLE IF NOT EXISTS `escola` (
  `idescola` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `fundacao` date DEFAULT NULL,
  `descricao1` longtext DEFAULT NULL,
  `descricao2` longtext DEFAULT NULL,
  `descricao3` longtext DEFAULT NULL,
  `descricao4` longtext DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idescola`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.escola: ~0 rows (aproximadamente)
INSERT INTO `escola` (`idescola`, `nome`, `fundacao`, `descricao1`, `descricao2`, `descricao3`, `descricao4`, `foto`) VALUES
	(1, 'E.E Prof.ª Maria Santana de Almeida', '1980-11-26', 'Assembleia Legislativa do Estado de São Paulo', ' Projeto de Lei nº70, de 1980:\r\n\r\n \r\n\r\n    Dá denominação de “Profa. Maria Santana de Almeida” à Escola Estadual de 1.o e 2.o Graus de Sete Barras. \r\n\r\n      A Assembleia Legislativa do Estado de São Paulo decreta: \r\n\r\n       Artigo 1.o - Possa a denominar-se “Profa Maria Santana de Almeida” a Escola Estadual de 1.o e 2.o Graus de Sete barras. \r\n\r\n       Artigo 2.o - Esta lei entrará em vigor na data se sua publicação. ', '            Justificativa:\r\n\r\n    A professora Maria Santana de Almeida, foi, em vida, um exemplo cabal de abnegação, objetividade e desprendimento, no trato diário com gerações de alunos e centenas de colegas e funcionários, que auferiram seus corretos ensinamentos, se beneficiaram de seus sábios conselhos e superaram com suas práticas e bondosa orientação. \r\n\r\n       Em todo o transcorrer de sua vida profissional, pautou seu trabalho, quer como mestra quer como diretora por essa qualidade o que granjeou a admiração, o respeito e a amizade de todos os que tiveram a felicidade de com ela conviver. \r\n\r\n        Sete Barras, cidade e município a que dedicou a doce e ilustre extinta sua esplendida atuação de mestra e mentora, deplorou seu falecimento com unânime sentimento de sincera tristeza. E tendo por porta-voz seu digno prefeito. Antonio Xavier de Oliveira pleiteia desta augusta Casa de Leis o apoio à homenagem merecida que intenciona lhe prestar. ', ' De tal mérito diz bem o “curriculum vitae” da insigne professora, que apresentamos a seguir: \r\n\r\n Portadora de Diploma conferido pela Liga de Defesa Nacional pela participação na 35,a corrida do Fogo Simbólico \r\n\r\nPortadora do Título de Cidadã Setebarrense, conferido pela Câmara Municipal de Sete Barras, através do Decreto Legislativo n.o 01-72, de 7 de outubro de 1972, pelos relevantes serviços prestados ao município. \r\n\r\n      Com tal currículo e tão grande soma de serviços prestado à coletividade paulista, temos certeza de que esta Assembleia Legislativa se associará, de corpo e alma, à homenagem com que as autoridades e povo de Sete Barras procuram demonstrar seus sentimentos de póstuma gratidão aquele que em vida, deu tudo de si pela boa formação moral e intelectual dos alunos que lhe foram confiados, acima e além do dever. ', 'ImagemdoWhatsAppde2024-11-06à(s)08.35.05_733ed340.jpg');

-- Copiando estrutura para tabela escola.funcionarios
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `idfuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `funcionario` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `descricao` longtext DEFAULT NULL,
  `ideixo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idfuncionario`),
  KEY `funcionarios` (`ideixo`),
  CONSTRAINT `funcionarios` FOREIGN KEY (`ideixo`) REFERENCES `eixo` (`ideixo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.funcionarios: ~11 rows (aproximadamente)
INSERT INTO `funcionarios` (`idfuncionario`, `funcionario`, `foto`, `cargo`, `descricao`, `ideixo`) VALUES
	(1, 'Bruna França', 'ImagemdoWhatsAppde2024-11-23à(s)16.39.14_c2181b80.jpg', 'Professora Artes', 'Olá, meu nome é Bruna França, sou professora de Arte na Escola Estadual Maria Santana de Almeida .Tenho formação em Artes Visuais, Pedagogia e Letras, além de pós-graduação em Educação Especial e Neuropsicopedagogia, áreas que refletem minha paixão pela educação e pela expressão artística. Além do trabalho na escola, dedico parte do meu tempo a um hobby que amo: as terapias holísticas, um universo que me proporciona equilíbrio e bem-estar.', 3),
	(3, 'Wagner luiz', 'WhatsAppImage2024-11-28at12.57.26.jpeg', 'Professor / Letras', 'Graduado na área de linguagem e humanas.Ler, cozinhar, treinar e correr são meus hobbys, sou Pai e amante de viajar ', 3),
	(4, 'Rosinete de França Ribeiro ', 'WhatsAppImage2024-11-28at13.10.37.jpeg', 'Coordenadora do Ensino Fundamental', '47 anos, nascimento 25/01/1977 filha de Benedito Pascoal de França e Ieda Anália de França. Sou mãe de Andressa Rafaela de França.Nasci em Pariquera Açu SP.Sou formada em Ciência Biológicas.Sou professora efetiva dessa escola desde 2013 e atuo como Coordenadora Pedagógica.  ', 4),
	(5, 'Luiza Maia', 'WhatsAppImage2024-11-28at13.12.46.jpeg', 'Professora Tecnologia e Química', 'Olá, meu nome é Luiza Maia, sou professora de Física, Química, Biologia e Tecnologa e Robótica/Inovação na Escola Estadual Maria Santana de Almeida .Tenho formação em Física além de ser pós-graduanda em Metodologias para o Ensino de Física e Biologia.Sou apaixonada pelas áreas da Física de Partículas e Física Médica, na qual dediquei parte da minha formação para realização de pesquisas, de participar de programas educacionais com bolsa CAPES, como PIBID e Residência Pedagógica.Além do trabalho na escola, sou uma nerd incurável, apaixonada por Harry Potter, Star Wars e séries como The Big Bang Theory.', 2),
	(6, 'Valeria Fernanda Ferreira Takeshita', 'WhatsAppImage2024-11-28at13.34.27.jpeg', 'Professora Matemática e Educação Financeira ', 'Meu nome é Valeria Fernanda Ferreira Takeshita, tenho 45 anos, minha formação é Administração Bacharel, iniciei na área de educação por um acaso do destino e me encontrei lecionando.Acredito no poder transformador da educação, meu hobby é ler livros e principalmente a bíblia sou cristã e amo estuda-la.', 2),
	(7, 'Alex Ribeiro de Jesus', 'WhatsAppImage2024-11-28at13.42.51.jpeg', 'Coordenador Curso Técnico Agronegócio / Professor de Biologia e Agronomia   ', 'Alex Ribeiro de Jesus\r\nProfessor, Engenheiro Agrônomo e Biólogo\r\n\r\nSou Alex, professor com 48 anos de idade e uma paixão enorme por ensinar. Graduado em Ciências Biológicas e Agronomia, acredito que a educação vai muito além do conteúdo: é sobre empatia, respeito e construir juntos um ambiente acolhedor e inclusivo.\r\n\r\nGosto de conectar minhas experiências na Biologia e na Agronomia com o cotidiano dos alunos, tornando o aprendizado significativo e próximo da realidade deles. Fora da sala de aula, sou alguém simples, que adora relaxar assistindo televisão e recarregar as energias para novos desafios.\r\n\r\nMinha maior missão? Fazer a diferença na vida das pessoas por meio da educação e do respeito às suas individualidades', 4),
	(8, 'Débora', 'WhatsAppImage2024-11-28at13.34.42.jpeg', 'Professor Artes e Letras ', 'Professora de língua portuguesa e arte com especialidade em música. Formada em jornalismo', 3),
	(10, 'Ruth Yoko Kawaguchi Rosa', 'WhatsAppImage2024-11-28at15.48.03.jpeg', 'Vice-Diretora ', 'Meu nome é Ruth Yoko Kawaguchi Rosa, sou professora de Biologia e estou na vice-direção da Escola Estadual Profª Maria Santana de Almeida. Sou formada em Licenciatura em Ciências Biológicas pela UFPR, Pedagogia pela UFMT e Universidade Tokai (Japão) e tenho especialização em Psicopedagogia pelo SENAC. Trabalho na área da educação há 20 anos, sendo parte deste período em escola particular com Ensino Infantil, Fundamental e Médio, e em escola pública com Ensino Fundamental, Médio e Gestão Escolar. Tenho como hobby o cuidado com plantas e animais de estimação, além de fazer caminhadas e trilhas ou outras atividades que envolvam o contato com a natureza.', 1),
	(11, ' Geralda Souza Gomes Felix', 'WhatsAppImage2024-11-28at15.07.09.jpeg', 'Agente Organização Escolar', 'Meu nome é Geralda Souza Gomes Felix, sou formada em Magistério e curso Técnico de Secretaria Escolar , trabalho na Escola Professora  Maria Santana de Almeida  como Agente de Organização Escolar na Secretaria a   31 anos.', 5),
	(12, 'Suzana Cristina Landim Aguiar ', 'WhatsAppImage2024-11-28at15.46.35.jpeg', 'Professora de Artes  ', 'Formação pedagogia pós graduação psicologia com ênfase em arte segunda graduação arte terceira de aprendizagem, alfabetização e letramento.  39 anos.Ficar com a família. ', 3),
	(13, 'Wander Ferreira Pinto', 'D63F5920-00BF-44F1-86CD-4441EAD678A1.jpeg', 'Professor de Educação Física', 'Wander Ferreira Pinto 50 anos Licenciatura plena em Educação Física e história Apaixonado em praticar esportes e adoro assistir filmes', 3);

-- Copiando estrutura para tabela escola.galeria
CREATE TABLE IF NOT EXISTS `galeria` (
  `idgaleria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idgaleria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.galeria: ~4 rows (aproximadamente)
INSERT INTO `galeria` (`idgaleria`, `nome`, `foto`) VALUES
	(1, 'Cozinha', 'ImagemdoWhatsAppde2024-11-06à(s)08.35.07_100f75c4.jpg'),
	(2, 'PROTEC', 'ImagemdoWhatsAppde2024-11-06à(s)08.35.18_7034621a.jpg'),
	(3, 'Coordenação do Técnco', 'ImagemdoWhatsAppde2024-11-06à(s)08.35.13_add3c7e9.jpg'),
	(4, 'Quadra', 'ImagemdoWhatsAppde2024-11-06à(s)08.35.09_c18dcc29.jpg');

-- Copiando estrutura para tabela escola.patrono
CREATE TABLE IF NOT EXISTS `patrono` (
  `idpatrono` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `falecimento` date DEFAULT NULL,
  `descricao1` longtext DEFAULT NULL,
  `descricao2` longtext DEFAULT NULL,
  `descricao3` longtext DEFAULT NULL,
  `descricao4` longtext DEFAULT NULL,
  `descricao5` longtext DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idpatrono`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.patrono: ~0 rows (aproximadamente)
INSERT INTO `patrono` (`idpatrono`, `nome`, `nascimento`, `falecimento`, `descricao1`, `descricao2`, `descricao3`, `descricao4`, `descricao5`, `foto`) VALUES
	(1, 'Maria Santana de Almeida', '1909-09-21', '1978-11-20', ' CURRICULUM VITAE   DA PROFESSORA \r\n\r\n                 MARIA SANTANA DE ALMEIDA ', 'Nascimento – 21 de setembro de 1909 \r\n\r\nLocal – Botucatu – SP \r\n\r\nFiliação - Pai – Heitor Santana \r\n\r\nMãe - Rosa Lippel Santana  \r\n\r\nCasada com o Sr. Diogo Américo de Almeida (falecido). \r\n\r\n \r\n\r\nProfessora da Escola Mista do Bairro Primeiro ilha, em Sete Barras. ', 'Professora designada da Escola do Bairro Francisco Manuel; \r\n\r\n \r\n\r\n   Nomeada, por concurso, Diretoria do Grupo Escolar Plácido de Paula e Silva, de Sete Barras. \r\n\r\n   Colaborou com a Campanha contra a Gripe Asiática na aplicação de injeções e distribuição de medicamento à população de Sete Barras, no ano de 1957; \r\n\r\n    Representou a Legião Brasileira de Assistência em Sete Barras, no período de junho de 1959, colaborando na solução de problemas assistência; \r\n\r\n   Nomeada para cargo de Comissária de Menores em Sete Barras, através da   Portaria nº 19, de 20 de maio de 1958, do Juízo de   Direitos da Comarca de Registro; ', 'Presidente da Comissão Municipal do MOBRAL de Sete Barras; \r\n\r\n   Portadora de Medalha de Ouro, conferida pela Câmara Municipal de São Paulo; ', 'Portadora de diploma de Honra ao Mérito-do Ministério de Educação e Cultura, pela participação na Comissão Municipal do MOBRAL; \r\n\r\n     Portadora de Diploma de Honra ao Mérito da Prefeitura Municipal de Sete Barras, pela colaboração prestada na fundação da Biblioteca Pública Municipal;  ', 'IMG-20240528-WA0037.jpg');

-- Copiando estrutura para tabela escola.sobre
CREATE TABLE IF NOT EXISTS `sobre` (
  `idsobre` int(11) NOT NULL AUTO_INCREMENT,
  `descricao1` longtext DEFAULT NULL,
  `descricao2` longtext DEFAULT NULL,
  `descricao3` longtext DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `localizacao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idsobre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.sobre: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela escola.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.usuarios: ~0 rows (aproximadamente)
INSERT INTO `usuarios` (`idusuario`, `nome`, `senha`, `email`, `foto`) VALUES
	(6, 'Joao Vitor', '12345', 'joao@gmail.com', 'Capturadetela2024-10-14201733.png'),
	(7, 'Yris Thalita', '12345', 'yris@gmail.com', 'Designsemnome.png');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
