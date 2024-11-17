-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 11:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlibansach`
--

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `t_san_pham_id` int(10) NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `gia_san_pham` int(6) NOT NULL,
  `anh_san_pham` varchar(100) NOT NULL,
  `tac_gia` varchar(50) NOT NULL,
  `the_loai` varchar(50) NOT NULL,
  `chi_tiet_san_pham` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`t_san_pham_id`, `ten_san_pham`, `gia_san_pham`, `anh_san_pham`, `tac_gia`, `the_loai`, `chi_tiet_san_pham`) VALUES
(1, 'Bình Tĩnh Khi Ế, Mạnh Mẽ Khi Yêu', 73000, '_binh-tinh-khi-e-manh-me-khi-yeu__95819.jpg', 'Ellen Fein - Sherrie Schneider', 'Tiểu Thuyết', 'Cuốn sách dành cho những người “lận đận tình duyên” , cho những cô gái thật sự nghĩ mình xứng đáng với những người đàn ông tốt nhất, những cuộc tình đáng giá nhất, chứ không chỉ là thoáng qua!'),
(2, 'Thiên Tài Bên Trái, Kẻ Điên Bên Phải', 116000, 'Thien-tai-ben-trai-ke-dien-ben-phai.png', 'Cao Minh', 'Văn học', 'Hỡi những con người đang oằn mình trong cuộc sống, bạn biết gì về thế giới của mình? Là vô vàn thứ lý thuyết được các bậc vĩ nhân kiểm chứng, là luật lệ, là cả nghìn thứ sự thật bọc trong cái lốt hiển nhiên, hay những triết lý cứng nhắc của cuộc đời?'),
(3, 'Tuổi Trẻ Đáng Giá Bao Nhiêu', 60000, 'tuoi-tre-dang-gia-bao-nhieu__76244.jpg', ' Rosie Nguyễn', 'Tiểu Thuyết', '\"Tôi đã đọc quyển sách này một cách thích thú. Có nhiều kiến thức và kinh nghiệm hữu ích, những điều mới mẻ ngay cả với người gần trung niên như tôi.\r\n\r\nTuổi trẻ đáng giá bao nhiêu? được tác giả chia làm 3 phần: HỌC, LÀM, ĐI.'),
(4, 'Thay Đổi Cuộc Sống Với Nhân Số Học', 233000, 'thay-doi-cuoc-song-voi-nhan-so-hoc_112464_1__50262.jpg', ' Lê Đỗ Quỳnh Hương', 'Văn học', 'Nhân số học là một môn nghiên cứu sự tương quan giữa những con số trong ngày sinh, cái tên với cuộc sống, vận mệnh, đường đời và tính cách của mỗi người. Bộ môn này đã được nhà toán học Pythagoras khởi xướng cách đây 2.600 năm và sau này được nhiều thế hệ học trò liên tục kế thừa, phát triển.\r\n\r\nCó thể xem, Nhân số học là một bộ môn Khám phá Bản thân (Self-Discovery), đọc vị về số. '),
(5, 'Mọi Khoảnh Khắc Đều Là Em', 110000, '1300201940011_[cover]-moi-khoanh-khac-deu-la-em__60725.jpg', ' Tae Wan Ha', 'Tiểu Thuyết', 'Mọi khoảnh khắc đều là em ngập tràn những lời yêu thương chân thành mà tác giả Tae Wan Ha dành cho những ai từng đi qua tuổi trẻ. Cuốn sách đưa người đọc vào nhiều cung bậc tình cảm tiếp thêm sức mạnh cho họ bằng những lời khuyên nhủ chân thành và dịu dàn'),
(6, 'LƯỢC SỬ LOÀI NGƯỜI (TÁI BẢN)', 177000, 'lich-su-loai-nguoi__29762.jpg', ' Yuval Noah Harari', 'Văn học', 'Sapiens, đưa chúng ta vào một chuyến đi kinh ngạc qua toàn bộ lịch sử loài người, từ những gốc rễ tiến hóa của nó đến thời đại của chủ nghĩa tư bản và kỹ thuật di truyền, để khám phá tại sao chúng ta đang trong những điều kiện sinh sống hiện tại.'),
(7, 'Lôi Thần Và Nhân Viên Văn Phòng ( Tập 2)', 59000, 'bia-loi-than-2__89012.jpg', 'Rena', 'Truyện tranh', 'Nối tiếp câu chuyện là quá trình hòa nhập vào với cuộc sống con người của Lôi Thần khi gặp những người bạn của Omura, trải nghiệm thế giới loài người mà anh chưa từng biết tới.'),
(8, 'Cô Gái Đến Từ Hôm Qua', 68000, 'co-gai-den-tu-hom-qua-2017__99319.jpg', ' Nguyễn Nhật Ánh', 'Tiểu Thuyết', 'Nếu ngày xưa còn bé, Thư luôn tự hào mình là cậu con trai thông minh có quyền bắt nạt và sai khiến các cô bé cùng lứa tuổi thì giờ đây khi lớn lên, anh luôn khổ sở khi thấy mình ngu ngơ và bị con gái “xỏ mũi”. Và điều nghịch lý ấy xem ra càng “trớ trêu’ hơn, khi như một định mệnh, Thư nhận ra Việt An'),
(9, 'Nghìn Lẻ Một Đêm - Tập 2', 92000, 'nghin-le-1-dem-tap-2-dinh-ti__53882.jpg', 'Antoine Galland', 'Truyện tranh', 'Nghìn Lẻ Một Đêm, tác phẩm vĩ đại bậc nhất của nền văn học Ả Rập, là một trong những công trình sáng tạo phong phú và hoàn mỹ của nền văn học thế giới.\r\n\r\nNhững truyện cổ tích này thể hiện với mức hoàn hảo, kỳ diệu xu hướng của nhân dân lao động muốn buông mình theo phép nhiệm màu của những ảo giác êm đẹp, theo sự kết hợp phóng khoáng của từ ngữ, thể hiện sức mạnh vũ bão của trí tưởng tượng hoa mỹ'),
(10, 'TỪ ĐIỂN BẰNG HÌNH – Thế Giới Động Vật Song Ngữ Anh – Việt ( Dành Cho Trẻ Từ 0- 6 Tuổi)', 40000, '52825713_1067824953401033_999220439152590848_n__29626.jpg', ' Minh Tuệ', 'Ngoại ngữ', 'Bộ sách mang chủ đề  loài vật quanh em. Sách được in 4 màu trên khổ giấy lớn gồm 36 trang màu, hình thức trình bày song ngữ anh việt  với nội dung ngắn gon, hình ảnh sắc nét và đẹp mắt cùng nhiều hình động vật,vật nuôi gần gũi với các bé.'),
(11, 'Hai Năm Trên Hoang Đảo', 86000, 'hai-nam-tren-hoang-dao__75802.jpg', 'Jules Verne', 'Văn học', 'Một sự cố xảy ra trong đêm tối – du thuyền Sloughi mất tích và trôi dạt vào Thái Bình Dương, mang theo mười lăm cậu bé từ tám đến mười bốn tuổi, không một cơ may được cứu giúp cũng chẳng có người lớn nào để cậy trông. Vừa thoát khỏi bão tố và những con sóng dữ của đại dương, du thuyền lại dạt vào một miền đất hoang sơ, bí ẩn. Kì nghỉ hè mơ ước bỗng chốc hóa thành một \"trường học\" sinh tồn gian khổ'),
(12, 'Miền Đất Hứa - The Promised Neverland - Tập 11', 40000, 'neverland-11-bia1-den__94635.jpg', ' Kaiu Shirai, Posuka Demizu', 'Truyện tranh', 'Leuvis, kẻ địch áp đảo hoàn toàn về sức mạnh, đang đứng trước mặt bọn trẻ. Trong tình thế tiến thoái lưỡng nan, Emma và đồng đội vẫn chiến đấu hết mình với niềm tin chiến thắng. Trận chiến quyết định ở bãi săn cuối cùng cũng đi tới hồi kết!\r\n\r\nHỡi những đứa trẻ không có tương lai, hãy đứng lên đối đầu với tuyệt vọng! Cuộc vượt ngục cam go sẽ đi đến đâu!?'),
(13, 'DEATH NOTE - TẬP 1', 35000, 'bia_ao_dn__62889.jpg', ' Tsugumi Ohba, Takeshi Obata', 'Truyện tranh', 'Death Note - tên thứ dị vật vừa được nhắc đến cũng là tên tác phẩm hư cấu sẽ mang tới những màn đấu trí quyết liệt giữa những kẻ được chọn trong cuộc chiến giữa các lực lượng đều nhân danh “chính nghĩa”.\r\n\r\nVới giả thiết thú vị và đầy “ma lực” xuất hiện giữa khung cảnh trinh thám, hình sự, đan cài thực tế và phi thực tế nhưng được xây dựng vô cùng chặt chẽ và hợp lý, chúng ta sẽ hơn một lần được t'),
(14, 'Mười Bảy Năm Ánh Sáng', 98000, '17nas_ao_tb2021-1-__66221.jpg', ' Zen', 'Truyện tranh', ' Vậy thì hãy tạo ra một thế giới khác, thế giới chỉ có cậu cùng những điều tốt đẹp bên trong cậu mà thôi.\"\r\n\r\nTừng câu chuyện như cánh cửa dẫn sang những thế giới ấy, tập truyện tranh ngắn giống như chùm chìa khóa được đúc tạc bằng hình ảnh cùng ngôn từ, đưa bạn tới từng chiều không gian thời gian khác, nhỏ bé, tĩnh lặng, và dễ thấu hiểu hơn.'),
(15, 'Sử Việt – 12 Khúc Tráng Ca', 89000, 'su-viet-12-khuc-trang-ca__15128.jpg', ' Dũng Phan', 'Văn học', 'ác phẩm “Sử Việt - 12 khúc tráng ca” kể về 12 câu chuyện dựng nước và giữ nước thời phong kiến, được chọn lọc theo tính chất quan trọng và hùng tráng trong dòng chảy lịch sử Việt Nam. Cuốn sách là sự kết hợp của những tư liệu lịch sử đã được kiểm chứng, xen kẽ với nhận định và đánh giá của người biên soạn. Tác phẩm kể lại các câu chuyện Sử Việt đầy hấp dẫn bằng một cách tiếp cận hoàn toàn mới'),
(16, 'Thần Chú Ngữ Pháp Của Winnie - Học Tiếng Anh Dễ Như Ăn Bánh', 75000, 'hoc-tieng-anh-de-nhu-an-banh__99783.jpg', ' Romi Park', 'Ngoại ngữ', 'Xin chào, tớ là phù thủy nhỏ Winnie. Tớ có nhiệm vụ quan trọng dành cho các cậu đây! Chỉ cần thực hiện nhiệm vụ này thì mọi chướng ngại trong môn tiếng Anh đều đơn giản hệt miếng bánh, goàm goàm. Để hoàn thành nhiệm vụ, các cậu sẽ được Giun đất ma thuật hướng dẫn cách chế thần chú ngữ pháp tiếng Anh dùng trong từng trường hợp, ví dụ như khi mách lẻo này.'),
(17, 'Em Là Nhà', 79000, 'em-la-nha__05935.jpg', ' Lan Rùa', 'Tiểu Thuyết', 'Em là nhà​” là câu chuyện tình với nhiều nước mắt, nhiều thù hận, nhưng cũng không thiếu những điều ngọt ngào và những hạnh phúc bình dị. Mỗi trang sách bạn lật mở, mỗi nỗi đau bạn cảm nhận cùng những nhân vật chính là mỗi lần bạn xóa đi lớp sương mù đang giăng trong mình về tình yêu. Và những câu hỏi ở trên sẽ trở nên dễ dàng trả lời hơn bao giờ hết.\r\n\r\nChẳng phải tự nhiên mà Việt An bỏ Như Nguyệ'),
(18, 'ĐỘNG LÒNG SẼ ĐAU LÒNG', 88000, 'image_195509_1_16165__01879.jpg', ' Lâm Phương Lam', 'Tiểu Thuyết', '‘Động lòng sẽ đau lòng’ là cuốn tiểu thuyết lãng mạn nhưng cũng đầy đau buồn mà trong cuộc đời ta đã đôi lần trải qua hoặc bắt gặp ở đâu đó. Chúng ta có tổn thương, có rơi nước mắt… thì chúng ta mới thực sự trưởng thành. Và khi đã trưởng thành, hãy cứ động lòng và hết mình như thế.'),
(19, 'Tom Sawyer Trên Khinh Khí Cầu & Tom Sawyer Làm Thám Tử', 56000, 'tom-sawer-tren-khinh-khi-cau__16483.jpg', 'Mark Twain', 'Văn học', 'Sở hữu trí tưởng tượng và tâm hồn mơ mộng cùng bản tính sôi nổi, hoạt bát, thông minh, Tom Sawyer xứng đáng là linh hồn của mọi cuộc phiêu lưu mà cậu tham gia. Bên cạnh đó là người bạn đồng hành Huck Finn luôn sẵn sàng chia sẻ niềm háo hức phiêu lưu của cậu, đồng thời là một nhân tố thú vị đóng góp vào sự lôi cuốn của câu chuyện bằng giọng kể hồn nhiên, dân dã cùng những màn \"lí sự\" hài hước đặc t'),
(20, 'Trật Tự Thế Giới', 152000, 'trat-tu-the-gioi__78481.jpg', ' Henry Kissinger', 'Kinh tế', 'Trong tác phẩm Trật Tự Thế Giới, Kissinger xuất phát từ Hòa ước Westphalia để phân tích về tương quan giữa các nước, chủ yếu là các cường quốc và các khu vực giữ một vai trò đặc biệt đối với bức tranh địa chính trị thế giới, với những khác biệt trong thế giới quan và vị trí địa lý đã ảnh hưởng đến chính sách ngoại giao của mỗi nước như thế nào.'),
(21, 'Heidegger Và Con Hà Mã Bước Qua Cổng Thiên Đường', 70000, 'heidegger-va-con-ha-ma-buoc-vao-cong-thien-duong__84330.jpg', ' Thomas Cathcart - Daniel Klein', 'Kinh tế', 'Sáng tạo thêm bên cạnh TRIẾT HỌC, Thomas Cathcart và Daniel Klein đã mở rộng cánh cửa để ánh sáng của rừng cười tràn vào ngôi đền triết học. Cuốn sách dẫn dắt người đọc vào cuộc du hành vui vẻ và hài hước, qua truyện cười để hiểu lịch sử triết học cổ kim, đưa ra những câu trả lời đơn giản đến bất ngờ cho những ai muốn đi sâu vào bản chất Các Câu Hỏi Lớn.'),
(22, 'Âm Dương Sư 3 - Hẹn Ước Và Điêu Tàn', 81000, 'am_duong_su_3_-_bia1_781f621d61d44649ad2152ddeca9338e_master__62901.jpg', ' Yumemakura Baku', 'Truyện tranh', 'Bởi vì những oan trái thế gian, yêu ma quỷ quái, đều lần lượt được đôi bạn Seimei và Hiromasa sát cánh bên nhau cùng đi tìm hiểu, gặp oan thì xoa dịu, gặp oán thì giải tỏa. Xong việc, họ lại kề vai ngồi nhâm nhi trà rượu trên hàng hiên nhìn ra bốn mùa, để những đổi trao kín đáo và nhẹ nhàng về nhân sinh đẩy đưa tan loãng theo gió đêm.'),
(23, 'Làm Giàu', 90000, 'lam-giau-grow-rich__30538.jpg', ' Napoleon Hill', 'Kinh tế', 'Tác giả của cuốn sách trứ danh Think and Grow Rich – 13 nguyên tắc nghĩ giàu, làm giàu - Napoleon Hill - có một tuổi trẻ không khác gì so với hầu hết các bạn trẻ ngày nay. Khi mới bắt đầu sự nghiệp, ông từng có quan niệm rằng thành công gắn liền với sự sung túc về mặt vật chất. Ông muốn được là một người quan trọng và giàu sang. Nhưng quan điểm của Hill đã thay đổi cùng với những trải nghiệm xương'),
(24, 'Blockchain Và Đầu Tư ICOs Căn Bản - Con Đường Tới Tự Do Tài Chính', 200000, 'blockchain__59310.jpg', 'David Nguyễn, Lưu Thế Lợi', 'Kinh tế', 'Nội dung sách gồm 3 phần với 25 chương.\r\n\r\n- Phần 1: Blockchain\r\n\r\n- Phần 2: ICO\r\n\r\n- Phần 3: Trade the fucking coin\r\n\r\nHiện nay, thuật ngữ Blockchain đã trở thành từ khóa tìm kiếm phổ biến tại Việt Nam. Tuy nhiên hầu hết các tài liệu là nước ngoài và gây khó khăn cho độc giả trong việc tiếp cận. Vì sự phát triển của Blockchain Việt Nam'),
(25, '50 Ý TƯỞNG VỀ TƯƠNG LAI', 105000, 'jl1hlmft__79261.jpg', 'Richard Watson', 'Kinh tế', 'Thế giới chúng ta đang sống rất khác với thế giới cách đây 10, 20 năm và còn khác hơn nữa so với 50 năm hoặc 100 năm trở về trước. Chúng ta ngày nay đang thừa hưởng thành quả từ sự tiến bộ vượt bậc trong tất cả các lĩnh vực: y tế tiến bộ vượt bậc đã đầy lùi những căn bệnh hiểm nghèo, sức khỏe và tuổi thọ của con người không ngừng được nâng lên; mạng internet toàn cầu'),
(26, 'Quyền Năng Làm Giàu', 85000, 'quyen-nang-lam-giau__18449.jpg', 'Napoleon Hill', 'Kinh tế', 'Cuốn sách được viết bởi tiến sỹ Napoleon Hill đã truyền cảm hứng cho hàng triệu người trên khắp thế giới, và những nguyên tắc mà Tiến sỹ Hill khám phá ra vẫn có giá trị ở thời điểm hiện tại giống như thời điểm diễn ra cuộc phỏng vấn đầu tiên của ông với ngài Andrew Carnegie vào năm 1908.\r\n\r\nCuốn sách này sẽ mang cho bạn những lợi ích tuyệt vời.'),
(27, 'Mê Cung Phát Triển Tư Duy 2', 57000, 'me-cung-2__06633.jpg', ' Philip Clarke', 'Ngoại ngữ', 'Tìm kho báu, giúp bạn bè thất lạc tìm lại nhau, chạy trốn khỏi núi lửa đang phun trào... Cuốn sách này chứa đựng hơn 50 mê cung đầy thú vị cho bé khám phá.'),
(28, 'Atlas Muôn Loài', 125000, 'atlas-muon-loai__02029.jpg', ' Virginie Aladjidi - Emmanuelle Tchoukriel', 'Ngoại ngữ', 'Động vật luôn cuốn hút trẻ em ở mọi lứa tuổi. Cuốn atlas đầu đời này của các em sẽ giới thiệu gần 250 trên tổng số 1,2 triệu loài động vật đã được các nhà khoa học thống kê trên Trái Đất. Đó là các loài thú, chim, côn trùng, thân mềm, bò sát có vảy, cá...\r\n\r\nTrong Atlas muôn loài, thế giới được phân thành chín vùng.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`t_san_pham_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `t_san_pham_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
