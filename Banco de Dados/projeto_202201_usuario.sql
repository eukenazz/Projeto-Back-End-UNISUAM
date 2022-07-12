-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: projeto_202201
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `nascimento` date NOT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `nome_mãe` varchar(45) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(150) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `telefone_fixo` varchar(15) DEFAULT NULL,
  `nome_usuario` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_usuario` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','admin','1999-07-31','18050957730','admin@admin.com','mae_admin','21041020','Avenida Paris','72','UNISUAM','Bonsucesso','Rio de Janeiro','RJ','21975353226','2199999999','admin','1a14416af9ad73383c8d3824ac0e88378ddff37c','admin'),(2,'Thiago','Ramos','1999-07-31','18050957730','thiago@gmail.com','Vilma','21041020','Avenida Paris','72','UNISUAM','Bonsucesso','Rio de Janeiro','RJ','21975353226','2199999999','kenazz','9bb4f05962bf93490c3ae950f3b9f480c2e37ffd','comum'),(3,'Felipe','Guedes','1995-10-26','77777777777','felipe@gmail.com','Lúcia','20911300','Rua Leopoldo Bulhões','800','Rua 17, Quadra 21, Casa 22','Benfica','Rio de Janeiro','RJ','21777777777','2177777777','felipin','348162101fc6f7e624681b7400b085eeac6df7bd','comum'),(4,'Marcelo','Loutfi','1912-12-12','88888888888','marcelo@gmail.com','mae_marcelo','21041020','Avenida Paris','84','UNISUAM','Bonsucesso','Rio de Janeiro','RJ','21888888888','2188888888','marcelo','8cb2237d0679ca88db6464eac60da96345513964','comum'),(5,'Silvio','Eutimio','1900-01-01','55555555555','silvio@gmail.com','mae_silvio','21041020','Avenida Paris','84','UNISUAM','Bonsucesso','Rio de Janeiro','RJ','21555555555','2155555555','silvio','8cb2237d0679ca88db6464eac60da96345513964','comum'),(6,'Carol','Paixão','2006-11-13','66666666666','carol@gmail.com','Vilma','20911300','Rua Leopoldo Bulhões','800','Rua 17, Quadra 21, Casa 22','Benfica','Rio de Janeiro','RJ','66666666666','6666666666','caroles','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','comum'),(7,'Fabíola','Tomaz','1994-07-08','22222222222','fabiola@gmail.com','Cláudia','25223100','Travessa Borges Carneiro','123','Casa','Jardim Primavera','Duque de Caxias','RJ','21222222222','2122222222','fabiola','8cb2237d0679ca88db6464eac60da96345513964','comum');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-01 17:10:38
