/*
 Navicat Premium Data Transfer

 Source Server         : mySQL
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : dbepos

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 03/03/2025 06:27:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth_group_role
-- ----------------------------
DROP TABLE IF EXISTS `auth_group_role`;
CREATE TABLE `auth_group_role`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `usergroup_id` bigint NULL DEFAULT NULL,
  `controller` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `method` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `info` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `status` smallint NULL DEFAULT 1,
  `created` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 334 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of auth_group_role
-- ----------------------------
INSERT INTO `auth_group_role` VALUES (1, 1, 'Group_menu', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (2, 1, 'Group_menu', 'insert', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (3, 1, 'Group_menu', 'getDataMenu', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (4, 1, 'Change_pass', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (5, 1, 'Change_pass', 'update', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (6, 1, 'Group', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (7, 1, 'Group', 'insert', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (8, 1, 'Group', 'update', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (9, 1, 'Group', 'delete', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (10, 1, 'Group', 'getData', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (11, 1, 'Home', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (12, 1, 'Group_menu', 'update', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (13, 1, 'Group_menu', 'delete', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (14, 1, 'Group_menu', 'getMenu', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (15, 1, 'Menu', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (16, 1, 'Menu', 'insert', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (17, 1, 'Menu', 'update', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (18, 1, 'Menu', 'delete', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (19, 1, 'Menu', 'getData', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (20, 1, 'Level', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (21, 1, 'Level', 'insert', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (22, 1, 'Level', 'update', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (23, 1, 'Level', 'delete', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (24, 1, 'Level', 'getData', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (25, 1, 'User', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (26, 1, 'User', 'insert', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (27, 1, 'User', 'update', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (28, 1, 'User', 'delete', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (29, 1, 'User', 'getData', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (30, 1, 'User', 'getUsergroup', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (31, 1, 'User', 'getUserlevel', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (32, 1, 'User', 'getDataUser', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (38, 1, 'M_company', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (39, 1, 'M_company', 'insert', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (40, 1, 'M_company', 'update', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (41, 1, 'M_company', 'delete', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (42, 1, 'M_company', 'getData', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (49, 1, 'M_airport', 'getAirport', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (50, 1, 'User', 'getCreatedby', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (51, 1, 'User', 'getuserbyId', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (52, 1, 'M_store', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (53, 1, 'M_store', 'insert', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (54, 1, 'M_store', 'update', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (55, 1, 'M_store', 'delete', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (56, 1, 'M_store', 'getData', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (57, 1, 'M_store', 'getStore', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (58, 1, 'M_company', 'getBranch', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (59, 1, 'M_company', 'getRegion', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (60, 1, 'Api_ap', 'ap_post_api', '', 1, '2025-02-16 11:07:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (61, 1, 'Api_ap', 'ap_login', '', 1, '2025-02-16 11:07:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (62, 1, 'Api_ap', 'ap_get_store', '', 1, '2025-02-16 11:07:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (63, 3, 'Home', 'index', '', 1, '2025-02-23 22:38:08', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (64, 3, 'Change_pass', 'index', '', 1, '2025-02-23 22:38:15', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (65, 3, 'Change_pass', 'update', '', 1, '2025-02-23 22:38:15', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (66, 4, 'Home', 'index', '', 1, '2025-02-23 22:38:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (67, 4, 'Change_pass', 'index', '', 1, '2025-02-23 22:38:35', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (68, 4, 'Change_pass', 'update', '', 1, '2025-02-23 22:38:35', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (69, 2, 'Home', 'index', '', 1, '2025-02-23 22:38:45', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (70, 2, 'Change_pass', 'index', '', 1, '2025-02-23 22:38:54', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (71, 2, 'Change_pass', 'update', '', 1, '2025-02-23 22:38:54', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (72, 5, 'Home', 'index', '', 1, '2025-02-23 22:39:06', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (73, 5, 'Change_pass', 'index', '', 1, '2025-02-23 22:39:12', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (74, 5, 'Change_pass', 'update', '', 1, '2025-02-23 22:39:12', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (153, 3, 'Customer', 'getData', '', 1, '2025-02-26 14:56:23', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (154, 3, 'Customer_form', 'index', '', 1, '2025-02-26 14:56:23', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (155, 3, 'Customer_form', 'generate_code', '', 1, '2025-02-26 14:56:23', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (156, 3, 'Customer_form', 'insert', '', 1, '2025-02-26 14:56:23', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (157, 3, 'Customer_form', 'update', '', 1, '2025-02-26 14:56:23', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (158, 3, 'Customer_form', 'delete', '', 1, '2025-02-26 14:56:23', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (162, 3, 'M_customer_type', 'index', '', 1, '2025-02-26 21:01:50', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (163, 3, 'M_customer_type', 'insert', '', 1, '2025-02-26 21:01:50', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (164, 3, 'M_customer_type', 'update', '', 1, '2025-02-26 21:01:50', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (165, 3, 'M_customer_type', 'delete', '', 1, '2025-02-26 21:01:50', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (166, 3, 'M_customer_type', 'getData', '', 1, '2025-02-26 21:01:50', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (167, 3, 'M_customer_type', 'getType', '', 1, '2025-02-26 21:01:50', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (168, 3, 'M_customer_data', 'index', '', 1, '2025-02-26 21:02:04', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (169, 3, 'M_customer_data', 'insert', '', 1, '2025-02-26 21:02:04', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (170, 3, 'M_customer_data', 'update', '', 1, '2025-02-26 21:02:04', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (171, 3, 'M_customer_data', 'delete', '', 1, '2025-02-26 21:02:04', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (172, 3, 'M_customer_data', 'getData', '', 1, '2025-02-26 21:02:04', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (173, 3, 'M_customer_data', 'getIdentitas', '', 1, '2025-02-26 21:02:04', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (174, 3, 'M_customer_work', 'index', '', 1, '2025-02-26 21:02:18', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (175, 3, 'M_customer_work', 'insert', '', 1, '2025-02-26 21:02:18', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (176, 3, 'M_customer_work', 'update', '', 1, '2025-02-26 21:02:18', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (177, 3, 'M_customer_work', 'delete', '', 1, '2025-02-26 21:02:18', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (178, 3, 'M_customer_work', 'getData', '', 1, '2025-02-26 21:02:18', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (179, 3, 'M_customer_work', 'getWork', '', 1, '2025-02-26 21:02:18', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (180, 3, 'Customer', 'index', '', 1, '2025-02-27 04:41:07', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (181, 3, 'Customer_form', 'add_image', '', 1, '2025-02-27 04:41:07', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (182, 3, 'M_store', 'getStoreTrx', '', 1, '2025-02-27 09:25:50', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (210, 3, 'Transaction_buysell', 'index', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (211, 3, 'Transaction_buysell', 'generate_code_temp', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (212, 3, 'Transaction_buysell', 'generate_code_confirm', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (213, 3, 'Transaction_buysell', 'insert_header', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (214, 3, 'Transaction_buysell', 'update_header', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (215, 3, 'Transaction_buysell', 'insert_detail', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (216, 3, 'Transaction_buysell', 'delete_detail', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (217, 3, 'Transaction_buysell', 'show_header', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (218, 3, 'Transaction_buysell', 'show_detail', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (219, 3, 'Transaction_buysell', 'show_customer', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (220, 3, 'Transaction_buysell', 'getstockbyid', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (221, 3, 'Transaction_buysell', 'getratebyid', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (222, 3, 'Transaction_buysell', 'getshowid', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (223, 3, 'Transaction_buysell', 'confirm_task', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (224, 3, 'Transaction_buysell', 'cancel_task', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (225, 3, 'Transaction_buysell_list', 'index', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (226, 3, 'Transaction_buysell_list', 'getData', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (227, 3, 'Transaction_buysell_show', 'index', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (228, 3, 'Transaction_buysell_show', 'getshowid', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (229, 3, 'Transaction_buysell_show', 'show_header', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (230, 3, 'Transaction_buysell_show', 'show_detail', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (231, 3, 'Transaction_buysell_show', 'cancel_trx', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (232, 3, 'Transaction_buysell_show', 'generateRandomString', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (233, 3, 'Transaction_buysell_show', 'printdotmatrix', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (234, 3, 'Transaction_buysell_show', 'printpdf', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (235, 3, 'Transaction_buysell_task', 'index', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (236, 3, 'Transaction_buysell_task', 'getData', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (237, 3, 'M_valas', 'index', '', 1, '2025-02-27 16:28:57', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (238, 3, 'M_valas', 'insert', '', 1, '2025-02-27 16:28:57', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (239, 3, 'M_valas', 'update', '', 1, '2025-02-27 16:28:57', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (240, 3, 'M_valas', 'delete', '', 1, '2025-02-27 16:28:57', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (241, 3, 'M_valas', 'getData', '', 1, '2025-02-27 16:28:57', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (242, 3, 'M_valas', 'getvalasbyid', '', 1, '2025-02-27 16:28:57', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (243, 3, 'M_valas', 'getValas', '', 1, '2025-02-27 16:28:57', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (244, 3, 'M_valas', 'getValasTrx', '', 1, '2025-02-27 16:28:57', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (245, 3, 'Dttot', 'index', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (246, 3, 'Dttot', 'insert', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (247, 3, 'Dttot', 'update', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (248, 3, 'Dttot', 'delete', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (249, 3, 'Dttot', 'getData', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (250, 3, 'M_airport', 'index', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (251, 3, 'M_airport', 'insert', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (252, 3, 'M_airport', 'update', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (253, 3, 'M_airport', 'delete', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (254, 3, 'M_airport', 'getData', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (255, 3, 'M_airport', 'getAirport', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (256, 3, 'M_customer_list', 'index', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (257, 3, 'M_customer_list', 'getData', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (258, 3, 'M_customer_list', 'excel', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (259, 3, 'M_nationality', 'index', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (260, 3, 'M_nationality', 'insert', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (261, 3, 'M_nationality', 'update', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (262, 3, 'M_nationality', 'delete', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (263, 3, 'M_nationality', 'getData', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (264, 3, 'M_nationality', 'getNationality', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (265, 3, 'M_payment_type', 'index', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (266, 3, 'M_payment_type', 'insert', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (267, 3, 'M_payment_type', 'update', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (268, 3, 'M_payment_type', 'delete', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (269, 3, 'M_payment_type', 'getData', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (270, 3, 'M_payment_type', 'getPaymentType', '', 1, '2025-02-27 16:30:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (282, 3, 'Customer_form', 'getbyid', '', 1, '2025-02-27 16:34:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (283, 1, 'M_trxlist', 'index', '', 1, '2025-02-28 15:31:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (284, 1, 'M_trxlist', 'insert', '', 1, '2025-02-28 15:31:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (285, 1, 'M_trxlist', 'update', '', 1, '2025-02-28 15:31:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (286, 1, 'M_trxlist', 'delete', '', 1, '2025-02-28 15:31:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (287, 1, 'M_trxlist', 'getData', '', 1, '2025-02-28 15:31:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (288, 1, 'M_trxlist', 'getTransactionId', '', 1, '2025-02-28 15:31:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (289, 1, 'M_trxdate', 'index', '', 1, '2025-02-28 15:31:58', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (290, 1, 'M_trxdate', 'insert', '', 1, '2025-02-28 15:31:58', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (291, 1, 'M_trxdate', 'update', '', 1, '2025-02-28 15:31:58', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (292, 1, 'M_trxdate', 'delete', '', 1, '2025-02-28 15:31:58', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (293, 1, 'M_trxdate', 'getData', '', 1, '2025-02-28 15:31:58', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (294, 3, 'Api_ap_input', 'index', '', 1, '2025-02-28 22:04:40', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (295, 3, 'Api_ap_input', 'getData', '', 1, '2025-02-28 22:04:40', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (296, 3, 'M_company', 'getRegion', '', 1, '2025-03-01 08:33:14', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (297, 3, 'M_store', 'getStore', '', 1, '2025-03-01 08:33:35', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (298, 3, 'Summary_buysell_by_date', 'index', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (299, 3, 'Summary_buysell_by_date', 'getData', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (300, 3, 'Summary_buysell_by_date', 'gettotal', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (301, 3, 'Summary_buysell_by_date', 'getcount', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (302, 3, 'Summary_buysell_by_date', 'excel', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (303, 3, 'Summary_buysell_by_month', 'index', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (304, 3, 'Summary_buysell_by_month', 'getData', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (305, 3, 'Summary_buysell_by_month', 'gettotal', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (306, 3, 'Summary_buysell_by_month', 'getcount', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (307, 3, 'Summary_buysell_by_month', 'excel', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (308, 3, 'Summary_buysell_by_year', 'index', '', 1, '2025-03-01 08:43:12', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (309, 3, 'Summary_buysell_by_year', 'getData', '', 1, '2025-03-01 08:43:12', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (310, 3, 'Summary_buysell_by_year', 'gettotal', '', 1, '2025-03-01 08:43:12', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (311, 3, 'Summary_buysell_by_year', 'getcount', '', 1, '2025-03-01 08:43:12', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (312, 3, 'Summary_buysell_by_year', 'excel', '', 1, '2025-03-01 08:43:12', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (313, 3, 'Dashboard_buysell', 'index', '', 1, '2025-03-01 09:35:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (314, 3, 'Dashboard_buysell', 'getlastupdated', '', 1, '2025-03-01 09:35:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (315, 3, 'Dashboard_buysell', 'getdatatable1', '', 1, '2025-03-01 09:35:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (316, 3, 'Dashboard_buysell', 'getchart1', '', 1, '2025-03-01 09:35:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (317, 3, 'Dashboard_buysell', 'getdatatable2', '', 1, '2025-03-01 09:35:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (318, 3, 'Dashboard_buysell', 'getchart2', '', 1, '2025-03-01 09:35:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (319, 3, 'M_exchange_rate', 'index', '', 1, '2025-03-01 17:43:39', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (320, 3, 'M_exchange_rate', 'insert', '', 1, '2025-03-01 17:43:39', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (321, 3, 'M_exchange_rate', 'update', '', 1, '2025-03-01 17:43:39', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (322, 3, 'M_exchange_rate', 'delete', '', 1, '2025-03-01 17:43:39', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (323, 3, 'M_exchange_rate', 'getData', '', 1, '2025-03-01 17:43:39', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (324, 3, 'Stock', 'index', '', 1, '2025-03-02 20:39:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (325, 3, 'Stock', 'getData', '', 1, '2025-03-02 20:39:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (326, 3, 'Stock', 'excel', '', 1, '2025-03-02 20:39:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (327, 3, 'Stockcalculate', 'index', '', 1, '2025-03-02 20:39:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (328, 3, 'Stockcalculate', 'generate_stock_pull', '', 1, '2025-03-02 20:39:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (329, 3, 'Stockcalculate', 'generate_stock_price', '', 1, '2025-03-02 20:39:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (330, 3, 'Stockprice', 'index', '', 1, '2025-03-02 20:39:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (331, 3, 'Stockprice', 'getValasStock', '', 1, '2025-03-02 20:39:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (332, 3, 'Stockprice', 'getData', '', 1, '2025-03-02 20:39:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (333, 3, 'Stockprice', 'excel', '', 1, '2025-03-02 20:39:28', 1, NULL, NULL);

-- ----------------------------
-- Table structure for auth_listmethod
-- ----------------------------
DROP TABLE IF EXISTS `auth_listmethod`;
CREATE TABLE `auth_listmethod`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `controller` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `method` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `info` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `path` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `created` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 210 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of auth_listmethod
-- ----------------------------
INSERT INTO `auth_listmethod` VALUES (1, 'Api_ap', 'ap_login', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (2, 'Api_ap', 'ap_post_api', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (3, 'Api_ap', 'ap_input_trx', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (4, 'Api_ap', 'ap_adjustment_trx', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (5, 'Api_ap', 'ap_get_trx', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (6, 'Api_ap', 'ap_get_store', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (7, 'Api_ap_adjustment', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap_adjustment.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (8, 'Api_ap_adjustment', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap_adjustment.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (9, 'Api_ap_get', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap_get.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (10, 'Api_ap_get', 'excel', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap_get.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (11, 'Api_ap_input', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap_input.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (12, 'Api_ap_input', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap_input.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (13, 'Dashboard_buysell', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\dashboard\\controllers\\Dashboard_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (14, 'Dashboard_buysell', 'getlastupdated', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\dashboard\\controllers\\Dashboard_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (15, 'Dashboard_buysell', 'getdatatable1', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\dashboard\\controllers\\Dashboard_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (16, 'Dashboard_buysell', 'getchart1', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\dashboard\\controllers\\Dashboard_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (17, 'Dashboard_buysell', 'getdatatable2', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\dashboard\\controllers\\Dashboard_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (18, 'Dashboard_buysell', 'getchart2', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\dashboard\\controllers\\Dashboard_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (19, 'Home', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\home\\controllers\\Home.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (20, 'Inventory', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\inventory\\controllers\\Inventory.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (21, 'Inventory', 'generate_code', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\inventory\\controllers\\Inventory.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (22, 'Inventory', 'insert_header', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\inventory\\controllers\\Inventory.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (23, 'Inventory', 'update_header', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\inventory\\controllers\\Inventory.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (24, 'Inventory', 'insert_detail', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\inventory\\controllers\\Inventory.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (25, 'Inventory', 'stock', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\inventory\\controllers\\Inventory.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (26, 'Inventory', 'delete_detail', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\inventory\\controllers\\Inventory.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (27, 'Inventory', 'confirm', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\inventory\\controllers\\Inventory.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (28, 'Inventory', 'cancel', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\inventory\\controllers\\Inventory.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (29, 'Inventory', 'show_header', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\inventory\\controllers\\Inventory.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (30, 'Inventory', 'show_detail', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\inventory\\controllers\\Inventory.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (31, 'Inventory', 'printpdf', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\inventory\\controllers\\Inventory.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (32, 'Inventory_list', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\inventory\\controllers\\Inventory_list.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (33, 'Inventory_list', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\inventory\\controllers\\Inventory_list.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (34, 'Dttot', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\Dttot.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (35, 'Dttot', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\Dttot.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (36, 'Dttot', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\Dttot.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (37, 'Dttot', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\Dttot.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (38, 'Dttot', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\Dttot.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (39, 'M_airport', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_airport.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (40, 'M_airport', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_airport.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (41, 'M_airport', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_airport.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (42, 'M_airport', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_airport.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (43, 'M_airport', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_airport.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (44, 'M_airport', 'getAirport', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_airport.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (45, 'M_company', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_company.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (46, 'M_company', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_company.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (47, 'M_company', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_company.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (48, 'M_company', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_company.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (49, 'M_company', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_company.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (50, 'M_company', 'getBranch', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_company.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (51, 'M_company', 'getRegion', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_company.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (52, 'M_customer_data', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_data.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (53, 'M_customer_data', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_data.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (54, 'M_customer_data', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_data.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (55, 'M_customer_data', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_data.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (56, 'M_customer_data', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_data.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (57, 'M_customer_data', 'getIdentitas', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_data.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (58, 'M_customer_list', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_list.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (59, 'M_customer_list', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_list.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (60, 'M_customer_list', 'excel', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_list.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (61, 'M_customer_type', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_type.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (62, 'M_customer_type', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_type.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (63, 'M_customer_type', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_type.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (64, 'M_customer_type', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_type.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (65, 'M_customer_type', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_type.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (66, 'M_customer_type', 'getType', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_type.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (67, 'M_customer_work', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_work.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (68, 'M_customer_work', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_work.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (69, 'M_customer_work', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_work.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (70, 'M_customer_work', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_work.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (71, 'M_customer_work', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_work.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (72, 'M_customer_work', 'getWork', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_work.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (73, 'M_exchange_rate', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_exchange_rate.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (74, 'M_exchange_rate', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_exchange_rate.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (75, 'M_exchange_rate', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_exchange_rate.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (76, 'M_exchange_rate', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_exchange_rate.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (77, 'M_exchange_rate', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_exchange_rate.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (78, 'M_nationality', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_nationality.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (79, 'M_nationality', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_nationality.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (80, 'M_nationality', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_nationality.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (81, 'M_nationality', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_nationality.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (82, 'M_nationality', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_nationality.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (83, 'M_nationality', 'getNationality', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_nationality.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (84, 'M_payment_type', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_payment_type.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (85, 'M_payment_type', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_payment_type.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (86, 'M_payment_type', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_payment_type.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (87, 'M_payment_type', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_payment_type.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (88, 'M_payment_type', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_payment_type.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (89, 'M_payment_type', 'getPaymentType', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_payment_type.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (90, 'M_store', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_store.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (91, 'M_store', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_store.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (92, 'M_store', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_store.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (93, 'M_store', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_store.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (94, 'M_store', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_store.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (95, 'M_store', 'getStore', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_store.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (96, 'M_store', 'getStoreTrx', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_store.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (97, 'M_trxdate', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxdate.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (98, 'M_trxdate', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxdate.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (99, 'M_trxdate', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxdate.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (100, 'M_trxdate', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxdate.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (101, 'M_trxdate', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxdate.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (102, 'M_trxlist', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxlist.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (103, 'M_trxlist', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxlist.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (104, 'M_trxlist', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxlist.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (105, 'M_trxlist', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxlist.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (106, 'M_trxlist', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxlist.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (107, 'M_trxlist', 'getTransactionId', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxlist.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (108, 'M_valas', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_valas.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (109, 'M_valas', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_valas.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (110, 'M_valas', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_valas.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (111, 'M_valas', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_valas.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (112, 'M_valas', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_valas.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (113, 'M_valas', 'getvalasbyid', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_valas.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (114, 'M_valas', 'getValas', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_valas.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (115, 'M_valas', 'getValasTrx', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\M_valas.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (116, 'Store', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\Store.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (117, 'Store', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\master_data\\controllers\\Store.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (118, 'Group_menu', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\menu\\controllers\\Group_menu.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (119, 'Group_menu', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\menu\\controllers\\Group_menu.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (120, 'Group_menu', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\menu\\controllers\\Group_menu.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (121, 'Group_menu', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\menu\\controllers\\Group_menu.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (122, 'Group_menu', 'getDataMenu', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\menu\\controllers\\Group_menu.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (123, 'Group_menu', 'getMenu', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\menu\\controllers\\Group_menu.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (124, 'Menu', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\menu\\controllers\\Menu.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (125, 'Menu', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\menu\\controllers\\Menu.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (126, 'Menu', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\menu\\controllers\\Menu.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (127, 'Menu', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\menu\\controllers\\Menu.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (128, 'Menu', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\menu\\controllers\\Menu.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (129, 'Stock', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\stock\\controllers\\Stock.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (130, 'Stock', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\stock\\controllers\\Stock.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (131, 'Stock', 'excel', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\stock\\controllers\\Stock.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (132, 'Stockcalculate', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\stock\\controllers\\Stockcalculate.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (133, 'Stockcalculate', 'generate_stock_pull', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\stock\\controllers\\Stockcalculate.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (134, 'Stockcalculate', 'generate_stock_price', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\stock\\controllers\\Stockcalculate.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (135, 'Stockprice', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\stock\\controllers\\Stockprice.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (136, 'Stockprice', 'getValasStock', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\stock\\controllers\\Stockprice.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (137, 'Stockprice', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\stock\\controllers\\Stockprice.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (138, 'Stockprice', 'excel', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\stock\\controllers\\Stockprice.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (139, 'Summary_buysell_by_date', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_date.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (140, 'Summary_buysell_by_date', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_date.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (141, 'Summary_buysell_by_date', 'gettotal', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_date.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (142, 'Summary_buysell_by_date', 'getcount', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_date.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (143, 'Summary_buysell_by_date', 'excel', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_date.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (144, 'Summary_buysell_by_month', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_month.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (145, 'Summary_buysell_by_month', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_month.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (146, 'Summary_buysell_by_month', 'gettotal', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_month.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (147, 'Summary_buysell_by_month', 'getcount', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_month.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (148, 'Summary_buysell_by_month', 'excel', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_month.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (149, 'Summary_buysell_by_year', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_year.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (150, 'Summary_buysell_by_year', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_year.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (151, 'Summary_buysell_by_year', 'gettotal', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_year.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (152, 'Summary_buysell_by_year', 'getcount', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_year.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (153, 'Summary_buysell_by_year', 'excel', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_year.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (154, 'Customer', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (155, 'Customer', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (156, 'Customer_form', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer_form.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (157, 'Customer_form', 'generate_code', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer_form.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (158, 'Customer_form', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer_form.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (159, 'Customer_form', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer_form.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (160, 'Customer_form', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer_form.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (161, 'Customer_form', 'getbyid', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer_form.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (162, 'Customer_form', 'add_image', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer_form.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (163, 'Transaction_buysell', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (164, 'Transaction_buysell', 'generate_code_temp', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (165, 'Transaction_buysell', 'generate_code_confirm', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (166, 'Transaction_buysell', 'insert_header', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (167, 'Transaction_buysell', 'update_header', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (168, 'Transaction_buysell', 'insert_detail', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (169, 'Transaction_buysell', 'delete_detail', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (170, 'Transaction_buysell', 'show_header', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (171, 'Transaction_buysell', 'show_detail', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (172, 'Transaction_buysell', 'show_customer', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (173, 'Transaction_buysell', 'getstockbyid', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (174, 'Transaction_buysell', 'getratebyid', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (175, 'Transaction_buysell', 'getshowid', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (176, 'Transaction_buysell', 'confirm_task', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (177, 'Transaction_buysell', 'cancel_task', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (178, 'Transaction_buysell_list', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell_list.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (179, 'Transaction_buysell_list', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell_list.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (180, 'Transaction_buysell_show', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell_show.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (181, 'Transaction_buysell_show', 'getshowid', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell_show.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (182, 'Transaction_buysell_show', 'show_header', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell_show.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (183, 'Transaction_buysell_show', 'show_detail', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell_show.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (184, 'Transaction_buysell_show', 'printnota', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell_show.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (185, 'Transaction_buysell_task', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell_task.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (186, 'Transaction_buysell_task', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell_task.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (187, 'Change_pass', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\Change_pass.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (188, 'Change_pass', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\Change_pass.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (189, 'Group', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\Group.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (190, 'Group', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\Group.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (191, 'Group', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\Group.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (192, 'Group', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\Group.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (193, 'Group', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\Group.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (194, 'Level', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\Level.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (195, 'Level', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\Level.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (196, 'Level', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\Level.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (197, 'Level', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\Level.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (198, 'Level', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\Level.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (199, 'User', 'index', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (200, 'User', 'insert', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (201, 'User', 'update', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (202, 'User', 'delete', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (203, 'User', 'getData', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (204, 'User', 'getUsergroup', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (205, 'User', 'getUserlevel', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (206, 'User', 'getDataUser', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (207, 'User', 'getCreatedby', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (208, 'User', 'getuserbyId', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-03-02 20:38:50', 1);
INSERT INTO `auth_listmethod` VALUES (209, 'User', 'getcountuserbyCompanyId', '', 'E:\\Server-DB\\Server\\Apache24\\htdocs\\php5\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-03-02 20:38:50', 1);

-- ----------------------------
-- Table structure for auth_menu
-- ----------------------------
DROP TABLE IF EXISTS `auth_menu`;
CREATE TABLE `auth_menu`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `menu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of auth_menu
-- ----------------------------
INSERT INTO `auth_menu` VALUES (1, 'Main', 'fa fa-minus-square-o', '#', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (2, 'Method List', 'fa fa-minus-square-o', 'admin/listmethod', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (3, 'Role Setting', 'fa fa-minus-square-o', 'admin/role', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (4, 'Menu', 'fa fa-minus-square-o', 'menu', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (5, 'Group Menu', 'fa fa-minus-square-o', 'menu/group-menu', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (6, 'User Setting', 'fa fa-minus-square-o', '#', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (7, 'User', 'fa fa-minus-square-o', 'user', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (8, 'User group', 'fa fa-minus-square-o', 'user/group', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (9, 'Menu Setting', 'fa fa-minus-square-o', '#', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (10, 'User Level', 'fa fa-minus-square-o', 'user/Level', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (11, 'Home', 'fa fa-home', '.', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (12, 'Transaction', 'fa fa-minus-square-o', '#', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (13, 'Data', 'fa fa-minus-square-o', '#', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (14, 'Buy / Sell - New', 'fa fa-minus-square-o', 'transaction/customer', 1, '2024-04-01 10:00:00', NULL, '2025-02-26 15:18:12', 1);
INSERT INTO `auth_menu` VALUES (15, 'Cust. Type', 'fa fa-minus-square-o', 'master_data/m_customer_type', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (16, 'Cust. Identity Type', 'fa fa-minus-square-o', 'master_data/m_customer_data', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (17, 'Cust. Work', 'fa fa-minus-square-o', 'master_data/m_customer_work', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (18, 'Nationality', 'fa fa-minus-square-o', 'master_data/m_nationality', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (19, 'Summary', 'fa fa-minus-square-o', '#', 1, '2024-04-01 10:00:00', NULL, '2025-02-23 22:36:58', 1);
INSERT INTO `auth_menu` VALUES (20, 'Currency', 'fa fa-minus-square-o', 'master_data/m_valas', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (21, 'Kurs by Date', 'fa fa-minus-square-o', 'master_data/rate_daily', 1, '2024-04-01 10:00:00', NULL, '2025-01-01 22:53:50', 1);
INSERT INTO `auth_menu` VALUES (22, 'Suspected Terrorist', 'fa fa-minus-square-o', 'master_data/dttot', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (23, 'Cust. Act On', 'fa fa-minus-square-o', 'master_data/m_customer_action', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (24, 'Setting Trx List', 'fa fa-minus-square-o', 'master_data/m_trxlist', 1, '2024-04-01 10:00:00', NULL, '2025-02-26 13:08:56', 1);
INSERT INTO `auth_menu` VALUES (25, 'Branch', 'fa fa-minus-square-o', 'master_data/m_company', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (26, 'Setting Trx Date', 'fa fa-minus-square-o', 'master_data/m_trxdate', 1, '2024-04-01 10:00:00', NULL, '2025-02-26 13:08:45', 1);
INSERT INTO `auth_menu` VALUES (27, 'Buy / Sell - List', 'fa fa-minus-square-o', 'transaction/transaction_buysell_list', 1, '2024-04-01 10:00:00', NULL, '2025-02-26 15:18:06', 1);
INSERT INTO `auth_menu` VALUES (28, 'Stock', 'fa fa-minus-square-o', '#', 1, '2024-04-01 10:00:00', NULL, '2024-04-19 12:21:12', 1);
INSERT INTO `auth_menu` VALUES (29, 'Buy / Sell - Task', 'fa fa-minus-square-o', 'transaction/transaction_buysell_task', 1, '2024-04-01 10:00:00', NULL, '2025-02-26 15:18:17', 1);
INSERT INTO `auth_menu` VALUES (30, 'Buy / Sell - by Date', 'fa fa-minus-square-o', 'summary\\summary_buysell_by_date', 1, '2024-04-01 10:00:00', NULL, '2025-02-26 15:17:46', 1);
INSERT INTO `auth_menu` VALUES (31, 'Buy / Sell - by Month', 'fa fa-minus-square-o', 'summary\\summary_buysell_by_month', 1, '2024-04-01 10:00:00', NULL, '2025-02-26 15:17:52', 1);
INSERT INTO `auth_menu` VALUES (32, 'Buy / Sell - by Year', 'fa fa-minus-square-o', 'summary\\summary_buysell_by_year', 1, '2024-04-01 10:00:00', NULL, '2025-02-26 15:18:00', 1);
INSERT INTO `auth_menu` VALUES (33, 'Location', 'fa fa-minus-square-o', '#', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (34, 'Store', 'fa fa-minus-square-o', 'master_data/m_store', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (35, 'Airport', 'fa fa-minus-square-o', 'master_data/m_airport', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (36, 'Payment Type', 'fa fa-minus-square-o', 'master_data/m_payment_type', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (37, 'Cust. List', 'fa fa-minus-square-o', 'master_data/m_customer_list', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (38, 'Store', 'fa fa-minus-square-o', 'master_data/store', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (39, 'Stock in Nominal', 'fa fa-minus-square-o', 'stock/stock', 1, '2024-04-19 12:21:31', 1, '2024-04-19 15:06:59', 1);
INSERT INTO `auth_menu` VALUES (40, 'Stock in Avg Rate', 'fa fa-minus-square-o', 'stock/stockprice', 1, '2024-04-19 12:21:59', 1, '2024-04-19 15:11:18', 1);
INSERT INTO `auth_menu` VALUES (41, 'Inventory', 'fa fa-minus-square-o', '#', 1, '2024-05-14 09:05:51', 1, '2024-05-14 09:31:20', 1);
INSERT INTO `auth_menu` VALUES (42, 'Inv New', 'fa fa-minus-square-o', 'inventory/inventory', 1, '2024-05-14 09:30:48', 1, '2024-05-14 13:49:29', 1);
INSERT INTO `auth_menu` VALUES (43, 'Inv List', 'fa fa-minus-square-o', 'inventory/inventory_list', 1, '2024-05-14 09:31:03', 1, '2024-05-14 13:49:24', 1);
INSERT INTO `auth_menu` VALUES (44, 'Buy / Sell', 'fa fa-minus-square-o', '#', 1, '2025-02-26 15:57:48', 1, NULL, NULL);

-- ----------------------------
-- Table structure for auth_menu_group
-- ----------------------------
DROP TABLE IF EXISTS `auth_menu_group`;
CREATE TABLE `auth_menu_group`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `usergroup_id` bigint NOT NULL,
  `menu_id` bigint NOT NULL,
  `parent_id` bigint NULL DEFAULT NULL,
  `menuorder` int NULL DEFAULT NULL,
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of auth_menu_group
-- ----------------------------
INSERT INTO `auth_menu_group` VALUES (1, 1, 1, 0, 1, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (2, 1, 2, 1, 2, 1, '2024-04-01 10:00:00', NULL, '2025-02-23 20:49:04', 1);
INSERT INTO `auth_menu_group` VALUES (3, 1, 3, 1, 3, 1, '2024-04-01 10:00:00', NULL, '2025-02-23 20:49:11', 1);
INSERT INTO `auth_menu_group` VALUES (4, 1, 9, 1, 4, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (5, 1, 4, 9, 5, 1, '2024-04-01 10:00:00', NULL, '2025-02-23 20:49:18', 1);
INSERT INTO `auth_menu_group` VALUES (6, 1, 5, 9, 6, 1, '2024-04-01 10:00:00', NULL, '2025-02-23 20:49:25', 1);
INSERT INTO `auth_menu_group` VALUES (7, 1, 6, 1, 7, 1, '2024-04-01 10:00:00', NULL, '2025-02-23 20:49:35', 1);
INSERT INTO `auth_menu_group` VALUES (8, 1, 7, 6, 8, 1, '2024-04-01 10:00:00', NULL, '2025-02-23 20:49:44', 1);
INSERT INTO `auth_menu_group` VALUES (9, 1, 8, 6, 9, 1, '2024-04-01 10:00:00', NULL, '2025-02-23 20:49:50', 1);
INSERT INTO `auth_menu_group` VALUES (10, 1, 25, 33, 12, 1, '2024-04-01 10:00:00', NULL, '2025-02-23 22:46:04', 1);
INSERT INTO `auth_menu_group` VALUES (11, 1, 26, 12, 16, 1, '2024-04-01 10:00:00', NULL, '2025-02-23 22:43:53', 1);
INSERT INTO `auth_menu_group` VALUES (12, 1, 12, 0, 14, 1, '2024-04-01 10:00:00', NULL, '2025-02-23 22:43:33', 1);
INSERT INTO `auth_menu_group` VALUES (13, 1, 33, 0, 11, 1, '2024-04-01 10:00:00', NULL, '2025-02-23 22:45:54', 1);
INSERT INTO `auth_menu_group` VALUES (14, 1, 34, 33, 13, 1, '2024-04-01 10:00:00', NULL, '2025-02-28 15:27:55', 1);
INSERT INTO `auth_menu_group` VALUES (15, 1, 24, 12, 15, 1, '2024-04-01 10:00:00', NULL, '2025-02-23 22:43:42', 1);
INSERT INTO `auth_menu_group` VALUES (16, 1, 10, 6, 10, 1, '2025-02-23 20:58:08', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (17, 3, 12, 44, 2, 1, '2025-02-26 12:48:12', 1, '2025-02-26 15:58:17', 1);
INSERT INTO `auth_menu_group` VALUES (18, 3, 14, 12, 3, 1, '2025-02-26 12:48:39', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (19, 3, 29, 12, 4, 1, '2025-02-26 12:48:56', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (20, 3, 27, 12, 5, 1, '2025-02-26 12:49:44', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (21, 3, 19, 44, 6, 1, '2025-02-26 12:50:41', 1, '2025-02-26 15:58:29', 1);
INSERT INTO `auth_menu_group` VALUES (22, 3, 30, 19, 7, 1, '2025-02-26 12:50:51', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (23, 3, 31, 19, 8, 1, '2025-02-26 12:51:06', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (24, 3, 32, 19, 9, 1, '2025-02-26 12:51:16', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (25, 3, 44, 0, 1, 1, '2025-02-26 15:58:07', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (26, 3, 28, 44, 10, 1, '2025-03-02 07:27:52', 1, '2025-03-02 07:29:26', 1);
INSERT INTO `auth_menu_group` VALUES (27, 3, 39, 28, 11, 1, '2025-03-02 07:28:08', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (28, 3, 40, 28, 12, 1, '2025-03-02 07:28:35', 1, NULL, NULL);

-- ----------------------------
-- Table structure for auth_usergroup
-- ----------------------------
DROP TABLE IF EXISTS `auth_usergroup`;
CREATE TABLE `auth_usergroup`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `usergroupname` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of auth_usergroup
-- ----------------------------
INSERT INTO `auth_usergroup` VALUES (1, 'Developer', 1, '2024-04-01 10:00:00', NULL, '2025-02-16 10:56:12', 1);
INSERT INTO `auth_usergroup` VALUES (2, 'Consolidation', 1, '2024-04-01 10:00:00', NULL, '2025-02-23 20:57:06', 1);
INSERT INTO `auth_usergroup` VALUES (3, 'Admin', 1, '2024-04-01 10:00:00', NULL, '2025-02-16 08:22:30', 1);
INSERT INTO `auth_usergroup` VALUES (4, 'Counter', 1, '2024-04-01 10:00:00', NULL, '2025-02-23 20:56:31', 1);
INSERT INTO `auth_usergroup` VALUES (5, 'Cashier', 1, '2025-02-23 20:56:02', 1, '2025-02-23 20:56:24', 1);

-- ----------------------------
-- Table structure for auth_userlevel
-- ----------------------------
DROP TABLE IF EXISTS `auth_userlevel`;
CREATE TABLE `auth_userlevel`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `userlevelname` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of auth_userlevel
-- ----------------------------
INSERT INTO `auth_userlevel` VALUES (1, 'Admin', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_userlevel` VALUES (2, 'User', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for auth_users
-- ----------------------------
DROP TABLE IF EXISTS `auth_users`;
CREATE TABLE `auth_users`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password_plain` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `company_id` bigint NOT NULL,
  `usergroup_id` bigint NOT NULL,
  `userlevel_id` bigint NOT NULL,
  `region` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `fullname` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `celluler` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `lastlog` datetime NULL DEFAULT NULL,
  `chgpass` smallint NULL DEFAULT NULL,
  `flag` bit(1) NULL DEFAULT NULL,
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of auth_users
-- ----------------------------
INSERT INTO `auth_users` VALUES (1, '8989', 'f794bdbef7990b5112e526b5cd4ea67f4a35af21', NULL, 0, 1, 1, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, '2025-02-23 13:58:46', NULL, NULL, NULL);
INSERT INTO `auth_users` VALUES (2, 'konsolidasi', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', 0, 2, 1, '1,2,3', 'Konsolidasi', '', '', NULL, NULL, NULL, 1, '2025-02-23 13:58:46', NULL, NULL, NULL);
INSERT INTO `auth_users` VALUES (3, 'icv1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 3, 1, NULL, 'Admin', '', '', '2025-03-03 06:26:13', NULL, NULL, 1, '2025-02-23 13:58:46', NULL, '2025-02-23 15:06:05', 1);
INSERT INTO `auth_users` VALUES (4, 'icv2', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 4, 2, NULL, 'User', '', '', '2025-02-26 15:42:17', NULL, NULL, 1, '2025-02-23 13:58:46', NULL, '2025-02-23 15:06:13', 1);

-- ----------------------------
-- Table structure for log_auth
-- ----------------------------
DROP TABLE IF EXISTS `log_auth`;
CREATE TABLE `log_auth`  (
  `user_id` bigint NOT NULL,
  `action` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `ip` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of log_auth
-- ----------------------------
INSERT INTO `log_auth` VALUES (3, 'login', '2025-03-02 16:49:57', '::1');
INSERT INTO `log_auth` VALUES (3, 'login', '2025-03-02 20:40:24', '::1');
INSERT INTO `log_auth` VALUES (3, 'login', '2025-03-03 06:26:13', '::1');

-- ----------------------------
-- Table structure for log_auth_sessions
-- ----------------------------
DROP TABLE IF EXISTS `log_auth_sessions`;
CREATE TABLE `log_auth_sessions`  (
  `id` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ip_address` varchar(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `timestamp` int NOT NULL,
  `data` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of log_auth_sessions
-- ----------------------------
INSERT INTO `log_auth_sessions` VALUES ('2echvgdjqal3ekd3c876tkfk1i1i5eia', '::1', 1740922720, '');
INSERT INTO `log_auth_sessions` VALUES ('nllf36bqt7b243raq83usltq7937r7ck', '::1', 1740957988, '');

-- ----------------------------
-- Table structure for m_airport
-- ----------------------------
DROP TABLE IF EXISTS `m_airport`;
CREATE TABLE `m_airport`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `airport_code` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `airport_desc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_airport
-- ----------------------------
INSERT INTO `m_airport` VALUES (1, 'AMQ', 'Bandara Pattimura - Ambon', 1, '2024-03-17 00:00:00', NULL, 3, NULL);
INSERT INTO `m_airport` VALUES (2, 'BDJ', 'Bandara Syamsudin Noor - Banjarmasin', 1, '2024-03-17 00:00:00', NULL, 3, NULL);
INSERT INTO `m_airport` VALUES (3, 'BIK', 'Bandara Frans Kaisiepo - Biak', 1, '2024-03-17 00:00:00', NULL, 3, NULL);
INSERT INTO `m_airport` VALUES (4, 'BPN', 'Bandara Sultan Aji Muhammad Sulaiman Sepinggan - Balikpapan', 1, '2024-03-17 00:00:00', NULL, 3, NULL);
INSERT INTO `m_airport` VALUES (5, 'CGK', 'Bandara Internasional Cengkareng - Jakarta', 1, '2024-03-17 00:00:00', NULL, 3, NULL);
INSERT INTO `m_airport` VALUES (6, 'DJJ', 'Bandara Sentani - Jayapura', 1, '2024-03-17 00:00:00', NULL, 3, NULL);
INSERT INTO `m_airport` VALUES (7, 'DPS', 'Bandara I Gusti Ngurah Rai - Denpasar', 1, '2024-03-17 00:00:00', NULL, 3, NULL);
INSERT INTO `m_airport` VALUES (8, 'JOG', 'Bandara Adisutjipto - Yogyakarta', 1, '2024-03-17 00:00:00', NULL, 3, NULL);
INSERT INTO `m_airport` VALUES (9, 'KOE', 'Bandara El Tari - Kupang', 1, '2024-03-17 00:00:00', NULL, 3, NULL);
INSERT INTO `m_airport` VALUES (10, 'LOP', 'Bandara Internasional Lombok - Lombok Tengah', 1, '2024-03-17 00:00:00', NULL, 3, NULL);
INSERT INTO `m_airport` VALUES (11, 'MDC', 'Bandara Sam Ratulangi - Manado', 1, '2024-03-17 00:00:00', NULL, 3, NULL);
INSERT INTO `m_airport` VALUES (12, 'SOC', 'Bandara Adi Soemarmo - Surakarta', 1, '2024-03-17 00:00:00', NULL, 3, NULL);
INSERT INTO `m_airport` VALUES (13, 'SRG', 'Bandara Jenderal Ahmad Yani - Semarang', 1, '2024-03-17 00:00:00', NULL, 3, NULL);
INSERT INTO `m_airport` VALUES (14, 'SUB', 'Bandara Juanda - Surabaya', 1, '2024-03-17 00:00:00', NULL, 3, NULL);
INSERT INTO `m_airport` VALUES (15, 'UPG', 'Bandara Sultan Hasanuddin - Makassar', 1, '2024-03-17 00:00:00', NULL, 3, NULL);
INSERT INTO `m_airport` VALUES (16, 'YIA', 'Bandara Internasional Yogyakarta - Kulon Progo', 1, '2024-03-17 00:00:00', NULL, 3, NULL);

-- ----------------------------
-- Table structure for m_company
-- ----------------------------
DROP TABLE IF EXISTS `m_company`;
CREATE TABLE `m_company`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `company_address` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `company_phone` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `company_city` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `company_pos_code` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `company_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `company_type` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_limits` smallint NULL DEFAULT NULL,
  `api_method` smallint NULL DEFAULT NULL,
  `api_angkasapura` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `api_username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `api_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_company
-- ----------------------------
INSERT INTO `m_company` VALUES (1, 'PT. INDONESIA CENTRAL VALUTAMAS', 'Terminal 2 - Soekarno Hatta', '(021)', 'Jakarta', '', '', 'M03', 5, 0, 'AP2', 'api.indocev.cgk', 'api.indocev.cgk', 1, '2024-03-17 00:00:00', '2025-02-23 23:01:25', 1, 1);
INSERT INTO `m_company` VALUES (2, 'PT. INDONESIA CENTRAL VALUTAMAS', 'Terminal 3 - Soekarno Hatta', '(021) ', 'Jakarta', '', '', 'M03', 5, 0, 'AP2', 'api.indocev.cgk', 'api.indocev.cgk', 1, '2024-03-17 00:00:00', '2025-02-23 23:01:46', 1, 1);
INSERT INTO `m_company` VALUES (3, 'PT. INDONESIA CENTRAL VALUTAMAS', 'Terminal 2 - Juanda', '(031)', 'Surabaya', '', '', 'M03', 5, 0, 'AP1', 'api.indocev.sub', 'api.indocev.sub', 1, '2024-03-21 13:29:04', '2025-02-23 23:01:56', 1, 1);

-- ----------------------------
-- Table structure for m_company_store
-- ----------------------------
DROP TABLE IF EXISTS `m_company_store`;
CREATE TABLE `m_company_store`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `company_id` bigint NOT NULL,
  `store_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `store_address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `airport_id` bigint NULL DEFAULT NULL,
  `airport_terminal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `api_store_id` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `api_store_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `api_register_status` smallint NULL DEFAULT NULL,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_company_store
-- ----------------------------
INSERT INTO `m_company_store` VALUES (1, 1, 'Indocev Money Changer', 'Terminal 2F - Shopping Arcade Dep', 5, '2F', '53e92e8d102d983ea54d1990e4cd16d4', 'Indocev Money Changer T2F #Shopping Arcade Dep', 1, 1, '2024-03-17 00:00:00', '2024-05-27 17:15:57', 1, 1);
INSERT INTO `m_company_store` VALUES (2, 2, 'Indocev Money Changer', 'Terminal 3 - Arrival Internatioanl', 5, '3', '00d8c2a3c5242f301ed4034c33802c2b', 'Indocev Money Changer T3 #Arr Intl', 1, 1, '2024-03-17 00:00:00', '2024-05-27 17:16:08', 1, 1);
INSERT INTO `m_company_store` VALUES (3, 3, 'Indocev Money Changer', 'Terminal 2 SV-21-6 - Departure', 14, '2 (Dua) DEPARTURE', 'e9c2a6e6a7b9300338cccb7fdb011f61', 'Money Changer (Departure Int-SV-22-7)', 1, 1, '2024-03-17 00:00:00', '2024-05-27 10:14:00', 1, 1);
INSERT INTO `m_company_store` VALUES (4, 3, 'Indocev Money Changer', 'Terminal 2 SV-21-7 - Arrival', 14, '2 (Dua) ARRIVAL\r\n', '496b1f88ef3e2b6fc8b27b4b04bc5751', 'Money Changer (Arrival Int-SV-21-6)', 1, 1, '2024-03-17 00:00:00', '2024-03-21 13:29:41', 1, 1);

-- ----------------------------
-- Table structure for m_customer
-- ----------------------------
DROP TABLE IF EXISTS `m_customer`;
CREATE TABLE `m_customer`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `company_id` bigint NOT NULL,
  `customer_type_id` bigint NULL DEFAULT NULL,
  `customer_code` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `customer_handphone` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `customer_phone` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `customer_name` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `customer_nick_name` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `customer_address` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `rt_rw` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `village` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `sub_district` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `city` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `placeofbirth` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `bornday` date NULL DEFAULT NULL,
  `gender_id` bigint NULL DEFAULT NULL,
  `work_id` bigint NULL DEFAULT NULL,
  `customer_data_id` bigint NULL DEFAULT NULL,
  `customer_data_number` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `nationality_id` bigint NULL DEFAULT NULL,
  `npwp_number` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `npwp_name` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `customerprofil` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `kode_densus_dttot` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_customer
-- ----------------------------
INSERT INTO `m_customer` VALUES (1, 1, 1, '250201010001', '081395627817', '', 'Gede Suteja', 'Tejo', 'Jakarta Selatan', '', '', '', '', '', '2025-02-28', 0, NULL, NULL, '', NULL, '', NULL, '', NULL, 1, '2025-02-28 22:19:23', NULL, 3, NULL);
INSERT INTO `m_customer` VALUES (3, 1, 1, '250301020001', '081234', '', 'CIMUNG', '', 'DEPOK', '', '', '', '', '', '2025-03-01', 0, NULL, NULL, '', NULL, '', NULL, '', NULL, 1, '2025-03-01 07:12:14', '2025-03-01 08:12:22', 3, 3);

-- ----------------------------
-- Table structure for m_customer_data
-- ----------------------------
DROP TABLE IF EXISTS `m_customer_data`;
CREATE TABLE `m_customer_data`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `customer_data_name` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_customer_data
-- ----------------------------
INSERT INTO `m_customer_data` VALUES (1, 'KTP', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_data` VALUES (2, 'SIM', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_data` VALUES (3, 'PASPOR', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_data` VALUES (4, 'KITAS', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_data` VALUES (5, 'LAINNYA', 1, '2024-04-01 10:00:00', NULL, 3, NULL);

-- ----------------------------
-- Table structure for m_customer_type
-- ----------------------------
DROP TABLE IF EXISTS `m_customer_type`;
CREATE TABLE `m_customer_type`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `customer_type_name` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_customer_type
-- ----------------------------
INSERT INTO `m_customer_type` VALUES (1, 'Perorangan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_type` VALUES (2, 'Money Changer', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_type` VALUES (3, 'Bank', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_type` VALUES (4, 'Korporasi', 1, '2024-04-01 10:00:00', NULL, 3, NULL);

-- ----------------------------
-- Table structure for m_customer_work
-- ----------------------------
DROP TABLE IF EXISTS `m_customer_work`;
CREATE TABLE `m_customer_work`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `customer_work_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_customer_work
-- ----------------------------
INSERT INTO `m_customer_work` VALUES (1, 'Ibu Rumah Tangga', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (2, 'Korporasi', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (3, 'Lainnya', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (4, 'Pegawai Bank', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (5, 'Pegawai BUMD', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (6, 'Pegawai BUMN', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (7, 'Pegawai KUPVA BB', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (8, 'Pegawai Swasta', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (9, 'Pengurus Parpol', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (10, 'Pengusaha', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (11, 'Pensiunan PNS', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (12, 'PNS Aktif', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (13, 'Profesional', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (14, 'TKI/TKW', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (15, 'Yayasan/Pengurus Yayasan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (16, 'TNI', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (17, 'Polisi', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_work` VALUES (18, 'Wartawan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);

-- ----------------------------
-- Table structure for m_exchange_rate
-- ----------------------------
DROP TABLE IF EXISTS `m_exchange_rate`;
CREATE TABLE `m_exchange_rate`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `company_id` bigint NOT NULL,
  `store_id` bigint NOT NULL,
  `valas_id` smallint NOT NULL,
  `exchange_rate_date` date NOT NULL,
  `exchange_rate_buy` decimal(12, 3) NULL DEFAULT 0.000,
  `difference_buy` decimal(12, 3) NULL DEFAULT 0.000,
  `exchange_rate_sell` decimal(12, 3) NULL DEFAULT 0.000,
  `difference_sell` decimal(12, 3) NULL DEFAULT 0.000,
  `price_buy_bot` decimal(12, 3) NULL DEFAULT 0.000,
  `price_buy_top` decimal(12, 3) NULL DEFAULT 0.000,
  `price_sell_bot` decimal(12, 3) NULL DEFAULT 0.000,
  `price_sell_top` decimal(12, 3) NULL DEFAULT 0.000,
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` smallint NULL DEFAULT NULL,
  `updatedby` smallint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 365 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_exchange_rate
-- ----------------------------
INSERT INTO `m_exchange_rate` VALUES (1, 1, 1, 1, '2025-03-02', 1000.000, 0.000, 1100.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', '2025-03-02 15:42:47', 3, 3);
INSERT INTO `m_exchange_rate` VALUES (2, 1, 1, 2, '2025-03-02', 12000.000, 0.000, 12100.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', '2025-03-02 16:02:30', 3, 3);
INSERT INTO `m_exchange_rate` VALUES (3, 1, 1, 3, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (4, 1, 1, 4, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (5, 1, 1, 5, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (6, 1, 1, 6, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (7, 1, 1, 7, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (8, 1, 1, 8, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (9, 1, 1, 9, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (10, 1, 1, 10, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (11, 1, 1, 11, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (12, 1, 1, 12, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (13, 1, 1, 13, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (14, 1, 1, 14, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (15, 1, 1, 15, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (16, 1, 1, 16, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (17, 1, 1, 17, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (18, 1, 1, 18, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (19, 1, 1, 19, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (20, 1, 1, 20, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (21, 1, 1, 21, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (22, 1, 1, 22, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (23, 1, 1, 23, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (24, 1, 1, 24, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (25, 1, 1, 25, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (26, 1, 1, 26, '2025-03-02', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 15:42:34', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (339, 1, 1, 1, '2025-03-03', 1000.000, 0.000, 1100.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (340, 1, 1, 2, '2025-03-03', 12000.000, 0.000, 12100.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (341, 1, 1, 3, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (342, 1, 1, 4, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (343, 1, 1, 5, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (344, 1, 1, 6, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (345, 1, 1, 7, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (346, 1, 1, 8, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (347, 1, 1, 9, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (348, 1, 1, 10, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (349, 1, 1, 11, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (350, 1, 1, 12, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (351, 1, 1, 13, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (352, 1, 1, 14, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (353, 1, 1, 15, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (354, 1, 1, 16, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (355, 1, 1, 17, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (356, 1, 1, 18, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (357, 1, 1, 19, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (358, 1, 1, 20, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (359, 1, 1, 21, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (360, 1, 1, 22, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (361, 1, 1, 23, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (362, 1, 1, 24, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (363, 1, 1, 25, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (364, 1, 1, 26, '2025-03-03', 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 0.000, 1, '2025-03-02 16:02:38', NULL, 3, NULL);

-- ----------------------------
-- Table structure for m_nationality
-- ----------------------------
DROP TABLE IF EXISTS `m_nationality`;
CREATE TABLE `m_nationality`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nationality_code` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nationality_desc` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 248 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_nationality
-- ----------------------------
INSERT INTO `m_nationality` VALUES (1, 'ABW', 'Aruba', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (2, 'AFG', 'Afghanistan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (3, 'AGO', 'Angola', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (4, 'AIA', 'Anguilla', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (5, 'ALA', 'Aland Islands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (6, 'ALB', 'Albania', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (7, 'AND', 'Andorra', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (8, 'ANT', 'Netherlands Antilles', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (9, 'ARE', 'United Arab Emirates', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (10, 'ARG', 'Argentina', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (11, 'ARM', 'Armenia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (12, 'ASM', 'American Samoa', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (13, 'ATA', 'Antarctica', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (14, 'ATF', 'French Southern Territories', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (15, 'ATG', 'Antigua and Barbuda', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (16, 'AUS', 'Australia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (17, 'AUT', 'Austria', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (18, 'AZE', 'Azerbaijan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (19, 'BDI', 'Burundi', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (20, 'BEL', 'Belgium', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (21, 'BEN', 'Benin', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (22, 'BFA', 'Burkina Faso', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (23, 'BGD', 'Bangladesh', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (24, 'BGR', 'Bulgaria', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (25, 'BHR', 'Bahrain', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (26, 'BHS', 'Bahamas', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (27, 'BIH', 'Bosnia and Herzegovina', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (28, 'BLM', 'Saint-BarthÃ©lemy', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (29, 'BLR', 'Belarus', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (30, 'BLZ', 'Belize', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (31, 'BMU', 'Bermuda', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (32, 'BOL', 'Bolivia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (33, 'BRA', 'Brazil', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (34, 'BRB', 'Barbados', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (35, 'BRN', 'Brunei Darussalam', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (36, 'BTN', 'Bhutan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (37, 'BVT', 'Bouvet Island', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (38, 'BWA', 'Botswana', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (39, 'CAF', 'Central African Republic', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (40, 'CAN', 'Canada', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (41, 'CCK', 'Cocos (Keeling) Islands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (42, 'CHE', 'Switzerland', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (43, 'CHL', 'Chile', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (44, 'CHN', 'China', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (45, 'CIV', 'CÃ´te dâ€™Ivoire', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (46, 'CMR', 'Cameroon', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (47, 'COD', 'Congo, (Kinshasa)', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (48, 'COG', 'Congo (Brazzaville)', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (49, 'COK', 'Cook Islands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (50, 'COL', 'Colombia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (51, 'COM', 'Comoros', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (52, 'CPV', 'Cape Verde', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (53, 'CRI', 'Costa Rica', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (54, 'CUB', 'Cuba', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (55, 'CXR', 'Christmas Island', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (56, 'CYM', 'Cayman Islands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (57, 'CYP', 'Cyprus', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (58, 'CZE', 'Czech Republic', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (59, 'DEU', 'Germany', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (60, 'DJI', 'Djibouti', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (61, 'DMA', 'Dominica', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (62, 'DNK', 'Denmark', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (63, 'DOM', 'Dominican Republic', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (64, 'DZA', 'Algeria', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (65, 'ECU', 'Ecuador', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (66, 'EGY', 'Egypt', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (67, 'ERI', 'Eritrea', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (68, 'ESH', 'Western Sahara', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (69, 'ESP', 'Spain', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (70, 'EST', 'Estonia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (71, 'ETH', 'Ethiopia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (72, 'FIN', 'Finland', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (73, 'FJI', 'Fiji', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (74, 'FLK', 'Falkland Islands (Malvinas)', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (75, 'FRA', 'France', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (76, 'FRO', 'Faroe Islands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (77, 'FSM', 'Micronesia, Federated States of', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (78, 'GAB', 'Gabon', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (79, 'GBR', 'United Kingdom', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (80, 'GEO', 'Georgia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (81, 'GGY', 'Guernsey', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (82, 'GHA', 'Ghana', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (83, 'GIB', 'Gibraltar', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (84, 'GIN', 'Guinea', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (85, 'GLP', 'Guadeloupe', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (86, 'GMB', 'Gambia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (87, 'GNB', 'Guinea-Bissau', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (88, 'GNQ', 'Equatorial Guinea', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (89, 'GRC', 'Greece', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (90, 'GRD', 'Grenada', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (91, 'GRL', 'Greenland', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (92, 'GTM', 'Guatemala', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (93, 'GUF', 'French Guiana', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (94, 'GUM', 'Guam', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (95, 'GUY', 'Guyana', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (96, 'HKG', 'Hong Kong, SAR China', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (97, 'HMD', 'Heard and Mcdonald Islands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (98, 'HND', 'Honduras', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (99, 'HRV', 'Croatia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (100, 'HTI', 'Haiti', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (101, 'HUN', 'Hungary', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (102, 'IDN', 'Indonesia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (103, 'IMN', 'Isle of Man', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (104, 'IND', 'India', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (105, 'IOT', 'British Indian Ocean Territory', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (106, 'IRL', 'Ireland', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (107, 'IRN', 'Iran, Islamic Republic of', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (108, 'IRQ', 'Iraq', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (109, 'ISL', 'Iceland', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (110, 'ISR', 'Israel', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (111, 'ITA', 'Italy', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (112, 'JAM', 'Jamaica', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (113, 'JEY', 'Jersey', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (114, 'JOR', 'Jordan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (115, 'JPN', 'Japan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (116, 'KAZ', 'Kazakhstan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (117, 'KEN', 'Kenya', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (118, 'KGZ', 'Kyrgyzstan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (119, 'KHM', 'Cambodia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (120, 'KIR', 'Kiribati', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (121, 'KNA', 'Saint Kitts and Nevis', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (122, 'KOR', 'Korea (South)', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (123, 'KWT', 'Kuwait', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (124, 'LAO', 'Lao PDR', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (125, 'LBN', 'Lebanon', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (126, 'LBR', 'Liberia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (127, 'LBY', 'Libya', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (128, 'LCA', 'Saint Lucia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (129, 'LIE', 'Liechtenstein', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (130, 'LKA', 'Sri Lanka', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (131, 'LSO', 'Lesotho', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (132, 'LTU', 'Lithuania', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (133, 'LUX', 'Luxembourg', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (134, 'LVA', 'Latvia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (135, 'MAC', 'Macao, SAR China', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (136, 'MAF', 'Saint-Martin (Frenchpart)', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (137, 'MAR', 'Morocco', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (138, 'MCO', 'Monaco', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (139, 'MDA', 'Moldova', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (140, 'MDG', 'Madagascar', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (141, 'MDV', 'Maldives', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (142, 'MEX', 'Mexico', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (143, 'MHL', 'Marshall Islands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (144, 'MKD', 'Macedonia, Republic of', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (145, 'MLI', 'Mali', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (146, 'MLT', 'Malta', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (147, 'MMR', 'Myanmar', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (148, 'MNE', 'Montenegro', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (149, 'MNG', 'Mongolia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (150, 'MNP', 'Northern Mariana Islands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (151, 'MOZ', 'Mozambique', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (152, 'MRT', 'Mauritania', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (153, 'MSR', 'Montserrat', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (154, 'MTQ', 'Martinique', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (155, 'MUS', 'Mauritius', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (156, 'MWI', 'Malawi', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (157, 'MYS', 'Malaysia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (158, 'MYT', 'Mayotte', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (159, 'NAM', 'Namibia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (160, 'NCL', 'New Caledonia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (161, 'NER', 'Niger', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (162, 'NFK', 'Norfolk Island', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (163, 'NGA', 'Nigeria', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (164, 'NIC', 'Nicaragua', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (165, 'NIU', 'Niue', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (166, 'NLD', 'Netherlands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (167, 'NOR', 'Norway', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (168, 'NPL', 'Nepal', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (169, 'NRU', 'Nauru', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (170, 'NZL', 'New Zealand', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (171, 'OMN', 'Oman', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (172, 'PAK', 'Pakistan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (173, 'PAN', 'Panama', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (174, 'PCN', 'Pitcairn', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (175, 'PER', 'Peru', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (176, 'PHL', 'Philippines', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (177, 'PLW', 'Palau', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (178, 'PNG', 'Papua New Guinea', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (179, 'POL', 'Poland', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (180, 'PRI', 'Puerto Rico', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (181, 'PRK', 'Korea (North)', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (182, 'PRT', 'Portugal', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (183, 'PRY', 'Paraguay', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (184, 'PSE', 'Palestinian Territory', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (185, 'PYF', 'French Polynesia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (186, 'QAT', 'Qatar', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (187, 'REU', 'RÃ©union', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (188, 'ROU', 'Romania', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (189, 'RUS', 'Russian Federation', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (190, 'RWA', 'Rwanda', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (191, 'SAU', 'Saudi Arabia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (192, 'SDN', 'Sudan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (193, 'SEN', 'Senegal', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (194, 'SGP', 'Singapore', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (195, 'SGS', 'South Georgia and the South Sandwich Islands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (196, 'SHN', 'Saint Helena', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (197, 'SJM', 'Svalbard and Jan Mayen Islands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (198, 'SLB', 'Solomon Islands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (199, 'SLE', 'Sierra Leone', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (200, 'SLV', 'El Salvador', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (201, 'SMR', 'San Marino', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (202, 'SOM', 'Somalia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (203, 'SPM', 'Saint Pierre and Miquelon', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (204, 'SRB', 'Serbia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (205, 'SSD', 'South Sudan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (206, 'STP', 'Sao Tome and Principe', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (207, 'SUR', 'Suriname', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (208, 'SVK', 'Slovakia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (209, 'SVN', 'Slovenia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (210, 'SWE', 'Sweden', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (211, 'SWZ', 'Swaziland', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (212, 'SYC', 'Seychelles', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (213, 'SYR', 'Syrian Arab Republic (Syria)', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (214, 'TCA', 'Turks and Caicos Islands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (215, 'TCD', 'Chad', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (216, 'TGO', 'Togo', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (217, 'THA', 'Thailand', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (218, 'TJK', 'Tajikistan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (219, 'TKL', 'Tokelau', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (220, 'TKM', 'Turkmenistan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (221, 'TLS', 'Timor-Leste', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (222, 'TON', 'Tonga', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (223, 'TTO', 'Trinidad and Tobago', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (224, 'TUN', 'Tunisia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (225, 'TUR', 'Turkey', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (226, 'TUV', 'Tuvalu', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (227, 'TWN', 'Taiwan, Republic of China', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (228, 'TZA', 'Tanzania, United Republic of', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (229, 'UGA', 'Uganda', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (230, 'UKR', 'Ukraine', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (231, 'UMI', 'US Minor Outlying Islands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (232, 'URY', 'Uruguay', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (233, 'USA', 'United States of America', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (234, 'UZB', 'Uzbekistan', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (235, 'VAT', 'Holy See (Vatican City State)', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (236, 'VCT', 'Saint Vincent and Grenadines', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (237, 'VEN', 'Venezuela (Bolivarian Republic)', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (238, 'VGB', 'British Virgin Islands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (239, 'VIR', 'Virgin Islands, US', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (240, 'VNM', 'Viet Nam', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (241, 'VUT', 'Vanuatu', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (242, 'WLF', 'Wallis and Futuna Islands', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (243, 'WSM', 'Samoa', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (244, 'YEM', 'Yemen', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (245, 'ZAF', 'South Africa', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (246, 'ZMB', 'Zambia', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_nationality` VALUES (247, 'ZWE', 'Zimbabwe', 1, '2024-04-01 10:00:00', NULL, 3, NULL);

-- ----------------------------
-- Table structure for m_payment_type
-- ----------------------------
DROP TABLE IF EXISTS `m_payment_type`;
CREATE TABLE `m_payment_type`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `payment_type_name` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_payment_type
-- ----------------------------
INSERT INTO `m_payment_type` VALUES (1, 'Cash', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_payment_type` VALUES (2, 'Transfer', 1, '2024-04-01 10:00:00', NULL, 3, NULL);

-- ----------------------------
-- Table structure for m_transaction
-- ----------------------------
DROP TABLE IF EXISTS `m_transaction`;
CREATE TABLE `m_transaction`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `title` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `description` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_transaction
-- ----------------------------
INSERT INTO `m_transaction` VALUES (1, 'Buy', 'Transaksi Beli', 1, '2025-01-01 10:33:53', NULL, 1, NULL);
INSERT INTO `m_transaction` VALUES (2, 'Sell', 'Transaksi Jual', 1, '2025-01-01 10:33:53', NULL, 1, NULL);
INSERT INTO `m_transaction` VALUES (3, 'Kas Masuk', 'Transaksi Kas Masuk', 1, '2025-01-01 10:33:53', NULL, 1, NULL);
INSERT INTO `m_transaction` VALUES (4, 'Kas Keluar', 'Transaksi Kas Keluar', 1, '2025-01-01 10:33:53', NULL, 1, NULL);
INSERT INTO `m_transaction` VALUES (5, 'Bank Masuk', 'Transaksi Bank Masuk', 1, '2025-01-01 10:33:53', NULL, 1, NULL);
INSERT INTO `m_transaction` VALUES (6, 'Bank Keluar', 'Transaksi Bank Keluar', 1, '2025-01-01 10:33:53', NULL, 1, NULL);

-- ----------------------------
-- Table structure for m_transaction_date
-- ----------------------------
DROP TABLE IF EXISTS `m_transaction_date`;
CREATE TABLE `m_transaction_date`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `company_id` bigint NOT NULL,
  `store_id` bigint NOT NULL,
  `tr_id` bigint NOT NULL,
  `tr_date` date NOT NULL,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_transaction_date
-- ----------------------------
INSERT INTO `m_transaction_date` VALUES (1, 1, 1, 1, '2025-02-23', 1, '2025-02-23 21:21:43', '2025-02-28 15:45:39', 1, 1);

-- ----------------------------
-- Table structure for m_valas
-- ----------------------------
DROP TABLE IF EXISTS `m_valas`;
CREATE TABLE `m_valas`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `valas_code` varchar(6) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `valas_name` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_valas
-- ----------------------------
INSERT INTO `m_valas` VALUES (1, 'USD', 'US DOLLAR', 1, '2024-04-20 12:55:56', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (2, 'AUD', 'AUSTRALIA DOLLAR', 1, '2024-04-20 12:56:25', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (3, 'CAD', 'CANADA DOLLAR', 1, '2024-04-20 12:56:41', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (4, 'GBP', 'ENGLAND POUNDS', 1, '2024-04-20 12:57:10', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (5, 'CHF', 'SWISS FRANC', 1, '2024-04-20 12:57:28', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (6, 'HKD', 'HONGKONG DOLLAR', 1, '2024-04-20 12:57:41', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (7, 'SGD', 'SINGAPORE DOLLAR', 1, '2024-04-20 12:57:55', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (8, 'CHY', 'CHINA YUAN', 1, '2024-04-20 12:58:23', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (9, 'NZD', 'NEW ZEALAND DOLLAR', 1, '2024-04-20 12:58:57', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (10, 'MYR', 'MALAYSIA RINGGIT', 1, '2024-04-20 12:59:10', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (11, 'SAR', 'SAUDI RIYAL', 1, '2024-04-20 12:59:21', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (12, 'PHP', 'PHILIPINA PESO', 1, '2024-04-20 12:59:36', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (13, 'AED', 'UNI EMIRAT ARAB DIRHAM', 1, '2024-04-20 12:59:55', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (14, 'THB', 'THAILAND BATH', 1, '2024-04-20 13:00:05', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (15, 'NT', 'TAIWAN DOLLAR', 1, '2024-04-20 13:00:23', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (16, 'WON', 'KOREA  WON', 1, '2024-04-20 13:00:43', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (17, 'BRR', 'BRUNEI RINGGIT', 1, '2024-04-20 13:01:01', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (18, 'JPY', 'JEPANG YEN', 1, '2024-04-20 13:01:25', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (19, 'EURO', 'EROPA EURO', 1, '2024-04-20 13:01:40', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (20, 'QTR', 'QATAR RIYAL', 1, '2024-04-20 13:02:37', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (21, 'VND', 'VIETNAM DONG', 1, '2024-04-20 13:02:55', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (22, 'INR', 'INDIA RUPEE', 1, '2024-04-20 13:03:10', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (23, 'BHR', 'BHD', 1, '2024-04-20 13:03:28', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (24, 'OMR', 'OMAN', 1, '2024-04-20 13:04:02', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (25, 'KWD', 'KWD', 1, '2024-04-20 13:04:14', NULL, 3, NULL);
INSERT INTO `m_valas` VALUES (26, 'JOR', 'JORDAN', 1, '2024-04-20 13:04:27', NULL, 3, NULL);

-- ----------------------------
-- Table structure for ppatk_dttot
-- ----------------------------
DROP TABLE IF EXISTS `ppatk_dttot`;
CREATE TABLE `ppatk_dttot`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nama` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL,
  `deskripsi` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL,
  `terduga` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL,
  `kode_densus` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL,
  `tpt_lahir` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL,
  `tgl_lahir` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL,
  `warga_negara` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL,
  `alamat` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL,
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ppatk_dttot
-- ----------------------------

-- ----------------------------
-- Table structure for stock
-- ----------------------------
DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `valas_id` bigint NOT NULL,
  `company_id` bigint NOT NULL,
  `store_id` bigint NOT NULL,
  `stock_year` int NOT NULL,
  `stock_month` int NOT NULL,
  `nominal` decimal(12, 0) NULL DEFAULT 0,
  `beginning_stock_sheet` smallint NULL DEFAULT NULL,
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 81 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of stock
-- ----------------------------
INSERT INTO `stock` VALUES (75, 1, 1, 1, 2025, 3, 100, 0, 1, '2025-03-02 20:47:02', 3, NULL, NULL);
INSERT INTO `stock` VALUES (76, 1, 1, 1, 2025, 4, 100, 0, 1, '2025-03-02 20:47:02', 3, '2025-03-02 20:54:26', 3);
INSERT INTO `stock` VALUES (77, 2, 1, 1, 2025, 3, 300, 0, 1, '2025-03-02 20:47:02', 3, NULL, NULL);
INSERT INTO `stock` VALUES (78, 2, 1, 1, 2025, 4, 300, 50, 1, '2025-03-02 20:47:02', 3, '2025-03-02 20:47:02', 3);
INSERT INTO `stock` VALUES (79, 21, 1, 1, 2025, 3, 500, 0, 1, '2025-03-02 20:47:02', 3, NULL, NULL);
INSERT INTO `stock` VALUES (80, 21, 1, 1, 2025, 4, 500, 6, 1, '2025-03-02 20:47:02', 3, '2025-03-02 20:47:02', 3);

-- ----------------------------
-- Table structure for stock_price
-- ----------------------------
DROP TABLE IF EXISTS `stock_price`;
CREATE TABLE `stock_price`  (
  `id` int NOT NULL,
  `company_id` bigint NOT NULL,
  `store_id` bigint NOT NULL,
  `stock_date` date NOT NULL,
  `stock_year` int NULL DEFAULT NULL,
  `stock_month` int NULL DEFAULT NULL,
  `valas_id` bigint NOT NULL,
  `buy_tr_header_id` bigint NULL DEFAULT NULL,
  `buy_amount` decimal(12, 0) NULL DEFAULT 0,
  `buy_price` decimal(12, 3) NULL DEFAULT 0.000,
  `buy_total` decimal(18, 3) NULL DEFAULT 0.000,
  `sell_tr_header_id` bigint NULL DEFAULT NULL,
  `sell_amount` decimal(12, 0) NULL DEFAULT 0,
  `sell_price` decimal(12, 3) NULL DEFAULT 0.000,
  `sell_total` decimal(18, 3) NULL DEFAULT 0.000,
  `sell_average_total` decimal(18, 3) NULL DEFAULT 0.000,
  `stock_last_amount` decimal(12, 3) NULL DEFAULT 0.000,
  `stock_last_price` decimal(12, 3) NULL DEFAULT 0.000,
  `stock_last_total` decimal(18, 3) NULL DEFAULT 0.000,
  `profit` decimal(18, 3) NULL DEFAULT 0.000,
  `created` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of stock_price
-- ----------------------------
INSERT INTO `stock_price` VALUES (1, 1, 1, '2025-03-02', 2025, 3, 1, 1, 1000, 1000.000, 1000000.000, NULL, 0, 0.000, 0.000, 0.000, 1000.000, 1000.000, 1000000.000, 0.000, '2025-03-02 20:47:02', 3);
INSERT INTO `stock_price` VALUES (1, 1, 1, '2025-03-02', 2025, 3, 2, 1, 15000, 12000.000, 180000000.000, NULL, 0, 0.000, 0.000, 0.000, 15000.000, 12000.000, 180000000.000, 0.000, '2025-03-02 20:47:02', 3);
INSERT INTO `stock_price` VALUES (1, 1, 1, '2025-03-02', 2025, 3, 21, 1, 3000, 0.500, 1500.000, NULL, 0, 0.000, 0.000, 0.000, 3000.000, 0.500, 1500.000, 0.000, '2025-03-02 20:47:02', 3);

-- ----------------------------
-- Table structure for tr_api_get
-- ----------------------------
DROP TABLE IF EXISTS `tr_api_get`;
CREATE TABLE `tr_api_get`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `company_id` bigint NULL DEFAULT NULL,
  `store_id` bigint NULL DEFAULT NULL,
  `tr_id` bigint NULL DEFAULT NULL,
  `invoice_number` varchar(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `transaction_date` date NULL DEFAULT NULL,
  `transaction_time` datetime NULL DEFAULT NULL,
  `sequence` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `item_code` bigint NULL DEFAULT NULL,
  `item_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `item_quantity` decimal(12, 2) NULL DEFAULT NULL,
  `item_price_unit` decimal(12, 2) NULL DEFAULT NULL,
  `item_price_amount` decimal(12, 2) NULL DEFAULT NULL,
  `item_total_price_amount` decimal(18, 2) NULL DEFAULT NULL,
  `item_vat` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `transaction_amount` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `item_barcode` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `item_category_name` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `item_category_code` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `item_unit` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `item_discount` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `item_tax` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `item_total_discount` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `item_total_vat` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `item_total_tax` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `item_total_service_charge` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `currency` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `rate` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `payment_type` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `payment_by` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `username` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `buyer_barcode` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `buyer_name` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `buyer_flight_no` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `buyer_destination` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `buyer_nationality` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `remark` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `invoice_tax` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `tax_id` varbinary(15) NULL DEFAULT NULL,
  `payment_name` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `payment_time` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `distance` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `journey_time` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tr_api_get
-- ----------------------------

-- ----------------------------
-- Table structure for tr_api_log
-- ----------------------------
DROP TABLE IF EXISTS `tr_api_log`;
CREATE TABLE `tr_api_log`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `header_id` bigint NOT NULL,
  `api_method` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `api_status` varchar(6) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `api_success_insert` smallint NULL DEFAULT NULL,
  `api_failed_insert` smallint NULL DEFAULT NULL,
  `api_reason` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tr_api_log
-- ----------------------------

-- ----------------------------
-- Table structure for tr_detail
-- ----------------------------
DROP TABLE IF EXISTS `tr_detail`;
CREATE TABLE `tr_detail`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `header_id` bigint NOT NULL,
  `valas_id` bigint NOT NULL,
  `nominal` decimal(12, 0) NULL DEFAULT 0,
  `sheet` smallint NULL DEFAULT NULL,
  `price` decimal(12, 3) NULL DEFAULT 0.000,
  `subtotal` decimal(18, 3) NULL DEFAULT 0.000,
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tr_detail
-- ----------------------------
INSERT INTO `tr_detail` VALUES (1, 1, 1, 100, 10, 1000.000, 1000000.000, 3, '2025-03-02 19:24:48', '2025-03-02 19:52:09', 3, 3);
INSERT INTO `tr_detail` VALUES (7, 1, 21, 500, 6, 0.500, 1500.000, 3, '2025-03-02 19:46:36', '2025-03-02 19:52:09', 3, 3);
INSERT INTO `tr_detail` VALUES (8, 1, 2, 300, 50, 12000.000, 180000000.000, 3, '2025-03-02 19:48:59', '2025-03-02 19:52:09', 3, 3);
INSERT INTO `tr_detail` VALUES (9, 2, 1, 100, 5, 1100.000, 550000.000, 3, '2025-03-02 20:51:07', '2025-03-02 20:54:26', 3, 3);
INSERT INTO `tr_detail` VALUES (10, 2, 1, 100, 5, 1100.000, 550000.000, 3, '2025-03-02 20:53:54', '2025-03-02 20:54:26', 3, 3);

-- ----------------------------
-- Table structure for tr_header
-- ----------------------------
DROP TABLE IF EXISTS `tr_header`;
CREATE TABLE `tr_header`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `company_id` bigint NOT NULL,
  `store_id` bigint NOT NULL,
  `tr_id` smallint NOT NULL,
  `tr_date` date NOT NULL,
  `tr_number_temp` varchar(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `tr_number` varchar(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `customer_id` bigint NOT NULL,
  `customer_action_id` bigint NULL DEFAULT NULL,
  `customer_source` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `customer_purpose` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `cashier_id` bigint NOT NULL,
  `flag` bit(1) NULL DEFAULT NULL,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tr_header
-- ----------------------------
INSERT INTO `tr_header` VALUES (1, 1, 1, 1, '2025-03-02', '2503-0101-010001', '2503-0101-010001', 1, NULL, 'Tabungan', 'Investasi', NULL, 0, NULL, 3, '2025-03-02 16:50:51', '2025-03-02 19:52:09', 3, 3);
INSERT INTO `tr_header` VALUES (2, 1, 1, 2, '2025-03-02', '2503-0101-020001', '2503-0101-020001', 3, NULL, 'Tabungan', 'Investasi', NULL, 0, NULL, 3, '2025-03-02 20:47:54', '2025-03-02 20:54:26', 3, 3);

-- ----------------------------
-- View structure for v_auth_group_role
-- ----------------------------
DROP VIEW IF EXISTS `v_auth_group_role`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_auth_group_role` AS select `auth_group_role`.`id` AS `id`,`auth_group_role`.`usergroup_id` AS `usergroup_id`,`auth_usergroup`.`usergroupname` AS `usergroupname`,`auth_group_role`.`controller` AS `controller`,concat(concat(`auth_group_role`.`controller`,'::'),`auth_group_role`.`method`) AS `classmethod`,`auth_group_role`.`method` AS `method`,`auth_group_role`.`info` AS `info`,`auth_group_role`.`status` AS `status`,`auth_group_role`.`created` AS `created`,`auth_group_role`.`createdby` AS `createdby`,`auth_group_role`.`updated` AS `updated`,`auth_group_role`.`updatedby` AS `updatedby` from (`auth_group_role` left join `auth_usergroup` on((`auth_group_role`.`usergroup_id` = `auth_usergroup`.`id`)));

-- ----------------------------
-- View structure for v_auth_listmethod
-- ----------------------------
DROP VIEW IF EXISTS `v_auth_listmethod`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_auth_listmethod` AS select `auth_listmethod`.`id` AS `id`,`auth_listmethod`.`controller` AS `controller`,concat(`auth_listmethod`.`controller`,'::',`auth_listmethod`.`method`) AS `classmethod`,`auth_listmethod`.`method` AS `method`,`auth_listmethod`.`info` AS `info`,`auth_listmethod`.`path` AS `path`,`auth_listmethod`.`created` AS `created`,`auth_listmethod`.`createdby` AS `createdby` from `auth_listmethod`;

-- ----------------------------
-- View structure for v_auth_menu_group
-- ----------------------------
DROP VIEW IF EXISTS `v_auth_menu_group`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_auth_menu_group` AS select `t1`.`id` AS `id`,`t1`.`usergroup_id` AS `usergroup_id`,`t1`.`menu_id` AS `menu_id`,`t1`.`parent_id` AS `parent_id`,`t1`.`menuorder` AS `menuorder`,`t1`.`status` AS `status`,if(((select count(`t2`.`parent_id`) from `auth_menu_group` `t2` where ((`t2`.`parent_id` = `t1`.`menu_id`) and (`t2`.`usergroup_id` = `t1`.`usergroup_id`))) > 0),1,0) AS `h_child` from `auth_menu_group` `t1`;

-- ----------------------------
-- View structure for v_auth_menu_group_create
-- ----------------------------
DROP VIEW IF EXISTS `v_auth_menu_group_create`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_auth_menu_group_create` AS select `v_auth_menu_group`.`id` AS `id`,`v_auth_menu_group`.`usergroup_id` AS `usergroup_id`,`v_auth_menu_group`.`menu_id` AS `menu_id`,`v_auth_menu_group`.`parent_id` AS `parent_id`,`v_auth_menu_group`.`menuorder` AS `menuorder`,`v_auth_menu_group`.`status` AS `status`,`v_auth_menu_group`.`h_child` AS `h_child`,`auth_menu`.`menu` AS `menu`,`menu_1`.`menu` AS `parent`,`auth_usergroup`.`usergroupname` AS `usergroupname`,`auth_menu`.`icon` AS `icon`,`auth_menu`.`link` AS `link` from (((`v_auth_menu_group` left join `auth_usergroup` on((`v_auth_menu_group`.`usergroup_id` = `auth_usergroup`.`id`))) left join `auth_menu` on((`v_auth_menu_group`.`menu_id` = `auth_menu`.`id`))) left join `auth_menu` `menu_1` on((`v_auth_menu_group`.`parent_id` = `menu_1`.`id`)));

-- ----------------------------
-- View structure for v_auth_region
-- ----------------------------
DROP VIEW IF EXISTS `v_auth_region`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_auth_region` AS select `t`.`id` AS `user_id`,`t`.`fullname` AS `fullname`,`s`.`id` AS `company_id`,`s`.`company_name` AS `company_name`,group_concat(`s`.`company_address` separator ',') AS `company_address` from (`auth_users` `t` join `m_company` `s` on((0 <> find_in_set(`s`.`id`,`t`.`region`)))) group by `s`.`id`;

-- ----------------------------
-- View structure for v_auth_users
-- ----------------------------
DROP VIEW IF EXISTS `v_auth_users`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_auth_users` AS select `auth_users`.`id` AS `id`,`auth_users`.`username` AS `username`,`auth_users`.`password` AS `password`,`auth_users`.`company_id` AS `company_id`,`m_company`.`company_name` AS `company_name`,`m_company`.`company_address` AS `company_address`,`m_company`.`company_city` AS `company_city`,`m_company`.`company_type` AS `company_type`,`m_company`.`api_method` AS `api_method`,`m_company`.`api_angkasapura` AS `api_angkasapura`,`m_company`.`api_username` AS `api_username`,`m_company`.`api_password` AS `api_password`,`auth_users`.`usergroup_id` AS `usergroup_id`,`auth_usergroup`.`usergroupname` AS `usergroupname`,`auth_users`.`userlevel_id` AS `userlevel_id`,`auth_userlevel`.`userlevelname` AS `userlevelname`,`auth_users`.`fullname` AS `fullname`,`auth_users`.`email` AS `email`,`auth_users`.`celluler` AS `celluler`,`auth_users`.`region` AS `region`,(select concat('[',group_concat('{"id":"',`v_auth_region`.`company_id`,'","company_address":"',`v_auth_region`.`company_address`,'"}' separator ','),']') from `v_auth_region` where (`v_auth_region`.`user_id` = `auth_users`.`id`)) AS `region_code`,`auth_users`.`flag` AS `flag`,`auth_users`.`status` AS `status`,`auth_users`.`lastlog` AS `lastlog`,`auth_users`.`chgpass` AS `chgpass`,`auth_users`.`created` AS `created`,`auth_users`.`updated` AS `updated`,`auth_users`.`createdby` AS `createdby`,`auth_users`.`updatedby` AS `updatedby` from (((`auth_users` left join `auth_usergroup` on((`auth_users`.`usergroup_id` = `auth_usergroup`.`id`))) left join `auth_userlevel` on((`auth_users`.`userlevel_id` = `auth_userlevel`.`id`))) left join `m_company` on((`auth_users`.`company_id` = `m_company`.`id`)));

-- ----------------------------
-- View structure for v_m_airport
-- ----------------------------
DROP VIEW IF EXISTS `v_m_airport`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_airport` AS select `m_airport`.`id` AS `id`,`m_airport`.`airport_code` AS `airport_code`,`m_airport`.`airport_desc` AS `airport_desc`,`m_airport`.`status` AS `status`,`m_airport`.`created` AS `created`,`m_airport`.`updated` AS `updated`,`m_airport`.`createdby` AS `createdby`,`m_airport`.`updatedby` AS `updatedby`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name` from ((`m_airport` left join `auth_users` `usr1` on((`m_airport`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`m_airport`.`updatedby` = `usr2`.`id`)));

-- ----------------------------
-- View structure for v_m_company
-- ----------------------------
DROP VIEW IF EXISTS `v_m_company`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_company` AS select `m_company`.`id` AS `id`,`m_company`.`company_name` AS `company_name`,`m_company`.`company_address` AS `company_address`,`m_company`.`company_phone` AS `company_phone`,`m_company`.`company_city` AS `company_city`,`m_company`.`company_pos_code` AS `company_pos_code`,`m_company`.`company_email` AS `company_email`,`m_company`.`company_type` AS `company_type`,`m_company`.`user_limits` AS `user_limits`,`m_company`.`api_method` AS `api_method`,`m_company`.`api_angkasapura` AS `api_angkasapura`,`m_company`.`api_username` AS `api_username`,`m_company`.`api_password` AS `api_password`,`m_company`.`status` AS `status`,`m_company`.`created` AS `created`,`m_company`.`updated` AS `updated`,`m_company`.`createdby` AS `createdby`,`m_company`.`updatedby` AS `updatedby`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name` from ((`m_company` join `auth_users` `usr1` on((`m_company`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`m_company`.`updatedby` = `usr2`.`id`)));

-- ----------------------------
-- View structure for v_m_company_store
-- ----------------------------
DROP VIEW IF EXISTS `v_m_company_store`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_company_store` AS select `m_company_store`.`id` AS `id`,`m_company_store`.`store_name` AS `store_name`,`m_company_store`.`store_address` AS `store_address`,`m_company_store`.`api_store_id` AS `api_store_id`,`m_company_store`.`api_store_name` AS `api_store_name`,`m_company_store`.`api_register_status` AS `api_register_status`,`m_company_store`.`company_id` AS `company_id`,`m_company`.`company_name` AS `company_name`,`m_company`.`company_address` AS `company_address`,`m_company`.`company_city` AS `company_city`,`m_company`.`company_type` AS `company_type`,`m_company`.`api_angkasapura` AS `api_angkasapura`,`m_company_store`.`airport_id` AS `airport_id`,`m_airport`.`airport_code` AS `airport_code`,`m_airport`.`airport_desc` AS `airport_desc`,`m_company_store`.`airport_terminal` AS `airport_terminal`,`m_company`.`status` AS `status`,`m_company`.`created` AS `created`,`m_company`.`updated` AS `updated`,`m_company`.`createdby` AS `createdby`,`m_company`.`updatedby` AS `updatedby`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name` from ((((`m_company_store` join `m_company` on((`m_company_store`.`company_id` = `m_company`.`id`))) left join `m_airport` on((`m_airport`.`id` = `m_company_store`.`airport_id`))) join `auth_users` `usr1` on((`m_company_store`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`m_company_store`.`updatedby` = `usr2`.`id`)));

-- ----------------------------
-- View structure for v_m_customer
-- ----------------------------
DROP VIEW IF EXISTS `v_m_customer`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_customer` AS select `m_customer`.`id` AS `id`,`m_customer`.`customer_code` AS `customer_code`,`m_customer`.`customer_name` AS `customer_name`,`m_customer`.`customer_nick_name` AS `customer_nick_name`,`m_customer`.`customer_handphone` AS `customer_handphone`,`m_customer`.`customer_phone` AS `customer_phone`,`m_customer`.`customer_address` AS `customer_address`,`m_customer`.`rt_rw` AS `rt_rw`,`m_customer`.`village` AS `village`,`m_customer`.`sub_district` AS `sub_district`,`m_customer`.`city` AS `city`,`m_customer`.`placeofbirth` AS `placeofbirth`,`m_customer`.`bornday` AS `bornday`,`m_customer`.`gender_id` AS `gender_id`,(select (case when (`m_customer`.`gender_id` = 1) then 'Laki - Laki' when (`m_customer`.`gender_id` = 2) then 'Perempuan' else NULL end)) AS `gender_name`,`m_customer`.`work_id` AS `work_id`,`m_customer_work`.`customer_work_name` AS `customer_work_name`,`m_customer`.`customer_type_id` AS `customer_type_id`,`m_customer_type`.`customer_type_name` AS `customer_type_name`,`m_customer`.`customer_data_id` AS `customer_data_id`,`m_customer_data`.`customer_data_name` AS `customer_data_name`,`m_customer`.`customer_data_number` AS `customer_data_number`,`m_customer`.`nationality_id` AS `nationality_id`,`m_nationality`.`nationality_code` AS `nationality_code`,`m_customer`.`npwp_number` AS `npwp_number`,`m_customer`.`npwp_name` AS `npwp_name`,`m_customer`.`customerprofil` AS `customerprofil`,`m_customer`.`kode_densus_dttot` AS `kode_densus_dttot`,`m_customer`.`company_id` AS `company_id`,`m_company`.`company_name` AS `company_name`,`m_company`.`company_address` AS `company_address`,`m_customer`.`status` AS `status`,`m_customer`.`created` AS `created`,`m_customer`.`updated` AS `updated`,`m_customer`.`createdby` AS `createdby`,`m_customer`.`updatedby` AS `updatedby`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name` from (((((((`m_customer` join `m_company` on((`m_customer`.`company_id` = `m_company`.`id`))) left join `auth_users` `usr1` on((`m_customer`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`m_customer`.`updatedby` = `usr2`.`id`))) left join `m_customer_type` on((`m_customer`.`customer_type_id` = `m_customer_type`.`id`))) left join `m_customer_data` on((`m_customer`.`customer_data_id` = `m_customer_data`.`id`))) left join `m_nationality` on((`m_customer`.`nationality_id` = `m_nationality`.`id`))) left join `m_customer_work` on((`m_customer`.`work_id` = `m_customer_work`.`id`)));

-- ----------------------------
-- View structure for v_m_customer_data
-- ----------------------------
DROP VIEW IF EXISTS `v_m_customer_data`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_customer_data` AS select `m_customer_data`.`id` AS `id`,`m_customer_data`.`customer_data_name` AS `customer_data_name`,`m_customer_data`.`status` AS `status`,`m_customer_data`.`created` AS `created`,`m_customer_data`.`updated` AS `updated`,`m_customer_data`.`createdby` AS `createdby`,`m_customer_data`.`updatedby` AS `updatedby`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name` from ((`m_customer_data` left join `auth_users` `usr1` on((`m_customer_data`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`m_customer_data`.`updatedby` = `usr2`.`id`)));

-- ----------------------------
-- View structure for v_m_customer_type
-- ----------------------------
DROP VIEW IF EXISTS `v_m_customer_type`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_customer_type` AS select `m_customer_type`.`id` AS `id`,`m_customer_type`.`customer_type_name` AS `customer_type_name`,`m_customer_type`.`status` AS `status`,`m_customer_type`.`created` AS `created`,`m_customer_type`.`updated` AS `updated`,`m_customer_type`.`createdby` AS `createdby`,`m_customer_type`.`updatedby` AS `updatedby`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name` from ((`m_customer_type` left join `auth_users` `usr1` on((`m_customer_type`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`m_customer_type`.`updatedby` = `usr2`.`id`)));

-- ----------------------------
-- View structure for v_m_customer_work
-- ----------------------------
DROP VIEW IF EXISTS `v_m_customer_work`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_customer_work` AS select `m_customer_work`.`id` AS `id`,`m_customer_work`.`customer_work_name` AS `customer_work_name`,`m_customer_work`.`status` AS `status`,`m_customer_work`.`created` AS `created`,`m_customer_work`.`updated` AS `updated`,`m_customer_work`.`createdby` AS `createdby`,`m_customer_work`.`updatedby` AS `updatedby`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name` from ((`m_customer_work` left join `auth_users` `usr1` on((`m_customer_work`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`m_customer_work`.`updatedby` = `usr2`.`id`)));

-- ----------------------------
-- View structure for v_m_exchange_rate
-- ----------------------------
DROP VIEW IF EXISTS `v_m_exchange_rate`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_exchange_rate` AS select `m_exchange_rate`.`id` AS `id`,`m_exchange_rate`.`company_id` AS `company_id`,`m_exchange_rate`.`store_id` AS `store_id`,`m_exchange_rate`.`valas_id` AS `valas_id`,`m_valas`.`valas_code` AS `valas_code`,`m_valas`.`valas_name` AS `valas_name`,`m_exchange_rate`.`exchange_rate_date` AS `exchange_rate_date`,`m_exchange_rate`.`exchange_rate_buy` AS `exchange_rate_buy`,`m_exchange_rate`.`difference_buy` AS `difference_buy`,`m_exchange_rate`.`exchange_rate_sell` AS `exchange_rate_sell`,`m_exchange_rate`.`difference_sell` AS `difference_sell`,`m_exchange_rate`.`price_buy_bot` AS `price_buy_bot`,`m_exchange_rate`.`price_buy_top` AS `price_buy_top`,`m_exchange_rate`.`price_sell_bot` AS `price_sell_bot`,`m_exchange_rate`.`price_sell_top` AS `price_sell_top`,`m_company`.`company_name` AS `company_name`,`m_company_store`.`store_address` AS `store_address`,`m_exchange_rate`.`status` AS `status`,`m_exchange_rate`.`created` AS `created`,`m_exchange_rate`.`updated` AS `updated`,`m_exchange_rate`.`createdby` AS `createdby`,`usr1`.`fullname` AS `createdby_name`,`m_exchange_rate`.`updatedby` AS `updatedby`,`usr2`.`fullname` AS `updatedby_name` from (((((`m_exchange_rate` left join `m_valas` on((`m_exchange_rate`.`valas_id` = `m_valas`.`id`))) left join `m_company` on((`m_exchange_rate`.`company_id` = `m_company`.`id`))) left join `m_company_store` on((`m_exchange_rate`.`store_id` = `m_company_store`.`id`))) left join `auth_users` `usr1` on((`m_exchange_rate`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`m_exchange_rate`.`updatedby` = `usr2`.`id`)));

-- ----------------------------
-- View structure for v_m_nationality
-- ----------------------------
DROP VIEW IF EXISTS `v_m_nationality`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_nationality` AS select `m_nationality`.`id` AS `id`,`m_nationality`.`nationality_code` AS `nationality_code`,`m_nationality`.`nationality_desc` AS `nationality_desc`,`m_nationality`.`status` AS `status`,`m_nationality`.`created` AS `created`,`m_nationality`.`updated` AS `updated`,`m_nationality`.`createdby` AS `createdby`,`m_nationality`.`updatedby` AS `updatedby`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name` from ((`m_nationality` left join `auth_users` `usr1` on((`m_nationality`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`m_nationality`.`updatedby` = `usr2`.`id`)));

-- ----------------------------
-- View structure for v_m_payment_type
-- ----------------------------
DROP VIEW IF EXISTS `v_m_payment_type`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_payment_type` AS select `m_payment_type`.`id` AS `id`,`m_payment_type`.`payment_type_name` AS `payment_type_name`,`m_payment_type`.`status` AS `status`,`m_payment_type`.`created` AS `created`,`m_payment_type`.`updated` AS `updated`,`m_payment_type`.`createdby` AS `createdby`,`m_payment_type`.`updatedby` AS `updatedby`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name` from ((`m_payment_type` left join `auth_users` `usr1` on((`m_payment_type`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`m_payment_type`.`updatedby` = `usr2`.`id`)));

-- ----------------------------
-- View structure for v_m_transaction
-- ----------------------------
DROP VIEW IF EXISTS `v_m_transaction`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_transaction` AS select `m_transaction`.`id` AS `id`,`m_transaction`.`title` AS `title`,`m_transaction`.`description` AS `description`,`m_transaction`.`status` AS `status`,`m_transaction`.`created` AS `created`,`m_transaction`.`updated` AS `updated`,`m_transaction`.`createdby` AS `createdby`,`m_transaction`.`updatedby` AS `updatedby`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name` from ((`m_transaction` left join `auth_users` `usr1` on((`m_transaction`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`m_transaction`.`updatedby` = `usr2`.`id`)));

-- ----------------------------
-- View structure for v_m_transaction_date
-- ----------------------------
DROP VIEW IF EXISTS `v_m_transaction_date`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_transaction_date` AS select `m_transaction_date`.`id` AS `id`,`m_company_store`.`company_id` AS `company_id`,`m_company`.`company_name` AS `company_name`,`m_company`.`company_address` AS `company_address`,`m_transaction_date`.`store_id` AS `store_id`,`m_company_store`.`store_name` AS `store_name`,`m_company_store`.`store_address` AS `store_address`,`m_transaction_date`.`tr_id` AS `tr_id`,`m_transaction`.`title` AS `tr_title`,`m_transaction`.`description` AS `tr_description`,`m_transaction_date`.`tr_date` AS `tr_date`,`m_transaction_date`.`status` AS `status`,`m_transaction_date`.`created` AS `created`,`m_transaction_date`.`updated` AS `updated`,`m_transaction_date`.`createdby` AS `createdby`,`m_transaction_date`.`updatedby` AS `updatedby`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name` from (((((`m_transaction_date` join `m_transaction` on((`m_transaction`.`id` = `m_transaction_date`.`tr_id`))) join `auth_users` `usr1` on((`usr1`.`id` = `m_transaction_date`.`createdby`))) left join `auth_users` `usr2` on((`usr2`.`id` = `m_transaction_date`.`updatedby`))) join `m_company_store` on((`m_company_store`.`id` = `m_transaction_date`.`store_id`))) join `m_company` on((`m_company_store`.`company_id` = `m_company`.`id`)));

-- ----------------------------
-- View structure for v_m_valas
-- ----------------------------
DROP VIEW IF EXISTS `v_m_valas`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_valas` AS select `m_valas`.`id` AS `id`,`m_valas`.`valas_code` AS `valas_code`,`m_valas`.`valas_name` AS `valas_name`,`m_valas`.`status` AS `status`,`m_valas`.`created` AS `created`,`m_valas`.`updated` AS `updated`,`m_valas`.`createdby` AS `createdby`,`m_valas`.`updatedby` AS `updatedby`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name` from ((`m_valas` left join `auth_users` `usr1` on((`m_valas`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`m_valas`.`updatedby` = `usr2`.`id`)));

-- ----------------------------
-- View structure for v_stock_price
-- ----------------------------
DROP VIEW IF EXISTS `v_stock_price`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_stock_price` AS select `stock_price`.`id` AS `id`,`stock_price`.`valas_id` AS `valas_id`,`stock_price`.`company_id` AS `company_id`,`stock_price`.`store_id` AS `store_id`,`stock_price`.`stock_date` AS `stock_date`,`stock_price`.`stock_year` AS `stock_year`,`stock_price`.`stock_month` AS `stock_month`,`stock_price`.`buy_tr_number` AS `buy_tr_number`,`stock_price`.`buy_amount` AS `buy_amount`,`stock_price`.`buy_price` AS `buy_price`,`stock_price`.`buy_total` AS `buy_total`,`stock_price`.`sell_tr_number` AS `sell_tr_number`,`stock_price`.`sell_amount` AS `sell_amount`,`stock_price`.`sell_price` AS `sell_price`,`stock_price`.`sell_total` AS `sell_total`,`stock_price`.`sell_average_total` AS `sell_average_total`,`stock_price`.`stock_last_amount` AS `stock_last_amount`,`stock_price`.`stock_last_price` AS `stock_last_price`,`stock_price`.`stock_last_total` AS `stock_last_total`,`stock_price`.`profit` AS `profit`,`stock_price`.`created` AS `created`,`stock_price`.`createdby` AS `createdby`,`m_company`.`company_name` AS `company_name`,`m_company`.`company_address` AS `company_address`,`m_company_store`.`store_name` AS `store_name`,`m_company_store`.`store_address` AS `store_address`,`m_valas`.`valas_code` AS `valas_code`,`m_valas`.`valas_name` AS `valas_name` from (((((`stock_price` left join `tr_header` `tr_header_buy` on((`stock_price`.`buy_tr_number` = `tr_header_buy`.`tr_number`))) left join `tr_header` `tr_header_sale` on((`stock_price`.`sell_tr_number` = `tr_header_sale`.`tr_number`))) join `m_company` on((`stock_price`.`company_id` = `m_company`.`id`))) join `m_company_store` on((`stock_price`.`store_id` = `m_company_store`.`id`))) join `m_valas` on((`stock_price`.`valas_id` = `m_valas`.`id`)));

-- ----------------------------
-- View structure for v_stock_tr1
-- ----------------------------
DROP VIEW IF EXISTS `v_stock_tr1`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_stock_tr1` AS select `tr_header`.`company_id` AS `company_id`,`tr_header`.`store_id` AS `store_id`,year(`tr_header`.`tr_date`) AS `stock_year`,month(`tr_header`.`tr_date`) AS `stock_month`,`tr_header`.`tr_id` AS `tr_id`,`tr_detail`.`valas_id` AS `valas_id`,`tr_detail`.`nominal` AS `buy_nominal`,sum(`tr_detail`.`sheet`) AS `buy_sheet` from (`tr_detail` join `tr_header` on((`tr_detail`.`header_id` = `tr_header`.`id`))) where ((`tr_header`.`tr_id` = 1) and (`tr_header`.`status` in (3,4))) group by `tr_header`.`company_id`,`tr_header`.`store_id`,year(`tr_header`.`tr_date`),month(`tr_header`.`tr_date`),`tr_header`.`tr_id`,`tr_detail`.`valas_id`,`tr_detail`.`nominal`;

-- ----------------------------
-- View structure for v_stock_tr2
-- ----------------------------
DROP VIEW IF EXISTS `v_stock_tr2`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_stock_tr2` AS select `tr_header`.`company_id` AS `company_id`,`tr_header`.`store_id` AS `store_id`,year(`tr_header`.`tr_date`) AS `stock_year`,month(`tr_header`.`tr_date`) AS `stock_month`,`tr_header`.`tr_id` AS `tr_id`,`tr_detail`.`valas_id` AS `valas_id`,`tr_detail`.`nominal` AS `sell_nominal`,sum(`tr_detail`.`sheet`) AS `sell_sheet` from (`tr_detail` join `tr_header` on((`tr_detail`.`header_id` = `tr_header`.`id`))) where ((`tr_header`.`tr_id` = 2) and (`tr_header`.`status` in (3,4))) group by `tr_header`.`company_id`,`tr_header`.`store_id`,year(`tr_header`.`tr_date`),month(`tr_header`.`tr_date`),`tr_header`.`tr_id`,`tr_detail`.`valas_id`,`tr_detail`.`nominal`;

-- ----------------------------
-- View structure for v_stock_tr3
-- ----------------------------
DROP VIEW IF EXISTS `v_stock_tr3`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_stock_tr3` AS select `tr_header`.`company_id` AS `company_id`,`tr_header`.`store_id` AS `store_id`,year(`tr_header`.`tr_date`) AS `stock_year`,month(`tr_header`.`tr_date`) AS `stock_month`,`tr_detail`.`valas_id` AS `valas_id`,`tr_detail`.`nominal` AS `sell_alocation_nominal`,sum(`tr_detail`.`sheet`) AS `sell_alocation_sheet` from (`tr_detail` join `tr_header` on((`tr_detail`.`header_id` = `tr_header`.`id`))) where ((`tr_header`.`status` = 1) and (`tr_header`.`tr_id` = 2)) group by `tr_header`.`company_id`,`tr_header`.`store_id`,year(`tr_header`.`tr_date`),month(`tr_header`.`tr_date`),`tr_detail`.`valas_id`,`tr_detail`.`nominal`;

-- ----------------------------
-- View structure for v_stock_tr9
-- ----------------------------
DROP VIEW IF EXISTS `v_stock_tr9`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_stock_tr9` AS select `stock`.`id` AS `id`,`stock`.`valas_id` AS `valas_id`,`m_valas`.`valas_code` AS `valas_code`,`m_valas`.`valas_name` AS `valas_name`,`stock`.`stock_year` AS `stock_year`,`stock`.`stock_month` AS `stock_month`,`stock`.`nominal` AS `nominal`,`stock`.`beginning_stock_sheet` AS `beginning_stock_sheet`,if((`v_stock_tr1`.`buy_sheet` is null),0,`v_stock_tr1`.`buy_sheet`) AS `buy_sheet`,if((`v_stock_tr2`.`sell_sheet` is null),0,`v_stock_tr2`.`sell_sheet`) AS `sell_sheet`,if((`v_stock_tr3`.`sell_alocation_sheet` is null),0,`v_stock_tr3`.`sell_alocation_sheet`) AS `sell_alocation_sheet`,(((`stock`.`beginning_stock_sheet` + if((`v_stock_tr1`.`buy_sheet` is null),0,`v_stock_tr1`.`buy_sheet`)) - if((`v_stock_tr2`.`sell_sheet` is null),0,`v_stock_tr2`.`sell_sheet`)) - if((`v_stock_tr3`.`sell_alocation_sheet` is null),0,`v_stock_tr3`.`sell_alocation_sheet`)) AS `last_stock_sheet`,(select `stock_price`.`stock_last_price` from `stock_price` where ((`stock_price`.`valas_id` = `stock`.`valas_id`) and (`stock_price`.`company_id` = `stock`.`company_id`) and (`stock_price`.`store_id` = `stock`.`store_id`) and (`stock_price`.`stock_year` = `stock`.`stock_year`) and (`stock_price`.`stock_month` = `stock_price`.`stock_month`)) order by `stock_price`.`id` desc limit 1) AS `stock_last_price`,`stock`.`company_id` AS `company_id`,`m_company`.`company_name` AS `company_name`,`m_company`.`company_address` AS `company_address`,`stock`.`store_id` AS `store_id`,`m_company_store`.`store_name` AS `store_name`,`m_company_store`.`store_address` AS `store_address`,`stock`.`status` AS `status`,`stock`.`created` AS `created`,`stock`.`createdby` AS `createdby`,`stock`.`updated` AS `updated`,`stock`.`updatedby` AS `updatedby` from ((((((`stock` join `m_valas` on((`m_valas`.`id` = `stock`.`valas_id`))) left join `v_stock_tr1` on(((`stock`.`company_id` = `v_stock_tr1`.`company_id`) and (`stock`.`store_id` = `v_stock_tr1`.`store_id`) and (`stock`.`valas_id` = `v_stock_tr1`.`valas_id`) and (`stock`.`nominal` = `v_stock_tr1`.`buy_nominal`) and (`stock`.`stock_year` = `v_stock_tr1`.`stock_year`) and (`stock`.`stock_month` = `v_stock_tr1`.`stock_month`)))) left join `v_stock_tr2` on(((`stock`.`company_id` = `v_stock_tr2`.`company_id`) and (`stock`.`store_id` = `v_stock_tr2`.`store_id`) and (`stock`.`valas_id` = `v_stock_tr2`.`valas_id`) and (`stock`.`nominal` = `v_stock_tr2`.`sell_nominal`) and (`stock`.`stock_year` = `v_stock_tr2`.`stock_year`) and (`stock`.`stock_month` = `v_stock_tr2`.`stock_month`)))) left join `v_stock_tr3` on(((`stock`.`company_id` = `v_stock_tr3`.`company_id`) and (`stock`.`store_id` = `v_stock_tr3`.`store_id`) and (`stock`.`valas_id` = `v_stock_tr3`.`valas_id`) and (`stock`.`nominal` = `v_stock_tr3`.`sell_alocation_nominal`) and (`stock`.`stock_year` = `v_stock_tr3`.`stock_year`) and (`stock`.`stock_month` = `v_stock_tr3`.`stock_month`)))) left join `m_company` on((`m_company`.`id` = `stock`.`company_id`))) left join `m_company_store` on((`m_company_store`.`id` = `stock`.`store_id`))) group by `m_valas`.`valas_code`,`m_valas`.`valas_name`,`stock`.`valas_id`,`stock`.`company_id`,`stock`.`store_id`,`stock`.`stock_year`,`stock`.`stock_month`,`stock`.`nominal`;

-- ----------------------------
-- View structure for v_stocksale
-- ----------------------------
DROP VIEW IF EXISTS `v_stocksale`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_stocksale` AS select `m_valas`.`valas_code` AS `valas_code`,`m_valas`.`valas_name` AS `valas_name`,`v_stock_tr9`.`valas_id` AS `valas_id`,`v_stock_tr9`.`nominal` AS `nominal`,`v_stock_tr9`.`company_id` AS `company_id`,`v_stock_tr9`.`store_id` AS `store_id`,`m_valas`.`status` AS `status` from (`v_stock_tr9` join `m_valas` on((`v_stock_tr9`.`valas_id` = `m_valas`.`id`))) where ((`v_stock_tr9`.`last_stock_sheet` > 0) and (`v_stock_tr9`.`stock_year` = year(curdate())) and (`v_stock_tr9`.`stock_month` = month(curdate()))) group by `v_stock_tr9`.`company_id`,`v_stock_tr9`.`valas_id`,`v_stock_tr9`.`nominal`;

-- ----------------------------
-- View structure for v_summary_by_date
-- ----------------------------
DROP VIEW IF EXISTS `v_summary_by_date`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_summary_by_date` AS select `tr_header`.`company_id` AS `company_id`,`tr_header`.`store_id` AS `store_id`,`tr_detail`.`valas_id` AS `valas_id`,`m_valas`.`valas_code` AS `valas_code`,`m_valas`.`valas_name` AS `valas_name`,`tr_header`.`tr_date` AS `tr_date`,sum(if(((`tr_header`.`tr_id` = 1) and (`tr_detail`.`status` in (3,4))),(`tr_detail`.`nominal` * `tr_detail`.`sheet`),0)) AS `buy_nominal`,sum(if(((`tr_header`.`tr_id` = 1) and (`tr_detail`.`status` in (3,4))),`tr_detail`.`subtotal`,0)) AS `buy_equivalent`,sum(if(((`tr_header`.`tr_id` = 2) and (`tr_detail`.`status` in (3,4))),(`tr_detail`.`nominal` * `tr_detail`.`sheet`),0)) AS `sell_nominal`,sum(if(((`tr_header`.`tr_id` = 2) and (`tr_detail`.`status` in (3,4))),`tr_detail`.`subtotal`,0)) AS `sell_equivalent` from ((`tr_detail` join `tr_header` on((`tr_header`.`id` = `tr_detail`.`header_id`))) join `m_valas` on((`tr_detail`.`valas_id` = `m_valas`.`id`))) where (`tr_detail`.`status` in (3,4)) group by `tr_header`.`company_id`,`tr_header`.`store_id`,`tr_detail`.`valas_id`,`m_valas`.`valas_code`,`m_valas`.`valas_name`,`tr_header`.`tr_date`;

-- ----------------------------
-- View structure for v_summary_by_month
-- ----------------------------
DROP VIEW IF EXISTS `v_summary_by_month`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_summary_by_month` AS select `tr_header`.`company_id` AS `company_id`,`tr_header`.`store_id` AS `store_id`,`tr_detail`.`valas_id` AS `valas_id`,`m_valas`.`valas_code` AS `valas_code`,`m_valas`.`valas_name` AS `valas_name`,year(`tr_header`.`tr_date`) AS `tr_year`,month(`tr_header`.`tr_date`) AS `tr_month`,sum(if(((`tr_header`.`tr_id` = 1) and (`tr_detail`.`status` in (3,4))),(`tr_detail`.`nominal` * `tr_detail`.`sheet`),0)) AS `buy_nominal`,sum(if(((`tr_header`.`tr_id` = 1) and (`tr_detail`.`status` in (3,4))),`tr_detail`.`subtotal`,0)) AS `buy_equivalent`,sum(if(((`tr_header`.`tr_id` = 2) and (`tr_detail`.`status` in (3,4))),(`tr_detail`.`nominal` * `tr_detail`.`sheet`),0)) AS `sell_nominal`,sum(if(((`tr_header`.`tr_id` = 2) and (`tr_detail`.`status` in (3,4))),`tr_detail`.`subtotal`,0)) AS `sell_equivalent` from ((`tr_detail` join `tr_header` on((`tr_header`.`id` = `tr_detail`.`header_id`))) join `m_valas` on((`tr_detail`.`valas_id` = `m_valas`.`id`))) where (`tr_detail`.`status` in (3,4)) group by `tr_header`.`company_id`,`tr_header`.`store_id`,`tr_detail`.`valas_id`,`m_valas`.`valas_code`,`m_valas`.`valas_name`,year(`tr_header`.`tr_date`),month(`tr_header`.`tr_date`);

-- ----------------------------
-- View structure for v_summary_by_year
-- ----------------------------
DROP VIEW IF EXISTS `v_summary_by_year`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_summary_by_year` AS select `tr_header`.`company_id` AS `company_id`,`tr_header`.`store_id` AS `store_id`,`tr_detail`.`valas_id` AS `valas_id`,`m_valas`.`valas_code` AS `valas_code`,`m_valas`.`valas_name` AS `valas_name`,year(`tr_header`.`tr_date`) AS `tr_year`,sum(if(((`tr_header`.`tr_id` = 1) and (`tr_detail`.`status` in (3,4))),(`tr_detail`.`nominal` * `tr_detail`.`sheet`),0)) AS `buy_nominal`,sum(if(((`tr_header`.`tr_id` = 1) and (`tr_detail`.`status` in (3,4))),`tr_detail`.`subtotal`,0)) AS `buy_equivalent`,sum(if(((`tr_header`.`tr_id` = 2) and (`tr_detail`.`status` in (3,4))),(`tr_detail`.`nominal` * `tr_detail`.`sheet`),0)) AS `sell_nominal`,sum(if(((`tr_header`.`tr_id` = 2) and (`tr_detail`.`status` in (3,4))),`tr_detail`.`subtotal`,0)) AS `sell_equivalent` from ((`tr_detail` join `tr_header` on((`tr_header`.`id` = `tr_detail`.`header_id`))) join `m_valas` on((`tr_detail`.`valas_id` = `m_valas`.`id`))) where (`tr_detail`.`status` in (3,4)) group by `tr_header`.`company_id`,`tr_header`.`store_id`,`tr_detail`.`valas_id`,`m_valas`.`valas_code`,`m_valas`.`valas_name`,year(`tr_header`.`tr_date`);

-- ----------------------------
-- View structure for v_tr_api_get
-- ----------------------------
DROP VIEW IF EXISTS `v_tr_api_get`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tr_api_get` AS select `tr_api_get`.`id` AS `id`,`tr_api_get`.`company_id` AS `company_id`,`tr_api_get`.`store_id` AS `store_id`,`tr_header`.`id` AS `tr_number`,`tr_header`.`tr_id` AS `tr_header_tr_id`,`tr_header`.`tr_date` AS `tr_header_tr_date`,`tr_header`.`tr_number` AS `tr_header_tr_number`,`tr_header`.`customer_id` AS `tr_header_customer_id`,`tr_api_get`.`tr_id` AS `tr_api_get_tr_id`,`tr_api_get`.`invoice_number` AS `tr_api_get_invoice_number`,`tr_api_get`.`transaction_date` AS `tr_api_get_transaction_date`,`tr_api_get`.`transaction_time` AS `tr_api_get_transaction_time`,`tr_api_get`.`status` AS `tr_api_get_status`,count(`tr_api_get`.`invoice_number`) AS `tr_api_get_total_data`,`tr_header`.`created` AS `created`,`tr_header`.`updated` AS `updated`,`auth_users`.`fullname` AS `createdby_name` from ((`tr_api_get` join `tr_header` on(((`tr_header`.`tr_number` = `tr_api_get`.`invoice_number`) and (`tr_header`.`tr_id` = `tr_api_get`.`tr_id`)))) join `auth_users` on((`auth_users`.`id` = `tr_header`.`createdby`))) group by `tr_api_get`.`company_id`,`tr_api_get`.`store_id`,`tr_api_get`.`tr_id`,`tr_header`.`id`,`tr_header`.`tr_id`,`tr_header`.`tr_date`,`tr_header`.`tr_number`,`tr_header`.`customer_id`,`tr_api_get`.`invoice_number`,`tr_api_get`.`transaction_date`,`tr_api_get`.`transaction_time`;

-- ----------------------------
-- View structure for v_tr_api_get_detail
-- ----------------------------
DROP VIEW IF EXISTS `v_tr_api_get_detail`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tr_api_get_detail` AS select `tr_api_get`.`id` AS `id`,`tr_api_get`.`company_id` AS `company_id`,`tr_api_get`.`store_id` AS `store_id`,`tr_api_get`.`tr_id` AS `tr_id`,`tr_header`.`id` AS `tr_number`,`tr_api_get`.`invoice_number` AS `invoice_number`,`tr_api_get`.`transaction_date` AS `transaction_date`,`tr_api_get`.`transaction_time` AS `transaction_time`,`tr_api_get`.`created` AS `created`,`tr_api_get`.`updated` AS `updated`,`tr_api_get`.`createdby` AS `createdby`,`tr_api_get`.`updatedby` AS `updatedby`,`auth_users`.`fullname` AS `createdby_name`,`tr_api_get`.`sequence` AS `sequence`,`tr_api_get`.`item_code` AS `item_id`,`m_valas`.`valas_code` AS `item_code`,`tr_api_get`.`item_name` AS `item_name`,`tr_api_get`.`item_quantity` AS `item_quantity`,`tr_api_get`.`item_price_unit` AS `item_price_unit`,`tr_api_get`.`item_price_amount` AS `item_price_amount`,`tr_api_get`.`item_total_price_amount` AS `item_total_price_amount`,`tr_api_get`.`item_vat` AS `item_vat`,`tr_api_get`.`transaction_amount` AS `transaction_amount`,`tr_api_get`.`item_barcode` AS `item_barcode`,`tr_api_get`.`item_category_name` AS `item_category_name`,`tr_api_get`.`item_category_code` AS `item_category_code`,`tr_api_get`.`item_unit` AS `item_unit`,`tr_api_get`.`item_discount` AS `item_discount`,`tr_api_get`.`item_tax` AS `item_tax`,`tr_api_get`.`item_total_discount` AS `item_total_discount`,`tr_api_get`.`item_total_vat` AS `item_total_vat`,`tr_api_get`.`item_total_tax` AS `item_total_tax`,`tr_api_get`.`item_total_service_charge` AS `item_total_service_charge`,`tr_api_get`.`currency` AS `currency`,`tr_api_get`.`rate` AS `rate`,`tr_api_get`.`payment_type` AS `payment_type`,`tr_api_get`.`payment_by` AS `payment_by`,`tr_api_get`.`username` AS `username`,`tr_api_get`.`buyer_barcode` AS `buyer_barcode`,`tr_api_get`.`buyer_name` AS `buyer_name`,`tr_api_get`.`buyer_flight_no` AS `buyer_flight_no`,`tr_api_get`.`buyer_destination` AS `buyer_destination`,`tr_api_get`.`buyer_nationality` AS `buyer_nationality`,`tr_api_get`.`remark` AS `remark`,`tr_api_get`.`invoice_tax` AS `invoice_tax`,`tr_api_get`.`tax_id` AS `tax_id`,`tr_api_get`.`payment_name` AS `payment_name`,`tr_api_get`.`payment_time` AS `payment_time`,`tr_api_get`.`distance` AS `distance`,`tr_api_get`.`journey_time` AS `journey_time`,`m_company_store`.`store_name` AS `store_name`,`m_company_store`.`store_address` AS `store_address` from ((((`tr_api_get` join `tr_header` on(((`tr_header`.`tr_number` = `tr_api_get`.`invoice_number`) and (`tr_header`.`tr_id` = `tr_api_get`.`tr_id`)))) join `m_valas` on((`m_valas`.`id` = `tr_api_get`.`item_code`))) join `auth_users` on((`auth_users`.`id` = `tr_api_get`.`createdby`))) left join `m_company_store` on((`m_company_store`.`id` = `tr_api_get`.`store_id`)));

-- ----------------------------
-- View structure for v_tr_detail
-- ----------------------------
DROP VIEW IF EXISTS `v_tr_detail`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tr_detail` AS select `tr_detail`.`id` AS `id`,`tr_detail`.`valas_id` AS `valas_id`,`m_valas`.`valas_code` AS `valas_code`,`m_valas`.`valas_name` AS `valas_name`,`tr_detail`.`nominal` AS `nominal`,`tr_detail`.`sheet` AS `sheet`,`tr_detail`.`price` AS `price`,`tr_detail`.`subtotal` AS `subtotal`,`tr_detail`.`status` AS `status`,`tr_header`.`company_id` AS `company_id`,`tr_header`.`store_id` AS `store_id`,`tr_detail`.`header_id` AS `header_id`,`tr_header`.`tr_id` AS `tr_id`,`tr_header`.`tr_date` AS `tr_date`,`tr_header`.`customer_id` AS `customer_id`,`tr_detail`.`created` AS `created`,`tr_detail`.`updated` AS `updated`,`tr_detail`.`createdby` AS `createdby`,`tr_detail`.`updatedby` AS `updatedby` from ((`tr_detail` join `tr_header` on((`tr_detail`.`header_id` = `tr_header`.`id`))) left join `m_valas` on((`tr_detail`.`valas_id` = `m_valas`.`id`)));

-- ----------------------------
-- View structure for v_tr_header
-- ----------------------------
DROP VIEW IF EXISTS `v_tr_header`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tr_header` AS select `tr_header`.`id` AS `id`,`tr_header`.`tr_id` AS `tr_id`,`tr_header`.`tr_date` AS `tr_date`,`tr_header`.`tr_number_temp` AS `tr_number_temp`,`tr_header`.`tr_number` AS `tr_number`,(select sum(`tr_detail`.`subtotal`) from `tr_detail` where (`tr_detail`.`header_id` = `tr_header`.`id`)) AS `total`,`tr_header`.`customer_id` AS `customer_id`,`m_customer`.`customer_code` AS `customer_code`,`m_customer`.`customer_name` AS `customer_name`,`m_customer`.`customer_address` AS `customer_address`,`m_nationality`.`nationality_code` AS `nationality_code`,`m_nationality`.`nationality_desc` AS `nationality_desc`,`tr_header`.`customer_source` AS `customer_source`,`tr_header`.`customer_purpose` AS `customer_purpose`,`tr_header`.`description` AS `description`,`tr_header`.`cashier_id` AS `cashier_id`,`usr1`.`fullname` AS `cashier_name`,`tr_header`.`company_id` AS `company_id`,`m_company`.`company_name` AS `company_name`,`m_company`.`company_address` AS `company_address`,`m_company`.`company_city` AS `company_city`,`m_company`.`company_type` AS `company_type`,`m_company`.`api_method` AS `api_method`,`m_company_store`.`airport_id` AS `airport_id`,`m_company_store`.`airport_terminal` AS `airport_terminal`,`tr_header`.`store_id` AS `store_id`,`m_company_store`.`store_name` AS `store_name`,`m_company_store`.`store_address` AS `store_address`,`m_company_store`.`api_store_id` AS `api_store_id`,`m_transaction`.`title` AS `tr_title`,`tr_header`.`flag` AS `flag`,`tr_header`.`status` AS `status`,(select (case when (`tr_header`.`status` in (3,4)) then 'Closed' when (`tr_header`.`status` = 2) then 'Canceled' else 'Open' end)) AS `status_name`,`tr_header`.`created` AS `created`,`tr_header`.`updated` AS `updated`,`tr_header`.`createdby` AS `createdby`,`tr_header`.`updatedby` AS `updatedby`,`usr2`.`fullname` AS `createdby_name`,`usr3`.`fullname` AS `updatedby_name` from (((((((((`tr_header` join `m_transaction` on((`tr_header`.`tr_id` = `m_transaction`.`id`))) left join `auth_users` `usr1` on((`tr_header`.`cashier_id` = `usr1`.`id`))) join `auth_users` `usr2` on((`tr_header`.`createdby` = `usr2`.`id`))) left join `auth_users` `usr3` on((`tr_header`.`updatedby` = `usr3`.`id`))) join `m_customer` on((`tr_header`.`customer_id` = `m_customer`.`id`))) left join `m_nationality` on((`m_customer`.`nationality_id` = `m_nationality`.`id`))) join `m_company` on((`tr_header`.`company_id` = `m_company`.`id`))) join `m_company_store` on((`m_company_store`.`id` = `tr_header`.`store_id`))) join `m_airport` on((`m_airport`.`id` = `m_company_store`.`airport_id`)));

SET FOREIGN_KEY_CHECKS = 1;
