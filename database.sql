CREATE DATABASE  IF NOT EXISTS `moviehub` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `moviehub`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: moviehub
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `length` varchar(10) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `trailer` varchar(200) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (1,'The Fall Guy','2h 5m','The Fall Guy é um filme de suspense de ação centrado em um dublê aposentado que volta à ativa para ajudar uma estrela de cinema em apuros. Quando um ator famoso desaparece durante a produção de um filme, o dublê é chamado para investigar e acaba se envolvendo em uma teia perigosa de crimes e intrigas. Com habilidades impressionantes e uma determinação feroz, ele arrisca tudo para salvar o ator e desmascarar os responsáveis por trás do desaparecimento.','b5cd8e7caffb3640161f34215b1ef406a3b399388b41c61ee5d5afdd7b35fd8650b0a873451f1673864071aa8aa22096b8c0.jpeg','https://www.youtube.com/embed/j7jPnwVGdZ8?si=6DL5xz4olJyvUvc7',17,'comedy'),(2,'IF','1h 44m','IF é um filme mágico e inspirador que leva o público em uma viagem através da imaginação e dos sonhos. Dirigido por John Krasinski, o filme é uma combinação de fantasia e realidade que explora a capacidade de sonhar e a importância de acreditar no impossível.','80cf64070e813f08031c0bcd0f44121c8932415adc5ad9351d6ab6782cafddae39fce1ece55c046d810b68e7eed70fe72c86.jpeg','https://www.youtube.com/embed/ss2KvK-w6w8?si=dD_opUvL1MG4dqnf',17,'comedy'),(4,'Garfield ','1h 41m','Garfield é uma comédia animada baseada na famosa tira de quadrinhos criada por Jim Davis. O filme traz à vida o adorável e preguiçoso gato laranja, Garfield, e suas aventuras com seu dono Jon Arbuckle e o atrapalhado cão Odie.','71af827e1f765eca08979715fc4f53e166665394311afd97ee9806c01064569f6d0ac7822a20c43a5cd1b115a83c9913124e.jpeg','https://www.youtube.com/embed/IeFWNtMo1Fs?si=y3Xri_MQe9uiGxpO',17,'comedy'),(9,'The Watchers','1h 42m','The Watchers é um filme de terror sobrenatural de 2024 dirigido por Ishana Night Shyamalan, baseado no romance de A.M. Shine. A história segue Mina, uma artista de 28 anos que fica presa em uma floresta vasta e intocada no oeste da Irlanda. Depois de encontrar abrigo, ela se vê presa com três estranhos, sendo observados e perseguidos por criaturas misteriosas a cada noite.','7d615c9d2ff993400a5d68d0dd2b2d01817d64d84b3a97165e208f8b2a65c2d1c1e0bef419dc3d755a0ab81ee3a0f98b8e69.jpeg','https://www.youtube.com/embed/dYo91Fq9tKY?si=95vl_OFLcWcRJD6x',21,'horror'),(10,'The Black Demon ','1h 40m','O Demônio Negro é um thriller de terror que mergulha nas profundezas do desconhecido. A trama gira em torno de um grupo de pesquisadores marinhos que embarcam em uma missão para explorar uma região inexplorada do oceano. Durante a expedição, eles descobrem uma antiga criatura mítica, conhecida como \"O Demônio Negro\", uma entidade temida por sua fúria e poder devastador.','120d629b68dda1398ad00f5fa40ce062fa77e74a32ad0fe4deb83aadd5d38f6adcc0e17e93800030c63a4aa4854715a261a3.jpeg','https://www.youtube.com/embed/7eeRTWPWIK0?si=33Ix3OPfFAX4n5X1',21,'horror'),(11,'5 Nights at Freeddy','1h 50m','Five Nights at Freddy\'s é um filme de terror baseado na popular série de jogos de mesmo nome. O trailer apresenta a história de um segurança noturno, Mike Schmidt, que começa a trabalhar no restaurante familiar Freddy Fazbear\'s Pizza. O local, conhecido por seus animatrônicos animados que entretêm as crianças durante o dia, esconde um segredo sinistro.','bc073bebef7662962c1f45013dda0c51dbde625a00e2c327e7f88238c3703c9052d4ddff47d713bff9d9a9d4dda8ba47bb30.jpeg','https://www.youtube.com/embed/f-zqS2CiZqw?si=oW7xe2R6NBwkWOVE',21,'horror'),(12,'Kingdom of the Apes','2h 25m','Kingdom of the Apes é um épico de ficção científica que explora a ascensão de uma civilização avançada de primatas após a queda da humanidade. Em um futuro distópico, a Terra é dominada por espécies de macacos inteligentes que evoluíram para formar suas próprias sociedades complexas e organizadas.','c63f6da613b6dfd8f0c029f3db758deb37b2bab780fa32b9312a7802ac63c1882c35ba9f19ca95f836d0ecddf3cf6a1a8389.jpeg','https://www.youtube.com/embed/XtFI7SNtVpY?si=uHP4nDMg3OyL97IH',22,'sci-fi'),(13,'Godzilla x Kong','1h 55m','Godzilla x Kong: The New Empire é uma sequência épica que reúne os dois titãs mais icônicos do cinema em uma batalha de proporções colossais. Após os eventos devastadores de seu último confronto, Godzilla e Kong são forçados a se unir contra uma nova ameaça que põe em risco a própria existência da Terra.','0a7c45d6efdbfa9f1049b7e58b8225b5803d3b270962b08aa321916e1fb3ccdbf7baa67baaf05812b2b621a2002148abbe97.jpeg','https://www.youtube.com/embed/lV1OOlGwExM?si=seqLyoK2Ogz2N7zl',23,'sci-fi'),(14,'Duna','2h 35m','Duna é uma épica saga de ficção científica baseada no clássico romance de Frank Herbert. A história se passa em um futuro distante onde poderosos impérios intergalácticos lutam pelo controle do planeta deserto Arrakis, também conhecido como Duna. Arrakis é a única fonte de uma substância extremamente valiosa chamada melange, ou \"especiaria\", que é essencial para a viagem espacial, prolonga a vida e expande a consciência.','b42a85ebfdbe2fc63acdb5ad0389842702fffe1d891f33083139939a499d5703c22802b0d1312f0a4589d2955491df48c6b9.jpeg','https://www.youtube.com/embed/n9xhJrPXop4?si=vs8qQee8-3j7peGN',24,'sci-fi');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `movie_id` (`movie_id`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `review_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (4,9,'Filmes de terror com temática infantil sempre é sinitro.',17,11,'2024-07-27 08:28:12','2024-07-29 14:37:15'),(6,10,'Vi com minha familia e amei! Porém só os mais novos entenderam de onde vieram os personagens kkkkk',21,11,'2024-07-27 11:32:22','2024-07-27 14:32:22'),(11,9,'Duna é um filme bem produzido, com uma cinematografia impressionante e uma trilha sonora forte. A adaptação do material original foi feita de maneira fiel. Gostei do que vi.',17,14,'2024-07-29 14:49:24','2024-07-29 17:49:24'),(12,7,'Godzilla x Kong é um filme divertido com ótimas cenas de ação e efeitos visuais impressionantes. A trama é simples e direta, mas cumpre bem o seu papel.',17,13,'2024-07-29 14:49:54','2024-07-29 17:49:54'),(13,4,'Kingdom of the Apes tem uma premissa interessante, mas a execução deixa a desejar.  A narrativa é fraca e os personagens são pouco desenvolvidos. Os efeitos visuais não conseguem compensar os problemas do roteiro.',17,12,'2024-07-29 14:50:32','2024-07-29 17:50:49'),(15,5,'The Watchers oferece uma premissa intrigante, mas a execução fica aquém das expectativas. A narrativa é inconsistente e os personagens não são memoráveis. É um filme mediano, com alguns momentos interessantes.',17,9,'2024-07-29 14:51:45','2024-07-29 17:51:45'),(16,8,'Garfield 2024 é uma agradável surpresa. Com humor leve e personagens carismáticos, o filme consegue entreter tanto crianças quanto adultos. A animação é bem feita e a história é envolvente. Gostei bastante.',17,4,'2024-07-29 14:52:48','2024-07-29 17:52:48'),(17,9,'Se 2024 é uma obra cativante com uma trama bem construída e personagens envolventes. A narrativa é original e oferece uma reflexão profunda, mantendo o público interessado do início ao fim. É um filme que realmente vale a pena assistir.',17,2,'2024-07-29 14:53:35','2024-07-29 17:53:35'),(19,9,'Duna é visualmente deslumbrante, com um design de produção que realmente dá vida ao universo de Herbert. A trilha sonora de Zimmer é intensa e as atuações, especialmente de Timothée Chalamet, são notáveis. Uma adaptação que respeita e amplifica a complexidade do livro.',22,14,'2024-07-29 14:55:57','2024-07-29 17:55:57'),(21,9,'Godzilla x Kong é pura diversão com monstros gigantes! Como pode monstros tão grandes existirem????',23,13,'2024-07-29 14:56:56','2024-07-29 18:03:31'),(22,7,'Kingdom of the Apes é um filme divertido com uma boa premissa, mas a execução poderia ser melhor. É uma experiência razoável, com alguns momentos interessantes.',23,12,'2024-07-29 14:57:34','2024-07-29 17:57:37'),(23,3,'The Watchers é fraco. A história é confusa e os personagens são chatos.',25,9,'2024-07-29 14:58:54','2024-07-29 17:58:54'),(24,10,'Garfield é simplesmente perfeito. Divertido, bem feito e encantador do início ao fim.',26,4,'2024-07-29 14:59:46','2024-07-29 17:59:46'),(25,0,'IF é tão ruim que dá vontade de perguntar se foi feito de propósito.',27,2,'2024-07-29 15:00:41','2024-07-29 18:00:41'),(26,6,'Acabei dormindo de tédio, mas as crianças gostaram.',28,4,'2024-07-29 15:01:27','2024-07-29 18:01:27');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) DEFAULT NULL,
  `l_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `bio` mediumtext DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (17,'José','Cláudio','teste@gmail.com','$2y$10$ILg5tvId6FPxPrLpUBiYeuc/OuGZPAbWHVzPnEG.sIEhjHz5Kab6u','Desenvolvedor deste site ???.','473821c3163adcf8df450f8c07b28bf15d8d33a2a624e3ac748eaed662f52ccb2b4b83222d386006fe6db8cde671d3501d8c55b1f7d5584854379207','96a5619c6904880cd7f82ae6667f26122696a668b2b0b5099e9eba9288b14446f035e2ba440edc4fa320a07453ec8963caf0a5ee6d018c4956e30e43.png'),(21,'Leticia','Gomes','teste2@gmail.com','$2y$10$iSsKr8/PaXAUKlfscuFn0egmC1zfn1Ww0.tLeG8qhQ/S5GTYvPTW6','','2e0159bcc6b9048ca969a192b06e5b7fd449b9a04a76900dc955391aa1dac57b5d12a3c84b0f389c37486471174895acb4b0e245d1f0d746ece2f114',NULL),(22,'Pedro','Alves','teste3@gmail.com','$2y$10$CxEhoz2NGBWBwBdC6.YccOW0d2YoAqnalnESs9TfOSWLisp4VEG9a','','f52cee97b2f6be22002afe5ee57480b9f8637b564961c3b20f85a682533b36105f655b3ab569766cb470cd642c9ab818fe3bb90cf0df92f0f604aebe',NULL),(23,'Enzo','Azevedo','teste4@gmail.com','$2y$10$brKF4dR4LR.lPcV1pcbl8.sjArpz5B6jQ1TF3wXSx.3UyiJfU7gnO','','592e60ae179f27c181566545456bffbcbbd77df3a465e983455a849c0e9f436e32ab93200d8c74a946b86ffed0ef9b2112ca751ce56f664f67c0dc93',NULL),(24,'as','as','teste5@gmail.com','$2y$10$H6kwDCONGNdlDab8EHG1meWdtFG64cDB1nzyBFjI.c0U1/DC.xecG',NULL,'35f31279f316fb134a4e0d9128613a234a23737c23b9ed1f6400b89d1606ad0d7a8fff248151748d556f405f08a7da284915eb28b645b28920f39562',NULL),(25,'Giovana','Brito','teste6@gmail.com','$2y$10$NhksvdEHNX8kiGhvcQwg2.ptXKzkJI9dLQfK2uTeDdRBptLb0/wjS',NULL,'67f293a607e8381f5d632f85d5873569553c857070ba18668da468804d57cb4d6415470edf237e48c24d31abaa07d0bf7db925e1f80e695cdae22282',NULL),(26,'Barbara','Santos','teste7@gmail.com','$2y$10$d6jNTABMfiAcOM58BrV6JuPmeWmj0tD9MCzjZ4ogu4QgitxE1JBBe',NULL,'89bc4bb27f8f6364793bbd263989ad84059bc3230194189c91b62f134a176bd9100551bcc358b1ed6ab18b576c5fa05dccfb359ee74ffa9c455dfb6a',NULL),(27,'Debora','Schmit','teste8@gmail.com','$2y$10$I2DV/2o6BZRdShoe8oZH5eCTih2WjKtGsyq5fz.N1oU7/IQaO5/za',NULL,'0e24d7bfc1cccd63976f9a31fd777f51df6c2a49c18fc5c462b62edf70b0bbce9c67ffc09244f8d8748987a50b2f265daa0f58ff938633331a0ca5b1',NULL),(28,'Ricardo','Almeida','teste9@gmail.com','$2y$10$CHKrG.uP53.LqHfyatLT2.NYpVoncVmgx5zZgLBBoIjXyXRpf1CPa',NULL,'ce8cc4a9e04d50dc563d90dbc7f381a551a3797328fd7158d8ef3062ba23aaf37b1bdc1a14e57c4cbfe916f908a5f23c8f02daf318f7cacf836b7972',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'moviehub'
--

--
-- Dumping routines for database 'moviehub'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-29 15:06:09
