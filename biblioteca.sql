-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: biblioteca
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
-- Table structure for table `arquivo`
--

DROP TABLE IF EXISTS `arquivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arquivo` (
  `idarquivo` int NOT NULL AUTO_INCREMENT,
  `pdf` varchar(75) DEFAULT NULL,
  `idlivro` int DEFAULT NULL,
  `download` int DEFAULT NULL,
  PRIMARY KEY (`idarquivo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `emprestimos`
--

DROP TABLE IF EXISTS `emprestimos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emprestimos` (
  `IDEmprestimo` int NOT NULL AUTO_INCREMENT,
  `IDUtente` int DEFAULT NULL,
  `IDLivro` int DEFAULT NULL,
  `DataEmprestimo` varchar(15) DEFAULT NULL,
  `DataDevolucaoPrevista` varchar(15) DEFAULT NULL,
  `EstadoLivroEmprestimo` varchar(255) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `utente` varchar(425) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `enderco` varchar(425) DEFAULT NULL,
  PRIMARY KEY (`IDEmprestimo`),
  KEY `IDUtente` (`IDUtente`),
  KEY `IDLivro` (`IDLivro`),
  CONSTRAINT `emprestimos_ibfk_1` FOREIGN KEY (`IDUtente`) REFERENCES `utentes` (`IDUtente`),
  CONSTRAINT `emprestimos_ibfk_2` FOREIGN KEY (`IDLivro`) REFERENCES `livros` (`IDLivro`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fornecedores` (
  `IDFornecedor` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `Contato` varchar(255) DEFAULT NULL,
  `Endereco` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDFornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionarios` (
  `IDFuncionario` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `Cargo` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `Senha` varchar(255) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Foto` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`IDFuncionario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `livros`
--

DROP TABLE IF EXISTS `livros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livros` (
  `IDLivro` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `file` varchar(45) DEFAULT NULL,
  `ano_lancamento` varchar(45) DEFAULT NULL,
  `prateleira` varchar(45) DEFAULT NULL,
  `editora` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IDLivro`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `relatorios`
--

DROP TABLE IF EXISTS `relatorios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `relatorios` (
  `IDRelatorio` int NOT NULL AUTO_INCREMENT,
  `TipoRelatorio` varchar(255) DEFAULT NULL,
  `ConteudoRelatorio` text,
  `DataRelatorio` date DEFAULT NULL,
  PRIMARY KEY (`IDRelatorio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sugestoes`
--

DROP TABLE IF EXISTS `sugestoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sugestoes` (
  `IDSugestao` int NOT NULL AUTO_INCREMENT,
  `IDUtente` int DEFAULT NULL,
  `DataSugestao` date DEFAULT NULL,
  `DescricaoSugestao` text,
  `download` int DEFAULT NULL,
  PRIMARY KEY (`IDSugestao`),
  KEY `IDUtente` (`IDUtente`),
  CONSTRAINT `sugestoes_ibfk_1` FOREIGN KEY (`IDUtente`) REFERENCES `utentes` (`IDUtente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `utentes`
--

DROP TABLE IF EXISTS `utentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utentes` (
  `IDUtente` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `TipoUtente` varchar(255) DEFAULT NULL,
  `Matricula` varchar(255) DEFAULT NULL,
  `OutrosDetalhes` text,
  PRIMARY KEY (`IDUtente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-01 15:06:05
