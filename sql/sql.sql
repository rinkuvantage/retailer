CREATE TABLE IF NOT EXISTS `ret_files` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `filename` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `keyid` varchar(200) NOT NULL,
  `udate` datetime DEFAULT NULL,
  `gdate` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


CREATE TABLE IF NOT EXISTS `ret_users` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `user_pass` varchar(200) NOT NULL,
  `user_email` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_type` varchar(50) DEFAULT 'user',
  `company` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `fname` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lname` varchar(200) NOT NULL,
  `phoneno` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tokenid` varchar(200) DEFAULT NULL,
  `keyid` varchar(200) DEFAULT NULL,
  `cdate` datetime NOT NULL,
  `udate` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activationkey` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `ret_users`
--

INSERT INTO `ret_users` (`ID`, `user_pass`, `user_email`, `user_type`, `company`, `fname`, `lname`, `phoneno`, `tokenid`, `keyid`, `cdate`, `udate`, `active`, `activationkey`) VALUES
(3, '0a4845df7f66eb1f02c974a25bceeb3d284ccf14', 'hggf4@gmail.com', 'user', 'Vantage webtech', 'dsfdsfsd', '', '8686868', '9ab3a6ebd8241e4bb38cc9b0c41d33b556cbec00', 'e73c27fc0178225a27f6fe56030128de2445bae6', '2015-12-31 07:54:13', '2015-12-31 10:54:03', 1, '706eeefcd535e142125ccb79a282bbd7baa3b395'),
(4, 'b2f446083fc9a242b0bd75b2b37c0393c2b42f83', 'fffff@dsa.xom', 'user', 'gdfg', 'hgf', '', 'hgfhgf', 'f654934ab6f993de119fca24fe85c81c64376ae8', '192a0d65b76d5315b5ebea17a436b4b141f1c9e8', '2015-12-31 12:13:03', '2015-12-31 12:13:03', 1, '652c0a19b5a1fcc7e45865795de92fecbc9a2354'),
(5, '1f31a1e4e868e0a055f1db237dbf6ddcd944dc5c', 'fdfd@gmail.com', 'user', 'trete', 'hghg', '', '464', 'cef3b651c93021e868d7bd3c81c6d374', '4ad82ac482ea25af3d9eb38a00b29700', '2015-12-31 14:24:31', '2015-12-31 14:24:31', 1, 'ccfad8680bba6ec966f5f4aa20e6ebcf1aafad2b'),
(6, '8fbb5fc71617dd6d99c217cdbc239a8d60393d45', 'ram@sigmaways.com', 'admin', 'sigmaways Inc', 'Ram', 'Kumar', '5765756757', 'c7ce23c0e5f553345acb85b3da51c98c', 'e35bf5cf4fbb561c1a56bfbf756ca0c4', '2015-12-31 14:37:51', '2016-01-08 09:11:47', 1, '20576f46fd5d363c88d2241b2bba1c2deee04b4b'),
(7, 'a85ac4398ef54878cd34341aac53a419640e2e63', 'test#vant@gmail.com', 'user', 'infisys123', 'mike123@#', '', '12312sdfsjdnfsdnfsjdvb  u234', 'ae1e3de06db7eb2ee94982e4488ca472', '0387d7e0e71e50e467e40f084472b2c0', '2016-01-04 06:00:32', '2016-01-04 06:00:32', 0, '8ef42a247021eb66b78c1f2d2b496902a326b66f'),
(8, '52a2133738196ff06ea743fb028b3676605f9acd', 'testvantvivek@gmail.com', 'user', 'Infosys', 'Mike', 'Testing', '12324818412', 'f14998c5bdcb06bc159fd52bd147c98d', 'cc72933809c2b9217590092ae71b6b98', '2016-01-04 06:04:04', '2016-01-07 14:11:11', 1, 'ea119f5f9136b2da15b0616d6f0968fd31d5da27'),
(9, '9e2bff93c7744533230065645d4efc0d57271e20', 'abhishekvaid@gmail.com', 'user', 'jhghjgjhg', 'jkhkjhjk', '', '765675765', 'cbd64e9d521bb92fd91141f2ded7c253', '84567580cdafa786d3856d43c718ad7f', '2016-01-05 04:51:02', '2016-01-05 04:51:02', 1, '67328d0da94c185c4403c082eb01e0ba87a9182c'),
(11, '5c7c8e7b8d326c3f255e1858feeeee485f6f2691', 'test1vantvivek@gmail.com', 'user', 'Vantage', 'Ronit', '', '1234567890', '03ff52fecbf117f577cb875a1ae23d6f', 'cb8d58718197b157565804ef4609dc09', '2016-01-06 09:47:20', '2016-01-06 09:47:20', 0, 'daa75cdc5bc0b09571bac040092a6c0c2bc4fd32'),
(12, '4b84575df7dad1984344f958616d32a6c52e42c9', 'ram_soft2003@yahoo.com', 'user', 'xyz', 'ram', '', '1234556789', '921d5f2f1c655983685d002be9ced42e', 'a49bd27294b3cff0f6c9fa0530e0f3a7', '2016-01-06 09:54:03', '2016-01-06 09:54:03', 0, '746038195cdcea85929cf87bb7da07cc76c0aa8a'),
(13, '54812bf4e0215a0983f2722772ba9f3dc735aced', 'abhishekvaid2001@gmail.com', 'user', 'VWt', 'Abhishek', '', '9815420174', '8f9df2af2b5a93ae5634f7633c0ba747', 'f06f20c6dd92add5c57287645d4ac4c6', '2016-01-06 10:02:24', '2016-01-06 10:02:24', 0, 'ab3b20aa82e67668ba638c6c8da88e2b16906dfd'),
(14, 'c48cda2623b7a8b713c398b9d87324e332359a5f', 'vivek.choudhary90@yahoo.com', 'user', 'Vant', 'Vik', '', '1234567890', '364d621b035cf64b8975060b3ef481fe', 'ac141e9ae2a77920baed2fac7bb8ae0e', '2016-01-06 10:14:47', '2016-01-06 10:14:47', 0, '13fc9973e3b609d92ebbb224f0995de31037e37e'),
(15, '096703b00bae6deb23871f032138075423e4ca4a', 'ashok.vantage@gmail.com', 'user', 'Vantage webtech', 'Rinku', 'hgfhfgfhg', '6456546454646456', '892997dcbd301869263b81e21a5f27e4', '75b71ef82f73a47c79b1711bdb5854ca', '2016-01-07 09:18:26', '2016-01-07 10:55:08', 0, '0c66f1fb61390bcd644cb2c60757e673a0cc3458'),
(16, '24479d319416e04c28a049fa2fef9a47fd897758', 'ram.soft2003@gmail.com', 'user', 'Sigma', 'Ram', 'Kumar', '4088901234', '5ea833810f4b53327a08fae1fc6a87b8', 'c0a1873fd7b39bd7297bf755da3f3a8a', '2016-01-07 10:04:00', '2016-01-08 09:09:53', 0, '69254ad66f62c457316a3324a3551ddbbec9dc40'),
(17, '556647c9bf3706163db93d36f74c243a8963603d', 'vivekvant#age@gmail.com', 'user', 'Sigma123@#$', 'ram123', 'testing@#', '12345qwe', '4e3e1170ae5b166fbe1951fd8c5415ef', 'a57f4b9b2c31345f8a4e4687dfeb724b', '2016-01-07 11:41:36', '2016-01-07 12:05:25', 0, '5421ce9c81a3f861960e5fcb550568d127eae9ee'),
(18, '2f0f37f1bcf63d24f5163b94c64d37445ebfdcf9', 'sheela.vantage@gmail.ocm', 'user', 'vantage webtech', 'sheela ', 'kumari', '123456789', '390326087d7d4aa3eabe4ed9b0a84a4c', 'f59807db1059acf7d913dd9d9de615e1', '2016-01-07 11:56:19', '2016-01-07 11:56:19', 0, '336f83ac5f228f1987fa54199e5fc0e8fdfcd9aa'),
(19, '1d89a356bb3ea4c769fd50a91fe7f6a9ebf3ba97', 'abc@gmail.com', 'user', 'vantage webtech', 'sheela ', 'kumari', '1234567890', '9ea1baf85f35d377da28674f035c0af1', 'b971f23b80cd5a30b349f901a43ec27b', '2016-01-07 12:06:06', '2016-01-07 12:06:06', 0, '9f397ec4c7c0678b07aded4fb2e00a3c4d8ad560'),
(20, '5afa428ac508d9bb04bf2841331182abbcf3090e', 'vivek.vantage123@gmail.com', 'user', 'sigmaways', 'ram', 'testing', '12345678901', '123e1f251bc391dbbf116304b4bb9999', 'c888a7b251e4fb7bce120177858b6dbe', '2016-01-07 13:32:28', '2016-01-07 13:32:28', 0, '4db3321d4fe58bb0108993454d0c1cf824d2a170');