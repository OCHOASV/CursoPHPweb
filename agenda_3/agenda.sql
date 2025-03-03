/*
 Navicat Premium Dump SQL

 Source Server         : OCHOA
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : agenda

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 03/03/2025 20:20:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for contactos
-- ----------------------------
DROP TABLE IF EXISTS `contactos`;
CREATE TABLE `contactos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` int NOT NULL,
  `correo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contactos
-- ----------------------------
INSERT INTO `contactos` VALUES (39, 'Carlos Ochoa', 5465465, 'ochoa@gmail.com');
INSERT INTO `contactos` VALUES (40, 'Javier Andrade', 5465465, 'javi@sgfsd.com');
INSERT INTO `contactos` VALUES (41, 'Inma Perez', 5465465, 'post@sdgs.com');
INSERT INTO `contactos` VALUES (42, 'Señor POST', 54654654, 'javi@sgfsd.com');
INSERT INTO `contactos` VALUES (44, 'Señor Get', 54654654, 'get@fdgdfs.com');
INSERT INTO `contactos` VALUES (46, 'PEPE', 45464, 'xxxx');
INSERT INTO `contactos` VALUES (47, 'prueba', 54654, 'post@sdgs.com');

SET FOREIGN_KEY_CHECKS = 1;
