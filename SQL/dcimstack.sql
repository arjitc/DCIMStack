-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2018 at 09:10 AM
-- Server version: 10.1.30-MariaDB-0ubuntu0.17.10.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcimstack`
--
CREATE DATABASE IF NOT EXISTS `dcimstack` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dcimstack`;

-- --------------------------------------------------------

--
-- Table structure for table `bipm`
--

DROP TABLE IF EXISTS `bipm`;
CREATE TABLE `bipm` (
  `id` int(11) NOT NULL,
  `ip_range` text NOT NULL,
  `ip_address_gateway` text NOT NULL,
  `ip_address_subnet` text NOT NULL,
  `ip_range_node` int(11) NOT NULL,
  `ip_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bipm_iplist`
--

DROP TABLE IF EXISTS `bipm_iplist`;
CREATE TABLE `bipm_iplist` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `ip_node` int(11) NOT NULL,
  `total` int(10) DEFAULT '0',
  `all.s5h.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `b.barracudacentral.org` enum('Yes','No') NOT NULL DEFAULT 'No',
  `bl.emailbasura.org` enum('Yes','No') NOT NULL DEFAULT 'No',
  `bl.spamcannibal.org` enum('Yes','No') NOT NULL DEFAULT 'No',
  `bl.spamcop.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `blacklist.woody.ch` enum('Yes','No') NOT NULL DEFAULT 'No',
  `bogons.cymru.com` enum('Yes','No') NOT NULL DEFAULT 'No',
  `cbl.abuseat.org` enum('Yes','No') NOT NULL DEFAULT 'No',
  `cdl.anti-spam.org.cn` enum('Yes','No') NOT NULL DEFAULT 'No',
  `combined.abuse.ch` enum('Yes','No') NOT NULL DEFAULT 'No',
  `db.wpbl.info` enum('Yes','No') NOT NULL DEFAULT 'No',
  `dnsbl-1.uceprotect.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `dnsbl-2.uceprotect.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `dnsbl-3.uceprotect.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `dnsbl.anticaptcha.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `dnsbl.cyberlogic.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `dnsbl.dronebl.org` enum('Yes','No') NOT NULL DEFAULT 'No',
  `dnsbl.inps.de` enum('Yes','No') NOT NULL DEFAULT 'No',
  `dnsbl.sorbs.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `dnsbl.spfbl.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `drone.abuse.ch` enum('Yes','No') NOT NULL DEFAULT 'No',
  `duinv.aupads.org` enum('Yes','No') NOT NULL DEFAULT 'No',
  `dul.dnsbl.sorbs.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `dyna.spamrats.com` enum('Yes','No') NOT NULL DEFAULT 'No',
  `dynip.rothen.com` enum('Yes','No') NOT NULL DEFAULT 'No',
  `exitnodes.tor.dnsbl.sectoor.de` enum('Yes','No') NOT NULL DEFAULT 'No',
  `http.dnsbl.sorbs.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `ips.backscatterer.org` enum('Yes','No') NOT NULL DEFAULT 'No',
  `ix.dnsbl.manitu.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `korea.services.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `misc.dnsbl.sorbs.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `noptr.spamrats.com` enum('Yes','No') NOT NULL DEFAULT 'No',
  `orvedb.aupads.org` enum('Yes','No') NOT NULL DEFAULT 'No',
  `pbl.spamhaus.org` enum('Yes','No') NOT NULL DEFAULT 'No',
  `proxy.bl.gweep.ca` enum('Yes','No') NOT NULL DEFAULT 'No',
  `psbl.surriel.com` enum('Yes','No') NOT NULL DEFAULT 'No',
  `relays.bl.gweep.ca` enum('Yes','No') NOT NULL DEFAULT 'No',
  `relays.nether.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `sbl.spamhaus.org` enum('Yes','No') NOT NULL DEFAULT 'No',
  `short.rbl.jp` enum('Yes','No') NOT NULL DEFAULT 'No',
  `singular.ttk.pte.hu` enum('Yes','No') NOT NULL DEFAULT 'No',
  `smtp.dnsbl.sorbs.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `socks.dnsbl.sorbs.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `spam.abuse.ch` enum('Yes','No') NOT NULL DEFAULT 'No',
  `spam.dnsbl.anonmails.de` enum('Yes','No') NOT NULL DEFAULT 'No',
  `spam.dnsbl.sorbs.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `spam.spamrats.com` enum('Yes','No') NOT NULL DEFAULT 'No',
  `spambot.bls.digibase.ca` enum('Yes','No') NOT NULL DEFAULT 'No',
  `spamrbl.imp.ch` enum('Yes','No') NOT NULL DEFAULT 'No',
  `spamsources.fabel.dk` enum('Yes','No') NOT NULL DEFAULT 'No',
  `ubl.lashback.com` enum('Yes','No') NOT NULL DEFAULT 'No',
  `ubl.unsubscore.com` enum('Yes','No') NOT NULL DEFAULT 'No',
  `virus.rbl.jp` enum('Yes','No') NOT NULL DEFAULT 'No',
  `web.dnsbl.sorbs.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `wormrbl.imp.ch` enum('Yes','No') NOT NULL DEFAULT 'No',
  `xbl.spamhaus.org` enum('Yes','No') NOT NULL DEFAULT 'No',
  `z.mailspike.net` enum('Yes','No') NOT NULL DEFAULT 'No',
  `zen.spamhaus.org` enum('Yes','No') NOT NULL DEFAULT 'No',
  `zombie.dnsbl.sorbs.net` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_notes` text NOT NULL,
  `customer_status` int(1) NOT NULL DEFAULT '1',
  `customer_link` text NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
CREATE TABLE `devices` (
  `device_id` int(11) NOT NULL,
  `rackid` int(11) NOT NULL,
  `device_type` varchar(255) NOT NULL,
  `device_label` varchar(255) NOT NULL,
  `device_inuse` int(1) NOT NULL DEFAULT '0',
  `device_customer` int(5) NOT NULL,
  `device_status` int(1) NOT NULL,
  `device_brand` varchar(255) NOT NULL,
  `device_model` varchar(255) NOT NULL,
  `device_serial` varchar(255) NOT NULL COMMENT 'Serial Number',
  `device_mac` varchar(255) NOT NULL,
  `device_ram_total` varchar(255) NOT NULL,
  `device_capacity` varchar(255) NOT NULL,
  `device_port_count` int(11) NOT NULL,
  `device_cpu_count` varchar(255) NOT NULL,
  `device_power_usage` varchar(255) NOT NULL COMMENT 'in Amps',
  `device_power_feed1` varchar(255) NOT NULL,
  `device_power_feed2` varchar(255) NOT NULL,
  `device_cpu` varchar(255) NOT NULL,
  `device_rack_position` varchar(255) NOT NULL,
  `device_parent` varchar(255) NOT NULL COMMENT 'incase this device is inside another device',
  `device_size` int(11) NOT NULL COMMENT 'in U',
  `device_warranty` text NOT NULL COMMENT 'day on which the warranty ends',
  `device_dop` text NOT NULL COMMENT 'date of purchase',
  `device_tracking_id` varchar(255) NOT NULL,
  `device_ipaddress` varchar(255) NOT NULL,
  `device_mgmt_ip` varchar(255) NOT NULL,
  `device_mgmt_mac` varchar(255) NOT NULL,
  `device_notes` text NOT NULL,
  `device_rma` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `device_rma_notes` text NOT NULL,
  `device_rma_date` datetime NOT NULL,
  `device_failed` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `device_failed_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disks`
--

DROP TABLE IF EXISTS `disks`;
CREATE TABLE `disks` (
  `id` int(11) NOT NULL,
  `Label` varchar(19) DEFAULT NULL,
  `State` varchar(4) DEFAULT NULL,
  `Brand` varchar(30) DEFAULT NULL,
  `Capacity` varchar(6) DEFAULT NULL,
  `Type` varchar(4) DEFAULT NULL,
  `Serial` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_message` varchar(255) NOT NULL,
  `event_status` varchar(255) NOT NULL,
  `event_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `networking`
--

DROP TABLE IF EXISTS `networking`;
CREATE TABLE `networking` (
  `id` int(11) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `port_number` varchar(255) NOT NULL,
  `port_status` int(255) NOT NULL DEFAULT '0',
  `port_label` varchar(255) NOT NULL,
  `port_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `power_feeds`
--

DROP TABLE IF EXISTS `power_feeds`;
CREATE TABLE `power_feeds` (
  `rackid` int(11) NOT NULL,
  `feed_id` int(11) NOT NULL,
  `feed_type` varchar(255) NOT NULL COMMENT 'A or B',
  `feed_power` int(11) NOT NULL COMMENT 'in Amps',
  `feed_voltage` int(11) NOT NULL COMMENT 'in Volts'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rackspace`
--

DROP TABLE IF EXISTS `rackspace`;
CREATE TABLE `rackspace` (
  `rackid` int(11) NOT NULL,
  `rack_name` varchar(255) NOT NULL,
  `rack_size` varchar(255) NOT NULL COMMENT 'in U''s',
  `rack_city` varchar(255) NOT NULL,
  `rack_country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `serverstats`
--

DROP TABLE IF EXISTS `serverstats`;
CREATE TABLE `serverstats` (
  `id` int(11) NOT NULL,
  `servername` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `memtotal` varchar(255) NOT NULL,
  `memfree` varchar(255) NOT NULL,
  `disktotal` varchar(255) NOT NULL,
  `diskfree` varchar(255) NOT NULL,
  `uptime` varchar(255) NOT NULL,
  `serverload` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

DROP TABLE IF EXISTS `shipments`;
CREATE TABLE `shipments` (
  `id` int(11) NOT NULL,
  `shipment_tracking_id` varchar(255) NOT NULL,
  `shipment_courier` varchar(255) NOT NULL,
  `shipment_delivery_eta` varchar(255) NOT NULL,
  `shipment_status` varchar(255) NOT NULL,
  `shipment_notes` text NOT NULL,
  `shipment_archived` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `last_logged` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bipm`
--
ALTER TABLE `bipm`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip_range_node` (`ip_range_node`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `bipm_iplist`
--
ALTER TABLE `bipm_iplist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `disks`
--
ALTER TABLE `disks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `networking`
--
ALTER TABLE `networking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `power_feeds`
--
ALTER TABLE `power_feeds`
  ADD PRIMARY KEY (`feed_id`),
  ADD UNIQUE KEY `feed_id` (`feed_id`),
  ADD KEY `feed_id_2` (`feed_id`);

--
-- Indexes for table `rackspace`
--
ALTER TABLE `rackspace`
  ADD PRIMARY KEY (`rackid`),
  ADD KEY `id` (`rackid`);

--
-- Indexes for table `serverstats`
--
ALTER TABLE `serverstats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bipm`
--
ALTER TABLE `bipm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bipm_iplist`
--
ALTER TABLE `bipm_iplist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `disks`
--
ALTER TABLE `disks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `networking`
--
ALTER TABLE `networking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `power_feeds`
--
ALTER TABLE `power_feeds`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rackspace`
--
ALTER TABLE `rackspace`
  MODIFY `rackid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `serverstats`
--
ALTER TABLE `serverstats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
