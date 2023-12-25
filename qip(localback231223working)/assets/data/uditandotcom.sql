-- MariaDB dump 10.19  Distrib 10.11.4-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: uditandotcom
-- ------------------------------------------------------
-- Server version	10.11.4-MariaDB-1~deb12u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES
(1,1,1,1,65829024,2.00,'2023-12-20 06:56:36');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `specs` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES
(1,'688工程车','688工程车',2.00,'/assets/img/T008/t008.png','688工程车'),
(2,'五珠陀螺','五珠陀螺',2.00,'/assets/img/T014/t014.png','五珠陀螺'),
(3,'回力坦克','回力坦克',2.00,'/assets/img/T009/t009.png','回力坦克'),
(4,'大水机','大水机',2.00,'/assets/img/T011/t011.png','大水机'),
(5,'大风车泡泡水','大风车泡泡水',2.00,'/assets/img/T015/t015.png','大风车泡泡水'),
(6,'奥特曼超人','奥特曼超人',2.00,'/assets/img/T007/t007.png','奥特曼超人'),
(7,'奥特曼面具','奥特曼面具',2.00,'/assets/img/T010/t010.png','奥特曼面具'),
(8,'小三音喇叭','小三音喇叭',2.00,'/assets/img/T013/t013.png','小三音喇叭'),
(9,'小卡包','小卡包',2.00,'/assets/img/U016/u016.png','小卡包'),
(10,'挤眼公仔球','挤眼公仔球',5.00,'/assets/img/T004/t004.png','挤眼公仔球'),
(11,'灌篮玩具','灌篮玩具',5.00,'/assets/img/T005/t005.png','灌篮玩具'),
(12,'灯光陀螺','灯光陀螺',5.00,'/assets/img/T006/t006.png','灯光陀螺'),
(13,'玩具车','玩具车',5.00,'/assets/img/T001/t001.png','玩具车'),
(14,'竹节小清新手链','竹节小清新手链',2.00,'/assets/img/D005/d005.png','竹节小清新手链'),
(15,'表情球','表情球',5.00,'/assets/img/T002/t002.png','表情球'),
(16,'趣味魔方','趣味魔方',2.00,'/assets/img/T012/t012.png','趣味魔方'),
(17,'闪光小飞毽','闪光小飞毽',2.00,'/assets/img/T016/t016.png','闪光小飞毽'),
(18,'鼓拨浪','鼓拨浪',5.00,'/assets/img/T003/t003.png','鼓拨浪'),
(19,'圆珠冰透石手链','圆珠冰透石手链',5.00,'/assets/img/D006/d006.png','圆珠冰透石手链'),
(20,'大金貔貅手链','大金貔貅手链',5.00,'/assets/img/D003/d003.png','大金貔貅手链'),
(21,'小六角片手链','小六角片手链',2.00,'/assets/img/D002/d002.png','小六角片手链'),
(22,'蝴蝶结樱桃皮筋','蝴蝶结樱桃皮筋',2.00,'/assets/img/D001/d001.png','蝴蝶结樱桃皮筋'),
(23,'502胶水','502胶水',2.00,'/assets/img/U008/u008.png','502胶水'),
(24,'五角形烟灰缸','五角形烟灰缸',5.00,'/assets/img/U006/u006.png','五角形烟灰缸'),
(25,'厚透明胶布','厚透明胶布',2.00,'/assets/img/U004/u004.png','厚透明胶布'),
(26,'吸卡水晶透明削皮刨','吸卡水晶透明削皮刨',2.00,'/assets/img/U015/u015.png','吸卡水晶透明削皮刨'),
(27,'喜庆果盘','喜庆果盘',5.00,'/assets/img/U007/u007.png','喜庆果盘'),
(28,'垃圾篓','垃圾篓',2.00,'/assets/img/U020/u020.png','垃圾篓'),
(29,'多用削皮器','多用削皮器',2.00,'/assets/img/U018/u018.png','多用削皮器'),
(30,'多色线','多色线',2.00,'/assets/img/U019/u019.png','多色线'),
(31,'大海绵洗碗百洁布','大海绵洗碗百洁布',2.00,'/assets/img/U002/u002.png','大海绵洗碗百洁布'),
(32,'大胶带','大胶带',2.00,'/assets/img/U005/u005.png','大胶带'),
(33,'小夜灯','小夜灯',5.00,'/assets/img/U010/u010.png','小夜灯'),
(34,'拖地花露水','拖地花露水',5.00,'/assets/img/U001/u001.png','拖地花露水'),
(35,'新款万能胶','新款万能胶',2.00,'/assets/img/U013/u013.png','新款万能胶'),
(36,'申花液体鞋油','申花液体鞋油',5.00,'/assets/img/U012/u012.png','申花液体鞋油'),
(37,'皮卷尺','皮卷尺',2.00,'/assets/img/U011/u011.png','皮卷尺'),
(38,'纳米纤维清洁球','纳米纤维清洁球',2.00,'/assets/img/U014/u014.png','纳米纤维清洁球'),
(39,'铝箔胶','铝箔胶',2.00,'/assets/img/U003/u003.png','铝箔胶'),
(40,'长条大号磨刀器','长条大号磨刀器',5.00,'/assets/img/U017/u017.png','长条大号磨刀器');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'u1','1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-20 23:58:32
