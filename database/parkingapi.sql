/*
 Navicat Premium Data Transfer

 Source Server         : localhost 7.4
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : parkingapi

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 05/12/2022 13:46:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for parking_blocks
-- ----------------------------
DROP TABLE IF EXISTS `parking_blocks`;
CREATE TABLE `parking_blocks`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `quota` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parking_blocks
-- ----------------------------
INSERT INTO `parking_blocks` VALUES (1, 'A', 5, '2022-07-09 15:49:28', '2022-07-09 15:49:32');
INSERT INTO `parking_blocks` VALUES (2, 'B', 5, '2022-07-09 15:49:50', '2022-07-09 15:49:46');
INSERT INTO `parking_blocks` VALUES (3, 'C', 5, '2022-07-09 15:50:04', '2022-07-09 15:50:07');

-- ----------------------------
-- Table structure for parking_vehicles
-- ----------------------------
DROP TABLE IF EXISTS `parking_vehicles`;
CREATE TABLE `parking_vehicles`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `police_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `block` int NULL DEFAULT NULL,
  `status` int NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `block_FK`(`block`) USING BTREE,
  CONSTRAINT `block_FK` FOREIGN KEY (`block`) REFERENCES `parking_blocks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parking_vehicles
-- ----------------------------
INSERT INTO `parking_vehicles` VALUES (1, 'W5955BM', NULL, 0, '2022-07-09 09:31:16', '2022-12-05 06:22:29');
INSERT INTO `parking_vehicles` VALUES (2, 'W5915BM', NULL, 0, '2022-07-09 09:31:16', '2022-07-10 00:26:53');
INSERT INTO `parking_vehicles` VALUES (3, 'S1342WW', 1, 1, '2022-07-09 09:31:16', '2022-07-09 09:31:16');
INSERT INTO `parking_vehicles` VALUES (4, 'W1111SK', 1, 1, '2022-07-09 09:31:16', '2022-07-09 09:31:16');
INSERT INTO `parking_vehicles` VALUES (5, 'L5551KL', 2, 1, '2022-07-09 09:31:16', '2022-07-09 09:31:16');
INSERT INTO `parking_vehicles` VALUES (6, 'S5623PK', 2, 1, '2022-07-09 09:31:16', '2022-07-09 09:31:16');
INSERT INTO `parking_vehicles` VALUES (7, 'W1412BM', 3, 1, '2022-07-09 09:31:16', '2022-07-09 09:31:16');
INSERT INTO `parking_vehicles` VALUES (8, 'W4532BM', 3, 1, '2022-07-09 09:31:16', '2022-07-09 09:31:16');
INSERT INTO `parking_vehicles` VALUES (9, 'L3254KL', 3, 1, '2022-07-09 09:31:16', '2022-07-09 09:31:16');
INSERT INTO `parking_vehicles` VALUES (10, 'S1342KK', 1, 1, '2022-07-09 10:08:46', '2022-07-09 10:08:46');
INSERT INTO `parking_vehicles` VALUES (11, 'S1312KL', 2, 1, '2022-07-09 10:12:28', '2022-07-09 13:51:34');
INSERT INTO `parking_vehicles` VALUES (12, 'S1235KL', 1, 1, '2022-07-10 00:21:32', '2022-07-10 00:21:32');
INSERT INTO `parking_vehicles` VALUES (13, 'L9718CK', 2, 1, '2022-07-10 00:21:45', '2022-07-10 00:21:45');
INSERT INTO `parking_vehicles` VALUES (14, 'S9921KK', 2, 1, '2022-07-10 00:27:32', '2022-07-10 00:27:32');

SET FOREIGN_KEY_CHECKS = 1;
