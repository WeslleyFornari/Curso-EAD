/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 8.0.33 : Database - escola_perpetuo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`escola_perpetuo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `escola_perpetuo`;

/*Table structure for table `aulas` */

DROP TABLE IF EXISTS `aulas`;

CREATE TABLE `aulas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` int DEFAULT NULL,
  `modulo_id` bigint unsigned NOT NULL,
  `ordem` int NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ativo','inativo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aulas_modulo_id_foreign` (`modulo_id`),
  CONSTRAINT `aulas_modulo_id_foreign` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `aulas` */

insert  into `aulas`(`id`,`empresa_id`,`modulo_id`,`ordem`,`titulo`,`link`,`status`,`created_at`,`updated_at`,`deleted_at`) values 
(91,4,91,0,'Basico','ZCyWm4ZaFlQ','ativo','2024-09-18 01:19:21','2024-09-18 01:19:21',NULL),
(92,4,92,0,'CSS','HtVRRHoASes','ativo','2024-09-18 01:19:21','2024-09-18 01:19:21',NULL),
(93,4,92,1,'HTML','n_Etdr7Dbjs','ativo','2024-09-18 01:19:21','2024-09-18 01:19:21',NULL),
(94,4,93,0,NULL,NULL,'ativo','2024-09-20 15:47:59','2024-09-20 15:49:05','2024-09-20 15:49:05'),
(95,4,94,0,NULL,NULL,'ativo','2024-09-20 15:48:45','2024-09-20 15:48:45',NULL),
(96,4,95,0,NULL,NULL,'ativo','2024-09-20 15:49:05','2024-09-20 15:49:05',NULL),
(97,4,96,0,NULL,NULL,'ativo','2024-09-20 15:52:57','2024-09-20 15:52:57',NULL),
(98,4,97,0,NULL,NULL,'ativo','2024-09-20 15:53:48','2024-09-20 15:53:48',NULL),
(99,4,98,0,NULL,NULL,'ativo','2024-09-20 15:54:23','2024-09-20 15:54:23',NULL),
(100,4,99,0,NULL,NULL,'ativo','2024-09-20 16:00:35','2024-09-20 16:00:35',NULL),
(101,4,100,0,NULL,NULL,'ativo','2024-09-20 16:05:07','2024-09-20 16:05:07',NULL),
(102,4,101,0,NULL,NULL,'ativo','2024-09-20 16:05:47','2024-09-20 16:05:47',NULL),
(103,4,102,0,NULL,NULL,'ativo','2024-09-20 16:06:31','2024-09-20 16:06:31',NULL);

/*Table structure for table `cursos` */

DROP TABLE IF EXISTS `cursos`;

CREATE TABLE `cursos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` int DEFAULT NULL,
  `trilha_id` bigint unsigned NOT NULL,
  `ordem` int NOT NULL,
  `media_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ativo','inativo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cursos_trilha_id_foreign` (`trilha_id`),
  CONSTRAINT `cursos_trilha_id_foreign` FOREIGN KEY (`trilha_id`) REFERENCES `trilhas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cursos` */

insert  into `cursos`(`id`,`empresa_id`,`trilha_id`,`ordem`,`media_id`,`titulo`,`slug`,`descricao`,`status`,`created_at`,`updated_at`,`deleted_at`) values 
(14,4,1,0,'3','Iniciante','comese-sua-jornada','Começe sua jornada básica','ativo','2024-09-13 11:57:55','2024-09-18 12:42:13',NULL),
(15,4,1,1,'2','Intemediario','vamos-avancar','Vamos avançar no conceito aprendido','ativo','2024-09-13 16:44:52','2024-09-18 12:42:13',NULL),
(16,4,1,2,'4','Avançado','hora-de-dominar','Hora de dominar a ferramenta','ativo','2024-09-13 16:48:57','2024-09-18 12:42:13',NULL),
(17,4,1,6,'5','Dicas de Estudo','aprenda-a-gerenciar','Aprenda a gerenciar seu tempo','ativo','2024-09-14 17:13:03','2024-09-18 12:42:13',NULL),
(18,4,1,7,'6','Teste seu Conhecimento','avaliacao-aprendeu','Avaliação do que você aprendeu','ativo','2024-09-14 17:20:13','2024-09-18 12:42:13',NULL),
(21,4,6,8,'8','PHP','php','Conhecimentos básicos','ativo','2024-09-20 15:47:55','2024-09-20 15:49:05',NULL),
(22,4,6,9,'7','Laravel','laravel','Conheça a Frameword','ativo','2024-09-20 15:48:41','2024-09-20 15:48:45',NULL),
(23,4,5,10,'9','Html','html','Principios','ativo','2024-09-20 15:52:30','2024-09-20 15:52:57',NULL),
(24,4,5,11,'11','Css','css','Estilos','ativo','2024-09-20 15:53:22','2024-09-20 15:53:48',NULL),
(25,4,5,12,'12','Java Script','java-script','Aprimoramento','ativo','2024-09-20 15:54:20','2024-09-20 15:54:23',NULL),
(26,4,2,13,'13','Comportamento','comportamento','Dicas','ativo','2024-09-20 16:00:32','2024-09-20 16:00:35',NULL),
(27,4,3,14,'14','Iniciante','iniciante','Inicie sua carreira','ativo','2024-09-20 16:05:03','2024-09-20 16:05:07',NULL),
(28,4,3,15,'15','Intermediario','intermediario','Começe sua jornada básica','ativo','2024-09-20 16:05:43','2024-09-20 16:05:47',NULL),
(29,4,3,16,'16','Expert','expert','Seja fera no assunto','ativo','2024-09-20 16:06:27','2024-09-20 16:06:31',NULL);

/*Table structure for table `dados_pessoais` */

DROP TABLE IF EXISTS `dados_pessoais`;

CREATE TABLE `dados_pessoais` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profissao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `complemento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dados_pessoais_user_id_foreign` (`user_id`),
  CONSTRAINT `dados_pessoais_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dados_pessoais` */

insert  into `dados_pessoais`(`id`,`user_id`,`avatar`,`profissao`,`nascimento`,`sexo`,`cpf`,`telefone`,`celular`,`cep`,`endereco`,`numero`,`complemento`,`bairro`,`cidade`,`estado`,`pais`,`created_at`,`updated_at`,`deleted_at`) values 
(1,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-08-13 17:58:26','2024-08-13 17:58:26',NULL),
(2,9,'img/avatar/1726235363_Malu.PNG','Atendente','2024-08-22','feminino','266.605.778-07','(34) 44444-4442','(33) 33333-3332','12311-256','Rua Pedro Laet Lapinha',233,'xxxxxxxxxxx','Jardim Crystal Park 2','Jacareí','SP','Brasil','2024-08-13 18:05:10','2024-09-13 13:49:23',NULL),
(3,11,'img/avatar/1723832795_Depoimentos01.PNG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-08-16 18:25:42','2024-08-16 18:26:35',NULL);

/*Table structure for table `empresas` */

DROP TABLE IF EXISTS `empresas`;

CREATE TABLE `empresas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsavel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnpj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `complemento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ativo','inativo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `empresas` */

insert  into `empresas`(`id`,`nome`,`responsavel`,`cpf`,`cnpj`,`telefone_1`,`telefone_2`,`cep`,`endereco`,`numero`,`complemento`,`bairro`,`cidade`,`estado`,`pais`,`status`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Dvelopers','Rafael','555.555.555-77','01.002.003/0001-80','(12)3933-8000','(12)98738-9900',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ativo',NULL,NULL,NULL),
(4,'JJ. Morgan da Silva Ferreira 5','Weslley Fornari 5','266.605.778-07','23.423.423/4233-35','(21) 21131-2315','(23) 24234-2342','12311-210','Avenida do Cristal',233,'sadasd','Parque Califórnia','Jacareí','SP','Brasil','ativo','2024-08-07 14:15:18','2024-08-08 02:02:24',NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `media` */

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folder_parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `media_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `media` */

insert  into `media`(`id`,`empresa_id`,`file`,`type`,`alt`,`folder_parent`,`folder`,`created_at`,`updated_at`) values 
(2,4,'1726246021-intermediario.PNG','PNG',NULL,NULL,'uploads/','2024-09-13 16:47:01','2024-09-13 16:47:01'),
(3,4,'1726246047-iniciante.PNG','PNG',NULL,NULL,'uploads/','2024-09-13 16:47:27','2024-09-13 16:47:27'),
(4,4,'1726331683-avancado.PNG','PNG',NULL,NULL,'uploads/','2024-09-14 16:34:43','2024-09-14 16:34:43'),
(5,4,'1726334005-dicas.PNG','PNG',NULL,NULL,'uploads/','2024-09-14 17:13:25','2024-09-14 17:13:25'),
(6,4,'1726334376-teste.PNG','PNG',NULL,NULL,'uploads/','2024-09-14 17:19:36','2024-09-14 17:19:36'),
(7,4,'1726847315-laravel.PNG','PNG',NULL,NULL,'uploads/','2024-09-20 15:48:35','2024-09-20 15:48:35'),
(8,4,'1726847339-php.PNG','PNG',NULL,NULL,'uploads/','2024-09-20 15:48:59','2024-09-20 15:48:59'),
(9,4,'1726847543-html.PNG','PNG',NULL,NULL,'uploads/','2024-09-20 15:52:23','2024-09-20 15:52:23'),
(10,4,'1726847543-laravel.PNG','PNG',NULL,NULL,'uploads/','2024-09-20 15:52:23','2024-09-20 15:52:23'),
(11,4,'1726847621-css.PNG','PNG',NULL,NULL,'uploads/','2024-09-20 15:53:41','2024-09-20 15:53:41'),
(12,4,'1726847654-js.PNG','PNG',NULL,NULL,'uploads/','2024-09-20 15:54:14','2024-09-20 15:54:14'),
(13,4,'1726848028-entrevista.PNG','PNG',NULL,NULL,'uploads/','2024-09-20 16:00:28','2024-09-20 16:00:28'),
(14,4,'1726848299-java1.PNG','PNG',NULL,NULL,'uploads/','2024-09-20 16:04:59','2024-09-20 16:04:59'),
(15,4,'1726848338-java2.PNG','PNG',NULL,NULL,'uploads/','2024-09-20 16:05:38','2024-09-20 16:05:38'),
(16,4,'1726848381-java3.PNG','PNG',NULL,NULL,'uploads/','2024-09-20 16:06:21','2024-09-20 16:06:21');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'0001_01_01_000001_create_cache_table',1),
(2,'2014_10_12_000000_create_users_table',1),
(3,'2014_10_12_100000_create_password_reset_tokens_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2019_12_14_000001_create_personal_access_tokens_table',1),
(6,'2024_01_00_55555_create_empresas_table',2),
(7,'2024_03_23_143017_create_media_table',2),
(8,'2014_10_12_000003_create_users_table',3),
(9,'2024_01_00_555553_create_empresas_table',3),
(10,'2024_03_23_1430173_create_media_table',3),
(11,'2024_08_08_130515_create_dados_pessoais_table',4),
(12,'2024_08_13_143725_create_perfils_table',5),
(13,'2024_08_13_171126_create_rede_socials_table',5),
(14,'2024_08_21_133252_create_trilhas_table',6),
(15,'2024_08_21_141842_create_modulos_table',6),
(16,'2024_08_21_144537_create_cursos_table',6),
(17,'2024_08_21_144841_create_aulas_table',6),
(18,'2024_08_21_144538_create_cursos_table',7),
(19,'2024_08_21_141843_create_modulos_table',8),
(20,'2024_08_21_144842_create_aulas_table',9),
(21,'2024_03_23_1430174_create_media_table',10),
(22,'2024_08_21_144539_create_cursos_table',10),
(23,'2024_08_21_144844_create_modulos_table',10),
(24,'2024_08_21_144845_create_aulas_table',10),
(25,'2024_09_10_213226_create_sessions_table',11),
(26,'2024_09_19_143152_create_planos_table',11),
(27,'2024_09_19_171953_create_plano__cursos_table',12),
(28,'2024_09_19_172623_create_user__planos_table',13);

/*Table structure for table `modulos` */

DROP TABLE IF EXISTS `modulos`;

CREATE TABLE `modulos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` int DEFAULT NULL,
  `curso_id` bigint unsigned NOT NULL,
  `ordem` int NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ativo','inativo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `modulos_curso_id_foreign` (`curso_id`),
  CONSTRAINT `modulos_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `modulos` */

insert  into `modulos`(`id`,`empresa_id`,`curso_id`,`ordem`,`titulo`,`status`,`created_at`,`updated_at`,`deleted_at`) values 
(91,4,14,0,'JAVA','ativo','2024-09-18 01:19:21','2024-09-18 01:19:21',NULL),
(92,4,14,1,'Visão Geral','ativo','2024-09-18 01:19:21','2024-09-18 01:19:21',NULL),
(93,4,21,0,NULL,'ativo','2024-09-20 15:47:59','2024-09-20 15:49:05','2024-09-20 15:49:05'),
(94,4,22,0,NULL,'ativo','2024-09-20 15:48:45','2024-09-20 15:48:45',NULL),
(95,4,21,0,NULL,'ativo','2024-09-20 15:49:05','2024-09-20 15:49:05',NULL),
(96,4,23,0,NULL,'ativo','2024-09-20 15:52:57','2024-09-20 15:52:57',NULL),
(97,4,24,0,NULL,'ativo','2024-09-20 15:53:48','2024-09-20 15:53:48',NULL),
(98,4,25,0,NULL,'ativo','2024-09-20 15:54:23','2024-09-20 15:54:23',NULL),
(99,4,26,0,NULL,'ativo','2024-09-20 16:00:35','2024-09-20 16:00:35',NULL),
(100,4,27,0,NULL,'ativo','2024-09-20 16:05:07','2024-09-20 16:05:07',NULL),
(101,4,28,0,NULL,'ativo','2024-09-20 16:05:47','2024-09-20 16:05:47',NULL),
(102,4,29,0,NULL,'ativo','2024-09-20 16:06:31','2024-09-20 16:06:31',NULL);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `perfils` */

DROP TABLE IF EXISTS `perfils`;

CREATE TABLE `perfils` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `academico` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experiencia` longtext COLLATE utf8mb4_unicode_ci,
  `habilidades` longtext COLLATE utf8mb4_unicode_ci,
  `hobby` longtext COLLATE utf8mb4_unicode_ci,
  `interesse` longtext COLLATE utf8mb4_unicode_ci,
  `aprender` longtext COLLATE utf8mb4_unicode_ci,
  `contrato` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perfils_user_id_foreign` (`user_id`),
  CONSTRAINT `perfils_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `perfils` */

insert  into `perfils`(`id`,`user_id`,`academico`,`experiencia`,`habilidades`,`hobby`,`interesse`,`aprender`,`contrato`,`created_at`,`updated_at`,`deleted_at`) values 
(1,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-08-13 17:58:26','2024-08-13 17:58:26',NULL),
(2,9,'superior_incompleto','Tecnico em informatica  22','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.','e majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.','re Latin words, consectetur, from a Lorem Ipsum passage, and going through th','ctures, to generate Lorem Ipsum which looks reasonable. T','contratar','2024-08-13 18:05:10','2024-09-11 16:48:49',NULL),
(3,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-08-16 18:25:42','2024-08-16 18:25:42',NULL);

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `plano__cursos` */

DROP TABLE IF EXISTS `plano__cursos`;

CREATE TABLE `plano__cursos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `plano_id` int NOT NULL,
  `curso_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `plano__cursos` */

insert  into `plano__cursos`(`id`,`plano_id`,`curso_id`,`created_at`,`updated_at`) values 
(16,9,14,'2024-09-23 16:57:56','2024-09-23 16:57:56'),
(17,9,15,'2024-09-23 16:57:56','2024-09-23 16:57:56'),
(18,9,23,'2024-09-23 16:57:56','2024-09-23 16:57:56'),
(19,9,27,'2024-09-23 16:57:56','2024-09-23 16:57:56'),
(20,9,28,'2024-09-23 16:57:56','2024-09-23 16:57:56'),
(21,9,21,'2024-09-23 16:57:56','2024-09-23 16:57:56'),
(22,9,26,'2024-09-23 16:57:56','2024-09-23 16:57:56'),
(31,10,14,'2024-09-23 17:04:10','2024-09-23 17:04:10'),
(32,10,15,'2024-09-23 17:04:10','2024-09-23 17:04:10'),
(33,10,16,'2024-09-23 17:04:10','2024-09-23 17:04:10'),
(34,10,23,'2024-09-23 17:04:10','2024-09-23 17:04:10'),
(35,10,24,'2024-09-23 17:04:10','2024-09-23 17:04:10'),
(36,10,21,'2024-09-23 17:04:10','2024-09-23 17:04:10'),
(37,10,22,'2024-09-23 17:04:10','2024-09-23 17:04:10'),
(38,10,26,'2024-09-23 17:04:10','2024-09-23 17:04:10'),
(39,11,14,'2024-09-23 17:05:29','2024-09-23 17:05:29'),
(40,11,15,'2024-09-23 17:05:29','2024-09-23 17:05:29'),
(41,11,16,'2024-09-23 17:05:29','2024-09-23 17:05:29'),
(42,11,17,'2024-09-23 17:05:29','2024-09-23 17:05:29'),
(43,11,18,'2024-09-23 17:05:29','2024-09-23 17:05:29'),
(44,11,23,'2024-09-23 17:05:29','2024-09-23 17:05:29'),
(45,11,24,'2024-09-23 17:05:29','2024-09-23 17:05:29'),
(46,11,25,'2024-09-23 17:05:29','2024-09-23 17:05:29'),
(47,11,27,'2024-09-23 17:05:29','2024-09-23 17:05:29'),
(48,11,28,'2024-09-23 17:05:29','2024-09-23 17:05:29'),
(49,11,29,'2024-09-23 17:05:29','2024-09-23 17:05:29'),
(50,11,21,'2024-09-23 17:05:29','2024-09-23 17:05:29'),
(51,11,22,'2024-09-23 17:05:29','2024-09-23 17:05:29'),
(52,11,26,'2024-09-23 17:05:29','2024-09-23 17:05:29'),
(53,8,14,'2024-09-23 17:05:46','2024-09-23 17:05:46'),
(54,8,27,'2024-09-23 17:05:46','2024-09-23 17:05:46'),
(55,8,26,'2024-09-23 17:05:46','2024-09-23 17:05:46');

/*Table structure for table `planos` */

DROP TABLE IF EXISTS `planos`;

CREATE TABLE `planos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` int NOT NULL,
  `media_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordem` int NOT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ativo','inativo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `planos` */

insert  into `planos`(`id`,`empresa_id`,`media_id`,`name`,`ordem`,`preco`,`descricao`,`link`,`status`,`created_at`,`updated_at`,`deleted_at`) values 
(8,4,NULL,'Plano Básico',1,39.90,'Inicie seu aprendizado','asaas','ativo','2024-09-23 16:55:42','2024-09-23 17:05:46',NULL),
(9,4,2,'Plano Intermediario',2,59.90,'Tenha acesso a vários cursos','pagbank','ativo','2024-09-23 16:57:40','2024-09-23 16:57:56',NULL),
(10,4,4,'Plano Avançado',3,99.90,'Plano perfeito para você','asaas','ativo','2024-09-23 17:03:20','2024-09-23 17:04:10',NULL),
(11,4,13,'Plano Completo',4,129.90,'Tenha acesso a todo o conteudo','pagbank','ativo','2024-09-23 17:05:15','2024-09-23 17:05:29',NULL);

/*Table structure for table `rede_socials` */

DROP TABLE IF EXISTS `rede_socials`;

CREATE TABLE `rede_socials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rede_socials_user_id_foreign` (`user_id`),
  CONSTRAINT `rede_socials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `rede_socials` */

insert  into `rede_socials`(`id`,`user_id`,`facebook`,`twitter`,`linkedin`,`youtube`,`instagram`,`pinterest`,`website`,`created_at`,`updated_at`,`deleted_at`) values 
(1,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-08-13 17:58:26','2024-08-13 17:58:26',NULL),
(2,9,'weslleyfornari02','@weslleyf02','weslleyfornari123','xxxxxxxxxxxxxx','iiiiiiiiiiiiiiiiiiiii','bbbbbbb','aaaaaaaaaaaaaaaaaaaaaaa','2024-08-13 18:05:10','2024-09-11 16:52:42',NULL),
(3,11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-08-16 18:25:42','2024-08-16 18:25:42',NULL);

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

/*Table structure for table `trilhas` */

DROP TABLE IF EXISTS `trilhas`;

CREATE TABLE `trilhas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordem` bigint DEFAULT NULL,
  `status` enum('ativo','inativo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `trilhas` */

insert  into `trilhas`(`id`,`empresa_id`,`name`,`ordem`,`status`,`created_at`,`updated_at`,`deleted_at`) values 
(1,4,'Aprenda CSharp - C#',1,'ativo','2024-08-22 16:51:07','2024-09-17 20:13:53',NULL),
(2,4,'Dicas antes de uma entrevista',6,'ativo','2024-08-22 17:17:35','2024-09-17 20:13:53',NULL),
(3,4,'JAVA Expert',4,'ativo','2024-08-22 17:17:57','2024-09-17 20:13:53',NULL),
(4,4,'Caminhos sólidos para um bom emprego',3,'ativo','2024-08-22 17:51:01','2024-09-20 16:02:05','2024-09-20 16:02:05'),
(5,4,'Front-end na prática',2,'ativo','2024-08-22 17:51:03','2024-09-17 20:13:53',NULL),
(6,4,'BackEnd com PHP',5,'ativo','2024-08-26 22:28:56','2024-09-17 20:13:53',NULL);

/*Table structure for table `user__planos` */

DROP TABLE IF EXISTS `user__planos`;

CREATE TABLE `user__planos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `plano_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user__planos` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('master','admin','user','cliente') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cliente',
  `status` enum('ativo','inativo') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ativo',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`empresa_id`,`name`,`email`,`role`,`status`,`password`,`email_verified_at`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,1,'MAster','Admin@admin.com','master','ativo','$2y$10$73mmZFK67gvUqiy7MzxY.udUBFFG1OQ37s888KF3OX2mYZmZJf8e2',NULL,NULL,NULL,NULL,NULL),
(8,4,'Fulano da Sillva','fulano123@terra.com.br','cliente','ativo','$2y$10$qUiHJUV01hq.Xt6/FrSn7OqhDJ1VNhU1Z4sOjNAV26MHyt8K/VAPm',NULL,NULL,'2024-08-13 17:58:26','2024-08-13 17:58:26',NULL),
(9,4,'Maria Luisa Nunes 2','malu123@gmail.com','cliente','ativo','$2y$10$73mmZFK67gvUqiy7MzxY.udUBFFG1OQ37s888KF3OX2mYZmZJf8e2',NULL,NULL,'2024-08-13 18:05:10','2024-09-13 13:49:40',NULL),
(10,4,'Weslley Foanri','weslleyfornari@gmail.com','admin','ativo','$2y$10$73mmZFK67gvUqiy7MzxY.udUBFFG1OQ37s888KF3OX2mYZmZJf8e2',NULL,NULL,NULL,NULL,NULL),
(11,4,'Nilza Maria Amato','nilzafornari@gmail.com','user','ativo','$2y$10$uGo9FuEVUMFiydsq8KnBoevLlBceATHjoeb2pMNOgw4ap.22h34t.',NULL,NULL,'2024-08-16 18:25:42','2024-08-16 18:25:42',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
