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

 Date: 22/04/2025 06:51:27
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
) ENGINE = InnoDB AUTO_INCREMENT = 913 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of auth_group_role
-- ----------------------------
INSERT INTO `auth_group_role` VALUES (1, 1, 'Group_menu', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (2, 1, 'Group_menu', 'insert', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (4, 1, 'Change_pass', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (5, 1, 'Change_pass', 'update', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (6, 1, 'Group', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (7, 1, 'Group', 'insert', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (8, 1, 'Group', 'update', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (9, 1, 'Group', 'delete', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (11, 1, 'Home', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (12, 1, 'Group_menu', 'update', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (13, 1, 'Group_menu', 'delete', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (15, 1, 'Menu', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (16, 1, 'Menu', 'insert', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (17, 1, 'Menu', 'update', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (18, 1, 'Menu', 'delete', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (20, 1, 'Level', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (21, 1, 'Level', 'insert', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (22, 1, 'Level', 'update', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (23, 1, 'Level', 'delete', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (25, 1, 'User', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (26, 1, 'User', 'insert', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (27, 1, 'User', 'update', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (28, 1, 'User', 'delete', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (51, 1, 'User', 'getuserbyId', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (52, 1, 'M_store', 'index', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (53, 1, 'M_store', 'insert', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (54, 1, 'M_store', 'update', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (55, 1, 'M_store', 'delete', NULL, 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
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
INSERT INTO `auth_group_role` VALUES (180, 3, 'Customer', 'index', '', 1, '2025-02-27 04:41:07', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (225, 3, 'Transaction_buysell_list', 'index', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (235, 3, 'Transaction_buysell_task', 'index', '', 1, '2025-02-27 16:28:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (283, 1, 'M_trxlist', 'index', '', 1, '2025-02-28 15:31:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (284, 1, 'M_trxlist', 'insert', '', 1, '2025-02-28 15:31:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (285, 1, 'M_trxlist', 'update', '', 1, '2025-02-28 15:31:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (286, 1, 'M_trxlist', 'delete', '', 1, '2025-02-28 15:31:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (289, 1, 'M_trxdate', 'index', '', 1, '2025-02-28 15:31:58', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (290, 1, 'M_trxdate', 'insert', '', 1, '2025-02-28 15:31:58', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (291, 1, 'M_trxdate', 'update', '', 1, '2025-02-28 15:31:58', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (292, 1, 'M_trxdate', 'delete', '', 1, '2025-02-28 15:31:58', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (298, 3, 'Summary_buysell_by_date', 'index', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (300, 3, 'Summary_buysell_by_date', 'gettotal', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (301, 3, 'Summary_buysell_by_date', 'getcount', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (303, 3, 'Summary_buysell_by_month', 'index', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (305, 3, 'Summary_buysell_by_month', 'gettotal', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (306, 3, 'Summary_buysell_by_month', 'getcount', '', 1, '2025-03-01 08:43:02', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (308, 3, 'Summary_buysell_by_year', 'index', '', 1, '2025-03-01 08:43:12', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (310, 3, 'Summary_buysell_by_year', 'gettotal', '', 1, '2025-03-01 08:43:12', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (311, 3, 'Summary_buysell_by_year', 'getcount', '', 1, '2025-03-01 08:43:12', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (313, 3, 'Dashboard_buysell', 'index', '', 1, '2025-03-01 09:35:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (314, 3, 'Dashboard_buysell', 'getlastupdated', '', 1, '2025-03-01 09:35:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (315, 3, 'Dashboard_buysell', 'getdatatable1', '', 1, '2025-03-01 09:35:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (316, 3, 'Dashboard_buysell', 'getchart1', '', 1, '2025-03-01 09:35:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (317, 3, 'Dashboard_buysell', 'getdatatable2', '', 1, '2025-03-01 09:35:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (318, 3, 'Dashboard_buysell', 'getchart2', '', 1, '2025-03-01 09:35:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (349, 3, 'Ppatk_dttot', 'index', '', 1, '2025-03-03 11:08:20', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (350, 3, 'Ppatk_dttot', 'insert', '', 1, '2025-03-03 11:08:20', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (351, 3, 'Ppatk_dttot', 'update', '', 1, '2025-03-03 11:08:20', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (352, 3, 'Ppatk_dttot', 'delete', '', 1, '2025-03-03 11:08:20', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (385, 3, 'Summary_buysell_by_date', 'getdata', '', 1, '2025-03-03 23:46:34', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (386, 3, 'Summary_buysell_by_month', 'getdata', '', 1, '2025-03-03 23:46:34', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (387, 3, 'Summary_buysell_by_year', 'getdata', '', 1, '2025-03-03 23:46:34', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (388, 3, 'Transaction_buysell_list', 'getdata', '', 1, '2025-03-03 23:47:01', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (389, 3, 'Transaction_buysell_list', 'excel', '', 1, '2025-03-03 23:47:01', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (391, 3, 'Customer', 'getdata', '', 1, '2025-03-04 09:42:11', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (392, 3, 'M_customer_act_on', 'index', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (393, 3, 'M_customer_act_on', 'insert', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (394, 3, 'M_customer_act_on', 'update', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (395, 3, 'M_customer_act_on', 'delete', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (396, 3, 'M_customer_act_on', 'getdata', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (398, 3, 'M_customer_data', 'index', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (399, 3, 'M_customer_data', 'insert', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (400, 3, 'M_customer_data', 'update', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (401, 3, 'M_customer_data', 'delete', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (402, 3, 'M_customer_data', 'getdata', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (403, 3, 'M_customer_data', 'getidentitas', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (404, 3, 'M_customer_job', 'index', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (405, 3, 'M_customer_job', 'insert', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (406, 3, 'M_customer_job', 'update', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (407, 3, 'M_customer_job', 'delete', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (408, 3, 'M_customer_job', 'getdata', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (409, 3, 'M_customer_job', 'getjob', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (413, 3, 'M_customer_type', 'index', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (414, 3, 'M_customer_type', 'insert', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (415, 3, 'M_customer_type', 'update', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (416, 3, 'M_customer_type', 'delete', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (417, 3, 'M_customer_type', 'getdata', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (418, 3, 'M_customer_type', 'gettype', '', 1, '2025-03-04 09:42:24', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (425, 3, 'M_exchange_rate', 'index', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (426, 3, 'M_exchange_rate', 'insert', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (427, 3, 'M_exchange_rate', 'update', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (428, 3, 'M_exchange_rate', 'delete', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (429, 3, 'M_exchange_rate', 'getdata', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (430, 3, 'M_nationality', 'index', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (431, 3, 'M_nationality', 'insert', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (432, 3, 'M_nationality', 'update', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (433, 3, 'M_nationality', 'delete', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (434, 3, 'M_nationality', 'getdata', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (435, 3, 'M_nationality', 'getnationality', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (436, 3, 'M_payment_type', 'index', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (437, 3, 'M_payment_type', 'insert', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (438, 3, 'M_payment_type', 'update', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (439, 3, 'M_payment_type', 'delete', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (440, 3, 'M_payment_type', 'getdata', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (441, 3, 'M_payment_type', 'getpaymenttype', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (442, 3, 'Store', 'index', '', 1, '2025-03-04 09:43:00', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (445, 3, 'M_currency', 'insert', '', 1, '2025-03-04 09:43:15', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (446, 3, 'M_currency', 'update', '', 1, '2025-03-04 09:43:15', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (447, 3, 'M_currency', 'delete', '', 1, '2025-03-04 09:43:15', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (448, 3, 'M_currency', 'getdata', '', 1, '2025-03-04 09:43:15', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (449, 3, 'M_currency', 'getcurrencybyid', '', 1, '2025-03-04 09:43:15', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (450, 3, 'M_currency', 'getcurrency', '', 1, '2025-03-04 09:43:15', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (451, 3, 'M_currency', 'getcurrencytrx', '', 1, '2025-03-04 09:43:15', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (452, 1, 'Group_menu', 'getdatamenu', '', 1, '2025-03-04 09:46:54', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (453, 1, 'Group_menu', 'getmenu', '', 1, '2025-03-04 09:46:54', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (454, 1, 'Menu', 'getdata', '', 1, '2025-03-04 09:46:54', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (458, 1, 'M_store', 'getdata', '', 1, '2025-03-04 09:50:39', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (459, 1, 'M_store', 'getstore', '', 1, '2025-03-04 09:50:39', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (460, 1, 'M_store', 'getstoreTrx', '', 1, '2025-03-04 09:50:39', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (461, 1, 'M_trxdate', 'getdata', '', 1, '2025-03-04 09:50:39', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (462, 1, 'M_trxlist', 'getdata', '', 1, '2025-03-04 09:50:39', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (464, 1, 'Group', 'getdata', '', 1, '2025-03-04 09:50:39', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (465, 1, 'Level', 'getdata', '', 1, '2025-03-04 09:50:39', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (466, 1, 'User', 'getdata', '', 1, '2025-03-04 09:50:53', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (467, 1, 'User', 'getusergroup', '', 1, '2025-03-04 09:50:53', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (468, 1, 'User', 'getuserlevel', '', 1, '2025-03-04 09:50:53', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (469, 1, 'User', 'getdatauser', '', 1, '2025-03-04 09:50:53', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (470, 1, 'User', 'getcreatedby', '', 1, '2025-03-04 09:50:53', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (473, 3, 'Store', 'getdata', '', 1, '2025-03-04 10:00:31', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (474, 3, 'Ppatk_dttot', 'getdata', '', 1, '2025-03-04 10:00:31', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (477, 3, 'Transaction_buysell_task', 'getdata', '', 1, '2025-03-04 10:00:31', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (479, 3, 'Customer', 'excel', '', 1, '2025-03-04 10:16:03', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (485, 1, 'User', 'getcountuserbystoreid', '', 1, '2025-03-05 15:29:16', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (487, 3, 'M_currency', 'index', '', 1, '2025-03-05 15:40:14', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (488, 3, 'M_store', 'getregion', '', 1, '2025-03-05 16:37:03', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (489, 6, 'Change_pass', 'index', '', 1, '2025-03-06 13:10:59', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (490, 6, 'Change_pass', 'update', '', 1, '2025-03-06 13:10:59', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (491, 6, 'Home', 'index', '', 1, '2025-03-06 13:11:04', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (492, 6, 'Transaction_buysell_list', 'index', '', 1, '2025-03-06 13:15:17', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (493, 6, 'Transaction_buysell_list', 'getdata', '', 1, '2025-03-06 13:15:17', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (494, 6, 'Transaction_buysell_list', 'excel', '', 1, '2025-03-06 13:15:17', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (495, 6, 'Summary_buysell_by_date', 'index', '', 1, '2025-03-06 13:15:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (496, 6, 'Summary_buysell_by_date', 'getdata', '', 1, '2025-03-06 13:15:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (497, 6, 'Summary_buysell_by_date', 'gettotal', '', 1, '2025-03-06 13:15:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (498, 6, 'Summary_buysell_by_date', 'getcount', '', 1, '2025-03-06 13:15:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (499, 6, 'Summary_buysell_by_month', 'index', '', 1, '2025-03-06 13:15:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (500, 6, 'Summary_buysell_by_month', 'getdata', '', 1, '2025-03-06 13:15:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (501, 6, 'Summary_buysell_by_month', 'gettotal', '', 1, '2025-03-06 13:15:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (502, 6, 'Summary_buysell_by_month', 'getcount', '', 1, '2025-03-06 13:15:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (503, 6, 'Summary_buysell_by_year', 'index', '', 1, '2025-03-06 13:15:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (504, 6, 'Summary_buysell_by_year', 'getdata', '', 1, '2025-03-06 13:15:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (505, 6, 'Summary_buysell_by_year', 'gettotal', '', 1, '2025-03-06 13:15:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (506, 6, 'Summary_buysell_by_year', 'getcount', '', 1, '2025-03-06 13:15:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (507, 6, 'M_store', 'getregion', '', 1, '2025-03-06 13:17:10', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (512, 4, 'Summary_buysell_by_date', 'index', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (513, 4, 'Summary_buysell_by_date', 'getdata', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (514, 4, 'Summary_buysell_by_date', 'gettotal', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (515, 4, 'Summary_buysell_by_date', 'getcount', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (516, 4, 'Summary_buysell_by_month', 'index', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (517, 4, 'Summary_buysell_by_month', 'getdata', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (518, 4, 'Summary_buysell_by_month', 'gettotal', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (519, 4, 'Summary_buysell_by_month', 'getcount', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (520, 4, 'Summary_buysell_by_year', 'index', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (521, 4, 'Summary_buysell_by_year', 'getdata', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (522, 4, 'Summary_buysell_by_year', 'gettotal', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (523, 4, 'Summary_buysell_by_year', 'getcount', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (524, 4, 'Transaction_buysell_list', 'index', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (525, 4, 'Transaction_buysell_list', 'getdata', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (526, 4, 'Transaction_buysell_list', 'excel', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (532, 4, 'Transaction_buysell_task', 'index', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (533, 4, 'Transaction_buysell_task', 'getdata', '', 1, '2025-03-06 13:34:05', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (534, 4, 'Customer', 'index', '', 1, '2025-03-06 13:34:21', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (535, 4, 'Customer', 'getdata', '', 1, '2025-03-06 13:34:21', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (536, 4, 'Customer', 'excel', '', 1, '2025-03-06 13:34:21', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (545, 4, 'M_customer_data', 'getidentitas', '', 1, '2025-03-06 13:34:40', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (546, 4, 'M_customer_job', 'getjob', '', 1, '2025-03-06 13:34:40', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (547, 4, 'M_customer_type', 'gettype', '', 1, '2025-03-06 13:34:40', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (548, 4, 'Dashboard_buysell', 'index', '', 1, '2025-03-06 13:34:50', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (549, 4, 'Dashboard_buysell', 'getlastupdated', '', 1, '2025-03-06 13:34:50', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (550, 4, 'Dashboard_buysell', 'getdatatable1', '', 1, '2025-03-06 13:34:50', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (551, 4, 'Dashboard_buysell', 'getchart1', '', 1, '2025-03-06 13:34:50', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (552, 4, 'Dashboard_buysell', 'getdatatable2', '', 1, '2025-03-06 13:34:50', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (553, 4, 'Dashboard_buysell', 'getchart2', '', 1, '2025-03-06 13:34:50', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (554, 4, 'M_currency', 'getcurrency', '', 1, '2025-03-06 13:35:31', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (557, 4, 'M_exchange_rate', 'index', '', 1, '2025-03-06 13:36:53', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (558, 4, 'M_exchange_rate', 'insert', '', 1, '2025-03-06 13:36:53', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (559, 4, 'M_exchange_rate', 'update', '', 1, '2025-03-06 13:36:53', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (560, 4, 'M_exchange_rate', 'delete', '', 1, '2025-03-06 13:36:53', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (561, 4, 'M_exchange_rate', 'getdata', '', 1, '2025-03-06 13:36:53', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (562, 4, 'M_nationality', 'getnationality', '', 1, '2025-03-06 13:36:53', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (563, 4, 'M_payment_type', 'getpaymenttype', '', 1, '2025-03-06 13:36:53', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (564, 4, 'M_store', 'getregion', '', 1, '2025-03-06 13:36:53', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (592, 1, 'M_trxlist', 'gettrxlist', '', 1, '2025-03-07 09:32:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (597, 3, 'M_customer_act_on', 'getacton', '', 1, '2025-03-08 08:50:29', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (599, 4, 'M_customer_act_on', 'getacton', '', 1, '2025-03-08 08:50:59', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (603, 3, 'Api_ap', 'ap_login', '', 1, '2025-03-15 17:11:08', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (604, 3, 'Api_ap', 'ap_post_api', '', 1, '2025-03-15 17:11:08', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (605, 3, 'Api_ap', 'ap_input_trx', '', 1, '2025-03-15 17:11:08', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (606, 3, 'Api_ap', 'ap_adjustment_trx', '', 1, '2025-03-15 17:11:08', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (607, 3, 'Api_ap', 'ap_get_trx', '', 1, '2025-03-15 17:11:08', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (608, 3, 'Api_ap_adjustment', 'index', '', 1, '2025-03-15 17:11:08', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (609, 3, 'Api_ap_adjustment', 'getdata', '', 1, '2025-03-15 17:11:08', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (610, 3, 'Api_ap_get', 'index', '', 1, '2025-03-15 17:11:08', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (611, 3, 'Api_ap_get', 'excel', '', 1, '2025-03-15 17:11:08', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (612, 3, 'Api_ap_input', 'index', '', 1, '2025-03-15 17:11:30', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (613, 3, 'Api_ap_input', 'getdata', '', 1, '2025-03-15 17:11:30', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (614, 4, 'Api_ap', 'ap_login', '', 1, '2025-03-15 17:11:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (615, 4, 'Api_ap', 'ap_post_api', '', 1, '2025-03-15 17:11:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (616, 4, 'Api_ap', 'ap_input_trx', '', 1, '2025-03-15 17:11:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (617, 4, 'Api_ap', 'ap_adjustment_trx', '', 1, '2025-03-15 17:11:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (618, 4, 'Api_ap', 'ap_get_trx', '', 1, '2025-03-15 17:11:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (619, 4, 'Api_ap_adjustment', 'index', '', 1, '2025-03-15 17:11:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (620, 4, 'Api_ap_adjustment', 'getdata', '', 1, '2025-03-15 17:11:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (621, 4, 'Api_ap_get', 'index', '', 1, '2025-03-15 17:11:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (622, 4, 'Api_ap_get', 'excel', '', 1, '2025-03-15 17:11:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (623, 4, 'Api_ap_input', 'index', '', 1, '2025-03-15 17:11:59', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (624, 4, 'Api_ap_input', 'getdata', '', 1, '2025-03-15 17:11:59', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (625, 3, 'User', 'getdatacashier', '', 1, '2025-03-18 19:58:51', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (626, 4, 'User', 'getdatacashier', '', 1, '2025-03-18 19:59:12', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (627, 3, 'Customer_form', 'index', '', 1, '2025-03-18 20:01:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (628, 3, 'Customer_form', 'generate_code', '', 1, '2025-03-18 20:01:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (629, 3, 'Customer_form', 'insert', '', 1, '2025-03-18 20:01:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (630, 3, 'Customer_form', 'update', '', 1, '2025-03-18 20:01:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (631, 3, 'Customer_form', 'delete', '', 1, '2025-03-18 20:01:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (632, 3, 'Customer_form', 'getcustomerbyid', '', 1, '2025-03-18 20:01:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (633, 3, 'Customer_form', 'ceknikdttot', '', 1, '2025-03-18 20:01:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (634, 3, 'Customer_form', 'add_foto', '', 1, '2025-03-18 20:01:33', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (638, 4, 'Customer_form', 'index', '', 1, '2025-03-18 20:02:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (639, 4, 'Customer_form', 'generate_code', '', 1, '2025-03-18 20:02:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (640, 4, 'Customer_form', 'insert', '', 1, '2025-03-18 20:02:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (641, 4, 'Customer_form', 'update', '', 1, '2025-03-18 20:02:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (642, 4, 'Customer_form', 'delete', '', 1, '2025-03-18 20:02:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (643, 4, 'Customer_form', 'getcustomerbyid', '', 1, '2025-03-18 20:02:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (644, 4, 'Customer_form', 'ceknikdttot', '', 1, '2025-03-18 20:02:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (645, 4, 'Customer_form', 'add_foto', '', 1, '2025-03-18 20:02:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (646, 4, 'Transaction_buysell', 'index', '', 1, '2025-03-18 20:03:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (647, 4, 'Transaction_buysell', 'cekclosingtrx', '', 1, '2025-03-18 20:03:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (648, 4, 'Transaction_buysell', 'generate_code_confirm', '', 1, '2025-03-18 20:03:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (650, 4, 'Transaction_buysell', 'update_header', '', 1, '2025-03-18 20:03:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (651, 4, 'Transaction_buysell', 'insert_detail', '', 1, '2025-03-18 20:03:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (652, 4, 'Transaction_buysell', 'delete_detail', '', 1, '2025-03-18 20:03:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (653, 4, 'Transaction_buysell', 'show_header', '', 1, '2025-03-18 20:03:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (654, 4, 'Transaction_buysell', 'show_detail', '', 1, '2025-03-18 20:03:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (655, 4, 'Transaction_buysell', 'getstockbyid', '', 1, '2025-03-18 20:03:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (656, 4, 'Transaction_buysell', 'getratebyid', '', 1, '2025-03-18 20:03:51', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (657, 4, 'Transaction_buysell', 'getshowid', '', 1, '2025-03-18 20:03:51', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (658, 4, 'Transaction_buysell', 'confirm_task', '', 1, '2025-03-18 20:03:51', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (659, 4, 'Transaction_buysell', 'cancel_trx', '', 1, '2025-03-18 20:03:51', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (660, 4, 'Transaction_buysell', 'insert_payment', '', 1, '2025-03-18 20:03:51', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (661, 4, 'Transaction_buysell', 'show_detail_payment', '', 1, '2025-03-18 20:03:51', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (662, 4, 'Transaction_buysell', 'delete_detail_payment', '', 1, '2025-03-18 20:03:51', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (663, 3, 'Transaction_buysell', 'index', '', 1, '2025-03-18 20:04:40', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (664, 3, 'Transaction_buysell', 'cekclosingtrx', '', 1, '2025-03-18 20:04:40', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (665, 3, 'Transaction_buysell', 'generate_code_confirm', '', 1, '2025-03-18 20:04:40', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (667, 3, 'Transaction_buysell', 'update_header', '', 1, '2025-03-18 20:04:40', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (668, 3, 'Transaction_buysell', 'insert_detail', '', 1, '2025-03-18 20:04:40', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (669, 3, 'Transaction_buysell', 'delete_detail', '', 1, '2025-03-18 20:04:40', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (670, 3, 'Transaction_buysell', 'show_header', '', 1, '2025-03-18 20:04:40', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (671, 3, 'Transaction_buysell', 'show_detail', '', 1, '2025-03-18 20:04:40', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (672, 3, 'Transaction_buysell', 'getstockbyid', '', 1, '2025-03-18 20:04:40', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (673, 3, 'Transaction_buysell', 'getratebyid', '', 1, '2025-03-18 20:04:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (674, 3, 'Transaction_buysell', 'getshowid', '', 1, '2025-03-18 20:04:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (675, 3, 'Transaction_buysell', 'confirm_task', '', 1, '2025-03-18 20:04:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (676, 3, 'Transaction_buysell', 'cancel_trx', '', 1, '2025-03-18 20:04:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (677, 3, 'Transaction_buysell', 'insert_payment', '', 1, '2025-03-18 20:04:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (678, 3, 'Transaction_buysell', 'show_detail_payment', '', 1, '2025-03-18 20:04:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (679, 3, 'Transaction_buysell', 'delete_detail_payment', '', 1, '2025-03-18 20:04:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (680, 3, 'Summary_buysell_by_date', 'dbquery', '', 1, '2025-03-21 16:11:46', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (681, 3, 'Summary_buysell_by_date', 'exportpdf', '', 1, '2025-03-21 16:11:46', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (682, 3, 'Summary_buysell_by_date', 'excelcellColor', '', 1, '2025-03-21 16:11:46', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (683, 3, 'Summary_buysell_by_date', 'excel', '', 1, '2025-03-21 16:11:46', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (684, 3, 'Summary_buysell_by_month', 'dbquery', '', 1, '2025-03-21 16:11:46', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (685, 3, 'Summary_buysell_by_month', 'exportpdf', '', 1, '2025-03-21 16:11:46', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (686, 3, 'Summary_buysell_by_month', 'excelcellColor', '', 1, '2025-03-21 16:11:46', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (687, 3, 'Summary_buysell_by_month', 'excel', '', 1, '2025-03-21 16:11:46', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (688, 3, 'Summary_buysell_by_year', 'dbquery', '', 1, '2025-03-21 16:11:46', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (689, 3, 'Summary_buysell_by_year', 'exportpdf', '', 1, '2025-03-21 16:11:46', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (690, 3, 'Summary_buysell_by_year', 'excelcellColor', '', 1, '2025-03-21 16:12:14', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (691, 3, 'Summary_buysell_by_year', 'excel', '', 1, '2025-03-21 16:12:14', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (692, 3, 'Transaction_buysell', 'update_payment_cashierby', '', 1, '2025-03-21 16:12:14', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (693, 4, 'Summary_buysell_by_date', 'dbquery', '', 1, '2025-03-21 16:12:29', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (694, 4, 'Summary_buysell_by_date', 'exportpdf', '', 1, '2025-03-21 16:12:29', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (695, 4, 'Summary_buysell_by_date', 'excelcellColor', '', 1, '2025-03-21 16:12:29', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (696, 4, 'Summary_buysell_by_date', 'excel', '', 1, '2025-03-21 16:12:29', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (697, 4, 'Summary_buysell_by_month', 'dbquery', '', 1, '2025-03-21 16:12:29', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (698, 4, 'Summary_buysell_by_month', 'exportpdf', '', 1, '2025-03-21 16:12:29', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (699, 4, 'Summary_buysell_by_month', 'excelcellColor', '', 1, '2025-03-21 16:12:29', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (700, 4, 'Summary_buysell_by_month', 'excel', '', 1, '2025-03-21 16:12:29', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (701, 4, 'Summary_buysell_by_year', 'dbquery', '', 1, '2025-03-21 16:12:29', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (702, 4, 'Summary_buysell_by_year', 'exportpdf', '', 1, '2025-03-21 16:12:29', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (703, 4, 'Summary_buysell_by_year', 'excelcellColor', '', 1, '2025-03-21 16:12:29', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (704, 4, 'Summary_buysell_by_year', 'excel', '', 1, '2025-03-21 16:12:29', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (705, 4, 'Transaction_buysell', 'update_payment_cashierby', '', 1, '2025-03-21 16:14:36', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (712, 3, 'M_cb', 'index', '', 1, '2025-03-22 08:37:55', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (713, 3, 'M_cb', 'insert', '', 1, '2025-03-22 08:37:55', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (714, 3, 'M_cb', 'update', '', 1, '2025-03-22 08:37:55', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (715, 3, 'M_cb', 'delete', '', 1, '2025-03-22 08:37:55', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (716, 3, 'M_cb', 'getdata', '', 1, '2025-03-22 08:37:55', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (717, 3, 'M_cb', 'getmcb', '', 1, '2025-03-22 08:37:55', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (718, 5, 'M_cb', 'getmcb', '', 1, '2025-03-22 08:38:07', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (719, 3, 'M_trxlist', 'gettrxlist', '', 1, '2025-03-22 08:59:01', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (720, 3, 'M_cb', 'generate_code', '', 1, '2025-03-22 10:23:10', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (746, 2, 'Customer', 'index', '', 1, '2025-03-23 10:23:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (747, 2, 'Customer', 'getdata', '', 1, '2025-03-23 10:23:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (748, 2, 'Customer', 'excel', '', 1, '2025-03-23 10:23:43', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (749, 2, 'M_store', 'getregion', '', 1, '2025-03-23 10:26:31', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (750, 2, 'M_store', 'getstore', '', 1, '2025-03-23 10:29:47', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (764, 5, 'M_store', 'getregion', '', 1, '2025-03-24 21:40:35', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (765, 5, 'M_cb_pos', 'getmcbpos', '', 1, '2025-03-24 21:40:48', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (766, 3, 'M_cb_pos', 'index', '', 1, '2025-03-24 21:41:27', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (767, 3, 'M_cb_pos', 'generate_code', '', 1, '2025-03-24 21:41:27', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (768, 3, 'M_cb_pos', 'insert', '', 1, '2025-03-24 21:41:27', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (769, 3, 'M_cb_pos', 'update', '', 1, '2025-03-24 21:41:27', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (770, 3, 'M_cb_pos', 'delete', '', 1, '2025-03-24 21:41:27', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (771, 3, 'M_cb_pos', 'getdata', '', 1, '2025-03-24 21:41:27', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (772, 3, 'M_cb_pos', 'getmcbpos', '', 1, '2025-03-24 21:41:27', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (779, 5, 'Cb_balance', 'index', '', 1, '2025-03-25 09:41:54', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (780, 5, 'Cb_balance', 'getdata', '', 1, '2025-03-25 09:41:54', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (781, 4, 'M_cb', 'getmcb', '', 1, '2025-04-04 10:14:42', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (782, 4, 'M_cb_pos', 'getmcbpos', '', 1, '2025-04-04 10:14:42', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (784, 3, 'Transaction_buysell', 'getthreshold', '', 1, '2025-04-04 13:45:07', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (785, 3, 'Transaction_buysell', 'printnota', '', 1, '2025-04-04 13:45:07', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (787, 4, 'Transaction_buysell', 'getthreshold', '', 1, '2025-04-04 13:47:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (788, 4, 'Transaction_buysell', 'printnota', '', 1, '2025-04-04 13:47:28', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (789, 3, 'Transaction_buysell', 'indexs', '', 1, '2025-04-04 13:52:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (790, 4, 'Transaction_buysell', 'indexs', '', 1, '2025-04-04 13:53:11', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (791, 6, 'Transaction_buysell', 'indexs', '', 1, '2025-04-04 16:05:39', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (792, 6, 'Transaction_buysell', 'show_header', '', 1, '2025-04-04 16:05:39', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (793, 6, 'Transaction_buysell', 'show_detail', '', 1, '2025-04-04 16:05:39', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (794, 3, 'M_cb', 'getmcbpayment', '', 1, '2025-04-05 20:34:25', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (795, 3, 'M_cb_pos', 'getmcbpospayment', '', 1, '2025-04-05 20:34:25', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (796, 4, 'M_cb', 'getmcbpayment', '', 1, '2025-04-05 20:34:37', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (797, 4, 'M_cb_pos', 'getmcbpospayment', '', 1, '2025-04-05 20:34:46', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (798, 2, 'Cb_balance', 'index', '', 1, '2025-04-06 15:24:15', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (799, 2, 'Cb_balance', 'getdata', '', 1, '2025-04-06 15:24:15', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (800, 2, 'Cb_list', 'index', '', 1, '2025-04-06 15:24:15', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (801, 2, 'Cb_list', 'getdata', '', 1, '2025-04-06 15:24:15', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (803, 2, 'Summary_buysell_by_date', 'index', '', 1, '2025-04-06 15:29:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (804, 2, 'Summary_buysell_by_date', 'dbquery', '', 1, '2025-04-06 15:29:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (805, 2, 'Summary_buysell_by_date', 'getdata', '', 1, '2025-04-06 15:29:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (806, 2, 'Summary_buysell_by_date', 'exportpdf', '', 1, '2025-04-06 15:29:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (807, 2, 'Summary_buysell_by_date', 'excelcellColor', '', 1, '2025-04-06 15:29:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (808, 2, 'Summary_buysell_by_date', 'excel', '', 1, '2025-04-06 15:29:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (809, 2, 'Summary_buysell_by_month', 'index', '', 1, '2025-04-06 15:29:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (810, 2, 'Summary_buysell_by_month', 'dbquery', '', 1, '2025-04-06 15:29:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (811, 2, 'Summary_buysell_by_month', 'getdata', '', 1, '2025-04-06 15:29:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (812, 2, 'Summary_buysell_by_month', 'exportpdf', '', 1, '2025-04-06 15:29:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (813, 2, 'Summary_buysell_by_month', 'excelcellColor', '', 1, '2025-04-06 15:30:10', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (814, 2, 'Summary_buysell_by_month', 'excel', '', 1, '2025-04-06 15:30:10', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (815, 2, 'Summary_buysell_by_year', 'index', '', 1, '2025-04-06 15:30:10', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (816, 2, 'Summary_buysell_by_year', 'dbquery', '', 1, '2025-04-06 15:30:10', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (817, 2, 'Summary_buysell_by_year', 'getdata', '', 1, '2025-04-06 15:30:10', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (818, 2, 'Summary_buysell_by_year', 'exportpdf', '', 1, '2025-04-06 15:30:10', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (819, 2, 'Summary_buysell_by_year', 'excelcellColor', '', 1, '2025-04-06 15:30:10', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (820, 2, 'Summary_buysell_by_year', 'excel', '', 1, '2025-04-06 15:30:10', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (831, 5, 'Cb_list', 'index', '', 1, '2025-04-07 13:37:31', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (832, 5, 'Cb_list', 'getdata', '', 1, '2025-04-07 13:37:31', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (833, 5, 'Cb_list', 'excel', '', 1, '2025-04-07 13:37:31', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (840, 5, 'Cb_list', 'generate_cb_buysell', '', 1, '2025-04-07 14:53:46', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (841, 5, 'Cb_list_new', 'index', '', 1, '2025-04-07 14:54:06', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (842, 5, 'Cb_list_new', 'insert', '', 1, '2025-04-07 14:54:06', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (843, 5, 'Cb_list_new', 'delete_detail', '', 1, '2025-04-07 14:54:06', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (844, 5, 'Cb_list_new', 'show_detail', '', 1, '2025-04-07 14:54:06', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (845, 5, 'Cb_list_new', 'cancel_trx', '', 1, '2025-04-07 14:54:06', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (846, 2, 'Cb_list_new', 'show_detail', '', 1, '2025-04-07 21:17:57', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (847, 5, 'Cb_list_new', 'show_header', '', 1, '2025-04-07 21:18:37', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (848, 2, 'Cb_list_new', 'show_header', '', 1, '2025-04-07 21:18:49', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (849, 2, 'Cb_list_new', 'index', '', 1, '2025-04-07 21:22:15', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (850, 2, 'Cb_balance', 'generate_cb_balance', '', 1, '2025-04-08 05:24:06', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (851, 5, 'Cb_list', 'excelcellColor', '', 1, '2025-04-09 05:25:04', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (852, 5, 'Cb_list_new', 'add_file', '', 1, '2025-04-09 05:25:04', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (853, 5, 'Cb_balance', 'generate_cb_balance', '', 1, '2025-04-09 05:25:22', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (854, 5, 'Cb_balance', 'exportpdf_rekap', '', 1, '2025-04-09 05:25:22', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (855, 5, 'Cb_balance', 'exportpdf_detail', '', 1, '2025-04-09 05:25:22', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (856, 2, 'Cb_balance', 'exportpdf_rekap', '', 1, '2025-04-09 05:25:53', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (857, 2, 'Cb_balance', 'exportpdf_detail', '', 1, '2025-04-09 05:25:53', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (858, 2, 'Cb_list', 'excelcellColor', '', 1, '2025-04-09 05:26:07', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (859, 2, 'Cb_list', 'excel', '', 1, '2025-04-09 05:26:07', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (860, 2, 'Export_data', 'index', '', 1, '2025-04-14 09:39:52', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (861, 3, 'Stock', 'index', '', 1, '2025-04-16 10:22:16', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (862, 3, 'Stock', 'getdata1', '', 1, '2025-04-16 10:22:16', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (863, 3, 'Stock', 'getdata2', '', 1, '2025-04-16 10:22:16', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (867, 3, 'Stock_price', 'index', '', 1, '2025-04-16 10:22:16', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (868, 3, 'Stock_price', 'getcurrencystock', '', 1, '2025-04-16 10:22:16', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (869, 3, 'Stock_price', 'getdata', '', 1, '2025-04-16 10:22:16', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (870, 3, 'Stock_price', 'excel', '', 1, '2025-04-16 10:22:16', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (871, 4, 'Stock', 'index', '', 1, '2025-04-16 10:22:46', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (872, 4, 'Stock', 'getdata1', '', 1, '2025-04-16 10:22:46', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (873, 4, 'Stock', 'getdata2', '', 1, '2025-04-16 10:22:46', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (877, 2, 'Stock', 'index', '', 1, '2025-04-16 10:23:06', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (878, 2, 'Stock', 'getdata1', '', 1, '2025-04-16 10:23:06', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (879, 2, 'Stock', 'getdata2', '', 1, '2025-04-16 10:23:06', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (883, 2, 'Stock_price', 'index', '', 1, '2025-04-16 10:23:06', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (884, 2, 'Stock_price', 'getcurrencystock', '', 1, '2025-04-16 10:23:06', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (885, 2, 'Stock_price', 'getdata', '', 1, '2025-04-16 10:23:06', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (886, 2, 'Stock_price', 'excel', '', 1, '2025-04-16 10:23:06', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (887, 3, 'Stock', 'generate_tr_stock_pull', '', 1, '2025-04-18 17:52:19', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (888, 3, 'Stock', 'generate_tr_stock_price', '', 1, '2025-04-18 17:52:19', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (889, 4, 'Stock', 'generate_tr_stock_pull', '', 1, '2025-04-18 17:52:54', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (890, 4, 'Stock', 'generate_tr_stock_price', '', 1, '2025-04-18 17:52:54', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (891, 2, 'Stock', 'generate_tr_stock_pull', '', 1, '2025-04-18 17:53:35', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (892, 2, 'Stock', 'generate_tr_stock_price', '', 1, '2025-04-18 17:53:35', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (893, 3, 'Summary_buysell_by_date', 'closing_trxdate', '', 1, '2025-04-18 18:10:23', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (894, 4, 'Summary_buysell_by_date', 'closing_trxdate', '', 1, '2025-04-18 18:10:32', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (895, 1, 'M_cb', 'index', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (896, 1, 'M_cb', 'generate_code', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (897, 1, 'M_cb', 'insert', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (898, 1, 'M_cb', 'update', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (899, 1, 'M_cb', 'delete', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (900, 1, 'M_cb', 'getdata', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (901, 1, 'M_cb', 'getmcb', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (902, 1, 'M_cb', 'getmcbpayment', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (903, 1, 'M_cb_pos', 'index', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (904, 1, 'M_cb_pos', 'generate_code', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (905, 1, 'M_cb_pos', 'insert', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (906, 1, 'M_cb_pos', 'update', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (907, 1, 'M_cb_pos', 'delete', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (908, 1, 'M_cb_pos', 'getdata', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (909, 1, 'M_cb_pos', 'getmcbpos', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (910, 1, 'M_cb_pos', 'getmcbpospayment', '', 1, '2025-04-21 12:49:09', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (911, 1, 'M_payment_type', 'getpaymenttype', '', 1, '2025-04-21 13:32:38', 1, NULL, NULL);
INSERT INTO `auth_group_role` VALUES (912, 1, 'M_cb', 'getmcbpurpose', '', 1, '2025-04-21 14:31:34', 1, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 233 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of auth_listmethod
-- ----------------------------
INSERT INTO `auth_listmethod` VALUES (1, 'Api_ap', 'ap_login', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (2, 'Api_ap', 'ap_post_api', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (3, 'Api_ap', 'ap_input_trx', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (4, 'Api_ap', 'ap_adjustment_trx', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (5, 'Api_ap', 'ap_get_trx', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (6, 'Api_ap', 'ap_get_store', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (7, 'Api_ap', 'excelcellColor', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (8, 'Api_ap_adjustment', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap_adjustment.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (9, 'Api_ap_adjustment', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap_adjustment.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (10, 'Api_ap_get', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap_get.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (11, 'Api_ap_get', 'excel', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap_get.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (12, 'Api_ap_input', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap_input.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (13, 'Api_ap_input', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\api\\controllers\\Api_ap_input.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (14, 'Cb_balance', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_balance.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (15, 'Cb_balance', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_balance.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (16, 'Cb_balance', 'generate_cb_balance', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_balance.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (17, 'Cb_balance', 'exportpdf_rekap', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_balance.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (18, 'Cb_balance', 'exportpdf_detail', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_balance.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (19, 'Cb_list', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_list.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (20, 'Cb_list', 'generate_cb_buysell', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_list.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (21, 'Cb_list', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_list.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (22, 'Cb_list', 'excelcellColor', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_list.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (23, 'Cb_list', 'excel', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_list.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (24, 'Cb_list_new', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_list_new.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (25, 'Cb_list_new', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_list_new.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (26, 'Cb_list_new', 'delete_detail', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_list_new.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (27, 'Cb_list_new', 'show_header', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_list_new.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (28, 'Cb_list_new', 'show_detail', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_list_new.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (29, 'Cb_list_new', 'cancel_trx', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_list_new.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (30, 'Cb_list_new', 'add_file', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\cb\\controllers\\Cb_list_new.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (31, 'Dashboard_buysell', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\dashboard\\controllers\\Dashboard_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (32, 'Dashboard_buysell', 'getlastupdated', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\dashboard\\controllers\\Dashboard_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (33, 'Dashboard_buysell', 'getdatatable1', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\dashboard\\controllers\\Dashboard_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (34, 'Dashboard_buysell', 'getchart1', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\dashboard\\controllers\\Dashboard_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (35, 'Dashboard_buysell', 'getdatatable2', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\dashboard\\controllers\\Dashboard_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (36, 'Dashboard_buysell', 'getchart2', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\dashboard\\controllers\\Dashboard_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (37, 'Export_data', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\export\\controllers\\Export_data.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (38, 'Export_data', 'excelcellColor', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\export\\controllers\\Export_data.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (39, 'Export_data', 'export_data', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\export\\controllers\\Export_data.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (40, 'Home', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\home\\controllers\\Home.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (41, 'M_cb', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (42, 'M_cb', 'generate_code', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (43, 'M_cb', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (44, 'M_cb', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (45, 'M_cb', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (46, 'M_cb', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (47, 'M_cb', 'getmcb', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (48, 'M_cb', 'getmcbpayment', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (49, 'M_cb', 'getmcbpurpose', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (50, 'M_cb_pos', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb_pos.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (51, 'M_cb_pos', 'generate_code', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb_pos.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (52, 'M_cb_pos', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb_pos.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (53, 'M_cb_pos', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb_pos.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (54, 'M_cb_pos', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb_pos.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (55, 'M_cb_pos', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb_pos.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (56, 'M_cb_pos', 'getmcbpos', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb_pos.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (57, 'M_cb_pos', 'getmcbpospayment', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_cb_pos.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (58, 'M_currency', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_currency.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (59, 'M_currency', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_currency.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (60, 'M_currency', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_currency.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (61, 'M_currency', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_currency.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (62, 'M_currency', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_currency.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (63, 'M_currency', 'getcurrencybyid', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_currency.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (64, 'M_currency', 'getcurrency', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_currency.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (65, 'M_currency', 'getcurrencytrx', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_currency.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (66, 'M_customer_act_on', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_act_on.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (67, 'M_customer_act_on', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_act_on.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (68, 'M_customer_act_on', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_act_on.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (69, 'M_customer_act_on', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_act_on.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (70, 'M_customer_act_on', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_act_on.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (71, 'M_customer_act_on', 'getacton', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_act_on.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (72, 'M_customer_data', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_data.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (73, 'M_customer_data', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_data.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (74, 'M_customer_data', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_data.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (75, 'M_customer_data', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_data.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (76, 'M_customer_data', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_data.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (77, 'M_customer_data', 'getidentitas', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_data.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (78, 'M_customer_job', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_job.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (79, 'M_customer_job', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_job.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (80, 'M_customer_job', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_job.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (81, 'M_customer_job', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_job.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (82, 'M_customer_job', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_job.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (83, 'M_customer_job', 'getjob', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_job.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (84, 'M_customer_type', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_type.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (85, 'M_customer_type', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_type.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (86, 'M_customer_type', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_type.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (87, 'M_customer_type', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_type.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (88, 'M_customer_type', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_type.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (89, 'M_customer_type', 'gettype', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_customer_type.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (90, 'M_exchange_rate', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_exchange_rate.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (91, 'M_exchange_rate', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_exchange_rate.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (92, 'M_exchange_rate', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_exchange_rate.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (93, 'M_exchange_rate', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_exchange_rate.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (94, 'M_exchange_rate', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_exchange_rate.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (95, 'M_exchange_rate', 'exportpdf', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_exchange_rate.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (96, 'M_nationality', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_nationality.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (97, 'M_nationality', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_nationality.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (98, 'M_nationality', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_nationality.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (99, 'M_nationality', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_nationality.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (100, 'M_nationality', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_nationality.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (101, 'M_nationality', 'getnationality', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_nationality.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (102, 'M_payment_type', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_payment_type.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (103, 'M_payment_type', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_payment_type.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (104, 'M_payment_type', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_payment_type.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (105, 'M_payment_type', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_payment_type.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (106, 'M_payment_type', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_payment_type.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (107, 'M_payment_type', 'getpaymenttype', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_payment_type.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (108, 'M_store', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_store.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (109, 'M_store', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_store.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (110, 'M_store', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_store.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (111, 'M_store', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_store.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (112, 'M_store', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_store.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (113, 'M_store', 'getstore', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_store.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (114, 'M_store', 'getregion', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_store.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (115, 'M_trxdate', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxdate.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (116, 'M_trxdate', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxdate.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (117, 'M_trxdate', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxdate.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (118, 'M_trxdate', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxdate.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (119, 'M_trxdate', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxdate.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (120, 'M_trxlist', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxlist.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (121, 'M_trxlist', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxlist.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (122, 'M_trxlist', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxlist.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (123, 'M_trxlist', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxlist.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (124, 'M_trxlist', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxlist.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (125, 'M_trxlist', 'gettrxlist', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxlist.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (126, 'M_trxlist', 'gettrxlistbuysell', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxlist.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (127, 'M_trxlist', 'gettrxlistcashbank', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\M_trxlist.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (128, 'Store', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\Store.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (129, 'Store', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\master_data\\controllers\\Store.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (130, 'Group_menu', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\menu\\controllers\\Group_menu.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (131, 'Group_menu', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\menu\\controllers\\Group_menu.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (132, 'Group_menu', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\menu\\controllers\\Group_menu.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (133, 'Group_menu', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\menu\\controllers\\Group_menu.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (134, 'Group_menu', 'getdatamenu', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\menu\\controllers\\Group_menu.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (135, 'Group_menu', 'getmenu', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\menu\\controllers\\Group_menu.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (136, 'Menu', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\menu\\controllers\\Menu.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (137, 'Menu', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\menu\\controllers\\Menu.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (138, 'Menu', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\menu\\controllers\\Menu.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (139, 'Menu', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\menu\\controllers\\Menu.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (140, 'Menu', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\menu\\controllers\\Menu.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (141, 'Ppatk_dttot', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\ppatk\\controllers\\Ppatk_dttot.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (142, 'Ppatk_dttot', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\ppatk\\controllers\\Ppatk_dttot.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (143, 'Ppatk_dttot', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\ppatk\\controllers\\Ppatk_dttot.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (144, 'Ppatk_dttot', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\ppatk\\controllers\\Ppatk_dttot.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (145, 'Ppatk_dttot', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\ppatk\\controllers\\Ppatk_dttot.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (146, 'Stock', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\stock\\controllers\\Stock.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (147, 'Stock', 'getdata1', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\stock\\controllers\\Stock.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (148, 'Stock', 'getdata2', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\stock\\controllers\\Stock.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (149, 'Stock', 'generate_tr_stock_pull', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\stock\\controllers\\Stock.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (150, 'Stock', 'generate_tr_stock_price', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\stock\\controllers\\Stock.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (151, 'Stock_price', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\stock\\controllers\\Stock_price.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (152, 'Stock_price', 'getcurrencystock', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\stock\\controllers\\Stock_price.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (153, 'Stock_price', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\stock\\controllers\\Stock_price.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (154, 'Stock_price', 'excel', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\stock\\controllers\\Stock_price.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (155, 'Summary_buysell_by_date', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_date.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (156, 'Summary_buysell_by_date', 'closing_trxdate', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_date.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (157, 'Summary_buysell_by_date', 'dbquery', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_date.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (158, 'Summary_buysell_by_date', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_date.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (159, 'Summary_buysell_by_date', 'exportpdf', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_date.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (160, 'Summary_buysell_by_date', 'excelcellColor', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_date.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (161, 'Summary_buysell_by_date', 'excel', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_date.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (162, 'Summary_buysell_by_month', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_month.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (163, 'Summary_buysell_by_month', 'dbquery', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_month.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (164, 'Summary_buysell_by_month', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_month.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (165, 'Summary_buysell_by_month', 'exportpdf', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_month.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (166, 'Summary_buysell_by_month', 'excelcellColor', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_month.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (167, 'Summary_buysell_by_month', 'excel', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_month.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (168, 'Summary_buysell_by_year', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_year.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (169, 'Summary_buysell_by_year', 'dbquery', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_year.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (170, 'Summary_buysell_by_year', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_year.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (171, 'Summary_buysell_by_year', 'exportpdf', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_year.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (172, 'Summary_buysell_by_year', 'excelcellColor', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_year.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (173, 'Summary_buysell_by_year', 'excel', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\summary\\controllers\\Summary_buysell_by_year.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (174, 'Customer', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (175, 'Customer', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (176, 'Customer_form', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer_form.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (177, 'Customer_form', 'generate_code', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer_form.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (178, 'Customer_form', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer_form.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (179, 'Customer_form', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer_form.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (180, 'Customer_form', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer_form.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (181, 'Customer_form', 'getcustomerbyid', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer_form.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (182, 'Customer_form', 'ceknikdttot', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer_form.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (183, 'Customer_form', 'add_foto', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Customer_form.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (184, 'Transaction_buysell', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (185, 'Transaction_buysell', 'indexs', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (186, 'Transaction_buysell', 'cekclosingtrx', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (187, 'Transaction_buysell', 'generate_code_confirm', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (188, 'Transaction_buysell', 'update_header', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (189, 'Transaction_buysell', 'insert_detail', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (190, 'Transaction_buysell', 'delete_detail', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (191, 'Transaction_buysell', 'show_header', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (192, 'Transaction_buysell', 'show_detail', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (193, 'Transaction_buysell', 'getstockbyid', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (194, 'Transaction_buysell', 'getratebyid', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (195, 'Transaction_buysell', 'getshowid', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (196, 'Transaction_buysell', 'getthreshold', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (197, 'Transaction_buysell', 'confirm_task', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (198, 'Transaction_buysell', 'cancel_trx', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (199, 'Transaction_buysell', 'insert_payment', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (200, 'Transaction_buysell', 'show_detail_payment', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (201, 'Transaction_buysell', 'delete_detail_payment', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (202, 'Transaction_buysell', 'update_payment_cashierby', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (203, 'Transaction_buysell', 'printnota', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (204, 'Transaction_buysell_list', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell_list.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (205, 'Transaction_buysell_list', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell_list.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (206, 'Transaction_buysell_list', 'excel', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell_list.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (207, 'Transaction_buysell_task', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell_task.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (208, 'Transaction_buysell_task', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\transaction\\controllers\\Transaction_buysell_task.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (209, 'Change_pass', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\Change_pass.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (210, 'Change_pass', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\Change_pass.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (211, 'Group', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\Group.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (212, 'Group', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\Group.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (213, 'Group', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\Group.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (214, 'Group', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\Group.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (215, 'Group', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\Group.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (216, 'Level', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\Level.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (217, 'Level', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\Level.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (218, 'Level', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\Level.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (219, 'Level', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\Level.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (220, 'Level', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\Level.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (221, 'User', 'index', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (222, 'User', 'insert', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (223, 'User', 'update', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (224, 'User', 'delete', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (225, 'User', 'getdata', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (226, 'User', 'getusergroup', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (227, 'User', 'getuserlevel', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (228, 'User', 'getdatauser', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (229, 'User', 'getdatacashier', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (230, 'User', 'getcreatedby', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (231, 'User', 'getuserbyid', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-04-21 14:30:55', 1);
INSERT INTO `auth_listmethod` VALUES (232, 'User', 'getcountuserbystoreid', '', 'E:\\server\\Apache24\\htdocs\\dbepos\\ciweb-modules\\user\\controllers\\User.php', '2025-04-21 14:30:55', 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of auth_menu
-- ----------------------------
INSERT INTO `auth_menu` VALUES (1, 'App Setting', 'fa fa-minus-square-o', '#', 1, '2024-04-01 10:00:00', NULL, '2025-04-19 06:33:13', 1);
INSERT INTO `auth_menu` VALUES (2, 'Method List', 'fa fa-minus-square-o', 'admin/listmethod', 1, '2024-04-01 10:00:00', NULL, '2025-04-18 11:33:43', 1);
INSERT INTO `auth_menu` VALUES (3, 'Role Setting', 'fa fa-minus-square-o', 'admin/role', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (4, 'Menu', 'fa fa-minus-square-o', 'menu', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (5, 'Group Menu', 'fa fa-minus-square-o', 'menu/group-menu', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (6, 'User Setting', 'fa fa-minus-square-o', '#', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (7, 'User', 'fa fa-minus-square-o', 'user', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (8, 'User group', 'fa fa-minus-square-o', 'user/group', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (9, 'Menu Setting', 'fa fa-minus-square-o', '#', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (10, 'User Level', 'fa fa-minus-square-o', 'user/Level', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (13, 'File', 'fa fa-minus-square-o', '#', 1, '2024-04-01 10:00:00', NULL, '2025-03-03 10:35:10', 1);
INSERT INTO `auth_menu` VALUES (14, 'Buy/Sell - New Transaction', 'fa fa-minus-square-o', 'transaction/customer', 1, '2024-04-01 10:00:00', NULL, '2025-04-18 17:40:18', 1);
INSERT INTO `auth_menu` VALUES (15, 'Customer - Type', 'fa fa-minus-square-o', 'master_data/m_customer_type', 1, '2024-04-01 10:00:00', NULL, '2025-03-03 11:15:02', 1);
INSERT INTO `auth_menu` VALUES (16, 'Customer - Identity Type', 'fa fa-minus-square-o', 'master_data/m_customer_data', 1, '2024-04-01 10:00:00', NULL, '2025-03-03 11:14:33', 1);
INSERT INTO `auth_menu` VALUES (17, 'Customer - Job', 'fa fa-minus-square-o', 'master_data/m_customer_job', 1, '2024-04-01 10:00:00', NULL, '2025-03-03 11:17:16', 1);
INSERT INTO `auth_menu` VALUES (18, 'Nationality', 'fa fa-minus-square-o', 'master_data/m_nationality', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (20, 'Currency', 'fa fa-minus-square-o', 'master_data/m_currency', 1, '2024-04-01 10:00:00', NULL, '2025-03-03 11:37:50', 1);
INSERT INTO `auth_menu` VALUES (22, 'Ppatk - DTTOT', 'fa fa-minus-square-o', 'ppatk/ppatk_dttot', 1, '2024-04-01 10:00:00', NULL, '2025-03-03 11:08:35', 1);
INSERT INTO `auth_menu` VALUES (23, 'Customer - Act On', 'fa fa-minus-square-o', 'master_data/m_customer_act_on', 1, '2024-04-01 10:00:00', NULL, '2025-03-04 09:51:28', 1);
INSERT INTO `auth_menu` VALUES (24, 'Setting - List Transaction', 'fa fa-minus-square-o', 'master_data/m_trxlist', 1, '2024-04-01 10:00:00', NULL, '2025-04-18 11:33:34', 1);
INSERT INTO `auth_menu` VALUES (26, 'Setting - List Transaction Date', 'fa fa-minus-square-o', 'master_data/m_trxdate', 1, '2024-04-01 10:00:00', NULL, '2025-04-21 12:46:48', 1);
INSERT INTO `auth_menu` VALUES (30, 'Buy/Sell - Summary by Date', 'fa fa-minus-square-o', 'summary\\summary_buysell_by_date', 1, '2024-04-01 10:00:00', NULL, '2025-04-18 11:30:06', 1);
INSERT INTO `auth_menu` VALUES (31, 'Buy/Sell - Summary by Month', 'fa fa-minus-square-o', 'summary\\summary_buysell_by_month', 1, '2024-04-01 10:00:00', NULL, '2025-04-18 11:30:14', 1);
INSERT INTO `auth_menu` VALUES (32, 'Buy/Sell - Summary by Year', 'fa fa-minus-square-o', 'summary\\summary_buysell_by_year', 1, '2024-04-01 10:00:00', NULL, '2025-04-18 11:30:23', 1);
INSERT INTO `auth_menu` VALUES (34, 'Setting - Store', 'fa fa-minus-square-o', 'master_data/m_store', 1, '2024-04-01 10:00:00', NULL, '2025-04-21 12:46:28', 1);
INSERT INTO `auth_menu` VALUES (36, 'Payment Type', 'fa fa-minus-square-o', 'master_data/m_payment_type', 1, '2024-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_menu` VALUES (39, 'Stock In Total & Sheet', 'fa fa-minus-square-o', 'stock/stock', 1, '2024-04-19 12:21:31', 1, '2025-04-21 15:23:17', 1);
INSERT INTO `auth_menu` VALUES (40, 'Stock In Exchange Rate Average', 'fa fa-minus-square-o', 'stock/stock_price', 1, '2024-04-19 12:21:59', 1, '2025-04-21 15:23:08', 1);
INSERT INTO `auth_menu` VALUES (44, 'Buy/Sell', 'fa fa-minus-square-o', '#', 1, '2025-02-26 15:57:48', 1, '2025-04-18 11:29:44', 1);
INSERT INTO `auth_menu` VALUES (45, 'Ppatk', 'fa fa-minus-square-o', '#', 1, '2025-03-03 10:34:44', 1, '2025-03-03 11:02:21', 1);
INSERT INTO `auth_menu` VALUES (46, 'Customer', 'fa fa-minus-square-o', '#', 1, '2025-03-03 11:12:35', 1, NULL, NULL);
INSERT INTO `auth_menu` VALUES (50, 'Change Password', 'fa fa-minus-square-o', 'user/change_pass', 1, '2025-03-07 12:05:12', 1, NULL, NULL);
INSERT INTO `auth_menu` VALUES (52, 'Cash/Bank', 'fa fa-minus-square-o', '#', 1, '2025-03-21 16:30:49', 1, '2025-04-18 11:30:45', 1);
INSERT INTO `auth_menu` VALUES (53, 'Cash/Bank - List Transaction', 'fa fa-minus-square-o', 'cb/cb_list', 1, '2025-03-21 16:31:13', 1, '2025-04-18 11:33:07', 1);
INSERT INTO `auth_menu` VALUES (54, 'Cash/Bank - Balance', 'fa fa-minus-square-o', 'cb/cb_balance', 1, '2025-03-21 16:31:49', 1, '2025-04-18 11:31:05', 1);
INSERT INTO `auth_menu` VALUES (56, 'Setting - Cash Bank Source', 'fa fa-minus-square-o', 'master_data/m_cb', 1, '2025-03-22 08:24:46', 1, '2025-04-21 12:48:42', 1);
INSERT INTO `auth_menu` VALUES (57, 'Setting - Cash Bank Purpose', 'fa fa-minus-square-o', 'master_data/m_cb_pos', 1, '2025-03-22 08:25:15', 1, '2025-04-21 12:48:32', 1);
INSERT INTO `auth_menu` VALUES (58, 'Export Data', 'fa fa-minus-square-o', 'export\\export_data', 1, '2025-04-14 09:08:49', 1, '2025-04-14 09:29:23', 1);
INSERT INTO `auth_menu` VALUES (59, 'Buy/Sell - List Transaction', 'fa fa-minus-square-o', 'transaction/transaction_buysell_list', 1, '2025-04-18 17:39:56', 1, NULL, NULL);
INSERT INTO `auth_menu` VALUES (60, 'Transaction Setting', 'fa fa-minus-square-o', '#', 1, '2025-04-19 06:36:15', 1, '2025-04-21 12:46:59', 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 123 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

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
INSERT INTO `auth_menu_group` VALUES (11, 1, 26, 60, 15, 1, '2024-04-01 10:00:00', NULL, '2025-04-21 12:47:55', 1);
INSERT INTO `auth_menu_group` VALUES (14, 1, 34, 60, 13, 1, '2024-04-01 10:00:00', NULL, '2025-04-19 06:37:42', 1);
INSERT INTO `auth_menu_group` VALUES (15, 1, 24, 60, 14, 1, '2024-04-01 10:00:00', NULL, '2025-04-21 12:47:50', 1);
INSERT INTO `auth_menu_group` VALUES (16, 1, 10, 6, 10, 1, '2025-02-23 20:58:08', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (18, 3, 14, 44, 2, 1, '2025-02-26 12:48:39', 1, '2025-03-28 07:42:19', 1);
INSERT INTO `auth_menu_group` VALUES (22, 3, 30, 44, 4, 1, '2025-02-26 12:50:51', 1, '2025-03-28 07:55:02', 1);
INSERT INTO `auth_menu_group` VALUES (23, 3, 31, 44, 5, 1, '2025-02-26 12:51:06', 1, '2025-03-28 07:55:13', 1);
INSERT INTO `auth_menu_group` VALUES (24, 3, 32, 44, 6, 1, '2025-02-26 12:51:16', 1, '2025-03-28 07:55:22', 1);
INSERT INTO `auth_menu_group` VALUES (25, 3, 44, 0, 1, 1, '2025-02-26 15:58:07', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (27, 3, 39, 44, 7, 1, '2025-03-02 07:28:08', 1, '2025-03-28 07:58:05', 1);
INSERT INTO `auth_menu_group` VALUES (28, 3, 40, 44, 8, 1, '2025-03-02 07:28:35', 1, '2025-03-28 07:58:16', 1);
INSERT INTO `auth_menu_group` VALUES (29, 3, 13, 0, 10, 1, '2025-03-03 10:35:40', 1, '2025-03-28 07:58:40', 1);
INSERT INTO `auth_menu_group` VALUES (30, 3, 45, 13, 19, 1, '2025-03-03 10:35:57', 1, '2025-03-28 07:59:37', 1);
INSERT INTO `auth_menu_group` VALUES (31, 3, 22, 45, 20, 1, '2025-03-03 10:36:07', 1, '2025-03-28 07:59:43', 1);
INSERT INTO `auth_menu_group` VALUES (32, 3, 20, 13, 11, 1, '2025-03-03 11:09:50', 1, '2025-03-28 07:58:48', 1);
INSERT INTO `auth_menu_group` VALUES (33, 3, 17, 46, 16, 1, '2025-03-03 11:10:44', 1, '2025-03-28 07:59:12', 1);
INSERT INTO `auth_menu_group` VALUES (34, 3, 46, 13, 12, 1, '2025-03-03 11:12:56', 1, '2025-03-28 07:58:56', 1);
INSERT INTO `auth_menu_group` VALUES (38, 3, 16, 46, 15, 1, '2025-03-03 21:39:00', 1, '2025-03-28 07:59:05', 1);
INSERT INTO `auth_menu_group` VALUES (39, 3, 15, 46, 14, 1, '2025-03-03 21:39:26', 1, '2025-04-18 11:41:26', 1);
INSERT INTO `auth_menu_group` VALUES (40, 3, 18, 13, 17, 1, '2025-03-03 21:39:56', 1, '2025-03-28 07:59:20', 1);
INSERT INTO `auth_menu_group` VALUES (41, 3, 36, 13, 18, 1, '2025-03-03 21:40:24', 1, '2025-03-28 07:59:29', 1);
INSERT INTO `auth_menu_group` VALUES (50, 4, 30, 0, 2, 1, '2025-02-26 12:50:51', 1, '2025-04-16 08:35:16', 1);
INSERT INTO `auth_menu_group` VALUES (51, 4, 31, 0, 3, 1, '2025-02-26 12:51:06', 1, '2025-04-16 08:35:23', 1);
INSERT INTO `auth_menu_group` VALUES (52, 4, 32, 0, 4, 1, '2025-02-26 12:51:16', 1, '2025-04-16 08:35:28', 1);
INSERT INTO `auth_menu_group` VALUES (55, 4, 39, 0, 5, 1, '2025-03-02 07:28:08', 1, '2025-04-16 08:35:34', 1);
INSERT INTO `auth_menu_group` VALUES (84, 1, 50, 6, 11, 1, '2025-03-07 12:06:05', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (104, 2, 44, 0, 1, 1, '2025-03-23 10:24:15', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (106, 2, 30, 44, 2, 1, '2025-03-23 10:25:13', 1, '2025-04-16 09:23:53', 1);
INSERT INTO `auth_menu_group` VALUES (107, 2, 31, 44, 3, 1, '2025-03-23 10:25:29', 1, '2025-04-16 09:24:03', 1);
INSERT INTO `auth_menu_group` VALUES (108, 2, 32, 44, 4, 1, '2025-03-23 10:25:44', 1, '2025-04-16 09:24:12', 1);
INSERT INTO `auth_menu_group` VALUES (111, 2, 39, 44, 5, 1, '2025-03-23 14:44:43', 1, '2025-04-16 09:24:26', 1);
INSERT INTO `auth_menu_group` VALUES (112, 2, 40, 44, 6, 1, '2025-03-23 14:45:09', 1, '2025-04-16 09:24:39', 1);
INSERT INTO `auth_menu_group` VALUES (113, 2, 52, 0, 7, 1, '2025-04-06 15:25:08', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (114, 2, 53, 52, 8, 1, '2025-04-06 15:25:42', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (115, 2, 54, 52, 9, 1, '2025-04-06 15:25:52', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (116, 2, 58, 0, 10, 1, '2025-04-14 09:30:23', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (117, 3, 23, 46, 13, 1, '2025-04-16 09:31:12', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (118, 3, 59, 44, 3, 1, '2025-04-18 17:41:30', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (119, 4, 59, 0, 1, 1, '2025-04-18 17:41:58', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (120, 1, 60, 0, 12, 1, '2025-04-19 06:37:33', 1, NULL, NULL);
INSERT INTO `auth_menu_group` VALUES (121, 1, 56, 60, 16, 1, '2025-04-21 12:47:44', 1, '2025-04-21 12:47:59', 1);
INSERT INTO `auth_menu_group` VALUES (122, 1, 57, 60, 17, 1, '2025-04-21 12:48:14', 1, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of auth_usergroup
-- ----------------------------
INSERT INTO `auth_usergroup` VALUES (1, 'Developer', 1, '2025-04-01 10:00:00', 1, NULL, NULL);
INSERT INTO `auth_usergroup` VALUES (2, 'Konsolidasi', 1, '2025-04-01 10:00:00', 1, NULL, NULL);
INSERT INTO `auth_usergroup` VALUES (3, 'Admin', 1, '2025-04-01 10:00:00', 1, NULL, NULL);
INSERT INTO `auth_usergroup` VALUES (4, 'Konter', 1, '2025-04-01 10:00:00', 1, NULL, NULL);
INSERT INTO `auth_usergroup` VALUES (5, 'Kasir', 1, '2025-04-01 10:00:00', 1, NULL, NULL);
INSERT INTO `auth_usergroup` VALUES (6, 'Angkasapura', 1, '2025-04-01 10:00:00', 1, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of auth_userlevel
-- ----------------------------
INSERT INTO `auth_userlevel` VALUES (1, 'Admin', 1, '2025-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_userlevel` VALUES (2, 'User', 1, '2025-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_userlevel` VALUES (3, 'Direksi', 1, '2025-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_userlevel` VALUES (4, 'Manager', 1, '2025-04-01 10:00:00', NULL, NULL, NULL);
INSERT INTO `auth_userlevel` VALUES (5, 'Supervisor', 1, '2025-04-01 10:00:00', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for auth_users
-- ----------------------------
DROP TABLE IF EXISTS `auth_users`;
CREATE TABLE `auth_users`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password_plain` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `usergroup_id` bigint NOT NULL,
  `userlevel_id` bigint NOT NULL,
  `store_id` bigint NOT NULL,
  `store_id_multiple` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `celluler` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `chgpass` smallint NULL DEFAULT NULL,
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  `lastlog` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of auth_users
-- ----------------------------
INSERT INTO `auth_users` VALUES (1, 'Developer', '8989', 'f794bdbef7990b5112e526b5cd4ea67f4a35af21', NULL, 1, 1, 0, NULL, NULL, NULL, NULL, 1, '2025-02-23 13:58:46', NULL, NULL, NULL, NULL);
INSERT INTO `auth_users` VALUES (2, 'Konsolidasi', 'konsolidasi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', 2, 1, 0, '1,2,3,4', '', '', NULL, 1, '2025-02-23 13:58:46', NULL, '2025-03-07 12:10:06', 1, '2025-04-21 15:32:01');
INSERT INTO `auth_users` VALUES (3, 'Admin', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', 3, 1, 1, NULL, '', '', NULL, 1, '2025-02-23 13:58:46', NULL, '2025-03-07 12:10:19', 1, '2025-04-21 15:23:35');
INSERT INTO `auth_users` VALUES (4, 'Counter', 'konter', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', 4, 2, 1, NULL, '', '', NULL, 1, '2025-02-23 13:58:46', NULL, '2025-03-07 12:10:34', 1, '2025-04-22 06:34:52');
INSERT INTO `auth_users` VALUES (5, 'Cashier', 'kasir', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', 5, 2, 1, NULL, '', '', NULL, 1, '2025-03-06 13:05:41', 1, '2025-03-07 12:10:24', 1, '2025-04-22 06:15:13');
INSERT INTO `auth_users` VALUES (6, 'Angkasa Pura 1', 'ap1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', 6, 2, 0, '3,4', '', '', NULL, 1, '2025-03-06 13:06:45', 1, '2025-03-07 12:10:12', 1, '2025-04-19 06:59:41');
INSERT INTO `auth_users` VALUES (7, 'Angkasa Pura 2', 'ap2', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', 6, 2, 0, '1,2', '', '', NULL, 1, '2025-03-06 13:06:45', 1, '2025-03-07 12:10:12', 1, '2025-04-04 16:05:44');

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

-- ----------------------------
-- Table structure for m_cb
-- ----------------------------
DROP TABLE IF EXISTS `m_cb`;
CREATE TABLE `m_cb`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `store_id` bigint NOT NULL,
  `tr_id` smallint NOT NULL,
  `payment_type_id` bigint NULL DEFAULT NULL,
  `cb_code` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cb_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` smallint NULL DEFAULT NULL,
  `updatedby` smallint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_cb
-- ----------------------------
INSERT INTO `m_cb` VALUES (1, 1, 3, 1, '01030001', 'Cash', '', 1, '2025-03-08 22:28:04', '2025-04-21 13:38:25', 1, 1);
INSERT INTO `m_cb` VALUES (2, 1, 4, 2, '01040001', 'Bank', ' ', 1, '2025-03-08 22:28:04', '2025-04-05 11:14:45', 1, 3);
INSERT INTO `m_cb` VALUES (4, 2, 3, 1, '02030001', 'Cash', '', 1, '2025-04-21 13:39:26', NULL, 1, NULL);
INSERT INTO `m_cb` VALUES (5, 2, 4, 2, '02040001', 'Bank', '', 1, '2025-04-21 13:39:36', NULL, 1, NULL);
INSERT INTO `m_cb` VALUES (6, 3, 3, 1, '03030001', 'Cash', '', 1, '2025-04-21 13:39:56', NULL, 1, NULL);
INSERT INTO `m_cb` VALUES (7, 3, 4, 2, '03040001', 'Bank', '', 1, '2025-04-21 13:40:15', NULL, 1, NULL);
INSERT INTO `m_cb` VALUES (8, 4, 3, 1, '04030001', 'Cash', '', 1, '2025-04-21 13:40:34', NULL, 1, NULL);
INSERT INTO `m_cb` VALUES (9, 4, 4, 2, '04040001', 'Bank', '', 1, '2025-04-21 13:40:42', NULL, 1, NULL);

-- ----------------------------
-- Table structure for m_cb_pos
-- ----------------------------
DROP TABLE IF EXISTS `m_cb_pos`;
CREATE TABLE `m_cb_pos`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `cb_id` bigint NOT NULL,
  `cb_pos_code` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cb_pos_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cb_pos_in_out` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `buysell_tr_id` smallint NULL DEFAULT NULL,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` smallint NULL DEFAULT NULL,
  `updatedby` smallint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_cb_pos
-- ----------------------------
INSERT INTO `m_cb_pos` VALUES (1, 1, 'MP0001', 'Modal Kas', 'I', NULL, 1, '2025-03-08 22:28:04', '2025-03-25 13:27:21', 3, 3);
INSERT INTO `m_cb_pos` VALUES (2, 1, 'MP0002', 'Pembelian Valas', 'O', 1, 1, '2025-03-08 22:28:04', '2025-04-21 14:46:39', 3, 1);
INSERT INTO `m_cb_pos` VALUES (3, 1, 'MP0003', 'Penerimaan Kas', 'I', NULL, 1, '2025-03-08 22:28:04', NULL, 3, NULL);
INSERT INTO `m_cb_pos` VALUES (4, 1, 'MP0004', 'Pengeluaran Kas', 'O', NULL, 1, '2025-03-08 22:28:04', '2025-04-21 14:36:42', 3, 1);
INSERT INTO `m_cb_pos` VALUES (5, 1, 'MP0005', 'Penjualan Valas', 'I', 2, 1, '2025-03-08 22:28:04', NULL, 3, NULL);
INSERT INTO `m_cb_pos` VALUES (6, 1, 'MP0006', 'Setor Ke Pusat', 'O', NULL, 1, '2025-03-08 22:28:04', NULL, 3, NULL);
INSERT INTO `m_cb_pos` VALUES (7, 1, 'MP0007', 'Terima Dari Pusat', 'I', NULL, 1, '2025-03-08 22:28:04', NULL, 3, NULL);
INSERT INTO `m_cb_pos` VALUES (8, 2, 'MP0008', 'Modal Bank', 'I', NULL, 1, '2025-03-08 22:28:04', NULL, 3, NULL);
INSERT INTO `m_cb_pos` VALUES (9, 2, 'MP0009', 'Pembelian Valas', 'O', 1, 1, '2025-03-08 22:28:04', NULL, 3, NULL);
INSERT INTO `m_cb_pos` VALUES (10, 2, 'MP0010', 'Penerimaan Bank', 'I', NULL, 1, '2025-03-08 22:28:04', NULL, 3, NULL);
INSERT INTO `m_cb_pos` VALUES (11, 2, 'MP0011', 'Pengeluaran Bank', 'O', NULL, 1, '2025-03-08 22:28:04', NULL, 3, NULL);
INSERT INTO `m_cb_pos` VALUES (12, 2, 'MP0012', 'Penjualan Valas', 'I', 2, 1, '2025-03-08 22:28:04', NULL, 3, NULL);
INSERT INTO `m_cb_pos` VALUES (13, 2, 'MP0013', 'Terima Dari Pusat', 'I', NULL, 1, '2025-03-08 22:28:04', NULL, 3, NULL);
INSERT INTO `m_cb_pos` VALUES (14, 2, 'MP0014', 'Setor Ke Pusat', 'I', NULL, 1, '2025-03-08 22:28:04', NULL, 3, NULL);

-- ----------------------------
-- Table structure for m_currency
-- ----------------------------
DROP TABLE IF EXISTS `m_currency`;
CREATE TABLE `m_currency`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `currency_code` varchar(6) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `currency_name` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_currency
-- ----------------------------
INSERT INTO `m_currency` VALUES (1, 'USD', 'US DOLLAR', 1, '2024-04-20 12:55:56', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (2, 'AUD', 'AUSTRALIA DOLLAR', 1, '2024-04-20 12:56:25', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (3, 'CAD', 'CANADA DOLLAR', 1, '2024-04-20 12:56:41', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (4, 'GBP', 'ENGLAND POUNDS', 1, '2024-04-20 12:57:10', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (5, 'CHF', 'SWISS FRANC', 1, '2024-04-20 12:57:28', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (6, 'HKD', 'HONGKONG DOLLAR', 1, '2024-04-20 12:57:41', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (7, 'SGD', 'SINGAPORE DOLLAR', 1, '2024-04-20 12:57:55', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (8, 'CHY', 'CHINA YUAN', 1, '2024-04-20 12:58:23', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (9, 'NZD', 'NEW ZEALAND DOLLAR', 1, '2024-04-20 12:58:57', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (10, 'MYR', 'MALAYSIA RINGGIT', 1, '2024-04-20 12:59:10', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (11, 'SAR', 'SAUDI RIYAL', 1, '2024-04-20 12:59:21', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (12, 'PHP', 'PHILIPINA PESO', 1, '2024-04-20 12:59:36', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (13, 'AED', 'UNI EMIRAT ARAB DIRHAM', 1, '2024-04-20 12:59:55', '2025-03-03 11:39:46', 3, 3);
INSERT INTO `m_currency` VALUES (14, 'THB', 'THAILAND BATH', 1, '2024-04-20 13:00:05', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (15, 'NT', 'TAIWAN DOLLAR', 1, '2024-04-20 13:00:23', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (16, 'WON', 'KOREA  WON', 1, '2024-04-20 13:00:43', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (17, 'BRR', 'BRUNEI RINGGIT', 1, '2024-04-20 13:01:01', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (18, 'JPY', 'JEPANG YEN', 1, '2024-04-20 13:01:25', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (19, 'EURO', 'EROPA EURO', 1, '2024-04-20 13:01:40', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (20, 'QTR', 'QATAR RIYAL', 1, '2024-04-20 13:02:37', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (21, 'VND', 'VIETNAM DONG', 1, '2024-04-20 13:02:55', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (22, 'INR', 'INDIA RUPEE', 1, '2024-04-20 13:03:10', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (23, 'BHR', 'BHD', 1, '2024-04-20 13:03:28', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (24, 'OMR', 'OMAN', 1, '2024-04-20 13:04:02', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (25, 'KWD', 'KWD', 1, '2024-04-20 13:04:14', NULL, 3, NULL);
INSERT INTO `m_currency` VALUES (26, 'JOR', 'JORDAN', 1, '2024-04-20 13:04:27', NULL, 3, NULL);

-- ----------------------------
-- Table structure for m_customer
-- ----------------------------
DROP TABLE IF EXISTS `m_customer`;
CREATE TABLE `m_customer`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
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
  `job_id` bigint NULL DEFAULT NULL,
  `nationality_id` bigint NULL DEFAULT NULL,
  `customer_data_id` bigint NULL DEFAULT NULL,
  `customer_data_number` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `npwp_number` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `npwp_name` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `permit_number` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `permit_date_start` date NULL DEFAULT NULL,
  `permit_date_end` date NULL DEFAULT NULL,
  `customerprofil` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_customer
-- ----------------------------
INSERT INTO `m_customer` VALUES (1, 1, '250416010001', '0878125410001', '', 'Dian Sastro', '', 'Jakarta Selatan', '', '', '', '', '', NULL, 0, 8, NULL, NULL, '', '', NULL, '', NULL, NULL, '', 1, '2025-04-16 09:06:33', NULL, 4, NULL);
INSERT INTO `m_customer` VALUES (2, 1, '250416010002', '0813215410025', '', 'Cintya', '', 'Jakarta Pusat', '', '', '', '', '', NULL, 0, 1, NULL, NULL, '', '', NULL, '', NULL, NULL, '', 1, '2025-04-16 15:58:22', NULL, 4, NULL);

-- ----------------------------
-- Table structure for m_customer_act_on
-- ----------------------------
DROP TABLE IF EXISTS `m_customer_act_on`;
CREATE TABLE `m_customer_act_on`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `customer_act_on` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_customer_act_on
-- ----------------------------
INSERT INTO `m_customer_act_on` VALUES (1, 'Pribadi', 1, '2025-03-04 09:51:50', NULL, 3, NULL);
INSERT INTO `m_customer_act_on` VALUES (2, 'Perusahaan', 1, '2025-03-04 09:51:56', NULL, 3, NULL);

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
-- Table structure for m_customer_job
-- ----------------------------
DROP TABLE IF EXISTS `m_customer_job`;
CREATE TABLE `m_customer_job`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `customer_job_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `risk_category` smallint NULL DEFAULT NULL,
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_customer_job
-- ----------------------------
INSERT INTO `m_customer_job` VALUES (1, 'Ibu Rumah Tangga', 1, 1, '2024-04-01 10:00:00', '2025-03-04 10:17:39', 3, 3);
INSERT INTO `m_customer_job` VALUES (2, 'Korporasi', 1, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (3, 'Lainnya', 1, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (4, 'Pegawai Bank', 2, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (5, 'Pegawai BUMD', 3, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (6, 'Pegawai BUMN', 3, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (7, 'Pegawai KUPVA BB', 2, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (8, 'Pegawai Swasta', 1, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (9, 'Pengurus Parpol', 3, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (10, 'Pengusaha', 1, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (11, 'Pensiunan PNS', 3, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (12, 'PNS Aktif', 3, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (13, 'Profesional', 1, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (14, 'TKI/TKW', 1, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (15, 'Yayasan/Pengurus Yayasan', 1, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (16, 'TNI', 3, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (17, 'Polisi', 3, 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_customer_job` VALUES (18, 'Wartawan', 1, 1, '2024-04-01 10:00:00', NULL, 3, NULL);

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
-- Table structure for m_exchange_rate
-- ----------------------------
DROP TABLE IF EXISTS `m_exchange_rate`;
CREATE TABLE `m_exchange_rate`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `store_id` bigint NOT NULL,
  `currency_id` smallint NOT NULL,
  `exchange_rate_date` date NOT NULL,
  `exchange_rate_buy` decimal(12, 2) NULL DEFAULT 0.00,
  `difference_buy` decimal(12, 2) NULL DEFAULT 0.00,
  `exchange_rate_sell` decimal(12, 2) NULL DEFAULT 0.00,
  `difference_sell` decimal(12, 2) NULL DEFAULT 0.00,
  `price_buy_bot` decimal(12, 2) NULL DEFAULT 0.00,
  `price_buy_top` decimal(12, 2) NULL DEFAULT 0.00,
  `price_sell_bot` decimal(12, 2) NULL DEFAULT 0.00,
  `price_sell_top` decimal(12, 2) NULL DEFAULT 0.00,
  `source_rate` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` smallint NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` smallint NULL DEFAULT NULL,
  `updatedby` smallint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 105 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_exchange_rate
-- ----------------------------
INSERT INTO `m_exchange_rate` VALUES (27, 1, 1, '2025-03-30', 16000.00, 0.00, 16200.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', '2025-03-30 06:54:26', 3, 3);
INSERT INTO `m_exchange_rate` VALUES (28, 1, 2, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (29, 1, 3, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (30, 1, 4, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (31, 1, 5, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (32, 1, 6, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (33, 1, 7, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (34, 1, 8, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (35, 1, 9, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (36, 1, 10, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (37, 1, 11, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (38, 1, 12, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (39, 1, 13, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (40, 1, 14, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (41, 1, 15, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (42, 1, 16, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (43, 1, 17, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (44, 1, 18, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (45, 1, 19, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (46, 1, 20, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (47, 1, 21, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (48, 1, 22, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (49, 1, 23, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (50, 1, 24, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (51, 1, 25, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (52, 1, 26, '2025-03-30', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-03-30 06:54:09', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (53, 1, 1, '2025-04-06', 16000.00, 0.00, 16300.00, 0.00, 100.00, 100.00, 50.00, 50.00, NULL, 1, '2025-04-06 07:45:53', '2025-04-06 07:46:15', 3, 3);
INSERT INTO `m_exchange_rate` VALUES (54, 1, 2, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (55, 1, 3, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (56, 1, 4, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (57, 1, 5, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (58, 1, 6, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (59, 1, 7, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (60, 1, 8, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (61, 1, 9, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (62, 1, 10, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (63, 1, 11, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (64, 1, 12, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (65, 1, 13, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (66, 1, 14, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (67, 1, 15, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (68, 1, 16, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (69, 1, 17, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (70, 1, 18, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (71, 1, 19, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (72, 1, 20, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (73, 1, 21, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (74, 1, 22, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (75, 1, 23, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (76, 1, 24, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (77, 1, 25, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (78, 1, 26, '2025-04-06', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-06 07:45:53', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (79, 1, 1, '2025-04-17', 16000.00, 0.00, 16300.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'VIP Money Changer', 1, '2025-04-17 13:03:26', '2025-04-17 13:37:24', 3, 3);
INSERT INTO `m_exchange_rate` VALUES (80, 1, 2, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (81, 1, 3, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (82, 1, 4, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (83, 1, 5, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (84, 1, 6, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (85, 1, 7, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (86, 1, 8, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (87, 1, 9, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (88, 1, 10, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (89, 1, 11, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (90, 1, 12, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (91, 1, 13, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (92, 1, 14, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (93, 1, 15, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (94, 1, 16, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (95, 1, 17, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (96, 1, 18, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (97, 1, 19, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (98, 1, 20, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (99, 1, 21, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (100, 1, 22, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (101, 1, 23, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (102, 1, 24, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (103, 1, 25, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);
INSERT INTO `m_exchange_rate` VALUES (104, 1, 26, '2025-04-17', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-04-17 13:03:26', NULL, 3, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_payment_type
-- ----------------------------
INSERT INTO `m_payment_type` VALUES (1, 'Cash', 1, '2024-04-01 10:00:00', NULL, 3, NULL);
INSERT INTO `m_payment_type` VALUES (2, 'Transfer', 1, '2024-04-01 10:00:00', NULL, 3, NULL);

-- ----------------------------
-- Table structure for m_store
-- ----------------------------
DROP TABLE IF EXISTS `m_store`;
CREATE TABLE `m_store`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `store_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `store_address` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `store_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `store_permit_number` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `store_id_pjk` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `api_method` smallint NULL DEFAULT NULL,
  `api_angkasapura` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `api_username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `api_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `api_store_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `api_store_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ap_tr_id` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_limits` smallint NULL DEFAULT NULL,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_store
-- ----------------------------
INSERT INTO `m_store` VALUES (1, 'PT. INDONESIA CENTRAL VALUTAMAS', 'Terminal 2F - Shopping Arcade Dep Soekarno Hatta', 'indocev@gmail.com', '1234567991000', NULL, 1, 'AP2', 'api.indocev.cgk', 'api.indocev.cgk', '53e92e8d102d983ea54d1990e4cd16d4', 'Indocev Money Changer T2F #Shopping Arcade Dep', '1', 5, 1, '2024-03-17 00:00:00', '2025-04-19 06:38:28', 1, 1);
INSERT INTO `m_store` VALUES (2, 'PT. INDONESIA CENTRAL VALUTAMAS', 'Terminal 3 - Arrival Internatioanl Soekarno Hatta', 'indocev@gmail.com', '', NULL, 0, 'AP2', 'api.indocev.cgk', 'api.indocev.cgk', '00d8c2a3c5242f301ed4034c33802c2b', 'Indocev Money Changer T3 #Arr Intl', '1', 5, 1, '2024-03-17 00:00:00', '2025-04-06 15:18:22', 1, 1);
INSERT INTO `m_store` VALUES (3, 'PT. INDONESIA CENTRAL VALUTAMAS', 'Terminal 2 SV-21-6 - Departure Juanda Surabaya', 'indocev@gmail.com', NULL, NULL, 0, 'AP1', 'api.indocev.sub', 'api.indocev.sub', 'e9c2a6e6a7b9300338cccb7fdb011f61', 'Money Changer (Departure Int-SV-22-7)', '1', 5, 1, '2024-03-21 13:29:04', '2025-03-05 16:09:14', 1, 1);
INSERT INTO `m_store` VALUES (4, 'PT. INDONESIA CENTRAL VALUTAMAS', 'Terminal 2 SV-21-7 - Arrival Juanda Surabaya', 'indocev@gmail.com', '', NULL, 0, 'AP1', 'api.indocev.sub', 'api.indocev.sub', '496b1f88ef3e2b6fc8b27b4b04bc5751', 'Money Changer (Arrival Int-SV-21-6)', '1', 5, 1, '2024-03-21 13:29:04', '2025-03-07 10:08:17', 1, 1);

-- ----------------------------
-- Table structure for m_transaction
-- ----------------------------
DROP TABLE IF EXISTS `m_transaction`;
CREATE TABLE `m_transaction`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `transaction_name` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
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
INSERT INTO `m_transaction` VALUES (1, 'Buy/Beli', 'Transaksi Beli', 1, '2025-01-01 10:33:53', NULL, 1, NULL);
INSERT INTO `m_transaction` VALUES (2, 'Sell/Jual', 'Transaksi Jual', 1, '2025-01-01 10:33:53', NULL, 1, NULL);
INSERT INTO `m_transaction` VALUES (3, 'Cash', 'Transaksi Kas', 1, '2025-01-01 10:33:53', NULL, 1, NULL);
INSERT INTO `m_transaction` VALUES (4, 'Bank', 'Transaksi Bank', 1, '2025-01-01 10:33:53', NULL, 1, NULL);

-- ----------------------------
-- Table structure for m_transaction_date
-- ----------------------------
DROP TABLE IF EXISTS `m_transaction_date`;
CREATE TABLE `m_transaction_date`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `store_id` bigint NOT NULL,
  `tr_id` bigint NOT NULL,
  `tr_date` date NOT NULL,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_transaction_date
-- ----------------------------
INSERT INTO `m_transaction_date` VALUES (2, 1, 2, '2025-04-21', 1, '2025-03-05 16:03:58', '2025-04-21 15:05:31', 1, NULL);
INSERT INTO `m_transaction_date` VALUES (3, 1, 1, '2025-04-21', 1, '2025-03-05 16:06:33', '2025-04-21 15:05:31', 1, NULL);
INSERT INTO `m_transaction_date` VALUES (4, 1, 4, '2025-04-19', 1, '2025-04-19 06:44:25', '2025-04-19 06:44:53', 1, 1);
INSERT INTO `m_transaction_date` VALUES (5, 1, 3, '2025-04-19', 1, '2025-04-19 06:44:34', '2025-04-19 06:45:07', 1, 1);
INSERT INTO `m_transaction_date` VALUES (6, 2, 1, '2025-04-19', 1, '2025-04-19 06:45:50', NULL, 1, NULL);
INSERT INTO `m_transaction_date` VALUES (7, 2, 2, '2025-04-19', 1, '2025-04-19 06:45:56', NULL, 1, NULL);
INSERT INTO `m_transaction_date` VALUES (8, 2, 3, '2025-04-19', 1, '2025-04-19 06:46:03', NULL, 1, NULL);
INSERT INTO `m_transaction_date` VALUES (9, 2, 4, '2025-04-19', 1, '2025-04-19 06:46:09', NULL, 1, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 538 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ppatk_dttot
-- ----------------------------
INSERT INTO `ppatk_dttot` VALUES (1, 'Negara Islam Indonesia alias NII', '- Didirikan pada tahun 1949 oleh Sekarmadji Maridjan Kartosoewirjo;\n- Beberapa anggota NII terbukti secara sah melakukan tindak pidana terorisme dan tindak pidana pendanaan terorisme\n- Dalam putusan pengadilan terkait individu Nll, diketahui bahwa terdapat perintah kepada para anggota Nll untuk mempercepat pensiapan pencapaian visi dan misi Nll untuk mengganti ideologi negara lndonesia dengan cara melakukan perbuatan teror', 'Korporasi', 'EDD-025', NULL, NULL, NULL, 'Indonesia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (2, 'YUDI LUKITO KURNIAWAN alias ABU TALHAH AL FILIPINI alias YUDI LUKITO KURNIAWAN alias YUDI LUKITO alias YULI LUKITO alias ABDUR ROCHIM alias ABDUL ROHMAN;', '- NIK nomor: 5108060401730004;\n- Paspor nomor: A6889028\n- Pekerjaan: karyawan swasta;', 'Orang', 'IDD-028', 'Surabaya', '04/01/1973 atau 04/11/1974 atau 04/11/1973', 'Indonesia', 'Jalan A. Yani No. 120 Sgr, RT/RW 003/000, Kel. Banyuasari, Kec. Buleleng, \nKab/Kota. Buleleng, Provinsi Bali;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (3, 'FATKHI UMAR BAJUBER alias FNU ABU AHMAD AL ANDALUSIA alias FNU ABU alias AHMAD AL INDONESI alias FNU ABU AHMAD INDUNISI AL INDONESI ABU AHMAD alias ABU AHMAD AL ANDALUSI alias ABU AHMAD AL ANDALUSIA alias ABU AHMAD AL ANDAUNUSI alias AHMAD AL ANDUNISI alias ABU AHMAD AL INDOINESI alias ABU AHMAD AL INDONESI alias IBRAHIM AL INDONESI alias ABU AHMAD AL INDONESIA alias ABU AHMAD AL INDONISI alias ABU AHMAD AL INDUNISI alias AHMAD AL INDUNISI alias IBRAHIM AL INDUNISI alias HABIB AL JAWI alias TALQAH AL SANANI alias ABU AHMAD AL UNDUNISI alias ABU AHMAD ANDUNISI alias FADHI BADJUBER alias FATHI BAJABER alias FATHI UMAR BAJUBER alias FATKHI UMAR BAJUBER alias MUHAMMAD \nDJAMCHALI alias ABU AHMAD INDUNISI alias FATKHI UMAR MUBARAK alias FATKHI UMAR;', '- NIK nomor: 3273020304780012\n- Paspor nomor: S249691\n- Pekerjaan: karyawan swasta;', 'Orang', 'IDD-029', 'Surabaya', '28583', 'Indonesia', 'Jalan Getis Gg. III/95 A, RT/RW. 013/003, Kel. Lemah Putro, Kec. Sidoarjo, \nKab/Kota. Sidoarjo, Provinsi Jawa Timur;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (4, 'EDI SUCHANNUR ROCHIM', '- NIK nomor: 3573010104610006;\n- Paspor nomor: A0898430;\n- Pekerjaan: karyawan swasta', 'Orang', 'IDD-030', 'Malang', '22372', 'Indonesia', 'Jalan R. Tumenggung Suryo 62, RT. 8, RW 3, Kel. Bunulrejo, Kec. Blimbing, \nKab/Kota. Malang, Provinsi Jawa Timur;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (5, 'HERU SISWANTO alias FNU ABU AHMAD AL INDONESI alias ABU AHMAD AL INDONESI alias MUSA AL INDONESI alias USTAD HERU alias HERU SISWANTO alias USTAD HERU SISWANTO alias USTADZ HERU SISWANTO alias USTAZ SISWANTO alias HERU SISWANTO alias SOEPARDI alias HERU SISWANTO SOEPARDI alias HERU SISVVANTO SOEPARDI alias HERU SISWANTO SOEPARDI alias HERU SISWANTO SURABAYA alias HERU SURANTO alias HERI alias SUSANTO alias HERU SUSANTO alias USTAD HERI SUSANTO', '- NIK nomor: 3578110506730004;\n- Paspor nomor: S835649 dan A7412221;\n- Pekerjaan: karyawan swasta.', 'Orang', 'IDD-031', 'Surabaya', '05/06/1973 atau 06/06/1973 atau 05/12/1973;', 'Indonesia', 'Tambak Segaran, RT. 03/RW. 03, Dusun Tambak Segaran, Kec. Simokerto, Kab. \nSurabaya, Provinsi Jawa Timur;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (6, 'MAULAWI RAJAB alias MAULAWI RAJAB SALAHUDIN', '- Pemimpin senior Negara Islam di Irak dan Levant – Khorasan (ISIL-K) (Qde. 161);\n- Terdaftar pada 26 April 2023.', 'Orang', 'ILQ-303', 'Afghanistan', '00/00/1976', 'Afghanistan', 'Distrik Paghman, Prov. Kabul, Afghanistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (7, 'SULTAN AZIZ AZAM', '- Juru bicara Negara Islam di Irak dan Levant – Khorasan (ISIL-K) (Qde. 161);\n- Terdaftar pada 26 April 2023.', 'Orang', 'ILQ-304', 'Afghanistan', '00/00/1985', 'Afghanistan', 'Afghanistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (8, 'AMIN KOBAITRI', '- Relawan The One Banner Project Incorporated;\n- Paspor PA2564100 (Dikeluarkan oleh Australia);\n- Media sosial – Facebook:\nhttps://www.facebook.com/andrew.baderski.9\nhttps://www.facebook.com/chris.nedeski\nhttps://www.facebook.com/ayy.kay.129.', 'Orang', 'ILD-002', 'Campsie – NSW', '30526', NULL, NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (9, 'The One Banner Project Incorporated (TOBPI) ', '- Kegiatan Amal (Charity);\n- No. Kartu Identitas: ABN 67 797 096 394, terdaftar pada Australian Charities and Not-forprofits Commission (ACNC) sejak 2 November 2018;\n- website: https://theonebannerproject.org.au/, theonebannerproject@gmail.com;\n- telp: +61 436382249;\n- media social:\n 1. Instagram: https://www.instagram.com/the_one_banner_project/\n 2. Facebook: https://www.facebook.com/OBP.ORG/.', 'Korporasi', 'ELD-1', NULL, NULL, 'Australia', '34 Maubeuge St, South Granville NSW 2142, Australia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (10, 'ISLAMIC STATE IN IRAQ AND THE LEVANT IN SOUTH-EAST ASIA (ISIL-SEA, ISILSOUTH EAST ASIA alias  ISLAMIC STATE EAST ASIA DIVISION ALIAS DAWLATUL ISLAMIYAH WALIYATUL MASHRIQ', '- Dibentuk bulan Juni 2016 oleh Isnilon Hapilon;\n- Berafiliasi dengan ISIS di Suriah (Islamic State in Iraq and the Levant);\n- Terdaftar 27 Januari 2023.', 'Korporasi', 'ELQ-088', NULL, NULL, 'Asia Tenggara', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (11, 'WORLD HUMAN CARE (WHC) alias YAYASAN ORANG TUA ASUH (YOTA)', '- Nomor Badan Hukum AHU-09365.50.10.2014 tanggal 20 November 2014;\n- Telp 0812-9375-1696 / 0877-8646-4009;\n- Media sosial:\na) Twitter: @worldhumancare1;\nb) Instagram: worldhumancare;\nc) Facebook: World Human Care.', 'Korporasi', 'EDD-024', NULL, NULL, 'Indonesia', 'Kompleks Setia Bina Sarana, AB 3/9, Harapan Jaya, Bekasi Utara', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (12, 'MUHAMMAD DANDI ADHIGUNA alias ADHIGUNA LESMANA Alias MHD DANDI ADHIGUNA', '- NIK 1271183007960001;\n- Nomor KK 3203130202170004;\n- Paspor B 0547698;\n- Fasilitator keberangkatan ke Luar Negeri untuk bergabung dengan ISIS;\n- Tanggal 21 Juni 2017 menuju Riyadh, Arab Saudi;\n- Diduga berada di Suriah;', 'Orang', 'IDD-027', 'Jakarta', '35276', 'Indonesia', 'Kp. Cipadali 1/4 Sukaresmi, Cianjur, Jawa Barat', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (13, 'DINI RAMADHANI', '- Pegawai swasta PT Orientasari Mahkota;\n- NIK 3376025003930003;\n- Paspor B 4286562;\n- No. telepon : 08974831257;\n- Fasilitator keberangkatan ke Luar Negeri untuk bergabung dengan ISIS;\n- Tanggal 3 September 2017 menuju Bangkok, Thailand; \n- Diduga berada di Suriah;', 'Orang', 'IDD-026', 'Tegal', '34038', 'Indonesia', 'Jalan Nakula RT 006 RW 006, Slerok, Tegal Timur, Kota Tegal, Jawa Tengah \n52125;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (14, 'DWI DAHLIA SUSANTI, S. Kep., Sp. Mat', '- NIK 3278086807760006; \n- Paspor no B pada 15 Maret 2016);\n- Pegawai Negeri Sipil di Poltekes Tasikmalaya;\n- Rekening Bank Mandiri no: 1770000418985;\n- No. telepon: 0265314206, 0265331933, 081387497775, 081770260211, dan 08170260211;\n- Fasilitator keuangan;\n- Fasilitator keberangkatan ke Luar Negeri untuk bergabung 3306967  (dikeluarkan oleh Kantor Imigrasi Kelas II Tasikmalaya dengan ISIS;\n- Tanggal 12 November 2011 kembali dari Jeddah, Arab Saudi;\n- Tanggal 26 Juni 2016 menuju Dubai, Uni Emirat Arab.\n- Saat ini diduga berada di Suriah;', 'Orang', 'IDD-025', 'Tasikmalaya', '27969', 'Indonesia', '- Perum Winayajaya Blok A42, RT 003 RW 003, Sambongjaya, Mangkubumi, Tasikmalaya, Jawa Barat Kode Pos 46181;\n- Kp. Linggasari RT 01 RW 16, Desa Singasari, Singaparna, Tasikmalaya, Jawa \nBarat;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (15, 'ABDUL REHMAN MAKKI alias ABDUR REHMAN MAKKI alias ABDUR RAHMAN MAKKI alias ABDUL RAHMAN MAKKI alias HAFIZ ABDUL RAHMAN MAKKI alias HAFIZ ABDUL REHMAN MAKKI alias HAFIZ ABDUL REHMAN;', '- Pakistan nomor paspor C13601334 terbit tanggal 2 November 2007;\n- Paskistan nomor paspor A5199819;\n- Identitas kewarganegaraan Pakistan nomor 6110111883885 dan Pakistan nomor 34454009709;\n- Jamaat-Ud-Dawa (JUD) dan Kepala Urusan Politik Wing JUD/LET;\n- Menjabat sebagai Kepala Departemen Hubungan Luar Negeri LET dan anggota Shura (badan pengatur);\n- Anak dari Hafiz Abdullah Bahwalpuri;\n- Wakil Amir/Ketua Lashkar-E-Tayyiba (LET) (QDe.118);\n- Yang bersangkutan merupakan ipar Ketua JUD/LET yaitu Hafiz Muhammad Saeed (Qdi.263)', 'Orang', 'ILQ-302', 'Bahawalpar, Punjab Province, Pakistan', '20068', 'Pakistan', 'Tayyiba Markaz, Muridke, Punjab Province, Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (16, 'KHATIBA AL-TAWHID WAL-JIHAD (KTJ) alias Катиба ат-Таухид валь-Джихад Alias Jannat Oshiklari Alias Jamaat al-Tawhid wal-Jihad Alias Jannat Oshiklari', '- Bekerja sama dengan organisasi teroris seperti Khatiba Imam al-Bukhari (QDe.158);\n- Organisasi teroris yang beroperasi di bawah payung organisasi teroris internasional Front Al-Nusrah untuk Rakyat Levant (QDe.137).', 'Korporasi', 'ELQ-087', NULL, NULL, NULL, NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (17, 'JUND AL-KHALIFAH IN TUNISIA (JAK-T) تونس في الخالفة ج alias ISIL-TUNISIA alias ISIL-TUNISIA PROVINCE alias SOLDIERS OF THE CALIPHATE alias JUND AL-KHILAFA alias JUND AL KHILAFAH alias JUND AL-KHILAFAH FI TUNIS alias SOLDIERS OF THE CALIPHATE IN TUNISIA alias TALA I JUND AL-KHILAFAH alias VANGUARDS OF THE SOLDIERS OF THE CALIPHATE alias DAESH TUNISIA alias AJNAD', '- Terdaftar pada tanggal 29 Desember 2021;\n- Dibentuk pada bulan November 2014 dimana terkait dengan negara islam di Iraq dan Levent, serta terdaftar sebagai Al Qaida di Iraq (QDe.115).', 'Korporasi', 'ELQ-086', NULL, NULL, NULL, NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (18, 'ASHRAF AL-QIZANI القيزاني أ alias ASHRAF AL-GIZANI alias ABU ‘UBAYDAH AL-KAFI alias ACHREF BEN FETHI BEN MABROUK GUIZANI ALIAS ACHRAF BEN FATHI BEN MABROUK GUIZANI;', '- Identitas kewarganegaraan 13601334;\n- Direkrut untuk ISIL dan menginstruksikan individu untuk melakukan tindakan teroris melalui video online;\n- Anggota senior di Negara Islam di Irak dan Levant (ISIL), serta terdaftar sebagai Al Qaida di Iraq (QDe.115);', 'Orang', 'ILQ-301', 'El Gouazine, Dahmani, Governorate dari Le Kef, Tunisia', '33516', 'Tunisia', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (19, 'Dr. SANULLAH GHAFARI alias Dr. SHAHAB AL MUHAJIR alias SHAHAB MUHAJER alias SHAHAB MOHAJIR \nalias SHAHAB MAHAJAR alias SHIHAB AL MUHAJIR alias SHIHAB MUHAJER \nalias SHIHAB MOHAJIR alias SHIHAB MAHAJAR', ' Afganistan dan Kunduz, Afganistan.', 'Orang', 'ILQ-300', 'Afganistan', '34635', 'Afganistan', 'Afganistan dan Kunduz, Afganistan;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (20, 'LAZ ABA KPP NTB', 'telp: 0878 6465 0558;', 'Korporasi', 'EDD-023', NULL, NULL, 'Indonesia', 'Jalan P. Gili Air no. 19 BTN Griya Indah RT. 004 RW. 100, Desa Pagutan Barat, Kec. Mataram Kodya, Mataram Nusa Tenggara Barat', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (21, 'LAZ ABA KPP SEMARANG alias YAYASAN ABDURRAHMAN BIN AUF SEMARANG;', 'telp: 0821 3360 0580;', 'Korporasi', 'EDD-022', NULL, NULL, 'Indonesia', ' Jl. Tanggul Rejo RT 04/VII Banjardowo Genuk Semarang, Jawa Tengah;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (22, 'LAZ ABA KPP PATI alias BAITUL MAAL ABA PATI;', '- Telp: 0341-4378 511, 081 333552 808;\n- Rekenig atas nama Eko Qq. Baitul Maal ABA Pati;', 'Korporasi', 'EDD-021', NULL, NULL, 'Indonesia', 'Desa Panggungroyom RT. 02 RW 01, Wedarijaksa, Kab. Pati Jawa Tengah;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (23, 'LAZ ABA KPP MALANG alias YAYASAN ABDURRAHMAN BIN AUF MALANG ALIAS BM ABA MALANG;', 'telp: 0341-4378 511, 081 333552 808', 'Korporasi', 'EDD-020', NULL, NULL, 'Indonesia', 'Jl. Simpang L.A Sucipto Perumahan SUlfat Garden Ruko Kav.2 Pandanwangi Blimbing Malang Kora Jawa Timur', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (24, 'LAZ ABA KPP YOGYAKARTA alias YAYASAN ABDURRAHMAN BIN AUF SOLO ALIAS BM ABDURRAHMAN BIN AUF YOGYAKARTA', 'telp: 0821 3778 2373', 'Korporasi', 'EDD-019', NULL, NULL, 'Indonesia', 'Gandu RT. 06/08, Sedang Tirta Berbah Sleman Yogyakarta', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (25, 'LAZ ABA KPP SOLORAYA alias YAYASAN ABDURRAHMAN BIN AUF SOLO ALIAS BM ABA SOLORAYA', 'telp: 085291915777;', 'Korporasi', 'EDD-018', NULL, NULL, 'Indonesia', 'Jl. Raya Songgolongit Gentan no. 56 Baki Sukoharjo, Jawa Tengah;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (26, 'LAZ ABA KPP LAMPUNG alias BM ABA LAMPUNG;', '- Bidang usaha: Yayasan (sosial dan keagamaan);\n- Nomor akta pendirian: no 22 tahun 2004;\n- Telp: 0811728656, 081369005972, 021- 8013447;', 'Korporasi', 'EDD-017', NULL, NULL, 'Indonesia', 'Jalan Mahoni 01 no. 29 Way Halim Bandar Lampung, Lampung;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (27, 'LAZ ABA KPP SURABAYA alias YAYASAN ABDURRAHMAN BIN AUF-SBY ALIAS BAITUL MAAL ABDURRAHMAN BIN AUF SURABAYA;', '- Bidang usaha: Yayasan (sosial dan keagamaan);\n- Akta pendirian: KEPMENHUMHAM C-701 H;\n- Tanggal pendirian: 21 Oktober 2004;\n- Nomor identitas: Nomor 22 tgl 21-10-2004;\n- Telp: 0318420426, 085730453721, 6281249112091;\n- NPWP 1: 02388841506000;\n- NPWP 2: 02388841561000;', 'Korporasi', 'EDD-016', NULL, NULL, 'Indonesia', 'Jalan Sedati Gede Nomor 77 RT.001 RW. 001, Desa Sedati Gede Kecamatan Sedati Kabupaten Sidoarjo, Jawa Timur;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (28, 'LAZ ABA KPP SUMUT alias YAYASAN BAITUL MAAL ABDURRAHMAN BIN AUF ALIAS ABDURRAHMAN BIN AUF SUMUT YYS MEDAN;', '- Bidang usaha: Yayasan (sosial dan keagamaan);\n- Akta pendirian: 22/21 Oktober 2004;\n- Tanggal pendirian: 21 Oktober 2004;\n- Telp: 6285359550215;\n- NPWP: 023888415061000;\n- email: bmabasumut@gmail.com;', 'Korporasi', 'EDD-015', NULL, NULL, 'Indonesia', '- Jalan Kakap LK XII Belawan Bahagia Medan Belawan, Sumatera Utara;\n- Jalan Selangat/Kakap Pojok Baru, Kelurahan Belawan Bahagia, Kab. Medan Belawan, Sumut;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (29, 'LAZ ABA KPP MAGETAN alias YAYASAN ABDURRAHMAN BIN AUF ALIAS LAZ YAYASAN ABDURRAHMAN BIN AUF \nMAGETAN ALIAS YAYASAN ABDURRAHMAN BIN AUF (BM ABA) MAGETAN;', '- Bidang usaha: Yayasan (sosial dan keagamaan);\n- Nomor akta pendirian: no: 22/tgl 21-10-2004;\n- Tanggal pendirian: 21 Oktober 2004;\n- NPWP: 023888415061000;\n- email: aba.baitulmaal3@gmail.com;', 'Korporasi', 'EDD-014', NULL, NULL, 'Indonesia', 'Dukuh Landangan RT 09 RW 03, Kel. Takeran, Kec. Takeran, Magetan, Jawa Tengah;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (30, 'YAYASAN ABDURRAHMAN SEMARANG CQ. ALFIAN', '- Bidang usaha: Yayasan (sosial dan keagamaan);\n- Tempat tanggal lahir an. Alfian: 14 Maret 1983;\n- Nomor KTP an. Alfian; 33.7413.140383.0001;\n- Telp: 627618641, 6270171050;', 'Korporasi', 'EDD-013', NULL, NULL, 'Indonesia', 'Jalan. WR Supratman Semarang Jawa Tengah;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (31, 'YAYASAN ABDURRAHMAN BIN AUF (BM ABA) BEKASI', '- Bidang usaha: Yayasan (sosial dan keagamaan);\n- SIUP: 420/157/KTM/VII/2017;\n- Nomor akta pendirian: akta pendirian;\n- Nomor ijin usaha: akta pendirian no, 18;\n- Telp: 081286285442 (hp Junaedi-Ketua Umum);\n- NPWP: 824395651435000;', 'Korporasi', 'EDD-012', NULL, NULL, 'Indonesia', 'Kampung Islam Thoyibah Blok H no. 23-24 RT. 004 RW. 005 Desa Kertamukti Cibitung, Kab. Bekasi Barat', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (32, 'LAZ ABA KKP TEMANGGUNG ALIAS YAYASAN ABDURRAHMAN BIN AUF ALIAS YAYASAN ABDURRAHMAN BIN AUF (BM \nABA) TEMANGGUNG', '- Bidang usaha: Yayasan (sosial dan keagamaan);\n- Uraian bidang usaha: Penampung dana zakat dan shodaqoh;\n- Nomor akta pendirian: C-701.HT.01.02;\n- Tanggal pendirian: 13 Mei 2005;\n- Nomor identitas: KEP.04/YABA/1/2012;\n- Telp: 085640202245, 0822 9828 3642;', 'Korporasi', 'EDD-011', NULL, NULL, 'Indonesia', 'Desa Butuh RT. 02 RW. 01, Kel. Butuh, Kec. Temanggung, Kab. Temanggung, Jawa Tengah;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (33, 'ABDURRAHMAN BIN AUF YAYASAN', '- Bidang usaha: Yayasan (sosial dan keagamaan);\n- Tanggal pendirian: 18 Agustus 2017;\n- Telp: 6217292987, 021 33762323, 081288387149;\n- NPWP: 829727346453000;\n- email: HIDUPJAYA2007@YAHOO.CO.ID dan info@baitul-maal.com', 'Korporasi', 'EDD-010', NULL, NULL, 'Indonesia', '- Gedung Pesona Lt 2 Suite 215 Jl Ciputat Raya no. 20 Kebayoran Lama Jakarta Selatan;\n- Jalan Merpati Raya 47 RT.004 RW 003, Desa Sawah Bar Ciputat Tangerang-Banten;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (34, 'Yayasan Abdurrahman Bin Auf (BM ABA)', '- Bidang usaha: Yayasan (sosial dan keagamaan);\n- Nomor rekomendasi BAZNAS: 188/PH/BAZNASNI1/2016;\n- Tanggal pendirian: 21 Oktober 2004;\n- NPWP 1: 025136952245621;\n- NPWP 2: 02.388.841.5.06;', 'Korporasi', 'EDD-009', NULL, NULL, 'Indonesia', '- Jalan H. Samali no. 95 C RT 019 RW 001 Pejaten Barat Pasar Minggu Jakarta Selatan;\n- Jalan Rahayu I no. 5 Kramat Jati Jakarta Timur;;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (35, 'LAZ ABA KPP JAKARTA RAYA alias YAYASAN ABDURRAHMAN BIN AUF BEKASI ALIAS BAILTUL MAAL ABDURRAHMAN \nBIN AUF (BM ABA);', '- Rekomendasi ijin BAZNAS: no. 188/PH/BAZNAS/VII/2016;\n- Ijin operasional Kemenag: no. 2432 tahun 2016;\n- Surat pendaftaran (Kementerian Hukum dan HAM) Nomor: c-701.HT.01.02.TH tanggal 13 Mei 2015;\n- Surat keterangan terdaftar kantor pajak no: PEM-048/WPJ_04/KP_0803/2005 NPWP: 02.388.841.5.061.000 KLU: 8531-PANTI WREDA SWASTA tanggal 31 Januari 2005;\n- Surat keterangan domisili Nomor: 4049/27.1.0/31.74.051001/-1755.13/2015 tanggal: Jakarta 30 Juli 2015;\n- Surat keterangan suku dinas sosial Nomor: 153/1.841.8 tanggal: Jakarta 21 Mei 2004;\n- Didirikan pada tahun 2004;', 'Korporasi', 'EDD-008', NULL, NULL, 'Indonesia', '- Jalan Griya Utama/Mahoni I, Way Halim Permai, Kec. Sukarame, Bandar Lampung;\n- Jalan Makrik, RT. 004, RW. 025, Bojong Rawalumbu, Kec. Rawalumbu, Kota Bekasi, Jawa Barat 17116;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (36, 'SYAM ORGANIZER (SO) alias YAYASAN AMAL SYAM ABADI;', '- Nomor badan hukum AHU-AH-01.06.0006744 tahun 2017;\n- NPWP: 03.348.924.6-543.000;\n- email: admin@syamorganizer.org;\n- Bergerak di bidang penggalangan dana untuk program bantuan bencana alam dan bantuan social (Kesehatan, Pendidikan, dan ekonomi);', 'Korporasi', 'EDD-007', NULL, NULL, 'Indonesia', '- Jalan Suryodiningratan No. 605, Mantrijeron, Yogyakarta;\n- Jalan Pleret Km 01 Tegalmaggisan Baturetno Bantul Banguntapan Yogyakarta 551978;\n- telp 0822-4359-1333 / (0274) 428146;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (37, 'EMRAAN ALI alias ABU JIHAD TNT;', '- Paspor nomor: Trinidad dan Tobago TB162181 (terbit tanggal 27 Januari 2015, habis tanggal 26 Januari 2020);\n- Paspor nomor: Amerika Serikat 420985453 (habis tanggal 6 Februari 2017);\n- Anggota senior dari Negara Islam di Irak dan Levant (ISIL), terdaftar sebagai AlQaida di Irak (QDe.115);\n- Direkrut untuk ISIL dan menginstruksikan individu untuk melakukan tindakan teroris melalui video online; \n- Fisik: tinggi 176 cm, berat 73 kg, bertubuh sedang, warna mata coklat, warna rambut hitam/botak, kulit berwarna coklat; \n- Berbicara bahasa Inggris.', 'Orang', 'ILQ-299', 'Rio Claro, Trinidad and Tobaga', '24667', 'Trinidad and Tobaga;', '- Amerika Serikat (sebagai tahanan di pusat penahanan Federal – Miami nomor register: 10423-509);\n- Jalan Rio Claro Mayaro, Rio Claro Trinidad;\n- Jalan Guayaguayare, Rio Claro, Trinidad;\n- Amerika Serikat;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (38, 'MOHAMMAD ALI AL HABBO alias MOHAMAD ABDULKARIM alias MUHAMMAD ABD-AL-KARIM;', '- Kartu Identifikasi Nasional Republik Arab Suriah Nomor 10716775;\n- Kartu Identifikasi Nasional Republik Arab Suriah Nomor 2020316097;\n- Kartu Identifikasi Nasional Republik Arab Suriah Nomor 2020409266;\n- Fasilitator berbasis di Turki yang menyediakan layanan keuangan untuk atau mendukung negara islam di Irak dan Levant, terdaftar sebagai Al-Qaida di Irak \n(QDe.115).', 'Orang', 'ILQ-298', 'Raqqa, Republik Arab Suriah', '01/10/1983 atau 15/03/1983 atau 01/01/1980;', 'Republik Arab Suriah', '- Gazantiep, Turkey (sejak 2016);\n- Raqqa, Republik Arab Suriah;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (39, 'JAMAL HUSSEIN HASSAN ZEINIYE alias JAMAL HUSAYN ZAYNIYAH', '- Pemimpin AL-NUSRAH untuk orang-orang Levant (QDe.137) di Kalamoun Barat, Republik Arab Syria;\n- Paspor: Syria nomor paspor: 3987189;\n- Nomor identifikasi nasional: 13080011550;\n- Kartu identifikasi Syria nomor: 5877002 dikeluarkan 25 Mei 2011.', 'Orang', 'ILQ-297', 'Benghazi, Libya/Al Tall, Syrian Arab Republik/Tell Mnin, Syrian Arab Republik', '17/08/1972 atau 01/01/1972', 'Republik Arab Syria', 'Republik Arab Syria, Arsal, Bekaa, Lebanon;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (40, 'NOOR WALI MEHSUD alias ABU MANSHOOR ASIM;', 'Pemimpin tehrik-e Taliban Pakistan (TTP) (QDe.132);', 'Orang', 'ILQ-296', 'Gurguray, Pakistan', '28667', 'Pakistan', 'N/A', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (41, 'GASHIBU', '- Tidak berbadan hukum; \n- Menggalang dana via media sosial;\n- Facebook: GASHIBU PROJECT;\n- Donasi untuk keluarga dan mujahidin;\n- Memiliki afiliasi dengan MEI EKOWATI dan SUTOMO ALIAS YASIN;\n- Dikendalikan oleh AGUNG SETYADI;', 'Korporasi', 'EDD-006', NULL, NULL, NULL, 'Semarang, Jawa Tengah;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (42, 'RQ SAMA TAAT', '- Tidak berbadan hukum; \n- Menggalang dana via media sosial;\n- Akun telegram @ADM_SAMATAAT;\n- Terkait dengan MARIFAH HASANAH;', 'Korporasi', 'EDD-005', NULL, NULL, NULL, NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (43, 'ASEER CRUEE CENTER ALIAS ALIF INFAQ SODAQOH ALIAS AL-FATH ALIAS AL-FATIH CENTER ALIAS INFAQ DAN SHODAQOH CENTRE ALIAS ALIF INFAQ DAN SODAQOH CENTER;', '- Tidak berbadan hukum;\n- Menggalang dan via media social;\n- Akun Instagram @team_aseer;\n- Memiliki afiliasi NUR FAZILAH (sudah ditangkap) terkait penyediaan tempat DPO a.n. ABU MUSLIM dan terkait EDI SISWANTO (WNI tertangkap di Singapura);', 'Korporasi', 'EDD-004', NULL, NULL, NULL, NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (44, 'ZULFIQAR RAHMAN IS', '- NIK 3201132601770003; \n- Tergabung dalam kartu keluarga no. 3579021706150001;', 'Orang', 'IDD-023', 'Ambon', '28151', 'Indonesia', '- Dsn. Tegalsari, Tulungrejo, Bumiaji, Batu, Jawa Timur;\n- Kp. Pondok Manggis RT, 005/002, Bojongbaru, Bojonggede, Cibinong 16320;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (45, 'EDI SISWANTO alias ZUBAIR', '- NIK 3276040508860003; \n- Tergabung dalam kartu keluarga no. 3174090602170006;\n- Terkait dengan ASEER CRUE CENTER;', 'Orang', 'IDD-022', 'Ambon', '31629', 'Indonesia', 'Jalan Moch Khafi 1, Gg. H. Tohir 2 no. 8, Jagakarsa, jagakarsa, Kota Adm, Jakarta Selatan, DKI Jakarta;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (46, 'JARWADI', '- NIK 3173061401750014; \n- Tergabung dalam kartu keluarga no. 3173061602100050;\n- Suami dari ARYI SUSANTI;', 'Orang', 'IDD-021', 'Jakarta', '27408', 'Indonesia', '- Rawa Lele, Pegadungan, kalideres, Kota Adm. Jakarta Barat, DKI Jakarta;\n- Jalan Peta Barat, Gg. Langgar No. 26, Pegadungan Patokan masjid Baitul Mamun, Kalideres, Jakarta Barat;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (47, 'MEI EKOWATI alias SITI AISYAH ALIAS AISYAH;', '- NIK 7202014805730001; \n- Terdapat NIK yang sama dengan nama AISYAH;\n- Tergabung dalam kartu keluarga no. 7202011806100002;\n- Terkait dengan Gashibu melalui ABDUL AZIZ;\n- Istri dari SUTOMO alias YASIN;', 'Orang', 'IDD-020', 'Semarang', '26792', 'Indonesia', 'Jalan P. Nias Blakang SMA 4, Kayamanya Sentral, Poso Kota, Poso, Sulawesi Tengah;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (48, 'SUTOMO alias YASIN ALIAS M. YASIN ALIAS SUTOMO BIN SUDARTO ALIAS MOHAMMAD \nYASIN ALIAS YASINO BIN SUDARTO;', '- NIK 720210607650001; \n- Tergabung dalam kartu keluarga no. 7202011806100000;\n- Suami dari MEI EKOWATI dan memiliki keterkaitan transaksi dengan MEI EKOWATI;', 'Orang', 'IDD-019', 'Semarang', '23929', 'Indonesia', 'Jalan P. Nias Blakang SMA 4, Kayamanya Sentral, Poso Kota, Poso, Sulawesi Tengah;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (49, 'ABDUL AZIZ ALIAS ABDUL AZIZ ABU BAKAR ALIAS MAS DIM;', '- NIK 33750225090750004; \n- No. paspor A 9573282 (berlaku sampai dengan 2 Desember 2019);\n- Tergabung dalam kartu keluarga no. 3375022509070203;\n- Terkait dengan Gashibu (rekening yang bersangkutan digunakan untuk penerimaan donasi Gerakan Sehari Seribu dan Gashibu Project);', 'Orang', 'IDD-018', 'Pekalongan', '27653', 'Indonesia', 'Poncol, Gg. 3 No. 10 RT, 002 RW, 003, Poncol, Kec. Pekalongan Timur, Pekalongan, Jawa Tengah;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (50, 'AGUNG SETYADI ALIAS ABU IBNIHI ALIAS ABU JUNDI ALIAS ABU ANNISA ALIAS ABU SAIF AL \nBATTAR ALIAS DEN BAGUS ALIAS TUKANG SAPU GASHIBU ALIAS PAK NE \nALIAS SALAFUL JIHAD;', '- NIK 3374081804750003;\n- No. paspor A 9573282 (berlaku sampai dengan 31 Oktober 2018);\n- Tergabung dalam kartu keluarga no. 3374081412054002;\n- Terkait dengan Gashibu;', 'Orang', 'IDD-017', 'Semarang', '27502', 'Indonesia', 'Genuk Karanglo RT 004 RW 001, Candisari, Semarang, Jawa Tengah 50251;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (51, 'HASNAH ALIAS UMI MURTAFI’AH ALIAS MUTIA;', '- NIK 7206056810800002;\n- Tergabung dalam kartu keluarga no. 7202011710190000;', 'Orang', 'IDD-016', 'Sakita', '29522', 'Indonesia', '- Kayamanya, Kayamanya, Poso Kota, Poso Sulawesi Tengah;\n- Sakita, Bungku Tengah, Kab. Morowali, Sulawesi Tengah 94673;\n- Ds. Sakita, Kec. Bungku Tengah, Kec. Bun, Morowali, Bungku Tengah Morowali, Sulawesi Tengah 94914;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (52, 'ARYI SUSANTI', '- NIK 3173065911761001;\n- No. paspor A 9422189 (berlaku sampai dengan 21 November 2019);\n- Tergabung dalam kartu keluarga no. 3173061602100052;\n- Istri dari JAWARDI;\n- Terkait dengan RQ Sama Taat;', 'Orang', 'IDD-014', 'Jakarta', '28083', 'Indonesia', 'Rawa Lele RT 009 RW 001, Pegadungan, Kalideres, Jakarta Barat;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (53, 'YUYUN IPA', '- NIK 8109027011950001; \n- Tergabung dalam kartu keluarga no. 81040413030381340;\n- Memiliki hubungan dengan ISHAK IPA alias ALI KALORA (pimpinan MIT di Poso);\n- Akun facebook https://m.facebook.com/profile.php?id=1000035212\n44658&ref=content_filter;', 'Orang', 'IDD-013', 'Waelikut', '35033', 'Indonesia', 'Ds. Wailikut, Waelikut, Waesama, Buru Selatan, Maluku;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (54, 'MUHAMAD ARSYADANA AHSANA alias MUHAMMAD ARSYADANA AHSANA JUNDA;', '- NIK 3275110504960002;\n- No. Paspor B2800961 (berlaku sampai dengan 21 April 2021);\n- Terkait dengan oleh Aseer Cruee Center;\n- Tergabung dalam kartu keluarga no. 3275110410130005;\n- Akun facebook https://m.facebook.com/profile.php?id=1000074255\n78816&ref=content_filter;', 'Orang', 'IDD-012', 'Cirebon', '35160', 'Indonesia', 'Kp. Kelapa Dua RT 001/007, Ds. Padurenan, Kel. Mustika Jaya, Kota Bekasi, Jawa Barat;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (55, 'AMIR MUHAMMAD SA’ID ABDAL-RAHMAN AL-MAWLA ALIAS ABU IBRAHIM AL-HASHIMI AL-QURASHI ALIAS HAJJI ABDALLAH \nALIAS ABU ‘UMAR AL-TURKMANI ALIAS ABDULLAH QARDASH ALIAS ABU \n‘ABDULLAH QARDASH ALIAS AL-HAJJ ABDULLAH QARDASH ALIAS HAJJI \nABDULLAH AL-AFARI ALIAS ‘ABDUL AMIR MUHAMMAD SA’ID SALBI ALIAS \nMUHAMMAD SA’ID ‘ABD-AL-RAHMAN AL-MAWLA ALIAS AMIR MUHAMMAD \nSA’ID ‘ABD-AL-RAHMAN MUHAMMAD AL-MULA;', 'Pemimpin negara Islam (ISIS) di Iraq dan Levant, terdaftar sebagai Al-Qaida Iraq;', 'Orang', 'IDQ-296', 'Tall’Afar, Iraq, atau Mosul, Iraq', '05/10/1976 atau 01/10/1976;', NULL, NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (56, 'ISLAMIC STATE IN IRAQ AND THE LEVANT – YEMEN alias ISLAMIC STATE OF IRAQ AND THE LEVANT OF YEMEN alias ISLAMIC STATE IN \nYEMEN alias ISIL IN YEMEN alias ISIS IN YEMEN alias WILAYAT AL-YEMEN, \nPROVINCE OF YEMEN;', '- Didirikan pada bulan November 2014 dan telah diambil sumpahnya oleh Abu Bakr Al Baghdadi dan didirikan oleh Ibrahim Awwad Ibrahim Ali Al-Badri Al-Samarrai yang identitasnya telah tercantum dalam daftar PBB;\n- Terasosiasi dengan Islamic State di Irak dimana entitas tersebut telah tercantum dalam daftar PBB dengan nama Al-Qaida di Iraq.', 'Korporasi', 'ELQ-085', NULL, NULL, 'Yaman', 'N/A', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (57, 'ISLAMIC STATE IN IRAQ AND THE LEVANT – LIBYA alias ISLAMIC STATE OF IRAQ AND THE LEVANT IN LIBYA alias WILAYAT BARQA alias WILAYAT FEZZAN alias WILAYAT TRIPOLITANIA alias WILAYAT TARABLUS alias WILAYAT AL-TARABLUS;', '- Dibentuk pada bulan November 2014 dan diumumkan oleh Abu Bakr Al-Baghdadi, dan didirikan oleh Ibrahim Awwad Ibrahim Ali Al-Badri Al-Samarrai yang telah masuk dalam daftar PBB;\n- Terasosiasi dengan Islamic State di Iraq dimana entitas tersebut telah tercantum dalam daftar PBB dengan nama Al-Qaida di Iraq;', 'Korporasi', 'ELQ-084', NULL, NULL, 'Libya', 'N/A', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (58, 'JAMAAH ANSHARUT DAULAH alias JEMAAH ANSHORUT DAULAH alias JAMAAH ANSHARUT DAULAT;', '- Didirikan pada tahun 2015 sebagai organisasi utama dari grup ekstrimisme di Indonesia yang berafiliasi dengan pimpinan ISIL, yaitu Abu Bakr Al-Baghdadi;\n-Entitas ini berasosiasi dengan ISIL yang telah dimasukkan ke dalam daftar PBB dengan nama Al Qaida di Irak;', 'Korporasi', 'EDQ-006', NULL, NULL, NULL, 'N/A', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (59, 'MUSLIMAH BIMA PEDULI MAMA CHARITY alias ABU MUSLIMAH BIMA PEDULI (MBP);', '- Perizinan Kementerian Hukum dan HAM Nomor AHU-0003653; \n- Rekening atas nama Muslimah Bima Peduli Mama Charity digunakan untuk mengumpulkan dana bagi ABU AHMED FOUNDATION (AAF) \n- NPWP 180850180010309.', 'Korporasi', 'EDD-003', NULL, NULL, 'Indonesia', 'Jln. Dam Rontu No. 23 RT 006 RW 002 Rabangodu Selatan, Kec. Rasanae Timur, Kota Bima Nusa Tenggara Barat;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (60, 'ABU AHMED FOUNDATION (AAF) ALIAS ABU AHMAD FOUNDATION ALIAS ABU FOUNDATION ALIAS NEW AAF MEDIA \nCENTRE ALIAS ALLIANCE HELP AND DAKWAH (AHAD);', 'AAF terafiliasi dengan Hayat Tahrir Al-Sham;', 'Korporasi', 'EDD-002', NULL, NULL, 'Indonesia', 'Jawa Barat', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (61, 'MUASIH', '- NIK 5272026202890003 atas nama MUASIH; \n- Pendidikan SLTA/sederajat;\n- Ybs tercatat di Kementerian Hukum dan HAM sebagai bendahara Muslimah Bima Peduli Mama Charity (MBP-MC);', 'Orang', 'IDD-011', 'Kendal', '32561', 'Indonesia', 'RT 2 RW 1 Kel. Rabangodu Selatan, Kota Bima, Nusa Tenggara Barat;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (62, 'PARMILA ZULFADIYANTI alias PARMILA alias LALA alias BIDAN MILA;', '- NIK 5272024901750004 atas Parmila Zulfadiyanti;\n- Pendidikan diploma IV/strata I;\n- Ybs tercatat di Kementerian Hukum dan HAM sebagai pendiri dan ketua Muslimah Bima Peduli Mama Charity (MBP-MC);\n- Ybs merupakan perwakilan ABU AHMED FOUNDATION (AAF) di Suriah;', 'Orang', 'IDD-010', 'Bima', '27403', 'Indonesia', 'RT 6 RW 2 Kel. Rabangodu Selatan, Kota Bima, Nusa Tenggara Barat;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (63, 'YAYAN YULIANTO alias YAYAN YULIANTO MARGINO alias ABU ALI;', '- NIK 3311092209840003 atas nama YAYAN YULIANTO;\n- No. paspor A7831667 atas nama YAYAN YULIANTO MARGINO berlaku sampai dengan 4 April 2019;\n- Pekerjaan swasta;\n- Pendidikan SLTA/sederajat;\n- Nomor kartu keluarga 3311091405056795;\n- Telah menikah pada tahun 2009;\n- Ybs merupakan perwakilan ABU AHMED FOUNDATION (AAF) di Suriah;', 'Orang', 'IDD-009', 'Sukoharjo', '30947', 'Indonesia', 'Jati RT 001 RW 004 Kel. Cemani, Kec. Grogol, Kab. Sukoharjo, Jawa Tengah;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (64, 'EDI SUSANTO', '- NIK 3376042404790003 atas nama EDI SUSANTO;\n- Pekerjaan Karyawan Swasta;\n- Pendidikan Diploma IV/Strata I;\n- Rekening ybs digunakan oleh ABU AHMED FOUNDATION (AAF) untuk mengumpulkan dana;\n- Pengurus ABU AHMED FOUNDATION (AAF);', 'Orang', 'IDD-008', 'Tasikmalaya', '28669', 'Indonesia', 'Desa Dukuhturi, Kec. Dukuh turi, Kab. Tegal, Jawa Tengah;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (65, 'ACEP AHMAD SETIAWAN alias ABU AHMED AL INDUNISY;', '- NIK 3278042806780001 atas nama Acep Ahmad Setiawan; \n- No. paspor A6036386 berlaku sampai dengan 11 Juli 2018;\n- Pekerjaan swasta;\n- Pendidikan SLTA/sederajat;\n- Yang bersangkuta merupakan suami dari AISYAH HUMAIRA', 'Orang', 'IDD-007', 'Tasikmalaya', '28669', 'Indonesia', '- Jln. Ir. H. Juanda No. 10 RT 003/003, Desa/Kel Panyingkiran, Kec. Indihiang \n- Kel Panyingkiran, Kec. Indihiang, Tasikmalaya, Jawa Barat;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (66, 'TAZNEEN MIRIAM SAILAR ALIAS TAZNIEM ALIAS AISYAH HUMAIRA ALIAS UMMU YASMIN;', '- Pendidikan SLTA/sederajat;\n-  NIK 3278046002800009 atas nama AISYAH HUMAIRA;\n - No. paspor 761204241 atas nama TAZNEEN MIRIAM SAILAR berlaku sampai \ndengan 18 Januari 2018;', 'Orang', 'ILD-001', 'Manchester atau Bekasi ', '20/02/1973\n20/02/1980', 'Britania Raya', 'Kel. Panyingkiran, Kec. Indihiang, Tasikmalaya, Jawa Barat;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (67, 'ISLAMIC STATE IN THE GREATER SAHARA (ISGS)', '- Terdaftar pada 23 Februari 2020;\n- Dibentuk pada Mei 2015 oleh Adnan Abu Walid al-Sahraoui (QDi.415);\n- Terkait dengan Negara Islam di Irak dan Levant (terdaftar sebagai Al-Qaeda di Irak (QDe.115));\n- Kelompok sempalan Al-Mourabitoun (QDe.141);\n- Melakukan serangan teroris di Mali, Niger dan Burkina Faso.', 'Korporasi', 'ELQ-083', NULL, NULL, NULL, 'N/A', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (68, 'ISLAMIC STATE WEST AFRICA PROVINCE (ISWAP)', '- Terdaftar pada 23 Februari 2020;\n- Terkait dengan Negara Islam di Irak dan Levant (terdaftar sebagai Al-Qaida di Irak);\n- Dibentuk pada bulan Maret 2015 oleh Abubakar Shekau;\n- Kelompok sempalan Jama\'atu Ahlis Sunna Lidda\'Awati Wal-Jihad (Boko Haram);\n- Melakukan serangan teroris di Nigeria.', 'Korporasi', 'ELQ-082', NULL, NULL, NULL, 'N/A', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (69, 'AMADOU KAUFA ALIAS AMADOU BARRY ALIAS AMADOU KAUFF', '- Pendiri Katiba Macina Of Jama’a Nusrat Ul-Islam Wa Al-Muslim (JNIM),\n- Salah satu pejabat tinggi di organisasi Al-Qaida di dalam Islamic Maghreb (AQIM)', 'Orang', 'ILQ-295', 'Kaufa, Mali', 'sekira 1958', NULL, 'Mali', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (70, 'BAH AG MOUSSA ALIAS AG MOSSA ALIAS AMMI SALIM;', 'Anggota pendiri Ansar Eddine (QDe.135), pimpinan operasional Jama\'a Nusrat ulIslam wa al-Muslimin (JNIM)', 'Orang', 'ILQ-294', 'Mali;', NULL, 'Mali', 'N/A', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (71, 'ALI MAYCHO ALIAS ABDERAHMANE AL MAGHREBI ALIAS ABDERRAHMANE LE MAROCAIN \nALIAS ABOU ABDERAHMANE SANHAJI;', 'Nomor Paspor Maroko: V06359364 Nomor Identitas Nasional Maroko: AB704306 \nAnggota Al Qaida in the Islamic Maghreb (AQIM), Ansar Eddine, and Jama\'a \nNusrat ul-Islam wa al-Muslimin (JNIM).', 'Orang', 'ILQ-293', 'Maroko', NULL, 'Taza, Maroko', 'Mali', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (72, 'ISLAMIC STATE IN IRAQ AND THE LEVANT-KHORASAN (ISIL-K) alias ISIL KHORASAN alias ISLAMIC STATE’S HIRASAN PROVINCE alias ISIS WILAYAH \nKHORASAN alias ISIL’S SOUTH ASIA BRANCE alias SOUTH ASIAN CHAPTER OF ISIL;', NULL, 'Korporasi', 'ELQ-081', NULL, NULL, NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (73, 'MOHAMMED MASOOD AZHAR ALVI ALIAS MASUD AZHAR ALIAS WALI ADAM ISAH ALIAS WALI ADAM ESAH;', '- Pendiri Jaish-i-Mohammed.\n- Tanggal lahir lainnya 10 Juni 1968.', 'Orang', 'ILQ-292', 'Bahawalpur, Punjab, Pakistan;', '25029', 'Pakistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (74, 'TARIQ GIDAR GROUP alias TEHRIK-E-TALIBAN-TARIQ GIDAR GROUP alias TTP-TARIQ GIDAR GROUP alias \nTEHREEK-I-TALIBAN PAKISTAN GEEDAR GROUP alias TTP GEEDAR GROUP alias \nTARIQ GEEDAR GROUP alias COMMANDER TARIQ AFRIDI GROUP alias TARIQ \nAFRIDI GROUP alias TARIQ GIDAR AFRIDI GROUP alias THE ASIAN TIGER;', 'Merupakan pecahan kelompok Tehrik-e Taliban Pakistan (TTP) Kelompok tersebut \ndidirikan di Darra Adam Khel, Federally Administered Tribal Area (FATA), Pakistan, pada \ntahun 2007;', 'Korporasi', 'ELQ-080', NULL, NULL, NULL, 'Perbatasan wilayah Afghanistan/Pakistan.', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (75, 'HAMZAH USAMA MUHMMAD BIN LADEN', 'Pemutakhiran ISIL (Daesh) dan Al-Qaida Sanctions List per tanggal 28 Februari 2019.', 'Orang', 'ILQ-291', 'Jeddah, Saudi Arabia', NULL, 'Arab Saudi', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (76, 'HAJJ’ABD AL-NASIR alias HAJJI ABDELNASSER alias HAJJI ABD AL-NASR alias TAHA AL-UWAYT;', 'Pencantuman 1 Individu berdasarkan ISIL (Daesh) and Al-Qaida Sanctions List.', 'Orang', 'ILQ-290', 'Tall \'Afar, Irak', NULL, 'Iraq', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (77, 'ANJEM CHOUDARY', 'Ditahan di Inggris pada bulan September 2014, dengan masa pembebasan sementara di bulan Oktober 2018. ', 'Orang', 'ILQ-289', 'Welling, London, United Kingdom of Great Britain and Northern Ireland', '24490', 'Inggris', 'Frankland Prison, United Kingdom of Great Britain and Northern Ireland;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (78, 'JAMA’A NUSRAT UL-ISLAM WA AL-MUSLIMIN (JNIM)', 'Terasosiasi dengan Al-Qaida, the Organization of Al-Qaida in the islamic Maghreb, Ansar \nEddine, and Al-Mourabitoun.', 'Korporasi', 'ELQ-079', NULL, NULL, NULL, NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (79, 'MUHAMMED REZA LAHAMAN KIRAM alias ABDUL RAHMAN alias ABU ABDUL RAHMAN AL FILIPINI alias ABTOL \nRAHMAN;', 'Anggota ISIL', 'Orang', 'ILQ-288', 'Zamboanga, Philippina', '32935', 'Philippina', 'Brgy Recodo, Zamboanga City, Western Mindanao, Philippina;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (80, 'MOHAMAD RAFI BIN UDIN alias MOHD RADI BIN UDIN alias ABU AWN AL MALIZI alias MUHAMMAD \nRATIN alias MUHAMMAD RAFIUDDIN alias ABU UNA AL MALAYZIE alias \nMHAMMAD RAHIM BIN UDIN alias ABU AYN TOK CIT alias MUHAMMAD \nRATIN BIN NURDIN', 'Anggota ISIL', 'Orang', 'ILQ-287', 'Negri Sembilan, Malaysia', '24261', 'Malaysia', 'B-3B-19 Glenview Villa, Jalan 49 Off Jalan Kuari, Taman Pinggiran Cheras, \n56000, Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia ( pada 30 \nJanuari 2014);', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (81, 'MUHAMMAD SYAIFUDDIN alias MUHAMMAD SYAFIUDIN alias SAIFUDDIN alias MOHAMMED YUSOP KARIM \nFAIS alias FAIS alias ABU WALID AI INDUNISY;', 'Diduga saat ini berada di Suria/Irak dan bergabung dengan ISIS, dan sudah \nmengatur beberapa tindak pidana terorisme yang terjadi di Indonesia;', 'Orang', 'IDQ-024', 'Sukoharjo', '28774', 'Indonesia', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (82, 'ADNAN ABOU WALID AL-SAHRAOUI alias LAHBIB IDRISSI OULD SIDI ABDI OULD SAID OULD EL BACHI alias ADNAN \nABU WALID AL-SAHRAWI alias ABU WALID AL SAHRAWI alias ADNAN ABU WALID AL-SAHRAOUI alias ADNAN ABU WALEED AL-SAHRAWI alias LEHBIB \nOULD ALI OULD SAID OULD JOUMANI;', 'Juru bicara l’Unification et le Jihad en Afrique de l’Ouest (MUJAO)', 'Orang', 'ILQ-286', 'Laayoune', '26711', NULL, 'Ménaka, Gao Region, Mali;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (83, 'ABDULPATTA ESCALON ABUBAKAR alias ABDULPATTA ABUBAKAR ESCALON alias ABDUL PATTA ESCALON \nABUBAKAR alias ABDUL PATTA ABU BAKAR;', 'Fasilitator ISIL.', 'Orang', 'ILQ-285', 'Tuburan, Basilan, Philippina', '23804', 'Philippina', 'Philippina', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (84, 'MYRNA AJIJUL MABANZA alias MYRNA ADIJUL MABANZA alias MYRNA AJILUL MABANZA;', 'Fasilitator ISIL.', 'Orang', 'ILQ-284', '-', '33430', 'Philippina', 'Basilan, Philippina;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (85, 'AL-KAWTHAR MONEY EXCHANGE alias AL KAWTHAR CO. alias AL KAWTHAR COMPANY alias AL-KAWTHAR HAWALA;', 'Memfasilitasi transaksi keuangan yang terkait dengan Islamic State in Iraq and the Levant\n(ISIL);', 'Korporasi', 'ELQ-077', NULL, NULL, 'Irak', 'Al-Qaim, Al Anbar, Irak;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (86, 'UMAR MAHMUD IRHAYYIM AL-KUBAYSI alias UMAR MAHMUD RAHIM AL-KUBAYSI alias OMAR MAHMOOD IRHAYYIM AL-FAYYADH alias UMAR MAHMUD RAHIM alias UMAR MAHMUD RAHIM AL-QUBAYSI;', 'Fasilitator keuangan Islamic State in Iraq and the Levant (ISIL);', 'Orang', 'ILQ-283', 'Irak', '24639', 'Irak', 'Al-Qaim, Al-Anbar, Irak', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (87, 'SALIM MUSTAFA MUHAMMAD AL-MANSUR alias SALIM MUSTAFA MUHAMMAD MANSUR AL-IFRI alias SALEEM AL-IFRI alias \nSALIM MANSUR MUSTAFA alias SALIM MANSUR alias HAJJI SALIM AL-SHAKLAR;', 'Pimpinan keuangan Islamic State in Iraq and the Levant (ISIL);', 'Orang', 'ILQ-282', 'Baghdad, Irak', '22697', 'Irak', 'Mosul, Irak', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (88, 'KHATIBA IMAM AL-BUKHARI (KIB) ', 'Berasosiasi dengan Al-Nusra Front For The People Of The Levant.', 'Korporasi', 'ELQ-078', NULL, NULL, NULL, '- Perbatasan Afganistan dan Pakistan;\n- Idilib, Alepo dan Khama, Suriah;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (89, 'AHMAD JAN alias AKHUNDZADA alias SHUKOOR AKHUNDZADA;', 'Kakak ipar Mullah Mohammed Omar;', 'Orang', 'ILT-030', 'Lablan, Dehrawood, Uruzgan, Afganistan', NULL, 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (90, 'LASHKAR-E-TAYYIBA alias LASHKAR-E-TOIBA alias LASHKAR-I-TAIBA alias AL MANSOORIAN alias AL \nMANSOOREEN alias ARMY OF THE PURE alias ARMY OF THE RIGHTEOUS alias \nARMY OF THE PURE AND RIGHTEOUS alias PAASBAN-E-KASHMIR alias PAASBAN-IAHLE-HADITH alias PASBAN-E-KASHMIR alias PASBAN-E-AHLE-HADITH alias \nPAASBAN-E-AHLE-HADIS alias PASHAN-E-AHLE HADIS alias LASHKAR E TAYYABA \nalias LET alias JAMAATUD-DAWA alias JUD alias JAMA\'AT AL-DAWA alias JAMAAT UDDAAWA alias JAMAAT UL-DAWAH alias JAMAAT-UL-DAWA alias JAMA\'AT-I-DAWAT \nalias JAMAIAT-UD-DAWA alias JAMA\'AT-UD-DA\'AWAH alias JAMA\'AT-UD-DA\'AWA alias \nJAMAATI-UD-DAWA alias FALAH-I-INSANIAT FOUNDATION (FIF)', 'Berasosiasi dengan Hafiz Muhammad Saeed yang juga sebagai pemimpinnya;', 'Korporasi', 'ELQ-047', NULL, NULL, NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (91, 'AL-QAIDA IN THE ARABIAN PENINSULA (AQAP) alias  AL-QAIDA OF JIHAD ORGANIZATION IN THE ARABIAN PENINSULA alias TANZIM \nQA’IDAT AL-JIHAD FI JAZIRAT AL-ARAB alias AL-QAIDA ORGANIZATION IN THE \nARABIAN PENINSULA (AQAP) alias AL-QAIDA IN THE SOUTH ARABIAN PENINSULA \nalias ANSAR AL-SHARI\'A (AAS);', '- Sebagai pemimpin adalah Nasir \'abd-al-Karim \'Abdullah Al-Wahishi;\n- Sebagai deputinya Said Ali Al-Shihri', 'Korporasi', 'ELQ-025', NULL, NULL, NULL, 'Yaman dan Arab Saudi;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (92, 'AL-QAIDA alias \"THE BASE\" alias AL QAEDA alias ISLAMIC SALVATION FOUNDATION alias THE \nGROUP FOR THE PRESERVATION OF THE HOLY SITES alias THE ISLAMIC ARMY \nFOR THE LIBERATION OF HOLY PLACES alias THE WORLD ISLAMIC FRONT FOR \nJIHAD AGAINST JEWS AND CRUSADERS alias USAMA BIN LADEN NETWORK alias \nUSAMA BIN LADEN ORGANIZATION alias AL QA\'IDA alias AL QA’IDA/ISLAMIC ARMY;', NULL, 'Korporasi', 'ELQ-023', NULL, NULL, NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (93, 'AL FURQAN alias DZEMILIJATI FURKAN alias DZEM\'IJJETUL FURQAN alias ASSOCIATION FOR \nCITIZENS RIGHTS AND RESISTANCE TO LIES alias DZEMIJETUL FURKAN alias \nASSOCIATION OF CITIZENS FOR THE SUPPORT OF TRUTH AND SUPRESSION OF \nLIES alias SIRAT alias ASSOCIATION FOR EDUCATION, CULTURE AND BUILDING \nSOCIETY-SIRAT alias ASSOCIATION FOR EDUCATION, CULTURAL, AND TO CREATE \nSOCIETY-SIRAT alias ISTIKAMET alias IN SIRATEL;', NULL, 'Korporasi', 'ELQ-004', NULL, NULL, 'Bosnia Herzegovina', '- 30a Put Mladih Muslimana (Ex Pavla Lukaca Street), 71 000 Sarajevo, Bosnia And Herzegovina;\n- 72 ul. Strossmajerova, Zenica,Bosnia And Herzegovina;\n- 42 Muhameda Hadzijahica, Sarajevo, Bosnia And Herzegovina;\n- 70 And 53 Strosmajerova Street, Zenica, Bosnia And Herzegovina;\n- Zlatnih Ljiljana Street, Zavidovici, Bosnia And Herzegovina;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (94, 'SHAFI SULTAN MOHAMMED AL-AJMI', 'Penggalang dana Al-Nusra', 'Orang', 'ILQ-211', 'Warah, Kuwait', '26665', 'Kuwait', 'Area 3, Street 327, Building 41, Al-Uqaylah, Kuwait', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (95, 'MAYSAR ALI MUSA ABDALLAH AL-JUBURI ', 'Amir Sharia Al-Nusra', 'Orang', 'ILQ-210', 'Harara, Ninawa, Irak', '27912', 'Irak', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (96, 'AHMED JAN AKHUNDZADA AKHUNDZADA', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-127', 'Kandahar , Afganistan', NULL, 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (97, 'SALAH EDDINE GASMI alias ABOU MOHAMED SALAH', NULL, 'Orang', 'ILQ-118', 'Aljazair', '26036', 'Aljazair', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (98, 'ZAKARYA ESSABAR alias ZAKARIYA ESSABAR', NULL, 'Orang', 'ILQ-116', 'Maroko', '28218', 'Maroko', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (99, 'MOUSSA BEN OMAR BEN ALI ESSAADI alias ABDELRAHMMAN', NULL, 'Orang', 'ILQ-115', 'Tunisia', '23715', 'Tunisia', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (100, 'QASIM MOHAMED MAHDI AL-RIMI alias Qassim Mohammad Mahdi Al Rimi', NULL, 'Orang', 'ILQ-062', 'Sanaa, Yaman', '28646', 'Yaman', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (101, 'MOHAMMED AL GHABRA alias MOHAMMED EL’ GHABRA', NULL, 'Orang', 'ILQ-037', 'Damaskus', '29373', 'Inggris', 'London Timur, Inggris', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (102, 'JAMAAT-UL-AHRAR (JuA) alias JAMAAT-E-AHRAR alias TEHRIK-E TALIBAN PAKISTAN JAMAAT UL AHRAR', '- Merupakan Tehrik-e Taliban Pakistan;\n- Berhubungan dengan Islamic State in Iraq and the Levant (ISIL).', 'Korporasi', 'ELQ-076', NULL, NULL, NULL, 'Provinsi Nangarhar, Afghanistan/Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (103, 'JUND AL AQSA alias THE SOLDIERS OF AQSA alias SOLDIERS OF AQSA alias SARAYAT AL QUDS', 'Berkaitan dengan Al Nusrah Front for the People of the Levant;', 'Korporasi', 'ELQ-075', NULL, NULL, NULL, '- Idlib, Suriah;\n- Hama, Suriah.', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (104, 'JAYSH KHALID IBN AL WALEED alias KHALID IBN AL-WALID ARMY alias LIWA SHUHADA AL-YARMOUK alias HARAKAT ALMUTHANNA AL-ISLAM', 'Bergabung dengan Islamic State in Iraq and the Levant (ISIL).', 'Korporasi', 'ELQ-074', NULL, NULL, NULL, NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (105, 'SELSELAT AL-THAHAB alias SILSILET AL THAHAB alias SELSELAT AL THAHAB FOR MONEY EXCHANGE alias \nSILSILAT MONEY EXCHANGE COMPANY alias SILSILAH MONEY EXCHANGE \nCOMPANY alias AL SILSILAH AL DHAHABA alias SILSALAT AL DHAB;', 'Bisnis pertukaran uang Islamic State in Iraq and the Levant (ISIL).', 'Korporasi', 'ELQ-073', NULL, NULL, NULL, '- Al-Kadhumi Complex, Al-Harthia, Baghdad, Iraq;\n- Al-Abbas Street, Karbala, Iraq;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (106, 'HANIFA MONEY EXCHANGE OFFICE (BRANCH LOCATED IN ALBU KAMAL, SYRIAN \nARAB REPUBLIC) alias HANIFAH CURRENCY EXCHANGE alias HANIFEH EXCHANGE alias HANIFA \nEXCHANGE alias HUNAIFA OFFICE alias HANIFAH EXCHANGE COMPANY alias \nHANIFA MONEY EXCHANGE OFFICE;', '- Bisnis pertukaran uang Suriah, digunakan khusus untuk transaksi keuangan ISIL;\n- Memfasilitasi perpindahan dana Islamic State in Iraq and the Levant (ISIL).', 'Korporasi', 'ELQ-072', NULL, NULL, NULL, 'Albu Kamal (Al-Bukamal), Suria', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (107, 'SAID JAN ABD AL-SALAM', 'Nomor paspor Afganistan OR801168', 'Orang', 'ILQ-004', '-', '29622', 'Afganistan', '- ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (108, 'FARED SAAL alias ABU LUQMAAN AL ALMANI alias ABU LUGMAAN', 'Anggota Islamic state in Iraq and the levant yang berasal dari Jerman;', 'Orang', 'ILQ-279', 'Jerman', '32557', 'Jerman', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (109, 'GHALIB ABDULLAH AL-ZAIDI alias GHALIB ABDALLAH AL-ZAYDI alias GHALIB ABDALLAH ALI AL-ZAYDI', 'Pemimpin Al-Qaida in the arabian Peninsula', 'Orang', 'ILQ-277', 'Yaman', '00/00/1975', 'Yaman', 'Yemen Sana’a, Yemen', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (110, 'IYAD NAZMI SALIH KHALIL alias AYYAD NAZMI SALIH KHALIL alias EYAD NAZMI SALEH KHALIL', 'Pemimpin Al-Nusrah front for the people of the levant', 'Orang', 'ILQ-276', 'Suriah ', '00/00/1974', 'Yordania', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (111, 'BASSAM AHMAD AL-HASRI alias BASSAM AHMAD HUSARI', 'Pemimpin Al-Nusrah front for the people of the levant', 'Orang', 'ILQ-275', 'Suriah ', '25204', 'Suriah', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (112, 'ABU UBAYDAH YUSUF AL-ANABI alias ABOU OBEIDA YOUSSEF AL-ANNABI alias ABU-UBAYDAH YUSUF AL-INABI', 'Yang bersangkutan merupakan pimpinan orgnisasi Al-Qaida in the Islamic Maghreb (AQIM)', 'Orang', 'ILQ-280', 'Annaba, Aljazair', '07/02/1969', 'Aljazair', 'Aljazair', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (113, 'SHANE DOMINIC CRAWFORD alias ASADULLAH alias ABU SA’D AT-TRINIDADI alias ASAD', 'Anggota Islamic State in Iraq and the Levant (ISIL) yang bertugas melakukan propaganda dengan bahasa Inggris', 'Orang', 'ILQ-274', 'Mount Hope, Trinidad and Tobago', '22/02/1986', 'Trinidad Tobago', 'Suria/Hatay, Turki/ Trinidad dan Tobago', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (114, 'ELSHAFEE EL SHEIKH alias EL SHAFEE ELSHEIKH alias ALSHAFEE EL-SHEIKH', 'anggota Islamic State in Iraq and the Levant (ISIL)', 'Orang', 'ILQ-273', 'London', '16/07/1988', 'Inggris', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (115, 'ALEXANDA AMON KOTEY alias ALEXE KOTEY alias ALEXANDA KOTE', 'Anggota Islamic State in Iraq and the Levant (ISIL)', 'Orang', 'ILQ-272', 'London', '13/12/1983', 'Inggris', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (116, 'MURAD IRAKLIEVICH MARGOSHVILI alias ZURAB IRAKLIEVICH MARGOSHVILI alias MURAD AKHMEDOVICH MADAYEV alias LOVA MADAYEV alias ABU-MUSLIM AL-SHISHANI', 'Berkaitan dengan Jabhat al-Nusrah', 'Orang', 'ILQ-271', 'Grozny, Rusia', NULL, 'Rusia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (117, 'MALIK RUSLANOVICH BARKHANOEV alias SAIFUDDIN alias SAIFUDDIN AL-INGUSHI alias SAIFUDDIN INGUSHI', 'Bergabung dengan ISIL pada September 2016', 'Orang', 'ILQ-270', 'Ordzhonikidzevskaya, Rusia', '14/03/1992', 'Rusia', 'Mosul, Irak', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (118, 'OMAN ROCHMAN alias AMAN ABDURAHMAN alias ABU SULAIMAN bin ADE SUDARMA', 'Tokoh Jemaah Anshorut Daulah (JAD) dan terlibat dalam aksi-aksi terorisme \nyang dilakukan oleh pendukung JAD, karena selalu memberikan motivasi, saat ini \nsedang menjalani proses sidang', 'Orang', 'IDQ-023', 'Sumedang', '05/01/1972', 'Indonesia', 'Kampung Panteneun, RT 02 RW 07, Desa Licin, Kecamatan Cimalaka, \nSumedang Jawa Barat', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (119, 'ABDUL-HAQ WASSIQ', 'Dalam masa penahanan Amerika Serikat', 'Orang', 'ILT-126', 'Gharib, Khogyani, Ghazni, Afganistan', '00/00/1971', 'Afganistan', 'Penjara Guantanamo', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (120, 'ATIQULLAH WALI MOHAMMAD', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-125', 'Tirin Kot, Uruzgan, Afganistan', '00/00/1962', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (121, 'MOHAMMAD SADIQ alias AMIR MOHAMMAD;', 'Diberitakan meninggal', 'Orang', 'ILT-035', 'Ghazni, Afganistan', '00/00/1934', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (122, 'BACHRUN NAIM alias MUHAMMAD BAHRUNNAIM alias MUHAMMAD BAHRUN NAIM ANGGIH \nTAMTOMO alias NAIM alias ABU AISYAH', 'Diduga saat ini berada di Suria/Irak dan bergabung dengan ISIS, dan sudah \nmengatur beberapa tindak pidana terorisme yang terjadi di Indonesia', 'Orang', 'IDD-003', 'Pekalongan', '06/09/1983', 'Indonesia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (123, 'SALIM MUBARAK ATTAIMI alias SALIM MUBAROQ ATAMIMI alias ABU JANDAL alias SALIM PENCENG', 'Diduga saat ini berada di Suria/Irak dan bergabung dengan ISIS, dan sudah \nmengatur beberapa tindak pidana terorisme yang terjadi di Indonesia', 'Orang', 'IDD-004', 'Pasuruan', '25/08/1977', 'Indonesia', 'Sengkali, Kota Malang, Jawa Timur ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (124, 'ALI AHMAD alias ALI AHMAD KALORA alias ALI KALORA', '- Merupakan anggota kelompok Mujahidin Indonesia Timur (MIT);\n- Diduga saat ini berada di Poso, Sulawesi Tengah;', 'Orang', 'IDD-006', 'Desa Kalora Poso Pesisir Utara, Poso, Sulawesi Tengah', NULL, 'Indonesia', 'Sulawesi Tengah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (125, 'USMAN BACHRUMSYAH MENNOR alias SYAH BAHRUM alias BACHRUMSHAH alias BACHRUMSYAH alias \nBAHRUMSYAH alias IBRAHIM ABU alias ABU MUHAMMAD AI-ANDUNISIY\nalias ABU MUHAMMAD AI-INDONESI alias ABU MUHAMMAD AI-INDUNISI alias \nABU SHABRINA', 'Diduga saat ini berada di Suria/Irak dan bergabung dengan ISIS, dan sudah \nmengatur beberapa tindak pidana terorisme yang terjadi di Indonesia', 'Orang', 'IDD-002', 'Bogor', '23/07/1984', 'Indonesia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (126, 'SA\'D BIN SA\'D MUHAMMAD SHARIYAN AL-KA\'BI alias SA\'D BIN SA\'D MUHAMMAD SHIRYAN AL-KA\'BI alias SA\'D SA\'D MUHAMMAD \nSHIRYAN AL-KA\'BI', 'Fasilitator dari Qatar untuk yang menyediakan jasa keuangan kepada, atau untuk \nmendukung Al-Nusrah Front for the People of the Levant', 'Orang', 'ILQ-229', '-', '15/02/1972', 'Qatar', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (127, ' IBRAHIM \'ISA HAJJI MUHAMMAD AL-BAKR', ' Fasilitator yang memberikan dukungan keuangan untuk Al-Qaida', 'Orang', 'ILQ-217', 'Qatar', '12/07/1977', 'Qatar', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (128, 'ASHRAF MUHAMMAD YUSUF \'UTHMAN \'ABD AL-SALAM', 'Pemberi dukungan keuangan dan dukungan teknologi untuk Al-Qaida', 'Orang', 'ILQ-216', 'Irak', '00/00/1984', 'Yordania', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (129, 'ABD AL-RAHMAN BIN ‘UMAYR AL-NU’AYMI alias ABD AL-RAHMAN BIN \'AMIR AL-NA\'IMI', 'Pendukung dana dan fasilitator Al-Qaida', 'Orang', 'ILQ-207', 'Qatar', '00/00/1954', 'Qatar', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (130, 'JAM\'YAH TA\'AWUN AL-ISLAMIA alias SOCIETY OF ISLAMIC COOPERATION alias JAM\'IYAT AL TA\'AWUN AL ISLAMIYYA alias JIT;', '-', 'Korporasi', 'ELQ-046', NULL, '00/00/0000', 'Afganistan', 'Kandahar City, Afghanistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (131, 'JAMA\'ATU AHLIS SUNNA LIDDA\'AWATI WAL-JIHAD alias JAMA\'ATU AHLUS-SUNNAH LIDDA\'AWATI WAL JIHAD alias JAMA\'ATU AHLUS-SUNNA \nLIDDA\'AWATI WAL JIHAD alias BOKO HARAM alias WESTERN EDUCATION IS A SIN;', 'Dipimpin oleh Abubakar Shekau', 'Korporasi', 'ELQ-045', NULL, '00/00/0000', 'Nigeria', 'Nigeria', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (132, 'BENEVOLENCE INTERNATIONAL FOUNDATION alias AL BIR AL DAWALIA alias BIF alias BIF-USA alias MEZHDUNARODNYJ BLAGOTVORITEL\'NYL FOND', NULL, 'Korporasi', 'ELQ-032', NULL, '00/00/0000', NULL, '- 8820 Mobile Avenue, Ia, Oak Lawn, Illinois, 60453, Amerika Serikat;\n- P.O. Box 548, Worth, Illinois, 60482, Amerika Serikat;\n- 9838 S. Roberts Road, Suite 1W, Palos Hills, Illinois, 60465, Amerika Serikat;\n- 20-24 Branford Place, Suite 705, Newark, New Jersey, 07102, Amerika Serikat;\n- P.O. Box 1937, Khartoum, Sudan;\n- Banglades;\n- Gaza Strip;\n- Yaman;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (133, 'ANSARUL MUSLIMINA FI BILADIS SUDAN alias ANSARU alias ANSARUL MUSLIMINA FI BILADIS SUDAN alias JAMA\'ATU ANSARIL \nMUSLIMINA FI BILADIS SUDAN (JAMBS) alias JAMA’ATU ANSARUL MUSLIMINA FI \nBILADIS-SUDAN (JAMBS) alias JAMMA’ATU ANSARUL MUSLIMINA FI BILADIS-SUDAN \n(JAMBS) alias VANGUARDS FOR THE PROTECTION OF MUSLIMS IN BLACK AFRICA \nalias VANGUARD FOR THE PROTECTION OF MUSLIMS IN BLACK AFRICA;', NULL, 'Korporasi', 'ELQ-029', NULL, '00/00/0000', 'Nigeria', 'Nigeria', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (134, 'AL-QAIDA IN IRAQ alias AQI alias AL-TAWHID alias THE MONOTHEISM AND JIHAD GROUP alias QAIDA OF \nTHE JIHAD IN THE LAND OF THE TWO RIVERS alias AL-QAIDA OF JIHAD IN THE \nLAND OF THE TWO RIVERS alias THE ORGANIZATION OF JIHAD’S BASE IN THE \nCOUNTRY OF THE TWO RIVERS alias THE ORGANIZATION BASE OF \nJIHAD/COUNTRY OF THE TWO RIVERS alias THE ORGANIZATION BASE OF \nJIHAD/MESOPOTAMIA alias TANZIM QA’IDAT AL-JIHAD FI BILAD AL-RAFIDAYN alias \nTANZEEM QA’IDAT AL JIHAD/BILAD AL RAAFIDAINI alias JAMA\'AT AL-TAWHID \nWA\'AL-JIHAD alias JTJ alias ISLAMIC STATE OF IRAQ alias ISI alias AL-ZARQAWI \nNETWORK alias ISLAMIC STATE IN IRAQ AND THE LEVANT', NULL, 'Korporasi', 'ELQ-024', NULL, '00/00/0000', 'Irak', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (135, 'OMAR ALI HUSSAIN alias ABU-SA\'ID AL BRITANI', NULL, 'Orang', 'ILQ-235', 'Inggris', '21/03/1987', 'Inggris', ' Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (136, 'MU’TASSIM YAHYA ALI AL-RUMAYSH alias RAYHANAH alias ABU-RAYHANAH alias HANDALAH;', ' Fasilitator dan penyandang dana ISIL', 'Orang', 'ILQ-238', 'Jeddah, Arab Saudi', '04/01/1973', 'Yaman', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (137, 'RADI ABD EL SAMIE ABOU EL YAZID EL AYASHI ', NULL, 'Orang', 'ILQ-110', 'Mesir', '02/01/1972', NULL, NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (138, 'RAMZI MOHAMED ABDULLAH', NULL, 'Orang', 'ILQ-089', 'Gheil Bawazir, Hadramawt, Yemen', '01/05/1972', 'Yaman', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (139, 'MAHMOUD MOHAMMAD AHMED BAHAZIQ', NULL, 'Orang', 'ILQ-082', 'India', '17/08/1943', 'Arab Saudi', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (140, 'MUHSIN FADHIL AYED ASHOUR AL-FADHLI alias MUHSIN FADHIL ‘AYYID AL FADHLI alias MUHSIN FADIL AYID ASHUR AL \nFADHLI alias ABU MAJID SAMIYAH alias ABU SAMIA', NULL, 'Orang', 'ILQ-077', 'Kuwait', '24/04/1981', 'Kuwait', 'Block Four, Street 13, House #179 Kuwait City, Al-Riqqa Area, Kuwait', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (141, 'ABD-AL-MAJID AZIZ AL-ZINDANI alias ABDEL MAJID AL-ZINDANI alias SHAYKH \'ABD AL-MAJID AL-ZINDANI alias SHEIKH ABD AL-MEGUID AL-ZANDANI', NULL, 'Orang', 'ILQ-074', 'Sana\'a, Yaman', '00/00/1950', 'Yaman', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (142, 'IBRAHIM AWWAD IBRAHIM ALI AL-BADRI AL-SAMARRAI alias Dr. IBRAHIM AWWAD IBRAHIM ALI AL-BADRIAL-SAMARRAI alias Dr. IBRAHIM \nalias ABU BAKR AL-BAGHDADI AL-HUSAYNI AL-QURAISHI alias ABU BAKR \nAL-BAGHDADI', '- Pemimpin Islamic State in Iraq and the Levant/Al-Qaida in Iraq (AQI),\n- Bertanggung jawab dalam mengelola dan mengatur AQI dalam operasi skala besar', 'Orang', 'ILQ-044', 'Samarra, Irak', '00/00/1971', 'Irak', 'Suriah ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (143, 'MUHANNAD AL-NAJDI alias ALI MANAHI ALI AL-MAHAYDALI AL-\'UTAYBI', 'Fasilitator Syria', 'Orang', 'ILQ-252', 'Arab Saudi', '19/05/1984', 'Arab Saudi', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (144, 'HANI AL-SAYYID AL-SEBAI YUSIF alias HANI YOUSEF AL-SEBAI alias HANI YOUSSEF alias HANY YOUSEFF alias \nHANI YUSEF alias HANI AL-SAYYID AL-SABAI alias HANI AL-SAYYID EL \nSEBAI alias HANI AL-SAYYID AL SIBA\'I alias HANI AL-SAYYID EL SABAAY \nalias EL-SABABT alias ABU TUSNIN alias ABU AKRAM alias HANI EL SAYYED \nELSEBAI YUSEF alias ABU KARIM alias HANY ELSAYED YOUSSEF;', NULL, 'Orang', 'ILQ-191', 'Qaylubiyah, Mesir', '22083', 'Mesir', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (145, 'SAYF-AL ADL alias SAIF AL-\'ADIL alias SEIF AL ADEL alias MUHAMAD IBRAHIM MAKKAWI', NULL, 'Orang', 'ILQ-177', 'Mesir', '22017', 'Mesir', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (146, 'ABDUL HAQ ALIAS MAIMAITIMING MAIMAITI alias ABDUL HEQ', NULL, 'Orang', 'ILQ-125', 'Cina', '10/10/1971', 'Cina', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (147, 'MUTHANNA HARITH AL-DARI alias DR. MUTHANNA AL DARI alias MUTHANA HARITH AL DARI alias MUTHANNA \nHARITH SULAYMAN AL-DARI alias MUTHANNA HARITH SULAYMAN ALDHARI alias MUTHANNA HARETH AL-DHARI alias MUTHANA HARIS ALDHARI alias DOCTOR MUTHANNA HARITH SULAYMAN AL DARI AL-ZAWBA\' \nalias MUTHANNA HARITH SULAYMAN AL-DARI AL-ZOBAI alias MUTHANNA \nHARITH SULAYMAN AL-DARI AL-ZAWBA\'I alias MUTHANNA HARETH ALDARI alias MUTHANA HARIS AL-DARI alias DOCTOR MUTHANNA AL-DARI \nalias DR. MUTHANNA HARITH AL-DARI AL-ZOWBAI', NULL, 'Orang', 'ILQ-034', 'Irak', '16/06/1969', 'Irak', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (148, 'IBRAHIM HASSAN TALI AL-ASIRI alias IBRAHIM HASSAN TALI ASIRI alias IBRAHIM HASAN TALEA ASEERI alias \nIBRAHIM HASSAN AL-ASIRI alias IBRAHIM HASAN TALI ASIRI alias IBRAHIM \nHASSAN TALI ASSIRI alias IBRAHIM HASAN TALI\'A \'ASIRI alias IBRAHIM \nHASAN TALI AL-\'ASIRI', 'Nomor paspor F 654645', 'Orang', 'ILQ-028', 'Arab Saudi', '19/04/1982', 'Arab Saudi', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (149, 'HAMID ABDALLAH AHMAD AL-ALI alias DR. HAMED ABDULLAH AL-ALI alias HAMED AL-\'ALI alias HAMED BIN \n\'ABDALLAH AL-\'ALI alias HAMID \'ABDALLAH AL-\'ALI alias HAMID \'ABDALLAH \nAHMAD AL-\'ALI alias HAMID BIN ABDALLAH AHMED AL-ALI alias HAMID \nABDALLAH AHMED AL-ALI', NULL, 'Orang', 'ILQ-024', 'Kuwait', '20/01/1960', 'Kuwait', 'Kuwait', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (150, 'ZAKI EZAT ZAKI AHMED RIF\'AT SALIM ABU USAMA', NULL, 'Orang', 'ILQ-020', 'Mesir', '21/04/1960', 'Mesir', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (151, 'JABER ABDALLAH JABER AHMAD AL-JALAHMAH alias JABER AL-JALAMAH alias ABU MUHAMMAD AL-JALAHMAH alias JABIR \nABDALLAH JABIR AHMAD JALAHMAH alias JABIR \'ABDALLAH JABIR AHMAD \nAL-JALAMAH alias JABIR AL-JALHAMI', NULL, 'Orang', 'ILQ-018', 'Kuwait', '24/09/1959', 'Kuwait', 'Kuwait', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (152, 'ABD AL-LATIF BIN ABDALLAH SALIH MUHAMMAD AL-KAWARI alias ABD-AL-LATIF ABDALLAH SALIH AL-KAWARI alias ABD-AL-LATIF ABDALLAH \nSALIH AL-KUWARI', 'Fasilitator dari Qatar untuk yang menyediakan jasa keuangan kepada atau untuk \nmendukung Al-Qaida', 'Orang', 'ILQ-227', '-', '28/09/1973', 'Qatar', 'Al-Laqtah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (153, 'HAJI BASIR AND ZARJMIL COMPANY HAWALA alias HAJI BASHIR AND ZARJMIL HAWALA COMPANY alias HAJI ABDUL BASIR AND ZAR \nJAMEEL HAWALA alias HAJI BASIR HAWALA alias HAJI BASEER HAWALA alias HAJI \nABDUL BASIR EXCHANGE SHOP alias HAJI BASIR AND ZARJAMIL CURRENCY \nEXCHANGE alias HAJI ZAR JAMIL, HAJI ABDUL BASEER MONEY CHANGER', 'Penyedia layanan keuangan yang digunakan untuk mengirim/mentransfer dana', 'Korporasi', 'ELT-005', NULL, '00/00/0000', 'Pakistan', 'Sanatan (variant Sanatin) Bazaar, Sanatan Bazaar Street, near Trench (variant Tranch) \nRoad, Chaman, Baluchistan Province, Pakistan,', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (154, 'AL-NUSRAH FRONT FOR THE PEOPLE OF THE LEVANT alias HAY’AT TAHRIR AL- SHAM (HTS) alias HAY’ET TAHRIR AL-SHAM alias JABHAT ALNUSRAH alias JABHET AL-NUSRA alias AL-NUSRAH FRONT AL-NUSRA FRONT alias \nANSAR AL-MUJAHIDEEN NETWORK alias ON THE BAEFIELDS OF JIHAD alias \nJABHAT FATH AL-SHAM alias JABHAT FATAH AL-SHAM alias JABHAT FATEH ALSHAM alias FATAH AL-SHAMFRONT alias FATEH AL-SHAM FRONT alias CONQUEST \nOF THE LEVANT FRONT alias THE FRONT FOR THE LIBERATION OFAL SHAM alias \nFRONT FOR THE CONQUEST OF SYRIA/THE LEVANT alias FRONT FOR THE \nLIBERATION OF THE LEVANT alias FRONT FOR THE CONQUEST OF SYRIA', '- Berafiliasi dengan Al-Qaida, beroperasi di Suriah dan mendukung jaringan di Irak;\n- Pada Januari 2017 Front Al-Nusra membentuk Hay’at Tahrir al-Sham (HTS) untuk mendukung pemberontakan di Suriah;\n- Al-Nusrah Front for the People of the Levant tercanatum dalam dalam Res. Dewan \nKeamanan PBB 1267 sejak 7 Juni 2017 dan diperbarui kembali pada 5 Juni 2018, serta \ndan diperbarui kembali pada 15 November 2021 termasuk pembentukan Hay’at Tahrir \nal-Sham (HTS);', 'Korporasi', 'ELQ-022', NULL, '00/00/0000', 'Suriah', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (155, 'HARAKAT SHAM AL-ISLAM alias HARAKET SHAM AL-ISLAM alias SHAM AL-ISLAM alias SHAM AL-ISLAM MOVEMENT', 'Beroperasi di Suriah, berhubungan dengan AI Nusrah Front for the People of the Levant', 'Korporasi', 'ELQ-071', NULL, '00/00/0000', 'Suriah', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (156, 'AL MOURABITOUN alias LES SENTINELLES alias THE SENTINELS', 'Dipimpin oleh Mokhtar Belmokhtar;', 'Korporasi', 'ELQ-021', NULL, '00/00/0000', 'Mali', 'Mali', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (157, 'AL MOULATHAMOUN alias LES ENTURBANNÉS alias THE VEILED', NULL, 'Korporasi', 'ELQ-020', NULL, '00/00/0000', NULL, '-Mali;\n-Nigeria;\n-Alzajair;	\n', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (158, 'SPECIAL PURPOSE ISLAMIC REGIMENT (SPIR)  alias THE ISLAMIC SPECIAL PURPOSE REGIMENT alias THE AL-JIHAD-FISI-SABILILAH \nSPECIAL ISLAMIC REGIMENT alias ISLAMIC REGIMENT OF SPECIAL MEANING;', 'berhubungan dengan the Islamic International Brigade (IIB) dan the Riyadus-Salikhin \nReconnaissance and Sabotage Battalion of Chechen Martyrs (RSRSBCM);', 'Korporasi', 'ELQ-070', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (159, 'AL MOUAKAOUNE BIDDAM alias LES SIGNATAIRES PAR LE SANG alias CEUX QUI SIGNENT AVEC LE SANG alias THOSE WHO SIGN IN BLOOD', 'Terkait dengan Al-Qaida dan dipimpin oleh Mokhtar Belmokhtar;', 'Korporasi', 'ELQ-019', NULL, '00/00/0000', 'Mali', 'Mali', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (160, 'AL-ITIHAAD AL-ISLAMIYA alias AIAI', '- Dilaporkan telah beroperasi di Somalia dan Ethiopia dan telah bergabung dengan Harakat Al-Shabaab Al-Mujaahidiin (Al-Shabaab);\n- Diterima berafiliasi dengan Al-Qaida oleh Aiman Muhammad Rabi al-Zawahiri pada Februari 2012;', 'Korporasi', 'ELQ-018', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (161, 'JUND AL-KHILAFAH IN ALGERIA (JAK-A) alias JUND AL KHALIFA alias JUND AL-KHILAFAH FI ARD AL-JAZA’IR;', NULL, 'Korporasi', 'ELQ-069', NULL, '00/00/0000', 'Aljazair', 'Kabylie region, Aljazair', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (162, 'AL-HARAMAYN FOUNDATION (TANZANIA)', NULL, 'Korporasi', 'ELQ-017', NULL, '00/00/0000', 'Tanzania', '- P.O. Box 3616, Dar Es Salaam, Tanzania;\n- Tanga;\n- Singida	\n', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (163, 'THE ARMY OF EMIGRANTS AND SUPPORTERS alias Battalion Of Emigrants And Supporters Alias Army Of Emigrants And Supporters \nOrganization Alias Battalion Of Emigrants And Ansar Alias Jaysh Al-Muhajirin Wal-Ansar \n(Jamwa)', '- Berafiliasi dengan Islamic State in Iraq and the Levant;\n- Berafiliasi dengan AI-Nusrah Front for the People of the Levant.', 'Korporasi', 'ELQ-068', NULL, '00/00/0000', NULL, 'Jabal Turkuman area, Lattakia Governorate, Syrian Arab Republic Syiria', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (164, 'ANSAR AL CHARIA BENGHAZI alias Ansar Al-Charia alias Ansar Al Charia alias Ansar al-charia Benghazi', 'Menjalankan kamp pelatihan untuk para teroris yang datang ke Suriah, Irak dan Mali;', 'Korporasi', 'ELQ-067', NULL, '00/00/0000', NULL, 'Benghazi, Libya\n', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (165, 'ANSAR AL CHARIA DERNA alias Ansar Al-Charia Derna alias Ansar al Sharia Derna', 'Menjalankan tempat pelatihan untuk para teroris yang datang ke Suriah dan Irak;', 'Korporasi', 'ELQ-066', NULL, '00/00/0000', 'Libya', 'Derna dan Jebel, Libya;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (166, 'ABDALLAH AZZAM BRIGADES alias Abdullah Azzam Brigades alias Ziyad al-Jarrah Battalion of the Abdallah Azzam Brigades', 'Kelompok bersenjata yang bergabung menyerang bersama Al-Nusra;', 'Korporasi', 'ELQ-065', NULL, '00/00/0000', NULL, 'Libanon, Suriah dan Arab;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (167, ' ANSAR AL-SHARI’A IN TUNISIA alias AAS-T alias Ansar Al-Sharia in Tunisia alias Ansar Al-Shari’ah in Tunisia alias AlQayrawan Media Foundation', '- Kelompok bersenjata Tunisia yang berasosiasi dengan Al-Qaida;\n- Pimpinan Seifallah ben Hassine;', 'Korporasi', 'ELQ-064', NULL, '00/00/0000', NULL, 'Tunisia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (168, 'ROSHAN MONEY EXCHANGE alias ROSHAN SARAFI alias ROSHAN TRADING COMPANY alias RUSHAAN TRADING \nCOMPANY alias ROSHAN SHIRKAT alias MAULAWI AHMED SHAH HAWALA alias \nMULLAH AHMED SHAH HAWALA alias HAJI AHMAD SHAH HAWALA alias AHMAD \nSHAH HAWALA;', 'ROSHAN MONEY EXCHANGE merupakan tempat untuk mentransfer dana yang \ndigunakan sebagai pendukung operasi militer Taliban dan perdagangan narkotika di \nAfganistan yang dimiliki oleh Ahmed Shah Noorzai Obaidullah;', 'Korporasi', 'ELT-004', NULL, '00/00/0000', 'Afganistan', 'Kantor cabang 1:\n- Shop number 1584, Furqan (variant Fahr Khan) Center, Chalhor Mal Road, Quetta, \nBaluchistan, Pakistan;\n- Flat number 4, Furqan Center, Jamaluddin Afghani Road, Quetta, Baluchistan, Pakistan;\n- Office number 4, 2nd Floor, Muslim Plaza Building, Doctor Banu Road, Quetta, \nBaluchistan, Pakistan;\n- Cholmon Road, Quetta, Baluchistan, Pakistan;\n- Munsafi Road, Quetta, Baluchistan, Pakistan;\n- Shop number 1, 1st Floor, Kadari Place, Abdul Samad Khan Street (next to Fatima Jena \nRoad), Quetta, Baluchistan, Pakistan;\nkantor cabang 2:\n- Safar Bazaar, Garmser, Helmand, Afganistan;\n- Main Bazaar, Safar, Helmand, Afganistan;\n- Haji Ghulam Nabi Market, Lashkar Gah, Helmand, Afganistan, Money Exchange Market, \nLashkar Gah, Helmand, Afganistan, Lashkar Gah Bazaar, Helmand, Afganistan;\nkantor cabang 3: \n- Hazar Joft, Garmser, Helmand, Afganistan; \nkantor cabang 4:\n- Ismat Bazaar, Marjah, Helmand, Afganistan;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (169, 'RAHAT LTD alias RAHAT TRADING COMPANY alias HAJI MUHAMMAD QASIM SARAFI alias NEW CHAGAI TRADING alias MUSA KALIM HAWALA;', 'Rahat Ltd digunakan oleh pimpinan Taliban untuk mentransfer dana yang berasal dari \ndonor eksternal dan perdagangan narkotika untuk membiayai kegiatan Taliban pada 2011 \ndan 2012. Dimiliki oleh Mohammed Qasim Mir Wali Khudai Rahim, juga terkait Mohammad Naim Barich Khudaidad', 'Korporasi', 'ELT-003', NULL, '00/00/0000', NULL, 'Kantor cabang 1, Room number 33, 5th Floor, Sarafi Market, Kandahar city, Kandahar, \nAfganistan;\n- kantor cabang 2, Shop number 4, Azizi Bank, Haji Muhammad Isa Market, Wesh, Spin \nBoldak, Kandahar, Afganistan;\n- kantor cabang 3, Safaar Bazaar, Garmser, Helmand, Afganistan; \n- kantor cabang 4, Lashkar Gah, Helmand, Afganistan;\n- kantor cabang 5, Gereshk, Helmand, Afganistan;\n- kantor cabang 6, Zaranj, Nimroz, Afganistan;\n- kantor cabang 7, Dr Barno Road, Quetta, Pakistan, Haji Mohammed Plaza, Tol Aram \nRoad, near Jamaluddin Afghani Road, Quetta, Pakistan Kandahari Bazaar, Quetta, \nPakistan;\n- kantor cabang 8, Chaman, Baluchistan, Pakistan;\n- kantor cabang 9, Chaghi Bazaar, Chaghi, Baluchistan, Pakistan;\n- kantor cabang 10, Zahedan, Zabol, Iran;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (170, 'AL-HARAMAYN FOUNDATION (KENYA) ', NULL, 'Korporasi', 'ELQ-016', NULL, '00/00/0000', 'Kenya', '- Nairobi, Kenya;\n- Garissa, Kenya; \n- Dadaab, Kenya;	\n', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (171, 'HAQQANI NETWORK alias HQN', '- Jaringan pejuang Taliban berpusat di sekitar perbatasan antara Khost, Afganistan dan Waziristan Utara, Pakistan;\n- Pendiri Jalaluddin Haqqani;\n- Bertanggung jawab atas serangan bunuh diri dan pembunuhan yang ditargetkan serta penculikan di Kabul dan provinsi lain di Afganistan. Terkait dengan Al-Qaida, Gerakan \nIslam Uzbekistan, Tehrik-e Taliban Pakistan, Lashkar I Jhangvi, dan Jaish-IMohammed;', 'Korporasi', 'ELT-002', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (172, 'AL-HARAMAIN-THE NETHERLANDS BRANCH alias  STICHTING AL HARAMAIN HUMANITARIAN AID', 'Pendiri dan pemimpin Aqeel Abdulaziz Aqeel al-Aqeel;', 'Korporasi', 'ELQ-015', NULL, '00/00/0000', 'Belanda', 'Jan Hanzenstraat 114, 1053sv, Amsterdam, Belanda', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (173, 'HAJI KHAIRULLAH HAJI SATTAR MONEY EXCHANGE alias HAJI KHAIRULLAH-HAJI SATTAR SARAFI alias HAJI KHAIRULLAH AND ABDUL \nSATTAR AND COMPANY alias HAJI KHAIRULLAH MONEY EXCHANGE alias HAJI \nKHAIR ULLAH MONEY SERVICE alias HAJI SALAM HAWALA alias HAJI HAKIM \nHAWALA alias HAJI ALIM HAWALA alias SARAFI-YI HAJI KHAIRULLAH HAJI SATAR \nHAJI ESMATULLAH;', 'Telepon	:+93-202-103386, +93-202-101714, 0202-104748, +93-797-059059, +93-702-222222;E-mail 	:helmand_exchange_msp@yahoo.com\n', 'Korporasi', 'ELT-001', NULL, '00/00/0000', 'Afganistan', 'kantor cabang 1:\n- Chohar Mir Road, Kandahari Bazaar, Quetta City, Baluchistan, Pakistan;\n- Room number 1, Abdul Sattar Plaza, Hafiz Saleem Street, Munsafi Road, Quetta, \nBaluchistan, Pakistan;\n- Shop number 3, Dr. Bano Road, Quetta, Baluchistan, Pakistan;\nkantor cabang 2:\n- Peshawar, Khyber Paktunkhwa, Pakistan;\nkantor cabang 3:\n- Moishah Chowk Road, Lahore, Punjab, Pakistan;\nkantor cabang 4:\n- Karachi, Sindh, Pakistan;\nkantor cabang 5:\n- Larran Road number 2, Chaman, Baluchistan, Pakistan;\n- Chaman Central Bazaar, Chaman, Baluchistan, Pakistan;\nkantor cabang 6:\n- Shop number 237, Shah Zada Market;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (174, 'AL-HARAMAIN FOUNDATION (UNION OF THE COMOROS)', NULL, 'Korporasi', 'ELQ-011', NULL, '00/00/0000', 'Komoro', 'B/P: 1652 Moroni, Union Of The Comoros', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (175, 'AL-HARAMAIN FOUNDATION (PAKISTAN) ', NULL, 'Korporasi', 'ELQ-010', NULL, '00/00/0000', 'Pakistan', 'House #279, Nazimuddin Road, F-10/1, Islamabad, Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (176, 'AL-HARAMAIN-ETHIOPIA BRANCH', NULL, 'Korporasi', 'ELQ-009', NULL, '00/00/0000', 'Ethiopia', 'Woreda District 24 Kebele Section 13, Addis Ababa, Ethiopia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (177, 'WAFA HUMANITARIAN ORGANIZATION alias AL WAFA alias AL WAFA ORGANIZATION alias WAFA AL-IGATHA AL-ISLAMIA;', 'Kantor utama berada di Kandahar, Afghanistan;', 'Korporasi', 'ELQ-063', NULL, '00/00/0000', NULL, '- Jordan House no. 125, street 54, phase ii hayatabad, Peshawar, Pakistan;\n- Saudi Arabia;\n- Kuwait;\n- Afganistan;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (178, 'AL-HARAMAIN-BANGLADESH BRANCH', NULL, 'Korporasi', 'ELQ-008', NULL, '00/00/0000', 'Banglades', 'House 1, Road 1, S-6, Uttara, Dhaka, Bangladesh;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (179, 'AL-HARAMAIN & AL MASJED AL-AQSA CHARITY FOUNDATION alias AL HARAMAIN AL MASJED AL AQSA alias AL HARAMAYN AL MASJID AL AQSA alias AL-HARAMAYN AND AL MASJID AL AQSA CHARITABLE FOUNDATION;', NULL, 'Korporasi', 'ELQ-007', NULL, '00/00/0000', 'Bosnia Herzegovina', '- 2A Hasiba Brankovica, Sarajevo, Bosnia And Herzegovina;\n- 14 Bihacka Street, Sarajevo, Bosnia And Herzegovina;\n- 64 Potur Mahala Street, Travnik, Bosnia And Herzegovina;\n- Zenica, Bosnia And Herzegovina;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (180, 'AL-HARAMAIN - ALBANIA BRANCH', NULL, 'Korporasi', 'ELQ-006', NULL, '00/00/0000', 'Albania', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (181, 'AL-HARAMAIN - AFGHANISTAN BRANCH', NULL, 'Korporasi', 'ELQ-005', NULL, '00/00/0000', 'Afganistan', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (182, 'UMMAH TAMEER E-NAU alias UTN', NULL, 'Korporasi', 'ELQ-062', NULL, '00/00/0000', 'Pakistan', '- Street 13, Wazir Akbar Khan, Kabul, Afghanistan;\n- Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (183, 'TUNISIAN COMBATANT GROUP alias GROUPE COMBATTANT TUNISIEN GROUPE ISLAMISTE COMBATTANT TUNISIEN\nGICT', NULL, 'Korporasi', 'ELQ-061', 'Berasosiasi dengan Al-Qaida In The Islamic Maghreb;', '00/00/0000', 'Tunisia', 'Tunisia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (184, 'AL-AKHTAR TRUST INTERNATIONAL alias AL AKHTAR TRUST alias AL-AKHTAR MEDICAL CENTRE alias AKHTARABAD \nMEDICAL CAMP alias PAKISTAN RELIEF FOUNDATION alias PAKISTANI RELIEF \nFOUNDATION alias AZMAT-E-PAKISTAN TRUST alias AZMAT PAKISTAN TRUST;', NULL, 'Korporasi', 'ELQ-003', NULL, '00/00/0000', 'Pakistan', '- ST-1/A, Gulsahne-Iqbal, Block 2, Karachi, 25300, Pakistan;\n- Gulistan-E-Jauhar, Block 12, Karachi, Pakistan;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (185, 'THE ORGANIZATION OF AL-QAIDA IN THE ISLAMIC MAGHREB alias AQIM alias AL QAÏDA AU MAGHREB ISLAMIQUE (AQMI)', 'Dipimpin oleh Abdelmalek Droukdel;', 'Korporasi', 'ELQ-060', NULL, '00/00/0000', NULL, '- Aljazair;\n- Mali;\n- Mauritania;\n- Maroko;\n- Nigeria;\n- Tunisia;\n', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (186, 'ABU SAYYAF GROUP alias AL HARAKAT AL ISLAMIYYA', 'Berkaitan dengan Jemaah Islamiyah (JI), dipimpin Radulan Sahiron;', 'Korporasi', 'ELQ-001', NULL, '00/00/0000', 'Filipina', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (187, 'AFGHAN SUPPORT COMMITTEE (ASC) alias LAJNAT UL MASA EIDATUL AFGHANIA alias JAMIAT AYAT-UR-RHAS AL ISLAMIAC \nalias JAMIAT IHYA UL TURATH AL ISLAMIA alias AHYAUL TURAS', ' Berhubungan dengan the Revival of Islamic Heritage Society;', 'Korporasi', 'ELQ-002', NULL, '00/00/0000', 'Pakistan', '- G.T. Road (probably Grand Trunk Road), near Pushtoon Garhi Pabbi, Peshawar, Pakistan;\n- Cheprahar Hadda, Mia Omar Sabaqah School, Jalabad, Afghanistan;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (188, 'MUJAHIDIN INDONESIAN TIMUR (MIT) alias MUJAHIDIN OF EASTERN INDONESIA alias EAST INDONESIA MUJAHIDEEN', '- Grup teroris yang berhubungan dengan Islamic State in Iraq and the Levant (ISIL), Jemaah Islamiyah (JI), dan Jemmah Anshorut Tauhid (JAT);\n- Beroperasi di Sulawesi Indonesia', 'Korporasi', 'EDQ-005', NULL, '00/00/0000', 'Indonesia', 'Indonesia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (189, 'TEHRIK-E TALIBAN PAKISTAN (TTP) alias TEHRIK-I-TALIBAN PAKISTAN alias TEHRIK-E-TALIBAN alias PAKISTANI TALIBAN \nalias TEHREEK-E-TALIBAN;', 'Berada pada perbatasan Afganistan dan Pakistan, dan dipimpin olehHakimullah Mehsud;', 'Korporasi', 'ELQ-059', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (190, 'HILAL AHMAR SOCIETY INDONESIA alias HASI alias YAYASAN HILAL AHMAR alias INDONESIA HILAL AHMAR SOCIETY FOR \nSYRIA;', '- Menggunakan kedok sebagai yayasan kemanusiaan Jemaah Islamiyah;\n- Beroperasi di Lampung, Jakarta, Semarang, Yogyakarta, Solo, Surabaya dan Makassar, Indonesia;\n- Telah merekrut, mendanai dan memfasilitasi perjalanan pengikut-pengikutnya (FTF: Foreign Terrorist Fighters) ke Suriah;', 'Korporasi', 'EDQ-004', NULL, '00/00/0000', 'Indonesia', 'Indonesia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (191, 'JEMAAH ANSHORUT TAUHID alias JAT ', '-', 'Korporasi', 'EDQ-003', NULL, NULL, 'Indonesia', 'Jalan Semenromo No. 58, Ngruki, Cemani, Grogol, Sukoharjo, Jawa Tengah, Indonesia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (192, 'TAIBAH INTERNATIONAL-BOSNIA OFFICES alias TAIBAH INTERNATIONAL AID AGENCY alias TAIBAH INTERNATIONAL AID \nASSOCIATION alias AL TAIBAH, INTL. alias TAIBAH INTERNATIONAL AIDE \nASSOCIATION;', NULL, 'Korporasi', 'ELQ-058', NULL, '00/00/0000', 'Bosnia Herzegovina', '- 6 Avde Smajlovica Street, Novo Sarajevo, Boznia Herzegovina;\n- 26 Tabhanska Street, Visoko, Boznia Herzegovina;\n- 3 Velika Cilna Ulica, Visoko, Boznia Herzegovina;\n- 26 Tabhanska Street, Visoko, Boznia Herzegovina;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (193, 'RIYADUS-SALIKHIN RECONNAISSANCE AND SABOTAGE BATTALION OF CHECHEN \nMARTYRS (RSRSBCM) alias RIYADUS-SALIKHIN RECONNAISSANCE AND SABOTAGE BATTALION alias RIYADHAS-SALIHEEN alias THE SABOTAGE AND MILITARY SURVEILLANCE GROUP OF THE \nRIYADH AL-SALIHIN MARTYRS alias FIRQAT AL-TAKHRIB WA AL-ISTITLA ALASKARIYAH LI SHUHADA RIYADH AL-SALIHIN alias RIYADUS-SALIKHIN \nRECONNAISSANCE AND SABOTAGE BATTALION OF SHAHIDS (MARTYRS);', 'Berasosiasi dengan Islamic International Brigade (IIB), Special Purpose Islamic Regiment \n(SPIR) dan Emarat Kavkaz;', 'Korporasi', 'ELQ-057', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (194, 'JEMAAH ISLAMIYAH alias JEMA’AH ISLAMIYAH alias JEMAAH ISLAMIYA alias JEMAAH ISLAMIAH alias JAMAAH \nISLAMIYAH alias JAMA’AH ISLAMIYAH;', 'Sudah ditetapkan sebagai organisasi terlarang berdasarkan putusan PN Jakarta Selatan, \nno. 2189/Pid.B/2007/PN.Jkt.Sel, tanggal 21 April 2008, menetapkan Al Jamaah Al \nIslamiyah selaku korporasi yang salah satu pengurusnya adalah terdakwa dan dinyatakan \nsebagai korporasi terlarang dan beberapa tersangkanya sudah tertangkap, antara lain: \nABU DUJANA dan ZARKASIH alias MBAH alias ABU IRSYAD;', 'Korporasi', 'EDQ-001', NULL, '00/00/0000', 'Indonesia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (195, 'REVIVAL OF ISLAMIC HERITAGE SOCIETY alias REVIVAL OF ISLAMIC SOCIETY HERITAGE ON THE AFRICAN CONTINENT alias \nJAMIA IHYA UL TURATH alias RIHS alias JAMIAT IHIA AL-TURATH AL-ISLAMIYA;', NULL, 'Korporasi', 'ELQ-056', NULL, '00/00/0000', 'Pakistan', '#NAME?', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (196, 'RAJAH SOLAIMAN MOVEMENT alias RAJAH SOLAIMAN ISLAMIC MOVEMENT alias RAJAH SOLAIMAN REVOLUTIONARY \nMOVEMENT', NULL, 'Korporasi', 'ELQ-055', NULL, '00/00/0000', 'Filipina', '- Barangay Mal-Ong, Anda, Pangasinan, Filipina;\n- Sitio Dueg, Barangay Maasin, San Clemente, Tarlac, Filipina;\n- number 50, jalan Purdue, Cubao, Quezon city, Filipina;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (197, 'LIBYAN ISLAMIC FIGHTING GROUP alias LIFG', 'Bergabung dengan Al-Qaida pada bulan November 2007 ', 'Korporasi', 'ELQ-049', NULL, '00/00/0000', 'Libya', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (198, 'RABITA TRUST ', NULL, 'Korporasi', 'ELQ-054', NULL, '00/00/0000', NULL, '- Room 9a, 2nd Floor, Wahdat Road, Education Town, Lahore, Pakistan;\n- Wares Colony, Lahore, Pakistan;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (199, 'LASHKAR I JHANGVI (LJ) ', 'Aktif di Pakistan', 'Korporasi', 'ELQ-048', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (200, 'MUHAMMAD JAMAL NETWORK (MJN) alias MUHAMMAD JAMAL GROUP alias JAMAL NETWORK alias ABU AHMED GROUP alias\nAL-QAIDA IN EGYPT (AQE);', 'Kelompok paramiliter yang didirikan oleh Jamal al Kashif dan terhubung dengan Al-Qaida;', 'Korporasi', 'ELQ-053', NULL, '00/00/0000', 'Mesir', '- Mesir\n- Libya\n- Mali ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (201, 'MOUVEMENT POUR L’UNIFICATION ET LE JIHAD EN AFRIQUE DE L’OUEST (MUJAO)', NULL, 'Korporasi', 'ELQ-052', NULL, '00/00/0000', NULL, '- Mali;\n- Aljazair; ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (202, 'JAISH-I-MOHAMMED alias ARMY OF MOHAMMED', NULL, 'Korporasi', 'ELQ-044', NULL, '00/00/0000', NULL, 'Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (203, 'MOROCCAN ISLAMIC COMBATANT GROUP alias GROUPE ISLAMIQUE COMBATTANT MAROCAIN GICM', NULL, 'Korporasi', 'ELQ-051', NULL, '00/00/0000', 'Maroko', 'Maroko', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (204, 'ISLAMIC MOVEMENT OF UZBEKISTAN alias IMU', 'Aktif di daerah perbatasan Afganistan/Pakistan;', 'Korporasi', 'ELQ-043', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (205, 'MAKHTAB AL-KHIDAMAT alias MAK alias AL KIFAH AL KIFAH', NULL, 'Korporasi', 'ELQ-050', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (206, 'ISLAMIC JIHAD GROUP alias JAMA’AT AL-JIHAD alias LIBYAN SOCIETY alias KAZAKH JAMA’AT alias JAMAAT \nMOJAHEDIN alias JAMIYAT alias JAMIAT AL-JIHAD AL-ISLAMI alias DZHAMAAT \nMODZHAKHEDOV alias ISLAMIC JIHAD GROUP OF UZBEKISTAN alias AL-DJIHAD ALISLAMI alias ZAMAAT MODZHAKHEDOV TSENTRALNOY ASII alias ISLAMIC JIHAD \nUNION', '- Pendiri dan penemu adalah Najmiddin Kamolitdinovich Jalolov dan Suhayl Fatilloevich \nBuranov;\n- Berasosiasi dengan Islamic Movement of Uzbekistan dan Emarat Kavkaz;\n- Aktif di daerah perbatasan Afganistan/Pakistan;', 'Korporasi', 'ELQ-042', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (207, 'ISLAMIC INTERNATIONAL BRIGADE (IIB) alias THE ISLAMIC PEACEKEEPING BRIGADE alias THE ISLAMIC PEACEKEEPING ARMY \nalias THE INTERNATIONAL BRIGADE alias ISLAMIC PEACEKEEPING BATTALION alias INTERNATIONAL BATTALION alias ISLAMIC PEACEKEEPING INTERNATIONAL \nBRIGADE;', 'Terhubung dengan Riyadus-Salikhin Reconnaissance and Sabotage Battalion of Chechen \nMartyrs (RSRSBCM);', 'Korporasi', 'ELQ-041', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (208, 'ISLAMIC ARMY OF ADEN ', NULL, 'Korporasi', 'ELQ-040', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (209, 'ABDUL BASIR NOORZAI alias HAJI ABDUL BASIR', 'Pemilik Haji Basir and Zarjmil Company Hawala;', 'Orang', 'ILT-136', 'Pakistan', '00/00/0000', 'Afganistan', 'Chaman, Baluchistan Province, Pakistan;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (210, 'HARAKAT UL-MUJAHIDIN / HUM alias AL-FARAN alias AL-HADID alias AL-HADITH alias HARAKAT UL-ANSAR alias HUA alias \nHARAKAT UL- MUJAHIDEEN;', '- Berasosiasi dengan Jaish-I-Mohammed, Lashkar I Jhangvi dan Lashkar-E-Tayyiba;\n- Aktif di Pakistan dan Afganistan', 'Korporasi', 'ELQ-039', NULL, '00/00/0000', NULL, 'Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (211, 'AYRAT NASIMOVICH VAKHITOV alias SALMAN BULGARSKIY;', 'Anggota Al-Nusrah Front for the People of the Levant (ANF);', 'Orang', 'ILQ-269', NULL, NULL, 'Rusia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (212, 'HARAKAT-UL JIHAD ISLAMI alias HUJI alias MOVEMENT OF ISLAMIC HOLY WAR alias HARKAT-UL-JIHAD-AL ISLAMI \nalias HARKAT-AL-JIHAD-UL ISLAMI alias HARKATUL-JEHAD-AL-ISLAMI alias \nHARAKAT UL JIHAD-E-ISLAMI;', NULL, 'Korporasi', 'ELQ-038', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (213, 'GLOBAL RELIEF FOUNDATION (GRF)', NULL, 'Korporasi', 'ELQ-037', NULL, '00/00/0000', NULL, '- 9935 South 76th Avenue, Unit 1, Bridgeview, Illinois, 60455, Amerika Serikat;\n- P.O. Box 1406, Bridgeview, Illinois, 60455, Amerika Serikat;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (214, 'EMARAT KAVKAZ', 'Aktif di Rusia, Afganistan dan Pakistan', 'Korporasi', 'ELQ-036', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (215, 'EGYPTIAN ISLAMIC JIHAD alias EGYPTIAN AL-JIHAD alias JIHAD GROUP alias NEW JIHAD alias AL-JIHAD alias \nEGYPTIAN ISLAMIC MOVEMENT;', 'Pendiri Aiman Muhammed Rabi al-Zawahiri;', 'Korporasi', 'ELQ-035', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (216, 'EASTERN TURKISTAN ISLAMIC MOVEMENT (ETIM) alias THE EASTERN TURKISTAN ISLAMIC PARTY alias THE EASTERN TURKISTAN \nISLAMIC PARTY OF ALLAH alias ISLAMIC PARTY OF TURKESTAN ALIAS DJAMAAT \nTURKISTAN;', 'Aktif di China, Asia Selatan dan Asia Tengah;', 'Korporasi', 'ELQ-034', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (217, 'MOHAMMED ABDEL-HALIM HEMAIDA SALEH alias MUHAMMAD HAMEIDA SALEH;', 'Anggota Al-Qaeda, sebagai perekrut pelaku bom bunuh diri untuk pergi menuju \nSuriah, dan merencanakan aktifitas terorisme dengan target Eropa;', 'Orang', 'ILQ-267', 'Mesir', '22/09/1988', 'Mesir', 'Mesir', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (218, 'ASBAT AL-ANSAR ', 'Aktif di Irak Utara', 'Korporasi', 'ELQ-031', NULL, '00/00/0000', 'Lebanon', 'Ein el-Hilweh camp, Libanon;	', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (219, 'MOHAMED LAKHAL alias MOHAMED BEN BELGACEM AWANI;', NULL, 'Orang', 'ILQ-266', 'Tunisia', '05/02/1970', 'Tunisia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (220, 'ARMED ISLAMIC GROUP alias AL JAMM’AH AL-ISLAMIAH AL-MUSALLAH alias GIA ALIAS GROUPE ISLAMIQUE ARMÉ;', NULL, 'Korporasi', 'ELQ-030', NULL, '00/00/0000', 'Aljazair', 'Aljazair', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (221, 'MORAD LAABOUDI alias ABU ISMAIL AL-MAGHRIBI;', 'Fasilitator pendatang yang akan bergabung dengan Islamic State in Iraq and the Levant;', 'Orang', 'ILQ-265', 'Maroko', '26/02/1993', 'Maroko', 'Turki', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (222, 'ANSAR EDDINE alias ANSAR DINE;', 'Berdiri pada Desember 2011, didirikan oleh Iyad Ag Ghali;', 'Korporasi', 'ELQ-028', NULL, '00/00/0000', 'Mali', 'Mali', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (223, 'ANSAR AL-ISLAM alias DEVOTEES OF ISLAM alias JUND AL-ISLAM alias SOLDIERS OF ISLAM alias \nKURDISTAN SUPPORTERS OF ISLAM alias SUPPORTERS OF ISLAM IN KURDISTAN \nalias FOLLOWERS OF ISLAM IN KURDISTAN alias KURDISH TALIBAN alias SOLDIERS \nOF GOD alias ANSAR AL-SUNNA ARMY alias JAISH ANSAR AL-SUNNA alias ANSAR \nAL-SUNNA;', 'Pendiri Najmuddin Faraj Ahmad', 'Korporasi', 'ELQ-027', NULL, '00/00/0000', NULL, '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (224, 'GULMUROD KHALIMOV', 'Anggota Islamic State in Iraq and the Levant;', 'Orang', 'ILQ-264', NULL, '14/05/1975', 'Tajikistan', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (225, 'HUSAYN JUAYTHINI alias HUSSEIN MOHAMMED HUSSEIN ALJEITHNI;', 'Berhubungan dengan Islamic State in Iraq and the Levant (ISIL);', 'Orang', 'ILQ-263', 'Palestina', '03/05/1977', 'Palestina', 'Gaza Strip, Palestinian Territories', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (226, 'AL RASHID TRUST alias AL-RASHEED TRUST alias AL RASHEED TRUST alias AL-RASHID TRUST alias AID \nORGANIZATION OF THE ULEMA, PAKISTAN alias AL AMIN WELFARE TRUST alias AL \nAMIN TRUST alias AL AMEEN TRUST alias AL-AMEEN TRUST alias AL MADINA TRUST \nalias AL-MADINA TRUST;', NULL, 'Korporasi', 'ELQ-026', NULL, '00/00/0000', 'Pakistan', '- Kitas Ghar, Nazimabad 4, Dahgel-Iftah, Karachi, Pakistan, Kitas Ghar, Nazimabad 4, \n- Dahgel-Iftah, Karachi, Pakistan;\n- Jamia Maajid, Sulalman Park, Melgium Pura, Lahore, Pakistan, Jamia Maajid, Sulalman Park, Melgium Pura, Lahore, Pakistan;\n- Dha’rbi-M’unin, Opposite Khyber Bank, Abbottabad Road, Mansehra, Pakistan;\n- Dha’rbi-M’unin ZR Brothers, Katcherry Road, Chowk Yadgaar, Peshawar, Pakistan;\n- Dha’rbi-M’unin, Rm No. 3, Moti Plaza, Muree Road, Rawalpindi, Pakistan;\n- Dha’rbi-M’unin, Top Floor, Dr. Dawa Khan Dental Clinic Surgeon, Swat, Pakistan;\n- Kitab Ghar, Darul Ifta Wal Irshad, Nazimabad No. 4, Karachi, Pakistan;\n- 302b-40, Good Earth Court, Opposite Pia Planitarium, Block 13a, Gulshan-l Igbal, Karachi, Pakistan;\n- 617 Clifton Center, Block 5, 6th Floor, Clifton, Karachi, Pakistan;\n- 605 Landmark Plaza, 11 Chundrigar Road, Opposite Jang Building, Karachi, Pakistan;\n- Jamia Masjid, Sulaiman Park, Begum Pura, Lahore, Pakistan;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (227, 'NUSRET IMAMOVIC alias NUSRET SULEJMAN IMAMOVIC', 'Dipercaya berperang dengan Al-Nusrah Front for the People of the Levant;', 'Orang', 'ILQ-262', NULL, '26/09/1971', 'Bosnia Herzegovina', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (228, 'TARKHAN ISMAILOVICH GAZIEV alias RAMZAN ODUEV alias TARKHAN ISAEVICH GAZIEV;', 'Pemimpin Jamaat Tarkhan;', 'Orang', 'ILQ-245', 'Bugaroy Village', '11/11/1965', 'Rusia', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (229, 'AKHMED RAJAPOVICH CHATAEV alias AKHMAD SHISHANI alias DAVID MAYER;', 'Salah satu pemimpin Islamic State in Iraq and the Levant (ISIL);', 'Orang', 'ILQ-244', 'Vedeno Village', '14/07/1980', 'Rusia', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (230, 'ASLAN AVGAZAROVICH BYUTUKAEV alias AMIR KHAZMAT', 'Masuk dalam daftar pencarian orang sebagai kejahatan terorisme;', 'Orang', 'ILQ-260', 'Rusia', '22/10/1974', 'Rusia', 'Akharkho Street, 11, Katyr-Yurt, Achkhoy-Martanovskiy District, Republic of Chechnya, Russian;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (231, 'ISLAM SEIT-UMAROVICH ATABIEV alias ABU JIHAD', NULL, 'Orang', 'ILQ-243', 'Rusia', '29/09/1983', 'Rusia', 'Moscovskiy Microrayon 6, App. 96, Ust- Dzheguta, Republic of KarachayevoCherkessia, Russian Federation;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (232, 'SALIM BENGHALEM ', NULL, 'Orang', 'ILQ-259', 'Prancis', '06/07/1980', 'Prancis', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (233, 'MAGHOMED MAGHOMEDZAKIROVICH ABDURAKHMANOV', 'Pemimpin organisasi Jamaat Abu Banat terrorist;', 'Orang', 'ILQ-242', 'Russia', '24/11/1974', 'Rusia', 'Turki', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (234, 'NAZIRULLAH HANAFI WALIULLAH', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-124', 'Spin Boldak, Kandahar, Afganistan', '00/00/1962', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (235, 'ASEEL MUTHANA ', NULL, 'Orang', 'ILQ-241', 'Cardiff, Inggris', '22/11/1996', 'Inggris', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (236, 'ABDUL JALIL HAQQANI alias WALI MOHAMMAD', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan;', 'Orang', 'ILT-123', 'Khwaja Malik, Arghandab, Kandahar, Afganistan', '00/00/1963', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (237, 'MOUNIR BEN DHAOU BEN BRAHIM BEN HELAL alias MOUNIR HELEL alias MOUNIR HILEL;', 'Fasilitaor pendukung Al-Qaida in the Islamic Maghreb melalui jalur khusus', 'Orang', 'ILQ-258', 'Tunisia', '10/05/1983', 'Tunisia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (238, 'WALIJAN ', 'Anggota Taliban Gerd-e-Jangal Shura, Kepala Tahanan Taliban dan Komite Pengungsi;', 'Orang', 'ILT-122', 'Quetta, Pakistan', '00/00/1968', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (239, 'QARI SAIFULLAH TOKHI', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan;', 'Orang', 'ILT-121', 'Daraz, Jaldak wa Tarnak, Zabul, Afganistan', '00/00/1964', 'Afganistan', 'Chalo Bawari area, Quetta, Baluchistan, Pakistan;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (240, 'ABD AL-BASET AZZOUZ alias ABDELBASSED AZOUZ', 'Anggota kunci operasi Al-Qaeda.', 'Orang', 'ILQ-257', 'Libya', '26702', 'Libya', 'Libya', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (241, 'ABDUL RAQIB TAKHARI ', 'Anggota Taliban Dewan Agung yang bertanggung jawab untuk wilayah Takhar \ndan Badakhshan 2009. Dikonfirmasi tewas di Peshawar, Pakistan;', 'Orang', 'ILT-120', 'Zardalu Darra, Kalafgan, Takhar, Afganistan', '00/00/1968', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (242, 'TARAD MOHAMMAD ALJARBA alias TARAD ALJARBA alias ABU-MUHAMMAD AL-SHIMALI;', 'Pemimpin perbatasan negara ISIL;', 'Orang', 'ILQ-239', 'Irak', '20/11/1979', 'Arab Saudi', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (243, 'HAMDULLAH SUNANI ', 'Dikabarkan meninggal Tahun 2001;', 'Orang', 'ILT-119', 'Dai Chopan, Zabul, Afganistan,', '00/00/1923', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (244, 'RUSTAM MAGOMEDOVICH ASELDEROV alias ABU MUHAMMAD;', 'Memimpin 160 grup teroris yang beroperasi di Rusia;', 'Orang', 'ILQ-256', 'Rusia', '09/03/1981', 'Rusia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (245, 'ABDUL GHAFAR SHINWARI', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-118', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', '29/03/1965', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (246, 'HAMIDULLAH AKHUND SHER MOHAMMAD', NULL, 'Orang', 'ILT-117', 'Sarpolad, Washer, Helmand, Afganistan', '00/00/0000', 'Afganistan', 'Afghanistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (247, 'AMRU AL-ABSI alias AMR AL ABSI alias ABU AL ATHIR AMR AL ABSI;', 'Anggota ISIL', 'Orang', 'ILQ-237', 'Arab Saudi', '00/00/0000', NULL, 'Homs, Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (248, 'FAYSAL AHMAD BIN ALI AL-ZAHRANI alias  FAISAL AHMED ALI ALZAHRANI', 'Mantan pimpinan divisi miyak dan Gas Islamic State in Iraq and the Levant (ISIL);', 'Orang', 'ILQ-255', '-', '19/01/1986', 'Arab Saudi', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (249, 'SHAMSUDDIN', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan dan Iran;', 'Orang', 'ILT-116', 'Keshim, Badakhshan, Afganistan ', '00/00/0000', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (250, 'SALLY-ANNE FRANCES JONES alias UMM HUSSAIN AL-BRITANI alias SAKINAH HUSSAIN', 'Perekrut anggota Islamic State in Iraq and the Levant', 'Orang', 'ILQ-236', 'London, Inggris', '17/11/1968', 'Inggris', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (251, 'HASAN AL-SALAHAYN SALIH AL-SHA’ARI alias ABU HABIB AL-LIBI', 'Fasilitator Islamic State in Iraq and the Levant (ISIL);', 'Orang', 'ILQ-254', 'Libya', '00/00/0000', 'Libya', 'Libya', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (252, 'AKHTAR MOHAMMAD MANSOUR alias SHAH MOHAMMED', 'Terlibat dalam perdagangan narkoba pada 2011, terutama melalui Gerd-eJangal, Afganistan. Aktif di provinsi Khost, Paktia dan Paktika, Afganistan pada \nMei 2007. Bertanggung jawab atas empat provinsi selatan Afganistan. Setelah \npenangkapan Mullah Baradar pada bulan Februari 2010 ia sementara \nmenggantikan menjadi Dewan Tertinggi Taliban. Dan diyakini berada di wilayah \nperbatasan Afganistan/Pakistan', 'Orang', 'ILT-115', 'Band-e-Timur, Maiwand, Kandahar, Afganistan', '00/00/1960', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (253, 'ALI MUSA AL-SHAWAKH alias ALI MUSA AL-SHAWAGH;', 'Salah satu pimpinan Islamic State in Iraq and the Levant (ISIL);', 'Orang', 'ILQ-253', 'Suriah', '00/00/1973', 'Suriah', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (254, 'SAID AHMED SHAHIDKHEL ', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan;', 'Orang', 'ILT-114', 'Spandeh (Espandi ‘Olya), Andar, Ghazni, Afganistan', '00/00/1975', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (255, 'ABDUL WAHED SHAFIQ ', NULL, 'Orang', 'ILT-113', 'Nangarhar, Afganistan', '00/00/1968', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (256, 'ABDUL WALI SEDDIQI ', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-112', 'Zilzilay, Andar, Ghazni, Afganistan', '00/00/1974', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (257, 'SADUDDIN SAYYED', 'Penasihat Dewan Tertinggi Taliban 2013. Diyakini berada di wilayah perbatasan Afganistan/Pakistan;', 'Orang', 'ILT-111', 'Chaman, Pakistan', '00/00/1968', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (258, 'ABDULLAH AHMED ABDULLAH EL ALFI', NULL, 'Orang', 'ILQ-109', 'Mesir', '06/06/1963', 'Mesir', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (259, 'NOOR MOHAMMAD SAQIB ', 'Anggota Taliban Dewan Agung dan Ketua Komite Taliban Agama', 'Orang', 'ILT-110', 'Bagrami , Kabul , Afganistan', '00/00/1958', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (260, 'ABDULHAI SALEK ', 'Dikabarkan meninggal di Afganistan pada tahun 1999;', 'Orang', 'ILT-109', 'Awlyatak, Gardan Masjid Area, Chaki Wardak, Maidan Wardak, Afganistan', '00/00/1965', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (261, 'HABIBULLAH RESHAD ', 'Wakil Kepala (Intelligence) Dewan Militer Quetta pada tahun 2009. Diyakini \ndi wilayah perbatasan Afganistan/Pakistan;', 'Orang', 'ILT-108', 'Waghaz, Ghazni, Afganistan', '00/00/1968', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (262, 'NAJMUDDIN FARAJ AHMAD alias MULLAH KREKAR alias FATEH NAJM EDDINE FARRAJ;', NULL, 'Orang', 'ILQ-250', 'Iraq', '07/07/1956', 'Irak', 'Heimdalsgate 36-V, Oslo, 0578, Norway', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (263, 'LIONEL DUMONT JACQUES BROUGERE alias ABU HAMZA alias DI KARLO ANTONIO alias MERLIN OLIVER CHRISTIAN \nRENE alias ARFAUNI IMAD BEN YOUSSET HAMZA alias IMAM BEN YUSSUF \nARFAJ alias ABOU HAMZA alias ARFAUNI IMAD;', NULL, 'Orang', 'ILQ-107', 'Prancis', '21/01/1971', 'Prancis', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (264, 'QARI RAHMAT alias RAHMATULLAH SHAH NAWAZ', 'Seorang komandan Taliban sejak Februari 2010. Mengumpulkan pajak dan suap \natas nama Taliban. Menyediakan koperasi Taliban di Provinsi Nangarhar, \nAfganistan, dengan informasi, bimbingan, perumahan dan senjata dan telah membuat alat peledak IED dan melakukan serangan terhadap Pasukan Bantuan \nKeamanan Internasional (ISAF) dan pasukan Afganistan;', 'Orang', 'ILT-107', 'Shadal Bazaar, Achin, Nangarhar, Afganistan', '00/00/1981', 'Afganistan', 'Kamkai, Achin, Nangarhar, Afganistan;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (265, 'ABDELMALEK DROUKDEL alias ABOU MOSSAAB ABDELOUADOUD;', NULL, 'Orang', 'ILQ-106', 'Alzajair', '20/04/1970', 'Aljazair', NULL, 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (266, 'MOHAMMAD HASAN RAHMANI ', 'Memiliki kaki kanan palsu. Anggota Taliban Dewan Tertinggi 2013, bertindak sebagai wakil dari Mullah Mohammed Omar Maret 2010. Diyakini berada di wilayah perbatasan Afganistan/Pakistan;', 'Orang', 'ILT-106', 'Deh Rawud, Uruzgan, Afganistan', '00/00/1963', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (267, 'YAR MOHAMMAD RAHIMI ', 'Anggota Taliban Dewan Tertinggi 2009. Diyakini di wilayah perbatasan Afganistan/Pakistan;', 'Orang', 'ILT-105', 'Taluqan, Panjwai, Kandahar, Afganistan', '00/00/1953', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (268, 'YAHIA DJOUADI alias YAHIA ABOU AMMAR alias ABOU ALA', NULL, 'Orang', 'ILQ-105', 'Sidi Bel Abbes, Alzajair', '01/01/1967', 'Aljazair', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (269, 'FAZL RABI', 'Mewakili dan pemberi dukungan keuangan dan logistik untuk Jaringan Haqqani, yang berbasis di wilayah perbatasan Afganistan/Pakistan. Anggota Dewan Keuangan Taliban. Telah melakukan perjalanan ke luar negeri untuk menggalang dana atas nama Sirajuddin Haqqani Jallaloudine, Jalaluddin Haqqani, Jaringan Haqqani dan Taliban. Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-104', 'Kohe Safi, Parwan, Afganistan', '00/00/1972', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (270, 'KAMEL DJERMANE alias BILAL alias ADEL alias FODHIL alias ABOU ABDEL JALIL', '-', 'Orang', 'ILQ-104', 'Oum El Bouaghi, Alzajair', '12/10/1965', 'Aljazair', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (271, 'ABDUL SALAM HANAFI ALI MARDAN', 'Anggota Taliban yang bertanggungjawab di wilayah Jawzjan utara Afganistan 2008. Terlibat dalam perdagangan narkoba. Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-103', 'Darzab , Faryab, Afganistan', '00/00/1968', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (272, 'AMINULLAH AMIN', 'Anggota dewan Taliban', 'Orang', 'ILT-102', 'Loy Karez, Spin Boldak, Kandahar, Afganistan', '00/00/1973', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (273, 'PIO ABOGNE DE VERA KHALID alias ISMAEL alias ISMAIL alias MANEX alias TITO ART alias DAVE alias LEO', '-', 'Orang', 'ILQ-103', 'Bagac, Bagamanok, Catanduanes, Filipina', '19/12/1969', 'Filipina', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (274, 'TOREK AGHA alias SAYED MOHAMMED HASAN alias TORAK AGHA alias TORIQ AGHA alias\nTORIQ AGHA SAYED', 'Sebagai salah satu komandan militer Taliban', 'Orang', 'ILT-135', 'Kandahar, Afganistan', '00/00/1960', '-', 'Pashtunabad, Quetta, Baluchistan, Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (275, 'NOORUDDIN TURABI alias MUHAMMAD QASIM', 'Wakil Mullah Mohammed Omar', 'Orang', 'ILT-101', 'Spin Boldak, Kandahar, Afganistan', '00/00/1963', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (276, 'SHER MOHAMMAD ABBAS STANEKZAI alias PADSHAH KHAN', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-100', 'Qala-e-Abbas, Shah Mazar area, Baraki Barak, Logar, Afganistan', '00/00/1963', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (277, 'SHAMIL MAGOMEDOVICH ISMAILOV alias SHAMIL MAGOMEDOVICH ALIEV', 'Pemimpin Jamaat Abu Hanifa', 'Orang', 'ILQ-247', 'Astrakhan,  Federasi Rusia', '29/10/1980', 'Rusia', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (278, 'MOHAMMAD IBRAHIM OMARI', 'Kakak Jalaluddin Haqqani. Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-099', 'Garda Saray, Waza Zadran, Paktia, Afganistan', '00/00/1958', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (279, 'FELICIANO SEMBORIO DELOS REYES JR alias ABUBAKAR ABDILLAH alias ABDUL ABDILLAH', '-', 'Orang', 'ILQ-101', 'Arco, Lamitan, Basilan, Filipina', '04/11/1963', 'Filipina', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (280, 'ABDUL JABBAR OMARI', '-', 'Orang', 'ILT-098', 'Zabul, Afganistan', '00/00/1958', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (281, 'ZAURBEK SALIMOVICH GUCHAEV alias BACH alias FACKIH', 'Salah satu pemimpin Army of Emigrants and Supporters', 'Orang', 'ILQ-246', 'Rusia', '27654', 'Rusia', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (282, 'REDENDO CAIN DELLOSA alias ABU ILONGGO alias BRANDON BERUSA alias ABU MUADZ alias ARNULFO ALVARADO HABIL AHMAD DELLOSA', '-', 'Orang', 'ILQ-100', 'Punta, Santa Ana, Manila, Filipina', '15/05/1972', 'Filipina', '3111, Ma. Bautista, Punta, Santa Ana, Manila, Filipina', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (283, 'AHMED SHAH NOORZAI alias OBAIDULLAH', 'pemilik dan pengelola Roshan Money Exchange', 'Orang', 'ILT-097', 'Quetta, Pakistan', '01/01/1985', '-', 'Quetta, Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (284, 'AHMED DEGHDEGH ABD EL ILLAH alias ABDELLILLAH DIT ABDELLAH AHMED DIT SAID', '-', 'Orang', 'ILQ-099', 'Anser, Wilaya Of Jijel, Aljazair', '17/01/1967', 'Aljazair', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (285, 'ABDUL MANAN NYAZI\n\n', 'Anggota Taliban yang bertanggung jawab di wilayah Herat, Farah dan Nimroz pada pertengahan 2013. Anggota Dewan Tertinggi Taliban dan Quetta Shura.', 'Orang', 'ILT-096', 'Pashtoon Zarghoon, Herat, Afganistan ', '00/00/1968', 'Afganistan', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (286, 'MAXAMED CABDULLAAH CIISE', '-', 'Orang', 'ILQ-098', 'Kismaayo, Somalia', '08/10/1974', 'Somalia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (287, 'NURULLAH NURI', 'Dalam masa penahanan Amerika Serikat', 'Orang', 'ILT-095', 'Shahjoe, Zabul Afganistan', '01/01/1967', 'Afganistan', 'Penjara Guantanamo', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (288, 'ABDEL RAHMAN MOUHAMAD ZAFIR AL-DABIDI AL-JAHANI alias ABD-ARRAHMAN MUHAMMAD ZAFIR AL-DUBAYSI AL-JUHNI alias ABU AL-WAFA alias ABU ANAS', 'Nomor paspor Arab Saudi F 508591. Fasilitator rekrutan Jabhat Al-Nusra', 'Orang', 'ILQ-199', 'Arab Saudi', '04/12/1971', 'Arab Saudi', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (289, 'YASSIN CHOUKA', '-', 'Orang', 'ILQ-097', 'Bonn, Jerman', '11/12/1984', 'Jerman', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (290, 'ABDUL MOHSEN ABDALLAH IBRAHIM AL-CHAREKA alias ABDOL MOHSEN ABDULLAH IBRAHIM AL-SHARIKH alias SANAFI AL-NASR', 'Pemimpin regional Jabhat Al-Nusrah.', 'Orang', 'ILQ-198', 'Arab Saudi', '13/07/1985', 'Arab Saudi', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (291, 'MALIK NOORZAI alias HAJJI MALIK NOORZAI alias HAJJI MALAK NOORZAI', 'Donatur taliban pada tahun 2009, Fasilitator kegiatan Taliban, termasuk perekrutan dan pemberian dukungan logistik.', 'Orang', 'ILT-094', 'perbatasan kota Chaman, Pakistan', '01/01/1963', 'Afganistan', 'Jalan Boghra, Miralzei, Chaman, Baluchistan, Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (292, 'MONIR CHOUKA ABU ADAM', '-', 'Orang', 'ILQ-096', 'Bonn, Jerman', '30/07/1981', 'Jerman', 'Ungartenstraße 6, Bonn, 53229, Jerman', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (293, 'HAMID HAMAD HAMID AL-ALI alias HAMID', 'nomor paspor Kuwait 101505554.', 'Orang', 'ILQ-197', 'Kuwait', '17/11/1960', 'Kuwait', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (294, 'MOHAMMAD ALEEM NOORANI ', '-', 'Orang', 'ILT-093', 'Ghazni Province, Afghanistan', '00/00/1963', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (295, 'HAMDULLAH NOMANI ', 'Anggota Dewan Tertinggi Taliban.', 'Orang', 'ILT-092', 'Sipayaw, Andar, Ghazni, Afganistan', '00/00/1968', 'Afganistan', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (296, 'HAJJAJ BIN FHAD AL-AJMI alias HIJAJ FAHID HIJAJ MOHAMMED SAHIB AL-AJMI alias ICHAC FEHID ICHAC MOHAMMED SEBIB AL-ACMI alias AJAJ AJAMI', '-', 'Orang', 'ILQ-196', 'Kuwait', '10/08/1987', 'Kuwait', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (297, 'AAMIR ALI CHAUDHRY alias AAMIR ALI CHAUDARY alias AAMIR ALI CHOUDRY alias AMIR ALI CHAUDRY', '-', 'Orang', 'ILQ-094', '-', '03/08/1986', 'Pakistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (298, 'ABOU MOHAMED AL ADNANI alias YASER KHALAF ALRAWI alias JABER TAHA FALAH alias ABOU KHATTAB alias ABOU SADEQ ALRAWI alias TAH AL BINCHI alias ABU MOHAMMED AL-BENSHI', '-', 'Orang', 'ILQ-195', 'Suriah', '00/00/1977', 'Irak', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (299, 'HAMADI BEN ABDUL AZIZ BEN ALI BOUYEHIA alias GAMEL MOHAMED alias ABD EL WANIS ABD GAWWAD', '-', 'Orang', 'ILQ-093', 'Tunis, Tunisia', '29/05/1966', 'Tunisia', 'Corso Xxii Marzo Nomor 39, Milan, Italia.', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (300, 'NAJIBULLAH MUHAMMAD JUMA', 'Anggota Dewan Militer Taliban Peshawar 2010. Diyakini di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-091', 'Zere Kohi area, Shindand, Farah, Afganistan', '00/00/1958', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (301, 'MERAI ZOGHBAI alias MOHAMED LEBACHIR', '-', 'Orang', 'ILQ-194', 'Libya', '22071', '-', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (302, 'MOHAMMAD MOSLIM HAQQANI MUHAMMADI GUL', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-090', 'Gawargan, Pul-e-Khumri, Baghlan, Afganistan', '00/00/1965', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (303, 'ALLAH DAD TAYEB alias WALI MUHAMMAD', '-', 'Orang', 'ILT-089', 'Ghorak, Kandahar, Afganistan', '00/00/1963', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (304, 'FAYCAL BOUGHANEMI alias FAICAL BOUGHANMI alias FAYSAL AL-BUGHANIMI', '-', 'Orang', 'ILQ-092', 'Tunis, Tunisia', '28/10/1966', 'Tunisia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (305, 'ABDULHAI MOTMAEN', 'Anggota Dewan Tertinggi Taliban dan juru bicara Mullah Mohammed Omar Pada tahun 2007. ', 'Orang', 'ILT-088', 'Shinkalai, Nad-e-Ali, Helmand, Afganistan', '00/00/1973', 'Afganistan', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (306, 'AMIR KHAN MOTAQI\n\n', 'Anggota Dewan Tertinggi Taliban per Juni 2007.', 'Orang', 'ILT-087', 'Zurmat, Paktia, Afganistan', '00/00/1968', 'Afganistan', 'Diyakini di wilayah perbatasan Afganistan/Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (307, 'IMED BEN MEKKI ZARKAOUI alias DOUR NADRE', '-', 'Orang', 'ILQ-192', 'Tunis, Tunisia', '15/01/1973', 'Tunisia', '41-45, Rue Estienne D’orves, Pré Saint Gervais, Prancis', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (308, 'MOHAMMAD YAQOUB  \n\n', 'Koordinator kegiatan militer pasukan Taliban di Mainwand, Kandahar, Afganistan', 'Orang', 'ILT-086', 'Shahjoi, Zabul, Afganistan', '00/00/1966', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (309, 'BILAL BIN MARWAN ', 'Perwira of UBL', 'Orang', 'ILQ-090', '-', '00/00/1947', '-', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (310, 'MOHAMMAD SARWAR SIDDIQMAL MOHAMMAD MASOOD', '-', 'Orang', 'ILT-085', 'Jani Khel, Paktia, Afganistan', '00/00/1963', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (311, 'ADEM YILMAZ', 'saat ini berada di penjara Jerman', 'Orang', 'ILQ-189', 'Bayburt, Turki', '04/11/1978', 'Turki', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (312, 'ABDULLAH HAMAD MOHAMMAD KARIM', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-084', 'Darweshan, Hazar Juft area, Garmser, Helmand, Afganista', '00/00/1972', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (313, 'HAFIZ ABDUL SALAM BHUTTAVI alias HAFIZ ABDUL SALAM BHATTVI alias HAFIZ ABDUSALAM BUDVI alias HAFIZ ABDUSSALAAM BHUTVI alias ABDUL SALAM BUDVI', '-', 'Orang', 'ILQ-088', 'Gujranwala, Punjab, Pakistan', '00/00/1940', 'Pakistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (314, 'ABDUL RAHMAN YASIN alias TAHA ABDUL RAHMAN S. alias TAHER, ABDUL RAHMAN S. alias YASIN, ABDUL RAHMAN SAID alias YASIN, ABOUD', 'nomor identitas Amerika Serikat SSN 156-92-9858.', 'Orang', 'ILQ-188', 'Amerika Serikat', '10/04/1960', 'Amerika Serikat', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (315, 'ABDUL KABIR MOHAMMAD JAN alias A. KABIR', 'Aktif dalam operasi teroris di Afganistan Timur. Mengumpulkan uang dari pengedar narkoba. Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-083', 'Pul-e-Khumri or Baghlan Jadid, Baghlan, Afganistan', '00/00/1963', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (316, 'ADEL BEN AL-AZHAR BEN YOUSSEF BEN SOLTANE', '-', 'Orang', 'ILQ-087', 'Tunis, Tunisia', '14/07/1970', 'Tunisia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (317, 'OMAR MAHMOUD UTHMAN', '-', 'Orang', 'ILQ-187', 'Palestina', '30/12/1960', '-', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (318, 'MOKHTAR BELMOKHTAR alias ABOU ABBES KHALED alias BELAOUAR KHALED ABOU EL ABASS alias BELAOUER KHALED ABOU EL ABASS alias BELMOKHTAR KHALED ABOU EL ABES alias KHALED ABOU EL ABASS alias KHALED ABOU EL ABBES alias KHALED ABOU EL ABES alias KHALED ABULABBAS NA OOR alias MUKHTAR BELMUKHTAR', '-', 'Orang', 'ILQ-086', 'Ghardaia, Alzajair', '01/06/1972', 'Aljazair', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (319, 'MOHAMED BELKALEM alias ABDELALI ABOU DHER alias EL HARRACHI', '-', 'Orang', 'ILQ-085', 'Hussein Dey, Algiers, Alzajair', '19/12/1969', 'Aljazair', 'Mali', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (320, 'DOKU KHAMATOVICH UMAROV alias LOM-ALI BUTAYEV', '-', 'Orang', 'ILQ-186', 'Russia', '23509', 'Rusia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (321, 'MAHMOOD SULTAN BASHIR-UD-DIN alias MAHMOOD SULTAN BASHIRUDDIN alias MEHMOOD alias DR. BASHIR UDDIN alias MEKMUD alias SULTAN BAISHIRUDDIN', '-', 'Orang', 'ILQ-084', '-', '00/00/1937', 'Pakistan', 'Jalan 13, Wazir Akbar Khan, Kabul, Afghanistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (322, 'MOHAMMED TUFAIL alias TUFAIL, S.M. alias TUFFAIL SHEIK MOHAMMED', '-', 'Orang', 'ILQ-185', '-', '05/05/1930', 'Pakistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (323, 'AYYUB BASHIR alias ALHAJ QARI AYUB BASHAR alias QARI MUHAMMAD AYUB', 'Anggota finance for the Islamic Movement of Uzbekistan', 'Orang', 'ILQ-083', '-', '00/00/1966', 'Uzbekistan', 'Mir Ali, Badan Waziristan Utara, Administrasi Federal\nDaerah kesukuan, Pakistan\n', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (324, 'ANGELO RAMIREZ TRINIDAD alias CALIB TRINIDAD alias KALIB TRINIDAD', '-', 'Orang', 'ILQ-184', 'Filipina', '20/03/1978', 'Filipina', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (325, 'IBRAHIM ALI ABU BAKR TANTOUSH alias ABD AL-MUHSIN alias IBRAHIM ALI MUHAMMAD ABU BAKR alias ABDUL RAHMAN alias ABU ANAS alias IBRAHIM ABUBAKER TANTOUCHE alias IBRAHIM ABUBAKER TANTOUSH alias ‘ABD AL-MUHSI', 'nomor paspor Libya 203037', 'Orang', 'ILQ-183', 'Libya', '00/00/1966', 'Libya', 'Johannesburg, Afrika Selatan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (326, 'SAID BAHAJI ZOUHEIR AL MAGHRIBI', '-', 'Orang', 'ILQ-081', 'Haselünne, Lower Saxony, Jerman', '15/07/1975', 'Jerman', 'dahulu tinggal di Bunatwiete 23, 21073 Hamburg, Jerman', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (327, 'RICARDO PEREZ AYERAS alias ABDUL KAREEM AYERAS alias ABDUL KARIM AYERAS', '-', 'Orang', 'ILQ-080', 'Paraiso Street, Barangay Poblacion, Mandaluyong, Filipina', '15/09/1973', 'Filipina', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (328, 'ABDUL MANAN MOHAMMAD ISHAK ', '-', 'Orang', 'ILT-082', 'Siyachoy, Panjwai, Kandahar, Afganistan', '00/00/1940 atau 1941', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (329, 'YAZID SUFAAT alias JOE alias ABU ZUFAR', '-', 'Orang', 'ILQ-182', 'Johor, Malaysia', '20/01/1964', 'Malaysia', 'Taman Bukit Ampang, Selangor, Malaysia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (330, 'MOHAMMAD SHAFIQ alias MOHAMMADI', 'Pengawas dua pusat pelatihan militer Taliban pada pertengahan 2013. Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-081', 'Tirin Kot, Uruzgan, Afganistan', '00/00/1948', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (331, 'MOHAMMAD WALI MOHAMMAD EWAZ\n\n', 'Dikabarkan meninggal pada Desember 2006 dan dimakamkan di Panjwai;', 'Orang', 'ILT-080', 'Jelawur, Arghandab, Kandahar, Afghanistan', '00/00/1965', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (332, 'THARWAT SALAH SHIHATA alias TARWAT SALAH ABDALLAH alias SALAH SHIHATA THIRWAT alias SHAHATA THIRWAT alias THARWAT SALAH SHIHATA ALI', '-', 'Orang', 'ILQ-181', 'Mesir', '29/06/1960', 'Mesir', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (333, 'HASSAN DAHIR AWEYS ALI alias SHEIKH HASSAN DAHIR AWEYS alias AWES alias SHAYKH HASSAN DAHIR alias HASSEN DAHIR AWEYES alias AHMED DAHIR AWEYS alias MOHAMMED HASSAN IBRAHIM alias AWEYS HASSAN DAHIR alias HASSAN TAHIR OAIS alias HASSAN TAHIR UWAYS alias HASSAN DAHIR AWES', '-', 'Orang', 'ILQ-079', 'Somalia', '00/00/1935', 'Somalia', 'Somalia Selatan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (334, 'FAZL MOHAMMAD MAZLOOM', 'Dalam masa penahanan Amerika Serikat sejak pertengahan 2013', 'Orang', 'ILT-079', 'Uruzgan, Afganistan', '00/00/1963', 'Afganistan', 'Penjara Guantanamo', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (335, 'ABDUL QUDDUS MAZHARI', '-', 'Orang', 'ILT-078', 'Kunduz, Afganistan', '00/00/1970', 'Afganistan', 'Kushal Khan Mena,  Number 5, Kabul, Afganistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (336, 'RI’AD MUHAMMAD HASAN MUHAMMAD HIJAZI alias RAED M. AL-HAWEN alias ABU-AHMAD AL-SHAHID alias ABU-AHMAD', '-', 'Orang', 'ILQ-127', 'Amerika Serikat', '30/12/1968', 'Amerika Serikat', 'Yordania', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (337, 'MATIULLAH ', 'Bekerja sebagai perekrut untuk gerakan Taliban pada pertengahan 2013', 'Orang', 'ILT-077', 'Daman, Kandahar, Afganistan', '00/00/1973', 'Afganistan', 'Diyakini berada di Wilayah perbatasan Afganistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (338, 'HAJI MUHAMMAD ASHRAF alias HAJI M. ASHRAF alias MUHAMMAD ASHRAF MANSHAH MUHAMMAD ASHRAF MUNSHA', '-', 'Orang', 'ILQ-078', 'Faisalabad, Pakistan', '01/03/1965', 'Pakistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (339, 'ALLAH DAD MATIN', 'Kehilangan 1 (satu) kaki karena ranjau darat dan diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-076', 'Kadani, Spin Boldak, Kandahar, Afganistan', '00/00/1953', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (340, 'ABUBAKAR MOHAMMED SHEKAU alias ABUBAKAR SHEKAU alias ABU MOHAMMED ABUBAKAR BIN MOHAMMED alias ABU MUHAMMED ABUBAKAR BIN MOHAMMED alias SHEKAU alias SHEHU alias SHAYKU alias IMAM DARUL TAUHID', '-', 'Orang', 'ILQ-180', '-', '-', 'Nigeria', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (341, 'MOHAMMADULLAH MATI', 'Kehilangan satu kaki di tahun 1980-an. Pemimpin Interim Dewan Tertinggi Taliban sejak Februari hingga April 2010. Bertanggung jawab dalam kegiatan perekrutan anggota pada pertengahan 2013. Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-075', 'Arghandab, Kandahar, Afganistan,', '00/00/1961', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (342, 'ABDUL LATIF MANSUR', 'Sebagai Gubernur Bayangan Taliban Provinsi Logar pada akhir 2012. Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-074', 'Zurmat, Paktia, Afganistan', '00/00/1968', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (343, 'ZIA-UR-RAHMAN MADANI\n', 'Terlibat dalam perdagangan narkoba. Sebagai anggota Taliban yang bertanggung jawab untuk urusan militer di provinsi Takhar, Afganistan, pada Mei 2007. Memfasilitasi penggalangan dana di Teluk atas nama Taliban sejak tahun \n2003. Memfasilitasi pertemuan antara pejabat Taliban dan pendukung serta mengatur banyak orang untuk bepergian ke Kabul, Afganistan, untuk serangan bunuh diri. Diyakini berada di kawasan Teluk;\n', 'Orang', 'ILT-073', 'Paliran, Namakab, Takhar, Afganistan', '00/00/1960', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (344, 'SAIFI AMMARI ABDALARAK alias EL PARA ABDERREZAK LE PARA alias ABOU HAIDARA ELOURASSI alias ABDERREZAK ZAIMECHE alias ABDUL RASAK AMMANE ABU HAIDRA', '-', 'Orang', 'ILQ-075', 'Aljazair', '01/01/1968', 'Aljazair', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (345, 'HILARION DEL ROSARIO SANTOS III alias AKMAD SANTOS alias AHMED ISLAM alias AHMAD ISLAM SANTOS alias ABU HAMSA alias HILARION SANTOS III alias ABU ABDULLAH SANTOS alias FAISAL SANTOS', '-', 'Orang', 'ILQ-176', 'Filipina', '12/03/1966', 'Filipina', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (346, 'ABDUL RAZAQ AKHUND alias LALA AKHUND', 'Anggota Dewan Taliban sejak 2008', 'Orang', 'ILT-072', 'Spin Boldak, Kandahar, Afganistan, in the area bordering Chaman, Quetta, Pakistan', '00/00/1958', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (347, 'AIMAN MUHAMMED RABI AL-ZAWAHIRI alias AYMAN AL-ZAWAHARI alias AHMED FUAD SALIM alias AL ZAWAHRY AIMAN MOHAMED RABI ABDEL MUAZ alias AL ZAWAHIRI AYMAN alias ABDUL QADER ABDUL AZIZ ABDUL MOEZ AL DOCTOR alias AL ZAWAHRY AIMAN MOHAMED RABI alias AL ZAWAHRY AIMAN MOHAMED RABIE alias AL ZAWAHRY AIMAN MOHAMED ROBI alias DHAWAHRI AYMAN alias EDDAOUAHIRI AYMAN alias NUR AL DEEN ABU MOHAMMED alias AYMAN AL ZAWAHARI alias AHMAD FUAD SALIM', 'Pimpinan Al-Qaeda, orang dekat Usama Bin Laden, dipercaya ada di Afganistan', 'Orang', 'ILQ-073', 'Giza, Mesir', '19/06/1951', 'Mesir', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (348, 'MOHAMMED QASIM MIR WALI KHUDAI RAHIM', 'Terlibat dalam penyediaan senjata untuk Taliban, termasuk alat peledak improvisasi (IED);', 'Orang', 'ILT-071', 'Minar, Garmser, Helmand, Afganistan', '00/00/1975', 'Afganistan', 'Wesh, Spin Boldak, Kandahar, Afganistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (349, 'KHAIRULLAH BARAKZAI ', 'Pemilik Pertukaran Uang Khairullah Haji Sattar;\n\n', 'Orang', 'ILT-070', 'Zumbaleh, Nahr-e Saraj, Helmand, Afganistan', '00/00/1965', NULL, 'Abdul Manan Chowk, Pashtunabad, Quetta, Baluchistan, Pakistan.', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (350, 'MAHFOUZ OULD AL-WALID alias ABU HAFS THE MAURITANIAN', '-', 'Orang', 'ILQ-071', 'Mauritania', '01/01/1975', 'Mauritania', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (351, 'NESSIM BEN ROMDHANE SAHRAOUI alias NASIM AL-SAHRAWI', '-', 'Orang', 'ILQ-174', 'Tunisia', '03/08/1973', 'Tunisia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (352, 'RADULAN SAHIRON alias RADULLAN SAHIRON alias RADULAN SAHIRUN alias RADULAN SAJIRUN alias COMMANDER PUTOL', '-', 'Orang', 'ILQ-173', '-', '-', 'Filipina', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (353, 'HAFIZ MUHAMMAD SAEED alias HAFIZ MOHAMMAD SAHIB alias HAFIZ MOHAMMAD SAYID alias HAFIZ MUHAMMAD alias HAFIZ SAEED alias HAFEZ MOHAMMAD SAEED alias HAFIZ MOHAMMAD SAYEED alias TATA MOHAMMAD SYEED alias MOHAMMAD SAYED alias MUHAMMAD SAEED', '-', 'Orang', 'ILQ-172', 'Sargodha, Punjab, Pakistan', '05/06/1950', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (354, 'MOHAMMAD HAMDI MOHAMMAD SADIQ AL-AHDA alias AL-HAMATI MUHAMMAD alias MUHAMMAD MUHAMMAD ABDULLAH AL-AHDAL alias MOHAMED MOHAMED ABDULLAH AL-AHDAL', '-', 'Orang', 'ILQ-171', '-', '-', 'Yaman', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (355, 'ANAS HASAN KHATTAB alias SAMIR AHMED AL-KHAYAT ', '-', 'Orang', 'ILQ-209', 'Damaskus, Siriah', '07/04/1986', '-', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (356, 'MOHAMMAD NAIM BARICH KHUDAIDAD', 'Anggota Komisi Militer Taliban pada 2013. Diyakini berada di Afganistan/Pakistan wilayah perbatasan', 'Orang', 'ILT-069', 'Lakhi village, Hazarjuft Area, Garmsir District, Helmand Province, Afghanistan ', '00/00/1975', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (357, 'AMIN MUHAMMAD UL HAQ SAAM KHAN AL-HAQ alias AMIN alias AMIN alias MUHAMMAD', '-', 'Orang', 'ILQ-170', '-', '-', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (358, 'FAZEEL-A-TUL SHAYKH ABU MOHAMMED alias AMEEN alias AL-PESHAWARI alias Shaykh Aminullah', 'Bersosiasi dengan Al Qaidah', 'Orang', 'ILQ-061', 'Afghanistan ', '00/00/1967', 'Afganistan', 'Distrik Ganj, Peshawar, Pakistan\n', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (359, 'AL-AZHAR BEN KHALIFA BEN AHMED ROUINE  alias SALMANE LAZHAR', '-', 'Orang', 'ILQ-169', 'Sfax, Tunisia', '20/11/1975', 'Tunisia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (360, 'ABD AL-RAHMAN KHALAF UBAYD JUDAY AL-‘ANIZI', 'Pemberi dukungan kepada Al-Qaida dan negara Islam di Irak', 'Orang', 'ILQ-208', '-', '06/03/1973', 'Kuwait', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (361, 'ABDELHALIM HAFED ABDELFATTAH REMADNA', '-', 'Orang', 'ILQ-168', 'Biskra, Aljazair', '02/04/1966', 'Aljazair', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (362, 'ISAM ALI MOHAMED ALOUCHE', 'Telah di deportasi dari jerman ke Jordan pada bulan februari 2005.', 'Orang', 'ILQ-060', 'Baghdad, Irak', '21/03/1974', 'Yordania', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (363, 'EZATULLAH HAQQANI alias KHAN SAYYID', 'Anggota Taliban Peshawar Shura pada 2008.', 'Orang', 'ILT-068', 'Alingar, Laghman, Afganistan', '00/00/1957', 'Afganistan', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (364, 'FAZAL RAHIM alias FAZEL RAHIM alias FAZIL RAHIM alias FAZIL RAHMAN', '-', 'Orang', 'ILQ-165', 'Kabul, Afghanistan', '26688', 'Afganistan', 'Perbatasan Afghanistan/Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (365, 'GHAZY FEZZA alias HISHAN alias AL-MAZIDIH', '-', 'Orang', 'ILQ-059', '-', '00/00/1974', '-', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (366, 'KHAIRULLAH alias KHAIRKHWAH', 'Dalam masa penahanan Amerika Serikat sejak pertengahan 2013', 'Orang', 'ILT-067', ' Poti village, Afghistan district, Kandahar province, Afghanistan', '00/00/1963', 'Afganistan', 'Penjara Guantanamo', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (367, 'ARIF QASMANI alias MUHAMMAD ARIF QASMANI alias MUHAMMAD ‘ARIF QASMANI alias MOHAMMAD ARIF QASMANI alias ARIF UMER alias QASMANI BABA', '-', 'Orang', 'ILQ-163', '-', '-', 'Pakistan', 'Karachi, Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (368, 'ABDUL RAUF KHADEM', 'Anggota Taliban yang bertanggung jawab untuk wilayah Provinsi Uruzgan, Afganistan, pada tahun 2011', 'Orang', 'ILT-066', ' Azan, Kajaki, Helmand, Afghanistan', '00/00/1970', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (369, 'SEIFALLAH BEN HASSINE', 'Pendiri grup pejuang Tunisia dan pemimpin Anshar Al-Syariah di Tunisia', 'Orang', 'ILQ-206', 'Tunisia', '08/11/1965', 'Tunisia', '60 Rue de la Libye, Hammam Lif, Ben Arous, Tunisia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (370, 'AKRAM TURKI alias HISHAN alias AL-MAZIDIH', '-', 'Orang', 'ILQ-058', '-', '00/00/1974', '-', 'Zabadani, Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (371, 'RAHMATULLAH KAKAZADA', 'Anggota Taliban yang bertanggung jawab di wilayah Provinsi Ghazni, Afganistan, pada Mei 2007. Kepala jaringan intelijen Taliban.\n', 'Orang', 'ILT-065', 'Zurmat, Paktia, Afganistan', '00/00/1968', 'Afganistan', ' Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (372, 'DINNO AMOR ROSALEJOS PAREJA alias JOHNNY PAREJA alias KHALIL PAREJA', '-', 'Orang', 'ILQ-162', 'Cebu City, Filipina', '19/07/1981', 'Filipina', 'Atimonana, Quezon, Filipina', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (373, 'ABD AL-RAHMAN OULD MUHAMMAD AL-HUSAYN OULD MUHAMMAD SALIM alias ABDARRAHMANE OULD MOHAMED EL HOUCEIN OULD MOHAMED SALEM', '-', 'Orang', 'ILQ-161', '-', '-', 'Mauritania', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (374, 'SAIDULLAH JAN', 'Anggota senior jaringan Haqqani 2013, perekrut anggota', 'Orang', 'ILT-064', 'Giyan, Paktika, Afganistan', '00/00/1982', '-', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (375, 'IBRAHIM SULEIMAN HAMAD AL-HABLAIN  alias Barahim Suliman H', 'Nomor paspor Saudi Arabia F800691. Ahli bahan peledak dan operasi brigade Abdallah Azzam, masuk dalam DPO terorisme pemerintahan Arab Saudi ', 'Orang', 'ILQ-205', 'Buraidah, Saudi Arabia ', '17/12/1984', 'Arab Saudi', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (376, 'QUDRATULLAH JAMAL', 'Anggota Taliban Dewan Agung dan anggota Komisi Budaya Taliban pada 2010. Diyakini berada di wilayah perbatasan Afganistan/Pakistan;', 'Orang', 'ILT-063', 'Gardez, Paktia, Afganistan ', '-', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (377, 'ABD-AL-HAMID ALIAS AL-MASLI alias ABD AL-HAMID MUHAMMAD ABD-AL-HAMID AL-MASLI', '-', 'Orang', 'ILQ-057', 'Libya', '00/00/1976', 'Libya', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (378, 'ANDERS CAMEROON OSTENSVIG DALE', 'Anggota Al-Qaida di Semenanjung Arabia', 'Orang', 'ILQ-204', 'Oslo, Norwegia', '19/10/1978', 'Norwegia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (379, 'GUL AGHA ISHAKZAI', 'Anggota Dewan Taliban yang mengkoordinasikan pengumpulan zakat dari Provinsi Baluchistan, Pakistan. Kepala Taliban Komisi Keuangan pertengahan 2013.', 'Orang', 'ILT-062', 'Band-e Temur, Maiwand, Kandahar, Afganistan', '00/00/1972', '-', 'Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (380, 'JAN MOHAMMAD alias MADANI IKRAM', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-061', 'Siyachoy, Panjwai, Kandahar, Afganistan', '00/00/1954-1955', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (381, 'TAREK BEN HABIB BEN AL-TOUMI AL-MAAROUFI', '-', 'Orang', 'ILQ-056', '-', '23/11/1965', 'Tunisia', 'Rue Léon Théodore Nomor 107/1, 1090 Jette, Brussels, Belgia;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (382, 'ABDUL RAHMAN AHMAD HOTTAK', 'Diyakini berada di perbatasan Afganistan dan Pakistan;\n\n', 'Orang', 'ILT-060', 'Ghazni, Afganistan', '00/00/1957', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (383, 'HAMADA OULD MOHAMED EL KHAIRY alias HAMADA OULD MOHAMED LEMINE OULD MOHAMED EL KHAIRY alias OULD KHEIROU ALIAS HAMAD EL KHAIRY', '-', 'Orang', 'ILQ-160', 'Nouackchott, Mauritania', '00/00/1970', 'Mauritania', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (384, 'AZZAM ABDULLAH ZUREIK AL-MAULID AL-SUBHI', 'Masuk dalam DPO terorisme pemerintahan Arab Saudi', 'Orang', 'ILQ-203', 'Al Baraka, Saudi Arabia ', '12/04/1976', 'Arab Saudi', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (385, 'NAJIBULLAH HAQQANI alias HIDAYATULLAH', 'Diyakini berada di perbatasan Afganistan dan Pakistan', 'Orang', 'ILT-059', 'Moni, Shigal, Kunar', '00/00/1971', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (386, 'ABDERRAHMANE OULD EL AMAR alias AHMED EL TILEMSI alias ABDERRAHMANE OULD EL AMAR OULD SIDAHMED LOUKBEITI alias AHMAD OULD AMAR', '-', 'Orang', 'ILQ-159', '-', '-', '-', 'Gao, Mali', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (387, 'HABIB BEN AHMED AL-LOUBIRI', '-', 'Orang', 'ILQ-055', 'Tunisia', '17/11/1961', 'Tunisia', 'Al-Damus, Manzal Tmim, Nabul, Tunisia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (388, 'HIDAYATULLAH', 'Diyakini berada di perbatasan Afganistan dan Pakistan', 'Orang', 'ILT-058', 'Arghandab, Kandahar, Afganistan', '00/00/1968', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (389, 'TAYEB NAIL alias DJAAFAR ABOU MOHAMED', '-', 'Orang', 'ILQ-158', '-', '00/00/1972', 'Aljazair', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (390, 'YAHYA HAQQANI', 'Senior Haqqani Network, terlibat dalam kegiatan militer, keuangan, dan propaganda kelompok', 'Orang', 'ILT-057', '-', '00/00/1982', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (391, 'MUHAMMAD JAMAL ABD-AL RAHIM AHMAD AL-KASHIF alias MUHAMMAD JAMAL ABDO AL-KASHIF', 'Belajar membuat bomdi Afganistan pada tahun 1980 dengan Al-Qaeda, dan juga sebagai komadan lapangan milter Egyptian Islamic Jihad', 'Orang', 'ILQ-052', 'Mesir', '01/01/1964', 'Mesir', 'Mesir', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (392, 'AHMED ABDULLAH alias SALEH AL-KHAZMARI alias AL-ZAHRANI', 'Anggota senior Al-Qaida, masuk dalam DPO terorisme pemerintahan Arab Saudi', 'Orang', 'ILQ-202', 'Dammam, Saudi Arabia ', '15/09/1978', 'Arab Saudi', 'Siriah  ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (393, 'BOUBEKEUR BOULGHITI alias ABU BAKR AL-JAZIRI alias YASIR AL-JAZARI', 'Kepala keuangan The Afghan Support Committee (ASC)', 'Orang', 'ILQ-049', 'Aljazair', '13/02/1970', 'Aljazair', 'Aljazair, Palestina', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (394, 'ALI SAYYID MUHAMED MUSTAFA BAKRI alias ALI SALIM ABD AL-AZIZ AL-MASRI', '-', 'Orang', 'ILQ-157', 'Beni-Suef, Mesir', '18/04/1966', 'Mesir', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (395, 'SIRAJUDDIN JALLALOUDINE HAQQANI', 'Pemimpin Haqqani Network', 'Orang', 'ILT-056', 'Danda, Miramshah, North Waziristan, Pakistan', '00/00/1977', 'Afganistan', ' - Kela neighborhood/Danda neighborhood, Miramshah, North Waziristan, Pakistan;\n- Manba\'ul uloom Madrasa, Miramshah, North Waziristan, Pakistan;\n- Dergey Manday Madrasa, Miramshah, North Waziristan, Pakistan;\n', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (396, 'ABDUL HAKIM MURAD alias MURAD alias ABDUL HAKIM HASIM alias MURAD alias ABDUL HAKIM ALI HASHIM MURAD alias ABDUL HAKIM AL HASHIM alias SAEED AKMAN SAEED AHMED', '-', 'Orang', 'ILQ-156', 'Kuwait', '11/04/1968', 'Pakistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (397, 'ABU MOHAMMED AL-JAWLANI alias ABU MOHAMED AL-JAWLANI alias ABU MUHAMMAD AL-JAWLAN alias ABU MOHAMMED AL-JULANI alias ABU MOHAMMED AL-GOLANI alias ABU MUHAMMAD AL-GOLANI alias ABU MUHAMMAD AL-JAWLANI alias MUHAMMAD AL-JAWLANI', 'Salah satu pimpinan Al-Nusrah', 'Orang', 'ILQ-048', 'Suriah', '00/00/1975', 'Suriah', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (398, 'MOHAMMED YAHYA MUJAHID alias MOHAMMAD YAHYA AZIZ', '-', 'Orang', 'ILQ-155', 'Punjab, Pakistan', '12/03/1961', 'Pakistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (399, 'MATI UR-REHMAN ALI MUHAMMAD alias MATI-UR REHMAN alias MATI UR REHMAN alias MATIUR RAHMAN', '-', 'Orang', 'ILQ-045', 'Pakistan', '00/00/1977', 'Pakistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (400, 'FAIZULLAH KHAN NOORZAI', 'Pemberi dana Taliban, Pemasok senjata, amunisi handak dan peralatan medis untuk Taliban, pelatih kepada pasukan taliban, di perbatasan Pakistan/Afganistan', 'Orang', 'ILT-134', 'Lowy Kariz, Distrik Spin Boldak, Propinsi Kandahar, Afghanistan', '00/00/1966', 'Afganistan', 'Jalan Boghra, Desa/Kampung Miralzei, Chaman, Propinsi Baluchistan, Pakistan ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (401, 'ABDUL RAUF ZAKIR', 'Kepala operasi bunuh diri jaringan Haqqani', 'Orang', 'ILT-133', 'Propinsi Kabul, Afghanistan', '00/00/1969', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (402, 'MOHAMMAD ZAHID', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan.', 'Orang', 'ILT-132', 'Propinsi Logar, Afghanistan ', '00/00/1971', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (403, 'ABDUL RAHMAN ZAHED', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan.', 'Orang', 'ILT-131', 'Distrik Kharwar, Propinsi Logar, Afghanistan ', '00/00/1963', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (404, 'MUHAMMAD OMAR ZADRAN', 'Pemimpin lebih dari 100 militan aktif di Khos Afganistan', 'Orang', 'ILT-130', 'Desa Sultan Kheyl, Distrik Spera, Propinsi Khost, Afghanistan. ', '00/00/1958', '-', 'Perbatasan Afghanistan/Pakistan ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (405, 'UBAIDULLAH AKHUND alias YAR MOHAMMAD AKHUND', 'Diberitakan meninggal pada Maret 2010 dan dimakamkan di Karachi Pakistan', 'Orang', 'ILT-129', 'Sangisar village, Panjwai District, Kandahar Province, Afghanistan', '00/00/1969', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (406, 'ENCEP NURJAMAN alias RIDUAN ISMUDIN alias HAMBALI', '-', 'Orang', 'IDQ-001', '-', '-', 'Indonesia', 'Pamokolan Rt 2/Rw 4, desa Sukamanah, kecamatan Karangtengah, Cianjur, Jawa Barat', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (407, 'SULAIMAN JASSEM SULAIMAN ALI ABO GHAITH', '-', 'Orang', 'ILQ-043', 'Kuwait', '14/12/1965', 'Kuwait', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (408, 'MUBARAK MUSHAKHAS SANAD MUBARAK AL-BATHALI alias MUBARAK MISHKHIS SANAD AL-BATHALI alias MUBARAK MISHKHIS SANAD AL-BADHALI', '-', 'Orang', 'ILQ-154', 'Kuwait', '01/10/1961', '-', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (409, 'MOHAMMAD JAWAD WAZIRI ', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-128', 'Jaghatu District, Maidan Wardak Province, Afghanistan', '00/00/1960', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (410, 'KAMAL BEN MAOELDI BEN HASSAN AL-HAMRAOUI alias HAMROUI KAMEL BEN MOULDI', '-', 'Orang', 'ILQ-040', 'Tunisia', '21/10/1977', 'Tunisia', 'Via Bertesi Number 27, Cremona, Italia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (411, 'MOHAMMAD ESSA AKHUND ', '-', 'Orang', 'ILT-029', 'Mial area, Spin Boldak, Kandahar, Afganistan', '00/00/1958', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (412, 'MOHAMMAD ABBAS AKHUND ', 'Anggota Dewan Taliban Tertinggi yang bertanggung jawab pada bagian Medis pada Januari 2011. Membawahi tiga pusat medis bagian merawat pasukan Taliban yang terluka pada pertengahan 2013 dan diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-028', 'Khas Uruzgan, Uruzgan, Afganistan', '00/00/1963', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (413, 'MOHAMMAD HASSAN AKHUND', 'Anggota dewan tinggi Taliban per Desember 2009', 'Orang', 'ILT-027', 'Pashmul, Panjwai, Kandahar, Afganistan', '00/00/1955-1958', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (414, 'OTHMAN AHMED OTHMAN AL-GHAMDI alias OTHMAN AL-GHAMDI', 'nomor induk kependudukan Arab Saudi 1089516791;\nPanglima operasional Al-Qaida di Semenanjung Arab;\nterlibat dalam pengumpulan dana dan penimbunan senjata untuk operasi AQAP dan aktivitas di Yaman;\n', 'Orang', 'ILQ-038', 'Arab Saudi', '27/05/1979', 'Arab Saudi', 'Yaman', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (415, 'MOHAMMAD AMAN AKHUND', 'Anggota senior Taliban di 2011 bagian keuangan, termasuk penggalangan dana. Memberikan dukungan logistik untuk operasi Taliban dan menyalurkan hasil perdagangan narkoba, pembelian senjata serta menjabat sebagai sekretaris pemimpin Taliban Mullah Mohammed Omar', 'Orang', 'ILT-026', 'Bande Tumur, Maiwand, Kandahar, Afganistan', '00/00/1970', '-', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (416, 'DJAMEL MOUSTFA ALI BARKANI alias ALI BARKANI alias KALAD BELKASAM alias MUSTAFA', '-', 'Orang', 'ILQ-153', 'Alzajair', '28/09/1973', 'Aljazair', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (417, 'ATTIQULLAH AKHUND ', 'Anggota dewan tertinggi Militer Taliban per Juni 2010', 'Orang', 'ILT-025', 'Shah Wali Kot, Kandahar, Afganistan', '00/00/1953', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (418, 'ABDUL BARI AKHUND', 'Anggota dewan tertinggi Taliban pada tahun 2009; Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-024', 'Baghran, Helmand, Afganistan', '00/00/1953', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (419, 'MOHAMED AMIN MOSTAFA ', '-', 'Orang', 'ILQ-152', 'Kirkuk, Irak', '11/10/1975', '-', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (420, 'KHALID ABD AL-RAHMAN HAMD AL-FAWAZ alias AL-FAUWAZ KHALED alias AL-FAUWAZ, KHALED A. alias AL-FAWWAZ KHALID alias AL FAWWAZ KHALIK alias AL-FAWWAZ KHALED alias AL FAWWAZ KHALED alias KHALID ABDULRAHMAN H. AL FAWAZ', '-', 'Orang', 'ILQ-036', 'Kuwait', '24/08/1962', 'Arab Saudi', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (421, 'SALEH MOHAMMAD KAKAR AKHTAR MUHAMMAD ', 'Menjalankan jaringan penyelundupan terorganisir di Kandahar dan Helmand, Afganistan. Sebelumnya dioperasikan laboratorium pengolahan heroin di Band - e Temur, Provinsi Kandahar, Afganistan', 'Orang', 'ILT-023', 'Nalghan, Panjwai, Kandahar, Afganistan', '00/00/1961-1962', 'Afganistan', 'Daman, Kandahar, Afghanistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (422, 'YUNOS UMPARA MOKLIS alias MUKLIS YUNOS alias MUKHLIS YUNOS', '-', 'Orang', 'ILQ-151', 'Lanao Del Sur, Filipina', '07/07/1966', 'Filipina', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (423, 'AHMED JAN alias WAZIR alias AKHTAR MOHAMMAD', 'Pimpinan utama Haqqani Network di perbatasan Afganistan/Pakistan; Bertindak sebagai wakil, juru bicara dan penasihat untuk pemimpin senior Haqqani Jaringan Sirajuddin Haqqani Jallaloudine', 'Orang', 'ILT-022', 'Barlach, Qareh Bagh, Ghazni, Afganistan', '00/00/1963', '-', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (424, 'NOUREDDINE BEN ALI BEN BELKASSEM AL-DRISSI alias DRISSI NOUREDDINE', '-', 'Orang', 'ILQ-035', 'Tunis, Tunisia', '30/04/1964', 'Tunisia', 'Via Plebiscito 3, Cermona, Italy', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (425, 'MOHAMMAD AHMADI ', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-020', 'Distrik Daman Kandahar, Afganistan', '00/00/1963', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (426, 'DJAMEL LOUNICI alias JAMAL LOUNICI', '-', 'Orang', 'ILQ-147', 'Alzajair', '01/02/1962', 'Aljazair', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (427, 'SALEM NOR ELDIN AMOHAMED AL-DABSKI alias ABU AL-WARD alias ABDULLAH RAGAB', '-', 'Orang', 'ILQ-032', 'Libya', '00/00/1963', 'Libya', 'Bab Ben Ghasheer, Tripoli, Libyan Arab Jamahiriya', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (428, 'ANWAR NASSER ABDULLA AL-AULAQI alias ANWAR AL-AULAQI alias ANWAR AL-AWLAKI alias ANWAR AL-AWLAQI alias ANWAR NASSER AULAQI alias ANWAR NASSER ABDULLAH AULAQI alias ANWAR NASSER ABDULLA AULAQI', 'Dikabarkan sudah meninggal pada 30 September 2011 di Yaman;', 'Orang', 'ILQ-029', 'Mexico', '21/04/1971', 'Amerika Serikat', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (429, 'MOHAMED BEN BELGACEM BEN ABDALLAH AL-AOUADI AOUADI alias MOHAMED BEN BELKACEM alias FATHI HANNACHI', 'nomor paspor l 191609;\nnomor kartu penduduk 04643632;', 'Orang', 'ILQ-026', 'Tunisia', '11/12/1974', 'Tunisia', '50th street, number 23, Zehrouni, Tunis, Tunisia;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (430, 'RUBEN PESTANO lS LAVILLA, JR alias REUBEN LAVILLA alias SHEIK OMAR alias MILE D LAVILLA alias REYMUND LAVILLA alias RAMO LAVILLA alias MIKE DE LAVILLA alias ABDULLAH MUDDARIS alias ALI OMAR alias OMAR LAVILLA alias OMAR LABELLA', 'nomor paspor Filipina MM611523;', 'Orang', 'ILQ-146', 'Filipina', '04/10/1972', 'Filipina', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (431, 'MEHREZ BEN MAHMOUD BEN SASSI AL-AMDOUNI alias FABIO FUSCO', '-', 'Orang', 'ILQ-025', 'Italia', '18/12/1969', 'Tunisia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (432, 'ZAKI-UR-REHMAN LAKHVI alias ZAKIR REHMAN LAKVI ZAKI alias UR-REHMAN LAKVI alias KAKI UR-REHMAN alias ZAKIR REHMAN alias ABU WAHEED IRSHAD AHMAD ARSHAD', '-', 'Orang', 'ILQ-145', 'Pakistan', '30/12/1960', 'Pakistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (433, 'MOHAMED LAHBOUS alias MOHAMED ENNOUINI alias HASSAN alias HOCINE', '-', 'Orang', 'ILQ-144', 'Mali', '00/00/1978', 'Mali', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (434, 'ABDUR REHMAN', 'nomor Passport Pakistan CV9157521', 'Orang', 'ILQ-011', 'Pakistan', '03/10/1965', 'Pakistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (435, 'ABDELKADER LAAGOUB', 'nomor paspor Maroko D-379312', 'Orang', 'ILQ-143', 'Maroko', '23/04/1966', 'Maroko', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (436, 'MUSTAFA HAJJI MUHAMMAD KHAN alias KHALID MAHMUD', '-', 'Orang', 'ILQ-141', '-', '-', 'Pakistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (437, 'DJAMEL AKKACHA alias YAHIA ABOU EL HOUMMAM alias YAHIA ABOU EL HAMMAM', 'Koordinator kelompok organisasi Al-Qaeda di Maghreb Islam Mali utara', 'Orang', 'ILQ-022', 'Aljazair', '09/05/1978', 'Aljazair', 'Mali', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (438, 'DAWOOD IBRAHIM KASKAR alias DAWOOD EBRAHIM alias SHEIKH DAWOOD HASSAN alias ABDUL HAMID ABDUL AZIZ alias ANIS IBRAHIM alias AZIZ DILIP alias DAUD HASAN SHAIKH IBRAHIM KASKAR alias DAUD IBRAHIM MEMON KASKAR alias DAWOOD HASAN IBRAHIM KASKAR alias DAWOOD IBRAHIM MEMON alias DAWOOD SABRI alias KASKAR DAWOOD HASAN alias SHAIKH MOHD ISMAIL ABDUL REHMAN alias DOWOOD HASSAN SHAIKH IBRAHIM', 'Nomor paspor India K560098', 'Orang', 'ILQ-140', 'India', '26/12/1955', 'India', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (439, 'SAYYED GHIASSOUDDINE AGHA alias SAYED GHIAS alias SAYED GHIASUDDIN SAYED GHOUSUDDIN alias SAYYED GHAYASUDIN', 'Anggota yang bertanggung jawab untuk wilayah Faryab, Jawzjan, Sari Pul dan Balkh, Afganistan per Juni 2010; Terlibat dalam perdagangan narkoba Taliban; Anggota Dewan Agung Taliban dan Dewan Militer Taliban Desember 2009; Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-019', 'Kohistan, Faryab, Afganistan', '00/00/1961', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (440, 'TARIQ ANWAR EL SAYED AHMED alias HAMDI AHMAD FARAG alias AMR AL-FATIH FATHI alias TAREK ANWAR EL SAYED AHMAD', '-', 'Orang', 'ILQ-019', 'Mesir', '15/03/1963', 'Mesir', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (441, 'SAYED MOHAMMAD AZIM AGHA alias SAYED MOHAMMAD AZIM AGHA', 'Anggota komisi militer Taliban pada pertengahan 2013. Diyakini berada di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-018', 'Panjwai, Kandahar, Afganistan', '00/00/1966 atau 1969', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (442, 'JANAN AGHA alias ABDULLAH JAN AGHA ', 'Anggota Taliban Dewan Agung dan penasihat Mullah Mohammed Omar', 'Orang', 'ILT-017', 'Tirin Kot, Uruzgan, Afganistan ', '00/00/1953 atau 1958', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (443, 'MEHDI BEN MOHAMED BEN MOHAMED KAMMOUN alias SALMANE', '-', 'Orang', 'ILQ-138', 'Tunisia', '03/04/1968', 'Tunisia', 'Via Masina Number 7, Milan, Italia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (444, 'AHMAD ZIA AGHA', 'Pejabat senior Taliban yang bertanggung jawab di bidang militer dan keuangan/pemimpin/dewan Militer Taliban pada 2010', 'Orang', 'ILT-016', 'Maiwand, Kandahar, Afganistan', '00/00/1974', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (445, 'ABDUL RAHMAN alias AGHA', 'Diyakini berada di wilayah perbatasan Afganistan atau Pakistan', 'Orang', 'ILT-015', 'Arghandab, Kandahar, Afganistan', '00/00/1958', 'Afganistan/Pakistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (446, 'SALIM Y SALAMUDDIN JULKIPLI alias KIPLI SALI alias JULKIPLI SALIM', '-', 'Orang', 'ILQ-137', 'Filipina', '20/06/1967', 'Filipina', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (447, 'ADAM KHAN alias ACHEKZAI', 'Pembuat alat peledak dan fasilitator bagi Taliban; Anggota Taliban yang bertanggung jawab di wilayah Badghis, Afganistan, 2010; Mantan anggota Taliban yang bertanggung jawab atas di Sar e Pul dan Samangan, Afganistan; Pimpinan militer Taliban di Kandahar, Afganistan; Terlibat dalam mengorganisir serangan bunuh diri; Terkait dengan Abdul Samad Achekzai.', 'Orang', 'ILT-014', 'Kandahar, Afganistan ', '00/00/1970-1974', 'Pakistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (448, 'FARHAD KANABI AHMAD alias KAUA OMAR ACHMED', '-', 'Orang', 'ILQ-017', 'Irak', '01/07/1971', 'Irak', 'Arbil – Qushtuba – house no. SH 11, alley 5380, Iraq;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (449, 'ABDUL SAMAD alias ACHEKZAI', 'Anggota senior taliban yang bertanggung jawab untuk pembuatan alat peledak improvisasi (IED)', 'Orang', 'ILT-013', 'Afganistan', '00/00/1970', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (450, 'SHAMS alias UR-RAHMAN alias ABDUL ZAHIR', 'Diyakini berada di wilayah perbatasan Afganistan/Pakistan dan Terlibat dalam perdagangan narkoba', 'Orang', 'ILT-012', 'Waka Uzbin,Sarobi, Kabul, Afganistan', '00/00/1969', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (451, 'IYAD AG GHALI', 'pendiri dan pemimpin ansar Eddine;\nanggota tuareg ifogas tribe;\nTerkait dengan organisasi al - Qaeda di Maghreb;', 'Orang', 'ILQ-016', 'Mali', '00/00/1954', 'Mali', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (452, 'SAYED ESMATULLAH alias ASEM alias ABDUL QUDDUS', 'Anggota Dewan Tertinggi Taliban pada Mei 2007; Anggota Taliban Peshawar Syura', 'Orang', 'ILT-011', 'Qalayi Shaikh, Chaparhar District, Nangarhar, Afghanistan', '00/00/1967', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (453, 'AHMAD TAHA alias KHALID alias ABDUL QADIR', 'Anggota Taliban yang bertanggung jawab untuk wilayah Nangarhar tahun 2011', 'Orang', 'ILT-010', 'Nangarhar, Afghanistan atau Khost, Afganistan atau Siddiq Khel, Naka, Paktia, Afganistan  ', '00/00/1963', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (454, 'ABDUL HAI alias HAZEM alias ABDUL QADER', '-', 'Orang', 'ILT-009', 'Pashawal Yargatoo, Andar, Ghazni, Afganistan', '00/00/1971', 'Afganistan', '- Iltifat, Shakardara, Kabul, Afganistan\n- Puli Charkhi Area, Nomor 9, Kabul', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (455, 'ABDUL SATAR alias ABDUL MANAN', 'Pemilik Pertukaran Uang Khairullah Haji Sattar dan terkait juga dengan Khairullah Barakzai', 'Orang', 'ILT-008', 'Mirmandaw, Nahr-e Saraj, Helmand, Afganistan', '00/00/1964', '-', 'Kachray Road, Pashtunabad, Quetta, Baluchistan, Pakistan;\nNasrullah Khan Chowk, Pashtunabad Area, Baluchistan, Pakistan;\nChaman, Baluchistan, Ayno Mina 0093, Kandahar, Afganistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (456, 'ALY SOLIMAN MASSOUD ABDUL SAYED alias MOHAMED OSMAN', '-', 'Orang', 'ILQ-010', '-', '-', 'Libya', 'Ghout El Shamal, Tripoli, Libyan Arab Jamahiriya;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (457, 'AMIR ABDULLAH alias AMIR ABDULLAH SAHIB', 'Melakukan perjalanan ke Kuwait, Arab Saudi, Libya Arab Jamahiriya dan Uni Emirat Arab untuk mengumpulkan dana untuk Taliban', 'Orang', 'ILT-007', 'Paktika, Afganistan', '00/00/1972', 'Afganistan', 'Karachi, Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (458, 'ABDUL MANAN AGHA alias ABDUL MAN’AM SAIYID alias SAIYID ABD AL-MAN', '-', 'Orang', 'ILQ-009', '-', '-', '-', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (459, 'ABDUL GHAFAR alias QURISHI alias ABDUL GHANI', 'Terlibat dalam perdagangan Narkoba', 'Orang', 'ILT-006', 'Turshut, Wursaj, Takhar, Afganistan', '00/00/1970 atau 1967', 'Afganistan', 'Khairkhana Section Nomor 3, Kabul, Afganistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (460, 'ZAFAR IQBAL alias ZAFFER IQBAL alias MALIK ZAFAR IQBAL SHEHBAZ alias MALIK ZAFAR IQBAL SHAHBAZ alias MALIK ZAFAR IQBAL', '-', 'Orang', 'ILQ-132', '-', '04/10/1953', 'Pakistan', 'Masjid Al-Qadesia, 4 Lake Road, Lahore, Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (461, 'NAZIR MOHAMMAD alias ABDUL BASIR', '-', 'Orang', 'ILT-005', 'Malaghi, Kunduz, Afganistan', '00/00/1954', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (462, 'MOSTAFA KAMEL MOSTAFA IBRAHIM alias MUSTAFA KAMEL MUSTAFA alias ADAM RAMSEY EAMAN alias KAMEL MUSTAPHA MUSTAPHA alias MUSTAPHA KAMEL MUSTAPHA alias ABU HAMZA alias MOSTAFA KAMEL MOSTAFA', '-', 'Orang', 'ILQ-131', 'Mesir', '15/04/1958', 'Inggris', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (463, 'ABDUL QADEER alias BASIR alias ABDUL BASEER', 'Penasihat keuangan Dewan Militer Taliban Peshawar dan Kepala Komisi Keuangan Taliban Peshawar.', 'Orang', 'ILT-004', 'Surkh Rod, Nangarhar, Afganistan atau Hisarak, Nangarhar, Afganistan ', '00/00/1964', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (464, 'MAJEED ABDUL CHAUDHRY', '-', 'Orang', 'ILQ-006', '-', '15/04/1939', 'Mesir', '- ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (465, 'ABD ALLAH MOHAMED RAGAB ABDEL RAHMAN', '-', 'Orang', 'ILQ-005', 'Mesir ', '03/11/1957', 'Mesir', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (466, 'ISNILON TOTONI HAPILON alias ISNILON HAPILUN alias ISNILUN HAPILUN alias ABU MUSAB alias SALAHUDIN', '-', 'Orang', 'ILQ-124', 'Filipina', '18/03/1966', 'Filipina', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (467, 'ABDUL GHANI alias BARADAR alias ABDUL AHMAD TURK', 'Ditangkap pada Februari 2010, dan ditahan di Pakistan; Komandan militer Taliban dan anggota dewan Taliban Quetta pada Mei 2007.', 'Orang', 'ILT-003', 'Yatimak, Dehrawood, Uruzgan, Afganistan', '00/00/1968', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (468, 'MOHAMMAD TAHIR HAMMID alias ABDELHAMID AL KURDI', '-', 'Orang', 'ILQ-123', 'Irak', '01/11/1975', '-', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (469, 'NASHWAN ABD AL-RAZZAQ ABD AL-BAQI  alias ABDAL AL-HADI AL-IRAQI alias ABD AL-HADI AL-IRAQI', '-', 'Orang', 'ILQ-001', 'Irak', '00/00/1961', 'Irak', '- ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (470, 'AZIZIRAHMAN alias ABDUL AHAD', '-', 'Orang', 'ILT-002', 'Shega, Kandahar, Afganistan', '00/00/1972', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (471, 'SALIM AHMAD SALIM HAMDAN SAQR AL-JADDAWI', 'Nomor paspor Yaman 00385937', 'Orang', 'ILQ-122', '-', '-', 'Yaman', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (472, 'MUHAMMAD SHOLEH IBRAHIM alias MOHAMMAD SHOLEH IBRAHIM\n', 'Menjabat sebagai Amir JAT (JAT), dan mendukung Islamic State in Iraq and the Levant (ISIL);', 'Orang', 'IDQ-022', 'Demak', '00/00/1958', 'Indonesia', '- ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (473, 'AMOR MOHAMED GHEDEIR ABDELHAMID ABOU ZEID alias YOUCEF ADEL alias ABOU ABDELLAH alias ABID HAMMADOU', '-', 'Orang', 'ILQ-121', 'Aljazair', '00/00/1958', 'Aljazair', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (474, 'ABDUL ROSYID RIDHO BAASYIR ', 'Anak dari Abu Bakar Baasyir yang merupakan pendiri Jemaah Islamiyah (JI) dan Jemaah Anshorut Tauhid (JAT) yang saat ini menjadi Napi tindak pidana terorisme di LP Nusakambangan. ', 'Orang', 'IDQ-009', 'Sukoharjo', '31/01/1974', 'Indonesia', 'Pondok Pesantren Al Wayain Ngrandu, Sumber Agung, Magetan, Jawa Timur, Indonesia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (475, 'ABDUL AZIZ alias ABBASIN', 'Pelaksana tempat pelatihan Militer di Paktika.', 'Orang', 'ILT-001', 'Sheykhan, Pirkowti Area, Orgun, Paktika, Afganistan', '00/00/1969', '-', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (476, 'SAID ARIF alias MOHAMED ARIF alias OMAR GHARIB alias ABDERAHMANI alias ABDALLAH AL-JAZAIRI alias SLIMANE CHABANI alias SOILEMAN', '-', 'Orang', 'ILQ-200', 'Oran, Aljazair', '25/06/1964', 'Aljazair', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (477, 'WIJI JOKO SANTOSO alias WIJIJOKO SANTOSO alias ABU SEIF AL-JAWI alias ABU SEIF alias WIJI JOKO SANTOSO\n', '- Nomor paspor: A2823222;\n- Kepala Divisi Hubungan Luar Negeri Jemaah Islamiyah;\n- Terkait dengan Hilal Ahmar Society Indonesia (HASI);\n', 'Orang', 'IDQ-020', 'Rembang, Jawa Tengah', '14/07/1975', 'Indonesia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (478, 'BAMBANG SUKIRNO alias PAK ZAHRA alias ABU ZAHRA\n', '- nomor paspor A2062513\n- pemimpin senior Jemaah Islamiyah;\n- pemimpin Hilal Ahmar Society Indonesia (HASI);\n', 'Orang', 'IDQ-019', 'Indonesia', '05/04/1975', 'Indonesia', '- ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (479, 'ANGGA DIMAS PERSHADA alias ANGGA DIMAS PERSADA alias ANGGA DIMAS PERSADHA alias ANGGA DIMAS PRASONDHA alias ANGGA DIMAS PESHADA\n', '-	Nomor paspor: W344982;\n-       anggota Jemaah Islamiyah;\n-	pemimpin Hilal Ahmar Society Indonesia (HASI);\n', 'Orang', 'IDQ-018', 'Jakarta', '04/03/1985', 'Indonesia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (480, 'HISYAM ALIZEINN alias UMAR alias ABU SYEKH alias MIKE alias ARSALAN alias ABDUL KARIM alias UMAR PATEK alias UMAR KECIL alias UMAR ARAB alias UMAR SYEH alias ZACKY alias ANIS ALAWI JAFAR', 'saat ini berada di lapas Nusakambangan, divonis 20 Tahun atas perkara tindak pidana Terorisme;\n\n', 'Orang', 'IDQ-017', 'Pemalang', '20/07/1966', 'Indonesia', 'Jln. Semeru No.11, Kelurahan Mulyoharjo, Kec. Pemalang, Kab. Pemalang, Jawa Tengah ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (481, 'THORIQUN alias ABU RUSYDAN alias HAMZAH', '- 	NIK 3319011608600004;\n-	sebagai Amir pada struktur Jemaah Islamiyah (JI) terbaru. (BAP SUYATA alias SALIM alias JIMY alias YAHYA alias MUKTI WIBOWO alias KHOLID);\n-	diputus bersalah dalam perkara terorisme dengan hukuman penjara 3 (tiga) tahun 6 (enam) bulan berdasarkan putusan pengadilan No: 1395/PID.B/2003/PN.JKT.SLT, tanggal 25 Februari 2004. Telah selesai menjalni hukuman;\n', 'Orang', 'IDQ-016', 'Kudus', '16/08/1960', 'Indonesia', 'Prambatan Kidul Rt. 007/002 Kel. Prambatan Kidul, Kec. Kaliwungu, Kab. Kudus,Jawa Tengah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (482, 'TAUFIK RIFKI ', '-  NIK 3372021908740001;\n-  ditangkap di Filipina pada tanggal 2 Oktober 2003 terkait terorisme, saat ini berada di penjara Camp Bagong Diva (SICA) Filipina;\n', 'Orang', 'IDQ-015', 'Surakarta', '19/08/1974', 'Indonesia', 'Jogosuran Dusun Danukusuman RT 3/6 Kode Pos 57156 Kel. Danukusuman, Kec. Serengan, Kota Surakarta, Jawa Tengah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (483, 'ARIS MUNANDAR', '-	NIK 3309100101719002;\n-	paspor nomor : U. 621213 yang dikeluarkan di Boyolali;\n', 'Orang', 'IDQ-014', 'Boyolali', '01/01/1971', 'Indonesia', 'Gejugan Rt. 010/002 Kel. Ngaglik, Kec. Sambi, Kab. Boyolali, Jawa Tengah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (484, 'GUN GUN RUSMAN GUNAWAN ', '- belajar di ABU BAKAR ISLAMIC UNIVERSITY di Karachi Pakistan;\n- adik kandung dari ENCEP NURJAMAN alias RIDUAN alias HAMBALI;\n- ditangkap 1 September 2003 oleh pemerintah Pakistan atas keterlibatan dengan aksi terorisme, telah selesai menjalani hukuman;\n', 'Orang', 'IDQ-013', 'Cianjur', '06/07/1977', 'Indonesia', 'KH Salaeh Rt. 2 Rw. 4 Pemokolan Sukamanah, Cianjur, Jawa Barat, Indonesia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (485, 'AGUS DWIKARNA ', '- Dalam data kependudukan teridentifikasi dengan nama Ir. H. AGUS DWIKARNA dengan nomor NIK 737113108640002 dengan alamat Jalan Hertasning No. 24 RT 5/6 Kode Pos 90222, Kel. Kassi-Kassi, Kec. Rappocini, Kota Makassar, Sulawesi Selatan;\n- ditangkap di Filipina tanggal 13 Maret 2002, divonis 10 s.d. 17 tahun atas kepemilikan bahan peledak dan hanya menjalani 12 tahun yang dijalani           di Penjara New Bilibid Prison, Muntinlupa Filipina;\n', 'Orang', 'IDQ-012', 'Makassar', '11/08/1964', 'Indonesia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (486, 'ABDUL RAHIM BAASYIR', 'anak dari Abu Bakar Baasyir yang merupakan pendiri Jemaah Islamiyah (JI) dan Jemaah Anshorut Tauhid (JAT) yang saat ini menjadi Napi tindak pidana terorisme;', 'Orang', 'IDQ-011', 'Solo', '16/11/1977', 'Indonesia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (487, 'ABU BAKAR BAASYIR bin ABUD BAASYIR alias ABDUS SAMAD', '- diputus bersalah dalam perkara terorisme dengan hukuman penjara 15 (lima belas) tahun berdasarkan putusan pengadilan Nomor:                                               2452 K/PID.SUS/2011 tanggal 27 Februari 2011;\n- pendiri Jemaah Islamiyah (JI), Majelis Mujahidin Indonesia (MMI), Jemaah Anshorut Tauhid (JAT) serta mendukung ISIS dan saat ini sedang menjalani masa hukuman penjara;', 'Orang', 'IDQ-010', 'Jombang', '17/08/1938', 'Indonesia', 'Dusun  Ngruki, RT.6, RW .17,\nKelurahan  Cemani,  Kecamatan  Grogol,  \nKabupaten Sukoharjo, Jawa Tengah, Kode Pos 57191', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (488, 'MOCHAMMAD ACHWAN ', 'NIK dengan nomor 353010405480001; menurut keterangan dalam BAP jaringan terorisme Poso yang sudah ditangkap (IMRAN, ANANG MUHTADIN dll), MOCHAMAD ACHWAN adalah Amir Markaziah JAT Pusat, sekitar tahun 2011 datang ke Poso untuk membentuk JAT Poso dan menghidupkan kembali program-program Jihad di Poso;', 'Orang', 'IDQ-008', 'Tulung Agung', '04/05/1948', 'Indonesia', 'Jalan Ir. H. Juanda VIII/10, RT/RW 002/001, Kel. Jodipan, Kec.  Blimbing, Kab. Kota Malang, Jawa Timur', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (489, 'NASSER AHMED MUTHANA alias  NASIR MUTHANA alias ABDUL MUTHANA alias ABU MUTHANA', 'Masuk dalam daftar pencarian orang pihak berwenang Inggris', 'Orang', 'ILQ-234', 'Cardiff, Inggris', '29/04/1994', 'Suriah', 'Syrian Arab Republic', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (490, 'AQSA MAHMOOD alias UMM LAYTH', 'Perekrut anggota Islamic State in Iraq and the Levant dan merupakan Tokoh kunci the Al-Khanssaa brigade', 'Orang', 'ILQ-233', 'Glasgow, Inggris', '11/05/1994', 'Inggris', 'Suriah ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (491, 'MAXIME HAUCHARD alias ABOU ABDALLAH AL FARANSI', 'Anggota Islamic State in Iraq and the Levant (ISIL)', 'Orang', 'ILQ-232', 'Perancis', '17/03/1992', 'Perancis', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (492, 'PETER CHERIF', 'Anggota Al-Qaida di Semenanjung Arab dan Pernah di Hukum di penjara Prancis selama 5 Tahun pada Tahun 2012', 'Orang', 'ILQ-231', 'Paris', '26/08/1982', 'Perancis', 'Al Mukalla, Provinsi Hadramawt, Yaman', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (493, 'FIHIR alias FIHIRUDDIN MUQTI alias ABDUL RAHMAN alias MOHAMAD IQBAL alias ABU JIBRIL ABDURRAHMAN alias FIKIRUDDIN MUQTI', 'ayah kandung dari MUHAMMAD JIBRIL ABDURRAHMAN alias MUHAMMAD RICKY ARDHAN', 'Orang', 'IDQ-007', 'Korleko, Lombok Timur', '17/08/1958', 'Indonesia', 'jalan Nakula Kompleks Witana Harja III Blok C No. 106-107 Tangerang, Banten, Indonesia', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (494, 'AHMED KHALFAN GHAILANI alias ABU BAKR AHMED, ABUBAKAR AHMED, ABUBAKAR K alias AHMED, ABUBAKAR KHALFAN AHMED alias ABUBAKARY K. AHMED alias AHMED KHALFAN alias ALI alias AHMED KHALFAN alias GHAILANI alias ABUBAKARY KHALFAN AHMED GHAILANI alias AHMED GHILANI alias AHMAD KHALAFAN HUSSEIN alias MAHAFUDH ABUBAKAR AHMED ABDALLAH', '-', 'Orang', 'ILQ-120', 'Tanzania', '14/03/1974', 'Tanzania', 'Amerika Serikat', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (495, 'MUHAMMAD JIBRIL ABDURRAHMAN alias MUHAMMAD RICKY ARDHAN  ', '- Pekerjaan ybs adalah Direktur CV. Ar Rahmah\n- anak kandung FIHIR alias FIHIRUDDIN MUQTI alias ABDUL RAHMAN alias MOHAMAD IQBAL alias ABU JIBRIL ABDURRAHMAN alias FIKIRUDDIN MUQTI;\n- KTP, NIK 09.5310.031279.7042, dikeluarkan di Jakarta Selatan;\n- KK nomor AA.2805615, dikeluarkan di Jakarta Selatan;\n- Paspor nomor S335026 dikeluarkan di Jakarta;\n- diputus bersalah dalam perkara terorisme dengan hukuman penjara 5 (lima) tahun berdasarkan putusan pengadilan Nomor: 226/PID/2010/PT.DKI, tanggal 18 Agustus 2010 dan telah selesai menjalani hukuman', 'Orang', 'IDQ-006', 'Lombok Timur', '28/05/1984', 'Indonesia', 'Kompleks Witana Harja Blok C No. 137 Pamulang, Tangerang, Banten', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (496, 'SAYYED MOHAMMED HAQQANI', 'Lulusan madrasah Haqqaniya di Akora Khattak, Pakistan. Diyakini memiliki hubungan dekat dengan Pemimpin Taliban Mullah Mohammed Omar', 'Orang', 'ILT-055', 'Chaharbagh village, Arghandab District, Kandahar Province, Afghanistan', '00/00/1965', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (497, 'BOUBAKER BEN HABIB BEN AL-HAKIM alias BOUBAKEUR EL-HAKIM alias BOUBAKER EL HAKIM', 'Anggota Islamic State in Iraq and the Levant (ISIL) dan terdaftar sebagai Al-Qaida di Irak', 'Orang', 'ILQ-230', 'Paris', '01/08/1983', 'Perancis,Tunisia', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (498, 'NASIRUDDIN HAQQANI', 'Pemimpin Haqqani Network', 'Orang', 'ILT-054', 'Neka District, Paktika Province, Afghanistan', '00/00/1970', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (499, 'MOHAMMAD SALIM HAQQANI', 'Wakil pimpinan Ezatullah Haqqani Khan Sayyid', 'Orang', 'ILT-053', 'Alingar District, Laghman Province, Afghanistan', '00/00/1966-1967', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (500, 'YASSIN SYWAL alias SALIM YASIN alias MOCHTAR YASIN MAHMUD alias ABDUL HADI YASIN alias MUHAMAD MUBAROK alias MUHAMMAD SYAWAL', '-', 'Orang', 'IDQ-005', 'Indonesia', '00/00/1972', 'Indonesia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (501, 'KHALIL AHMED HAQQANI', 'Anggota senior jaringan Haqqani', 'Orang', 'ILT-052', 'Sarana Village, Garda Saray area, Waza Zadran District, Paktia Province, Afghanistan', '01/01/1966', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (502, 'ABDULLAH ANSHORI alias ABU FATIH alias THOYIB alias IBNU ALIAS TOYIB alias IBNU alias ABU FATHI', '- nomor kartu kependudukan KTP 3372010506560006 a.n. ABDULAH ANSHORI (berdasarkan data Kemendagri);\n- nomor paspor T 710219 dikeluarkan di Sukoharjo (berdasarkan data Dirjen Imigrasi);\n- nomor induk kependudukan 33111205065600001 dikeluarkan di Sukoharjo dengan nama ABDULLAH ANSHORI (berdasarkan data Dirjen Imigrasi);\n- nomor kartu keluarga (KK) 3311121012070014 dikeluarkan di Sukoharjo (berdasarkan data Dirjen Imigrasi);\n', 'Orang', 'IDQ-004', 'Pacitan, Jawa Tengah', '00/00/1958', 'Indonesia', 'Jl. Duwet Raya No. 13 Bulak Indah, Dusun Karang Asem Rt 6/7 Kode Pos 57145 Kel. Karang Asem Kec. Lawean', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (503, 'PARLINDUNGAN SIREGAR alias SIREGAR PARLIN alias SALEH PARLINDUNGAN SIREGAR', '-', 'Orang', 'IDQ-003', 'Indonesia', '25/04/1967', 'Indonesia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (504, 'JALALUDDIN HAQQANI', 'Pemimpin Taliban aktif. Diyakini berada di wilayah perbatasan Afganistan/Pakistan. Kepala Taliban Miram Shah Syura pada tanggal 2008', 'Orang', 'ILT-051', ' Garda Saray area, Waza Zadran, Paktia, Afghanistan', '00/00/1948', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (505, 'DIN MOHAMMAD HANIF alias QARI DIN MOHAMMAD', 'Anggota Taliban provinsi Takhar dan Badakhshan.', 'Orang', 'ILT-050', 'Shakarlab village, Yaftali Pain District, Badakhshan Province, Afghanistan', '00/00/1955', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (506, 'GUL AHMAD HAKIMI', 'Diyakini berada di perbatasan Afganistan/Pakistan', 'Orang', 'ILT-049', 'Logar, Afghanistan', '00/00/1964', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (507, 'RUSTUM HANAFI HABIBULLAH', 'Anggota kelompok Taliban di Nuristan', 'Orang', 'ILT-048', 'Dara Kolum, Do Aab District, Nuristan Province, Afghanistan', '00/00/1963', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (508, 'BAKHT GUL', 'Asisten komunikasi Badruddin Haqqani (meninggal dunia). Koordinator gerakan pemberontak Haqqani, pemberontak asing dan bersenjata di wilayah perbatasan Afganistan/Pakistan', 'Orang', 'ILT-047', 'Aki Village, Zadran District, Paktiya Province, Afghanistan', '00/00/1980', 'Afganistan', 'Miram Shah, North Waziristan, Federally Administered\nTribal Areas, Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (509, 'SOFIANE BEN GOUMO alias SUFYAN BIN QUMU alias ABOU FARES AL LIBI', 'Pemimpin Ansar al Charia Derna', 'Orang', 'ILQ-225', 'Derna, Libya', '26/06/1959', 'Libya', 'Libya', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (510, 'MOHAMMED OMAR GHULAM NABI', 'Diyakini berada di perbatasan Afganistan/Pakistan', 'Orang', 'ILT-046', 'Naw Deh, Deh Rawud, Uruzgan, Afganistan', '00/00/1966', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (511, 'TARAK BEN TAHER BEN FALEH OUNI HARZI', 'warna mata coklat, tinggi badan 172 cm; anggota aktif Al-Qaeda di Irak;', 'Orang', 'ILQ-224', 'Tunis, Tunisia', '03/05/1982', 'Tunisia', '18 Mediterranean Street, Ariana, Tunisia ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (512, 'AREFULLAH AREF GHAZI MOHAMMAD', 'Diyakini berada di perbatasan Afganistan/ Pakistan.', 'Orang', 'ILT-045', 'Lawang (Lawand) village, Gelan District, Ghazni Province, Afghanistan', '00/00/1958', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (513, 'SAMI BEN KHAMIS BEN SALEH ELSSEID', '-', 'Orang', 'ILQ-114', 'Tunisia', '10/02/1968', 'Tunisia', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (514, 'ZULKARNAEN alias ZULKARMAN alias ZULKARMAIN alias ZULKARMIN alias ARIF SUNARNO alias ARIS SUMARSONO alias ustad DAUD ZULKARNAEN', '-', 'Orang', 'IDQ-002', '-', '-', 'Indonesia', 'Masaran, kabupaten Sragen, Jawa Tengah Indonesia;', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (515, 'MOHAMMAD SHAFIQULLAH alias AHMADI alias FATIH KHAN', 'Dilaporkan tewas dalam serangan udara di Shahjoy, Zabul pada awal 2013', 'Orang', 'ILT-044', 'Charmistan, Tirin Kot, Uruzgan, Afganistan', '00/00/1956-1957', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (516, 'ABD EL KADER MAHMOUD MOHAMED EL SAYED alias ES SAYED alias KADER alias ABDEL KHADER MAHMOUD MOHAMED EL SAYED', '-', 'Orang', 'ILQ-113', 'Mesir', '26/12/1962', 'Mesir', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (517, 'FAIZ', '-', 'Orang', 'ILT-043', 'Ghazni Province, Afghanistan', '00/00/1969', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (518, 'MOHAMMAD AZAM ELMI', 'Dikabarkan meninggal pada tahun 2005', 'Orang', 'ILT-042', 'Sayd Karam District, Paktia Province, Afghanistan', '00/00/1968', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (519, 'NIK MOHAMMAD alias DOST MOHAMMAD', 'Pemimpin komisi pendaftaran musuh Taliban pada pertengahan tahun 2013', 'Orang', 'ILT-041', 'Zangi Abad village, Panjwai District, Kandahar Province, Afghanistan', '00/00/1957', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (520, 'ALI BEN TAHER BEN FALEH OUNI HARZI', 'warna mata coklat, tinggi badan 171 cm; anggota Ansar al-Shari’a di Tunisia;', 'Orang', 'ILQ-223', 'Ariana, Tunisia', '09/03/1986', 'Tunisia', '18 Mediterranean Street, Ariana, Tunisia ', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (521, 'DOST MOHAMMAD', 'Terkait dengan Mullah Jalil Haqqani', 'Orang', 'ILT-040', 'Nawi Deh, Daman, Kandahar, Afghanistan', '00/00/1968 dan 1973', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (522, 'MAULANA FAZLULLAH', 'Komandan Tehrik-e Taliban Pakistan sejak 7 November 2013', 'Orang', 'ILQ-222', 'Kuza Bandai, Swat Valley, Khyber Pakhtunkhawa, Pakistan', '00/00/1974', '-', 'Afghanistan/Pakistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (523, 'SHAHABUDDIN DELAWAR', 'Kepala kedutaan besar Taliban di Riyadh Arab Saudi hingga 25 September 1998', 'Orang', 'ILT-039', 'Logar Province, Afghanistan', '00/00/1953 atau 1957', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (524, 'MOHAMMAD RASUL AYYUB', 'Anggota Taliban Quetta Shura; TTL lain: Robat, Spin Boldak, Kandahar, Afganistan antara 1958 s.d. 1963', 'Orang', 'ILT-038', 'Jalalabad, Nangarhar, Afganistan', '00/00/1960-1962', 'Afganistan', 'Afganistan', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (525, 'MOUNIR EL MOTASSADEQ', 'Ditahan di Jerman', 'Orang', 'ILQ-112', 'Maroko', '03/04/1974', 'Maroko', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (526, 'ABDUL BAQI alias BASIR alias AWAL SHAH', 'Diyakini berada di perbatasan Afganistan dan Pakistan', 'Orang', 'ILT-037', 'Jalalabad City, Nangarhar, Afghanistan', '00/00/1960-1962', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (527, 'TARKHAN TAYUMURAZOVICH BATIRASHVILI', 'Pimpinan militer senior ISIL', 'Orang', 'ILQ-218', 'Akhmeta, Birkiani, Georgia', '11/01/1986', 'Georgia', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (528, 'MUHAMMAD TAHER ANWARI', '-', 'Orang', 'ILT-036', 'Zurmat, Paktia, Afganistan', '00/00/1961', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (529, 'REDOUANE EL HABHAB ABDELRAHMAN', '-', 'Orang', 'ILQ-111', 'Maroko ', '20/12/1969', 'Jerman,Maroko', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (530, 'HAMDULLAH alias ALLAH NOOR', 'Diyakini berada di perbatasan Afganistan dan Pakistan', 'Orang', 'ILT-034', 'Distrik Nomor 6, Kandahar, Afghanistan', '00/00/1973', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (531, 'ABDUL HABIB alias ALIZAI', 'Pengatur jaringan pengedaran obat-obatan di provinsi Helmand, Afganistan', 'Orang', 'ILT-033', 'Yatimcha, Musa Qala, Helmand, Afghanistan', '15/10/1963', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (532, 'MOHAMMAD ESHAQ AKHUNZADA alias MOHAMMAD ISHAQ AKHUND', 'Pimpinan Taliban pada Provinsi Ghazni tahun 2008', 'Orang', 'ILT-032', 'Andar, Ghazni, Afganistan', '00/00/1968', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (533, 'OUMAR DIABY', 'Pemimpin kelompok bersenjata terkait dengan Al-Nusra', 'Orang', 'ILQ-215', 'Dakar, Senegal', '05/08/1975', 'Senegal', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (534, 'EHSANULLAH SARFIDA HESAMUDDIN AKHUNDZADA', 'Memberikan dukungan persenjataan dan uang untuk Taliban', 'Orang', 'ILT-031', 'Khatak, Gelan, Ghazni, Afganistan', '00/00/1962 atau 1963', 'Afganistan', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (535, 'KEVIN JORDAN AXEL GUIAVARCH', 'Teroris Prancis yang berangkat ke Suriah dan bergabung dengan ISIL, fasilitator teroris Prancis yang datang ke Siriah, aktivis propaganda menggunakan internet', 'Orang', 'ILQ-214', 'Paris, Prancis ', '12/03/1993', '-', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (536, 'EMILIE EDWIGE KONIG alias EMILIE SAMRA KONIG', 'Teroris Prancis yang berangkat ke Suriah dan bergabung dengan ISIL', 'Orang', 'ILQ-213', 'Ploemeur, Prancis', '09/12/1984', 'Perancis', 'Suriah', 1, '2025-03-03 10:40:40', NULL, 3, NULL);
INSERT INTO `ppatk_dttot` VALUES (537, 'ABD AL-RAHMAN MUHAMMAD MUSTAFA AL-QADULI alias ABD AL-RAHMAN MUHAMMAD MUSTAFA SHAYKHLARI alias UMAR MUHAMMAD KHALIL MUSTAFA alias ABDUL RAHMAN MUHAMMAD ALBAYATI alias TAHIR MUHAMMAD KHALIL MUSTAFA AL-BAYATI alias ALIAZRA RA’AD AHMAD;', 'Anggota senior ISIL', 'Orang', 'ILQ-281', 'Mosul, Irak', '00/00/1959', 'Irak', '-', 1, '2025-03-03 10:40:40', NULL, 3, NULL);

-- ----------------------------
-- Table structure for tr_cb_detail
-- ----------------------------
DROP TABLE IF EXISTS `tr_cb_detail`;
CREATE TABLE `tr_cb_detail`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `header_id` bigint NOT NULL,
  `description` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `amount` decimal(18, 2) NOT NULL DEFAULT 0.00,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` smallint NULL DEFAULT NULL,
  `updatedby` smallint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tr_cb_detail
-- ----------------------------

-- ----------------------------
-- Table structure for tr_cb_header
-- ----------------------------
DROP TABLE IF EXISTS `tr_cb_header`;
CREATE TABLE `tr_cb_header`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `store_id` bigint NOT NULL,
  `cb_id` smallint NOT NULL,
  `cb_pos_id` smallint NOT NULL,
  `tr_date` date NOT NULL,
  `tr_number` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `buysell_id` bigint NULL DEFAULT NULL,
  `buysell_payment_type` smallint NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` smallint NULL DEFAULT NULL,
  `updatedby` smallint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tr_cb_header
-- ----------------------------

-- ----------------------------
-- Table structure for tr_cb_saldo
-- ----------------------------
DROP TABLE IF EXISTS `tr_cb_saldo`;
CREATE TABLE `tr_cb_saldo`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `store_id` smallint NOT NULL,
  `cb_id` smallint NOT NULL,
  `cbs_date` date NOT NULL,
  `cbs_year` decimal(4, 0) NULL DEFAULT NULL,
  `cbs_month` decimal(2, 0) NULL DEFAULT NULL,
  `cbs_in` decimal(18, 2) NULL DEFAULT 0.00,
  `cbs_out` decimal(18, 2) NULL DEFAULT 0.00,
  `cbs_saldo` decimal(18, 2) NULL DEFAULT 0.00,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` smallint NULL DEFAULT NULL,
  `updatedby` smallint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tr_cb_saldo
-- ----------------------------

-- ----------------------------
-- Table structure for tr_detail
-- ----------------------------
DROP TABLE IF EXISTS `tr_detail`;
CREATE TABLE `tr_detail`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `header_id` bigint NOT NULL,
  `currency_id` bigint NOT NULL,
  `nominal` decimal(12, 0) NOT NULL DEFAULT 0,
  `sheet` smallint NOT NULL,
  `price` decimal(12, 2) NOT NULL DEFAULT 0.00,
  `status` smallint NOT NULL,
  `created` datetime NULL DEFAULT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NOT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tr_detail
-- ----------------------------

-- ----------------------------
-- Table structure for tr_header
-- ----------------------------
DROP TABLE IF EXISTS `tr_header`;
CREATE TABLE `tr_header`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `store_id` bigint NOT NULL,
  `tr_id` smallint NOT NULL,
  `tr_date` date NOT NULL,
  `tr_number` varchar(14) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `customer_id` bigint NOT NULL,
  `customer_act_on_id` bigint NULL DEFAULT NULL,
  `customer_source` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `customer_purpose` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `status` smallint NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  `cashierby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tr_header
-- ----------------------------

-- ----------------------------
-- Table structure for tr_log_api
-- ----------------------------
DROP TABLE IF EXISTS `tr_log_api`;
CREATE TABLE `tr_log_api`  (
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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tr_log_api
-- ----------------------------

-- ----------------------------
-- Table structure for tr_payment
-- ----------------------------
DROP TABLE IF EXISTS `tr_payment`;
CREATE TABLE `tr_payment`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `header_id` bigint NOT NULL,
  `payment_type` smallint NOT NULL,
  `cb_id` bigint NOT NULL,
  `cb_pos_id` bigint NOT NULL,
  `amount` decimal(18, 2) NOT NULL DEFAULT 0.00,
  `status` smallint NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NULL DEFAULT NULL,
  `createdby` bigint NOT NULL,
  `updatedby` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tr_payment
-- ----------------------------

-- ----------------------------
-- Table structure for tr_stock
-- ----------------------------
DROP TABLE IF EXISTS `tr_stock`;
CREATE TABLE `tr_stock`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `currency_id` bigint NOT NULL,
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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tr_stock
-- ----------------------------

-- ----------------------------
-- Table structure for tr_stock_price
-- ----------------------------
DROP TABLE IF EXISTS `tr_stock_price`;
CREATE TABLE `tr_stock_price`  (
  `id` int NOT NULL,
  `store_id` bigint NOT NULL,
  `stock_date` date NOT NULL,
  `stock_year` int NULL DEFAULT NULL,
  `stock_month` int NULL DEFAULT NULL,
  `currency_id` bigint NOT NULL,
  `buy_tr_header_id` bigint NULL DEFAULT NULL,
  `buy_amount` decimal(12, 0) NULL DEFAULT 0,
  `buy_price` decimal(12, 0) NULL DEFAULT 0,
  `buy_total` decimal(18, 0) NULL DEFAULT 0,
  `sell_tr_header_id` bigint NULL DEFAULT NULL,
  `sell_amount` decimal(12, 0) NULL DEFAULT 0,
  `sell_price` decimal(12, 2) NULL DEFAULT 0.00,
  `sell_total` decimal(18, 2) NULL DEFAULT 0.00,
  `sell_average_total` decimal(18, 2) NULL DEFAULT 0.00,
  `stock_last_amount` decimal(12, 2) NULL DEFAULT 0.00,
  `stock_last_price` decimal(12, 2) NULL DEFAULT 0.00,
  `stock_last_total` decimal(18, 2) NULL DEFAULT 0.00,
  `profit` decimal(18, 2) NULL DEFAULT 0.00,
  `created` datetime NULL DEFAULT NULL,
  `createdby` bigint NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tr_stock_price
-- ----------------------------

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
-- View structure for v_auth_store_object
-- ----------------------------
DROP VIEW IF EXISTS `v_auth_store_object`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_auth_store_object` AS select `t`.`id` AS `user_id`,`t`.`fullname` AS `fullname`,`s`.`id` AS `store_id`,`s`.`store_name` AS `store_name`,group_concat(`s`.`store_address` separator ',') AS `store_address` from (`auth_users` `t` join `m_store` `s` on((0 <> find_in_set(`s`.`id`,`t`.`store_id_multiple`)))) group by `t`.`id`,`s`.`id`;

-- ----------------------------
-- View structure for v_auth_users
-- ----------------------------
DROP VIEW IF EXISTS `v_auth_users`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_auth_users` AS select `auth_users`.`id` AS `id`,`auth_users`.`fullname` AS `fullname`,`auth_users`.`username` AS `username`,`auth_users`.`password` AS `password`,`auth_users`.`usergroup_id` AS `usergroup_id`,`auth_usergroup`.`usergroupname` AS `usergroupname`,`auth_users`.`userlevel_id` AS `userlevel_id`,`auth_userlevel`.`userlevelname` AS `userlevelname`,`auth_users`.`store_id` AS `store_id`,`m_store`.`store_name` AS `store_name`,`m_store`.`store_address` AS `store_address`,`m_store`.`api_method` AS `api_method`,`m_store`.`api_angkasapura` AS `api_angkasapura`,`m_store`.`api_username` AS `api_username`,`m_store`.`api_password` AS `api_password`,(select `m_store`.`ap_tr_id` from `m_store` where ((`m_store`.`id` = `auth_users`.`store_id_multiple`) and (`auth_users`.`usergroup_id` = 6)) limit 1) AS `ap_tr_id`,`auth_users`.`store_id_multiple` AS `store_id_multiple`,(select concat('[',group_concat('{"id":"',`v_auth_store_object`.`store_id`,'","store_address":"',`v_auth_store_object`.`store_address`,'"}' separator ','),']') from `v_auth_store_object` where (`v_auth_store_object`.`user_id` = `auth_users`.`id`)) AS `store_id_multiple_object`,`auth_users`.`email` AS `email`,`auth_users`.`celluler` AS `celluler`,`auth_users`.`chgpass` AS `chgpass`,`auth_users`.`status` AS `status`,`auth_users`.`created` AS `created`,`auth_users`.`updated` AS `updated`,`auth_users`.`createdby` AS `createdby`,`auth_users`.`updatedby` AS `updatedby`,`auth_users`.`lastlog` AS `lastlog` from (((`auth_users` left join `auth_usergroup` on((`auth_users`.`usergroup_id` = `auth_usergroup`.`id`))) left join `auth_userlevel` on((`auth_users`.`userlevel_id` = `auth_userlevel`.`id`))) left join `m_store` on((`auth_users`.`store_id` = `m_store`.`id`)));

-- ----------------------------
-- View structure for v_m_cb
-- ----------------------------
DROP VIEW IF EXISTS `v_m_cb`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_cb` AS select `m_cb`.`id` AS `id`,`m_cb`.`store_id` AS `store_id`,`m_store`.`store_address` AS `store_address`,`m_cb`.`tr_id` AS `tr_id`,`m_transaction`.`transaction_name` AS `transaction_name`,`m_cb`.`payment_type_id` AS `payment_type_id`,`m_payment_type`.`payment_type_name` AS `payment_type_name`,`m_cb`.`cb_code` AS `cb_code`,`m_cb`.`cb_name` AS `cb_name`,`m_cb`.`description` AS `description`,`m_cb`.`status` AS `status`,`m_cb`.`created` AS `created`,`m_cb`.`updated` AS `updated`,`m_cb`.`createdby` AS `createdby`,`m_cb`.`updatedby` AS `updatedby` from (((`m_cb` join `m_store` on((`m_cb`.`store_id` = `m_store`.`id`))) join `m_transaction` on((`m_cb`.`tr_id` = `m_transaction`.`id`))) join `m_payment_type` on((`m_cb`.`payment_type_id` = `m_payment_type`.`id`)));

-- ----------------------------
-- View structure for v_m_cb_pos
-- ----------------------------
DROP VIEW IF EXISTS `v_m_cb_pos`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_cb_pos` AS select `m_cb_pos`.`id` AS `id`,`m_store`.`store_address` AS `store_address`,`m_transaction`.`transaction_name` AS `transaction_name`,`m_cb_pos`.`cb_id` AS `cb_id`,`m_cb`.`cb_name` AS `cb_name`,`m_cb_pos`.`cb_pos_code` AS `cb_pos_code`,`m_cb_pos`.`cb_pos_name` AS `cb_pos_name`,`m_cb_pos`.`cb_pos_in_out` AS `cb_pos_in_out`,`m_cb_pos`.`buysell_tr_id` AS `buysell_tr_id`,`m_transaction2`.`transaction_name` AS `buysell_tr_id_name`,`m_cb_pos`.`status` AS `status`,`m_cb_pos`.`created` AS `created`,`m_cb_pos`.`updated` AS `updated`,`m_cb_pos`.`createdby` AS `createdby`,`m_cb_pos`.`updatedby` AS `updatedby` from ((((`m_cb_pos` join `m_cb` on((`m_cb_pos`.`cb_id` = `m_cb`.`id`))) join `m_store` on((`m_cb`.`store_id` = `m_store`.`id`))) join `m_transaction` on((`m_cb`.`tr_id` = `m_transaction`.`id`))) left join `m_transaction` `m_transaction2` on((`m_cb_pos`.`buysell_tr_id` = `m_transaction2`.`id`)));

-- ----------------------------
-- View structure for v_m_customer
-- ----------------------------
DROP VIEW IF EXISTS `v_m_customer`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_customer` AS select `m_customer`.`id` AS `id`,`m_customer`.`customer_code` AS `customer_code`,`m_customer`.`customer_name` AS `customer_name`,`m_customer`.`customer_nick_name` AS `customer_nick_name`,`m_customer`.`customer_handphone` AS `customer_handphone`,`m_customer`.`customer_phone` AS `customer_phone`,`m_customer`.`customer_address` AS `customer_address`,`m_customer`.`rt_rw` AS `rt_rw`,`m_customer`.`village` AS `village`,`m_customer`.`sub_district` AS `sub_district`,`m_customer`.`city` AS `city`,`m_customer`.`placeofbirth` AS `placeofbirth`,`m_customer`.`bornday` AS `bornday`,`m_customer`.`gender_id` AS `gender_id`,(select (case when (`m_customer`.`gender_id` = 1) then 'Laki - Laki' when (`m_customer`.`gender_id` = 2) then 'Perempuan' else NULL end)) AS `gender_name`,`m_customer`.`job_id` AS `job_id`,`m_customer_job`.`customer_job_name` AS `customer_job_name`,`m_customer`.`customer_type_id` AS `customer_type_id`,`m_customer_type`.`customer_type_name` AS `customer_type_name`,`m_customer`.`customer_data_id` AS `customer_data_id`,`m_customer_data`.`customer_data_name` AS `customer_data_name`,`m_customer`.`customer_data_number` AS `customer_data_number`,`m_customer`.`nationality_id` AS `nationality_id`,`m_nationality`.`nationality_code` AS `nationality_code`,`m_nationality`.`nationality_desc` AS `nationality_desc`,`m_customer`.`npwp_number` AS `npwp_number`,`m_customer`.`npwp_name` AS `npwp_name`,`m_customer`.`customerprofil` AS `customerprofil`,`m_customer`.`permit_number` AS `permit_number`,`m_customer`.`permit_date_start` AS `permit_date_start`,`m_customer`.`permit_date_end` AS `permit_date_end`,`m_customer`.`status` AS `status`,`m_customer`.`created` AS `created`,`m_customer`.`updated` AS `updated`,`m_customer`.`createdby` AS `createdby`,`m_customer`.`updatedby` AS `updatedby`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name` from ((((((`m_customer` left join `auth_users` `usr1` on((`m_customer`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`m_customer`.`updatedby` = `usr2`.`id`))) left join `m_customer_type` on((`m_customer`.`customer_type_id` = `m_customer_type`.`id`))) left join `m_customer_data` on((`m_customer`.`customer_data_id` = `m_customer_data`.`id`))) left join `m_nationality` on((`m_customer`.`nationality_id` = `m_nationality`.`id`))) left join `m_customer_job` on((`m_customer`.`job_id` = `m_customer_job`.`id`)));

-- ----------------------------
-- View structure for v_m_exchange_rate
-- ----------------------------
DROP VIEW IF EXISTS `v_m_exchange_rate`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_exchange_rate` AS select `m_exchange_rate`.`id` AS `id`,`m_exchange_rate`.`store_id` AS `store_id`,`m_exchange_rate`.`currency_id` AS `currency_id`,`m_currency`.`currency_code` AS `currency_code`,`m_currency`.`currency_name` AS `currency_name`,`m_exchange_rate`.`exchange_rate_date` AS `exchange_rate_date`,`m_exchange_rate`.`exchange_rate_buy` AS `exchange_rate_buy`,`m_exchange_rate`.`difference_buy` AS `difference_buy`,`m_exchange_rate`.`exchange_rate_sell` AS `exchange_rate_sell`,`m_exchange_rate`.`difference_sell` AS `difference_sell`,`m_exchange_rate`.`price_buy_bot` AS `price_buy_bot`,`m_exchange_rate`.`price_buy_top` AS `price_buy_top`,`m_exchange_rate`.`price_sell_bot` AS `price_sell_bot`,`m_exchange_rate`.`price_sell_top` AS `price_sell_top`,`m_store`.`store_name` AS `store_name`,`m_store`.`store_address` AS `store_address`,`m_exchange_rate`.`source_rate` AS `source_rate`,`m_exchange_rate`.`status` AS `status`,`m_exchange_rate`.`created` AS `created`,`m_exchange_rate`.`updated` AS `updated`,`m_exchange_rate`.`createdby` AS `createdby`,`usr1`.`fullname` AS `createdby_name`,`m_exchange_rate`.`updatedby` AS `updatedby`,`usr2`.`fullname` AS `updatedby_name` from ((((`m_exchange_rate` left join `m_currency` on((`m_exchange_rate`.`currency_id` = `m_currency`.`id`))) left join `m_store` on((`m_exchange_rate`.`store_id` = `m_store`.`id`))) left join `auth_users` `usr1` on((`m_exchange_rate`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`m_exchange_rate`.`updatedby` = `usr2`.`id`)));

-- ----------------------------
-- View structure for v_m_store1
-- ----------------------------
DROP VIEW IF EXISTS `v_m_store1`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_store1` AS select `t`.`id` AS `store_id`,`t`.`store_address` AS `store_address`,`s`.`id` AS `tr_id`,group_concat(`s`.`transaction_name` separator ',') AS `tr_name` from (`m_store` `t` join `m_transaction` `s` on((0 <> find_in_set(`s`.`id`,`t`.`ap_tr_id`)))) group by `t`.`id`,`s`.`id`;

-- ----------------------------
-- View structure for v_m_store2
-- ----------------------------
DROP VIEW IF EXISTS `v_m_store2`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_store2` AS select `m_store`.`id` AS `id`,`m_store`.`store_name` AS `store_name`,`m_store`.`store_address` AS `store_address`,`m_store`.`store_email` AS `store_email`,`m_store`.`store_permit_number` AS `store_permit_number`,`m_store`.`store_id_pjk` AS `store_id_pjk`,`m_store`.`api_method` AS `api_method`,`m_store`.`api_angkasapura` AS `api_angkasapura`,`m_store`.`api_username` AS `api_username`,`m_store`.`api_password` AS `api_password`,`m_store`.`api_store_id` AS `api_store_id`,`m_store`.`api_store_name` AS `api_store_name`,`m_store`.`ap_tr_id` AS `ap_tr_id`,(select concat('[',group_concat('{"id":"',`v_m_store1`.`tr_id`,'","tr_name":"',`v_m_store1`.`tr_name`,'"}' separator ','),']') from `v_m_store1` where ((`v_m_store1`.`store_id` = `m_store`.`id`) and (`v_m_store1`.`tr_id` = `m_store`.`ap_tr_id`)) group by `v_m_store1`.`store_id`,`v_m_store1`.`tr_id`,`v_m_store1`.`tr_name`) AS `tr_id_object`,`m_store`.`user_limits` AS `user_limits`,`m_store`.`status` AS `STATUS`,`m_store`.`created` AS `created`,`m_store`.`updated` AS `updated`,`m_store`.`createdby` AS `createdby`,`m_store`.`updatedby` AS `updatedby`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name` from ((`m_store` left join `auth_users` `usr1` on((`m_store`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`m_store`.`updatedby` = `usr2`.`id`)));

-- ----------------------------
-- View structure for v_m_transaction_date
-- ----------------------------
DROP VIEW IF EXISTS `v_m_transaction_date`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_m_transaction_date` AS select `m_transaction_date`.`id` AS `id`,`m_transaction_date`.`store_id` AS `store_id`,`m_transaction_date`.`tr_id` AS `tr_id`,`m_transaction_date`.`tr_date` AS `tr_date`,`m_transaction_date`.`status` AS `status`,`m_transaction_date`.`created` AS `created`,`m_transaction_date`.`updated` AS `updated`,`m_store`.`store_name` AS `store_name`,`m_store`.`store_address` AS `store_address`,`m_transaction`.`transaction_name` AS `tr_name`,`m_transaction`.`description` AS `description` from ((`m_transaction_date` join `m_store` on((`m_transaction_date`.`store_id` = `m_store`.`id`))) join `m_transaction` on((`m_transaction_date`.`tr_id` = `m_transaction`.`id`)));

-- ----------------------------
-- View structure for v_tr_cb_detail
-- ----------------------------
DROP VIEW IF EXISTS `v_tr_cb_detail`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tr_cb_detail` AS select `tr_cb_detail`.`id` AS `id`,`tr_cb_detail`.`header_id` AS `header_id`,`tr_cb_header`.`store_id` AS `store_id`,`tr_cb_header`.`tr_number` AS `tr_number`,`tr_cb_header`.`tr_date` AS `tr_date`,`tr_cb_header`.`cb_id` AS `cb_id`,`m_cb`.`cb_name` AS `cb_name`,`tr_cb_header`.`cb_pos_id` AS `cb_pos_id`,`m_cb_pos`.`cb_pos_name` AS `cb_pos_name`,`m_cb_pos`.`cb_pos_in_out` AS `cb_pos_in_out`,`tr_cb_detail`.`description` AS `description`,(select (case when (`m_cb_pos`.`cb_pos_in_out` = 'I') then `tr_cb_detail`.`amount` end)) AS `amount_in`,(select (case when (`m_cb_pos`.`cb_pos_in_out` = 'O') then `tr_cb_detail`.`amount` end)) AS `amount_out`,`tr_cb_detail`.`status` AS `status`,`tr_cb_detail`.`created` AS `created`,`tr_cb_detail`.`updated` AS `updated`,`tr_cb_detail`.`createdby` AS `createdby`,`tr_cb_detail`.`updatedby` AS `updatedby` from (((`tr_cb_detail` join `tr_cb_header` on((`tr_cb_detail`.`header_id` = `tr_cb_header`.`id`))) join `m_cb` on((`tr_cb_header`.`cb_id` = `m_cb`.`id`))) join `m_cb_pos` on((`tr_cb_header`.`cb_pos_id` = `m_cb_pos`.`id`)));

-- ----------------------------
-- View structure for v_tr_cb_header
-- ----------------------------
DROP VIEW IF EXISTS `v_tr_cb_header`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tr_cb_header` AS select `tr_cb_header`.`id` AS `id`,`tr_cb_header`.`store_id` AS `store_id`,`tr_cb_header`.`cb_id` AS `cb_id`,`tr_cb_header`.`cb_pos_id` AS `cb_pos_id`,`tr_cb_header`.`tr_date` AS `tr_date`,`tr_cb_header`.`tr_number` AS `tr_number`,(select (case when (`m_cb_pos`.`cb_pos_in_out` = 'I') then sum(`tr_cb_detail`.`amount`) end) from `tr_cb_detail` where (`tr_cb_detail`.`header_id` = `tr_cb_header`.`id`)) AS `total_in`,(select (case when (`m_cb_pos`.`cb_pos_in_out` = 'O') then sum(`tr_cb_detail`.`amount`) end) from `tr_cb_detail` where (`tr_cb_detail`.`header_id` = `tr_cb_header`.`id`)) AS `total_out`,`tr_cb_header`.`buysell_id` AS `buysell_id`,`tr_cb_header`.`buysell_payment_type` AS `buysell_payment_type`,`tr_cb_header`.`description` AS `description`,`tr_cb_header`.`status` AS `status`,`tr_cb_header`.`created` AS `created`,`tr_cb_header`.`updated` AS `updated`,`tr_cb_header`.`updatedby` AS `updatedby`,`tr_cb_header`.`createdby` AS `createdby`,`m_store`.`store_address` AS `store_address`,`m_cb`.`tr_id` AS `tr_id`,`m_cb`.`cb_code` AS `cb_code`,`m_cb`.`cb_name` AS `cb_name`,`m_cb_pos`.`cb_pos_code` AS `cb_pos_code`,`m_cb_pos`.`cb_pos_name` AS `cb_pos_name`,(select (case when (`tr_cb_header`.`status` = 2) then 'Canceled' when (`tr_cb_header`.`status` = 3) then 'Confirm' end)) AS `status_name`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name` from (((((`tr_cb_header` join `m_store` on((`tr_cb_header`.`store_id` = `m_store`.`id`))) join `m_cb` on((`tr_cb_header`.`cb_id` = `m_cb`.`id`))) join `m_cb_pos` on((`tr_cb_header`.`cb_pos_id` = `m_cb_pos`.`id`))) left join `auth_users` `usr1` on((`tr_cb_header`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`tr_cb_header`.`updatedby` = `usr2`.`id`)));

-- ----------------------------
-- View structure for v_tr_cb_saldo
-- ----------------------------
DROP VIEW IF EXISTS `v_tr_cb_saldo`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tr_cb_saldo` AS select `tr_cb_saldo`.`id` AS `id`,`tr_cb_saldo`.`store_id` AS `store_id`,`tr_cb_saldo`.`cb_id` AS `cb_id`,`tr_cb_saldo`.`cbs_date` AS `cbs_date`,`tr_cb_saldo`.`cbs_year` AS `cbs_year`,`tr_cb_saldo`.`cbs_month` AS `cbs_month`,`tr_cb_saldo`.`cbs_in` AS `cbs_in`,`tr_cb_saldo`.`cbs_out` AS `cbs_out`,`tr_cb_saldo`.`cbs_saldo` AS `cbs_saldo`,`tr_cb_saldo`.`status` AS `status`,`tr_cb_saldo`.`created` AS `created`,`tr_cb_saldo`.`updated` AS `updated`,`tr_cb_saldo`.`createdby` AS `createdby`,`tr_cb_saldo`.`updatedby` AS `updatedby`,`m_cb`.`cb_code` AS `cb_code`,`m_cb`.`cb_name` AS `cb_name`,`m_cb`.`description` AS `description`,`m_store`.`store_name` AS `store_name`,`m_store`.`store_address` AS `store_address` from ((`tr_cb_saldo` join `m_cb` on((`tr_cb_saldo`.`cb_id` = `m_cb`.`id`))) join `m_store` on((`tr_cb_saldo`.`store_id` = `m_store`.`id`)));

-- ----------------------------
-- View structure for v_tr_detail
-- ----------------------------
DROP VIEW IF EXISTS `v_tr_detail`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tr_detail` AS select `tr_detail`.`id` AS `id`,`tr_detail`.`header_id` AS `header_id`,`tr_detail`.`currency_id` AS `currency_id`,`tr_detail`.`nominal` AS `nominal`,`tr_detail`.`sheet` AS `sheet`,`tr_detail`.`price` AS `price`,((`tr_detail`.`nominal` * `tr_detail`.`sheet`) * `tr_detail`.`price`) AS `subtotal`,`tr_detail`.`status` AS `status`,`tr_detail`.`created` AS `created`,`tr_detail`.`updated` AS `updated`,`tr_detail`.`createdby` AS `createdby`,`tr_detail`.`updatedby` AS `updatedby`,`tr_header`.`store_id` AS `store_id`,`tr_header`.`tr_id` AS `tr_id`,`tr_header`.`tr_date` AS `tr_date`,`tr_header`.`customer_id` AS `customer_id`,`m_currency`.`currency_code` AS `currency_code`,`m_currency`.`currency_name` AS `currency_name` from ((`tr_detail` join `tr_header` on((`tr_detail`.`header_id` = `tr_header`.`id`))) join `m_currency` on((`tr_detail`.`currency_id` = `m_currency`.`id`)));

-- ----------------------------
-- View structure for v_tr_header
-- ----------------------------
DROP VIEW IF EXISTS `v_tr_header`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tr_header` AS select `tr_header`.`id` AS `id`,`tr_header`.`store_id` AS `store_id`,`tr_header`.`tr_id` AS `tr_id`,`tr_header`.`tr_date` AS `tr_date`,`tr_header`.`tr_number` AS `tr_number`,`tr_header`.`customer_id` AS `customer_id`,`tr_header`.`customer_act_on_id` AS `customer_act_on_id`,`tr_header`.`customer_source` AS `customer_source`,`tr_header`.`customer_purpose` AS `customer_purpose`,`tr_header`.`description` AS `description`,`tr_header`.`status` AS `status`,`tr_header`.`created` AS `created`,`tr_header`.`updated` AS `updated`,`tr_header`.`createdby` AS `createdby`,`tr_header`.`updatedby` AS `updatedby`,`tr_header`.`cashierby` AS `cashierby`,`m_store`.`store_address` AS `store_address`,`m_store`.`api_method` AS `api_method`,`m_customer`.`customer_code` AS `customer_code`,`m_customer`.`customer_name` AS `customer_name`,`m_customer`.`customer_address` AS `customer_address`,`m_customer`.`customer_type_id` AS `customer_type_id`,`m_customer`.`job_id` AS `customer_job_id`,`m_customer`.`nationality_id` AS `customer_nationality_id`,`m_customer`.`customer_data_id` AS `customer_data_id`,`m_customer`.`permit_number` AS `permit_number`,`m_customer`.`permit_date_start` AS `permit_date_start`,`m_customer`.`permit_date_end` AS `permit_date_end`,`m_customer_act_on`.`customer_act_on` AS `customer_act_on`,`m_transaction`.`transaction_name` AS `tr_name`,`usr1`.`fullname` AS `createdby_name`,`usr2`.`fullname` AS `updatedby_name`,`usr3`.`fullname` AS `cashierby_name`,(select (case when (`tr_header`.`status` = 2) then 'Canceled' when (`tr_header`.`status` = 3) then 'Confirm' when (`tr_header`.`status` = 4) then 'Paid off' when (`tr_header`.`status` = 9) then 'Integrasi System ECSys' else 'Task' end)) AS `status_name`,(select sum(((`tr_detail`.`nominal` * `tr_detail`.`sheet`) * `tr_detail`.`price`)) from `tr_detail` where (`tr_detail`.`header_id` = `tr_header`.`id`)) AS `total` from (((((((`tr_header` join `m_store` on((`tr_header`.`store_id` = `m_store`.`id`))) left join `m_transaction` on((`tr_header`.`tr_id` = `m_transaction`.`id`))) left join `m_customer` on((`tr_header`.`customer_id` = `m_customer`.`id`))) left join `m_customer_act_on` on((`tr_header`.`customer_act_on_id` = `m_customer_act_on`.`id`))) left join `auth_users` `usr1` on((`tr_header`.`createdby` = `usr1`.`id`))) left join `auth_users` `usr2` on((`tr_header`.`updatedby` = `usr2`.`id`))) left join `auth_users` `usr3` on((`tr_header`.`cashierby` = `usr3`.`id`)));

-- ----------------------------
-- View structure for v_tr_payment
-- ----------------------------
DROP VIEW IF EXISTS `v_tr_payment`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tr_payment` AS select `tr_payment`.`id` AS `id`,`tr_payment`.`header_id` AS `header_id`,`tr_payment`.`payment_type` AS `payment_type`,`tr_payment`.`cb_id` AS `cb_id`,`tr_payment`.`cb_pos_id` AS `cb_pos_id`,`tr_payment`.`amount` AS `amount`,`tr_payment`.`status` AS `payment_status`,`tr_payment`.`created` AS `created`,`tr_payment`.`updated` AS `updated`,`tr_payment`.`createdby` AS `createdby`,`tr_payment`.`updatedby` AS `updatedby`,`m_payment_type`.`payment_type_name` AS `payment_type_name`,`m_cb`.`cb_code` AS `cb_code`,`m_cb`.`cb_name` AS `cb_name`,`m_cb_pos`.`cb_pos_code` AS `cb_pos_code`,`m_cb_pos`.`cb_pos_name` AS `cb_pos_name`,`m_cb_pos`.`cb_pos_in_out` AS `cb_pos_in_out`,`tr_header`.`store_id` AS `store_id`,`tr_header`.`tr_id` AS `tr_id`,`tr_header`.`tr_date` AS `tr_date`,`tr_header`.`status` AS `tr_header_status`,`tr_header`.`tr_number` AS `tr_number`,(select `m_customer`.`customer_name` from `m_customer` where (`m_customer`.`id` = `tr_header`.`customer_id`) limit 1) AS `customer_name` from ((((`tr_payment` join `m_payment_type` on((`tr_payment`.`payment_type` = `m_payment_type`.`id`))) join `m_cb` on((`tr_payment`.`cb_id` = `m_cb`.`id`))) join `m_cb_pos` on((`tr_payment`.`cb_pos_id` = `m_cb_pos`.`id`))) join `tr_header` on((`tr_payment`.`header_id` = `tr_header`.`id`))) where (`tr_header`.`status` in (3,4));

-- ----------------------------
-- View structure for v_tr_stock_alocation
-- ----------------------------
DROP VIEW IF EXISTS `v_tr_stock_alocation`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tr_stock_alocation` AS select `tr_header`.`store_id` AS `store_id`,year(`tr_header`.`tr_date`) AS `stock_year`,month(`tr_header`.`tr_date`) AS `stock_month`,`tr_detail`.`currency_id` AS `currency_id`,`tr_detail`.`nominal` AS `nominal`,sum(if(((`tr_header`.`tr_id` = 1) and (`tr_detail`.`status` in (3,9))),`tr_detail`.`sheet`,0)) AS `buy_sheet`,sum(if(((`tr_header`.`tr_id` = 2) and (`tr_detail`.`status` in (3,9))),`tr_detail`.`sheet`,0)) AS `sell_sheet`,sum(if(((`tr_header`.`tr_id` = 2) and (`tr_detail`.`status` = 1)),`tr_detail`.`sheet`,0)) AS `sell_alocation_sheet` from (`tr_detail` join `tr_header` on((`tr_detail`.`header_id` = `tr_header`.`id`))) group by `tr_header`.`store_id`,year(`tr_header`.`tr_date`),month(`tr_header`.`tr_date`),`tr_detail`.`currency_id`,`tr_detail`.`nominal`;

-- ----------------------------
-- View structure for v_tr_stock_balance_price
-- ----------------------------
DROP VIEW IF EXISTS `v_tr_stock_balance_price`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tr_stock_balance_price` AS select `tr_stock_price`.`id` AS `id`,`tr_stock_price`.`store_id` AS `store_id`,`tr_stock_price`.`currency_id` AS `currency_id`,`tr_stock_price`.`stock_date` AS `stock_date`,`tr_stock_price`.`stock_year` AS `stock_year`,`tr_stock_price`.`stock_month` AS `stock_month`,`tr_stock_price`.`buy_tr_header_id` AS `buy_tr_header_id`,`tr_header_buy`.`tr_number` AS `buy_tr_number`,`tr_stock_price`.`buy_amount` AS `buy_amount`,`tr_stock_price`.`buy_price` AS `buy_price`,`tr_stock_price`.`buy_total` AS `buy_total`,`tr_stock_price`.`sell_tr_header_id` AS `sell_tr_header_id`,`tr_header_sell`.`tr_number` AS `sell_tr_number`,`tr_stock_price`.`sell_amount` AS `sell_amount`,`tr_stock_price`.`sell_price` AS `sell_price`,`tr_stock_price`.`sell_total` AS `sell_total`,`tr_stock_price`.`sell_average_total` AS `sell_average_total`,`tr_stock_price`.`stock_last_amount` AS `stock_last_amount`,`tr_stock_price`.`stock_last_price` AS `stock_last_price`,`tr_stock_price`.`stock_last_total` AS `stock_last_total`,`tr_stock_price`.`profit` AS `profit`,`tr_stock_price`.`created` AS `created`,`tr_stock_price`.`createdby` AS `createdby`,`m_store`.`store_name` AS `store_name`,`m_store`.`store_address` AS `store_address`,`m_currency`.`currency_code` AS `currency_code`,`m_currency`.`currency_name` AS `currency_name` from ((((`tr_stock_price` left join `tr_header` `tr_header_buy` on((`tr_stock_price`.`buy_tr_header_id` = `tr_header_buy`.`id`))) left join `tr_header` `tr_header_sell` on((`tr_stock_price`.`sell_tr_header_id` = `tr_header_sell`.`id`))) join `m_store` on((`tr_stock_price`.`store_id` = `m_store`.`id`))) join `m_currency` on((`tr_stock_price`.`currency_id` = `m_currency`.`id`)));

-- ----------------------------
-- View structure for v_tr_stock_balance_sheet
-- ----------------------------
DROP VIEW IF EXISTS `v_tr_stock_balance_sheet`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tr_stock_balance_sheet` AS select `tr_stock`.`id` AS `id`,`tr_stock`.`currency_id` AS `currency_id`,`m_currency`.`currency_code` AS `currency_code`,`m_currency`.`currency_name` AS `currency_name`,`tr_stock`.`stock_year` AS `stock_year`,`tr_stock`.`stock_month` AS `stock_month`,`tr_stock`.`nominal` AS `nominal`,`tr_stock`.`beginning_stock_sheet` AS `beginning_stock_sheet`,if((`v_tr_stock_alocation`.`buy_sheet` is null),0,`v_tr_stock_alocation`.`buy_sheet`) AS `buy_sheet`,if((`v_tr_stock_alocation`.`sell_sheet` is null),0,`v_tr_stock_alocation`.`sell_sheet`) AS `sell_sheet`,if((`v_tr_stock_alocation`.`sell_alocation_sheet` is null),0,`v_tr_stock_alocation`.`sell_alocation_sheet`) AS `sell_alocation_sheet`,(((if((`tr_stock`.`beginning_stock_sheet` is null),0,sum(`tr_stock`.`beginning_stock_sheet`)) + if((`v_tr_stock_alocation`.`buy_sheet` is null),0,`v_tr_stock_alocation`.`buy_sheet`)) - if((`v_tr_stock_alocation`.`sell_sheet` is null),0,`v_tr_stock_alocation`.`sell_sheet`)) - if((`v_tr_stock_alocation`.`sell_alocation_sheet` is null),0,`v_tr_stock_alocation`.`sell_alocation_sheet`)) AS `last_stock_sheet`,`tr_stock`.`store_id` AS `store_id`,`m_store`.`store_name` AS `store_name`,`m_store`.`store_address` AS `store_address`,`tr_stock`.`status` AS `status`,`tr_stock`.`created` AS `created`,`tr_stock`.`createdby` AS `createdby`,`tr_stock`.`updated` AS `updated`,`tr_stock`.`updatedby` AS `updatedby` from (((`tr_stock` join `m_currency` on((`m_currency`.`id` = `tr_stock`.`currency_id`))) left join `v_tr_stock_alocation` on(((`tr_stock`.`store_id` = `v_tr_stock_alocation`.`store_id`) and (`tr_stock`.`currency_id` = `v_tr_stock_alocation`.`currency_id`) and (`tr_stock`.`nominal` = `v_tr_stock_alocation`.`nominal`) and (`tr_stock`.`stock_year` = `v_tr_stock_alocation`.`stock_year`) and (`tr_stock`.`stock_month` = `v_tr_stock_alocation`.`stock_month`)))) left join `m_store` on((`m_store`.`id` = `tr_stock`.`store_id`))) group by `m_currency`.`currency_code`,`m_currency`.`currency_name`,`tr_stock`.`currency_id`,`tr_stock`.`store_id`,`tr_stock`.`stock_year`,`tr_stock`.`stock_month`,`tr_stock`.`nominal`;

-- ----------------------------
-- View structure for v_tr_stock_balance_total
-- ----------------------------
DROP VIEW IF EXISTS `v_tr_stock_balance_total`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tr_stock_balance_total` AS select `tr_stock`.`id` AS `id`,`tr_stock`.`currency_id` AS `currency_id`,`m_currency`.`currency_code` AS `currency_code`,`m_currency`.`currency_name` AS `currency_name`,`tr_stock`.`stock_year` AS `stock_year`,`tr_stock`.`stock_month` AS `stock_month`,sum(`tr_stock`.`beginning_stock_sheet`) AS `beginning_stock`,sum(if((`v_tr_stock_alocation`.`buy_sheet` is null),0,`v_tr_stock_alocation`.`buy_sheet`)) AS `buy`,sum(if((`v_tr_stock_alocation`.`sell_sheet` is null),0,`v_tr_stock_alocation`.`sell_sheet`)) AS `sell`,sum(if((`v_tr_stock_alocation`.`sell_alocation_sheet` is null),0,`v_tr_stock_alocation`.`sell_alocation_sheet`)) AS `sell_alocation`,(((if((`tr_stock`.`beginning_stock_sheet` is null),0,sum(`tr_stock`.`beginning_stock_sheet`)) + if((`v_tr_stock_alocation`.`buy_sheet` is null),0,sum(`v_tr_stock_alocation`.`buy_sheet`))) - if((`v_tr_stock_alocation`.`sell_sheet` is null),0,sum(`v_tr_stock_alocation`.`sell_sheet`))) - if((`v_tr_stock_alocation`.`sell_alocation_sheet` is null),0,sum(`v_tr_stock_alocation`.`sell_alocation_sheet`))) AS `last_stock`,`tr_stock`.`store_id` AS `store_id`,`m_store`.`store_name` AS `store_name`,`m_store`.`store_address` AS `store_address`,`tr_stock`.`status` AS `status`,`tr_stock`.`created` AS `created`,`tr_stock`.`createdby` AS `createdby`,`tr_stock`.`updated` AS `updated`,`tr_stock`.`updatedby` AS `updatedby` from (((`tr_stock` join `m_currency` on((`m_currency`.`id` = `tr_stock`.`currency_id`))) left join `v_tr_stock_alocation` on(((`tr_stock`.`store_id` = `v_tr_stock_alocation`.`store_id`) and (`tr_stock`.`currency_id` = `v_tr_stock_alocation`.`currency_id`) and (`tr_stock`.`nominal` = `v_tr_stock_alocation`.`nominal`) and (`tr_stock`.`stock_year` = `v_tr_stock_alocation`.`stock_year`) and (`tr_stock`.`stock_month` = `v_tr_stock_alocation`.`stock_month`)))) left join `m_store` on((`m_store`.`id` = `tr_stock`.`store_id`))) group by `m_currency`.`currency_code`,`m_currency`.`currency_name`,`tr_stock`.`currency_id`,`tr_stock`.`store_id`,`tr_stock`.`stock_year`,`tr_stock`.`stock_month`;

-- ----------------------------
-- View structure for v_tr_stock_sell
-- ----------------------------
DROP VIEW IF EXISTS `v_tr_stock_sell`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tr_stock_sell` AS select `v_tr_stock_balance_sheet`.`store_id` AS `store_id`,`v_tr_stock_balance_sheet`.`currency_id` AS `currency_id`,`m_currency`.`currency_code` AS `currency_code`,`m_currency`.`currency_name` AS `currency_name`,`v_tr_stock_balance_sheet`.`nominal` AS `nominal`,`m_currency`.`status` AS `status` from (`v_tr_stock_balance_sheet` join `m_currency` on((`v_tr_stock_balance_sheet`.`currency_id` = `m_currency`.`id`))) where ((`v_tr_stock_balance_sheet`.`last_stock_sheet` > 0) and (`v_tr_stock_balance_sheet`.`stock_year` = year(curdate())) and (`v_tr_stock_balance_sheet`.`stock_month` = month(curdate()))) group by `v_tr_stock_balance_sheet`.`store_id`,`v_tr_stock_balance_sheet`.`currency_id`,`v_tr_stock_balance_sheet`.`nominal`;

SET FOREIGN_KEY_CHECKS = 1;
